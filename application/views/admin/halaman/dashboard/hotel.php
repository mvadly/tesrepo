          <div class="row" style="padding: 10px;">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $khtersedia;?> dari <?php echo $khtotal?></h3>
                  <p>Kamar Hotel Tersedia</p>
                </div>
                <div class="icon">
                  <i class="fa fa-home"></i>
                </div>
                <a href="<?php echo base_url()?>admin/dhotel" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $tamubooking_h;?></h3>
                  <p>Booking Hotel</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="<?php echo base_url()?>admin/dtbh" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $cekinkh;?></h3>
                  <p>Check In Kamar Hotel</p>
                </div>
                <div class="icon">
                  <i class="fa fa-hotel"></i>
                </div>
                <a href="<?php echo base_url()?>admin/dcheckinkh" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $cokh;?></h3>
                  <p>Check Out Kamar Hotel</p>
                </div>
                <div class="icon">
                  <i class="fa fa-money"></i>
                </div>
                <a href="<?php echo site_url('admin/dcheckoutkh') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
        </div>
        <div style="padding: 10px">

          <?php

          $this->load->view('admin/halaman/datacekout/tconowkh'); 
          $this->load->view('admin/halaman/datatamubooking/thbnow');  

          ?>
        </div>








