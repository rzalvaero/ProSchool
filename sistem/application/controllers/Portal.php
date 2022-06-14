<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('core');
		$this->load->library('pdf');
	}

    function index()
	{
		$data['portal'] = '';
        $this->load->view('ppdb/home', $data);
	}

	function thanks()
	{
		$data['thanks'] = '';
        $this->load->view('ppdb/thanks', $data);
	}

}