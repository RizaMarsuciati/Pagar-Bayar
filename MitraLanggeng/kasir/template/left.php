	<?php 
		$halaman = end(explode('/', $_SERVER['PHP_SELF']));
		$nav_active = 'nav_dashboard';
		switch ($halaman) {
			case 'index.php':
				$nav_active = 'nav_dashboard';
				break;
			case 'penjualan.php':
				$nav_active = 'nav_penjualan';
				break;
			case 'tambah_penjualan.php':
				$nav_active = 'nav_penjualan';
				break;
			case 'piutang.php':
				$nav_active = 'nav_penjualan';
				break;
			case 'persediaan_barang.php':
				$nav_active = 'nav_stok';
				break;
			case 'tambah_buka_stok.php':
				$nav_active = 'nav_stok';
				break;
			case 'barang_habis.php':
				$nav_active = 'nav_stok';
				break;
			case 'member.php':
				$nav_active = 'nav_member';
				break;
			case 'tambah_member.php':
				$nav_active = 'nav_member';
				break;
			case 'tagihan.php':
				$nav_active = 'nav_tagihan';
				break;
			default:
				# code...
				break;
		}
	?>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="../assets/img/user.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?= $_SESSION['username']?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="" id='nav_dashboard'><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a>
			</li>

			<li class="parent" id='nav_penjualan'><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-bar-chart">&nbsp;</em> Penjualan<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="penjualan.php">
						<span class="fa fa-eye">&nbsp;</span> Tampil Penjualan
					</a></li>
					<li><a class="" href="piutang.php">
						<span class="fa fa-eye">&nbsp;</span> Tampil Piutang
					</a></li>
				</ul>
			</li>
			<li class="parent" id='nav_stok'><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-cubes">&nbsp;</em> Stok <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a href="persediaan_barang.php">
						<span class="fa fa-calendar-check-o">&nbsp;</span> Persediaan Barang
					</a></li>
					<li><a href="barang_habis.php">
						<span class="fa fa-exclamation-circle">&nbsp;</span> Barang Habis
					</a></li>
				</ul>
			</li>
			<li class="parent" id='nav_member'><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-vcard-o">&nbsp;</em> Member <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="member.php">
						<span class="fa fa-eye">&nbsp;</span> Tampil Member
					</a></li>
				</ul>
			</li>
			<li><a href="../index.php"><em class="fa fa-power-off">&nbsp;</em> Keluar</a></li>
		</ul>
	</div><!--/.sidebar-->