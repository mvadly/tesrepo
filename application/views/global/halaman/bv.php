
<style type="text/css">
input[type=text],input[type=email],input[type=date],select{
	width: 100%; 
	padding: 5px 10px 5px 10px;
	border-radius: 5px; 
	border:1px solid black;

}
input[disabled=text]:hover{
	cursor: not-allowed;
}
input[type=text]:hover,input[type=email]:focus,input[type=date]:focus,select:focus{
	box-shadow: 5px  5px 3px gray;
}
input[type=submit]{
	width: 100%;
	height: 35px;
	border-radius: 5px;
	background-color: #645;
	color: white;
	font-size: 15px;

}
td{
	padding: 5px 5px 5px 5px;
}
legend{
	cursor:pointer;
}
fieldset{
	padding: 10px 10px 10px 10px;
	margin-bottom: 10px; 
}

</style>
<script>
$(document).ready(function(){

	$("h1").click(function(){
        $("#data_member,#data_villa,#sewa").show(1000);
    });
	
       $("#btnmember").click(function(){
        $("#data_member").toggle();
    });
       $("#btnvilla").click(function(){
        $("#data_villa").toggle();
    });
         $("#btnsewa").click(function(){
        $("#sewa").toggle();
    });

});

</script>
<h1 align="center">Booking</h1>

<fieldset>

	<form name="tampil" action="aksi/aksi-booking.php" method="post">
	<fieldset >
	<legend id="btnmember"> Isi Member</legend>
	<table id="data_member" hidden="table">
		<tr>
			<td width="150">No. Identitas</td>
			<td width="10">:</td>
			<td width="600"><input type="text" name="no_id" autocomplete="off" required="" /></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><input type="text" name="nama_tamu" autocomplete="off" /></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td>
			<select name="jeniskelamin">
				<option value="">Pilih</option>
				<option value="Laki-laki">Laki-Laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>Warga Negara</td>
			<td>:</td>
			<td><input type="text" name="warganegara" autocomplete="off" /></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td><input type="date" name="tgl_lahir" autocomplete="off"  placeholder="dd/mm/yyyy" /></td>
		</tr>
		<tr>
			<td>No. Telepon</td>
			<td>:</td>
			<td><input type="text" name="no_telp" autocomplete="off" /></td>
		</tr>
		<tr>
			<td>E-Mail</td>
			<td>:</td>
			<td><input type="email" name="email" autocomplete="off" /></td>
		</tr>

	</table>
		
	</fieldset>
	<fieldset>
		<legend id="btnvilla">Pilih Villa</legend>
		<table id="data_villa" hidden="table" >
			<tr>
				<td width="150">Kode Villa</td>
				<td width="10">:</td>
				<td width="600"><select name="kode_villa" id="kode_villa" onchange="changeValue(this.value)" >
        <option value=0 disabled="option">Pilih Villa</option>
        <?php 
   		$result = mysql_query("select * from data_villa where status='Kosong'");    
    	$jsArray = "var dtvilla = new Array();\n";       
    	while ($row = mysql_fetch_array($result)) {    
        echo '<option value="' . $row['kode_villa'] . '">' . $row['kode_villa'] . '</option>';    
        $jsArray .= "dtvilla['" . $row['kode_villa'] . "'] = {jenis_villa:'" . addslashes($row['jenis_villa']) . "',hargasewa:'".addslashes($row['hargasewa'])."'};\n";    
    	}      
    	?>    
        </select></td>
      </tr>
      <tr>
        <td>Jenis Villa</td>
        <td>:</td>
        <td width="600"><input type="text"  id="jenis_villa" name="jenis_villa" disabled="text" autocomplete="off" /></td>
      </tr>
      <tr>
        <td>Harga Sewa</td>
        <td>:</td>
        <td><input type="text"  id="hargasewa" name="hargasewa" disabled="text" autocomplete="off"/><br/>
        
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
        <i>*Jika Villa yg kamu cari tidak ada pada list Villa, kemungkinan villa tersebut dalam status terisi...</i>
        </td>
      </tr>
    </table>
      <script type="text/javascript">    
    	<?php echo $jsArray; ?>  
    	function changeValue(kode_villa){  
    	document.getElementById('jenis_villa').value = dtvilla[kode_villa].jenis_villa;  
    	document.getElementById('hargasewa').value = dtvilla[kode_villa].hargasewa;  
    	};  
    </script>
    </fieldset> 
	
	<fieldset>
	<legend id="btnsewa">Sewa</legend>
	<table id="sewa" hidden="table">
		<tr>
		<td width="150">Tanggal Check In</td>
		<td width="10">:</td>
		<td width="600"><input type="date" name="tgl_masuk" placeholder="dd/mm/yyyy"/></td>
		</tr>
		<tr>
		<td>Tanggal Check Out</td>
		<td>:</td>
		<td><input type="date" name="tgl_keluar" placeholder="dd/mm/yyyy"/></td>
		</tr>
		<td>Upload Lampiran Pembayaran</td>
		<td>:</td>
		<td><input type="file" name="buktip"/></td>
		</tr>
	</table>
		
	</fieldset>
	<input type="submit" name="submit" value="Lanjut" />
	</form>
	</fieldset>
