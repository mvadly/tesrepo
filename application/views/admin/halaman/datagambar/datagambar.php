
<div class="page-header">
    <h2>Data Gambar</h2>
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
                        <?php if ($ses_level != 'Pengunjung'){?>
                            
                        <?php } ?>
                    </div>

<table id="table" class="table penelitian table-bordered table-striped " width="100%">
	<thead>   	
        <tr>
            <th>ID Gambar</th>
            <th>Gambar 1</th>
            <th>Gambar 2</th>
        	<th>Gambar 3</th>
            <th>Gambar 4</th>
          <th>Opsi</th>
        </tr>
    </thead>

            <tbody>
            <?php
            foreach ($datagambar as $data){
            ?>
            <tr>
            <td class="text-center"><?php echo $data['id_gambar']; ?></td>
            <td class="text-center"><img src="<?php echo base_url().'assets/upload/gambar/'.$data['gambar1']; ?>" width="150" height="150"/></td>
            <td class="text-center"><img src="<?php echo base_url().'assets/upload/gambar/'.$data['gambar2']; ?>" width="150" height="150"/></td>
        	<td class="text-center"><img src="<?php echo base_url().'assets/upload/gambar/'.$data['gambar3']; ?>" width="150" height="150"/></td>
            <td class="text-center"><img src="<?php echo base_url().'assets/upload/gambar/'.$data['gambar4']; ?>" width="150" height="150"/></td>   	  
            <td class="text-center">
                                    <?php if ($ses_level != 'Admin' and $ses_level != 'Super Admin'){?>
                                    
                                    <?php } ?>
                                    <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
                                    <a data-target="#edit<?php echo $data['id_gambar'];?>" data-toggle="modal" data-placement ="top" title="Edit Data" class="btn btn-primary"><span class="fa fa-edit ukuran" style="font-size: 14pt"></span></a>
                                    <a href="<?php echo base_url()?>admin/gallery/hapus_data/<?php echo $data['id_gambar'];?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="Hapus Data" class="btn btn-danger"><span class="glyphicon glyphicon-trash" style="font-size: 12pt"></span></a>
                                    
                                    <?php } ?>
                                </td>
                                <?php } ?>
        </tr>
        
    </tbody>
</table>
</div>
</div>  

<?php $this->load->view('admin/halaman/datagambar/tambah');?>
<?php $this->load->view('admin/halaman/datagambar/edit');?>




