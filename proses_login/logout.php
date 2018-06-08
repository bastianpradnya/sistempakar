<httml>
<head></head>
<body>
<script>alert('Yakin Ingin Keluar?');</script>
<?php
	session_start();

	// Menghapus Sessions
	if(session_destroy()) {
	}
	header("location: ../tampilan_pengguna/index.php");
?>

</body>
</html>