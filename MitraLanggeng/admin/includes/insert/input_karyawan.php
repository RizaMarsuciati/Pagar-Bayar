<?php
	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO user (iduser, namauser, alamat, jenkel, level, notelp, username, password)VALUES";
	$sql.="('".$_POST['iduser']."','".$_POST['namauser']."','".$_POST['alamat']."','".$_POST['jenkel']."','".$_POST['level']."','".$_POST['notelp']."','".$_POST['username']."',MD5('".$_POST['password']."'))";
	
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);
	echo"Berhasil menambahkan data";
	header('location:../../karyawan.php');

?>