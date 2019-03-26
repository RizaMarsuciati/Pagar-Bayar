<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div  class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
  <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Kategori</li>
      </ol>
  </div><!--/.row-->

  <center>
    <div >
    <h1>Daftar Penagihan Piutang</h1>
    <h4>Jika ada penagihan baru, Segera SMS!!!</h4><br>
    </div>
  </center>


  <center>
        <form  action="smsapi.php" method="GET">
          <div >
              <h3>Konfirmasi Pesan</h3><br>
              <input type="hidden" class="form-control" id="kodepenjualan" value="<?= $_GET['id'] ?>" placeholder="kodepenjualan" name="kodepenjualan">
          </div>
          <div>

            <?php
            include ("../config/koneksi.php");
            echo "  
              <div  style='background-color: white; width: 60%; border-radius: 10px; padding: 1%'  name='kodepenjualan'>
                
            <h4>Kepada :</h4>";
            $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, a.tglpenjualan, b.namamember, b.notelp, a.status, a.piutang, a.sisapiutang FROM penjualan a LEFT JOIN member b ON a.kodemember=b.kodemember WHERE kodepenjualan= '$_GET[id]'");
             $data=mysqli_fetch_array($tampil);
              echo "

             
              <div class='form-group'>
                    <text ><b> $data[namamember]</b></text>
                    </div>
             
              <div class='form-group'>
                    <h3> $data[notelp] </h3>

              </div>
              ";
            
            ?>
            
              </div>         
              <br>
              <div  style='background-color: white; width: 60%; border-radius: 10px; padding: 1%'  name='kodepenjualan'>
              <?php
              $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, a.tglpenjualan, b.namamember, b.notelp, a.status, a.piutang, a.sisapiutang FROM penjualan a LEFT JOIN member b ON a.kodemember=b.kodemember WHERE kodepenjualan= '$_GET[id]'");
             $data=mysqli_fetch_array($tampil);
              echo "
             
                    <textarea type='text' name='isisms' readonly='readonly' class='form-control'>Plg Yth TB.Mitra Langgeng atas nama $data[namamember], Cicilan $data[kodepenjualan] pada ";
                     $tgl = date('d M Y', strtotime($data['tglpenjualan'] )); echo $tgl; echo " sisa total tagihan Rp.$data[sisapiutang]. Abaikan jika sudah bayar.Terimakasih </textarea>
              
              </div>
              ";
           
              
              echo "
              <br>
            <input type='button' value='Batal' onclick='self.history.back()' class='btn btn-secondary'>
            <a href='smsapi.php?id=$data[kodepenjualan]'><button type='submit' class='btn btn-primary'>Konfirmasi</button></a>"


?>
            </div>
              <br>
        </form>
      </center>
    </div>
    <div class="col">
      <!-- 3 of 3 -->
    </div>
  </div>
 </div>

 <?php include "template/footer.php"; ?>