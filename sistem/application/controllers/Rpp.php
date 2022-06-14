<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rpp extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('core');
        $this->load->model('doc_silabus');
        $this->load->model('doc_jabatan');
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
        $data['page']          = 'rpp';
        $data['selectunit']    = $this->core->selectunit();
        $type = $this->session->userdata('type_users');
		$unit = $this->session->userdata('unit');
        if ($type == "SISWA") {
			redirect('dashboard');
		} elseif ($type == "GURU") {
			$data['rpp']    	= $this->db->query("SELECT * FROM sr_rpp WHERE unit='$unit'")->result_array();
		} else {
			$data['rpp']    	= $this->db->query("SELECT * FROM sr_rpp")->result_array();
		}
        $this->load->view('template', $data, FALSE);
    }

    public function add()
    {
        $data['page']        = 'add_rpp';
        $data['kelas']	     = $this->core->selectkelas();
        $data['unit']        = $this->core->selectunit();
        $data['tahun']       = $this->core->selectahunajaran();
        //die(print_r($data['tahun']));
        $this->load->view('template', $data, FALSE);
    }

    function adding()
    {
        $unit                     = $this->input->post('unit');
        $mapel                    = $this->input->post('mapel');
        $kelas                    = $this->input->post('kelas');
        $tahun                    = $this->input->post('tahun');
        $alokasi                  = $this->input->post('alokasi');
        $nama                     = $this->input->post('nama');
        $kategori                 = $this->input->post('kategori');
        $tujuan                   = $this->input->post('tujuan');
        $materi                   = $this->input->post('materi');
        $metode                   = $this->input->post('metode');
        $media                    = $this->input->post('media');
        $sumber                   = $this->input->post('sumber');
        $penilaian                = $this->input->post('penilaian');
        // Mendapatkan tanggal sekarang

        if (empty($unit) || empty($mapel)) {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
            redirect('rpp/add');
        } else {
            $data = array(
                'unit'                    => $unit,
                'idtahun_pelajaran'       => $tahun,
                'idusers'                 => "",
                'idkelas'                 => $kelas,
                'mata_pelajaran'        => $mapel,
                'kd_kategori'             => $kategori,
                'kd_nama'                 => $nama,
                'kd_status'               => "Y",
                'alokasi'                 => $alokasi,
                'tujuan'                  => $tujuan,
                'materi'                  => $materi,
                'metode'                  => $metode,
                'media'                   => $media,
                'sumber'                  => $sumber,
                'penilaian'               => $penilaian
            );
           // die(print_r($data));
            $this->core->input_data($data, 'sr_rpp');
            $this->session->set_flashdata("msg", "<br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		    Selamat, RPP telah terdaftar!
		    </div>");
            $url = 'rpp';
            echo '
				<script>
				window.location.href = "' . base_url() . $url . '";
				</script>
				';
        }
    }

    public function cetak($value = '')
	{
       // die(print_r($value));
        $sqlunit									= "SELECT * FROM sr_rpp WHERE idkompetensi_dasar = '$value'";
        $row_sekolah								= $this->db->query($sqlunit)->row();
        $unitnya    								= $row_sekolah->unit;
        //die(print_r($unitnya));

		$sekolah = $this->db->query("SELECT * FROM web_sekolah WHERE id = '$unitnya'")->row();
        $date                     = date("YmdHis");
		$cek = $this->db->query("SELECT * FROM sr_rpp WHERE idkompetensi_dasar = '$value'");
		//die(print_r($cek));
		if ($cek->num_rows() > 0) {
			$get = $cek->row();
            // /die(print_r($get));
			//ANOTHER SEKOLAH
			$d['nama_sekolah'] = $sekolah->nama_sekolah;
			$d['logo'] = $sekolah->logo;
            $d['stampel'] = $sekolah->stampel;
			$d['alamat_sekolah'] = $sekolah->alamat . ', ' . $sekolah->kodepos;
			$d['kontak_sekolah'] = 'Telp.' . $sekolah->no_telepon . ' | Email:  ' . $sekolah->email;
            //GET SILABUS
			$d['idtahun_pelajaran'] = $get->idtahun_pelajaran;
            $d['mata_pelajaran'] = $get->mata_pelajaran;
            $d['kd_kategori'] = $get->kd_kategori;
            $d['kd_nama'] = $get->kd_nama;
            $d['alokasi'] = $get->alokasi;
            $d['tujuan'] = $get->tujuan;
            $d['materi'] = $get->materi;
            $d['metode'] = $get->metode;
            $d['media'] = $get->media;
            $d['sumber'] = $get->sumber;
            $d['penilaian'] = $get->penilaian;
			$this->load->library('pdf');
            $this->pdf->setPaper('legal', 'portrait');
            $this->pdf->set_option('isRemoteEnabled', true);
			$this->pdf->filename = "rpp-$date.pdf";
			$this->pdf->load_view('cetak/cetak_rpp', $d);
            //$this->load->view('cetak/cetak_silabus', $d);
		} else {
			$this->session->set_flashdata("error", "RPP Tidak Ditemukan");
			redirect("dashboard");
		}
	}


    public function gurdet($value = '')
    {
        $data['page']      = 'profile_guru';
        $data['detail']  = $this->db->query("SELECT SU.*, US.email, US.phone, US.first_name, US.last_name, WU.nama as unit,SJ.nama_jabatan FROM users US 
        LEFT JOIN web_unit WU on WU.id      = US.unit
        LEFT JOIN sr_users SU on SU.idusers = US.id 
		LEFT JOIN sr_jabatan SJ on SJ.id_jabatan = SU.u_tugas_tambahan 
        WHERE SU.idusers = '$value'")->result_array();
        $data['kelas']  = $this->db->query("SELECT SK.k_romawi, SK.k_keterangan FROM sr_kelas_guru SKG 
        LEFT JOIN users US ON US.id = SKG.idusers
        LEFT JOIN sr_kelas SK ON SK.idkelas = SKG.idkelas 
        WHERE US.id = '$value';")->result_array();
        $this->load->view('template', $data);
    }

    function deletes($id)
    {
        $this->db->where('idsiswa', $id);
        $query                 = $this->db->get('sr_users');
        $row                 = $query->row();
        $this->db->delete('sr_users', array('idsiswa' => $id));
        $this->db->delete('users', array('id' => $id));
        $this->session->set_flashdata("msg", "<div class='alert alert-danger' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Guru Berhasil Dihapus!
	    </div>");
        redirect('guru');
    }
	public function edit($id){
		$data['page'] 	 	= 'edit_rpp';
		$data['selectunit']    = $this->core->selectunit();
        $type = $this->session->userdata('type_users');
		$unit = $this->session->userdata('unit');
		 $data['kelas']	     = $this->core->selectkelas();
        $data['unit']        = $this->core->selectunit();
        $data['tahun']       = $this->core->selectahunajaran();
        if ($type == "SISWA") {
			redirect('dashboard');
		} elseif ($type == "GURU") {
			$data['rpp']    	= $this->db->query("SELECT * FROM sr_rpp WHERE unit='$unit'")->result_array();
		} else {
			$data['rpp']    	= $this->db->query("SELECT * FROM sr_rpp")->result_array();
		}
		$data['data']    	= $this->db->query("SELECT * FROM sr_rpp where idkompetensi_dasar = '$id'")->result_array();
		$this->load->view('template', $data, FALSE);
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
