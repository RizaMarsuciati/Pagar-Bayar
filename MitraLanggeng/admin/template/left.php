	<?php 
		$halaman = end(explode('/', $_SERVER['PHP_SELF']));
		$nav_active = 'nav_dashboard';
		switch ($halaman) {
			case 'beranda.php':
				$nav_active = 'nav_dashboard';
				break;
			case 'penjualan.php':
				$nav_active = 'nav_penjualan';
				break;
			case 'detail_penjualan.php':
				$nav_active = 'nav_penjualan';
				break;
			case 'piutang.php':
				$nav_active = 'nav_penjualan';
				break;
			case 'detail_piutang.php':
				$nav_active = 'nav_penjualan';
				break;
			case 'persediaan_barang.php':
				$nav_active = 'nav_stok';
				break;
			case 'barang_habis.php':
				$nav_active = 'nav_stok';
				break;
			case 'barang.php':
				$nav_active = 'nav_barang';
				break;
			case 'kategori.php':
				$nav_active = 'nav_barang';
				break;
			case 'satuan.php':
				$nav_active = 'nav_barang';
				break;
			case 'tambah_barang.php':
				$nav_active = 'nav_barang';
				break;
			case 'edit_barang.php':
				$nav_active = 'nav_barang';
				break;
			case 'tambah_kategori.php':
				$nav_active = 'nav_barang';
				break;
			case 'edit_kategori.php':
				$nav_active = 'nav_barang';
				break;
			case 'tambah_satuan.php':
				$nav_active = 'nav_barang';
				break;
			case 'edit_satuan.php':
				$nav_active = 'nav_barang';
				break;
			case 'karyawan.php':
				$nav_active = 'nav_karyawan';
				break;
			case 'tambah_karyawan.php':
				$nav_active = 'nav_karyawan';
				break;
			case 'edit_karyawan.php':
				$nav_active = 'nav_karyawan';
				break;
			case 'member.php':
				$nav_active = 'nav_member';
				break;
			case 'edit_member.php':
				$nav_active = 'nav_member';
				break;
			case 'pembelian.php':
				$nav_active = 'nav_pembelian';
				break;
			case 'tambah_pembelian.php':
				$nav_active = 'nav_pembelian';
				break;
			case 'detail_pembelian.php':
				$nav_active = 'nav_pembelian';
				break;
			case 'hutang.php':
				$nav_active = 'nav_pembelian';
				break;
			case 'detail_hutang.php':
				$nav_active = 'nav_pembelian';
				break;
			case 'bayar_hutang.php':
				$nav_active = 'nav_pembelian';
				break;
			case 'supplier.php':
				$nav_active = 'nav_supplier';
				break;
			case 'tambah_supplier.php':
				$nav_active = 'nav_supplier';
				break;
			case 'edit_supplier.php':
				$nav_active = 'nav_supplier';
				break;
			case 'tagihan.php':
				$nav_active = 'nav_tagihan';
				break;
			case 'laporan.php':
				$nav_active = 'nav_laporan';
				break;
			case 'range_penjualan.php':
				$nav_active = 'nav_laporan';
				break;
			case 'lap_penjualan.php':
				$nav_active = 'nav_laporan';
				break;
			case 'range_pembelian.php':
				$nav_active = 'nav_laporan';
				break;
			case 'lap_pembelian.php':
				$nav_active = 'nav_laporan';
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
			<li class="parent" id='nav_dashboard'><a href="beranda.php">
				<em class="fa fa-dashboard">&nbsp;</em> Dashboard</a>
			</li>

			<li class="parent" id='nav_penjualan'><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-bar-chart">&nbsp;</em> Penjualan <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
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
					<li><a href="retur_barang.php">
						<span class="fa fa-refresh">&nbsp;</span> Retur Barang
					</a></li>
				</ul>
			</li>
			<li class="parent" id='nav_barang'><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-cube">&nbsp;</em> Barang <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="barang.php">
						<span class="fa fa-eye">&nbsp;</span> Tampil Barang
					</a></li>
					<li><a class="" href="kategori.php">
						<span class="fa fa-eye">&nbsp;</span> Tampil Kategori
					</a></li>
					<li><a class="" href="satuan.php">
						<span class="fa fa-eye">&nbsp;</span> Tampil Satuan
					</a></li>
				</ul>
			</li>
			<li class="parent" id='nav_karyawan'><a data-toggle="collapse" href="#sub-item-4">
				<em class="fa fa-users">&nbsp;</em> Karyawan <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li><a class="" href="karyawan.php">
						<span class="fa fa-eye">&nbsp;</span> Tampil Karyawan
					</a></li>
				</ul>
			</li>
			<li class="parent" id='nav_member'><a data-toggle="collapse" href="#sub-item-5">
				<em class="fa fa-vcard-o">&nbsp;</em> Member <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-5">
					<li><a class="" href="member.php">
						<span class="fa fa-eye">&nbsp;</span> Tampil Member
					</a></li>
				</ul>
			</li>
			<li class="parent" id='nav_pembelian'><a data-toggle="collapse" href="#sub-item-6">
				<em class="fa fa-shopping-cart">&nbsp;</em> Pembelian <span data-toggle="collapse" href="#sub-item-6" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-6">
					<li><a class="" href="pembelian.php">
						<span class="fa fa-eye">&nbsp;</span> Tampil Pembelian
					</a></li>
					<li><a class="" href="hutang.php">
						<span class="fa fa-eye">&nbsp;</span> Tampil Hutang
					</a></li>
				</ul>
			</li>
			<li class="parent" id='nav_supplier'><a data-toggle="collapse" href="#sub-item-7">
				<em class="fa fa-sitemap">&nbsp;</em> Supplier <span data-toggle="collapse" href="#sub-item-7" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-7">
					<li><a class="" href="supplier.php">
						<span class="fa fa-eye">&nbsp;</span> Tampil Supplier
					</a></li>
				</ul>
			</li>
			<li class="parent" id='nav_tagihan'>
				<a href="tagihan.php">
					<em class="fa fa-volume-up">&nbsp;</em> Tagihan 
				</a>
			</li>
			<li class="parent" id='nav_laporan'><a data-toggle="collapse" href="#sub-item-8">
				<em class="fa fa-calendar-check-o">&nbsp;</em> Laporan <span data-toggle="collapse" href="#sub-item-8" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-8">
					<li><a class="" href="range_penjualan.php">
						<span class="fa fa-eye">&nbsp;</span> Laporan Penjualan
					</a></li>
					<li><a class="" href="range_pembelian.php">
						<span class="fa fa-eye">&nbsp;</span> Laporan Pembelian
					</a></li> 
				</ul>
			</li>
			<li><a href="index.php"><em class="fa fa-power-off">&nbsp;</em> Keluar</a></li>
		</ul>
	</div><!--/.sidebar-->
	