<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Ujian extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('doc_ujian');		
		$this->load->library('user_agent');
		$this->load->helper('cookie');
    $this->db->query("SET time_zone='+7:00'");
    $waktu_sql = $this->db->query("SELECT NOW() AS waktu")->row_array();
    $this->waktu_sql = $waktu_sql['waktu'];
    $this->opsi = array("a","b","c","d","e");
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
			redirect('auth/guru');
		}
	}

	 public function tambahujian() {
   
    $data['pola_tes'] = array(""=>" - Acakan Soal ..? -", "acak"=>"Acak", "paket"=>"Paket");

    $data['mapel'] = $this->db
    ->where('sr_soal.idusers', $this->session->userdata('id'))
    ->join('sr_mata_pelajaran', 'sr_soal.idmata_pelajaran = sr_mata_pelajaran.idmata_pelajaran')
    ->select('sr_soal.id_soal, sr_soal.idmata_pelajaran, sr_mata_pelajaran.mp_nama')
    ->group_by('sr_soal.idmata_pelajaran')
    ->get('sr_soal')
    ->result();
   
    //$a['p_mapel'] = obj_to_array($get_mapel, "idmata_pelajaran, idmata_pelajaran");
    
    
     $data['paket'] = $this->db
    ->where('sr_paketsoal.id_guru', $this->session->userdata('id'))
    ->select('sr_paketsoal.id,sr_paketsoal.nama_paket')
    ->group_by('sr_paketsoal.nama_paket')
    ->get('sr_paketsoal')
    ->result();
     
    $data['ujian'] = $this->doc_ujian->viewujian($this->session->userdata('id'))->result();
    //var_dump($data['ujian']);
    $data['page'] 	 	= 'tambahujian';	
		$this->load->view('template', $data);
  }
  public function hasilujiansiswa() {
   
   
    $data['detil_paket'] = $this->doc_ujian->viewhasilujiansiswa($this->session->userdata('id'))->result();

    $data['page']     = 'hasilujiansiswa';  
    $this->load->view('template', $data);
  }

  public function hasilujian() {
   
   
    $data['ujian'] = $this->doc_ujian->viewhasilujian($this->session->userdata('id'))->result();

    $data['page']     = 'hasilujian';  
    $this->load->view('template', $data);
  }

   public function hasilujiandetail($id) {
    
    $data['rataujian'] = $this->doc_ujian->viewhasilujianrata($id)->result();
    $data['ujian'] = $this->doc_ujian->viewhasilujiandetail($id)->result();
    $data['nilaiujian'] = $this->doc_ujian->viewhasilnilaiujian($id)->result();
 //var_dump($data['ujian']);
    $data['page']     = 'hasilujiandetail';  
    $this->load->view('template', $data);
  }

  public function jadwalujian() {
     
    $data['ujian'] = $this->doc_ujian->jadwalujian($this->session->userdata('id'))->result();
    // var_dump($data['ujian']);
    $data['page']     = 'jadwalujian';  
    $this->load->view('template', $data);
  }

  public function det($id) {
    
    $are = array();

     $a = $this->db->query("SELECT * FROM sr_guru_tes WHERE id = '$id'")->row();
    
    if (!empty($a)) {
      $pc_waktu = explode(" ", $a->tgl_mulai);
      $pc_waktu_selesai = explode(" ", $a->terlambat);
      $pc_tgl = explode("-", $pc_waktu[0]);

      $are['id'] = $a->id;
      $are['id_guru'] = $a->id_guru;
      $are['id_mapel'] = $a->id_mapel;
      $are['nama_ujian'] = $a->nama_ujian;
      $are['jumlah_soal'] = $a->jumlah_soal;
      $are['waktu'] = $a->waktu;
      $are['terlambat'] = $a->terlambat;
      $are['jenis'] = $a->jenis;
      $are['detil_jenis'] = $a->detil_jenis;
      $are['tgl_mulai'] = $pc_waktu[0];
      $are['wkt_mulai'] = substr($pc_waktu[1],0,5);
      $are['tgl_selesai'] = $pc_waktu_selesai[0];
      $are['wkt_selesai'] = substr($pc_waktu_selesai[1],0,5);
      $are['token'] = $a->token;
      $are['id_paket'] = $a->id_paket;
    } else {
      $are['id'] = 0;
      $are['id_guru'] = "";
      $are['id_mapel'] = 0;
      $are['nama_ujian'] = "";
      $are['jumlah_soal'] = "";
      $are['waktu'] = "";
      $are['terlambat'] = "";
      $are['jenis'] = "";
      $are['detil_jenis'] = "";
      $are['tgl_mulai'] = "";
      $are['wkt_mulai'] = "";
      $are['tgl_selesai'] = "";
      $are['wkt_selesai'] = "";
      $are['token'] = "";
      $are['id_paket'] = "";
    }

    echo json_encode($are);
  }

  public function jumlah_soal($id) {
   
    $this->db->where('id_soal', $id);
    $this->db->select('id');
    $ambil_data = $this->db->get('sr_soaldetail')->num_rows();

    $ret_arr['jumlah'] =  $ambil_data;
    
    echo json_encode($ambil_data);     
  }

  public function simpan() {
   
    $this->load->library('form_validation');

    $this->form_validation->set_rules('nama_ujian', 'Nama Ujian', 'required|min_length[5]');
    $this->form_validation->set_rules('acak', 'Jenis Ujian', 'required');
    $this->form_validation->set_rules('tgl_mulai', 'Tgl Mulai Ujian', 'required');
    $this->form_validation->set_rules('wkt_mulai', 'Waktu Mulai Ujian', 'required');
    $this->form_validation->set_rules('tgl_selesai', 'Tgl selesai Ujian', 'required');
    $this->form_validation->set_rules('wkt_selesai', 'Waktu selesai Ujian', 'required');
    $this->form_validation->set_rules('waktu', 'Lama Ujian', 'required');
    $this->form_validation->set_rules('kode', 'Kode Ujian', 'required');
    $this->form_validation->set_rules('id', 'ID', 'required');

    if ($this->form_validation->run() == FALSE) {
      $ret_arr = [
        'success' => false,
        'message' => validation_errors("- ", " "),
      ];
    } else {
      $p = $this->input->post();

      $id = intval($p['id']);

      // cek tgl mulai
      $date_now = new DateTime();
      $tgl_mulai = new DateTime($p['tgl_mulai']." ".$p['wkt_mulai']);
      $tgl_selesai = new DateTime($p['tgl_selesai']." ".$p['wkt_selesai']);
      $jml_soal = intval($p['jumlah_soal']);

      $tgl_mulai_ok = false;
      $tgl_selesai_ok = false;
      $jml_soal_ok = false;

      // cek tgl selesai
      if ($tgl_selesai >= $tgl_mulai) {
        $tgl_selesai_ok = true;
      } 

      if ($p['acak'] == "acak") {
        // cek jumlah soal 

        $this->db->where('sr_soal.idmata_pelajaran', $p['unit']);
        $this->db->join('sr_soaldetail', 'sr_soal.id_soal = sr_soaldetail.id_soal');
        $this->db->select('count(sr_soaldetail.id_soal) as total');
        $get_jml_soal = $this->db->get('sr_soal')->num_rows();
        if ($get_jml_soal >= $jml_soal) {
          $jml_soal_ok = true;
        }

        if (!$jml_soal_ok) {
          $ret_arr['success']  = false;
          $ret_arr['message'] = "Jumlah soal melebihi yang ada";
        } 
      }

      if (!$tgl_selesai_ok) {
        $ret_arr['success']  = false;
        $ret_arr['message'] = "Tanggal selesai salah";
      } else {
        $p_data = [
          "id_guru"=>$this->session->userdata('id'),
          "jenis"=>$p['acak'],
          "nama_ujian"=>$p['nama_ujian'],
          "waktu"=>$p['waktu'],
          "tgl_mulai"=>$p['tgl_mulai']." ".$p['wkt_mulai'],
          "terlambat"=>$p['tgl_selesai']." ".$p['wkt_selesai'],
          "token"=>$p['kode'],
        ];

        if ($p['acak'] == "acak") {
          $p_data['id_mapel'] = $p['unit'];
          $p_data['jumlah_soal'] = $jml_soal;
          $p_data['id_paket'] = null;
        } else {
          $getJmlSoal = $this->db
          ->where('id', $p['unitpaket'])
          ->select('jumlah_soal')
          ->get('sr_paketsoal')->row();

          $p_data['id_paket'] = $p['unitpaket'];
          $p_data['id_mapel'] = null;
          $p_data['jumlah_soal'] = $getJmlSoal->jumlah_soal;
        }

        if ($id != 0) {
          $this->db->where('id', $id);
          $this->db->update('sr_guru_tes', $p_data);
          $ket = "Edit";
        } else {
          $this->db->insert('sr_guru_tes', $p_data);
          $ket = "Tambah";
        }
          
        $ret_arr['success']  = true;
        $ret_arr['message'] = "Disimpan ";
      }
    }
      echo json_encode($ret_arr);
   
  }

  public function hapus($id) {
    cek_aktif(["admin","guru"]);
    $this->db->where('id', $id);
    $this->db->delete('sr_guru_tes');

    $ret_arr['status']  = "ok";
    $ret_arr['caption'] = "hapus sukses";
    echo json_encode($ret_arr);
    exit();
  }


	public function token($id_paket) {
  

    $this->db->where('a.id', $id_paket);
    $data['detil_paket'] = $this->db->get('sr_guru_tes a')->row_array();

    $get_detil_peserta = $this->db 
    ->where('id_tes', $id_paket)
    ->where('id_user', $this->session->userdata('id'))
    ->get('sr_ikut_ujian')->row();

    if (!empty($get_detil_peserta)) {
      if ($get_detil_peserta->status == "Y") {       
        $data['page']     = 'ujiansiswa';  
       $this->load->view('template', $data);
      } else {
        redirect('jadwalujian');
      }
    } else {
       $data['page']     = 'ujiansiswa';  
       $this->load->view('template', $data);;    
    }

  }

  public function refresh_token($id) {
    $token = strtoupper(random_string('alpha', 5));
    $this->db->where('id', $id);
    $this->db->update('sr_guru_tes', ["token"=>$token]);

    $ret_arr['status'] = "ok";
    echo json_encode($ret_arr);
    exit();
  }

  public function ujian_ok($id_paket) {
  



    // cek sudah ada 
    $cek_sudah_tes = $this->db 
    ->where('id_tes', $id_paket)
    ->where('id_user', $this->session->userdata('id'))
    ->select('id, status')
    ->get('sr_ikut_ujian')->row();

    if (empty($cek_sudah_tes)) {
      // simpan dulu data tes nya
      /// id siswa
      $this->db->where('sr_siswa.idsiswa', $this->session->userdata('id'));
      $this->db->select('sr_siswa.idsiswa');
      $get_id_siswa = $this->db->get('sr_siswa')->row_array();

      // detil paket 
      $this->db->where('id', $id_paket);
      $get_detil_ujian = $this->db->get('sr_guru_tes')->row_array();

      $start = date('Y-m-d H:i:s');
      $end = date('Y-m-d H:i:s',strtotime('+'.intval($get_detil_ujian['waktu']).' minutes',strtotime($start)));
      
      $p_data_ujian = [
        'id_tes' => $id_paket,
        'id_user' => $get_id_siswa['idsiswa'],
        'jml_benar' => 0,
        'nilai' => 0,
        'tgl_mulai' => $start,
        'tgl_selesai' => $end,
        // 'last_activity' => $start,
        'status' => '1',
      ];

      $this->db->insert('sr_ikut_ujian', $p_data_ujian);
      $id_ikut_ujian = $this->db->insert_id();



      // get detil soal 
      if ($get_detil_ujian['jenis'] == "acak") {
        $ambil_soal = $this->db
          ->where('u.id', $get_detil_ujian['id_guru'])
          ->where('m.idmata_pelajaran', $get_detil_ujian['id_mapel'])
          ->join('users as u', 'sr.idusers = u.id', 'LEFT')
          ->join('sr_mata_pelajaran as m', 'sr.idmata_pelajaran = m.idmata_pelajaran', 'LEFT')
          ->order_by('RAND()')
          ->select('sr.id AS id_soal')
          ->get('sr_soal as sr')->result();
      } else if ($get_detil_ujian['jenis'] == "paket") {
        $ambil_soal = $this->db
          ->where('id_paket', $get_detil_ujian['id_paket'])
          ->select('id_soal')
          ->get('sr_tr_paketsoal')->result();
      }

      foreach ($ambil_soal as $soal) {
        $this->db->insert('sr_ikut_ujian_detil_jawaban', [
          'id_ikut_ujian'=> $id_ikut_ujian,
          'id_soal'=>$soal->id_soal,
          'jawaban_user'=>'',
          'status_jawaban'=>0,
          'updated_at'=>date('Y-m-d H:i:s'),
        ]);
      }
      //
    redirect('ujian/tampil_soal/'. $id_ikut_ujian);
    } else {
      if ($cek_sudah_tes->status == "Y") {
      redirect('ujian/tampil_soal/'. $cek_sudah_tes->id);
      } else {
        redirect('jadwalujian');
      }
    }
  }

  public function tampil_soal($id_ikut_ujian) {

 
    // cek soal
    $this->db->where('a.id', $id_ikut_ujian);
    $this->db->join('sr_guru_tes b', 'a.id_tes = b.id');
    $this->db->select('a.id_tes, a.status, a.id_user, a.tgl_mulai, a.tgl_selesai, b.jumlah_soal');
    $get_detil_ujian = $this->db->get('sr_ikut_ujian a')->row_array();

    if ($get_detil_ujian['status'] == "N") {
      redirect('ujian');
    }

    if (!empty($get_detil_ujian)) {
     $html = $this->load_soal($id_ikut_ujian);
     //$html = $this->doc_ujian->soalsoal($id_ikut_ujian)->result_array();
      $data['jam_mulai'] = $get_detil_ujian['tgl_mulai'];
      $data['jam_selesai'] = $get_detil_ujian['tgl_selesai'];

      $data['id_tes'] = $id_ikut_ujian;
      $data['no'] = intval($get_detil_ujian['jumlah_soal']);
      $data['html'] = $html;
      //var_dump($data['html']);
     // $data['page']     = 'tampilsoal';  
    //$this->load->view('template', $data);
      //var
     $this->load->view('soal/tampilsoal', $data);
    }
  }

  public function load_soal($id_ikut_ujian) {
    // get soal 
    $this->db->where('sr_ikut_ujian_detil_jawaban.id_ikut_ujian', $id_ikut_ujian);
    $this->db->join('sr_soaldetail', 'sr_ikut_ujian_detil_jawaban.id_soal = sr_soaldetail.id');
    $this->db->order_by('sr_ikut_ujian_detil_jawaban.id', 'dsc');
    $this->db->select('sr_soaldetail.*, sr_ikut_ujian_detil_jawaban.*, sr_soaldetail.id AS id_soal_yes');
    $get_list_soal = $this->db->get('sr_ikut_ujian_detil_jawaban')->result_array();
  
     $no = 1;
    $html = '';
    if (!empty($get_list_soal)) {
      foreach ($get_list_soal as $d) { 
        //$tampil_media = tampil_media("./upload/gambar_soal/".$d['gambar_soal'], 'auto','auto');
        
        $html .= '<form id="form_step_'.$no.'">'."\n";
        $html .= '<input type="hidden" name="id_soal" id="id_soal_' . $no . '" value="'.$d['id_soal_yes'].'">';
         //$html .= '<input type="hidden" name="id_tes" value="'.$id_ikut_ujian.'">';
        $html .= '<div class="step" id="widget_'.$no.'">';

        $html .= '<p>'.$d['soal'].'</p><div class="funkyradio">';

        for ($j = 0; $j < 5; $j++) {
          $opsi = "opsi_".$this->opsi[$j];
         // $opsi_media = "opsi_".$this->opsi[$j]."_gambar";
          $idx_soal = $d['id_soal_yes'];
          $checked = $d['jawaban_user'] == strtoupper($this->opsi[$j]) ? "checked" : "";

         //$media = $d[$opsi_media];
          $teks_opsi = $d[$opsi];

         // $tampil_media_opsi = (is_file('./upload/gambar_soal/'.$media) || $media != "") ? tampil_media('./upload/gambar_opsi/'.$media,'auto','auto') : '';

         $html .= '<div class="funkyradio-success">
              <input type="radio" id="opsi_'.strtoupper($this->opsi[$j]).'_'.$d['id_soal_yes'].'" name="opsi" value="'.strtoupper($this->opsi[$j]).'" '.$checked.'> <label for="opsi_'.strtoupper($this->opsi[$j]).'_'.$d['id_soal_yes'].'"><div class="huruf_opsi">'.$this->opsi[$j].'</div> <p>'.$teks_opsi.'</p><p></p></label></div>';
          

        }
        $html .= '</div></div>';
        $html .= '</form>';
        $html .= "\n";
        $no++;

      }
    }

    return $html;
  }

  public function simpan_ujian($id_tes) {
    
    // cek soal
    $this->db->where('a.id', $id_tes);
    $this->db->select('a.status');
    $get_detil_ujian = $this->db->get('sr_ikut_ujian a')->row();

    if (!empty($get_detil_ujian) && $get_detil_ujian->status == 'N') {
       echo json_encode(['success'=>false, 'expired'=>true]);
      //j(['success'=>false, 'expired'=>true]);
      exit;
    }

    // if ($get_detil_ujian['status'] == "N") {
    //   redirect('ikuti_ujian');
    // }


    $p = $this->input->post();
    $id_soal = intval($p['id_soal']);
    $opsi = empty($p['opsi']) ? '' : $p['opsi'];

    if (!empty($opsi)) {
      // get kunci 
      $get_kunci = $this->db
      ->where('id', $id_soal)
      ->select('jawaban')
      ->get('sr_soaldetail')->row();

      $status_jawaban = 0;
      if ($get_kunci->jawaban == $opsi) {
        $status_jawaban = 1;
      }

      $this->db 
      ->where('id_ikut_ujian', $id_tes)
      ->where('id_soal', $id_soal)
      ->update('sr_ikut_ujian_detil_jawaban', [
        'jawaban_user'=>$opsi,
        'status_jawaban'=>$status_jawaban,
        'updated_at'=>date('Y-m-d H:i:s'),
      ]);
    }
    
    $data_jawaban = $this->db 
    ->where('id_ikut_ujian', $id_tes)
    ->get('sr_ikut_ujian_detil_jawaban')
    ->result();

    echo json_encode(['success'=>true,'message'=>'OK','jawaban'=>$data_jawaban]);
     
    /* $jml_soal = intval($p['jml_soal']);

    // get list soal 
    $this->db->where('id', $id_tes);
    $this->db->select('list_soal');
    $get_list_soal = $this->db->get('tr_ikut_ujian')->row_array();

    $list_soal_to_query_where_in = [];
    $js_decode_list_soal = json_decode($get_list_soal['list_soal'], true);
    if (!empty($js_decode_list_soal)) {
      foreach ($js_decode_list_soal as $k => $v) {
        $list_soal_to_query_where_in[] = $k;
      }
    }

    $this->db->where_in('id', $list_soal_to_query_where_in);
    $this->db->select('id, jawaban, id_sub_mapel, opsi_a_point, opsi_b_point, opsi_c_point, opsi_d_point, opsi_e_point');
    $get_detil_soal = $this->db->get('m_soal')->result_array();

    $soal_jawaban = [];
    if (!empty($get_detil_soal)) {
      foreach ($get_detil_soal as $gds) {
        $idx = $gds['id'];
        $soal_jawaban[$idx]['id_sub_mapel'] = $gds['id_sub_mapel'];
        $soal_jawaban[$idx]['A'] = intval($gds['opsi_a_point']);
        $soal_jawaban[$idx]['B'] = intval($gds['opsi_b_point']);
        $soal_jawaban[$idx]['C'] = intval($gds['opsi_c_point']);
        $soal_jawaban[$idx]['D'] = intval($gds['opsi_d_point']);
        $soal_jawaban[$idx]['E'] = intval($gds['opsi_e_point']);
      }
    }


    $nilai_total = 0;
    $jml_salah = 0;
    $jml_benar = 0;

    $new_list_soal = $js_decode_list_soal;
    $new_ret = [];
    for ($i = 1; $i <= $jml_soal; $i++) {
      $satu_id_soal = !empty($p['id_soal_'.$i]) ? intval($p['id_soal_'.$i]) : '';
      $satu_jawaban = !empty($p['opsi_'.$i]) ? $p['opsi_'.$i] : "";

      $new_ret[] = $satu_jawaban;

      $nilai = 0;
      if ($satu_jawaban != '') {
        $nilai = $soal_jawaban[$satu_id_soal][$satu_jawaban];
        if ($nilai < 5) {
          $jml_salah++;
        } else {
          $jml_benar++;
        }
      }
      $nilai_total = $nilai_total + $nilai;
      
      $new_list_soal[$satu_id_soal]['jawaban'] = $satu_jawaban;
      $new_list_soal[$satu_id_soal]['point'] = $nilai;
    }

    $p_update = [
      'list_soal'=>json_encode($new_list_soal),
      'jumlah_benar'=>$jml_benar,
      'jumlah_salah'=>$jml_salah,
      'nilai'=>$nilai_total,
      'last_activity'=>date('Y-m-d H:i:s')
    ];

    if (intval($p['selesai']) == 1) {
      $p_update['status'] = 2;
    }

    $this->db->where('id', $id_tes);
    $this->db->update('tr_ikut_ujian', $p_update);

    j($new_ret);
    exit; */
  }

  public function selesai_ujian($id_ujian) {
    
     // cek sudah ada 
    $this->db->where('id', $id_ujian);
    $get_sudah_ada = $this->db->get('sr_ikut_ujian')->row();
    
    // get detil jawaban 
    $get_detil_jawaban = $this->db 
    ->where('id_ikut_ujian', $id_ujian)
    ->select('
      (COUNT(id)) jml_soal,
      SUM(status_jawaban) jml_benar
    ')
    ->get('sr_ikut_ujian_detil_jawaban')->row();

    if (!empty($get_sudah_ada)) {
      $jumlah_soal = 0;
      $jumlah_benar = 0;
      $nilai = 0;
      
      if (!empty($get_detil_jawaban)) {
        $jumlah_soal = $get_detil_jawaban->jml_soal;
        $jumlah_benar = $get_detil_jawaban->jml_benar;
        $nilai = ($jumlah_benar/$jumlah_soal) * 100;
      }

      $this->db
        ->where('id', $id_ujian)
        ->where('id_user', $this->session->userdata('id'))
        ->update('sr_ikut_ujian', [
          'jml_benar'=>$jumlah_benar,
          'nilai'=>$nilai,
          'status'=>'N'
        ]);
    }

    $data['detil_pakets'] = $this->doc_ujian->viewhasilujiansiswa($this->session->userdata('id'), $id_ujian)->result_array();
//var_dump($data['detil_pakets']);
    $data['id_ujian']     = $id_ujian;
   // var_dump($data['id_ujian']);
    $data['page']     = 'hasilujiansiswa';  
    $this->load->view('template', $data);
  }
   
   public function selesai_ujiandet($id_ujian) {
  $data['detil_pakets'] = $this->doc_ujian->viewhasilujiansiswadet($this->session->userdata('id'), $id_ujian)->result_array();
//var_dump($data['detil_pakets']);
    $data['page']     = 'hasilujiansiswa';  
    $this->load->view('template', $data);
  }

  public function cetak_hasilujian()
    {
    
    $id_ujian = $this->input->post('id_ujian');

    // cek soal
    $this->db->where('a.id', $id_ujian);
    $this->db->join('sr_guru_tes b', 'a.id_tes = b.id');
    $this->db->select('a.id_tes, a.status, a.id_user, a.tgl_mulai, a.tgl_selesai, b.jumlah_soal');
    $get_detil_ujian = $this->db->get('sr_ikut_ujian a')->row_array();

    if (!empty($get_detil_ujian)) {
     $html = $this->load_soalselesai($id_ujian);
     //$html = $this->doc_ujian->soalsoal($id_ikut_ujian)->result_array();
      $data['jam_mulai'] = $get_detil_ujian['tgl_mulai'];
      $data['jam_selesai'] = $get_detil_ujian['tgl_selesai'];

      $data['id_tes'] = $id_ujian;
      $data['no'] = intval($get_detil_ujian['jumlah_soal']);
      $data['html'] = $html;
      $data['soal'] = $this->doc_ujian->soal_detailhasil($id_ujian)->result_array();
      $data['mp'] = $this->doc_ujian->getnamapelajaran($id_ujian)->result_array();
      $data['head'] = $this->doc_ujian->hasil_head($id_ujian)->result();
      $data['ct'] = $this->doc_ujian->cetak_detail($id_ujian)->result();
    
       $data['detil_pakets'] = $this->doc_ujian->viewhasilujiansiswa($this->session->userdata('id'), $id_ujian)->result_array();
      $this->load->view('soal/hasil_siswa_cetak',$data);
    
    }
	}
  public function load_soalselesai($id_ikut_ujian) {
    // get soal 
    $this->db->where('sr_ikut_ujian_detil_jawaban.id_ikut_ujian', $id_ikut_ujian);
    $this->db->join('sr_soaldetail', 'sr_ikut_ujian_detil_jawaban.id_soal = sr_soaldetail.id');
    $this->db->order_by('sr_ikut_ujian_detil_jawaban.id', 'dsc');
    $this->db->select('sr_soaldetail.*, sr_ikut_ujian_detil_jawaban.*, sr_soaldetail.id AS id_soal_yes');
    $get_list_soal = $this->db->get('sr_ikut_ujian_detil_jawaban')->result_array();
  
     $no = 1;
    $html = '';
    if (!empty($get_list_soal)) {
      foreach ($get_list_soal as $d) { 
        //$tampil_media = tampil_media("./upload/gambar_soal/".$d['gambar_soal'], 'auto','auto');
        
        $html .= '<form id="form_step_'.$no.'">'."\n";
        $html .= '<input type="hidden" name="id_soal" id="id_soal_' . $no . '" value="'.$d['id_soal_yes'].'">';
         //$html .= '<input type="hidden" name="id_tes" value="'.$id_ikut_ujian.'">';

        $html .= '<p>'.$d['soal'].'</p>';

        for ($j = 0; $j < 5; $j++) {
          $opsi = "opsi_".$this->opsi[$j];
         // $opsi_media = "opsi_".$this->opsi[$j]."_gambar";
          $idx_soal = $d['id_soal_yes'];
          $checked = $d['jawaban_user'] == strtoupper($this->opsi[$j]) ? "checked" : "";

         //$media = $d[$opsi_media];
          $teks_opsi = $d[$opsi];

         // $tampil_media_opsi = (is_file('./upload/gambar_soal/'.$media) || $media != "") ? tampil_media('./upload/gambar_opsi/'.$media,'auto','auto') : '';

         $html .= '<div class="funkyradio-success">
            <div class="huruf_opsi">'.$this->opsi[$j].'</div> <p>'.$teks_opsi.'</p></div>';
          

        }
        $html .= '</div></div>';
        $html .= '</form>';
        $html .= "\n";
        $no++;

      }
    }

    return $html;
  }
}
