<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('core');
		$this->load->model('doc_unit');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		if(!$this->session->userdata('username'))
		{
        $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
        redirect('auth/siswa');
        }        
    }

	public function index()
	{	
		if($this->session->userdata('type_users')=="ADMIN"){
			$this->load->view('settings');			
		}elseif($this->session->userdata('type_users')=="GURU"){
			$this->load->view('settings');
		} else {
			redirect('dashboard');
		}
	}
	public function keuangan_kelompok()
	{
		if($this->session->userdata('type_users')=="ADMIN"){
			$data['page']  	= 'Kode_Kelompok';
			$this->load->view('template',$data);
		} else {
			redirect('dashboard');
		}
	}
	
	public function web()
	{	
		if($this->session->userdata('type_users')=="ADMIN"){
			$data['page']  	= 'setting_web';
			$where = array('id' => '1');
			$data['setting'] = $this->core->edit($where,'web_setting')->result();
			$this->load->view('template',$data);
		} else {
			$this->session->set_flashdata("msg", "<br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data backup dihapus dari directory!</div><br/>");
			redirect('dashboard');
		}
	}

	public function sekolah()
	{	
		$date = date("Y-m-d");
		$unit = $this->session->userdata('unit');
		if($this->session->userdata('type_users')=="ADMIN"){
			$data['page']  		 = 'sekolah_unit';
			$data['setting'] = $this->doc_unit->getUnit();
			$this->load->view('template',$data);
		}elseif($this->session->userdata('type_users')=="GURU"){
			$data['page']  	= 'sekolah';
			$where = array('unit' => $unit);
			$data['setting'] = $this->core->edit($where,'web_sekolah')->result();
			$this->load->view('template',$data);
		} else {
			redirect('dashboard');
		}
	}
	
	public function sekolah_profil($id)
	{	
		$date = date("Y-m-d");
		$unit = $id;
		if($this->session->userdata('type_users')=="ADMIN"){
			$data['page']  	= 'sekolah';
			$where = array('unit' => $unit);
			$data['setting'] = $this->core->edit($where,'web_sekolah')->result();
			$this->load->view('template',$data);
		} else {
			redirect('dashboard');
		}
	}
	
	public function sekolah_images($id)
	{	
		$date = date("Y-m-d");
		$unit = $id;
		if($this->session->userdata('type_users')=="ADMIN"){
			$data['page']  	= 'setting_image';
			$where = array('id' => $unit);
			$data['setting'] = $this->core->edit($where,'web_sekolah')->result();
			$this->load->view('template',$data);
		} else {
			redirect('dashboard');
		}
	}
	
	function addUnit()
	{
		$nama 	  				= $this->input->post('nama');
		$npsn	 	  			= $this->input->post('npsn');
		$nss 	      			= $this->input->post('nss');
		
		$kepsek 	  			= $this->input->post('kepsek');
		$npsn	 	  			= $this->input->post('npsn');
		$tel 	      			= $this->input->post('tel');
		$email 	      			= $this->input->post('email');
		$unit		 			= $this->core->buat_unit('web_sekolah', 'id', 'ORDER BY id DESC LIMIT 1');
		
		if (empty($unit) || empty($npsn)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('settings/sekolah');
		} else {
			
			$data = array(
				'nama_sekolah'		=> $nama,
				'unit'				=> $unit,
				'npsn' 				=> $npsn,
				'nss'				=> $nss,
				'kepsek'			=> $kepsek,
				'npsn' 				=> $npsn,
				'no_telepon'		=> $tel,
				'email'				=> $email
			);
			//die(print_r($data));
			$this->core->input_data($data, 'web_sekolah');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Selamat, Unit telah terdaftar!
			</div>");
			redirect('settings/sekolah');
		}
	}
	
	public function updateUnit(){
     // POST values
     $id 	= $this->input->post('id');
     $field = $this->input->post('field');
     $value = $this->input->post('value');
     // Update records
     $this->doc_unit->updateUnit($id,$field,$value);
	 
     echo 1;
     exit;
	}

	public function images()
	{	
		$date = date("Y-m-d");
		if($this->session->userdata('type_users')=="GURU"){
			$data['page']  	= 'setting_image';
			$where = array('id' => "1");
			$data['setting'] = $this->core->edit($where,'web_sekolah')->result();
			$this->load->view('template',$data);
		} else {
			redirect('dashboard');
		}
	}

	public function reset()
	{	
		$date = date("Y-m-d");
		if($this->session->userdata('type_users')=="ADMIN"){
			$data['page']  	= 'setting_reset';
			$data['reset'] = $this->db->query("SELECT * FROM sr_siswa")->result_array();
			$this->load->view('template',$data);
		} else {
			$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data reset hanya digunakan untuk admin!</div>");
			redirect('dashboard');
		}
	}

	function backup()
    {
		if($this->session->userdata('type_users')=="ADMIN"){
			$data['page'] 	 = 'setting_backup';
			$data['backup'] = $this->db->query("SELECT * FROM web_backup ORDER BY id DESC")->result_array();
			$this->load->view('template',$data, FALSE);
		} else {
			$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data backup hanya digunakan untuk admin!</div>");
			redirect('dashboard');
		}
    }

	function backup_data() {
		$this->load->dbutil();
		$backup = $this->load->dbutil();
		$this->load->helper('file');
		
		$config = array(
			//'tables'     => array('tcleandatasource1'),
			'format'	=> 'zip',
			'filename'	=> 'database.sql'
		);
		
		$backup =& $this->dbutil->backup($config);
		$name = "";
		$save = FCPATH.'assets/backup/backup-'.date("ymd").'-db.zip';
		
		write_file($save, $backup);
		if($backup==TRUE){
			$data =	array(	
							'datestamp'	 => date("Y-m-d H:i:s"),
							'filedata' 	 => 'backup-'.date("ymd").'-db.zip'
						);
			$this->db->insert('web_backup',$data);
		} else {
			echo "CANT BACKUP DATABASE";
		}
		$this->session->set_flashdata("msg", "<br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data backup berhasil disimpan di directory!</div><br/>");
		redirect('settings/backup');
	}
	
	function deleteUnit($id){
		$where = array('id' => $id);
		$this->core->deletes($where,'web_sekolah');
		redirect('settings/sekolah');
	}

	function delete_backup($id){
		 $this->db->where('id',$id);
		 $query = $this->db->get('web_backup');
		 $row = $query->row();
		 unlink("./assets/backup/$row->filedata");
		 $this->db->delete('web_backup', array('id' => $id));
		$this->session->set_flashdata("msg", "<br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Data backup dihapus dari directory!</div><br/>");
		 redirect('settings/backup');
	}

	public function reset_visitor()
	{	
		$reset = "TRUNCATE TABLE web_visitor";
		if($reset == TRUE){
			$this->session->set_flashdata("msg", "<br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Visitor Berhasil direset!</div><br/>");
			redirect('settings/reset');
		}else{
			$this->session->set_flashdata("msg", "<br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Visitor gagal direset!
			</div><br/>");
			redirect('settings/reset');
		}
	}

	public function reset_web()
	{	
		$reset = "TRUNCATE TABLE web_setting";
		$reset = "TRUNCATE TABLE web_log";
		$backup = $this->db->query("SELECT * FROM web_default")->result_array();
		foreach($test as $SheetDataKey) {
			
			$url = $SheetDataKey['url'];
			$title = $SheetDataKey['title'];
	        $logo = strtolower($SheetDataKey['logo']);
	        $description = strtolower($SheetDataKey['description']);
	        $email = strtolower($SheetDataKey['email']);
	        $maintenance = strtolower($SheetDataKey['maintenance']);
			$whatsapp_group = strtoupper($SheetDataKey['whatsapp_group']);
	        $whatsapp = strtoupper($SheetDataKey['whatsapp']);
		
			$fetchData = array(
				'url' => $url, 
				'title' => $title, 
				'logo' => $logo,
				'description' => $description,
				'email' => $email,
				'maintenance' => $maintenance,
				'whatsapp_group' => $whatsapp_group,
				'whatsapp' => $whatsapp
				);
			//die(print_r($receiptcity));
			$insert_layanan = $this->db->insert('web_setting',$fetchData);
			
		}

		if($reset == TRUE){
			$this->session->set_flashdata("msg", "<br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Web Berhasil direset kembali ke Default!</div><br/>");
			redirect('settings/reset');
		}else{
			$this->session->set_flashdata("msg", "<br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Visitor gagal direset kembali ke Default!
			</div><br/>");
			redirect('settings/reset');
		}
	}

	function update(){
		$id 			= $this->input->post('id');
		$url 			= $this->input->post('url');
		$title 			= $this->input->post('title');
		$whatsapp_group = $this->input->post('whatsapp_group');
		$tahunajaran	= $this->input->post('tahunajaran');
		$maintenance	= $this->input->post('maintenance');
		$description 	= $this->input->post('description');
		$setpaper 		= $this->input->post('setpaper');
	
		$data = array(
			'url' 			 => $url,
			'title' 		 => $title,
			'whatsapp_group' => $whatsapp_group,
			'tahun_ajaran'   => $tahunajaran,
			'maintenance' 	 => $maintenance,
			'description' 	 => $description,
			'default_print'	 => $setpaper
		);
	
		$where = array(
			'id' => $id
		);
	
		$this->core->update($where,$data,'web_setting');
		$this->session->set_flashdata("msg", "<br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Setting WEB telah dirubah!
		</div><br/>");
		redirect('settings/web');
	}

	function update_sekolah(){
		$id 			= $this->input->post('id');
		$nama 			= $this->input->post('nama');
		$kepsek			= $this->input->post('kepsek');
		$npsn			= $this->input->post('npsn');
		$nss			= $this->input->post('nss');
		$telpon		 	= $this->input->post('telpon');
		$provinsi		= $this->input->post('provinsi');
		$kelurahan		= $this->input->post('kelurahan');
		$kecamatan		= $this->input->post('kecamatan');
		$kabupaten		= $this->input->post('kabupaten');
		$alamat		 	= $this->input->post('alamat');
	
		$data = array(
			'nama_sekolah'	 => $nama,
			'kepsek' 		 => $kepsek,
			'npsn'			 => $npsn,
			'nss' 	 		 => $nss,
			'no_telepon' 	 => $telpon,
			'provinsi' 		 => $provinsi,
			'kelurahan' 	 => $kelurahan,
			'kecamatan' 	 => $kecamatan,
			'kabupaten' 	 => $kabupaten,
			'alamat'	 	 => $alamat
		);
	
		$where = array(
			'id' => $id
		);
	
		$this->core->update($where,$data,'web_sekolah');
		$this->session->set_flashdata("msg", "<br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Setting WEB telah dirubah!
		</div><br/>");
		redirect('settings/sekolah');
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
		$id = $this->input->post('id');
		$this->load->library('upload'); // not sure if you already autoloaded this
        //$this->upload->initialize($upconfig);
		$this->upload->initialize($this->set_upload_options());
        $data = array();
		if($this->upload->do_upload('userfile')) {   
			$dataInfo = $this->upload->data();
			$data['logo'] = $dataInfo['file_name'];
		}
	
		if($this->upload->do_upload('userfile2')) {   
			$dataInfo = $this->upload->data();
			$data['ttd'] = $dataInfo['file_name'];
		}
	
		if($this->upload->do_upload('userfile3')) {   
			$dataInfo = $this->upload->data();
			$data['stampel'] = $dataInfo['file_name'];
		}   

		if($this->upload->do_upload('userfile4')) {   
			$dataInfo = $this->upload->data();
			$data['design'] = $dataInfo['file_name'];
		}   

		$this->db->where('id', $id);
		$this->db->update('web_sekolah', $data);
		$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Gambar telah dirubah!
		</div><br/>");
		redirect('settings/images');
	}
}
