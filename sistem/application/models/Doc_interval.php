<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_interval extends CI_Model {


	private $_table = "sr_interval_predikat";

	public $idinterval_predikat;
	public $idkkm;
	public $amin;
	public $amax;
	public $bmin;
	public $bmax;
	public $cmin;
	public $cmax;
	public $dmin;
	public $dmax;
	public $unit;

	protected $id = 'idkkm';

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
		$this->idkkm = $post["idkkm"];
		$this->amax = $post["amax"];
		$this->amin = $post["amin"];
		$this->bmax = $post["bmax"];
		$this->bmin = $post["bmin"];
		$this->cmin = $post["cmin"];
		$this->cmax = $post["cmax"];
		$this->dmin = $post["dmin"];
		$this->dmax = $post["dmax"];
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
	public function delete($idinterval_predikat)
	{
		return $this->db->delete($this->_table, array("idinterval_predikat" => $idinterval_predikat));
	}
	public function read_data_by_id($id)
	{
		$this->db->select('*','edit as mode');
		$this->db->join('sr_kelas','sr_kelas.idkelas = sr_kkm.idkelas','left');
		$this->db->join('sr_mata_pelajaran','sr_mata_pelajaran.idmata_pelajaran = sr_kkm.idmata_pelajaran','left');
		$this->db->where($this->id,$id);
		return $this->db->get('sr_kkm')->row_array();
	}
}
