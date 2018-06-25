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
        <li class="breadcrumb-item active">Kaidah</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Kaidah Pengetahuan</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
        </div>
      </div>
    </div>

      <!-- Example DataTables Card-->
      <?php
	      include "koneksi.php";
	      $sql = "select * from basis_pengetahuan order by kode_penyakit";
	      $hasil = mysqli_query($konek, $sql);
	      if(!$hasil){
		      die ("Gagal Query..".mysqli_error($konek));
	      }
      ?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Solusi Penyakit</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Kode Penyakit</th>
                  <th>Nama Penyakit</th>
                  <th>Gejala</th>
                </tr>
              </thead>
              <tbody>
              <?php while ($row = mysqli_fetch_assoc($hasil)){ ?>
			                 <tr>
                        <td><?php echo $row['kode_penyakit'] ?></td>
                         <td>
                          <?php
                            $kodeP = $row['kode_penyakit'];
                            $sql2 = "select nama_penyakit from penyakit where kode_penyakit='".$kodeP."'";
                            $tampil = mysqli_query($konek, $sql2);
                            $namaP = mysqli_fetch_assoc($tampil);
                          ?>
                          <?php 
                            echo $namaP['nama_penyakit'];
                          ?>
                         </td>
                         <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#kaidah">Detail</button></td>
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
 
    <!-- Kaidah Penyakit Modal-->
    <div class="modal" id="kaidah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kaidah Penyakit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">     
                <form name="update" method="post" action="simpan_gejala.php">
                <div class="form-group">
                  <label for="comment">Informasi Penyakit <?php echo $row['nama_penyakit'] ?> </label>
                  <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
                <div class="form-group">
                  <label for="comment">Solusi Penanganan <?php echo $row['nama_penyakit'] ?> </label>
                  <textarea class="form-control" rows="1 5" id="comment"></textarea>
                </div>
                  <button class="btn btn-info" type="submit">Tambah</button>
                  <button class="btn btn-info" type="button">Ubah</button>
                  <button class="btn btn-info" type="button">Hapus</button>
                  <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
                </form>
            </div>
          </div>
          </div>
          </div>
          </div>

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
