<div class="page-header">
    <h2>Master Data <small>Data Fasilitas</small></h2>
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
                        <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
                            <button data-toggle="modal" data-target="#data-tambah" class="btn btn-info col-md-2">
                                <span class="glyphicon glyphicon-plus"></span>
                                <span>Tambah Data</span>
                            </button>
                        <?php } ?>

                    </div>
<table id="table" class="table penelitian table-bordered table-striped" width="100%">
	<thead>   	
        <tr>
            <th>ID Fasilitas</th>
            <th>Fasilitas</th>
            <th>Harga</th>
            <th>Keterangan</th>
          <th>Opsi</th>
        </tr>
    </thead>

            <tbody>
            <?php
            foreach ($fasilitas->result_array() as $data){
            $id_fasilitas=$data['id_fasilitas'];
            $nama_fasilitas=$data['nama_fasilitas'];
            $harga=$data['harga'];
            $ket_fasilitas=$data['ket_fasilitas'];

            ?>
            <tr>
            <td><?php echo $id_fasilitas; ?></td>
            <td><?php echo $nama_fasilitas; ?></td>
        	<td align="right"><?php echo 'Rp. '.number_format($harga).',00'; ?></td> 
             <td><?php echo $ket_fasilitas; ?></td>     	  
            <td class="text-center">
                                    <?php if ($ses_level != 'Admin' and $ses_level != 'Super Admin'){?>
                                    
                                    <?php } ?>
                                    <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
                                    <a class="btn bg-yellow" href="<?php echo base_url('admin/dfasilitas/edit_data/').$id_fasilitas;?>" data-toggle="tooltip" title="Edit Data" data-toggle="tooltip" data-placement ="top" title="Hapus Data"><span class="glyphicon glyphicon-edit" ></span></a>


                                    <a class="btn bg-red" href="<?php echo base_url()?>admin/dfasilitas/hapus_data/<?php echo $data['id_fasilitas'];?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="Hapus Data"><span class="glyphicon glyphicon-trash" ></span></a>
                                    <?php } ?>
                                </td>
                                <?php } ?>
        </tr>
        
    </tbody>
</table>
</div>
</div> 
<?php $this->load->view('admin/halaman/datafasilitas/tambah');?> 
<!-- <?php $this->load->view('admin/halaman/datafasilitas/edit');?> -->








