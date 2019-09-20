<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dtbh extends CI_Controller{

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
            redirect('admin/halaman/datatamubooking/bookingkh');
        }
    }

    public function index(){
        $this->cek_user();
        $data = array(
            $tgl='where tgl_masuk="'.date('Y-m-d').'"',
            'ses_level' => $this->session->userdata('ses_level'),
            'datatb' => $this->model->GetTBH(' order by tgl_masuk desc')->result_array(),
            'content' => 'admin/halaman/datatamubooking/bookingkh',
            
        );
        $this->load->view('admin/template/site', $data);
    }

    
    public function konf_book_kh(){

        $kode_sewa = 'S'.date('dmyhs');
        $cek_kode = $this->model->GetDataCekin("where kode_sewa = '$kode_sewa'")->num_rows();
        $cek_kt = $this->model->GetDataTamu("where kode_tamu = '$kode_tamu'")->num_rows();
        if ($cek_kode > 0){
            $this->session->set_flashdata('warning', 'Data sudah ada');
            redirect('admin/dashboard');
        }else {
            
            if ($cek_kt < 0){
            $this->session->set_flashdata('warning', 'Kode Tamu Salah');
            redirect('admin/dashboard');
            }else {

            $kode_booking = $this->input->post('kode_booking');
            $kode_kamar = $this->input->post('kode_kamar');
            $kode_tamu = $this->input->post('kode_tamu');
            $data = array(
                'kode_sewa' => $kode_sewa,
                'kode_tamu' => $this->input->post('kode_tamu'),
                'kode_kamar' => $this->input->post('kode_kamar'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'pembayaran' => $this->input->post('pembayaran'),
                'bayar' => $this->input->post('pembayaran'),
                'kembali' => 0,
                'operator' => $this->session->userdata('ses_level'),
                
                
            );
            $datak =array(
                'status_h' => '1',
                );
            $datat =array(
                'tipetamu' => 'Check In',
                );
            $datab =array(
                'ket' => '1',
                );
            $this->model->Simpan('data_cekin', $data);
            $this->model->Update('data_kamar_hotel',$datak,array('kode_kamar' => $kode_kamar));
            $this->model->Update('data_tamu',$datat,array('kode_tamu' => $kode_tamu));
            $this->model->Update('data_booking',$datab,array('kode_booking' => $kode_booking));
            $this->session->set_flashdata('sukses', 'Konfirmasi booking berhasil');
            redirect('admin/dashboard');
        }
        }
    }
    public function accept_data(){
        $this->cek_user();
        if (!$_POST['update']){
            $this->session->set_flashdata('warning','Update data belum dilakukan');
            redirect('admin/dtbh');
        }
        $kode_booking = $this->input->post('kode_booking');
        $kode_kamar = $this->input->post('kode_kamar');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $kode_tamu = $this->input->post('kode_tamu');
        $emailtamu = $this->input->post('email');


        // $url = $_SERVER['HTTP_REFERER'];
        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'mfadly24@gmail.com', 
          'smtp_pass' => 'android2410', 
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );
        $this->load->library('email', $config);

        
        $aksi = $this->input->post('aksi');
        switch ($aksi) {
            case 'terima':
                $data= array('status_h' => '2');
                $data2= array(
                    'tipetamu' => 'Booking',
                );
                $data3= array(
                    'ket' => '2',
                    'dp' => $this->input->post('dp'),
                );
                $result = $this->model->Update('data_kamar_hotel',$data,array('kode_kamar' => $kode_kamar));
                $result2 = $this->model->Update('data_tamu',$data2,array('kode_tamu' => $kode_tamu));
                $result3 = $this->model->Update('data_booking',$data3,array('kode_booking' => $kode_booking));
                $this->email->set_newline("\r\n");
                $this->email->from('mfadly24@gmail.com');
                $this->email->to($emailtamu);
                $this->email->subject('Booking telah diterima (Hotel Kharisma)');
                $this->email->message('Terimakasih, Booking telah diterima. Nomor Booking anda adalah '.$kode_booking.'. tunjukan bukti terima ini kepada bagian front office untuk melakukan Check In pada tanggal '.$tgl_masuk.' dan Check Out pada tanggal '.$tgl_keluar);

                if (($result == 1) and ($result2 == 1) and ($result3 == 1) and ($this->email->send())){
                    


                    $this->session->set_flashdata('sukses', 'Booking Data Telah di verifikasi ke email tamu');
                    redirect('admin/dtbh');
                }else{
                    $this->session->set_flashdata('error', 'Booking data gagal diverifikasi');
                    redirect('admin/dtbh');
                }
                break;
            case 'tolak':
                $data3= array('ket' => '3');
                $result3 = $this->model->Update('data_booking',$data3,array('kode_booking' => $kode_booking));
                $this->email->set_newline("\r\n");
                $this->email->from('mfadly24@gmail.com');
                $this->email->to($emailtamu);
                $this->email->subject('Booking ditolak (Hotel Kharisma)');
                $this->email->message('Mohon maaf booking dengan kode booking '.$kode_booking.' ditolak, karna tidak sesuai pembayaran atau file bukti transfer tidak valid.  ');

                if (($result3 == 1) and ($this->email->send())){
                    $this->session->set_flashdata('sukses', 'Reject Data berhasil di verifikasi ke email tamu');

                    redirect('admin/dtbh');
                }else{
                    $this->session->set_flashdata('error', 'Reject data gagal diverifikasi');
                    redirect('admin/dtbh');
                }
                break;
            default:
                $this->session->set_flashdata('warning','Pilih aksi!');
                redirect('admin/dtbh');
                break;
        }
        
    }

    public function hapus_data($kode = 1){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Hapus data belum dilakukan');
            redirect('admin/dtbh');
        }
        $datatb = $this->model->GetTBC("where kode_booking = '$kode'")->row_array();
        $buktip = $datatb['buktip'];
        $result1 = $this->model->Hapus('data_booking',array('kode_booking' => $kode));

        if ($result1 == 1){
            unlink('./assets/upload/buktibayar/'.$buktip);            
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('admin/dtbh');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('admin/dtbh');
        }

    }

    public function detail_data($kode = 0){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
            redirect('admin/dtbh');
        }

    
        $datatb = $this->model->GetTBH("where kode_booking = '$kode' ")->row_array();

        $data = array(
                    'kode_booking' => $datatb['kode_booking'],
                    'tgl_masuk' => $datatb['tgl_masuk'],
                    'tgl_keluar' => $datatb['tgl_keluar'],
                    'buktip' => $datatb['buktip'],
                    'dp' => $datatb['dp'],
                    'total_harga_sewa' => $datatb['total_harga_sewa'],  
                    'kode_kamar' => $datatb['kode_kamar'],
                    'namablok' => $datatb['namablok'],
                    'lantai' => $datatb['lantai'],
                    'hargasewa' => $datatb['hargasewa'],  
                    'no_id' => $datatb['no_id'],
                    'kode_tamu' => $datatb['kode_tamu'],
                    'nama_tamu' => $datatb['nama_tamu'],
                    'jeniskelamin' => $datatb['jeniskelamin'],
                    'warganegara' => $datatb['warganegara'],
                    'tgl_lahir' => $datatb['tgl_lahir'],
                    'no_telp' => $datatb['no_telp'],
                    'email' => $datatb['email'],
                    'tipetamu' => $datatb['tipetamu'],
                    'ket' => $datatb['ket'],
                    

                    'content' => 'admin/halaman/datatamubooking/detail',
        );

        $this->load->view('admin/template/site',$data);

    }

    public function export_excel(){
        $this->cek_user();
        $data = array(
            'title' => 'Data Villa',
            'datavilla' => $this->model->GetDataVilla()->result_array(),
        );
        $this->load->view('admin/halaman/datavilla/laporan-excel',$data);
    }

    public function export_pdf(){
        $this->cek_user();
        ob_start();
        $data = array(
            'title' => 'Data Villa',
            'datavilla' => $this->model->GetDataVilla()->result_array(),
        );
        $this->load->view('admin/halaman/datavilla/laporan-pdf', $data);
        $html = ob_get_clean();

        require_once ('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Villa.pdf','D');
    }

    public function export_print(){
        $this->cek_user();
        $data = array(
            'title' => 'Data Villa',
            'datavilla' => $this->model->GetDataVilla()->result_array(),
        );
        $this->load->view('admin/halaman/datavilla/laporan-pdf', $data);
    }

}
?>