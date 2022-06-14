<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_pos_unit extends CI_Model {
  // Fetch users

	private $_table = "sr_unit_pos";
	private $_table_tarif = "sr_tarif_unit_pos";

	public $unit;
	public $nama_unit_pos;
	public $id_unit_pos;
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id_unit_pos)
	{
		return $this->db->get_where($this->_table, ["id_unit_pos" => $id_unit_pos])->row();
	}
	public function save()
	{
		$post = $this->input->post();
//		die(var_dump($post));
		$this->nama_unit_pos = $post["nama_unit_pos"];
		$this->unit = $post["unit"];
		return $this->db->insert($this->_table, $this);
	}
	public function save_unit()
	{
		$post = $this->input->post();
		$this->id_kode_akun = $post["id_akun_biaya"];
		$this->id_unit_pos = $post["id_unit_pos"];
		$this->tipe = 'pendapatan';
		$this->unit = $post["unit"];
		return $this->db->insert($this->_table_tarif, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->id_unit_pos = $post["id_unit_pos"];
		$this->nama_unit_pos = $post["nama_unit_pos"];
		$this->unit = $post["unit"];
		return $this->db->update($this->_table, $this, array('id_unit_pos' => $post['id_unit_pos']));
	}
	public function delete($id_unit_pos)
	{
		return $this->db->delete($this->_table, array("id_unit_pos" => $id_unit_pos));
	}

}
