<?php
	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO supplier (namasupplier, alamat, notelp, ket)VALUES";
	$sql.="('".$_POST['namasupplier']."','".$_POST['alamat']."','".$_POST['notelp']."','".$_POST['ket']."')";
	
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);
	echo"Berhasil menambahkan data";
	header('location:../../supplier.php');

?>