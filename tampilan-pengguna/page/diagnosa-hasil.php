<!DOCTYPE html>
<html lang="en">

  <head>

    <?php include "../view/header-user.php";?>
    <title>Hasil Diagnosa</title>

  </head>

  <body>

    <!-- Navigation -->
    <?php include "../view/navigation-user.php";?>

    <!-- Konten -->
    <section>
      <div class="container">
        <div class="col-lg">
          <div class="p-5">
            <!--  -->
          </div>

          <h1>Hasil Diagnosa</h1>

          <!-- Tabel Gejala terpilih-->
          <?php
            include "../../proses-login/koneksi.php";
            $sql_konsultasi = "SELECT * FROM temp_konsultasi";
            $hasil_konsultasi = mysqli_query($konek, $sql_konsultasi);
            if(!$hasil_konsultasi){
              die ("Gagal Query..".mysqli_error($konek));
            }
          ?>
          <form>
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
                        <th>Dugaan Penyakit</th>
                        <th>Nilai</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($row = mysqli_fetch_assoc($hasil_konsultasi)){ ?>
                      <tr>
                        <td>
                          <!-- Menampilkan nama gejala -->
                          <?php
                            include "../../proses-login/koneksi.php";
                            $sql_nama_gejala = "SELECT nama_gejala FROM gejala WHERE kode_gejala ='".$row['temp_kode_gejala']."'";
                            $hasil_nama_gejala = mysqli_query($konek, $sql_nama_gejala);
                            $tampil_nama_gejala = mysqli_fetch_assoc($hasil_nama_gejala);
                            echo $tampil_nama_gejala['nama_gejala'];
                          ?>
                        </td>
                        <td>
                          <!-- Menampilkan dugaan penyakit -->
                          <?php
                            include "../../proses-login/koneksi.php";
                            $sql_dugaan = "SELECT temp_dugaan FROM temp_konsultasi WHERE temp_kode_gejala ='".$row['temp_kode_gejala']."'";
                            $hasil_dugaan = mysqli_query($konek, $sql_dugaan);
                            $tampil_dugaan = mysqli_fetch_assoc($hasil_dugaan);
                            echo $tampil_dugaan['temp_dugaan'];
                          ?>
                        </td>
                        <td>
                          <!-- menampilkan maksimal nilai belief -->
                          <?php
                            include "../../proses-login/koneksi.php";
                            $sql_belief = "SELECT temp_belief FROM temp_konsultasi WHERE temp_kode_gejala='".$row['temp_kode_gejala']."'";
                            $hasil_belief = mysqli_query($konek, $sql_belief);
                            $tampil_belief = mysqli_fetch_assoc($hasil_belief);
                            echo $tampil_belief['temp_belief'];
                          ?>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <div class="panel-footer"></div>
                </div>
              </div>
            </div>
          </form>

          <!-- Tabel Hasil-->
          <form>
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-table"></i>Hasil Diagnosa
              </div>
              <div class="card-body">

                <!-- Tabel Diagnosa Penyakit -->
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Diagnosa Penyakit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <!-- menampilkan hasil diagnosa penyakit -->
                        <?php
                          include "../../proses-login/koneksi.php";
                          $sql_nama_penyakit = "SELECT penyakit.nama_penyakit AS penyakit FROM penyakit, temp_hasil WHERE penyakit.kode_penyakit = temp_hasil.kode_penyakit";
                          $hasil_nama_penyakit = mysqli_query($konek, $sql_nama_penyakit);
                          $tampil_nama_penyakit = mysqli_fetch_assoc($hasil_nama_penyakit);

                          $sql_nilai_penyakit = "SELECT nilai_tinggi FROM temp_hasil";
                          $hasil_nilai_penyakit = mysqli_query($konek, $sql_nilai_penyakit);
                          $tampil_nilai_penyakit = mysqli_fetch_assoc($hasil_nilai_penyakit);
                        ?>
                          <p>Hasil diagnosa penyakit yang diderita adalah <b> <?php echo $tampil_nama_penyakit['penyakit']; ?> </b> dengan kemungkinan sebesar <?php echo $tampil_nilai_penyakit['nilai_tinggi']; ?> %

                          </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="panel-footer">
                  <a href="../process/view/lihat-solusi.php" class="btn btn-info">Lihat Solusi</a>
                </div><br>

                <!-- Tabel Hasil Perhitungan -->
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Hasil Perhitungan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <?php
                            include "../../proses-login/koneksi.php";
                            $sql_konsultasi = "SELECT * FROM temp_konsultasi";
                            $hasil_konsultasi = mysqli_query($konek, $sql_konsultasi);
                            if(!$hasil_konsultasi){
                              die ("Gagal Query..".mysqli_error($konek));
                            }
                          ?>

                          <?php
                            while($r = mysqli_fetch_array($hasil_konsultasi)){
                              $data[] = array($r['temp_dugaan'], $r['temp_belief']);
                            }

                            $all=array();
                            foreach($data as $d) $all[]=$d[0];
                            $unique=array_unique(explode(',',implode(',',$all)));
                            $fod=implode(',',$unique);
                            echo "<pre>";
                            echo $fod; echo ("<br>"); //uncomment untuk melihat hasil irisan
                            $rst=array();

                            while(!empty($data)){
                              $result=array();
                              $symptom[0]=array_shift($data);
                              $symptom[1]=array($fod,1-$symptom[0][1]);
                                if(empty($rst))
                                  $result[0]=array_shift($data);
                                else
                                  foreach($rst as $k=>$r)
                                    if($k!="&theta;")
                                      $result[]=array($k,$r);
                              $theta=1;
                              foreach($result as $r) $theta-=$r[1];
                              $result[]=array($fod,$theta);
                              $m=count($result);
                              $rst=array();

                              for($x=0;$x<$m;$x++){
                                for($y=0;$y<2;$y++){
                                  if(!($x==$m-1 && $y==1)){
                                    $v=explode(',',$symptom[$y][0]);
                                    $w=explode(',',$result[$x][0]);
                                    sort($v);sort($w);
                                    $vw=array_intersect($v,$w);
                                    if(empty($vw)) $v="&theta;";else $v=implode(',',$vw);
                                    if(!isset($rst[$v])) $rst[$v]=$result[$x][1]*$symptom[$y][1];
                                    else $rst[$v]+=$result[$x][1]*$symptom[$y][1];
                                  }
                                }
                              }
                              foreach($rst as $k=>$r) if($k!="&theta;") $rst[$k]=$r/(1-(isset($rst["&theta;"])?$rst["&theta;"]:0));
                              print_r($rst); //uncomment untuk melihat semua hasil iterasi
                            }
                            unset($rst["&theta;"]);
                            arsort($rst);
                            print_r($rst);
                        ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <!-- Tabel Cara Baca -->
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Cara Membaca Hasil Perhitungan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <p>&emsp;&emsp;Tampilan di atas merupakan hasil dari perhidungan nilai densitas yang diperoleh dari irisan pada tabel kombinasi.
                          Dimana nilai densitas <b>paling kuat/tinggi</b> merupakan persentasi kemungkinan penyakit yang diderita berdasarkan gejala yang telah dimasukkan.<p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="panel-footer">
                  <a href=../process/delete/hapus-semua-konsultasi.php?kodegejala=<?php echo $row['temp_kode_gejala'] ?> class="btn btn-info">Selesai</a>
                </div>
            </div>
        </form>
        </div>
        </div>
      </div>
    <section>

    <!-- Footer -->
    <?php include "../view/footer-user.php";?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
