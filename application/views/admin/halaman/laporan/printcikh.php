<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Check In</title>
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
            <h1 align="center">Laporan Check In Kamar Hotel</h1>
           
            Jl. Raya Panimbang Labuan Kab Pandeglang, Banten Indonesia<br/>
Email: kharisma.labuan@yahoo.co.id<br/> Telp/Fax: (0253) 802307, 802308<br/> Handphone/WA: 087772548445
        </td>
    </tr>
</table>
     
    
</header><hr/>
<p>Dari Tanggal <?php echo $dari ?> ke Tanggal <?php echo $ke ?></p>

<table border="1" align="center" width="100%">
    <thead>
    
    <tr>
        <th>No. </th>
        <th>Kode Sewa</th>
        <th>Nama Tamu</th>
        <th>Kode Kamar</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Keluar</th>
        <th>Harga Sewa</th>
        <th>Lama</th>
        <th>Total Harga Sewa</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach ($datacekin as $data){
        $masuk = $data['tgl_masuk'];
        $keluar = $data['tgl_keluar'];
        $lama = ((abs(strtotime($keluar)-strtotime($masuk)))/(60*60*24));

        ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['kode_sewa']; ?></td>
            <td><?php echo $data['nama_tamu']; ?></td>
            <td><?php echo $data['kode_kamar']; ?></td>
            <td><?php echo $data['tgl_masuk']; ?></td>
            <td><?php echo $data['tgl_keluar']; ?></td>
            <td><?php echo number_format($data['hargasewa']); ?></td>
            <td><?php echo $lama; ?></td>
            <td><?php echo number_format($lama*$data['hargasewa']); ?></td>

    
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>

<div class="tgl">
    <p>Dicetak Tanggal <?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y').' Pukul '.date('H:i:s');?></p>


</div>
</body>
</html>