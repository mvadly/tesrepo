<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dcheckoutct extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->database(); // Load our cart model for our entire class

    }

    private function cek_login(){
        if (!$this->session->userdata('ses_id')){
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
            redirect('admin/login');
        }
    }

    public function cek_user(){
        if ($this->session->userdata('ses_level') == 'Manager' or $this->session->userdata('ses_level') == 'Super Admin'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/dashboard');
        }
    }

    public function cek_pengunjung(){
        if ($this->session->userdata('ses_level') == 'Pengunjung'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/login');
        }
    }

    public function index(){
        $this->cek_user();
        $data = array(
            'ses_level' => $this->session->userdata('ses_level'),
            'dataCICT' => $this->model->GetDataCICT('where status_ci="2" ')->result_array(),

            'content' => 'admin/halaman/datacekout/datacekout',
            
        );
        $this->load->view('admin/template/site', $data);
    }


    
    function cetak_co($kode = 0){

        $fakturci = $this->model->GetDataCICT("where kode_sewa='$kode'")->row_array();
        


        $data = array(
            'kode_sewa'=>$fakturci['kode_sewa'],
            'kode_tamu'=>$fakturci['kode_tamu'],
            'nama_tamu'=>$fakturci['nama_tamu'],
            'kode_cottage'=>$fakturci['kode_cottage'],
            'nama_cottage'=>$fakturci['nama_cottage'],
            'hargasewa' => $fakturci['hargasewa'],
            'tgl_masuk' => $fakturci['tgl_masuk'],
            'tgl_keluar' => $fakturci['tgl_keluar'],
            'pembayaran' => $fakturci['pembayaran'],
            'bayar' => $fakturci['bayar'],
    
          
            'fakturci' => $this->model->GetFakturCi("where id_detail_cekin='$kode'"),


        );
        $this->load->view('admin/halaman/datacekout/fakturco', $data);

        }
   

}
?>