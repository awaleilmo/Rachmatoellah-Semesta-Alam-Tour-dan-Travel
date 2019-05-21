<?php

 if(!isset($_SESSION['admin'])) {
 }
else { 
$email1 = $_SESSION['admin'];
 }

require_once("config/koneksi.php");
;


session_destroy();

echo"<script language='javascript'>document.location='index.php'</script>";

?>