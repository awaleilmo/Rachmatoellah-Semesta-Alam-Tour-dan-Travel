<?php
//memasukkan file config.php
include("config/koneksi.php");
 
//mendefinisikan folder upload
define("UPLOAD_DIR", "galeri/");
 
if (!empty($_FILES["media"])) {
	$media	= $_FILES["media"];
	$ext	= pathinfo($_FILES["media"]["name"], PATHINFO_EXTENSION);
	$size	= $_FILES["media"]["size"];
	$tgl	= date("Y-m-d");
	$ket	= $_POST['keterangan'];
 
	if ($media["error"] !== UPLOAD_ERR_OK) {
		echo '<div class="alert alert-warning">Gagal upload file.</div>';
		exit;
	}
 
	// filename yang aman
	$name = preg_replace("/[^A-Z0-9._-]/i", "_", $media["name"]);
 
	// mencegah overwrite filename
	$i = 0;
	$parts = pathinfo($name);
	while (file_exists(UPLOAD_DIR . $name)) {
		$i++;
		$name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
	}
 
	$success = move_uploaded_file($media["tmp_name"], UPLOAD_DIR . $name);
	if ($success) { 
		$in = $conn->query("INSERT INTO galeri(nama, keterangan) VALUES('$name', '$ket')");
		$q = $conn->query("SELECT id FROM galeri ORDER BY id DESC LIMIT 1");
		$rq = $q->fetch();
		echo $rq['id'];
		exit;
	}
	chmod(UPLOAD_DIR. $name, 0644);
}
?>