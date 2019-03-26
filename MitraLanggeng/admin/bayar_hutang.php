<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Pembelian</li>
        <li class="active">Daftar Hutang</li>
        <li class="active">Bayar Hutang</li>
      </ol>
    </div><!--/.row-->

        <div class="modal-dialog" role="document" style="width: 30%;" style="text-align: center;">
          <div class="modal-content">
            <div class="modal-body">
                <form action="includes/insert/input_pemhutang.php" method="POST">
                  </button>
                        <?php
                        include ("../config/koneksi.php");
                           $tampil=mysqli_query($connect, "SELECT a.kodepembelian, b.namasupplier,b.alamat,b.notelp,a.hutang, a.sisahutang FROM pembelian a JOIN supplier b ON a.kodesupplier=b.kodesupplier WHERE a.kodepembelian='$_GET[id]' ");
                           $data=mysqli_fetch_array($tampil);
                           $sisahutang=number_format($data['sisahutang'],2,",",".");
                           $shutang=$data['sisahutang'];
                           $idpembelian=$data['kodepembelian'];

                          echo "
                          <h3>$data[kodepembelian]</h3>
                          <h4>Sisa Hutang Rp. $sisahutang</h4>
                          ";
                        ?>
                        <div style="text-align: center;">
                          <h3>Masukan Nominal</h3>
                          <input type='hidden' class="form-control" id='kodepembelian' name='kodepembelian' value=<?=$idpembelian?>>
                        </div>
                        <div class="form-group">
                          <input type="text" onkeyup="hitung()" class="form-control" name="jumlahbayar" id="jumlahbayar" required="required" placeholder="Jumlah Nominal">
                        </div>
                        <input type="hidden" class="form-control" name="tglbayar" id="tglbayar" placeholder="Jumlah Nominal">
                        Kurang
                        <div class="form-group">
                          <input type="text" readonly class="form-control" name="kurang" id="kurang" placeholder="Kurang . . .">
                        </div>
                        <div class="form-group">
                          Status
                          <select class="form-control" name="status" id="status" required="required">
                            <option value="" disabled selected>- Pilih Status -</option>";
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                          </select>
                        </div>
                      
                      <center>
                        <input type="button" value="Kembali" onclick="self.history.back()" class="btn btn-secondary">
                        <button type="submit" class="btn btn-primary">Bayar</button>
                      </center>
                </form>
            </div>
          </div>
        </div>
<?php include "template/footer.php"; ?>

  <script>
     function hitung(){
      var jumlahbayar = $("#jumlahbayar").val();

      $('#kurang').val(<?php echo $shutang;?>-jumlahbayar);
     }
  </script>