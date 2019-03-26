<?php include "template/header.php"; ?>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center" style="background:url('assets/img/bg.jpg'); background-repeat:no-repeat; background-size:cover;">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="assets/img/logo.png" data-toggle="modal" data-target="#contohModalKecil" alt="">
        <h1 class="text-uppercase mb-0">TB Mitra Langgeng</h1>
        <br>
        <h2 class="font-weight-light mb-0">Menyediakan alat dan bahan bangunan</h2>
      </div>
    </header>

    <!-- Fitur -->
    <section class=" features-icons bg-light text-center" style="padding-top: 1%; padding-bottom: 1%;">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-basket-loaded m-auto text-primary" style=""></i>
              </div>
              <h3>Cek Stok Barang</h3>
              <p class="lead mb-0 ">Fasilitas untuk mengecek stok barang!</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-wallet m-auto text-primary"></i>
              </div>
              <h3>Cek Hutang</h3>
              <p class="lead mb-0">Fasilitas yang digunakan untuk mengecek nota hutang!</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-location-pin m-auto text-primary"></i>
              </div>
              <h3>TB Mitra Langgeng</h3>
              <p class="lead mb-0">Sudah terdaftar pencarian Google Maps!</p>
            </div>
          </div>
        </div>
      </div>
    </section><br>

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="terlaris">
      <center>
      <div class="container-fluid">
        <h2 class="text-center text-uppercase text-secondary mb-0">Barang Terlaris</h2>
        <hr class="star-dark mb-5">
        <div class="row" style="margin-left: 6%;">

          <?php 
            $no = 0;
            include ("config/koneksi.php");
            $tampil=mysqli_query($connect, "SELECT A.kodebarang, A.namabarang, A.gambar, IFNULL(Cast(Detail.Total as Int), 0) AS 'Total' FROM barang A LEFT JOIN(select SUM(jumlah) AS 'Total', B.kodebarang, C.tglpenjualan from detailpenjualan B JOIN penjualan C ON B.kodepenjualan=C.kodepenjualan WHERE C.tglpenjualan > date_sub(CURRENT_DATE, INTERVAL 1 month) GROUP BY kodebarang)Detail ON A.kodebarang = Detail.kodebarang ORDER BY Detail.Total DESC LIMIT 8 ");
            while ($data=mysqli_fetch_array($tampil)){
            $no++;
              echo "

              <center>
                    <div class='col' style='margin-bottom: 10px;'> <!-- Gambar -->
                      <div class='card' style='width: 16rem;'>";?>
                        <img class='card-img-top' src='admin/assets/img/uploads/barang/<?php echo $data['gambar'];?>' alt='Card image cap' href='#portfolio-modal-1'>
          <?php
          echo"
                        <div class='card-body'>
                          <tr>
                            <h3>#$no</h3>
                            <h4>$data[namabarang]</h4>
                            <hr>
                            <h6>$data[Total] Pembelian</h6>
                          </tr>
                        </div>
                      </div><br>
                  </div>
              </center>
              ";
            }
          ?>

        </div>
      </div>
      </center>
    </section>


    <!-- Cek Barang Section -->
    <section class="bg-primary text-white mb-0" id="caribarang" style="padding-bottom: 20%;">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">Cari Barang</h2>
        <hr class="star-light mb-5">
          <form action="caribarang.php" method="GET">
            <div class="form-row" style="margin-left: 25%;">
              <div class="col-12 col-md-6 mb-2 mb-md-0">
                <input type="text" class="form-control form-control-lg" name="caribarang" required="required" placeholder="Masukkan nama barang . . .">
              </div>
              <div class="col-12 col-md-3">
                <input type="submit" class="btn btn-lg btn-outline-light" value="Cari Barang" >
              </div>
            </div>
          </form><br>
          <h6 style="text-align: center;">
            Toko Besi Mitra Langgeng merupakan sebuah toko yang menyediakan alat dan bahan bangunan, yang beralamat di dusun Krageman, Kradenan, Srumbung, Magelang.
          </h6>
      </div>
    </section>

    <!-- Cek Kredit Section -->
    <section id="cekhutang" id="cekhutang" style="padding-bottom: 20%;">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Cek Hutang</h2>
        <hr class="star-dark mb-5">
          <form action="cekhutang.php" method="GET">
            <div class="form-row" style="margin-left: 25%;">
              <div class="col-12 col-md-6 mb-2 mb-md-0">
                <input type="text" class="form-control form-control-lg" name="cekhutang" required="required" placeholder="Masukkan kode pembelian Anda . . .">
              </div>
              <div class="col-12 col-md-3">
                <input type="submit" class="btn btn-lg btn-primary btn-outline-light" value="Cek Hutang">
              </div>
            </div>
          </form><br>

          <h6 style="text-align: center;">
            Toko Besi Mitra Langgeng merupakan sebuah toko yang menyediakan alat dan bahan bangunan, yang beralamat di dusun Krageman, Kradenan, Srumbung, Magelang.
          </h6>
      </div>
    </section>

    <!-- About Section -->
    <section class="bg-primary text-white mb-0 text-center" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">Informasi</h2>
        <hr class="star-light mb-5">
        <div class="row">

            <p class="lead">Toko Besi Mitra Langgeng merupakan sebuah toko yang menyediakan alat dan bahan bangunan, yang beralamat di dusun Krageman, Kradenan, Srumbung, Magelang.</p>

            <p class="lead">
                Toko Besi Mitra Langgeng memiliki visi sebagai mitra/partner yang sanggup memberikan kepuasan dan kenyamanan terhadap semua pihak yang berkepentingan. Sehingga terwujud industri furniture yang mampu berkembang, sehat dan mandiri.
            </p>

            <p class="lead">
                Toko Besi Mitra Langgeng memiliki Misi : Mampu menghasilkan produk yang berkualitas, Menciptakan lapangan pekerjaan guna mencapai tujuan bersama, Mencapai sukses dan mengutamakan pelayanan pelanggan yang bermutu.
            </p>

        </div>
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="http://bit.ly/tbmitralanggeng" target="_blank">
            <i class="fas fa-download mr-2"></i>
            WhatsApp!
          </a>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="testimoni" class="testimonials text-center bg-light">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Testimoni</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <?php
          include ("config/koneksipublik.php");
          
          $tampil=mysqli_query($connect, "SELECT * FROM testimoni WHERE rating=3  ORDER BY kodetestimoni DESC LIMIT 3");
          while ($data=mysqli_fetch_array($tampil)){
          echo "
            <div class='col-lg-4'>
            <div class='testimonial-item mx-auto mb-5 mb-lg-0'>
              <img class='img-fluid rounded-circle mb-3' src='assets/img/testimonials-1.png' alt=''>
              <h5>$data[nama]</h5>
              <p class='font-weight-light mb-0'>$data[pesan]</p>
            </div>
            </div>
            ";
            }
          ?>
        </div>
      </div>
    </section>


    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Apa komentar Anda?</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <form action="includes/insert/input_testimoni.php" method="POST">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Nama</label>
                  <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Alamat Email</label>
                  <input class="form-control" id="email" name="email" type="email" placeholder="Alamat Email" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Nomor Telefon</label>
                  <input class="form-control" id="notelp" name="notelp" type="tel" placeholder="Nomor Telefon" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Pesan</label>
                  <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Pesan" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>

              <h4>Rating Kepuasan Pelanggan</h4>
              <div class="radio" style="">
                <h4><input type="radio" name="rating" value="1"> Kurang  
                <input type="radio" name="rating" value="2"> Cukup  
                <input type="radio" name="rating" value="3"> Baik </h4> 
              </div>

              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

<?php include "template/footer.php";?>

<!-- Modal Pop Up -->
    <div class="modal fade" id="contohModalKecil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <center>
                <form action="config/ceklogin.php" method="POST">
                  <!-- Tombol Close -->
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> 
                  <div class="form-group">
                    <h3>Silahkan Masuk</h3>
                    <input type="text" class="form-control" name="username" id="username" required="required" placeholder="Nama pengguna">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" required="required" placeholder="Kata sandi">
                  </div>
                  <button type="submit" class="btn btn-primary">Masuk</button>
                </form>
              </center>
            </div>
          </div>
        </div>
    </div>