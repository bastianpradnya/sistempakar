<?php
  $belief = $_POST['belief'];
	$kode = $_POST['kode'];
	$dugaan = $_POST['dugaan'];
?>

<?php
	include "../../../proses-login/koneksi.php";
	$sql = "UPDATE temp_konsultasi SET temp_belief =$belief WHERE temp_kode_gejala = '$kode'";
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil) {
		echo "Gagal Simpan Nilai Belief, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
	}
?>

<?php
	include "../../../proses-login/koneksi.php";
	$sql = "UPDATE temp_konsultasi SET temp_dugaan = '$dugaan' WHERE temp_kode_gejala = '$kode'";
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil) {
		echo "Gagal Simpan Nilai Belief, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
	}

  $sql1    = "UPDATE temp_konsultasi SET temp_belief = '0.2' WHERE temp_konsultasi.temp_kode_gejala = 'G001'";
  $tambah1 = mysqli_query($konek, $sql1);
  if(!$tambah1){
      die ("Gagal Query..".mysqli_error($konek));
  }
?>

<?php
  include "../../../proses-login/koneksi.php";
  $sql2 = "INSERT INTO temp_hasil (`kode_penyakit`) VALUES ('P005');";
  $hasil2 = mysqli_query($konek, $sql2);
  if(!$hasil2) {
    echo "Gagal Simpan Penyakit, silahkan diulangi... <br />" ;
    echo mysqli_error($konek);
  }
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../../page/diagnosa.php">';
?>
