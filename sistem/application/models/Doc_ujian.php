<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Doc_ujian extends CI_Model {


	private $_table = "sr_guru_tes";
	private $_tabledetail = "sr_soaldetail";
	private $_table_k = "sr_kelas";
	private $_table_m = "sr_mata_pelajaran";
	private $_tablepaket = "sr_paketsoal";
	private $_tabletrpaket = "sr_tr_paketsoal";
	var $pengetahuan = 'sr_nilai_pengetahuan';
	var $pengetahuanuts = 'sr_nilai_pengetahuan_utsuas';
	var $order = array('idsiswa' => 'desc');
	var $column = array('idnilai_pengetahuan','s_nama','np_harian','idnilai_pengetahuan','idnilai_pengetahuan','idnilai_pengetahuan','idnilai_pengetahuan','idnilai_pengetahuan','idnilai_pengetahuan','idnilai_pengetahuan');
	public $id_soal;
	public $idnilai_pengetahuan;
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

	public function soal_detail($id_guru)
	{
		$query = $this->db->query("SELECT users.id, sr_soal.id_soal, users.first_name, sr_soaldetail.soal FROM sr_soal LEFT JOIN users on sr_soal.idusers = users.id LEFT JOIN sr_soaldetail on sr_soal.id_soal = sr_soaldetail.id_soal WHERE sr_soal.idusers ='$id_guru'");
		return $query->result_array();	
	}

	public function viewujian($id)
	{
		$query = $this->db->query("SELECT sr_guru_tes.*, count(sr_tr_paketsoal.id_paket)as total_soal FROM sr_guru_tes LEFT JOIN sr_tr_paketsoal on sr_guru_tes.id = sr_tr_paketsoal.id_paket WHERE sr_guru_tes.id_guru ='$id ' group by sr_guru_tes.id");
		return $query;	
	}
	public function viewhasilujiansiswa($id, $id_ujian)
	{
		$query = $this->db->query("SELECT nilai, jml_benar, tgl_selesai, sum(case sr_ikut_ujian_detil_jawaban.status_jawaban when '0' then 1 else 0 end) as jml_salah, count(sr_ikut_ujian_detil_jawaban.id_ikut_ujian) as juml_dikerjakan FROM sr_ikut_ujian LEFT JOIN sr_ikut_ujian_detil_jawaban on sr_ikut_ujian.id = sr_ikut_ujian_detil_jawaban.id_ikut_ujian WHERE sr_ikut_ujian.id = '$id_ujian' AND id_user = $id AND status = 'N'");	
		return $query;
	}
	public function viewhasilujiansiswadet($id, $id_ujian)
	{
		$query = $this->db->query("SELECT nilai, jml_benar, tgl_selesai, sum(case sr_ikut_ujian_detil_jawaban.status_jawaban when '0' then 1 else 0 end) as jml_salah, count(sr_ikut_ujian_detil_jawaban.id_ikut_ujian) as juml_dikerjakan FROM sr_ikut_ujian LEFT JOIN sr_ikut_ujian_detil_jawaban on sr_ikut_ujian.id = sr_ikut_ujian_detil_jawaban.id_ikut_ujian WHERE sr_ikut_ujian.id_tes = '$id_ujian' AND id_user = $id AND status = 'N'");	
		return $query;
	}
	public function viewhasilujian($id)
	{
		$query = $this->db->query("SELECT  sr_guru_tes.*, users.first_name FROM sr_guru_tes LEFT JOIN users on sr_guru_tes.id_guru = users.id WHERE sr_guru_tes.id_guru ='$id'");	
		return $query;
	}
	public function viewhasilujiandetail($id)
	{
		$query = $this->db->query("SELECT sr_guru_tes.id, sr_guru_tes.nama_ujian, sr_guru_tes.waktu, sr_guru_tes.jumlah_soal, users.first_name, sr_mata_pelajaran.mp_nama FROM sr_guru_tes LEFT JOIN users on sr_guru_tes.id_guru = users.id LEFT JOIN sr_mata_pelajaran on sr_guru_tes.id_guru = users.id WHERE sr_guru_tes.id ='$id' group by sr_guru_tes.id");	
		return $query;
	}
	public function viewhasilnilaiujian($id)
	{
		$query = $this->db->query("SELECT sr_ikut_ujian.jml_benar, sr_ikut_ujian.nilai, sr_siswa.s_nama FROM sr_ikut_ujian LEFT JOIN sr_siswa on sr_ikut_ujian.id_user = sr_siswa.idsiswa LEFT JOIN sr_guru_tes on sr_ikut_ujian.id_tes = sr_guru_tes.id WHERE sr_guru_tes.id ='$id'");	
		return $query;
	}
	public function viewhasilujianrata($id)
	{
		$query = $this->db->query("SELECT MAX(nilai) AS max_, MIN(nilai) AS min_, AVG(nilai) AS avg_  FROM sr_ikut_ujian WHERE id ='$id' group by id");	return $query;
	}
public function soalsoal($id_ikut_ujian)
	{

    $query = $this->db->query("SELECT sr_soaldetail.*, sr_ikut_ujian_detil_jawaban.*, sr_soaldetail.id_soal AS id_soal_yes FROM sr_ikut_ujian_detil_jawaban LEFT JOIN sr_soaldetail on sr_ikut_ujian_detil_jawaban.id_soal = sr_soaldetail.id WHERE sr_ikut_ujian_detil_jawaban.id_ikut_ujian ='$id_ikut_ujian'");	
		return $query;
}
	public function jadwalujian($id)
	{
	
		$query = $this->db->query("SELECT count(sr_tr_paketsoal.id_paket)as total_soal, sr_guru_tes.id, sr_guru_tes.nama_ujian, sr_guru_tes.jumlah_soal, sr_ikut_ujian.nilai, sr_ikut_ujian.status FROM sr_guru_tes LEFT JOIN sr_ikut_ujian on sr_guru_tes.id = sr_ikut_ujian.id_tes AND sr_ikut_ujian.id_user ='1' LEFT JOIN sr_tr_paketsoal on sr_guru_tes.id = sr_tr_paketsoal.id_paket where NOW() BETWEEN sr_guru_tes.tgl_mulai AND sr_guru_tes.terlambat group by sr_guru_tes.id");	
		return $query;
	}
	public function daftar_soal($id_guru)
	{
		$query = $this->db->query("SELECT users.id, sr_soal.id_soal, users.first_name, sr_kelas.k_tingkat as kelas, sr_kelas.k_keterangan as keterangan, sr_kelas.idkelas, SUBSTRING(sr_soaldetail.soal, 1, 10)as judulsoal , sr_soaldetail.id as no_soal,sr_soaldetail.soal as judulsoaldetail , sr_soaldetail.opsi_a, sr_soaldetail.opsi_b, sr_soaldetail.opsi_c, sr_soaldetail.opsi_d, sr_soaldetail.opsi_e, sr_soaldetail.jawaban FROM sr_soal LEFT JOIN users on sr_soal.idusers = users.id LEFT JOIN sr_kelas on sr_soal.idkelas = sr_kelas.idkelas LEFT JOIN sr_soaldetail on sr_soal.id_soal = sr_soaldetail.id_soal WHERE sr_soal.idusers ='$id_guru'");	
		return $query;
	}


	public function paket_soal($id)
	{
		$query = $this->db->query("SELECT sr_paketsoal.id, sr_paketsoal.nama_paket, sr_paketsoal.jumlah_soal, sr_mata_pelajaran.mp_nama, users.first_name FROM sr_paketsoal LEFT JOIN sr_mata_pelajaran on sr_paketsoal.id_mapel = sr_mata_pelajaran.idmata_pelajaran LEFT JOIN users on sr_paketsoal.id_guru = users.id WHERE sr_paketsoal.id_guru ='$id'");	
		return $query;
	}

	public function paket_soaldet($id)
	{
		$query = $this->db->query("SELECT sr_paketsoal.id, sr_paketsoal.nama_paket, sr_paketsoal.jumlah_soal, sr_mata_pelajaran.mp_nama, users.first_name FROM sr_paketsoal LEFT JOIN sr_mata_pelajaran on sr_paketsoal.id_mapel = sr_mata_pelajaran.idmata_pelajaran LEFT JOIN users on sr_paketsoal.id_guru = users.id LEFT JOIN sr_tr_paketsoal on sr_paketsoal.id = sr_tr_paketsoal.id_paket WHERE sr_paketsoal.id_guru ='$id' and sr_tr_paketsoal.id_soal ='$id'");	
		return $query;
	}
	public function paket_jumlahsoal($id)
	{
		$query = $this->db->query("SELECT sr_paketsoal.id, sr_paketsoal.nama_paket, sr_paketsoal.jumlah_soal, sr_mata_pelajaran.mp_nama, users.first_name, count(sr_tr_paketsoal.id_paket) as jumlah FROM sr_paketsoal LEFT JOIN sr_mata_pelajaran on sr_paketsoal.id_mapel = sr_mata_pelajaran.idmata_pelajaran LEFT JOIN users on sr_paketsoal.id_guru = users.id LEFT JOIN sr_tr_paketsoal on sr_paketsoal.id_mapel = sr_tr_paketsoal.id_soal WHERE sr_tr_paketsoal.id_paket =sr_paketsoal.id");	
		return $query;
	}
	public function soal_detailhasil($id)
	{
		$query = $this->db->query("SELECT sr_soaldetail.*, sr_ikut_ujian_detil_jawaban.*, sr_soaldetail.id AS id_soal_yes FROM sr_ikut_ujian_detil_jawaban LEFT JOIN sr_soaldetail on sr_ikut_ujian_detil_jawaban.id_soal = sr_soaldetail.id WHERE sr_ikut_ujian_detil_jawaban.id_ikut_ujian ='$id'");	
		return $query;
	}
	public function hasil_head($id)
	{
		$query = $this->db->query("SELECT sr_siswa.s_nama, sr_ikut_ujian.jml_benar, sr_ikut_ujian.nilai, sr_mata_pelajaran.mp_nama, sr_guru_tes.nama_ujian, sr_guru_tes.waktu,users.first_name, count(sr_tr_paketsoal.id_paket)as total_soal  FROM sr_ikut_ujian LEFT JOIN sr_siswa on sr_ikut_ujian.id_user = sr_siswa.idsiswa LEFT JOIN sr_guru_tes on sr_ikut_ujian.id_tes = sr_guru_tes.id LEFT JOIN sr_paketsoal on sr_guru_tes.id_paket = sr_paketsoal.id LEFT JOIN sr_mata_pelajaran on sr_paketsoal.id_mapel = sr_mata_pelajaran.idmata_pelajaran LEFT JOIN users on sr_guru_tes.id_guru = users.id LEFT JOIN sr_tr_paketsoal on sr_guru_tes.id = sr_tr_paketsoal.id_paket WHERE sr_ikut_ujian.id ='$id'");	
		return $query;
	}
	
	public function cetak_detail($id)
	{
		$query = $this->db->query("SELECT sr_siswa.s_nama, sr_ikut_ujian.jml_benar, sr_ikut_ujian.nilai FROM sr_ikut_ujian LEFT JOIN sr_siswa on sr_ikut_ujian.id_user = sr_siswa.idsiswa WHERE sr_ikut_ujian.id ='$id'");	
		return $query;
	}

	public function cetak_dnama($id)
	{
		$query = $this->db->query("SELECT sr_siswa.s_nama, sr_ikut_ujian.jml_benar, sr_ikut_ujian.nilai FROM sr_ikut_ujian LEFT JOIN sr_siswa on sr_ikut_ujian.id_user = sr_siswa.idsiswa WHERE sr_ikut_ujian.id ='$id'");	
		return $query;
	}
	
	public function getnamapelajaran($id)
	{
		$query = $this->db->query("SELECT sr_mata_pelajaran.mp_nama FROM sr_ikut_ujian LEFT JOIN sr_guru_tes on sr_ikut_ujian.id_tes = sr_guru_tes.id LEFT JOIN sr_paketsoal on sr_guru_tes.id_paket = sr_paketsoal.id LEFT JOIN sr_mata_pelajaran on sr_paketsoal.id_mapel = sr_mata_pelajaran.idmata_pelajaran WHERE sr_ikut_ujian.id ='$id'");	
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
	public function update()
	{
		$post = $this->input->post();
		$this->idkkm = $post["idkkm"];
		$this->idkelas = $post["idkelas"];
		$this->idmata_pelajaran = $post["idmata_pelajaran"];
		$this->k_kkm = $post["k_kkm"];
		return $this->db->update($this->_table, $this, array('idkkm' => $post['idkkm']));
	}
	public function delete($idkkm)
	{
		return $this->db->delete($this->_table, array("idkkm" => $idkkm));
	}
	
	//indra
	function _get_datatables_query_pengetahuan()
	{
        $this->db->query('SELECT * FROM sr_nilai_pengetahuan LEFT JOIN sr_tahun_pelajaran on sr_tahun_pelajaran.idtahun_pelajaran = sr_nilai_pengetahuan.idtahun_pelajaran LEFT JOIN sr_users on sr_users.idusers = sr_nilai_pengetahuan.idusers LEFT JOIN sr_siswa on sr_siswa.idsiswa = sr_nilai_pengetahuan.idsiswa LEFT JOIN sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas LEFT JOIN sr_kompetensi_dasar on sr_kompetensi_dasar.id_kompetensidasar = sr_nilai_pengetahuan.idkompetensi_dasar');
      

		$i = 0;

        foreach ($this->column as $item) // loop column 
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
 
                if(count($this->column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
	
	
	public function get_datatableskd($idkelas,$idmapel,$idkd,$tahun,$id)
	{
		 $query = $this->db->query("SELECT * FROM sr_nilai_pengetahuan 
		 LEFT JOIN sr_tahun_pelajaran on sr_tahun_pelajaran.idtahun_pelajaran = sr_nilai_pengetahuan.idtahun_pelajaran 
		 LEFT JOIN sr_users on sr_users.idusers = sr_nilai_pengetahuan.idusers 
		 LEFT JOIN sr_siswa on sr_siswa.idsiswa = sr_nilai_pengetahuan.idsiswa 
		 LEFT JOIN sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas 
		 LEFT JOIN sr_kompetensi_dasar on sr_kompetensi_dasar.id_kompetensidasar = sr_nilai_pengetahuan.idkompetensi_dasar 
		 where sr_nilai_pengetahuan.idkelas = $idkelas 
		 and sr_nilai_pengetahuan.idmata_pelajaran = $idmapel 
		 and sr_nilai_pengetahuan.idkompetensi_dasar =$idkd 
		 and sr_nilai_pengetahuan.idtahun_pelajaran =$tahun 
		 and sr_nilai_pengetahuan.idusers =$id");
		 return $query->result();
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
		public function check_data_pengetahuan($idkelas,$idmapel,$idkd,$tahun,$id)
    {
       $query = $this->db->query("SELECT * FROM sr_nilai_pengetahuan LEFT JOIN sr_tahun_pelajaran on sr_tahun_pelajaran.idtahun_pelajaran = sr_nilai_pengetahuan.idtahun_pelajaran LEFT JOIN sr_users on sr_users.idusers = sr_nilai_pengetahuan.idusers LEFT JOIN sr_siswa on sr_siswa.idsiswa = sr_nilai_pengetahuan.idsiswa LEFT JOIN sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas LEFT JOIN sr_kompetensi_dasar on sr_kompetensi_dasar.id_kompetensidasar = sr_nilai_pengetahuan.idkompetensi_dasar where sr_nilai_pengetahuan.idkelas = '$idkelas' and sr_nilai_pengetahuan.idmata_pelajaran = '$idmapel' and sr_nilai_pengetahuan.idkompetensi_dasar ='$idkd' and sr_nilai_pengetahuan.idtahun_pelajaran ='$tahun' and sr_nilai_pengetahuan.idusers ='$id' group by sr_nilai_pengetahuan.idusers");
		return $query->num_rows();
       
        if($query>0){
            return true;
        } else {
            return false;
        }
    }
	public function batch_pengetahuan($tahun,$id,$idkelas,$idmapel,$idkd)
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

	 public function check_duplikat_siswa($idsiswa,$idkelas,$idmapel,$idkd)
    {   
        $this->db->where('idusers',$this->session->userdata('user_id'));
        $this->db->where('idsiswa',$idsiswa);
        $this->db->where('idtahun_pelajaran',$this->session->userdata('tahun'));
        $this->db->where('idkelas',$idkelas);
        $this->db->where('idmata_pelajaran',$idmapel);
        $this->db->where('idkompetensi_dasar',$idkd);
        $check = $this->db->get($this->pengetahuan)->num_rows();
        if($check>1){
            return true;
        } else {
            return false;
        }
    }
	public function delete_old_data($id,$idkelas,$idmapel,$idkd)
    {
        $this->db->limit(1);
        $this->db->where('idsiswa',$id);
        $this->db->where('idusers',$this->session->userdata('user_id'));
        $this->db->where('idtahun_pelajaran',$this->session->userdata('tahun'));
        $this->db->where('idkelas',$idkelas);
        $this->db->where('idmata_pelajaran',$idmapel);
        $this->db->where('idkompetensi_dasar',$idkd);
        $this->db->order_by($this->id,'DESC');
        $this->db->delete($this->pengetahuan);
    }
	
	public function count_all($idkelas,$idmapel,$idkd,$tahun,$id)
	{
        $this->db->from($this->pengetahuan);
        $this->db->join('sr_tahun_pelajaran','sr_tahun_pelajaran.idtahun_pelajaran = sr_nilai_pengetahuan.idtahun_pelajaran','left');
        $this->db->join('sr_users','sr_users.idusers = sr_nilai_pengetahuan.idusers','left');
        $this->db->join('sr_siswa','sr_siswa.idsiswa = sr_nilai_pengetahuan.idsiswa','left');
        $this->db->join('sr_kelas','sr_kelas.idkelas = sr_siswa.idkelas','left');
        $this->db->join('sr_kompetensi_dasar','sr_kompetensi_dasar.id_kompetensidasar = sr_nilai_pengetahuan.idkompetensi_dasar','left');
        $this->db->where('sr_nilai_pengetahuan.idkelas','1');
        $this->db->where('sr_nilai_pengetahuan.idmata_pelajaran','2');
        $this->db->where('sr_nilai_pengetahuan.idkompetensi_dasar','29');
        $this->db->where('sr_nilai_pengetahuan.idtahun_pelajaran','1');
		$this->db->where('sr_nilai_pengetahuan.idusers','1');
		return $this->db->count_all_results();
    }
	
	public function count_filtered($idkelas,$idmapel,$idkd,$tahun,$id)
	{
		$query = $this->db->query("SELECT * FROM sr_nilai_pengetahuan 
		 LEFT JOIN sr_tahun_pelajaran on sr_tahun_pelajaran.idtahun_pelajaran = sr_nilai_pengetahuan.idtahun_pelajaran 
		 LEFT JOIN sr_users on sr_users.idusers = sr_nilai_pengetahuan.idusers 
		 LEFT JOIN sr_siswa on sr_siswa.idsiswa = sr_nilai_pengetahuan.idsiswa 
		 LEFT JOIN sr_kelas on sr_kelas.idkelas = sr_siswa.idkelas 
		 LEFT JOIN sr_kompetensi_dasar on sr_kompetensi_dasar.id_kompetensidasar = sr_nilai_pengetahuan.idkompetensi_dasar 
		 where sr_nilai_pengetahuan.idkelas = '1' 
		 and sr_nilai_pengetahuan.idmata_pelajaran = '2' 
		 and sr_nilai_pengetahuan.idkompetensi_dasar ='29' 
		 and sr_nilai_pengetahuan.idtahun_pelajaran ='1' 
		 and sr_nilai_pengetahuan.idusers ='1' 
		 group by sr_nilai_pengetahuan.idusers");
		return $query->num_rows();
    }
	
	 public function update_data($data,$id)
    {
        $this->db->where('idnilai_pengetahuan',$id);
        $this->db->update($this->pengetahuan,$data);
    }
	
	public function update_datauts($data,$id)
    {
        $this->db->where('idnp_utsuas',$id);
        $this->db->update($this->pengetahuanuts,$data);
    }
     public function create_data($data)
    {
        $this->db->insert($this->pengetahuanuts,$data);
    }
	
	 public function create_datapengetahuan($data)
    {
        $this->db->insert($this->pengetahuan,$data);
    }
	public function check_datapengetahuan($data)
    {
        $this->db->select('*');
        $this->db->where($data);
        $check = $this->db->get($this->pengetahuan)->num_rows();
        if($check>0){
            return true;
        } else {
            return false;
        }
    }
	
	 public function reset_data_harian($idkelas,$idmapel,$idkd)
    {
        $this->db->where('idkelas',$idkelas);
        $this->db->where('idmata_pelajaran',$idmapel);
        $this->db->where('idkompetensi_dasar',$idkd);
        $this->db->where('idusers',$this->session->userdata('id'));
        $this->db->where('idtahun_pelajaran','1');
        $this->db->delete($this->pengetahuan);
        return true;
    }
	
	public function reset_data_utsuas($idkelas,$idmapel)
    {
        $this->db->where('idkelas',$idkelas);
        $this->db->where('idmata_pelajaran',$idmapel);
        $this->db->where('idusers',$this->session->userdata('id'));
        $this->db->where('idtahun_pelajaran','1');
        $this->db->delete($this->pengetahuanuts);
        return true;
    }
}
