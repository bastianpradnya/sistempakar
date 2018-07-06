<?php 
    include "../proses_login/session.php";
?>

<?php
              $nama_penyakit = $_POST['sel1'];
?>

<?php 
  include "koneksi.php";
  $sql3 = "select kode_penyakit from penyakit where nama_penyakit='".$nama_penyakit."'";
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
  <title>Tambah Kaidah Penyakit</title>
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
      <div class="card-header">Tambah Kaidah Penyakit</div>
      <div class="card-body">
        <form action="tambah_nilai.php" method="post">
          <div class="form-group">
            <label for="text">Kode Penyakit:</label>
              <input type="text" name="kode" class="form-control" readonly value="<?php echo $tampil2['kode_penyakit'] ?>">
          </div>
          <div class="form-group">
            <label for="text">Nama Penyakit:</label>
              <input type="text" name="nama" class="form-control" readonly value="<?php echo $nama_penyakit ?>">
          </div>
          <div class="form-group">
                <?php
                  include "koneksi.php";
                  $sql3 = "select * from gejala order by kode_gejala";
                  $nama2 = mysqli_query($konek, $sql3);
                ?>
                  <label for="sel1">Pilih Penyakit:</label>
                    <select class="form-control" name="sel2">
                    <?php while ($row3 = mysqli_fetch_assoc($nama2)){ ?>
                      <option><?php echo $row3['nama_gejala']?></option>
                      <?php } ?>
                    </select>
            </div>
          <button class="btn btn-info" type="submit">Lanjut</button>
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
