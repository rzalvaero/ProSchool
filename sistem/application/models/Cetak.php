<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cetak extends CI_Model{

	public function read_users($id)
	{
		$this->db->select('*');
        $this->db->where('idkelas',$id);
		$check = $this->db->get('sr_siswa');
		if($check->num_rows()>0){        
			return $check->row();
		} else {
			return false;
		}
	}
    
    public function read_kelas($id)
	{
		$this->db->select('*');
        $this->db->where('idkelas',$id);
		$check = $this->db->get('sr_kelas');
		if($check->num_rows()>0){        
			return $check->row();
		} else {
			return false;
		}
	}

    public function list_kelas()
    {
        $this->db->order_by('k_tingkat','ASC');
		$query = $this->db->get('sr_kelas');
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$result[''] = '- Pilih Kelas -';
				$result[$row['idkelas']] = ucwords($row['k_romawi'].' - '.$row['k_keterangan']);
			}
			return $result;
		}
	}

    public function read_data_by_wali($id)
    {
		$this->db->select('*','edit as mode');
		$this->db->join('users','users.id = sr_kelas.walikelas','left');
		$this->db->join('sr_users','sr_users.idusers = sr_kelas.walikelas','left');
        $this->db->where('sr_kelas.walikelas',$id);
        $check = $this->db->get('sr_kelas');
        if($check->num_rows()>0){
            return $check->row();
        } else {
            return false;
        }
	}

    public function read_data_tahun($tahun)
    {
		$this->db->select('*','edit as mode');
        $this->db->where('tp_tahun',$tahun);
        return $this->db->get('sr_tahun_pelajaran')->row_array();
	}

    public function read_mapel()
    {
        $this->db->select('*');
        $this->db->order_by('mp_nama','ASC');
        return $this->db->get('sr_mata_pelajaran')->result();
	}

    public function count_mapel()
	{
		$this->db->from('sr_mata_pelajaran');
		return $this->db->count_all_results();
	}

    public function read_data_by_kelas($idkelas,$tahun)
    {
		$this->db->select('sr_siswa.*','edit as mode');
        $this->db->join('users','users.id = sr_kelas_guru.idusers','left');
        $this->db->join('sr_kelas','sr_kelas.idkelas = sr_kelas_guru.idkelas','left'); // baru ??
        $this->db->join('sr_siswa','sr_siswa.idkelas = sr_kelas_guru.idkelas','left'); // baru ??
        $this->db->where('sr_kelas.idkelas',$idkelas);
        // $this->db->where('sr_siswa.idtahun_pelajaran',$tahun);
        //$this->db->where('sr_kelas_guru.idusers',$idusers);
        return $this->db->get('sr_kelas_guru')->result();
	}

    public function read_all_data_pengetahuan($idsiswa,$idkelas,$idmapel,$tahun)
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

    public function read_all_data_keterampilan($idsiswa,$idkelas,$idmapel,$tahun)
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
}