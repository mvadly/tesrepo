<html>
<head>
    <?php $this->load->view('admin/template/header');?>
</head>
<body style="background: lightblue" >


    <div class="row" style="padding: 50px 50px 50px 50px">

        <div class="col-md-4 col-md-offset-4" style="margin-top: 130px;margin-bottom: 130px">
<div class="box box-solid box-primary">
                <div class="box-header text-center">
                  <h3 class="box-title ">Login Sistem</h3>
                  
                </div>
                <div class="box-body">
                  <div class="text-center" style="background: url('<?php echo base_url('assets/img/logo.png');?>') center no-repeat ; height: 130px;"></div>
                
                <form action="<?php echo site_url('admin/login/sign_in');?>" method="post">
                    <div class="panel-body">
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
                        <div style="margin-bottom: 25px; margin-top: 10px" class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div style="margin-bottom: 20px" class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="input-group" style="width: 100%">
                            <input type="submit" class="btn btn-primary" name="log" value="LOGIN" style="width:100%;">
                        </div>
                        
                    </div>
                </form>
            </div>
                </div><!-- /.box-body -->
              </div>
            
        </div>
    </div>


</body>
</html>