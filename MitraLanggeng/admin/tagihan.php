<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
  <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Tagihan</li>
        <li class="active">Daftar Tagihan</li>
      </ol>
  </div><!--/.row-->

  <center>
    <div >
    <h1>Daftar Penagihan Piuang</h1>
    <h4>Klik tombol SMS untuk mengirimkan reminder</h4><br>
    </div>
  </center>

<center>
<div style="background-color: white; width: 100%; border-radius: 10px; padding: 2%;">
  <div class="table-responsive">
    <form class="form-login">
      <div class="form-group">
          <table class="table table-striped">
          <?php
            include ("../config/koneksi.php");
            echo "
              <thead>
                <tr>
                  <th scope='col'>No.</th>
                  <th scope='col'>Kode</th>
                  <th scope='col'>Tanggal</th>
                  <th scope='col'>Tanggal Jatuh Tempo</th>
                  <th scope='col'>Nama Member</th>
                  <th scope='col'>No Tlp.</th>
                  <th scope='col'>Status</th>
                  <th scope='col'>Piutang</th>
                  <th scope='col'>Sisa Piutang</th>
                  <th scope='col'></th>
                </tr>
              </thead>
            ";

              $no = 1;
              $tampil=mysqli_query($connect, "SELECT * FROM vpenjualan WHERE sisapiutang>0 AND tgltagihan=date_sub(CURRENT_DATE, INTERVAL 1 month)"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no+1;
              $piutang=number_format($data['piutang'],2,",",".");
              $sisapiutang=number_format($data['sisapiutang'],2,",",".");
                echo "
                  <tr>
                    <th>$no</th>
                    <th scope='row'>$data[kodepenjualan]</th>
                    <td>$data[tglpenjualan]</td>
                    <td>$data[tanggaljatuhtempo]</td>
                    <td>$data[namamember]</td>
                    <td>$data[notelp]</td>
                    <td>$data[status]</td>
                    <td>Rp. $piutang</td>
                    <td>Rp. $sisapiutang</td>
                    <td>
                      <div class='col'>
                      <a href='sms.php?id=$data[kodepenjualan]' id='sms' button class='btn btn-success'>SMS</button></a>
                      </div>
                    </td>

                  </tr>";
                $no++;
              }
              echo "</table>";
          ?>
      </div>
    </form>
  </div>
</div>
</center>

<?php include "template/footer.php"; ?>