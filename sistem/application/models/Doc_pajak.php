<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_pajak extends CI_Model {


	private $_table = "sr_pajak_keuangan";

	public $id_pajak;
	public $nama_pajak;
	public $besaran_pajak;

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id_pajak)
	{
		return $this->db->get_where($this->_table, ["id_pajak" => $id_pajak])->row();
	}
	public function save()
	{
		$post = $this->input->post();
//		die(var_dump($post));
		$this->id_pajak = $post["id_pajak"];
		$this->nama_pajak = $post["nama_pajak"];
		$this->besaran_pajak = $post["besaran_pajak"];
		return $this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->id_pajak = $post["id_pajak"];
		$this->nama_pajak = $post["nama_pajak"];
		$this->besaran_pajak = $post["besaran_pajak"];
		return $this->db->update($this->_table, $this, array('id_pajak' => $post['id_pajak']));
	}
	public function delete($id_pajak)
	{
		return $this->db->delete($this->_table, array("id_pajak" => $id_pajak));
	}
}
