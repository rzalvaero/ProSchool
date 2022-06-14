<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('text');
		$this->load->model('core');
		$this->load->model('cetak');
		$this->load->model('doc_unit');
		$this->load->model('doc_siswa');
		$this->load->model('doc_ujian');
		$this->load->library('user_agent');
		$this->load->helper('cookie');
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
			redirect('auth/siswa');
		}
	}

	public function leger()
	{
		$data['page']  	= 'nilai_leger';
		$data['dropdown']	= $this->core->selectkelas();
		$this->load->view('template', $data);
	}

	function leger_print($value='')
	{
		$this->load->helper(array('form', 'url'));
		$idkelas = $value;
		$kelas 	 = $this->cetak->read_kelas($idkelas);
		if ($kelas != false) {
			$idusers = $kelas->walikelas;
		} else {
			$idusers = 0;
		}
		
		$walikelas = $this->cetak->read_data_by_wali($idusers);
		if ($walikelas != false) {
			$s_kelas = $walikelas->k_romawi;
			$s_keterangan = $walikelas->k_keterangan;
			$s_walikelas = $walikelas->first_name . ' ' . $walikelas->last_name;
		} else {
			$s_kelas = '';
			$s_keterangan = '';
			$s_walikelas = '';
		}
		$tahun 	= "2021/2022-2";
		$tahun_leger = $this->cetak->read_data_tahun($tahun);
		
		$tahun_explode = explode('-', $tahun_leger['tp_tahun']);
		$p_tahun = $tahun_explode[0];
		$p_semester = $tahun_explode[1];
		$this->data['cetak_leger'] = '<p align="left"><b><u>LEGER NILAI PENGETAHUAN & KETERAMPILAN</u></b>
        <br>
        Kelas : ' . $s_kelas . ' (' . $s_keterangan . ')<br/>Nama Wali : ' . $s_walikelas . '<br/>Tahun Pelajaran ' . $p_tahun . ' (Semester ' . $p_semester . ')<hr style="border: solid 1px #000; margin-top: -10px"></p>';

		// Data mapel
		$mapel = $this->cetak->read_mapel();
		$total_mapel = $this->cetak->count_mapel();
		$total_mapel_p_k = 2 * (int)$total_mapel;
		
		if ($mapel != null) {
			$this->data['cetak_leger'] .= '<table class="table table-hover"><tr><td rowspan="2"><center>No</center></td>';
			$this->data['cetak_leger'] .= '<td rowspan="2"><center style="vertical-align:center;">Nama</center></td>';
			foreach ($mapel as $row) {
				$this->data['cetak_leger'] .= '<td colspan="2"><center>' . $row->mp_kode . '</center></td>';
			}
			$this->data['cetak_leger'] .= '<td rowspan="2"><center>JUMLAH</center></td>';
			$this->data['cetak_leger'] .= '<td rowspan="2"><center>RATA - RATA</center></td></tr>';
			foreach ($mapel as $row) {
				$this->data['cetak_leger'] .= '<td rowspan="2"><center>P</center></td><td rowspan="2"><center>K</center></td>';
			}
		}
	
		$siswa = $this->cetak->read_data_by_kelas($idkelas, $tahun);
		
		
		if ($siswa != null) {
			$total_seluruh_nilai = 0;
			$total_seluruh_siswa = count($siswa);
			$s = 1;
			foreach ($siswa as $row) {
				$this->data['cetak_leger'] .= '<tr><td><center>' . $s . '</center></td>';
				$this->data['cetak_leger'] .= '<td>' . $row->s_nama . '</td>';
				$idsiswa = $row->idsiswa;
				$jumlah_np = 0;
				$jumlah_nk = 0;
				$s++;
				if ($mapel != null) {
					foreach ($mapel as $m_row) {
						$idmapel = $m_row->idmata_pelajaran;
						// Pemanggilan data tiap siswa terhadap nilai pengetahuan dan keterampilan
						$pengetahuan = $this->cetak->read_all_data_pengetahuan($idsiswa, $idkelas, $idmapel, $this->session->userdata('tahun'));
						$pengetahuan_utsuas = $this->cetak->read_all_data_pengetahuan($idsiswa, $idkelas, $idmapel, $this->session->userdata('tahun'));
						$keterampilan = $this->cetak->read_all_data_keterampilan($idsiswa, $idkelas, $idmapel, $this->session->userdata('tahun'));

						$check = [
							'idtahun_pelajaran' => $this->session->userdata('tahun'),
							'idkelas' => $idkelas,
							'idmata_pelajaran' => $idmapel,
						];
						$rencana_p = $this->cetak->check_rencana_pengetahuan($check);
						$rencana_k = $this->cetak->check_rencana_keterampilan($check);
						if ($rencana_p != false) {
							$rp_loop = $rencana_p['rkdp_penilaian_harian'];
						} else {
							$rp_loop = 0;
						}
						if ($rencana_k != false) {
							$rk_loop = $rencana_k['rkdk_penilaian_harian'];
						} else {
							$rk_loop = 0;
						}

						$total_kd_np = 0;
						$total_kd = 0;
						$total_rata_kd = 0;
						$kdp_deskripsi = '';
						$kdp_desk = '';

						$total_kd_nk = 0;
						$total_kd_k = 0;
						$total_rata_kd_k = 0;
						$kdk_deskripsi = '';
						$kdk_desk = '';

						// Menghitung total nilai yang diinput sesuai rencana penilaian
						if ($pengetahuan != false) {
							foreach ($pengetahuan as $row) {
								$kd = count($pengetahuan);
								$p_explode = explode(",", $row->np_harian);
								$p_count = (int)count($p_explode) - 1;
								for ($i = 0; $i < $rp_loop; $i++) {
									if (isset($p_explode[$i]) and $p_explode[$i] != 1) {
										$p_nilai = $p_explode[$i];
									} else {
										if ($rp_loop > 1) {
											$p_nilai = 0;
											$rp_loop--;
											$i--;
										} else {
											$p_nilai = 100;
											$rp_loop = 1;
										}
									}
									$total_kd = $total_kd + (int)$p_nilai;
								}
								$total_rata_kd = $total_kd / $rp_loop;
								if ($rencana_p != false) {
									$rp_loop = $rencana_p['rkdp_penilaian_harian'];
								} else {
									$rp_loop = 0;
								}
								$total_kd_np = $total_kd_np + $total_rata_kd;
								$total_kd = 0;
							}
							$rata_kd_p = ceil($total_kd_np / $kd);
						} else {
							$rata_kd_p = 0;
						}

						if ($pengetahuan_utsuas != false) {
							$n_uts = $pengetahuan_utsuas->np_uts;
							$n_uas = $pengetahuan_utsuas->np_uas;
						} else {
							$n_uts = 0;
							$n_uas = 0;
						}
						//die(print_r($pengetahuan_utsuas));
						if ($keterampilan != false) {
							foreach ($keterampilan as $row) {
								$kd_k = count($keterampilan);
								$k_explode = explode(",", $row->nk_harian);
								$k_count = (int)count($k_explode) - 1;
								for ($i = 0; $i < $rk_loop; $i++) {
									if (isset($k_explode[$i]) and $k_explode[$i] != 1) {
										$k_nilai = $k_explode[$i];
									} else {
										if ($rk_loop > 1) {
											$k_nilai = 0;
											$rk_loop--;
											$i--;
										} else {
											$k_nilai = 100;
											$rk_loop = 1;
										}
									}
									$total_kd_k = $total_kd_k + (int)$k_nilai;
								}
								$total_rata_kd_k = $total_kd_k / $rk_loop;
								if ($rencana_k != false) {
									$rk_loop = $rencana_k['rkdk_penilaian_harian'];
								} else {
									$rk_loop = 0;
								}
								$total_kd_nk = $total_kd_nk + $total_rata_kd_k;
								$total_kd_k = 0;
							}
							$rata_kd_k = ceil($total_kd_nk / $kd_k);
						} else {
							$rata_kd_k = 0;
						}

						// Menghitung nilai akhir
						$na_pengetahuan = round((($rata_kd_p * 2) + $n_uts + $n_uas) / 4);
						$na_keterampilan = round($rata_kd_k);

						$jumlah_np = $jumlah_np + $na_pengetahuan;
						$jumlah_nk = $jumlah_nk + $na_keterampilan;

						$this->data['cetak_leger'] .= '<td class="ctr">' . ($na_pengetahuan) . '</td><td class="ctr">' . ($na_keterampilan) . '</td>';
					}
					$this->data['cetak_leger'] .= '<td class="ctr">' . ($jumlah_np + $jumlah_nk) . '</td>';
					$this->data['cetak_leger'] .= '<td class="ctr">' . round((($jumlah_np + $jumlah_nk) / $total_mapel_p_k)) . '</td></tr>';
					$total_seluruh_nilai += round((($jumlah_np + $jumlah_nk) / $total_mapel_p_k));
				}
			}
			
			$total_rata_kelas = ($total_seluruh_nilai / $total_seluruh_siswa);
			$this->data['cetak_leger'] .= '<tr><td class="ctr" colspan="' . ($total_mapel_p_k + 3) . '">TOTAL RATA - RATA</td>';
			$this->data['cetak_leger'] .= '<td class="ctr">' . $total_seluruh_nilai . '</td></tr>';
			$this->data['cetak_leger'] .= '<tr><td class="ctr" colspan="' . ($total_mapel_p_k + 3) . '">RATA - RATA KELAS (TOTAL RATA - RATA / JUMLAH SISWA)</td>';
			$this->data['cetak_leger'] .= '<td class="ctr">' . round($total_rata_kelas) . '</td></tr>';
		}

		$this->load->view('cetak/cetak_leger', $this->data);
	}

	public function sikap_sp()
	{
		$data['page']  	= 'nilai_sikap_sp';
		$type = $this->session->userdata('type_users');
		$unit = $this->session->userdata('unit');
		$id = $this->session->userdata('id');
		if ($type == "SISWA") {
			redirect('dashboard');
		} elseif ($type == "GURU") {
			$data['sikap'] 	= $this->db->query("SELECT SS.s_nama,US.first_name,SNSP.deskripsi, SK.walikelas,SK.k_romawi,SK.k_keterangan,SS.idsiswa, SNSP.id
			FROM sr_siswa SS 
			LEFT JOIN sr_kelas SK on SK.idkelas = SS.idkelas 
			LEFT JOIN users US on US.id = SK.walikelas 
			LEFT JOIN sr_nilai_sikap_sp SNSP on SNSP.idsiswa = SS.idsiswa 
			WHERE SK.walikelas ='$id'")->result_array();
			//die(print_r($data['sikap']));
		} else {
			$data['sikap'] 	= $this->db->query("SELECT SS.s_nama,US.first_name,SNSP.deskripsi, SK.walikelas,SK.k_romawi,SK.k_keterangan,SS.idsiswa, SNSP.id
			FROM sr_siswa SS 
			LEFT JOIN sr_kelas SK on SK.idkelas = SS.idkelas 
			LEFT JOIN users US on US.id = SK.walikelas 
			LEFT JOIN sr_nilai_sikap_sp SNSP on SNSP.idsiswa = SS.idsiswa ")->result_array();
			//die(print_r($data['sikap']));
		}
		$this->load->view('template', $data);
	}
	
	function adding_sikap_sp()
	{
		$idsiswa 	 = $this->input->post('idsiswa');
		$deskripsi 	 = $this->input->post('deskripsi');
		//getting
		$sekolah 		= $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
		$tahun_ajaran   = $sekolah->tahun_ajaran;
		$id			 	= $this->session->userdata('id');
		
		if (empty($idsiswa) || empty($deskripsi)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('nilai/sikap_sp');
		} else {
			$data = array(
				'tp_tahun'		=> $tahun_ajaran,
				'id_guru' 		=> $id,
				'idsiswa'		=> $idsiswa,
				'deskripsi'		=> $deskripsi,
				'is_wali'		=> "Y"
			);
			$this->core->input_data($data, 'sr_nilai_sikap_sp');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Selamat, Nilai telah tercatat!
			</div>");
			redirect('nilai/sikap_sp');
		}
	}
	
	function edit_sikap_sp(){
		$id	 				= $this->input->post('id');
		$deskripsi 			= $this->input->post('deskripsi');
	
		$data = array(
			'deskripsi' 			 => $deskripsi
		);
	
		$where = array(
			'id' => $id
		);
	
		$this->core->update($where,$data,'sr_nilai_sikap_sp');
		$this->session->set_flashdata("msg", "<br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Data berhasil dirubah!
		</div><br/>");
		redirect('nilai/sikap_sp');
	}
	
	public function sikap_so()
	{
		$data['page']  	= 'nilai_sikap_so';
		$type = $this->session->userdata('type_users');
		$unit = $this->session->userdata('unit');
		$id = $this->session->userdata('id');
		if ($type == "SISWA") {
			redirect('dashboard');
		} elseif ($type == "GURU") {
			$data['sikap'] 	= $this->db->query("SELECT SS.s_nama,US.first_name,SNSP.deskripsi, SK.walikelas,SK.k_romawi,SK.k_keterangan,SS.idsiswa, SNSP.id
			FROM sr_siswa SS 
			LEFT JOIN sr_kelas SK on SK.idkelas = SS.idkelas 
			LEFT JOIN users US on US.id = SK.walikelas 
			LEFT JOIN sr_nilai_sikap_so SNSP on SNSP.idsiswa = SS.idsiswa 
			WHERE SK.walikelas ='$id'")->result_array();
			//die(print_r($data['sikap']));
		} else {
			$data['sikap'] 	= $this->db->query("SELECT SS.s_nama,US.first_name,SNSP.deskripsi, SK.walikelas,SK.k_romawi,SK.k_keterangan,SS.idsiswa, SNSP.id
			FROM sr_siswa SS 
			LEFT JOIN sr_kelas SK on SK.idkelas = SS.idkelas 
			LEFT JOIN users US on US.id = SK.walikelas 
			LEFT JOIN sr_nilai_sikap_so SNSP on SNSP.idsiswa = SS.idsiswa ")->result_array();
			//die(print_r($data['sikap']));
		}
		$this->load->view('template', $data);
	}

	function adding_sikap_so()
	{
		$idsiswa 	 = $this->input->post('idsiswa');
		$deskripsi 	 = $this->input->post('deskripsi');
		//getting
		$sekolah 		= $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
		$tahun_ajaran   = $sekolah->tahun_ajaran;
		$id			 	= $this->session->userdata('id');
		
		if (empty($idsiswa) || empty($deskripsi)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('nilai/sikap_so');
		} else {
			$data = array(
				'tp_tahun'		=> $tahun_ajaran,
				'id_guru' 		=> $id,
				'idsiswa'		=> $idsiswa,
				'deskripsi'		=> $deskripsi,
				'is_wali'		=> "Y"
			);
			$this->core->input_data($data, 'sr_nilai_sikap_so');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Selamat, Nilai telah tercatat!
			</div>");
			redirect('nilai/sikap_so');
		}
	}
	
	function edit_sikap_so(){
		$id	 				= $this->input->post('id');
		$deskripsi 			= $this->input->post('deskripsi');
	
		$data = array(
			'deskripsi' 			 => $deskripsi
		);
	
		$where = array(
			'id' => $id
		);
	
		$this->core->update($where,$data,'sr_nilai_sikap_so');
		$this->session->set_flashdata("msg", "<br/><div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Data berhasil dirubah!
		</div><br/>");
		redirect('nilai/sikap_so');
	}
	
	public function ekstrakurikuler()
	{
		$id   = $this->session->userdata('id');
		$unit = $this->session->userdata('unit');
		$type = $this->session->userdata('type_users');
		
		$sekolah 		= $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
		$tahun_ajaran   = $sekolah->tahun_ajaran;
		if ($type == "SISWA") {
			$data['list_ekstra']		= $this->core->selectekstra();
			$data['page']			  	= 'nilai_ekstrasiswa';
			$data['ekstrakurikuler']  	= $this->db->query("SELECT SNE.*, SE.e_nama FROM sr_nilai_ekstrakulikuler SNE
			LEFT JOIN sr_ekstra SE on SE.idekstra = SNE.id_ekstrakulikuler
			WHERE SNE.id_siswa='$id'")->result_array();
			//die(print_r($data['list_ekstra']));
		} elseif ($type == "GURU") {
			$data['page']			  	= 'nilai_ekstrakurikuler';
			$data['ekstrakurikuler']  	= $this->db->query("SELECT * FROM sr_ekstra WHERE unit='$unit'")->result_array();
		} else {
			$data['page']			  	= 'nilai_ekstrakurikuler'; 
			$data['ekstrakurikuler']	= $this->db->query("SELECT * FROM sr_ekstra")->result_array();
		}
		$this->load->view('template', $data);
	}
	
	public function cetak_ekstra($value='')
	{
        // die(print_r($value));
        $sqlunit									= "SELECT * FROM sr_ekstra WHERE idekstra = '$value'";
        $row_sekolah								= $this->db->query($sqlunit)->row();
        $unitnya    								= $row_sekolah->unit;
		
		$web_setting	 = $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
		$default_print   = $web_setting->default_print;
        //die(print_r($default_print));
		//$unitnya = "5";//$this->session->userdata('unit');
		$sekolah = $this->db->query("SELECT * FROM web_sekolah WHERE id = '$unitnya'")->row();
        $date                     = date("YmdHis");
		$cek = $this->db->query("SELECT * FROM sr_nilai_ekstrakulikuler WHERE id_ekstrakulikuler = '$value'");
		//die(print_r($cek));
		if ($cek->num_rows() > 0) {
			$get = $cek->row();
            // /die(print_r($get));
			//ANOTHER SEKOLAH
			$d['nama_sekolah']	 = $sekolah->nama_sekolah;
			$d['logo']			 = $sekolah->logo;
            $d['stampel']		 = $sekolah->stampel;
			$d['alamat_sekolah'] = $sekolah->alamat . ', ' . $sekolah->kodepos;
			$d['kontak_sekolah'] = 'Telp.' . $sekolah->no_telepon . ' | Email:  ' . $sekolah->email;
            //GET EKSTRAKULIKULER
			$d['ekskul']    	= $this->db->query("SELECT SS.s_nama, SK.k_romawi, SK.k_keterangan, SE.e_nama, SNE.tahun_ajaran, SNE.nilai ,SNE.deskripsi 
			FROM sr_nilai_ekstrakulikuler SNE LEFT JOIN sr_ekstra SE on SE.idekstra = SNE.id_ekstrakulikuler 
			LEFT JOIN sr_siswa SS on SS.idsiswa = SNE.id_siswa 
			LEFT JOIN sr_kelas SK on SK.idkelas = SNE.id_kelas 
			WHERE SNE.id_ekstrakulikuler = '$value'")->result_array();
			$d['tahun_ajaran'] = $get->tahun_ajaran;
			$this->load->library('pdf');
            $this->pdf->setPaper($default_print, 'potrait');
            $this->pdf->set_option('isRemoteEnabled', true);
			$this->pdf->filename = "rpp-$date.pdf";
			$this->pdf->load_view('cetak/cetak_ekstrakulikuler', $d);
            //$this->load->view('cetak/cetak_silabus', $d);
		} else {
			$this->session->set_flashdata("msg", "<br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Guru belem mengisi semua nilai ekstrakurikuler!
			</div>");
			redirect("nilai/ekstrakurikuler");
		}
	}
	
	public function updateNilai(){
     // POST values
     $id 	= $this->input->post('id');
     $field = $this->input->post('field');
     $value = $this->input->post('value');
     // Update records
     $this->doc_unit->updateNilai($id,$field,$value);
	 
     echo 1;
     exit;
	}
	
	function addekstra()
	{
		$ekstra		 	  		= $this->input->post('ekstra');
		$id_siswa	 	  		= $this->session->userdata('id');
		
		$siswa 					= $this->db->query("SELECT * FROM sr_siswa WHERE idsiswa = '".$id_siswa."'")->row();
		$unit  	   				= $siswa->unit;
		$idkelas  	 			= $siswa->idkelas;
		
		//GET TAHUN PELAJARAN
		$sekolah 				= $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
		$tahun_ajaran 			= $sekolah->tahun_ajaran;
		//die(print_r($unit));
		//$check_ekstra = $this->db->query("SELECT * FROM sr_nilai_ekstrakulikuler WHERE id_siswa = '$id_siswa' AND tahun_ajaran='$tahun_ajaran'");
		if (empty($ekstra) || empty($tahun_ajaran)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('nilai/ekstrakurikuler');
		/* } else if ($check_ekstra->num_rows() <> 0) {
			$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
            Ekstra sudah terdaftar di tahun ajaran ini, pilih ekstrakurikuler lain!
            </div><br/>");
			redirect('nilai/ekstrakurikuler'); */
		} else {
			$data = array(
				'id_ekstrakulikuler'	=> $ekstra,
				'id_siswa' 				=> $id_siswa,
				'id_kelas'				=> $idkelas,
				'unit'					=> $unit,
				'tahun_ajaran'			=> $tahun_ajaran,
				'nilai'				=> 0,
				'deskripsi'				=> ""
			);
			$this->core->input_data($data, 'sr_nilai_ekstrakulikuler');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Selamat, ekstrakurikuler telah terdaftar!
			</div>");
			redirect('nilai/ekstrakurikuler');
		}
	}
	
	

	public function radar()
	{
		if($this->session->userdata('type_users')=="ADMIN"){
			$data['page']  	= 'nilai_radar';
			//$data['dropdown']	= $this->core->selectkelas();
			//$data['list_kelas'] = $this->cetak->list_kelas();
			$id = $this->session->userdata('id');
			$data['list_kelas'] = $this->doc_siswa->list_kelas_by_idall();
			$data['list_kelas_attribute'] = [
				'name' => 'idkelas',
				'id' => 'idkelas',
				'class' => 'select2',
				'required' => 'required'
			];
			$sekolah 		= $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
			$tahun_ajaran   = $sekolah->tahun_ajaran;
			$data['semester'] = substr($tahun_ajaran, 10, 1);
			$data['tahun'] = substr($tahun_ajaran, 0, 9);		
			$this->load->view('template', $data);
		}elseif($this->session->userdata('type_users')=="GURU"){
			$data['page']  	= 'nilai_radar';
			//$data['dropdown']	= $this->core->selectkelas();
			//$data['list_kelas'] = $this->cetak->list_kelas();
			$id = $this->session->userdata('id');
			$data['list_kelas'] = $this->doc_siswa->list_kelas_by_id($id);
			$data['list_kelas_attribute'] = [
				'name' => 'idkelas',
				'id' => 'idkelas',
				'class' => 'select2',
				'required' => 'required'
			];
			$sekolah 		= $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
			$tahun_ajaran   = $sekolah->tahun_ajaran;
			$data['semester'] = substr($tahun_ajaran, 10, 1);
			$data['tahun'] = substr($tahun_ajaran, 0, 9);		
			$this->load->view('template', $data);
		} else {
			redirect('dashboard');
		}
	}
	
	//indra
	
	public function rincian()
	{
		if($this->session->userdata('type_users')=="ADMIN"){
			$data['page']  	= 'nilai_rincian';
			$type = $this->session->userdata('type_users');
			$unit = $this->session->userdata('unit');
			$id = $this->session->userdata('id');
			
			
			//GET TAHUN AJARAN
			$sekolah 		= $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
			$tahun  		= $sekolah->tahun_ajaran;
			//var_dump($tahun);
			
			$data['list_kelas'] = $this->doc_siswa->list_kelas_by_idall();
			$data['list_kelas_attribute'] = [
				'name' => 'idkelas',
				'id' => 'idkelas',
				'class' => 'select2',
				'required' => 'required'
			];
			
			$data['list_mapel'] = $this->doc_siswa->list_mapel_by_idall();
			$data['list_mapel_attribute'] = [
				'name' => 'idmata_pelajaran',
				'id' => 'idmata_pelajaran',
				'class' => 'select2',
				'required' => 'required'
			];
			$data['list_kd'] = [
				'' => '- Pilih Penilaian -'
			];
			$data['list_kd_attribute'] = [
				'name' => 'id_kompetensidasar',
				'id' => 'id_kompetensidasar',
				'class' => 'select2',
				'required' => 'required'
			];
			// Untuk menambah data
			$data['list_siswa'] = $this->doc_siswa->list_siswa();
			//var_dump($data['list_siswa']);
			$data['list_siswa_attribute'] = [
				'name' => 'list_siswa',
				'id' => 'list_siswa',
				'class' => 'select2',
				'required' => 'required'
			];
			//var_dump($data['list_siswa']);
			
			//$this->load->view('template', $data);
			//$data['page']  	= 'nilai_rincian';
			$this->load->view('template', $data);
		}elseif($this->session->userdata('type_users')=="GURU"){
			$data['page']  	= 'nilai_rincian';
			$type = $this->session->userdata('type_users');
			$unit = $this->session->userdata('unit');
			$id = $this->session->userdata('id');
			
			
			//GET TAHUN AJARAN
			$sekolah 		= $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
			$tahun  		= $sekolah->tahun_ajaran;
			//var_dump($tahun);
			
			$data['list_kelas'] = $this->doc_siswa->list_kelas_by_id($id);
			$data['list_kelas_attribute'] = [
				'name' => 'idkelas',
				'id' => 'idkelas',
				'class' => 'select2',
				'required' => 'required'
			];
			
			$data['list_mapel'] = $this->doc_siswa->list_mapel_by_id($id);
			$data['list_mapel_attribute'] = [
				'name' => 'idmata_pelajaran',
				'id' => 'idmata_pelajaran',
				'class' => 'select2',
				'required' => 'required'
			];
			$data['list_kd'] = [
				'' => '- Pilih Penilaian -'
			];
			$data['list_kd_attribute'] = [
				'name' => 'id_kompetensidasar',
				'id' => 'id_kompetensidasar',
				'class' => 'select2',
				'required' => 'required'
			];
			// Untuk menambah data
			$data['list_siswa'] = $this->doc_siswa->list_siswa();
			//var_dump($data['list_siswa']);
			$data['list_siswa_attribute'] = [
				'name' => 'list_siswa',
				'id' => 'list_siswa',
				'class' => 'select2',
				'required' => 'required'
			];
			//var_dump($data['list_siswa']);
			
			//$this->load->view('template', $data);
			//$data['page']  	= 'nilai_rincian';
			$this->load->view('template', $data);
		} else {
			redirect('dashboard');
		}
	}

	public function cetak_rapor()
	{
		$data['page']  	= 'cetak_rapor';
		$data['dropdown']	= $this->core->selectkelas();
		$this->load->view('template', $data);
	}

	public function ajax_cetak_raport()
	{
		//get_datatables terletak di model
		$idkelas = $this->uri->segment(4);
		if($idkelas==''){
			$list = $this->Model_siswa->get_datatables();
		} else {
			$list = $this->Model_siswa->get_datatables_by_id($idkelas);
		}
		$data = array();
		$no = $_POST['start'];

		// Membuat loop/ perulangan
		foreach ($list as $data_siswa) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $data_siswa->s_nama;
			$row[] = $data_siswa->s_nisn;
            $row[] = '
            <a onclick="return sampul(\''.encrypt_sr($data_siswa->idsiswa).'\')" class="btn btn-info btn-sm text-light"><i class="fa fa-print"></i> Sampul</a> 
            <a onclick="return biodata(\''.encrypt_sr($data_siswa->idsiswa).'\')" class="btn btn-primary btn-sm text-light"><i class="fa fa-print"></i> Biodata</a>
            <a onclick="return rapor(\''.encrypt_sr($data_siswa->idsiswa).'\')" class="btn btn-success btn-sm text-light"><i class="fa fa-print"></i> Rapor</a> ';

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Model_siswa->count_all($idkelas),
			"recordsFiltered" => $this->Model_siswa->count_filtered($idkelas),
			"data" => $data
		);
		//output to json format
		echo json_encode($output);
    }

	public function kehadiran_siswa()
	{
		$data['page']  	= 'kehadiran_siswa';
		$this->load->view('template', $data);
	}
	
	public function check_kd() {
        $data = $this->input->post();
		$idmata_pelajaran = $this->input->post('idmata_pelajaran');
		$idkelas = $this->input->post('idkelas');
		$id = $this->session->userdata('id');
		$datauser = $this->doc_siswa->users($id);
		//$tahun = $this->doc_siswa->tahun();
		$tahun = '1';
		//$tahunn = substr($tahun['tahun_ajaran'], 4, 1);
        $r['status'] = "";
		
        $data['list_kd'] = $this->doc_siswa->list_kd_by_id($tahun, $idmata_pelajaran,$id ,'Pengetahuan',$idkelas );
		
		$data['list_kd_attribute'] = [
			'name' => 'id_kompetensidasar',
			'id' => 'id_kompetensidasar',
			'class' => 'col-lg-10',
			'required' => 'required'
        ];
		
        $this->load->view('akademik/_kompetensi_dasar',$data);
    }
	
	public function jumlah_nilai()
    {
        $idkelas = $this->uri->segment(3);
        $idmapel = $this->uri->segment(4);
        $idkd = $this->uri->segment(5);
        $tahun = "1";
        if ($idkd=='utsuas'){
            $jml_data = $this->doc_siswa->count_all_uas($idkelas,$idmapel,$tahun,$this->session->userdata('id'));
            $r['data']['_jumlah_nilai'] = 2;
            $r['data']['_jumlah_data'] = $jml_data;
            $r['data']['new_batch'] = $this->session->userdata('new_batch');
        } else {
            $ck_rencana = [
                'idtahun_pelajaran' => filter($tahun),
                'idusers' => filter($this->session->userdata('id')),
                'idkelas' => $idkelas,
                'idmata_pelajaran' => $idmapel
            ];
            $rencana = $this->doc_siswa->check_rencana_pengetahuan($ck_rencana);
            $jml_data = $this->doc_siswa->count_all_pengetahuan($idkelas,$idmapel,$idkd,$tahun,$this->session->userdata('id'));
            if($rencana == ''){
                $r['data']['_jumlah_nilai'] = 0;
                $r['data']['_jumlah_data'] = 0;
                $r['data']['new_batch'] = $this->session->userdata('new_batch');
            } else {
                $r['data']['_jumlah_nilai'] = $rencana['rkdp_penilaian_harian'];
                $r['data']['_jumlah_data'] = $jml_data;
                $r['data']['new_batch'] = $this->session->userdata('new_batch');
            }
        }
        
        header('Content-Type: application/json');
        echo json_encode($r);
    }
	 public function ajax_list_uts_uas()
	{
		//get_datatables terletak di model
		$idkelas = $this->uri->segment(3);
        $idmapel = $this->uri->segment(4);
		$tahun ="1";
		$id = $this->session->userdata('id');
        $ck_utsuas = $this->doc_siswa->check_data_pengetahuan($idkelas,$idmapel,$tahun,$id);
    
        if($ck_utsuas!=true){
            $this->doc_siswa->batch_pengetahuan($tahun,$this->session->userdata('id'),$idkelas,$idmapel);
            $this->session->set_userdata('new_batch','Y');
        } 
        // else { sampai sini dulu
        //     $this->Model_pengetahuan_utsuas->batch_pengetahuan_new($this->session->userdata('tahun'),$this->session->userdata('user_id'),$idkelas,$idmapel);
        // }

        $list = $this->doc_siswa->get_datatables($idkelas,$idmapel,$tahun,$id);
        
        $data = array();
        $input_nilai = array();
		$no = $_POST['start'];

		// Membuat loop/ perulangan
		foreach ($list as $data_pengetahuan) {
            $duplikat = $this->doc_siswa->check_duplikat_siswa_utsuas($data_pengetahuan->idsiswa,$idkelas,$idmapel);
            if ($duplikat==true){
                $this->doc_siswa->delete_old_data($data_pengetahuan->idsiswa,$idkelas,$idmapel);
            }
			$no++;
			$row = array();
			$row[] = $no;
            $row[] = $data_pengetahuan->s_nama;
			$row[] = '<input class="form-control no-border" name="nilai_uts[]" id="nilai_uts" type="number" data-id="'.$data_pengetahuan->idnp_utsuas.'" value="'.$data_pengetahuan->np_uts.'"/>';
			$row[] = '<input class="form-control no-border" name="nilai_uas[]" id="nilai_uas" type="number" value="'.$data_pengetahuan->np_uas.'"/>';
            //$row[] = '<a onclick="return delete_data_utsuas(\''.$data_pengetahuan->idnp_utsuas.'\',\''.$data_pengetahuan->s_nama.'\',\''.$idkelas.'\',\''.$idmapel.'\')" class="btn btn-danger btn-sm text-light"><i class="fa fa-window-close"></i></a>
            //</center>';

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->doc_siswa->count_alluts($idkelas,$idmapel,$tahun,$this->session->userdata('id')),
			"recordsFiltered" => $this->doc_siswa->count_filtereduts($idkelas,$idmapel,$tahun,$this->session->userdata('id')),
			"data" => $data
		);
		//output to json format
		
		echo json_encode($output);
    }
	
	public function ajax_list()
	{
		//get_datatables terletak di model
		$idkelas = $this->uri->segment(3);
		$idmapel = $this->uri->segment(4);
        $idkd = $this->uri->segment(5);
        $tahun = "1";
		$id = $this->session->userdata('id');
        $ck_pengetahuan = $this->doc_ujian->check_data_pengetahuan($idkelas,$idmapel,$idkd,$tahun,$id);

		 
        if($ck_pengetahuan!=true){
            $this->doc_ujian->batch_pengetahuan($tahun,$this->session->userdata('id'),$idkelas,$idmapel,$idkd);
            $this->session->set_userdata('new_batch','Y');
        } 
		
        // else {
        //     $this->Model_pengetahuan->batch_pengetahuan_new($this->session->userdata('tahun'),$this->session->userdata('user_id'),$idkelas,$idmapel,$idkd);
        // }

       $list = $this->doc_ujian->get_datatableskd($idkelas,$idmapel,$idkd,$tahun,$id);
	
		
        $ck_rencana = [
            'idtahun_pelajaran' => filter($tahun),
            'idusers' => filter($this->session->userdata('id')),
            'idkelas' => $idkelas,
            'idmata_pelajaran' => $idmapel
        ];
		
        $rencana = $this->doc_ujian->check_rencana_pengetahuan($ck_rencana);
		
        if($rencana == ''){
            $jml_ph = 0;
        } else {
            $jml_ph = $rencana['rkdp_penilaian_harian'];
        }
      
        $data = array();
        $input_nilai = array();
		$no = $_POST['start'];
		
		// Membuat loop/ perulangan
		foreach ($list as $data_pengetahuan) {
			
			
            $duplikat = $this->doc_ujian->check_duplikat_siswa($id, $tahun,$data_pengetahuan->idsiswa,$idkelas,$idmapel,$idkd);
			
            if ($duplikat){
                $this->doc_ujian->delete_old_data($data_pengetahuan->idsiswa,$idkelas,$idmapel,$idkd);
            }

			$no++;
			$row = array();
			$row[] = $no;
            $row[] = $data_pengetahuan->s_nama;
            for ($i = 0; $i<$jml_ph; $i++){
                $explode = explode(",",$data_pengetahuan->np_harian);
                $count = (Integer)count($explode)-1;
                if($count>0 && $jml_ph<=$count){
                    $input_nilai[$i] = 'Nilai '.($i+1).' <input class="col-2" name="nilai_harian[]" id="nilai_harian" type="number" data-id="'.$data_pengetahuan->idnilai_pengetahuan.'" value="'.$explode[$i].'"/>';
                } else if($count>0){
                    if (isset($explode[$i])){
                        $input_nilai[$i] = ' Nilai '.($i+1).' <input class="col-2" name="nilai_harian[]" id="nilai_harian" type="number" data-id="'.$data_pengetahuan->idnilai_pengetahuan.'" value="'.$explode[$i].'"/> ';
                    } else {
                        $input_nilai[$i] = ' Nilai '.($i+1).' <input class="col-2" name="nilai_harian[]" id="nilai_harian" type="number" data-id="'.$data_pengetahuan->idnilai_pengetahuan.'" value=""/> ';
                    }
                } else {
                    $input_nilai[$i] = ' Nilai '.($i+1).' <input class="col-2" name="nilai_harian[]" id="nilai_harian" type="number" data-id="'.$data_pengetahuan->idnilai_pengetahuan.'" value=""/> ';
                }
            }
            $row[] = $input_nilai;
            //<center>
            //<a onclick="return delete_data_harian(\''.$data_pengetahuan->idnilai_pengetahuan.'\',\''.$data_pengetahuan->idsiswa.'\',\''.$data_pengetahuan->s_nama.'\',\''.$idkelas.'\',\''.$idmapel.'\',\''.$idkd.'\')" class="btn btn-danger btn-sm text-light"><i class="fa fa-window-close"></i></a>
            //</center>

			$data[] = $row;
		}
		
		
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->doc_ujian->count_all($idkelas,$idmapel,$idkd,$tahun,$this->session->userdata('id')),
			"recordsFiltered" => $this->doc_ujian->count_filtered($idkelas,$idmapel,$idkd,$tahun,$this->session->userdata('id')),
			"data" => $data
		);
		
		//output to json format
		echo json_encode($output);
    }
	
	 public function update_nilai()
    {
        $data = $this->input->post();

        $insert = [
            'np_harian' => filter($data['semua_nilai'])
        ];

        $id = filter($data['idnilai_pengetahuan']);

        $this->doc_ujian->update_data($insert,$id);
       
    }

    public function update_nilai_utsuas()
    {
        $data = $this->input->post();
		//die(print_r($data));
        $insert = [
            'np_uts' => filter($data['n_uts']),
            'np_uas' => filter($data['n_uas'])
        ];

        $id = filter($data['idnp_utsuas_loop']);

        $this->doc_ujian->update_datauts($insert,$id);
       
    }

    public function add_one_siswa()
    {
        $data = $this->input->post();
        $idmapel = $data['idmata_pelajaran'];
        $idkelas = $data['idkelas'];
        $idsiswa = $data['idsiswa'];
        $idkd = $data['idkompetensi_dasar'];
		$tahun ='1';

        $check_kelas_siswa = $this->doc_siswa->read_data_by_id($idsiswa);
        $kelas_siswa = $check_kelas_siswa['idkelas'];
        if ($kelas_siswa!=$idkelas){
            $r['status'] = 'kelas';
        } else {
            if ($idkd=='utsuas'){
                $check_siswa = [
                    'idtahun_pelajaran' => $tahun,
                    'idmata_pelajaran' => $idmapel,
                    'idusers' => $this->session->userdata('id'),
                    'idkelas' => $idkelas,
                    'idsiswa' => $idsiswa
                ];
                if ($this->doc_siswa->check_data($check_siswa)){
                    $r['status'] = 'ada';
                } else {
                    $create = [
                        'idtahun_pelajaran' => $this->session->userdata('tahun'),
                        'idmata_pelajaran' => $idmapel,
                        'idusers' => $this->session->userdata('user_id'),
                        'idkelas' => $idkelas,
                        'idsiswa' => $idsiswa,
                        'np_uts' => 0,
                        'np_uas' => 0,
                    ];
                    $this->Model_pengetahuan_utsuas->create_data($create);
                    $r['status'] = 'ok';
                }
            } else {
                $check_siswa = [
                        'idtahun_pelajaran' => '1',
                        'idmata_pelajaran' => $idmapel,
                        'idusers' => $this->session->userdata('id'),
                        'idkelas' => $idkelas,
                        'idsiswa' => $idsiswa,
                        'idkompetensi_dasar' => $idkd
                ];
                if ($this->doc_ujian->check_datapengetahuan($check_siswa)){
                    $r['status'] = 'ada';
                } else {
                    $create = [
                        'idtahun_pelajaran' => '1',
                        'idmata_pelajaran' => $idmapel,
                        'idusers' => $this->session->userdata('id'),
                        'idkelas' => $idkelas,
                        'idsiswa' => $idsiswa,
                        'idkompetensi_dasar' => $idkd,
                        'np_harian' => ''
                    ];
                    $this->doc_ujian->create_datapengetahuan($create);
                    $r['status'] = 'ok';
                }
                
            }
        }
        
        header('Content-Type: application/json');
        echo json_encode($r);
    }


    public function reset_harian($idkelas,$idmapel,$idkd) 
    {
        if ($this->doc_ujian->reset_data_harian($idkelas,$idmapel,$idkd)){
            $r['status'] = "ok"; 
          
        }  
        header('Content-Type: application/json');
        echo json_encode($r);
    }

    public function reset_utsuas($idkelas,$idmapel) 
    {
        if ($this->doc_ujian->reset_data_utsuas($idkelas,$idmapel)){
            $r['status'] = "ok"; 
            $this->log_activity($this->session->userdata('nama').' mereset data nilai UTS UAS pengetahuan');
        }  
        header('Content-Type: application/json');
        echo json_encode($r);
    }



}
