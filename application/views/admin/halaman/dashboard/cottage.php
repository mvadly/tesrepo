          <div class="row" style="padding: 10px;">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $cottagetersedia;?> dari <?php echo $cottagetotal?></h3>
                  <p>Cottage Tersedia</p>
                </div>
                <div class="icon">
                  <i class="fa fa-home"></i>
                </div>
                <a href="<?php echo base_url()?>admin/dcottage" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $tamubooking;?></h3>
                  <p>Booking Cottage</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="<?php echo base_url()?>admin/dtbc" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $tamucekincottage;?></h3>
                  <p>Check In Cottage</p>
                </div>
                <div class="icon">
                  <i class="fa fa-hotel"></i>
                </div>
                <a href="<?php echo base_url()?>admin/dcheckinCT" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $cekout;?></h3>
                  <p>Check Out Cottage</p>
                </div>
                <div class="icon">
                  <i class="fa fa-money"></i>
                </div>
                <a href="<?php echo site_url('admin/dcheckoutct') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
        </div>
        <div style="padding: 10px">

          <?php

          $this->load->view('admin/halaman/datacekout/tconow'); 
          $this->load->view('admin/halaman/datatamubooking/tcbnow');  

          ?>
        </div>








