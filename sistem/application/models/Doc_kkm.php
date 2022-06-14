<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_kkm extends CI_Model {


	private $_table = "sr_kkm";

	public $idkkm;
	public $idkelas;
	public $idmata_pelajaran;
	public $k_kkm;
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

	public function getById($idkkm)
	{
		return $this->db->get_where($this->_table, ["idkkm" => $idkkm])->row();
	}
	public function save()
	{
		$post = $this->input->post();
//		die(var_dump($post));
		$this->unit = $post["unit"];
		$this->idkelas = $post["idkelas"];
		$this->idmata_pelajaran = $post["idmata_pelajaran"];
		$this->k_kkm = $post["k_kkm"];
		return $this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->idkkm = $post["idkkm"];
		$this->idkelas = $post["idkelas"];
		$this->idmata_pelajaran = $post["idmata_pelajaran"];
		$this->k_kkm = $post["k_kkm"];
		return $this->db->update($this->_table, $this, array('idkkm' => $post['idkkm']));
	}
	public function delete($idkkm)
	{
		return $this->db->delete($this->_table, array("idkkm" => $idkkm));
	}
}
