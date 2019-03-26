<?php include "template/cari/header.php"; ?>
<br><br><br><br><br>
<!-- Grid Judul -->
<center>
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <div class="modal-dialog" role="document" style="width: 100%;" style="text-align: center;">
      <div class="modal-content">
        <div class="modal-body">
          <form  action="printpi.php" target="_blank" method="GET">
            <div >
<!--               <h2>Detail Hutang</h2>
              <h5>TB. Mitra Langgeng</h5>
              <h6>Dusun Krageman, Kradenan, Srumbung, Magelang.</h6><br> -->
              <input type="hidden" class="form-control" id="kodepenjualan" value="<?= $_GET['cekhutang'] ?>" placeholder="kodepenjualan" name="kodepenjualan">
            </div>

            <div class="table-responsive">
                  <?php
                  include ("config/koneksi.php");
                     $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, b.namamember,b.alamat,b.notelp,a.piutang, a.sisapiutang FROM penjualan a JOIN member b ON a.kodemember=b.kodemember WHERE a.kodepenjualan='$_GET[cekhutang]' ");
                     $data=mysqli_fetch_array($tampil);
                     $piutang=number_format($data['piutang'],2,",",".");
                     $sisapiutang=number_format($data['sisapiutang'],2,",",".");

                    echo "
                        <h4>$data[kodepenjualan]</h4>
                        <div class='form-group'>
                          <center>
                          <h6>$data[namamember]</h6>
                          <h6>$data[alamat]</h6>
                          <h6>$data[notelp]</h6>
                          <h6>Rp.$piutang</h6>
                          </center>
                        </div>
                    ";
                  ?>

                  <table class="table table-striped" style="margin: 0 auto;">
                    <?php
                      include ("config/koneksi.php");
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
                        $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, b.tglbayar, b.jumlahbayar FROM penjualan a JOIN pembayaranpiutang b ON a.kodepenjualan=b.kodepenjualan WHERE a.kodepenjualan='$_GET[cekhutang]'"); 
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
                              <td>Jumlah Cicilan</td>
                              <td>:</td>
                              <td>Rp.<?=number_format($jumlahcicilan,2,",",".")?></td>
                            </tr>
                          <?php

                          echo "
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
                       <a href='printpi.php?id=$data[kodepenjualan]' target='_blank'><button type='submit' class='btn btn-primary'>Cetak</button></a>"
                     ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</center>
<?php include "template/cari/footer.php";?>