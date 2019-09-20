<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dcottage extends CI_Controller{

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
        if ($this->session->userdata('ses_level') == 'Front Office' or $this->session->userdata('ses_level') == 'Manager'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/dcottage');
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
            'dataCT' => $this->model->GetDataCT('order by kode_cottage asc')->result_array(),
            'datagambar' => $this->model->GetDataGambar('order by id_gambar asc')->result_array(),
            'content' => 'admin/halaman/datacottage/datacottage',
            
        );
        $this->load->view('admin/template/site', $data);
    }

    public function simpan_data(){
        $this->cek_user();
        if (!$_POST['simpan']){
            $this->session->set_flashdata('warning', 'Tambah data belum dilakukan');
            redirect('admin/dcottage');
        }
        $cek_kode = $this->model->GetDataCT("where kode_cottage = '$kode_cottage'")->num_rows();
        if ($cek_kode > 0){
            $this->session->set_flashdata('warning', 'Data sudah ada');
            redirect('admin/dcottage');
        }else {
            $id_gambar=date('ymdHis');


            $data = array(
                
                'kode_cottage' => $this->input->post('kode_cottage'),
                'nama_cottage' => $this->input->post('nama_cottage'),
                'jml_kamar' => $this->input->post('jml_kamar'),
                'hargasewa' => $this->input->post('hargasewa'),
                'status' => '0',
                'id_gambar' => $id_gambar,
                
            );
            $this->model->Simpan('data_cottage', $data);
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('admin/dcottage');
        }
    }

    public function edit_data($kode = 0){
        
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
            redirect('admin/dcottage');
         }
        $datacottage = $this->model->GetDataCT("where kode_cottage = '$kode'")->row_array();
        $data = array(
            'datagambar' => $this->model->GetDataGambar('order by id_gambar asc')->result_array(),
            'datacottage' => $this->model->GetDataCTJ()->result_array(),
            'id_cottage' => $datacottage['id_cottage'],
            'kode_cottage' => $datacottage['kode_cottage'],
            'nama_cottage' => $datacottage['nama_cottage'],
            'jml_kamar' => $datacottage['jml_kamar'],
            'hargasewa' => $datacottage['hargasewa'],

            'content' => 'admin/halaman/datacottage/edit',
        );
        $this->load->view('admin/template/site',$data);
    }
    public function tambah_gambar($kode = 0){
        
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih cottage untuk tambah gambar');
            redirect('admin/dcottage');
         }
        $datacottage = $this->model->GetDataCT("where kode_cottage = '$kode'")->row_array();
        $data = array(
            'datagambar' => $this->model,
            //'datacottage' => $this->model->GetDataCT()->result_array(),
            'kode_cottage' => $datacottage['kode_cottage'],
            'nama_cottage' => $datacottage['nama_cottage'],
            'jml_kamar' => $datacottage['jml_kamar'],
            'hargasewa' => $datacottage['hargasewa'],

            'content' => 'admin/halaman/datacottage/tambahgambar',
        );
        $this->load->view('admin/template/site',$data);
    }

    public function hapus_gambar($kode = 1){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Hapus data belum dilakukan');
            redirect('admin/dcottage');
        }
        $datacottage = $this->model->GetDataGambar("where gambar = '$kode'")->row_array();
        $result = $this->model->Hapus('data_gambar',array('gambar' => $kode));

        if ($result == 1){
            unlink('./assets/upload/gambar/'.$kode);
            
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('admin/dcottage/tambah_gambar/'.$datacottage['id_gambar']);
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('admin/dcottage');
        }

    }

    public function update_data(){
        $this->cek_user();
        if (!$_POST['update']){
            $this->session->set_flashdata('warning','Update data belum dilakukan');
            redirect('admin/dcottage');
        }
        $kode_cottage = $this->input->post('kode_cottage');
        $nama_cottage = $this->input->post('nama_cottage');
        $jml_kamar = $this->input->post('jml_kamar');
        $hargasewa = $this->input->post('hargasewa');
        $id_gambar = $this->input->post('id_gambar');
         if (($_FILES['gambar1']['name'] == null) OR
            ($_FILES['gambar2']['name'] == null) OR
            ($_FILES['gambar3']['name'] == null) OR
            ($_FILES['gambar4']['name'] == null)){
            $gambar1 = $this->input->post('gambar1');
            $gambar2 = $this->input->post('gambar2');
            $gambar3 = $this->input->post('gambar3');
            $gambar4 = $this->input->post('gambar4');
        }else{
            $gambar1 = $_FILES['gambar1']['name'];
            $gambar2 = $_FILES['gambar2']['name'];
            $gambar3 = $_FILES['gambar3']['name'];
            $gambar4 = $_FILES['gambar4']['name'];
        }

        $data= array(
            'nama_cottage' => $nama_cottage,
            'jml_kamar' => $jml_kamar,
            'hargasewa' => $hargasewa,
            'id_gambar' => $id_gambar,
        
        );

        $datagambar= array(
            'gambar1' => $gambar1,
            'gambar2' => $gambar2,
            'gambar3' => $gambar3,
            'gambar4' => $gambar4

        
        );

        $result = $this->model->Update('data_cottage',$data,array('kode_cottage' => $kode_cottage));
        $result2 = $this->model->Update('data_gambar',$datagambar,array('id_gambar' => $id_gambar));

        if (($result == 1) && ($result2 == 1)){
            if (($_FILES['gambar1']['name'] != null) OR
                ($_FILES['gambar2']['name'] != null) OR
                ($_FILES['gambar3']['name'] != null) OR
                ($_FILES['gambar4']['name'] != null)){
                unlink('./assets/upload/gambar/'.$this->input->post('gambar1'));
                unlink('./assets/upload/gambar/'.$this->input->post('gambar2'));
                unlink('./assets/upload/gambar/'.$this->input->post('gambar3'));
                unlink('./assets/upload/gambar/'.$this->input->post('gambar4'));
            }
            $config = array(
                'upload_path' => './assets/upload/gambar',
                'allowed_types' => 'gif|jpg|JPG|png|JPEG|pdf',
                'max_size' => '2048',
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar1');
            $this->upload->do_upload('gambar2');
            $this->upload->do_upload('gambar3');
            $this->upload->do_upload('gambar4');
            $this->session->set_flashdata('sukses', 'Update data berhasil dilakukan');
            redirect('admin/dcottage');
        }else{
            $this->session->set_flashdata('error', 'Update data gagal dilakukan');
            redirect('admin/dcottage');
        }
    }

    public function hapus_data($kode = 1){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Hapus data belum dilakukan');
            redirect('admin/dcottage');
        }
        $datacottage = $this->model->GetDataCT("where kode_cottage = '$kode'")->row_array();
        $result = $this->model->Hapus('data_cottage',array('kode_cottage' => $kode));

        if ($result == 1){
            
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('admin/dcottage');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('admin/dcottage');
        }

    }

    // public function detail_data($kode = 0){
    //     $this->cek_user();
    //     if ($this->uri->segment(3) == null){
    //         $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
    //         redirect('admin/dcottage');
    //     }

    //     $datacottage = $this->model->GetDatacottage("where kode_cottage = '$kode'")->row_array();
    //     $data = array(
    //         'kode_cottage' => $datacottage['kode_cottage'],
    //         'jenis_cottage' => $datacottage['jenis_cottage'],
    //         'hargasewa' => $datacottage['hargasewa'],
    //         'status' => $datacottage['status'],
    //         'content' => 'admin/halaman/datacottage/detail',
    //     );

    //     $this->load->view('admin/template/site',$data);
    // }

    // public function export_excel(){
    //     $this->cek_user();
    //     $data = array(
    //         'title' => 'Data cottage',
    //         'datacottage' => $this->model->GetDatacottage()->result_array(),
    //     );
    //     $this->load->view('admin/halaman/datacottage/laporan-excel',$data);
    // }

    // public function export_pdf(){
    //     $this->cek_user();
    //     ob_start();
    //     $data = array(
    //         'title' => 'Data cottage',
    //         'datacottage' => $this->model->GetDatacottage()->result_array(),
    //     );
    //     $this->load->view('admin/halaman/datacottage/laporan-pdf', $data);
    //     $html = ob_get_clean();

    //     require_once ('./assets/html2pdf/html2pdf.class.php');
    //     $pdf = new HTML2PDF('P','A4','en');
    //     $pdf->WriteHTML($html);
    //     $pdf->Output('Data cottage.pdf','D');
    // }

    // public function export_print(){
    //     $this->cek_user();
    //     $data = array(
    //         'title' => 'Data cottage',
    //         'datacottage' => $this->model->GetDatacottage()->result_array(),
    //     );
    //     $this->load->view('admin/halaman/datacottage/laporan-pdf', $data);
    // }

}
?>