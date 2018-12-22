  <!-- Header -->
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
      </ol>
      <div class="row">
      <!-- Icon Cards-->

        <!-- Menampilkan jumlah gejala -->
        <?php
            include "../../proses-login/koneksi.php";
            $sql = "SELECT COUNT(nama_gejala) AS 'Jumlah Gejala' FROM `gejala`";
            $hasil_gejala = mysqli_query($konek, $sql);
            if(!$hasil_gejala){
              die ("Gagal Query..".mysqli_error($konek));
            }
        ?>
        <?php while ($row = mysqli_fetch_assoc($hasil_gejala)) { ?>
          <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><?php echo $row['Jumlah Gejala']?> Gejala</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="gejala.php">
                  <span class="float-left">Lihat Detail</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
        <?php } ?>

        <!-- Menampilkan jumlah penyakit -->
        <?php
          include "../../proses-login/koneksi.php";
          $sql = "SELECT count(nama_penyakit) AS 'Jumlah Penyakit' FROM `penyakit`";
          $hasil_penyakit = mysqli_query($konek, $sql);
          if(!$hasil_gejala){
            die ("Gagal Query..".mysqli_error($konek));
          }
        ?>
        <?php while ($row = mysqli_fetch_assoc($hasil_penyakit)) { ?>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><?php echo $row['Jumlah Penyakit']?> Penyakit</div>
              </div>
                <a class="card-footer text-white clearfix small z-1" href="penyakit.php">
                  <span class="float-left">Lihat Detail</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
          </div>
        <?php } ?>

        <!-- Menampilkan jumlah kaidah -->
        <?php
          include "../../proses-login/koneksi.php";
          $sql = "SELECT COUNT(kode_penyakit) AS 'Jumlah Kaidah' FROM `basis_pengetahuan`";
          $hasil_kaidah = mysqli_query($konek, $sql);
          if(!$hasil_gejala){
            die ("Gagal Query..".mysqli_error($konek));
          }
        ?>
        <?php while ($row = mysqli_fetch_assoc($hasil_kaidah)) { ?>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-support"></i>
                  </div>
                <div class="mr-5"><?php echo $row['Jumlah Kaidah']?> Kaidah</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="kaidah.php">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        <?php } ?>

        <!-- Menampilkan jumlah solusi -->
        <?php
          include "../../proses-login/koneksi.php";
          $sql = "SELECT count(kode_penyakit) AS 'Jumlah Solusi' FROM `solusi`";
          $hasil_solusi = mysqli_query($konek, $sql);
          if(!$hasil_gejala){
            die ("Gagal Query..".mysqli_error($konek));
          }
        ?>
        <?php while ($row = mysqli_fetch_assoc($hasil_solusi)) { ?>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-comment"></i>
                </div>
                <div class="mr-5"><?php echo $row['Jumlah Solusi']?> Solusi</div>
              </div>
                <a class="card-footer text-white clearfix small z-1" href="solusi.php">
                  <span class="float-left">Lihat Detail</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
          </div>

        <?php } ?>

      </div>
      <div class="row">
        <div class="col-12">
          <!-- <h1>Beranda</h1> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php
    include "../view/footer.php";
  ?>
