
<div class="page-header" >
    <h2>Data Booking <small>Kamar Hotel</small></h2>
</div>
<div class="row" >
    <div class="col-sm-12 col-md-12" >
        <div class="panel panel-default" >
            <div class="panel-heading">
                Detail Data
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
            <div id="widget1" >
                <div class="col-md-3">
                <div style="margin: 10px;">
                <?php 
                    if ($buktip==null) {
                        echo "Tidak ada bukti pembayaran";
                    }else{
                ?>
                <img style=" border-radius: 5px; " src="<?php echo base_url('/assets/upload/buktibayar/'.$buktip);?>" width="240" height="300"/>
                <?php }?>
                </div>
                </div>
                <div class="col-md-9">
                    <div >
                    <?php 
                        $linkform='#';
                        if (($dp >=(($total_harga_sewa/2))) and ($ket=='1') ) {
                            $linkform = base_url('admin/dtbh/konf_book_ct');
                            echo "untuk yg status sudah cekin";
                        }else
                      
                        if (($dp >=(($total_harga_sewa/2))) and ($ket=='2') ) {
                            $linkform = base_url('admin/dtbh/konf_book_ct');
                            echo "untuk konfirmasi status yg sudah booking";
                        }else{
                            echo "untuk yg belum ditanggapi pembayaran";
                            $linkform = base_url('admin/dtbh/accept_data');
                        }

                    ?>
                        <form action="<?php echo $linkform?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="kode_booking" value="<?php echo $kode_booking; ?>"/>
                        <input type="hidden" name="kode_kamar" value="<?php echo $kode_kamar; ?>"/>
                        <input type="hidden" name="kode_tamu" value="<?php echo $kode_tamu; ?>"/>
                        <input type="hidden" name="tgl_masuk" value="<?php echo $tgl_masuk; ?>"/>
                        <input type="hidden" name="tgl_keluar" value="<?php echo $tgl_keluar; ?>"/>
                        <table class="table" border="0">
                            <tr>
                                <td align="center" ><?php echo $kode_booking; ?></td>
                            </tr>
                            <tr>
                                <td>
                                <?php $this->load->view('admin/halaman/datatamubooking/tamu'); 
                                $this->load->view('admin/halaman/datatamubooking/hotel');
                                $this->load->view('admin/halaman/datatamubooking/bayar'); ?>
                                
                                </td>
                            
                            </tr>

                            

                        </table>
                        
                    </div>
                </div>
                <div class="modal-footer">
                <?php if (($dp >=(($total_harga_sewa/2))) and ($ket=='2')) {?>
                      
                        <input type="submit" class="btn bg-green" value="Konfirmasi " name="simpan">
                        
                        
                    <?php }else{ ?>
                        <select name="aksi" class="btn bg-green" style="color: white; background: rgba(0,0,0,0);">
                            <option disabled selected>Pilih</option>
                            <option value="terima">Accept</option>
                            <option value="tolak">Reject</option>
                        </select>
                        <input type="submit" class="btn btn-primary" value="Aksi" name="update">
                            <!-- <a href="#"><button type="reset" class="btn btn-danger ">Reject</button></a> -->

                    <?php } ?>
                            
                </form>
                <button class="btn btn-default" onclick="history.back()"><span class="glyphicon glyphicon-step-backward"></span> Kembali</button>
            </div>
        </div>
    </div>
</div>