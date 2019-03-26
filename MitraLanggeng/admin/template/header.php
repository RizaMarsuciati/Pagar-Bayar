<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

  if (empty($_SESSION['username']) || $_SESSION['level'] != 'Admin') {
    header('Location: ../admin/index.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrator TB Mitra Langgeng</title>
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
				<a class="navbar-brand" href="beranda.php"><span>Mitra</span>ADMIN</a>
				<ul class="nav navbar-top-links navbar-right">
					<?php
					include ("../config/koneksi.php");
						// QUERY NOTIF STOK BARANG
              			$tagihan=mysqli_query($connect, "SELECT count(kodepenjualan) AS tagihan FROM penjualan WHERE sisapiutang>0 AND tgltagihan=date_sub(CURRENT_DATE, INTERVAL 1 month)");
              			$data=mysqli_fetch_array($tagihan);

              			echo "
              				<li class='dropdown'><a class='dropdown-toggle count-info' data-toggle='dropdown' href='#'>
								<em class='fa fa-envelope'></em><span class='label label-danger'>$data[tagihan]</span>
							</a>
								<ul class='dropdown-menu dropdown-alerts'>
									<li><a href='tagihan.php'>
										<div><em class='fa fa-address-book'></em>$data[tagihan] Tagihan
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