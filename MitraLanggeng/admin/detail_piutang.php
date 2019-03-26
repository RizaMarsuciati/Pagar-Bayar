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
        <li class="active">Detail Piutang</li>
      </ol>
    </div><!--/.row-->

<form  action="print_piutang.php" target="_blank" method="GET">
<center>
  <div >
    <h1>Detail Piutang Penjualan</h1>
    <h4>Informasi detail piutang</h4><br>
    <input type="hidden" class="form-control" id="kodepenjualan" value="<?= $_GET['id'] ?>" placeholder="kodepenjualan" name="kodepenjualan">
  </div>
</center>

<center>
<div style="background-color: white; width: 40%; border-radius: 10px; padding: 2%;">
  <div class="table-responsive">
        <?php
        include ("../config/koneksi.php");
           $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, b.namamember,b.alamat,b.notelp,a.total,a.uangmuka,a.piutang,a.persenbunga,a.sisapiutang FROM penjualan a JOIN member b ON a.kodemember=b.kodemember WHERE a.kodepenjualan='$_GET[id]' ");
           $data=mysqli_fetch_array($tampil);

              $total=number_format($data['total'],2,",",".");
              $piutang=number_format($data['piutang'],2,",",".");
              $uangmuka=number_format($data['uangmuka'],2,",",".");
              $persenbunga=number_format($data['persenbunga'],2,",",".");
              $sisapiutang=number_format($data['sisapiutang'],2,",",".");

          echo "
          <h3>$data[kodepenjualan]</h3>
              <div class='form-group'>
                <center>
                <h4>$data[namamember]</h4>
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
              $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, b.tglbayar, b.jumlahbayar, a.total, a.sisapiutang, a.piutang, a.uangmuka, a.persenbunga FROM penjualan a JOIN pembayaranpiutang b ON a.kodepenjualan=b.kodepenjualan WHERE a.kodepenjualan='$_GET[id]'"); 
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
             <?php
                echo "
                <table>
                 <tbody>
                  <tr>
                    <td>Total Penjualan</td>
                    <td>:</td>
                    <td>Rp.$total</td>
                  </tr>
                  <tr>
                    <td>Uang Muka</td>
                    <td>:</td>
                    <td>Rp.$uangmuka</td>
                  </tr>
                  <tr>
                    <td>Bunga</td>
                    <td>:</td>
                    <td>Rp.$persenbunga</td>
                  </tr>
                  <tr>
                    <td>Piutang</td>
                    <td>:</td>
                    <td>Rp.$piutang</td>
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
                    <td>Rp.$sisapiutang</td>
                  </tr>
                  </tbody>
                </table><br>
                ";
                ?>
          </div>
          <input type="button" value="Kembali" onclick="self.history.back()" class="btn btn-secondary"> 
          <?php echo"
             <a href='print_piutang.php?id=$data[kodepenjualan]' target='_blank'><button type='submit' class='btn btn-primary'>Cetak</button></a>"
          ?>
  </div>
</div>
</center>

<?php include "template/footer.php"; ?>