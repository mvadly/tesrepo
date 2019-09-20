<html>
<head>

    <title>Laporan Data Check In Cottage</title>
    <style>
        table{
            border-collapse: collapse;
        }
        table, td, th {
            border: 1px solid black;
        }
        h2{
            text-align: center;
        }
        table thead tr th{
            background: #e1e1e1;
        }
        table th{
            padding: 5px;
            font-size: 12pt;
        }
        table td{
            padding: 3px 5px;
            font-size: 11pt;
        }
    </style>
</head>
<body onload="window.print()">
<table border="1" align="center">
    <thead>
    <tr>
        <th colspan="6"><h2><?php echo $title;?></h2></th>
    </tr>
    <tr>
        <th>No. </th>
        <th>Kode Sewa</th>
        <th>Kode Cottage</th>
        <th>Nama Cottage</th>
        <th>Harga Sewa</th>
        <th>Pembayaran</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach($cekindata as $data) { ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['kode_sewa']; ?></td>
            <td><?php echo $data['kode_cottage']; ?></td>
            <td><?php echo $data['nama_cottage']; ?></td>
            <td><?php echo str_replace($data['hargasewa'], 'Rp. '.$data['hargasewa'], $data['hargasewa']) ?></td>
            <td><?php echo $data['pembayaran']; ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
</body>
</html>
