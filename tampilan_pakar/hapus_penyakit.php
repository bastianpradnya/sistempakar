<?php
// include database connection file
include "koneksi.php";
 
// Get id from URL to delete that user
$kode = $_GET['kode'];
 
// Delete user row from table based on given id
$hasil = mysqli_query($konek, "DELETE FROM penyakit WHERE kode_penyakit='$kode'");
if(!$hasil){
    die ("Gagal Query..".mysqli_error($konek));
}
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:penyakit.php");
?>