<?php 
    include "../proses_login/session.php";
?>

<!DOCTYPE html>

<html lang="en">

<head>

  <?php 
    include "head.php";
  ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
        </div>
      </div>

      <!-- Menampilkan Tabel Gejala-->
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
          <div class="" align="right" style="padding:15px;">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Data Gejala</button>
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
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
                         <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $row['kode_gejala'] ?>">Edit</button>&nbsp;&nbsp;
                             <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $row['kode_gejala'] ?>">Hapus</button>
                          </td>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Gejala</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">     
                <form action="simpan_gejala.php" method="post">
                  <div class="form-group">
                    <label for="text">Kode Gejala:</label>
                    <input type="text" class="form-control" name="kode_gejala">
                  </div>
                    <div class="form-group">
                      <label for="text">Nama Gejala:</label>
                      <input type="text" class="form-control" name="nama_gejala">
                    </div>
                  <button class="btn btn-info" type="submit">Simpan</button>
                  <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
                </form>
              </div>
          </div>
          </div>
          </div>
    </div>

    <!-- Ubah Modal-->
      <?php
        include "koneksi.php";
        $sql = "select * from gejala order by kode_gejala";
        $hasil = mysqli_query($konek, $sql);
        if(!$hasil){
          die ("Gagal Query..".mysqli_error($konek));
        }
      ?>

       <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
        
        <div class="modal" id="edit<?php echo $row['kode_gejala'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Gejala</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">     
                <form action="proses_edit_gejala.php" method="post">
                  <div class="form-group">
                    <label for="text">Kode Gejala:</label>
                    <input type="text" name="kode" class="form-control" readonly value="<?php echo $row['kode_gejala'] ?>">
                  </div>
                    <div class="form-group">
                      <label for="text">Nama Gejala:</label>
                      <input type="text" name="nama" class="form-control" value="<?php echo $row['nama_gejala'] ?>">
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

<!-- Hapus Modal-->
    <?php
        include "koneksi.php";
        $sql = "select * from gejala order by kode_gejala";
        $hasil = mysqli_query($konek, $sql);
        if(!$hasil){
          die ("Gagal Query..".mysqli_error($konek));
        }
    ?>

    <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>     
        <div class="modal" id="hapus<?php echo $row['kode_gejala'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              Yakin ingin menghapus data <?php echo $row['nama_gejala'] ?> ?
            </div>
            <div class="modal-footer">
              <a href=hapus_gejala.php?kode=<?php echo $row['kode_gejala'] ?> class="btn btn-primary">Ya</a>
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <script type="text/javascript">
      $(document).ready(function() {
          $('#dataTables').DataTable();
      } );
    </script>

  </div>
</body>

</html>
