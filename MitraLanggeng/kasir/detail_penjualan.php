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
        <li class="active">Detail Penjualan</li>
      </ol>
    </div><!--/.row-->


<form  action="print_penjualan.php" target="_blank" method="GET">
<center>
  <div >
    <h1>Detail Nota Penjualan</h1>
    <h4>Klik cetak untuk mencetak nota pembayaran piutang</h4><br>
    <input type="hidden" class="form-control" id="kodepenjualan" value="<?= $_GET['id'] ?>" placeholder="kodepenjualan" name="kodepenjualan">
  </div>
</center>

<center>
  <div style="background-color: white; width: 70%; border-radius: 10px; padding: 2%;">
      <div class="row">
        <div class="col-sm-6">
          <div style="text-align: left;">
                      <?php

                      include ("../config/koneksi.php");
                      $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, a.tglpenjualan, b.namauser, c.namamember, a.status FROM penjualan a LEFT JOIN user b ON a.kodeuser=b.kodeuser LEFT JOIN member c ON a.kodemember=c.kodemember WHERE a.kodepenjualan='$_GET[id]'");
                      $data=mysqli_fetch_array($tampil);
                      $idpenjualan=$data['kodepenjualan'];

                      echo "
                      <table>
                      <tbody>
                        <tr>
                          <td>Kode Transaksi</td>
                          <td>:</td>
                          <td>$data[kodepenjualan]</td>
                        </tr>

                        <tr>
                          <td>Tgl & Jam</td>
                          <td>:</td>
                          <td>$data[tglpenjualan]</td>
                        </tr>
                        <tr>
                          <td>Nama Kasir </td>
                          <td>:</td>
                          <td style='font-style: italic;'>$data[namauser]</td>
                        </tr>
                        <tr>
                          <td>Nama Pelanggan</td>
                          <td>:</td>
                          <td style='font-style: italic;'>$data[namamember]</td>
                        </tr>
                        <tr>
                          <td>Status </td>
                          <td>:</td>
                          <td>$data[status]</td>
                        </tr>
                        </tbody>
                    </table><br>
                      ";
                      ?>
          </div>
        </div>

        <div class="col-sm-6">
        </div>
      </div>

    <div class="table-responsive">
          <table class="table table-striped" style="margin: 0 auto;">
            <?php
              include ("../config/koneksi.php");
              echo "
            <thead>
              <tr>
                <th scope='col'>No.</th>
                <th scope='col'>Kode Barang</th>
                <th scope='col'>Nama Barang</th>
                <th scope='col'>Jumlah</th>
                <th scope='col'>Harga</th>
                <th scope='col'>Total</th>
              </tr>
            </thead>
            ";

                $no = 0;
                $total=0;
                $totalbayar=0;
                $totalakhir=0;
                $tampil=mysqli_query($connect, "SELECT  c.kodepenjualan, a.kodedtpenjualan, b.kodebarang, b.namabarang,c.persenbunga, a.jumlah, a.hargajual, a.total FROM detailpenjualan a JOIN barang b ON a.kodebarang=b.kodebarang LEFT JOIN penjualan c ON a.kodepenjualan=c.kodepenjualan WHERE a.kodepenjualan='$_GET[id]'"); 
                while ($data=mysqli_fetch_array($tampil)){
                $no++;
                $totalbayar+=$data['total'];
                $total+=$data['total'];
                $totalakhir=$total+$data['persenbunga'];
                  echo "
                
              <tr>
                <th>$no</th>
                <td>$data[kodebarang]</td>
                <td>$data[namabarang]</td>
                <td>$data[jumlah]</td>
                <td>Rp.$data[hargajual]</td>
                <td>Rp.$data[total]</td>
              </tr>";
                }
          echo "</table>";
              ?><br>

                <div  style="text-align: left;">
                  <table>
                  <tbody>
                    <tr>
                      <td>Total Pembelian</td>
                      <td>:</td>
                      <td>Rp. <?=number_format($total,2,",",".")?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <hr>

              <div class="col-sm-6">
                <div style="text-align: left;">
                        <?php
                        include ("../config/koneksi.php");
                        
                        $piutang=0;
                        $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, a.tglpenjualan, a.persenbunga, a.total, a.piutang, a.persenbunga, a.uangmuka, a.sisapiutang, b.namauser, c.namamember, a.status FROM penjualan a LEFT JOIN user b ON a.kodeuser=b.kodeuser LEFT JOIN member c ON a.kodemember=c.kodemember WHERE a.kodepenjualan='$_GET[id]'");
                        $data=mysqli_fetch_array($tampil);
                        $idpenjualan=$data['kodepenjualan'];
                        $persenbunga=number_format($data['persenbunga'],2,",",".");
                        $uangmuka=number_format($data['uangmuka'],2,",",".");
                        $sisapiutang=number_format($data['sisapiutang'],2,",",".");
                        $piutang=($data['piutang']+$data['uangmuka']);

                        echo "
                        ";
                        ?>


                        <table >
                        <tbody>

                          <?php
                          echo"
                          <tr>
                            <td>Bunga</td>
                            <td>:</td>
                            <td>Rp. $persenbunga</td>
                          </tr>";?>
                          <tr>
                            <td>Total bayar </td>
                            <td>:</td>
                            <td style='font-style: italic;'>Rp. <?=number_format($piutang,2,",",".")?></td>
                          </tr>
                          <tr><td></td><td></td><td>--------------- -</td></tr>
                          <?php
                          echo "
                          <tr>
                            <td>Uang Muka</td>
                            <td>:</td>
                            <td style='font-style: italic;'>Rp. $uangmuka</td>
                          </tr>
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
              </div>

              <div class="col-sm-6">
                <div style="text-align: left; margin-left: 30%;" >
                        <?php
                        include ("../config/koneksi.php");
                        $total=0;
                        $kembalian=0;
                        $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, a.tglpenjualan, a.persenbunga, a.total, a.piutang, a.persenbunga, a.uangmuka, a.uangtunai, a.sisapiutang, b.namauser, c.namamember, a.status FROM penjualan a LEFT JOIN user b ON a.kodeuser=b.kodeuser LEFT JOIN member c ON a.kodemember=c.kodemember WHERE a.kodepenjualan='$_GET[id]'");
                        $data=mysqli_fetch_array($tampil);
                        $idpenjualan=$data['kodepenjualan'];
                        $total+=$data['total'];
                        $uangtunai=number_format($data['uangtunai'],2,",",".");
                        $kembalian=$data['uangtunai'] <= 0 ? 0 : $data['uangtunai']-$data['total'];
                        ?>
                        <table >
                        <tbody>

                          <?php
                          echo"
                          <tr>
                            <td>Uang Tunai</td>
                            <td>:</td>
                            <td style='font-style: italic;'>Rp. $uangtunai</td>
                          </tr>
                          ";
                          ?>
                          <tr>
                            <td>Kembalian</td>
                            <td>:</td>
                            <td style='font-style: italic;'>Rp. <?=number_format($kembalian,2,",",".")?></td>
                          </tr>
                          </tbody>
                      </table><br>
                        
                </div>
              </div><br><br>
    </div>


              <div>
                <?php
                include ("../config/koneksi.php");
                $item=mysqli_query($connect,"SELECT count(kodepenjualan) AS totalitem FROM detailpenjualan WHERE kodepenjualan='$idpenjualan'");
                $dataitem=mysqli_fetch_array($item);
                ?>

                  <h4><?=$dataitem['totalitem']?> Item</h4>
                  <h4>Total : Rp. <?=number_format($totalakhir,2,",",".")?></h4>        
              </div>

            <center>
              <a href="penjualan.php"><input type="button" value="Kembali" class="btn btn-secondary"></a>

              <?php echo"
             <a href='print_penjualan.php?id=$data[kodepenjualan]' target='_blank'><button type='submit' class='btn btn-primary'>Cetak</button></a>"
          ?>
            </center>

</center>
        
<?php include "template/footer.php"; ?>