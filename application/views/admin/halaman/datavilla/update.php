
<?php

//tangkap data dari form
$kode_villa= $_POST['kode_villa'];
$status =$_POST['status'];

//update data di database sesuai kode villa
$query = $connect->query("update data_villa set status='$status' where kode_villa='$kode_villa'") or die(mysql_error());


	
if ($query) {
	header('location:index.php?admin=datavilla');
	?><script>alert("Data Villa telah diubah");</script>


	
<?php

}
?>