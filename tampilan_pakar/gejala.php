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
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Beranda</a>
        </li>
        <li class="breadcrumb-item active">Gejala</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Gejala</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
        </div>
      </div>
    </div>

      <!-- Example DataTables Card-->
      <?php
	      include "koneksi.php";
	      $sql = "select * from gejala order by kode_gejala";
	      $hasil = mysqli_query($konek, $sql);
	      if(!$hasil){
		      die ("Gagal Query..".mysqli_error($konek));
	      }
      ?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Gejala</div>
          <a class="btn btn-primary btn-block" href="tambah_gejala.php">Tambah Data Gejala</a>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama Gejala</th>
                  <th>Operasi</th>
                </tr>
              </thead>
              <tbody>
              <?php
		            while ($row = mysqli_fetch_assoc($hasil)){
			            echo " <tr> ";
			            echo " <td> ".$row['kode_gejala']."</td>";
                  echo " <td> ".$row['nama_gejala']."</td>";
                  echo "<td><a href='edit_gejala.php?kode=$row[kode_gejala]'>Edit</a> | <a href='hapus_gejala.php?kode=$row[kode_gejala]'>Delete</a></td></tr>";
                  echo " </tr> ";
		            }
	            ?>
              </tbody>
            </table>
          </div>
        </div>
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
