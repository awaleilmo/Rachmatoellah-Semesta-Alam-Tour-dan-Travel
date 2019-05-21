<?php
session_start();
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'bungsu');

$host = DB_SERVER;	
$user = DB_USERNAME;	
$pass = DB_PASSWORD;	
$name = DB_DATABASE;	

   $conn = new PDO('mysql:host='.$host.';dbname='.$name.';charset=utf8', $user, $pass);
   require_once("library.php");
   require_once("ClassLogin.php");
   $login = new login();
?>