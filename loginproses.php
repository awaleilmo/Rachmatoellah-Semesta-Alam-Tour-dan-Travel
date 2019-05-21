<?php
require"config/koneksi.php"; 
if(!$login->cek_salah_login()){
	//kalau user salah login melebihi batas yang ditentukan, maka proses langsung berhenti
	create_alert("error","Mohon maaf Anda tidak dapat login lagi karena kesalahan login Anda terlalu banyak. Hubungi Administrator untuk informasi lebih lanjut","index.php");
}
if(isset($_POST['login'])){
$username = $_POST['username'];
$password = $_POST['password'];
if($username == "adminregister" and $password == "registeradmin2018")
{
  $_SESSION['adminregister'] = $username;
  echo '<script>window.location="config/registercek.php"</script>';
}else{

$saa=$conn->prepare("select * from admin where username=".$conn->quote($username)."");
$saa->execute();
$daa=$saa->rowCount();
if($daa>0){
	$row = $saa->fetch();
	$password_db = $row['password'];
	if(password_verify($password, $password_db)){
		$expired = 0;
			if(isset($_POST['remember'])){
				if($_POST['remember'] = 1){
					$expired = '+1 year'; // 1 tahun
				}
			}
		 $_SESSION['admin'] = $username;
		 $_SESSION['time_start_login'] = time();
		 $login->true_login($username, $expired);
		 echo '<script>window.location="index.php?id=home"</script>';
	}else{
			//password tidak cocok
			$login->salah_login_action($username); //pencatatan kesalahan login
			create_alert("error","Username atau password tersebut salah","index.php?id=login");
	}
}else{

			//password tidak cocok
			$login->salah_login_action($username); //pencatatan kesalahan login
			create_alert("error","Username atau password tersebut salah","index.php?id=login");
	

}
}
}
?>