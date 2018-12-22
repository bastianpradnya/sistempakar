<?php
	include "../../../proses-login/session.php";

	$kode_penyakit=$_POST['kode'];
	$penyebab=$_POST['penyebab'];
	$penanggulangan=$_POST['penanggulangan'];

	include "../../../proses-login/koneksi.php";
	$sql = "UPDATE solusi SET penyebab='".$penyebab."', penanggulangan='".$penanggulangan."' WHERE kode_penyakit='".$kode_penyakit."'";
	$result = mysqli_query($konek, $sql);
	if(!$result){
		die ("Gagal Query..".mysqli_error($konek));
	}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL= ../../page/solusi.php">';
?>
