<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dhotel extends CI_Controller{

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
        if ($this->session->userdata('ses_level') == 'Pengunjung' or $this->session->userdata('ses_level') == 'Pimpinan'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/login');
        }
    }

    public function cek_pengunjung(){
        if ($this->session->userdata('ses_level') == 'Pengunjung'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/halaman/datavilla/datavilla');
        }
    }

    public function index(){
        $data = array(
            'ses_level' => $this->session->userdata('ses_level'),
            'dataKH' => $this->model->GetDataKH('order by kode_kamar asc')->result_array(),
            'content' => 'admin/halaman/dataKH/dataKH',
            
        );
        $this->load->view('admin/template/site', $data);
    }

    public function simpan_data(){
        $this->cek_user();
        if (!$_POST['simpan']){
            $this->session->set_flashdata('warning', 'Tambah data belum dilakukan');
            redirect('admin/dhotel');
        }
        $cek_kode = $this->model->GetDataKH("where kode_kamar = '$kode_kamar'")->num_rows();
        if ($cek_kode > 0){
            $this->session->set_flashdata('warning', 'Data sudah ada');
            redirect('admin/dhotel');
        }else {
            $data = array(
                'kode_kamar' => $this->input->post('kode_kamar'),
                'namablok' => $this->input->post('namablok'),
                'lantai' => $this->input->post('lantai'),
                'hargasewa' => $this->input->post('hargasewa'),
                'status_h' => '0',
                
            );
            $this->model->Simpan('data_kamar_hotel', $data);
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('admin/dhotel');
        }
    }

    public function edit_data($kode = 0){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
            redirect('admin/dhotel');
        }
        $datakh = $this->model->GetDataKH("where kode_kamar = '$kode'")->row_array();
        $data = array(
            'id_kamar' => $datakh['id_kamar'],
            'kode_kamar' => $datakh['kode_kamar'],
            'namablok' => $datakh['namablok'],
            'lantai' => $datakh['lantai'],
            'hargasewa' => $datakh['hargasewa'],
            'status_h' => $datakh['status_h'],


            'content' => 'admin/halaman/dataKH/edit',
        );
        $this->load->view('admin/template/site',$data);
    }

    // public function update_data(){
    //     $this->cek_user();
    //     if (!$_POST['update']){
    //         $this->session->set_flashdata('warning','Update data belum dilakukan');
    //         redirect('admin/dhotel');
    //     }
    //     $id_villa = $this->input->post('id_villa');
    //     $kode_villa = $this->input->post('kode_villa');
    //     $jenis_villa = $this->input->post('jenis_villa');
    //     $hargasewa = $this->input->post('hargasewa');
    //     $status = $this->input->post('status');
    //     // if (($_FILES['gambar1']['name'] == null)and ($_FILES['gambar2']['name'] == null) and ($_FILES['gambar3']['name'] == null) and ($_FILES['gambar4']['name'] == null)){
    //     //     $gambar1= $this->input->post('gambar1');
    //     //     $gambar2= $this->input->post('gambar2');
    //     //     $gambar3= $this->input->post('gambar3');
    //     //     $gambar4= $this->input->post('gambar4');
    //     // }else{
    //     //     $gambar1 = $_FILES['gambar1']['name'];
    //     //     $gambar2 = $_FILES['gambar2']['name'];
    //     //     $gambar3 = $_FILES['gambar3']['name'];
    //     //     $gambar4 = $_FILES['gambar4']['name'];
    //     // }
    //     $data= array(
    //         'jenis_villa' => $jenis_villa,
    //         'hargasewa' => $hargasewa,
    //         'status' => $status,
        
    //     );
    //     // $data2 = array(
    //     //     'gambar1' => $gambar1,
    //     //     'gambar2' => $gambar2,
    //     //     'gambar3' => $gambar3,
    //     //     'gambar4' => $gambar4,
    //     // );
    //     $result1 = $this->model->Update('data_villa',$data,array('kode_villa' => $kode_villa));
    //     // $result2 = $this->model->Update('data_gambar_villa',$data2,array('id_villa' => $id_villa));
    //     if ($result1 == 1) 
    //         // and ($result2 == 1)
    //         {
    //         $this->session->set_flashdata('sukses', 'Update data berhasil dilakukan');
    //         redirect('admin/dhotel');
    //     }else{
    //         $this->session->set_flashdata('error', 'Update data gagal dilakukan');
    //         redirect('admin/dhotel');
    //     }
    // }

    // public function hapus_data($kode = 1){
    //     $this->cek_user();
    //     if ($this->uri->segment(3) == null){
    //         $this->session->set_flashdata('warning','Hapus data belum dilakukan');
    //         redirect('admin/dhotel');
    //     }
    //     $datavilla = $this->model->GetDataVilla("where kode_villa = '$kode'")->row_array();
    //     $result = $this->model->Hapus('data_villa',array('kode_villa' => $kode));

    //     if ($result == 1){
            
    //         $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
    //         redirect('admin/dhotel');
    //     }else{
    //         $this->session->set_flashdata('error','Hapus data gagal dilakukan');
    //         redirect('admin/dhotel');
    //     }

    // }

    // public function detail_data($kode = 0){
    //     $this->cek_user();
    //     if ($this->uri->segment(3) == null){
    //         $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
    //         redirect('admin/dhotel');
    //     }

    //     $datavilla = $this->model->GetDataVilla("where kode_villa = '$kode'")->row_array();
    //     $data = array(
    //         'kode_villa' => $datavilla['kode_villa'],
    //         'jenis_villa' => $datavilla['jenis_villa'],
    //         'hargasewa' => $datavilla['hargasewa'],
    //         'status' => $datavilla['status'],
    //         'content' => 'admin/halaman/datavilla/detail',
    //     );

    //     $this->load->view('admin/template/site',$data);
    // }

    // public function export_excel(){
    //     $this->cek_user();
    //     $data = array(
    //         'title' => 'Data Villa',
    //         'datavilla' => $this->model->GetDataVilla()->result_array(),
    //     );
    //     $this->load->view('admin/halaman/datavilla/laporan-excel',$data);
    // }

    // public function export_pdf(){
    //     $this->cek_user();
    //     ob_start();
    //     $data = array(
    //         'title' => 'Data Villa',
    //         'datavilla' => $this->model->GetDataVilla()->result_array(),
    //     );
    //     $this->load->view('admin/halaman/datavilla/laporan-pdf', $data);
    //     $html = ob_get_clean();

    //     require_once ('./assets/html2pdf/html2pdf.class.php');
    //     $pdf = new HTML2PDF('P','A4','en');
    //     $pdf->WriteHTML($html);
    //     $pdf->Output('Data Villa.pdf','D');
    // }

    // public function export_print(){
    //     $this->cek_user();
    //     $data = array(
    //         'title' => 'Data Villa',
    //         'datavilla' => $this->model->GetDataVilla()->result_array(),
    //     );
    //     $this->load->view('admin/halaman/datavilla/laporan-pdf', $data);
    // }

}
?>