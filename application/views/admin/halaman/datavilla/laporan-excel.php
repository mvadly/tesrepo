<?php
$arsip = date('dmY');
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=report_villa_".$arsip.".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1">
    <thead>
    <tr>
        <th colspan="5"><h2><?php echo $title;?></h2></th>
    </tr>
    <tr>
        <th>No. </th>
        <th>Kode Villa</th>
        <th>Jenis Villa</th>
        <th>Harga Sewa</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach($datavilla as $data) { ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['kode_villa']; ?></td>
            <td><?php echo $data['jenis_villa']; ?></td>
            <td><?php echo $data['hargasewa']; ?></td>
            <td><?php echo $data['status']; ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>