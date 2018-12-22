<?php
	$kode_gejala = "G015";
	$nilai_belief = 0.4;
	include "../../../proses-login/koneksi.php";
	$sql_login = "insert into temp_konsultasi(temp_kode_gejala)
			values('$kode_gejala')" ;
	$hasil_login = mysqli_query($konek, $sql_login);
	if(!$hasil_login) {
		echo "Gagal Simpan Kode Gejala, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
	}
?>

<?php
	include "../../../proses-login/koneksi.php";
	$sql_nama_gejala = "select nama_gejala from gejala where kode_gejala ='$kode_gejala'" ;
	$nama = mysqli_query($konek, $sql_nama_gejala);
	if(!$nama) {
		echo "Gagal Simpan Kode Gejala, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
	}
	$tampil_nama = mysqli_fetch_assoc($nama);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Konsultasi Gejala</title>
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
	  <div class="card-header">Pertanyaan</div>
      <div class="card-body">
        <form action="tambah_konsultasi.php" method="post">

					<!-- Menentukan nilai belief -->
					<input type="hidden" name="kode" value="<?php echo $kode_gejala; ?>"/>
					<input type="hidden" name="belief" value="<?php echo $nilai_belief; ?>"/>	<!--menentukan secara manual -->
					<div class="form-group">
						<label for="text">Muncul Gejala :</label>
						<input type="text" name="gejala" class="form-control" readonly value="<?php echo $tampil_nama['nama_gejala'];?>">
					</div>

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
										$output = mysqli_query($konek,$lihat_dugaan);
										$tampil = mysqli_fetch_assoc($output);
										echo $tampil['nama_penyakit'].", ";}
						?></textarea>

					<button class="btn btn-info" type="submit">Ya</button>
					<a href=tidak.php class="btn btn-danger">Tidak</a>
          <!-- <a href="../../konsultasi.php" class="btn btn-danger" role="button">Batal</a> -->
        </form>
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
