<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
	<div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Karyawan</li>
        <li class="active">Daftar Karyawan</li>
        <li class="active">Tambah Karyawan</li>
      </ol>
	</div><!--/.row-->

	<center>
	  <div >
	  <h1>Tambah Karyawan</h1>
	  <h4>Isi data barang dengan lengkap</h4><br>
	  </div>
	</center> 

<center>
  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
		<form class="form-login" action="includes/insert/input_karyawan.php" method="POST" style="padding-left: 10%; padding-right: 10%; padding-top: 3%">  

          <div class="form-group">
              <select class="form-control" id="level" name="level" required="required">
                <option value="" disabled="" selected>- Pilih Level -</option>";
                <option value="Admin">Admin</option>
                <option value="Kasir">Kasir</option>
              </select>
          </div>

          <div class="form-group">
              <input type="text" class="form-control" id="iduser" required="required" placeholder="ID User" name="iduser">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" id="namauser" required="required" placeholder="Nama Karyawan" name="namauser">
          </div>

          <div class="form-group">
              <select class="form-control" id="jenkel" name="jenkel" required="required">
                <option value="" disabled selected>- Pilih Jenis Kelamin -</option>";
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
          </div>

          <div class="form-group">
              <input type="text" class="form-control" id="notelp" required="required" placeholder="Nomor Telepon" name="notelp">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" id="alamat" required="required" placeholder="Alamat Karyawan" name="alamat">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" id="username" required="required" placeholder="Username" name="username">
          </div>
          <div class="form-group">
              <input type="password" class="form-control" id="password" required="required" placeholder="Password" name="password">
          </div>
          <input type="button" value="Kembali" onclick="self.history.back()" class="btn btn-secondary">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
  </div>
</center>


<?php include "template/footer.php"; ?>