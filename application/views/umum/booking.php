<?php include 'header.php';?>


<style type="text/css">
/*input[type=text],input[type=email],input[type=date],select{
  width: 100%; 
  padding: 5px 10px 5px 10px;
  border-radius: 5px; 
  border:1px solid gray;

}
input[readonly=text]{
  background-color: gray; color: white;
}
input[readonly=text]:hover{
  cursor: not-allowed; background-color: gray;
}
input[type=text]:hover,input[type=email]:focus,input[type=date]:focus,select:focus{
  box-shadow: 5px  5px 3px gray;
}
input[type=submit]{
  width: 100%;
  height: 35px;
  border-radius: 5px;
  background-color: #645;
  border: 0;
  color: white;
  font-size: 15px;

}*/
td{
  padding: 5px 5px 5px 5px;
}
legend{
  border: none;
}
<?php $lama=((abs(strtotime($tgl_masuk)-strtotime($tgl_keluar)))/(60*60*24))?>

</style>

<div class="container">

<h1 class="title">Booking</h1>
<div class="row">
    <div class="col-sm-7 col-md-8">

    <div class="jarak">
    <fieldset>

      <form name="tampil" action="<?php echo base_url();?>cottagesedia/tampilbc" enctype="multipart/form-data" method="post">
      <fieldset >
      <div class="panel panel-default" ">
          <div class="panel-heading">
          <h3>Input Data Pelanggan</h3>
          </div>
          <div id="widget1" class="panel-body collapse in">
      <div class="form-group">
        <input type="text"  class="form-control" name="no_id" required  placeholder="No. Identitas" />
      </div>
      <div class="form-group">
        <input type="text" name="nama_tamu"  class="form-control" required placeholder="Nama Tamu"/>
      </div>
      <div class="form-group">
        <select name="jeniskelamin" class="form-control" required>
            <option selected>Jenis Kelamin</option>
            <option value="Laki-laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <select name="warganegara" class="form-control" required>
            <option selected>Warga Negara</option>
            <option value="Indonesia">Indonesia</option>
            <option value="United States">United States</option>
        </select>
      </div>
      <div class="form-group">
             <div class='input-group date' id='datepicker'>
                <input type='text' name="tgl_lahir" class="form-control" required placeholder="Tanggal Lahir" />
             <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
         </span>
           </div>
  
        </div>
        <div class="form-group">
          <input type="text" name="no_telp" class="form-control" required placeholder="No. Telepon" />
      </div>
      <div class="form-group">
          <input type="email" name="email" class="form-control" required placeholder="Email" />
      </div>
        
      </fieldset>

      <fieldset hidden>
        <select name="kode_cottage" id="kode_cottage" class="form-control" onchange="changeValue(this.value)" required >
            <option value="<?php echo $kode_cottage ?>" selected><?php echo $kode_cottage ?></option>   
            </select>
            <input type="text"  id="jv" name="nama_cottage" class="form-control" readonly="text" value="<?php echo $nama_cottage ?>" />
            <input type="text"   name="jml_kamar" class="form-control" readonly="text" value="<?php echo $jml_kamar ?>"/>
            <input type="text"  id="hs" name="hargasewa" class="form-control" readonly="text" value="<?php echo $hargasewa ?>" />
            <input type="text"  name="tgl_masuk" class="form-control" readonly="text" value="<?php echo $tgl_masuk ?>" />
            <input type="text"  name="tgl_keluar" class="form-control" readonly="text" value="<?php echo $tgl_keluar ?>" />
            <input type="text"  name="lama" class="form-control" readonly="text" value="<?php echo $lama ?>" />
        </fieldset> 
      
        
      <div class="modal-footer" align="center">
          <button type="reset" class="btn btn-danger ">Reset</button>
          <a href="index"><button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button></a>
          <input type="submit" name="submit" class="btn btn-primary " value="Lanjut" />
          </div>
      
      </form>
    </fieldset>
    </div>
</div>

<div class="col-sm-5 col-md-4">
        <div class="panel panel-default" ">
          <div class="panel-heading">
          <h3>Reservation</h3>
          </div>
          <div id="widget1" class="panel-body collapse in">

          <table >
            <tr>
              <td width="120">Kode Cottage</td>
              <td width="10">:</td>
              <td><?php echo $kode_cottage; ?></td>
            </tr>
            <tr>
              <td>Nama Cottage</td>
              <td>:</td>
              <td><?php echo $nama_cottage; ?></td>
            </tr>
            <tr>
              <td>Jumlah Kamar</td>
              <td>:</td>
              <td><?php echo $jml_kamar; ?> Kamar</td>
            </tr>
            <tr>
              <td>Harga Sewa</td>
              <td>:</td>
              <td align="right">Rp. <?php echo number_format($hargasewa); ?>,00</td>
            </tr>
            <tr>
              <td>Tgl Check In</td>
              <td>:</td>
              <td><?php echo $tgl_masuk ?></td>
            </tr>
            <tr>
              <td>Tgl Check Out</td>
              <td>:</td>
              <td><?php echo $tgl_keluar ?></td>
            </tr>
            <tr>
              <td>Lama Sewa</td>
              <td>:</td>
              <td>
              <?php 
              
              echo $lama ?></td>
            </tr>
            <tr>
              <td>Total Sewa</td>
              <td>:</td>
              <td align="right">Rp. <?php echo number_format($lama*$hargasewa) ?>,00</td>
            </tr>
            
          </table>

          </div>
        </div>
</div>
</div>




</div>


<?php include 'footer.php';?>