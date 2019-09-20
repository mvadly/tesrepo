<?php 


                            foreach ($datacottage as $data) {
                              
                                  
                           ?>
<div id="cari<?php echo $data['kode_cottage'] ?>" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 30px 30px 30px 30px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Cottage <strong><?php echo $data['kode_cottage'] ?></strong></h4>
            </div><br/>
            <?php $hm=$dtg->GetDataGambar("where id_gambar='".$data["kode_cottage"]."' ")->num_rows(); 
            if ($hm<=0){
                echo "Gambar Belum Ada";
            }else{
            foreach ($dtg->GetDataGambar("where id_gambar='".$data["kode_cottage"]."' ")->result_array() as $dg) {?>
            
            <div style="width: 25%; height: 25%; display: inline-grid; margin: 10px;">
            <div class="thumbnail"><img src="<?php echo base_url('assets/upload/gambar/').$dg['gambar']; ?>"  alt ="<?php echo $dg['gambar']?>" class="img-responsive ">
            </div>
            </div>
                                

    

<?php  } } ?>
     </div>
    </div>
</div>
<?php } ?>