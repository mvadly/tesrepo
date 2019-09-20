<?php $this->load->view('umum/header.php');?>
<link href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<script>
    $(document).ready(function(){
      <?php foreach ($datacottage as $data) {
        
        ?>
      $("#tombol<?php echo $data['kode_cottage']?>").click(function(){

            alert('Kamu Memilih '+<?php echo $data['kode_cottage']?>);
            $("#tombol<?php echo $data['kode_cottage']?>"); 
            $("#kc").val('<?php echo $data['kode_cottage']?>');
            $("#nc").val('<?php echo $data['nama_cottage']?>');
            $("#jk").val('<?php echo $data['jml_kamar']?>');
            $("#hs").val('<?php echo $data['hargasewa']?>');
            $("#hts").val('<?php echo $lama*$data['hargasewa'] ?>');
            $("#htsm").val('<?php echo ($lama*$data['hargasewa'])/2 ?>');

            $("#pilih").text('Kamu Memilih Room : <?php echo $data['kode_cottage']?>').css('font-weight', 'bolder');

      });
      
      <?php } ?>
       
        
      

    });

   
</script>
<div class="row"  style="padding:20px 20px 20px 20px;">
                    <div class="col-sm-12 ">
                      <form role="form" method="post" class="f1" action="<?php echo site_url();?>bresave/savebook" enctype="multipart/form-data">

                        <h3>Reservasi Cottage</h3>
                        
                        <div class="f1-steps">
                          <div class="f1-progress">
                              <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                          </div>
                          <div class="f1-step active">
                            <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                            <p>Pemilihan Cottage</p>
                          </div>
                          <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                            <p>Data Lengkap</p>
                          </div>
                            <div class="f1-step ">
                            <div class="f1-step-icon"><i class="fa fa-money"></i></div>
                            <p>Konfirmasi Pembayaran</p>
                          </div>
                        </div>

                            <fieldset>
                                <p style="padding: 20px; font-weight: bolder; background: rgba(0,0,0,0.1); border-radius: 5px;">Cottage Tersedia : <?php echo $cottagetersedia.' dari tanggal '.date('d-m-Y',strtotime($tgl_masuk)).' sampai '.date('d-m-Y',strtotime($tgl_keluar)); ?><br>
                                <label id="pilih" >Kamu Belum Memilih Cottage</label></p>


                     <table id="table" class="table" width="100%">
                            <thead>
                            
                                   <tr>
                                          <th></th>
                                          

                                   </tr>
                            </thead>
                    
                            
                            <tbody>
                            <?php 


                            foreach ($datacottage as $data) {
                              
                                  
                           ?>
                            
                                   <tr>
                                              
                                                <td>
                                                <p hidden><?php echo $data['kode_cottage'] ?></p>
                                                
                                                <div class="col-md-12" >
                                                <!-- general form elements disabled -->
                                                <div class="box box-warning">
                                                  <div class="box-header">
                                                  
                                       
                                                  </div><!-- /.box-header -->
                                                  <div class="box-body">

                                                <div class="form-group ">
                                                  <div class="col-md-6" >
                                                  <table class="table" width="100%">
                                                    <tr>
                                                      <td width="30%">Kode Cottage</td>
                                                      <td width="100%"><?php echo $data['kode_cottage'] ?></td>
                                        
                                                    </tr>
                                                    <tr>
                                                    <td>Nama</td>
                                                    <td><?php echo $data['nama_cottage'] ?></td>
                                                    </tr>
                                                    <tr>
                                                    <td>Harga Sewa</td>
                                                    <td>Rp. <?php echo number_format($data['hargasewa']) ?>,-</td>
                                                                                                         
                                                    </tr>
                                                    <tr>
                                                      <td>Fasilitas</td>
                                                      <td>Stay 1 night, 1x Breakfast, 21% Goverment Tax & Service </td>
                                                    </tr>
                                                    <tr>
                                                      <td><a data-toggle="modal" class="btn btn-primary" data-target="#cari<?php echo $data['kode_cottage'] ?>" >Lihat</a></td>
                                                    </tr>
                                                    
                                                    </table>
                                                    <br>


                                                  </div>
                                                 

                                                  <div class="f1-buttons col-md-4">
                                                 <button type="button" id="tombol<?php echo $data['kode_cottage']?>" class="btn btn-next" style="float: left;">Pilih</button>
                                                 </div><br>
                                                </div>
                                                 </div><!-- /.box-body -->
                                                  </div><!-- /.box -->
                                                </div>

                                                  
                                                </td>
                                                 
                                                 
                                          
                                   </tr>
                                   <?php } ?>
                            </tbody>
                     </table>
                                
                                    
                                
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
                                  <?php $this->load->view('umum/daerah'); ?>
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
                                    <h3 class="box-title">Cottage Terpilih</h3>
                                  </div><!-- /.box-header -->
                                  <div class="box-body">
                                  <div class="form-group">
                                  <label>Kode Cottage</label>
                                      <input type="text" name="kode_cottage" readonly="text" class="ipti"  id="kc" />
                                    
                                  </div>
                                  <div class="form-group">
                                  <label>Nama Cottage</label>
                                      <input type="text" name="nama_cottage" readonly="text"  class="ipti" id="nc" />
                                    
                                  </div>
                                  <div class="form-group">
                                  <label>Jumlah Kamar</label>
                                      <input type="text" name="jml_kamar" readonly="text" class="ipti"  id="jk" />
                                    
                                  </div>
                                  <div class="form-group">
                                  <label>Harga Sewa</label>
                                      <input type="text" name="hargasewa" readonly="text" class="ipti" id="hs" />
                                    
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
                                    <label>Tanggal Check In</label>
                                      <input type="text" name="tgl_masuk" readonly="text" class="ipti"  value="<?php echo $tgl_masuk;?>" />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Tanggal Check Out</label>
                                      <input type="text" name="tgl_keluar" readonly="text"  class="ipti" value="<?php echo $tgl_keluar;?>"  />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Lama</label>
                                      <input type="text" name="lama" readonly="text" class="ipti"  value="<?php echo $lama;?>"  />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Total Harga Sewa</label>
                                      <input type="text" name="total_harga_sewa" readonly="text" class="ipti" id="hts" />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Minimal Bayar</label>
                                      <input type="text"  readonly="text" class="ipti" id="htsm" />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Upload Bukti Pembayaran</label>
                                      <input type="file" name="buktip" value="">
                                    
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
<?php $this->load->view("umum/modalgambar") ?>
<?php $this->load->view('umum/footer');?>
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


