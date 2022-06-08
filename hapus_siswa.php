<?php
	include'koneksi.php';
	$id_siswa = $_GET['id_siswa'];
$sql=mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = $id_siswa");
header("location: siswa.php");	
?>