
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/basic.min.css') ?>">

<script type="text/javascript" src="<?php echo base_url('assets/dropzone.min.js') ?>"></script>

<style type="text/css">


.dropzone {
	border: 2px solid #0087F7;

}

</style>

</head>
<body >


<div class="dropzone">

  <div class="dz-message">
   <h3><i class="fa fa-photo"></i><br/> Klik atau Drop gambar disini</h3>
  </div>

</div>



<script type="text/javascript">

Dropzone.autoDiscover = false;

var foto_upload= new Dropzone(".dropzone",{
url: "<?php echo base_url('admin/upload/proses_upload') ?>",
maxFilesize: 2,
method:"post",
acceptedFiles:"image/*",
paramName:"userfile",
dictInvalidFileType:"Type file ini tidak dizinkan",
addRemoveLinks:true,
});


//Event ketika Memulai mengupload
foto_upload.on("sending",function(a,b,c){
	a.token="<?php echo $kode_cottage ?>";
	c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
});


//Event ketika foto dihapus
foto_upload.on("removedfile",function(a){
	var token=a.token;
	$.ajax({
		type:"post",
		data:{token:token},
		url:"<?php echo base_url('admin/upload/remove_foto') ?>",
		cache:false,
		dataType: 'json',
		success: function(){
			console.log("Foto terhapus");
		},
		error: function(){
			console.log("Error");

		}
	});
});


</script>

</body>
</html>