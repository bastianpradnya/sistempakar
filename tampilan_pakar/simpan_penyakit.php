<?php
	$kode_penyakit = $_POST['kode_penyakit'];
	$nama_penyakit = $_POST['nama_penyakit'];
	include "koneksi.php";
	$sql = "insert into penyakit(kode_penyakit, nama_penyakit)
			values('$kode_penyakit','$nama_penyakit')" ;
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil) {
		echo "Gagal Simpan, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
		exit;
	} else {
		echo "Simpan data berhasil..." ;
	}
	header("Location:penyakit.php");
?>
<a href="penyakit.php"> OK </a>