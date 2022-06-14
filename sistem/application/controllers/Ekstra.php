<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstra extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		$this->load->model('doc_ekstra');
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
	public function ekstra()
	{
//		query getAll model
		$data['list'] = $this->doc_ekstra->getAll();
		$data['page']  	= 'ekstra';
		$this->load->view('template',$data);
	}
	public function setting_ekstra_update($id = null)
	{
		$product = $this->doc_ekstra;
		$product->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");
		redirect('ekstra/ekstra');
	}
	public function save_ektra()
	{
		$tunjangan = $this->doc_ekstra;
		$tunjangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('ekstra/ekstra');
	}

	public function delete_ekstra()
	{
		$id_setting_tunjangan = $this->input->post('idekstra');

//		dump die id pajak
		$this->doc_ekstra->delete($id_setting_tunjangan);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('ekstra/ekstra');
	}
}
