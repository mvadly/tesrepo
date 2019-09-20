<link href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<div class="page-header">
    <h2>Booking <small>Kamar Hotel</small></h2>
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
                <div class="nav" style="margin-bottom: 10px">
                        
                        <?php if ($ses_level != 'Pengunjung'){?>
                            <div class="pull-right">
                                <a href="<?php echo site_url('admin/dvilla/export_print');?>" target="_blank">
                                    <button class="btn btn-success">
                                        <span class="fa fa-print"></span> Print
                                    </button>
                                </a>
                                <a href="<?php echo site_url('admin/dvilla/export_pdf');?>">
                                    <button class="btn btn-danger">
                                        <span class="fa fa-file-pdf-o"></span> Pdf
                                    </button>
                                </a>
                                <a href="<?php echo site_url('admin/dvilla/export_excel');?>">
                                    <button class="btn btn-primary">
                                        <span class="fa fa-file-excel-o"></span> Excel
                                    </button>
                                </a>
                            </div>
                        <?php } ?>
                    </div>

<table id="table" class="table penelitian table-bordered table-striped" width="100%">
	<thead>   	
        <tr>
            <th>Kode Booking</th>
            <th>No. Identitas</th>
            <th>Nama Tamu</th>
            <th>Kode Kamar</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Minimal Bayar</th>
            <th>Keterangan</th>
            <th class="text-center">Pilihan<br/></th>
        </tr>
    </thead>
    <tfoot>     
        <tr>
            <th>Kode Booking</th>
            <th>No. Identitas</th>
            <th>Nama Tamu</th>
            <th>Kode Kamar</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Minimal Bayar</th>
            <th>Keterangan</th>
            <th></th>
            </tr>
    </tfoot>
            <tbody>
            <?php
            foreach ($datatb as $data){
                $status = $data['ket'];
                if ($status ==1) {
                    $status ='Sukses';
                }else if ($status ==2){
                        $status ='Diterima';
                    }else if ($status ==3){
                        $status ='Ditolak';
                        }else{
                                $status ='Belum Ditanggapi';
                                }
            ?>
            <tr>
            <td><?php echo $data['kode_booking']; ?></td>
            <td><?php echo $data['no_id']; ?></td>
            <td><?php echo $data['nama_tamu']; ?></td>
            <td><?php echo $data['kode_kamar']; ?></td>
            <td><?php echo $data['tgl_masuk']; ?></td>
            <td><?php echo $data['tgl_keluar']; ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($data['total_harga_sewa']/2).',00'; ?></td>    
            <td><?php echo $status; ?></td> 
            <?php if ($data['ket']=='1'){?>
            <td  width="80">
                                    <?php if ($ses_level != 'Admin' and $ses_level != 'Super Admin'){?>
                                    
                                    <?php } ?>
                                    <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
                                    <a href="<?php //echo base_url('admin/dtbc/hapus_data/'.$data['kode_booking']) ;?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="Hapus" class="btn btn-danger"><span class="fa fa-trash" style="font-size: 12pt"></span></a>
                                    <?php } ?>
                                </td>

            <?php }else{?>
             <td width="80" >
                                    <?php if ($ses_level != 'Admin' and $ses_level != 'Super Admin'){?>
                                    
                                    <?php } ?>
                                    <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
                                    <a href="<?php echo base_url('admin/dtbh/detail_data/'.$data['kode_booking']) ;?>" data-toggle="tooltip" data-placement ="top" title="Detail" class="btn btn-success"><span class="fa fa-info" style="font-size: 14pt"></span></a>
                                   
                                    
                                    <a href="<?php echo base_url('admin/dtbh/hapus_data/'.$data['kode_booking']) ;?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="Hapus" class="btn btn-danger"><span class="fa fa-trash" style="font-size: 12pt"></span></a>
                                    <?php } ?>
                                </td>

           <?php }?>  
            
                                <?php } ?>
        </tr>
        
    </tbody>
</table>
</div>
</div>  




