<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
	<div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Barang</li>
        <li class="active">Daftar Barang</li>
        <li class="active">Tambah Barang</li>
      </ol>
	</div><!--/.row-->

	<center>
	  <div >
	  <h1>Tambah Barang</h1>
	  <h4>Isi data barang dengan lengkap</h4><br>
	  </div>
	</center>

<div class="row">
  <div class="col-md-8 col-md-offset-2" style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
		<form class="form-login" action="includes/insert/input_barang.php" method="POST" style="padding-left: 10%; padding-right: 10%; padding-top: 3%" enctype="multipart/form-data">
          	<div class="form-group">
              <input type="text" class="form-control" name="namabarang" id="namabarang" required="required" placeholder="Nama Barang">
          	</div>
          	<div class="form-group">
	            <?php
	            include ("../config/koneksi.php");
	            echo "  
	              <select class='form-control' name='kodekategori' required='required'>
	                <option value='' disable selected>- Pilih Kategori -</option>";

	            $tampil=mysqli_query($connect, "SELECT * FROM kategori ORDER BY namakategori");
	            while ($data=mysqli_fetch_array($tampil)){
	              echo "
	                    <option value=$data[kodekategori]> $data[namakategori]</option>
	              ";
	            }
	            echo "
	              </select>";             
	              ?>
          	</div>
          	<div class="form-group">
              <input type="text" class="form-control" name="hargabeli" id="hargabeli" required="required" placeholder="Harga Beli Barang">
          	</div>
          	<div class="form-group">
              <input type="text" class="form-control" name="hargajual" id="hargajual" placeholder="Harga Jual Barang">
          	</div>
          	<div class="form-group">
            <?php
            	include ("../config/koneksi.php");
	            echo "  
	              <select class='form-control' name='kodesatuan' required='required'>
	                <option value='' disable selected>- Pilih Satuan -</option>";
	                
	            $tampil=mysqli_query($connect, "SELECT * FROM satuan ORDER BY namasatuan");
	            while ($data=mysqli_fetch_array($tampil)){
	              echo "
	                    <option value=$data[kodesatuan]> $data[namasatuan]</option>
	              ";
	            }
	            echo "
	              </select>";             
	              ?>
          	</div>
          
            <div class="form-group">
              <input type="hidden" class="form-control" name="stokutuh" id=stokutuh" placeholder="Stok Utuh">
            </div>
          	<div class="form-group">
              <input type="hidden" class="form-control" name="stok" id=stok" placeholder="Stok Ecer">
          	</div>
            <div class="form-group">
              <label style="text-align: left;">File input</label>
              <input type="file" name="gambar" id="gambar">
            </div>

            <div style="text-align: center;">
          	  <input type="button" value="Kembali" onclick="self.history.back()" class="btn btn-secondary ">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
  </div>
</div>


<?php include "template/footer.php"; ?>