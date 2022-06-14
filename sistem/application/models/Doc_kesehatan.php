<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_kesehatan extends CI_Model {


	private $_table = "sr_kesehatan";
	public $idkesehatan;
	public $ks_aspek;
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

	public function getById($idkesehatan)
	{
		return $this->db->get_where($this->_table, ["idkesehatan" => $idkesehatan])->row();
	}
	public function save()
	{
		$post = $this->input->post();
//		die(var_dump($post));
		$this->idkesehatan = $post["idkesehatan"];
		$this->ks_aspek = $post["ks_aspek"];
		$this->unit = $post["unit"];
		return $this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->idkesehatan = $post["idkesehatan"];
		$this->ks_aspek = $post["ks_aspek"];
		$this->unit = $post["unit"];
		return $this->db->update($this->_table, $this, array('idkesehatan' => $post['idkesehatan']));
	}
	public function delete($idkesehatan)
	{
		return $this->db->delete($this->_table, array("idkesehatan" => $idkesehatan));
	}
}
