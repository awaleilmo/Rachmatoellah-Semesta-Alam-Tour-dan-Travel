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

<div class="container-fluid" style="margin-top:5%;">
 <table width="100%" border="0" align="center" class="table table-condensed table-responsive" >
  <tbody>
    <tr id="tmbl1">
     <td>
     <fieldset>
       <legend>Jadwal Keberangkatan</legend>
       <?php if($unix=="admin"){?>
       <button class="btn btn-success" style="width:15%" onclick="document.getElementById('tambah').style.display=''">Tambah</button>
       <?php }elseif ($unix=="nologin") { }?>
       <table class="table" border="1"> 
       	 <tbody>
       	 	<tr bgcolor="orange">
       	 		<th>
       	 			Tanggal Keberangkatan
       	 		</th>
       	 		<th colspan="2">
       	 			Jumlah Jamaah
       	 		</th>
       	 	</tr>
          <form action="index.php?id=jadwal" method="post">
          <tr id="tambah" style="display:none">
           <td><input type="date" name="tanggal" class="form-control" required></td>
           <td><input type="number" name="jumlah" class="form-control" required></td>
           <td valign="middle"><input type="submit" name="tambah" class="btn btn-primary" value="Simpan">|<a class="btn btn-danger" onclick="document.getElementById('tambah').style.display='none'">Batal</a></td>
          </tr>
          </form>
          <?php 
          $k=$conn->prepare("select id, DAY(tanggal) as hari, MONTHNAME(tanggal) as bulan, YEAR(tanggal) as tahun, jumlah, tanggal from jadwal");
          $k->execute();
          while($tampil=$k->fetch()){
            $id=$tampil['id']; 
          ?>
          <form action="index.php?id=jadwal" method="post">
          <tr id="edit<?php echo $tampil['id']; ?>" style="display:none">
           <td>
           <input type="text" value="<?php echo $id; ?>" name="id" hidden>
           <input type="date" name="tanggal" class="form-control" required value="<?php echo $tampil['tanggal']; ?>"></td>
           <td><input type="number" name="jumlah" class="form-control" required value="<?php echo $tampil['jumlah']; ?>"></td>
           <td valign="middle"><input type="submit" name="edit" class="btn btn-primary" value="Simpan">|<a class="btn btn-danger" onclick="document.getElementById('edit<?php echo $id; ?>').style.display='none'; document.getElementById('tampil<?php echo $id; ?>').style.display=''">Batal</a></td>
          </tr>
          </form>
       	 	<tr id="tampil<?php echo $tampil['id']; ?>">
       	 		<td align="center" valign="middle"><h3><?php echo $tampil['hari']; echo '-'; echo $tampil['bulan']; echo '-'; echo $tampil['tahun']; ?></h3></td>
            <?php if($unix=="admin"){ ?>
       	 		<td align="center" valign="center"><h3><?php echo $tampil['jumlah']; ?></h3></td>
       	 		<td valign="middle"><a href="index.php?id=jadwal&hps=hps&pus=<?php echo $tampil['id']; ?>" class="btn btn-danger">hapus</a>|<button class="btn btn-warning" onclick="document.getElementById('edit<?php echo $id; ?>').style.display=''; document.getElementById('tampil<?php echo $id; ?>').style.display='none'">Edit</button></td>
            <?php }elseif ($unix=="nologin") {?>
              <td colspan="2" align="center" valign="center"><h3><?php echo $tampil['jumlah']; ?></h3></td>
            <?php } ?>
       	 	</tr>
          <?php } ?>
       	 </tbody>
       </table>
     </fieldset>
     </td>
    </tr>
   </tbody>
  </table>
</div>
<?php 
if(isset($_POST['tambah'])){
  $tgl=$_POST['tanggal'];
  $jumlh=$_POST['jumlah'];
  $s=$conn->prepare("insert into jadwal(tanggal, jumlah) values(:tgl,:jmlh)");
  $s->bindParam(":tgl",$tgl);
  $s->bindParam(":jmlh",$jumlh);
  $s->execute();
  $hasil=$s->rowCount();
  if($hasil>0){
            echo "<script>window.alert('Data Berhasil Ditambah')
                  window.location='index.php?id=jadwal'</script>";
      }else{
            echo "<script>window.alert('Data Gagal Disimpan')
                 window.location='index.php?id=jadwal'</script>";
      }
}
if(isset($_GET['hps'])){
  $aas=$_GET['pus'];
  $sda=$conn->prepare("DELETE FROM jadwal where id=:tl");
  $sda->bindParam(":tl",$aas);
  $sda->execute();
  $hasila=$sda->rowCount();
  if($hasila>0){
            echo "<script>window.alert('Data Berhasil Dihapus')
                  window.location='index.php?id=jadwal'</script>";
      }else{
            echo "<script>window.alert('Data Gagal Dihapus')
                 window.location='index.php?id=jadwal'</script>";
      }
}
if(isset($_POST['edit'])){
  $tgl=$_POST['tanggal'];
  $jumlh=$_POST['jumlah'];
  $id=$_POST['id'];
  $s=$conn->prepare("update jadwal set tanggal=:tgl, jumlah=:jmlh where id=:id");
  $s->bindParam(":tgl",$tgl);
  $s->bindParam(":jmlh",$jumlh);
  $s->bindParam(":id",$id);
  $s->execute();
  $hasil=$s->rowCount();
  if($hasil>0){
            echo "<script>window.alert('Data Berhasil Dirubah')
                  window.location='index.php?id=jadwal'</script>";
      }else{
            echo "<script>window.alert('Data Gagal Dirubah')
                 window.location='index.php?id=jadwal'</script>";
      }
}
?>