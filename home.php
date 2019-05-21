<br>
<div style="width:97%; margin-top:2%; margin-left: 20px; position:relative; background-color:#0a2c54">
  <span class="kotak">
    <b>RSA</b>
    <i>TOUR</i>
  </span>
  <div class="text-rotator">
    <label style="margin:0">Welcome Home, Rachmatoellah Semesta Alam Tour & Travel</label>
  </div>
</div>
<br>
<br>
<div id="uploadgaleri" style="display:none">
    <div class="well text-center">
      <h1>Upload file</h1>
      <hr>
      <div class="col-md-8 col-md-offset-2">
        <form class="form-inline" method="post" action="">
          <div class="input-group">
            <label class="input-group-btn">
              <span class="btn btn-danger btn-lg">
                Browse&hellip; <input type="file" id="media" name="media" style="display: none;" required>
              </span>
            </label>
            <input id="kts" type="text" class="form-control input-lg" size="40" readonly required>
          
            <label class="input-group-btn">
              <span class="btn btn-success btn-lg">
                Keterangan&hellip;
              </span>
            </label>
            <input type="text" name="keterangan" class="form-control input-lg" size="40"  required placeholder="Keterangan Foto">
          </div>
          <div class="input-group"><br>
            <input type="submit" class="btn btn-lg btn-primary" value="Start upload">
          </div>
        </form>
        <br>
        <div class="progress" style="display:none">
          <div id="progressBar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
            <span class="sr-only">0%</span>
          </div>
        </div>
        <div class="msg alert alert-info text-left" style="display:none"></div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>

  <div>
  <label class="input-group-btn" >
      <span class="btn btn-success btn-lg" style="background-color:darkorange; margin-bottom:-10px; width:60%; border-bottom-right-radius:10px;">
          Galeri&hellip; <?php if($unix=="admin"){ ?>
            <img src="images/plus.png" id="plus" style="float:right; height:32px;" class="btn" onclick="
            document.getElementById('uploadgaleri').style.display='block'; 
            document.getElementById('plus').style.display='none';
            document.getElementById('silang').style.display='block';">
             <img src="images/silang.png" id="silang" style="float:right; height:32px; display:none" class="btn" onclick="document.getElementById('uploadgaleri').style.display='none'; 
            document.getElementById('plus').style.display='block';
            document.getElementById('silang').style.display='none';">       
            <?php }elseif($unix=="nologin"){} ?>
      </span>
  </label>
  </div>
<div class="container-fluid">
 <table width="100%" border="0" align="center" class="table table-condensed table-responsive" >
  <tbody>
    <tr id="tmbl1">
     <td>
     <fieldset>
  

             
                     <?php 
                     $kan=$conn->prepare("select * from galeri");
                     $kan->execute();
                     while($tampil=$kan->fetch()){
                      $tgl=$tampil['created_at'];
                     ?>
                     <div style="float:left; margin-top: 20px;     margin-right: 5px;    margin-bottom: 5px;    margin-left: 5px; width:24%; padding: 15px; height: auto ; cursor:pointer" class="modal-content jumbotron">
                     <img src="galeri/<?php echo $tampil['nama']; ?>" style="height:150px; width:270px">
                     <hr>
                     <p><?php echo $tampil['keterangan']; ?></p>
                     </div>
                    <?php } ?>
                   

 </fieldset>
      </td>
      </tr>
  </tbody>
</table>

 </div>
  <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="js/bootstrap-3.3.4.js" type="text/javascript"></script>
  <script src="js/upload.js"></script>
<script>
  $(function() {
    $(document).on('change', ':file', function() {
    var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
    });
 
    $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {
 
        var input = $(this).parents('.input-group').find('#kts'),
          log = numFiles > 1 ? numFiles + ' files selected' : label;
 
        if( input.length ) {
          input.val(log);
        } else {
          if( log ) alert(log);
        }
 
      });
    });
    
  });
</script>