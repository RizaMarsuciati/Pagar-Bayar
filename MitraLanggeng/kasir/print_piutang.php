<?php
  include '../config/koneksi.php';
    echo"
         <input type='hidden' class='form-control' id='kodepenjualan' placeholder='kodepenjualan' name='kodepenjualan'>";
  
                $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, b.namamember,b.alamat,b.notelp,a.piutang FROM penjualan a JOIN member b ON a.kodemember=b.kodemember WHERE kodepenjualan= '$_GET[kodepenjualan]' ");
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
           $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, b.namamember,b.alamat,b.notelp,a.total,a.uangmuka,a.piutang,a.persenbunga,a.sisapiutang FROM penjualan a JOIN member b ON a.kodemember=b.kodemember WHERE a.kodepenjualan='$_GET[kodepenjualan]' ");
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
              $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, b.tglbayar, b.jumlahbayar, a.total, a.sisapiutang, a.piutang, a.uangmuka, a.persenbunga FROM penjualan a JOIN pembayaranpiutang b ON a.kodepenjualan=b.kodepenjualan WHERE a.kodepenjualan='$_GET[kodepenjualan]'"); 
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
                <table>
                <tbody>
                    <tr>
                    <td>Jumlah Cicilan</td>
                    <td>:</td>
                    <td>Rp.<?=number_format($jumlahcicilan,2,",",".")?></td>
                  </tr>
                </tbody>
                </table>
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