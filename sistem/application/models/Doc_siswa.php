<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_siswa extends CI_Model {
 
    var $table = 'sr_siswa';
	var $kelas = 'sr_kelas';
	var $mp = 'sr_mata_pelajaran';
	var $pengetahuan = 'sr_nilai_pengetahuan';
	var $kompetensi = 'sr_kompetensi_dasar';
	var $uts =  'sr_nilai_pengetahuan_utsuas';
    var $column_order = array(null, 's_nisn','s_nik','s_nama','s_tanggal_lahir','s_email','s_telepon'); //set column field database for datatable orderable
    var $column_search = array('s_nisn','s_nik'); //set column field database for datatable searchable 
    var $order = array('idsiswa' => 'asc'); // default order 
	var $column = array('idkompetensi_dasar','k_tingkat','kd_kategori','kd_kode','kd_nama','idkompetensi_dasar');
   
	
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
         
        //add custom filter here
		if($this->session->userdata('type_users')=="ADMIN"){ 
			if($this->input->post('unit'))
			{
				$this->db->where('unit', $this->input->post('unit'));
			}
		} else {
			$unit = $this->session->userdata('unit');
			$this->db->where('unit', $unit); 
		}
		
		if($this->input->post('kelas'))
        {
            $this->db->where('idkelas', $this->input->post('kelas'));
        }
        
        if($this->input->post('nisn'))
        {
            $this->db->like('s_nisn', $this->input->post('nisn'));
        }
        if($this->input->post('nik'))
        {
            $this->db->like('s_nik', $this->input->post('nik'));
        }
 
        $this->db->from($this->table);
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    public function get_datatables()
    {
       $query = $this->db->query("SELECT * FROM sr_nilai_pengetahuan_utsuas 
		 LEFT JOIN sr_tahun_pelajaran on sr_tahun_pelajaran.idtahun_pelajaran = sr_nilai_pengetahuan_utsuas.idtahun_pelajaran 
		 LEFT JOIN sr_users on sr_users.idusers = sr_nilai_pengetahuan_utsuas.idusers 
		 LEFT JOIN sr_siswa on sr_siswa.idsiswa = sr_nilai_pengetahuan_utsuas.idsiswa 
		 LEFT JOIN sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas 
		 where sr_nilai_pengetahuan_utsuas.idkelas = '1' 
		 and sr_nilai_pengetahuan_utsuas.idmata_pelajaran = '2'  
		 and sr_nilai_pengetahuan_utsuas.idtahun_pelajaran ='1' 
		 and sr_nilai_pengetahuan_utsuas.idusers ='1'"); 
		 return $query->result();
    }
 
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function get_list_countries()
    {
        $this->db->select('country');
        $this->db->from($this->table);
        $this->db->order_by('country','asc');
        $query = $this->db->get();
        $result = $query->result();
 
        $countries = array();
        foreach ($result as $row) 
        {
            $countries[] = $row->country;
        }
        return $countries;
    }
 // indra
	public function list_kelas_by_id($id)
    {
        $this->db->order_by('k_tingkat','ASC');
		$this->db->join('sr_kelas_guru','sr_kelas_guru.idkelas = sr_kelas.idkelas','');
		$this->db->where('sr_kelas_guru.idusers',$id);
		$query = $this->db->get($this->kelas);
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$result[''] = '- Pilih Kelas -';
				$result[$row['idkelas']] = ucwords($row['k_romawi'].' - '.$row['k_keterangan']);
			}
			return $result;
		}
	}
	
	public function list_kelas_by_idall()
    {
        $this->db->order_by('k_tingkat','ASC');
		$this->db->join('sr_kelas_guru','sr_kelas_guru.idkelas = sr_kelas.idkelas','');
		//$this->db->where('sr_kelas_guru.idusers',$id);
		$query = $this->db->get($this->kelas);
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$result[''] = '- Pilih Kelas -';
				$result[$row['idkelas']] = ucwords($row['k_romawi'].' - '.$row['k_keterangan']);
			}
			return $result;
		}
	}
	
	
	public function list_mapel_by_idall()
    {
		$this->db->order_by('mp_kode','ASC');
		$this->db->join('sr_mata_pelajaran_guru','sr_mata_pelajaran_guru.idmata_pelajaran = sr_mata_pelajaran.idmata_pelajaran','');
		//$this->db->where('sr_mata_pelajaran_guru.idusers',$id);
		$query = $this->db->get($this->mp);
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$result[''] = '- Pilih Mata Pelajaran -';
				$result[$row['idmata_pelajaran']] = ucwords($row['mp_kode'].' - '.$row['mp_nama']);
			}
			return $result;
		}
    }
	
	public function list_mapel_by_id($id)
    {
		$this->db->order_by('mp_kode','ASC');
		$this->db->join('sr_mata_pelajaran_guru','sr_mata_pelajaran_guru.idmata_pelajaran = sr_mata_pelajaran.idmata_pelajaran','');
		$this->db->where('sr_mata_pelajaran_guru.idusers',$id);
		$query = $this->db->get($this->mp);
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$result[''] = '- Pilih Mata Pelajaran -';
				$result[$row['idmata_pelajaran']] = ucwords($row['mp_kode'].' - '.$row['mp_nama']);
			}
			return $result;
		}
    }
	
	public function list_siswa()
	{
        $this->db->join('sr_kelas','sr_kelas.idkelas = sr_siswa.idkelas','left');
		$this->db->order_by('s_nama','ASC');
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$result[''] = '- Pilih Siswa -';
				$result[$row['idsiswa']] = ucwords($row['idsiswa'].' - NISN ('.$row['s_nama'].')'.' - Kelas ('.$row['s_nisn'].')'.' - Kelas ('.$row['k_romawi'].')');
				
			}
			return $result;
		}
	}
		
	public function list_kd_by_id($tahun,$idmapel,$id,$kategori,$idkelas)
    {
		if($kategori=='Pengetahuan'){
			$this->db->order_by('kd','ASC');
			$this->db->where('idtahun_pelajaran',$tahun);
			$this->db->where('idmata_pelajaran',$idmapel);
			$this->db->where('idkelas',$idkelas);
			$this->db->where('idusers',$id);
			$this->db->where('kd_kategori',$kategori);
			//$this->db->where('kd_status','Y');
			$query = $this->db->get($this->kompetensi);
			if ($query->num_rows() > 0){
				foreach ($query->result_array() as $row){
					$result[''] = '- Pilih Penilaian -';
					$result['utsuas'] = 'Ujian Tengah/Akhir Semester (UTS/UAS)';
					$result[$row['id_kompetensidasar']] = ucwords($row['kd'].' - '.$row['kd_nama']);
				}
				return $result;
			}
		} else {
			$this->db->order_by('kd','ASC');
			$this->db->where('idtahun_pelajaran',$tahun);
			$this->db->where('idmata_pelajaran',$idmapel);
			$this->db->where('idkelas',$idkelas);
			$this->db->where('idusers',$id);
			$this->db->where('kd_kategori',$kategori);
			//$this->db->where('kd_status','Y');
			$query = $this->db->get($this->kompetensi);
			if ($query->num_rows() > 0){
				foreach ($query->result_array() as $row){
					$result[''] = '- Pilih Penilaian -';
					$result[$row['id_kompetensidasar']] = ucwords($row['kd'].' - '.$row['kd_nama']);
				}
				return $result;
			}
		}
		
	}
	

	public function users($id)
	{
		 $query = $this->db->query("SELECT * FROM sr_kelas_guru a where idusers = $id ");	
		return $query;
	}
	public function tahun()
	{
		 $query = $this->db->query("SELECT tahun_ajaran FROM web_setting");	
		return $query;
	}
	
	function _get_datatables_queryb()
	{
        $this->db->join('sr_tahun_pelajaran','sr_tahun_pelajaran.idtahun_pelajaran = sr_kompetensi_dasar.idtahun_pelajaran','left');
        $this->db->join('sr_mata_pelajaran','sr_mata_pelajaran.idmata_pelajaran = sr_kompetensi_dasar.idmata_pelajaran','left');
        $this->db->join('users','users.id = sr_kompetensi_dasar.idusers','left');
        $this->db->join('sr_kelas','sr_kelas.idkelas = sr_kompetensi_dasar.idkelas','left');
		$this->db->from($this->kompetensi);

    }	
	
	public function get_datatablesb($idmapel,$tahun,$id)
	{
		 $query = $this->db->query("SELECT * FROM sr_kompetensi_dasar 
		 LEFT JOIN sr_tahun_pelajaran on sr_tahun_pelajaran.idtahun_pelajaran = sr_nilai_pengetahuan.idtahun_pelajaran 
		 LEFT JOIN sr_users on sr_users.idusers = sr_nilai_pengetahuan.idusers 
		 LEFT JOIN sr_siswa on sr_siswa.idsiswa = sr_nilai_pengetahuan.idsiswa 
		 LEFT JOIN sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas 
		 LEFT JOIN sr_kompetensi_dasar on sr_kompetensi_dasar.id_kompetensidasar = sr_nilai_pengetahuan.idkompetensi_dasar 
		 where sr_kompetensi_dasar.idmata_pelajaran = '2' 
		 and sr_kompetensi_dasar.idtahun_pelajaran ='1' 
		 and users.id ='1'");
		 return $query->result();
    }
	public function count_filteredb($idmapel,$tahun,$id)
	{
		$this->_get_datatables_queryb();
        $this->db->where('sr_kompetensi_dasar.idmata_pelajaran',$idmapel);
        $this->db->where('sr_kompetensi_dasar.idtahun_pelajaran',$tahun);
		$this->db->where('users.id',$id);
		$query = $this->db->get();
		return $query->num_rows();
    }
	public function count_all_uas($idkelas,$idmapel,$tahun,$id)
	{
        $this->db->from($this->uts);
        $this->db->join('sr_tahun_pelajaran','sr_tahun_pelajaran.idtahun_pelajaran = sr_nilai_pengetahuan_utsuas.idtahun_pelajaran','left');
        $this->db->join('sr_users','sr_users.idusers = sr_nilai_pengetahuan_utsuas.idusers','left');
        $this->db->join('sr_siswa','sr_siswa.idsiswa = sr_nilai_pengetahuan_utsuas.idsiswa','left');
        $this->db->join('sr_kelas','sr_kelas.idkelas = sr_siswa.idkelas','left');
        $this->db->where('sr_nilai_pengetahuan_utsuas.idkelas',$idkelas);
        $this->db->where('sr_nilai_pengetahuan_utsuas.idmata_pelajaran',$idmapel);
        $this->db->where('sr_nilai_pengetahuan_utsuas.idtahun_pelajaran',$tahun);
		$this->db->where('sr_nilai_pengetahuan_utsuas.idusers',$id);
		return $this->db->count_all_results();
    }
	
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
	
	public function count_all_pengetahuan($idkelas,$idmapel,$idkd,$tahun,$id)
	{
        $this->db->from($this->pengetahuan);
        $this->db->join('sr_tahun_pelajaran','sr_tahun_pelajaran.idtahun_pelajaran = sr_nilai_pengetahuan.idtahun_pelajaran','left');
        $this->db->join('sr_users','sr_users.idusers = sr_nilai_pengetahuan.idusers','left');
        $this->db->join('sr_siswa','sr_siswa.idsiswa = sr_nilai_pengetahuan.idsiswa','left');
        $this->db->join('sr_kelas','sr_kelas.idkelas = sr_siswa.idkelas','left');
        $this->db->join('sr_kompetensi_dasar','sr_kompetensi_dasar.id_kompetensidasar = sr_nilai_pengetahuan.idkompetensi_dasar','left');
        $this->db->where('sr_nilai_pengetahuan.idkelas',$idkelas);
        $this->db->where('sr_nilai_pengetahuan.idmata_pelajaran',$idmapel);
        $this->db->where('sr_nilai_pengetahuan.idkompetensi_dasar',$idkd);
        $this->db->where('sr_nilai_pengetahuan.idtahun_pelajaran',$tahun);
		$this->db->where('sr_nilai_pengetahuan.idusers',$id);
		return $this->db->count_all_results();
    }
	
	// function ajax list utsuas
	public function check_data_pengetahuan($idkelas,$idmapel,$tahun,$id)
    {
        $this->db->where('idtahun_pelajaran',$tahun);
        $this->db->where('idkelas',$idkelas);
        $this->db->where('idmata_pelajaran',$idmapel);
        $this->db->where('idusers',$id);
        $check = $this->db->get($this->uts)->num_rows();
        if($check>0){
            return true;
        } else {
            return false;
        }
    }
	public function batch_pengetahuan($tahun,$id,$idkelas,$idmapel)
    {
        $this->db->select('idsiswa');
        $this->db->where('idkelas',$idkelas);
        $siswa = $this->db->get('sr_siswa');
        if($siswa->num_rows()>0){
            $result_utsuas = array();
            foreach ($siswa->result() as $row){
                $result_utsuas[] = [
                    'idtahun_pelajaran' => $tahun,
                    'idmata_pelajaran' => $idmapel,
                    'idusers' => $id,
                    'idkelas' => $idkelas,
                    'idsiswa' => $row->idsiswa,
                    'np_uts' => 0,
                    'np_uas' => 0
                ];
            }
            $this->db->insert_batch('sr_nilai_pengetahuan_utsuas', $result_utsuas);
            return true;
        } else {
            return false;
        }
    }
    
	 public function check_duplikat_siswa_utsuas($idsiswa,$idkelas,$idmapel)
    {   
        $this->db->where('idusers',$this->session->userdata('id'));
        $this->db->where('idsiswa',$idsiswa);
        $this->db->where('idkelas',$idkelas);
        $this->db->where('idmata_pelajaran',$idmapel);
        $check = $this->db->get($this->uts)->num_rows();
        if($check>1){
            return true;
        } else {
            return false;
        }
    }
	

	public function get_datatabless($idkelas,$idmapel,$tahun,$id)
	{
		$this->_get_datatables_queryuts();
		if ($_POST['length'] != -1)
        $this->db->limit($_POST['length'],$_POST['start']);
        $this->db->where('sr_nilai_pengetahuan_utsuas.idkelas',$idkelas);
        $this->db->where('sr_nilai_pengetahuan_utsuas.idmata_pelajaran',$idmapel);
        $this->db->where('sr_nilai_pengetahuan_utsuas.idtahun_pelajaran',$tahun);
		$this->db->where('sr_nilai_pengetahuan_utsuas.idusers',$id);
		$query = $this->db->get();
		return $query->result();
    }
	
	public function count_alluts($idkelas,$idmapel,$tahun,$id)
	{
        $this->db->from($this->uts);
        $this->db->join('sr_tahun_pelajaran','sr_tahun_pelajaran.idtahun_pelajaran = sr_nilai_pengetahuan_utsuas.idtahun_pelajaran','left');
        $this->db->join('sr_users','sr_users.idusers = sr_nilai_pengetahuan_utsuas.idusers','left');
        $this->db->join('sr_siswa','sr_siswa.idsiswa = sr_nilai_pengetahuan_utsuas.idsiswa','left');
        $this->db->join('sr_kelas','sr_kelas.idkelas = sr_siswa.idkelas','left');
        $this->db->where('sr_nilai_pengetahuan_utsuas.idkelas',$idkelas);
        $this->db->where('sr_nilai_pengetahuan_utsuas.idmata_pelajaran',$idmapel);
        $this->db->where('sr_nilai_pengetahuan_utsuas.idtahun_pelajaran',$tahun);
		$this->db->where('sr_nilai_pengetahuan_utsuas.idusers',$id);
		return $this->db->count_all_results();
    }
	
	public function count_filtereduts($idkelas,$idmapel,$tahun,$id)
	{
		 $query = $this->db->query("SELECT * FROM sr_nilai_pengetahuan_utsuas 
		 LEFT JOIN sr_tahun_pelajaran on sr_tahun_pelajaran.idtahun_pelajaran = sr_nilai_pengetahuan_utsuas.idtahun_pelajaran 
		 LEFT JOIN sr_users on sr_users.idusers = sr_nilai_pengetahuan_utsuas.idusers 
		 LEFT JOIN sr_siswa on sr_siswa.idsiswa = sr_nilai_pengetahuan_utsuas.idsiswa 
		 LEFT JOIN sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas 
		 where sr_nilai_pengetahuan_utsuas.idkelas = '1' 
		 and sr_nilai_pengetahuan_utsuas.idmata_pelajaran = '2'  
		 and sr_nilai_pengetahuan_utsuas.idtahun_pelajaran ='1' 
		 and sr_nilai_pengetahuan_utsuas.idusers ='1'"); 
		return $query->num_rows();
    }
	
	public function batch_pengetahuankd($tahun,$id,$idkelas,$idmapel,$idkd)
    {
        $this->db->select('idsiswa');
        $this->db->where('idkelas',$idkelas);
        $siswa = $this->db->get('sr_siswa');
        if($siswa->num_rows()>0){
            $result = array();
            foreach ($siswa->result() as $row){
                $result[] = [
                    'idtahun_pelajaran' => $tahun,
                    'idmata_pelajaran' => $idmapel,
                    'idkompetensi_dasar' => $idkd,
                    'idusers' => $id,
                    'idsiswa' => $row->idsiswa,
                    'idkelas' => $idkelas,
                    'np_harian' => ''
                ];
            }
            $this->db->insert_batch('sr_nilai_pengetahuan', $result);
            return true;
        } else {
            return false;
        }
    }
	
	 public function read_data_by_id($id)
    {
		$this->db->select('*','edit as mode');
        $this->db->join('sr_kelas','sr_kelas.idkelas = sr_siswa.idkelas','left');
        $this->db->join('sr_provinsi','sr_provinsi.province_id = sr_siswa.s_tl_idprovinsi','left');
		$this->db->join('sr_kota','sr_kota.city_id = sr_siswa.s_tl_idkota','left');
        $this->db->where('idsiswa',$id);
        return $this->db->get($this->table)->row_array();
	}
	
    public function check_data($data)
    {
        $this->db->select('*');
        $this->db->where($data);
        $check = $this->db->get($this->uts)->num_rows();
        if($check>0){
            return true;
        } else {
            return false;
        }
    }

}