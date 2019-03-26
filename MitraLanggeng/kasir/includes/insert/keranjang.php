<?php
	include ("../../../config/koneksi.php");
	
	$tampil=mysqli_query($connect, "SELECT namabarang, hargajual FROM barang WHERE kodebarang='".$_POST['kodebarang']."'"); 
    $data=mysqli_fetch_array($tampil);


	$sql="INSERT INTO detailpenjualan (kodedtpenjualan, namabarang, jumlah, hargajual, total, kodepenjualan, kodebarang)VALUES";
	$sql.="('','".$data['namabarang']."','".$_POST['jumlah']."','".$data['hargajual']."','".$data['hargajual']*$_POST['jumlah']."','".$_POST['kodepenjualan']."','".$_POST['kodebarang']."')";

	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

	if($sql){
	echo "Berhasil Menambahkan Data";	 
	echo "<meta http-equiv='refresh'>";
	header('location:../../tambah_penjualan.php');
	$sql = mysqli_query($connect,"UPDATE barang SET stok = stok-$_POST[jumlah] WHERE kodebarang = '$_POST[kodebarang]'");
}else{
	echo "Gagal Menambahkan Data</br>";
	echo "ERROR : ".mysqli_error($connect);
}

?>