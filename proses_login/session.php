<?php
// Membangun Koneksi dengan Server dengan nama server, user_id dan password sebagai parameter
$connection = mysqli_connect("localhost", "root", "");
// Seleksi Database
$dbname = "sistem_pakar";
$db = mysqli_select_db($connection, $dbname);
session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['login_user'];
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$sql= "select nama_pakar from pakar where username='$user_check'";
$result=mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$login_session =$row['nama_pakar'];
if(!isset($login_session)){
mysqli_close($connection); // Menutup koneksi
header ('Location: ../tampilan_pengguna/index.php');
//header('Location: index.php'); // Mengarahkan ke Home Page
}
?>