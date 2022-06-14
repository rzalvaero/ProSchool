<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meet extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		//$this->load->helper('ratelimit');
        //limitRequests($this->input->ip_address());
		if(!$this->session->userdata('username'))
		{
        $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
        redirect('auth/siswa');
        }        
    }
	
	public function index()
	{
		$data['page'] 	 	= 'virtual';
		$data['dropdown']	= $this->core->selectkelas();
		$type = $this->session->userdata('type_users');
		$unit = $this->session->userdata('unit');
		//die(print_r($type));
		if($type=="SISWA"){
			$idkelas		 	= $this->session->userdata('idkelas');
			$data['meet']    	= $this->db->query("SELECT VC.*, SK.k_romawi as nama_kelas FROM sr_virtualclass VC LEFT JOIN sr_kelas SK on SK.idkelas = VC.kelas_id WHERE SK.idkelas = '$idkelas' AND SK.unit = '$unit' ")->result_array();
		} else {
			$data['meet']    	= $this->db->query("SELECT VC.*, SK.k_romawi as nama_kelas FROM sr_virtualclass VC LEFT JOIN sr_kelas SK on SK.idkelas = VC.kelas_id WHERE SK.unit = '$unit'")->result_array();
		}
		$this->load->view('template',$data, FALSE);
	}
	
	function random($length) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
		}
		return $str;
	}
	
	function add(){
		$kelas 	  		= $this->input->post('kelas');
		$title 	  		= $this->input->post('title');
		$date 	  		= $this->input->post('date');
		$url			= "https://meet.jit.si/";
		$pascode 		= $this->random(5);
		$code			= $url.$pascode;
		$unit 			= $this->session->userdata('unit');
		$check_code = $this->db->query("SELECT * FROM sr_virtualclass WHERE title = '$title'");
		if (empty($kelas) || empty($title)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
		redirect('meet');
		} else if ($check_code->num_rows() <> 0) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Nama sudah terdaftar, Coba nama lain!
			</div>");
		redirect('meet');
		} else {
			$data = array(
				'pengajar_id'	=> $this->session->userdata('id'),
				'kelas_id'		=> $kelas,
				'title' 		=> $title,
				'waktu'	  		=> $date,
				'unit'	  		=> $unit,
				'url' 			=> $code
				);	
			$this->core->input_data($data,'sr_virtualclass');
			$data2 = array(
				'created'		=> $this->session->userdata('id'),
				'kelas_id'		=> $kelas,
				'title' 		=> $title,
				'waktu'	  		=> $date,
				'unit'	  		=> $unit,
				'url' 			=> $code
				);	
			$this->core->input_data($data2,'web_calender');
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Virtual Meeting telah terdaftar, silahkan masuk room untuk memulai!
		</div>");
		redirect('meet');
		}
	}
	
	function deletes($id){
			$this->db->where('id',$id);
			$query 		 = $this->db->get('sr_virtualclass');
			$row 			 = $query->row();
			$this->db->delete('sr_virtualclass', array('id' => $id));
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			  Berhasil Dihapus!
			  </div>");
			redirect('meet');	
	}
	
	function edit($id)
	{
		
			$where = array('id' => $id);
			$data['page']  	= 'edit_meet';
			$data['edit'] = $this->core->edit($where,'sr_virtualclass')->result();
			$this->load->view('template_list',$data, FALSE);
	}
	
	function edited(){
		$id 	= $this->input->post('id');
		$judul 	= $this->input->post('judul');
		$url	= $this->input->post('url');

		$data = array(
			'title' => $judul,
			'url' => $url,
		);

		$where = array(
			'id' => $id
		);
		$this->core->update($where,$data,'sr_virtualclass');
		//logs
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Selamat data Profile anda telah di update!
		</div><br/><br/>");
		redirect('meet');
	}
	
}