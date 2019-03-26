<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM transaksi WHERE kodetransaksi='$_GET[id]'");

header('location:../../transaksi_pembelian.php');
?>