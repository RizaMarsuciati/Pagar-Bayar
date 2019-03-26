<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Pembelian</li>
        <li class="active">Daftar Hutang</li>
      </ol> 
    </div><!--/.row-->

<center>
  <div >
  <h1>Daftar Hutang Pembelian</h1>
  <h4>Klik detail untuk melihat detail hutang, klik bayar untuk pembayaran cicilan hutang</h4><br>

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
            <a href="hutang.php"> <button type="button" class="btn btn-primary">All</button></a>
        </div>

        <div class="col-sm-6">
          <form class="navbar-form navbar-right" role="search" action="hutang.php" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" id="cari" name="cari" action="hutang.php" method="GET" required="required" placeholder="Kode Pembelian . . .">
            </div>
            <button type="submit" class="btn btn-primary">Cari Hutang</button>
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
              <th scope='col'>Nama Supplier</th>
              <th scope='col'>Jumlah Cicilan</th>
              <th scope='col'>Kurang</th>
              <th scope='col'></th>
            </tr>
          </thead>
          ";
              $halaman = 10;
              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
              $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total FROM vpembelian WHERE sisahutang>0 AND kodepembelian LIKE '%$cari%' ORDER BY kodepembelian DESC"))['total'];
              $pages=ceil($total/$halaman);
              $tampil=mysqli_query($connect, "SELECT * FROM vpembelian WHERE sisahutang>0 AND kodepembelian LIKE '%$cari%' ORDER BY kodepembelian DESC LIMIT $mulai, $halaman"); 
              $no = $mulai;

              while ($data=mysqli_fetch_array($tampil)){
              $no++;
              $hutang=number_format($data['hutang'],2,",",".");
              $jumlahcicilanhutang=number_format($data['jumlahcicilanhutang'],2,",",".");
              $sisahutang=number_format($data['sisahutang'],2,",",".");
              $persendiskon=number_format($data['persendiskon'],2,",",".");


                echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodepembelian]</th>
              <td>$data[tglpembelian]</td>
              <td>$data[namasupplier]</td>
              <td>Rp.$jumlahcicilanhutang</td>
              <td>Rp.$sisahutang</td>
 
              <td>
                <a href='detail_hutang.php?id=$data[kodepembelian]' class='btn btn-primary'><svg-icon>Detail</a>
                <a href='bayar_hutang.php?id=$data[kodepembelian]' class='btn btn-success''><svg-icon>Bayar</a>
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
              <th scope='col'>Nama Supplier</th>
              <th scope='col'>Jumlah Cicilan</th>
              <th scope='col'>Kurang</th>
              <th scope='col'></th>
            </tr>
          </thead>
          ";

              $halaman = 10;
              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
              $total=mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS total FROM vpembelian WHERE sisahutang>0 ORDER BY kodepembelian DESC"))['total'];
              $pages=ceil($total/$halaman);
              $tampil=mysqli_query($connect, "SELECT * FROM vpembelian WHERE sisahutang>0 ORDER BY kodepembelian DESC LIMIT $mulai, $halaman"); 
              $no = $mulai;

              while ($data=mysqli_fetch_array($tampil)){
              $no++;
              $hutang=number_format($data['hutang'],2,",",".");
              $jumlahcicilanhutang=number_format($data['jumlahcicilanhutang'],2,",",".");
              $sisahutang=number_format($data['sisahutang'],2,",",".");
              $persendiskon=number_format($data['persendiskon'],2,",",".");


                echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodepembelian]</th>
              <td>$data[tglpembelian]</td>
              <td>$data[namasupplier]</td>
              <td>Rp.$jumlahcicilanhutang</td>
              <td>Rp.$sisahutang</td>
 
              <td>
                <a href='detail_hutang.php?id=$data[kodepembelian]' class='btn btn-primary'><svg-icon>Detail</a>
                <a href='bayar_hutang.php?id=$data[kodepembelian]' class='btn btn-success''><svg-icon>Bayar</a>
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
