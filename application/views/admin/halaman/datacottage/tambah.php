<?php
$gambar1 ='calogo.png';
$gambar2 ='calogo.png';
$gambar3 ='calogo.png';
$gambar4 ='calogo.png';
?>
<div id="data-tambah" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 30px 30px 30px 30px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data Cottage</h4>
            </div>
            <form action="<?php echo site_url('admin/dcottage/simpan_data')?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Cottage</label>
                        <input type="text" name="kode_cottage" class="form-control" required>
                        
                    </div>
                    <div class="form-group">
                        <label>Nama Cottage</label>
                        <input type="text" name="nama_cottage" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Kamar</label>
                        <input type="number" name="jml_kamar" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>Harga Sewa</label>
                        <input type="number" name="hargasewa" class="hargasewa form-control">
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

  <script type="text/javascript">    
        <?php echo $jsArray; ?>  
        function changeValue(id_gambar){  
        document.getElementById('g1').src = dtgambar[id_gambar].gambar1;
        document.getElementById('g2').src = dtgambar[id_gambar].gambar2;     
        document.getElementById('g3').src = dtgambar[id_gambar].gambar3;  
        document.getElementById('g4').src = dtgambar[id_gambar].gambar4; 
        }; 
</script>