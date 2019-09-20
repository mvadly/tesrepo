<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Kamar Hotel</title>
    <style>
        body{
            margin:auto;
            width: 900px;
        }
        header{

        }
        table{
            border-collapse: collapse;
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
        .tgl{
            float: right;
        }
    </style>
</head>
<body onload="window.print()">
<header>
<table border="0">
    <tr>
        <td><img src="<?php echo base_url()?>assets/img/logo.png"></td>
        <td width="100%" align="center">
            <h1 align="center">Laporan Kamar Hotel</h1>
            Jln. Jendral Sudirman, Ds. Tarogong Kec. Pagelaran Kab. Pandeglang<br/>
            Kode Pos: 42264 
        </td>
    </tr>
</table>
     
    
</header><hr/>
<table border="1" align="center" width="100%">
    <thead>
    
    <tr>
        <th>No. </th>
        <th>Kode Kamar</th>
        <th>Nama Blok Hotel</th>
        <th>Harga Sewa</th>
        <th>Status Kamar</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach($datakh as $data) { 
        $status=$data['status_h'];
        if ($status==1){
            $status='Terisi';
        }else{
            $status='Kosong';
        }

    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['kode_kamar']; ?></td>
            <td><?php echo $data['namablok']; ?></td>
            <td><?php echo $data['hargasewa']; ?></td>
            <td><?php echo $status; ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>

<div class="tgl">
    <p>Dicetak Tanggal <?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y').' Pukul '.date('h:i:s');?></p>


</div>
</body>
</html>