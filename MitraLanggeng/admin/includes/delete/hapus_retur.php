<?php
include ("../../../config/koneksi.php");

$tampil=mysqli_query($connect, "SELECT kodebarang, jumlah FROM retur WHERE koderetur='$_GET[id]'");
while($data=mysqli_fetch_array($tampil)){
	$sql="UPDATE barang SET stok = stok+$data[jumlah] WHERE kodebarang = '$data[kodebarang]'";
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

}
mysqli_query($connect,"DELETE FROM retur WHERE koderetur='$_GET[id]'");

header('location:../../retur_barang.php');
?>

