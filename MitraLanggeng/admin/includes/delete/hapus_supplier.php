<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM supplier WHERE kodesupplier='$_GET[id]'");

header('location:../../supplier.php');
?>

