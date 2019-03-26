<?php
  include '../config/koneksi.php';
    echo"
         <input type='hidden' class='form-control' id='kodepenjualan' placeholder='kodepenjualan' name='kodepenjualan'>";
    $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, b.tglbayar, b.jumlahbayar, a.total, a.sisapiutang, a.piutang, a.uangmuka, a.persenbunga FROM penjualan a JOIN pembayaranpiutang b ON a.kodepenjualan=b.kodepenjualan WHERE a.kodepenjualan='$_GET[kodepenjualan]'");
?>
<html>
<head>
  <title>Print Document</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >

<center><br><br>
 <img class="img-fluid mb-5 d-block mx-auto" style="width: 18%; height: 15%;" src="assets/img/logo.png" alt="">
  <h2>Detail Piutang Penjualan</h2>
  <h3>TB.Mitra Langgeng</h3>
<div style="background-color: white; width: 90%; border-radius: 10px; padding: 0%;">
  <div class="table-responsive">
        <?php
        echo"- - - - - - - - - - - - - - - - - - - - ";
        include ("../config/koneksi.php");
                      $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, a.tglpenjualan, b.namauser, c.namamember, a.status FROM penjualan a LEFT JOIN user b ON a.kodeuser=b.kodeuser LEFT JOIN member c ON a.kodemember=c.kodemember WHERE a.kodepenjualan='$_GET[kodepenjualan]'");
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
                $hasilakhir=0;
                $tampil=mysqli_query($connect, "SELECT  c.kodepenjualan, a.kodedtpenjualan, b.kodebarang, b.namabarang, a.jumlah,c.persenbunga, a.hargajual, a.total FROM detailpenjualan a JOIN barang b ON a.kodebarang=b.kodebarang LEFT JOIN penjualan c ON a.kodepenjualan=c.kodepenjualan WHERE a.kodepenjualan='$_GET[kodepenjualan]'"); 
                while ($data=mysqli_fetch_array($tampil)){
                $no++;
                $totalbayar+=$data['total'];
                $total+=$data['total'];
                $hasilakhir=$total+$data['persenbunga'];
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
                        $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, a.tglpenjualan, a.persenbunga, a.total, a.piutang, a.persenbunga, a.uangmuka, a.sisapiutang, b.namauser, c.namamember, a.status FROM penjualan a LEFT JOIN user b ON a.kodeuser=b.kodeuser LEFT JOIN member c ON a.kodemember=c.kodemember WHERE a.kodepenjualan='$_GET[kodepenjualan]'");
                        $data=mysqli_fetch_array($tampil);
                        $idpenjualan=$data['kodepenjualan'];
                        $persenbunga=number_format($data['persenbunga'],2,",",".");
                        $uangmuka=number_format($data['uangmuka'],2,",",".");
                        $sisapiutang=number_format($data['sisapiutang'],2,",",".");
                        $piutang=$data['piutang']+$data['uangmuka'];

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
                        $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, a.tglpenjualan, a.persenbunga, a.total, a.piutang, a.persenbunga, a.uangmuka, a.uangtunai, a.sisapiutang, b.namauser, c.namamember, a.status FROM penjualan a LEFT JOIN user b ON a.kodeuser=b.kodeuser LEFT JOIN member c ON a.kodemember=c.kodemember WHERE a.kodepenjualan='$_GET[kodepenjualan]'");
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
                  <h4>Total : Rp. <?=number_format($hasilakhir,2,",",".")?></h4>        
              </div>
          
  </div>
</div>
</center>
    <script>
    window.load = print_d();
    function print_d(){
      window.print();
    }
  </script>
</body>
</html>