<?php
if ($cottagetersedia<0){
            $this->session->set_flashdata('warning','Maaf cottage tidak tersedia');
            
        }else{

?>
<style type="text/css">
	.kolom{
		display: inline-grid;
		padding-right:  10px;
		margin: 5px;
	}

	p img{
		margin:5px;
		border: 5px solid gray;

	}
	.order{
	 background: #fac648; border: none; color: black; margin: 3px;
	}
</style>
								
<h1 align="center">Daftar Cottage Tersedia</h1>


<p style="padding: 20px; font-weight: bolder; background: white; border-radius: 5px;">Cottage Tersedia : <?php echo $cottagetersedia; ?></p>

<table id="table" class="table" width="100%">
	<thead>
	
		<tr>
			<th>Room </th>
			<th>Gambar </th>
			<th>Nama Cottage </th>
			<th>Jumlah Kamar </th>
			<th>Harga Sewa </th>
			<th>Pilihan </th>

		</tr>
	</thead>
	
	<tbody>
	<?php foreach ($datacottage as $data) {
		$gambar1= $data['gambar1'];
		$gambar2= $data['gambar2'];
		$gambar3= $data['gambar3'];
		$gambar4= $data['gambar4'];
            if ($gambar1==null){
                $gambar1 = base_url('assets/upload/gambar/calogo.png');
            }else{
                $gambar1 = base_url('assets/upload/gambar/'.$gambar1);
            }
            if ($gambar2==null){
                $gambar2 = base_url('assets/upload/gambar/calogo.png');
            }else{
                $gambar2 = base_url('assets/upload/gambar/'.$gambar2);
            }
            if ($gambar3==null){
                $gambar3 = base_url('assets/upload/gambar/calogo.png');
            }else{
                $gambar3 = base_url('assets/upload/gambar/'.$gambar3);
            }
            if ($gambar4==null){
                $gambar4 = base_url('assets/upload/gambar/calogo.png');
            }else{
                $gambar4 = base_url('assets/upload/gambar/'.$gambar4);
            }
      ?>
	
		<tr>
				<td>Room <?php echo $data['kode_cottage']; ?></td>
				<td><img src="<?php echo $gambar1; ?>" width="200" height="150" /></td>
				<td> <?php echo $data['nama_cottage']; ?></td>
				<td> <?php echo $data['jml_kamar']; ?> Kamar</td>
				<td>Rp. <?php echo number_format($data['hargasewa']); ?>,-</td>
				<td><a href="<?php echo base_url();?>cottagesedia/pesan_cottage/<?php echo $data['kode_cottage'];?>" class="btn btn-primary order " data-toggle="tooltip" data-placement ="bottom" title="Pesan Pelanggan Lama"><i class="fa fa-book"></i><small><i class="fa fa-check"></i></small></a>
					<a href="<?php echo base_url();?>cottagesedia/pesan_cottage/<?php echo $data['kode_cottage'];?>" class="btn btn-primary order " data-toggle="tooltip" data-placement ="bottom" title="Pesan Pelanggan Baru" ><i class="fa fa-book"></i><small><i class="fa fa-plus"></i></small></a>
				</td>
				
			
		</tr>
		<?php }?>
	</tbody>
</table>
<!-- <table id="table" class="table" width="100%">
	<thead>
	<?php foreach ($datacottage as $data) {
		$gambar1= $data['gambar1'];
		$gambar2= $data['gambar2'];
		$gambar3= $data['gambar3'];
		$gambar4= $data['gambar4'];
            if ($gambar1==null){
                $gambar1 = base_url('assets/upload/gambar/calogo.png');
            }else{
                $gambar1 = base_url('assets/upload/gambar/'.$gambar1);
            }
            if ($gambar2==null){
                $gambar2 = base_url('assets/upload/gambar/calogo.png');
            }else{
                $gambar2 = base_url('assets/upload/gambar/'.$gambar2);
            }
            if ($gambar3==null){
                $gambar3 = base_url('assets/upload/gambar/calogo.png');
            }else{
                $gambar3 = base_url('assets/upload/gambar/'.$gambar3);
            }
            if ($gambar4==null){
                $gambar4 = base_url('assets/upload/gambar/calogo.png');
            }else{
                $gambar4 = base_url('assets/upload/gambar/'.$gambar4);
            }
      ?>
		<tr>
			<th>
				
			</th>
		</tr>
	</thead>
	<tbody>
	
		<tr>
			<td>
				<legend style="background: gray; color: white; padding: 10px  10px 10px 10px; border-radius: 5px;" >Room <?php echo $data['kode_cottage']; ?>
					<a href="<?php echo base_url();?>cottagesedia/pesan_cottage/<?php echo $data['kode_cottage'];?>" class="btn btn-primary order" data-toggle="tooltip" data-placement ="bottom" title="Pesan Pelanggan Baru">Pesan Pelanggan Lama</a>
					<a href="<?php echo base_url();?>cottagesedia/pesan_cottage/<?php echo $data['kode_cottage'];?>" class="btn btn-primary order" data-toggle="tooltip" data-placement ="bottom" title="Pesan Pelanggan Baru" >Pesan Pelanggan Baru</a>
				</legend>
				<div class="kolom">
				<p>
				<img src="<?php echo $gambar1; ?>" width="200" height="150" />
				<img src="<?php echo $gambar2; ?>" width="200" height="150" />
				</p>
				<p>
				<img src="<?php echo $gambar3; ?>" width="200" height="150" />
				<img src="<?php echo $gambar4; ?>" width="200" height="150" /></p>
				</div>
				<div class="kolom">
				<p>Nama Cottage</p>
				<p>Jumlah Kamar</p>
				<p>Harga Sewa</p>
				</div>
				<div class="kolom" >
				<p>: <?php echo $data['nama_cottage']; ?></p>
				<p>: <?php echo $data['jml_kamar'].' Kamar'; ?></p>
				<p>: <?php echo $data['hargasewa']; ?></p>
				</div>
			</td>
			<?php }?>
		</tr>
	</tbody>
</table> -->
<?php } ?>



	
	

