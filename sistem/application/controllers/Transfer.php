<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		$this->load->model('doc_setting_tunjangan');
		$this->load->model('doc_setting_potongan');
		$this->load->model('doc_setting_pendapatan_lain_lain');
		$this->load->model('doc_setting_gaji');
		$this->load->model('doc_tarif_gaji_user');
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
			redirect('auth/siswa');
		}
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function transfer($unit='',$akun="")
	{
//		query getAll model
		if(!empty($unit) && !empty($akun)) {
			$cek = $this->db->query("select * from sr_account join web_unit on web_unit.id = sr_account.unit where id_akun = '$akun' and unit= '$unit'");
			if($cek->num_rows() > 0) {
				$data = $cek->row();
				$d['keterangan'] = $data->keterangan;
				$d['kode_akun'] = $data->kode_akun;
				$d['nama_unit'] = $data->nama;
				$d['id_akun'] = $data->id_akun;
				$d['unit'] = $unit;
			} else {
				echo '<script>
						alert("Data siswa tidak ditemukan");
						document.location.href="'.base_url().'transfer/transfer";
					  </script>';
			}
		} else {
			$d['tampil'] = false;
		}
		$d['page'] = 'transfer';
		$this->load->view('template', $d);
	}
	public function savetransfer ()
	{
		try {
			$akunfrom = $this->db->query("select * from sr_invoice_body where id_akun = '".$this->input->post('akunfrom')."' order by id_invoice desc")->row();
			$akunto = $this->db->query("select * from sr_invoice_body where id_akun = '".$this->input->post('akun_tujuan')."'order by id_invoice desc")->row();
			$akunacount = $this->db->query("select * from sr_account where id_akun = '".$this->input->post('akunfrom')."'")->row();
			$akuntoacount = $this->db->query("select * from sr_account where id_akun = '".$this->input->post('akun_tujuan')."'")->row();
			$unit = $this->input->post('unit');
			$selectunit = $this->db->query("select * from web_unit where id = '$unit'")->row();
			$data = array(
				'nama_akun' => $selectunit->nama.' - '.$this->input->post('keterangan'),
				'tanggal' => $this->input->post('tanggal'),
				'bulan' =>date('Y-m', strtotime($this->input->post('tanggal'))),
				'akun' => $akunacount->keterangan,
				'deskripsi' => 'transfer dari akun '.$akunacount->keterangan.' ke akun '.$akuntoacount->keterangan,
				'id_akun' => $this->input->post('akunfrom'),
				'no_ref' => 'transfer'.	$this->input->post('tanggal').$this->input->post('akunfrom').'-'.$this->input->post('akun_tujuan'),
				'credit' => $this->input->post('nominal'),
				'status' => 'transfer',
				'jenis' => 'transfer in',
				'balance' => $akunfrom->balance - $this->input->post('nominal'),
				'pajak' => '0',
				'unit_pos' => '',
				'nominal' => $this->input->post('nominal'),
				'debet' => '0',
				'akun_kas' => $this->input->post('akun_tujuan'),
				'nama_akun_kas' => $akuntoacount->keterangan,
			);
			$this->db->insert('sr_invoice_body', $data);

			$datato = array(
				'nama_akun' => $selectunit->nama.' - '.$this->input->post('keterangan'),
				'tanggal' => $this->input->post('tanggal'),
				'bulan' =>date('Y-m', strtotime($this->input->post('tanggal'))),
				'akun' => $akunacount->keterangan,
				'deskripsi' => 'transfer dari akun '.$akunacount->keterangan.' ke akun '.$akuntoacount->keterangan,
				'id_akun' => $this->input->post('akun_tujuan'),
				'no_ref' => 'transfer'.	$this->input->post('tanggal').$this->input->post('akunfrom').'-'.$this->input->post('akun_tujuan'),
				'credit' => '0',
				'status' => 'transfer',
				'jenis' => 'transfer out',
				'balance' => $akunto->balance + $this->input->post('nominal'),
				'pajak' => '0',
				'unit_pos' => '',
				'nominal' => $this->input->post('nominal'),
				'debet' => $this->input->post('nominal'),
				'akun_kas' => $this->input->post('akun_tujuan'),
				'nama_akun_kas' => $akuntoacount->keterangan,
			);
			$this->db->insert('sr_invoice_body', $datato);

			$datahistory = array(
				'akun_sumber' => $this->input->post('akunfrom'),
				'akun_tujuan' => $this->input->post('akun_tujuan'),
				'nominal' => $this->input->post('nominal'),
				'unit' => $unit,
				'id_user' => $this->session->userdata('first_name'),
				'tanggal' => $this->input->post('tanggal'),
				'keterangan' =>  'transfer dari akun '.$akunacount->keterangan.' ke akun '.$akuntoacount->keterangan
			);
			$this->db->insert('sr_history_transfer', $datahistory);

			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
			redirect('transfer/transfer');
		} catch (Exception $e) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			$e->getMessage()
			</div>");
			redirect('transfer/transfer');
		}








	}

	public function proses_transfer($unit='',$akun="")
	{
		$unit = $this->input->post("unit");
		$db = $this->db->query("select * from sr_account where id_akun = '$akun'")->result();
		$akun = $this->input->post("akun");
		redirect("transfer/transfer/".$unit."/".$akun);
	}
}
