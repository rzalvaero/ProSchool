<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prota extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		if(!$this->session->userdata('username'))
		{
        $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
        redirect('auth/login');
        }        
    }
	
	public function index()
	{
		$data['page']  			= 'prota';
		$data['unit']			= $this->core->selectunit();
		$data['tahunajaran']	= $this->core->selectahunajaran();
		$data['prota']  = $this->db->query("SELECT * FROM sr_prota ORDER BY id DESC")->result_array();
		$this->load->view('template',$data, FALSE);
	}

	function add(){
		$unit 		  		= $this->input->post('unit');
		$semester 	  		= $this->input->post('semester');
		$alokasi 	  		= $this->input->post('alokasi');
		$pengetahuan   		= $this->input->post('pengetahuan');
		$keterampilan  		= $this->input->post('keterampilan');
		$keterangan  		= $this->input->post('keterangan');
		if (empty($unit) || empty($semester) || empty($alokasi)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
		redirect('prota');
		} else {
			$data = array(
			'semester'			=> $semester,
			'pengetahuan' 		=> $pengetahuan,
			'keterampilan'		=> $keterampilan,
			'waktu' 			=> $alokasi,
			'ket' 				=> $keterangan,
			'unit'	  			=> $unit
		);	
		$this->core->input_data($data,'sr_prota');
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Prota telah terdaftar, silahkan memasukan prota lain nya!
		</div>");
		redirect('prota');
		}
	}
	
	function deletes($id){
			 $this->db->where('idmata_pelajaran',$id);
			 $query 		 = $this->db->get('sr_mata_pelajaran');
			 $row 			 = $query->row();
			 $this->db->delete('sr_mata_pelajaran', array('idmata_pelajaran' => $id));
             $this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-danger' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			  Berhasil Dihapus!
			 </div>");
			redirect('mapel');
	}
	
	function edit($id)
	{
		
			$where = array('idmata_pelajaran' => $id);
			$data['page']  	= 'edit_matapelajaran';
			$data['edit'] = $this->core->edit($where,'sr_mata_pelajaran')->result();
			$this->load->view('template_list',$data, FALSE);
	}
	
	function edited(){
		$id 	= $this->input->post('id');
		$kode 	= $this->input->post('kode');
		$nama	= $this->input->post('nama');

		$data = array(
			'mp_kode' => $kode,
			'mp_nama' => $nama,
		);

		$where = array(
			'idmata_pelajaran' => $id
		);
		$this->core->update($where,$data,'sr_mata_pelajaran');
		//logs
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Selamat data Mapel anda telah di update!
		</div><br/><br/>");
		redirect('mapel');
	}
}
