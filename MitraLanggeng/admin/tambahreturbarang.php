<?php
include '../config/koneksi.php';
if(isset($_GET['kodebarang'])){
$kodebarang = $_GET['kodebarang'];
$query = mysqli_query($connect, "SELECT namabarang FROM barang where kodebarang='$kodebarang'");
$tambahstoksatuanbarang = mysqli_fetch_array($query);
$data=array(
'namabarang' => $tambahstoksatuanbarang['namabarang'],);
echo json_encode($data);
}?>