<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('core');
        $this->load->model('doc_guru');
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
        $data['page']      = 'guru';
        $data['dropdown']    = $this->core->selectunit();
        $this->load->view('template', $data, FALSE);
    }

    public function add()
    {
        $data['page']      = 'add_guru';
        $data['dropdown']    = $this->core->selectunit();
        $this->load->view('template', $data, FALSE);
    }

    function adding()
    {
        $depan                       = $this->input->post('depan');
        $belakang                   = $this->input->post('belakang');
        $gelar                       = $this->input->post('gelar');
        $saumbung               = $belakang . " " . $gelar;
        //die(print_r($saumbung));
        $telpon                   = $this->input->post('telpon');
        $email                       = $this->input->post('email');
        $input_password            = $this->input->post('password');
        $password               = password_hash($input_password, PASSWORD_DEFAULT);
        $unit                     = $this->input->post('unit');
        $date                   = date("YmdHis"); // Mendapatkan tanggal sekarang

        $check_mail = $this->db->query("SELECT * FROM users WHERE email = '$email'");
        if (empty($unit) || empty($email)) {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
            redirect('guru/add');
        } else if ($check_mail->num_rows() <> 0) {
            $this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
            Email sudah terdaftar, Kamu lupa ya?
            </div><br/>");
            redirect('guru/add');
        } else {

            $data = array(
                'ip_address'        => $this->input->ip_address(),
                'created_on'        => $date,
                'first_name'         => $depan,
                'last_name'         => $saumbung,
                'phone'                => $telpon,
                'password'            => $password,
                'email'                => $email,
                'active'            => "1",
                'multirole'            => "N",
                'unit'                => $unit
            );
            $insertid = $this->core->input_data2($data, 'users');
            $data2 = array(
                'idusers'            => $insertid,
                'unit'                 => $unit
            );
            $this->core->input_data($data2, 'sr_users');
            $this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Selamat, Guru telah terdaftar!
		</div>");
            $url = 'guru/setting';
            echo '
				<script>
				window.location.href = "' . base_url() . $url . '/' . $insertid . '";
				</script>
				';
        }
    }

    public function setting($insertid)
    {
        //$date = date("Y-m-d");
        $data['page']      = 'setting_guru';
        $data['province'] = $this->core->get_provinsi();
//		query sr_jabatan
		$data['jabatan'] = $this->core->selectjabatan();
		$data['list'] = $this->doc_jabatan->getAll();
		$where1 = array('id' => $insertid);
        $where2 = array('idusers' => $insertid);
        $data['setting_us'] = $this->core->edit($where1, 'users')->result();
        $data['setting_su'] = $this->core->edit($where2, 'sr_users')->result();
        $this->load->view('template', $data);
    }

    function get_subprovinsi()
    {
        $id = $this->input->post('id');
        $data = $this->core->get_subprovinsi($id);
        echo json_encode($data);
    }

    public function ajax_list()
    {
        $list = $this->doc_guru->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $guru) {
             $id     = $guru->id;
			if ($guru->status ==  '1') {
//				color green
				$status = '<span class="badge badge-success">Aktif</span>';
			}else{
				$status = '<span class="badge badge-danger">Tidak Aktif</span>';
			}

            $action =   "<td>
                    <div class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'
                            aria-expanded='false'>
                            <span class='flaticon-more-button-of-three-dots'></span></a>
                    <div class='dropdown-menu dropdown-menu-right'>
                            <a class='dropdown-item' href='../guru/gurdet/$id'><i
                            class='fas fa-eye text-dark-pastel-green'></i>Detail</a>
                            <a class='dropdown-item' href='../guru/setting/$id'.'><i
                            class='fas fa-cogs text-dark-pastel-blue'></i>Edit</a>
                            <a class='dropdown-item' href='guru/deletes/$id'.'><i
                            class='fas fa-times text-orange-red'></i>Hapus</a>
                                                            
                    </div>
                    </div>
            </td>";

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $guru->u_nbm_nip;
                $row[] = $guru->u_nuptk_nuks;
            $row[] = $guru->first_name . ' ' . $guru->last_name;
            $row[] = $guru->nama_jabatan;
            $row[] = $status;
            $row[] = $action;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->doc_guru->count_all(),
            "recordsFiltered" => $this->doc_guru->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function gurdet($value = '')
    {
        $data['page']      = 'profile_guru';
        $data['selectkelas']			= $this->core->selectkelas();
        $data['selectmatapelajaran']			= $this->core->selectmatapelajaran();
		$data['detail']  = $this->db->query("SELECT SU.*, US.email, US.phone, US.first_name, US.last_name, WU.nama as unit,SJ.nama_jabatan FROM users US 
        LEFT JOIN web_unit WU on WU.id      = US.unit
        LEFT JOIN sr_users SU on SU.idusers = US.id 
		LEFT JOIN sr_jabatan SJ on SJ.id_jabatan = SU.u_tugas_tambahan 
        WHERE SU.idusers = '$value'")->result_array();
        $data['kelas']  = $this->db->query("SELECT SK.k_romawi, SK.k_keterangan FROM sr_kelas_guru SKG 
        LEFT JOIN users US ON US.id = SKG.idusers
        LEFT JOIN sr_kelas SK ON SK.idkelas = SKG.idkelas 
        WHERE US.id = '$value';")->result_array();
		$data['mapel']  = $this->db->query("SELECT SMP.* FROM sr_mata_pelajaran_guru SMPG
		LEFT JOIN sr_mata_pelajaran SMP on SMP.idmata_pelajaran = SMPG.idmata_pelajaran
		LEFT JOIN users US on US.id = SMPG.idusers 
		WHERE US.id = '$value';")->result_array();
        $this->load->view('template', $data);
    }
	
	function adding_kelas_guru()
	{
		$idguru 	 = $this->input->post('idguru');
		$kelas_id 	 = $this->input->post('kelas_id');
		
		if (empty($idguru) || empty($kelas_id)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			$url = 'guru/gurdet';
            echo '
				<script>
				window.location.href = "' . base_url() . $url . '/' . $idguru . '";
				</script>
			';
			//redirect('guru');
		} else {
			$data = array(
				'idusers'		=> $idguru,
				'idkelas' 		=> $kelas_id
			);
			$this->core->input_data($data, 'sr_kelas_guru');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Selamat, kelas guru tercatat!
			</div>");
			//redirect('guru');
			$url = 'guru/gurdet';
            echo '
				<script>
				window.location.href = "' . base_url() . $url . '/' . $idguru . '";
				</script>
			';
		}
	}
	
	function adding_mapel_guru()
	{
		$idguru 	 = $this->input->post('idguru');
		$mapel_id 	 = $this->input->post('mapel_id');
		
		if (empty($idguru) || empty($mapel_id)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			$url = 'guru/gurdet';
            echo '
				<script>
				window.location.href = "' . base_url() . $url . '/' . $idguru . '";
				</script>
			';
			//redirect('guru');
		} else {
			$data = array(
				'idusers'			=> $idguru,
				'idmata_pelajaran' 	=> $mapel_id
			);
			$this->core->input_data($data, 'sr_mata_pelajaran_guru');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Selamat, kelas guru tercatat!
			</div>");
			//redirect('guru');
			$url = 'guru/gurdet';
            echo '
				<script>
				window.location.href = "' . base_url() . $url . '/' . $idguru . '";
				</script>
			';
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
