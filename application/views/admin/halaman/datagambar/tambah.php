<div id="data-tambah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data Gambar</h4>
            </div>
                    <form action="<?php echo site_url('admin/gallery/simpan_data')?>" enctype="multipart/form-data" method="post">
                    <div class="modal-body text-center" >
                            <div class="form-group" style="display: inline-grid;">    
                                <label>Gambar 1</label>
                                <img src="<?php echo base_url(); ?>/assets/upload/gambar/calogo.png" width="200" height="150">
                                <input type="file" name="gambar1">

                            </div>
                            <div class="form-group" style="display: inline-grid;">
                                <label>Gambar 2</label>
                                <img src="<?php echo base_url(); ?>/assets/upload/gambar/calogo.png" width="200" height="150">
                                <input type="file" name="gambar2" >

                            </div>
                            <div class="form-group" style="display: inline-grid;">
                                <label>Gambar 3</label>
                                <img src="<?php echo base_url(); ?>/assets/upload/gambar/calogo.png" width="200" height="150">
                                <input type="file" name="gambar3">

                            </div>
                            <div class="form-group" style="display: inline-grid;">
                                <label>Gambar 4</label>
                                <img src="<?php echo base_url(); ?>/assets/upload/gambar/calogo.png" width="200" height="150">
                                <input type="file" name="gambar4">

                            </div>
                        </div>
                            
                        <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                </div>
                    </form>
        </div>
    </div>
</div>