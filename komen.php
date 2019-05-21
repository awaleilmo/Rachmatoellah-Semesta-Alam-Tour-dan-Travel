<?php 
include"config/koneksi.php";
$nama= $_POST['nama'];
$pesan = $_POST['pesan'];
$sa= $conn->prepare("insert into pesan(nama,pesan)
values(:nama,:pesan)");
$sa->bindParam(":nama",$nama);
$sa->bindParam(":pesan",$pesan);
$sa->execute();
$hasil=$sa->rowcount();
if($hasil>0){
	echo"<script>
	window.location='index.php'</script>";
}else{
	echo'<script>windows.history.back()</script>';
}
?>