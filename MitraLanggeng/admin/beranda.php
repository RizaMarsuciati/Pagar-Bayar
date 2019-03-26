<?php include "template/header.php"; ?>
<?php include "template/left.php"; ?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row--> 
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<?php
								include ("../config/koneksi.php");
								$tampil=mysqli_query($connect, "SELECT count(kodepenjualan) AS jumlahpenjualan FROM penjualan WHERE tglpenjualan>date_sub(CURRENT_DATE, INTERVAL 1 month)"); 
              					$data=mysqli_fetch_array($tampil);

							echo "
							<div class='large'>$data[jumlahpenjualan]</div>
							<div class='text-muted'>Penjualan dalam 30 Hari</div><br>
							<a href='penjualan.php' class='btn btn-primary'><span class='fa fa-eye'></span> Tampil Data</a>
							";
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa fa-address-book color-blue"></em>
							<?php
							include ("../config/koneksi.php");
							$tampil=mysqli_query($connect, "SELECT count(kodepenjualan) AS jumlahpiutang FROM penjualan WHERE status='Belum Lunas'"); 
          					$data=mysqli_fetch_array($tampil);

							echo "
							<div class='large'>$data[jumlahpiutang]</div>
							<div class='text-muted'>Jumlah Piutang</div><br>
							<a href='piutang.php' class='btn btn-primary'><span class='fa fa-eye'></span> Tampil Data</a>
							";
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-address-book color-blue"></em>
							<?php
							include ("../config/koneksi.php");
							$tampil=mysqli_query($connect, "SELECT count(kodepembelian) AS jumlahhutang FROM pembelian WHERE status='Belum Lunas'"); 
          					$data=mysqli_fetch_array($tampil);

							echo "
							<div class='large'>$data[jumlahhutang]</div>
							<div class='text-muted'>Jumlah Hutang</div><br>
							<a href='hutang.php' class='btn btn-primary'><span class='fa fa-eye'></span> Tampil Data</a>
							";
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
							<?php
								include ("../config/koneksi.php");
								$tampil=mysqli_query($connect, "SELECT count(kodemember) AS jumlahmember FROM member "); 
              					$data=mysqli_fetch_array($tampil);

							echo "
							<div class='large'>$data[jumlahmember]</div>
							<div class='text-muted'>Jumlah Member</div><br>
							<a href='member.php' class='btn btn-primary'><span class='fa fa-eye'></span> Tampil Data</a>
							";
							?>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		

<?php include "template/footer.php"; ?>