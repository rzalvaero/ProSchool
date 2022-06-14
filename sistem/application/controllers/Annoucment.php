<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Annoucment extends CI_Controller
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
		$data['page']  	= 'pengumuman';
		$data['pengumuman']  = $this->db->query("SELECT * FROM sr_pengumuman")->result_array();
		$this->load->view('template', $data);
	}

	function add()
	{
		$title 	  		= $this->input->post('title');
		$show 	  		= $this->input->post('show');
		$close 	  		= $this->input->post('close');
		$message 	  	= $this->input->post('message');
		if (empty($title) || empty($show)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('annoucment');
		} else {
			$data = array(
				'judul'	=> $title,
				'konten '	=> $message,
				'tgl_tutup' 	=> $close,
				'tgl_tampil'	=> $show
			);
			//die(print_r($data));
			$this->core->input_data($data, 'sr_pengumuman');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Virtual Meeting telah terdaftar, silahkan masuk room untuk memulai!
		</div>");
			redirect('annoucment');
		}
	}
}
