<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claporan extends CI_Controller{
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
    public function cek_user(){
        if (($this->session->userdata('ses_level') == 'Super Admin') or ($this->session->userdata('ses_level') == 'Front Office')){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('admin/dashboard');
        }
    }

    public function index(){
        $this->cek_user();
        $data = array(
            // Cottage
            'tamubooking' => $this->model->GetDataBCT('where status="2" and ket="2"')->num_rows(),
            'tamubookcnow' => $this->model->GetDataBCT('where tgl_masuk="'.date('Y-m-d').'" and status="2" and ket="2" and tipetamu="Booking" ')->result_array(),
            'tamubookrow' => $this->model->GetDataBCT('where tgl_masuk="'.date('Y-m-d').'" and status="2" and ket="2" and tipetamu="Booking" ')->num_rows(),
            'cottagetersedia' => $this->model->GetDataCSedia('where status="0"')->num_rows(),
            'cottagetotal' => $this->model->GetDataCSedia()->num_rows(),
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



            'content' => 'admin/halaman/laporan/laporanmaster',
        );
        $this->load->view('admin/template/site', $data);
    }
    public function cetak_master(){
        $laporan1=$this->input->post('laporan1');
        $data = array(
            'datakh' => $this->model->GetDataKH(' order by kode_kamar asc')->result_array(),
            'dtamu' => $this->model->GetDataTamu(' order by nama_tamu asc')->result_array(),
            'datact' => $this->model->GetDataCTJ(' order by kode_cottage asc')->result_array(),
            'dfas' => $this->model->GetFasilitas(' order by nama_fasilitas asc')->result_array(),
        );
        switch ($laporan1) {
            case 'd_kh':
                $this->load->view('admin/halaman/laporan/printkh', $data);
                break;

            case 'd_cottage':
                $this->load->view('admin/halaman/laporan/printct', $data);
                break;
            case 'd_tamu':
                $this->load->view('admin/halaman/laporan/printdt', $data);
                break; 
            case 'd_fasilitas':
                $this->load->view('admin/halaman/laporan/printf', $data);
                break; 
            default:
                $this->session->set_flashdata('error', 'Pilih Laporan yang akan dicetak!');
                redirect('admin/claporan');
                break;
        }
        
        
        
      
        
    }

    public function cetak_trans_ct(){
        
        $laporan2=$this->input->post('laporan2');
        $dari=$this->input->post('dari');
        $ke=$this->input->post('ke');
        $data = array(
            'dari'=>$dari,
            'ke'=>$ke,
            
          
        );
        
        switch ($laporan2) {
            case 'd_bookingct_acc':
                $data['databooking'] = $this->model->GetDataBCT(' where ket="2" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar desc')->result_array();
                $data['dbacc'] = $this->model->GetDataBCT(' where ket="2" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar desc')->num_rows();
                switch ($data['dbacc']) {
                    case null:
                    $this->session->set_flashdata('warning', 'Laporan Booking Cottage diterima tidak ada!');
                redirect('admin/claporan');
                    break;
                    
                    default:
                        $this->load->view('admin/halaman/laporan/printbookacc', $data);
                    break;
                }
                
                
                break;
            case 'd_bookingct_rjc':
                $data['databooking'] = $this->model->GetDataBCT(' where ket="3" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar desc')->result_array();
                $data['dbrjc'] = $this->model->GetDataBCT(' where ket="3" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar desc')->num_rows();

                switch ($data['dbrjc']) {
                    case null:
                    $this->session->set_flashdata('warning', 'Laporan Booking Cottage ditolak tidak ada!');
                redirect('admin/claporan');
                    break;
                    
                    default:
                        $this->load->view('admin/halaman/laporan/printbookrjc', $data);
                    break;
                }

                
                break;

            case 'd_checkinct':
                $data['datacekin'] = $this->model->GetDataCICT(' where status_ci="1" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar asc')->result_array();
                $data['dcic'] = $this->model->GetDataCICT(' where status_ci="1" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar asc')->num_rows();
                switch ($data['dcic']) {
                    case null:
                    $this->session->set_flashdata('warning', 'Laporan Check In Cottage tidak ada!');
                redirect('admin/claporan');
                    break;
                    
                    default:
                        $this->load->view('admin/halaman/laporan/printcict', $data);
                    break;
                }

                
                break;
            case 'd_checkoutct':
                $data['datacekin'] = $this->model->GetDataCICT(' where status_ci="2" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar asc')->result_array();
                $data['dcic'] = $this->model->GetDataCICT(' where status_ci="2" and tgl_masuk between "'.$dari.'" and "'.$ke.'"  order by tgl_keluar asc')->num_rows();
                $data['fakturci'] = $this->model;
                switch ($data['dcic']) {
                    case null:
                    $this->session->set_flashdata('warning', 'Laporan Check Out Cottage tidak ada!');
                redirect('admin/claporan');
                    break;
                    
                    default:
                        $this->load->view('admin/halaman/laporan/printcoct', $data);
                    break;
                }
                break;
            
            default:
                echo 'pilih helan atuh';
                break;
        }
        
    }
    public function cetak_trans_kh(){
        
        $laporan3=$this->input->post('laporan3');
        $dari_kh=$this->input->post('dari_kh');
        $ke_kh=$this->input->post('ke_kh');
        $data = array(
            'dari'=>$dari_kh,
            'ke'=>$ke_kh,
            
          
        );
        
        switch ($laporan3) {
            case 'd_bookingkh_acc':
                $data['databooking'] = $this->model->GetDataBH(' where ket="2" and tgl_masuk between "'.$dari_kh.'" and "'.$ke_kh.'"  order by tgl_keluar desc')->result_array();
                $data['dbacc'] = $this->model->GetDataBH(' where ket="2" and tgl_masuk between "'.$dari_kh.'" and "'.$ke_kh.'"  order by tgl_keluar desc')->num_rows();
                switch ($data['dbacc']) {
                    case null:
                    $this->session->set_flashdata('warning', 'Laporan Booking Kamar Hotel diterima tidak ada!');
                redirect('admin/claporan');
                    break;
                    
                    default:
                        $this->load->view('admin/halaman/laporan/printbookacc_kh', $data);
                    break;
                }
                
                
                break;
            case 'd_bookingkh_rjc':
                $data['databooking'] = $this->model->GetDataBH(' where ket="3" and tgl_masuk between "'.$dari_kh.'" and "'.$ke_kh.'"  order by tgl_keluar desc')->result_array();
                $data['dbrjc'] = $this->model->GetDataBH(' where ket="3" and tgl_masuk between "'.$dari_kh.'" and "'.$ke_kh.'"  order by tgl_keluar desc')->num_rows();

                switch ($data['dbrjc']) {
                    case null:
                    $this->session->set_flashdata('warning', 'Laporan Booking Kamar Hotel ditolak tidak ada!');
                redirect('admin/claporan');
                    break;
                    
                    default:
                        $this->load->view('admin/halaman/laporan/printbookrjc_kh', $data);
                    break;
                }

                
                break;

            case 'd_checkinkh':
                $data['datacekin'] = $this->model->GetDataCIKH(' where status_ci="1" and tgl_masuk between "'.$dari_kh.'" and "'.$ke_kh.'"  order by tgl_keluar asc')->result_array();
                $data['dcic'] = $this->model->GetDataCIKH(' where status_ci="1" and tgl_masuk between "'.$dari_kh.'" and "'.$ke_kh.'"  order by tgl_keluar asc')->num_rows();
                switch ($data['dcic']) {
                    case null:
                    $this->session->set_flashdata('warning', 'Laporan Check In Kamar Hotel tidak ada!');
                redirect('admin/claporan');
                    break;
                    
                    default:
                        $this->load->view('admin/halaman/laporan/printcikh', $data);
                    break;
                }

                
                break;
            case 'd_checkoutkh':
                $data['datacekin'] = $this->model->GetDataCIKH(' where status_ci="2" and tgl_masuk between "'.$dari_kh.'" and "'.$ke_kh.'"  order by tgl_keluar asc')->result_array();
                $data['dcic'] = $this->model->GetDataCIKH(' where status_ci="2" and tgl_masuk between "'.$dari_kh.'" and "'.$ke_kh.'"  order by tgl_keluar asc')->num_rows();
                $data['fakturci'] = $this->model;
                switch ($data['dcic']) {
                    case null:
                    $this->session->set_flashdata('warning', 'Laporan Check Out Kamar Hotel tidak ada!');
                redirect('admin/claporan');
                    break;
                    
                    default:
                        $this->load->view('admin/halaman/laporan/printcokh', $data);
                    break;
                }
                break;
            
            default:
                echo 'pilih helan atuh';
                break;
        }
        
        
      
        
    }
    


}
?>