<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_pospembayaran extends CI_Model {


	private $_table = "sr_pos_pembayaran";

	public $id_pos;
	public $unit;
	public $kode_akun;
	public $akun_piutang;
	public $nama_pos;
	public $keterangan;

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function getAll()
	{
//		result array query
		return $this->db->get($this->_table)->result_array();

	}

	public function getById($id_pos)
	{
		return $this->db->get_where($this->_table, ["id_pos" => $id_pos])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->unit = $post["unit"];
		$this->kode_akun = $post["kode_akun"];
		$this->akun_piutang = $post["akun_piutang"];
		$this->nama_pos = $post["nama_pos"];
		$this->keterangan = $post["keterangan"];
		return $this->db->insert($this->_table, $this);
	}
	public function update()
	{
		$post = $this->input->post();
		$this->unit = $post["unit"];
		$this->kode_akun = $post["kode_akun"];
		$this->akun_piutang = $post["akun_piutang"];
		$this->nama_pos = $post["nama_pos"];
		$this->keterangan = $post["keterangan"];


		return $this->db->update($this->_table, $this, array('id_pos' => $post['id_pos']));
	}

	public function delete($id_pos)
	{
		return $this->db->delete($this->_table, array("id_pos" => $id_pos));
	}
}
