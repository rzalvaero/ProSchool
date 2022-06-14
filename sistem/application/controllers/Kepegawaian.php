<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepegawaian extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		$this->load->model('doc_jabatan');
		$this->load->model('core');
		$this->load->model('doc_guru');
		if(!$this->session->userdata('username'))
		{
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
			redirect('auth/siswa');
		}
		$this->load->helper('url');
		$this->load->library('form_validation');
	}
	public function setting_jabatan()
	{
//		query getAll model
		$data['list'] = $this->doc_jabatan->getAll();
		$data['page']  	= 'setting_jabatan';
		$this->load->view('template',$data);
	}

//	fungtion untuk menampilkan users join sr_users join web_unit where sr_users = idusers

	public function jabatan_update($id = null)
	{
		$product = $this->doc_jabatan;
		$product->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");
		redirect('kepegawaian/setting_jabatan');
	}
	public function save_jabatan()
	{
		$tunjangan = $this->doc_jabatan;
		$tunjangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('kepegawaian/setting_jabatan');
	}

	public function delete_jabatan()
	{
		$id_setting_tunjangan = $this->input->post('id_jabatan');

//		dump die id pajak
		$this->doc_jabatan->delete($id_setting_tunjangan);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('kepegawaian/setting_jabatan');
	}

	public function kepegawaian()
	{
		$data['dropdown']    = $this->core->selectunit();
		$data['list'] = $this->doc_jabatan->getAll();
		$data['page']  	= 'kepegawaian';
		$this->load->view('template',$data);
	}
//	add kepegawaian
	public function add_kepegawaian()
	{
		$data['dropdown']    = $this->core->selectunit();
		$data['list'] = $this->doc_jabatan->getAll();
		$data['page']  	= 'add_kepegawaian';
		$this->load->view('template',$data);
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
			redirect('kepegawaian/kepegawaian');
		} else if ($check_mail->num_rows() <> 0) {
			$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
            Email sudah terdaftar, Kamu lupa ya?
            </div><br/>");
			redirect('kepegawaian/kepegawaian');
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

}
