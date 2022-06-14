<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
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

	public function index()
	{
		$data['page'] 	 	= 'kelas';
		$data['dropdown']	= $this->core->selectkelas();
		$data['selectunit']     = $this->core->selectunit();
		$type = $this->session->userdata('type_users');
		$unit = $this->session->userdata('unit');
		//die(print_r($type));
		if ($type == "SISWA") {
			redirect('dashboard');
		} elseif ($type == "GURU") {
			$data['kelas']    	= $this->db->query("SELECT * FROM sr_kelas WHERE unit='$unit'")->result_array();
		} else {
			$data['kelas']    	= $this->db->query("SELECT * FROM sr_kelas")->result_array();
		}
		$this->load->view('template', $data, FALSE);
	}

	function random($length)
	{
		$str = "";
		$characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}

	function add()
	{
		$nama_kelas 	  		= $this->input->post('nama_kelas');
		$keterangan 	  		= $this->input->post('keterangan');
		$tingkat 	      		= $this->input->post('tingkat');
		if ($this->session->userdata('type_users') == "ADMIN") { 
			$unit	 	      	= $this->input->post('unit');
		} else {
			$unit 				= $this->session->userdata('unit');
		}
		//$unit 				= $this->session->userdata('unit');

		if (empty($nama_kelas) || empty($keterangan)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('kelas');
		} else {
			$data = array(
				'k_tingkat'		=> $tingkat,
				'k_romawi' 		=> $nama_kelas,
				'k_keterangan'	=> $keterangan,
				'unit'			=> $unit
			);
			$this->core->input_data($data, 'sr_kelas');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Selamat, Kelas telah terdaftar!
		</div>");
			redirect('kelas');
		}
	}

	function deletes($id)
	{
		$this->db->where('idkelas', $id);
		$query 		        = $this->db->get('sr_kelas');
		$row 			    = $query->row();
		$this->db->delete('sr_kelas', array('idkelas' => $id));
		$this->session->set_flashdata("msg", "<div class='alert alert-danger' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Kelas Berhasil Dihapus!
	    </div>");
		redirect('kelas');
	}
}
