<?php
 include ("../config/koneksi.php");
  echo "  
               <input type='hidden' class='form-control' id='kodepenjualan' placeholder='kodepenjualan' name='kodepenjualan'>";

  $tampil=mysqli_query($connect, "SELECT a.kodepenjualan, a.tglpenjualan, b.namamember, b.notelp, a.status, a.piutang FROM penjualan a LEFT JOIN member b ON a.kodemember=b.kodemember WHERE kodepenjualan= '$_GET[kodepenjualan]'");
             $data=mysqli_fetch_array($tampil);



$isisms=$_GET['isisms'];
// Nomor Tujuan dan Isi SMS


 
// Nomor Tujuan dan Isi SMS
 
 $sms = [
    'nohp' => $data['notelp'],
    'pesan' =>  $_GET['isisms']
];


// Prepare dan Konfigurasi
$baseUrl = 'http://reguler.zenziva.net/apps/smsapi.php';
$config = [
    'userkey' => 'oqhnjv',
    'passkey' => 'd1wa37ltyg'
];
$params = array_merge($config, $sms);
$uri = $baseUrl . '?' . http_build_query($params);
 
// Kirim HTTP GET
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $uri);
$result = curl_exec($curl);
 
// Tampilkan Hasil/Response dari Zenziva
//header('Content-type: application/xml');
echo $result; 


//echo "$data[notelp]";
//echo "$isisms";
?>
<?php
$ubah = mysqli_query($connect,"UPDATE penjualan SET tgltagihan = NOW() WHERE kodepenjualan ='$_GET[kodepenjualan]'"); 
  if($ubah){      
  header('location:tagihan.php');
}
else{
  echo "Data gagal diubah</br>";
  echo "Ada yang error : ".mysql_error();
} 
