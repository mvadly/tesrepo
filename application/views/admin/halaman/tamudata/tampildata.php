<table border="1">
	<tr>
		<th>No</th>
		<th>Kode Tamu</th>
		<th>No. Identitas</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Warga Negara</th>
		<th>Tanggal Lahir</th>
		<th>No. Telp</th>
		<th>Email</th>
		<th>Status</th>
		<th>Pilihan</th>
	</tr>
	<?php
	include 'konf.php';
	$no=1;
	try {
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$tampil=$db->query("select * from data_tamu");
		while ($data=$tampil->fetch(PDO::FETCH_LAZY)) {

	?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $data['kode_tamu'];?></td>
		<td><?php echo $data['no_id'];?></td>
		<td><?php echo $data['nama_tamu'];?></td>
		<td><?php echo $data['jeniskelamin'];?></td>
		<td><?php echo $data['warganegara'];?></td>
		<td><?php echo $data['tgl_lahir'];?></td>
		<td><?php echo $data['no_telp'];?></td>
		<td><?php echo $data['email'];?></td>
		<td><?php echo $data['status'];?></td>
		<td>
		<button class="edit" id="<?php echo $data[0];?>">Ubah</button>
		<button class="Hapus" id="<?php echo $data[0];?>">Hapus</button>
		</td>
	</tr>
	<?php
		}
		
	} catch (Exception $e) {
		echo $e->getMessage();
		
	}
	?>
</table>