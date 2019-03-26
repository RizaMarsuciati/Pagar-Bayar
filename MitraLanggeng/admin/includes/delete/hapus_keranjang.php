<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM detailpembelian WHERE kodedtpembelian='$_GET[id]'");

$sql="UPDATE barang SET stokutuh = stokutuh-$_GET[jumlah] WHERE kodebarang = '$_GET[kodebarang]'";
mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

header('location:../../tambah_pembelian.php');

?>
