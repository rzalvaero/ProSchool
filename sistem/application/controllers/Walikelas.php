<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walikelas extends CI_Controller
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
		$data['page'] 	 	= 'walikelas';
		$type = $this->session->userdata('type_users');
		
		//die(print_r($data['dropdown']));
		if ($type == "SISWA") {
			redirect('dashboard');
		} elseif ($type == "GURU") {
			$unit = $this->session->userdata('unit');
			$data['dropdown'] = $this->core->get_guru($unit);
			$data['kelas']    	= $this->db->query("SELECT SK.* , US.first_name, US.last_name FROM sr_kelas SK
			LEFT JOIN users US on US.id = SK.walikelas WHERE SK.unit = '$unit'")->result_array();
		} else {
			$data['dropdown'] = $this->core->get_guru_all();
			$data['kelas']    	= $this->db->query("SELECT SK.* , US.first_name, US.last_name FROM sr_kelas SK
			LEFT JOIN users US on US.id = SK.walikelas")->result_array();
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
	
	function update(){
			$id = $this->input->post('id');
			$walikelas = $this->input->post('walikelas');
			$data = array(
				'walikelas' 			=> $walikelas,
			);
			$where = array(
				'idkelas' => $id
			);
			$this->core->update($where,$data,'sr_kelas');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
			Success update data Profile!
			</div><br/>");
			redirect('walikelas');
	}

}
