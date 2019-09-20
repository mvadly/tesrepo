
    <link rel="stylesheet" type="text/css" href="css/head.css">
	  <script src="js/jquery-1.8.0.min.js"></script>
	  <script src="js/headline.js"></script>
    <script type="text/javascript"> 
      $(document).ready(function(){
	  		// untuk permulaan, tampilkan content nomor 1 '#slideAwal'
	  		bukaContent($('#slideAwal'),'div1');			
	    });
	  </script>	
    <style type="text/css">
      img{
        width: 100%;
        height:100%;
      }
    </style>

    <body>
    <h1 align="center">Gallery Hotel Carita Asri</h1></br>
<?php
$tabelcekin= "SELECT * FROM data_cekin where status='Check In' order by tgl_masuk desc";
$hasil = $connect->query($tabelcekin); 
if($hasil === false) { // Jika gagal menjalankan query
trigger_error('Perintah SQL salah: ' . $tabelcekin . 'Error: ' . $connect->error,E_USER_ERROR); 
} else { // Jika berhasil
$no = 1;
while($data = $hasil->fetch_array()){ // Tampilkan data dengan pengulangan while
echo "<tr>";
echo "<td>$no</td>"; 
echo "<td>$data[kode_sewa]</td>"; 
echo "<td>$data[kode_tamu]</td>"; 
echo "<td>$data[kode_villa]</td>"; 
echo "<td>$data[tgl_masuk]</td>"; 
echo "<td>$data[tgl_keluar]</td>"; 
echo "<td>$data[tipe_sewa]</td>"; 
echo "<td>$data[pembayaran]</td>"; 
echo "<td>$data[operator]</td>"; 
echo "</tr>";
    $no++;
    }
  } 

  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td>
    
    <div id="divTrigger" align="center">
      <a href="javascript:;" onClick="bukaContent(this,'div1')" id="slideAwal">1</a>
      <a href="javascript:;" onClick="bukaContent(this,'div2')">2</a>
      <a href="javascript:;" onClick="bukaContent(this,'div3')">3</a>
      <a href="javascript:;" onClick="bukaContent(this,'div4')">4</a>
      <a href="javascript:;" onClick="bukaContent(this,'div5')">5</a>
    </div>

    <div id="divContent">
      <div id="div1">
 	    
 	     <img src="images/slideshow/galleryCA/IMG_3464.JPG" align="right" /> 

      </div>
      <div id="div2">
 	     
 	     <img src="images/slideshow/galleryCA/IMG_3491.JPG" align="left" /> 

      </div>
      <div id="div3">
 	  
 	     <img src="images/slideshow/galleryCA/IMG_3465.JPG" align="left" /> 

      </div>
      <div id="div4">
 	  
 	     <img src="images/slideshow/galleryCA/IMG_3479.JPG" align="left" />

      </div>
       <div id="div5">
 	    
 	     <img src="images/slideshow/galleryCA/IMG_3480.JPG" align="left" /> 

      </div>
    </div>
	</td>
      </tr>
    </table>
