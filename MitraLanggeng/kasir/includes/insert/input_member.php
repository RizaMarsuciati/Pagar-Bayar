<?php
	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO member (idmember, namamember, jenkel, alamat, notelp)VALUES";
	$sql.="('".$_POST['idmember']."','".$_POST['namamember']."','".$_POST['jenkel']."','".$_POST['alamat']."','".$_POST['notelp']."')";
	
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);
	echo"Berhasil menambahkan data";
	header('location:../../member.php');

?>