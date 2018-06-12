

<?php
include "koneksi.php";
// Display selected user data based on id
// Getting id from url
$kode = $_GET['kode'];
 
// Fetech user data based on id
$sql = "select * from penyakit WHERE kode_penyakit='".$kode."'";
$result = mysqli_query($konek, $sql );
 
while($row = mysqli_fetch_array($result))
{
	$kode_penyakit = $row['kode_penyakit'];
	$nama_penyakit = $row['nama_penyakit'];
}
?>

<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	
	<form name="update" method="post" action="proses_edit_penyakit.php">
		<table border="0">
			<tr> 
				<td>Kode Penyakit</td>
				<td><input type="text" name="kode" <?php echo "value='".$kode_penyakit."'"?>></td>
			</tr>
			<tr> 
				<td>Nama Penyakit</td>
				<td><input type="text" name="nama" <?php echo "value='".$nama_penyakit."'"?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="kode" value=<?php echo $_GET['kode'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>