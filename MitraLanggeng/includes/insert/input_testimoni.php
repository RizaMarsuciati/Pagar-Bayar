<?php
	include ("../../config/koneksipublik.php");
	
	$sql="INSERT INTO testimoni (nama, email, notelp, pesan, rating)VALUES";
	$sql.="('".$_POST['nama']."','".$_POST['email']."','".$_POST['notelp']."','".$_POST['pesan']."','".$_POST['rating']."')";
	
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);
	echo"Berhasil menambahkan data";
	header('location:../../index.php');

?>