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
      </ol>
    </div><!--/.row-->

<center>
  <div >
  <h1>Daftar Member</h1>
  <h4>Klik edit untuk mengubah data member</h4><br>
  <?php 
        if(isset($_GET['carimember'])){
          $carimember = $_GET['carimember'];
          echo "<h5><b>Hasil Pencarian : ".$carimember."</b></h5>";
        }
  ?>
  </div>
</center>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
            <a href="member.php"> <button type="button" class="btn btn-primary">All</button></a>
        </div>

        <div class="col-sm-6">
          <form class="navbar-form navbar-right" role="search" action="member.php" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" name="carimember" required="required" placeholder="Nama member . . .">
            </div>
            <button type="submit" class="btn btn-primary">Cari Member</button>
          </form>
        </div>
      </div>
    </div>

<div style="background-color: white; width: 100%; border-radius: 10px; padding: 2%;">
 <div class="table-responsive">
  <?php 
    include ("../config/koneksi.php");
    if(isset($_GET['carimember'])){
    $carimember = $_GET['carimember'];
            echo "
          <table class='table table-striped' style='margin: 0 auto; font-size: 14px; border-radius: 10px;'>
          <thead>
            <tr>
              <th scope='col'>No.</th>
              <th scope='col'>ID</th>
              <th scope='col'>Nama Member</th>
              <th scope='col'>Jenkel</th>
              <th scope='col'>No. Tlp.</th>
              <th scope='col'>ALamat</th>
              <th scope='col'></th>
            </tr>
          </thead>
          ";

          $no = 1;
              $tampil=mysqli_query($connect, "SELECT kodemember, idmember, namamember, jenkel, notelp, alamat FROM member WHERE namamember LIKE '%$carimember%'"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no+1;
                echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[idmember]</th>
              <td>$data[namamember]</td>
              <td>$data[jenkel]</td>
              <td>$data[notelp]</td>
              <td>$data[alamat]</td>
              <td>
                <a href='edit_member.php?id=$data[kodemember]'> <button class='btn btn-success'><svg-icon>Edit</button></a>
                
                <a href='includes/delete/hapus_member.php?id=$data[kodemember]' onClick=\"return confirm('Anda yakin menghapus materi $data[namamember]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
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
              <th scope='col'>ID</th>
              <th scope='col'>Nama Member</th>
              <th scope='col'>Jenkel</th>
              <th scope='col'>No. Tlp.</th>
              <th scope='col'>Alamat</th>
              <th scope='col'></th>

            </tr>
          </thead>
          ";

          $no = 1;
              $tampil=mysqli_query($connect, "SELECT kodemember, idmember, namamember, jenkel, notelp, alamat FROM member"); 
              while ($data=mysqli_fetch_array($tampil)){
              $no+1;
                echo "
            <tr>
              <th>$no</th>
              <th scope='row'>$data[kodemember]</th>
              <td>$data[idmember]</td>
              <td>$data[namamember]</td>
              <td>$data[jenkel]</td>
              <td>$data[notelp]</td>
              <td>$data[alamat]</td>
              <td>
                 <a href='edit_member.php?id=$data[kodemember]'> <button class='btn btn-success'><svg-icon>Edit</button></a>
                  <a href='includes/delete/hapus_member.php?id=$data[kodemember]' onClick=\"return confirm('Anda yakin menghapus materi $data[namamember]?')\" <button class='btn btn-danger'><svg-icon>Hapus</button></a>
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