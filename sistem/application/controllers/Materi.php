<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		//$this->load->helper('ratelimit');
		//limitRequests($this->input->ip_address());
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['page'] 				 	= 'materi';
		$data['selectkelas']			= $this->core->selectkelas();
		$data['selectmatapelajaran']	= $this->core->selectmatapelajaran();
		$data['selectunit']				= $this->core->selectunit();
		$data['materi']  = $this->db->query("SELECT SM.*, SMP.mp_nama, SK.k_romawi, WU.nama as namaunit FROM sr_materi SM 
		LEFT JOIN sr_kelas SK on SK.idkelas = SM.id 
		LEFT JOIN sr_mata_pelajaran SMP on SMP.idmata_pelajaran = SM.mapel_id
		LEFT JOIN web_unit WU on WU.id = SM.unit")->result_array();
		$this->load->view('template', $data, FALSE);
	}

	public function manage()
	{
		$data['page']  					= 'materi_manage';
		$data['selectkelas']			= $this->core->selectkelas();
		$data['selectmatapelajaran']	= $this->core->selectmatapelajaran();
		$data['materi_manage']  = $this->db->query("SELECT SM.*, SK.k_romawi FROM sr_materi SM LEFT JOIN sr_kelas SK on SK.idkelas = SM.kelas_id")->result_array();
		//$this->load->view('siswa',$data);
		$this->load->view('template_list', $data, FALSE);
	}

	function deletes($id)
	{
		/* if ($id == '1') {
			  $this->session->set_flashdata("msg", "<div class='alert alert-danger'>
			  Anda tidak bisa menghapus Admin
			  </div>");
			  redirect('dashboard'); 
		}else{ */
		$this->db->where('id', $id);
		$query 		 = $this->db->get('sr_materi');
		$row 			 = $query->row();
		$this->db->delete('sr_materi', array('id' => $id));


		/* $username   	 = $this->session->userdata('username');
			 $ip			 = $this->input->ip_address();
			 $log =	array(	'username' 	 => $username ,
							'datestamp'	 => date("Y-m-d H:i:s"),
							'note'	 	 => 'Anda telah menghapus Users ID - '.$id.''
						  );
			 $this->db->insert('log',$log); */
		$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-danger' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			  Berhasil Dihapus!
			  </div>");
		redirect('materi/manage');
		//}
	}

	function adding()
	{
		$this->load->library('upload'); // not sure if you already autoloaded this
		$upconfig['upload_path'] = './assets/doc/materi/'; // missing end slash
		$upconfig['allowed_types'] = 'jpg|png|pdf|jpeg|csv|xls|xlsx|gif|doc|docx';
		$upconfig['encrypt_name'] = FALSE;
		$this->upload->initialize($upconfig);
		if (!empty($_FILES['files']['name'])) {
			if ($this->upload->do_upload('files')) {
				$filename = $this->upload->data('file_name');
				$tipe_doc = $_FILES['files']['type'];
				$bytes = $_FILES['files']['size'];
				if ($bytes >= 1073741824) {
					$bytes = number_format($bytes / 1073741824, 2) . ' GB';
				} elseif ($bytes >= 1048576) {
					$bytes = number_format($bytes / 1048576, 2) . ' MB';
				} elseif ($bytes >= 1024) {
					$bytes = number_format($bytes / 1024, 2) . ' KB';
				} elseif ($bytes > 1) {
					$bytes = $bytes . ' bytes';
				} elseif ($bytes == 1) {
					$bytes = $bytes . ' byte';
				} else {
					$bytes = '0 bytes';
				}
				$size_doc = $bytes;
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = $this->upload->data('full_path');
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '100%';
				$this->load->library('image_lib');
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				if (!$this->image_lib->resize()) {
					echo $this->image_lib->display_errors();
					exit;
				}

				$mapel_id 		= $this->input->post('mapel_id');
				$kelas_id		= $this->input->post('kelas_id');
				$judul			= $this->input->post('judul');
				$unit			= $this->input->post('unit');
				$tgl_posting	= date("Y-m-d H:i:s");

				$data = array(
					'unit'	=> $unit,
					'mapel_id' => $mapel_id,
					'kelas_id' => $kelas_id,
					'judul' => $judul,
					'pengajar_id' => "",
					//'siswa_id' => "",
					'file' => $filename,
					'tgl_posting' => $tgl_posting,
					'publish' => 1
				);
				//die(print_r($data));
				$insert_id = $this->core->input_data($data, 'sr_materi');
				$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
				Materi telah terdaftar!
				</div><br/>");
				redirect('materi');

				//JIKA ERROR
			} else {
				echo $this->upload->display_errors();
				exit;
			}
		} else {

			$mapel_id 		= $this->input->post('mapel_id');
			$kelas_id		= $this->input->post('kelas_id');
			$judul			= $this->input->post('judul');
			$unit			= $this->input->post('unit');
			
			$tgl_posting	= date("Y-m-d H:i:s");
			$str			= $this->input->post('url');
			$prefix 		= 'https://www.youtube.com/watch?v=';
		
			if($prefix 		= "https://www.youtube.com/watch?v="){
				if (substr($str, 0, strlen($prefix)) === $prefix) {
					$url2 = substr($str, strlen($prefix));
				}
			}
			if (empty($url2)) {
				$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
				Maaf url yang anda masukan kosong, silahkan copy url yang ada dibagian atas!
				</div><br/>");
				redirect('materi');
			}else{
			$data = array(
				'unit' => $unit,
				'mapel_id' => $mapel_id,
				'kelas_id' => $kelas_id,
				'judul' => $judul,
				'pengajar_id' => "",
				//'siswa_id' => "",
				'video' => $url2,
				'tgl_posting' => $tgl_posting,
				'publish' => 1
			);
			//die(print_r($data));
			$insert_id = $this->core->input_data($data, 'sr_materi');
			$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Virtual Meeting telah terdaftar, silahkan masuk room!
			</div><br/>");
			redirect('materi');
			}
		}
	}
}
