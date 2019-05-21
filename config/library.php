<?php

function create_alert($type, $pesan, $header=null){
	$_SESSION['adm-type'] = $type;
	$_SESSION['adm-message'] = $pesan;

	if($header!==null){
		header("location:".$header);
		exit();
	}
}

function show_alert(){
	if(isset($_SESSION['adm-type'])){
		$type = ucfirst($_SESSION['adm-type']);
		unset($_SESSION['adm-type']);
		$message = $_SESSION['adm-message'];
		unset($_SESSION['adm-message']);

		return '
		<div id="warning" style="width:23%; background-color:white; position:fixed; margin-top:0%; margin-left:25%; margin-right:5%; height:auto; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px; border:1.5px solid grey; padding-bottom: 5px;">
  <div style="background-color:red; width:100%; height:35px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-bottom:1.5px solid grey"><label style=" width:60%;margin-left:43%; color:white; margin-top:1%"> '.$type.' </label></div>
  <div align="center" style="width:100%"><label> '.$message.' </label></div>
  <div align="center"><button onclick="ilang();" style="  padding: 1px 20px; background-color:white; color:red;" class="btn btn-md btn-primary">Close</button></div>
  </div>' ;
	}
}
?>