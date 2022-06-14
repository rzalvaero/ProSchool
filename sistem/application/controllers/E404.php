<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class E404 extends CI_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->library('user_agent');
		$this->load->helper('captcha');
	}
	
	function index()
    {
       $this->load->view('error404');
    }
}
	