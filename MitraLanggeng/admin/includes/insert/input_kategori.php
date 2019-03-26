<?php
	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO kategori (namakategori)VALUES";
	$sql.="('".$_POST['namakategori']."')";
	
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);
	echo"Berhasil menambahkan data";
	header('location:../../kategori.php');

?>