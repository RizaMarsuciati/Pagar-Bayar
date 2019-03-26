<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
	<div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Member</li>
        <li class="active">Daftar Member</li>
        <li class="active">Tambah Member</li>
      </ol>
	</div><!--/.row-->

	<center>
	  <div >
		  <h1>Tambah Member</h1>
		  <h4>Isi biodata member dengan lengkap</h4><br>
	  </div>
	</center>

<center>
  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
		<form class="form-login" action="includes/insert/input_member.php" method="POST" style="padding-left: 10%; padding-right: 10%; padding-top: 3%">
			<input type="hidden" class="form-control" id="idmember" name="idmember">
          	<div class="form-group">
              <input type="text" class="form-control" id="idmember" placeholder="Nomor Identitas" name="idmember">
          	</div>
          	<div class="form-group">
              <input type="text" class="form-control" id="namamember" placeholder="Nama Member" required="required" name="namamember">
          	</div>
          	<div class="form-group">
				      <select class="form-control" id="jenkel" name="jenkel" required="required">
	               <option value="" disabled selected>- Jenis Kelamin -</option>";
	               <option value="L">Laki-Laki</option>
	               <option value="P">Perempuan</option>
              </select>
          	</div>
            <div class="form-group">
              <input type="text" class="form-control" id="notlp" required="required" placeholder="Nomor Telepon" name="notelp">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="alamat" required="required" placeholder="Alamat Member" name="alamat">
            </div>
          	<input type="button" value="Kembali" onclick="self.history.back()" class="btn btn-secondary">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
  </div>
</center>


<?php include "template/footer.php"; ?>