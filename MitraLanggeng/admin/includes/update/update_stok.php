<?php
include ("../../../config/koneksi.php");

$ubah = mysqli_query($connect,"UPDATE barang SET stok = '$_POST[stok]' WHERE kodebarang = '$_POST[kodebarang]'"); 
  if($ubah){     

	header('location:../../barang_habis.php');
}
else{
  echo "Data gagal diubah</br>";
  echo "Ada yang error : ".mysql_error();
}
?>
