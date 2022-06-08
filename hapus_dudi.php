<?php
	include'koneksi.php';
	$id_dudi = $_GET['id_dudi'];
$sql=mysqli_query($koneksi, "DELETE FROM dudi WHERE id_dudi = $id_dudi");
header("location: dudi.php");	
?>