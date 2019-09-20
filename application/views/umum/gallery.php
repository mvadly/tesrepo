<?php $this->load->view("umum/header");?>
<div class="container">

       <h1 class="title">Gallery</h1>
       <div class="row gallery">
       <?php foreach ($gambar as $data) {?>

              <div class="col-sm-4 wowload fadeInUp">
                     <div class="thumbnail">

                     
                     <img src="<?php echo base_url() ?>assets/upload/gambar/<?php echo $data['gambar']; ?>" class="img-responsive" >

                     <div class="caption">
                     <a href="<?php echo base_url(); ?>assets/upload/gambar/<?php echo $data['gambar']; ?>" title="Cottage <?php echo $data['id_gambar']; ?>" class="btn btn-default" data-gallery>Lihat</a>
                     </div>
                     
                     </div>
              </div>
       <?php }?>
              
       </div>
</div>
<script src="<?php echo base_url() ?>assets/umum/assets/jquery.js"></script>
<?php $this->load->view("umum/footer");?>