
<style type="text/css">
/*input[type=text],input[type=email],input[type=date],select{
	width: 100%; 
	padding: 5px 10px 5px 10px;
	border-radius: 5px; 
	border:1px solid gray;

}
input[readonly=text]{
	background-color: gray; color: white;
}
input[readonly=text]:hover{
	cursor: not-allowed; background-color: gray;
}
input[type=text]:hover,input[type=email]:focus,input[type=date]:focus,select:focus{
	box-shadow: 5px  5px 3px gray;
}
input[type=submit]{
	width: 100%;
	height: 35px;
	border-radius: 5px;
	background-color: #645;
	border: 0;
	color: white;
	font-size: 15px;

}*/
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
        $("#data_member").toggle(500);
    });
       $("#btnvilla").click(function(){
        $("#data_villa").toggle(500);
    });
         $("#btnsewa").click(function(){
        $("#sewa").toggle(500);
    });
         

});
</script>
<h1 align="center">Booking</h1>

<div class="jarak">
<fieldset>

	<form name="tampil" action="<?php echo base_url();?>booking/tampilbv" enctype="multipart/form-data" method="post">
	<fieldset >
	<legend id="btnmember"> Isi Member</legend>
	<table id="data_member" >
		<tr>
			<td width="150">No. Identitas</td>
			<td width="10">:</td>
			<td width="600">
			<input type="text"  class="form-control" name="no_id" required  /></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><input type="text" name="nama_tamu"  class="form-control" required /></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td>
			<select name="jeniskelamin" class="form-control" required>
				<option value="">Pilih</option>
				<option value="Laki-laki">Laki-Laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>Warga Negara</td>
			<td>:</td>
			<td><input type="text" name="warganegara" class="form-control" required /></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td>
			<div class="form-group">
                        <div class="form-group">
                            <div class='input-group date' id='datepicker'>
                                <input type='text' name="tgl_lahir" class="form-control" required/>
                                <span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
                            </div>
                        </div>
                    </div>
            </td>
		</tr>
		<tr>
			<td>No. Telepon</td>
			<td>:</td>
			<td><input type="text" name="no_telp" class="form-control" required /></td>
		</tr>
		<tr>
			<td>E-Mail</td>
			<td>:</td>
			<td><input type="email" name="email" class="form-control" required /></td>
		</tr>

	</table>
		
	</fieldset>

	<fieldset hidden>
		<legend id="btnvilla">Pilih Villa</legend>
		<table id="data_villa" hidden="table" >
			<tr>
				<td width="150">Kode Villa</td>
				<td width="10">:</td>
				<td width="600"><select name="kode_villa" id="kode_villa" class="form-control" onchange="changeValue(this.value)" required >
        <option value="<?php echo $kode_villa ?>" selected><?php echo $kode_villa ?></option>

        <?php 


   		   
    	$jsArray = "var dtvilla = new Array();\n";       
    	foreach ($datavilla as $row) {
    	 	
        echo '<option value="' . $row['kode_villa'] . '">' . $row['kode_villa'] . '</option>';    
        $jsArray .= "dtvilla['" . $row['kode_villa'] . "'] = {jenis_villa:'" . addslashes($row['jenis_villa']) . "',hargasewa:'".addslashes($row['hargasewa'])."'};\n";    
    	}      
    	?>    
        </select></td>
      </tr>
      <tr>
        <td>Jenis Villa</td>
        <td>:</td>
        <td width="600"><input type="text"  id="jv" name="jenis_villa" class="form-control" readonly="text" value="<?php echo $jenis_villa ?>" /></td>
      </tr>
      <tr>
        <td>Harga Sewa</td>
        <td>:</td>
        <td><input type="text"  id="hs" name="hargasewa" class="form-control" readonly="text" value="<?php echo $hargasewa ?>" /><br/>
        
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
    	document.getElementById('jv').value = dtvilla[kode_villa].jenis_villa;  
    	document.getElementById('hs').value = dtvilla[kode_villa].hargasewa;  
    	};  
    </script>
    </fieldset> 
	
	<fieldset>
	<legend id="btnsewa">Sewa</legend>
	<table id="sewa" hidden="table">
		<tr>
		<td width="150">Tanggal Check In</td>
		<td width="10">:</td>
		<td width="600"><input type="date" name="tgl_masuk" class="form-control" placeholder="dd/mm/yyyy" required/></td>
		</tr>
		<tr>
		<td>Tanggal Check Out</td>
		<td>:</td>
		<td>
		<div class="form-group">
        <div class='input-group date' id='datepicker'>
		<input type="text" name="tgl_keluar" class="form-control" placeholder="dd/mm/yyyy" required/>
		<span class="input-group-addon">
			<span class="glyphicon glyphicon-calendar"></span>
		</span>
        </div>
        </div>

		</td>
		
	</table>
	<div class="modal-footer" align="center">
			<button type="reset" class="btn btn-danger ">Reset</button>
			<a href="index"><button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button></a>
			<input type="submit" name="submit" class="btn btn-primary " value="Lanjut" />
			</div>
		
	</fieldset>
	
	</form>
</fieldset>
</div>
<script type="text/javascript">
    
</script>
