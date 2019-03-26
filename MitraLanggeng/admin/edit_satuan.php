<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
	<div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Barang</li>
        <li class="active">Daftar Satuan</li>
        <li class="active">Edit Satuan</li>
      </ol>
	</div><!--/.row-->

	<center>
	  <div >
	  <h1>Edit Satuan Barang</h1>
	  <h4>Isi data kategori dengan lengkap</h4><br>
	  </div>
	</center>

<center>

  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
          <?php
          include ("../config/koneksi.php");
          $edit = mysqli_query($connect,"SELECT * FROM satuan WHERE kodesatuan='$_GET[id]'");
          $data    = mysqli_fetch_array($edit);
          echo "
        <form class='form-login' action='includes/update/update_satuan.php' method='POST'>
          <div class='form-group'>
              <input type='text' readonly value=$data[kodesatuan] class='form-control' name='kodesatuan' id='kodesatuan' placeholder='Kode Satuan'><br>
              <input type='text' value='$data[namasatuan]' class='form-control' name='namasatuan' id='namasatuan' placeholder='Nama Satuan'><br>
              <input type='text' value='$data[jumlah]' class='form-control' name='jumlah' id='jumlah' placeholder='Jumlah'>
          </div>
          <input type='button' value='Kembali' onclick='self.history.back()' class='btn btn-secondary'>
          <button type='submit' class='btn btn-primary'>Simpan</button>
        </form>";
        ?>
  </div>
</center>

<?php include "template/footer.php"; ?>