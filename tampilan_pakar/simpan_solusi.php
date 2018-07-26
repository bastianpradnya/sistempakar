<?php
	$kode_penyakit = $_POST['kode'];
  	$penyebab = $_POST['penyebab'];
 	 $penanggulangan = $_POST['penanggulangan'];

  include "../proses_login/koneksi.php";
  
	$sql = "insert into solusi(kode_penyakit, penyebab, penanggulangan)
          values('$kode_penyakit','$penyebab','$penanggulangan')" ;
      
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil) {
		echo "Gagal Simpan, silahkan diulangi... <br />" ;
		echo mysqli_error($konek);
		exit;
	} else {
		echo "Simpan data berhasil..." ;
	}
	header("Location:solusi.php");
?>