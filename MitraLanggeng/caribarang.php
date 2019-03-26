<?php include "template/cari/header.php"; ?>
<br><br><br><br><br>
<!-- Grid Judul -->
<center>
<div class="container-fluid" style="padding: 20px;">
  <div class="row">
    <div class="col">
      <a href="caribarang.php"> <button type="button" class="btn btn-primary">All</button></a>
      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
              <?php
            include ("config/koneksi.php");
            echo "  
              <select name='kategori' id='kategori' onchange='kat()' class='form-control'>
                <option value='0' selected type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Pilih Kategori</option>";

            $tampil=mysqli_query($connect, "SELECT * FROM kategori ORDER BY namakategori");
            while ($data=mysqli_fetch_array($tampil)){
              echo "
                    <option value=$data[kodekategori]> $data[namakategori]</option>
              ";
            }
            echo "
              </select>";             
              ?>
        </div>
      </div>
    </div>

    <div class="col-4">

      <?php 
        if(isset($_GET['caribarang'])){
          $caribarang = $_GET['caribarang'];
          echo "<h5><b>Hasil Pencarian : ".$caribarang."</b></h5>";
        }
      ?>
    </div>

    <div class="col">
            <form class="form-inline" action="caribarang.php" method="GET">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" name="caribarang" required="required" placeholder="Nama barang . . .">
        </div>
          <input type="submit" data-toggle="modal" class="btn btn-primary mb-2" value="Cari Barang">
      </form>
    </div>
    </div>
  </div>
</div>
</center>

<!-- Daftar Gambar Barang -->
<center>
  <div class="container-fluid" >
    <div class="row">

    <?php 
    include ("config/koneksi.php");
    if(isset($_GET['caribarang'])){
    $caribarang = $_GET['caribarang'];
          $tampil=mysqli_query($connect, "SELECT b.namakategori, a.namabarang, a.stok, a.gambar FROM barang a JOIN kategori b ON a.kodekategori=b.kodekategori WHERE a.namabarang LIKE '%$caribarang%' ORDER BY kodebarang DESC"); 

          while ($data=mysqli_fetch_array($tampil)){      
          echo "
              <div class='col' style='padding: 20px;'> <!-- Gambar -->
                <div class='card' style='width: 18rem;'>";?>
                  <img class='card-img-top' src='admin/assets/img/uploads/barang/<?php echo $data['gambar'];?>' alt='Card image cap'>
      <?php
      echo "
                  <div class='card-body'>
                    <tr>
                      <h6><i>$data[namakategori]</i></h6>
                      <h4>$data[namabarang]</h4>
                      <h6>Stok $data[stok]</h6>
                    </tr>
                  </div>
                </div>
              </div>";
              }
      ?>

    </div>
  </div>
</center>


<?php 
}else
if(isset($_GET['kategori'])){
                $kategori = $_GET['kategori'];
          $tampil=mysqli_query($connect, "SELECT b.namakategori, a.namabarang, a.stok, a.gambar FROM barang a JOIN kategori b ON a.kodekategori=b.kodekategori WHERE b.kodekategori = '$kategori' ORDER BY kodebarang DESC"); 

          while ($data=mysqli_fetch_array($tampil)){      
          echo "
              <div class='col' style='padding: 20px;'> <!-- Gambar -->
                <div class='card' style='width: 18rem;'>";?>
                <img class='card-img-top' src='admin/assets/img/uploads/barang/<?php echo $data['gambar'];?>' alt='Card image cap'>
      <?php
      echo "
                  <div class='card-body'>
                    <tr>
                      <h6><i>$data[namakategori]</i></h6>
                      <h4>$data[namabarang]</h4>
                      <h6>Stok $data[stok]</h6>
                    </tr>
                  </div>
                </div>
              </div>";
              }
      ?>

    </div>
  </div>
</center>

    <?php
}else{

  $tampil=mysqli_query($connect, "SELECT b.namakategori, a.namabarang, a.stok, a.gambar FROM barang a JOIN kategori b ON a.kodekategori=b.kodekategori ORDER BY kodebarang DESC"); 
  while ($data=mysqli_fetch_array($tampil)){  
          echo "
              <div class='col' style='padding: 20px;'> <!-- Gambar -->
                <div class='card' style='width: 18rem;'>";?>
                <img class='card-img-top' src='admin/assets/img/uploads/barang/<?php echo $data['gambar'];?>' alt='Card image cap'>
      <?php
      echo "
                  <div class='card-body'>
                    <tr>
                      <h6><i>$data[namakategori]</i></h6>
                      <h4>$data[namabarang]</h4>
                      <h6>Stok $data[stok]</h6>
                    </tr>
                  </div>
                </div>
              </div>";
              }
            }
      ?>

    </div>
  </div>
</center>

<script>
  function kat(){
    var kategori = $("#kategori").val();
    window.location.search='?kategori='+kategori;
  }
</script>  

<?php include "template/cari/footer.php";?>