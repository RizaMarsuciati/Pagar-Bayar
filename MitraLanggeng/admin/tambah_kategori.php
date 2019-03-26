<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
	<div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Barang</li>
        <li class="active">Daftar Kategori</li>
        <li class="active">Tambah Kategori</li>
      </ol>
	</div><!--/.row-->

	<center>
	  <div >
	  <h1>Tambah Kategori Barang</h1>
	  <h4>Isi data kategori dengan lengkap</h4><br>
	  </div>
	</center>

<center>
  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
		<form class="form-login" action="includes/insert/input_kategori.php" method="POST">
			<div class="form-group">
              <input type="text" class="form-control" name="namakategori" id="namakategori" required="required" placeholder="Nama Kategori">
          	</div>
          	<input type="button" value="Kembali" onclick="self.history.back()" class="btn btn-secondary">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
  </div>
</center>

<?php include "template/footer.php"; ?>