<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Pembelian</li>
        <li class="active">Daftar Pembelian</li>
        <li class="active">Tambah Pembelian</li>
        <li class="active">Detail Pembelian</li>
      </ol>
    </div><!--/.row-->



<form action="print_pembelian.php" target="_blank" method="GET">
<center>
  <div>
    <h1>Detail Nota Pembelian</h1>
    <h4>Klik cetak untuk mencetak nota pembelian</h4><br>
    <input type="hidden" class="form_control" id="kodepembelian" value="<?=$_GET['id']?>" placeholder="Kode Pembelian" name="kodepembelian">
  </div>
</center>

<center>
  <div style="background-color: white; width: 70%; border-radius: 10px; padding: 2%;">
      <div class="row">
        <div class="col-sm-6">
          <div style="text-align: left;">
                      <?php

                      include ("../config/koneksi.php");
                      $tampil=mysqli_query($connect, "SELECT a.kodepembelian, a.tglpembelian, b.namauser, c.namasupplier, a.status FROM pembelian a LEFT JOIN user b ON a.kodeuser=b.kodeuser LEFT JOIN supplier c ON a.kodesupplier=c.kodesupplier ORDER BY a.kodepembelian DESC LIMIT 1");
                      $data=mysqli_fetch_array($tampil);
                      $idpenjualan=$data['kodepembelian'];

                      echo "
                      <table>
                      <tbody>
                        <tr>
                          <td>Kode Transaksi</td>
                          <td>:</td>
                          <td>$data[kodepembelian]</td>
                        </tr>

                        <tr>
                          <td>Tgl & Jam</td>
                          <td>:</td>
                          <td>$data[tglpembelian]</td>
                        </tr>
                        <tr>
                          <td>Nama Kasir </td>
                          <td>:</td>
                          <td style='font-style: italic;'>$data[namauser]</td>
                        </tr>
                        <tr>
                          <td>Nama Supplier</td>
                          <td>:</td>
                          <td style='font-style: italic;'>$data[namasupplier]</td>
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
                $bayar=0;
                $totalbayar=0;
                $totalakhir=0;
                $tampil=mysqli_query($connect, "SELECT c.kodepembelian, a.kodedtpembelian, c.persendiskon, b.kodebarang, b.namabarang, a.jumlah, b.hargabeli, (a.jumlah*b.hargabeli) AS total FROM detailpembelian a JOIN barang b ON a.kodebarang=b.kodebarang LEFT JOIN pembelian c ON a.kodepembelian=c.kodepembelian WHERE a.kodepembelian='$_GET[id]'"); 
                while ($data=mysqli_fetch_array($tampil)){
                $no++;
                $persendiskon=number_format($data['persendiskon'],2,",",".");
                $totalbayar+=$data['total'];
                $total+=$data['total'];
                $bayar=$totalbayar-$data['persendiskon'];
                $totalakhir=$totalbayar-$data['persendiskon'];
                  echo "
              <tr>
                <th>$no</th>
                <td>$data[kodebarang]</td>
                <td>$data[namabarang]</td>
                <td>$data[jumlah]</td>
                <td>Rp.$data[hargabeli]</td>
                <td>Rp.$data[total]</td>
              </tr>";
                }
          echo "</table>";
              ?><br>

                <div  style="text-align: left;">
                  <table>
                  <tbody>

                    <?php
                    echo "
                    <tr>
                      <td>Diskon</td>
                      <td>:</td>
                      <td>Rp. $persendiskon</td>
                    </tr>";?>
                    <tr>
                      <td>Total Pembelian</td>
                      <td>:</td>
                      <td>Rp. <?=number_format($totalakhir,2,",",".")?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <hr>

              <div class="col-sm-6">
                <div style="text-align: left;">
                        <?php
                        include ("../config/koneksi.php");
                        
                        $totalbayar=0;
                        $tampil=mysqli_query($connect, "SELECT a.kodepembelian, a.tglpembelian, a.persendiskon, a.totalbayar, a.hutang,  a.uangmuka, a.sisahutang, b.namauser, c.namasupplier, a.status FROM pembelian a LEFT JOIN user b ON a.kodeuser=b.kodeuser LEFT JOIN supplier c ON a.kodesupplier=c.kodesupplier ORDER BY a.kodepembelian DESC LIMIT 1");
                        $data=mysqli_fetch_array($tampil);
                        $idpembelian=$data['kodepembelian'];
                        $uangmuka=number_format($data['uangmuka'],2,",",".");
                        $sisahutang=number_format($data['sisahutang'],2,",",".");
                        $hutang=number_format($data['hutang'],2,",",".");
                        

                        echo "
                        ";
                        ?>


                        <table>
                        <tbody>
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
                            <td>Rp.$sisahutang</td>
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
                        $tampil=mysqli_query($connect, "SELECT a.kodepembelian, a.tglpembelian, a.persendiskon, a.totalbayar, a.hutang,  a.uangmuka, a.uangtunai, a.sisahutang, b.namauser, c.namasupplier, a.status FROM pembelian a LEFT JOIN user b ON a.kodeuser=b.kodeuser LEFT JOIN supplier c ON a.kodesupplier=c.kodesupplier ORDER BY a.kodepembelian DESC LIMIT 1");
                        $data=mysqli_fetch_array($tampil);
                        $idpembelian=$data['kodepembelian'];
                        $total+=$data['totalbayar'];
                        $uangtunai=number_format($data['uangtunai'],2,",",".");
                        $kembalian=$data['uangtunai'] <= 0 ? 0 : $data['uangtunai']-$data['totalbayar'];

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
                $item=mysqli_query($connect,"SELECT count(kodepembelian) AS totalitem FROM detailpembelian WHERE kodepembelian='$idpembelian'");
                $dataitem=mysqli_fetch_array($item);
                ?>

                  <h4><?=$dataitem['totalitem']?> Item</h4>
                  <h4>Total : Rp. <?=number_format($bayar,2,",",".")?></h4>        
              </div>

            <center>
              <a href="pembelian.php"><input type="button" value="Kembali" class="btn btn-secondary"></a>
              <?php echo"
                <a href='print_pembelian.php?id=$data[kodepembelian]' target='_blank'><button type='submit' class='btn btn-primary'>Cetak</button></a>"
              ?>
            </center>

</center>
</form>
        
<?php include "template/footer.php"; ?>