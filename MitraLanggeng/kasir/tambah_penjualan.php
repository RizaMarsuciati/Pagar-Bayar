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
        <li class="active">Tambah Penjualan</li>
      </ol>
    </div><!--/.row--><br>

  <div style="background-color: white; width: 100%; border-radius: 10px; padding: 2%;">
    <div class="table-responsive">
      <div class="container-fluid">
        <div class="row">

            <?php
                  include ("../config/koneksi.php");
                  $tampil=mysqli_query($connect, "SELECT kodepenjualan from penjualan ORDER BY kodepenjualan DESC LIMIT 1");
                  $data=mysqli_fetch_array($tampil);
                  $idpenjualan=$data['kodepenjualan'];
            ?> 

          <a href="includes/delete/delete_penjualan.php?id=<?=$idpenjualan;?>" class="btn btn-hapus btn-danger">
              <span class="fa fa-trash"></span> Batal Transaksi 
          </a>

          <center><h2>Proses Transaksi</h2></center>
          <?php 
              $tanggal = mktime(date('m'), date("d"), date('Y'));
              echo "Tanggal : <b> " . date("d-m-Y", $tanggal ) . "</b>";
              date_default_timezone_set("Asia/Jakarta");

              $jam = date ("H:i:s");
              echo " | Pukul : <b> " . $jam . " " ." </b> <br>";
           ?>

          <!-- Tabel Inputan Detail Transaksi -->

          <div class="col-sm-9" style="background-color: #dcdcdc; width: 100%; border-radius: 3px; padding: 2%; border: 3px outset #a9a9a9">
            <div class="col-sm-3">
              <div class="form-group">
                <form action="includes/insert/keranjang.php" method="POST" onkeydown="if(event.keyCode == 13){document.getElementById('form1').submit();}">
                <?php
                echo "
                <input type='hidden' class='form-control' id='kodepenjualan' name='kodepenjualan' value='$data[kodepenjualan]'>
                <input type='text' onchange='isi_otomatis()' class='form-control' id='kodebarang' name='kodebarang' required='required' placeholder='Kode Barang . . .' autofocus>
                ";
                ?>
              </div>
            </div>

            <div class="col-sm-2">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" min="1" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Jumlah . . ." aria-label="Input group example" aria-describedby="btnGroupAddon" value="1">
                    </div>
                  </div>
            </div>

            <div class="col-sm-5">
              <select class="namabarang form-control" id='namabarang' name='namabarang' placeholder='Nama Barang . . . '></select>
            </div>
                
              
                <!--     <input type='text' class='form-control' id='namabarang' name='namabarang' placeholder='Nama Barang . . . '>
                 -->

            <div class="col-sm-2">
              <button type="submit" class="btn btn-primary" style="">Tambah</button>
            </div>
          </form>

            <!-- Tabel Item -->
            <div class="col-sm-9" style="background-color: white; width: 100%; border-radius: 3px; ">
              <table class="table table-striped" style="font-size: 14px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th scope='col'>Harga</th>
                    <th scope='col'>Jumlah</th>
                    <th scope='col'>Total</th>
                  </tr>
                </thead>

                <?php

                include ("../config/koneksi.php");
                $no = 0;
                $total=0;
                $tampil=mysqli_query($connect, "SELECT a.kodedtpenjualan, a.kodebarang, a.namabarang, a.hargajual,a.jumlah,a.total, c.kodepenjualan FROM detailpenjualan a JOIN barang b ON a.kodebarang=b.kodebarang JOIN penjualan c ON a.kodepenjualan=c.kodepenjualan WHERE c.kodepenjualan='$idpenjualan' ORDER BY a.kodedtpenjualan DESC");
                while($data=mysqli_fetch_array($tampil)){
                  $no++;
                  $total+=$data['total'];
                  $hargajual=number_format($data['hargajual'],2,",",".");
                  $totall=number_format($data['total'],2,",",".");


                  echo "
                    <tbody>
                      <tr>
                        <td>$no</td>
                        <th scope='row'>$data[kodebarang]</th>
                        <td>$data[namabarang]</td>
                        <td>Rp.$hargajual</td>
                        <td>$data[jumlah]</td>
                        <td>Rp.$totall</td>
                        <td>
                          <a href='includes/delete/delete_keranjang.php?id=$data[kodedtpenjualan]&jumlah=$data[jumlah]&kodebarang=$data[kodebarang]' onClick=\"return confirm('Anda yakin menghapus materi $data[namabarang]?')\" <button type='button' class='btn btn-hapus btn-danger btn-sm'> <span class='fa fa-trash'></span> Hapus </button></a>
                        </td>
                      </tr>
                    </tbody>
                      ";
                    }
                      ?>
              </table>
              
                    <?php 
                      include ("../config/koneksi.php");
                      $item=mysqli_query($connect,"SELECT count(kodepenjualan) AS totalitem FROM detailpenjualan WHERE kodepenjualan='$idpenjualan'");
                      $dataitem=mysqli_fetch_array($item);
                    ?>
                  <div>
                    <h4>Total Item : <?=$dataitem['totalitem']?></h4>
                  </div>
                  <h4>Total = Rp. <?=number_format($total,2,",",".")?></h4>
            </div>
          </div><br>.

            <!-- Tabel dibawah daftar item -->
          <form action="includes/update/update_penjualan.php" method="POST">



            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <h3>Pembayaran</h3>
                    <select class="form-control" required="required" name="status" id="status">
                      <option value="" disabled selected>- Pilih Status -</option>";
                      <option value="Lunas">Lunas</option>
                      <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                  </div>
                  <h3>Masukkan</h3>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" id="kodemember" name="kodemember" required="required" placeholder="Kode Member . . .">
                    </div>
                  </div>
                </div>

                <div class="col-md-2">
                  
                </div>

                <div class="col-md-3" style="padding: 1%; border-radius: 2%; border: 2px outset #a9a9a9; margin-right: 1%;">
                  Pembayaran Belum Lunas
                  <input type="hidden" readonly class="form-control" id="sisapiutang1" name="sisapiutang1" placeholder="Sisa Piutang . . ."><br>
                  <input type='hidden' class="form-control" id='kodepenjualan' name='kodepenjualan' value=<?=$idpenjualan?>>
                  <input type="text" onkeyup="belumlunas()" class="form-control" id="uangmuka" name="uangmuka" required="required" placeholder="Uang Muka . . ."><br>
                  <input type="number" readonly class="form-control" id="piutang" name="piutang" placeholder="Piutang . . ."><br>
                    
                  <div class="form-group">
                    <select class="form-control" onchange="bunga()" id="persenbunga" name="persenbunga">
                       <option value="0" selected>- Bunga -</option>";
                       <option value="0">0 %</option>
                       <option value="1">1 %</option>
                       <option value="2">2 %</option>
                       <option value="3">3 %</option>
                       <option value="4">4 %</option>
                       <option value="5">5 %</option>
                    </select>
                  </div>
                  <input type="text" readonly class="form-control" id="bunga1" name="bunga1" placeholder="Bunga . . ."><br>
                  <input type="number" readonly class="form-control" id="sisapiutang" name="sisapiutang" placeholder="Sisa Piutang . . .">
                </div>



                <div class="col-md-3" style="padding: 1%; border-radius: 2%; border: 2px outset #a9a9a9;">
                  Pembayaran Lunas
                  <input type="hidden" class="form-control" id="total" name="total" readonly="true" value=<?=$total?>><br>
                  <input type="text" onkeyup="hitung()" class="form-control" id="uangtunai" name="uangtunai" required="required" placeholder="Bayar"><br>
                  <input type="number" readonly class="form-control" id="kembali" name="kembali" placeholder="Kembali">
                </div>

              </div>
            </div><br>
            <center>
              <button type="submit" class="btn btn-success">PROSES</button>
            </center>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php include "template/footer.php"; ?>

    <!-- Ajax Kode Barang -->
 <script type="text/javascript">

     $(document).ready(function(){
      $("#status").change(function(){
        if ($(this).val() == "Lunas"){
         $('#uangtunai').prop('readonly',false);
         $('#kodemember').prop('readonly',true);
         $('#uangmuka').prop('readonly',true);
         $('#persenbunga').prop('readonly',true);

        } else {
          $('#uangtunai').prop('readonly',true);
          $('#kodemember').prop('readonly',false);
          $('#uangmuka').prop('readonly',false);
          $('#persenbunga').prop('readonly',false);

        }
        console.log($(this));
      });
     });
     
     function isi_otomatis(){
       var kodebarang = $("#kodebarang").val();
       $.ajax({
         url:'tambahitembarang.php',
         data:"kodebarang="+kodebarang,
       }).done(function (data){
         var json = data;
         obj = JSON.parse(json);
         $('#namabarang').select2({placeholder: obj.namabarang});
         $('#jumlah').prop('max', obj.stok);
       });
     }
  </script>

  <script>
     function belumlunas(){
      var uangmuka = $("#uangmuka").val();

      
      $('#sisapiutang1').val(<?php echo $total; ?>-uangmuka);
     }
  </script>

  <script>
     function bunga(){
      var persenbunga = $("#persenbunga").val();
      var uangmuka = $("#uangmuka").val();

      $('#bunga1').val((persenbunga*<?php echo $total; ?>)/100);
      $('#sisapiutang').val(((persenbunga*<?php echo $total; ?>)/100)+(<?php echo $total; ?>-uangmuka));
      $('#piutang').val(((persenbunga*<?php echo $total; ?>)/100)+(<?php echo $total; ?>-uangmuka));
     }
  </script>

  <script>
     function hitung(){
      var uangtunai = $("#uangtunai").val();

      $('#kembali').val(uangtunai-<?php echo $total; ?>);
     }

     $('.namabarang').select2({
      placeholder:"Nama Barang . . .", 
      ajax: {
          url: 'caribarang.php',
          dataType: 'json'
        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
      }
    });

     $('.namabarang').on("select2:selecting", function(e){
      
      $('#kodebarang').val(e.params.args.data.id);
     })
  </script>
