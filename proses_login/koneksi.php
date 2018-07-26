<?php
	$host     = "localhost";
	$username = "root";
	$password = "";

	$konek = new mysqli($host, $username, $password);
	if ($konek->connect_error) {
	    die("Koneksi Server Gagal: ");
	}
	$dbname = "sistem_pakar";
	$dbselect = mysqli_select_db($konek, $dbname);
	if($dbselect == False){
		echo "Koneksi Database Gagal <br>";
	}
?>