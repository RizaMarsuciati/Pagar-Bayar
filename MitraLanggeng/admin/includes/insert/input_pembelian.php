<?php

	session_start();
	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO pembelian (tglpembelian,totalbayar, status, uangmuka, persendiskon, hutang, sisahutang, kodeuser,kodesupplier)VALUES";
	$sql.="(NOW(),'".$_POST['totalbayar']."','".$_POST['status']."','".$_POST['uangmuka']."','".$_POST['persendiskon']."','".$_POST['hutang']."','".$_POST['sisahutang']."','".$_SESSION['kodeuser']."','".$_SESSION['kodesupplier']."')";

	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

	header('location:../../tambah_pembelian.php');
 
?>