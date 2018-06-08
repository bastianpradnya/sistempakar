<?php
	$kode_penyakit = $_POST['kode_penyakit'];
	$kode_gejala = $_POST['kode_gejala'];
	$nilai_belief = $_POST['nilai_belief'];
	include "koneksi.php";
	$sql = "insert into basis_pengetahuan(kode_penyakit, kode_gejala, nilai_belief)
			values('$kode_penyakit','$kode_gejala',$nilai_belief)" ;
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil) {
		echo "Gagal Simpan, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
		exit;
	} else {
		echo "Simpan data berhasil..." ;
	}
?>
<a href="tampil_pengetahuan.php"> OK </a>