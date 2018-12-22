<!DOCTYPE html>
<html lang="en">

  <head>

    <?php include "../view/header-user.php";?>

  </head>

  <body>

    <!-- Navigation -->
    <?php include "../view/navigation-user.php";?>

    <section>
      <div class="container">
        <div class="col-lg">
          <div class="p-5">
            <!--  -->
          </div>

          <h1>Informasi Penyakit</h1>

          <!-- Konten -->
          <?php
            include "../../proses-login/koneksi.php";
            $sql_solusi = "select * from solusi order by kode_penyakit";
            $hasil_solusi = mysqli_query($konek, $sql_solusi);
            if(!$hasil_solusi){
              die ("Gagal Query..".mysqli_error($konek));
            }
          ?>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Data Penyakit
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Penyakit</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php while ($row = mysqli_fetch_assoc($hasil_solusi)){ ?>
                    <tr>
                      <td>
                        <?php
                          include "../../proses-login/koneksi.php";
                          $sql_penyakit = "select nama_penyakit from penyakit where kode_penyakit='".$row['kode_penyakit']."'";
                          $nama_penyakit = mysqli_query($konek, $sql_penyakit);
                          $tampil_penyakit = mysqli_fetch_assoc($nama_penyakit);
                           echo $tampil_penyakit['nama_penyakit'];
                        ?>
                      </td>
                      <td>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail<?php echo $row['kode_penyakit'] ?>">Lihat</button>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Modal Detail -->
          <?php
            include "../../proses-login/koneksi.php";
            $sql = "select * from solusi order by kode_penyakit";
            $hasil = mysqli_query($konek, $sql);
            if(!$hasil){
              die ("Gagal Query..".mysqli_error($konek));
            }
          ?>

          <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
            <div class="modal" id="detail<?php echo $row['kode_penyakit'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informasi Penyakit
                      <?php
                        include "../../proses-login/koneksi.php";
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
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="comment">Penyebab :</label>
                        <textarea class="form-control" rows="5" id="comment" id="message" name="penyebab" readonly><?php echo $row['penyebab']?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="comment">Solusi Penanggulangan :</label>
                        <textarea class="form-control" rows="5" id="comment" id="message" name="penanggulangan" readonly><?php echo $row['penanggulangan']?></textarea>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php include "../view/footer-user.php";?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
