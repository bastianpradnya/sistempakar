<?php
	include 'session.php';
?>

<?php
	include "koneksi.php";
	$sql = "select nama_pakar from pakar order by nama_pakar";
	$hasil = mysqli_query($konek, $sql);
	if(!$hasil){
		die ("Gagal Query..".mysqli_error($konek));
	}
?>
<table border="1">
	<tr>
		<th>Nama Pakar</th>
	</tr>
	<?php
		while ($row = mysqli_fetch_assoc($hasil)){
			echo " <tr> ";
			echo " <td> ".$row['nama_pakar']."</td>";
			echo " </tr> ";
		}
	?>
</table>
<a href="tambah_pakar.php"> Tambah Pakar </a>