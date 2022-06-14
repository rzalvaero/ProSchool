<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_ekstra extends CI_Model {


	private $_table = "sr_ekstra";
	public $idekstra;
	public $e_nama;
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

	public function getById($idekstra)
	{
		return $this->db->get_where($this->_table, ["idekstra" => $idekstra])->row();
	}
	public function save()
	{
		$post = $this->input->post();
//		die(var_dump($post));
		$this->idekstra = $post["idekstra"];
		$this->e_nama = $post["e_nama"];
		$this->unit = $post["unit"];
		return $this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->idekstra = $post["idekstra"];
		$this->e_nama = $post["e_nama"];
		$this->unit = $post["unit"];
		return $this->db->update($this->_table, $this, array('idekstra' => $post['idekstra']));
	}
	public function delete($idekstra)
	{
		return $this->db->delete($this->_table, array("idekstra" => $idekstra));
	}
}
