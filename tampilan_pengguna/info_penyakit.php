<!DOCTYPE html>
<html lang="en">

  <head>

    <?php
      include "header-user.php";
    ?>

  </head>

  <body>

    <!-- Navigation -->
    <?php
      include "navigation-user.php";
    ?>

       <section>
      <div class="container">
          <div class="col-lg">
            <div class="p-5">
            </div>

             <!-- Example DataTables Card-->
      <?php
	      include "koneksi.php";
	      $sql = "select * from solusi order by kode_penyakit";
	      $hasil = mysqli_query($konek, $sql);
	      if(!$hasil){
		      die ("Gagal Query..".mysqli_error($konek));
	      }
      ?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Informasi Penyakit</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Kode</th>
                  <th>Nama Penyakit</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
              <?php while ($row = mysqli_fetch_assoc($hasil)){ ?>
			                 <tr>
                        <td><?php echo $row['id_solusi'] ?></td>
  			                 <td><?php echo $row['kode_penyakit'] ?></td>
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
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail<?php echo $row['kode_penyakit'] ?>">Lihat</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi Penyakit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">     
              <form action="tambah_solusi.php" method="post">
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
        $sql = "select * from solusi order by kode_penyakit";
        $hasil = mysqli_query($konek, $sql);
        if(!$hasil){
          die ("Gagal Query..".mysqli_error($konek));
        }
      ?>

       <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
        <!-- Detail Modal-->
        <div class="modal" id="detail<?php echo $row['kode_penyakit'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi Penyakit  
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
              <div class="modal-body">     
                <form action="edit_solusi.php" method="post">
                  <div class="form-group">
                    <label for="text">Kode Penyakit:</label>
                    <input type="text" name="kode" class="form-control" readonly value="<?php echo $row['kode_penyakit'] ?>">
                  </div>
                    <div class="form-group">
                      <label for="comment">Penyebab :</label>
                      <textarea class="form-control" rows="5" id="comment" id="message" name="penyebab" readonly><?php echo $row['penyebab']?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="comment">Penanggulangan :</label>
                      <textarea class="form-control" rows="5" id="comment" id="message" name="penanggulangan" readonly><?php echo $row['penanggulangan']?></textarea>
                    </div>
                </form>
            </div>
          </div>
          </div>
        </div>
      </div>
      <?php } ?>

          </div>
        </div>
      
    </section>

    

    <!-- Footer -->
    <?php
      include "footer-user.php";
    ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
