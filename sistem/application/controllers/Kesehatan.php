<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesehatan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		$this->load->model('doc_kesehatan');
		$this->load->model('doc_butir_sikap');
		$this->load->model('doc_tarif_gaji_user');
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
			redirect('auth/siswa');
		}
		$this->load->helper('url');
		$this->load->library('form_validation');
	}
	public function kesehatan()
	{
//		query getAll model
		$data['list'] = $this->doc_kesehatan->getAll();
		$data['page']  	= 'kesehatan';
		$this->load->view('template',$data);
	}
	public function setting_kesehatan_update($id = null)
	{
		$product = $this->doc_kesehatan;
		$product->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");
		redirect('kesehatan/kesehatan');
	}
	public function save_kesehatan()
	{
		$tunjangan = $this->doc_kesehatan;
		$tunjangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('kesehatan/kesehatan');
	}

	public function delete_kesehatan()
	{
		$id_setting_tunjangan = $this->input->post('idkesehatan');

//		dump die id pajak
		$this->doc_kesehatan->delete($id_setting_tunjangan);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('kesehatan/kesehatan');
	}
	

}
