
				<div class="form-group">
					<div class="input-group date" id="tgl1">
						<input type="text" class="form-control" name="tgl_masuk" placeholder="Tanggal Check In" required />	
							<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group date" id="tgl2">
						<input type="text" class="form-control" name="tgl_keluar" placeholder="Tanggal Check Out" required/>	
							<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
					</div>
				</div>
				<div class="form-group">
						<input type="text" class="form-control" id="lama" placeholder="Lama Sewa" readonly />	
				</div>

<script>

$(function() { 
  $('#tgl1').datetimepicker({
   locale:'id',
   format:'YYYY-MM-DD'
   });
   
  $('#tgl2').datetimepicker({
   useCurrent: false,
   locale:'id',
   format:'YYYY-MM-DD'
   });
   
   $('#tgl1').on("dp.change", function(e) {

    $('#tgl2').data("DateTimePicker").minDate(e.date);
  });
  
   $('#tgl2').on("dp.change", function(e) {
    $('#tgl1').data("DateTimePicker").maxDate(e.date);

      CalcDiff()
   });
  
});

function CalcDiff(){
var a=$('#tgl1').data("DateTimePicker").date();
var b=$('#tgl2').data("DateTimePicker").date();
    var timeDiff=0
     if (b) {
            timeDiff = (b - a) / 1000;
        }
	$('#sewa').show();
	$('#lama').val(Math.floor(timeDiff/(86400)))   
}
</script>	
