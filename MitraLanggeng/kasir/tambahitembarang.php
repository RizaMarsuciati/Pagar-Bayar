<?php
include '../config/koneksi.php';
if(isset($_GET['kodebarang'])){
$kodebarang = $_GET['kodebarang'];
$query = mysqli_query($connect, "SELECT kodebarang, namabarang, stok FROM barang where kodebarang='$kodebarang'");
echo json_encode(mysqli_fetch_assoc($query));
}