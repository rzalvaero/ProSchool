<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bukukerja extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
			redirect('auth/siswa');
		}
	}

	private function set_upload_options()
	{   
		//upload an all options
		$config = array();
		$config['upload_path'] = './assets/doc/bukukerja';
		$config['allowed_types'] = 'jpg|png|pdf|jpeg|docx|csv|xls|xlsx|gif|doc|';
		//$config['max_size']      = '0';
		$config['overwrite']     = FALSE;
		return $config;
	}

	public function index()
	{
		$data['page']  	= 'bukukerja';
        $data['dropdown']    = $this->core->selectunit();
		$data['bukukerja']  = $this->db->query("SELECT SB.*, WU.nama as unitnya FROM sr_bukukerja SB 
		LEFT JOIN web_unit WU on WU.id = SB.unit")->result_array();
		$this->load->view('template', $data);
	}

	function add(){
		
		$this->load->library('upload'); // not sure if you already autoloaded this
		$this->upload->initialize($this->set_upload_options());
        $data = array();
		
		if($this->upload->do_upload('file_name')) {   
			$dataInfo 		= $this->upload->data();
			$files 	= $dataInfo['file_name'];
		}
  
		$unit 			= $this->input->post('unit');
		$mapel			= $this->input->post('mapel');
		$no				= $this->input->post('no');
		$tgl_posting	= date("Y-m-d H:i:s");
		
		$data = array(
			'unit'			=> $unit,
			'matapelajaran' => $mapel,
			'files'			=> $files,
			'nomer' 		=> $no,
			'created'		=> $tgl_posting,
		); 
		$this->core->input_data($data,'sr_bukukerja');
		$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Dokumen telah ditambah!
		</div><br/>");
		redirect('bukukerja');
	}

	function get_matapelajaran()
	{
		$id = $this->input->post('id');
		$data = $this->core->get_matapelajaran($id);
		//die(print_r($data));
		echo json_encode($data);
	}
	
}
