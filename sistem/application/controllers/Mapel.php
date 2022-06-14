<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

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
		$data['page']  	= 'mapel';
		$data['dropdown']	= $this->core->selectunit();
		$data['mapel']  = $this->db->query("SELECT SMP.* , WU.nama as mp_unit FROM sr_mata_pelajaran SMP 
		LEFT JOIN web_unit WU on WU.id = SMP.unit")->result_array();
		$this->load->view('template',$data, FALSE);
	}

	function add(){
		$kode 	  		= $this->input->post('kode');
		$mapel 	  		= $this->input->post('mapel');
		$unit 	  		= $this->input->post('unit');
		$check_code = $this->db->query("SELECT * FROM sr_mata_pelajaran WHERE mp_kode = '$kode'");
		if (empty($kode) || empty($mapel)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
		redirect('mapel');
		} else if ($check_code->num_rows() <> 0) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Nama sudah terdaftar, Coba nama lain!
			</div>");
		redirect('mapel');
		} else {
			$data = array(
			'mp_kode'		=> $kode,
			'mp_nama' 		=> $mapel,
			'unit'	  		=> $unit
		);	
		$this->core->input_data($data,'sr_mata_pelajaran');
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Virtual Mata Pelajaran telah terdaftar, silahkan masuk room untuk memulai!
		</div>");
		redirect('mapel');
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
