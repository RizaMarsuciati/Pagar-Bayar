<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
  <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Barang</li>
        <li class="active">Daftar Barang</li>
        <li class="active">Edit Barang</li>
      </ol>
  </div><!--/.row-->

  <center>
    <div >
    <h1>Edit Barang</h1>
    <h4>Isi data barang dengan lengkap</h4><br>
    </div>
  </center>

<center>
  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
    <form class="form-login" action="includes/update/update_barang.php" method="POST" style="padding-left: 10%; padding-right: 10%; padding-top: 3%" enctype="multipart/form-data">
          <?php
          include ("../config/koneksi.php");
          $edit = mysqli_query($connect,"SELECT a.kodebarang, a.namabarang, a.hargabeli, a.hargajual, a.stok, a.stokutuh, a.gambar, b.kodesatuan, c.kodekategori FROM barang a JOIN satuan b ON a.kodesatuan=b.kodesatuan JOIN kategori c ON a.kodekategori=c.kodekategori WHERE a.kodebarang='$_GET[id]'");
          $data    = mysqli_fetch_array($edit);

?>
            <div> <!-- Gambar -->
              <img src='assets/img/uploads/barang/<?php echo $data['gambar'];?>' style="width: 40%; height: 40%;">
            </div>
            <div class="form-group">
              <label style="text-align: left;">Gambar Barang</label>
              <input type="file" name="gambar" id="gambar">
            </div>
<?php

          echo "

          <div class='form-group'>
          "; 
          
          echo"
          </div>

          <div class='form-group'>
              <input type='text' class='form-control' readonly id='kodebarang' placeholder='Kode Barang' name='kodebarang' value='$data[kodebarang]'>
          </div>

          <div class='form-group'>
              <input type='text' class='form-control' id='namabarang' placeholder='Nama Barang' name='namabarang' value='$data[namabarang]'>
          </div>

          <div class='form-group'>
          <select class='form-control' id='kodekategori' name='kodekategori'>";

                  $tampil=mysqli_query($connect, "SELECT * FROM kategori ORDER BY namakategori");
                  while ($kategori=mysqli_fetch_array($tampil)){
?>
                  <option value="<?=$kategori['kodekategori']?>"<?php
                    if ($kategori['kodekategori'] == $data['kodekategori']) {
                      echo ' selected="selected"';
                    }
                    ?>><?=$kategori['namakategori']?></option>
                    <?php
                  }
                  echo "
          </select>
          </div>

          <div class='form-group'>
              <input type='text' class='form-control' id='hargabeli' placeholder='Harga Beli' name='hargabeli' value='$data[hargabeli]'>
          </div>

          <div class='form-group'>
              <input type='text' class='form-control' id='hargajual' placeholder='Harga Jual' name='hargajual' value='$data[hargajual]'>
          </div>


          <div class='form-group'>
              <input type='text' class='form-control' id='stokutuh' placeholder='Stok Utuh Barang' name='stokutuh' value='$data[stokutuh]'>
          </div>

          <div class='form-group'>
              <input type='text' class='form-control' id='stok' placeholder='Stok Barang' name='stok' value='$data[stok]'>
          </div>
          
          <div class='form-group'>
          <select class='form-control' id='kodesatuan' name='kodesatuan' value=$data[kodesatuan]>";


          $tampil=mysqli_query($connect, "SELECT * FROM satuan ORDER BY namasatuan");
          while ($satuan=mysqli_fetch_array($tampil)){
?>
                  <option value="<?=$satuan['kodesatuan']?>"<?php
                    if ($satuan['kodesatuan'] == $data['kodesatuan']) {
                      echo ' selected="selected"';
                    }
                    ?>><?=$satuan['namasatuan']?></option>
                    <?php



          }
          ?>

          <?php
          echo "

              </select>
          </div>";?>

          <?php
          echo"

          <input type='button' value='Kembali' onclick='self.history.back()' class='btn btn-secondary'>
          <button type='submit' class='btn btn-primary'>Simpan</button>
          ";
        ?>

</center>


<?php include "template/footer.php"; ?>