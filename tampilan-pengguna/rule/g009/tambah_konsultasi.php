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
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../g010/g010.php">';
?>
