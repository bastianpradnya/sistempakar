<h2>.:: Tambah Solusi ::.<h2>
<form action="simpan_solusi.php" method="post" enctype="multipart/form-data">
	<table border="1">
		<tr>
			<td>Kode Penyakit</td>
			<td><input type="text" name="kode_penyakit" /></td>
		</tr>
		<tr>
			<td>Penyebab</td>
			<td><input type="text" name="penyebab" /></td>
		</tr>
		<tr>
			<td>Penanggulangan</td>
			<td><input type="text" name="penanggulangan" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="Simpan" />
				<input type="reset" value="Reset" />
			</td>
		</tr>
	</table>	
</form>