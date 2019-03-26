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
      </ol>
    </div><!--/.row--><br>

  <div style="background-color: white; width: 100%; border-radius: 10px; padding: 2%;">
    <div class="table-responsive">
      <div class="container-fluid">
        <div class="row">

            <?php
                  include ("../config/koneksi.php");
                  $tampil=mysqli_query($connect, "SELECT kodepembelian from pembelian ORDER BY kodepembelian DESC LIMIT 1");
                  $data=mysqli_fetch_array($tampil);
                  $idpembelian=$data['kodepembelian'];
            ?> 

          <a href="includes/delete/hapus_pembelian.php?id=<?=$idpembelian;?>" class="btn btn-hapus btn-danger">
              <span class="fa fa-trash"></span> Batal Pembelian 
          </a>

          <center><h2>Proses Pembelian</h2></center>
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
                <input type='hidden' class='form-control' id='kodepembelian' name='kodepembelian' value='$data[kodepembelian]'>
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
                $tampil=mysqli_query($connect, "SELECT * FROM vdetailpembelian WHERE kodepembelian='$idpembelian' ORDER BY kodedtpembelian DESC");
                while($data=mysqli_fetch_array($tampil)){
                  $no++;
                  $hargabeli=number_format($data['hargabeli'],2,",",".");
                  $total+=$data['total'];
                  $totall=number_format($data['total'],2,",",".");

                  echo "
                    <tbody>
                      <tr>
                        <td>$no</td>
                        <th scope='row'>$data[kodebarang]</th>
                        <td>$data[namabarang]</td>
                        <td>Rp.$hargabeli</td>
                        <td>$data[jumlah]</td>
                        <td>Rp.$totall</td>
                        <td>
                          <a href='includes/delete/hapus_keranjang.php?id=$data[kodedtpembelian]&jumlah=$data[jumlah]&kodebarang=$data[kodebarang]' onClick=\"return confirm('Anda yakin menghapus $data[namabarang]?')\" <button type='button' class='btn btn-hapus btn-danger btn-sm'> <span class='fa fa-trash'></span> Hapus </button></a>
                        </td>
                      </tr>
                    </tbody>
                      ";
                    }
                      ?>
              </table>
              
              <div class="col-sm-4"> <!-- Form Total -->
                    <?php 
                      include ("../config/koneksi.php");
                      $item=mysqli_query($connect,"SELECT count(kodepembelian) AS totalitem FROM detailpembelian WHERE kodepembelian='$idpembelian'");
                      $dataitem=mysqli_fetch_array($item);
                    ?>
                  <div>
                    <h4>Total Item : <?=$dataitem['totalitem']?></h4>
                  </div>
                  <h4>Sub Total = Rp. <?=number_format($total,2,",",".")?></h4>
                  <form action="includes/update/update_pembelian.php" method="POST">
                    <h4>Diskon</h4>
                    <select class="form-control" onchange="diskon()" id="persendiskon" required="required" name="persendiskon">
                       <option value="" disabled selected>- Diskon -</option>";
                       <option value="0">0 %</option>
                       <option value="1">1 %</option>
                       <option value="2">2 %</option>
                       <option value="3">3 %</option>
                       <option value="4">4 %</option>
                       <option value="5">5 %</option>
                       <option value="6">6 %</option>
                       <option value="7">7 %</option>
                       <option value="8">8 %</option>
                       <option value="9">9 %</option>
                       <option value="10">10 %</option>
                    </select><br>
                    <input type="text" readonly class="form-control" id="diskon1" name="diskon1" placeholder="Diskon . . ."><br>
                    <input type="text" readonly class="form-control" id="totalbayar" name="totalbayar" placeholder="Total Bayar . . ."><br>

              </div>

            </div>
          </div><br>.

            <!-- Tabel dibawah daftar item -->




            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <h3>Pembayaran</h3>
              <select class="form-control" name="status" id="status" required="required">
                <option value="" disabled selected>- Pilih Status -</option>";
                <option value="Lunas">Lunas</option>
                <option value="Belum Lunas">Belum Lunas</option>
              </select>
                  <h3>Masukkan</h3>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" id="kodesupplier" name="kodesupplier" required="required" placeholder="Kode Supplier . . .">
                    </div>
                  </div>
                </div>

                <div class="col-md-2"> 
                </div>

                <div class="col-md-3" style="padding: 1%; border-radius: 2%; border: 2px outset #a9a9a9; margin-right: 1%;">
                  <input type='hidden' class="form-control" id='kodepembelian' name='kodepembelian' value=<?=$idpembelian?>>
                 <input type="hidden" readonly class="form-control" id="sisahutang" name="sisahutang"><br>
                  <input type="text" onkeyup="belumlunas()" class="form-control" id="uangmuka" name="uangmuka" required="required" placeholder="Uang Muka . . ."><br>
                  <input type="number" readonly class="form-control" id="hutang" name="hutang" placeholder="Hutang . . ."><br>
                
                  <input type="number" readonly class="form-control" id="hutangsesudahdiskon" name="hutangsesudahdiskon" placeholder="Hutang Sesudah Diskon . . ."><br>
                </div>

                <div class="col-md-3" style="padding: 1%; border-radius: 2%; border: 2px outset #a9a9a9;">
                 
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
         $('#kodesupplier').prop('readonly',false);
         $('#uangmuka').prop('readonly',true);
         $('#persendiskon').prop('readonly',false);

        } else {
          $('#uangtunai').prop('readonly',true);
          $('#kodesupplier').prop('readonly',false);
          $('#uangmuka').prop('readonly',false);
          $('#persendiskon').prop('readonly',false);
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
         $('#hargabeli').val(obj.hargabeli);
       });
     }
  </script>

  <script>
     function belumlunas(){
      var uangmuka = $("#uangmuka").val();
      var persendiskon = $("#persendiskon").val();

      $('#hutang').val((<?php echo $total; ?>-uangmuka)-((persendiskon*<?php echo $total; ?>)/100));
      $('#sisahutang').val((<?php echo $total; ?>-uangmuka)-((persendiskon*<?php echo $total; ?>)/100));
      $('#hutangsesudahdiskon').val((<?php echo $total; ?>-uangmuka)-((persendiskon*<?php echo $total; ?>)/100));
     }
  </script>

  <script>
     function diskon(){
      var persendiskon = $("#persendiskon").val();
      var uangmuka = $("#uangmuka").val();

      $('#diskon1').val((persendiskon*<?php echo $total; ?>)/100);
      $('#totalbayar').val(<?php echo $total; ?>-((persendiskon*<?php echo $total; ?>)/100));
      
     }
  </script>

  <script>
     function hitung(){
      var uangtunai = $("#uangtunai").val();
      var persendiskon = $("#persendiskon").val();

      $('#kembali').val(uangtunai-(<?php echo $total; ?>-((persendiskon*<?php echo $total; ?>)/100)));
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