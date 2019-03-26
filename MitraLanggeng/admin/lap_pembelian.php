<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
  <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Laporan</li>
        <li class="active">Tgl Pembelian</li>
        <li class="active">Daftar Laporan Pembelian</li>
      </ol>
  </div><!--/.row-->

  <center>
    <div >
    <h1>Laporan Daftar Pembelian</h1>
    <h4>Laporan pembelian pada TB Mitra Langgeng</h4><br>
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
                  <th scope='col'>Sisa Hutang</th>

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
                  $totalpembelian=0;
                  $totalhutang=0;
                  $total=0;
                  $uangmasuk=0;
                  $query = "SELECT kodepembelian, tglpembelian, status, totalbayar, sisahutang, persendiskon FROM pembelian WHERE tglpembelian BETWEEN '".$tgl_awal." 00:00:00' AND '".$tgl_akhir." 23:59:00'";

                  $tampil=mysqli_query($connect, $query); 
                  while ($data=mysqli_fetch_array($tampil)){
                  $no+1;
                  $total=$data['totalbayar']+$data['persendiskon'];
                  $totalpembelian+=$total;
                  $totalhutang+=$data['sisahutang'];
                  $uangmasuk=$totalpembelian-$totalhutang;

                  $sisahutang=number_format($data['sisahutang'],2,",",".");

                    echo "
                  
                <tr>
                  <th>$no</th>
                  <th scope='row'>$data[kodepembelian]</th>
                  <td>$data[tglpembelian]</td>
                  <td>$data[status]</td>";?>
                  <td>Rp. <?=number_format($total,2,",",".");?></td>
                  
                  <?php
                  echo "
                  <td>Rp. $sisahutang</td>
                </tr>";
                    $no++;
                  
                }
            echo "</table>";
                ?>
    </div><br>

    <div style="text-align: left;"> <!-- bawah -->
        <?php 
          include ("../config/koneksi.php");
          $item=mysqli_query($connect,"SELECT count(kodepembelian) AS totalitem FROM pembelian WHERE tglpembelian BETWEEN '".$tgl_awal." 00:00:00' AND '".$tgl_akhir." 23:59:00'");
          $dataitem=mysqli_fetch_array($item);
        ?>

        <table>
         <tbody>
         <tr>
            <td>Total</td>
            <td>:</td>
            <td>  <?=$dataitem['totalitem']?> Pembelian</td>
          </tr>

          <tr>
            <td>Total Pembelian</td>
            <td>:</td>
            <td>Rp.<?= number_format($totalpembelian,2,",",".")?></td>
          </tr>
          <tr>
            <td>Total Hutang</td>
            <td>:</td>
            <td>Rp.<?= number_format($totalhutang,2,",",".")?></td>
          </tr>
          <tr>
            <td>Uang Keluar</td>
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