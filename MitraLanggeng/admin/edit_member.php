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
        <li class="active">Edit Member</li>
      </ol>
  </div><!--/.row-->

  <center>
    <div >
    <h1>Edit Member</h1>
    <h4>Isi data barang dengan lengkap</h4><br>
    </div>
  </center>

<center>
  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
    <form class="form-login" action="includes/update/update_member.php" method="POST" style="padding-left: 10%; padding-right: 10%; padding-top: 3%">
          <?php
          include ("../config/koneksi.php");
          $edit = mysqli_query($connect,"SELECT kodemember, idmember, namamember, jenkel, notelp, alamat FROM member WHERE kodemember='$_GET[id]'");
          $data    = mysqli_fetch_array($edit);
          echo "

            <div class='form-group'>
              <input type='text' readonly value='$data[kodemember]' class='form-control' name='kodemember' id='kodemember' placeholder='Kode Member'>
          </div>
          
          <div class='form-group'>
              <input type='text' value='$data[idmember]' class='form-control' name='idmember' id='idmember' placeholder='ID Member'>
          </div>
          
          <div class='form-group'>
          "; 
          
          echo"
          </div>


          <div class='form-group'>
              <input type='text' class='form-control' id='namamember' placeholder='Nama Member' name='namamember' value='$data[namamember]'>
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
              <input type='text' class='form-control' id='notelp' placeholder='Nomor Telepon' name='notelp' value=$data[notelp]>
          </div>
          
          <div class='form-group'>
              <input type='text' class='form-control' id='alamat' placeholder='Alamat Karyawan' name='alamat' value='$data[alamat]'>
          </div>
         
          <input type='button' value='Kembali' onclick='self.history.back()' class='btn btn-secondary'>
          <button type='submit' class='btn btn-primary'>Simpan</button>
          ";
        ?>
  </div>
</center>


<?php include "template/footer.php"; ?>