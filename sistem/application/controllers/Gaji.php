<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller
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

	public function setting_gaji()
	{
//		query getAll model
		$data['list'] = $this->doc_setting_gaji->getAll();
		$data['page'] = 'setting_gaji';
		$this->load->view('template', $data);
	}

//	fungtion untuk menampilkan users join sr_users join web_unit where sr_users = idusers
	public function tarif_gaji_detail($id_user = null)
	{
//user_id parameter get
		$jml = $this->db->query("SELECT * FROM sr_akun_gaji WHERE id_user = '$id_user'")->num_rows();
		if($jml > 0){
			$db = $this->db->query("select * from sr_account 
    join sr_akun_gaji on sr_akun_gaji.akun_gaji = sr_account.id_akun 
			where modul_keuangan = 'biaya'
 		 and id_user = '$id_user'")->row();
			$data['list_akun'] = $db;
			$data['account'] = $this->doc_setting_gaji->account();
		}else{
			$data['account'] = $this->doc_setting_gaji->account();

		}
//		if sr_akun_gaji where id_user not_null

// query tunjangan
		$data['tunjangan'] = $this->doc_tarif_gaji_user->tunjangan();
		$data['potongan'] = $this->doc_tarif_gaji_user->potongan();
		$data['lain'] = $this->doc_tarif_gaji_user->lain();
		$data['list'] = $this->doc_setting_gaji->getById($id_user);
		$data['page'] = 'tarif_gaji_detail';
		$this->load->view('template', $data);
		if ($this->input->post('id_tunjangan')) {
			$this->doc_tarif_gaji_user->save();
			redirect('gaji/setting_gaji');
		} elseif ($this->input->post('id_potongan')) {
			$this->doc_tarif_gaji_user->savepotongan();
			redirect('gaji/setting_gaji');
		}
	}

//	tunjangan
	public function setting_tunjangan()
	{
		$data['page'] = 'setting_tunjangan';
		$data['list'] = $this->doc_setting_tunjangan->getAll();
		$this->load->view('template', $data);
	}

	public function setting_tunjangan_update($id = null)
	{
		$product = $this->doc_setting_tunjangan;
		$product->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");
		redirect('gaji/setting_tunjangan');
	}

	public function save_setting_tunjangan()
	{
		$tunjangan = $this->doc_setting_tunjangan;
		$tunjangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('gaji/setting_tunjangan');
	}

	public function delete_setting_tunjangan()
	{
		$id_setting_tunjangan = $this->input->post('id_setting_tunjangan');

//		dump die id pajak
		$this->doc_setting_tunjangan->delete($id_setting_tunjangan);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('gaji/setting_tunjangan');
	}

	public function setting_potongan()
	{
		$data['page'] = 'setting_potongan';
		$data['list'] = $this->doc_setting_potongan->getAll();
		$this->load->view('template', $data);
	}

	public function setting_potongan_update($id = null)
	{
		$product = $this->doc_setting_potongan;
		$product->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");
		redirect('gaji/setting_potongan');
	}

	public function save_setting_potongan()
	{
		$tunjangan = $this->doc_setting_potongan;
		$tunjangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('gaji/setting_potongan');
	}

	public function delete_setting_potongan()
	{
		$id_setting_potongan = $this->input->post('id_setting_potongan');

//		dump die id pajak
		$this->doc_setting_potongan->delete($id_setting_potongan);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('gaji/setting_potongan');
	}

//	pendapatan lain lain

	public function setting_pendapatan_lain_lain()
	{
		$data['page'] = 'setting_pendapatan_lain_lain';
		$data['list'] = $this->doc_setting_pendapatan_lain_lain->getAll();
		$this->load->view('template', $data);
	}

	public function setting_pendapatan_lain_lain_update($id = null)
	{
		$product = $this->doc_setting_pendapatan_lain_lain;
		$product->update();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terupdate
			</div>");
		redirect('gaji/setting_pendapatan_lain_lain');
	}

	public function save_setting_pendapatan_lain_lain()
	{
		$tunjangan = $this->doc_setting_pendapatan_lain_lain;
		$tunjangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('gaji/setting_pendapatan_lain_lain');
	}

	public function delete_setting_pendapatan_lain_lain()
	{
		$id_setting_pendapatan_lain_lain = $this->input->post('id_setting_pendapatan_lain_lain');

//		dump die id pajak
		$this->doc_setting_pendapatan_lain_lain->delete($id_setting_pendapatan_lain_lain);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('gaji/setting_pendapatan_lain_lain');
	}

	public function ajax_combo_nominal()
	{
		$id_kelas = $_GET['nama_tunjangan'];
		$q = $this->db->query("SELECT nominal_setting_tunjangan FROM sr_setting_tunjangan WHERE id_setting_tunjangan = $id_kelas");
		foreach ($q->result_array() as $data) {
//input data ke dalam input textbox
			echo $data['nominal_setting_tunjangan'];
		}
//			echo '<option value="'.$data['nominal_setting_tunjangan'].'">'.$data['nominal_setting_tunjangan'].'</option>';
	}

	public function ajax_combo_nominal_potongan()
	{
		$id_kelas = $_GET['nama_potongan'];
		$q = $this->db->query("SELECT nominal_setting_potongan FROM sr_setting_potongan WHERE id_setting_potongan = $id_kelas");
		foreach ($q->result_array() as $data) {
//input data ke dalam input textbox
			echo $data['nominal_setting_potongan'];
		}
//			echo '<option value="'.$data['nominal_setting_tunjangan'].'">'.$data['nominal_setting_tunjangan'].'</option>';
	}
	public function ajax_combo_nominal_lain()
	{
		$id_kelas = $_GET['nama_lain'];
		$q = $this->db->query("SELECT nominal_setting_pendapatan_lain_lain FROM sr_setting_pendapatan_lain_lain WHERE id_setting_pendapatan_lain_lain = $id_kelas");
		foreach ($q->result_array() as $data) {
//input data ke dalam input textbox
			echo $data['nominal_setting_pendapatan_lain_lain'];
		}
//			echo '<option value="'.$data['nominal_setting_tunjangan'].'">'.$data['nominal_setting_tunjangan'].'</option>';
	}

//	save tunjangan
	public function save_tunjangan_user()
	{
		$tunjangan = $this->doc_tarif_gaji_user;
		$tunjangan->save();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('gaji/tarif_gaji_detail/' . $this->input->post('id_user'));
	}

	public function cetak_test()
	{
		$this->load->model('doc_setting_pendapatan_lain_lain');
		$data['list'] = $this->doc_setting_tunjangan->getAll();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-test.pdf";
		$this->pdf->load_view('gaji/test', $data);
	}

	public function save_detail_potongan()
	{
		$this->doc_tarif_gaji_user->savepotongan();
		redirect('gaji/setting_gaji');
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('gaji/setting_gaji/');
	}
	public function save_detail_lain()
	{
		$this->doc_tarif_gaji_user->savelain();
		redirect('gaji/setting_gaji');
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('gaji/setting_gaji/');
	}
	public function save_akun()
	{
		$post = $this->input->post();
		$this->akun_gaji = $post["akun_gaji"];
		$this->id_user = $post["id_user"];
		$this->unit = $post["unit"];
		$jml = $this->db->query("SELECT * FROM sr_akun_gaji WHERE id_user = '$this->id_user'")->num_rows();
		if ($jml > 0){
			$this->db->query("UPDATE sr_akun_gaji SET akun_gaji = '$this->akun_gaji', id_user = '$this->id_user', unit = '$this->unit' WHERE id_user = ''");
		}else{
			$this->db->query("INSERT INTO sr_akun_gaji (akun_gaji, id_user, unit) VALUES ('$this->akun_gaji', '$this->id_user', '$this->unit')");
		}
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('gaji/setting_gaji/');
	}
	public function delete_tarif_gaji()
	{
		$id_gaji = $this->input->post('id_gaji');

//		dump die id pajak
		$this->doc_tarif_gaji_user->delete($id_gaji);
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di Terhapus
			</div>");
		redirect('gaji/setting_gaji');
	}

	public function insert_gaji()
	{
		$post = $this->input->post();
		$this->id_user = $post["id_user"];
		$this->unit = $post["unit"];
		$this->akun = $post["akun"];
		$this->total_gaji = $post["total_gaji"];
		$this->total_tunjangan = $post["total_tunjangan"];
		$this->total_lain = $post["total_lain"];
		$this->tanggal = date('Y-m');
//		if id_user is not null
		$jml = $this->db->query("SELECT * FROM sr_gaji_karyawan WHERE id_user = '$this->id_user'")->result();
		if ($jml > 0){
			$this->db->query("UPDATE sr_gaji_karyawan SET akun = '$this->akun', id_user = '$this->id_user', unit = '$this->unit', gaji_pokok = '$this->total_gaji', gaji_potongan = '$this->total_tunjangan', gaji_pendapatan_lain_lain = '$this->total_lain' WHERE id_user = '$this->id_user'");
		}else{
			$this->db->query("INSERT INTO sr_gaji_karyawan (id_user, unit, gaji_pokok, gaji_potongan,gaji_pendapatan_lain_lain,akun,tanggal) VALUES ('$this->id_user', '$this->unit', '$this->total_gaji', '$this->total_tunjangan', '$this->total_lain','$this->tanggal')");
		}
//
//
		redirect("cetak/bukti_bayar_gaji");
	}
	public function cetak_gaji($id_user)
	{
		$siswa = $this->db->query("select first_name,last_name,u_jenis_kelamin,u_alamat_tinggal,u_nbm_nip,sr_users.unit,phone from sr_users
    join users on users.id = sr_users.idusers WHERE idusers = '$id_user'")->row();
		$sekolah = $this->db->query("SELECT * FROM web_sekolah where unit='$siswa->unit' ")->row();

		$d['id_user'] =$id_user;
		$d['first_name'] = $siswa->first_name . " " . $siswa->last_name;
		$d['u_jenis_kelamin'] = $siswa->u_jenis_kelamin;
		$d['u_alamat_tinggal'] = $siswa->u_alamat_tinggal;
		$d['u_nbm_nip'] = $siswa->u_nbm_nip;
		$d['nama_sekolah'] = $sekolah->nama_sekolah;
		$d['phone'] = $siswa->phone;
		$d['alamat'] = $sekolah->alamat;
		$d['no_telepon'] = $sekolah->no_telepon;
		$d['email'] = $sekolah->email;

		$this->load->view("cetak/bukti_bayar_gaji",$d);
	}
//	setting tanggal gajian
	public function tanggal_gajian()
	{
		$data['page'] = 'tanggal_gajian';
//		query get data table create table sr_tanggal_gaji
		$data['list'] = $this->db->query("SELECT * FROM sr_tanggal_gaji")->result();
		$this->load->view('template', $data);
	}

	public function save_tanggal()
	{
		$post = $this->input->post();
		$this->tanggal = $post["tanggal"];
		$this->unit = $post["unit"];
		$jml = $this->db->query("SELECT * FROM sr_tanggal_gaji WHERE unit = '$this->unit'")->num_rows();
		if ($jml > 0){
			$this->db->query("UPDATE sr_tanggal_gaji SET tanggal = '$this->tanggal' WHERE unit = '$this->unit'");
		}else{
			$this->db->query("INSERT INTO sr_tanggal_gaji (tanggal , unit) VALUES ('$this->tanggal', '$this->unit')");
		}
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
		redirect('gaji/tanggal_gajian/');
	}
	public function save_tanggal_admin()
	{
		$post = $this->input->post();
		$this->tanggal = $post["tanggal"];
		$this->unit = $post["unit"];
		$jml = $this->db->query("SELECT * FROM sr_tanggal_gaji  where unit = '$this->unit'")->num_rows();
		if ($jml > 0){
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Unit Sudah Ada
			</div>");
			redirect('gaji/tanggal_gajian/');
		}else{
			$this->db->query("INSERT INTO sr_tanggal_gaji (tanggal , unit) VALUES ('$this->tanggal', '$this->unit')");
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data Berhasil Di input
			</div>");
			redirect('gaji/tanggal_gajian/');
		}

	}
	public function auto_gaji()
	{
		$tanggal = $this->db->query("select * from sr_tanggal_gaji")->result();
		$karyawan = $this->db->query("select * from sr_gaji_karyawan")->result();
			foreach ($karyawan as $item) {
				//die(print_r($item));
//				insert gajikaryawan per tanggal
				$this->db->query("INSERT INTO sr_gaji_karyawan_perbulan (gaji_pokok ,gaji_potongan,gaji_pendapatan_lain_lain,akun,id_user, unit) 
				VALUES ('$item->gaji_pokok', '$item->gaji_potongan','$item->gaji_pendapatan_lain_lain','$item->akun','$item->id_user','$item->unit')");
		}
	}

	public function slip_gaji($tahun_ajaran="",$bulan= "",$nip="")
	{

		if(!empty($nip)) {
			$cek = $this->db->query("select * from sr_users
join users on sr_users.idusers = users.id
join sr_gaji_karyawan on sr_users.idusers = sr_gaji_karyawan.id_user
join web_unit on web_unit.id = sr_gaji_karyawan.unit
where users.id = '$nip' and  month(tanggal)='$bulan' and year(tanggal) = '$tahun_ajaran'
group by sr_gaji_karyawan.id_user");
			if($cek->num_rows() > 0) {
				$data = $cek->row();
				$d['Jabatan'] = $tahun_ajaran;
				$d['u_nbm_nip'] = $data->u_nbm_nip;
				$d['nama_pegawai'] = $data->first_name.'-'.$data->last_name;
				$d['u_alamat_tinggal'] = $data->u_alamat_tinggal;
				$d['idusers'] = $data->idusers;
				$d['unit'] = $data->nama;
				$d['unit_id'] = $data->id;
				$d['idusers'] = $data->idusers;
				} else {
				echo '<script>
						alert("Data siswa tidak ditemukan");
						document.location.href="'.base_url().'gaji/slip_gaji";
					  </script>';
			}
		} else {
			$d['tampil'] = false;
		}
		$d['page'] = 'slip_gaji';
		$this->load->view('template', $d);
	}

	public function proses_cari_pegawai() {
		$nip = $this->input->post("nip");
		$db = $this->db->query("select * from users join sr_users on sr_users.idusers = users.id where id = '$nip'")->result();
		$tahun_ajaran = $this->input->post("tahun_ajaran");
		$bulan = $this->input->post("bulan");
		redirect("gaji/slip_gaji/".$tahun_ajaran."/".$bulan."/".$nip);
	}
	public function cetakgajislip()
	{
		$saldo = '0';
		$post = $this->input->post();
		$akun =  $post['id_akun'];
		$gapok = $post['gaji'];
		$lain = $post['lain'];
		$potongan = $post['potongan'];
		$date = date('Y-m-d');
		$gaji = $post['akungaji'];

		$nama_pegawai = $post['nama_pegawai'];
		$user = $post['idusers'];
		$unit_id = $post['unit_id'];
		$akunselect = $this->db->query("select * from sr_account where id_akun = '$gaji'")->row();
		$select = $this->db->query("select * from sr_invoice_body where id_akun = '$akun' order by id_invoice desc")->row();
		if ($select->balance == null)
		{
			$saldo = '0';
		}else{
			$saldo = $select->balance;
		}

		$da['unit_id'] = $post["unit_id"];
		$d['no_ref'] = $post["no_ref"];
		$d['tanggal'] = date('Y-m-d');
		$d['id_akun'] = $post['id_akun'];
		$d['bulan'] = date('Y-m');
		$d['akun'] = $post['akun'];
		$d['nama_akun'] = $post['nama_akun'];
		$d['idusers'] = $post['idusers'];
		$d['deskripsi'] = 'Gaji'.$d['nama_akun'].' '.$nama_pegawai;
		$d['nominal'] = $post['nominal'];
		$d['credit'] = $post['nominal'];
		$d['debet'] = '0';
		$d['akun_kas'] = $post['akungaji'];
		$d['nama_akun_kas'] =$akunselect->keterangan;
		$d['jenis'] = 'Gaji';
		$d['pajak'] = '0';
		$d['status'] = 'keluar';
		$d['unit_pos'] = '';
		$d['balance'] = $saldo - $post['nominal'];
		try {
			$this->db->trans_begin();
			$insert['list']  =$this->db->insert('sr_invoice_body',$d);
			$insert['gaji']  = $this->db->query("INSERT INTO sr_gaji_karyawan_perbulan (gaji_pokok,gaji_potongan,gaji_pendapatan_lain_lain,akun,unit,id_user,tanggal)
 												VALUES ('$gapok', '$potongan', '$lain','$akun','$unit_id','$user','$date')");
			$this->db->trans_commit();
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data berhasil tersimpan
			</div>");
			redirect('gaji/slip_gaji/');
		}
		catch (Exception $e) {
			$this->db->trans_rollback();
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Gagal $e
			</div>");
			redirect('gaji/slip_gaji/');
		}

	}
	public function cetakgaji()
	{
		$post = $this->input->post();
		$iduser =  $post['id_gaji_karyawan'];
		$tabungan = $this->db->query("select * from sr_gaji_karyawan_perbulan where id_gaji_karyawan = '$iduser'")->row();
		$siswa = $this->db->query("select first_name,last_name,u_jenis_kelamin,u_alamat_tinggal,u_nbm_nip,sr_users.unit,phone from sr_users
    join users on users.id = sr_users.idusers WHERE idusers = '$tabungan->id_user'")->row();
		$sekolah = $this->db->query("SELECT * FROM web_sekolah where unit='$siswa->unit' ")->row();

		$d['id_user'] =$tabungan->id_user;
		$d['total'] =($tabungan->gaji_pokok+ $tabungan->gaji_pendapatan_lain_lain) - $tabungan->gaji_potongan;
		$d['id_users'] =$iduser;
		$d['first_name'] = $siswa->first_name . " " . $siswa->last_name;
		$d['u_jenis_kelamin'] = $siswa->u_jenis_kelamin;
		$d['u_alamat_tinggal'] = $siswa->u_alamat_tinggal;
		$d['u_nbm_nip'] = $siswa->u_nbm_nip;
		$d['nama_sekolah'] = $sekolah->nama_sekolah;
		$d['phone'] = $siswa->phone;
		$d['alamat'] = $sekolah->alamat;
		$d['no_telepon'] = $sekolah->no_telepon;
		$d['email'] = $sekolah->email;

		$this->load->view("cetak/cetakgaji",$d);
	}
	public function pembayaran_siswa_detail($id_jenis_pembayaran,$id_siswa) {
		$d['judul'] = "Pembayaran Siswa";
		if($id_jenis_pembayaran != "" && $id_siswa != "") {
			$get = $this->db->query("
select sr_pembayaran_bulanan.`id_pembayaran_bulanan` AS `id_pembayaran_bulanan`,
       sr_pembayaran_bulanan.`id_jenis_pembayaran`   AS `id_jenis_pembayaran`,
       sr_pembayaran_bulanan.`id_kelas`              AS `id_kelas`,
       sr_pembayaran_bulanan.`id_siswa`              AS `id_siswa`,
       sr_pembayaran_bulanan.`tagihan`               AS `tagihan`,
       sr_pembayaran_bulanan.`bayar`                 AS `bayar`,
       sr_pembayaran_bulanan.`bulan`                 AS `bulan`,
       sr_pembayaran_bulanan.`tanggal`               AS `tanggal`,
       sr_pos_pembayaran.`nama_pos`       AS `nama_pos_keuangan`,
       sr_jenis_bayar.`tingkat`        AS `tahun_ajaran`,
       sr_jenis_bayar.`tipe`     AS `tipe_pembayaran`,
       `sr_siswa`.`s_nama`                          AS `nama_siswa`,
       `sr_siswa`.`s_nisn`                          AS `nis`,
       `sr_kelas`.`k_keterangan`                    AS `nama_kelas`
from sr_pembayaran_bulanan
join sr_jenis_bayar on sr_pembayaran_bulanan.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos
join sr_siswa on sr_siswa.idsiswa = sr_pembayaran_bulanan.id_siswa
join sr_kelas on sr_kelas.idkelas = sr_pembayaran_bulanan.id_kelas
 WHERE id_siswa = '$id_siswa' AND id_jenis_pembayaran = '$id_jenis_pembayaran'")->row();
			$d['nama_siswa'] = $get->nama_siswa;
			$d['nama_pos_keuangan'] = $get->nama_pos_keuangan.' '.$get->tahun_ajaran;
			$d['nis'] = $get->nis;
			$d['nama_kelas'] = $get->nama_kelas;
			$d['tahun_ajaran'] = str_replace("/","-",$get->tahun_ajaran);
			$d['tipe_pembayaran'] = $get->tipe_pembayaran;
			$d['id_siswa'] = $get->id_siswa;
			$d['id_jenis_pembayaran'] = $id_jenis_pembayaran;
			$d['pembayaran_bulanan_detail'] = $this->doc_pembayaransiswa->pembayaran_siswa_bulanan_detail($id_jenis_pembayaran,$id_siswa);

			$get_total = $this->db->query("SELECT SUM(tagihan) total_tagihan FROM sr_pembayaran_bulanan WHERE id_jenis_pembayaran = '$id_jenis_pembayaran' AND id_siswa = '$id_siswa'")->row();
			$d['total_tagihan'] = $get_total->total_tagihan;

//			$this->load->view('top',$d);
//			$this->load->view('menu');
//			$this->load->view('pembayaran_siswa/pembayaran_siswa_detail');
//			$this->load->view('bottom');
			$d['page'] = 'pembayaran_siswa_detail';
			$this->load->view('template', $d);
		} else {
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

}
