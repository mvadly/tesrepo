<style type="text/css">
table{
		float: left;
	}
</style>
<h1 align="center">Konfirmasi Pembayaran</h1>

<form method="post" action="update_pembayaran.php" enctype="multipart/form-data">
<fieldset>
<legend>Upload Struk Pembayaran</legend>
<table>
	<tr>
	<td colspan="3"><input type="text" name="kode_booking" ></td>
	</tr>
	<tr>
	<td>Pilih File</td>
	<td>:</td>
	<td><input type="File" name="fotostruk" ></td>
	</tr>
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" name="Upload" value="Upload"></td>
	</tr>

</table>
</fieldset>	
</form>
