<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('user_agent');
		$this->load->helper('captcha');
	}

	function kepo($data)
	{
		$filter  	= strip_tags(htmlspecialchars(($data), ENT_QUOTES));
		$string   = preg_replace("/[^a-zA-Z0-9]/", "", $filter);
		$trim     = trim($string);
		$getext  	= str_replace(" ", "", $trim);
		return $getext;
	}

	function index()
	{
		//$this->load->view('login');
		if ($this->session->userdata('username') == TRUE) {
			redirect('dashboard');
			//redirect(base_url());
		} else {
			$this->load->view('auth-admin');
		}
	}

	function login_akses()
	{
		$post_username 	= trim($this->input->post('username'));
		$post_password 	= trim($this->input->post('password'));
		$check_admin    = $this->db->query("SELECT * FROM admin WHERE username = '$post_username'");
		$rowadmin 	   	= $check_admin->row_array();
		$password		= $rowadmin['password'];
		$verify = password_verify($post_password, $password);
		//die(print_r($verify));
		if (empty($post_username) || empty($post_password)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='margin:15px 0px -15px 0px;'>
			Mohon mengisi semua input.
			</div><br/>");
			redirect('admin');
		} else if ($post_password <> $verify) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='margin:15px 0px -15px 0px;'>
			Password salah.
			</div><br/>");
			redirect('admin');
		} else {
			$session['first_name']	 = $rowadmin['nama'];
			$session['email']	 	 = $rowadmin['email'];
			$session['username']	 = $rowadmin['username'];
			$session['type_users'] 	 = "ADMIN";
			//die(print_r($session));
			$this->session->set_userdata($session);
			$this->session->set_userdata('is_admin_login', true);
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
			Selamat datang admin!
			</div>");
			redirect('dashboard');
		}
	}
}
