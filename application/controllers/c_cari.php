<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class C_cari extends CI_Controller{
 
 function __construct(){
  parent::__construct();
  
  $this->load->model('m_cari');
  $this->load->helper('html');
  $this->load->library('table'); 
 }
    function index() {
        $data['tampil'] = $this->m_cari->tampil();
        $data['kontent'] = 'global/halaman/bcottage';
        $this->load->view('global/index',$data);
		
    }
    function cari() {
       $data['tampil']=$this->m_cari->caridata();
       //jika data yang dicari tidak ada maka akan keluar informasi 
       //bahwa data yang dicari tidak ada
       if($data['tampil']==null) {
          print 'maaf data yang anda cari tidak ada atau keywordnya salah';
          print br(2);
          print anchor('c_cari','kembali');
          }
          else {
             $this->load->view('global/tampil',$data); 

}
}
}