<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TB Mitra Langgeng</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/landing-page.min.css" rel="stylesheet">
    <link href="assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts/font-montserrat.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts/font-lato.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="assets/css/freelancer.min.css" rel="stylesheet">
    <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

    <style type="text/css">
      .text-primary {
        color: #1E90FF!important;
      }

    </style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">TB MITRA LANGGENG</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">Beranda</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

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
                    <input type="text" class="form-control" name="username" id="username" placeholder="Nama pengguna">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Kata sandi">
                  </div>
                  <button type="submit" class="btn btn-primary">Masuk</button>
                </form>
              </center>
            </div>
          </div>
        </div>
    </div>