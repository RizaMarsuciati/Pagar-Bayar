<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
	<div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Stok</li>
        <li class="active">Retur Barang</li>
        <li class="active">Kembali Retur</li>
      </ol>
	</div><!--/.row-->

	<center>
	  <div >
	  <h1>Retur Kembali</h1>
	  <h4>Jika ada barang retur yang telah dikembalikan, Segera masukan dalam daftar</h4><br>
	  </div>
	</center>

<center>

  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
          <?php
          include ("../config/koneksi.php");
          $edit = mysqli_query($connect,"SELECT * FROM vretur WHERE koderetur='$_GET[id]'");
          $data    = mysqli_fetch_array($edit);
          echo "
        <form class='form-login' action='includes/update/update_retur.php' method='POST'>
          <div class='form-group'>
              <input type='text' readonly value=$data[koderetur] class='form-control' name='koderetur' id='koderetur' placeholder='Kode Retur'><br>
              <input type='hidden' readonly value=$data[kodebarang] class='form-control' name='kodebarang' id='kodebarang' placeholder='Kode Barang'><br>
              <input type='text' value='$data[jumlah]' class='form-control' name='jumlah' id='jumlah' placeholder='Jumlah Barang'>
          </div>
          <input type='button' value='Kembali' onclick='self.history.back()' class='btn btn-secondary'>
          <button type='submit' class='btn btn-primary'>Simpan</button>
        </form>";
        ?>
  </div>
</center>

<?php include "template/footer.php"; ?>