<?php
// include database connection file
include "../proses_login/koneksi.php";

 // Get id from URL to delete that user
$id = $_GET['idpengetahuan'];

 // Delete user row from table based on given id
$hasil = mysqli_query($konek, "DELETE FROM basis_pengetahuan WHERE id_pengetahuan='$id'");
if(!$hasil){
    die ("Gagal Query..".mysqli_error($konek));
}
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:kaidah.php");
?>