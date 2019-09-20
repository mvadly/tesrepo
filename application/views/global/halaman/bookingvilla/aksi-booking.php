<?php
//Data Tamu
$connect = new mysqli('localhost','root','','database');
include "sendEmail-v156/sendEmail-v156.php";

$no_id = $_POST['no_id'];
$nama_tamu = $_POST['nama_tamu'];
$jeniskelamin = $_POST['jeniskelamin'];
$warganegara = $_POST['warganegara'];
$tgl_lahir = $_POST['tgl_lahir'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];
//Data Villa
$kode_villa = $_POST['kode_villa'];
$jenis_villa = $_POST['jenis_villa'];
$hargasewa = $_POST['hargasewa'];
//Data Sewa
$tgl_masuk = $_POST['tgl_masuk'];
$tgl_keluar = $_POST['tgl_keluar'];

$lama=$tgl_keluar-$tgl_masuk;
$total_harga_sewa=$lama*$hargasewa;

$kodebooking ='KB'.date('hsd').$no_id;
$subject='Booking Villa';





$querysewa = $connect->query("insert into data_cekin_booking values('$kodebooking','$tgl_masuk','$tgl_keluar', 'Belum Bayar','$total_harga_sewa')")or die(mysql_error());

$querytamu = $connect->query("insert into data_tamu_booking values('$kodebooking','$no_id','$nama_tamu','$jeniskelamin', '$warganegara', '$tgl_lahir', '$no_telp', '$email','Tunda')")or die(mysql_error());

$queryvilla = $connect->query("insert into data_villa_booking values('$kodebooking','$kode_villa','$jenis_villa', '$hargasewa','Tunda')")or die(mysql_error());


 
$to       = $email;
$subject='Booking Villa';
$message  = 'Hmmm';
 
// user dan password gmail
$sender   = 'caritaasri.online@gmail.com';
$password = 'fadlyganteng24';
 
if(email_localhost($to, $subject, $message, $sender, $password))
    echo "Email sent";
else
    echo "Email sending failed";


if ($querysewa or$querytamu or $queryvilla){
echo "<script language='JavaScript'>alert('Booking berhasil');
	  eval(\"window.location='?page=beranda'\");
	</script>";

}
else {
echo "<script language='JavaScript'>
		alert('booking gagal');
		eval(\"window.location='index.php?page=bv'\");
		</script>";
}



?>