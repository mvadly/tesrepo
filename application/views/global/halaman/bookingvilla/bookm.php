
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
