<div class="page-header">
    <h2>Data cottage <small><?php echo $kode_cottage ?></small></h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
              <!-- Info box -->
  
                  <!-- <h3 class="box-title">Tambah Gambar</h3>
                  <div class="box-tools pull-right">Kode Cottage
                    <div class="label bg-aqua"><?php echo $kode_cottage ?></div>
                  </div> -->
  
                <div class="box-body" >
                  <?php $this->load->view('admin/halaman/upload_view')?><br>
                        <div class="form-group">
                         <input type="hidden" class="form-control" name="kode_cottage" value="<?php echo $kode_cottage ?>">
                         <?php foreach ($datagambar->GetDataGambar('where id_gambar="'.$kode_cottage.'" order by id_gambar asc')->result_array() as $data) {?>
    
                          <div class="col-md-3">
                            <div class="thumbnail">

                                <img src="<?php echo base_url('assets/upload/gambar/').$data['gambar']; ?>" height="200" alt ="<?php echo $data['gambar']?>" class="img-responsive " >
                                <div class="caption">
                                  <a href="<?php echo base_url() ?>admin/dcottage/hapus_gambar/<?php echo $data['gambar'] ?>" class="btn bg-red form-control">Hapus</a>
                                </div>

                            </div>
                          </div>

                        <?php }?>
                        </div>
               

  </div>
</div>


  