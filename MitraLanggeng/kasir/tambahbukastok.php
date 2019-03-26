<?php
include '../config/koneksi.php';
if(isset($_GET['kodebarang'])){
$kodebarang = $_GET['kodebarang'];
$query = mysqli_query($connect, "SELECT a.kodebarang, a.namabarang, a.stokutuh, a.stok, b.namasatuan, b.jumlah FROM barang a LEFT JOIN satuan b ON a.kodesatuan=b.kodesatuan where a.kodebarang='$kodebarang'");
echo json_encode(mysqli_fetch_assoc($query));  
}?> 