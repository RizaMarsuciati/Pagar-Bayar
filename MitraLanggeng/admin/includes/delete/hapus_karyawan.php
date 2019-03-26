<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM user WHERE kodeuser='$_GET[id]'");

header('location:../../karyawan.php');
?>

