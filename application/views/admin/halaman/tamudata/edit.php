<fieldset style="width:50%;">
	<legend>Ubah Data</legend>
	<?php
	include 'konf.php';
	$id=@$_POST['id'];
	$tampilid=$db->query("select * from data_tamu where kode_tamu='$id' ");
	$data=$tampilid->fetch(PDO::FETCH_OBJ);
	?>
<table >
	<tr>
		<td>No. Identitas</td>
		<td>:</td>
		<td><input type="text" id="no_id" value="<?php echo $data->no_id;?>"></td>
	</tr>
	<tr>
		<td>Nama Tamu</td>
		<td>:</td>
		<td><input type="text" id=nama_tamu value="<?php echo $data->nama_tamu;?>"></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td>
		<select id="jeniskelamin" >
		<option id="jeniskelamin" value="<?php echo $data->jeniskelamin;?>">Laki-laki</option>
		<option id="jeniskelamin" value="<?php echo $data->jeniskelamin;?>">Perempuan</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>Warga Negara</td>
		<td>:</td>
		<td><input type="text" id=warganegara value="<?php echo $data->warganegara;?>"></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><input type="text" id="tgl_lahir" value="<?php echo $data->tgl_lahir;?>"></td>
	</tr>
	<tr>
		<td>No. Telp</td>
		<td>:</td>
		<td><input type="text" id="no_telp" value="<?php echo $data->no_telp;?>"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" id="email" value="<?php echo $data->email;?>"></td>
	</tr>
	<tr>
		<td colspan="3"><button id="editdata">Simpan</button></td>
	</tr>
</table>
</fieldset>