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
								$tampil=mysqli_query($connect, "SELECT count(kodepenjualan) AS jumlahpenjualan FROM penjualan WHERE tglpenjualan LIKE concat(CURRENT_DATE,'%')"); 
              					$data=mysqli_fetch_array($tampil);

							echo "
							<div class='large'>$data[jumlahpenjualan]</div>
							<div class='text-muted'>Penjualan Hari Ini</div><br>
							<a href='penjualan.php' class='btn btn-primary'><span class='fa fa-eye'></span> Tampil Data</a>
							";
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-blue"></em>
							<?php
							include ("../config/koneksi.php");
							$tampil=mysqli_query($connect, "SELECT count(kodepenjualan) AS jumlahpiutang FROM penjualan WHERE status='Belum Lunas' AND tglpenjualan LIKE concat(CURRENT_DATE,'%')"); 
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
						<div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
							<?php
							include ("../config/koneksi.php");
							$tampil=mysqli_query($connect, "SELECT count(kodemember) AS jumlahmember FROM member"); 
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
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa fa-warning color-blue"></em>
							<?php
							include ("../config/koneksi.php");
							$tampil=mysqli_query($connect, "SELECT count(kodebarang) AS jumlahbaranghabis FROM barang WHERE stokutuh<=0 AND stok<=0"); 
          					$data=mysqli_fetch_array($tampil);

							echo "
							<div class='large'>$data[jumlahbaranghabis]</div>
							<div class='text-muted'>Jumlah Barang Habis</div><br>
							<a href='barang_habis.php' class='btn btn-primary'><span class='fa fa-eye'></span> Tampil Data</a>
							";
							?>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>

		<div class="container-fluid" style="padding: 20px;">
			<div class="row">
				<div style="text-align: center;">
					<h2>CEK HARGA BARANG</h2>	
				</div>
				
				<div class="col-sm-4"> <!-- Pembuka Pilih Kategori -->
			      <a href="index.php"> <button type="button" class="btn btn-primary">All</button></a>
			      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
			        <div class="btn-group" role="group">
			              <?php
			            include ("../config/koneksi.php");
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
				</div> <!-- Penutup Pilih Kategori -->

				<div class="col-sm-4"> <!-- Pembuka KeyWord -->
					<?php 
				        if(isset($_GET['caribarang'])){
				          $caribarang = $_GET['caribarang'];
				          echo "<h5><b>Hasil Pencarian : ".$caribarang."</b></h5>";
				        }
				    ?>
				</div>

				<div class="col-sm-4"> <!-- Pembuka Pencarian -->
					<form class="form-inline" action="index.php" method="GET">
			        	<div class="form-group mx-sm-3 mb-2">
			            <input type="text" class="form-control" name="caribarang" required="required" placeholder="Nama barang . . .">
			        	</div>
			          	<input type="submit" data-toggle="modal" class="btn btn-primary mb-2" value="Cari Barang">
			      	</form>
				</div> <!-- Penutup pencarian -->
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<?php 
				    include ("../config/koneksi.php");
				    if(isset($_GET['caribarang'])){
				    $caribarang = $_GET['caribarang'];
				        $tampil=mysqli_query($connect, "SELECT b.namakategori, a.namabarang, a.hargajual, a.stok, a.gambar FROM barang a JOIN kategori b ON a.kodekategori=b.kodekategori WHERE a.namabarang LIKE '%$caribarang%' OR a.kodebarang LIKE '%$caribarang%'"); 

				        while ($data=mysqli_fetch_array($tampil)){ 
				    	$hargajual=number_format($data['hargajual'],2,",",".");  
				        echo "
				            <div class='col-sm-4' style='padding: 2%;'> <!-- Gambar -->
				            	<div class='card' style='background-color: white; border-radius: 4%; padding: 2%;'>";?>
				            		<img class='card-img-top' src='../admin/assets/img/uploads/barang/<?php echo $data['gambar'];?>' alt='Card image cap' style='width: 90%; height: 90%;'>
				      				<?php
				      				echo "
						            <div class='card-body' style='text-align: center;'>
						                <tr>
						                    <h5><i>$data[namakategori]</i></h5>
						                    <h4><b>$data[namabarang]</b></h4>
				                      		<h4>Rp.$hargajual</h4>
						                    <h4>Stok $data[stok]</h4>
						                </tr>
						            </div>
				            	</div>
				            </div>";
				        }
				?>

				<?php 
				}else
				if(isset($_GET['kategori'])){
				    $kategori = $_GET['kategori'];
				    $tampil=mysqli_query($connect, "SELECT b.namakategori, a.namabarang, a.hargajual, a.stok, a.gambar FROM barang a JOIN kategori b ON a.kodekategori=b.kodekategori WHERE b.kodekategori = '$kategori'"); 

				    while ($data=mysqli_fetch_array($tampil)){
				    $hargajual=number_format($data['hargajual'],2,",",".");  
				    echo "
				        <div class='col-sm-4' style='padding: 2%;'> <!-- Gambar -->
				            <div class='card' style='background-color: white; border-radius: 4%; padding: 2%;'>";?>
				            	<img class='card-img-top' src='../admin/assets/img/uploads/barang/<?php echo $data['gambar'];?>' alt='Card image cap' style='width: 90%; height: 90%;'>
				      			<?php
				      			echo "
				                	<div class='card-body' style='text-align: center;'>
				                    	<tr>
				                      		<h5><i>$data[namakategori]</i></h5>
				                      		<h4><b>$data[namabarang]</b></h4>
				                      		<h4>Rp.$hargajual</h4>
				                      		<h4>Stok $data[stok]</h4>
				                    	</tr>
				                  	</div>
				            </div>
				        </div>";
				    }
				?>

				<?php
				}else{

					$tampil=mysqli_query($connect, "SELECT b.namakategori, a.namabarang, a.hargajual, a.stok, a.gambar FROM barang a JOIN kategori b ON a.kodekategori=b.kodekategori");
					while ($data=mysqli_fetch_array($tampil)){  
					$hargajual=number_format($data['hargajual'],2,",","."); 
				        echo "
				            	<div class='col-sm-4' style='padding: 2%;'> <!-- Gambar -->
				            		<div class='card' style='background-color: white; border-radius: 4%; padding: 2%;'>";?>
				                		<img class='card-img-top' src='../admin/assets/img/uploads/barang/<?php echo $data['gambar'];?>' alt='Card image cap' style='width: 90%; height: 90%;'>
				      					<?php
				      					echo "
				                  			<div class='card-body' style='text-align: center;'>
				                    			<tr>
				                      				<h5><i>$data[namakategori]</i></h5>
				                      				<h4><b>$data[namabarang]</b></h4>
				                      				<h4>Rp.$hargajual</h4>
				                      				<h4>Stok $data[stok]</h4>
				                    			</tr>
				                  			</div>
				                	</div>
				              	</div>";
				    }
				}
				?>
			</div>
		</div>

	<script>
	  function kat(){
	    var kategori = $("#kategori").val();
	    window.location.search='?kategori='+kategori;
	  }
	</script>


<?php include "template/footer.php"; ?>