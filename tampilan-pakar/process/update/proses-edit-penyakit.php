<?php
	include "../../../proses-login/session.php";

	$kode_penyakit=$_POST['kode'];
	$nama_penyakit=$_POST['nama'];

  include "../../../proses-login/koneksi.php";
	$sql = "UPDATE penyakit SET nama_penyakit='".$nama_penyakit."' WHERE kode_penyakit='".$kode_penyakit."'";
	$result = mysqli_query($konek, $sql);
	if(!$result){
		die ("Gagal Query..".mysqli_error($konek));
	}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL= ../../page/penyakit.php">';
?>
