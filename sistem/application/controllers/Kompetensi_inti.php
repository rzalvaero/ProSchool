<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetensi_inti extends CI_Controller
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
		$data['page'] 	 	= 'kompetensi_inti';
		$data['dropdown']	= $this->core->selectkelas();
		$type = $this->session->userdata('type_users');
		$unit = $this->session->userdata('unit');
		//die(print_r($type));
		if ($type == "SISWA") {
			redirect('dashboard');
		} else {
			$data['data']    	= $this->db->query("SELECT * FROM sr_kompetensi_inti")->result_array();
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
		$kode 	  		= $this->input->post('kode');
		$nama 	  		= $this->input->post('nama');
		$kategori 	    = $this->input->post('kategori');

		if (empty($kode) || empty($nama)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('kompetensi_inti');
		} else {
			$data = array(
				'kode_kd'		=> $kode,
				'nama_kd' 		=> $nama,
				'kategori_kd'	=> $kategori
			);
			$this->core->input_data($data, 'sr_kompetensi_inti');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
				Selamat, Kompetensi Inti telah terdaftar!
				</div>");
			redirect('kompetensi_inti');
		}
	}

	function deletes($id)
	{
		$this->db->where('idkompetensiinti ', $id);
		$query 		        = $this->db->get('sr_kompetensi_inti');
		$row 			    = $query->row();
		$this->db->delete('sr_kompetensi_inti', array('idkompetensiinti ' => $id));
		$this->session->set_flashdata("msg", "<div class='alert alert-danger' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Kompetensi Inti Berhasil Dihapus!
	    </div>");
		redirect('kompetensi_inti');
	}
	public function edit($id){
		$data['page'] 	 	= 'editkompetensi_inti';
		$data['data']    	= $this->db->query("SELECT * FROM sr_kompetensi_inti where idkompetensiinti = '$id'")->result_array();
		$this->load->view('template', $data, FALSE);
	}
	function edited(){
		$id 	= $this->input->post('id');
		$kode 	= $this->input->post('kode');
		$nama	= $this->input->post('nama');
		$kategori	= $this->input->post('kategori');

		$data = array(
			'kode_kd' => $kode,
			'nama_kd' => $nama,
			'kategori_kd' => $kategori,
		);

		$where = array(
			'idkompetensiinti' => $id
		);
		$this->core->update($where,$data,'sr_kompetensi_inti');
		//logs
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Selamat data kompetensi_inti anda telah di update!
		</div><br/><br/>");
		redirect('kompetensi_inti');
	}
}
