<?php
	session_start();

	// Menghapus Sessions
	if(session_destroy()) {
	}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL= ../tampilan-pengguna/index.php">';
?>
