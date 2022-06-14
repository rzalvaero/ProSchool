<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_setting_gaji extends CI_Model {


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
	public function account()
	{
		//query sr_account where modul_keuangan = biaya
		$this->db->select('*');
		$this->db->from('sr_account');
		$this->db->where('modul_keuangan', 'biaya');
		$query = $this->db->get();
		return $query->result();

	}
	public function getAll()
	{
//		result array query join users and sr_users and web_unit
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('sr_users', 'sr_users.idusers = users.id');
		$this->db->join('web_unit', 'web_unit.id = sr_users.unit');
		$this->db->order_by('first_name', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getById($id_pos)
	{
		//		result array query join users and sr_users and web_unit where idusers
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('sr_users', 'sr_users.idusers = users.id');
		$this->db->join('web_unit', 'web_unit.id = sr_users.unit');
		$this->db->where('sr_users.idusers', $id_pos);
		$query = $this->db->get();
		return $query->row_array();
//		return $this->db->get_where($this->_table, ["id_pos" => $id_pos])->row();
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
