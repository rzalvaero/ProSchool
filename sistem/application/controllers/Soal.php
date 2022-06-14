<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('doc_soal');		
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
			redirect('auth/guru');
		}
	}

	public function index()
	{
		
		$data['kelas'] = $this->doc_soal->vkelas();		
		$data['mata_pelajaran'] = $this->doc_soal->vmapel();	
		$data['page'] 	 	= 'soal';	
		$this->load->view('template', $data);
	}

	public function paketsoal()
	{

		$data['mata_pelajaran'] = $this->doc_soal->vmapel();	
		$data['paket_soal'] = $this->doc_soal->paket_soal($this->session->userdata('id'))->result();
		$data['paket_jumlahsoal'] = $this->doc_soal->paket_jumlahsoal($this->session->userdata('id'))->result();	
		$data['page'] 	 	= 'paketsoal';	
		$this->load->view('template', $data);
	}

    public function act_soal(){

		$mapel = $this->input->post('mapel');
		$kelas = $this->input->post('kelas');
		$guru = $this->session->userdata('id');
		$unit = $this->session->userdata('unit');
		$soal = $this->input->post('soal');
		$a = $this->input->post('a');
		$b = $this->input->post('b');
		$c = $this->input->post('c');
		$d = $this->input->post('d');
		$e = $this->input->post('e');
		$jawaban = $this->input->post('jawaban');
		
		
			$data = array(
				'idmata_pelajaran' => $mapel,
				'idkelas' => $kelas,
				'idusers' => $guru,
				'unit' => $unit,	
			);

		$this->doc_soal->in_soal($data);
        $package_id = $this->db->insert_id();

		$jumlah = count($this->input->post('soal'));
		
        for($i=0;$i<$jumlah;$i++){
            
			$data1 = array(
				'id_soal' => $package_id,
				'soal' => $soal[$i],
				'opsi_a' => $a[$i],
				'opsi_b' => $b[$i],
				'opsi_c' => $c[$i],
				'opsi_d' => $d[$i],
				'opsi_e' => $e[$i],
				'jawaban' => $jawaban[$i],
				'status' => '1'
			);

			$this->doc_soal->in_detail_soal($data1);
			
		}
			$this->session->set_flashdata('soal', 'Soal berhasil ditambahkan');
			redirect('soal/list');
	}


	public function tambah_paket(){

	 	$mapel = $this->input->post('mapel');
		$nama_paket = $this->input->post('namapaket');
		$jumlah_soal = $this->input->post('jumlah');
		$id_mapel = $this->input->post('id_mapel');
		$id_guru = $this->session->userdata('id');
		$unit = $this->session->userdata('unit');
		
			$data = array(
				'id_guru' => $id_guru,
				'id_mapel' => $mapel,
				'nama_paket' => $nama_paket,
				'jumlah_soal' => $jumlah_soal,
				'unit' => $unit,	
			);

		$this->doc_soal->in_paketsoal($data);
        $this->session->set_flashdata('soal', 'Soal berhasil ditambahkan');
	    redirect('soal/paketsoal');
	}

    public function tambah_soalpaket() {
    $p = $this->input->post();

    $jumlah_ada = 0;
    if (!empty($p['paket'])) {
      foreach ($p['paket'] as $idp) {

        $this->db->where('id', $idp);
        $get_jumlah_maks = $this->db->get('sr_paketsoal')->row_array();
        $jumlah_maks = $get_jumlah_maks['jumlah_soal'];

        if (!empty($jumlah_maks)) {
          // cek jumlah 
          $this->db->where('id_paket', $idp);
          $jumlah_soal = $this->db->get('sr_tr_paketsoal')->num_rows();

          $this->db->where('id', $idp);
          $get_jumlah_maks = $this->db->get('sr_paketsoal')->row_array();
          $jumlah_maks = $get_jumlah_maks['jumlah_soal'];

          if ($jumlah_soal < $jumlah_maks) {
            // cek sudah ada 
            $this->db->where('id_paket', $idp);
            $this->db->where('id_soal', $p['soal_id']);
            $cek_ada = $this->db->get('sr_tr_paketsoal')->num_rows();

            if ($cek_ada < 1) {
              $p_data = ['id_paket'=>$idp, 'id_soal'=>$p['soal_id']];
              $this->db->insert('sr_tr_paketsoal', $p_data);
              $jumlah_ada++;
            } 
          } 
        }
      }
    }

    if ($jumlah_ada < 1) {
      $ret = ['success'=>false, 'message'=>'Soal sudah pernah ditambahkan pada paket soal tersebut'];
    } else {
      $ret = ['success'=>true, 'message'=>'Berhasil menambahkan ke '.$jumlah_ada.' paket soal'];
    }

   
        $this->session->set_flashdata('soal', 'Soal berhasil ditambahkan');
	    redirect('soal/list');
  }
	public function list(){

		$data['soal'] = $this->doc_soal->daftar_soal($this->session->userdata('id'))->result();
		$data['paket_soal'] = $this->doc_soal->paket_soaldet($this->session->userdata('id'))->result();	
 //var_dump($data['paket_soal']);
		$data['page'] 	 	= 'listsoal';	
		$this->load->view('template', $data);
	}

	public function delete_soal()

