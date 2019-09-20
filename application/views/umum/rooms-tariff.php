<?php include 'header.php';?>
<style>
#pagination{
    float: left;
    font:11px Tahoma, Verdana, Arial, "Trebuchet MS", Helvetica, sans-serif;
    color:#292929;
    margin-top: 20px;
    margin-left:auto;
    margin-right:auto;
    margin-bottom:20px;
    width:100%;
}
#pagination a, #pagination strong{
    list-style-type: none;
    display: inline;
    padding: 5px 8px;
    text-decoration: none; 
    background-color: #e3e3e3;
    color: #292929;
    font-weight: bold;
}
#pagination strong{
    color: #ffffff;
    background-color: #cac9c9;
    background-position: top center;
    background-repeat: no-repeat;
    text-decoration: none; 
}
#pagination a:hover{
    color: #ffffff;
    background-color: black;
    background-position: top center;
    background-repeat: no-repeat;
    text-decoration: none; 
}
</style>

<div class="container">

<h2>Rooms & Tariff</h2>


<!-- form -->

<div class="row">
<?php foreach ($cottage->result_array() as $data) {?>
  <div class="col-sm-6 wowload fadeInUp">
      <div class="rooms"  >
          <img src="<?php echo base_url('assets/upload/gambar/').$data['gambar']; ?>" alt ="<?php echo $data['gambar']?>" class="img-responsive " >
          <div class="info">
          <h3><?php echo $data['nama_cottage']?></h3>
          <p>Missed lovers way one vanity wishes nay but. Use shy seemed within twenty wished old few regret passed. Absolute one hastened mrs any sensible</p>
          <a href="<?php echo base_url('rnt/detail/').$data['kode_cottage']?>" class="btn btn-default">Check Details</a>
          </div>
      </div>

  </div>
<?php }?>
</div>
<!-- <center><?php echo $this->pagination->create_links(); ?></center> -->
                     <div class="text-center">
                     <ul class="pagination">
                     <li class="disabled"><a href="#">«</a></li>
                     <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                     <li><a href="#">2</a></li>
                     <li><a href="#">3</a></li>
                     <li><a href="#">4</a></li>
                     <li><a href="#">5</a></li>
                     <li><a href="#">»</a></li>
                     </ul>
                     </div>


</div>

<?php include 'footer.php';?>