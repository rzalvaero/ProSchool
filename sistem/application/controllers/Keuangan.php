<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		$this->load->model('doc_account');
		$this->load->model('doc_pajak');
		$this->load->model('doc_tarif_pos_unit');
		$this->load->model('doc_pos_unit');
		$this->load->model('doc_pospembayaran');
		$this->load->model('doc_jenisbayar');
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
			redirect('auth/siswa');
		}

		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
//		dropdown kode akun

	}

	public function leger()
	{
		$data['page'] = 'nilai_leger';
		$this->load->view('template', $data);
	}

	public function pos_pembayaran()
	{
		$data['unit'] = $this->session->userdata('unit');
		$data['akun'] = $this->doc_account->get_akun();
		$data['akun_piutang'] = $this->doc_account->get_akun_piutang();
		$data["list"] = $this->doc_pospembayaran->getAll();
		$data['page'] = 'pos_pembayaran';
		$this->load->view('template', $data);
	}

	public function save_pos_pembayaran()
	{
		$pos_pembayaran = $this->doc_pospembayaran;
		$pos_pembayaran->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Tersimpan
			</div>");
		redirect('keuangan/pos_pembayaran');
	}

	public function pembayaran_siswa()
	{
		$data['page'] = 'pembayaran_siswa';
		$this->load->view('template', $data);
	}

	public function unit_pos()
	{
		$data['page'] = 'unit_pos';
		$data['list'] = $this->doc_pos_unit->getAll();
		$data['unit'] = $this->session->userdata('unit');
		$this->load->view('template', $data);
	}

	public function unit_pos_save()
	{
		$akun_biaya = $this->doc_pos_unit;
		$akun_biaya->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('keuangan/unit_pos');
	}

	public function unit_pos_update($id = null)
	{
		$product = $this->doc_pos_unit;
		$product->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");		redirect('keuangan/unit_pos');
	}
	public function delete_unit_pos()
	{
		$id_unit_pos = $this->input->post('id_unit_pos');
		$this->doc_pos_unit->delete($id_unit_pos);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('keuangan/unit_pos');
	}
	public function tarif_pos_unit($id_unit_pos)
	{
		$data['page'] = 'tarif_pos_unit';
		$data['list'] = $this->doc_pos_unit->getById($id_unit_pos);
		$data['unit'] = $this->session->userdata('unit');
		$data['akun'] = $this->doc_account->get_akun();
//		query all data tarif pos unit
		$data['tarif_pos_unit'] = $this->doc_tarif_pos_unit->getAll();
		$this->load->view('template', $data);
	}

	public function tarif_pos_unit_beban($id_unit_pos)
	{
		$data['page'] = 'tarif_pos_unit_beban';
		$data['list'] = $this->doc_pos_unit->getById($id_unit_pos);
		$data['unit'] = $this->session->userdata('unit');
		$data['akun'] = $this->doc_account->get_akun();
//		query all data tarif pos unit
		$data['tarif_pos_unit'] = $this->doc_tarif_pos_unit->getAll_beban();
		$this->load->view('template', $data);
	}
	public function tarif_unit_pos_save()
	{
//		if same id same

		$tarif_unit_pos = $this->doc_tarif_pos_unit;
		$tarif_unit_pos->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('keuangan/unit_pos');
	}

	public function delete_tarif_unit_pos()
	{
		$id_tarif_unit_pos = $this->input->post('id_tarif_unit_pos');
		$this->doc_tarif_pos_unit->delete($id_tarif_unit_pos);
		$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('keuangan/unit_pos');
	}
	public function tarif_unit_pos_save_beban()
	{
		$tarif_unit_pos = $this->doc_tarif_pos_unit;
		$tarif_unit_pos->save_beban();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('keuangan/unit_pos');
	}

	public function setting_tarif_unit_pos()
	{
		$data['page'] = 'setting_tarif_unit_pos';
		$this->load->view('template', $data);
	}

	public function bukti_biaya_transfer_wali_murid()
	{
		$data['page'] = 'bukti_biaya_transfer_wali_murid';
		$this->load->view('template', $data);
	}

	public function saldo_awal()
	{
		$data['page'] = 'saldo_awal';
		$this->load->view('template', $data);
	}

	public function saldo_keluar()
	{
		$data['page'] = 'saldo_keluar';
		$this->load->view('template', $data);
	}

	public function kas_masuk()
	{
		$data['page'] = 'kas_masuk';
		$this->load->view('template', $data);
	}

