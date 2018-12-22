<?php
  include "../../../proses-login/session.php";
  include "../../../proses-login/koneksi.php";

  $id = $_GET['idpengetahuan'];

  // Query pada tabel basis_pengetahuan
  $sql_bp = "SELECT * FROM basis_pengetahuan WHERE id_pengetahuan='".$id."'";
  $hasil_bp = mysqli_query($konek, $sql_bp);
  $tampil_bp = mysqli_fetch_assoc($hasil_bp);

  // Query pada tabel penyakit
  $sql_p = "SELECT nama_penyakit FROM penyakit WHERE kode_penyakit='".$tampil_bp['kode_penyakit']."'";
  $hasil_p = mysqli_query($konek, $sql_p);
  $tampil_p = mysqli_fetch_assoc($hasil_p);

  // Query pada tabel gejala
  $sql_g = "SELECT nama_gejala FROM gejala WHERE kode_gejala='".$tampil_bp['kode_gejala']."'";
  $hasil_g = mysqli_query($konek, $sql_g);
  $tampil_g = mysqli_fetch_assoc($hasil_g);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Tambah Kaidah Penyakit</title>
  <!-- Bootstrap core CSS-->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Ubah Kaidah <?php echo $tampil_p['nama_penyakit'];?></div>
      <div class="card-body">
        <form action="proses-edit-kaidah.php" method="post">
          <input type="hidden" value="<?php echo $id?>" name="id" />
          <div class="form-group">
            <label for="text">Nama Gejala:</label>
            <input type="text" name="gejala" class="form-control" readonly value="<?php echo $tampil_g['nama_gejala']?>">
          </div>
          <div class="form-group">
            <label for="text">Nilai:</label>
            <input type="text" name="nilai" class="form-control" value=<?php echo $tampil_bp['nilai_belief']?>>
          </div>
          <button class="btn btn-info" type="submit">Simpan</button>
          <a href="../../page/kaidah.php" class="btn btn-danger" role="button">Batal</a>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
