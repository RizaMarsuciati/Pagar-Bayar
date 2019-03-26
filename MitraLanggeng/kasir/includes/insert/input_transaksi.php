<?php
	include ("../../../config/koneksi.php");
	

	$sql="INSERT INTO penjualan (idkaryawan, idmember, namapelanggan, status, tgltransaksi)VALUES";

	if (empty($_POST['idmember'])) {
		$sql.="('".$_POST['idkaryawan']."','','".$_POST['namapelanggan']."','".$_POST['status']."',NOW())";		
	}else{
		$sql.="('".$_POST['idkaryawan']."','".$_POST['idmember']."','','".$_POST['status']."',NOW())";

	}

	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);
	
	header('location:../../detail_transaksi.php');

?>