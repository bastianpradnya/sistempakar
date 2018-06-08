<?php
	include "koneksi.php";
	$sql = "select * from penyakit order by kode_penyakit";
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil){
		die ("Gagal Query..".mysqli_error($konek));
	}
?>
<table border="1">
	<tr>
		<th>Kode</th>
		<th>Nama Penyakit</th>
	</tr>
	<?php
		while ($row = mysqli_fetch_assoc($hasil)){
			echo " <tr> ";
			echo " <td> ".$row['kode_penyakit']."</td>";
			echo " <td> ".$row['nama_penyakit']."</td>";
			echo " </tr> ";
		}
	?>
</table>
<a href="tambah_penyakit.php"> Tambah Penyakit </a>