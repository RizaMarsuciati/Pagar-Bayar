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
        <li class="active">Detail Hutang</li>
      </ol>
    </div><!--/.row-->

  <form  action="print_hutang.php" target="_blank" method="GET">
<center>
  <div >
    <h1>Detail Hutang Pembelian</h1>
    <h4>Klik cetak untuk mencetak nota hutang</h4><br>
     <input type="hidden" class="form-control" id="kodepembelian" value="<?= $_GET['id'] ?>" placeholder="kodepembelian" name="kodepembelian">
  </div>
</center>

<center>
<div style="background-color: white; width: 40%; border-radius: 10px; padding: 2%;">
  <div class="table-responsive">
        <?php
        include ("../config/koneksi.php");

          $totalbayar=0;
           $tampil=mysqli_query($connect, "SELECT a.kodepembelian, b.namasupplier,b.alamat,b.notelp,a.hutang,a.sisahutang,a.totalbayar,a.uangmuka,a.persendiskon FROM pembelian a JOIN supplier b ON a.kodesupplier=b.kodesupplier WHERE a.kodepembelian='$_GET[id]' ");
           $data=mysqli_fetch_array($tampil);

          $sisahutang=number_format($data['sisahutang'],2,",",".");
          $totalbayarr=$data['totalbayar']+$data['persendiskon'];
          $uangmuka=number_format($data['uangmuka'],2,",",".");
          $persendiskon=number_format($data['persendiskon'],2,",",".");
          $hutang=number_format($data['hutang'],2,",",".");

          echo "
          <h3>$data[kodepembelian]</h3>
              <div class='form-group'>
                <center>
                <h4>$data[namasupplier]</h4>
                <h4>$data[alamat]</h4>
                <h4>$data[notelp]</h4>
                </center>
              </div>
          ";
        ?>

        <table class="table table-striped" style="margin: 0 auto;">
          <?php
            include ("../config/koneksi.php");
            echo "
          <thead>
            <tr>
              <th scope='col'>No.</th>
              <th scope='col'>Tanggal</th>
              <th scope='col'>Cicilan</th>
            </tr>
          </thead>
          ";
          $no = 0;
                $jumlahcicilan=0;

              $tampil=mysqli_query($connect, "SELECT a.kodepembelian, b.tglbayar, b.jumlahbayar FROM pembelian a JOIN pembayaranhutang b ON a.kodepembelian=b.kodepembelian WHERE a.kodepembelian='$_GET[id]'"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no++;
                $jumlahcicilan+=$data['jumlahbayar'];
                $jumlahbayar=number_format($data['jumlahbayar'],2,",",".");

                echo "
            <tr>
              <th>$no</th>
              <td scope='row'>$data[tglbayar]</td>
              <td>Rp.$jumlahbayar</td>
            </tr>";
              }
        echo "</table>";
            ?><br>

          <div style="text-align: left;">
                <table>
                 <tbody>
                  <tr>
                    <td>Total Pembelian</td>
                    <td>:</td>
                    <td>Rp.<?=number_format($totalbayarr,2,",",".")?></td>
                  </tr>
                  <?php
                  echo"
                  <tr>
                    <td>Uang Muka</td>
                    <td>:</td>
                    <td>Rp.$uangmuka</td>
                  </tr>
                  <tr>
                    <td>Diskon</td>
                    <td>:</td>
                    <td>Rp.$persendiskon</td>
                  </tr>
                  <tr>
                    <td>Hutang</td>
                    <td>:</td>
                    <td>Rp.$hutang</td>
                  </tr>
                  </tbody>
                </table>
                ";
                ?>
                <?php
                echo"-----------------------------------------------<br>
                ";
                ?>
                <tr>
                    <td>Jumlah Cicilan</td>
                    <td>:</td>
                    <td>Rp.<?=number_format($jumlahcicilan,2,",",".")?></td>
                  </tr>

                <?php
                echo "
                <table>
                 <tbody>
                  <tr>
                    <td>Kurang</td>
                    <td>:</td>
                    <td>Rp.$sisahutang</td>
                  </tr>
                  </tbody>
                </table><br>
                ";
                ?>
          </div>
          <input type="button" value="Kembali" onclick="self.history.back()" class="btn btn-secondary">
          <?php echo"
             <a href='print_hutang.php?id=$data[kodepembelian]' target='_blank'><button type='submit' class='btn btn-primary'>Cetak</button></a>"
          ?>
  </div>
</div>
</center>

<?php include "template/footer.php"; ?>