<?php  
//Data Tamu
$no_id = $_POST['no_id'];
$nama_tamu = $_POST['nama_tamu'];
$jeniskelamin = $_POST['jeniskelamin'];
$warganegara = $_POST['warganegara'];
$tgl_lahir = $_POST['tgl_lahir'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];
//Data Villa
$kode_villa = $_POST['kode_villa'];
$jenis_villa = $_POST['jenis_villa'];
$hargasewa = $_POST['hargasewa'];
//Data Sewa

$tgl_masuk = $_POST['tgl_masuk'];
$tgl_keluar = $_POST['tgl_keluar'];

$lama=$tgl_keluar-$tgl_masuk;
$total_harga_sewa=$lama*$hargasewa;
?>
<style type="text/css">
	input[type=text]{
		background-color: rgba(0,0,0,0);
		border:none;
		font-weight: bold;
	}
	table{
		float: left;
	}
</style>
<h1 align="center">Tampil Data Check In</h1>

<form name="Simpan" action="<?php echo base_url();?>/booking/simpan_data" enctype="multipart/form-data" method="post">
<fieldset >
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
	<fieldset>
		<legend >Data Villa</legend>
		<table >
			<tr>
				<td width="150">Kode Villa</td>
				<td width="10">:</td>
				<td><input type="text" name="kode_villa" readonly="text"  value="<?php echo $_POST['kode_villa']; ?>" /></td>
      </tr>
      <tr>
        <td>Jenis Villa</td>
        <td>:</td>
        <td><input type="text" name="jenis_villa" readonly="text"  value="<?php echo $_POST['jenis_villa']; ?>" /></td>
      </tr>
      <tr>
        <td>Harga Sewa</td>
        <td>:</td>
        <td>Rp. <input type="text" name="hargasewa" readonly="text"  value="<?php echo $_POST['hargasewa']; ?>" /></td>
      </tr>
    </table>
      
    </fieldset> 
	
	<fieldset>
	<legend id="btnsewa">Pembayaran</legend>
	<table>
		<tr>
		<td width="150">Tanggal Check In</td>
		<td width="10">:</td>
		<td><input type="text" name="tgl_masuk" readonly="text"  value="<?php echo $_POST['tgl_masuk']; ?>" /></td>
		<td>Bukti Lampiran</td>
		<td>:</td>
		<td><input type="file" name="file_upload" value=""></td>
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

	</table>
		
	</fieldset>
	<input type="submit" name="submit" value="Simpan" />
	</form>
	</fieldset>
