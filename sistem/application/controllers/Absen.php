<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('core');
		$this->load->model('doc_penghuni');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
            Oh Snap, Maaf silakan login terlebih dahulu!
            </div>");
			redirect('auth/siswa');
		}
	}
	
	public function tanggal()
	{
	//$begin = new DateTime('2022-04-01');
	//$end = new DateTime('2022-04-30');
	$tgl_awal_bulan	= "1";
	$tgl_akhir_bulan= date('t');
	$bulan = date('Y-m');
	$begin1 = $bulan."-".$tgl_awal_bulan;
	$end1 = $bulan."-".$tgl_akhir_bulan;
	$begin = new DateTime($begin1);
	$end = new DateTime($end1);
	
	$daterange     = new DatePeriod($begin, new DateInterval('P1D'), $end);
	//mendapatkan range antara dua tanggal dan di looping
	$i=0;
	$x     =    0;
	$end     =    1;

	foreach($daterange as $date){
		$daterange     = $date->format("Y-m-d");
		$datetime     = DateTime::createFromFormat('Y-m-d', $daterange);

		//Convert tanggal untuk mendapatkan nama hari
		$day         = $datetime->format('D');

		//Check untuk menghitung yang bukan hari sabtu dan minggu
		if($day!="Sun" && $day!="Sat") {
			//echo $i;
			$x    +=    $end-$i;
			
		}
		$end++;
		$i++;
	}    
	echo "Jumlah hari selain hari libur adalah ".$x;
	}
	
	public function index()
	{
		$data['page'] 	 	= 'absen';
		$id = $this->session->userdata('id');
		$type = $this->session->userdata('type_users');
		
		$tgl_awal_bulan	= "1";
		$tgl_akhir_bulan= date('t');
		$bulan = date('Y-m');
		$begin1 = $bulan."-".$tgl_awal_bulan;
		$end1 = $bulan."-".$tgl_akhir_bulan;
		$begin = new DateTime($begin1);
		$end = new DateTime($end1);
		
		$daterange     = new DatePeriod($begin, new DateInterval('P1D'), $end);
		//mendapatkan range antara dua tanggal dan di looping
		$i=0;
		$x     =    0;
		$end     =    1;

	foreach($daterange as $date){
		$daterange     = $date->format("Y-m-d");
		$datetime     = DateTime::createFromFormat('Y-m-d', $daterange);

		//Convert tanggal untuk mendapatkan nama hari
		$day         = $datetime->format('D');

		//Check untuk menghitung yang bukan hari sabtu dan minggu
		if($day!="Sun" && $day!="Sat") {
			//echo $i;
			$x    +=    $end-$i;
			
		}
		$end++;
		$i++;
	}
		//die(print_r($x));
		
 		if ($type == "SISWA") {
			$bulannya = date('m');
			$sqlmasuk									= "SELECT COUNT(id_absen) as total FROM sr_absen WHERE type='$type' AND idusers='$id' AND DATE_FORMAT(tanggal_absen,'%m') = '$bulannya'";
			$row_masuk									= $this->db->query($sqlmasuk)->row();
			$data['hari_masuk']							= $row_masuk->total;
			$hari_kerja = $x - $data['hari_masuk'];
			$data['hari_kerja']							= $hari_kerja;
		} elseif ($type == "GURU") {
			$bulannya = date('m');
			$sqlmasuk									= "SELECT COUNT(id_absen) as total FROM sr_absen WHERE type='$type' AND idusers='$id' AND DATE_FORMAT(tanggal_absen,'%m') = '$bulannya'";
			$row_masuk									= $this->db->query($sqlmasuk)->row();
			$data['hari_masuk']							= $row_masuk->total;
			$hari_kerja = $x - $data['hari_masuk'];
			$data['hari_kerja']							= $hari_kerja;
		} else {
			$data['page'] 	 		= 'absen_kelas';
			$data['dropdown']		= $this->core->selectkelas();
			$data['selectunit']     = $this->core->selectunit();
			$type = $this->session->userdata('type_users');
			$unit = $this->session->userdata('unit');
			//die(print_r($type));
			$data['kelas']    	= $this->db->query("SELECT * FROM sr_kelas")->result_array();
		}
		$this->load->view('template', $data, FALSE);
	}
	
	public function siswa($value="")
	{
		$data['page'] 	 	= 'absen_siswa';
		$id = $this->session->userdata('id');
		$type = $this->session->userdata('type_users');
		
		$tgl_awal_bulan	= "1";
		$tgl_akhir_bulan= date('t');
		$bulan = date('Y-m');
		$begin1 = $bulan."-".$tgl_awal_bulan;
		$end1 = $bulan."-".$tgl_akhir_bulan;
		$begin = new DateTime($begin1);
		$end = new DateTime($end1);
		
		$daterange     = new DatePeriod($begin, new DateInterval('P1D'), $end);
		//mendapatkan range antara dua tanggal dan di looping
		$i=0;
		$x     =    0;
		$end     =    1;

	foreach($daterange as $date){
		$daterange     = $date->format("Y-m-d");
		$datetime     = DateTime::createFromFormat('Y-m-d', $daterange);

		//Convert tanggal untuk mendapatkan nama hari
		$day         = $datetime->format('D');

		//Check untuk menghitung yang bukan hari sabtu dan minggu
		if($day!="Sun" && $day!="Sat") {
			//echo $i;
			$x    +=    $end-$i;
			
		}
		$end++;
		$i++;
	}
		//die(print_r($x));
		
 		if ($type == "SISWA") {
			redirect('dashboard');
		} elseif ($type == "GURU") {
			$bulannya = date('m');
			$sqlmasuk									= "SELECT COUNT(id_absen) as total FROM sr_absen WHERE type='$type' AND idusers='$id' AND DATE_FORMAT(tanggal_absen,'%m') = '$bulannya'";
			$row_masuk									= $this->db->query($sqlmasuk)->row();
			$data['hari_masuk']							= $row_masuk->total;
			$hari_kerja = $x - $data['hari_masuk'];
			$data['hari_kerja']							= $hari_kerja;
			$sqlwalikelas								= "SELECT idkelas FROM sr_kelas WHERE walikelas='$id'";
			$row_walikelas								= $this->db->query($sqlwalikelas)->row();
			$data['walikelas']							= $row_walikelas->idkelas;
			$idkelas									= $row_walikelas->idkelas;
			$data['siswa']								= $this->db->query("SELECT * FROM sr_siswa idkelas='$idkelas'")->result_array();
		} else {
			$bulannya = date('m');
			$sqlmasuk									= "SELECT COUNT(id_absen) as total FROM sr_absen WHERE type='$type' AND idusers='$id' AND DATE_FORMAT(tanggal_absen,'%m') = '$bulannya'";
			$row_masuk									= $this->db->query($sqlmasuk)->row();
			$data['hari_masuk']							= $row_masuk->total;
			$hari_kerja = $x - $data['hari_masuk'];
			$data['hari_kerja']							= $hari_kerja;
			$kelasnya									= $value;
			//$sqlwalikelas								= "SELECT idkelas FROM sr_kelas WHERE walikelas='$kelasnya'";
			//$row_walikelas							= $this->db->query($sqlwalikelas)->row();
			//$data['walikelas']						= $row_walikelas->idkelas;
			$idkelas									= $kelasnya;
			$data['siswa']								= $this->db->query("SELECT * FROM sr_siswa WHERE idkelas='$idkelas'")->result_array();
		}
		$this->load->view('template', $data, FALSE);
	}


	public function getToday()
	{
		$date 			= date('Y-m-d');
		$id 			= $this->session->userdata('id');
		$type_users 	= $this->session->userdata('type_users');
		$unit 			= $this->session->userdata('unit');
		//GET TAHUN AJARAN
		$sekolah 		= $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
		$tahun_ajaran   = $sekolah->tahun_ajaran;
		
		$check_absen = $this->db->query("SELECT * FROM sr_absen WHERE idusers = '$id' AND tanggal_absen='$date'");
		if (empty($type_users) || empty($date)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Login dengan Guru atau Siswa untuk melakukan absen!
			</div>");
			redirect('dashboard');
		} else if ($check_absen->num_rows() <> 0) {
			$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
            Kamu telah melakukan Absen hari ini
            </div>");
			redirect('dashboard');
		} else {
			$data = array(
				'idusers'			=> $id,
				'type' 				=> $type_users,
				'tahun_ajaran'		=> $tahun_ajaran,
				'tanggal_absen'		=> $date
			);
			//die(print_r($data));
			$this->core->input_data($data, 'sr_absen');
			$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Anda telah melakukan absen!
			</div>");
			redirect('dashboard');
		}
	}
}
