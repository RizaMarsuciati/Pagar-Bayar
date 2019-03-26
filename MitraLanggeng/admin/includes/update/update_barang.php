<?php
include ("../../../config/koneksi.php");

if (!empty($_FILES['gambar']['name'])) {
	$gambar = rand(1000,100000)."-".$_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];
	$folder="../../assets/img/uploads/barang/";
	move_uploaded_file($lokasi,$folder.$gambar); 

	$ubah =	mysqli_query($connect, "UPDATE barang SET gambar = '$gambar' WHERE kodebarang = '$_POST[kodebarang]'");
}

$ubah = mysqli_query($connect,"UPDATE barang SET namabarang = '$_POST[namabarang]', hargabeli = '$_POST[hargabeli]', hargajual = '$_POST[hargajual]', stokutuh = '$_POST[stokutuh]', stok = '$_POST[stok]', kodesatuan = '$_POST[kodesatuan]', kodekategori = '$_POST[kodekategori]' WHERE kodebarang = '$_POST[kodebarang]'"); 
  if($ubah){      
  header('location:../../barang.php');
}
else{
  echo "Data gagal diubah</br>";
  echo "Ada yang error : ".mysqli_error($connect);
} 


?>


