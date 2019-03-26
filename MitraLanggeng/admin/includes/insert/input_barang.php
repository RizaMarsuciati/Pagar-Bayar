<?php
	$gambar = rand(1000,100000)."-".$_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];
	$folder="../../assets/img/uploads/barang/";
	move_uploaded_file($lokasi,$folder.$gambar); 
?>

<?php
	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO barang (namabarang, hargabeli, hargajual, stokutuh, stok, kodesatuan, kodekategori, gambar)VALUES";
	$sql.="('".$_POST['namabarang']."','".$_POST['hargabeli']."','".$_POST['hargajual']."','".$_POST['stokutuh']."','".$_POST['stok']."','".$_POST['kodesatuan']."','".$_POST['kodekategori']."','".$gambar."')";
	
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);
	echo"Berhasil menambahkan data";
	header('location:../../barang.php');
?>