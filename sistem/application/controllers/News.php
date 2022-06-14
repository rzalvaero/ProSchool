<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
			redirect('auth/siswa');
		}
	}

	public function index()
	{
		$data['page']  	= 'berita';
		//$data['pengumuman']  = $this->db->query("SELECT * FROM sr_pengumuman")->result_array();
		$curl = curl_init();
		$date = date("Y-m-d");
		curl_setopt_array($curl, array(
		  //TOP HEADLINES
		  //CURLOPT_URL => "https://newsapi.org/v2/top-headlines?country=id&category=health&apiKey=f56a3e341cff41b985a00d07fe345e27",
		  //ALL BERITA
		  CURLOPT_URL => "https://newsapi.org/v2/everything?q=education&from='.$date.'&sortBy=publishedAt&apiKey=f56a3e341cff41b985a00d07fe345e27",
		  
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"authorization: Basic YWRtaW46a29tcHV0ZXJ5",
			"cache-control: no-cache",
			"postman-token: 208f2be9-bdbe-4f8e-d4af-fc8fbef347f0"
		  ),
		));
		
		$response = curl_exec($curl);
		//$err = curl_error($curl);

		curl_close($curl);
		$result = json_decode($response, true);
		$data['pengumuman'] = $result['articles']; 
		//$urlnya = "https://newsapi.org/v2/everything?from=".$date."&sortBy=publishedAt&apiKey=f56a3e341cff41b985a00d07fe345e27";
		//die(print_r($response));
		$this->load->view('template', $data);
	}


}
