<?php
include ("../../../config/koneksi.php");

$ubah = mysqli_query($connect,"UPDATE pembelian SET uangtunai = '$_POST[uangtunai]',totalbayar = '$_POST[totalbayar]',status = '$_POST[status]',uangmuka = '$_POST[uangmuka]',persendiskon = '$_POST[diskon1]',hutang = '$_POST[hutang]',sisahutang = '$_POST[sisahutang]',kodesupplier = '$_POST[kodesupplier]' WHERE kodepembelian = '$_POST[kodepembelian]'"); 

	$tampil=mysqli_query($connect, "SELECT kodepembelian FROM pembelian ORDER BY kodepembelian DESC LIMIT 1");
    $data=mysqli_fetch_array($tampil);
  if($ubah){      
  echo "<meta http-equiv='refresh' content='0; url=../../detail_pembelian.php?id=$data[kodepembelian]'>";
}
else{
  echo "Data gagal diubah</br>";
  echo "Ada yang error : ".mysqli_error($connect);
} 
?>

