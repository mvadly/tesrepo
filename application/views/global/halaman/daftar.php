<html>
<head>
<title></title>

<link href="css/form.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.pilih{
	background-color: #656;
	display: inline-block;
	padding: 10px 10px 10px 10px;
	border-radius: 5px;
	color: white;
}
.pilih:hover{
	background-color: blue; display: block;

}
</style>
</head>

<body>
<script type="text/javascript">
alert("Masukan Data dengan lengkap!");
</script>


<form  action="aksi/aksi-daftar1.php" method="post" >

<h1>Daftar Member</h1>

<label>No. Identitas</label><br/>
<input  name="no_id" type="text"   autofocus id="no_id" autocomplete="off" required="required" ><br/>
<label>Nama Lengkap</label><br/>
<input class="input_data" name="nama" type="text" autofocus id="nama" autocomplete="off" required="required"><br/>
<label>Nama Pengguna</label><br/>
<input class="input_data" name="user_name" type="text" id="user_name" autocomplete="off" required="required" /><br/>
<label>Password</label><br/>
<input class="input_data" name="password" type="password" id="password" autocomplete="off" required="required" /><br/>
<label>Alamat</label><br/>
<input class="input_data" name="alamat" type="text" id="alamat" maxlength="30" autocomplete="off" required="required" ><br/>
<label>Tanggal Lahir</label><br/>
<input class="input_data" name="tgl_lahir" type="date" id="tgl_lhr" autocomplete="off" required="required" ><br/>
<label>Nomor Telepon</label><br/>
<input class="input_data" name="no_telp" type="text" id="no_telp" autocomplete="off" required="required" ><br/>
<label>E-Mail</label><br/>
<input class="input_data" name="email" type="email" id="email" autocomplete="off" required="required" ><br/>



<input id="tombol" type="submit" name="submit"  value="Daftar"/>
</form>


</body>
</html>