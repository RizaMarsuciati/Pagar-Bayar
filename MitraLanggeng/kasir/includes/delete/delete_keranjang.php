<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM detailpenjualan WHERE kodedtpenjualan='$_GET[id]'");

$sql="UPDATE barang SET stok = stok+$_GET[jumlah] WHERE kodebarang = '$_GET[kodebarang]'";
mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

header('location:../../tambah_penjualan.php');

?>