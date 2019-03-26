<?php
include ("../../../config/koneksi.php");

$ubah = mysqli_query($connect,"UPDATE penjualan SET uangtunai = '$_POST[uangtunai]',total = '$_POST[total]',status = '$_POST[status]',uangmuka = '$_POST[uangmuka]',persenbunga = '$_POST[bunga1]',piutang = '$_POST[piutang]',sisapiutang = '$_POST[sisapiutang]',tgltagihan = NOW(),kodemember = '$_POST[kodemember]' WHERE kodepenjualan = '$_POST[kodepenjualan]'"); 


	$tampil=mysqli_query($connect, "SELECT kodepenjualan FROM penjualan ORDER BY kodepenjualan DESC LIMIT 1");
    $data=mysqli_fetch_array($tampil);
  if($ubah){   
     
  echo "<meta http-equiv='refresh' content='0; url=../../detail_penjualan.php?id=$data[kodepenjualan]'>";
}
else{
  echo "Data gagal diubah</br>";
  echo "Ada yang error : ".mysqi_error($connect);
} 
?>
