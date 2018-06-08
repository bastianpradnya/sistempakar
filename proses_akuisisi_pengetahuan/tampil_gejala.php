<?php
	include "koneksi.php";
	$sql = "select * from gejala order by kode_gejala";
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil){
		die ("Gagal Query..".mysqli_error($konek));
	}
?>
<table border="1">
	<tr>
		<th>ID</th>
		<th>Nama Gejala</th>
	</tr>
	<?php
		while ($row = mysqli_fetch_assoc($hasil)){
			echo " <tr> ";
			echo " <td> ".$row['kode_gejala']."</td>";
			echo " <td> ".$row['nama_gejala']."</td>";
			echo " </tr> ";
		}
	?>
</table>
<a href="tambah_gejala.php"> Tambah Gejala </a>