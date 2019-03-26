<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Supplier</li>
      </ol>
    </div><!--/.row-->

<center>
  <div >
  <h1>Daftar Supplier</h1>
  <h4>Jika ada supplier baru, Segera masukan dalam daftar</h4><br>
  <?php 
        if(isset($_GET['carisupplier'])){
          $carisupplier = $_GET['carisupplier'];
          echo "<h5><b>Hasil Pencarian : ".$carisupplier."</b></h5>";
        }
      ?>
  </div>
</center>


      <a href="supplier.php"> <button type="button" class="btn btn-primary">All</button></a>
      <div class="btn-group" role="group">
        <div class="btn-group" role="group">
             <a href="tambah_supplier.php"><button class="btn btn-success">Tambah Supplier</button></a>
        </div>
      </div>

      <!--<form class="form-inline" action="barang.php" method="GET">-->
        <div class="btn-group" style="padding-left: 50%;">
            <input type="text" class="form-control" name="carisupplier" action="supplier.php" method="GET" placeholder="Nama supplier . . .">
        </div>
        <div class="btn-group">
            <input type="submit" data-toggle="modal" class="btn btn-primary mb-2" value="Cari Supplier">
        </div>
      </form>
      <br><br>


<div class="table-responsive">
  <?php 
    include ("../config/koneksi.php");
    if(isset($_GET['carisupplier'])){
    $carisupplier = $_GET['carisupplier'];
            echo "
          <table class='table' style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
          <thead>
            <tr>
              <th scope='col'>No.</th>
              <th scope='col'>ID</th>
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
              <th scope='row'>$data[idsupplier]</th>
              <td>$data[namasupplier]</td>
              <td>$data[alamat]</td>
              <td>$data[notelp]</td>
              <td>$data[ket]</td>
              <td>
                 <a href='../../controllers/admin/editsupplier.php?id=$data[idsupplier]'> <button class='btn btn-success'><svg-icon>Edit</button></a>

                  <a href='includes/delete/hapus_supplier.php?id=$data[idsupplier]' onClick=\"return confirm('Anda yakin menghapus materi $data[namasupplier]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
                    </td>
                  </tr>";
                $no++;
              }
        echo "</table>";
            ?>
</div>

  <?php
}else{
  echo "
          <table class='table' style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
          <thead>
            <tr>
              <th scope='col'>No.</th>
              <th scope='col'>ID</th>
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
              <th scope='row'>$data[idsupplier]</th>
              <td>$data[namasupplier]</td>
              <td>$data[alamat]</td>
              <td>$data[notelp]</td>
              <td>$data[ket]</td>
              <td>
                 <a href='../../controllers/admin/editsupplier.php?id=$data[idsupplier]'> <button class='btn btn-success'><svg-icon>Edit</button></a>

                  <a href='includes/delete/hapus_supplier.php?id=$data[idsupplier]' onClick=\"return confirm('Anda yakin menghapus materi $data[namasupplier]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
                    </td>
                  </tr>";
                $no++;
              }
            }
        echo "</table>";
            ?>

<?php include "template/footer.php"; ?>