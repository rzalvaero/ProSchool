<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_account extends CI_Model {


	private $_table = "sr_account";

	public $id_akun;
	public $kode_akun;
	public $jenis_akun;
	public $kategori;
	public $keterangan;
	public $modul_keuangan;

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function get_akun()
	{
		$query = $this->db->get('sr_account');
		return $query->result_array();
	}
//	create query codeigniter untuk menampilkan data
	public function get_akun_piutang()
	{
		$query = $this->db->query("SELECT * FROM sr_account where keterangan LIKE '%piutang%'");
		return $query->result_array();
	}

	public function getAll()
	{
//		join web_unit
		$this->db->select('*');
		$this->db->from('sr_account');
		$this->db->join('web_unit', 'sr_account.unit = web_unit.id');
		$query = $this->db->get();
		return $query->result();
	}

	public function getById($id_akun)
	{
		return $this->db->get_where($this->_table, ["id_akun" => $id_akun])->row();
	}

	public function save()
	{
		$post = $this->input->post();
//		die(var_dump($post));
		$this->unit = $post["unit"];
		$this->kode_akun = $post["kode_akun"];
		$this->jenis_akun = $post["jenis_akun"];
		$this->kategori = $post["kategori"];
		$this->keterangan = $post["keterangan"];
		$this->modul_keuangan = $post["modul_keuangan"];
		return $this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->unit = $post["unit"];
		$this->kode_akun = $post["kode_akun"];
		$this->jenis_akun = $post["jenis_akun"];
		$this->kategori = $post["kategori"];
		$this->keterangan = $post["keterangan"];
		$this->modul_keuangan = $post["modul_keuangan"];


		return $this->db->update($this->_table, $this, array('id_akun' => $post['id_akun']));
	}

	public function delete($id_akun)
	{
		return $this->db->delete($this->_table, array("id_akun" => $id_akun));
	}
}
