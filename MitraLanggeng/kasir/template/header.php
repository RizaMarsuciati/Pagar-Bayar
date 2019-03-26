<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

  if (empty($_SESSION['username']) || $_SESSION['level'] != 'Kasir') {
    header('Location: ../index.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kasir TB Mitra Langgeng</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/datepicker3.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
	<link rel="icon" href="assets/icon.png" type="image/x-icon">
	<link href="assets/css/select2.min.css" rel="stylesheet" />

	<!--Custom Font-->
	<link href="assets/fonts/font-montserrat.css" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php"><span>Mitra</span>Kasir</a>
				<ul class="nav navbar-top-links navbar-right">
					<?php
					include ("../config/koneksi.php");
						// QUERY JUMLAH NOTIF 
              			$jumlah=mysqli_query($connect, "SELECT count(kodebarang) AS jumlahnotif FROM barang WHERE stok<=0");
              			$data1=mysqli_fetch_array($jumlah);

              			// QUERY NOTIF BUKA STOK
						$barangbukastok=mysqli_query($connect, "SELECT count(kodebarang) AS stok FROM barang WHERE stok<=0"); 
              			$data3=mysqli_fetch_array($barangbukastok);

					// NOTIFIKASI
					echo "
					<li class='dropdown'><a class='dropdown-toggle count-info' data-toggle='dropdown' href='#'>
						<em class='fa fa-bell'></em><span class='label label-info'>$data1[jumlahnotif]</span>
					</a>
						<ul class='dropdown-menu dropdown-alerts'>
							<li><a href='persediaan_barang.php'>
								<div><em class='fa fa-cubes'></em>$data3[stok] Stok Ecer Barang Habis
									<span class='pull-right text-muted small'>";
									echo "</span></div>
							</a></li>
						</ul>
					</li>
					";
					?>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>