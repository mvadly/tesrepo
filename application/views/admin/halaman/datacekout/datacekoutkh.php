<div class="page-header">
    <h2>Data Check Out <small>Kamar Hotel</small></h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
            <div id="widget1" class="panel-body collapse in">
                <?php
                $data=$this->session->flashdata('error');
                if($data!=""){ ?>
                    <div id="pesan-flash">
                        <div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <strong> Error! </strong> <?=$data;?>
                        </div>
                    </div>
                <?php } ?>
                <?php
                $data2=$this->session->flashdata('sukses');
                if($data2!=""){ ?>
                    <div id="pesan-error-flash">
                        <div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <strong> Succes! </strong> <?=$data2;?>
                        </div>
                    </div>
                <?php } ?>
                <?php
                $data3=$this->session->flashdata('warning');
                if($data3!=""){ ?>
                    <div id="pesan-error-flash">
                        <div class='alert alert-warning alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <strong> Warning! </strong> <?=$data3;?>
                        </div>
                    </div>
                <?php } ?>


<table id="table" class="table table-bordered table-striped" width="100%">
	<thead>   	
        <tr>
            <th width="0">Kode Sewa</th>
            <th>Kode Tamu</th>
            <th>Nama Tamu</th>
            <th>Kode Kamar</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th width="0">Lama</th>


            <th class="text-center" width="100">Opsi<br></th>
        </tr>
    </thead>
    <tfoot>     
        <tr>
            <th>Kode Sewa</th>
            <th>Kode Tamu</th>
            <th>Nama Tamu</th>
            <th>Kode Kamar</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Lama</th>

            </tr>
    </tfoot>
            <tbody>
            <?php
            foreach ($dataCIKH as $data){
                $masuk = $data['tgl_masuk'];
                $keluar = $data['tgl_keluar'];
                $lama = ((abs(strtotime($keluar)-strtotime($masuk)))/(60*60*24));

                
            ?>
            <tr>
            <td><?php echo $data['kode_sewa']; ?></td>
            <td><?php echo $data['kode_tamu']; ?></td>
            <td><?php echo $data['nama_tamu']; ?></td>
            <td><?php echo $data['kode_kamar']; ?></td>
            <td><?php echo date('d-m-Y',strtotime($masuk)); ?></td>
            <td><?php echo date('d-m-Y',strtotime($keluar)); ?></td>
            <td><?php echo $lama ?></td>
	  
            <td class="text-center">

                                    <a href="<?php echo base_url()?>admin/dcheckoutkh/cetak_co/<?php echo $data['kode_sewa'];?>" data-toggle="tooltip" data-placement ="top" title="Cetak Faktur Check Out" class="btn bg-green"><span class="fa fa-print" style="font-size: 14pt"></span></a>


                                    
                                </td>
                                
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</div>  





