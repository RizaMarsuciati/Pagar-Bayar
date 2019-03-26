<?php
	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO satuan (namasatuan,jumlah)VALUES";
	$sql.="('".$_POST['namasatuan']."','".$_POST['jumlah']."')";
	
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);
	echo"Berhasil menambahkan data";
	header('location:../../satuan.php');

?>