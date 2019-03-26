<?php
include ("../../../config/koneksi.php");

$sql="UPDATE retur SET jmlkembali = $_POST[jumlah] WHERE koderetur = '$_POST[koderetur]'";
mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

$stok="UPDATE barang SET stok = stok+$_POST[jumlah] WHERE kodebarang = '$_POST[kodebarang]'";
mysqli_query($connect, $stok) or exit ("Error query : ".$stok);

header('location:../../retur_barang.php');

?>

