<?php 
  include "../proses_login/session.php";
  include "koneksi.php";

  $id = $_GET['idpengetahuan'];

  $sql = "select * from basis_pengetahuan where id_pengetahuan='".$id."'";
  $hasil = mysqli_query($konek, $sql);
  $tampil = mysqli_fetch_assoc($hasil);

  $sql2 = "select nama_penyakit from penyakit where kode_penyakit='".$tampil['kode_penyakit']."'";
  $hasil2 = mysqli_query($konek, $sql2);
  $tampil2 = mysqli_fetch_assoc($hasil2);

  $sql3 = "select nama_gejala from gejala where kode_gejala='".$tampil['kode_gejala']."'";
  $hasil3 = mysqli_query($konek, $sql3);
  $tampil3 = mysqli_fetch_assoc($hasil3);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Hapus Kaidah Penyakit</title>
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
      <div class="card-header">Hapus Gejala Penyakit <?php echo $tampil2['nama_penyakit']?>?</div>
      <div class="card-body">
        <form action="proses_hapus_kaidah.php" method="post">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                        <th>ID</th>
                        <th>Nama Gejala</th>
                        <th>Nilai</th>
                      </tr>
                    </thead>
                      <tbody>
                          <tr>
                            <td><?php echo $tampil['id_pengetahuan'] ?></td>
                            <td><?php echo $tampil3['nama_gejala'] ?></td>
                            <td><?php echo $tampil['nilai_belief'] ?></td>
                          </tr>
                    </tbody>
                  </table>
                </div>
              </form>
            <a href=proses_hapus_kaidah.php?idpengetahuan=<?php echo $tampil['id_pengetahuan'] ?> class="btn btn-info">Hapus</a>
            <a href="kaidah.php" class="btn btn-danger" role="button">Batal</a>
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