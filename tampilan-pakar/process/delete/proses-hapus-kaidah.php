<?php
  include "../../../proses-login/session.php";
  include "../../../proses-login/koneksi.php";
  $id = $_GET['idpengetahuan'];
  $hasil = mysqli_query($konek, "DELETE FROM basis_pengetahuan WHERE id_pengetahuan='$id'");
  if(!$hasil){
      die ("Gagal Query..".mysqli_error($konek));
  }
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../../page/kaidah.php">';
?>
