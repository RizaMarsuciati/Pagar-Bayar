<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
	<div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Stok</li>
        <li class="active">Daftar Retur Barang</li>
        <li class="active">Tambah Retur Barang</li>
      </ol>
	</div><!--/.row-->

	<center>
	  <div >
	  <h1>Tambah Retur Barang</h1>
	  <h4>Isi data retur barang dengan lengkap</h4><br>
	  </div>
	</center>

<div class="row">
  <div class="col-md-8 col-md-offset-2" style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
		<form class="form-login" action="includes/insert/input_retur.php" method="POST" style="padding-left: 10%; padding-right: 10%; padding-top: 3%" enctype="multipart/form-data">
          	<div class="form-group">
              <input type="text" onchange="isi_otomatis()" class="form-control" name="kodebarang" id="kodebarang" required="required" placeholder="Kode Barang">
          	</div>
            <div class="form-group">
              <input type="text" readonly class="form-control" name="namabarang" id="namabarang"  placeholder="Nama Barang">
            </div>
          	<div class="form-group">
              <input type="text" class="form-control" name="jumlah" id="jumlah" required="required" placeholder="Jumlah Barang">
          	</div>

          	<div class="form-group">
              <input type="text" class="form-control" name="ket" id="ket" required="required" placeholder="Keterangan Retur">
          	</div>

            <div style="text-align: center;">
          	  <input type="button" value="Kembali" onclick="self.history.back()" class="btn btn-secondary ">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
  </div>
</div>

<?php include "template/footer.php"; ?>

    <!-- Ajax Kode Barang -->
 <script type="text/javascript">
     
     function isi_otomatis(){
       var kodebarang = $("#kodebarang").val();
       $.ajax({
         url:'tambahreturbarang.php',
         data:"kodebarang="+kodebarang,
       }).done(function (data){
         var json = data;
         obj = JSON.parse(json);
         $('#namabarang').val(obj.namabarang);
       });
     }
  </script>