<?php 
  include "../proses_login/session.php";
  include "koneksi.php";

	$solusi_kd_penyakit = $_POST['kode'];

	// Query pada tabel gejala
	$sql_s = "select * from solusi WHERE kode_penyakit='".$solusi_kd_penyakit."'";
  $tampil_s = mysqli_query($konek, $sql_s );
  
  // Perulangan untuk menampilkan data tabel solusi
	while($row_s = mysqli_fetch_array($tampil_s)){
    $kode_penyakit = $row_s['kode_penyakit'];
    $penyebab = $row_s['penyebab'];
    $penanggulangan = $row_s['penanggulangan'];
  }

  // Query pada tabel penyakit
  $sql_p = "select nama_penyakit from penyakit where kode_penyakit='".$kode_penyakit."'";
  $hasil_p = mysqli_query($konek, $sql_p);
  $tampil_p = mysqli_fetch_assoc($hasil_p);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Tambah Info Penyakit</title>
  <!-- Bootstrap core CSS-->
  <link href="../tampilan_pakar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../tampilan_pakar/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../tampilan_pakar/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Ubah Detail Penyakit <?php echo $tampil_p['nama_penyakit'];?></div>
      <div class="card-body">
        <form action="proses_edit_solusi.php" method="post">
          <div class="form-group">
            <label for="text">Kode Penyakit:</label>
            <input type="text" name="kode" class="form-control" readonly value="<?php echo $kode_penyakit ?>">
          </div>
          <div class="form-group">
            <label for="comment">Penyebab :</label>
            <textarea class="form-control" rows="5" id="comment" id="message" name="penyebab"><?php echo $penyebab?></textarea>
            </div>
					<div class="form-group">
            <label for="comment">Penanggulangan :</label>
            <textarea class="form-control" rows="5" id="comment" id="message" name="penanggulangan"><?php echo $penanggulangan?></textarea>
          </div>
          <button class="btn btn-info" type="submit">Simpan</button>
          <a href="solusi.php" class="btn btn-danger" role="button">Batal</a>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="../tampilan_pakar/vendor/jquery/jquery.min.js"></script>
  <script src="../tampilan_pakar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../tampilan_pakar/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>