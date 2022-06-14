<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Cetakrapot extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('core');
        $this->load->model('cetak');
        $this->load->model('doc_siswa');
		$this->load->model('doc_soal');
        $this->load->library('user_agent');
        $this->load->helper('cookie');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Oh Snap, Maaf silakan login terlebih dahulu!
		</div>");
            redirect('auth/siswa');
        }
    }

    public function index()
    {

        //$wali = $this->session->userdata($this->sespre."walikelas");

        $data['siswa_kelas'] = $this->db->query("SELECT a.idsiswa, a.s_nama ,d.tp_tahun FROM sr_siswa a LEFT JOIN sr_nilai_pengetahuan b ON a.idsiswa = b.idsiswa LEFT JOIN sr_kelas_guru c ON a.idkelas = c.idkelas LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran WHERE a.idkelas = '1' AND b.idtahun_pelajaran = '1' GROUP by a.idsiswa")->result_array();
        //var_dump($data);

        $data['page']  = 'cetak_list';
        $this->load->view('template', $data);
    }

    public function sampul1($id_siswa)
    {
        $data['ds'] = $this->db->query("SELECT s_nama, s_nik, s_nisn FROM sr_siswa WHERE idsiswa = '$id_siswa'")->row_array();
        $data['sekolah'] = $this->db->query("SELECT a.s_nama, e.nama_sekolah, h.u_nbm_nip, e.alamat,e.kepsek, e.npsn, a.s_nik, a.s_nisn, a.s_wali, g.first_name, f.k_tingkat, f.k_keterangan, substr(d.tp_tahun, 11, 1) as semester, substr(d.tp_tahun, 1, 9) as tp_tahunn FROM sr_siswa a 
            LEFT JOIN sr_nilai_pengetahuan b ON a.idsiswa = b.idsiswa 
            LEFT JOIN sr_kelas_guru c ON a.idkelas = c.idkelas 
            LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran 
            LEFT JOIN web_sekolah e on a.unit = e.unit
            LEFT JOIN sr_kelas f on a.idkelas = f.idkelas
            LEFT JOIN users g on f.walikelas = g.id
            LEFT JOIN sr_users h on g.id = h.idusers  
            WHERE a.idsiswa = '$id_siswa' GROUP by a.idsiswa")->result();
        //$data['page']  = 'cetak_sampul1';	
		$web_setting	 = $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
		$default_print   = $web_setting->default_print;
		
		$date  = date("YmdHis");
		$this->load->library('pdf');
		$this->pdf->setPaper($default_print, 'portrait');
        $this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->filename = "raport-$date.pdf";
		$this->pdf->load_view('rapot/cetak_sampul1', $data);
        //$this->load->view('rapot/cetak_sampul1', $data);
    }

    public function sampul2($id_siswa)
    {
        $d = null;
        $d['sekolah'] = $this->db->query("SELECT a.s_nama, e.nama_sekolah, h.u_nbm_nip, e.alamat,e.kepsek, e.npsn,e.nss, e.kelurahan,e.kecamatan, e.kabupaten,e.provinsi,e.email, e.logo, a.s_nik, a.s_nisn, a.s_wali, g.first_name, f.k_tingkat, f.k_keterangan, substr(d.tp_tahun, 11, 1) as semester, substr(d.tp_tahun, 1, 9) as tp_tahunn FROM sr_siswa a 
            LEFT JOIN sr_nilai_pengetahuan b ON a.idsiswa = b.idsiswa 
            LEFT JOIN sr_kelas_guru c ON a.idkelas = c.idkelas 
            LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran 
            LEFT JOIN web_sekolah e on a.unit = e.unit
            LEFT JOIN sr_kelas f on a.idkelas = f.idkelas
            LEFT JOIN users g on f.walikelas = g.id
            LEFT JOIN sr_users h on g.id = h.idusers  
            WHERE a.idsiswa = '$id_siswa' GROUP by a.idsiswa")->result();
			
			$web_setting	 = $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
			$default_print   = $web_setting->default_print;
			$date  = date("YmdHis");
			$this->load->library('pdf');
			$this->pdf->setPaper($default_print, 'portrait');
			$this->pdf->set_option('isRemoteEnabled', true);
			$this->pdf->filename = "raport-$date.pdf";
			$this->pdf->load_view('rapot/cetak_sampul2', $d);
        //$this->load->view('rapot/cetak_sampul2', $d);
    }

    public function sampul4($id_siswa)
    {
        $d['sekolah'] = $this->db->query("SELECT j.province, i.city_name, a.*, e.no_telepon, e.nama_sekolah, h.u_nbm_nip, e.alamat,e.kepsek, e.npsn,e.nss, e.kelurahan,e.kecamatan, e.kabupaten,e.provinsi,e.email, e.logo, a.s_nik, a.s_nisn, a.s_wali, g.first_name, f.k_tingkat, f.k_keterangan, substr(d.tp_tahun, 11, 1) as semester, substr(d.tp_tahun, 1, 9) as tp_tahunn FROM sr_siswa a 
            LEFT JOIN sr_nilai_pengetahuan b ON a.idsiswa = b.idsiswa 
            LEFT JOIN sr_kelas_guru c ON a.idkelas = c.idkelas 
            LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran 
            LEFT JOIN web_sekolah e on a.unit = e.unit
            LEFT JOIN sr_kelas f on a.idkelas = f.idkelas
            LEFT JOIN users g on f.walikelas = g.id
            LEFT JOIN sr_users h on g.id = h.idusers
            LEFT JOIN sr_kota i on a.s_tl_idkota = i.city_id
            LEFT JOIN sr_provinsi j on a.s_tl_idprovinsi = j.province_id  
            WHERE a.idsiswa = '$id_siswa' GROUP by a.idsiswa")->result();
		$web_setting	 = $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
		$default_print   = $web_setting->default_print;
        $d['ds'] = $this->db->query("SELECT * FROM sr_siswa WHERE idsiswa = '$id_siswa'")->row_array();
		$date  = date("YmdHis");
		$this->load->library('pdf');
		$this->pdf->setPaper($default_print, 'portrait');
        $this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->filename = "raport-$date.pdf";
		$this->pdf->load_view('rapot/cetak_sampul4', $d);
        //$this->load->view('rapot/cetak_sampul4', $d);
    }

    public function prestasi_catatan($id_siswa)
    {
        //$tasm = substr($tasm, 0, 4);

        $siswa = $this->db->query("SELECT a.idsiswa, a.s_nama ,d.tp_tahun, a.idkelas, d.idtahun_pelajaran FROM sr_siswa a LEFT JOIN sr_nilai_pengetahuan b ON a.idsiswa = b.idsiswa LEFT JOIN sr_kelas_guru c ON a.idkelas = c.idkelas LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran LEFT JOIN sr_kelas e ON a.idkelas = e.idkelas WHERE a.idsiswa = '$id_siswa' GROUP by a.idsiswa")->row_array();


        $d['det_siswa'] = $siswa;

        $q_prestasi = $this->db->query("SELECT 
                                    a.*
                                    FROM sr_prestasi a 
                                    LEFT JOIN sr_siswa c ON a.id_siswa = c.idsiswa
                                    WHERE a.id_siswa = $id_siswa AND a.ta = '" . $d['det_siswa']['idtahun_pelajaran'] . "'")->result_array();

        //echo $this->db->last_query();
        //exit;


        $q_catatan = $this->db->query("SELECT 
                                    a.*
                                    FROM sr_naikkelas a 
                                    WHERE a.id_siswa = $id_siswa AND a.ta = '" . $d['det_siswa']['idtahun_pelajaran'] . "'")->row_array();

        // echo $this->db->last_query();
        // exit;

        $d['prestasi'] = $q_prestasi;
        $d['catatan'] = $q_catatan;

        $this->load->view('rapot/cetak_prestasi', $d);
    }

    public function cetak($id_siswa)
    {
        $d = array();
		$sekolah 			 = $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
		$d['tahun_ajaran']   = $sekolah->tahun_ajaran;
        $data['siswa_kelas'] = $this->db->query("SELECT a.idsiswa, a.s_nama ,d.tp_tahun FROM sr_siswa a LEFT JOIN sr_nilai_pengetahuan b ON a.idsiswa = b.idsiswa LEFT JOIN sr_kelas_guru c ON a.idkelas = c.idkelas LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran WHERE a.idsiswa = '$id_siswa' GROUP by a.idsiswa")->result_array();
        // var_dump($data);
		
        $list1 = array();
        foreach ($data['siswa_kelas'] as $k) {

            $d['tahun'] = $k['tp_tahun'];
            $d['semester'] = substr($k['tp_tahun'], 10, 1);
            $d['ta'] = (substr($k['tp_tahun'], 0, 4)) . "/" . (substr($k['tp_tahun'], 0, 4) + 1);
        }
		
        //var_dump($d['tahun_ajaran']);
        //var_dump($d['ta']);
        //$d['semester'] = substr($tasm, 4, 1);
        //$d['ta'] = (substr($tasm, 0, 4))."/".(substr($tasm, 0, 4)+1);

        $siswa = $this->db->query("SELECT a.idsiswa, a.s_nama ,d.tp_tahun, a.idkelas, d.idtahun_pelajaran FROM sr_siswa a LEFT JOIN sr_nilai_pengetahuan b ON a.idsiswa = b.idsiswa LEFT JOIN sr_kelas_guru c ON a.idkelas = c.idkelas LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran LEFT JOIN sr_kelas e ON a.idkelas = e.idkelas WHERE a.idsiswa = '$id_siswa' GROUP by a.idsiswa")->row_array();


        $d['det_siswa'] = $siswa;

        $d['wali_kelas'] = $this->db->query("SELECT 
                                a.*, b.first_name nmguru
                                FROM sr_kelas a 
                                INNER JOIN users b ON a.walikelas = b.id 
                                LEFT JOIN sr_nilai_pengetahuan c ON b.id = c.idusers
                                  INNER JOIN sr_tahun_pelajaran d ON c.idtahun_pelajaran = d.idtahun_pelajaran   
                                WHERE a.idkelas = '" . $d['det_siswa']['idkelas'] . "' AND c.idtahun_pelajaran = '" . $d['det_siswa']['idtahun_pelajaran'] . "'")->row_array();

        // Start NILAI PENGETAHUAN //

        $ambil_np = $this->db->query("SELECT  b.np_harian as nilai
                                  FROM sr_nilai_pengetahuan  b LEFT JOIN sr_siswa a ON a.idsiswa = b.idsiswa LEFT JOIN sr_mata_pelajaran f ON b.idmata_pelajaran = f.idmata_pelajaran WHERE b.idsiswa = '$id_siswa' and b.idtahun_pelajaran = '" . $d['det_siswa']['idtahun_pelajaran'] . "'")->result_array();
		$ambil_np_utsuas = $this->db->query("SELECT  b.np_uts as uts, b.np_uas as uas
                                  FROM sr_nilai_pengetahuan_utsuas b LEFT JOIN sr_siswa a ON a.idsiswa = b.idsiswa LEFT JOIN sr_mata_pelajaran f ON b.idmata_pelajaran = f.idmata_pelajaran WHERE b.idsiswa = '$id_siswa' and b.idtahun_pelajaran = '" . $d['det_siswa']['idtahun_pelajaran'] . "'")->result_array();
        $ambil_np_submp = $this->db->query("SELECT b.idmata_pelajaran as id_mapel, f.mp_kode
                                  FROM sr_siswa a LEFT JOIN sr_nilai_pengetahuan b ON a.idsiswa = b.idsiswa LEFT JOIN sr_kelas_guru c ON b.idkelas = c.idkelas LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran LEFT JOIN sr_kelas e ON b.idkelas = e.idkelas LEFT JOIN sr_mata_pelajaran f ON b.idmata_pelajaran = f.idmata_pelajaran WHERE b.idsiswa = '$id_siswa' and b.idtahun_pelajaran = '" . $d['det_siswa']['idtahun_pelajaran'] . "' GROUP by b.idmata_pelajaran")->result_array();

        $array1 = $ambil_np;
		$array2 = $ambil_np_utsuas; 

        foreach ($ambil_np_submp as $a1) {
            // $array1[$a1['id_mapel']] = array();   
        }

        foreach ($ambil_np as $a2) {
            //$idx = $a2['idmapel'];
            $pc_nilai = $a2['nilai'];

            // if ($a2['jenis'] == "h") {
            //    $array1[$idx] = $a2['nilai'];
            // } else if ($a2['jenis'] == "t") {
            //     $array1[$idx]['t'] = $a2['nilai'];
            // } else if ($a2['jenis'] == "a") {
            //    $array1[$idx]['a'] = $a2['nilai'];
            //  }
        }

        //var_dump($array1[$idx]);
        $bobot_h = '2';
        $bobot_t = '1';
        $bobot_a = '1';

        $jml_bobot = $bobot_h + $bobot_t + $bobot_a;

        //MULAI HITUNG.. cek dari sini indra
        $nilai_pengetahuan = array();
        foreach ($array1 as $k => $v) {
            $ke = $v['nilai'];
            //$jumlah_h = !empty($ke) ? sizeof(array($ke)) : 0;
            $jumlah_h  = sizeof($array1[$k]);
            $jumlah_n_h = 0;

            $desk = array();

            if (!empty($array1[$k])) {
                foreach ($array1[$k] as $j) {
                    $pc_nilai_h = explode("//", $j);
                    $jumlah_n_h += (int)$pc_nilai_h[0];

                    $_desk = nilai_pre($pc_nilai_h[0]);
                    $desk[$_desk][] = $pc_nilai_h[0];
                }
            } else {
                //biar ndak division by zero
                $jumlah_n_h = 1;
                $jumlah_h = 1;
            }

            
			foreach ($array2 as $uts) {
            $nil_uts = $uts['uts'];
			$nil_uas = $uts['uas']; 
            }

            $__tengah = empty($array1[$k]['nilai']) ? 0 : $array1[$k]['nilai'];
            $__akhir = empty($array1[$k]['nilai']) ? 0 : $array1[$k]['nilai'];
			
			// pecah nilai
            $var = str_replace(',', '', $__tengah);
            $var1 = substr($var, 0, 2);
			$var2 = substr($var, 2, 2);
			$var3 = substr($var, 4, 2);
			$nilaiakhir = number_format(((($var1+$var2+$var3)/3*2)+$nil_uts+$nil_uas)/4);
			
			$txt_desk = array();
            foreach ($desk as $r => $s) {
                $txt_desk[] = " pada: " .$nilaiakhir;
            }
            
			$_np = round(((($bobot_h / $jml_bobot) * ($jumlah_n_h / $jumlah_h)) + (($bobot_t / $jml_bobot)) +
                (($bobot_a / $jml_bobot))), 0);
                //(($bobot_t / $jml_bobot) * $var1) +
                //(($bobot_a / $jml_bobot) * $var1)), 0);

            //$nilai_pengetahuan[$k]['nilai'] = number_format($_np);
            $nilai_pengetahuan[$k]['predikat'] = nilai_huruf($nilaiakhir);
            $nilai_pengetahuan[$k]['desk'] = implode("; ", $txt_desk);
            // var_dump($nilai_pengetahuan[$k]['predikat']);

            $nilai_pengetahuan[$k]['nil'] = $nilaiakhir;
            //var_dump($nilai_pengetahuan[$k]['nil']);
        }
        //var_dump($nilai_pengetahuan);    //echo j($nilai_pengetahuan);
        $d['nilai_pengetahuan'] = $nilai_pengetahuan;

        // END Nilai PENGETAHUAN

        // Start NILAI KETRAMPILAN //
        //ambil nilai untuk siswa ybs
        // $ambil_nk = $this->db->query("SELECT b.idmata_pelajaran idmapel, d.tp_tahun, max(d.tp_tahun) as jenis, f.mp_kode, b.idtahun_pelajaran, if(max(b.idtahun_pelajaran),CONCAT(b.np_harian,'//',f.mp_kode),b.np_harian) nilai
        //                           FROM sr_siswa a LEFT JOIN sr_nilai_pengetahuan b ON a.idsiswa = b.idsiswa LEFT JOIN sr_kelas_guru c ON b.idkelas = c.idkelas LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran LEFT JOIN sr_kelas e ON b.idkelas = e.idkelas LEFT JOIN sr_mata_pelajaran f ON b.idmata_pelajaran = f.idmata_pelajaran WHERE b.idsiswa = '$id_siswa' and b.idtahun_pelajaran = '".$d['det_siswa']['idtahun_pelajaran']."' GROUP by b.idsiswa")->result_array();

        //echo var_dump($ambil_nk);
        //ambil id mapel, kode singkat
        // $ambil_nk_submk = $this->db->query("SELECT b.idmata_pelajaran id_mapel, d.tp_tahun, max(d.tp_tahun) as jenis, f.mp_kode, b.idtahun_pelajaran, if(max(b.idtahun_pelajaran),CONCAT(b.np_harian,'//',f.mp_kode),b.np_harian) nilai
        //                           FROM sr_siswa a LEFT JOIN sr_nilai_pengetahuan b ON a.idsiswa = b.idsiswa LEFT JOIN sr_kelas_guru c ON b.idkelas = c.idkelas LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran LEFT JOIN sr_kelas e ON b.idkelas = e.idkelas LEFT JOIN sr_mata_pelajaran f ON b.idmata_pelajaran = f.idmata_pelajaran WHERE b.idsiswa = '$id_siswa' and b.idtahun_pelajaran = '".$d['det_siswa']['idtahun_pelajaran']."' GROUP by b.idmata_pelajaran")->result_array();
        //echo j($ambil_nk_submk);

        $ambil_nk = $this->db->query("SELECT b.idmata_pelajaran as idmapel, f.mp_kode, b.idtahun_pelajaran, b.nk_harian as nilai
                                  FROM sr_nilai_keterampilan  b LEFT JOIN sr_siswa a ON a.idsiswa = b.idsiswa LEFT JOIN sr_mata_pelajaran f ON b.idmata_pelajaran = f.idmata_pelajaran WHERE b.idsiswa = '$id_siswa' and b.idtahun_pelajaran = '" . $d['det_siswa']['idtahun_pelajaran'] . "'")->result_array();

        $ambil_nk_submk = $this->db->query("SELECT b.idmata_pelajaran as id_mapel, f.mp_kode
                                  FROM sr_siswa a LEFT JOIN sr_nilai_keterampilan b ON a.idsiswa = b.idsiswa LEFT JOIN sr_kelas_guru c ON b.idkelas = c.idkelas LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran LEFT JOIN sr_kelas e ON b.idkelas = e.idkelas LEFT JOIN sr_mata_pelajaran f ON b.idmata_pelajaran = f.idmata_pelajaran WHERE b.idsiswa = '$id_siswa' and b.idtahun_pelajaran = '" . $d['det_siswa']['idtahun_pelajaran'] . "' GROUP by b.idmata_pelajaran")->result_array();

        $array2 = array();

        foreach ($ambil_nk_submk as $a11) {
            $array2[$a11['id_mapel']] = array();
        }

        //echo j($ambil_nk);

        foreach ($ambil_nk as $a22) {
            $idx = $a22['idmapel'];

            //$pc_nilai = explode("//", $a2['nilai']);

            $array2[$idx][] = $a22['nilai'];
        }

        //echo j($array2);

        //MULAI HITUNG..

        $nilai_keterampilan = array();
        foreach ($array2 as $k => $v) {

            $jumlah_array_nilai = sizeof($array2[$k]);
            $jumlah_nilai = 0;

            $desk = array();

            foreach ($array2[$k] as $j) {
                $pc_nilai = explode("//", $j);
                $jumlah_nilai += (int)$pc_nilai[0];

                $_desk = nilai_pre($pc_nilai[0]);
                $desk[$_desk][] = $pc_nilai[0];
            }

            $txt_desk = array();
            foreach ($desk as $r => $s) {
                $txt_desk[] = $r . " pada: " . implode(", ", $s);
            }



            if ($jumlah_array_nilai <= 0) $jumlah_array_nilai = 1;

            $_nilai_keterampilan = round(($jumlah_nilai / $jumlah_array_nilai), 0);
            // var_dump($jumlah_array_nilai);

            $nilai_keterampilan[$k]['nilai'] = number_format($_nilai_keterampilan);
            $nilai_keterampilan[$k]['predikat'] = nilai_huruf($_nilai_keterampilan);
            $nilai_keterampilan[$k]['desk'] = implode("; ", $txt_desk);
            $nilai_keterampilan[$k]['nil'] = $var1;
        }

        //echo j($nilai_keterampilan);
        $d['nilai_keterampilan'] = $nilai_keterampilan;

        //j($nilai_keterampilan);
        //exit;
        // END Nilai PENGETAHUAN

        //===========================================================================
        //       START NIlai Sikap SPIRITUAL
        //===========================================================================

		$sikap_spritual = $this->db->query("SELECT * FROM sr_nilai_sikap_sp WHERE idsiswa = '".$id_siswa."' AND tp_tahun='".$d['tahun_ajaran']."'")->row();
		
		if (empty($sikap_spritual->deskripsi)) {
			$nilai_sikap_spiritual = 'Belum diinput';
		}else{
			$nilai_sikap_spiritual = $sikap_spritual->deskripsi;
		}
		
		$d['nilai_sikap_spiritual']		 = $nilai_sikap_spiritual;
        //END NIlai Sikap SPIRITUAL

        //===========================================================================
        //              START NIlai Sikap SOSIAL
        //===========================================================================

		$sikap_sosial = $this->db->query("SELECT * FROM sr_nilai_sikap_so WHERE idsiswa = '".$id_siswa."' AND tp_tahun='".$d['tahun_ajaran']."'")->row();
		
		if (empty($sikap_sosial->deskripsi)) {
			$nilai_sikap_sosial = 'Belum diinput';
		}else{
			$nilai_sikap_sosial = $sikap_sosial->deskripsi;
		}
		
        $d['nilai_sikap_sosial'] = $nilai_sikap_sosial;
        //END NIlai Sikap SPIRITUAL

        //===========================================================================
        //              START NIlai Ekstrakurikuler
        //===========================================================================
        $q_nilai_ekstra = $this->db->query("SELECT 
                                            b.e_nama as nama, a.nilai, a.deskripsi
                                            FROM sr_nilai_ekstrakulikuler a
                                            INNER JOIN sr_ekstra b ON a.id_nilai_ekstrakulikuler = b.idekstra
                                            WHERE a.id_siswa = $id_siswa AND a.nilai != '0'")->result_array();
											//LEFT JOIN sr_tahun_pelajaran c ON a.tp_tahun = c.tp_tahun
											//AND a.tp_tahun = '" . $d['det_siswa']['idtahun_pelajaran'] . "'
        //echo $this->db->last_query();

        $d['nilai_ekstra'] = $q_nilai_ekstra;

        //===========================================================================
        //              START NIlai Absensi
        //===========================================================================
        $q_nilai_absensi = $this->db->query("SELECT 
                                            s, i, a
                                            FROM sr_nilai_absensi
                                            WHERE idsiswa = $id_siswa AND tp_tahun = '" . $d['det_siswa']['idtahun_pelajaran'] . "'")->row_array();

        $d['nilai_absensi'] = $q_nilai_absensi;

        $d['nilai_utama'] = '';

        $kelompok = array("A", "B");

        //foreach ($kelompok as $k) {
        //$q_mapel = $this->db->query("SELECT * FROM m_mapel WHERE kelompok = '$k'")->result_array();


       // $arr_huruf = array("a", "b", "c", "d", "e");


        $no = 0;
        $kel = array();

        foreach ($nilai_pengetahuan as $i => $m) {
            $kel[] = $m['nil'];
        }
		
		
        $kel1 = array();

        foreach ($nilai_pengetahuan as $i => $m) {
            $kel1[] = $m['desk'];
        }

        $ket = array();

        foreach ($nilai_keterampilan as $i => $m) {
            $ket[] = $m['nil'];
        }
        $pre = array();// hasil predikat/grade

        foreach ($nilai_pengetahuan as $i => $m) {
            $pre[] = $m['predikat'];
        }
         
        $no++;

        //no pai kelompok A
        $q_mapel = $this->db->query("SELECT * FROM sr_mata_pelajaran")->result_array();

        foreach ($q_mapel as $i => $m) {
            $idx = $m['idmata_pelajaran'];
            $npa = empty($kel) ? "-" : $kel;
            $npp = empty($pre) ? "-" : $pre;// predikat
            $npd = empty($kel1) ? "-" : $kel1;

            $nka = empty($nilai_keterampilan[$idx]['nilai']) ? "-" : $nilai_keterampilan[$idx]['nilai'];

            $nkp = empty($nilai_keterampilan[$idx]['predikat']) ? "-" : $nilai_keterampilan[$idx]['predikat'];

            $nkd = empty($nilai_keterampilan[$idx]['desk']) ? "-" : "Capaian kompetensi sudah tuntas dengan predikat " . nilai_pre($nka) . ". " . $nilai_keterampilan[$idx]['desk'];


            $d['nilai_utama'] .= '
                                    <tr>
                                        <td class="ctr">' . $no++ . '</td>
                                        <td>' . $m['mp_nama'] . '</td>
                                        <td class="ctr">' . $npa[$i] . '</td>
                                        <td class="ctr">' . $npp[$i] . '</td>
                                        <td class="font_kecil">Capaian kompetensi sudah tuntas dengan predikat ' . $npp[$i] . '' . $npd[$i] . '</td>
                                        <td class="ctr">' . $nka . '</td>
                                        <td class="ctr">' . $nkp . '</td>
                                        <td class="font_kecil">' . $nkd . '</td>
                                    </tr>';
        }



        //}
        //}
       

        $date_now = new DateTime();

        $d['sekolah'] = $this->db->query("SELECT a.s_nama, e.nama_sekolah, h.u_nbm_nip, e.alamat,e.kepsek, e.npsn, a.s_nik, a.s_nisn, a.s_wali, g.first_name, f.k_tingkat, f.k_keterangan, substr(d.tp_tahun, 11, 1) as semester, substr(d.tp_tahun, 1, 9) as tp_tahunn FROM sr_siswa a 
            LEFT JOIN sr_nilai_pengetahuan b ON a.idsiswa = b.idsiswa 
            LEFT JOIN sr_kelas_guru c ON a.idkelas = c.idkelas 
            LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran 
            LEFT JOIN web_sekolah e on a.unit = e.unit
            LEFT JOIN sr_kelas f on a.idkelas = f.idkelas
            LEFT JOIN users g on f.walikelas = g.id
            LEFT JOIN sr_users h on g.id = h.idusers  
            WHERE a.idsiswa = '$id_siswa' GROUP by a.idsiswa")->result();

        //var_export($d['nilai_absensi']);
		$date  = date("YmdHis");
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'portrait');
        $this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->filename = "raport-$date.pdf";
		//$this->pdf->load_view('rapot/cetak_rapot', $d);
		$this->load->view('rapot/cetak_rapot', $d);
    }
	
	   public function cetak_leger() {

        $data['siswa_kelas'] = $this->db->query("SELECT a.idsiswa, a.s_nama ,d.tp_tahun FROM sr_siswa a LEFT JOIN sr_nilai_pengetahuan b ON a.idsiswa = b.idsiswa LEFT JOIN sr_kelas_guru c ON a.idkelas = c.idkelas LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran WHERE a.idkelas = '1' AND b.idtahun_pelajaran = '1' GROUP by a.idsiswa")->result_array();
        $data['kelas'] = $this->doc_soal->pkelas($this->session->userdata('id'))->result(); 
        $data['page']  = 'lager_landing';    
        $this->load->view('template', $data);
    }
   public function leger() {
         
        $kelas = $this->input->post('kelas');
        $idg = $this->session->userdata('id');

        $s_siswa = $this->db->query("select a.idsiswa, a.s_nama from sr_siswa a 
            inner join sr_nilai_pengetahuan b on a.idkelas = b.idkelas where b.idkelas = $kelas and b.idtahun_pelajaran = '1' group by a.idsiswa")->result_array();
        // $s_siswa = $this->db->query("SELECT sum(b.np_harian) as nilai, b.idkelas, a.s_nama, b.idsiswa, b.idmata_pelajaran as id_mapel FROM sr_nilai_pengetahuan b LEFT JOIN sr_siswa a ON a.idsiswa = b.idsiswa LEFT JOIN sr_mata_pelajaran f ON b.idmata_pelajaran = f.idmata_pelajaran WHERE b.idkelas = $kelas and b.idtahun_pelajaran = '1' group by b.idsiswa")->result_array();
        $s_mapel = $this->db->query("select a.idmata_pelajaran, a.mp_nama from sr_mata_pelajaran a order by a.idmata_pelajaran")->result_array();
        $strq_np = $this->db->query("SELECT avg(b.np_harian) as nilai, sum(b.np_harian) as nilaix, b.np_harian as npharian, b.idkelas, b.idsiswa as id_siswa, b.idmata_pelajaran as id_mapel FROM sr_nilai_pengetahuan b LEFT JOIN sr_siswa a ON a.idsiswa = b.idsiswa LEFT JOIN sr_mata_pelajaran f ON b.idmata_pelajaran = f.idmata_pelajaran WHERE b.idkelas = 1 and b.idtahun_pelajaran = 1 group by b.idsiswa, b.idmata_pelajaran order by nilaix DESC")->result_array();
        $strq_nk = $this->db->query("SELECT avg(b.nk_harian) as nilai, sum(b.nk_harian) as nilaix, b.idkelas, b.idsiswa as id_siswa, b.idmata_pelajaran as id_mapel FROM sr_nilai_keterampilan b LEFT JOIN sr_siswa a ON a.idsiswa = b.idsiswa LEFT JOIN sr_mata_pelajaran f ON b.idmata_pelajaran = f.idmata_pelajaran WHERE b.idkelas = 1 and b.idtahun_pelajaran = 1 group by b.idsiswa, b.idmata_pelajaran order by nilaix DESC")->result_array();
		
		
		$queri_siswa = $s_siswa;
        $queri_np = $strq_np;
        $queri_nk = $strq_nk;
        $queri_mapel = $s_mapel;
      
        foreach ($queri_np as $a) {
            $idx1 = $a['id_mapel'];
            $idx2 = $a['id_siswa'];
            //$idx3 = $a['jenis'];
            $data_np[$idx1][$idx2] =  number_format($a['nilai']);
		
        }
     
        $data_nk = array();
        foreach ($queri_nk as $a) {
            $idx1 = $a['id_mapel'];
            $idx2 = $a['id_siswa'];
            $data_nk[$idx1][$idx2] = number_format($a['nilai']);
        }
     
        // $d['sekolah'] = $this->db->query("SELECT e.nama_sekolah, h.u_nbm_nip, e.alamat,e.kepsek, e.npsn,e.nss, e.kelurahan,e.kecamatan, e.kabupaten,e.provinsi,e.email, e.logo, g.first_name, a.k_tingkat, a.k_keterangan, substr(d.tp_tahun, 11, 1) as semester, substr(d.tp_tahun, 1, 9) as tp_tahunn FROM sr_kelas a 
        //     LEFT JOIN sr_nilai_pengetahuan b ON a.idkelas = b.idkelas 
        //     LEFT JOIN sr_kelas_guru c ON a.idkelas = c.idkelas 
        //     LEFT JOIN sr_tahun_pelajaran d ON b.idtahun_pelajaran = d.idtahun_pelajaran 
        //     LEFT JOIN web_sekolah e on a.unit = e.unit
        //     LEFT JOIN users g on a.walikelas = g.id
        //     LEFT JOIN sr_users h on g.id = h.idusers  
        //     WHERE a.walikelas = '42' GROUP by b.idsiswa")->result();

        //var_dump($d['sekolah']);
        $siswa = $this->db->query("SELECT e.first_name, d.tp_tahun, c.k_keterangan FROM sr_nilai_pengetahuan a LEFT JOIN sr_kelas c ON a.idkelas = c.idkelas LEFT JOIN sr_tahun_pelajaran d ON a.idtahun_pelajaran = d.idtahun_pelajaran LEFT JOIN users e ON c.walikelas = e.id WHERE a.idkelas = '$kelas' group by a.idkelas ")->result_array();

        foreach ($siswa as $siswaa) {
        $html = '<p align="left"><b>LEGER NILAI PENGETAHUAN & KETERAMPILAN</b>
                <br>
                
                Kelas : '.$siswaa['k_keterangan'].' <br> Nama Wali : '.$siswaa['first_name'].'<br> Tahun Pelajaran '.(substr( $siswaa['tp_tahun'], 0, 4))."/". (substr( $siswaa['tp_tahun'], 0, 4)+1).'   <hr style="border: solid 1px #000; margin-top: -10px"></p>';
            }
                
        $html .= '<table class="table" id="table" name="table"><tr><td align="center" rowspan="2">Nama Lengkap</td>';
        foreach ($queri_mapel as $m) {
            $html .= '<td colspan="2" align="center">'.$m['mp_nama'].'</td>';
        }

        $html .= '<td rowspan="2" align="center" >Jumlah</td></tr>';
        //$html .= '<td rowspan="2">Rangking</td></tr>';
        foreach ($queri_mapel as $m) {
            $html .= '<td align="center" class="ctr"  style="font-size:11px;">P</td><td class="ctr"  align="center" style="font-size:11px;">K</td>';
        }

        //$html .= '<td>P</td><td>K</td></tr>';
        $n = 0;

        foreach ($queri_siswa as $s) {
            $html .= '<tr><td style="width: 15%">'.$s['s_nama'] .'</td>';
            $jml_np = 0;
            $jml_nk = 0;
            $n++;
            foreach ($queri_mapel as $m) {
             
                $idx1 = $m['idmata_pelajaran'];
                $idx2 = $s['idsiswa'];
                
                $np_h = !empty($data_np[$idx1][$idx2]) ? number_format($data_np[$idx1][$idx2]) : 0;
           
                $nk = !empty($data_nk[$idx1][$idx2]) ? number_format($data_nk[$idx1][$idx2]) : 0;
                $jml_nk = ($jml_nk + $nk);
				$jml_np = ($jml_np + $np_h);
                $a = floatval($nk);
           
                $html .= '<td class="ctr" style="width: 4%">'.($np_h).'</td><td class="ctr" style="width: 4%">'.($nk).'</td>';

            }
          
         $html .= '<td align="center" style="width: 5%">'.($jml_np+$jml_nk).'</td></tr>';
		
        }

        $html .= '</table>';

        $d['html'] = $html;
        $d['teks_tasm'] = "Tahun Ajaran , Semester";
        
		$web_setting	 = $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
		$default_print   = $web_setting->default_print;
		//$this->load->view('leger/cetak', $d);
		$date  = date("YmdHis");
		$this->load->library('pdf');
		$this->pdf->setPaper($default_print, 'landscape');
        $this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->filename = "raport-$date.pdf";
		$this->pdf->load_view('leger/cetak', $d);	   
		}

 public function ekstra() {

      $kelas = $this->input->post('kelas');
      $idg = $this->session->userdata('id');
      $siswa = $this->db->query("SELECT e.first_name, e.id, a.idsiswa, d.tp_tahun, f.s_nama, d.idtahun_pelajaran, c.k_keterangan FROM sr_nilai_pengetahuan a LEFT JOIN sr_kelas c ON a.idkelas = c.idkelas LEFT JOIN sr_tahun_pelajaran d ON a.idtahun_pelajaran = d.idtahun_pelajaran LEFT JOIN users e ON c.walikelas = e.id LEFT JOIN sr_siswa f ON a.idsiswa = f.idsiswa WHERE a.idkelas = '$kelas' group by a.idkelas ")->result_array();
      $d['det_siswa'] = $siswa;
           
      $tahun = $this->db->query("SELECT tahun_ajaran from web_setting order by id")->row();
      $tahuh_ajaran =$tahun->tahun_ajaran;

        $s_mapel = "select a.idekstra, a.e_nama from sr_ekstra a order by a.idekstra asc";
          
        //===========================================================================
        //              START NIlai Ekstrakurikuler
        //===========================================================================
        $q_nilai_ekstra = $this->db->query("SELECT C.s_nama as nama, C.idkelas, A.nilai, A.deskripsi as desk, C.idsiswa, B.idekstra, B.e_nama as ektra FROM sr_nilai_ekstrakulikuler A 
		LEFT JOIN sr_ekstra B on A.id_nilai_ekstrakulikuler = B.idekstra
		LEFT JOIN sr_siswa C on C.idsiswa = A.id_siswa
		WHERE C.idkelas = '$kelas' AND A.nilai != '0'")->result_array();
        

        $d['nilai_ekstra'] = $q_nilai_ekstra;

        //===========================================================================
        //              START NIlai Absensi
        //===========================================================================
        $q_nilai_absensi = $this->db->query("SELECT 
                                            s, i, a, idsiswa
                                            FROM sr_nilai_absensi
                                            WHERE idkelas = $kelas AND tp_tahun = '$tahuh_ajaran'")->result_array();

        $queri_ne =  $q_nilai_ekstra;
        $queri_na = $q_nilai_absensi;
        $queri_siswa = $siswa;
        $queri_mapel = $this->db->query($s_mapel)->result_array();

        $data_ne = array();
        foreach ($queri_ne as $a) {
            $idx1 = $a['idekstra'];
            $idx2 = $a['idsiswa'];
            $data_ne[$idx1][$idx2]['nilai'] = $a['nilai'];
            $data_ne[$idx1][$idx2]['desk'] = $a['desk'];
        } 

        $data_na = array();
        foreach ($queri_na as $a) {
            $idx1 = $a['idsiswa'];
            $data_na[$idx1]['s'] = $a['s'];
            $data_na[$idx1]['i'] = $a['i'];
            $data_na[$idx1]['a'] = $a['a'];
        }
         $guru = $this->db->query("SELECT e.first_name, d.tp_tahun, c.k_keterangan FROM sr_nilai_pengetahuan a LEFT JOIN sr_kelas c ON a.idkelas = c.idkelas LEFT JOIN sr_tahun_pelajaran d ON a.idtahun_pelajaran = d.idtahun_pelajaran LEFT JOIN users e ON c.walikelas = e.id WHERE a.idkelas = '$kelas' group by a.idkelas ")->result_array();

        foreach ($guru as $siswaa) {
        $html = '<p align="left"><b>LEGER NILAI EKSTRAKURIKULER & ABSENSI</b>
                <br>
                Kelas : '.$siswaa['k_keterangan'].' <br> Nama Wali : '.$siswaa['first_name'].'<br> Tahun Pelajaran '.(substr( $siswaa['tp_tahun'], 0, 4))."/". (substr( $siswaa['tp_tahun'], 0, 4)+1).'   <hr style="border: solid 1px #000; margin-top: -10px"></p>';
            }
        $html .= '<table class="table"><tr><td align="center" >Nama</td>';
        foreach ($queri_mapel as $m) {
            $html .= '<td colspan="2" align="center">'.$m['e_nama'].'</td>';
        }
        $html .= '<td align="center">S</td>
				  <td align="center">I</td>
				  <td align="center">A</td>
				  <tr>';

        foreach ($queri_siswa as $s) {
            $html .= '<tr><td style="width: 20%">'.$s['s_nama'].'</td>';
            $id_siswa = $s['idsiswa'];
            foreach ($queri_mapel as $m) {
                $id_ekstra = $m['idekstra'];
                $nilai = !empty($data_ne[$id_ekstra][$id_siswa]['nilai']) ? $data_ne[$id_ekstra][$id_siswa]['nilai'] : '-';
                $desk = !empty($data_ne[$id_ekstra][$id_siswa]['desk']) ? $data_ne[$id_ekstra][$id_siswa]['desk'] : '-';

                $html .= '
                <td style="width: 7%" class="ctr">'.$nilai.'</td>
                <td style="width: 7%" class="ctr">'.$desk.'</td>';
            }

            $s = !empty($data_na[$id_siswa]['s']) ? $data_na[$id_siswa]['s'] : '-';
            $i = !empty($data_na[$id_siswa]['i']) ? $data_na[$id_siswa]['i'] : '-';
            $a = !empty($data_na[$id_siswa]['a']) ? $data_na[$id_siswa]['a'] : '-';

            $html .= '
            <td class="ctr">'.$s.'</td>
            <td class="ctr">'.$i.'</td>
            <td class="ctr">'.$a.'</td>
            </tr>';
        }

        $html .= '</table>';

        $d['html'] = $html;
        $d['teks_tasm'] = "Tahun Ajaran , Semester";
		
		 $web_setting	 = $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->row();
		 $default_print   = $web_setting->default_print;
	     $date  = date("YmdHis");
		 $this->load->library('pdf');
		 $this->pdf->setPaper($default_print, 'landscape');
         $this->pdf->set_option('isRemoteEnabled', true);
		 $this->pdf->filename = "raport-$date.pdf";
		 $this->pdf->load_view('leger/cetak_ekstra', $d);
    }
}
