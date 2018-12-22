<?php
	$kode_gejala = $_POST['gejala'];
	include "../../../proses-login/koneksi.php";
	$sql_insert = "insert into temp_konsultasi(temp_kode_gejala) values('$kode_gejala')" ;
	$hasil_insert = mysqli_query($konek, $sql_insert);
	if(!$hasil_insert) {
		echo "Gagal Simpan Kode Gejala, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
	}
?>

<?php
	include "../../../proses-login/koneksi.php";
	$sql_nama_gejala = "select nama_gejala from gejala where kode_gejala ='$kode_gejala'" ;
	$output_nama = mysqli_query($konek, $sql_nama_gejala);
	if(!$output_nama) {
		echo "Gagal Simpan Kode Gejala, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
	}
	$tampil_nama = mysqli_fetch_assoc($output_nama);
?>

<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Tambah Kaidah Penyakit</title>
		<!-- Bootstrap core CSS-->
		<link href="../../../tampilan-pakar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom fonts for this template-->
		<link href="../../../tampilan-pakar/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Custom styles for this template-->
		<link href="../../../tampilan-pakar/css/sb-admin.css" rel="stylesheet">

	</head>

	<body class="bg-dark">

		<div class="container">
			<div class="card card-login mx-auto mt-5">
			<div class="card-header">Tambah Gejala</div>
				<div class="card-body">
					<form action="tambah-konsultasi.php" method="post">

						<!-- Menentukan nilai max belief -->
						<?php
							include "../../../proses-login/koneksi.php";
							$sql_rata = "SELECT round(max(nilai_belief),2) AS RerataNilai FROM basis_pengetahuan WHERE kode_gejala = '$kode_gejala'" ;
							$hasil_rata = mysqli_query($konek, $sql_rata);
						?>

						<?php while ($rata = mysqli_fetch_assoc($hasil_rata)){ ?>
							<input type="hidden" name="kode" value="<?php echo $kode_gejala; ?>"/>
							<input type="hidden" name="belief" value="<?php echo $rata['RerataNilai']; ?>"/>
							<div class="form-group">
								<label for="text">Nama Gejala:</label>
								<input type="text" name="gejala" class="form-control" readonly value="<?php echo $tampil_nama['nama_gejala'];?>">
							</div>
						<?php } ?>

						<!-- Menentukan penyakit -->
						<?php
							include "../../../proses-login/koneksi.php";
							$sql_dugaan = "SELECT basis_pengetahuan.kode_penyakit AS 'kdPenyakit'
											FROM basis_pengetahuan
											WHERE basis_pengetahuan.kode_gejala ='$kode_gejala'" ;
							$hasil_dugaan = mysqli_query($konek,$sql_dugaan);
						?>

						<textarea name="dugaan" style="display:none;"><?php
							while ($rata = mysqli_fetch_assoc($hasil_dugaan)){
							include "../../../proses-login/koneksi.php";
							$lihat_dugaan = "SELECT nama_penyakit FROM penyakit WHERE kode_penyakit ='".$rata['kdPenyakit']."'";
							$hasil_penyakit = mysqli_query($konek,$lihat_dugaan);
							$tampil = mysqli_fetch_assoc($hasil_penyakit);
							echo $tampil['nama_penyakit'].", ";}
						?></textarea>

						<button class="btn btn-info" type="submit">Tambah</button>
						<!-- <a href="../../konsultasi.php" class="btn btn-danger" role="button">Batal</a> -->
					</form>
				</div>
			</div>
		</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="../../../tampilan-pakar/vendor/jquery/jquery.min.js"></script>
		<script src="../../../tampilan-pakar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="../../../tampilan-pakar/vendor/jquery-easing/jquery.easing.min.js"></script>

	</body>

</html>
