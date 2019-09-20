<div class="page-header">
    <h2>Data Kamar Hotel</h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Data
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
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
                    <form action="<?php echo site_url('admin/dhotel/update_data')?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="kode_Kamar" class="form-control" value="<?php echo $kode_kamar.$id_kamar;?>"/>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kode Kamar</label>
                                <input type="text" name="kode_Kamar" class="form-control" value="<?php echo $kode_kamar;?>" disabled/>
                                
                            </div>
                            <div class="form-group">
                                <label>Nama Blok</label>
                                <input type="text" name="jenis_Kamar" class="form-control" value="<?php echo $namablok;?>" />
                            </div>
                            <div class="form-group">
                                <label>Lantai</label>
                                <input type="text" name="hargasewa" class="form-control" value="<?php echo $lantai;?>">
                            </div>
                            <div class="form-group">
                                <label>Harga Sewa</label>
                                <input type="text" name="hargasewa" class="form-control" value="<?php echo $hargasewa;?>">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status_h" class="form-control">
                                    <option value="Terisi" <?php if ($status_h == '1'){echo "selected";}?>>Terisi</option>
                                    <option value="Kosong" <?php if ($status_h == '0'){echo "selected";}?>>Kosong</option>
                                    
                                </select>
                            </div>
                            
                            
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger ">Reset</button>
                            <button type="button" class="btn btn-warning " data-dismiss="modal" onclick="history.back();">Batal
                            </button>
                            <input type="submit" class="btn btn-primary" value="Update" name="update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>