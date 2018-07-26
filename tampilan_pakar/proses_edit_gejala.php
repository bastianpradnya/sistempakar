<?php
// include database connection file
include "../proses_login/koneksi.php";
 	
	$kode_gejala=$_POST['kode'];
	$nama_gejala=$_POST['nama'];
		
	// update user data
	$sql = "UPDATE gejala SET nama_gejala='".$nama_gejala."' WHERE kode_gejala='".$kode_gejala."'";
	$result = mysqli_query($konek, $sql);
	if(!$result){
		die ("Gagal Query..".mysqli_error($konek));
	}
	// Redirect to homepage to display updated user in list
	header("Location: gejala.php");

?>