<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('core');
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
	
    public function kartu()
    {
        if ($this->session->userdata('type_users')=="SISWA"){
            $sqlsekola									= "SELECT * FROM web_sekolah";
            $row_sekola									= $this->db->query($sqlsekola)->row();
            $data['nama_sekolah']   					= $row_sekola->nama_sekolah;
            $data['kepsek']            					= $row_sekola->kepsek;
            $data['alamat']            					= $row_sekola->alamat;
            $data['kelurahan']         					= $row_sekola->kelurahan;
            $data['kecamatan']         					= $row_sekola->kecamatan;
            $data['kabupaten']         					= $row_sekola->kabupaten;
            $data['kodepos']            				= $row_sekola->kodepos;
            $data['no_telepon']            				= $row_sekola->no_telepon;
            $data['email']              				= $row_sekola->email;
            //IMAGES
            $data['logo']            					= $row_sekola->logo;
            $data['ttd']         					    = $row_sekola->ttd;
            $data['stampel']            				= $row_sekola->stampel;
            $data['design']            				    = $row_sekola->design;
        
            $id = $this->session->userdata('id');
            $sqlsiswa   								= "SELECT * FROM sr_siswa WHERE idsiswa = '$id'";
            $row_siswa									= $this->db->query($sqlsiswa)->row();
            //die(print_r($sqlsiswa));
            $data['nama_siswa']   				    	= $row_siswa->s_nama;
            $data['s_nisn']            					= $row_siswa->s_nisn;
            $data['s_desa']            					= $row_siswa->s_desa;
            $data['s_dob']                 				= $row_siswa->s_tanggal_lahir;
            $data['s_telepon']            				= $row_siswa->s_telepon;
            $data['s_email']            				= $row_siswa->s_email;
            $log	= 
                array(	'type' 	  	=> "siswa",
						'idusers' 	=> $this->session->userdata('id'),
						'datestamp' => date("Y-m-d H:i:s"),
						'note'		=> 'Anda mencetak Kartu Pelajar anda'
			     	);
			$this->db->insert('web_log',$log);
            $this->load->view('cetak', $data);
        } else {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
            Oh, Maaf anda tidak bisa mencetak Kartu Pelajar siswa.
            </div>");
            redirect('dashboard');
        }
    }
}