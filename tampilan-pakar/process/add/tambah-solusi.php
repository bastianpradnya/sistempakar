<?php
    include "../../../proses-login/session.php";
?>

<?php
  $nama_penyakit = $_POST['sel1'];
?>

<?php
  include "../../../proses-login/koneksi.php";
  $sql3 = "SELECT kode_penyakit FROM penyakit WHERE nama_penyakit='".$nama_penyakit."'";
  $nama2 = mysqli_query($konek, $sql3);
  $tampil2 = mysqli_fetch_assoc($nama2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Tambah Info Penyakit</title>
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
    <div class="card-header">Tambah Solusi Penyakit</div>
      <div class="card-body">
        <form action="../save/simpan-solusi.php" method="post">
          <div class="form-group">
            <label for="text">Kode Penyakit:</label>
            <input type="text" name="kode" class="form-control" readonly value="<?php echo $tampil2['kode_penyakit'] ?>">
          </div>
          <div class="form-group">
            <label for="text">Nama Penyakit:</label>
            <input type="text" name="nama" class="form-control" readonly value="<?php echo $nama_penyakit ?>">
          </div>
          <div class="form-group">
            <label for="comment">Penyebab :</label>
            <textarea class="form-control" rows="5" id="comment" name="penyebab"></textarea>
          </div>
          <div class="form-group">
            <label for="comment">Penanggulangan :</label>
            <textarea class="form-control" rows="5" id="comment" name="penanggulangan"></textarea>
          </div>
          <button class="btn btn-info" type="submit">Simpan</button>
          <a href="../../page/solusi.php" class="btn btn-danger" role="button">Batal</a>
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
