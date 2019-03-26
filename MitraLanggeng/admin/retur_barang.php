<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Stok</li>
        <li class="active">Daftar Retur Barang</li>
      </ol>
    </div><!--/.row-->

<center>
  <div >
  <h1>Daftar Retur Barang</h1>
  <h4>Untuk menambah retur barang klik pada tombol tambah retur</h4><br>
  <?php 
        if(isset($_GET['cari'])){
          $cari = $_GET['cari'];
          echo "<h5><b>Hasil Pencarian : ".$cari."</b></h5>";
        }
      ?>
  </div>
</center>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
            <a href="retur_barang.php"> <button type="button" class="btn btn-primary">All</button></a>
            <div class="btn-group" role="group">
              <a href="tambah_retur.php"><button class="btn btn-primary">Tambah Retur</button></a>
            </div>
        </div>

        <div class="col-sm-6">
          <form class="navbar-form navbar-right" role="search" action="retur_barang.php" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" name="cari" required="required" placeholder="Nama Barang . . .">
            </div>
            <button type="submit" class="btn btn-primary">Cari Barang</button>
          </form>
        </div>
      </div>
    </div>

<div style="background-color: white; width: 100%; border-radius: 10px; padding: 2%;">
<div class="table-responsive">
  <?php 
    include ("../config/koneksi.php");
    if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
            echo "
          <table class='table table-striped' style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
          <thead>
            <tr>
              <th scope='col'>No.</th>
              <th scope='col'>Kode Retur</th>
              <th scope='col'>Kode Barang</th>
              <th scope='col'>Nama Barang</th>
              <th scope='col'>Jumlah</th>
              <th scope='col'>Tgl Ambil</th>
              <th scope='col'>Keterangan</th>
              
            </tr>
          </thead>
          ";

          $no = 1;
              $tampil=mysqli_query($connect, "SELECT * FROM vretur WHERE jmlkembali = 0 AND namabarang LIKE '%$cari%'"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no+1;
                echo "
            <tr>
              <th>$no</th>
              <th>$data[koderetur]</th>
              <td>$data[kodebarang]</td>
              <td>$data[namabarang]</td>
              <td>$data[jumlah]</td>
              <td>$data[tglambil]</td>
              <td>$data[ket]</td>
              <td>
                 <a href='includes/delete/hapus_retur.php?id=$data[koderetur]' onClick=\"return confirm('Anda yakin menghapus $data[namabarang]?')\" <button type='button' class='btn btn-hapus btn-danger btn-sm'> <span class='fa fa-trash'></span> </button></a>
              </td>
              <td>
                 <a href='includes/delete/ambil_retur.php?id=$data[koderetur]'> <button class='btn btn-success'><svg-icon>Ambil</button></a>
              </td>
              <td>
                 <a href='kembali_retur.php?id=$data[koderetur]'> <button class='btn btn-success'><svg-icon>Kembali</button></a>
              </td>
            </tr>";
                $no++;
              }
        echo "</table>";
            ?>

  <?php
}else{
  echo "
          <table class='table table-striped' style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
          <thead>
            <tr>
              <th scope='col'>No.</th>
              <th scope='col'>Kode Retur</th>
              <th scope='col'>Kode Barang</th>
              <th scope='col'>Nama Barang</th>
              <th scope='col'>Jumlah</th>
              <th scope='col'>Tgl Ambil</th>
              <th scope='col'>Keterangan</th>
            </tr>
          </thead>
          ";

          $no = 1;
              $tampil=mysqli_query($connect, "SELECT * FROM vretur WHERE jmlkembali = 0"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no+1;
                echo "
            <tr>
              <th>$no</th>
              <th>$data[koderetur]</th>
              <td>$data[kodebarang]</td>
              <td>$data[namabarang]</td>
              <td>$data[jumlah]</td>
              <td>$data[tglambil]</td>
              <td>$data[ket]</td>
              <td>
                  <a href='includes/delete/hapus_retur.php?id=$data[koderetur]' onClick=\"return confirm('Anda yakin menghapus $data[namabarang]?')\" <button type='button' class='btn btn-hapus btn-danger btn-sm'> <span class='fa fa-trash'></span> </button></a>
              </td>
              <td>";

              if (empty($data['tglambil'])) {
                  echo "<a type='button' href='includes/update/ambil_retur.php?id=$data[koderetur]' class='btn btn-success' id='ambil' onclick='klik()'><svg-icon>Ambil</a>";
              }

              echo "
              </td>
              <td>
                 <a href='kembali_retur.php?id=$data[koderetur]'><button class='btn btn-success'><svg-icon>Kembali</button></a>
              </td>
            </tr>";
                $no++;
              }
            }
        echo "</table>";
            ?>
</div>
</div>
<?php include "template/footer.php"; ?>


<script>
	function klik(){
		var x = document.getElementById("ambil");
		x.disabled = true;
	}
</script>