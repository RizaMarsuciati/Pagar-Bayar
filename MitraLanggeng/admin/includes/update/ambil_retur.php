<?php
include ("../../../config/koneksi.php");

$stok="UPDATE retur SET tglambil = NOW() WHERE koderetur = '$_GET[id]'";
mysqli_query($connect, $stok) or exit ("Error query : ".$stok);

header('location:../../retur_barang.php');

?>