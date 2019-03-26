<?php
include ("../../../config/koneksi.php");

$ubah = mysqli_query($connect,"UPDATE kategori SET namakategori = '$_POST[namakategori]' WHERE kodekategori = '$_POST[kodekategori]'"); 
  if($ubah){      

	header('location:../../kategori.php');
}
else{
  echo "Data gagal diubah</br>";
  echo "Ada yang error : ".mysql_error();
}
?>
