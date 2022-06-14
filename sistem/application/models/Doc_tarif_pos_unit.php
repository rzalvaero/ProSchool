<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_tarif_pos_unit extends CI_Model {
  // Fetch users

	private $_table = "sr_tarif_unit_pos";
	public $unit;
	public $tipe;
	public $id_unit_pos;
	public $id_kode_akun;
	public $id_tarif_unit_pos;
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getAll()
	{
//		get all where tipe pendapatan left join sr_account_code on sr_tarif_unit_pos.id_kode_akun = sr_account_code.id_kode_akun
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('sr_account', 'sr_tarif_unit_pos.id_kode_akun = sr_account.id_akun');
		$this->db->where('tipe', 'pendapatan');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAll_beban()
	{
//		get all where tipe pendapatan left join sr_account_code on sr_tarif_unit_pos.id_kode_akun = sr_account_code.id_kode_akun
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('sr_account', 'sr_tarif_unit_pos.id_kode_akun = sr_account.id_akun');
		$this->db->where('tipe', 'beban');
		$query = $this->db->get();
		return $query->result();
	}

	public function getById($id_unit_pos)
	{
		return $this->db->get_where($this->_table, ["id_unit_pos" => $id_unit_pos])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->id_kode_akun = $post["id_akun_biaya"];
		$this->id_unit_pos = $post["id_unit_pos"];
		$this->tipe = 'pendapatan';
		$this->unit = $post["unit"];
		return $this->db->insert($this->_table, $this);
	}
	public function save_beban()
	{
		$post = $this->input->post();
		$this->id_kode_akun = $post["id_akun_biaya"];
		$this->id_unit_pos = $post["id_unit_pos"];
		$this->tipe = 'beban';
		$this->unit = $post["unit"];
		return $this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->id_unit_pos = $post["id_unit_pos"];
		$this->nama_unit_pos = $post["nama_unit_pos"];
		$this->unit = $post["unit"];
		return $this->db->update($this->_table, $this, array('id_unit_pos' => $post['id_unit_pos']));
	}
	public function delete($id_tarif_unit_pos)
	{
		return $this->db->delete($this->_table, array("id_tarif_unit_pos" => $id_tarif_unit_pos));
	}
}
