

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

	<form name="tampil" action="<?php echo base_url();?>cottagesedia/tampilbc" enctype="multipart/form-data" method="post">
	<fieldset >
	<legend id="btnmember"> Isi Member</legend>
	<div class="form-group">
		<input type="text"  class="form-control" name="no_id" required  placeholder="No. Identitas" />
	</div>
	<div class="form-group">
		<input type="text" name="nama_tamu"  class="form-control" required placeholder="Nama Tamu"/>
	</div>
	<div class="form-group">
		<select name="jeniskelamin" class="form-control" required>
				<option selected>Jenis Kelamin</option>
				<option value="Laki-laki">Laki-Laki</option>
				<option value="Perempuan">Perempuan</option>
		</select>
	</div>
	<div class="form-group">
		<select name="warganegara" class="form-control" required>
				<option selected>Warga Negara</option>
				<option value="Indonesia">Indonesia</option>
				<option value="United States">United States</option>
		</select>
	</div>
	<div class="form-group">
         <div class='input-group date' id='datepicker'>
            <input type='text' name="tgl_lahir" class="form-control" required placeholder="Tanggal Lahir" />
         <span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
		 </span>
    	 </div>
         <i style="float: right;">Format : YYYY-MM-DD</i> 
    </div>
    <div class="form-group">
    	<input type="text" name="no_telp" class="form-control" required placeholder="No. Telepon" />
	</div>
	<div class="form-group">
    	<input type="email" name="email" class="form-control" required placeholder="Email" />
	</div>
		
	</fieldset>

	<fieldset hidden>
		<select name="kode_cottage" id="kode_cottage" class="form-control" onchange="changeValue(this.value)" required >
        <option value="<?php echo $kode_cottage ?>" selected><?php echo $kode_cottage ?></option>   
        </select>
      	<input type="text"  id="jv" name="nama_cottage" class="form-control" readonly="text" value="<?php echo $nama_cottage ?>" />
        <input type="text"   name="jml_kamar" class="form-control" readonly="text" value="<?php echo $jml_kamar ?>"/>
        <input type="text"  id="hs" name="hargasewa" class="form-control" readonly="text" value="<?php echo $hargasewa ?>" />
    </fieldset> 
	
	<fieldset>
	<legend id="btnsewa">Sewa</legend>
	
			<?php $this->load->view('global/halaman/booking/tgl'); ?>
		
	<div class="modal-footer" align="center">
			<button type="reset" class="btn btn-danger ">Reset</button>
			<a href="index"><button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button></a>
			<input type="submit" name="submit" class="btn btn-primary " value="Lanjut" />
			</div>
		
	</fieldset>
	
	</form>
</fieldset>
</div>

