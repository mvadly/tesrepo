<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Data Villa</title>
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
</body>
</html>