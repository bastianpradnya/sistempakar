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
        <li class="breadcrumb-item active">Kaidah</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Kaidah</h1>
        </div>
      </div>

      <!-- Example DataTables Card-->
      <?php
	      include "koneksi.php";
	      $sql = "select * from basis_pengetahuan group by kode_penyakit order by kode_penyakit";
	      $hasil = mysqli_query($konek, $sql);
	      if(!$hasil){
		      die ("Gagal Query..".mysqli_error($konek));
	      }
      ?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Kaidah Sistem Pakar</div>
          <div class="" align="right" style="padding:15px;">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Data Kaidah</button>
          </div>
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
  			                 <td>
                         <input type="hidden" value="<?php echo $row['id_pengetahuan']?>" name="id" />
                          <?php echo $row['kode_penyakit'] ?>
                         </td>
                         <td>
                          <?php 
                            include "koneksi.php";
                            $sql2 = "select nama_penyakit from penyakit where kode_penyakit='".$row['kode_penyakit']."'";
                            $nama = mysqli_query($konek, $sql2);
                            $tampil = mysqli_fetch_assoc($nama);
                            echo $tampil['nama_penyakit'];
                          ?>
                         </td>
                         <td>
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#kaidah<?php echo $row['kode_penyakit'] ?>">Lihat Gejala</button>&nbsp;&nbsp;
                          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $row['kode_penyakit'] ?>">Hapus</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kaidah Penyakit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">     
              <form action="tambah_kaidah.php" method="post">
                <div class="form-group">
                <?php
                  include "koneksi.php";
                  $sql3 = "select * from penyakit order by kode_penyakit";
                  $nama2 = mysqli_query($konek, $sql3);
                ?>
                  <label for="sel1">Pilih Penyakit:</label>
                    <select class="form-control" name="sel1">
                    <?php while ($row3 = mysqli_fetch_assoc($nama2)){ ?>
                      <option><?php echo $row3['nama_penyakit']?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <button class="btn btn-info" type="submit">Lanjutkan</button>
                  <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
                </form>
              </div>
          </div>
          </div>
          </div>
    </div>

      <?php
        include "koneksi.php";
        $sql = "select * from basis_pengetahuan group by kode_penyakit order by kode_penyakit";
        $hasil = mysqli_query($konek, $sql);
        if(!$hasil){
          die ("Gagal Query..".mysqli_error($konek));
        }
      ?>

       <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
        <!-- Kaidah Modal-->
        <div class="modal" id="kaidah<?php echo $row['kode_penyakit'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gejala Penyakit  
                  <?php 
                      include "koneksi.php";
                      $sql2 = "select nama_penyakit from penyakit where kode_penyakit='".$row['kode_penyakit']."'";
                      $nama = mysqli_query($konek, $sql2);
                      $tampil = mysqli_fetch_assoc($nama);
                      echo $tampil['nama_penyakit'];
                  ?>
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <?php
                include "koneksi.php";
                $sql = "select * from basis_pengetahuan where kode_penyakit='".$row['kode_penyakit']."'";
                $hasil2 = mysqli_query($konek, $sql);
                if(!$hasil2){
                  die ("Gagal Query..".mysqli_error($konek));
                }
              ?>
              <div class="modal-body">     
                <form action="edit_kaidah.php" method="post">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                        <th>Nama Gejala</th>
                        <th>Nilai</th>
                        <th>Operasi</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php while ($row2 = mysqli_fetch_assoc($hasil2)){ ?>
                          <tr>
                            <td>
                            <input type="hidden" value="<?php echo $row2['id_pengetahuan']?>" name="id" />
                              <?php 
                                include "koneksi.php";
                                $sql2 = "select nama_gejala from gejala where kode_gejala='".$row2['kode_gejala']."'";
                                $nama = mysqli_query($konek, $sql2);
                                $tampil = mysqli_fetch_assoc($nama);
                                echo $tampil['nama_gejala'];
                              ?>
                            </td>
                            <td><?php echo $row2['nilai_belief'] ?></td>
                            <td>
                              <a href=edit_kaidah.php?idpengetahuan=<?php echo $row2['id_pengetahuan'] ?> class="btn btn-info btn-sm">Ubah</a>&nbsp;&nbsp;
                              <a href=hapus_kaidah_gejala.php?idpengetahuan=<?php echo $row2['id_pengetahuan'] ?> class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                          </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
              </form>
              <form action="tambah_kaidah.php" method="post">
              <?php 
                      include "koneksi.php";
                      $sql2 = "select nama_penyakit from penyakit where kode_penyakit='".$row['kode_penyakit']."'";
                      $nama = mysqli_query($konek, $sql2);
                      $tampil = mysqli_fetch_assoc($nama);
                  ?>
              <input type="hidden" value="<?php echo $tampil['nama_penyakit']?>" name="sel1" />
              <button class="btn btn-primary" type="submit">Tambah</button>
              <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Kembali</button>
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
              Yakin ingin menghapus kaidah penyakit <?php echo $row['nama_penyakit'] ?> ?
            </div>
            <div class="modal-footer">
              <a href=hapus_kaidah.php?kode=<?php echo $row['kode_penyakit'] ?> class="btn btn-primary">Ya</a>
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
