
<?php
include('config.php');

//tangkap data dari form
$no_id = $_POST['no_id'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$tgl_lahir =$_POST['tgl_lahir'];
$no_telp =$_POST['no_telp'];
$email =$_POST['email'];

//update data di database sesuai user_id
$query = $connect->query("update daftar_member set password='$password', alamat='$alamat', tgl_lahir='$tgl_lahir', no_telp='$no_telp', email='$email' where no_id='$no_id'") or die(mysql_error());


	
if ($query) {

	
	header('location:index.php?admin=datamember');
}
?>