<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bayar_gaji extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		$this->load->model('doc_setting_tunjangan');
		$this->load->model('doc_setting_potongan');
		$this->load->model('doc_setting_pendapatan_lain_lain');
		$this->load->model('doc_setting_gaji');
		$this->load->model('doc_tarif_gaji_user');
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
			redirect('auth/siswa');
		}
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function slip_gaji()
	{
//		query getAll model
		$data['page'] = 'slip_gaji';
		$this->load->view('template', $data);
	}
}
