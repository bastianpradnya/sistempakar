<?php
  include "../../../proses-login/session.php";
  include "../../../proses-login/koneksi.php";
  $kode = $_GET['kode'];
  $hasil = mysqli_query($konek, "DELETE FROM basis_pengetahuan WHERE kode_penyakit='$kode'");
  if(!$hasil){
      die ("Gagal Query..".mysqli_error($konek));
  }
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../../page/kaidah.php">';
?>
