<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');   
    }

	function index()
	{
		$this->load->view('tamu');
	}

	function data()
	{
		$data['page'] 	 	= 'tamu';
		$type = $this->session->userdata('type_users');
		$unit = $this->session->userdata('unit');
		if($type=="ADMIN"){
			$data['tamu']    	= $this->db->query("SELECT SG.*, WU.nama as unit FROM sr_guestbook SG left join web_unit WU on WU.id = SG.unit")->result_array();
		} elseif ($type=="GURU") {
    		$data['tamu']    	= $this->db->query("SELECT SG.*, WU.nama as unit FROM sr_guestbook SG left join web_unit WU on WU.id = SG.unit WHERE SG.unit='$unit'")->result_array();
        } else {
			redirect('dashboard');
		}
		$this->load->view('template',$data);
	}

	function terima($id)
	{
		$sqltamu									= "SELECT * FROM sr_guestbook";
		$row_tamu									= $this->db->query($sqltamu)->row();
		$user_name 									= $row_tamu->user_name;
		$user_email									= $row_tamu->user_email;
		$user_visit									= $row_tamu->user_visit;
		$user_phone									= $row_tamu->user_phone;
		$user_created								= $row_tamu->user_created;
		$post_subject 								= "Permintaan Kunjungan | Diterima";
		//$post_status 								= "Ditolak";
		$status 									= 'Diterima';

		$datamail = array(
			'user_name'		=> $user_name,
			'user_email' 	=> $user_email,
			'user_visit' 	=> $user_visit,
			'user_phone' 	=> $user_phone,
			'user_created'	=> $user_created,
			'status'		=> $status,
		);

		$this->load->library('email');
		$config = array();
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'Codeigniter';
		$config['protocol'] = "smtp";
		$config['mailtype'] = "html";
		$config['smtp_host'] = "ssl://mail.proschool.id"; //"mail.1tenda.com";
		$config['smtp_port'] = "465";
		$config['smtp_timeout'] = "400";
		$config['smtp_user'] = "noreply@proschool.id"; //"techpresently99@gmail.com";
		$config['smtp_pass'] = "@Komputer7"; // "komputer7"; 
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;
		//memanggil library email dan set konfigurasi untuk pengiriman email
		$this->email->initialize($config);
		//konfigurasi pengiriman
		
		$this->email->from($config['smtp_user']);
		$this->email->to($user_email);
		$this->email->subject($post_subject);
		$body = $this->load->view('rezalibs.php', $datamail, TRUE);
		$this->email->message($body);
		$this->email->send();

		$data['approve'] = '1';//hold
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('sr_guestbook', $data);
		$this->db->trans_complete();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Anda telah menerima tamu tersebut!
		</div><br/><br/>");
		redirect('tamu/data');
	}

	function tolak($id)
	{
		$sqltamu									= "SELECT * FROM sr_guestbook";
		$row_tamu									= $this->db->query($sqltamu)->row();
		$user_name 									= $row_tamu->user_name;
		$user_email									= $row_tamu->user_email;
		$user_visit									= $row_tamu->user_visit;
		$user_phone									= $row_tamu->user_phone;
		$user_created								= $row_tamu->user_created;
		$post_subject 								= "Permintaan Kunjungan | Ditolak";
		//$post_status 								= "Ditolak";
		$status 									= 'Ditolak';

		$datamail = array(
			'user_name'		=> $user_name,
			'user_email' 	=> $user_email,
			'user_visit' 	=> $user_visit,
			'user_phone' 	=> $user_phone,
			'user_created'	=> $user_created,
			'status'		=> $status,
		);

		$this->load->library('email');
		$config = array();
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'Codeigniter';
		$config['protocol'] = "smtp";
		$config['mailtype'] = "html";
		$config['smtp_host'] = "ssl://mail.proschool.id"; //"mail.1tenda.com";
		$config['smtp_port'] = "465";
		$config['smtp_timeout'] = "400";
		$config['smtp_user'] = "noreply@proschool.id"; //"techpresently99@gmail.com";
		$config['smtp_pass'] = "@Komputer7"; // "komputer7"; 
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;
		//memanggil library email dan set konfigurasi untuk pengiriman email
		$this->email->initialize($config);
		//konfigurasi pengiriman
		
		$this->email->from($config['smtp_user']);
		$this->email->to($user_email);
		$this->email->subject($post_subject);
		$body = $this->load->view('rezalibs.php', $datamail, TRUE);
		$this->email->message($body);
		$this->email->send();

		$data['approve'] = '-1';//hold
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('sr_guestbook', $data);
		$this->db->trans_complete();
		$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Anda telah menolak tamu tersebut!
		</div><br/><br/>");
		redirect('tamu/data');
	}

	function adding()
	{
		$unit	 	  		    = $this->input->post('unit');
		$user_name 	  		    = $this->input->post('nama');
		$user_email 	  		= $this->input->post('email');
		$user_phone 	      	= $this->input->post('phone');
		$user_visit             = $this->input->post('date');
		$user_created           = date("Y-m-d H:i:s"); // Mendapatkan tanggal sekarang
		$post_subject 			= "Permintaan Kunjungan";
		$status			 		= 'Menunggu';
		//die(print_r($email));
		if (empty($unit) || empty($user_name) || empty($user_email)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('tamu');
		} else {
			$data = array(
				'unit'			=> $unit,
				'user_name'		=> $user_name,
				'user_email' 	=> $user_email,
				'user_visit' 	=> $user_visit,
				'user_phone' 	=> $user_phone,
				'user_created'	=> $user_created,
				'user_ip'		=> $this->input->ip_address(),
				'user_os'	    => $this->agent->platform(),
				'user_browser'	=> $this->agent->version(),
			);
			$this->core->input_data($data, 'sr_guestbook');

			$datamail = array(
				'user_name'		=> $user_name,
				'user_email' 	=> $user_email,
				'user_visit' 	=> $user_visit,
				'user_phone' 	=> $user_phone,
				'user_created'	=> $user_created,
				'status'		=> $status,
			);
			$this->load->library('email');
			$config = array();
			$config['charset'] = 'utf-8';
			$config['useragent'] = 'Codeigniter';
			$config['protocol'] = "smtp";
			$config['mailtype'] = "html";
			$config['smtp_host'] = "ssl://mail.proschool.id"; //"mail.1tenda.com";
			$config['smtp_port'] = "465";
			$config['smtp_timeout'] = "400";
			$config['smtp_user'] = "noreply@proschool.id"; //"techpresently99@gmail.com";
			$config['smtp_pass'] = "@Komputer7"; // "komputer7"; 
			$config['crlf'] = "\r\n";
			$config['newline'] = "\r\n";
			$config['wordwrap'] = TRUE;
			//memanggil library email dan set konfigurasi untuk pengiriman email
			$this->email->initialize($config);
			//konfigurasi pengiriman
			
			$this->email->from($config['smtp_user']);
			$this->email->to($user_email);
			$this->email->subject($post_subject);
			$body = $this->load->view('rezalibs.php', $datamail, TRUE);
			$this->email->message($body);
			$this->email->send();
			$this->session->set_flashdata("msg", "<br/><div class='alert alert-success' role='alert' style='color:red;'>
				Selamat, Kami telah menerima permintaan kunjungan anda!
			</div>");
			redirect('tamu');
		}
	}
}
