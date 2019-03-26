<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM barang WHERE kodebarang='$_GET[id]'");

header('location:../../barang.php');
?>