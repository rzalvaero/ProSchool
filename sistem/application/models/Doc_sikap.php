<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_sikap extends CI_Model {


	private $_table = "sr_sikap";

	public $id_sikap;
	public $nama_sikap;

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id_sikap)
	{
		return $this->db->get_where($this->_table, ["id_sikap" => $id_sikap])->row();
	}
	public function save()
	{
		$post = $this->input->post();
//		die(var_dump($post));
		$this->id_sikap = $post["id_sikap"];
		$this->nama_sikap = $post["nama_sikap"];
		return $this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->id_sikap = $post["id_sikap"];
		$this->nama_sikap = $post["nama_sikap"];
		return $this->db->update($this->_table, $this, array('id_sikap' => $post['id_sikap']));
	}
	public function delete($id_sikap)
	{
		return $this->db->delete($this->_table, array("id_sikap" => $id_sikap));
	}
}
