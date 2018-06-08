<?php
	include "koneksi.php";
	$sql = "select * from solusi order by kode_penyakit";
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil){
		die ("Gagal Query..".mysqli_error($konek));
	}
?>
<table border="1">
	<tr>
		<th>Kode Penyakit</th>
		<th>Penyebab</th>
		<th>Penanggulangan</th>
	</tr>
	<?php
		while ($row = mysqli_fetch_assoc($hasil)){
			echo " <tr> ";
			echo " <td> ".$row['kode_penyakit']."</td>";
			echo " <td> ".$row['penyebab']."</td>";
			echo " <td> ".$row['penanggulangan']."</td>";
			echo " </tr> ";
		}
	?>
</table>
<a href="tambah_solusi.php"> Tambah Solusi </a>