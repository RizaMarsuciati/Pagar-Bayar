<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
  <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Laporan</li>
        <li class="active">Tgl Penjualan</li>
        <li class="active">Daftar Laporan Penjualan</li>
      </ol>
  </div><!--/.row-->

  <center>
    <div >
    <h1>Laporan Daftar Penjualan</h1>
    <h4>Laporan penjualan pada TB Mitra Langgeng</h4><br>
    </div>
  </center>

<div style="background-color: white; width: 100%; border-radius: 10px; padding: 2%;">
  <div class="container-fluid">
    <div class="table-responsive">
      <?php 
        include ("../config/koneksi.php");
      echo "
              <table class='table table-striped' style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
              <thead>
                <tr>
                  <th scope='col'>No.</th>
                  <th scope='col'>Kode</th>
                  <th scope='col'>Tgl</th>
                  <th scope='col'>Status</th>
                  <th scope='col'>Total</th>
                  <th scope='col'>Sisa Piutang</th>

                </tr>
              </thead>
              ";


                  if (isset($_GET['tgl_awal']) AND isset($_GET['tgl_akhir']))
                  {
                     $tgl_awal=$_GET['tgl_awal'];
                     $tgl_akhir=$_GET['tgl_akhir'];
                     echo "Pencarian berdasarkan <b>tgl awal : ".$tgl_awal."</b> & <b>tgl akhir : ".$tgl_akhir."</b>";
                  }

                  $no = 1;
                  $totalpenjualan=0;
                  $totalpiutang=0;
                  $total=0;
                  $uangmasuk=0;
                  $query = "SELECT kodepenjualan, tglpenjualan, status, total, sisapiutang, persenbunga FROM penjualan WHERE tglpenjualan BETWEEN '".$tgl_awal." 00:00:00' AND '".$tgl_akhir." 23:59:00'";

                  $tampil=mysqli_query($connect, $query); 
                  while ($data=mysqli_fetch_array($tampil)){
                  $no+1;
                  $total=$data['total']+$data['persenbunga'];
                  $totalpenjualan+=$total;
                  $totalpiutang+=$data['sisapiutang'];
                  $uangmasuk=$totalpenjualan-$totalpiutang;

                  $sisapiutang=number_format($data['sisapiutang'],2,",",".");

                    echo "
                  
                <tr>
                  <th>$no</th>
                  <th scope='row'>$data[kodepenjualan]</th>
                  <td>$data[tglpenjualan]</td>
                  <td>$data[status]</td>";?>
                  <td>Rp. <?=number_format($total,2,",",".");?></td>
                  
                  <?php
                  echo "
                  <td>Rp. $sisapiutang</td>
                </tr>";
                    $no++;
                  
                }
            echo "</table>";
                ?>
    </div><br>

    <div style="text-align: left;"> <!-- bawah -->
        <?php 
          include ("../config/koneksi.php");
          $item=mysqli_query($connect,"SELECT count(kodepenjualan) AS totalitem FROM penjualan WHERE tglpenjualan BETWEEN '".$tgl_awal." 00:00:00' AND '".$tgl_akhir." 23:59:00'");
          $dataitem=mysqli_fetch_array($item);
        ?>

        <table>
         <tbody>
         <tr>
            <td>Total</td>
            <td>:</td>
            <td>  <?=$dataitem['totalitem']?> Penjualan</td>
          </tr>

          <tr>
            <td>Total Penjualan</td>
            <td>:</td>
            <td>Rp.<?= number_format($totalpenjualan,2,",",".")?></td>
          </tr>
          <tr>
            <td>Total Piutang</td>
            <td>:</td>
            <td>Rp.<?= number_format($totalpiutang,2,",",".")?></td>
          </tr>
          <tr>
            <td>Uang Masuk</td>
            <td>:</td>
            <td>Rp.<?= number_format($uangmasuk,2,",",".")?></td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>

        <div style="text-align: center;">
          <input type='button' value='Kembali' onclick='self.history.back()' class='btn btn-secondary'>
          <input type="button" value='Cetak' onclick='window.print()' class='btn btn-primary'>
          
        </div>
        
      </div>
    

<?php include "template/footer.php"; ?>