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
          <i class="fa fa-table"></i> Tabel Data Gejala <div class="d-flex justify-between"><a class="btn btn-primary" align="right" href="tambah_gejala.php">Tambah Data Gejala</a></div></div>
          <div class="" align="right" style="padding:15px;">
            <a class="btn btn-primary" href="tambah_gejala.php">Tambah Data Gejala</a>
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama Gejala</th>
                  <th>Operasi</th>
                </tr>
              </thead>
              <tbody>
              <?php while ($row = mysqli_fetch_assoc($hasil)){ ?>
			                 <tr>
  			                 <td><?php echo $row['kode_gejala'] ?></td>
                         <td><?php echo $row['nama_gejala'] ?></td>
                         
                         <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $row['kode_gejala'] ?>">
                            Edit</button>&nbsp;<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $row['kode_gejala'] ?>">
                            Hapus</button>
                       </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
   <!-- /.container-fluid-->

      <?php
        include "koneksi.php";
        $sql = "select * from gejala order by kode_gejala";
        $hasil = mysqli_query($konek, $sql);
        if(!$hasil){
          die ("Gagal Query..".mysqli_error($konek));
        }
      ?>

    <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
    <!-- Logout Modal-->
    <div class="modal" id="edit<?php echo $row['kode_gejala'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
           <a href="index.php">Home</a>
  
            <form name="update" method="post" action="proses_edit_gejala.php">
              <table border="0">
                <tr> 
                  <td>Kode Gejala</td>
                  <input type="text" name="kode" value="<?php echo $row['kode_gejala'] ?>"></td>
                </tr>
                <tr> 
                  <td>Nama Gejala</td>
                  <td><input type="text" name="nama" value="<?php echo $row['nama_gejala'] ?>"></td>
                </tr>
                <tr>
                  <td><input type="hidden" name="kode" value="<?php echo $_GET['kode'];?>"></td>
                  <td><input type="submit" name="update" value="Ubah"></td>
                </tr>
              </table>
            </form>
        </div>
      </div>
      </div>
    </div>
    <?php } ?>

     <?php
        include "koneksi.php";
        $sql = "select * from gejala order by kode_gejala";
        $hasil = mysqli_query($konek, $sql);
        if(!$hasil){
          die ("Gagal Query..".mysqli_error($konek));
        }
      ?>

    <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
    <!-- Logout Modal-->
    <div class="modal" id="hapus<?php echo $row['kode_gejala'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
           Yakin mau Hapus Data <?php echo $row['nama_gejala'] ?> ?
        </div>
        <div class="modal-footer">
          <a href"<?php echo $row['kode_gejala'] ?>" class="btn btn-primary">Ya</a>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
        </div>
      </div>
      </div>
    </div>
    <?php } ?>


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
