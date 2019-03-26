<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
	<div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Barang</li>
        <li class="active">Daftar Satuan</li>
        <li class="active">Tambah Satuan</li>
      </ol>
	</div><!--/.row-->

	<center>
	  <div >
	  <h1>Tambah Satuan Barang</h1>
	  <h4>Isi data kategori dengan lengkap</h4><br>
	  </div>
	</center>

<center>
  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
		<form class="form-login" action="includes/insert/input_satuan.php" method="POST"">
      		<div class="form-group">
              <input type="text" class="form-control" name="namasatuan" id="namasatuan" required="required" placeholder="Nama Satuan">
              <br>
              <input type="text" class="form-control" name="jumlah" id="jumlah" required="required" placeholder="Jumlah">
          </div>
          	<input type="button" value="Kembali" onclick="self.history.back()" class="btn btn-secondary">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
  </div>
</center>

<?php include "template/footer.php"; ?>