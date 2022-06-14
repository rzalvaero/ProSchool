<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asrama extends CI_Controller
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

	public function index()
	{
		$data['page'] 	 	= 'asrama';
		$data['unit']	    = $this->core->selectunit();
		$data['kategori']	= $this->core->selectkategori_kamar();
		$type = $this->session->userdata('type_users');
		$unit = $this->session->userdata('unit');
		//die(print_r($type));
		if ($type == "SISWA") {
			redirect('dashboard');
		} else {
			$data['data']    	= $this->db->query("SELECT SK.* , SKK.nama_kategori, WU.nama as nama_unit FROM sr_kamar SK 
			LEFT JOIN sr_kamar_kategori SKK on SKK.id_kategori = SK.kategori_kamar
			LEFT JOIN web_unit WU on WU.id = SK.unit")->result_array();
		}
		$this->load->view('template', $data, FALSE);
	}

	public function penghuni_setting($value = '')
	{
		$data['idkamar'] = $value;
		//die(print_r($idkamar));
		$data['page'] 	 	= 'asrama_setting';
		$data['unit']	    = $this->core->selectunit();
		$type = $this->session->userdata('type_users');
		//die(print_r($type));
		if ($type == "SISWA") {
			redirect('dashboard');
		} elseif ($type == "GURU") {
			$data['data']    	= $this->db->query("SELECT SKP.id_penghuni, SK.nama_kamar, SS.s_nama FROM sr_kamar_penghuni SKP
			LEFT JOIN sr_kamar SK on SK.id_kamar = SKP.id_kamar
			LEFT JOIN sr_siswa SS on SS.idsiswa = SKP.id_siswa
			WHERE SKP.id_kamar = '$value'")->result_array();
		} else {
			$data['data']    	= $this->db->query("SELECT SKP.id_penghuni, SK.nama_kamar, SS.s_nama FROM sr_kamar_penghuni SKP
			LEFT JOIN sr_kamar SK on SK.id_kamar = SKP.id_kamar
			LEFT JOIN sr_siswa SS on SS.idsiswa = SKP.id_siswa
			WHERE SKP.id_kamar = '$value'")->result_array();
		}
		$this->load->view('template', $data, FALSE);
	}

	function get_siswa()
	{
		$id = $this->input->post('id');
		$data = $this->core->get_siswa($id);
		//die(print_r($data));
		echo json_encode($data);
	}

	function add_penghuni()
	{

		$status 		= "0";
		$kamar			= $this->input->post('kamar');
		$unit			= $this->input->post('unit');
		$siswa			= $this->input->post('siswa');
		//$created 		= date("Y-m-d H:i:s");

		for ($i = 0; $i < count($siswa); $i++) :

			if ($siswa[$i] == '' || $siswa[$i] == 0) {
				$sql = "";
			} else {
				$sql = "INSERT INTO sr_kamar_penghuni (id_kamar,id_siswa,unit,status) 
			VALUES ('$kamar','$siswa[$i]', '$unit', '$status')";
				$this->db->query($sql);
			}

		endfor;

		$this->session->set_flashdata("msg", "<div class='alert alert-success'>
		Berhasil menambahkan akses ke user tersebut!
		</div>");
		// $username    = $this->session->userdata('id');
		// $log =	array(
		// 	'unit' 		 => $unit,
		// 	'type'		 => "guru",
		// 	'idusers'	 => $username,
		// 	'datestamp'	 => date("Y-m-d H:i:s"),
		// 	'note'	 	 => 'Anda memberikan permission baru dikamar - ' . $kamar . ''
		// );
		// $this->db->insert('web_log', $log);
		$url = 'asrama/penghuni_setting';
		echo '
	<script>
	window.location.href = "' . base_url() . $url . '/' . $kamar . '";
	</script>
	';
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

	function add_kamar()
	{
		$nama 	  		= $this->input->post('nama');
		$unit 	  		= $this->input->post('unit');
		$kategori 	    = $this->input->post('kategori');
		$kapasitas 	    = $this->input->post('kapasitas');

		if (empty($kategori) || empty($unit)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('asrama');
		} else {
			$data = array(
				'unit'		        => $unit,
				'nama_kamar' 		=> $nama,
				'kategori_kamar'    => $kategori,
				'kapasitas_kamar'   => $kapasitas
			);
			$this->core->input_data($data, 'sr_kamar');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
				Selamat, Kamar telah terdaftar!
				</div>");
			redirect('asrama');
		}
	}

	function deletes($id)
	{
		$this->db->where('idkompetensiinti ', $id);
		$query 		        = $this->db->get('sr_kompetensi_inti');
		$row 			    = $query->row();
		$this->db->delete('sr_kompetensi_inti', array('idkompetensiinti ' => $id));
		$this->session->set_flashdata("msg", "<div class='alert alert-danger' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Kompetensi Inti Berhasil Dihapus!
	    </div>");
		redirect('kompetensi_inti');
	}


	public function penghuni()
	{
		$data['page'] 	 	= 'asrama_penghuni';
		$data['unit']	    = $this->core->selectunit();
		$data['kamar']	= $this->core->select_kamar();
		$type = $this->session->userdata('type_users');
		$unit = $this->session->userdata('unit');
		//die(print_r($type));
		if ($type == "SISWA") {
			redirect('dashboard');
		} else {
			$data['data']    	= $this->db->query("SELECT SK.* , SKK.nama_kategori, WU.nama as nama_unit FROM sr_kamar SK 
			LEFT JOIN sr_kamar_kategori SKK on SKK.id_kategori = SK.kategori_kamar
			LEFT JOIN web_unit WU on WU.id = SK.unit")->result_array();
		}
		$this->load->view('template', $data, FALSE);
	}

	public function ajax_list()
	{
		$list = $this->doc_penghuni->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $penghuni) {
			//die(print_r($penghuni));
			$id = $penghuni->id_penghuni;


			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $penghuni->nama_kamar;
			$row[] = $penghuni->s_nama;
			$row[] = $penghuni->status;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->doc_penghuni->count_all(),
			"recordsFiltered" => $this->doc_penghuni->count_filtered(),
			"data" => $data,
		);

		echo json_encode($output);
	}
}
