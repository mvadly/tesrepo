<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
    }

    private function cek_login(){
        if (!$this->session->userdata('ses_id')){
            $this->session->set_flashdata('error','Silahkan login terlebih dahulu');
            redirect('admin/login');
        }
    }

    public function index(){
        $data = array(
            // Cottage
            'tamubooking' => $this->model->GetDataBCT('where status="2" and ket="2"')->num_rows(),
            'tamubookcnow' => $this->model->GetDataBCT('where tgl_masuk="'.date('Y-m-d').'" and status="2" and ket="2" and tipetamu="Booking" ')->result_array(),
            'tamubookrow' => $this->model->GetDataBCT('where tgl_masuk="'.date('Y-m-d').'" and status="2" and ket="2" and tipetamu="Booking" ')->num_rows(),
            'cottagetersedia' => $this->model->GetDataCT('where status="0"')->num_rows(),
            'cottagetotal' => $this->model->GetDataCT()->num_rows(),
            'tamucekincottage' => $this->model->GetDataCICT('where status="1" and tipetamu="Check In" and status_ci="1" ')->num_rows(),
            'cekout' => $this->model->GetDataCICT('where status_ci="2" ')->num_rows(),

            'tcekout' => $this->model->GetDataCICT('where tgl_keluar="'.date('Y-m-d').'" and status_ci="1" and status="1" '),

            // Hotel
            'tamubooking_h' => $this->model->GetTBH('where status_h="2" and ket="2"')->num_rows(),
            'khtersedia' => $this->model->GetDataKH('where status_h="0"')->num_rows(),
            'khtotal' => $this->model->GetDataKH()->num_rows(),
            'cekinkh' => $this->model->GetDataCIKH('where status_h="1" and tipetamu="Check In" and status_ci="1"')->num_rows(),
            'cokh' => $this->model->GetDataCIKH('where status_ci="2"')->num_rows(),
            'tcekoutkh' => $this->model->GetDataCIKH('where tgl_keluar="'.date('Y-m-d').'" and status_ci="1" and status_h="1" '),

            'tamubooking_hnow' => $this->model->GetTBH('where tgl_masuk="'.date('Y-m-d').'" and status_h="2" and ket="2"'),



            'content' => 'admin/template/dashboard',
        );
        $this->load->view('admin/template/site', $data);
    }
    public function konf_book_ct(){

        $kode_sewa = 'S'.date('shdmy');
        $kode_tamu = $this->input->post('kode_tamu');
        $cek_kode = $this->model->GetDataCekin("where kode_sewa = '$kode_sewa'")->num_rows();
        if ($cek_kode > 0){
            $this->session->set_flashdata('warning', 'Sistem sedang sibuk, tunggu beberapa saat lagi!');
            redirect('admin/dashboard');
        }else {

            $kode_booking = $this->input->post('kode_booking');
            $kode_cottage = $this->input->post('kode_cottage');
            
            $data = array(
                'kode_sewa' => $kode_sewa,
                'kode_tamu' => $this->input->post('kode_tamu'),
                'kode_cottage' => $this->input->post('kode_cottage'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'pembayaran' => $this->input->post('pembayaran'),
                'bayar' => $this->input->post('sb')+$this->input->post('dp'),
                'kembali' => 0,
                'operator' => $this->session->userdata('ses_level'),
                
                
            );
            $datac =array(
                'status' => '1',
                );
            $datat =array(
                'tipetamu' => 'Check In',
                );
            $datab =array(
                'ket' =>'1',
                );
            $this->model->Simpan('data_cekin', $data);
            $this->model->Update('data_cottage',$datac,array('kode_cottage' => $kode_cottage));
            $this->model->Update('data_tamu',$datat,array('kode_tamu' => $kode_tamu));
            $this->model->Update('data_booking',$datab,array('kode_booking' => $kode_booking));
            $this->session->set_flashdata('sukses', 'Konfirmasi booking cottage room '.$kode_cottage.' berhasil');
            redirect('admin/dashboard');
        }
        
    }

    public function konf_book_kh(){

        $kode_sewa = 'S'.date('shdmy');
        $kode_tamu = $this->input->post('kode_tamu');
        $cek_kode = $this->model->GetDataCekin("where kode_sewa = '$kode_sewa'")->num_rows();
        if ($cek_kode > 0){
            $this->session->set_flashdata('warning', 'Sistem sedang sibuk, tunggu beberapa saat lagi!');
            redirect('admin/dashboard');
        }else {

            $kode_booking = $this->input->post('kode_booking');
            $kode_kamar = $this->input->post('kode_kamar');
            
            $data = array(
                'kode_sewa' => $kode_sewa,
                'kode_tamu' => $this->input->post('kode_tamu'),
                'kode_kamar' => $this->input->post('kode_kamar'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'pembayaran' => $this->input->post('pembayaran'),
                'bayar' => $this->input->post('sb')+$this->input->post('dp'),
                'kembali' => 0,
                'operator' => $this->session->userdata('ses_level'),
                
                
            );
            $datah =array(
                'status_h' => '1',
                );
            $datat =array(
                'tipetamu' => 'Check In',
                );
            $datab =array(
                'ket' =>'1',
                );
            $this->model->Simpan('data_cekin', $data);
            $this->model->Update('data_kamar_hotel',$datah,array('kode_kamar' => $kode_kamar));
            $this->model->Update('data_tamu',$datat,array('kode_tamu' => $kode_tamu));
            $this->model->Update('data_booking',$datab,array('kode_booking' => $kode_booking));
            $this->session->set_flashdata('sukses', 'Konfirmasi booking kamar hotel room '.$kode_kamar.' berhasil');
            redirect('admin/dashboard');
        }
        
    }


}
?>