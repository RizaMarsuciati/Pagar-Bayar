<?php
include ("../../../config/koneksi.php");

$ubah = mysqli_query($connect,"UPDATE supplier SET namasupplier = '$_POST[namasupplier]',alamat = '$_POST[alamat]',notelp = '$_POST[notelp]',ket = '$_POST[ket]' WHERE kodesupplier = '$_POST[kodesupplier]'"); 
  if($ubah){      

	header('location:../../supplier.php');
}
else{
  echo "Data gagal diubah</br>";
  echo "Ada yang error : ".mysql_error();
}
?>
