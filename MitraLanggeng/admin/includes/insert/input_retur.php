<?php
	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO retur (tglretur, jumlah, ket, jmlkembali, kodebarang)VALUES";
	$sql.="(NOW(),'".$_POST['jumlah']."','".$_POST['ket']."','".$_POST['jmlkembali']."','".$_POST['kodebarang']."')";
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

	$sql="UPDATE barang SET stok = stok-$_POST[jumlah] WHERE kodebarang = '$_POST[kodebarang]'";
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

	echo"Berhasil menambahkan data";
	header('location:../../retur_barang.php');

?>