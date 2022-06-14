<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Adm extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->db->query("SET time_zone='+7:00'");
        $waktu_sql = $this->db->query("SELECT NOW() AS waktu")->row_array();
        $this->waktu_sql = $waktu_sql['waktu'];
        $this->opsi = array("a","b","c","d","e");
	}
	
	public function get_servertime() {
		$now = new DateTime(); 
    $dt = $now->format("M j, Y H:i:s O"); 

    echo json_encode($dt);
	}

	public function index() {
		cek_aktif(["siswa","guru","admin"]);
		
		$a['sess_level'] = $this->session->userdata('admin_level');
		$a['sess_user'] = $this->session->userdata('admin_user');
		$a['sess_konid'] = $this->session->userdata('admin_konid');
		
		$a['p']			= "v_main";
		
		$this->load->view('aaa', $a);
	}


	public function ikut_ujian() {
		cek_aktif(["siswa"]);
		
		//var def session
		$a['sess_level'] = $this->session->userdata('admin_level');
		$a['sess_user'] = $this->session->userdata('admin_user');
		$a['sess_konid'] = $this->session->userdata('admin_konid');
		//var def uri segment
		$uri2 = $this->uri->segment(2);
		$uri3 = $this->uri->segment(3);
		$uri4 = $this->uri->segment(4);
		//var post from json
		$p = json_decode(file_get_contents('php://input'));
		$a['detil_user'] = $this->db->query("SELECT * FROM m_siswa WHERE id = '".$a['sess_konid']."'")->row();
		if ($uri3 == "simpan_satu") {
			$p			= json_decode(file_get_contents('php://input'));
			
			$update_ 	= "";
			for ($i = 1; $i < $p->jml_soal; $i++) {
				$_tjawab 	= "opsi_".$i;
				$_tidsoal 	= "id_soal_".$i;
				$jawaban_ 	= empty($p->$_tjawab) ? "" : $p->$_tjawab;
				$update_	.= "".$p->$_tidsoal.":".$jawaban_.",";
			}
			$update_		= substr($update_, 0, -1);
			$this->db->query("UPDATE tr_ikut_ujian SET list_jawaban = '".$update_."' WHERE id_tes = '$uri4' AND id_user = '".$a['sess_konid']."'");
			//echo $this->db->last_query();

			$q_ret_urn 	= $this->db->query("SELECT list_jawaban FROM tr_ikut_ujian WHERE id_tes = '$uri4' AND id_user = '".$a['sess_konid']."'");
			
			$d_ret_urn 	= $q_ret_urn->row_array();
			$ret_urn 	= explode(",", $d_ret_urn['list_jawaban']);
			$hasil 		= array();
			foreach ($ret_urn as $key => $value) {
				$pc_ret_urn = explode(":", $value);
				$idx 		= $pc_ret_urn['0'];
				$val 		= $pc_ret_urn['1'];
				$hasil[]= $val;
			}

			$d['data'] = $hasil;
			$d['status'] = "ok";

			j($d);
			exit;		

		} else if ($uri3 == "simpan_akhir") {
			$p			= json_decode(file_get_contents('php://input'));
			
			
			$jumlah_soal = $p->jml_soal;
			$jumlah_benar = 0;
			$jumlah_salah = 0;
			$jumlah_tdk_jawab = 0;
			//$jumlah_bobot = 0;
			$update_ = "";
			//nilai bobot 
			$array_bobot 	= array();
			$array_nilai	= array();
			for ($i = 1; $i < $p->jml_soal; $i++) {
				$_tjawab 	= "opsi_".$i;
				$_tidsoal 	= "id_soal_".$i;
				$jawaban_ 	= empty($p->$_tjawab) ? "" : $p->$_tjawab;
				$cek_jwb 	= $this->db->query("SELECT bobot, jawaban FROM m_soal WHERE id = '".$p->$_tidsoal."'")->row();
				//untuknilai bobot
				$bobotnya 	= $cek_jwb->bobot;
				$array_bobot[$bobotnya] = empty($array_bobot[$bobotnya]) ? 1 : $array_bobot[$bobotnya] + 1;
				
				$q_update_jwb = "";
				if ($cek_jwb->jawaban == $jawaban_) {
					//jika jawaban benar
					$jumlah_benar++;
					$array_nilai[$bobotnya] = empty($array_nilai[$bobotnya]) ? 1 : $array_nilai[$bobotnya] + 1;
					$q_update_jwb = "UPDATE m_soal SET jml_benar = jml_benar + 1 WHERE id = '".$p->$_tidsoal."'";
				} else if ($jawaban_ == "") {
				    $jumlah_tdk_jawab++;
					$q_update_jwb = "UPDATE m_soal SET jml_salah = jml_salah + 1 WHERE id = '".$p->$_tidsoal."'";
				} else if ($cek_jwb->jawaban != $jawaban_) {
					//jika jawaban salah
					$jumlah_salah++;
					$array_nilai[$bobotnya] = empty($array_nilai[$bobotnya]) ? 0 : $array_nilai[$bobotnya] + 0;
					$q_update_jwb = "UPDATE m_soal SET jml_salah = jml_salah + 1 WHERE id = '".$p->$_tidsoal."'";
				} 
                
				$this->db->query($q_update_jwb);

				$update_	.= "".$p->$_tidsoal.":".$jawaban_.",";
			}
			//perhitungan nilai bobot
			ksort($array_bobot);
			ksort($array_nilai);
			$nilai_bobot_benar = 0;
			$nilai_bobot_total = 0;
			foreach ($array_bobot as $key => $value) {
				$nilai_bobot_benar = $nilai_bobot_benar + ($key * $array_nilai[$key]);
				$nilai_bobot_total = $nilai_bobot_total + ($key * $array_bobot[$key]);
			}
			$update_		= substr($update_, 0, -1);
			$nilai = ($jumlah_benar/($jumlah_soal-1)) * 100;
			$nilai_bobot = ($nilai_bobot_benar/$nilai_bobot_total)*100;
			
			/*
			echo var_dump($array_bobot);
			echo var_dump($array_nilai);
			echo "Benar bobot : ".$nilai_bobot_benar."<br>";
			echo "Jml bobot : ".$nilai_bobot_total."<br>";
			echo "Nilai bobot : ".$nilai_bobot."<br>";
			//akhir perhitungan nilai bobot
			exit;
			*/
			$this->db->query("UPDATE tr_ikut_ujian SET jml_benar = ".$jumlah_benar.", jumlah_salah = ".$jumlah_salah.", jumlah_tdk_jawab = ".$jumlah_tdk_jawab.", nilai_bobot = ".$nilai_bobot.", nilai = '".$nilai."', list_jawaban = '".$update_."', status = 'N' WHERE id_tes = '$uri4' AND id_user = '".$a['sess_konid']."'");
			$a['status'] = "ok";
			j($a);
			exit;		
		} else if ($uri3 == "token") {
			$a['du'] = $this->db->query("SELECT a.id, a.tgl_mulai, a.terlambat, 
										a.token, a.nama_ujian, a.jumlah_soal, a.waktu,
										b.nama nmguru, c.nama nmmapel FROM tr_guru_tes a 
										INNER JOIN m_guru b ON a.id_guru = b.id
										INNER JOIN m_mapel c ON a.id_mapel = c.id 
										WHERE a.id = '$uri4'")->row_array();
			$a['dp'] = $this->db->query("SELEcT * FROM m_siswa WHERE id = '".$a['sess_konid']."'")->row_array();

			if (!empty($a['du']) || !empty($a['dp'])) {
				$tgl_selesai = $a['du']['tgl_mulai'];
			    $tgl_selesai = strtotime($tgl_selesai);
			    $tgl_baru = date('F j, Y H:i:s', $tgl_selesai);

			    $tgl_terlambat = strtotime("+".$a['du']['terlambat']." minutes", $tgl_selesai);	
				$tgl_terlambat_baru = date('F j, Y H:i:s', $tgl_terlambat);

				$a['tgl_mulai'] = $tgl_baru;
				$a['terlambat'] = $tgl_terlambat_baru;

				$a['p']	= "m_token";
				$this->load->view('aaa', $a);
			} else {
				redirect('adm/ikuti_ujian');
			}
		} else {
			$cek_sdh_selesai= $this->db->query("SELECT id FROM tr_ikut_ujian WHERE id_tes = '$uri4' AND id_user = '".$a['sess_konid']."' AND status = 'N'")->num_rows();

			//sekalian validasi waktu sudah berlalu...
			if ($cek_sdh_selesai < 1) {
				//ini jika ujian belum tercatat, belum ikut
				//ambil detil soal
				$cek_detil_tes = $this->db->query("SELECT * FROM tr_guru_tes WHERE id = '$uri4'")->row();
				$q_cek_sdh_ujian= $this->db->query("SELECT id FROM tr_ikut_ujian WHERE id_tes = '$uri4' AND id_user = '".$a['sess_konid']."'");
				$d_cek_sdh_ujian= $q_cek_sdh_ujian->row();
				$cek_sdh_ujian	= $q_cek_sdh_ujian->num_rows();
				$acakan = $cek_detil_tes->jenis == "acak" ? "ORDER BY RAND()" : "ORDER BY id ASC";

				if ($cek_sdh_ujian < 1)	{		
					$soal_urut_ok = array();
					$q_soal			= $this->db->query("SELECT id, file, tipe_file, soal, opsi_a, opsi_b, opsi_c, opsi_d, opsi_e, '' AS jawaban FROM m_soal WHERE id_mapel = '".$cek_detil_tes->id_mapel."' ".$acakan." LIMIT ".$cek_detil_tes->jumlah_soal)->result();

					$i = 0;
					foreach ($q_soal as $s) {
						$soal_per = new stdClass();
						$soal_per->id = $s->id;
						$soal_per->soal = $s->soal;
						$soal_per->file = $s->file;
						$soal_per->tipe_file = $s->tipe_file;
						$soal_per->opsi_a = $s->opsi_a;
						$soal_per->opsi_b = $s->opsi_b;
						$soal_per->opsi_c = $s->opsi_c;
						$soal_per->opsi_d = $s->opsi_d;
						$soal_per->opsi_e = $s->opsi_e;
						$soal_per->jawaban = $s->jawaban;
						$soal_urut_ok[$i] = $soal_per;
						$i++;
					}
					$soal_urut_ok = $soal_urut_ok;
					$list_id_soal	= "";
					$list_jw_soal 	= "";
					if (!empty($q_soal)) {
						foreach ($q_soal as $d) {
							$list_id_soal .= $d->id.",";
							$list_jw_soal .= $d->id.":,";
						}
					}
					$list_id_soal = substr($list_id_soal, 0, -1);
					$list_jw_soal = substr($list_jw_soal, 0, -1);
					$waktu_selesai = tambah_jam_sql($cek_detil_tes->waktu);
					$time_mulai		= date('Y-m-d H:i:s');
					

			
					$this->db->query("INSERT INTO tr_ikut_ujian VALUES (null, '$uri4', '".$a['sess_konid']."', '$list_id_soal', '$list_jw_soal', 0, 0, 0, 0, 0, '$time_mulai', ADDTIME('$time_mulai', '$waktu_selesai'), 'Y')");
					
					$detil_tes = $this->db->query("SELECT * FROM tr_ikut_ujian WHERE id_tes = '$uri4' AND id_user = '".$a['sess_konid']."'")->row();

					$soal_urut_ok= $soal_urut_ok;
				} else {
					$q_ambil_soal 	= $this->db->query("SELECT * FROM tr_ikut_ujian WHERE id_tes = '$uri4' AND id_user = '".$a['sess_konid']."'")->row();

					$urut_soal 		= explode(",", $q_ambil_soal->list_jawaban);
					$soal_urut_ok	= array();
					for ($i = 0; $i < sizeof($urut_soal); $i++) {
						$pc_urut_soal = explode(":",$urut_soal[$i]);
						$pc_urut_soal1 = empty($pc_urut_soal[1]) ? "''" : "'".$pc_urut_soal[1]."'";
						$ambil_soal = $this->db->query("SELECT *, $pc_urut_soal1 AS jawaban FROM m_soal WHERE id = '".$pc_urut_soal[0]."'")->row();
						$soal_urut_ok[] = $ambil_soal; 
					}
					
					$detil_tes = $q_ambil_soal;

					$soal_urut_ok = $soal_urut_ok;
				}


				$pc_list_jawaban = explode(",", $detil_tes->list_jawaban);

				$arr_jawab = array();

				foreach ($pc_list_jawaban as $v) {
				  $pc_v = explode(":", $v);
				  $idx = $pc_v[0];
				  $val = $pc_v[1];

				  $arr_jawab[$idx] = $val;
				}

				$html = '';
				$no = 1;
				if (!empty($soal_urut_ok)) {
				    foreach ($soal_urut_ok as $d) { 
				        $tampil_media = tampil_media("./upload/gambar_soal/".$d->file, 'auto','auto');

				        $html .= '<input type="hidden" name="id_soal_'.$no.'" value="'.$d->id.'">';
				        $html .= '<div class="step" id="widget_'.$no.'">';

				        $html .= '<p>'.$d->soal.'</p><p>'.$tampil_media.'</p><div class="funkyradio">';

				        for ($j = 0; $j < $this->config->item('jml_opsi'); $j++) {
				            $opsi = "opsi_".$this->opsi[$j];

				            $checked = $arr_jawab[$d->id] == strtoupper($this->opsi[$j]) ? "checked" : "";

				            $pc_pilihan_opsi = explode("#####", $d->$opsi);
				            $media = !empty($pc_pilihan_opsi[0]) ? $pc_pilihan_opsi[0] : "<p></p>";
				            $teks_soal = !empty($pc_pilihan_opsi[1]) ? $pc_pilihan_opsi[1] : "<p>&nbsp;</p>";

				            $tampil_media_opsi = (is_file('./upload/gambar_soal/'.$media) || $media != "") ? tampil_media('./upload/gambar_opsi/'.$media,'auto','auto') : '';

				            $html .= '<div class="funkyradio-success">
				                <input type="radio" id="opsi_'.strtoupper($this->opsi[$j]).'_'.$d->id.'" name="opsi_'.$no.'" value="'.strtoupper($this->opsi[$j]).'" '.$checked.'> <label for="opsi_'.strtoupper($this->opsi[$j]).'_'.$d->id.'"><div class="huruf_opsi">'.$this->opsi[$j].'</div> <p>'.$teks_soal.'</p><p>'.$tampil_media_opsi.'</p></label></div>';
				        }
				        $html .= '</div></div>';
				        $no++;
				    }
				}

				$a['jam_mulai'] = $detil_tes->tgl_mulai;
				$a['jam_selesai'] = $detil_tes->tgl_selesai;
				$a['id_tes'] = $cek_detil_tes->id;
				$a['no'] = $no;
				$a['html'] = $html;

				$this->load->view('v_ujian', $a);
			} else {
				redirect('adm/sudah_selesai_ujian/'.$uri4);
			}
		}

	}

	public function user_terakhir() {
		$q_nis_siswa = $this->db->query("SELECT MAX(RIGHT(nis,5)) a FROM m_siswa WHERE LEFT(nis,4) = YEAR(NOW())")->row_array();
		$username = !empty($q_nis_siswa) ? ($q_nis_siswa['a'] + 1) : 1;
		$username = date('Y').str_pad($username, 5, "0", STR_PAD_LEFT);

		$data['username'] = $username;

		j($data);
		exit;
	}

	public function simpan_user() {
		$p = $this->input->post();

		$pjg_password = strlen($p['d_password']);

		if ($pjg_password < 6) {
			$data['status'] = "gagal";
			$data['caption'] = "Password minimal 6 karakter";
		} else {
			$p_data = array("nama"=>$p['d_nama'], "nis"=>$p['d_username'], "no_telp"=>$p['d_no_telp'], "sekolah"=>$p['d_sekolah'], "email"=>$p['d_email']);

			$this->db->insert("m_siswa", $p_data);
			$q_id_terakhir = $this->db->query("SELECT MAX(id) a FROM m_siswa ORDER BY id DESC LIMIT 1")->row_array();
			$id_terakhir = !empty($q_id_terakhir) ? $q_id_terakhir['a'] : 1;

			$p_data_u = array("username"=>$p['d_username'], "password"=>md5($p['d_password']), "level"=>"siswa", "kon_id"=>$id_terakhir);
			$this->db->insert("m_admin", $p_data_u);

			$data['status'] = "ok";
			$data['caption'] = "Pendaftaran berhasil..";
			$data['data'] = "<div>Username : <b>".$p['d_username']."</b><br>Password : <b>".$p['d_password']."</b><br>Nama : <b>".$p['d_nama']."</b><br>Sekolah : <b>".$p['d_sekolah']."</b></div>";
		}
		
		
		j($data);
		exit;
	}

	public function jvs() {
		cek_aktif();
		
		$data_soal 		= $this->db->query("SELECT id, gambar, soal, opsi_a, opsi_b, opsi_c, opsi_d, opsi_e FROM m_soal ORDER BY RAND()")->result();
		
		j($data_soal);
		exit;
	}
	
	public function sudah_selesai_ujian() {
  
		//var def session
		
		$a['sess_konid'] = $this->session->userdata('id');
		//var def uri segment
		$uri2 = $this->uri->segment(2);
		$uri3 = $this->uri->segment(3);
		$uri4 = $this->uri->segment(4);
		
		$q_nilai = $this->db->query("SELECT nilai, jml_benar, jumlah_salah, jumlah_tdk_jawab, tgl_selesai FROM sr_ikut_ujian WHERE id_tes = $uri3 AND id_user = '".$a['sess_konid']."' AND status = 'N'")->row();
		if (empty($q_nilai)) {
			redirect('adm/ujian/_/'.$uri3);
		} else {
			$a['p'] = "v_selesai_ujian";
			$a['data'] = "<div class='alert alert-info'>Anda telah selesai mengikuti ujian ini pada : <strong style='font-size: 16px'>".tjs($q_nilai->tgl_selesai, "l")."</strong>, dan mendapatkan nilai : <strong style='font-size: 16px'>".$q_nilai->nilai."</strong>
			    <br><br>    
			    <p>
			        <h4>Statistik</h4>
			        Jumlah benar : <b>".$q_nilai->jml_benar."</b><br>
			        Jumlah salah : <b>".$q_nilai->jumlah_salah."</b><br>
			        <u>Jumlah tidak dijawab : <b>".$q_nilai->jumlah_tdk_jawab."</b></u><br>
			        Jumlah soal : <b>".($q_nilai->jml_benar+$q_nilai->jumlah_salah+$q_nilai->jumlah_tdk_jawab)."</b>
			        
			    </p>
			</div>";
		}
		$this->load->view('aaa', $a);
	}
}
	
