<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM member WHERE kodemember='$_GET[id]'");

header('location:../../member.php');
?>

