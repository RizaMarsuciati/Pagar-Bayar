<?php
include ("../../../config/koneksi.php");

$ubah = mysqli_query($connect,"UPDATE penjualan SET tgltagihan = NOW() WHERE kodepenjualan ='$_GET[id]'"); 
  if($ubah){ 

	header('location:../../smsapi.php');
}
else{
  echo "Data gagal diubah</br>";
  echo "Ada yang error : ".mysql_error();
} 
?>