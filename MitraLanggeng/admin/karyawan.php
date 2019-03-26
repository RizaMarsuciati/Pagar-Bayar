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
      </ol>
    </div><!--/.row-->

<center>
  <div >
  <h1>Daftar Karyawan</h1>
  <h4>Untuk menambah karyawan baru klik pada tombol tambah karyawan</h4><br>
  <?php 
        if(isset($_GET['carikaryawan'])){
          $carikaryawan = $_GET['carikaryawan'];
          echo "<h5><b>Hasil Pencarian : ".$carikaryawan."</b></h5>";
        }
      ?>
  </div>
</center>


    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
            <a href="karyawan.php"> <button type="button" class="btn btn-primary">All</button></a>
            <div class="btn-group" role="group">
              <a href="tambah_karyawan.php"><button class="btn btn-primary">Tambah Karyawan</button></a>
            </div>
        </div>

        <div class="col-sm-6">
          <form class="navbar-form navbar-right" role="search" action="karyawan.php" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" name="carikaryawan" required="required" placeholder="Nama karyawan . . .">
            </div>
            <button type="submit" class="btn btn-primary">Cari Karyawnan</button>
          </form>
        </div>
      </div>
    </div>

<div style="background-color: white; width: 100%; border-radius: 10px; padding: 2%;">
<div class="table-responsive">
  <?php 
    include ("../config/koneksi.php");
    if(isset($_GET['carikaryawan'])){
    $carikaryawan = $_GET['carikaryawan'];
              echo "
              <table class='table table-striped' style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
            <thead>
              <tr>
                <th scope='col'>No.</th>
                <th scope='col'>Kode</th>
                <th scope='col'>ID User</th>
                <th scope='col'>Nama</th>
                <th scope='col'>Alamat</th>
                <th scope='col'>Jenkel</th>
                <th scope='col'>Level</th>
                <th scope='col'>No. Tlp.</th>
                <th scope='col'>Username</th>
                <th scope='col'></th>
                <th scope='col'></th>
              </tr>
            </thead>
            ";
            
                $no = 1;
                $tampil=mysqli_query($connect, "SELECT kodeuser, iduser, namauser, alamat, jenkel, level, notelp, username, password FROM user WHERE namauser LIKE '%$carikaryawan%'"); 

                while ($data=mysqli_fetch_array($tampil)){
                $no+1;
                  echo "
                    <tr>
                      <th>$no</th>
                      <th scope='row'>$data[kodeuser]</th>
                      <td>$data[iduser]</td>
                      <td>$data[namauser]</td>
                      <td>$data[alamat]</td>
                      <td>$data[jenkel]</td>
                      <td>$data[level]</td>
                      <td>$data[notelp]</td>
                      <td>$data[username]</td>
                      <td>
                        <a href='edit_karyawan.php?id=$data[kodeuser]' <button class='btn btn-success'><svg-icon>Edit</button></a>
                      </td>
                      <td>
                      <a href='includes/delete/hapus_karyawan.php?id=$data[kodeuser]' onClick=\"return confirm('Anda yakin menghapus karyawan $data[namauser]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
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
                <th scope='col'>ID User</th>
                <th scope='col'>Nama</th>
                <th scope='col'>Alamat</th>
                <th scope='col'>Jenkel</th>
                <th scope='col'>Level</th>
                <th scope='col'>No. Tlp.</th>
                <th scope='col'>Username</th>
              <th scope='col'></th>
              <th scope='col'></th>
            </tr>
          </thead>
          ";
          
                $no = 1;
                $tampil=mysqli_query($connect, "SELECT kodeuser, iduser, namauser, alamat, jenkel, level, notelp, username, password FROM user"); 

                while ($data=mysqli_fetch_array($tampil)){
                $no+1;
                echo "
                  <tr>
                    <th>$no</th>
                      <th scope='row'>$data[kodeuser]</th>
                      <td>$data[iduser]</td>
                      <td>$data[namauser]</td>
                      <td>$data[alamat]</td>
                      <td>$data[jenkel]</td>
                      <td>$data[level]</td>
                      <td>$data[notelp]</td>
                      <td>$data[username]</td>
                    <td>
                      <a href='edit_karyawan.php?id=$data[kodeuser]' <button class='btn btn-success'><svg-icon>Edit</button></a>
                    </td>
                    <td>
                      <a href='includes/delete/hapus_karyawan.php?id=$data[kodeuser]' onClick=\"return confirm('Anda yakin menghapus karyawan $data[namauser]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
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