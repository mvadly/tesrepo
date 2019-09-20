<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cottagesedia extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');


    }

    public function index(){

        $reservasi = $this->input->post('reservasi');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $lama = $this->input->post('lama');
         $kamar = $this->input->post('kamar');
        $data=array(
            'tgl_masuk'=>$tgl_masuk,
            'tgl_keluar'=>$tgl_keluar,
            'lama'=>$lama
            );
         $link='<a href="./gallery">Ini</a>';
            if ($reservasi=='cottage') {
                    $data['cottagetersedia'] = $this->model->GetDataCT("where status = '0' && jml_kamar='$kamar' ")->num_rows();

                    switch ($data['cottagetersedia'] ) {
                        case null:
                            $this->session->set_flashdata('error','Cottage tidak tersedia untuk tanggal '.$tgl_masuk.' sampai '.$tgl_keluar);
                            redirect('');
                               
                            
                            break;
                        default:
                            $data['datacottage']= $this->model->GetDataCT("where status = '0' && jml_kamar='$kamar' ")->result_array();
                            $data['dtg']= $this->model;
                            $data['cottagetersedia']= $this->model->GetDataCT("where status='0' and jml_kamar='$kamar' ")->num_rows();
                            if ($data['cottagetersedia']==null) {
                                $this->session->set_flashdata('error','Cottage tidak tersedia untuk tanggal '.$tgl_masuk.' sampai '.$tgl_keluar.' klik '.$link);
                                redirect('');
                            }else{
                            $this->load->view('umum/bcottage',$data);
                            }
                            
                            
                            
                            
                            
                             
                    }

            }else if ($reservasi=='hotel'){

                $data['datahotel']= $this->model->GetDataKH("where status_h < 0  ")->result_array();
                    $data['hoteltersedia'] = $this->model->GetDataKH("where status_h < 0  ")->num_rows();

                    switch ($data['hoteltersedia'] ) {
                        case null:
                            $data['datahotel']= $this->model->GetDataKH("where status_h='0' ")->result_array();
                            $data['hoteltersedia']= $this->model->GetDataKH("where status_h='0' ")->num_rows();
                            if ($data['hoteltersedia']==null) {
                                $this->session->set_flashdata('error','Cottage tidak tersedia untuk tanggal '.$tgl_masuk.' sampai '.$tgl_keluar.' klik '.$link);
                                redirect('');
                            }else{
                            $this->load->view('umum/bhotel',$data);
                            }
                            

                            break;
                        default:
                        $this->session->set_flashdata('error','Kamar Hotel tidak tersedia untuk tanggal '.$tgl_masuk.' sampai '.$tgl_keluar);
                            redirect('');
                            
                        }

            }else{
                redirect('');
            }
   
    }




    public function pesan_cottage($kode = 0){
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih cottage');
            redirect('cottagesedia');
        }
        $tgl_masuk = $this->input->post('tgl_masuk');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $datacottage = $this->model->GetDataCTJ("where kode_cottage = '$kode'")->row_array();
        $data = array(
            'kode_cottage' => $datacottage['kode_cottage'],
            'nama_cottage' => $datacottage['nama_cottage'],
            'jml_kamar' => $datacottage['jml_kamar'],
            'hargasewa' => $datacottage['hargasewa'],
            'tgl_masuk'=>$tgl_masuk,
            'tgl_keluar'=>$tgl_keluar
        );
        $this->load->view('umum/booking',$data);
    }
    public function tampilbc(){
        $no_id=$this->input->post('no_id');
        if ($no_id==null){
            $this->session->set_flashdata('warning','Silahkan transaksi ulang');
            redirect('');
        }
        $data = array(

            'no_id'=> $this->input->post('no_id'),
            'nama_tamu'=> $this->input->post('nama_tamu'),
            'jeniskelamin'=> $this->input->post('jeniskelamin'),
            'warganegara'=> $this->input->post('warganegara'),
            'tgl_lahir'=> $this->input->post('tgl_lahir'),
            'no_telp'=> $this->input->post('no_telp'),
            'email'=> $this->input->post('email'),
            'tgl_masuk'=>$this->input->post('tgl_masuk'),
            'tgl_keluar'=> $this->input->post('tgl_keluar'),
            'lama'=> $this->input->post('lama'),
            );
       
        $this->load->view('umum/tampilbc',$data);

    }


    
}