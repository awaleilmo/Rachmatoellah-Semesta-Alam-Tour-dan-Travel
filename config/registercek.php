
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Badan Pendapatan Daerah Prov.Banten</title>
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="../css/bootstrap-3.3.4.css" rel="stylesheet" type="text/css">
<script src="../js/highcharts.js"></script>
<script src="../js/exporting.js"></script>
<script src="../js/export-data.js"></script>
<script src="../js/drilldown.js"></script>
<script src="../js/thema.js"></script>

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
</head>

<body>
<?php
require"koneksi.php";
if(!isset($_SESSION['adminregister'])){

    header("location:../index.php");    
}else{

}
?>
<div class="container-fluid" style="margin-top:15%">
 <table border="0" align="center" style="width:50%; background-color:lightgray " class="table" >
  <tbody>
<form method="post" action="registercek.php">
    <tr>
    <td width="49%">Username</td>
    <td width="51%"><input class="form-control" name="username" type="text" required="required" id="username"></td>
    </tr>
    <tr>
    <td>Password</td>
      <td><input class="form-control" name="password" type="password" required="required" id="password"></td>
      </tr>
      <tr>
    <td colspan="2"><button name="tmbhuser"  class="btn btn-success">Simpan</button>
    <a href="../logout.php" class="btn btn-danger">Keluar</a>
      </td>
    </tr>
    </form>
</tbody>
</table>
<?php
if(isset($_POST['tmbhuser'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $iprev = 1;
  $password_kom= password_hash($password, PASSWORD_DEFAULT);
  $masuk=$conn->prepare("INSERT INTO admin(`username`, `password`, `priviledge`)
    VALUES(
    :user1,
    :password1,
    :pase)");
  $masuk->bindParam(':user1', $username);
  $masuk->bindParam(':password1', $password_kom);
  $masuk->bindParam(':pase',$iprev);
  $masuk->execute();
  $hasil=$masuk->rowCount();
  if($hasil>0){
            echo "<script>window.alert('Data Berhasil Ditambah')
                  window.location='../logout.php'</script>";
      }else{
            echo "<script>window.alert('Data Gagal Disimpan')
                 window.location='registercek.php'</script>";
      }
   
}
?>
</div>
</body>
</html>