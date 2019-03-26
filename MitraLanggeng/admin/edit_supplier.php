<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
  <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Supplier</li>
        <li class="active">Daftar Supplier</li>
        <li class="active">Edit Supplier</li>
      </ol>
  </div><!--/.row-->

  <center>
    <div >
    <h1>Edit Supplier</h1>
    <h4>Isi data kategori dengan lengkap</h4><br>
    </div>
  </center>

<center>
  <div style="background-color: white; width: 60%; border-radius: 10px; padding: 2%">
    <form class="form-login" action="includes/update/update_supplier.php" method="POST" style="padding-left: 10%; padding-right: 10%; padding-top: 3%">
          <?php
          include ("../config/koneksi.php");
          $edit = mysqli_query($connect,"SELECT kodesupplier, namasupplier, alamat, notelp, ket FROM supplier WHERE kodesupplier='$_GET[id]'");
          $data    = mysqli_fetch_array($edit);
          echo "
          
          <div class='form-group'>
              <input type='hidden' value=$data[kodesupplier] class='form-control' name='kodesupplier' id='kodesupplier'>
          </div>
          
          <div class='form-group'>
          "; 
          
          echo"
          </div>

          <div class='form-group'>
              <input type='text' class='form-control' readonly id='kodesupplier' placeholder='Kode Supplier' name='kodesupplier' value='$data[kodesupplier]'>
          </div>

          <div class='form-group'>
              <input type='text' class='form-control' id='namasupplier' placeholder='Nama Supplier' name='namasupplier' value='$data[namasupplier]'>
          </div>

          <div class='form-group'>
              <input type='text' class='form-control' id='alamat' placeholder='Alamat Supplier' name='alamat' value='$data[alamat]'>
          </div>
                    
          <div class='form-group'>
              <input type='text' class='form-control' id='notelp' placeholder='Nomor Telepon' name='notelp' value=$data[notelp]>
          </div>
          
          <div class='form-group'>
              <input type='text' class='form-control' id='ket' placeholder='Menyediakan' name='ket' value='$data[ket]'>
          </div>
         
          <input type='button' value='Kembali' onclick='self.history.back()' class='btn btn-secondary'>
          <button type='submit' class='btn btn-primary'>Simpan</button>
          ";
        ?>
  </div>
</center>


<?php include "template/footer.php"; ?>