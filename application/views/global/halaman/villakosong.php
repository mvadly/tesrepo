<style type="text/css">
	.kolom{
		display: inline-grid;
		padding-right:  10px;
	}

	p img{
		margin:5px;
		border: 5px solid gray;

	}
	.order{
		float: right; background: #fac648; border: none; color: black; margin: 5px;
	}
</style>
								
<h1 align="center">Daftar Kamar Tersedia</h1>
<p style="padding: 20px; font-weight: bolder; background: white;">Villa Tersedia : <?php echo $villatersedia; ?></p>
<?php foreach ($datavilla as $data) {?>
	<div class="table table-condensed">
		<fieldset>
		<legend style="background: gray; color: white; padding: 10px;" ><?php echo $data['kode_villa']; ?>
		<a href="<?php echo base_url();?>villasedia/pesan_villa/<?php echo $data['kode_villa'];?>" class="btn btn-primary order" >Pesan Pelanggan Lama</a>&nbsp;
		<a href="<?php echo base_url();?>villasedia/pesan_villa/" class="btn btn-primary order" data-toggle="tooltip" data-placement ="top" title="Pesan Pelanggan Baru" >Pesan</a>
		</legend>
		<div>
		<div class="kolom">
		<p>Jenis Villa</p>
		<p>Harga Sewa</p>
		</div>
		<div class="kolom" >
		<p><?php echo $data['jenis_villa']; ?></p>
		<p><?php echo $data['hargasewa']; ?></p>
		</div>
		</div>
		<?php 
		$gambar1= $data['gambar1'];
		$gambar2= $data['gambar2'];
		$gambar3= $data['gambar3'];
		$gambar4= $data['gambar4'];
                                    if ($gambar1==null){
                                        $gambar1 = base_url('assets/upload/gambarvilla/calogo.png');
                                    }else{
                                        $gambar1 = base_url('assets/upload/gambarvilla/'.$gambar1);
                                    }
                                    if ($gambar2==null){
                                        $gambar2 = base_url('assets/upload/gambarvilla/calogo.png');
                                    }else{
                                        $gambar2 = base_url('assets/upload/gambarvilla/'.$gambar2);
                                    }
                                    if ($gambar3==null){
                                        $gambar3 = base_url('assets/upload/gambarvilla/calogo.png');
                                    }else{
                                        $gambar3 = base_url('assets/upload/gambarvilla/'.$gambar3);
                                    }
                                    if ($gambar4==null){
                                        $gambar4 = base_url('assets/upload/gambarvilla/calogo.png');
                                    }else{
                                        $gambar4 = base_url('assets/upload/gambarvilla/'.$gambar4);
                                    }
                                ?>
		<div align="center">
		<p>
		<img src="<?php echo $gambar1; ?>" width="200" height="150" />
		<img src="<?php echo $gambar2; ?>" width="200" height="150" />
		</p>
		<p>
		<img src="<?php echo $gambar3; ?>" width="200" height="150" />
		<img src="<?php echo $gambar4; ?>" width="200" height="150" /></p>
		</div>
		</fieldset>
		
	</div>
	
	
<?php }?>
