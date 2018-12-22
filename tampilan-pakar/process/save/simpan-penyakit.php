<?php
	include "../../../proses-login/session.php";

	$kode_penyakit = $_POST['kode_penyakit'];
	$nama_penyakit = $_POST['nama_penyakit'];

	include "../../../proses-login/koneksi.php";
	$sql = "INSERT INTO penyakit(kode_penyakit, nama_penyakit) VALUES('$kode_penyakit','$nama_penyakit')" ;
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil) {
		echo "Gagal Simpan, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
		exit;
	} else {
		echo "Simpan data berhasil..." ;
	}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../../page/penyakit.php">';
?>
