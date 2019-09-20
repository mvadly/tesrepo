
<?php
$kode_tamu=$_POST['kode_tamu'];
$no_id = $_POST['no_id'];
$nama_tamu = $_POST['nama_tamu'];
$jeniskelamin = $_POST['jeniskelamin'];
$warganegara = $_POST['warganegara'];
$tgl_lahir =$_POST['tgl_lahir'];
$no_telp =$_POST['no_telp'];
$email =$_POST['email'];

$query = $connect->query("insert into data_tamu(kode_tamu,no_id,nama_tamu,jeniskelamin,warganegara,tgl_lahir,no_telp,email,status) values('$kode_tamu','$no_id','$nama_tamu','$jeniskelamin','$warganegara','$tgl_lahir','$no_telp','$email','-') ");


	
if ($query===true) {

	echo "Data Berhasil Disimpan";
	
	}else{
		echo "Data Gagal Disimpan";
	}
?>