<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_jenisbayar extends CI_Model {

	private $_table = "sr_jenis_bayar";

	public $id_jenis_bayar;
	public $id_pos;
	public $tingkat;
	public $tipe;
	public $unit;

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function get_pos()
	{
		$query = $this->db->get('sr_pos_pembayaran');
		return $query->result_array();
	}

	public function getAll()
	{
		$query = $this->db->query("select sr_pos_pembayaran.nama_pos,sr_account.keterangan,sr_jenis_bayar.tingkat,tipe,sr_jenis_bayar.id_jenis_bayar from sr_jenis_bayar
			left join sr_pos_pembayaran on sr_jenis_bayar.id_pos = sr_pos_pembayaran.id_pos
			left join sr_account on sr_pos_pembayaran.kode_akun = sr_pos_pembayaran.kode_akun
			group by sr_jenis_bayar.id_pos");
		return $query->result_array();
	}

	public function getById($id_jenis_bayar)
	{
		return $this->db->get_where($this->_table, ["id_jenis_bayar" => $id_jenis_bayar])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->id_pos = $post["id_pos"];
		$this->tingkat = $post["tingkat"];
		$this->tipe = $post["tipe"];
		$this->unit = $post["unit"];
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_pos = $post["id_pos"];
		$this->tingkat = $post["tingkat"];
		$this->tipe = $post["tipe"];
		$this->unit = $post["unit"];

		return $this->db->update($this->_table, $this, array('id_jenis_bayar' => $post['id_jenis_bayar']));
	}

	public function delete($id_jenis_bayar)
	{
		return $this->db->delete($this->_table, array("id_jenis_bayar" => $id_jenis_bayar));
	}
	public function jenis_pembayaran_edit($id) {
		$q = $this->db->query("SELECT * FROM sr_jenis_bayar WHERE id_jenis_bayar = '$id'");
		return $q;
	}

	public function combo_kelas($id="") {
		$unit = $this->session->userdata('unit');
		$hasil = "";
//		if unit empty then show all
		if ($unit == "") {
			$q = $this->db->query("SELECT idkelas as id_kelas,k_romawi as nama_kelas FROM sr_kelas  ORDER BY idkelas ASC");
		} else {
			$q = $this->db->query("SELECT idkelas as id_kelas,k_romawi as nama_kelas FROM sr_kelas where unit='$unit' ORDER BY idkelas ASC");
		}
		$hasil .= '<option selected="selected" value>[ PILIH KELAS ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_kelas) {
				$hasil .= '<option value="'.$h->id_kelas.'" selected="selected">'.$h->nama_kelas.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_kelas.'">'.$h->nama_kelas.'</option>';
			}
		}
		return $hasil;
	}
	public function tarif_bayar_kelas($kelas,$id,$tipe) {
		if($tipe == 'bulanan') {
			$q = $this->db->query("select distinct(idsiswa),sr_siswa.idkelas,id_jenis_pembayaran,s_nama,k_keterangan,sr_siswa.*,tagihan from sr_pembayaran_bulanan
				join sr_siswa on sr_pembayaran_bulanan.id_siswa = sr_siswa.idsiswa
				join sr_kelas on sr_siswa.idkelas = sr_kelas.idkelas WHERE id_kelas = $kelas AND id_jenis_pembayaran = $id group by sr_pembayaran_bulanan.id_siswa");
		} else if($tipe == 'bebas') {
			$q = $this->db->query("select distinct(idsiswa),sr_siswa.idkelas,id_jenis_pembayaran,s_nama,k_keterangan,sr_siswa.*,tagihan from sr_pembayaran_bebas
				join sr_siswa on sr_pembayaran_bebas.id_siswa = sr_siswa.idsiswa
				join sr_kelas on sr_siswa.idkelas = sr_kelas.idkelas WHERE id_kelas = $kelas AND id_jenis_pembayaran = $id group by sr_pembayaran_bebas.id_siswa");
		}
		return $q;
	}


}
