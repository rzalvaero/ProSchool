<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetensi_dasar extends CI_Controller
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
		$data['page'] 	 	 = 'kompetensi_dasar';
		$data['selectunit']  = $this->core->selectunit();
		$data['selectKI']    = $this->core->selectKI();
		$type = $this->session->userdata('type_users');
		$unit = $this->session->userdata('unit');
		//die(print_r($type));
		if ($type == "SISWA") {
			redirect('dashboard');
		} else {
			$data['kompetensi_dasar']    	= $this->db->query("SELECT a.*, b.mp_nama as mata_pelajarann FROM sr_kompetensi_dasar a left join sr_mata_pelajaran b on a.idmata_pelajaran = b.idmata_pelajaran")->result_array();
			//die(print_r($data['data']));
		}
		$this->load->view('template', $data, FALSE);
	}

	function random($length)
	{
		$str = "";
		$characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}

	function add()
	{
		$unit 	  		= $this->input->post('unit');
		$kd 	  		= $this->input->post('kompetensi_inti');
		$mapel 	  		= $this->input->post('mapel');
		$bagan	 	    = $this->input->post('bagan');

		if (empty($mapel) || empty($bagan)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('kompetensi_dasar');
		} else {
			$data = array(
				'unit'				=> $unit,
				'kd' 				=> $kd,
				'mata_pelajaran'	=> $mapel,
				'bagan'	=> $bagan
			);
			$this->core->input_data($data, 'sr_kompetensi_dasar_lama');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
				Selamat, Kompetensi Dasar telah terdaftar!
				</div>");
			redirect('kompetensi_dasar');
		}
	}

	function deletes($id)
	{
		$this->db->where('id_kompetensidasar ', $id);
		$query 		        = $this->db->get('sr_kompetensi_dasar');
		$row 			    = $query->row();
		$this->db->delete('sr_kompetensi_dasar', array('id_kompetensidasar ' => $id));
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Kompetensi Dasar Berhasil Dihapus!
			</div>");
		redirect('kompetensi_dasar');
	}
	
	public function cetak($value = '')
	{
       // die(print_r($value));
        $sqlunit									= "SELECT * FROM sr_kompetensi_dasar WHERE id_kompetensidasar = '$value'";
        $row_sekolah								= $this->db->query($sqlunit)->row();
        $unitnya    								= $row_sekolah->unit;
        //die(print_r($unitnya));

		$sekolah = $this->db->query("SELECT * FROM web_sekolah WHERE id = '$unitnya'")->row();
        $date                     = date("YmdHis");
		$cek = $this->db->query("SELECT * FROM sr_kompetensi_dasar WHERE id_kompetensidasar = '$value'");
		//die(print_r($cek));
		if ($cek->num_rows() > 0) {
			$get = $cek->row();
            //die(print_r($get));
			//ANOTHER SEKOLAH
			$d['nama_sekolah'] = $sekolah->nama_sekolah;
			$d['logo'] = $sekolah->logo;
            $d['stampel'] = $sekolah->stampel;
			$d['alamat_sekolah'] = $sekolah->alamat . ', ' . $sekolah->kodepos;
			$d['kontak_sekolah'] = 'Telp.' . $sekolah->no_telepon . ' | Email:  ' . $sekolah->email;
            //GET KI-KD
			$d['kd'] = $get->kd;
            $d['mata_pelajaran'] = $get->mata_pelajaran;
            $d['bagan'] = $get->bagan;
			$this->load->library('pdf');
            $this->pdf->setPaper('legal', 'potrait');
            $this->pdf->set_option('isRemoteEnabled', true);
			$this->pdf->filename = "KIKD-$date.pdf";
			$this->pdf->load_view('cetak/cetak_ki_kd', $d);
            //$this->load->view('cetak/cetak_silabus', $d);
		} else {
			$this->session->set_flashdata("error", "KI - KD Tidak Ditemukan");
			redirect("dashboard");
		}
	}
	function edited(){
		$id 	= $this->input->post('id');
		$kode 	= $this->input->post('kode');
		$nama	= $this->input->post('nama');
		$kategori	= $this->input->post('kategori');

		$data = array(
			'kode_kd' => $kode,
			'nama_kd' => $nama,
			'kategori_kd' => $kategori,
		);

		$where = array(
			'idkompetensiinti' => $id
		);
		$this->core->update($where,$data,'sr_kompetensi_inti');
		//logs
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Selamat data kompetensi_inti anda telah di update!
		</div><br/><br/>");
		redirect('kompetensi_inti');
	}
}
