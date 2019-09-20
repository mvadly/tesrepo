<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$this->load->view('tes');
	}
	public function search()
	{
		$this->form_validation->set_rules('fasilitas_id[]', 'fasilitas_id', 'required|trim');
		$this->form_validation->set_rules('fasilitas_nama[]', 'fasilitas_nama', 'required|trim');
		$this->form_validation->set_rules('fasilitas_harga[]', 'fasilitas_harga', 'required|trim');
		$this->form_validation->set_rules('qty[]', 'qty', 'required|trim');
		$this->form_validation->set_rules('totalf[]', 'totalf', 'required|trim');
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('data_fasilitas')->like('nama_fasilitas',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nama_fasilitas,
				'id_fasilitas'	=>$row->id_fasilitas,
				'harga'	=>$row->harga
			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
}
?>