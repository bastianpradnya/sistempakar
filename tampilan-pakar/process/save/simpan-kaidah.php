<?php
	include "../../../proses-login/session.php";

	$kode_penyakit = $_POST['kodep'];
	$kode_gejala = $_POST['kodeg'];
	$nilai = $_POST['nilai'];

	include "../../../proses-login/koneksi.php";
	$sql = "INSERT INTO basis_pengetahuan (id_pengetahuan, kode_penyakit, kode_gejala, nilai_belief) VALUES (NULL,'$kode_penyakit','$kode_gejala','$nilai')";
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil) {
		echo "Gagal Simpan, silahkan diulangi... <br/>";
		echo mysqli_error($konek);
		exit;
	} else {
		echo "Simpan data berhasil..." ;
	}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../../page/kaidah.php">';
 ?>
