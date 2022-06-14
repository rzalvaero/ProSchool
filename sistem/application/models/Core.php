<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Core extends CI_Model{

	public function selectkelas()
	{
	$this->db->select('*');
	$this->db->from('sr_kelas');
	$query = $this->db->get();
	return $query->result();
	}

	function get_table($table_name)
	{
	  $get_user = $this->db->get($table_name);
	  return $get_user->result_array();
	}
	
	public function selectunit()
	{
		$this->db->select('*');
		$this->db->from('web_unit');
		$query = $this->db->get();
		return $query->result();
	}
	
	function selectekstra(){
		$unit = $this->session->userdata('unit');
        $hasil=$this->db->query("SELECT * FROM sr_ekstra WHERE unit='$unit'");
        return $hasil->result();
    }
	
	public function selectmethod()
	{
		$this->db->select('*');
		$this->db->from('web_payement_method');
		$this->db->where_not_in('status', ['Not Active']);
		$query = $this->db->get();
		return $query->result();
	}

	public function selectkategori_kamar()
	{
	$this->db->select('*');
	$this->db->from('sr_kamar_kategori');
	$query = $this->db->get();
	return $query->result();
	}

	public function select_kamar()
	{
	$this->db->select('*');
	$this->db->from('sr_kamar');
	$query = $this->db->get();
	return $query->result();
	}

	public function selectahunajaran()
	{
	$this->db->select('tp_tahun');
	$this->db->from('sr_tahun_pelajaran');
	$this->db->order_by('idtahun_pelajaran', 'DESC');
	$query = $this->db->get();
	return $query->result();
	}

	public function selectjabatan()
	{
		$this->db->select('*');
		$this->db->from('sr_jabatan');
		$query = $this->db->get();
		return $query->result();
	}
	public function selectrak()
	{
	$this->db->select('*');
	$this->db->from('sr_perpusrak');
	$query = $this->db->get();
	return $query->result();
	}

	public function selectbuku()
	{
	$this->db->select('*');
	$this->db->from('sr_perpuskategori');
	$query = $this->db->get();
	return $query->result();
	}
	
	public function selectKI()
	{
	$this->db->select('*');
	$this->db->from('sr_kompetensi_inti');
	$query = $this->db->get();
	return $query->result();
	}
	
	public function selectmatapelajaran()
	{
	$this->db->select('*');
	$this->db->from('sr_mata_pelajaran');
	$query = $this->db->get();
	return $query->result();
	}

	function get_provinsi(){
        $hasil=$this->db->query("SELECT * FROM sr_provinsi");
        return $hasil;
    }
 
    function get_subprovinsi($id){
        $hasil=$this->db->query("SELECT * FROM sr_kota WHERE province_id='$id'");
        return $hasil->result();
    }

	function get_siswa($id){
        $hasil=$this->db->query("SELECT a.idsiswa , a.s_nama FROM sr_siswa a WHERE a.unit='$id' AND a.idsiswa NOT IN (SELECT id_siswa FROM sr_kamar_penghuni WHERE id_kamar) ");//
        return $hasil->result();
    }
	
	function get_guru($id){
        $hasil=$this->db->query("SELECT a.id , a.first_name, a.last_name FROM users a WHERE a.unit='$id' AND a.id not in (SELECT walikelas FROM sr_kelas)");//a.unit='$id'
        return $hasil->result();
    }
	
	function get_guru_all(){
        $hasil=$this->db->query("SELECT a.id , a.first_name, a.last_name FROM users a");//a.unit='$id'
        return $hasil->result();
    }

	public function selectusersfile($id_file)
	{
	$id = $id_file;
	$query= $this->db->query('Select a.username, a.id from users a where a.id not in (select uid from tfiles_permission WHERE tfiles_id ='.$id.')');
	return $query->result();
	}

	function get_matapelajaran($id){
        $hasil=$this->db->query("SELECT * FROM sr_mata_pelajaran WHERE unit='$id'");
        return $hasil->result();
	}
	
	
    function kode_ppdb(){
        $this->db->select('RIGHT(sr_ppdb.id_ppdb,4) as kode', FALSE);
		  $this->db->order_by('id_ppdb','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('sr_ppdb');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $date			= date("Ymd");
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "REG-".$date."-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
 	
	public function buat_kode($table_name,$kodeawal,$idkode,$orderbylimit)
	{
		$query = $this->db->query("select * from $table_name $orderbylimit"); // cek dulu apakah ada sudah ada kode di tabel.
		if($query->num_rows() > 0){
		  //jika kode ternyata sudah ada.
		  $hasil 	= $query->row();
		  $kd 		= $hasil->$idkode;
		  $cd 		= $kd;
		  $nomor 	= $query->num_rows();
		  $kode 	= $cd + 1;
		  $kodejadi = $kodeawal."00".$kode;    // hasilnya CUS-0001 dst.
		  $kdj 		= $kodejadi;
		}else {
		  //jika kode belum ada
		  $kode = 0+1;
		  $kodejadi = $kodeawal."00".$kode;    // hasilnya CUS-0001 dst.
		  $kdj = $kodejadi;
		}
		return $kdj;
	}
	
	public function buat_unit($table_name,$idkode,$orderbylimit)
	{
		$query = $this->db->query("select * from $table_name $orderbylimit"); // cek dulu apakah ada sudah ada kode di tabel.
		if($query->num_rows() > 0){
		  //jika kode ternyata sudah ada.
		  $hasil 	= $query->row();
		  $kd 		= $hasil->$idkode;
		  $cd 		= $kd;
		  $nomor 	= $query->num_rows();
		  $kode 	= $cd + 1;
		  $kodejadi = $kode;    // hasilnya CUS-0001 dst.
		  $kdj 		= $kodejadi;
		}else {
		  //jika kode belum ada
		  $kode = 0+1;
		  $kodejadi = $kode;    // hasilnya CUS-0001 dst.
		  $kdj = $kodejadi;
		}
		return $kdj;
	}

	function deletes($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function CountTableId($table_name,$where,$id)
	{
     $this->db->where($where,$id);
     $Count = $this->db->get($table_name);
     return $Count->num_rows();
   	}

	function get_tableid_edit($table_name,$where,$id)
    {
     $this->db->where($where,$id);
     $edit = $this->db->get($table_name);
     return $edit->row();
    }

	function rp($angka){
		$hasil_rupiah = "Rp" . number_format($angka,0,',','.'). ',-';
		return $hasil_rupiah;
	}
	
	// data old
	public function selectusers()
	{
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where_not_in('username', ['admin']);
	$query = $this->db->get();
	return $query->result();
	}
	
	
	
	public function selectdokumen()
	{
	$this->db->select('*');
	$this->db->from('tdocument');
	$query = $this->db->get();
	return $query->result();
	}
	
	public function selectdivisi()
	{
	$this->db->select('*');
	$this->db->from('tdivision');
	$this->db->where_not_in('name', ['Administrator']);
	$query = $this->db->get();
	return $query->result();
	}
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	
	function input_data2($data,$table){
		$this->db->insert($table,$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	function edit($where,$table){		
		return $this->db->get_where($table,$where);
	}
 
	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
	function get_document(){
        $query = $this->db->get('tdocument');
        return $query;
    }
	
}
