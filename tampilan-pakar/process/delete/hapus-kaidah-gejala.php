<?php
  include "../../../proses-login/session.php";
  include "../../../proses-login/koneksi.php";

  $id = $_GET['idpengetahuan'];

  $sql = "SELECT * FROM basis_pengetahuan WHERE id_pengetahuan='".$id."'";
  $hasil = mysqli_query($konek, $sql);
  $tampil = mysqli_fetch_assoc($hasil);

  $sql2 = "SELECT nama_penyakit FROM penyakit WHERE kode_penyakit='".$tampil['kode_penyakit']."'";
  $hasil2 = mysqli_query($konek, $sql2);
  $tampil2 = mysqli_fetch_assoc($hasil2);

  $sql3 = "SELECT nama_gejala FROM gejala WHERE kode_gejala='".$tampil['kode_gejala']."'";
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
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Hapus Gejala Penyakit <?php echo $tampil2['nama_penyakit']?>?</div>
      <div class="card-body">
        <form action="proses-hapus-kaidah.php" method="post">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama Gejala</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <input type="hidden" value="<?php echo $tampil['id_pengetahuan']?>" name="id" />
                      <?php echo $tampil3['nama_gejala'] ?>
                  </td>
                  <td><?php echo $tampil['nilai_belief'] ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </form>
        <a href=proses-hapus-kaidah.php?idpengetahuan=<?php echo $tampil['id_pengetahuan'] ?> class="btn btn-info">Hapus</a>
        <a href="../../page/kaidah.php" class="btn btn-danger" role="button">Batal</a>
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
