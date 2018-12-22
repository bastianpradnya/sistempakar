<!DOCTYPE html>
<html lang="en">

  <head>

    <?php include "../view/header-user.php";?>
    <title>Konsultasi</title>

  </head>

  <body>

    <!-- Navigation -->
    <?php include "../view/navigation-user.php";?>

    <!-- Content -->
    <section>
      <div class="container">
        <div class="col-lg">
          <div class="p-5">
            <!--  -->
          </div>
          <h1>Konsultasi</h1>

          <!-- Tabel Gejala terpilih-->
          <?php
            include "../../proses-login/koneksi.php";
            $sql = "select * from temp_konsultasi";
            $hasil = mysqli_query($konek, $sql);
            if(!$hasil){
              die ("Gagal Query..".mysqli_error($konek));
            }
          ?>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Gejala Terpilih
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Gejala</th>
                      <th>Operasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($row = mysqli_fetch_assoc($hasil)){ ?>
                      <tr>
                        <td>
                          <!-- Menampilkan nama gejala -->
                          <?php
                            include "../../proses-login/koneksi.php";
                            $sql_gejala = "select nama_gejala from gejala where kode_gejala ='".$row['temp_kode_gejala']."'";
                            $hasil_gejala = mysqli_query($konek, $sql_gejala);
                            $tampil_gejala = mysqli_fetch_assoc($hasil_gejala);
                            echo $tampil_gejala['nama_gejala'];
                          ?>
                        </td>
                        <td>
                          <a href=../process/delete/hapus-gejala-konsultasi.php?kodegejala=<?php echo $row['temp_kode_gejala'] ?> class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <div class="panel-footer">
                  <a href=diagnosa-dinamis.php class="btn btn-info">Cek Diagnosa</a>
                  <button class="btn btn-danger" data-toggle="modal" data-target="#batal">Batal</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Tabel Pilih Gejala-->
          <?php
            include "../../proses-login/koneksi.php";
            $sql_pilih = "SELECT * FROM gejala WHERE gejala.kode_gejala NOT IN (SELECT temp_kode_gejala FROM temp_konsultasi) ORDER BY nama_gejala";
            $hasil_pilih = mysqli_query($konek, $sql_pilih);
            if(!$hasil_pilih){
              die ("Gagal Query..".mysqli_error($konek));
            }
          ?>
          <form action="../process/add/tambah-data-gejala.php" method="post">
            <input type="hidden" name="m" value="hasil" />
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-table"></i> Daftar Gejala</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Pilih 1 Gejala</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($row_pilih = mysqli_fetch_assoc($hasil_pilih)){ ?>
                        <tr>
                          <td>
                            <input type="radio" name="gejala" value="<?php echo $row_pilih['kode_gejala'] ?>"/>&nbsp; &nbsp; <?php echo $row_pilih['nama_gejala'] ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <div class="panel-footer">
                      <button class="btn btn-info" type ="submit"> Tambah Gejala</button>
                    </div>
                  </div>
                </div>
              </div>
          </form>
        </div>
      </div>
    </section>

    <!-- Modal Batal Konsultasi -->
    <div class="modal" id="batal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        <div class="modal-body">
          Yakin ingin membatalkan konsultasi?
        </div>
        <div class="modal-footer">
          <a href=../process/delete/hapus-semua-konsultasi.php? class="btn btn-info">Ya</a>
          <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Tidak</button>
        </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include "../view/footer-user.php";?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
