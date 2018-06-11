<?php
	$host     = "localhost";
	$username = "root";
	$password = "";

	$konek = new mysqli($host, $username, $password);
	if ($konek->connect_error) {
	    die("Koneksi Database Gagal: ");
	}
	$dbname = "sistem_pakar";
	$dbselect = mysqli_select_db($konek, $dbname);
	if($dbselect == TRUE){
		echo "<br>";
	}else{
		echo "Koneksi Database Gagal <br>";
	}
?>