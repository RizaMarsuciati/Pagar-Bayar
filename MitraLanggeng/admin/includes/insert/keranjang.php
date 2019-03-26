<?php
	include ("../../../config/koneksi.php");

	$tampil=mysqli_query($connect, "SELECT namabarang, hargajual FROM barang WHERE kodebarang='".$_POST['kodebarang']."'"); 
    $data=mysqli_fetch_array($tampil);
	
	$sql="INSERT INTO detailpembelian (namabarang, jumlah, hargabeli, total, kodepembelian, kodebarang)VALUES";
	$sql.="('".$data['namabarang']."','".$_POST['jumlah']."','".$data['hargabeli']."','".$data['hargabeli']*$_POST['jumlah']."','".$_POST['kodepembelian']."','".$_POST['kodebarang']."')";

	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

	if($sql){
	echo "Berhasil Menambahkan Data";	 
	echo "<meta http-equiv='refresh'>";
	header('location:../../tambah_pembelian.php');
	$sql = mysqli_query($connect,"UPDATE barang SET stokutuh = stokutuh+$_POST[jumlah] WHERE kodebarang = '$_POST[kodebarang]'");
}else{
	echo "Gagal Menambahkan Data</br>";
	echo "ERROR : ".mysqli_error($connect);
}

?>