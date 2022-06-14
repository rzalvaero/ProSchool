<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_unit extends CI_Model {
  // Fetch users
  public function getUnit(){
    $this->db->select('*');
    $fetched_records = $this->db->get('web_sekolah');
    $unit = $fetched_records->result_array();
    return $unit;
  }

  // Update record
  public function updateUnit($id,$field,$value){
    $data=array($field => $value);
    $this->db->where('id',$id);
    $this->db->update('web_sekolah',$data);
  }
  
  public function updateNilai($id,$field,$value){
    $data=array($field => $value);
    $this->db->where('id_nilai_ekstrakulikuler',$id);
    $this->db->update('sr_nilai_ekstrakulikuler',$data);
  }

}