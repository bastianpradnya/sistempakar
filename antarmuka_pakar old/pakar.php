<html>
<head>
	<title>
		SISTEM PAKAR PENYAKIT AYAM
	</title>
<head/>
<body>
<?php
	include '../proses_login/session.php';
	echo "Hallo $login_session";
?>
	<br>
	<h2>Tambah Pengetahuan</h2>
	<a href="../proses_akuisisi_pengetahuan/tambah_gejala.php"> Tambah Gejala</a> <br>
	<a href="../proses_akuisisi_pengetahuan/tambah_penyakit.php"> Tambah Penyakit</a><br>
	<a href="../proses_akuisisi_pengetahuan/tambah_kaidah.php"> Tambah Kaidah</a><br>
	<a href="../proses_akuisisi_pengetahuan/tambah_solusi.php"> Tambah Solusi</a><br>
	<h2>Tampil Pengetahuan</h2>
	<a href="../proses_akuisisi_pengetahuan/tampil_gejala.php"> Tampil Gejala</a><br>
	<a href="../proses_akuisisi_pengetahuan/tampil_penyakit.php"> Tampil Penyakit</a><br>
	<a href="../proses_akuisisi_pengetahuan/tampil_Kaidah.php"> Tampil Kaidah</a><br>
	<a href="../proses_akuisisi_pengetahuan/tampil_solusi.php"> Tampil Solusi</a><br><br>
	<a href="../proses_login/logout.php">Logout</a>
</body>
</html>
