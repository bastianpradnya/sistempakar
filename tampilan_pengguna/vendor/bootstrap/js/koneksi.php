<?php
	$host     = "https://databases.000webhost.com";
	$username = "id6479230_satria";
	$password = "satria";

	$konek = new mysqli($host, $username, $password);
	if ($konek->connect_error) {
	    die("Koneksi Database Gagal: ");
	}
	$dbname = "id6479230_sistem_pakar";
	$dbselect = mysqli_select_db($konek, $dbname);
	if($dbselect == TRUE){
		echo "Koneksi Database Berhasil <br>";
	}else{
		echo "Koneksi Database Gagal <br>";
	}
?>