<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Penjualan</li>
        <li class="active">Daftar Penjualan</li>
      </ol>
    </div><!--/.row-->

<center>
  <div >
  <h1>Daftar Penjualan</h1>
  <h4>Untuk menambah transaksi penjualan baru klik pada tombol tambah penjualan</h4><br>

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
            <a href="penjualan.php"> <button type="button" class="btn btn-primary">All</button></a>
        </div>
        <div class="col-sm-6">

          <form class="navbar-form navbar-right" role="search" action="penjualan.php" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" name="cari" action="penjualan.php" method="GET" required="required" placeholder="Kode Penjualan . . .">
            </div>
            <button type="submit" class="btn btn-primary">Cari Penjualan</button>
          </form>

        </div>
      </div>
    </div> 
          
          <?php 
              $tanggal = mktime(date('m'), date("d"), date('Y'));
              echo "Tanggal : <b> " . date("d-m-Y", $tanggal ) . "</b>";
              date_default_timezone_set("Asia/Jakarta");

              $jam = date ("H:i:s");
              echo " | Pukul : <b> " . $jam . " " ." </b> <br>";
           ?>

<div style="background-color: white; width: 100%; border-radius: 10px; padding: 2%;">
  <div class="table-responsive">
    <div style="text-align: left;">
        <a href="includes/insert/input_penjualan.php"><button class="btn btn-md btn-info">Tambah Penjualan</button></a>
    </div>
    <?php 
    include ("../config/koneksi.php");
    if(isset($_GET['cari'])){
      $cari = $_GET['cari'];
              echo "
            <table class='table table-striped' style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
            <thead>
              <tr>
                <th scope='col'>No.</th>
                <th scope='col'>Kode</th>
                <th scope='col'>Nama Karyawan</th> 
                <th scope='col'>Status</th>
                <th scope='col'>Tanggal Transaksi</th>
              </tr>
            </thead>
            ";

              $halaman = 10;
              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
              $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total FROM vpenjualan WHERE kodepenjualan LIKE '%$cari%' ORDER BY kodepenjualan DESC"))['total'];
              $pages=ceil($total/$halaman);
              $tampil=mysqli_query($connect, "SELECT * FROM vpenjualan WHERE kodepenjualan LIKE '%$cari%' ORDER BY kodepenjualan DESC LIMIT $mulai, $halaman"); 
              $no = $mulai;

                while ($data=mysqli_fetch_array($tampil)){
                $no++;

                echo "
                      <tr>
                        <th>$no</th>
                        <th scope='row'>$data[kodepenjualan]</th>
                        <td>$data[namauser]</td>
                        <td>$data[status]</td>
                        <td>$data[tglpenjualan]</td>
                        <td>
                          <a href='detail_penjualan.php?id=$data[kodepenjualan]'> <button class='btn btn-primary'><svg-icon>Detail</button></
                        </td>
                      </tr>";
                }
          echo "</table>";
    ?>
        <div style="text-align: center;">
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <?php for ($i=1; $i<=$pages ; $i++){ ?>
              <li><a href="?cari=<?=$_GET['cari']?>&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
              <th scope='col'>Nama Karyawan</th>
              <th scope='col'>Status</th>
              <th scope='col'>Tanggal Transaksi</th>
            </tr>
          </thead>
          ";

              $halaman = 10;
              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
              $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total FROM vpenjualan ORDER BY kodepenjualan DESC"))['total'];
              $pages=ceil($total/$halaman);
              $tampil=mysqli_query($connect, "SELECT * FROM vpenjualan ORDER BY kodepenjualan DESC LIMIT $mulai, $halaman"); 
              $no = $mulai;
 
              while ($data=mysqli_fetch_array($tampil)){
              $no++;

                echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodepenjualan]</th>
              <td>$data[namauser]</td>
              <td>$data[status]</td>
              <td>$data[tglpenjualan]</td>
              <td>
                <a href='detail_penjualan.php?id=$data[kodepenjualan]'> <button class='btn btn-primary'><svg-icon>Detail</button></a>
              </td>
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

<?php include "template/footer.php"; ?>

