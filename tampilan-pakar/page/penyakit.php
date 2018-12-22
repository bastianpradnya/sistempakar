  <?php
    include "../view/head.php";
  ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="beranda.php">Beranda</a>
        </li>
        <li class="breadcrumb-item active">Penyakit</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Penyakit</h1>
        </div>
      </div>

      <!-- Tabel data penyakit -->
      <?php
	      include "../../proses-login/koneksi.php";
	      $sql = "SELECT * FROM penyakit ORDER BY kode_penyakit";
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
                      <td>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $row['kode_penyakit'] ?>">Edit</button>&nbsp;&nbsp;
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

  <!-- Modal Tambah -->
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
            <form action="../process/save/simpan-penyakit.php" method="post">
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

  <!-- Modal Ubah-->
  <?php
    include "../../proses-login/koneksi.php";
    $sql = "SELECT * FROM penyakit ORDER BY kode_penyakit";
    $hasil = mysqli_query($konek, $sql);
    if(!$hasil){
      die ("Gagal Query..".mysqli_error($konek));
    }
  ?>
  <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
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
              <form action="../process/update/proses-edit-penyakit.php" method="post">
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
  <?php } ?>

  <!-- Hapus Modal Hapus-->
  <?php
    include "../../proses-login/koneksi.php";
    $sql = "SELECT * FROM penyakit ORDER BY kode_penyakit";
    $hasil = mysqli_query($konek, $sql);
    if(!$hasil){
      die ("Gagal Query..".mysqli_error($konek));
    }
  ?>
  <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
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
            <a href=../process/delete/hapus-penyakit.php?kode=<?php echo $row['kode_penyakit'] ?> class="btn btn-primary">Ya</a>
            <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <!-- Footer -->
   <?php
      include "../view/footer.php";
    ?>
