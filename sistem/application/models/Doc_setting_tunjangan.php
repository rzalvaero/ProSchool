<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_setting_tunjangan extends CI_Model {


	private $_table = "sr_setting_tunjangan";

	public $id_setting_tunjangan;
	public $nama_setting_tunjangan;
	public $nominal_setting_tunjangan;

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id_setting_tunjangan)
	{
		return $this->db->get_where($this->_table, ["id_setting_tunjangan" => $id_setting_tunjangan])->row();
	}
	public function save()
	{
		$post = $this->input->post();
		$this->nama_setting_tunjangan = $post["nama_setting_tunjangan"];
		$this->nominal_setting_tunjangan = $post["nominal_setting_tunjangan"];
		return $this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->nama_setting_tunjangan = $post["nama_setting_tunjangan"];
		$this->nominal_setting_tunjangan = $post["nominal_setting_tunjangan"];
		return $this->db->update($this->_table, $this, array('id_setting_tunjangan' => $post['id_setting_tunjangan']));
	}
	public function delete($id_setting_tunjangan)
	{
		return $this->db->delete($this->_table, array("id_setting_tunjangan" => $id_setting_tunjangan));
	}
}
