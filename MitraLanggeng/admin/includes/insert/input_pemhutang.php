<?php
	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO pembayaranhutang (jumlahbayar, tglbayar, kodepembelian)VALUES";
	$sql.="('".$_POST['jumlahbayar']."',NOW(),'".$_POST['kodepembelian']."')";
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

	$sisa="UPDATE pembelian SET sisahutang = sisahutang-$_POST[jumlahbayar], status='$_POST[status]' WHERE kodepembelian = '$_POST[kodepembelian]'";
	mysqli_query($connect, $sisa) or exit ("Error query : ".$sisa);

	echo"Berhasil menambahkan data";
	header('location:../../hutang.php');
?>