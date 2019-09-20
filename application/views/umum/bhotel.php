<?php $this->load->view('umum/header.php');?>
<link href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<script>
    $(document).ready(function(){
      <?php foreach ($datahotel as $data) {
        
        ?>
      $("#tombol<?php echo $data['kode_kamar']?>").click(function(){
            $("#tombol<?php echo $data['kode_kamar']?>"); 
            $("#kc").val('<?php echo $data['kode_kamar']?>');
            $("#nc").val('<?php echo $data['namablok']?>');
            $("#jk").val('<?php echo $data['lantai']?>');
            $("#jkt").val('<?php echo $data['lantai']?>');
            
            $("#hs").val('<?php echo $data['hargasewa']?>');
            $("#hts").val('<?php echo $lama*$data['hargasewa'] ?>');
            $("#htsm").val('<?php echo ($lama*$data['hargasewa'])/2 ?>');

            $("#pilih").text('Kamu Memilih Room : <?php echo $data['kode_kamar']?>').css('font-weight', 'bolder');

      });
      
      <?php } ?>   

    });

   
</script>
<div class="row"  style="padding:20px 20px 20px 20px;">
                    <div class="col-sm-12 ">
                      <form role="form" method="post" class="f1" action="<?php echo site_url();?>bresave/savebook_kh" enctype="multipart/form-data">

                        <h3>Reservasi Hotel</h3>
                        
                        <div class="f1-steps">
                          <div class="f1-progress">
                              <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                          </div>
                          <div class="f1-step active">
                            <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                            <p>Pemilihan hotel</p>
                          </div>
                          <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                            <p>Data Lengkap</p>
                          </div>
                            <div class="f1-step ">
                            <div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                            <p>Konfirmasi Pembayaran</p>
                          </div>
                        </div>

                            <fieldset>
                                <p style="padding: 20px; font-weight: bolder; background: rgba(0,0,0,0.1); border-radius: 5px;">hotel Tersedia : <?php echo $hoteltersedia.' dari tanggal '.date('d-m-Y',strtotime($tgl_masuk)).' sampai '.date('d-m-Y',strtotime($tgl_keluar)); ?><br>
                                <label id="pilih" >Kamu Belum Memilih hotel</label></p>

                     <table id="table" class="table" width="100%">
                            <thead>
                            
                                   <tr>
                                          <th>Room </th>
                                          <th>Nama Blok Hotel</th>
                                          <th>Lokasi</th>
                                          <th>Harga Sewa </th>
                                          <th>Pilihan </th>

                                   </tr>
                            </thead>
                    
                            
                            <tbody>
                            <?php 


                            foreach ($datahotel as $data) {                       
                      
                           ?>
                            
                                   <tr>
                                              
                                                 <td>Room <?php echo $data['kode_kamar']; ?></td>
                                                 <td> <?php echo $data['namablok']; ?></td>
                                                 <td>Lantai <?php echo $data['lantai']; ?></td>
                                                 <td>Rp. <?php echo number_format($data['hargasewa']); ?>,-</td>
                                                 <td>
                                                 <div class="f1-buttons">  
                                                 <button type="button" id="tombol<?php echo $data['kode_kamar']?>" class="btn btn-next"  style="float:left">Pilih</button>
                                                 </div>
                                                  

                                                        
                                                 </td>
                                                 
                                          
                                   </tr>
                                   <?php } ?>
                            </tbody>
                     </table>
                                
                    <input type="text" id="jk" name="lantai" hidden >
                                   <!--   <input type="text" id="kc" name="kode_kamar" hidden > 
                                    <input type="text" id="nc" name="kode_kamar" hidden> 
                                     
                                    <input type="text" id="hs" name="kode_kamar" hidden> 
                                    <input type="text" id="hts" name="kode_kamar" hidden>   -->

                                    
                                
                            </fieldset>
                        
                        <fieldset>

                                <div class="form-group">
                                  <input type="text"  class="form-control" name="no_id" required  placeholder="No. Identitas" />
                                </div>
                                <div class="form-group">
                                  <input type="text" name="nama_tamu"  class="form-control" required placeholder="Nama Tamu"/>
                                </div>
                                <div class="form-group">
                                  <select name="jeniskelamin" class="form-control" required>
                                      <option selected>Jenis Kelamin</option>
                                      <option value="Laki-laki">Laki-Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <?php $this->load->view('umum/daerah') ?>
                                </div>
                                <div class="form-group">
                                       <div class='input-group date' id='datepicker'>
                                          <input type='date' name="tgl_lahir" class="form-control" required placeholder="Tanggal Lahir" />
                                       <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                   </span>
                                     </div>
                            
                                  </div>
                                  <div class="form-group">
                                    <input type="text" name="no_telp" class="form-control" required placeholder="No. Telepon" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" required placeholder="Email" />
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                              <div class="col-md-6" >
                                <!-- general form elements disabled -->
                                <div class="box box-warning">
                                  <div class="box-header">
                                    <h3 class="box-title">Kamar Hotel Terpilih</h3>
                                  </div><!-- /.box-header -->
                                  <div class="box-body">
                                  <div class="form-group">
                                    <div class="input-group ipti">
                                      <span class="input-group-addon ipt">Room</span>
                                      <input type="text" name="kode_kamar" readonly="text" class="ipti"  id="kc" />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group ipti">
                                      <span class="input-group-addon ipt">Nama Blok Hotel</span>
                                      <input type="text" name="namablok" readonly="text"  class="ipti" id="nc" />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group ipti">
                                      <span class="input-group-addon ipt">Lokasi</span>
                                      <input type="text" name="lantai" readonly="text" class="ipti"  id="jkt" />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group ipti">
                                      <span class="input-group-addon ipt">Harga Sewa</span>
                                      <input type="text" name="hargasewa" readonly="text" class="ipti" id="hs" />
                                    </div>
                                  </div>
                                 
                                  
                                  </div><!-- /.box-body -->
                                </div><!-- /.box -->
                              </div>
                              <div class="col-md-6" >
                                <!-- general form elements disabled -->
                                <div class="box box-warning">
                                  <div class="box-header">
                                    <h3 class="box-title">Yang harus dibayar</h3>
                                  </div><!-- /.box-header -->
                                  <div class="box-body">
                                  <div class="form-group">
                                    <div class="input-group ipti">
                                      <span class="input-group-addon ipt">Tanggal Check In</span>
                                      <input type="text" name="tgl_masuk" readonly="text" class="ipti"  value="<?php echo $tgl_masuk;?>" />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group ipti">
                                      <span class="input-group-addon ipt">Tanggal Check Out</span>
                                      <input type="text" name="tgl_keluar" readonly="text"  class="ipti" value="<?php echo $tgl_keluar;?>"  />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group ipti">
                                      <span class="input-group-addon ipt">Lama</span>
                                      <input type="text" name="lama" readonly="text" class="ipti"  value="<?php echo $lama;?>"  />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group ipti">
                                      <span class="input-group-addon ipt">Total Harga Sewa</span>
                                      <input type="text" name="total_harga_sewa" readonly="text" class="ipti" id="hts" />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group ipti">
                                      <span class="input-group-addon ipt">Minimal Bayar</span>
                                      <input type="text"  readonly="text" class="ipti" id="htsm" />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group ipti">
                                      <span class="input-group-addon ipt">Upload Bukti Pembayaran</span>
                                      <input type="file" name="buktip" class="ipti" value="">
                                    </div>
                                  </div>

                                  <div class="f1-buttons">
                                      <button type="button" class="btn btn-previous">Previous</button>
                                      <button type="submit" class="btn btn-submit">Submit</button>
                                  </div>
                                                           
                                  
                                  </div><!-- /.box-body -->
                                </div><!-- /.box -->
                              </div>
                              
                                
                                
                                
                            </fieldset>
                      
                      </form>
                    </div>
                </div>

<?php $this->load->view('umum/footer.php');?>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'DD MMMM YYYY HH:mm'
        });

        $('#datepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $('#timepicker').datetimepicker({
            format: 'HH:mm'
        });
    });
</script>
