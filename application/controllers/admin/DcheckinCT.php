<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DcheckinCT extends CI_Controller{

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


    public function index(){
        $this->cek_user();
        $data = array(
            'ses_level' => $this->session->userdata('ses_level'),
            'dataCICT' => $this->model->GetDataCICT('where status="1" and tipetamu="Check In" and status_ci="1" ')->result_array(),

            'content' => 'admin/halaman/datacekin/datacekin',
            
        );
        $this->load->view('admin/template/site', $data);
    }


    public function tambah_f($kode = 0){
        $this->cek_user();

        $datacekin = $this->model->GetDataCICT("where kode_sewa = '$kode'")->row_array();

        $data = array(
            'kode_sewa' => $datacekin['kode_sewa'],
            'kode_tamu' => $datacekin['kode_tamu'],
            'bayar' => $datacekin['bayar'],
            'dfas' => $this->model->GetFasilitas()->result_array(),
            'fakturci' => $this->model->GetFakturCi("where id_detail_cekin='$kode'"),



            'content' => 'admin/halaman/datacekin/tambah_f',
        );

        $this->load->view('admin/template/site',$data);
    }

    public function detail_data($kode = 0){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
            redirect('admin/dcheckinCT');
        }

        
        $dataci = $this->model->GetDataCICT("where kode_sewa = '$kode' ")->row_array();

        $data = array(
                    'kode_sewa' => $dataci['kode_sewa'],
                    'tgl_masuk' => $dataci['tgl_masuk'],
                    'tgl_keluar' => $dataci['tgl_keluar'],  
                    'kode_cottage' => $dataci['kode_cottage'],
                    'nama_cottage' => $dataci['nama_cottage'],
                    'jml_kamar' => $dataci['jml_kamar'],
                    'hargasewa' => $dataci['hargasewa'],  
                    'no_id' => $dataci['no_id'],
                    'kode_tamu' => $dataci['kode_tamu'],
                    'nama_tamu' => $dataci['nama_tamu'],
                    'jeniskelamin' => $dataci['jeniskelamin'],
                    'warganegara' => $dataci['warganegara'],
                    'tgl_lahir' => $dataci['tgl_lahir'],
                    'no_telp' => $dataci['no_telp'],
                    'email' => $dataci['email'],
                    'tipetamu' => $dataci['tipetamu'],
                    'pembayaran' => $dataci['pembayaran'],
                    'bayar' => $dataci['bayar'],

                  

                    'content' => 'admin/halaman/datacekin/detail',
        );

        $this->load->view('admin/template/site',$data);

    }
   

    function cetak_cekin($kode = 0){

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

        );
        $this->load->view('admin/halaman/datacekin/fakturci', $data);

        }
    function simpan_data() {
       $this->form_validation->set_rules('id_fasilitas[]', 'id_fasilitas', 'required|trim');   
       $this->form_validation->set_rules('qty[]', 'qty', 'required|trim');
       $this->form_validation->set_rules('harga[]', 'harga', 'required|trim');

       // $this->form_validation->set_rules('totalf[]', 'totalf', 'required|trim');
       
       if ($this->form_validation->run() == FALSE){
        echo validation_errors(); // tampilkan apabila ada error
       }else{
        
        $id = $this->input->post('id_fasilitas');
        $ks = $this->input->post('kode_sewa');
        // $id_detail = 'F'.date('Ydmhs');
        $result = array();
        foreach($id AS $key => $val){
         $result[] = array(
            'kode_sewa'=> $ks,
            'id_detail_cekin'=> $ks,
            'id_fasilitas'  => $_POST['id_fasilitas'][$key],
            'qty'  => $_POST['qty'][$key],
            'totalf'  => $_POST['harga'][$key]*$_POST['qty'][$key],
 
         );
        }

        $test= $this->db->insert_batch('detail_cekin', $result); // fungsi dari codeigniter untuk menyimpan multi array
    
        if($test){
         $this->session->set_flashdata('sukses','penambahan fasilitas berhasil');
            redirect('admin/DcheckinCT/tambah_f/'.$ks);
           }else{
             $this->session->set_flashdata('warning','Anda gagal');
            redirect('admin/DcheckinCT');
        }
       }
      }           
    

    public function cekout(){
        $this->cek_user();

        $kode_sewa = $this->input->post('kode_sewa');
        $kode_cottage = $this->input->post('kode_cottage');
        $kode_tamu = $this->input->post('kode_tamu');
   
        $data= array(
            'status' => '0',
        );
        $data2= array(
            'tipetamu' => '-',
        );
        $data3= array(
            'status_ci' => '2'
        );
        $result = $this->model->Update('data_cottage',$data,array('kode_cottage' => $kode_cottage));
        $result2 = $this->model->Update('data_tamu',$data2,array('kode_tamu' => $kode_tamu));
        $result3 = $this->model->Update('data_cekin',$data3,array('kode_sewa' => $kode_sewa));

        if (($result == 1) and ($result2 == 1) and ($result3 == 1)){
            $this->session->set_flashdata('sukses', 'Check Out Berhasil');
            redirect('admin/dcheckoutct');
        }else{
            $this->session->set_flashdata('error', 'Check Out Gagal');
            redirect('admin/DcheckinCT');
        }
    }

    public function hapus_f($kode = 1){
              
        $result = $this->model->Hapus('detail_cekin',array('id' => $kode));


        if ($result == 1){
            
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('admin/DcheckinCT');
            
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('admin/DcheckinCT');
            
        }

    }

    public function hapus_data($kode = 1){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Hapus data belum dilakukan');
            redirect('admin/DcheckinCT');
        }
        
        $dataCICT = $this->model->GetDataCekin("where kode_sewa = '$kode'")->row_array();
        $kc = $this->input->post('kode_cottage');
        $datac = array(
            'status'=> '0',
            );

        $result = $this->model->Update('data_cottage',$datac,array('kode_cottage' => $kc));
        

        $result2 = $this->model->Hapus('data_cekin',array('kode_sewa' => $kode));
        
        
        


        if (($result == 1) and ($result2 == 1)){
            
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('admin/DcheckinCT');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('admin/DcheckinCT');
        }

    }

    public function updatejadwalci(){
        $this->cek_user();

        $kode_sewa = $this->input->post('kode_sewa');
   
        $data= array(
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'tgl_keluar' => $this->input->post('tgl_keluar'),
        );

        $result = $this->model->Update('data_cekin',$data,array('kode_sewa' => $kode_sewa));

        if ($result){
            $this->session->set_flashdata('sukses', 'Update Jadwal Check In berhasil');
            redirect('admin/DcheckinCT');
        }else{
            $this->session->set_flashdata('error', 'Update Jadwal Check In gagal');
            redirect('admin/DcheckinCT');
        }
    }

    public function export_print(){
        $this->cek_user();
        $data = array(
            'title' => 'Data Cekin Cottage',
            'cekindata' => $this->model->GetDataCICT('where status="1" and tipetamu="Check In" and status_ci="1"')->result_array(),
        );
        $this->load->view('admin/halaman/datacekin/laporan-pdf', $data);
    }

}
?>