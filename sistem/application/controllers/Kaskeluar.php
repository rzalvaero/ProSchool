<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kaskeluar extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		$this->load->model('doc_ekstra');
		$this->load->model('doc_butir_sikap');
		$this->load->model('doc_tarif_gaji_user');
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
	public function kas_keluar()
	{
//		query getAll model
		$data['page']  	= 'kaskeluar';
		$this->load->view('template',$data);
	}
	public function savekeluar()
	{
		$post = $this->input->post();

		$tanggal = $this->input->post('tanggal');
		$no_ref = $this->input->post('no_ref');
//		kas kas
		$akun = $this->input->post('id_akun');
		$unit = $this->input->post('unit');
		$akunselect = $this->db->query("select * from sr_account where id_akun = '$akun'")->row();
		$unitselect = $this->db->query("select * from web_unit where id = '$unit'")->row();
//		kas biaya
		$akun_id = $this->input->post('akun');

		$keterangan = $this->input->post('keterangan');
		$nominal = $this->input->post('nominal');
		$total = $this->input->post('total_input');
		foreach ($akun_id as $key => $val) {
			$select = $this->db->query("select * from sr_invoice_body where id_akun = '$akun_id[$key]' order by id_invoice desc")->row();
			if ($select->balance == null)
			{
				$saldo = '0';
			}else{
				$saldo = $select->balance;
			}
			$unitselectbeban = $this->db->query("select * from sr_account where id_akun = '$akun_id[$key]'")->row();
			$result[] = array(
				'no_ref'		=> $no_ref,
				"id_akun" 	    => $akun_id[$key],
				'nama_akun'		=> $unitselect->nama.'-'.$unitselectbeban->kode_akun.'-'.$unitselectbeban->keterangan,
				'tanggal'		=> $tanggal,
				'bulan'			=> strtotime('Y-m',$tanggal),
				'akun'		    => $unitselectbeban->keterangan[$key],
				'deskripsi'		=> 'Kas Keluar'.$unitselect->nama.'-'.$unitselectbeban->kode_akun.'-'.$unitselectbeban->keterangan.'-'.$keterangan,
				'credit'		=> $nominal[$key],
				'status'		=> 'keluar',
				'jenis'		    => 'keluar',
				'balance'		=> $saldo -  $post['nominal'][$key],
				'pajak'		=> '0',
				'unit_pos' => $post['unit_pos'][$key],
				'nominal'		=> $post['nominal'][$key],
				'debet'		=> '0',
				'akun_kas'		=> $post['id_akun'],
				'nama_akun_kas'		=> $akunselect->keterangan
			);
		}
		$this->db->insert_batch('sr_invoice_body', $result);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");
		redirect('keuangan/saldo_keluar');
		//MULTIPLE INSERT TO DETAIL TABLE

//		multiple insert
	}
	public function setting_ekstra_update($id = null)
	{
		$product = $this->doc_ekstra;
		$product->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");
		redirect('ekstra/ekstra');
	}
	public function save_ektra()
	{
		$tunjangan = $this->doc_ekstra;
		$tunjangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('ekstra/ekstra');
	}

	public function delete_ekstra()
	{
		$id_setting_tunjangan = $this->input->post('idekstra');

//		dump die id pajak
		$this->doc_ekstra->delete($id_setting_tunjangan);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('ekstra/ekstra');
	}
}
