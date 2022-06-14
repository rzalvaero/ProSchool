<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_wali extends CI_Model {
 
    protected $table = 'sr_siswa';
	protected $id = 'idsiswa';
	protected $order = 'DESC';
	private $_batchImport;

	var $column = array('idsiswa','k_tingkat','s_nisn','s_nama','s_nik','s_jenis_kelamin','s_tl_idkota','s_tanggal_lahir','s_wali','s_dusun','s_domisili','s_abk','s_bsm_pip','s_keluarga_miskin','idsiswa');

	
	
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	private function _get_datatables_query()
	{
        $this->db->join('sr_kelas_guru','sr_kelas_guru.idkelas = sr_siswa.idkelas','left');
        $this->db->join('sr_provinsi','sr_provinsi.province_id = sr_siswa.s_tl_idprovinsi','left');
		$this->db->join('sr_kota','sr_kota.city_id = sr_siswa.s_tl_idkota','left');
		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column as $item){
			if ($_POST['search']['value']){
				if ($i===0){
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column) - 1 == $i){
					$this->db->group_end();
				}
			}
			$column[$i] = $item;
			$i++;
		}

		if (isset($_POST['order'])){
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order),$order[key($order)]);
		}
	}
	public function count_all_wali($id)
	{
		$this->db->from($this->table);
		$this->db->where('idkelas',$id);
		return $this->db->count_all_results();
	}
	
	public function count_filtered_wali($id)
	{
		$this->_get_datatables_query();
		$this->db->where('sr_kelas_guru.idusers',$id);
		$query = $this->db->get();
		return $query->num_rows();
	}


}