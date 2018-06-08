<h2>.:: Tambah Kaidah ::.<h2>
<form action="simpan_kaidah.php" method="post" enctype="multipart/form-data">
	<table border="1">
		<tr>
			<td>Kode Penyakit</td>
			<td><input type="text" name="kode_penyakit" /></td>
		</tr>
		<tr>
			<td>Kode Gejala</td>
			<td><input type="text" name="kode_gejala" /></td>
		</tr>
		<tr>
			<td>Nilai Belief</td>
			<td><input type="text" name="nilai_belief" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="Simpan" />
				<input type="reset" value="Reset" />
			</td>
		</tr>
	</table>	
</form>