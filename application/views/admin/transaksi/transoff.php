
<style type="text/css">
	.paneltrans{
		display: inline-table;
        width: 320px;
        margin: 3px;
	}
    .width{
        max-width: 897px;
        display: inline-table;
        margin-right: 5px;
    }
    .tombol{
        margin-top: -3px;
        display: inline-table;
        height: 32px;
    }
    .to{
        width: 200px;
    }
</style>
<script>
    $(document).ready(function(){
      <?php foreach ($datatamu as $data) {
        
        ?>
      $("#tamu<?php echo $data['kode_tamu']?>").click(function(){
            $("#kode_tamu").val('<?php echo $data['kode_tamu']?>');
            $("#ni").val('<?php echo $data['no_id']?>');
            $("#nt").val('<?php echo $data['nama_tamu']?>');
            $("#jkel").val('<?php echo $data['jeniskelamin']?>');
            $("#no_telp").val('<?php echo $data['no_telp']?>');
            $("#warganegara").val('<?php echo $data['warganegara']?>');


      });
      
      <?php } ?>   

      <?php foreach ($dataCT as $data) {
        
        ?>
      $("#cottage<?php echo $data['kode_cottage']?>").click(function(){
            $("#kode_cottage").val('<?php echo $data['kode_cottage']?>');
            $("#nc").val('<?php echo $data['nama_cottage']?>');
            $("#jk").val('<?php echo $data['jml_kamar']?>');
            $("#hs").val('<?php echo $data['hargasewa']?>');
            $("#pembayaran").val(<?php echo $data['hargasewa']?>*$("#lama").val());



      });
      
      <?php } ?> 

      <?php foreach ($dataKH as $data) {
        
        ?>
      $("#kamar<?php echo $data['kode_kamar']?>").click(function(){
            $("#kode_kamar").val('<?php echo $data['kode_kamar']?>');
            $("#nbh").val('<?php echo $data['namablok']?>');
            $("#lt").val('<?php echo $data['lantai']?>');
            $("#hsk").val('<?php echo $data['hargasewa']?>');
            $("#pembayaran").val(<?php echo $data['hargasewa']?>*$("#lama").val());



      });
      
      <?php } ?> 


      

    });

   function addText(){
        var ps=document.getElementById('pilihsewa').value;

             if (ps=='cottage') {
                    $('#tgh').show(500);
                    $('#tcottage,#ctg').show();
                    $('#kmr,#tkamar').hide(500);
                    $('#kode_kamar,#nc,#jk,#hs').val('');

                }else{
                    $('#tgh').show(500);
                    $('#tkamar,#kmr').show();
                    $('#tcottage,#ctg').hide(500);
                    $('#kode_cottage,#nbh,#lt,#hsk').val('');
                } 

}
</script>
<div class="page-header">
    <h2>Transaksi</h2>
</div>
<div class="row" >
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary" >
            <div class="panel-heading ">
                
            </div>
            <div id="widget1" class="panel-body collapse in">
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
                <div style="padding: 20px; background: rgba(0,0,0,0.1);">
<form action="transoff/simpan_data" method="post">
    <div class="form-group">
        <div class="input-group date" >
            <input type="text" name="kode_tamu" id="kode_tamu" placeholder="Kode Tamu"  class="form-control" required> 
            <span class="input-group-addon" data-toggle="modal" data-target="#caritamu"><span class="glyphicon-search glyphicon" ></span></span>
        </div>
    
    </div>

    <?php $this->load->view('admin/transaksi/tgl') ?>

    <div class="form-group" hidden id="sewa">
        <select id="pilihsewa" class="form-control"  onchange="javascript:addText()">
            <option disabled selected>Pilih Sewa</option>
            <option value="cottage">Cottage</option>
            <option value="kamar">Kamar Hotel</option>
            
        </select>
    </div>

    <div class="form-group" id="tcottage" hidden>
        <div class="input-group date" >
            <input type="text" name="kode_cottage" id="kode_cottage" placeholder="Kode Cottage"  class="form-control" > 
            <span class="input-group-addon" data-toggle="modal" data-target="#caricottage"><span class="glyphicon-search glyphicon" ></span></span>
        </div>
    
    </div>

    <div class="form-group" id="tkamar" hidden>
        <div class="input-group date" >
            <input type="text" name="kode_kamar" id="kode_kamar" placeholder="Kode Kamar"  class="form-control" > 
            <span class="input-group-addon" data-toggle="modal" data-target="#carikamar"><span class="glyphicon-search glyphicon" ></span></span>
        </div>
    
    </div>
    
</div><br/>
<div style="padding: 20px; background: rgba(0,0,0,0.1);">
  <div class="row">
    <div class="col-sm-4" ><?php $this->load->view('admin/transaksi/tamu');?></div>
    <div class="col-sm-4" id="tgh" hidden><?php $this->load->view('admin/transaksi/cottage'); $this->load->view('admin/transaksi/kamarhotel');?></div>
    <div class="col-sm-4" ><?php $this->load->view('admin/transaksi/bayar');?></div>
  </div>


</form>
</div>
</div>
</div>
</div>
<?php 
$this->load->view('admin/transaksi/modaltamu'); 
$this->load->view('admin/transaksi/modalcottage'); 
$this->load->view('admin/transaksi/modalkamar'); 

?>






  <script type="text/javascript">    
    	
    	

    	function tesbayar(){
    		var tb = document.getElementById("pembayaran");
    		var vbayar = document.getElementById("bayar");
    		var vkembali = document.getElementById("kembali");
    		vkembali.value =parseInt(vbayar.value)-parseInt(tb.value);
    		if (vkembali.value < 0) {
    			alert('pembayaran kurang');
    			vkembali.value=0;
    			vbayar.value=0;

    		}
    		
    		

    	}
    	




    
    </script>
