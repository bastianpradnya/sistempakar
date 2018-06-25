<?php
// include database connection file
include "koneksi.php";
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$kode_penyakit=$_POST['kode'];
	$nama_penyakit=$_POST['nama'];
		
	// update user data
	$sql = "UPDATE penyakit SET nama_penyakit='".$nama_penyakit."' WHERE kode_penyakit='".$kode_penyakit."'";
	$result = mysqli_query($konek, $sql);
	if(!$result){
		die ("Gagal Query..".mysqli_error($konek));
	}
	// Redirect to homepage to display updated user in list
	header("Location: penyakit.php");
}
?>