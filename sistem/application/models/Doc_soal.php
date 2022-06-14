<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_soal extends CI_Model {


	private $_table = "sr_soal";
	private $_tabledetail = "sr_soaldetail";
	private $_table_k = "sr_kelas";
	private $_table_m = "sr_mata_pelajaran";
	private $_tablepaket = "sr_paketsoal";
	private $_tabletrpaket = "sr_tr_paketsoal";

	public $id_soal;
	public $kelas;
	public $mapel;
	public $guru;

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}
	public function vkelas()
	{
		$query = $this->db->query("
			select idkelas, k_keterangan from sr_kelas");
		return $query->result();
	}
	public function vmapel()
	{
		$query = $this->db->query("
			select idmata_pelajaran, mp_nama from sr_mata_pelajaran");
		return $query->result();
		
	}
    
   public function update($data, $id)
   {
     $this->db->update('sr_soaldetail', $data, array('id' => $id));
     return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

	public function soal_detail($id_guru)
	{
		$query = $this->db->query("SELECT users.id, sr_soal.id_soal, users.first_name, sr_soaldetail.soal FROM sr_soal LEFT JOIN users on sr_soal.idusers = users.id LEFT JOIN sr_soaldetail on sr_soal.id_soal = sr_soaldetail.id_soal WHERE sr_soal.idusers ='$id_guru'");
		return $query->result_array();	
	}

	public function daftar_soal($id_guru)
	{
		 $query = $this->db->query("SELECT users.id, sr_mata_pelajaran.mp_nama, sr_soal.id_soal, users.first_name, sr_kelas.k_tingkat as kelas, sr_kelas.k_keterangan as keterangan, sr_kelas.idkelas, SUBSTRING(sr_soaldetail.soal, 1, 10)as judulsoal , sr_soaldetail.id as no_soal,sr_soaldetail.soal as judulsoaldetail , sr_soaldetail.opsi_a, sr_soaldetail.opsi_b, sr_soaldetail.opsi_c, sr_soaldetail.opsi_d, sr_soaldetail.opsi_e, sr_soaldetail.jawaban FROM sr_soal LEFT JOIN users on sr_soal.idusers = users.id LEFT JOIN sr_kelas on sr_soal.idkelas = sr_kelas.idkelas LEFT JOIN sr_soaldetail on sr_soal.id_soal = sr_soaldetail.id_soal LEFT JOIN sr_mata_pelajaran on sr_soal.idmata_pelajaran = sr_mata_pelajaran.idmata_pelajaran WHERE sr_soal.idusers ='$id_guru' and sr_soaldetail.status ='1' ");	
		return $query;
	}


	public function paket_soal($id)
	{
		$query = $this->db->query("SELECT sr_paketsoal.id, sr_paketsoal.nama_paket, sr_paketsoal.jumlah_soal, sr_mata_pelajaran.mp_nama, users.first_name FROM sr_paketsoal LEFT JOIN sr_mata_pelajaran on sr_paketsoal.id_mapel = sr_mata_pelajaran.idmata_pelajaran LEFT JOIN users on sr_paketsoal.id_guru = users.id WHERE sr_paketsoal.id_guru ='$id'");	
		return $query;
	}

	public function paket_soaldet($id)
	{
		$query = $this->db->query("SELECT sr_paketsoal.id, sr_paketsoal.nama_paket, sr_paketsoal.jumlah_soal, sr_mata_pelajaran.mp_nama, users.first_name FROM sr_paketsoal LEFT JOIN sr_mata_pelajaran on sr_paketsoal.id_mapel = sr_mata_pelajaran.idmata_pelajaran LEFT JOIN users on sr_paketsoal.id_guru = users.id LEFT JOIN sr_tr_paketsoal on sr_paketsoal.id = sr_tr_paketsoal.id_paket WHERE sr_paketsoal.id_guru ='$id' group by sr_paketsoal.id");	
		return $query;
	}
	public function paket_jumlahsoal($id)
	{
		$query = $this->db->query("SELECT sr_paketsoal.id, sr_paketsoal.nama_paket, sr_paketsoal.jumlah_soal, sr_mata_pelajaran.mp_nama, users.first_name, count(sr_tr_paketsoal.id_paket) as jumlah FROM sr_paketsoal LEFT JOIN sr_mata_pelajaran on sr_paketsoal.id_mapel = sr_mata_pelajaran.idmata_pelajaran LEFT JOIN users on sr_paketsoal.id_guru = users.id LEFT JOIN sr_tr_paketsoal on sr_paketsoal.id_mapel = sr_tr_paketsoal.id_soal WHERE sr_tr_paketsoal.id_paket =sr_paketsoal.id");	
		return $query;
	}

	public function getById($id_soal)
	{
		return $this->db->get_where($this->_table, ["id_soal" => $id_soal])->row();
	}

	public function in_soal($data){
        
         return $this->db->insert($this->_table, $data);

    }
    public function in_paketsoal($data){
         
         return $this->db->insert($this->_tablepaket, $data);

    }
     public function in_trpaketsoal($data){
         
         return $this->db->insert($this->_tabletrpaket, $data);

    }
    public function in_detail_soal($data){
         
         return $this->db->insert($this->_tabledetail, $data);

    }
    public function view_soal($id)
	{
		$query = $this->db->query("SELECT users.id, sr_soal.id_soal, users.first_name, sr_kelas.k_tingkat as kelas, sr_kelas.k_keterangan as keterangan, sr_kelas.idkelas, sr_soaldetail.soal as judulsoal , sr_soaldetail.opsi_a, sr_soaldetail.opsi_b, sr_soaldetail.opsi_c, sr_soaldetail.opsi_d, sr_soaldetail.opsi_e, sr_soaldetail.jawaban FROM sr_soal LEFT JOIN users on sr_soal.idusers = users.id LEFT JOIN sr_kelas on sr_soal.idkelas = sr_kelas.idkelas LEFT JOIN sr_soaldetail on sr_soal.id_soal = sr_soaldetail.id_soal WHERE sr_soaldetail.id ='$id'");	
		return $query;
	}
	public function pkelas($id)
	{
		$query = $this->db->query("SELECT idkelas, k_keterangan, k_romawi FROM sr_kelas WHERE walikelas = '$id' ");	
		return $query;
	}
}
