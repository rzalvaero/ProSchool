<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller
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

	public function pembayaran($tahun_ajaran="",$nis="")
	{
		if(!empty($nis) && !empty($tahun_ajaran)) {
			$cek = $this->db->query("SELECT s_nisn as nis,s_nama as nama_siswa,k_keterangan as nama_kelas,idsiswa as id_siswa, web_unit.nama FROM sr_siswa
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
				$d['id_siswa'] = $data->id_siswa;
				$d['jenis_pembayaran_bulanan'] = $this->doc_pembayaransiswa->jenis_pembayaran_bulanan($tahun_ajaran,$data->id_siswa);
				$d['jenis_pembayaran_bebas'] = $this->doc_pembayaransiswa->jenis_pembayaran_bebas($tahun_ajaran,$data->id_siswa);
				$d['pembayaran_bulanan'] = $this->doc_pembayaransiswa->pembayaran_siswa_bulanan($tahun_ajaran,$data->id_siswa);
				$d['pembayaran_bebas'] = $this->doc_pembayaransiswa->pembayaran_siswa_bebas($tahun_ajaran,$data->id_siswa);
				$d['pembayaran_bulanan_terakhir'] = $this->doc_pembayaransiswa->pembayaran_bulanan_terakhir($tahun_ajaran,$data->id_siswa);
				$d['pembayaran_bebas_terakhir'] = $this->doc_pembayaransiswa->pembayaran_bebas_terakhir($tahun_ajaran,$data->id_siswa);
			} else {
				echo '<script>
						alert("Data siswa tidak ditemukan");
						document.location.href="'.base_url().'pembayaran/pembayaran";
					  </script>';
			}
		} else {
			$d['tampil'] = false;
		}
		$d['page'] = 'pembayaran_siswa';
		$this->load->view('template', $d);
	}

	public function ajax_siswa() {
		$query = $_POST['query'];
//		$q = $this->db->query("SELECT nis, nama_siswa, nama_kelas FROM mst_siswa
//									INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE nama_siswa LIKE '%$query%'");
		$q = $this->db->query("SELECT s_nisn as nis,s_nama as nama_siswa,k_keterangan as nama_kelas FROM sr_siswa
join sr_kelas on sr_siswa.idkelas = sr_kelas.idkelas WHERE s_nama LIKE '%$query%'");
		if($q->num_rows() > 0) {
			foreach($q->result_array() as $data) {
				$arr[] = $data['nis'].' - '.$data['nama_kelas'].' - '.$data['nama_siswa'];
			}
			echo json_encode($arr);
		}
	}


	public function ajax_history_bayar() {
		$id_pembayaran_bebas = $_GET['id_pembayaran_bebas'];
		$nis = $_GET['nis'];
		$tahun_ajaran = str_replace("/","-",$_GET["tahun_ajaran"]);
		$q = $this->db->query("SELECT * FROM pembayaran_bebas_dt WHERE id_pembayaran_bebas = $id_pembayaran_bebas");
		$no = 1;
		echo '<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Jumlah Bayar</th>
						<th style="text-align:center;">Aksi</th>
					</tr>
				</thead>
				<tbody>';
		foreach($q->result_array() as $data) {
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.date("d/m/Y",strtotime($data['tanggal'])).'</td>
					<td>Rp '.number_format($data['bayar']).'</td>
					<td style="text-align:center;">
					<a class="btn btn-success btn-xs edit-bayar" href="" data-toggle="modal" data-target="#modalEdit" data-id_pembayaran_bebas_dt="'.$data['id_pembayaran_bebas_dt'].'" data-tanggal="'.$data['tanggal'].'" data-bayar="'.number_format($data['bayar']).'" data-nis="'.$nis.'" data-tahun_ajaran="'.$tahun_ajaran.'"><i class="fa fa-edit"> </i> </a>  |
						<a class="btn btn-danger btn-xs" href="'.base_url().'pembayaran/pembayaran_bebas_hapus/'.$nis.'/'.$tahun_ajaran.'/'.$data['id_pembayaran_bebas_dt'].'"><i class="fa fa-trash"> </i> </a> 
					</td>
				  </tr>';
			$no++;
		}
		echo '</tbody>
				 </table>';
	}


	public function ajax_post_bayar_bulanan() {
		$result['nis'] = $this->input->post("nis");
		$resultbiaya = $this->input->post("akun_biaya");
		$id_pembayaran = $this->input->post("id_pembayaran_bulanan");
		$result['tahun_ajaran'] = str_replace("/","-",$this->input->post("tahun_ajaran"));
		$where['id_pembayaran_bulanan'] = $this->input->post("id_pembayaran_bulanan");
		$in['bayar'] = $this->input->post("tagihan");
		$in['tanggal'] = date("Y-m-d");
		$this->db->update("sr_pembayaran_bulanan",$in,$where);

// akun pendapatan
		$akunbiaya = $this->input->post("akun_biaya");

//		select unit
		$selectunit = $this->db->query("select * from sr_pembayaran_bulanan where id_pembayaran_bulanan='$id_pembayaran'")->row();

		$selectunitname = $this->db->query("select * from web_unit where id='$selectunit->unit'")->row();
		$selectunitnameakun = $this->db->query("select * from sr_account where id_akun='$selectunit->akun'")->row();
		$selectunitnameakunbiaya = $this->db->query("select * from sr_account where id_akun='$resultbiaya'")->row();


		$saldo = '0';
		$post = $this->input->post();
		$select = $this->db->query("select * from sr_invoice_body where id_akun = '$selectunitnameakun->id_akun' order by id_invoice desc")->row();
		if ($select->balance == null)
		{
			$saldo = '0';
		}else{
			$saldo = $select->balance;
		}

		$d['no_ref'] = 'SPP'.'-'.date('Y-m-d').'-'.	$result['nis'];
		$d['tanggal'] = date('Y-m-d');
		$d['id_akun'] = $selectunit->akun;
		$d['bulan'] = date('Y-m');
		$d['akun'] = $selectunitnameakun->keterangan;
		$d['nama_akun'] = $selectunitname->nama.'-'.$selectunitnameakun->kode_akun.'-'.$selectunitnameakun->keterangan;
		$d['deskripsi'] = 'SPP'.'-'. $selectunitname->nama.'-'.$selectunitnameakun->kode_akun.'-'.$selectunitnameakun->keterangan.'-'.$result['nis'];
		$d['credit'] = '0';
		$d['nominal'] = $this->input->post("tagihan");
		$d['debet'] = $this->input->post("tagihan");
		$d['akun_kas'] = $resultbiaya;
		$d['nama_akun_kas'] = $selectunitnameakunbiaya->keterangan;
		$d['jenis'] = 'SPP';
		$d['pajak'] = '0';
		$d['status'] = 'masuk';
		$d['unit_pos'] = '';
		$d['balance'] = $saldo + $this->input->post("tagihan");

	 $this->db->insert('sr_invoice_body',$d);

		echo json_encode($result);
	}


	public function ajax_hapus_bayar_bulanan() {
		$result['nis'] = $this->input->post("nis");
		$result['tahun_ajaran'] = str_replace("/","-",$this->input->post("tahun_ajaran"));
		$where['id_pembayaran_bulanan'] = $this->input->post("id_pembayaran_bulanan");
		$in['bayar'] = 0;
		$in['tanggal'] = null;
		$this->db->update("sr_pembayaran_bulanan",$in,$where);
		echo json_encode($result);
	}


	public function pembayaran_bebas_hapus($nis,$tahun_ajaran,$id_pembayaran_bebas_dt) {
		$where['id_pembayaran_bebas_dt'] = $id_pembayaran_bebas_dt;
		$this->db->delete("pembayaran_bebas_dt",$where);
		$this->session->set_flashdata("success","Hapus Pembayaran Berhasil");
		redirect("pembayaran/pembayaran/".$tahun_ajaran."/".$nis);
	}

	public function proses_cari_siswa() {
		$nis = $this->input->post("nis");

		$db = $this->db->query("select * from sr_siswa where s_nisn = '$nis'")->result();
		$tahun_ajaran = $this->input->post("tahun_ajaran");
		redirect("pembayaran/pembayaran/".$tahun_ajaran."/".$nis);
	}

	public function proses_cari_daftar_pembayaran() {
		$tahun_ajaran = str_replace("/","-",$this->input->post("tahun_ajaran"));
		redirect("pembayaran/daftar_pembayaran/".$tahun_ajaran."/".$_POST['cari']);
	}


	public function daftar_pembayaran($tahun_ajaran="",$query="") {
		if($tahun_ajaran == "") {
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}
		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);
		$d['judul'] = "Daftar Pembayaran Siswa";
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		$d['tampil'] = true;
		$d['daftar_pembayaran_bulanan'] = $this->Pembayaran_model->daftar_pembayaran_bulanan($tahun_ajaran,$query);
		$d['daftar_pembayaran_bebas'] = $this->Pembayaran_model->daftar_pembayaran_bebas($tahun_ajaran,$query);
		$d['query'] = $query;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('pembayaran_siswa/daftar_pembayaran');
		$this->load->view('bottom');
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

	public function pembayaran_bulanan_save() {
		$id_pembayaran_bulanan = $this->input->post("id_pembayaran_bulanan");
		$id_siswa = $this->input->post("id_siswa");
		$tot_bayar = $this->db->query("SELECT tagihan,id_jenis_pembayaran FROM sr_pembayaran_bulanan WHERE id_pembayaran_bulanan = '$id_pembayaran_bulanan'")->row();
		$in['bayar'] = $tot_bayar->tagihan;
		$in['tanggal'] = date("Y-m-d",strtotime($this->input->post("tanggal")));
		$where['id_pembayaran_bulanan'] = $id_pembayaran_bulanan;
		$this->db->update("sr_pembayaran_bulanan",$in,$where);
		$this->session->set_flashdata("success","Berhasil Melakukan Pembayaran");
		redirect("pembayaran/pembayaran_siswa_detail/".$tot_bayar->id_jenis_pembayaran."/".$id_siswa);
	}

	public function pembayaran_bulanan_hapus($id_pembayaran_bulanan,$id_siswa) {
		$getid = $this->db->query("SELECT id_jenis_pembayaran FROM sr_pembayaran_bulanan WHERE id_pembayaran_bulanan = '$id_pembayaran_bulanan'")->row();
		$in['bayar'] = 0;
		$in['tanggal'] = null;
		$where['id_pembayaran_bulanan'] = $id_pembayaran_bulanan;
		$this->db->update("pembayaran_bulanan",$in,$where);
		$this->session->set_flashdata("success","Berhasil Hapus Pembayaran");
		redirect("pembayaran/pembayaran_siswa_detail/".$getid->id_jenis_pembayaran."/".$id_siswa);
	}


	public function pembayaran_bebas_save() {
		$nis = $this->input->post("nis");
		$tahun_ajaran = str_replace("/","-",$this->input->post("tahun_ajaran"));
		$in['bayar'] = $this->input->post("bayar");
		$in['tanggal'] = date("Y-m-d",strtotime($this->input->post("tanggal")));
		$in['id_pembayaran_bebas'] = $this->input->post("id_pembayaran_bebas");
		$this->db->insert("pembayaran_bebas_dt",$in);



		$this->session->set_flashdata("success","Berhasil Update Pembayaran");
		redirect("pembayaran/pembayaran/".$tahun_ajaran."/".$nis);
	}

	public function pembayaran_bebas_saveedit() {
		$in['bayar'] = $this->input->post("bayar");
		$nis = $this->input->post("nis");
		$tahun_ajaran = str_replace("/","-",$this->input->post("tahun_ajaran"));
		$where['id_pembayaran_bebas_dt'] = $this->input->post("id_pembayaran_bebas_dt");
		$this->db->update("pembayaran_bebas_dt",$in,$where);
		$this->session->set_flashdata("success","Berhasil Update Pembayaran");
		redirect("pembayaran/pembayaran/".$tahun_ajaran."/".$nis);
	}

	public function cetak_semua_tagihan($tahun_ajaran, $id_siswa) {
		$unit = $this->session->userdata('unit');

		$sekolah = $this->db->query("SELECT * FROM web_sekolah where unit='$unit' ")->row();
		$siswa = $this->db->query("select s_nama as nama_siswa, k_romawi as nama_kelas, s_nisn as nis,idsiswa as id_siswa from sr_siswa
join sr_kelas on sr_siswa.idkelas = sr_kelas.idkelas WHERE idsiswa = = '$id_siswa'")->row();
		$d['nama_siswa'] = $siswa->nama_siswa;
		$d['nis'] = $siswa->nis;
		$d['id_siswa'] = $siswa->id_siswa;
		$d['nama_sekolah'] = $sekolah->nama_sekolah;
		$d['alamat'] = $sekolah->alamat;
		$d['no_telepon'] = $sekolah->no_telepon;
		$d['email'] = $sekolah->email;
		$d['logo'] = $sekolah->logo;
		$d['tahun_ajaran'] = str_replace("-","/",$tahun_ajaran);
		$d['nis'] = $siswa->nis;
		$d['nama_kelas'] = $siswa->nama_kelas;
		$this->load->view("cetak/bukti_semua_tagihan",$d);
	}

	public function cetak_bukti() {
		$unit = $this->session->userdata('unit');

		$sekolah = $this->db->query("SELECT * FROM web_sekolah where unit='$unit' ")->row();
		$siswa = $this->db->query("SELECT s_nama as nama_siswa,s_nisn as nis,idsiswa asid_siswa FROM sr_siswa WHERE s_nis = '$_GET[nis]'")->row();
		$d['nama_siswa'] = $siswa->nama_siswa;
		$d['nis'] = $siswa->nis;
		$d['id_siswa'] = $siswa->id_siswa;
		$d['nama_sekolah'] = $sekolah->nama_sekolah;
		$d['alamat'] = $sekolah->alamat;
		$d['no_telepon'] = $sekolah->no_telepon;
		$d['email'] = $sekolah->email;
		$d['logo'] = $sekolah->logo;

		$d['nis'] = $_GET['nis'];
		$d['nama_kelas'] = $_GET['kelas'];
		$d['tanggal'] = date("Y-m-d",strtotime($_GET['tanggal']));
		$this->load->view("cetak/bukti_bayar",$d);
	}


	public function cetak_bukti_bulanan($id_pembayaran_bulanan,$id_siswa) {
		$unit = $this->session->userdata('unit');

		$sekolah = $this->db->query("SELECT * FROM web_sekolah where unit='$unit' ")->row();
		$siswa = $this->db->query("select s_nama as nama_siswa, k_romawi as nama_kelas, s_nisn as nis,idsiswa as id_siswa from sr_siswa
join sr_kelas on sr_siswa.idkelas = sr_kelas.idkelas WHERE idsiswa = '$id_siswa'")->row();
		$d['id_pembayaran_bulanan'] = $id_pembayaran_bulanan;
		$d['nama_siswa'] = $siswa->nama_siswa;
		$d['nama_kelas'] = $siswa->nama_kelas;
		$d['nis'] = $siswa->nis;
		$d['id_siswa'] = $siswa->id_siswa;
		$d['nama_sekolah'] = $sekolah->nama_sekolah;
		$d['alamat'] = $sekolah->alamat;
		$d['no_telepon'] = $sekolah->no_telepon;
		$d['email'] = $sekolah->email;
		$d['logo'] = $sekolah->logo;

		$this->load->view("cetak/bukti_bayar_bulanan",$d);
	}

	public function cetak_bukti_bulanan_all() {

		$id_siswa = $this->input->post("id_siswa");
		$unit = $this->session->userdata('unit');
		$id_jenis_pembayaran = $this->input->post("id_jenis_pembayaran");
		$id_pembayaran_bulanan = $this->input->post("id_pembayaran_bulanan");
		if(empty($id_pembayaran_bulanan)) {
			echo '<script>
						alert("Silahkan pilih bulan yang ingin dicetak terlebih dahulu");
						document.location.href="'.base_url().'pembayaran/pembayaran_siswa_detail/'.$id_jenis_pembayaran.'/'.$id_siswa.'";
					  </script>';
		} else {
			$d['id_pembayaran_bulanan'] = implode(",",$id_pembayaran_bulanan);
			$sekolah = $this->db->query("SELECT * FROM web_sekolah where unit='$unit' ")->row();
			$siswa = $this->db->query("select s_nama as nama_siswa, k_romawi as nama_kelas, s_nisn as nis,idsiswa as id_siswa from sr_siswa
join sr_kelas on sr_siswa.idkelas = sr_kelas.idkelas WHERE idsiswa = '$id_siswa'")->row();
			$d['nama_siswa'] = $siswa->nama_siswa;
			$d['nama_kelas'] = $siswa->nama_kelas;
			$d['nis'] = $siswa->nis;
			$d['id_siswa'] = $siswa->id_siswa;
			$d['nama_sekolah'] = $sekolah->nama_sekolah;
			$d['alamat'] = $sekolah->alamat;
			$d['no_telepon'] = $sekolah->no_telepon;
			$d['email'] = $sekolah->email;
			$d['logo'] = $sekolah->logo;
			$d['id_jenis_pembayaran'] = $id_jenis_pembayaran;
			$this->load->view("cetak/bukti_bayar_bulanan_all",$d);
		}
	}

	public function cetak_bukti_bayar_bebas($id_pembayaran_bebas,$id_siswa) {
		$unit = $this->session->userdata('unit');

		$sekolah = $this->db->query("SELECT * FROM web_sekolah where unit='$unit' ")->row();
		$siswa = $this->db->query("select s_nama as nama_siswa, k_romawi as nama_kelas, s_nisn as nis,idsiswa as id_siswa from sr_siswa
join sr_kelas on sr_siswa.idkelas = sr_kelas.idkelas WHERE idsiswa = '$id_siswa'")->row();
		$d['id_pembayaran_bebas'] = $id_pembayaran_bebas;
		$d['nama_siswa'] = $siswa->nama_siswa;
		$d['nama_kelas'] = $siswa->nama_kelas;
		$d['nis'] = $siswa->nis;
		$d['id_siswa'] = $siswa->id_siswa;
		$d['nama_sekolah'] = $sekolah->nama_sekolah;
		$d['alamat'] = $sekolah->alamat;
		$d['no_telepon'] = $sekolah->no_telepon;
		$d['email'] = $sekolah->email;
		$d['logo'] = $sekolah->logo;

		$this->load->view("cetak/bukti_bayar_bebas",$d);
	}


}
