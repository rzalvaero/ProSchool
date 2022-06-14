<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		$this->load->model('doc_kkm');
		$this->load->model('doc_interval');
		$this->load->model('core');
		$this->load->model('doc_guru');
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
			redirect('auth/siswa');
		}
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function master_kkm()
	{
//		query getAll model
		$data['list'] = $this->doc_kkm->getAll();
		$data['page'] = 'master_kkm';
		$this->load->view('template', $data);
	}

//	fungtion untuk menampilkan users join sr_users join web_unit where sr_users = idusers

	public function kkm_update($id = null)
	{
		$product = $this->doc_kkm;
		$product->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");
		redirect('master/master_kkm');
	}

	public function save_kkm()
	{
		$tunjangan = $this->doc_kkm;
		$tunjangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('master/master_kkm');
	}

	public function delete_kkm()
	{
		$kkm = $this->input->post('idkkm');
//		dump die id pajak
		$this->doc_kkm->delete($kkm);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('master/master_kkm');
	}
	public function ajax_combo_kelas() {
		$unit = $_GET['unit'];
		$q = $this->db->query("SELECT * FROM sr_kelas WHERE unit = $unit");
		foreach($q->result_array() as $data) {
			echo '<option value="'.$data['idkelas'].'">'.$data['k_romawi'].' - '.$data['k_keterangan'].'</option>';
		}
	}
	public function ajax_combo_mata_pelajaran() {
		$unit = $_GET['unit'];
		$q = $this->db->query("SELECT * FROM sr_mata_pelajaran WHERE unit = $unit order by mp_nama asc");
		foreach($q->result_array() as $data) {
			echo '<option value="'.$data['idmata_pelajaran'].'">'.$data['mp_nama'].'</option>';
		}
	}

	public function master_inteval()
	{
		$data['list'] = $this->doc_interval->getAll();
		$data['page'] = 'master_interval';
		$this->load->view('template', $data);
	}
	public function ajax_combo_kkm() {
		$unit = $_GET['unit'];
		$q = $this->db->query("select k_romawi,k_keterangan,mp_nama,k_kkm,sr_kkm.* from sr_kkm
left join sr_kelas on sr_kkm.idkelas = sr_kelas.idkelas
left join sr_mata_pelajaran on sr_mata_pelajaran.idmata_pelajaran = sr_kkm.idmata_pelajaran
where sr_kkm.unit = '$unit'
order by k_romawi asc ");
		echo '<option value="">-- Pilih KKM --</option>';
		foreach($q->result_array() as $data) {
			echo '<option value="'.$data['idkkm'].'">' .'kelas :'. '' .$data['k_romawi'].' - '.$data['k_keterangan'].'-'.'Mata-pelajaran :'.$data['mp_nama'].'-'.'KKM :'.$data['k_kkm']. '</option>';
		}
	}
	public function read_interval($idkkm = null)
	{
		$q = $this->db->query("select k_romawi,k_keterangan,mp_nama,k_kkm,idkkm from sr_kkm
left join sr_kelas on sr_kkm.idkelas = sr_kelas.idkelas
left join sr_mata_pelajaran on sr_mata_pelajaran.idmata_pelajaran = sr_kkm.idmata_pelajaran
where sr_kkm.idkkm = '$idkkm'")->row();
		if($q==''){
			return false;
		}
		$kkm = $q->idkkm;
		$nilai_kkm = $q->k_kkm;
		$interval = (100 - $nilai_kkm)/3;
		echo '
			<div class="form-group">
				<label class="col-sm-6 control-label">Interval = (nilai max - kkm / 3)</label>
				<div class="col-sm-10">
				<input type="text" value="'.$kkm.'" name="idkkm" hidden>
					<input type="text" class="form-control" value="'.$interval.' => antara '.floor($interval).' atau '.ceil($interval).'" readonly>
				</div>
			</div>
			';

	}
	public function save_predikat()
	{
		$tunjangan = $this->doc_interval;
		$tunjangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('master/master_inteval');
	}
	public function delete_interval()
	{
		$kkm = $this->input->post('idinterval_predikat');
		$this->doc_interval->delete($kkm);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('master/master_inteval');
	}



}
