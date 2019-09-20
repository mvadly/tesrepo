<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bresave extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');


    }

    public function savebook_kh(){
        $no_id = $this->input->post('no_id');
        if ($no_id==null) {
            redirect('');
        }else{
        $kode_booking = 'B'.date('dmyhs');
        $kode_tamu = 'T'.date('0dhsm');
        $cek_kode = $this->model->GetTBC("where kode_booking = '$kode_booking'")->num_rows();
        $cek_kt = $this->model->GetDataTamu("where kode_tamu = '$kode_tamu'")->num_rows();

            $config = array(
                'upload_path' => './assets/upload/buktibayar',
                'allowed_types' => 'gif|jpg|JPG|png|JPEG|jpeg|pdf|doc',
                'max_size' => '2048',

            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('buktip');
            $upload_data1 = $this->upload->data();
            $data1 = array(
                'kode_tamu' => $kode_tamu,
                'no_id' => $no_id,
                'nama_tamu' => $this->input->post('nama_tamu'),
                'jeniskelamin' => $this->input->post('jeniskelamin'),
                'warganegara' => $this->input->post('warganegara'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'tipetamu' => '-',
                
            );
            $data2= array(
                'kode_booking' => $kode_booking,
                'kode_tamu' => $kode_tamu,
                'kode_kamar' => $this->input->post('kode_kamar'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'buktip' => $upload_data1['file_name'],
                'total_harga_sewa' => $this->input->post('total_harga_sewa'), 
                'ket' =>'0',
                
            );
            $result1 = $this->model->Simpan('data_tamu', $data1);
            $result2 =$this->model->Simpan('data_booking', $data2);
            if (($result1==1) and ($result2==1)) {
                $this->session->set_flashdata('sukses', 'Booking Hotel berhasil dilakukan');
                redirect('');
            }
        }

        
    }


    public function savebook(){
        $no_id = $this->input->post('no_id');
        if ($no_id==null) {
            redirect('');
        }else{
        $kode_booking = 'B'.date('dmyhs');
        $kode_tamu = 'T'.date('0dhsm');
        $cek_kode = $this->model->GetTBC("where kode_booking = '$kode_booking'")->num_rows();
        $cek_kt = $this->model->GetDataTamu("where kode_tamu = '$kode_tamu'")->num_rows();

            $config = array(
                'upload_path' => './assets/upload/buktibayar',
                'allowed_types' => 'gif|jpg|JPG|png|JPEG|jpeg|pdf|doc',
                'max_size' => '2048',

            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('buktip');
            $upload_data1 = $this->upload->data();
            $data1 = array(
                'kode_tamu' => $kode_tamu,
                'no_id' => $no_id,
                'nama_tamu' => $this->input->post('nama_tamu'),
                'jeniskelamin' => $this->input->post('jeniskelamin'),
                'warganegara' => $this->input->post('warganegara'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'tipetamu' => '-',
                
            );
            $data2= array(
                'kode_booking' => $kode_booking,
                'kode_tamu' => $kode_tamu,
                'kode_cottage' => $this->input->post('kode_cottage'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'buktip' => $upload_data1['file_name'],
                'total_harga_sewa' => $this->input->post('total_harga_sewa'), 
                'ket' =>'0',
                
            );
            $result1 = $this->model->Simpan('data_tamu', $data1);
            $result2 =$this->model->Simpan('data_booking', $data2);
            if (($result1==1) and ($result2==1)) {
                $this->session->set_flashdata('sukses', 'Booking Cottage berhasil dilakukan');
                redirect('');
            }
        }

        
    }

    
}