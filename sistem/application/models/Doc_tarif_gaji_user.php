<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_tarif_gaji_user extends CI_Model {


	private $_table = "sr_tarif_gaji_user";

	public $id_gaji;
	public $id_user;
	public $deskripsi;
	public $id_tunjangan;
	public $akun_gaji;
	public $id_lain;
	public $id_potongan;
	public $unit;

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id_gaji)
	{
		return $this->db->get_where($this->_table, ["id_gaji" => $id_gaji])->row();
	}
	public function save()
	{
		$post = $this->input->post();
		$this->id_tunjangan = $post["id_tunjangan"];
		$this->id_user = $post["id_user"];
		$this->unit = $post["unit"];
		$this->deskripsi = $post["deskripsi"];
		return $this->db->insert($this->_table, $this,array('id_user' => $post['id_user']));
	}
	public function savepotongan()
	{
		$post = $this->input->post();
		$this->id_potongan = $post["id_potongan"];
		$this->id_user = $post["id_user"];
		$this->unit = $post["unit"];
		$this->deskripsi = $post["deskripsi"];
		return $this->db->insert($this->_table, $this,array('id_user' => $post['id_user']));
	}
	public function savelain()
	{
		$post = $this->input->post();
		$this->id_lain = $post["id_lain"];
		$this->id_user = $post["id_user"];
		$this->unit = $post["unit"];
		$this->deskripsi = $post["deskripsi"];
		return $this->db->insert($this->_table, $this,array('id_user' => $post['id_user']));
	}
	public function save_akun()
	{
		$post = $this->input->post();
		$this->akun_gaji = $post["akun_gaji"];
		$this->id_user = $post["id_user"];
		$this->unit = $post["unit"];
		return $this->db->insert('sr_akun_gaji', $this,array('id_user' => $post['id_user']));
	}
	public function update()
	{
		$post = $this->input->post();
		$this->id_pajak = $post["id_gaji"];
		$this->id_tunjangan = $post["id_tunjangan"];
		$this->id_user = $post["id_user"];
		$this->unit = $post["unit"];
		return $this->db->update($this->_table, $this, array('id_gaji' => $post['id_gaji']));
	}
	public function delete($id_gaji)
	{
		return $this->db->delete($this->_table, array("id_gaji" => $id_gaji));
	}
	public function tunjangan()
	{
		$query = $this->db->query("SELECT * FROM sr_setting_tunjangan");
		return $query->result();
	}
	public function potongan()
	{
		$query = $this->db->query("SELECT * FROM sr_setting_potongan");
		return $query->result();
	}
	public function lain()
	{
		$query = $this->db->query("SELECT * FROM sr_setting_pendapatan_lain_lain");
		return $query->result();
	}
}
