<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		
		$sqlintro									= "SELECT * FROM cms_introduction WHERE id='1'";
		$row_intro									= $this->db->query($sqlintro)->row();
		$data['deskripsi'] 							= $row_intro->deskripsi;
		
		$sqlguru									= "SELECT count(id) as jumlah_guru FROM users";
		$row_guru									= $this->db->query($sqlguru)->row();
		$data['jumlah_guru']						= $row_guru->jumlah_guru;
		
		$sqlsiswa									= "SELECT count(idsiswa) as jumlah_siswa FROM sr_siswa";
		$row_siswa									= $this->db->query($sqlsiswa)->row();
		$data['jumlah_siswa']						= $row_siswa->jumlah_siswa;
		
		$data['lembaga'] = $this->db->query("SELECT * FROM web_sekolah")->result_array();
		
		$data['alasan'] = $this->db->query("SELECT * FROM cms_alasan")->result_array();
		$data['beasiswa'] = $this->db->query("SELECT * FROM cms_beasiswa")->result_array();
		$data['ulasan'] = $this->db->query("SELECT * FROM cms_ulasan")->result_array();
		$data['staff'] = $this->db->query("SELECT first_name, last_name FROM users")->result_array();
		$this->load->view('home',$data);
	}
}
