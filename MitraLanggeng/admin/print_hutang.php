<?php
	include '../config/koneksi.php';
    echo"
         <input type='hidden' class='form-control' id='kodepembelian' placeholder='kodepembelian' name='kodepembelian'>";
	
                $tampil=mysqli_query($connect, "SELECT a.kodepembelian, b.namasupplier,b.alamat,b.notelp,a.hutang FROM pembelian a JOIN supplier b ON a.kodesupplier=b.kodesupplier WHERE a.kodepembelian='$_GET[kodepembelian]' ");
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
  <h2>Detail Hutang Pembelian</h2>
  <h3>TB.Mitra Langgeng</h3>
<div style="background-color: white; width: 90%; border-radius: 10px; padding: 0%;">
  <div class="table-responsive">
        <?php
        echo"- - - - - - - - - - - - - - - - - - - - ";
        include ("../config/koneksi.php");

          $totalbayar=0;
           $tampil=mysqli_query($connect, "SELECT a.kodepembelian, b.namasupplier,b.alamat,b.notelp,a.hutang,a.sisahutang,a.totalbayar,a.uangmuka,a.persendiskon FROM pembelian a JOIN supplier b ON a.kodesupplier=b.kodesupplier WHERE a.kodepembelian='$_GET[kodepembelian]' ");
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

              $tampil=mysqli_query($connect, "SELECT a.kodepembelian, b.tglbayar, b.jumlahbayar FROM pembelian a JOIN pembayaranhutang b ON a.kodepembelian=b.kodepembelian WHERE a.kodepembelian='$_GET[kodepembelian]'"); 
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
</center>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>