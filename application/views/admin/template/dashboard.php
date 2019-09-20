<div class="page-header">
    <h2>Dashboard</h2>
</div>

<div class="row" style="padding-left: 20px; padding-right: 20px;">
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
  <div class="nav-tabs-custom">
  <!-- Tabs within a box -->
  <ul class="nav nav-tabs pull-right">
    <li class=""><a href="#revenue-chart" data-toggle="tab" aria-expanded="false">Kamar Hotel</a></li>
    <li class="active"><a href="#sales-chart" data-toggle="tab" aria-expanded="true">Cottage</a></li>
    <li class="pull-left header"><i class="fa fa-inbox"></i> </li>
  </ul>
        <div class="tab-content no-padding">
          <!-- Morris chart - Sales -->
          <div class="chart tab-pane" id="revenue-chart" style="position: relative; "><?php $this->load->view('admin/halaman/dashboard/hotel'); ?></div>
          <div class="chart tab-pane active" id="sales-chart" style="position: relative;"><?php $this->load->view('admin/halaman/dashboard/cottage'); ?></div>
        </div>
  </div>
</div>










