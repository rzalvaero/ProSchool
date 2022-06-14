<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Silabus extends CI_Controller
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
        $data['page']      = 'silabus';
        $data['selectunit']    = $this->core->selectunit();
        $this->load->view('template', $data, FALSE);
    }

    public function ajax_list()
    {
        $list = $this->doc_silabus->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $silabus) {
            $id     = $silabus->idsilabus;

            $action =   "<td>
                    <div class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'
                            aria-expanded='false'>
                            <span class='flaticon-more-button-of-three-dots'></span></a>
                    <div class='dropdown-menu dropdown-menu-right'>
                            <a class='dropdown-item' href='silabus/cetak/$id'.' target='_blank'><i
                            class='fas fa-cogs text-dark-pastel-blue'></i>cetak</a>
                            <a class='dropdown-item' href='silabus/deletes/$id'.'><i
                            class='fas fa-times text-orange-red'></i>Hapus</a>
                                                            
                    </div>
                    </div>
            </td>";

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $silabus->kompetensi_dasar;
            $row[] = $silabus->indikator_kd;
            $row[] = $silabus->materi_pembelajaran_kd;
            $row[] = $silabus->kegiatan_pembelajaran_kd;
            $row[] = $silabus->alokasi;
            $row[] = $silabus->tk_kd;
            $row[] = $silabus->bi_kd;
            $row[] = $silabus->in_kd;
            $row[] = $silabus->sumber;
            $row[] = $action;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->doc_silabus->count_all(),
            "recordsFiltered" => $this->doc_silabus->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function add()
    {
        $data['page']        = 'add_silabus';
        $data['dropdown']    = $this->core->selectunit();
        $this->load->view('template', $data, FALSE);
    }

    function adding()
    {
        $unit                     = $this->input->post('unit');
        $kompetensi               = $this->input->post('kompetensi');
        $alokasi                  = $this->input->post('alokasi');
        $sumber                   = $this->input->post('sumber');
        $indikator                = $this->input->post('indikator');
        $materi                   = $this->input->post('materi');
        $kegiatan                 = $this->input->post('kegiatan');
        $tk_kd                    = $this->input->post('tk_kd');
        $bi_kd                    = $this->input->post('bi_kd');
        $in_kd                    = $this->input->post('in_kd');
        // Mendapatkan tanggal sekarang

        if (empty($unit) || empty($kompetensi)) {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
            redirect('silabus/add');
        } else {
            $data = array(
                'kompetensi_dasar'        => $kompetensi,
                'indikator_kd'            => $indikator,
                'materi_pembelajaran_kd'  => $materi,
                'kegiatan_pembelajaran_kd' => $kegiatan,
                'tk_kd'                   => $tk_kd,
                'bi_kd'                   => $bi_kd,
                'in_kd'                   => $in_kd,
                'alokasi'                 => $alokasi,
                'sumber'                  => $sumber,
                'unit'                    => $unit
            );
            $this->core->input_data($data, 'sr_silabus');
            $this->session->set_flashdata("msg", "<br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		    Selamat, Silabus telah terdaftar!
		    </div>");
            $url = 'silabus';
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
        $sqlunit									= "SELECT * FROM sr_silabus WHERE idsilabus = '$value'";
        $row_sekolah								= $this->db->query($sqlunit)->row();
        $unitnya    								= $row_sekolah->unit;
        //die(print_r($unitnya));

		$sekolah = $this->db->query("SELECT * FROM web_sekolah WHERE id = '$unitnya'")->row();
        $date                     = date("YmdHis");
		$cek = $this->db->query("SELECT * FROM sr_silabus WHERE idsilabus = '$value'");
		//die(print_r($cek));
		if ($cek->num_rows() > 0) {
			$get = $cek->row();
           // die(print_r($get));
			//ANOTHER SEKOLAH
			$d['nama_sekolah'] = $sekolah->nama_sekolah;
			$d['logo'] = $sekolah->logo;
            $d['stampel'] = $sekolah->stampel;
			$d['alamat_sekolah'] = $sekolah->alamat . ', ' . $sekolah->kodepos;
			$d['kontak_sekolah'] = 'Telp.' . $sekolah->no_telepon . ' | Email:  ' . $sekolah->email;
            //GET SILABUS
			$d['kompetensi_dasar'] = $get->kompetensi_dasar;
            $d['indikator_kd'] = $get->indikator_kd;
            $d['materi_pembelajaran_kd'] = $get->materi_pembelajaran_kd;
            $d['kegiatan_pembelajaran_kd'] = $get->kegiatan_pembelajaran_kd;
            $d['tk_kd'] = $get->tk_kd;
            $d['bi_kd'] = $get->bi_kd;
            $d['in_kd'] = $get->in_kd;
            $d['alokasi'] = $get->alokasi;
            $d['sumber'] = $get->sumber;
			$this->load->library('pdf');
            $this->pdf->setPaper('legal', 'landscape');
            $this->pdf->set_option('isRemoteEnabled', true);
			$this->pdf->filename = "silabus-$date.pdf";
			$this->pdf->load_view('cetak/cetak_silabus', $d);
            //$this->load->view('cetak/cetak_silabus', $d);
		} else {
			$this->session->set_flashdata("error", "Silabus Tidak Ditemukan");
			redirect("dashboard");
		}
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
}
