<?php
	include "../../../proses-login/session.php";

	$kode_penyakit = $_POST['kode'];
  $penyebab = $_POST['penyebab'];
 	$penanggulangan = $_POST['penanggulangan'];

  include "../../../proses-login/koneksi.php";
	$sql = "INSERT INTO solusi(kode_penyakit, penyebab, penanggulangan)
          VALUES('$kode_penyakit','$penyebab','$penanggulangan')" ;
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil) {
		echo "Gagal Simpan, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
		exit;
	} else {
		echo "Simpan data berhasil..." ;
	}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../../page/solusi.php">';
?>
