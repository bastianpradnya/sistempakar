<?php
  $kode = "G015";

  include "../../../proses-login/koneksi.php";
  $hasil = mysqli_query($konek, "DELETE FROM temp_konsultasi WHERE temp_kode_gejala='$kode'");
  if(!$hasil){
      die ("Gagal Query..".mysqli_error($konek));
  }
  $sql1    = "UPDATE temp_konsultasi SET temp_belief = '0.8' WHERE temp_konsultasi.temp_kode_gejala = 'G008'";
  $tambah1 = mysqli_query($konek, $sql1);
  if(!$tambah1){
      die ("Gagal Query..".mysqli_error($konek));
  }
  $sql2    = "UPDATE temp_konsultasi SET temp_belief = '0.2' WHERE temp_konsultasi.temp_kode_gejala = 'G009'";
  $tambah2 = mysqli_query($konek, $sql2);
  if(!$tambah2){
      die ("Gagal Query..".mysqli_error($konek));
  }
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../g022/g022.php">';
?>
