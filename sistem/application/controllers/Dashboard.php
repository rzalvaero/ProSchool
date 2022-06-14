<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		
		$ip    = $this->input->ip_address(); // Mendapatkan IP user
		$date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
		$waktu = time(); //
		$timeinsert = date("Y-m-d H:i:s");
		// Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
		$s = $this->db->query("SELECT * FROM web_visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
		$ss = isset($s) ? ($s) : 0;
		// Kalau belum ada, simpan data user tersebut ke database
		if ($ss == 0) {
			$this->db->query("INSERT INTO web_visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
		}
		// Jika sudah ada, update
		else {
			$this->db->query("UPDATE web_visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
		}
		$pengunjunghariini  = $this->db->query("SELECT * FROM web_visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
		$dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM web_visitor")->row();
		$totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung
		$bataswaktu = time() - 300;
		$pengunjungonline  = $this->db->query("SELECT * FROM web_visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online
		$data['pengunjunghariini']	= $pengunjunghariini;
		$data['totalpengunjung']	= $totalpengunjung;
		$data['pengunjungonline'] 	= $pengunjungonline;

		$unit = $this->session->userdata('unit');
		if ($this->session->userdata('type_users') == "ADMIN") {
			$this->db->select("*");
			$this->db->from('web_calender');
			$data['result'] = $this->db->get()->result();
			foreach ($data['result'] as $key => $value) {
				$data['calender'][$key]['start'] = $value->waktu;
				$data['calender'][$key]['end'] = $value->waktu;
				$data['calender'][$key]['title'] = $value->title;
				$data['calender'][$key]['url'] = $value->url;
				$libur = $value->libur;
				if ($libur == "1") {
					$data['calender'][$key]['backgroundColor'] = "#ff847f";
				} elseif ($libur == "2") {
					$data['calender'][$key]['backgroundColor'] = "#7fff84";
				} else {
					$data['calender'][$key]['backgroundColor'] = "#7fffc4";
				}
			}

			$data['pengumuman'] = $this->db->query("SELECT * FROM sr_pengumuman WHERE tgl_tutup > $date")->result_array();

			$sqlsiswa									= "SELECT COUNT(idsiswa) as total FROM sr_siswa";
			$row_siswa									= $this->db->query($sqlsiswa)->row();
			$data['siswa'] 								= $row_siswa->total;

			$sqlpengajar								= "SELECT COUNT(idusers) as total FROM sr_users";
			$row_pengajar								= $this->db->query($sqlpengajar)->row();
			$data['pengajar'] 							= $row_pengajar->total;

			$sqlkelas									= "SELECT COUNT(idkelas) as total FROM sr_kelas";
			$row_kelas									= $this->db->query($sqlkelas)->row();
			$data['kelas'] 								= $row_kelas->total;

			$sqlmale									= "SELECT COUNT(idsiswa) as total FROM sr_siswa WHERE s_jenis_kelamin='L'";
			$row_male									= $this->db->query($sqlmale)->row();
			$data['male'] 								= $row_male->total;

			$sqlfemale									= "SELECT COUNT(idsiswa) as total FROM sr_siswa WHERE s_jenis_kelamin='P'";
			$row_female									= $this->db->query($sqlfemale)->row();
			$data['female']								= $row_female->total;
			$this->load->view('dashboard-admin', $data);
		} elseif ($this->session->userdata('type_users') == "GURU") {
			//$data['result'] = $this->db->get("tdocument")->result();
			$this->db->select("*");
			$this->db->from('web_calender');
			$this->db->where_in('unit', ['', $unit]);
			$data['result'] = $this->db->get()->result();
			//foreach ($data['result'] as $key => $value) {
			foreach ($data['result'] as $key => $value) {
				$data['calender'][$key]['start'] = $value->waktu;
				$data['calender'][$key]['end'] = $value->waktu;
				$data['calender'][$key]['title'] = $value->title;
				$data['calender'][$key]['url'] = $value->url;
				$libur = $value->libur;
				if ($libur == "1") {
					$data['calender'][$key]['backgroundColor'] = "#ff847f";
				} elseif ($libur == "2") {
					$data['calender'][$key]['backgroundColor'] = "#7fff84";
				} else {
					$data['calender'][$key]['backgroundColor'] = "#7fffc4";
				}
			}
	
			$guru = $this->session->userdata('id');
			$data['pengumuman'] = $this->db->query("SELECT * FROM sr_pengumuman WHERE tgl_tutup > $date")->result_array();
		
			$sqlsiswa									= "SELECT COUNT(idsiswa) as total FROM sr_siswa WHERE unit='$unit'";
			$row_siswa									= $this->db->query($sqlsiswa)->row();
			$data['siswa'] 								= $row_siswa->total;

			$sqlmateri									= "SELECT COUNT(id) as total FROM sr_materi WHERE unit='$unit'";
			$row_materi									= $this->db->query($sqlmateri)->row();
			$data['materi'] 							= $row_materi->total;

			$sqlkelas									= "SELECT COUNT(idkelas) as total FROM sr_kelas_guru WHERE idusers = '$guru'";
			$row_kelas									= $this->db->query($sqlkelas)->row();
			$data['kelas'] 								= $row_kelas->total;

			$sqlmale									= "SELECT COUNT(idsiswa) as total FROM sr_siswa WHERE s_jenis_kelamin='L' AND unit='$unit'";
			$row_male									= $this->db->query($sqlmale)->row();
			$data['male'] 								= $row_male->total;

			$sqlfemale									= "SELECT COUNT(idsiswa) as total FROM sr_siswa WHERE s_jenis_kelamin='P' AND unit='$unit'";
			$row_female									= $this->db->query($sqlfemale)->row();
			$data['female']								= $row_female->total;
			$this->load->view('dashboard-guru', $data);
		} else {
			$default = "";
			$this->db->select("*");
			$this->db->from('web_calender');
			//$this->db->where('unit', $unit);
			$this->db->where_in('unit', ['', $unit]);
			$data['result'] = $this->db->get()->result();
			foreach ($data['result'] as $key => $value) {
				$data['calender'][$key]['start'] = $value->waktu;
				$data['calender'][$key]['end'] = $value->waktu;
				$data['calender'][$key]['title'] = $value->title;
				$data['calender'][$key]['url'] = $value->url;
				$libur = $value->libur;
				if ($libur == "1") {
					$data['calender'][$key]['backgroundColor'] = "#ff847f";
				} elseif ($libur == "2") {
					$data['calender'][$key]['backgroundColor'] = "#7fff84";
				} else {
					$data['calender'][$key]['backgroundColor'] = "#7fffc4";
				}
			}
			
			$data['pengumuman'] = $this->db->query("SELECT * FROM sr_pengumuman")->result_array();
			$this->load->view('dashboard-siswa', $data);
		}
	}
}
