<div class="box box-solid box-success">
                  <div class="box-header">
                    <h3 class="box-title">Daftar Tamu Booking Hotel Hari Ini : <strong><?php echo $tamubooking_hnow->num_rows();?></strong></h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <div id="widget1" class="panel-body collapse in">
                <fieldset >
                
                <table id="table3" class="table penelitian table-bordered table-striped " width="100%" >
                <thead>
                    <tr>
                        <th>Kode Booking</th>
                        <th>Kode Tamu</th>
                        <th>Nama Tamu</th>
                        <th>Kode Kamar</th>
                        <th>Nama Blok Hotel</th>
                        <th>Lama Sewa</th>
                        <th class="text-center" width="100">Opsi</th>
                    </tr>
                </thead>
                
                <?php foreach ($tamubooking_hnow->result_array() as $data) {
                                                $masuk = $data['tgl_masuk'];
                                                $keluar = $data['tgl_keluar'];
                                                $lama = ((abs(strtotime($keluar)-strtotime($masuk)))/(60*60*24));

                                                ?>
                                            <tr>
                                                <td><?php echo $data['kode_booking']?></td>
                                                <td><?php echo $data['kode_tamu']?></td>
                                                <td><?php echo $data['nama_tamu']?></td>
                                                <td><?php echo $data['kode_kamar']?></td>
                                                <td><?php echo $data['namablok']?></td>
                                                <td><?php echo $lama; ?> Hari</td>
                        <td style="text-align:center;">
                            <?php if (($this->session->userdata('ses_level') == 'Manager') or ($this->session->userdata('ses_level') == 'Super Admin')){}else{?>
                            <a data-target="#modalbct<?php echo $data['kode_booking']?>" data-toggle="modal" title="Lihat"><button class="btn btn-primary">Lihat</button></a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }?>
                
            </table>
           
               </fieldset>
                                
                            

                    </div>
                  </div>
                </div>

      


        <!-- ============ MODAL EDIT =============== -->
        <?php foreach ($tamubooking_hnow->result_array() as $data) {
            $masuk = $data['tgl_masuk'];
            $keluar = $data['tgl_keluar'];
            $lama = ((abs(strtotime($keluar)-strtotime($masuk)))/(60*60*24));?>
                <div id="modalbct<?php echo $data['kode_booking']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog" >
                    <div class="modal-content" style="padding: 20px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Detail Booking</h3>
                    </div>
                    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('admin/dashboard/konf_book_kh') ?>" enctype="multipart/form-data">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Booking</label>
                            <div class="col-xs-9">
                                <input name="kode_booking" class="form-control" type="text" value="<?php echo $data['kode_booking'];?>"  readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Tamu</label>
                            <div class="col-xs-9">
                                <input name="kode_tamu" class="form-control" type="text" value="<?php echo $data['kode_tamu'];?>"  readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Tamu</label>
                            <div class="col-xs-9">
                                <input name="nama_tamu" class="form-control" type="text" value="<?php echo $data['nama_tamu'];?>" readonly>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Kamar</label>
                            <div class="col-xs-9">
                                <input name="kode_kamar" class="form-control" type="text" value="<?php echo $data['kode_kamar'];?>"  readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Blok Hotel</label>
                            <div class="col-xs-9">
                                <input name="namablok" class="form-control" type="text" value="<?php echo $data['namablok'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Lokasi</label>
                            <div class="col-xs-9">
                                <input name="lantai" class="form-control" type="text" value="Lantai <?php echo $data['lantai'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga Sewa</label>
                            <div class="col-xs-9">
                                <input name="hs" class="form-control" type="text" value=" <?php echo number_format($data['hargasewa']);?>" readonly>
                                <input name="tgl_masuk" class="form-control" type="hidden" value="<?php echo $masuk;?>" readonly>
                                <input name="tgl_keluar" class="form-control" type="hidden" value="<?php echo $keluar;?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Lama Sewa</label>
                            <div class="col-xs-9">
                                <input name="lama" class="form-control" type="text" value="<?php echo $lama;?>"  readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Total Sewa</label>
                            <div class="col-xs-9">
                                <input name="pembayaran" class="form-control" type="text" value="<?php echo $data['total_harga_sewa'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >DP</label>
                            <div class="col-xs-9">
                                <input name="dp" class="form-control" type="text" value="<?php echo $data['dp'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Sisa Pembayaran</label>
                            <div class="col-xs-9">
                                <input  class="form-control" type="text" name="sb" value="<?php echo $data['total_harga_sewa']-$data['dp'];?>" readonly>
                            </div>
                        </div>


                    </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn bg-blue">Konfirmasi</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>
            
            
      
            
            <!-- ============ MODAL HAPUS PENGGUNA =============== -->

 

 