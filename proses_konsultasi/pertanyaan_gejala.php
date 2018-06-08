<h1>Form Konsultasi</h1>
<form method="post" action="proses_pertanyaan.php">
Daftar Gejala<br />

<?php
include "koneksi.php";
$query = "SELECT * FROM gejala";
$hasil = mysqli_query($konek, $query);
$no = 1;
while ($data = mysqli_fetch_array($hasil))
{
echo "<input type='checkbox' value='".$data['kode_gejala']."' name='kd".$no."' /> ".$data['nama_gejala']."<br />";
$no++;
}
?>
<input type="hidden" name="jumKD" value="<?php echo $no-1; ?>" />
<input type="submit" name="submit" value="Submit" />
</form>