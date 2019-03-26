<?php
include ("../../../config/koneksi.php");

$sql="UPDATE barang SET stokutuh = stokutuh-$_POST[bukastok] WHERE kodebarang = '$_POST[kodebarang]'";
mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

$stok="UPDATE barang SET stok = stok+($_POST[bukastok]*$_POST[jumlah]) WHERE kodebarang = '$_POST[kodebarang]'";
mysqli_query($connect, $stok) or exit ("Error query : ".$stok);


	header('location:../../persediaan_barang.php');

?>