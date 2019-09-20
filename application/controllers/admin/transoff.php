<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transoff extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
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
            redirect('admin/dashboard');
        }
    }

    public function index(){
        $this->cek_user();
        $data = array(
            'ses_level' => $this->session->userdata('ses_level'),
            'datatamu' => $this->model->GetDataTamu('where tipetamu="-" order by nama_tamu asc')->result_array(),
            'dataCT' => $this->model->GetDataCT('where status="0"')->result_array(),
            'dataKH' => $this->model->GetDataKH('where status_h="0"')->result_array(),
            'content' => 'admin/transaksi/transoff',
            
        );
        $this->load->view('admin/template/site', $data);
    }

    public function simpan_data(){
        $this->cek_user();
        if (!$_POST['simpan']){
            $this->session->set_flashdata('warning', 'Tambah data belum dilakukan');
            redirect('admin/transoff');
        }
        $kode_sewa = 'S'.date('dmyhs');
        $cek_kode = $this->model->GetDataCekin("where kode_sewa = '$kode_sewa'")->num_rows();
        $cek_kt = $this->model->GetDataTamu("where kode_tamu = '$kode_tamu'")->num_rows();
        if ($cek_kode > 0){
            $this->session->set_flashdata('warning', 'Data sudah ada');
            redirect('admin/transoff');
        }else {
            
            if ($cek_kt < 0){
            $this->session->set_flashdata('warning', 'Kode Tamu Salah');
            redirect('admin/transoff');
            }else {

            $kode_tamu = $this->input->post('kode_tamu');
            $kode_cottage = $this->input->post('kode_cottage');
            $kode_kamar = $this->input->post('kode_kamar');
            $data = array(
                'kode_sewa' => $kode_sewa,
                'kode_tamu' => $this->input->post('kode_tamu'),
                'kode_cottage' => $this->input->post('kode_cottage'),
                'kode_kamar' => $this->input->post('kode_kamar'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'pembayaran' => $this->input->post('pembayaran'),
                'bayar' => $this->input->post('bayar'),
                'kembali' => $this->input->post('kembali'),
                'operator' => $this->session->userdata('ses_level'),
                
                
            );
            $datac =array(
                'status' => '1',
                );
            $datat =array(
                'tipetamu' => 'Check In',
                );
            $datakh =array(
                'status_h' => '1',
                );
            $this->model->Simpan('data_cekin', $data);
            $this->model->Update('data_tamu',$datat,array('kode_tamu' => $kode_tamu));
            $this->model->Update('data_cottage',$datac,array('kode_cottage' => $kode_cottage));
            $this->model->Update('data_kamar_hotel',$datakh,array('kode_kamar' => $kode_kamar));
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('admin/transoff');
        }
        }
    }




}
?>