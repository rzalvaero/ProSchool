<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabungan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('core');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		$this->load->model('doc_pembayaransiswa');
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

	public function tabungan($tahun_ajaran="",$nis="")
	{
		if(!empty($nis) && !empty($tahun_ajaran)) {
			$cek = $this->db->query("SELECT s_nisn as nis,s_nama as nama_siswa,k_keterangan as nama_kelas,idsiswa as id_siswa, web_unit.nama,web_unit.id FROM sr_siswa
    INNER JOIN sr_kelas sk on sr_siswa.idkelas = sk.idkelas
	join web_unit on web_unit.id = sr_siswa.unit
	WHERE s_nisn = '$nis'");
			if($cek->num_rows() > 0) {
				$data = $cek->row();
				$d['tahun_ajaran'] = $tahun_ajaran;
				$d['nis'] = $data->nis;
//				$d['foto'] = $data->foto;
				$d['nama_siswa'] = $data->nama_siswa;
				$d['nama_kelas'] = $data->nama_kelas;
				$d['unit'] = $data->nama;
				$d['unit_id'] = $data->id;
				$d['id_siswa'] = $data->id_siswa;

//				$d['jenis_pembayaran_bulanan'] = $this->doc_pembayaransiswa->jenis_pembayaran_bulanan($tahun_ajaran,$data->id_siswa);
//				$d['jenis_pembayaran_bebas'] = $this->doc_pembayaransiswa->jenis_pembayaran_bebas($tahun_ajaran,$data->id_siswa);
//				$d['pembayaran_bulanan'] = $this->doc_pembayaransiswa->pembayaran_siswa_bulanan($tahun_ajaran,$data->id_siswa);
//				$d['pembayaran_bebas'] = $this->doc_pembayaransiswa->pembayaran_siswa_bebas($tahun_ajaran,$data->id_siswa);
//				$d['pembayaran_bulanan_terakhir'] = $this->doc_pembayaransiswa->pembayaran_bulanan_terakhir($tahun_ajaran,$data->id_siswa);
//				$d['pembayaran_bebas_terakhir'] = $this->doc_pembayaransiswa->pembayaran_bebas_terakhir($tahun_ajaran,$data->id_siswa);
			} else {
				echo '<script>
						alert("Data siswa tidak ditemukan");
						document.location.href="'.base_url().'pembayaran/pembayaran";
					  </script>';
			}
		} else {
			$d['tampil'] = false;
		}
		$d['page'] = 'tabungan';
		$this->load->view('template', $d);
	}
	public function proses_cari_tabungan_siswa() {
		$nis = $this->input->post("nis");
		$db = $this->db->query("select * from sr_siswa where s_nisn = '$nis'")->result();
		$tahun_ajaran = $this->input->post("tahun_ajaran");
		redirect("tabungan/tabungan/".$tahun_ajaran."/".$nis);
	}
	public function savesetor()
	{
		$tahun_ajaran = $this->input->post("tingkat");
		$id_siswa = $this->input->post("idsiswa");
		$nominal = $this->input->post("debet");
		$tanggal = $this->input->post("tanggal");
		$unit = $this->input->post("unit");
		$catatan = $this->input->post("catatan");
		$db = $this->db->query("select * from sr_siswa where s_nisn = '$id_siswa'")->row();
		$saldo = $this->db->query("select saldo as saldo from sr_tabungan where idsiswa = '$id_siswa' and tingkat = '$tahun_ajaran'order by idtabungan DESC")->row();
		if ($saldo->saldo == null) {
			$saldo = 0;
		} else {
			$saldo = $saldo->saldo;
		}
		$data = array(
			"tingkat" => $tahun_ajaran,
			"idsiswa" => $id_siswa,
			"debet" => $nominal,
			'credit' => 0,
			'unit' => $unit	,
			"tanggal" => $tanggal,
			"catatan" => $catatan,
			"deskripsi" => "Setor Tabungan".'-'.$nominal."-".$tanggal.'-'.$db->s_nama,
			"saldo" => $saldo + $nominal,
		);
		$this->db->insert("sr_tabungan",$data);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('tabungan/tabungan');
	}
	public function savetarik()
	{
		$tahun_ajaran = $this->input->post("tingkat");
		$id_siswa = $this->input->post("idsiswa");
		$nominal = $this->input->post("credit");
		$tanggal = $this->input->post("tanggal");
		$unit = $this->input->post("unit");
		$catatan = $this->input->post("catatan");
		$db = $this->db->query("select * from sr_siswa where s_nisn = '$id_siswa'")->row();
		$saldo = $this->db->query("select saldo as saldo from sr_tabungan where idsiswa = '$id_siswa' and tingkat = '$tahun_ajaran' order by idtabungan DESC")->row();
		if ($saldo->saldo == null) {
			$saldo = 0;
		} else {
			$saldo = $saldo->saldo;
		}
		$data = array(
			"tingkat" => $tahun_ajaran,
			"idsiswa" => $id_siswa,
			"credit" => $nominal,
			"debet" => '0',
			'unit' => $unit	,
			"tanggal" => $tanggal,
			"catatan" => $catatan,
			"deskripsi" => "Setor Tabungan".'-'.$nominal."-".$tanggal.'-'.$db->s_nama,
			"saldo" => $saldo - $nominal,
		);
		$this->db->insert("sr_tabungan",$data);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('tabungan/tabungan');
	}
	public function cetaktabungan($tahun_ajaran="",$nis="")
	{

		$tahun_ajaran = $this->input->post("tingkat");
		$id_siswa = $this->input->post("nis");
		$tanggal = $this->input->post("tanggal");
		$unit = $this->input->post("unit");
		if(!empty($tahun_ajaran) && !empty($id_siswa) && !empty($tanggal)){

//		select * from tabungan
		$d['list'] = $this->db->query("select * from sr_tabungan join sr_siswa on sr_siswa.s_nisn = sr_tabungan.idsiswa where sr_tabungan.idsiswa = '$id_siswa' and sr_tabungan.tingkat = '$tahun_ajaran' and sr_tabungan.tanggal ='$tanggal'order by idtabungan desc limit 1")->row();
		$sekolah = $this->db->query("SELECT * FROM web_sekolah where unit='$unit' ")->row();
		$siswa = $this->db->query("select s_nama as nama_siswa, k_romawi as nama_kelas, s_nisn as nis,idsiswa as id_siswa from sr_siswa
join sr_kelas on sr_siswa.idkelas = sr_kelas.idkelas WHERE s_nisn = '$id_siswa'")->row();
		$d['nama_siswa'] = $siswa->nama_siswa;
		$d['nama_kelas'] = $siswa->nama_kelas;
		$d['nis'] = $siswa->nis;
		$d['id_siswa'] = $siswa->id_siswa;
		$d['nama_sekolah'] = $sekolah->nama_sekolah;
		$d['alamat'] = $sekolah->alamat;
		$d['no_telepon'] = $sekolah->no_telepon;
		$d['email'] = $sekolah->email;
		$d['logo'] = $sekolah->logo;
		$this->load->view("cetak/cetak_tabungan",$d);
		}else{

			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Siswa Tidak Ada
			</div>");
			redirect('tabungan/tabungan');
		}
	}
	public function tabunganall($awal="",$akhir="",$unit="",$idkelas="",$idsiswa="")
	{
		if (!empty($awal)&& !empty($akhir) && !empty($unit)  ){

			if ($idkelas != '0' && $idsiswa == '0'){
				$data = $this->db->query("select sum(debet) as debet , sum(credit) as credit,saldo,sr_siswa.*,sr_kelas.k_romawi from sr_tabungan
				join sr_siswa on sr_siswa.s_nisn = sr_tabungan.idsiswa
				join sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas
				where sr_tabungan.unit = '$unit' and sr_siswa.idkelas = '$idkelas'  and tanggal between '$awal' and '$akhir'
				group by sr_tabungan.idsiswa");
			}elseif ($idsiswa != '0' && $idkelas == '0') {
				$data = $this->db->query("select sum(debet) as debet , sum(credit) as credit,saldo,sr_siswa.*,sr_kelas.k_romawi from sr_tabungan
				join sr_siswa on sr_siswa.s_nisn = sr_tabungan.idsiswa
				join sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas
				where sr_tabungan.unit = '$unit' and sr_tabungan.idsiswa='$idsiswa'  and tanggal between '$awal' and '$akhir'
				group by sr_tabungan.idsiswa");

			}elseif($idsiswa != '0' && $idkelas != '0')
			{
				$data = $this->db->query("select sum(debet) as debet , sum(credit) as credit,saldo,sr_siswa.*,sr_kelas.k_romawi from sr_tabungan
				join sr_siswa on sr_siswa.s_nisn = sr_tabungan.idsiswa
				join sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas
				where sr_tabungan.unit = '$unit' and sr_tabungan.idsiswa='$idsiswa' and sr_siswa.idkelas = '$idkelas' and tanggal between '$awal' and '$akhir'
				group by sr_tabungan.idsiswa");

			}else {

			$data = $this->db->query("select sum(debet) as debet , sum(credit) as credit,saldo,sr_siswa.*,sr_kelas.k_romawi from sr_tabungan
				join sr_siswa on sr_siswa.s_nisn = sr_tabungan.idsiswa
				join sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas
				where sr_tabungan.unit = '$unit'  and tanggal between '$awal' and '$akhir'
				group by sr_tabungan.idsiswa");
			}

			if($data->num_rows() > 0) {
				$d['list'] = $data->result();
			} else {
				echo '<script>
						alert("Data siswa tidak ditemukan");
						document.location.href="'.base_url().'tabungan/tabunganall";
					  </script>';
			}
		} else {
			$d['tampil'] = false;
		}
		$d['page'] = 'tabunganall';
		$this->load->view('template', $d);
	}
	public function cetaktabunganall($awal="",$akhir="",$unit="",$idkelas="",$idsiswa="")
	{
		if (!empty($awal)&& !empty($akhir) && !empty($unit)  ){

			if ($idkelas != '0' && $idsiswa == '0'){
				$data = $this->db->query("select sum(debet) as debet , sum(credit) as credit,saldo,sr_siswa.*,sr_kelas.k_romawi from sr_tabungan
				join sr_siswa on sr_siswa.s_nisn = sr_tabungan.idsiswa
				join sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas
				where sr_tabungan.unit = '$unit' and sr_siswa.idkelas = '$idkelas'  and tanggal between '$awal' and '$akhir'
				group by sr_tabungan.idsiswa");
			}elseif ($idsiswa != '0' && $idkelas == '0') {
				$data = $this->db->query("select sum(debet) as debet , sum(credit) as credit,saldo,sr_siswa.*,sr_kelas.k_romawi from sr_tabungan
				join sr_siswa on sr_siswa.s_nisn = sr_tabungan.idsiswa
				join sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas
				where sr_tabungan.unit = '$unit' and sr_tabungan.idsiswa='$idsiswa'  and tanggal between '$awal' and '$akhir'
				group by sr_tabungan.idsiswa");

			}elseif($idsiswa != '0' && $idkelas != '0')
			{
				$data = $this->db->query("select sum(debet) as debet , sum(credit) as credit,saldo,sr_siswa.*,sr_kelas.k_romawi from sr_tabungan
				join sr_siswa on sr_siswa.s_nisn = sr_tabungan.idsiswa
				join sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas
				where sr_tabungan.unit = '$unit' and sr_tabungan.idsiswa='$idsiswa' and sr_siswa.idkelas = '$idkelas' and tanggal between '$awal' and '$akhir'
				group by sr_tabungan.idsiswa");

			}else {

				$data = $this->db->query("select sum(debet) as debet , sum(credit) as credit,saldo,sr_siswa.*,sr_kelas.k_romawi from sr_tabungan
				join sr_siswa on sr_siswa.s_nisn = sr_tabungan.idsiswa
				join sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas
				where sr_tabungan.unit = '$unit'  and tanggal between '$awal' and '$akhir'
				group by sr_tabungan.idsiswa");
			}

			if($data->num_rows() > 0) {
				$d['list'] = $data->result();
			} else {
				echo '<script>
						alert("Data siswa tidak ditemukan");
						document.location.href="'.base_url().'tabungan/tabunganall";
					  </script>';
			}
		} else {
			$d['tampil'] = false;
		}
		$d['page'] = 'cetakalltabungan';
		$this->load->view('template', $d);
	}
	public function proses_cari_tabungan() {
		$awal = $this->input->post("awal");
		$akhir = $this->input->post("akhir");
		$unit = $this->input->post("unit");
		$idkelas = $this->input->post("idkelas");
		$idsiswa = $this->input->post("idsiswa");
			redirect("tabungan/tabunganall/".$awal."/".$akhir."/".$unit."/".$idkelas."/".$idsiswa);
	}
	public function cetakidsiswa()
	{
		$siswa = $this->input->post("idsiswa");
		$d['list']= $this->db->query("select * from sr_tabungan join sr_siswa on sr_siswa.s_nisn = sr_tabungan.idsiswa where sr_tabungan.idsiswa = '$siswa' order by idtabungan asc")->result();
		$siswa_id = $this->db->query("select * from sr_siswa
	join sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas
join web_unit on web_unit.id = sr_siswa.unit
     WHERE s_nisn = '$siswa'")->row();
		$sekolah = $this->db->query("SELECT * FROM web_sekolah where unit='$siswa_id->unit' ")->row();

		$d['first_name'] = $siswa_id->s_nama;
		$d['kelas'] = $siswa_id->k_romawi;
		$d['nisn'] = $siswa_id->s_nisn;
		$d['unit'] = $siswa_id->nama;
		$d['nama_sekolah'] = $sekolah->nama_sekolah;
		$d['alamat'] = $sekolah->alamat;
		$d['no_telepon'] = $sekolah->no_telepon;
		$d['email'] = $sekolah->email;
		$d['page'] = 'cetaktabunganiduser';
		$this->load->view('template', $d);

	}
	}
