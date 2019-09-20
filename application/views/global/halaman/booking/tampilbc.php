<?php  
//Data Tamu
$no_id = $_POST['no_id'];
$nama_tamu = $_POST['nama_tamu'];
$jeniskelamin = $_POST['jeniskelamin'];
$warganegara = $_POST['warganegara'];
$tgl_lahir = $_POST['tgl_lahir'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];
//Data cottage
$kode_cottage = $_POST['kode_cottage'];
$nama_cottage = $_POST['nama_cottage'];
$jml_kamar = $_POST['jml_kamar'];
$hargasewa = $_POST['hargasewa'];
//Data Sewa

$tgl_masuk = $_POST['tgl_masuk'];
$tgl_keluar = $_POST['tgl_keluar'];

$lama= $_POST['lama'];
$total_harga_sewa=$lama*$hargasewa;
?>
<style type="text/css">
	input[type=text]{
		background-color: rgba(0,0,0,0);
		border:none;
		font-weight: bold;
	}
	li{
		list-style-type: none;
	}
	legend{
		margin-bottom: 15px;
		margin-top: 15px;
	}
</style>
<h1 align="center">Tampil Data Check In</h1>

<form name="Simpan" action="<?php echo base_url();?>/cottagesedia/simpan_data" enctype="multipart/form-data" method="post">
<ul>
<li style="display: inline-table;"><fieldset >
	<legend>Data Tamu</legend>
	<table id="data_member" >
		<tr>
			<td width="150">No. Identitas</td>
			<td width="10">:</td>
			<td ><input type="text" name="no_id" readonly="text"  value="<?php echo $_POST['no_id']; ?>" /></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><input type="text" name="nama_tamu" readonly="text"  value="<?php echo $_POST['nama_tamu']; ?>" /></label></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><input type="text" name="jeniskelamin" readonly="text"  value="<?php echo $_POST['jeniskelamin']; ?>" /></td>
		</tr>
		<tr>
			<td>Warga Negara</td>
			<td>:</td>
			<td><input type="text" name="warganegara" readonly="text"  value="<?php echo $_POST['warganegara']; ?>" /></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td><input type="text" name="tgl_lahir" readonly="text"  value="<?php echo $_POST['tgl_lahir']; ?>" /></td>
		</tr>
		<tr>
			<td>No. Telepon</td>
			<td>:</td>
			<td><input type="text" name="no_telp" readonly="text"  value="<?php echo $_POST['no_telp']; ?>" /></td>
		</tr>
		<tr>
			<td>E-Mail</td>
			<td>:</td>
			<td><input type="text" name="email" readonly="text"  value="<?php echo $_POST['email']; ?>" /></td>
		</tr>

	</table>
		
	</fieldset>
</li>
<li style="display: inline-table;"><fieldset>
		<legend >Data cottage</legend>
		<table >
			<tr>
				<td width="150">Kode cottage</td>
				<td width="10">:</td>
				<td><input type="text" name="kode_cottage" readonly="text"  value="<?php echo $_POST['kode_cottage']; ?>" /></td>
      </tr>
      <tr>
        <td>Nama cottage</td>
        <td>:</td>
        <td><input type="text" name="nama_cottage" readonly="text"  value="<?php echo $_POST['nama_cottage']; ?>" /></td>
      </tr>
      <tr>
        <td>Jumlah Kamar</td>
        <td>:</td>
        <td><input type="text" name="jml_kamar" readonly="text" size="1" value="<?php echo $_POST['jml_kamar']; ?>" />Kamar</td>
      </tr>
      <tr>
        <td>Harga Sewa</td>
        <td>:</td>
        <td>Rp. <input type="text" name="hargasewa" readonly="text"  value="<?php echo $_POST['hargasewa']; ?>" /></td>
      </tr>
    </table>
      
    </fieldset> 
</li>
<li>
	<fieldset>
	<legend id="btnsewa">Pembayaran</legend>
	<table align="center">
		<tr>
		<td width="150">Tanggal Check In</td>
		<td width="10">:</td>
		<td><input type="text" name="tgl_masuk" readonly="text"  value="<?php echo $_POST['tgl_masuk']; ?>" /></td>
		
		</tr>
		<tr>
		<td>Tanggal Check Out</td>
		<td>:</td>
		<td><input type="text" name="tgl_keluar" readonly="text"  value="<?php echo $_POST['tgl_keluar']; ?>" /></td>
		</tr>
		<tr>
		<td>Lama</td>
		<td>:</td>
		<td><input type="text" name="lama" readonly="text"  value="<?php echo $lama; ?>" /></td>
		</tr>
		<td>Total Bayar</td>
		<td>:</td>
		<td><input type="text" name="total_harga_sewa" readonly="text"  value="<?php echo $total_harga_sewa; ?>" /></td>
		</tr>
		<td>Besar Minimal yg harus dibayar</td>
		<td>:</td>
		<td><input type="text" name="minimalbayar" readonly="text"  value="<?php echo 'Rp. '.$total_harga_sewa/2; ?>" /></td>
		</tr>
		<tr>
		<td>Bukti Lampiran</td>
		<td>:</td>
		<td><input type="file" name="buktip" value="353535"></td>
		</tr>

	</table>
		
	</fieldset>
</li>

	<li><input type="submit" name="submit" value="Simpan" /></li>
	</ul>
	</form>
	</fieldset>
