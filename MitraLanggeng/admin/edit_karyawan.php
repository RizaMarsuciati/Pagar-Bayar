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
        <li class="active">Edit Karyawan</li>
      </ol>
  </div><!--/.row-->

  <center>
    <div >
    <h1>Edit Karyawan</h1>
    <h4>Isi data barang dengan lengkap</h4><br>
    </div>
  </center>

<center>
  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
    <form class="form-login" action="includes/update/update_karyawan.php" method="POST" style="padding-left: 10%; padding-right: 10%; padding-top: 3%">
          <?php
          include ("../config/koneksi.php");
          $edit = mysqli_query($connect,"SELECT kodeuser, iduser, namauser, jenkel, notelp, alamat, username, password FROM user WHERE kodeuser='$_GET[id]'");
          $data    = mysqli_fetch_array($edit);
          echo "
          <div class='form-group'>
              <input type='hidden' value=$data[kodeuser] class='form-control' name='kodeuser' id='kodeuser' placeholder='Kode User'>
          </div>
          
          <div class='form-group'>
          "; 
          
          echo"
          </div>

          <div class='form-group'>
              <input type='text' class='form-control' id='iduser' placeholder='ID User' name='iduser' value='$data[iduser]'>
          </div>

          <div class='form-group'>
              <input type='text' class='form-control' id='namauser' placeholder='Nama Karyawan' name='namauser' value='$data[namauser]'>
          </div>
          
          <div class='form-group'>
          <select class='form-control' id='jenkel' name='jenkel' value=$data[jenkel]>";

          echo "
              <option>
                $data[jenkel]
              </option>

              <option value='Laki-Laki'>Laki-Laki</option>
              <option value='Perempuan'>Perempuan</option>
              </select>
          </div>
          
          <div class='form-group'>
              <input type='hidden' class='form-control' id='idadmin' name='idadmin' value=$data[idadmin]>
          </div>
          <div class='form-group'>
              <input type='text' class='form-control' id='notelp' placeholder='Nomor Telepon' name='notelp' value=$data[notelp]>
          </div>
          
          <div class='form-group'>
              <input type='text' class='form-control' id='alamat' placeholder='Alamat Karyawan' name='alamat' value='$data[alamat]'>
          </div>
         
          <div class='form-group'>
              <input type='text' class='form-control' id='username' placeholder='Username' name='username' value=$data[username]>
          </div>
          
          <input type='button' value='Kembali' onclick='self.history.back()' class='btn btn-secondary'>
          <button type='submit' class='btn btn-primary'>Simpan</button>
          ";
        ?>
  </div>
</center>


<?php include "template/footer.php"; ?>