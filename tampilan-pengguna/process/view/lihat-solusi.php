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
    <link href="../../../tampilan_pakar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../../../tampilan_pakar/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../../../tampilan_pakar/css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Solusi Penyakit
          <?php
            include "../../../proses-login/koneksi.php";
            $sql_nama_penyakit = "select penyakit.nama_penyakit AS penyakit from penyakit, temp_hasil WHERE penyakit.kode_penyakit = temp_hasil.kode_penyakit";
            $hasil_nama_penyakit = mysqli_query($konek, $sql_nama_penyakit);
            $tampil_nama_penyakit = mysqli_fetch_assoc($hasil_nama_penyakit);
            echo $tampil_nama_penyakit['penyakit'];
          ?>
        </div>
        <div class="card-body">
          <?php
            include "../../../proses-login/koneksi.php";
            $sql_solusi = "select * from solusi, temp_hasil where solusi.kode_penyakit = temp_hasil.kode_penyakit ";
            $hasil_solusi = mysqli_query($konek, $sql_solusi);
            if(!$hasil_solusi){
              die ("Gagal Query..".mysqli_error($konek));
            }
          ?>

          <?php while ($row = mysqli_fetch_assoc($hasil_solusi)) { ?>
              <form>
                <div class="form-group">
                  <label for="comment">Penyebab :</label>
                  <textarea class="form-control" rows="5" id="comment" id="message" name="penyebab" readonly><?php echo $row['penyebab']?></textarea>
                </div>
                <div class="form-group">
                  <label for="comment">Solusi Penanggulangan :</label>
                  <textarea class="form-control" rows="5" id="comment" id="message" name="penanggulangan" readonly><?php echo $row['penanggulangan']?></textarea>
                </div>
              </form>
          <?php } ?>
          <a href="../../page/diagnosa-hasil.php" class="btn btn-info">Kembali</a>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../../tampilan-pakar/vendor/jquery/jquery.min.js"></script>
    <script src="../../../tampilan-pakar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
