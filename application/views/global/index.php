<?php
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kharisma Beach and Resort Labuan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/index.css');?>">
  <link href="<?php echo base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
  <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

  <!-- Bootstrap -->

<link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/metisMenu.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/dataTables.responsive.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/sb-admin-2.min.css');?>" rel="stylesheet">

<!-- jQuery -->
<!-- <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/moment.js');?>"></script>
<script src="<?php echo base_url('assets/js/metisMenu.min.js');?>"></script>-->
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.responsive.js');?>"></script>
<script src="<?php echo base_url('assets/js/sb-admin-2.js');?>"></script> 
<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js');?>"></script> 

<script src="<?php echo base_url();?>assets/js/moment-with-locales.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.js"></script>
  <style type="text/css">
    body{
  background:url(<?php echo base_url('assets/img/abstract.jpg')?>) center;
}
.header{
  height: 149px;
  background: gray url(<?php echo base_url('assets/images/templatemo_header.png');?>) no-repeat;
  border: 10px solid white;
  margin-bottom: 4px; 
}
#kabeh{
  min-width: 100%;
}
  </style>

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo site_url('');?>">Kharisma Beach & Resort</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url('');?>" >Home</a></li>
        <!-- <li class="dropdown" >
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" hidden>Tipe Kamar Villa <span class="caret"></span></a>
          <ul class="dropdown-menu" >
            <li><a href="?page=kamar2">Kamar Dua</a></li>
            <li><a href="?page=kamar3">Kamar Tiga</a></li>
            <li><a href="?page=kamar4">Kamar Empat</a></li>
          </ul>
        </li> -->
        
        <li><a href="#" style="color: white;" >Ketentuan Booking</a></li>
        <li><a href="?page=gallery" style="color: white;">Gallery</a></li>
        
        <li><a href="#" style="color: white;">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="<?php echo site_url('admin/login');?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="header">
  <div style="background: rgba(0,0,0,0.2); padding: 10px 10px 10px 10px; float: right; color: white;">Call Us (0253) 802307, 802308</div>
</div>
<div id="kabeh">  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav" 
    style=" background:rgba(0,0,0,0); padding: 5px 5px 5px 5px;">
    <div style="background:rgba(255,255,255,0.9); padding: 20px 20px 20px 20px; border-radius: 5px;">
     <?php $this->load->view('global/bagan/samping'); ?> 
    </div>
    
    </div>


    <div class="col-sm-8 text-left" style=" 
    padding: 5px 5px 5px 5px; margin-bottom: 5px;
    background:rgba(0,0,0,0);
     "> 
    <div style="background:rgba(255,255,255,0.9); padding: 20px 20px 20px 20px;min-height: 550px; border-radius: 5px;">
    
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
    <?php $this->load->view($kontent);?>

    </div> 

    </div>

    <div class="col-sm-2 sidenav" style="padding: 5px 5px 0px 5px;
    background:rgba(0,0,0,0);"   >
      <div class="well">
        <p><?php $this->load->view('kalender'); ?></p>
      </div>
      <div class="well">
        <p></p>
      </div>
    </div>


  </div>
</div>
</div>

<footer>
Copyright 2017 By Muhammad Fadly
</footer>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            responsive: true,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control" style="width: 100%" name=""><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });
    });
    $(function(){
        $('#pesan-flash').delay(4000).fadeOut();
        $('#pesan-error-flash').delay(5000).fadeOut();
    });
    $('[data-toggle="tooltip"]').tooltip();
</script>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_navbar_collapse&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2017 16:50:34 GMT -->
</html>

