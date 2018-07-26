<?php
	$kode_penyakit = $_POST['kodep'];
	$kode_gejala = $_POST['kodeg'];
	$nilai = $_POST['nilai'];

	echo $kode_penyakit;
	echo $kode_gejala;
	echo $nilai;
	 
	include "../proses_login/koneksi.php";

	$sql = "INSERT INTO basis_pengetahuan (id_pengetahuan, kode_penyakit, kode_gejala, nilai_belief) 
			VALUES (NULL,'$kode_penyakit','$kode_gejala','$nilai')";
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil) {
		echo "Gagal Simpan, silahkan diulangi... <br/>";
		echo mysqli_error($konek);
		exit;
	} else {
		echo "Simpan data berhasil..." ;
	}
	header("Location:kaidah.php");
 ?>