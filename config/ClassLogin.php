<?php
Class Login{
	var $conn;

	public function __construct(){
		global $conn;
		#menghubungkan variabel database $db ke class Login
		$this->conn = $conn;
	}

	public function cek_login(){
		//method yang akan memvalidasi apakah sedang dalam keadaan log in atau tidak
		if(isset($_COOKIE['adv_token'])){
			$token = $_COOKIE['adv_token'];
			$now = date("Y-m-d H:i:s");
			$cek = $this->conn->query("SELECT * FROM tb_admin_log WHERE token = ".$this->conn->quote($token)." AND expired > ".$this->conn->quote($now));
			if($cek){
				#kalau token di cookie tersebut ada, lakukan pengecekan IP dan User Agent
				$row = $cek->fetch();
				if($row['ip'] == $_SERVER['REMOTE_ADDR'] || $row['useragent'] == $_SERVER['HTTP_USER_AGENT']){
					//kondisi bisa disesuaikan utk kebutuhan dengan ATAU / DAN
					//kondisi DAN boleh dipakai, tapi terlalu strict.. Lebih baik pakai ATAU saja.
					$username = $row['username'];

					//kembalikan data user yg sedang login,, siapa tahu nanti ingin diolah
					$get_admin = $this->conn->query("SELECT * FROM admin WHERE username = ".$this->conn->quote($username));
					$rget = $get_admin->fetch();

					return array(
						"username" => $rget['username'],
						"priviledge" => $rget['priviledge']
					);

				}

			}
		}
		return false;
	}

	Public function salah_login_action($username){
		//method yang akan dipanggil apabila user memasukkan username/password yang salah
		$tgl = date("Y-m-d H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		
		$save = $this->conn->prepare("INSERT INTO tb_admin_log VALUES (NULL, ?, '', '', ?, ?, ?, 0)");
		$save->execute(array(
			$tgl, $username, $ip, $useragent
		));
		return true;
	}


	public function cek_salah_login($limit=5){
		//method untuk menangkal BRUTE FORCE. 
		//Apabila user terdeteksi salah login sebanyak $limit kali, maka user tidak boleh login lagi
		$username = $_POST['username'];
		$cek = $this->conn->prepare("SELECT * FROM tb_admin_log WHERE stat = 0 AND username = ?");

		$cek->execute(array($username));
		if($cek->rowCount() >= $limit)
			return false;
		return true;
	}


	public function true_login($username, $expired){
		//method yang akan dipanggil apabila user memasukkan username dan password yang benar
		$tgl = date("Y-m-d H:i:s");
		if($expired <> 0){
			#kalau remember me dicentang, tanggal expirenya adalah 1 tahun dari sekarang.
			$expireddb = date("Y-m-d H:i:s",strtotime($expired));
		}
		else{
			#kalau remember me tidak dicentang, secara default user dapat login selama 6 jam saja.
			$expireddb = date("Y-m-d H:i:s",strtotime("+6 hours"));
		}

		$ip = $_SERVER['REMOTE_ADDR'];
		$useragent = $_SERVER['HTTP_USER_AGENT'];

		$token = sha1($ip.$expireddb."string_random_apasaja".microtime()); //intinya membuat karakter acak saja
		//$token ini penting,, nantinya akan disimpan sebagai COOKIE

		//apabila ada kesalahan login sebelumnya dengan IP & user agent yang sama sebelumnya harus ditandai dulu 
		//penandaan dilakukan dengan mengubah FLAG dari 0 menjadi 9, sehingga di pengecekan selanjutnya data ini tidak akan dianggap
		$upd = $this->conn->query("UPDATE tb_admin_log SET stat = 9 WHERE token = '' AND ip = ".$this->conn->quote($ip)." AND useragent = ".$this->conn->quote($useragent));


		//memasukkan data lengkap ke tb_admin_log dengan flag STAT = 1.
		$save = $this->conn->prepare("INSERT INTO tb_admin_log VALUES (NULL, ?, ?, ?, ?, ?, ?, 1)");
		$save->execute(array(
			$tgl, $expireddb, $token, $username, $ip, $useragent
		));


		//simpan token ke cookie
		$expr = 0;
		if($expired <> 0){
			$expr = intval(strtotime($expired));
		}
		setcookie("adv_token", $token, $expr, "/");
		#kalau remember me tidak dicentang, cookie akan otomatis bertindak sebagai session
		#kalau dicentang, cookie akan terus disimpan

		return true;
	}

	public function logout(){
		//method yang akan dipanggil apabila user logout dari sistem
		if(isset($_COOKIE['adv_token'])){
			$token = $_COOKIE['adv_token'];

			//cara menghapus cookie adalah dengan mengubah tanggal expirednya menjadi sekarang
			$now = date("Y-m-d H:i:s");
			unset($_COOKIE['adv_token']);
			setcookie("adv_token",null,$now,"/");
			
			#jangan lupa tanggal expired di database diupdate juga, supaya session token yang sudah logout tidak dihijack
			$this->conn->query("UPDATE tb_admin_log SET expired = ".$this->conn->quote($now)." WHERE token = ".$this->conn->quote($token));
		}

		return true;
	}

	public function login_redir(){
		//method yang akan selalu dipanggil di seluruh halaman non index dan non login, 
		//untuk mengecek apabila user tidak memiliki akses langsung diredirect ke halaman login
		if(!$this->cek_login())
			header("location:index.php");
	}
   
}