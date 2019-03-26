<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Stok</li>
        <li class="active">Daftar Barang Habis</li>
      </ol>
    </div><!--/.row-->

<center>
  <div >
  <h1>Daftar Barang Habis</h1>
  <h4>Jika stok utuh barang habis, Segera hubungi admin</h4><br>
  <?php 
    if(isset($_GET['caribarang'])){
      $caribarang = $_GET['caribarang'];
      echo "<h5><b>Hasil Pencarian : ".$caribarang."</b></h5>";
    }
  ?>
  </div>
</center>


    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
            <a href="barang_habis.php"> <button type="button" class="btn btn-primary">All</button></a>
              <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                  <?php
                  include ("../config/koneksi.php");
                  echo "  
                    <select name='kategori' id='kategori' onchange='kat()' class='form-control'>
                      <option value='0' selected type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Pilih Kategori</option>";

                  $tampil=mysqli_query($connect, "SELECT * FROM kategori ORDER BY namakategori");
                  while ($data=mysqli_fetch_array($tampil)){
                    echo "
                          <option value=$data[kodekategori]> $data[namakategori]</option>
                    ";
                  }
                  echo "
                    </select>";             
                    ?>
                </div>
              </div>
        </div>

        <div class="col-sm-6">
          <form class="navbar-form navbar-right" role="search" action="barang_habis.php" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" name="caribarang" action="barang_habis.php" method="GET" required="required" placeholder="Nama barang . . .">
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
  if(isset($_GET['caribarang'])){
    $caribarang = $_GET['caribarang'];
    echo "
          <table class='table table-striped' style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
          <thead>
            <tr>
              <th scope='col'>No.</th>
              <th scope='col'>Kode</th>
              <th scope='col'>Nama Barang</th>
              <th scope='col'>Kategori</th>
              <th scope='col'>Harga Jual</th>
              <th scope='col'>Stok Utuh</th>
              <th scope='col'>Stok Ecer</th>
              <th scope='col'></th>
              <th scope='col'></th>
            </tr>
          </thead>
          ";

          $no = 0;
              $tampil=mysqli_query($connect, "SELECT * FROM vbarang WHERE namabarang LIKE '%$caribarang%' AND stokutuh<=0 AND stok<=0"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no++;

        echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodebarang]</th>
              <td>$data[namabarang]</td>
              <td>$data[namakategori]</td>
              <td>Rp.$data[hargajual]</td>
              <td>$data[stokutuh]</td>
              <td>$data[stok]</td>
            </tr>";
              }
        echo "</table>";
    ?>

<?php
  }else 
  if(isset($_GET['kategori'])){
                $kategori = $_GET['kategori'];
    echo "
          <table class='table table-striped' style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
          <thead>
            <tr>
              <th scope='col'>No.</th>
              <th scope='col'>Kode</th>
              <th scope='col'>Nama Barang</th>
              <th scope='col'>Kategori</th>
              <th scope='col'>Harga Jual</th>
              <th scope='col'>Stok Utuh</th>
              <th scope='col'>Stok Ecer</th>
              <th scope='col'></th>
              <th scope='col'></th>
            </tr>
          </thead>
          ";
              $no = 0;
              $tampil=mysqli_query($connect, "SELECT * FROM vbarang WHERE kodekategori = '$kategori' AND stokutuh<=0 AND stok<=0"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no++;

        echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodebarang]</th>
              <td>$data[namabarang]</td>
              <td>$data[namakategori]</td>
              <td>Rp.$data[hargajual]</td>
              <td>$data[stokutuh]</td>
              <td>$data[stok]</td>
            </tr>";
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
              <th scope='col'>Kode</th>
              <th scope='col'>Nama Barang</th>
              <th scope='col'>Kategori</th>
              <th scope='col'>Harga Jual</th>
              <th scope='col'>Stok Utuh</th>
              <th scope='col'>Stok Ecer</th>
              <th scope='col'></th>
              <th scope='col'></th>
            </tr>
          </thead>
          ";

          $no = 0;
              $tampil=mysqli_query($connect, "SELECT * FROM vbarang where stokutuh<=0 AND stok<=0"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no++;

                echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodebarang]</th>
              <td>$data[namabarang]</td>
              <td>$data[namakategori]</td>
              <td>Rp.$data[hargajual]</td>
              <td>$data[stokutuh]</td>
              <td>$data[stok]</td>
            </tr>";
              }
            }
        echo "</table>";
            ?>
  </div>
</div>

<script>
  function kat(){
    var kategori = $("#kategori").val();
    window.location.search='?kategori='+kategori;
  }
</script> 

<?php include "template/footer.php"; ?>