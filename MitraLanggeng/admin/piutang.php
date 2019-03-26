<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Penjualan</li>
        <li class="active">Daftar Piutang</li>
      </ol>
    </div><!--/.row-->

<center>
  <div >
  <h1>Daftar Piutang Penjualan</h1>
  <h4>Klik detail untuk melihat detail piutang</h4><br>

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
            <a href="piutang.php"> <button type="button" class="btn btn-primary">All</button></a>
        </div>

        <div class="col-sm-6">
          <form class="navbar-form navbar-right" role="search" action="piutang.php" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" name="cari" action="piutang.php" required="required" placeholder="Nama pelanggan . . .">
            </div>
            <button type="submit" class="btn btn-primary">Cari Piutang</button>
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
          <table class='table table-striped' style='margin: 0 auto;'>
          <thead>
            <tr>
              <th scope='col'>No.</th>
              <th scope='col'>Kode Trx</th>
              <th scope='col'>Tanggal</th>
              <th scope='col'>Tanggal Jatuh Tempo</th>
              <th scope='col'>Nama Pelanggan</th>
              <th scope='col'>Jumlah Cicilan</th>
              <th scope='col'>Kurang</th>
              <th scope='col'></th>
            </tr>
          </thead>
          ";
          
              $halaman = 10;
              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
              $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total FROM vpenjualan where sisapiutang>0 AND namamember LIKE '%$cari%' ORDER BY kodepenjualan DESC"))['total'];
              $pages=ceil($total/$halaman);
              $tampil=mysqli_query($connect, "SELECT * FROM vpenjualan where sisapiutang>0 AND namamember LIKE '%$cari%' ORDER BY kodepenjualan DESC LIMIT $mulai, $halaman"); 
              $no = $mulai;

              while ($data=mysqli_fetch_array($tampil)){
              $no++;
              $jumlahcicilan=number_format($data['jumlahcicilan'],2,",",".");
              $sisapiutang=number_format($data['sisapiutang'],2,",",".");



                echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodepenjualan]</th>
              <td>$data[tglpenjualan]</td>
              <td>$data[tanggaljatuhtempo]</td>
              <td>$data[namamember]</td>
              <td>Rp.$jumlahcicilan</td>
              <td>Rp.$sisapiutang</td>
 
              <td>
                <a href='detail_piutang.php?id=$data[kodepenjualan]' class='btn btn-primary'><svg-icon>Detail</a>
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
          <table class='table table-striped' style='margin: 0 auto;'>
          <thead>
            <tr>
              <th scope='col'>No.</th>
              <th scope='col'>Kode Trx</th>
              <th scope='col'>Tanggal</th>
              <th scope='col'>Tanggal Jatuh Tempo</th>
              <th scope='col'>Nama Pelanggan</th>
              <th scope='col'>Jumlah Cicilan</th>
              <th scope='col'>Kurang</th>
              <th scope='col'></th>
            </tr>
          </thead>
          ";
          
              $halaman = 10;
              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
              $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total FROM vpenjualan where sisapiutang>0 ORDER BY kodepenjualan DESC"))['total'];
              $pages=ceil($total/$halaman);
              $tampil=mysqli_query($connect, "SELECT * FROM vpenjualan where sisapiutang>0 ORDER BY kodepenjualan DESC LIMIT $mulai, $halaman"); 
              $no = $mulai;

              while ($data=mysqli_fetch_array($tampil)){
              $no++;
              $jumlahcicilan=number_format($data['jumlahcicilan'],2,",",".");
              $sisapiutang=number_format($data['sisapiutang'],2,",",".");



                echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodepenjualan]</th>
              <td>$data[tglpenjualan]</td>
              <td>$data[tanggaljatuhtempo]</td>
              <td>$data[namamember]</td>
              <td>Rp.$jumlahcicilan</td>
              <td>Rp.$sisapiutang</td>
 
              <td>
                <a href='detail_piutang.php?id=$data[kodepenjualan]' class='btn btn-primary'><svg-icon>Detail</a>
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
