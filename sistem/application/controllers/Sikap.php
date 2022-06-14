<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sikap extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		$this->load->model('doc_sikap');
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
	public function setting_sikap()
	{
//		query getAll model
		$data['list'] = $this->doc_sikap->getAll();
		$data['page']  	= 'setting_sikap';
		$this->load->view('template',$data);
	}

	public function setting_sikap_update($id = null)
	{
		$product = $this->doc_sikap;
		$product->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");
		redirect('sikap/setting_sikap');
	}
	public function save_setting_sikap()
	{
		$tunjangan = $this->doc_sikap;
		$tunjangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('sikap/setting_sikap');
	}

	public function delete_setting_sikap()
	{
		$id_setting_tunjangan = $this->input->post('id_sikap');

//		dump die id pajak
		$this->doc_sikap->delete($id_setting_tunjangan);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('sikap/setting_sikap');
	}
	public function sikap()
	{
//		query getAll model
		$data['list'] = $this->doc_butir_sikap->getAll();
		$data['page']  	= 'sikap';
		$this->load->view('template',$data);
	}
	public function save_sikap()
	{
		$tunjangan = $this->doc_butir_sikap;
		$tunjangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('sikap/sikap');
	}

	public function sikap_update($id = null)
	{
		$product = $this->doc_butir_sikap;
		$product->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");
		redirect('sikap/sikap');
	}
	public function delete_sikap()
	{
		$id_setting_tunjangan = $this->input->post('idbutir_sikap');
//		dump die id pajak
		$this->doc_butir_sikap->delete($id_setting_tunjangan);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('sikap/sikap');
	}

}
