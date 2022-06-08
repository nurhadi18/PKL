<?php
	include'koneksi.php';
	$id_guru = $_GET['id_guru'];
$sql=mysqli_query($koneksi, "DELETE FROM guru WHERE id_guru = $id_guru");
header("location: guru.php");	
?>