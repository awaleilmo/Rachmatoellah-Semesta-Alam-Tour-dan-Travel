<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="js/bootstrap-3.3.4.js" type="text/javascript"></script>
  <meta charset="utf-8">
  <title>Chat Box</title>
  <style type="text/css">
		  .chat-box {
		  font:normal normal 11px/1.4 Tahoma,Verdana,Sans-Serif;
		  color:#333;
		  width:300px; /* Chatbox width */
		  border:1px solid #344150;
		  border-bottom:none;
		  background-color:white;
		  border-top-left-radius: 6px;
		  border-top-right-radius: 6px;
		  position:fixed;
		  right:10px;
		  bottom:0;
		  z-index:9999;
		  -webkit-box-shadow:1px 1px 5px rgba(0,0,0,.2);
		  -moz-box-shadow:1px 1px 5px rgba(0,0,0,.2);
		  box-shadow:1px 1px 5px rgba(0,0,0,.2);
		}

		.chat-box > input[type="checkbox"] {
		  display:block;
		  margin:0 0;
		  padding:0 0;
		  position:absolute;
		  top:0;
		  right:0;
		  left:0;
		  width:100%;
		  height:26px;
		  z-index:4;
		  cursor:pointer;
		  opacity:0;
		  filter:alpha(opacity=0);
		}

		.chat-box > label {
		  display:block;
		  height:24px;
		  line-height:24px;
		  background-color:#344150;
		  color:white;
		  font-weight:bold;
		  padding:0 1em 1px;
		  border-top-left-radius: 5px;
		  border-top-right-radius: 5px
		}

		.chat-box > label:before {content:attr(data-collapsed)}

		.chat-box .chat-box-content {
		  /* padding:10px; */
		  display:none;
		}

		/* hover state */
		.chat-box > input[type="checkbox"]:hover + label {background-color:#404D5A}

		/* checked state */
		.chat-box > input[type="checkbox"]:checked + label {background-color:#212A35}
		.chat-box > input[type="checkbox"]:checked + label:before {content:attr(data-expanded)}
		.chat-box > input[type="checkbox"]:checked ~ .chat-box-content {display:block}
		#p1{float:left; width: 100%;font-size: 15px}
		#p1 span{background: aqua; margin-right: 15px; border-radius: 3px; padding: 2px 5px}
		#p2{float: right;width: 64%;}
		#p2 span{background: orange; margin-left:5px; border-radius: 3px; padding: 2px 5px}
  </style>
</head>
<body>
  <div class="chat-box">
    <input type="checkbox" checked="true">
    <label data-expanded="Close Chatbox" data-collapsed="Open Chatbox"></label>
    <div class="chat-box-content" style="margin:5px">
    <?php 
    	include"config/koneksi.php";
    	if(!isset($_SESSION['admin'])){
		 $unix="nologin";
		}else{
		 $unix='admin';
		}
    	$ps=$conn->prepare("select * from pesan");
    	$ps->execute();
    	while($tmpl=$ps->fetch()){?>
    	<p id="p1"><span style="text-transform:capitalize; font-weight:bold"><?php echo $tmpl['nama'];?></span><br><?php echo $tmpl['pesan'];?></p>
    	<?php } ?>
        <hr>
        <div style="margin:5px;">
        <?php if($unix=="admin"){ ?>
        <input type="text" id="nama" name="nama" placeholder="Nama" style="display:none" value="admin" >
        <input type="text" id="pesan" name="pesan" placeholder="Pesan" class="form-control">
        <?php }elseif($unix=="nologin"){?> 
        <input type="text" id="nama" name="nama" placeholder="Nama" class="form-control">
        <input type="text" id="pesan" name="pesan" placeholder="Pesan" class="form-control">
        <?php } ?>
        <br>
        <input type="submit" id="kirim" name="kirim" class="btn btn-success" value="Kirim">
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function () {
                                     

    $("#kirim").click(function(){
    var nama = $('#nama').val();
    var pesan = $('#pesan').val();
    
    
     
        $.ajax({
        type: "POST",
        url: "komen.php",
        data:"nama="+nama+"&pesan="+pesan,
        success: function(data) { 
                                $("#pesan").val("");
                                $("#tampilchat").load("chat1.php");
              
             
        },
        error: function(jqXHR, status, error) {
             
             alert("Request Anda Gagal Dikirim  ");
              
        }
    });
    
         
 
    return false; 
                 
            });
                        
            }); 
</script>     