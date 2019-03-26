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
      </ol>
	</div><!--/.row-->

	<center>
	  <div >
	  <h1>Daftar Satuan Barang</h1>
	  <h4>Untuk menambah satuan klik pada tombol tambah satuan</h4><br>
	  </div>
	</center>

<center>
  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
    <div style="text-align: left;">
      <a href="tambah_satuan.php"><button class="btn btn-md btn-info">Tambah Satuan</button></a>
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
                  <th scope='col'>Nama Satuan</th>
                  <th scope='col'></th>
                </tr>
              </thead>
            ";

              $no = 1;
              $tampil=mysqli_query($connect, "SELECT * FROM satuan"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no+1;
                echo "
                  <tr>
                    <th>$no</th>
                    <th scope='row'>$data[kodesatuan]</th>
                    <td>$data[namasatuan]</td>
                    <td>
                      <a href='edit_satuan.php?id=$data[kodesatuan]' <button class='btn btn-success'><svg-icon>Edit</button></a>
                      <a href='includes/delete/hapus_satuan.php?id=$data[kodesatuan]' onClick=\"return confirm('Anda yakin menghapus $data[namasatuan]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
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