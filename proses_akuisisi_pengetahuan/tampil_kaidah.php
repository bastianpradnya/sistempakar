<?php
	include "koneksi.php";
	$sql = "select * from basis_pengetahuan order by kode_penyakit";
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil){
		die ("Gagal Query..".mysqli_error($konek));
	}
?>
<table border="1">
	<tr>
		<th>Kode Penyakit</th>
		<th>Kode Gejala</th>
		<th>Nilai Belief</th>
	</tr>
	<?php
		while ($row = mysqli_fetch_assoc($hasil)){
			echo " <tr> ";
			echo " <td> ".$row['kode_penyakit']."</td>";
			echo " <td> ".$row['kode_gejala']."</td>";
			echo " <td> ".$row['nilai_belief']."</td>";
			echo " </tr> ";
		}
	?>
</table>
<a href="tambah_kaidah.php"> Tambah Kaidah </a>