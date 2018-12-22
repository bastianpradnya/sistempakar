<?php
	include "../../../proses-login/session.php";

	$kode_gejala = $_POST['kode_gejala'];
	$nama_gejala = $_POST['nama_gejala'];

	include "../../../proses-login/koneksi.php";
	$sql = "INSERT INTO gejala(kode_gejala, nama_gejala) VALUES('$kode_gejala','$nama_gejala')" ;
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil) {
		echo "Gagal Simpan, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
		exit;
	} else {
		echo "Simpan data berhasil..." ;
	}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../../page/gejala.php">';
?>
