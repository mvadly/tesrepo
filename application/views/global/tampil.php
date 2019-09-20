<center>
<h2>Contoh Tabel Data</h2>
<table>
<tabel border=2 >
<tr>
<td>Kode</td>
<td>Nama</td>
<td>Jml</td>
<td>Hargasewa</td>

</tr>

<?php foreach($tampil as $row) : ?>

<tr>
<td> <?php print $row->kode_cottage; ?> </td>
<td> <?php print $row->nama_cottage; ?> </td>
<td> <?php print $row->jml_kamar; ?> </td>
<td> <?php print $row->hargasewa; ?> </td>

</tr>
<?php endforeach; ?>
</table>

<br>
<?php print 'input nama : ';?>
<br>
<form action="<?php print site_url();?>c_cari/cari" method=POST>
<input type=text name=cari> <input type=submit value="cari">
</form>

<a href="<?php print site_url();?>/c_cari"> <b>tampilkan semua</b></a>
