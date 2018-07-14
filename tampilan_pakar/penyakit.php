<?php 
    include "../proses_login/session.php";
?>

<!DOCTYPE html>

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
        <li class="breadcrumb-item active">Penyakit</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Penyakit</h1>
        </div>
      </div>

      <!-- Example DataTables Card-->
      <?php
	      include "koneksi.php";
	      $sql = "select * from penyakit order by kode_penyakit";
	      $hasil = mysqli_query($konek, $sql);
	      if(!$hasil){
		      die ("Gagal Query..".mysqli_error($konek));
	      }
      ?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Penyakit</div>
          <div class="" align="right" style="padding:15px;">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Data Penyakit</button>
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama Penyakit</th>
                  <th>Operasi</th>
                </tr>
              </thead>
              <tbody>
              <?php while ($row = mysqli_fetch_assoc($hasil)){ ?>
			                 <tr>
  			                 <td><?php echo $row['kode_penyakit'] ?></td>
                         <td><?php echo $row['nama_penyakit'] ?></td>
                         <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $row['kode_penyakit'] ?>">Edit</button>&nbsp;&nbsp;
                             <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $row['kode_penyakit'] ?>">Hapus</button></td>
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

    <!-- Tambah Modal-->
    <div class="modal" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penyakit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">     
                <form action="simpan_penyakit.php" method="post">
                  <div class="form-group">
                    <label for="text">Kode Penyakit:</label>
                    <input type="text" class="form-control" name="kode_penyakit">
                  </div>
                    <div class="form-group">
                      <label for="text">Nama Penyakit:</label>
                      <input type="text" class="form-control" name="nama_penyakit">
                    </div>
                  <button class="btn btn-info" type="submit">Simpan</button>
                  <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
                </form>
              </div>
          </div>
          </div>
          </div>
    </div>


      <?php
        include "koneksi.php";
        $sql = "select * from penyakit order by kode_penyakit";
        $hasil = mysqli_query($konek, $sql);
        if(!$hasil){
          die ("Gagal Query..".mysqli_error($konek));
        }
      ?>

       <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
        <!-- Ubah Modal-->
        <div class="modal" id="edit<?php echo $row['kode_penyakit'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Penyakit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">     
                <form action="proses_edit_penyakit.php" method="post">
                  <div class="form-group">
                    <label for="text">Kode Penyakit:</label>
                    <input type="text" name="kode" class="form-control" readonly value="<?php echo $row['kode_penyakit'] ?>">
                  </div>
                    <div class="form-group">
                      <label for="text">Nama Penyakit:</label>
                      <input type="text" name="nama" class="form-control" value="<?php echo $row['nama_penyakit'] ?>">
                    </div>
                  <button class="btn btn-info" type="submit">Simpan</button>
                  <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
                </form>
            </div>
          </div>
          </div>
        </div>
      </div>
      <?php } ?>

     <?php
        include "koneksi.php";
        $sql = "select * from penyakit order by kode_penyakit";
        $hasil = mysqli_query($konek, $sql);
        if(!$hasil){
          die ("Gagal Query..".mysqli_error($konek));
        }
      ?>

    <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
      <!-- Hapus Modal-->
        <div class="modal" id="hapus<?php echo $row['kode_penyakit'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              Yakin ingin menghapus data <?php echo $row['nama_penyakit'] ?> ?
            </div>
            <div class="modal-footer">
              <a href=hapus_penyakit.php?kode=<?php echo $row['kode_penyakit'] ?> class="btn btn-primary">Ya</a>
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
