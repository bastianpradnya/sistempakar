<!DOCTYPE html>
<?php 
    include "../proses_login/session.php";
?>

<?php
  include "koneksi.php";
  // Display selected user data based on id
  // Getting id from url
  $kode = $_GET['kode'];
  
  // Fetech user data based on id
  $sql = "select * from gejala WHERE kode_gejala='".$kode."'";
  $result = mysqli_query($konek, $sql );
  
  while($row = mysqli_fetch_array($result))
  {
    $kode_gejala = $row['kode_gejala'];
    $nama_gejala = $row['nama_gejala'];
  }
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
            <div class="card-header">Edit Gejala</div>
            <div class="card-body">
              <form action="proses_edit_gejala.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Gejala</label>
                  <input class="form-control" type="text" name="kode" <?php echo "value='".$kode_gejala."'"?>>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Gejala</label>
                  <input class="form-control" type="text" name="nama" <?php echo "value='".$nama_gejala."'"?>>
                </div>
                <input type="hidden" name="kode" value=<?php echo $_GET['kode'];?>>
                <input class="btn btn-primary" type="submit" value="Ubah" />
                <a href=gejala.php class="btn btn-danger">Batal</a>
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
