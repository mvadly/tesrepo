<?php
// Load file koneksi.php
include 'config.php';

// Ambil Data yang Dikirim dari Form
$kode_booking = $_POST['kode_booking'];
$fotostruk = $_FILES['fotostruk']['name'];
$tmp = $_FILES['fotostruk']['tmp_name'];
  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$buktip = date('dmYHis').$fotostruk;

// Set path folder tempat menyimpan fotonya
$path = "admin/images/".$buktip;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = $connect->query("update data_cekin_booking set buktip='$buktip' where kode_booking='$kode_booking'") or die(mysql_error());
   // Eksekusi/ Jalankan query dari variabel $query

  if($query){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: index.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='konfirm_pembayaran.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='konfirm_pembayaran.php'>Kembali Ke Form</a>";
}
?>