<?php
include '../config/koneksi.php';
if(isset($_GET['q'])){
$namabarang = $_GET['q'];
	$query = mysqli_query($connect, "SELECT kodebarang as id, namabarang as text FROM barang where namabarang LIKE '%$namabarang%'");

	$res = array();
	while ($data=mysqli_fetch_array($query)){
	 	$res[]=$data;
	}
	echo json_encode(array("results"=>$res));

}