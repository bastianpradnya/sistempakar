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
        <li class="breadcrumb-item active">Solusi</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Solusi Penyakit</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
        </div>
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
          <i class="fa fa-table"></i> Tabel Solusi Penyakit</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama Penyakit</th>
                  <th>Solusi</th>
                </tr>
              </thead>
              <tbody>
              <?php while ($row = mysqli_fetch_assoc($hasil)){ ?>
			                 <tr>
                         <td><?php echo $row['nama_penyakit'] ?></td>
                         <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail">Detail</button>
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

    <!-- Detail Penyakit Modal-->
    <div class="modal" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
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
        include "koneksi.php";
        $sql = "select * from gejala order by kode_gejala";
        $hasil = mysqli_query($konek, $sql);
        if(!$hasil){
          die ("Gagal Query..".mysqli_error($konek));
        }
      ?>

       <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
        <!-- Ubah Detail Penyakit Modal-->
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
                <form name="update" method="post" action="proses_edit_gejala.php">
                  <div class="form-group">
                    <label for="text">Kode Gejala:</label>
                    <input type="text" name="kode" class="form-control" value="<?php echo $row['kode_gejala'] ?>" id="kode_gejala">
                  </div>
                    <div class="form-group">
                      <label for="text">Nama Gejala:</label>
                      <input type="text" name="nama" class="form-control" value="<?php echo $row['nama_gejala'] ?>" id="nama_gejala">
                    </div>
                  <button class="btn btn-info" type="submit">Edit</button>
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
        $sql = "select * from gejala order by kode_gejala";
        $hasil = mysqli_query($konek, $sql);
        if(!$hasil){
          die ("Gagal Query..".mysqli_error($konek));
        }
      ?>

    <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
      <!-- Hapus Detail Penyakit Modal-->
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
  </div>
</body>

</html>
