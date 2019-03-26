<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
	<div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Supplier</li>
        <li class="active">Daftar Supplier</li>
        <li class="active">Tambah Supplier</li>
      </ol>
	</div><!--/.row-->

	<center>
	  <div >
	  <h1>Tambah Supplier</h1>
	  <h4>Isi data supplier dengan lengkap</h4><br>
	  </div>
	</center>

<center>
  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
		<form class="form-login" action="includes/insert/input_supplier.php" method="POST" style="padding-left: 10%; padding-right: 10%; padding-top: 3%">
			<div class="form-group">
              <input type="text" class="form-control" name="namasupplier" id="namasupplier" required="required" placeholder="Nama Supplier">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="alamat" id="alamat" required="required" placeholder="Alamat Supplier">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="notelp" id="notelp" required="required" placeholder="Telp Supplier">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="ket" id="ket" required="required" placeholder="Menyediakan">
          </div>
          <input type="button" value="Kembali" onclick="self.history.back()" class="btn btn-secondary">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
  </div>
</center>


<?php include "template/footer.php"; ?>