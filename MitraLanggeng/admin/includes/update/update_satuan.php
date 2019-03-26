<?php
include ("../../../config/koneksi.php");

$ubah = mysqli_query($connect,"UPDATE satuan SET namasatuan = '$_POST[namasatuan]', jumlah = '$_POST[jumlah]' WHERE kodesatuan = '$_POST[kodesatuan]'"); 
  if($ubah){

	header('location:../../satuan.php');
}
else{
  echo "Data gagal diubah</br>";
  echo "Ada yang error : ".mysql_error($connect);
}
?>
