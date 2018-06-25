<!DOCTYPE html>
<?php 
    include "../proses_login/session.php";
?>
<html lang="en">

<head>

  <?php 
    include "head.php";
  ?>
  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 
  <?php 
    include "navigation.php";
  ?>

  <div class="content-wrapper">
    <div class="container-fluid">
<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Tambah Penyakit</div>
      <div class="card-body">
        <form action="simpan_penyakit.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Penyakit</label>
            <input class="form-control" type="text" name="kode_penyakit" placeholder="Kode">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Penyakit</label>
            <input class="form-control" type="text" name="nama_penyakit" placeholder="Nama Penyakit">
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Simpan" />
          <input class="btn btn-primary btn-block" type="reset" value="Batal" />
        </form>
      </div>
    </div>
  </div>

    <!-- /.container-fluid-->
    <?php 
      include "footer.php";
    ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
