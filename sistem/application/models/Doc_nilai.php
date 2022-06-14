<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_nilai extends CI_Model {
 
    protected $table = 'sr_nilai_pengetahuan';
	protected $id = 'idnilai_pengetahuan';
	protected $order = 'DESC';
    
	var $column = array('idnilai_pengetahuan','s_nama','np_harian','idnilai_pengetahuan','idnilai_pengetahuan','idnilai_pengetahuan','idnilai_pengetahuan','idnilai_pengetahuan','idnilai_pengetahuan','idnilai_pengetahuan');
   
	
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	function _get_datatables_query()
	{
        $this->db->join('sr_tahun_pelajaran','sr_tahun_pelajaran.idtahun_pelajaran = sr_nilai_pengetahuan.idtahun_pelajaran','left');
        $this->db->join('sr_users','sr_users.idusers = sr_nilai_pengetahuan.idusers','left');
        $this->db->join('sr_siswa','sr_siswa.idsiswa = sr_nilai_pengetahuan.idsiswa','left');
        $this->db->join('sr_kelas','sr_kelas.idkelas = sr_siswa.idkelas','left');
        $this->db->join('sr_kompetensi_dasar','sr_kompetensi_dasar.id_kompetensidasar = sr_nilai_pengetahuan.idkompetensi_dasar','left');
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
	
    public function get_datatables_siswa($idkelas,$tahun,$id)
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
        $this->db->limit($_POST['length'],$_POST['start']);
        $this->db->where('sr_nilai_pengetahuan.idkelas',$idkelas);
        $this->db->where('sr_nilai_pengetahuan.idtahun_pelajaran',$tahun);
        $this->db->where('sr_nilai_pengetahuan.idusers',$id);
        $this->db->group_by('sr_nilai_pengetahuan.idsiswa');
		$query = $this->db->get();
		return $query->result();
    }
	
	public function read_mapel_by_id($id)
	{
		$this->db->select('*');
        $this->db->where('idusers',$id);
		$check = $this->db->get('sr_mata_pelajaran_guru')->num_rows();
		if($check>0){        
			$this->db->join('sr_mata_pelajaran','sr_mata_pelajaran.idmata_pelajaran = sr_mata_pelajaran_guru.idmata_pelajaran','left');
            $this->db->order_by('idmata_pelajaran_guru','DESC');
            $this->db->where('idusers',$id);
			return $this->db->get('sr_mata_pelajaran_guru')->result();
		} else {
			return false;
		}
	}
	
	public function read_data_by_mapel($id)
    {
        $this->db->select('*');
        $this->db->where('idmata_pelajaran',$id);
        $check = $this->db->get('sr_kkm');
        if($check->num_rows()>0){
            return $check->row();
        } else {
            return false;
        }
    }
	
	// Pengetahuan
	public function check_rencana_pengetahuan($data)
    {
        $this->db->select('*');
        $this->db->where($data);
		$check = $this->db->get('sr_rencana_kd_pengetahuan');
		if ($check->num_rows()>0){
			return $check->row_array();
		} else {
			return false;
		}
	}
	
	// Keterampilan
	public function check_rencana_keterampilan($data)
    {
        $this->db->select('*');
        $this->db->where($data);
        $check = $this->db->get('sr_rencana_kd_keterampilan');
		if ($check->num_rows()>0){
			return $check->row_array();
		} else {
			return false;
		}
	}
	
	 public function read_data_siswa($idsiswa,$idkelas,$idmapel,$tahun,$id)
    {
        $this->db->where('idtahun_pelajaran',$tahun);
        $this->db->where('idkelas',$idkelas);
        $this->db->where('idmata_pelajaran',$idmapel);
        $this->db->where('idusers',$id);
        $this->db->where('idsiswa',$idsiswa);
        $check = $this->db->get('sr_nilai_pengetahuan');
        if($check->num_rows()>0){
            return $check->result();
        } else {
            return false;
        }
    }
	
	public function read_data_siswauts($idsiswa,$idkelas,$idmapel,$tahun,$id)
    {
        $this->db->where('idtahun_pelajaran',$tahun);
        $this->db->where('idkelas',$idkelas);
        $this->db->where('idmata_pelajaran',$idmapel);
        $this->db->where('idusers',$id);
        $this->db->where('idsiswa',$idsiswa);
        $check = $this->db->get('sr_nilai_pengetahuan_utsuas');
        if($check->num_rows()>0){
            return $check->row();
        } else {
            return false;
        }
    }
	
	 public function read_data_siswaketerampilan($idsiswa,$idkelas,$idmapel,$tahun,$id)
    {
        $this->db->where('idtahun_pelajaran',$tahun);
        $this->db->where('idkelas',$idkelas);
        $this->db->where('idmata_pelajaran',$idmapel);
        $this->db->where('idusers',$id);
        $this->db->where('idsiswa',$idsiswa);
        $check = $this->db->get('sr_nilai_keterampilan');
        if($check->num_rows()>0){
            return $check->result();
        } else {
            return false;
        }
    }
	
	public function read_data_by_mapelkkm($id)
    {
        $this->db->select('*');
        $this->db->where('idmata_pelajaran',$id);
        $check = $this->db->get('sr_kkm');
        if($check->num_rows()>0){
            return $check->row();
        } else {
            return false;
        }
    }
	
	public function read_data_by_kkm($id)
    {
        $this->db->select('*');
        $this->db->where('idkkm',$id);
        $check = $this->db->get('sr_interval_predikat');
        if($check->num_rows()>0){
            return $check->row();
        } else {
            return false;
        }
    }
	
	public function count_all_wali($id)
	{
		$this->db->from('sr_siswa');
		$this->db->where('idkelas',$id);
		return $this->db->count_all_results();
	}
	
	public function count_filtered_wali_p($id)
	{
		$this->_get_datatables_query_p();
		$this->db->where('sr_kelas.idusers',$id);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	public function read_users_by_kelas($id)
	{
		$this->db->select('*');
        $this->db->where('idkelas',$id);
		$check = $this->db->get('sr_kelas_guru');
		if($check->num_rows()>0){        
			return $check->row();
		} else {
			return false;
		}
	}
	
	
	public function read_one_data_by_id($id)
    {
        $this->db->select('mp_nama');
        $this->db->where('idmata_pelajaran',$id);
		$check = $this->db->get('sr_mata_pelajaran');
		if ($check->num_rows()>0){
			return $check->row();
		} else {
			return false;
		}
	}
	
	 public function read_all_data_siswautsuas($idsiswa,$idkelas,$idmapel,$tahun)
    {
        $this->db->where('idtahun_pelajaran',$tahun);
        $this->db->where('idkelas',$idkelas);
        $this->db->where('idmata_pelajaran',$idmapel);
        $this->db->where('idsiswa',$idsiswa);
        $check = $this->db->get('sr_nilai_pengetahuan_utsuas');
        if($check->num_rows()>0){
            return $check->row();
        } else {
            return false;
        }
    }
	
	
	
	 public function read_all_data_siswa($idsiswa,$idkelas,$idmapel,$tahun)
    {
        $this->db->where('idtahun_pelajaran',$tahun);
        $this->db->where('idkelas',$idkelas);
        $this->db->where('idmata_pelajaran',$idmapel);
        $this->db->where('idsiswa',$idsiswa);
        $check = $this->db->get('sr_nilai_pengetahuan');
        if($check->num_rows()>0){
            return $check->result();
        } else {
            return false;
        }
    }
	
	 public function read_data_by_id($id)
    {
		$this->db->select('*','edit as mode');
        $this->db->where('id_kompetensidasar',$id);
        return $this->db->get('sr_kompetensi_dasar')->row_array();
	}
	
	 public function read_all_data_siswaketerampilan($idsiswa,$idkelas,$idmapel,$tahun)
    {
        $this->db->where('idtahun_pelajaran',$tahun);
        $this->db->where('idkelas',$idkelas);
        $this->db->where('idmata_pelajaran',$idmapel);
        $this->db->where('idsiswa',$idsiswa);
        $check = $this->db->get('sr_nilai_keterampilan');
        if($check->num_rows()>0){
            return $check->result();
        } else {
            return false;
        }
    }

	public function read_data()
    {
        $this->db->select('*');
        $this->db->order_by('mp_nama','ASC');
        return $this->db->get('sr_mata_pelajaran')->result();
	}
	
	public function count_all()
	{
		$this->db->from('sr_mata_pelajaran');
		return $this->db->count_all_results();
	}
	
	 public function read_data_by_kelas($idkelas,$tahun,$idusers)
    {
		$this->db->select('*','edit as mode');
        $this->db->join('sr_siswa','sr_siswa.idkelas = sr_kelas_guru.idkelas','left');
        $this->db->join('sr_kelas','sr_kelas.idkelas = sr_kelas_guru.idkelas','left'); // baru ??
        $this->db->join('users','sr_kelas_guru.idusers = users.id','left'); // baru ??
        $this->db->where('sr_kelas_guru.idkelas',$idkelas);
       // $this->db->where('sr_siswa_guru.idtahun_pelajaran',$tahun);
        $this->db->where('sr_kelas_guru.idusers',$idusers);
        return $this->db->get('sr_kelas_guru')->result();
	}

}