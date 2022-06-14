<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
        redirect('auth/siswa');
        }        
    }
    
	public function index()
	{	
        $id = $this->session->userdata('id');
        $date = date("Y-m-d");
		if($this->session->userdata('type_users')=="GURU"){
			$data['page']  	= 'profile_guru';
			$data['selectkelas']			= $this->core->selectkelas();
			$data['selectmatapelajaran']			= $this->core->selectmatapelajaran();
			$data['detail']  = $this->db->query("SELECT SU.*, US.email, US.phone, US.first_name, US.last_name, WU.nama as unit,SJ.nama_jabatan FROM users US 
			LEFT JOIN web_unit WU on WU.id      = US.unit
			LEFT JOIN sr_users SU on SU.idusers = US.id 
			LEFT JOIN sr_jabatan SJ on SJ.id_jabatan = SU.u_tugas_tambahan 
			WHERE SU.idusers = '$id'")->result_array();
			$data['kelas']  = $this->db->query("SELECT SK.k_romawi, SK.k_keterangan FROM sr_kelas_guru SKG 
			LEFT JOIN users US ON US.id = SKG.idusers
			LEFT JOIN sr_kelas SK ON SK.idkelas = SKG.idkelas 
			WHERE US.id = '$id';")->result_array();
			$data['mapel']  = $this->db->query("SELECT SMP.* FROM sr_mata_pelajaran_guru SMPG
			LEFT JOIN sr_mata_pelajaran SMP on SMP.idmata_pelajaran = SMPG.idmata_pelajaran
			LEFT JOIN users US on US.id = SMPG.idusers 
			WHERE US.id = '$id';")->result_array();
			$this->load->view('template',$data);
		} else {
			$data['page']  	= 'profile_siswa';
			$data['detail']  = $this->db->query("SELECT SRS.* , WU.nama as nama_sekolah, SK.k_romawi, SK.k_keterangan FROM sr_siswa SRS
			LEFT JOIN web_unit WU on WU.id      = SRS.unit
			LEFT JOIN sr_kelas SK on SK.idkelas = SRS.idkelas
			WHERE SRS.idsiswa = '$id'")->result_array();
			$this->load->view('template',$data);
		}
	}

	public function setting()
	{	
        $id = $this->session->userdata('id');
        //$date = date("Y-m-d");
		if($this->session->userdata('type_users')=="GURU"){
			$data['page']  	= 'setting_guru';
			$data['province']=$this->core->get_provinsi();
			$where1 = array('id' => $id );
			$where2 = array('idusers' => $id );
			$data['setting_us'] = $this->core->edit($where1,'users')->result();
			$data['setting_su'] = $this->core->edit($where2,'sr_users')->result();
			$this->load->view('template',$data);
		} elseif ($this->session->userdata('type_users')=="ADMIN"){
			$data['page']  	= 'setting_guru';
			$data['province']=$this->core->get_provinsi();
			$where1 = array('id' => $id );
			$where2 = array('idusers' => $id );
			$data['setting_us'] = $this->core->edit($where1,'users')->result();
			$data['setting_su'] = $this->core->edit($where2,'sr_users')->result();
			$this->load->view('template',$data);
		} else {
			$data['page']  	= 'setting_siswa';
			$where = array('idsiswa' => $id );
			$data['setting'] = $this->core->edit($where,'sr_siswa')->result();
			$this->load->view('template',$data);
		}
	}

	function get_subprovinsi(){
        $id=$this->input->post('id');
        $data=$this->core->get_subprovinsi($id);
        echo json_encode($data);
    }


	function update(){
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		
		if($type=="siswa"){
			$name = $this->input->post('name');
			$gender = $this->input->post('gender');
			$dob = $this->input->post('dob');
			$nik = $this->input->post('nik');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$parent = $this->input->post('parent');
			$data = array(
				's_nama' 			=> $name,
				's_jenis_kelamin' 	=> $gender,
				's_tanggal_lahir'	=> $dob,
				's_nik' 			=> $nik,
				's_email'			=> $email,
				's_telepon'			=> $phone,
				's_wali' 			=> $parent
			);
			$where = array(
				'idsiswa' => $id
			);
			$this->core->update($where,$data,'sr_siswa');
			$data	=	
			array(		'type' 	  	=> "siswa",
						'idusers' 	=> $this->session->userdata('id'),
						'datestamp' => date("Y-m-d H:i:s"),
						'note'		=> 'Anda merubah data Profile'
			  	);
			$this->db->insert('web_log',$data);
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
			Success update data Profile!
			</div><br/>");
			redirect('siswa');
		} else {
			//user
			$first = $this->input->post('first');
			$last = $this->input->post('last');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			//sr_user
			$npwp = $this->input->post('npwp');
			$gender = $this->input->post('gender');
			$dob = $this->input->post('dob');
			$address = $this->input->post('address');
			$perguruan_tinggi = $this->input->post('perguruan_tinggi');
			$jurusan = $this->input->post('jurusan');
			$lulus = $this->input->post('lulus');
			$sertifikasi = $this->input->post('sertifikasi');
			$u_nbm_nip = $this->input->post('u_nbm_nip');
			$u_nuptk_nuks = $this->input->post('u_nuptk_nuks');
			$jenjang = $this->input->post('jenjang');
			$jabatan = $this->input->post('jabatan');
			$status = $this->input->post('status');
			$province = $this->input->post('province');
			$kota = $this->input->post('kota');
			$data = array(
				'first_name'		=> $first,
				'last_name' 		=> $last,
				'phone'				=> $phone,
				'email' 			=> $email
			);
			$where = array(
				'id' => $id
			);
			$this->core->update($where,$data,'users');
			$data2 = array(
				'u_jenis_kelamin'	=> $gender,
				'u_tanggal_lahir'	=> $dob,
				'u_perguruan_tinggi'=> $perguruan_tinggi,
				'u_jurusan'			=> $jurusan,
				'u_tahun_lulus'		=> $lulus,
				'u_jenjang'			=> $jenjang,
				'u_sertifikasi'		=> $sertifikasi,
				'u_tl_idprovinsi'	=> $province,
				'u_tl_idkota'		=> $kota,
				'u_nuptk_nuks'		=> $u_nuptk_nuks,
				'u_nbm_nip'			=> $u_nbm_nip,
				'u_npwp'			=> $npwp,
				'u_tugas_tambahan'			=> $jabatan,
				'u_alamat_tinggal'	=> $address,
				'status'	=> $status
			);
			$where2 = array(
				'idusers' => $id
			);
			$this->core->update($where2,$data2,'sr_users');
		}

		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Success update data Profile!
		</div><br/>");
		if($this->session->userdata('type_users')=="ADMIN"){
			//redirect('kepegawaian/add_kepegawaian');
			redirect('guru');
		}else{
			redirect('guru');
		}
		
	}
}
