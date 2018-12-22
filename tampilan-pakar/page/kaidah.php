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
        <li class="breadcrumb-item active">Kaidah</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Kaidah</h1>
        </div>
      </div>

      <!-- Tabel Solusi Penyakit -->
      <?php
	      include "../../proses-login/koneksi.php";
	      $sql = "SELECT * FROM basis_pengetahuan GROUP BY kode_penyakit ORDER BY kode_penyakit";
	      $hasil = mysqli_query($konek, $sql);
	      if(!$hasil){
		      die ("Gagal Query..".mysqli_error($konek));
	      }
      ?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Kaidah
        </div>
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
                        include "../../proses-login/koneksi.php";
                        $sql2 = "SELECT nama_penyakit FROM penyakit WHERE kode_penyakit='".$row['kode_penyakit']."'";
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

  <!-- Modal Tambah-->
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
            <form action="../process/add/tambah-kaidah.php" method="post">
              <div class="form-group">
                <?php
                  include "../../proses-login/koneksi.php";
                  $sql3 = "SELECT * FROM penyakit ORDER BY kode_penyakit";
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

  <!-- Hapus Modal-->
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
            Yakin ingin menghapus kaidah penyakit <?php echo $row['nama_penyakit'] ?> ?
          </div>
          <div class="modal-footer">
            <a href=../process/delete/hapus-kaidah.php?kode=<?php echo $row['kode_penyakit'] ?> class="btn btn-primary">Ya</a>
            <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <!-- Modal Tampil Kaidah-->
  <?php
    include "../../proses-login/koneksi.php";
    $sql = "SELECT * FROM basis_pengetahuan GROUP BY kode_penyakit ORDER BY kode_penyakit";
    $hasil = mysqli_query($konek, $sql);
    if(!$hasil){
      die ("Gagal Query..".mysqli_error($konek));
    }
  ?>
  <!-- Lihat gejala -->
  <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
    <div class="modal" id="kaidah<?php echo $row['kode_penyakit'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Gejala Penyakit
              <?php
                include "../../proses-login/koneksi.php";
                $sql2 = "SELECT nama_penyakit FROM penyakit WHERE kode_penyakit='".$row['kode_penyakit']."'";
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
            include "../../proses-login/koneksi.php";
            $sql = "SELECT * FROM basis_pengetahuan WHERE kode_penyakit='".$row['kode_penyakit']."'";
            $hasil2 = mysqli_query($konek, $sql);
            if(!$hasil2){
              die ("Gagal Query..".mysqli_error($konek));
            }
          ?>
          <div class="modal-body">
            <form action="../process/update/edit-kaidah.php" method="post">
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
                            include "../../proses-login/koneksi.php";
                            $sql2 = "SELECT nama_gejala FROM gejala WHERE kode_gejala='".$row2['kode_gejala']."'";
                            $nama = mysqli_query($konek, $sql2);
                            $tampil = mysqli_fetch_assoc($nama);
                            echo $tampil['nama_gejala'];
                          ?>
                        </td>
                        <td><?php echo $row2['nilai_belief'] ?></td>
                        <td>
                          <a href=../process/update/edit-kaidah.php?idpengetahuan=<?php echo $row2['id_pengetahuan'] ?> class="btn btn-info btn-sm">Ubah</a>&nbsp;&nbsp;
                          <a href=../process/delete/hapus-kaidah-gejala.php?idpengetahuan=<?php echo $row2['id_pengetahuan'] ?> class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </form>
            <form action="../process/add/tambah-kaidah.php" method="post">
              <?php
                include "../../proses-login/koneksi.php";
                $sql2 = "SELECT nama_penyakit FROM penyakit WHERE kode_penyakit='".$row['kode_penyakit']."'";
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
  <?php } ?>

  <!-- Footer -->
  <?php
    include "../view/footer.php";
  ?>
