<div class="panel panel-default">
<div class="panel-heading">
Pembayaran
</div>
<div id="widget1" class="panel-body collapse in">

	<table class="table " width="100%">
	<tr>
		<td width="200">Tanggal Masuk</td>
		<td width="10">:</td>
		<td><?php echo $tgl_masuk; ?></td>
	</tr>
	<tr>
		<td>Tanggal Keluar</td>
		<td>:</td>
		<td><?php echo $tgl_keluar; ?></td>
	</tr>
	<tr>
		<td>Total Harga Sewa</td>
		<td>:</td>
		<td>Rp. <?php echo number_format($total_harga_sewa); ?>,00</td>
	</tr>
	<tr>
		<td>Minimal DP</td>
		<td>:</td>
		<td>Rp. <?php echo number_format($total_harga_sewa/2);  ?>,00</td>
	</tr>
	<?php 
		$tesdp='Masukan DP';
		if (($dp >=(($total_harga_sewa/2))) and ($ket=='1')) {
			$tesdp='DP Terbayar';
			?>

		
	<tr class="form-group">
		<td><?php echo $tesdp ;?></td>
		<td>:</td>
		<td>
			
		

				<p><input type="text" name="dp" class="form-control" value="<?php echo $dp;  ?>" readonly></p>
				<p><input type="text" name="sisa" class="form-control" value="<?php echo $total_harga_sewa-$dp;  ?>" readonly></p>
				<p><input type="number" name="pembayaran" class="form-control" placeholder="Bayar" value="<?php echo $total_harga_sewa ?>"></p>
				<p><input type="number" name="kembali" class="form-control" placeholder="Kembali" readonly></p>
				</td>
				
			<?php }else{ ?>
	<tr class="form-group">
		<td><?php echo $tesdp ;?></td>
		<td>:</td>
		<td>
				<input type="number" name="dp" class="form-control" value="<?php echo $dp;  ?>" placeholder="Masukan DP" >

			<?php } ?>
		
		</td>
	</tr>
</table>		

</div>
</div>