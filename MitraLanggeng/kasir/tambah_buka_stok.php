<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
	<div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Stok</li>
        <li class="active">Daftar Persediaan Barang</li>
        <li class="active">Buka Stok</li>
      </ol>
	</div><!--/.row-->

	<center>
	  <div >
		  <h1>Buka Stok Barang</h1>
		  <h4>Masukan jumlah buka stok untuk menambah stok ecer</h4><br>
	  </div>
	</center>

<center>
  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
		<form class="form-login" action="includes/update/update_stokbarang.php" method="POST" style="padding-left: 4%; padding-right: 4%; padding-top: 3%">

      <?php
          include ("../config/koneksi.php");
          $qry  = mysqli_query($connect,"SELECT * FROM barang WHERE kodebarang='$_GET[id]'");
          $data = mysqli_fetch_array($qry);

          echo"  
        <h2><b>Klik kode terlebih dahulu</b></h2>
        <div class='form-group'>
          <input type='text' value='$data[kodebarang]' readonly onclick='isi_otomatis()' class='form-control' id='kodebarang' placeholder='Kode Barang' name='kodebarang'  >
        </div>
        ";
?>
      <div class="col-md-6">
        Nama Barang
        <div class="form-group" style="">
          <input type="text" readonly="" class="form-control" id="namabarang" placeholder="Nama Barang" name="namabarang">
        </div>
        Isi Satuan 
        <div class="form-group" style="">
          <input type="text" readonly="" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah">
        </div>
        Stok Ecer
        <div class="form-group" style="">
          <input type="text" readonly="" class="form-control" id="stok" placeholder="Stok" name="stok">
        </div>
      </div>


      <div class="col-md-6">
        Nama Satuan
        <div class="form-group" style="">
          <input type="text" readonly="" class="form-control" id="namasatuan" placeholder="Nama Satuan" name="namasatuan">
        </div>
        Stok Utuh
        <div class="form-group" style="">
          <input type="text" readonly="" class="form-control" id="stokutuh" placeholder="Stok Utuh" name="stokutuh">
        </div>
        Buka Stok
        <div class="form-group" style="">
          <input type="number" class="form-control" id="bukastok" placeholder="Buka Stok" required="required" name="bukastok">
        </div>
          <div class="form-group" style="">
          <input type="hidden" class="form-control" id="hasil" placeholder="Hasil..." name="hasil">
        </div>
      </div>

        	<input type="button" value="Kembali" onclick="self.history.back()" class="btn btn-secondary">
          <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
  </div>
</center>


<?php include "template/footer.php"; ?>

 <script type="text/javascript">
     
     function isi_otomatis(){
       var kodebarang = $("#kodebarang").val();
       $.ajax({
         url:'tambahbukastok.php',
         data:"kodebarang="+kodebarang,
       }).done(function (data){ 
         var json = data;
         obj = JSON.parse(json);
         $('#namabarang').val(obj.namabarang);
         $('#namasatuan').val(obj.namasatuan);
         $('#jumlah').val(obj.jumlah);
         $('#stokutuh').val(obj.stokutuh);
         $('#bukastok').prop('max', obj.stokutuh);
       });
     } 
  </script>
