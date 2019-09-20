<div id="data-tambah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data Kamar Hotel</h4>
            </div>
            <form action="<?php echo site_url('admin/dhotel/simpan_data')?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Kamar</label>
                        <input type="text" name="kode_kamar" class="form-control" required>
                        
                    </div>

                    <div class="form-group">
                        <label>Nama Blok Hotel</label>
                        <input type="text" name="namablok" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Lantai</label>
                        <input type="text" name="lantai" class="form-control" required>
                        
                    </div>
                    <div class="form-group">
                        <label>Harga Sewa</label>
                        <input type="text" name="hargasewa" class="form-control" required>
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

<!-- <script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'DD MMMM YYYY HH:mm'
        });

        $('#datepicker').datetimepicker({
            format: 'DD MMMM YYYY'
        });

        $('#timepicker').datetimepicker({
            format: 'HH:mm'
        });
    });
</script> -->