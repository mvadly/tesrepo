<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dfasilitas extends CI_Controller{

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
            redirect('admin/login');
        }
    }

    public function index(){
        $data = array(
            'ses_level' => $this->session->userdata('ses_level'),
            'fasilitas' => $this->model->GetFasilitas('order by nama_fasilitas asc'),
            'content' => 'admin/halaman/datafasilitas/datafasilitas',
            
        );
        $this->load->view('admin/template/site', $data);
    }

    public function simpan_data(){
        $this->cek_user();
        if (!$_POST['simpan']){
            $this->session->set_flashdata('warning', 'Tambah data belum dilakukan');
            redirect('admin/dfasilitas');
        }

            $data = array(
                'nama_fasilitas' => $this->input->post('nama_fasilitas'),
                'harga' => $this->input->post('harga'),
                'ket_fasilitas' => $this->input->post('ket_fasilitas'),
                
            );
            $this->model->Simpan('data_fasilitas', $data);
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('admin/dfasilitas');
        
    }

    public function edit_data($kode = 0){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
            redirect('admin/dfasilitas');
         }
        $fasilitas = $this->model->GetFasilitas("where id_fasilitas = '$kode'")->row_array();
        $data = array(
            'id_fasilitas' => $fasilitas['id_fasilitas'],
            'nama_fasilitas' => $fasilitas['nama_fasilitas'],
            'harga' => $fasilitas['harga'],
            'ket_fasilitas' => $fasilitas['ket_fasilitas'],

            'content' => 'admin/halaman/datafasilitas/edit',
        );
        $this->load->view('admin/template/site',$data);
    }

    public function update_data(){
        $this->cek_user();
        if (!$_POST['update']){
            $this->session->set_flashdata('warning','Update data belum dilakukan');
            redirect('admin/dfasilitas');
        }
        $id_fasilitas = $this->input->post('id_fasilitas');
        $nama_fasilitas = $this->input->post('nama_fasilitas');
        $harga = $this->input->post('harga');
        $ket_fasilitas = $this->input->post('ket_fasilitas');
        $data= array(
            'nama_fasilitas' => $nama_fasilitas,
            'harga' => $harga,
            'ket_fasilitas' => $ket_fasilitas,
        
        );

        $result = $this->model->Update('data_fasilitas',$data,array('id_fasilitas' => $id_fasilitas));

        if ($result == 1){
            $this->session->set_flashdata('sukses', 'Update data berhasil dilakukan');
            redirect('admin/dfasilitas');
        }else{
            $this->session->set_flashdata('error', 'Update data gagal dilakukan');
            redirect('admin/dfasilitas');
        }
    }

    public function hapus_data($kode = 1){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Hapus data belum dilakukan');
            redirect('admin/dfasilitas');
        }
        $fasilitas = $this->model->GetFasilitas("where id_fasilitas = '$kode'")->row_array();
        $result = $this->model->Hapus('data_fasilitas',array('id_fasilitas' => $kode));

        if ($result == 1){
            
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('admin/dfasilitas');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('admin/dfasilitas');
        }

    }

    
    public function export_excel(){
        $this->cek_user();
        $data = array(
            'title' => 'Data cottage',
            'datacottage' => $this->model->GetDatacottage()->result_array(),
        );
        $this->load->view('admin/halaman/datacottage/laporan-excel',$data);
    }

    public function export_pdf(){
        $this->cek_user();
        ob_start();
        $data = array(
            'title' => 'Data cottage',
            'datacottage' => $this->model->GetDatacottage()->result_array(),
        );
        $this->load->view('admin/halaman/datacottage/laporan-pdf', $data);
        $html = ob_get_clean();

        require_once ('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data cottage.pdf','D');
    }

    public function export_print(){
        $this->cek_user();
        $data = array(
            'title' => 'Data cottage',
            'datacottage' => $this->model->GetDatacottage()->result_array(),
        );
        $this->load->view('admin/halaman/datacottage/laporan-pdf', $data);
    }

}
?>