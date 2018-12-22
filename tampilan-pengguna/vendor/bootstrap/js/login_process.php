<?php
	session_start(); // Memulai Session
	$error=''; // Variabel untuk menyimpan pesan error
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username atau Password belum Diisi";
			echo "<script>alert('Username atau Password belum Diisi');</script>";
		}
		else {
				// Variabel username dan password
				$username=$_POST['username'];
				$password=$_POST['password'];
				// Membangun koneksi ke database
				$connection = mysqli_connect("localhost", "root", "");
				// Mencegah MySQL injection 
				$username = stripslashes($username);
				$password = stripslashes($password);
				$username = mysqli_real_escape_string($connection, $username);
				$password = mysqli_real_escape_string($connection, $password);
				// Seleksi Database
				$db = mysqli_select_db($connection, "sistem_pakar");
				// SQL query untuk memeriksa apakah user terdapat di database?
				$query = mysqli_query($connection, "select * from pakar where password='$password' AND username='$username'");
				$rows = mysqli_num_rows($query);
				if ($rows == 1) {
					$_SESSION['login_user']=$username; // Membuat Sesi/session
					header("location: ../tampilan_pakar/blank.php"); // Mengarahkan ke halaman admin
				}
				else {
						// error = "Username atau Password belum terdaftar";
						// echo "Username atau Password belum terdaftar";
						echo "<script>alert('Username atau Password belum terdaftar');</script>";
				}

				mysqli_close($connection); // Menutup koneksi
			}
	}
	//echo "<a href='login_form.php'>Kembali</a>";
?>

