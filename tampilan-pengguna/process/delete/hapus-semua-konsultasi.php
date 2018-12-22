<?php
  $kode = $_GET['kodegejala'];

  include "../../../proses-login/koneksi.php";
  $hasil = mysqli_query($konek, "TRUNCATE TABLE temp_konsultasi");
  if(!$hasil){
    die ("Gagal Query..".mysqli_error($konek));
  }
  $hasil2 = mysqli_query($konek, "TRUNCATE TABLE temp_hasil");
  if(!$hasil2){
    die ("Gagal Query..".mysqli_error($konek));
  }
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../../index.php">';
?>
