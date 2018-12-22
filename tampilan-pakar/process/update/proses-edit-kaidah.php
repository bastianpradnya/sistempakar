<?php
	include "../../../proses-login/session.php";

	$id=$_POST['id'];
	$nilai_belief=$_POST['nilai'];
	echo $id;
	echo $nilai_belief;

	include "../../../proses-login/koneksi.php";
	$sql = "UPDATE basis_pengetahuan SET nilai_belief= $nilai_belief  WHERE basis_pengetahuan.id_pengetahuan=$id";
	$result = mysqli_query($konek, $sql);
	if(!$result){
		die ("Gagal Query..".mysqli_error($konek));
	}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL= ../../page/kaidah.php">';
?>
