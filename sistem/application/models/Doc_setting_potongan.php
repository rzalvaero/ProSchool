<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_setting_potongan extends CI_Model {

	private $_table = "sr_setting_potongan";

	public $id_setting_potongan;
	public $nama_setting_potongan;
	public $nominal_setting_potongan;

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id_setting_potongan)
	{
		return $this->db->get_where($this->_table, ["id_setting_potongan" => $id_setting_potongan])->row();
	}
	public function save()
	{
		$post = $this->input->post();
		$this->nama_setting_potongan = $post["nama_setting_potongan"];
		$this->nominal_setting_potongan = $post["nominal_setting_potongan"];
		return $this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->nama_setting_potongan = $post["nama_setting_potongan"];
		$this->nominal_setting_potongan = $post["nominal_setting_potongan"];
		return $this->db->update($this->_table, $this, array('id_setting_potongan' => $post['id_setting_potongan']));
	}
	public function delete($id_setting_potongan)
	{
		return $this->db->delete($this->_table, array("id_setting_potongan" => $id_setting_potongan));
	}
}