{
		$id = $this->input->post('del_id');
     $data = array(
          'status' => '0',
     );

     if($this->doc_soal->update($data, $id) == TRUE) {
          $this->session->set_flashdata('edit', true);
     }
     else {
          $this->session->set_flashdata('edit', false);
     }

     redirect('soal/list');
}
	
	public function view_soal($id)
	{   
		
		$data['soal'] = $this->doc_soal->view_soal($id)->result();
		
		echo json_encode($data);

	}

	public function esoal($id){
		$data['title'] = 'Edit Soal';
		$data['listmapel'] = $this->m_admin->list_mapel()->result();
		$data['listkelas'] = $this->m_admin->list_kelas()->result();
		$data['listguru'] = $this->m_admin->list_guru()->result();
		$data['soal'] = $this->m_admin->get_soal_by_id(['id_soal' => $id])->row();

		$this->header($data);
		$this->load->view('editsoal');
		$this->load->view('template/footer');
	}


	public function uploadImage() { 
  
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 500;
		$config['max_width']            = 2048;
		$config['max_height']           = 1000;
		$config['encrypt_name'] 		= true;
		$this->load->library('upload',$config);
		//$keterangan_berkas = $this->input->post('keterangan_berkas');
		$jumlah_berkas = count($_FILES['soalgambar']['name']);
		for($i = 0; $i < $jumlah_berkas;$i++)
		{
            if(!empty($_FILES['soalgambar']['name'][$i])){
 
				$_FILES['file']['name'] = $_FILES['soalgambar']['name'][$i];
				$_FILES['file']['type'] = $_FILES['soalgambar']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['soalgambar']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['soalgambar']['error'][$i];
				$_FILES['file']['size'] = $_FILES['soalgambar']['size'][$i];
	   
				if($this->upload->do_upload('file')){
					
					$uploadData = $this->upload->data();
					$data['nama_berkas'] = $uploadData['file_name'];
					$data['keterangan_berkas'] = $keterangan_berkas[$i];
					$data['tipe_berkas'] = $uploadData['file_ext'];
					$data['ukuran_berkas'] = $uploadData['file_size'];
				//	$this->db->insert('tb_berkas',$data);
				}
			}
		}
 
		redirect('');
	}
	
	private function set_upload_options()
	{   
		//upload an image options
		$config = array();
		$config['upload_path'] = './assets/img/corefiles';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']      = '0';
		$config['overwrite']     = FALSE;
		return $config;
	}

	function update_images(){

		$this->load->library('upload'); // not sure if you already autoloaded this
        //$this->upload->initialize($upconfig);
		$this->upload->initialize($this->set_upload_options());
         $data = array();
		if($this->upload->do_upload('soalgambar')) {   
			$dataInfo = $this->upload->data();
			$data['logo'] = $dataInfo['file_name'];
		}
	
				redirect('');
	}

		
}
