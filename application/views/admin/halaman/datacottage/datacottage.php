<div class="page-header">
    <h2>Master Data <small>Data Cottage</small></h2>
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
                        
                            <button data-toggle="modal" data-target="#data-tambah" class="btn btn-info col-md-2">
                                <span class="glyphicon glyphicon-plus"></span>
                                <span>Tambah Data</span>
                            </button>
                        
                        
                    </div>

<table id="table" class="table penelitian table-bordered table-striped" width="100%">
	<thead>   	
        <tr>
            <th>Kode Cottage</th>
            <th>Nama Cottage</th>
            <th>Jumlah Kamar</th>
        	<th>Harga Sewa</th>
            <th>Status</th>
          <th>Opsi</th>
        </tr>
    </thead>

            <tbody>
            <?php
            foreach ($dataCT as $data){
            $status = $data['status'];
            if ($status ==1) {
                $status ='Terisi';
            }else if ($status ==2){
                    $status ='Booking';
                }else if ($status == 3){
                    $status ='Repairing';
                    }else{
                            $status ='Kosong';
                        }



            ?>
            <tr>
            <td><?php echo $data['kode_cottage']; ?></td>
            <td><?php echo $data['nama_cottage']; ?></td>
            <td><?php echo $data['jml_kamar']; ?></td>
        	<td align="right"><?php echo 'Rp. '.number_format($data['hargasewa']).',00'; ?></td>
        	<td><?php echo $status; ?></td>       	  
            <td class="text-center">
                                    <?php if ($ses_level != 'Admin' and $ses_level != 'Super Admin'){?>
                                    
                                    <?php } ?>
                                    <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
                                    <a href="<?php echo base_url()?>admin/dcottage/edit_data/<?php echo $data['kode_cottage'];?>" data-toggle="tooltip" data-placement ="top" title="Edit Data"><span class="fa fa-edit ukuran" style="font-size: 14pt"></span></a>
                                    <a href="<?php echo base_url()?>admin/dcottage/tambah_gambar/<?php echo $data['kode_cottage'];?>" data-toggle="tooltip" data-placement ="top" title="Tambah Gambar"><span class="fa fa-plus ukuran" style="font-size: 14pt"></span></a>
                                    <a href="<?php echo base_url()?>admin/dcottage/hapus_data/<?php echo $data['kode_cottage'];?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="Hapus Data"><span class="glyphicon glyphicon-trash" style="font-size: 12pt"></span></a>
                                    <?php } ?>
                                </td>
                                <?php } ?>
        </tr>
        
    </tbody>
</table>
</div>
</div>  


<?php if ($ses_level != 'Front Office' and $ses_level != 'Manager'){?>
<?php $this->load->view('admin/halaman/datacottage/tambah');?>
<?php } ?>




