<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Stok</li>
        <li class="active">Persediaan Barang</li>
      </ol>
    </div><!--/.row-->
 
<center>
  <div >
  <h1>Daftar Persediaan Barang</h1>
  <h4>Informasi persediaan barang</h4><br>


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
            <a href="persediaan_barang.php"> <button type="button" class="btn btn-primary">All</button></a>
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
          <form class="navbar-form navbar-right" role="search" action="persediaan_barang.php" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" name="caribarang" action="persediaan_barang.php" method="GET" required="required" placeholder="Nama barang . . .">
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
              <th scope='col'>Harga Beli</th>
              <th scope='col'>Harga Jual</th>
              <th scope='col'>Stok Utuh</th>
              <th scope='col'>Stok Ecer</th>
              <th scope='col'></th>
              <th scope='col'></th>
            </tr>
          </thead>
          ";

              $halaman = 10;
              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
              $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total FROM vbarang WHERE namabarang LIKE '%$caribarang%' AND stokutuh NOT IN (0) AND stok >0"))['total'];
              $pages=ceil($total/$halaman);
              $tampil=mysqli_query($connect, "SELECT * FROM vbarang WHERE namabarang LIKE '%$caribarang%' AND stokutuh NOT IN (0) AND stok >0 LIMIT $mulai, $halaman"); 
              $no = $mulai;

              while ($data=mysqli_fetch_array($tampil)){
              $no++;
              $hargabeli=number_format($data['hargabeli'],2,",",".");
              $hargajual=number_format($data['hargajual'],2,",",".");

        echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodebarang]</th>
              <td>$data[namabarang]</td>
              <td>$data[namakategori]</td>
              <td>Rp.$hargabeli</td>
              <td>Rp.$hargajual</td>
              <td>$data[stokutuh]</td>
              <td>$data[stok]</td>
            </tr>";
              }
        echo "</table>";
    ?>
        <div style="text-align: center;">
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <?php for ($i=1; $i<=$pages ; $i++){ ?>
              <li><a href="?caribarang=<?=$_GET['caribarang']?>&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php } ?>
            </ul>
          </nav>
        </div>

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
              <th scope='col'>Harga Beli</th>
              <th scope='col'>Harga Jual</th>
              <th scope='col'>Stok Utuh</th>
              <th scope='col'>Stok Ecer</th>
              <th scope='col'></th>
              <th scope='col'></th>
            </tr>
          </thead>
          ";
              $halaman = 10;
              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
              $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total FROM vbarang WHERE kodekategori = '$kategori' AND stokutuh NOT IN (0) AND stok >0"))['total'];
              $pages=ceil($total/$halaman);
              $tampil=mysqli_query($connect, "SELECT * FROM vbarang WHERE kodekategori = '$kategori' AND stokutuh NOT IN (0) AND stok >0 LIMIT $mulai, $halaman");
              $no = $mulai;

              while ($data=mysqli_fetch_array($tampil)){
              $no++;
              $hargabeli=number_format($data['hargabeli'],2,",",".");
              $hargajual=number_format($data['hargajual'],2,",",".");

        echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodebarang]</th>
              <td>$data[namabarang]</td>
              <td>$data[namakategori]</td>
              <td>Rp.$hargabeli</td>
              <td>Rp.$hargajual</td>
              <td>$data[stokutuh]</td>
              <td>$data[stok]</td>
            </tr>";
              }
        echo "</table>";
    ?>
        <div style="text-align: center;">
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <?php for ($i=1; $i<=$pages ; $i++){ ?>
              <li><a href="?kategori=<?=$_GET['kategori']?>&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php } ?>
            </ul>
          </nav>
        </div>


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
              <th scope='col'>Harga Beli</th>
              <th scope='col'>Harga Jual</th>
              <th scope='col'>Stok Utuh</th>
              <th scope='col'>Stok Ecer</th>
              <th scope='col'></th>
              <th scope='col'></th>
            </tr>
          </thead>
          ";

              $halaman = 10;
              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
              $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total FROM vbarang where stokutuh>0 OR stok>0"))['total'];
              $pages=ceil($total/$halaman);
              $tampil=mysqli_query($connect, "SELECT * FROM vbarang where stokutuh>0 OR stok>0 LIMIT $mulai, $halaman"); 
              $no = $mulai;
               
              while ($data=mysqli_fetch_array($tampil)){
              $no++;
              $hargabeli=number_format($data['hargabeli'],2,",",".");
              $hargajual=number_format($data['hargajual'],2,",",".");

                echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodebarang]</th>
              <td>$data[namabarang]</td>
              <td>$data[namakategori]</td>
              <td>Rp.$hargabeli</td>
              <td>Rp.$hargajual</td>
              <td>$data[stokutuh]</td>
              <td>$data[stok]</td>
            </tr>";
              }
            echo "</table>"; 

            ?>
              <div style="text-align: center;">
                <nav aria-label="Page navigation">
                  <ul class="pagination">
                    <?php for ($i=1; $i<=$pages ; $i++){ ?>
                    <li><a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                  </ul>
                </nav>
              </div>
    <?php
            }
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