<?php

include("koneksi.php");

if( isset($_GET['kode']) ){

    // ambil id dari query string
    $id = $_GET['kode'];

    // buat query hapus
    $sql = "DELETE FROM penyakit WHERE kode_penyakit=$id";
    $query = mysqli_query($konek, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: penyakit.php');
    } else {
        echo mysql_error();
        //die("gagal menghapus...");
        
    }

} else {
    die("akses dilarang...");
}

?>