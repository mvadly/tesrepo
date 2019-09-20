<?php
include 'konf.php';
$kode_tamu='T'.date('hds');
$nama_tamu=@$_POST['nama_tamu'];
$no_id=@$_POST['no_id'];
$jeniskelamin=@$_POST['jeniskelamin'];
$warganegara=@$_POST['warganegara'];
$no_telp=@$_POST['no_telp'];
$email=@$_POST['email'];
$status='-';

if (@$_GET['page']=='tambah'){
	$insert = $db->prepare("INSERT INTO data_tamu (kode_tamu,nama_tamu,no_id,jeniskelamin,warganegara,no_telp,email,status) values(?,?,?,?,?,?,?,?)");
	$insert -> bindParam(1,$kode_tamu);
	$insert -> bindParam(2,$nama_tamu);
	$insert -> bindParam(3,$no_id);
	$insert -> bindParam(4,$jeniskelamin);
	$insert -> bindParam(5,$warganegara);
	$insert -> bindParam(6,$no_telp);
	$insert -> bindParam(7,$email);
	$insert -> bindParam(8,$status);
	$insert -> execute();
	if ($insert->rowCount()>0) {
		echo "sukses";

	}
}
?>