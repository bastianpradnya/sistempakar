<?php
include "koneksi.php";
$jumKD = $_POST['jumKD'];
for($i = 1; $i <= $jumKD; $i++)
{
$kd = $_POST['kd'.$i];
if (!empty($kd))
{
$query = "INSERT INTO konsultasi(kode_gejala)
          VALUES('$kd')";
mysqli_query($konek, $query);
}
}
 
echo "Terimakasih sudah memilih gejala";
 
?>