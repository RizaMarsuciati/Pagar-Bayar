<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM kategori WHERE kodekategori='$_GET[id]'");

header('location:../../kategori.php');
?>
