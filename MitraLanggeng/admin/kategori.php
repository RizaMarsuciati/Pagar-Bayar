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
      </ol>
	</div><!--/.row-->

	<center>
	  <div >
	  <h1>Daftar Kategori Barang</h1>
	  <h4>Untuk menambah kategori klik pada tombol tambah kategori</h4><br>
	  </div>
	</center>

<center>
  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%;">
    <div style="text-align: left;">
      <a href="tambah_kategori.php"><button class="btn btn-md btn-info">Tambah Kategori</button></a>
    </div>

		<form class="form-login">
			<div class="form-group">
          <table class="table table-striped">
	        <?php
            include ("../config/koneksi.php");
            echo "
              <thead>
                <tr>
                  <th scope='col'>No.</th>
                  <th scope='col'>Kode</th>
                  <th scope='col'>Nama Kategori</th>
                  <th scope='col'></th>
                </tr>
              </thead>
            ";

              $no = 1;
              $tampil=mysqli_query($connect, "SELECT * FROM kategori"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no+1;
                echo "
                  <tr>
                    <th>$no</th>
                    <th scope='row'>$data[kodekategori]</th>
                    <td>$data[namakategori]</td>
                    <td>
                      <a href='edit_kategori.php?id=$data[kodekategori]' <button class='btn btn-success'><svg-icon>Edit</button></a>
                      <a href='includes/delete/hapus_kategori.php?id=$data[kodekategori]' onClick=\"return confirm('Anda yakin menghapus $data[namakategori]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
                    </td>
                  </tr>";
                $no++;
              }
              echo "</table>";
          ?>
      </div>
          	<input type="button" value="Kembali" onclick="self.history.back()" class="btn btn-secondary">
    </form>
  </div>
</center>

<?php include "template/footer.php"; ?>