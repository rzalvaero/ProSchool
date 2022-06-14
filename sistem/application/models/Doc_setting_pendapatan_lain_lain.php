<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_setting_pendapatan_lain_lain extends CI_Model {


	private $_table = "sr_setting_pendapatan_lain_lain";

	public $id_setting_pendapatan_lain_lain;
	public $nama_setting_pendapatan_lain_lain;
	public $nominal_setting_pendapatan_lain_lain;

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id_setting_pendapatan_lain_lain)
	{
		return $this->db->get_where($this->_table, ["id_setting_pendapatan_lain_lain" => $id_setting_pendapatan_lain_lain])->row();
	}
	public function save()
	{
		$post = $this->input->post();
		$this->nama_setting_pendapatan_lain_lain = $post["nama_setting_pendapatan_lain_lain"];
		$this->nominal_setting_pendapatan_lain_lain = $post["nominal_setting_pendapatan_lain_lain"];
		return $this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->nama_setting_pendapatan_lain_lain = $post["nama_setting_pendapatan_lain_lain"];
		$this->nominal_setting_pendapatan_lain_lain = $post["nominal_setting_pendapatan_lain_lain"];
		return $this->db->update($this->_table, $this, array('id_setting_pendapatan_lain_lain' => $post['id_setting_pendapatan_lain_lain']));
	}
	public function delete($id_setting_pendapatan_lain_lain)
	{
		return $this->db->delete($this->_table, array("id_setting_pendapatan_lain_lain" => $id_setting_pendapatan_lain_lain));
	}
}
