<?php $this->load->view('umum/header.php');

// $duit='Rp. '.number_format(500000);
// echo $duit. '<br/>'; 
// $duit=str_replace(',', '', $duit);
// echo substr($duit, 2);


?>
<!-- banner-->
<div class="banner">           
    <img src="./assets/umum/images/photos/banner.jpg"  class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1  class="animated fadeInDown">Best beach and resort in Labuan</h1>
                <p class="animated fadeInUp">Hotel Kharisma Labuan menawarkan Room Rates menarik sesuai dengan kebutuhan anda sekeluarga maupun relasi bisnis anda.</p>                
            </div>
            <a href="#information" class="arrow-nav scroll wowload fadeInDownBig"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</div>  
<!--banner-->


<!-- reservation-information -->

<div id="information" class="spacer reserve-info " style="background: rgba(0,0,0,0);">
<div class="container"  >

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
<div class="row">
<div class="col-sm-7 col-md-8">
    <div class="embed-responsive embed-responsive-16by9 wowload fadeInLeft" style="border:10px solid white; ">
         <div id="AS" class="carousel slide" data-ride="carousel" >
                <div class="carousel-inner">
                
                <div class="item active"><img src="./assets/Gambar/g1.jpg" class="img-responsive" alt="slide"></div>                
                <div class="item  height-full"><img src="./assets/gambar/g2.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="./assets/gambar/g3.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="./assets/gambar/g4.jpg"  class="img-responsive" alt="slide"></div>
                
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#AS" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#AS" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
    </div>
</div>
<div class="col-sm-5 col-md-4">
<h3>Reservation</h3>
    <form role="form" class="wowload fadeInRight" action="./cottagesedia" method="POST">
        <div class="form-group">
            <select id="pilihreservasi" name="reservasi" onchange="javascript:addText()" required>
                <option selected disabled>Pilih Reservasi</option>
                <option value="cottage">Cottage</option>
                <option value="hotel">Kamar Hotel</option>
            </select>
        </div>
        <div class="form-group" id="kamar" hidden>
            <div class="input-group">
            <input type="number" min="1" max="3" name="kamar" id="kmr" class="form-control">
            <span class="input-group-addon">Kamar</span>
            </div>
        </div>
        <?php $this->load->view('umum/tgl') ?>      
        <button class="btn btn-default form-control">Cek Ketersediaan</button>
    </form>    
</div>
</div>  
</div>
</div>


<script type="text/javascript">
    function addText(){
        var ps=document.getElementById('pilihreservasi').value;

             if (ps=='cottage') {
                    $('#kamar').show(1000);

                }else{
                    $('#kamar').hide(1000);
                    $('#kmr').val('');
                } 

}
</script>
<!-- reservation-information -->



<!-- services -->
<div class="spacer services wowload fadeInUp">
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="RoomCarousel" class="carousel slide"  data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="./assets/umum/images/photos/8.jpg" class="img-responsive" alt="slide"></div>                
                <div class="item  height-full"><img src="./assets/umum/images/photos/9.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="./assets/umum/images/photos/10.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Rooms<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="TourCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="./assets/umum/images/photos/6.jpg" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="./assets/umum/images/photos/3.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="./assets/umum/images/photos/4.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Tour Packages<a href="gallery.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="FoodCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="./assets/umum/images/photos/1.jpg" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="./assets/umum/images/photos/2.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="./assets/umum/images/photos/5.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#FoodCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#FoodCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Food and Drinks<a href="gallery.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>
    </div>
</div>
</div>
<!-- services -->


<?php include 'footer.php';?>
