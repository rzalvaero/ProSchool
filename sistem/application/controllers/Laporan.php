<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
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

	public function laporan_jurnal_kas()
	{
		$data['page']  	= 'laporan_jurnal_kas';
		$this->load->view('template',$data);
	}

	public function laporan_kas_bank()
	{
		$data['page']  	= 'laporan_kas_bank';
		$this->load->view('template',$data);
	}
	public function laporan_unit_pos()
	{
		$data['page']  	= 'laporan_unit_pos';
		$this->load->view('template',$data);
	}
	public function laporan_neraca()
	{
		$data['page']  	= 'laporan_neraca';
		$this->load->view('template',$data);
	}
	public function laporan_gaji()
	{
		$data['page']  	= 'laporan_gaji';
		$this->load->view('template',$data);
	}
	public function bukti_biaya_transfer_wali_murid()
	{
		$data['page']  	= 'bukti_biaya_transfer_wali_murid';
		$this->load->view('template',$data);
	}
	public function saldo_awal()
	{
		$data['page']  	= 'saldo_awal';
		$this->load->view('template',$data);
	}
	public function saldo_keluar()
	{
		$data['page']  	= 'saldo_keluar';
		$this->load->view('template',$data);
	}
	public function kas_masuk()
	{
		$data['page']  	= 'kas_masuk';
		$this->load->view('template',$data);
	}


	public function jenis_pembayaran()
	{
		$data['page']  	= 'jenis_pembayaran';
		$this->load->view('template',$data);
	}
	public function setting_hutang()
	{
		$data['page']  	= 'setting_hutang';
		$this->load->view('template',$data);
	}
	public function pos_hutang()
	{
		$data['page']  	= 'pos_hutang';
		$this->load->view('template',$data);
	}
	public function bayar_hutang()
	{
		$data['page']  	= 'bayar_hutang';
		$this->load->view('template',$data);
	}
	public function kirim_tagihan()
	{
		$data['page']  	= 'kirim_tagihan';
		$this->load->view('template',$data);
	}
	public function slip_gaji()
	{
		$data['page']  	= 'slip_gaji';
		$this->load->view('template',$data);
	}
	public function akun_biaya()
	{
		$data['page']  	= 'akun_biaya';
		$this->load->view('template',$data);
	}
	public function pajak_keuangan()
	{
		$data['page']  	= 'pajak_keuangan';
		$this->load->view('template',$data);
	}

	public function radar()
	{
		$data['page']  	= 'nilai_radar';
		$this->load->view('template',$data);
	}

	public function rincian()
	{
		$data['page']  	= 'nilai_rincian';
		$this->load->view('template',$data);
	}

	public function cetak_rapor()
	{
		$data['page']  	= 'cetak_rapor';
		$this->load->view('template',$data);
	}

	public function kehadiran_siswa()
	{
		$data['page']  	= 'kehadiran_siswa';
		$this->load->view('template',$data);
	}

}
