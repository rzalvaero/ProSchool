<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->load->model('core');
    }
	
	public function duitku()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->view('get/duitku');
	}
}