//jenis pembayaran
	public function jenis_pembayaran()
	{
		$data['unit'] = $this->session->userdata('unit');
		$data['page'] = 'jenis_pembayaran';
		$data['pos_bayar'] = $this->doc_pospembayaran->getAll();
		$data["list"] = $this->doc_jenisbayar->getAll();
		$this->load->view('template', $data);
	}

	public function save_jenis_pembayaran()
	{
		$jenis_pembayaran = $this->doc_jenisbayar;
		$jenis_pembayaran->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Tersimpan
			</div>");
		redirect('keuangan/jenis_pembayaran');
	}	public function delete_jenis_pembayaran()
	{
//		delete
		$id_jenis_pembayaran = $this->input->post('id_jenis_bayar');
//		if id_jenis_pembayaran is not null in table sr_pembayaran_bebas and sr_pembayaran_bulanan
//	query table sr_pembayaran_bebas and sr_pembayaran_bulanan
	$db = $this->db->query('select * from sr_pembayaran_bebas where id_jenis_pembayaran = "'.$id_jenis_pembayaran.'"')->num_rows();
	$db2 = $this->db->query('select * from sr_pembayaran_bulanan where id_jenis_pembayaran = "'.$id_jenis_pembayaran.'"')->num_rows();
	if ($db >0 || $db2 > 0){
		$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Masih Tersedia di Table Pembayaran Bebas dan Pembayaran Bulanan
			</div>");
		redirect('keuangan/jenis_pembayaran');
	}else{

		$this->doc_jenisbayar->delete($id_jenis_pembayaran);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Tersimpan
			</div>");
		redirect('keuangan/jenis_pembayaran');
	}

	}

	public function tarif_pembayaran($id, $kelas = "")
	{
		$cek = $this->db->query("select sr_pos_pembayaran.nama_pos,sr_account.keterangan,sr_jenis_bayar.tingkat,tipe,sr_jenis_bayar.id_jenis_bayar from sr_jenis_bayar
								left join sr_pos_pembayaran on sr_jenis_bayar.id_pos = sr_pos_pembayaran.id_pos
								left join sr_account on sr_pos_pembayaran.kode_akun = sr_pos_pembayaran.kode_akun
								 where id_jenis_bayar = $id group by sr_jenis_bayar.id_pos");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Tarif Pembayaran";
			$d['page'] = 'tarif_bayar';
			$d['pos_bayar'] = $this->doc_pospembayaran->getAll();
			$d['combo_kelas'] = $this->doc_jenisbayar->combo_kelas($kelas);
			$data = $cek->row();
			$d['nama_pos_keuangan'] = $data->nama_pos;
			$d['tahun_ajaran'] = $data->tingkat;
			$d['id_jenis_pembayaran'] = $id;
			$d['tipe_pembayaran'] = $data->tipe;
			if (!empty($kelas)) {
				$d['siswa'] = $this->doc_jenisbayar->tarif_bayar_kelas($kelas, $id, $data->tipe);
			} else {
				$d['siswa'] = "";
			}
			$this->load->view('template', $d);
		} else {
			$this->load->view('keuangan/jenis_bayar/tarif_pembayaran', $d);
		}
	}

	public function tarif_pembayaran_kelas($id)
	{
		$cek = $this->db->query("select sr_pos_pembayaran.nama_pos,sr_account.keterangan,sr_jenis_bayar.tingkat,tipe,sr_jenis_bayar.id_jenis_bayar from sr_jenis_bayar
			left join sr_pos_pembayaran on sr_jenis_bayar.id_pos = sr_pos_pembayaran.id_pos
			left join sr_account on sr_pos_pembayaran.kode_akun = sr_pos_pembayaran.kode_akun
			 where id_jenis_bayar = $id group by sr_jenis_bayar.id_pos");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Tarif Pembayaran";
			$d['page'] = 'tarif_bayar_kelas';
			$d['combo_kelas'] = $this->doc_jenisbayar->combo_kelas();
			$data = $cek->row();
			$d['nama_pos_keuangan'] = $data->nama_pos;
			$d['tahun_ajaran'] = $data->tingkat;
			$d['id_jenis_pembayaran'] = $id;
			$d['tipe_pembayaran'] = $data->tipe;
			$d['id_jenis_pembayaran'] = $id;
			$this->load->view('template', $d);
		}
	}

	public function tarif_kelas_save()
	{
		$data['id_kelas'] = $this->input->post("id_kelas");
		$data['id_jenis_pembayaran'] = $this->input->post("id_jenis_pembayaran");
		$this->db->query("DELETE FROM sr_pembayaran_bulanan WHERE id_kelas = $data[id_kelas] AND id_jenis_pembayaran = $data[id_jenis_pembayaran]");
		$q_siswa = $this->db->query("SELECT idsiswa as id_siswa FROM sr_siswa WHERE idkelas = $data[id_kelas]");
		if ($q_siswa->num_rows() > 0) {
			foreach ($q_siswa->result_array() as $d_siswa) {
				$q_bulan = $this->db->query("SELECT * FROM sr_bulan ORDER BY id_bulan ASC");
				foreach ($q_bulan->result_array() as $d_bulan) {
					$data['id_siswa'] = $d_siswa['id_siswa'];
					$data['tanggal'] = date('Y-m-d');
					$data['akun'] = $this->input->post("akun");
					$data['unit'] = $this->session->userdata('unit');
					$data['bulan'] = $this->input->post("nama_bulan_" . $d_bulan['nama_bulan']);
					$data['tagihan'] = $this->input->post("tagihan_" . $d_bulan['nama_bulan']);
					$this->db->insert("sr_pembayaran_bulanan", $data);
				}
			}
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Berhasil Update Tarif Pembayaran
			</div>");
			redirect("keuangan/tarif_pembayaran/" . $data['id_jenis_pembayaran'] . "/" . $data['id_kelas']);
		} else {
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Gagal Input. Data Siswa Tidak Ditemukan Pada Kelas Tersebut
			</div>");
			redirect("keuangan/tarif_pembayaran/" . $data['id_jenis_pembayaran'] . "/" . $data['id_kelas']);
		}
	}
	public function tarif_kelas_save_bebas() {
		$in['id_kelas'] = $this->input->post("id_kelas");
		$in['id_jenis_pembayaran'] = $this->input->post("id_jenis_pembayaran");
		$this->db->query("DELETE FROM sr_pembayaran_bebas WHERE id_kelas = $in[id_kelas] AND id_jenis_pembayaran = $in[id_jenis_pembayaran]");
		$q_siswa = $this->db->query("SELECT idsiswa as id_siswa FROM sr_siswa WHERE idkelas = $in[id_kelas]");
		if($q_siswa->num_rows() > 0) {
			foreach($q_siswa->result_array() as $d_siswa) {
				$in['id_siswa'] = $d_siswa['id_siswa'];
				$in['tanggal'] = date('Y-m-d');
				$in['akun'] = $this->input->post("akun");
				$in['unit'] = $this->session->userdata('unit');
				$in['tagihan'] = $this->input->post("tagihan");
				$this->db->insert("sr_pembayaran_bebas",$in);
			}
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Berhasil Update Tarif Pembayaran
			</div>");
			redirect("keuangan/tarif_pembayaran/".$in['id_jenis_pembayaran']."/".$in['id_kelas']);
		} else {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Gagal Input. Data Siswa Tidak Ditemukan Pada Kelas Tersebut
			</div>");
			redirect("keuangan/tarif_pembayaran/".$in['id_jenis_pembayaran']."/".$in['id_kelas']);
		}
	}
	public function tarif_siswa_save_bebas() {
		$post = $this->input->post();
		$in['id_kelas'] = $this->input->post("id_kelas");
		$in['id_siswa'] = $this->input->post("id_siswa");
		$in['akun'] = $this->input->post("akun");
		$in['unit'] = $this->session->userdata('unit');
		$in['tanggal'] = date('Y-m-d');
		$in['id_jenis_pembayaran'] = $this->input->post("id_jenis_pembayaran");
		$this->db->query("DELETE FROM sr_pembayaran_bebas WHERE id_kelas = $in[id_kelas] AND id_jenis_pembayaran = $in[id_jenis_pembayaran] AND id_siswa = $in[id_siswa]");
		$in['tagihan'] = $this->input->post("tagihan1");
		$this->db->insert("sr_pembayaran_bebas",$in);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Berhasil Update Tarif Pembayaran
			</div>");
		redirect("keuangan/tarif_pembayaran/".$in['id_jenis_pembayaran']."/".$in['id_kelas']);
	}

	public function tarif_pembayaran_siswa($id) {
		$cek = $this->db->query("select sr_pos_pembayaran.nama_pos,sr_account.keterangan,sr_jenis_bayar.tingkat,tipe,sr_jenis_bayar.id_jenis_bayar from sr_jenis_bayar
			left join sr_pos_pembayaran on sr_jenis_bayar.id_pos = sr_pos_pembayaran.id_pos
			left join sr_account on sr_pos_pembayaran.kode_akun = sr_pos_pembayaran.kode_akun
			 where id_jenis_bayar = $id group by sr_jenis_bayar.id_pos");
		if($cek->num_rows() > 0) {
			$d['judul'] = "Tarif Pembayaran";
			$d['page'] = 'tarif_bayar_siswa';
			$d['combo_kelas'] = $this->doc_jenisbayar->combo_kelas();
			$data = $cek->row();
			$d['nama_pos_keuangan'] = $data->nama_pos;
			$d['tahun_ajaran'] = $data->tingkat;
			$d['id_jenis_pembayaran'] = $id;
			$d['tipe_pembayaran'] = $data->tipe;
			$d['id_jenis_pembayaran'] = $id;
			$this->load->view('template',$d);
		} else {
			$this->load->view('template');
		}
	}
	public function tarif_siswa_save() {
		$data['id_kelas'] = $this->input->post("id_kelas");
		$data['id_siswa'] = $this->input->post("id_siswa");
		$data['id_jenis_pembayaran'] = $this->input->post("id_jenis_pembayaran");
		$this->db->query("DELETE FROM sr_pembayaran_bulanan WHERE id_kelas = $data[id_kelas] AND id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $data[id_siswa]");
		$q_bulan = $this->db->query("SELECT * FROM sr_bulan ORDER BY id_bulan ASC");
		foreach($q_bulan->result_array() as $d_bulan) {
			$data['bulan'] = $this->input->post("nama_bulan_".$d_bulan['nama_bulan']);
			$data['tagihan'] = $this->input->post("tagihan_".$d_bulan['nama_bulan']);
			$data['tanggal'] = date('Y-m-d');
			$data['akun'] = $this->input->post("akun");
			$data['unit'] = $this->session->userdata('unit');
			$this->db->insert("sr_pembayaran_bulanan",$data);
		}
		$this->session->set_flashdata("success","Berhasil Update Tarif Pembayaran");
		redirect("keuangan/tarif_pembayaran/".$data['id_jenis_pembayaran']."/".$data['id_kelas']);

	}


	public function proses_tarif() {
		$id_jenis_pembayaran = $this->input->post("id_jenis_pembayaran");
		$id_kelas = $this->input->post("id_kelas");
		redirect("keuangan/tarif_pembayaran/".$id_jenis_pembayaran."/".$id_kelas);
	}
	public function ajax_tarif_detail() {
		$id_siswa = $_GET['id_siswa'];
		$id_kelas = $_GET['id_kelas'];
		$id_jenis_pembayaran = $_GET['id_jenis_pembayaran'];
		$q = $this->db->query("SELECT * FROM sr_pembayaran_bulanan WHERE id_kelas = $id_kelas AND id_siswa = $id_siswa AND id_jenis_pembayaran = $id_jenis_pembayaran");
		echo '<table class="table">
					<tr>
						<th>Bulan</th>
						<th>Tarif (Rp)</th>
					</tr>';
		foreach($q->result_array() as $data) {
			echo '<tr>
					<td>'.$data['bulan'].'</td>
					<td>'.number_format($data['tagihan']).'</td>
				  </tr>';
		}
		echo '</table>';
	}
	public function tarif_pembayaran_hapus($id_siswa,$id_kelas,$id_jenis_pembayaran) {
		$this->db->query("DELETE FROM sr_pembayaran_bulanan WHERE id_kelas = $id_kelas AND id_jenis_pembayaran = $id_jenis_pembayaran AND id_siswa = $id_siswa");
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Hapus Pembayaran Berhasil
			</div>");
		redirect("keuangan/tarif_pembayaran/".$id_jenis_pembayaran."/".$id_kelas);
	}
	public function tarif_pembayaran_hapus_bebas($id_siswa,$id_kelas,$id_jenis_pembayaran) {
		$this->db->query("DELETE FROM sr_pembayaran_bebas WHERE id_kelas = $id_kelas AND id_jenis_pembayaran = $id_jenis_pembayaran AND id_siswa = $id_siswa");
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Hapus Pembayaran Berhasil
			</div>");
		redirect("keuangan/tarif_pembayaran/".$id_jenis_pembayaran."/".$id_kelas);
	}
	public function ajax_combo_siswa() {
		$id_kelas = $_GET['id_kelas'];
		$q = $this->db->query("SELECT s_nisn as nis,idsiswa as id_siswa, s_nama as nama_siswa FROM sr_siswa WHERE idkelas = $id_kelas");
		foreach($q->result_array() as $data) {
			echo '<option value="'.$data['id_siswa'].'">'.$data['nis'].' - '.$data['nama_siswa'].'</option>';
		}
	}

	public function setting_hutang()
	{
		$data['page'] = 'setting_hutang';
		$this->load->view('template', $data);
	}

	public function pos_hutang()
	{
		$data['page'] = 'pos_hutang';
		$this->load->view('template', $data);
	}

	public function bayar_hutang()
	{
		$data['page'] = 'bayar_hutang';
		$this->load->view('template', $data);
	}

	public function kirim_tagihan()
	{
		$data['page'] = 'kirim_tagihan';
		$this->load->view('template', $data);
	}

	public function slip_gaji()
	{
		$data['page'] = 'slip_gaji';
		$this->load->view('template', $data);
	}

	//akun biaya
	public function akun_biaya()
	{
		$data['unit'] = $this->session->userdata('unit');
		$data['page'] = 'akun_biaya';
		$data["list"] = $this->doc_account->getAll();
		$this->load->view('template', $data);
	}

	public function akun_biaya_utama_add()
	{
		$data['page'] = 'akun_biaya_utama_add';
		$this->load->view('template', $data);
	}

	public function save_akun_biaya_utama()
	{
		$akun_biaya = $this->doc_account;
		$validation = $this->form_validation;
		$akun_biaya->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('keuangan/akun_biaya');
	}
	public function update_akun_biaya(){
		$akun_biaya = $this->doc_account;
		$validation = $this->form_validation;
		$akun_biaya->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('keuangan/akun_biaya');

	}

	public function delete_akun_biaya()
	{
		$id_akun = $this->input->post('id_akun');
		$this->doc_account->delete($id_akun);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('keuangan/akun_biaya');
	}

//	pajak keuangan
	public function pajak_keuangan()
	{
		$data['page'] = 'pajak_keuangan';
		$data["list"] = $this->doc_pajak->getAll();
		$this->load->view('template', $data);
	}
	public function pajak_update($id = null)
	{
		$product = $this->doc_pajak;
		$product->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");
		redirect('keuangan/pajak_keuangan');
	}
	public function save_pajak_keuangan()
	{
		$pajak_keuangan = $this->doc_pajak;
		$validation = $this->form_validation;
//		$validation->set_rules($pajak_keuangan->rules());
//		if ($validation->run()) {
		$pajak_keuangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('keuangan/pajak_keuangan');
	}

	public function delete_pajak_keuangan()
	{
		$id_pajak = $this->input->post('id_pajak');

//		dump die id pajak
		$this->doc_pajak->delete($id_pajak);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('keuangan/pajak_keuangan');
	}
	public function radar()
	{
		$data['page'] = 'nilai_radar';
		$this->load->view('template', $data);
	}

	public function rincian()
	{
		$data['page'] = 'nilai_rincian';
		$this->load->view('template', $data);
	}

	public function cetak_rapor()
	{
		$data['page'] = 'cetak_rapor';
		$this->load->view('template', $data);
	}

	public function kehadiran_siswa()
	{
		$data['page'] = 'kehadiran_siswa';
		$this->load->view('template', $data);
	}

	//ajax list datatable doc_acount
	public function ajax_list()
	{
		$list = $this->doc_acount->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $doc_acount) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $doc_acount->kode_akun;
			$row[] = $doc_acount->jenis_akun;
			$row[] = $doc_acount->kategori;
			$row[] = $doc_acount->keterangan;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->doc_acount->count_all(),
			"recordsFiltered" => $this->doc_acount->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

//template crud
//
//	public function index()
//	{
//		$data["products"] = $this->product_model->getAll();
//		$this->load->view("admin/product/list", $data);
//	}
//
//	public function add()
//	{
//		$product = $this->product_model;
//		$validation = $this->form_validation;
//		$validation->set_rules($product->rules());
//
//		if ($validation->run()) {
//			$product->save();
//			$this->session->set_flashdata('success', 'Berhasil disimpan');
//		}
//
//		$this->load->view("admin/product/new_form");
//	}
//
//	public function edit($id = null)
//	{
//		if (!isset($id)) redirect('admin/products');
//
//		$product = $this->product_model;
//		$validation = $this->form_validation;
//		$validation->set_rules($product->rules());
//
//		if ($validation->run()) {
//			$product->update();
//			$this->session->set_flashdata('success', 'Berhasil disimpan');
//		}
//
//		$data["product"] = $product->getById($id);
//		if (!$data["product"]) show_404();
//
//		$this->load->view("admin/product/edit_form", $data);
//	}
//
//	public function delete($id=null)
//	{
//		if (!isset($id)) show_404();
//
//		if ($this->product_model->delete($id)) {
//			redirect(site_url('admin/products'));
//		}
//	}

}
