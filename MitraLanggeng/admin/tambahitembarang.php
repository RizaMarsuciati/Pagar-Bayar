<?php
include '../config/koneksi.php';
if(isset($_GET['kodebarang'])){
$kodebarang = $_GET['kodebarang'];
$query = mysqli_query($connect, "SELECT kodebarang, namabarang, hargabeli FROM barang where kodebarang='$kodebarang'");
$tambahstoksatuanbarang = mysqli_fetch_array($query);
$data=array(
'kodebarang' => $tambahstoksatuanbarang['kodebarang'],
'namabarang' => $tambahstoksatuanbarang['namabarang'],
'hargabeli' => $tambahstoksatuanbarang['hargabeli'],);
echo json_encode($data);
}?>