<?php
include ("../../../config/koneksi.php");
$tampil=mysqli_query($connect, "SELECT kodebarang, jumlah FROM detailpembelian WHERE kodepembelian='$_GET[id]'");
while($data=mysqli_fetch_array($tampil)){
	$sql="UPDATE barang SET stokutuh = stokutuh-$data[jumlah] WHERE kodebarang = '$data[kodebarang]'";
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);
}
mysqli_query($connect,"DELETE FROM detailpembelian WHERE kodepembelian='$_GET[id]'");
mysqli_query($connect,"DELETE FROM pembelian WHERE kodepembelian='$_GET[id]'");

header('location:../../pembelian.php');

?>