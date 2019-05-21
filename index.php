<?php
include"config/koneksi.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bungsu</title>
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="css/bootstrap-3.3.4.css" rel="stylesheet" type="text/css">
<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>
<script src="js/export-data.js"></script>
<script src="js/drilldown.js"></script>
<script src="js/thema.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
function swipeup(){

        $('#header').slideUp(100);
   
}
</script>
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 90%;
  position: relative;
  margin: auto;
  height: 400px;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: black;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
  margin-right: -38px;
  background-color: wheat;
}
.prev {
  
  border-radius: 3px 0 0 3px;
  margin-left: -38px;
  background-color: wheat;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  opacity: 1;
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
.kotak{
    background-color: orange;
    color: #000;
    font-family: Oswald, Arial;
    font-size: 16px;
    padding-top: 8px;
    text-transform: uppercase;
    width: 54px;
    height: 54px;
    position: absolute;
    left: 0;
    bottom: -5px;
    text-align: center;
    letter-spacing: 1px;
}
.kotak i {
    display: block;
    font-family: Oswald, Arial;
    font-style: normal;
    font-size: 12px;
    line-height: 1.25em;
    letter-spacing: 0px;
    color: #FFF;
  }
  .text-rotator{

    padding: 10px 12px;
    margin-left: 54px;
    font-family: Oswald, Arial;
    font-size: 13px;
    color: #e0e0e0;
  }
</style>
<script>
function ilang(){
  document.getElementById('warning').style.display='none';
}
</script>
</head>

<body>
<img src="images/gerak.gif" style="position:absolute; max-width: 100%; width:110px; height: 110px; margin-left: 1%; margin-top: 2% ">
<img name="header" id="header" src="images/header.jpg" style="width:100%; border:0; margin:0; height:150px"/>

<?php

if(!isset($_SESSION['admin'])){
 require"nav.php";
 $unix="nologin";
}else{
 $unix='admin';
 require"navadmin.php";
}
function rupiah($angka){
	
	$hasil_rupiah = "Rp.". number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}

?>

<?php if($_GET['id'] == "home"){?>

  <div class="modal-content" style="background-color:black; padding: 8px; margin-bottom:20px">
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <img src="images/1.jpeg" style="width:80%; margin-left:10%; height:400px">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <img src="images/2.jpg" style="width:80%; margin-left:10%; height:400px">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 5</div>
  <img src="images/3.jpg" style="width:80%; margin-left:10%; height:400px">
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <img src="images/4.jpeg" style="width:80%; margin-left:10%; height:400px">
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <img src="images/5.jpg" style="width:80%; margin-left:10%; height:400px">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span> 
  <span class="dot"></span>  
</div>
</div>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>
<?php require"home.php"; ?>
<?php }elseif($_GET['id'] == "jadwal"){?>
<div id="pbbkb">
<?php require"jadwal.php"; ?>
</div>
<?php }elseif($_GET['id'] == "kuis"){ ?>
<div id="wapu">
<?php require"kuisioner.php"; ?>
</div>
<?php }elseif($_GET['id'] == "grafik"){ ?>
<div id="manajemenuser">
<?php require"grafik.php"; ?>
</div>
<?php }elseif($_GET['id'] == "harga"){ ?>
<div id="targettahunan">
<?php require"harga.php"; ?>
</div>
<?php }elseif($_GET['id'] == "tentang"){ ?>
<div id="penduduk">
<?php require"tentang.php"; ?>
</div>
<?php }elseif($_GET['id'] == "admin"){ ?>
<div id="arsip">
<?php require"admin.php"; ?>
</div>
<?php }elseif($_GET['id'] == "login"){ ?>
<div id="arsip">
<?php if($unix=="nologin"){require"login.php"; }else{ echo"<script>window.location='index.php?id=home'</script>"; }?>
</div>
<?php }elseif($_GET['id'] == 0){ ?>
<script>window.location='index.php?id=home'</script>
</div>
<?php }?>
</div>
<div id="tampilchat">
<?php include"chat.php"; ?>
</div>
<footer class="modal-footer navbar navbar-default navbar-fixed-bottom" style="background-color:lightblue; bottom:0; position:relative;">&copy; Copyright 2018</footer>
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="js/bootstrap-3.3.4.js" type="text/javascript"></script>

</body>
</html>