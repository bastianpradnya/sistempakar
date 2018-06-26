<?php
// include database connection file
include "koneksi.php";
 
// Check if form is submitted for user update, then redirect to homepage after update
	
	$kode_penyakit=$_POST['kode'];
	$penyebab=$_POST['penyebab'];
	$penanggulangan=$_POST['penanggulangan'];
		
	// update user data
	$sql = "UPDATE solusi SET penyebab='".$penyebab."', penanggulangan='".$penanggulangan."' WHERE kode_penyakit='".$kode_penyakit."'";
	$result = mysqli_query($konek, $sql);
	if(!$result){
		die ("Gagal Query..".mysqli_error($konek));
	}
	// Redirect to homepage to display updated user in list
	header("Location: solusi.php");
?>