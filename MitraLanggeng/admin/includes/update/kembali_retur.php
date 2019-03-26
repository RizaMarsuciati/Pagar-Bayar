<?php
include ("../../../config/koneksi.php");

$stok="UPDATE barang SET stok=stok+$_POST[jumlah] WHERE koderetur = '$_GET[id]'";
mysqli_query($connect, $stok) or exit ("Error query : ".$stok);

header('location:../../retur_barang.php');

?>