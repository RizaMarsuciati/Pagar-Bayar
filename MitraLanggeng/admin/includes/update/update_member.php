<?php
include ("../../../config/koneksi.php");

$ubah = mysqli_query($connect,"UPDATE member SET namamember = '$_POST[namamember]',jenkel = '$_POST[jenkel]',notelp = '$_POST[notelp]',alamat = '$_POST[alamat]' WHERE idmember = '$_POST[idmember]'"); 
  if($ubah){   

	header('location:../../member.php');
}
else{
  echo "Data gagal diubah</br>";
  echo "Ada yang error : ".mysql_error();
}
?>
