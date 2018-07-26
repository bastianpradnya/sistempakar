<?php
	$kode_gejala = $_POST['kode_gejala'];
	$nama_gejala = $_POST['nama_gejala'];
	include "../proses_login/koneksi.php";
	$sql = "insert into gejala(kode_gejala, nama_gejala)
			values('$kode_gejala','$nama_gejala')" ;
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil) {
		echo "Gagal Simpan, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
		exit;
	} else {
		echo "Simpan data berhasil..." ;
	}
	header("Location:gejala.php");
?>