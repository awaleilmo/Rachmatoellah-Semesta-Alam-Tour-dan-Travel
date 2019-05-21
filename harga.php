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
       <legend>Harga Paket</legend>
       <?php if($unix=="admin"){?>
       <button class="btn btn-success" style="width:15%" onclick="document.getElementById('tambah').style.display=''">Tambah</button>
       <?php }elseif ($unix=="nologin") { }?>
       <table class="table" border="1"> 
       	 <tbody>
       	 	<tr bgcolor="orange">
       	 		<th>
       	 			HARGA PROMO
       	 		</th>
            <th>
              PAKET
            </th>
       	 		<th>
       	 			HARGA
       	 		</th>
            <th colspan="2">
            FASILITAS
            </th>
       	 	</tr>
          <form action="index.php?id=harga" method="post">
          <tr id="tambah" style="display:none">
           <td valign="bottom"><input type="date" name="promo" class="form-control" required></td>
           <td>
           <h4 style="margin-top:5px">QUAD</h4><br>
           <h4 style="margin-top:5px">TRIPLE</h4><br>
           <h4 style="margin-top:5px">DOUBLE</h4>
           </td>
           <td><input type="number" name="quad" class="form-control" placeholder="QUAD" required><br>
           <input type="number" name="triple" class="form-control" placeholder="TRIPLE" required><br>
           <input type="number" name="double" class="form-control" placeholder="DOUBLE" required>
           </td>
           <td>
             <textarea name="ket" class="form-control" style="height:150px">
               
             </textarea>
           </td>
           <td valign="middle"><input type="submit" name="tambah" class="btn btn-primary" value="Simpan">|<a class="btn btn-danger" onclick="document.getElementById('tambah').style.display='none'">Batal</a></td>
          </tr>
          </form>
          <?php 
          $k=$conn->prepare("select id, promo, MONTHNAME(promo) as bulan, YEAR(promo) as tahun, quad, triple, dbl, ket from harga");
          $k->execute();
          while($tampil=$k->fetch()){
            $id=$tampil['id']; 
          ?>
          <form action="index.php?id=harga" method="post">
          <tr id="edit<?php echo $tampil['id']; ?>" style="display:none">
           <td>
           <input type="text" value="<?php echo $id; ?>" name="id" hidden>
           <input type="date" name="promo" class="form-control" required value="<?php echo $tampil['promo']; ?>"></td>
           <td>
           <h4 style="margin-top:5px">QUAD</h4><br>
           <h4 style="margin-top:5px">TRIPLE</h4><br>
           <h4 style="margin-top:5px">DOUBLE</h4>
           </td>
           <td><input type="number" name="harga" class="form-control" required value="<?php echo $tampil['harga']; ?>"></td>
           <td valign="middle"><input type="submit" name="edit" class="btn btn-primary" value="Simpan">|<a class="btn btn-danger" onclick="document.getElementById('edit<?php echo $id; ?>').style.display='none'; document.getElementById('tampil<?php echo $id; ?>').style.display=''">Batal</a></td>
          </tr>
          </form>
       	 	<tr id="tampil<?php echo $tampil['id']; ?>">
       	 		<td align="center" valign="middle"><h3><?php echo $tampil['bulan']; echo ' '; echo $tampil['tahun']; ?></h3></td>
            <td>
            <h3 >QUAD</h3><br>
           <h3 >TRIPLE</h3><br>
           <h3 >DOUBLE</h3>
           </td>
            <td align="center" valign="center">
            <h3><?php echo rupiah($tampil['quad']); ?></h3><br>
            <h3><?php echo rupiah($tampil['triple']); ?></h3><br>
            <h3><?php echo rupiah($tampil['dbl']); ?></h3></td>
            </td>
            <?php if($unix=="admin"){ ?>
       	 		<td align="left" valign="center">
            <h4>Pesawat: Garuda Indonesia/ Saudia Airlines (GA/SV)<br>
                Hotel Madinah: Royal Andalus (*3)<br>
                Hotel Mekah: AlMarsa AlJariyah(*3)</h4></td>
       	 		<td valign="middle"><a href="index.php?id=jadwal&hps=hps&pus=<?php echo $tampil['id']; ?>" class="btn btn-danger">hapus</a>|<button class="btn btn-warning" onclick="document.getElementById('edit<?php echo $id; ?>').style.display=''; document.getElementById('tampil<?php echo $id; ?>').style.display='none'">Edit</button></td>
            <?php }elseif ($unix=="nologin") {?>
              <td align="left" valign="center">
            <h4>Pesawat: Garuda Indonesia/ Saudia Airlines (GA/SV)<br>
                Hotel Madinah: Royal Andalus (*3)<br>
                Hotel Mekah: AlMarsa AlJariyah(*3)</h4></td></td>
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
  $tgl=$_POST['promo'];
  $qd=$_POST['quad'];
  $tpl=$_POST['triple'];
  $dbl=$_POST['double'];
  $ket=$_POST['ket'];
  $s=$conn->prepare("insert into harga(promo, quad, triple, dbl, ket) values(:tgl,:qd,:tpl,:dbl,:ket)");
  $s->bindParam(":tgl",$tgl);
  $s->bindParam(":qd",$qd);
   $s->bindParam(":tpl",$tpl);
    $s->bindParam(":dbl",$dbl);
  $s->bindParam(":ket",$ket);
  $s->execute();
  $hasil=$s->rowCount();
  if($hasil>0){
            echo "<script>window.alert('Data Berhasil Ditambah')
                  window.location='index.php?id=harga'</script>";
      }else{
            echo "<script>window.alert('Data Gagal Disimpan')
                 window.location='index.php?id=harga'</script>";
      }
}
if(isset($_GET['hps'])){
  $aas=$_GET['pus'];
  $sda=$conn->prepare("DELETE FROM harga where id=:tl");
  $sda->bindParam(":tl",$aas);
  $sda->execute();
  $hasila=$sda->rowCount();
  if($hasila>0){
            echo "<script>window.alert('Data Berhasil Dihapus')
                  window.location='index.php?id=harga'</script>";
      }else{
            echo "<script>window.alert('Data Gagal Dihapus')
                 window.location='index.php?id=harga'</script>";
      }
}
if(isset($_POST['edit'])){
  $tgl=$_POST['promo'];
  $pkt=$_POST['paket'];
  $jumlh=$_POST['harga'];
  $id=$_POST['id'];
  $s=$conn->prepare("update harga set promo=:tgl, paket=:pkt, harga=:jmlh where id=:id");
  $s->bindParam(":tgl",$tgl);
  $s->bindParam(":pkt",$pkt);
  $s->bindParam(":jmlh",$jumlh);
  $s->bindParam(":id",$id);
  $s->execute();
  $hasil=$s->rowCount();
  if($hasil>0){
            echo "<script>window.alert('Data Berhasil Dirubah')
                  window.location='index.php?id=harga'</script>";
      }else{
            echo "<script>window.alert('Data Gagal Dirubah')
                 window.location='index.php?id=harga'</script>";
      }
}
?>