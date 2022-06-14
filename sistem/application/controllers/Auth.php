<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->library('user_agent');
		$this->load->helper('captcha');
	}
	
	function create_captcha()
	{
		$data = array(
			'img_path'      => 'assets/',
			'img_url'       => base_url().'assets/',
			'img_width'     => '150',
			'img_height'    => 50,
			'word_length'   => 5,
			'font_size'     => 16,
			'colors' => array(
				'background' => array(255, 255, 255),
				'border' => array(0, 0, 0),
				'text' => array(0, 0, 0),
				'grid' => array(255, 40, 40)
			  )

		);

		$captcha = create_captcha($data);
		$image = $captcha['image'];

		$this->session->set_userdata('captchaword', $captcha['word']);

		return $image;
	}
	
	function check_captcha()
	{
		if($this->input->post('captcha') == $this->session->userdata('captchaword')){

			return true;
		
		} else {

			$this->form_validation->set_message('check_captcha', 'Captcha tidak sama');

			return false;
		}
	}

	function kepo($data){
	  $filter  	= strip_tags(htmlspecialchars(($data),ENT_QUOTES));
      $string   = preg_replace("/[^a-zA-Z0-9]/", "", $filter);
	  $trim     = trim($string);
	  $getext  	= str_replace(" ", "", $trim);
	  return $getext;
    }
	
	function login_akses()
	{
		$type		= $this->input->post('type');
		$ip			= $this->input->ip_address();
		if($type=="1"){
		
			$date        	= date('d-m-y');
			$post_email		= $this->input->post('email');//$this->kepo($this->input->post('email',TRUE));
			$post_password	= $this->input->post('password');//$this->kepo($this->input->post('password',TRUE));

			//MENGAMBIL DATA USERNYA
			$sql ="SELECT * FROM users WHERE email = ?";
			$check_user    	= $this->db->query($sql, array($post_email));
			$rowuser 	   	= $check_user->row_array();
			$password		= $rowuser['password'];
			
			//die(print_r($check_user));
			
			$verify = password_verify($post_password, $password);
				  
			if (empty($post_email) || empty($post_password)) {
				$this->session->set_flashdata("msg", "<br><br><div class='alert alert-danger'>
						<b>Ooops!</b> Mohon masukan semua data Guru.
					</div>");
				redirect('auth/guru');
			} else if ($rowuser == 1) {
				$this->session->set_flashdata("msg", "<br><br><div class='alert alert-danger'>
				Email Guru tidak terdaftar.
				</div>");
				redirect('auth/guru');
			} else if ($post_password <> $verify) {
				$this->session->set_flashdata("msg", "<br><br><div class='alert alert-danger'>
				Password salah.
				</div>");
				redirect('auth/guru');
			} else {
				$session['id'] 	 		 = $rowuser['id'];
				$session['username']	 = $rowuser['email'];
				$session['email'] 	 	 = $rowuser['email'];
				$session['first_name'] 	 = $rowuser['first_name'];
				$session['last_name'] 	 = $rowuser['last_name'];
				$session['unit'] 		 = $rowuser['unit'];
				$session['type_users'] 	 = "GURU";
				$this->session->set_userdata($session);
				$this->session->set_userdata('is_member_login',true);
				$this->session->set_flashdata("msg", "<div class='alert alert-success'>
				anda telah berhasi login!
				</div>");
				$data	=	array(	'type' 	  	=> "guru",
									'unit' 		=> $this->session->userdata('unit'),
									'idusers' 	=> $session['id'],
									'datestamp' => date("Y-m-d H:i:s"),
									'note'		=> 'Anda melakukan login dengan "'.$ip.'"'
								  );
				$this->db->insert('web_log',$data);
				redirect('dashboard');
			}
			
		} else if ($type == "2") {
			
			$date        		= date('d-m-y');
			$username			= $this->input->post('username');//$this->kepo($this->input->post('email',TRUE));
			$post_password		= $this->input->post('password');//$this->kepo($this->input->post('password',TRUE));
			
			//MENGAMBIL DATA USERNYA
			$sql 			= "SELECT * FROM sr_siswa WHERE s_nisn = ?";
			$check_user    	= $this->db->query($sql, array($username));
			$rowuser 	   	= $check_user->row_array();
			$password		= $rowuser['s_nisn'];
			
			if (empty($username) || empty($post_password)) {
				$this->session->set_flashdata("msg", "<br><br><div class='alert alert-danger'>
						<b>Ooops!</b> Mohon masukan semua data siswa kak.
					</div>");
				redirect('auth/siswa');
			} else if ($rowuser == 1) {
				$this->session->set_flashdata("msg", "<br><br><div class='alert alert-danger'>
				Siswa tidak terdaftar.
				</div>");
				redirect('auth/siswa');
			} else if ($post_password <> $password) {
				$this->session->set_flashdata("msg", "<br><br><div class='alert alert-danger'>
				Password salah.
				</div>");
				redirect('auth/siswa');
			} else {
				$session['id']			 = $rowuser['idsiswa'];
				$session['first_name']	 = $rowuser['s_nama'];
				$session['s_nik'] 	 	 = $rowuser['s_nik'];
				$session['idkelas']	 	 = $rowuser['idkelas'];
				$session['username']	 = $rowuser['s_nisn'];
				$session['unit'] 		 = $rowuser['unit'];
				$session['type_users'] 	 = "SISWA";

				$sqlsiswa  				= "SELECT SK.k_romawi as nama_kelas FROM sr_siswa SR LEFT JOIN sr_kelas SK on SK.idkelas = SR.idkelas WHERE SR.idsiswa='".$rowuser['idsiswa']."'";
				$row_siswa				= $this->db->query($sqlsiswa)->row();
				$session['nama_kelas']	= $row_siswa->nama_kelas;

				$this->session->set_userdata($session);
				$this->session->set_userdata('is_member_login',true);
				$this->session->set_flashdata("msg", "<div class='alert alert-success'>
				anda telah berhasi login!
				</div>");
				$data	=	array(	'type' 	  	=> "siswa",
									'idusers' 	=> $session['id'],
									'datestamp' => date("Y-m-d H:i:s"),
									'note'		=> 'Anda melakukan login dengan "'.$ip.'"'
								  );
				$this->db->insert('web_log',$data);
				redirect('dashboard');
			}	
		//JIKA LOGIN GAGAL
		} else {	
			$this->session->set_flashdata("msg", "<div class='alert alert-danger'>
			Anda gagal login !
			</div>");
			redirect('auth/siswa');
			
		}
	}
	
	function siswa()
    {
       //$this->load->view('login');
		if($this->session->userdata('username') == TRUE){
            redirect('dashboard');
			//redirect(base_url());
        }else{ 
            $this->load->view('auth-siswa');
        }  
    }

	function guru()
    {
       //$this->load->view('login');
		if($this->session->userdata('username') == TRUE){
            redirect('dashboard');
			//redirect(base_url());
        }else{ 
            $this->load->view('auth-guru');
        }  
    }
	
	public function register()
	{
		$this->load->view('auth-signup');//,$data, FALSE);
	}
	
	function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata("msg", "<br><br><div class='alert alert-success'>
		Anda Berhasil Logout!
		</div>");
		redirect('auth/siswa');
	}
}
