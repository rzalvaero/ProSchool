<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('core');
        $this->load->model('doc_siswa');
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
        $data['page']            = 'siswa';
        $data['selectkelas']    = $this->core->selectkelas();
        $data['province']       = $this->core->get_provinsi();
        $data['selectunit']     = $this->core->selectunit();
        $this->load->view('template', $data, FALSE);
    }

    public function ajax_list()
    {
        $list = $this->doc_siswa->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $siswa) {
            $id = $siswa->idsiswa;
            $action =   "<td>
                    <div class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'
                            aria-expanded='false'>
                            <span class='flaticon-more-button-of-three-dots'></span></a>
                    <div class='dropdown-menu dropdown-menu-right'>
                            <a class='dropdown-item' href='siswa/sisdet/$id'><i
                            class='fas fa-eye text-dark-pastel-green'></i>Detail</a>
                            <a class='dropdown-item' href='siswa/edit/$id'.'><i
                            class='fas fa-cogs text-dark-pastel-blue'></i>Edit</a>
                            <a class='dropdown-item' href='siswa/deletes/$id'.'><i
                            class='fas fa-times text-orange-red'></i>Hapus</a>
                                                            
                    </div>
                    </div>
                    </td>";

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $siswa->s_nisn;
            $row[] = $siswa->s_nik;
            $row[] = $siswa->s_nama;
            $row[] = $siswa->s_tanggal_lahir;
            $row[] = $action;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->doc_siswa->count_all(),
            "recordsFiltered" => $this->doc_siswa->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function sisdet($value = '')
    {
        $data['page']      = 'profile_siswa';
        $data['detail']  = $this->db->query("SELECT SRS.* , WU.nama as nama_sekolah, SK.k_romawi, SK.k_keterangan FROM sr_siswa SRS
        LEFT JOIN web_unit WU on WU.id      = SRS.unit
        LEFT JOIN sr_kelas SK on SK.idkelas = SRS.idkelas
        WHERE SRS.idsiswa = '$value'")->result_array();
        $this->load->view('template', $data);
    }

    public function edit()
    {
        $id =  $this->uri->segment('3');
        $data['page']  	= 'setting_siswa';
        $where = array('idsiswa' => $id );
        $data['setting'] = $this->core->edit($where,'sr_siswa')->result();
	    $this->load->view('template',$data);
    }

    public function add()
    {
        $data['page']           = 'add_siswa';
        $data['selectkelas']    = $this->core->selectkelas();
        $data['province']       = $this->core->get_provinsi();
        $data['selectunit']     = $this->core->selectunit();
        $this->load->view('template', $data, FALSE);
    }

    function adding()
    {
        $nama                       = $this->input->post('nama');
        $nik                       = $this->input->post('nik');
        $nisn                       = $this->input->post('nisn');
        $gender                   = $this->input->post('gender');
        $email                       = $this->input->post('email');
        $telpon                    = $this->input->post('telpon');
        $dob                     = $this->input->post('dob');
        $kelas                     = $this->input->post('kelas');
        $province                 = $this->input->post('province');
        $kota                     = $this->input->post('kota');
        $unit                     = $this->input->post('unit');
        $date                   = date("YmdHis"); // Mendapatkan tanggal sekarang

        $check_nik = $this->db->query("SELECT * FROM sr_siswa WHERE s_nik = '$nik'");
        $check_nisn = $this->db->query("SELECT * FROM sr_siswa WHERE s_nik = '$nisn'");
        if (empty($nama) || empty($nik) || empty($nisn) || empty($gender) || empty($kota) || empty($province)) {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
            redirect('siswa/add');
        } else if ($check_nik->num_rows() <> 0) {
            $this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
            NIK sudah terdaftar, Kamu lupa ya?
            </div><br/>");
            redirect('siswa/add');
        } else if ($check_nisn->num_rows() <> 0) {
            $this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
            NISN sudah terdaftar, Kamu lupa ya?
            </div><br/>");
            redirect('siswa/add');
        } else {
            $data = array(
                'unit'              => $unit,
                's_nisn'          => $nisn,
                's_nik'           => $nik,
                's_nama'             => $nama,
                's_jenis_kelamin' => $gender,
                's_tl_idprovinsi' => $province,
                's_tl_idkota'        => $kota,
                's_tanggal_lahir' => $dob,
                'idkelas'           => $kelas,
                's_email'         => $email,
                's_telepon'       => $telpon,
                's_tl_idprovinsi' => $province,
            );
            $insertid = $this->core->input_data2($data, 'sr_siswa');
            $this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
            Selamat, Siswa telah terdaftar. Silahkan tambahkan data baru!
            </div>");
            redirect('siswa/add');
        }
    }

    function deletes($id)
    {
        $this->db->where('idsiswa', $id);
        $query                 = $this->db->get('sr_siswa');
        $row                 = $query->row();
        $this->db->delete('sr_siswa', array('idsiswa' => $id));
        $this->session->set_flashdata("msg", "<div class='alert alert-danger' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Siswa Berhasil Dihapus!
	    </div>");
        redirect('siswa');
    }
}
