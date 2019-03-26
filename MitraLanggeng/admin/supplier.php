<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Supplier</li>
        <li class="active">Daftar Supplier</li>
      </ol>
    </div><!--/.row-->

<center>
  <div >
  <h1>Daftar Supplier</h1>
  <h4>Klik edit untuk mengubah data supplier</h4><br>
  <?php 
        if(isset($_GET['carisupplier'])){
          $carisupplier = $_GET['carisupplier'];
          echo "<h5><b>Hasil Pencarian : ".$carisupplier."</b></h5>";
        }
      ?>
  </div>
</center>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
            <a href="supplier.php"> <button type="button" class="btn btn-primary">All</button></a>
            <div class="btn-group" role="group">
              <a href="tambah_supplier.php"><button class="btn btn-primary">Tambah Supplier</button></a>
            </div>
        </div>

        <div class="col-sm-6">
          <form class="navbar-form navbar-right" role="search" action="supplier.php" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" name="carisupplier" required="required" placeholder="Nama supplier . . .">
            </div>
            <button type="submit" class="btn btn-primary">Cari Supplier</button>
          </form>
        </div>
      </div>
    </div>

<div style="background-color: white; width: 100%; border-radius: 10px; padding: 2%;">
<div class="table-responsive">
  <?php 
    include ("../config/koneksi.php");
    if(isset($_GET['carisupplier'])){
    $carisupplier = $_GET['carisupplier'];
            echo "
          <table class='table table-striped' style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
          <thead>
            <tr>
              <th scope='col'>No.</th>
              <th scope='col'>Kode</th>
              <th scope='col'>Nama Supplier</th>
              <th scope='col'>Alamat</th>
              <th scope='col'>No Telp</th>
              <th scope='col'>Menyediakan</th>
              <th scope='col'>Aksi</th>
            </tr>
          </thead>
          ";

          $no = 1;
              $tampil=mysqli_query($connect, "SELECT * FROM Supplier WHERE namasupplier LIKE '%$carisupplier%'"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no+1;
                echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodesupplier]</th>
              <td>$data[namasupplier]</td>
              <td>$data[alamat]</td>
              <td>$data[notelp]</td>
              <td>$data[ket]</td>
              <td>
                 <a href='edit_supplier.php?id=$data[kodesupplier]'> <button class='btn btn-success'><svg-icon>Edit</button></a>
                 <a href='includes/delete/hapus_supplier.php?id=$data[kodesupplier]' onClick=\"return confirm('Anda yakin menghapus $data[namasupplier]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
                    </td>
                  </tr>";
                $no++;
              }
        echo "</table>";
            ?>

  <?php
}else{
  echo "
          <table class='table table-striped' style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
          <thead>
            <tr>
              <th scope='col'>No.</th>
              <th scope='col'>Kode</th>
              <th scope='col'>Nama Supplier</th>
              <th scope='col'>Alamat</th>
              <th scope='col'>No Telp</th>
              <th scope='col'>Menyediakan</th>
              <th scope='col'>Aksi</th>
            </tr>
          </thead>
          ";

          $no = 1;
              $tampil=mysqli_query($connect, "SELECT * FROM Supplier"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no+1;
                echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodesupplier]</th>
              <td>$data[namasupplier]</td>
              <td>$data[alamat]</td>
              <td>$data[notelp]</td>
              <td>$data[ket]</td>
              <td>
                 <a href='edit_supplier.php?id=$data[kodesupplier]'> <button class='btn btn-success'><svg-icon>Edit</button></a>
                 <a href='includes/delete/hapus_supplier.php?id=$data[kodesupplier]' onClick=\"return confirm('Anda yakin menghapus $data[namasupplier]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
                    </td>
                  </tr>";
                $no++;
              }
            }
        echo "</table>";
            ?>
</div>
</div>


<?php include "template/footer.php"; ?>