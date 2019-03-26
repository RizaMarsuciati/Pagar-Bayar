<?php

	session_start();
	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO penjualan (kodepenjualan, tglpenjualan,total, status, uangmuka, persenbunga, piutang, sisapiutang, tgltagihan, kodemember,kodeuser)VALUES";
	$sql.="('',NOW(),'".$_POST['total']."','".$_POST['status']."','".$_POST['uangmuka']."','".$_POST['persenbunga']."','".$_POST['piutang']."','".$_POST['sisapiutang']."','".$_POST['tgltagihan']."','".$_POST['kodemember']."','".$_SESSION['kodeuser']."')";

	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

	header('location:../../tambah_penjualan.php');

?>