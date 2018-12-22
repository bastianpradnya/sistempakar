<?php
	include "../../../proses-login/session.php";

	$kode_gejala=$_POST['kode'];
	$nama_gejala=$_POST['nama'];

  include "../../../proses-login/koneksi.php";
	$sql = "UPDATE gejala SET nama_gejala='".$nama_gejala."' WHERE kode_gejala='".$kode_gejala."'";
	$result = mysqli_query($konek, $sql);
	if(!$result){
		die ("Gagal Query..".mysqli_error($konek));
	}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL= ../../page/gejala.php">';

?>
