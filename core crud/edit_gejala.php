

<?php
include "koneksi.php";
// Display selected user data based on id
// Getting id from url
$kode = $_GET['kode'];
 
// Fetech user data based on id
$sql = "select * from gejala WHERE kode_gejala='".$kode."'";
$result = mysqli_query($konek, $sql );
 
while($row = mysqli_fetch_array($result))
{
	$kode_gejala = $row['kode_gejala'];
	$nama_gejala = $row['nama_gejala'];
}
?>

<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	
	<form name="update" method="post" action="proses_edit_gejala.php">
		<table border="0">
			<tr> 
				<td>Kode Gejala</td>
				<td><input type="text" name="kode" <?php echo "value='".$kode_gejala."'"?>></td>
			</tr>
			<tr> 
				<td>Nama Gejala</td>
				<td><input type="text" name="nama" <?php echo "value='".$nama_gejala."'"?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="kode" value=<?php echo $_GET['kode'];?>></td>
				<td><input type="submit" name="update" value="Ubah"></td>
			</tr>
		</table>
	</form>
</body>
</html>