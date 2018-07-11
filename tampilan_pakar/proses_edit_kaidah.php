<?php
// include database connection file
include "koneksi.php";
	 
	$id=$_POST['id'];
	$nilai_belief=$_POST['nilai'];
	echo $id;
		echo $nilai_belief;
		
	// update user data
	$sql = "UPDATE basis_pengetahuan SET nilai_belief= $nilai_belief  WHERE basis_pengetahuan.id_pengetahuan=$id";
	$result = mysqli_query($konek, $sql);
	if(!$result){
		die ("Gagal Query..".mysqli_error($konek));
	}
	// Redirect to homepage to display updated user in list
	header("Location: kaidah.php");

?>