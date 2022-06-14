<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$sqlsetting									= "SELECT * FROM web_setting WHERE id='1'";
		$row_setting								= $this->db->query($sqlsetting)->row();
		$data['email'] 								= $row_setting->email;
		$data['whatsapp']							= $row_setting->whatsapp;
		$data['title'] 								= $row_setting->title;
		$data['tahun_ajaran'] 						= $row_setting->tahun_ajaran;
		$data['description'] 						= $row_setting->description;
		$data['alamat'] 							= $row_setting->alamat;
		$data['phone'] 								= $row_setting->phone;
		$data['lembaga'] = $this->db->query("SELECT * FROM web_sekolah")->result_array();
		
		$this->load->view('kontak',$data);
	}
}
