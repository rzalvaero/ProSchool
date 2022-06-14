<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class doc_butir_sikap extends CI_Model {

	private $_table = "sr_butir_sikap";

	public $idbutir_sikap;
	public $bs_kategori;
	public $bs_kode;
	public $bs_keterangan;
	public $bs_unit;

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function getAll()
	{
//		join sr_sikap
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('sr_sikap', 'sr_sikap.id_sikap = sr_butir_sikap.bs_kategori');
		$this->db->order_by('bs_kategori', 'ASC');
		$query = $this->db->get();
		return $query->result();

	}

	public function getById($idbutir_sikap)
	{
		return $this->db->get_where($this->_table, ["idbutir_sikap" => $idbutir_sikap])->row();
	}
	public function save()
	{
		$post = $this->input->post();
//		die(var_dump($post));
		$this->idbutir_sikap = $post["idbutir_sikap"];
		$this->bs_kategori = $post["bs_kategori"];
		$this->bs_kode = $post["bs_kode"];
		$this->bs_keterangan = $post["bs_keterangan"];
		$this->bs_unit = $post["bs_unit"];
		return $this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->idbutir_sikap = $post["idbutir_sikap"];
		$this->bs_kategori = $post["bs_kategori"];
		$this->bs_kode = $post["bs_kode"];
		$this->bs_keterangan = $post["bs_keterangan"];
		$this->bs_unit = $post["bs_unit"];
		return $this->db->update($this->_table, $this, array('idbutir_sikap' => $post['idbutir_sikap']));
	}
	public function delete($idbutir_sikap)
	{
		return $this->db->delete($this->_table, array("idbutir_sikap" => $idbutir_sikap));
	}
}
