<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rnt extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('table');

    }

    // public function index(){
    //     $data = array(
    //         'kontent' => 'global/halaman/beranda',
    //     );
    //     $this->load->view('global/index', $data);
    // }
    public function index(){
        $data=array(
            'fasilitas' => $this->model->GetFasilitas('order by nama_fasilitas asc'),
            );

        
        
        $this->load->view('umum/fasilitas',$data);
    }
     public function detail($kode=0){
       if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih cottage');
            redirect('rnt');
        }
        $datacottage = $this->model->GetDataCTJ("where kode_cottage = '$kode'")->row_array();
        $data = array(
            'kode_cottage' => $datacottage['kode_cottage'],
            'nama_cottage' => $datacottage['nama_cottage'],
            'jml_kamar' => $datacottage['jml_kamar'],
            'hargasewa' => $datacottage['hargasewa'],
            'gambar1' => $datacottage['gambar1'],
            'gambar2' => $datacottage['gambar2'],
            'gambar3' => $datacottage['gambar3'],
            'gambar4' => $datacottage['gambar4'],

        );
        
        $this->load->view('umum/room-details',$data);
    }

    

}
?>