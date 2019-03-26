<?php
include ("../../../config/koneksi.php");

$ubah = mysqli_query($connect,"UPDATE user SET iduser = '$_POST[iduser]',namauser = '$_POST[namauser]',jenkel = '$_POST[jenkel]',notelp = '$_POST[notelp]',alamat = '$_POST[alamat]',username = '$_POST[username]' WHERE kodeuser = '$_POST[kodeuser]'"); 
  if($ubah){ 

	header('location:../../karyawan.php');
}
else{
  echo "Data gagal diubah</br>";
  echo "Ada yang error : ".mysql_error();
} 
?>
