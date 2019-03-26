<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM satuan WHERE kodesatuan='$_GET[id]'");

header('location:../../satuan.php');
?>

