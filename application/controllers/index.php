<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller{
    public function __construct(){
        parent::__construct();

    }

    // public function index(){
    //     $data = array(
    //         'kontent' => 'global/halaman/beranda',
    //     );
    //     $this->load->view('global/index', $data);
    // }
    public function index(){
       $data=array(
        'gambar'=>$this->model->GetDataCTJ()->result_array()
        );
        
        $this->load->view('umum/index',$data);
    }
    public function trackus(){
        
        $this->load->view('umum/trackus');
    }
    public function aboutus(){
        
        $this->load->view('umum/contact');
    }
    public function gallery(){
       $data = array(
                'gambar' => $this->model->GetDataGambar()->result_array()

        );
        
        $this->load->view('umum/gallery',$data);
    }
    

}
?>