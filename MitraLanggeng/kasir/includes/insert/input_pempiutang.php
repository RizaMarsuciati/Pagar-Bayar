<?php
	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO pembayaranpiutang (kodepempiutang, jumlahbayar, tglbayar, jumlahbunga, kodepenjualan)VALUES";
	$sql.="('','".$_POST['jumlahbayar']."',NOW(),'".$_POST['jumlahbunga']."','".$_POST['kodepenjualan']."')";
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

	$sisa="UPDATE penjualan SET sisapiutang = sisapiutang-$_POST[jumlahbayar], status='$_POST[status]' WHERE kodepenjualan = '$_POST[kodepenjualan]'";
	mysqli_query($connect, $sisa) or exit ("Error query : ".$sisa);

	echo"Berhasil menambahkan data";
	header('location:../../piutang.php');
?>