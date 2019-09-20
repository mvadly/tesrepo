<?php ?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Tamu</title>
	<style type="text/css">
		div{
			margin-bottom: 10px;
		}
		
	</style>
</head>
<body>
<div >
	<button id="tambahdata">Tambah Data</button>
</div>
<div id="tampildata">
<?php include 'tampildata.php'; ?>
</div>
<div id="cruddata"></div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
	$("#tambahdata").click(function () {
		$("#cruddata").hide().load("tambah.php").fadeIn(1000);
	});
	$("#cruddata").on("click","#simpandata",function(){
		var namatamu = $("#namatamu").val();
		var no_id = $("#no_id").val();
		var jeniskelamin = $("#jeniskelamin").val();
		var warganegara = $("#warganegara").val();
		var tgl_lahir = $("#tgl_lahir").val();
		var no_telp = $("#no_telp").val();
		var email = $("#email").val();
		if (namatamu == '' || no_id == '' || jeniskelamin == '' || warganegara == '' || tgl_lahir == '' || no_telp == '' || email == '') {
			alert("inputan tidak boleh kosong");
		}else{
			$.ajax({
				url:'proses.php?page=tambah',
				type:'post',
				data:'namatamu='+namatamu+'&no_id='+no_id+'&jeniskelamin='+jeniskelamin+'&warganegara='+warganegara+'&tgl_lahir='+tgl_lahir+'&no_telp='+no_telp+'&email='+email,
				success :function(msg){
					if (msg == 'sukses') {
						$("#tampildata").load("tampildata.php");
					}else{
						alert("gagal menambahkan data");
					}
				}
			});
		}
		
	});
	$("#tampildata").on("click",".edit",function(){
		var id = $(this).attr("id");
		$.ajax({
			url:'edit.php',
			type:'post',
			data:'id='+id,
			success :function(msg){
					
						$("#cruddata").hide().fadeIn(1000).html(msg);
					}

		});


	});
</script>

</body>
</html>