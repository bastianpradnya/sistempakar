<?php
$kode = "G005";

include "../../../proses-login/koneksi.php";
$hasil = mysqli_query($konek, "DELETE FROM temp_konsultasi WHERE temp_kode_gejala='$kode'");
if(!$hasil){
    die ("Gagal Query..".mysqli_error($konek));
}
$sql1    = "UPDATE temp_konsultasi SET temp_belief = '0.6' WHERE temp_konsultasi.temp_kode_gejala = 'G001'";
$tambah1 = mysqli_query($konek, $sql1);
if(!$tambah1){
    die ("Gagal Query..".mysqli_error($konek));
}
$sql2    = "UPDATE temp_konsultasi SET temp_belief = '0.7' WHERE temp_konsultasi.temp_kode_gejala = 'G002'";
$tambah2 = mysqli_query($konek, $sql2);
if(!$tambah2){
die ("Gagal Query..".mysqli_error($konek));
}
$sql3    = "UPDATE temp_konsultasi SET temp_belief = '0.4' WHERE temp_konsultasi.temp_kode_gejala = 'G003'";
$tambah3 = mysqli_query($konek, $sql3);
if(!$tambah3){
    die ("Gagal Query..".mysqli_error($konek));
}
$sql4    = "UPDATE temp_konsultasi SET temp_belief = '0.5' WHERE temp_konsultasi.temp_kode_gejala = 'G004'";
$tambah4 = mysqli_query($konek, $sql4);
if(!$tambah4){
    die ("Gagal Query..".mysqli_error($konek));
}
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../g006/g006.php">';
?>
