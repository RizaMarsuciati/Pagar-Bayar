<?php
include '../config/koneksi.php';
$idmember = $_GET['idmember'];
$query = mysqli_query($connect, "SELECT  * FROM member where idmember='$idmember'");
$transaksi = mysqli_fetch_array($query);
$data=array(
'idmember' => $transaksi['idmember'],
'namamember' => $transaksi['namamember'],);
echo json_encode($data);
?>

