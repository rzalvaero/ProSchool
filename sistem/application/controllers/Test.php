<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->helper('captcha');
    }

    function cuaca()
    {
        $this->load->view('cuaca');
    }

    function api()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api-harilibur.vercel.app/api",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: 0eaa2ed6-c1c9-fe63-b50a-42c2e6bc28dc"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $result = json_decode($response, true);
        foreach ($result as $data) {
            $holiday_date = $data['holiday_date'];
            $holiday_name =  $data['holiday_name'];
            $is_national_holiday =  $data['is_national_holiday'];
            if ($is_national_holiday == TRUE) {
                $national_holiday = "1";
            } else {
                $national_holiday = "2";
            }
            $s = $this->db->query("SELECT * FROM web_calender WHERE title='" . $holiday_name . "' AND waktu='" . $holiday_date . "'")->num_rows();
            $ss = isset($s) ? ($s) : 0;
            // Kalau belum ada, simpan data user tersebut ke database
            if ($ss == 0) {
                $this->db->query("INSERT INTO web_calender(title, waktu, libur) VALUES('" . $holiday_name . "','" . $holiday_date . "','" . $national_holiday . "')");
            }
            echo "SUKSES";
        }
    }
	
	function kepo($data){
	  $filter  	= strip_tags(htmlspecialchars(($data),ENT_QUOTES));
      $string   = preg_replace("@[^A-Za-z0-9\w\ ]@", "", $filter);
	  $trim     = trim($string);
	  $getext  	= str_replace("'", " ", $trim);
	  return $getext;
    }
	
	function surat_islam(){
		$curl = curl_init();

							curl_setopt_array($curl, array(
							  CURLOPT_URL => "https://api.npoint.io/99c279bb173a6e28359c/data",
							  CURLOPT_RETURNTRANSFER => true,
							  CURLOPT_ENCODING => "",
							  CURLOPT_MAXREDIRS => 10,
							  CURLOPT_TIMEOUT => 30,
							  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							  CURLOPT_CUSTOMREQUEST => "GET",
							  CURLOPT_HTTPHEADER => array(
								"cache-control: no-cache",
								"postman-token: 327fc96d-c3fe-872b-d974-ad0ed2a67c2c"
							  ),
							));

							$response = curl_exec($curl);
							$err = curl_error($curl);

							curl_close($curl);
					        $array = json_decode($response, true);
							foreach ($array as $data) {
                            $arti = $data['arti'];
                            $asma =  $data['asma'];
                            $ayat =  $data['ayat'];

                            $nama =  $this->kepo($data['nama']);
                            $asma =  $data['asma'];
                            $str =  $data['audio'];
							$prefix 		= 'http://';
							$prefix2 		= 'https://';
							if (substr($str, 0, strlen($prefix)) === $prefix) {
									$audio = substr($str, strlen($prefix));
								}
							$matching = $prefix2.$audio;
							//die(print_r($matching));
                            $nomor = $data['nomor'];
							$s = $this->db->query("SELECT * FROM web_surat WHERE nama='" . $nama . "' AND arti='" . $arti . "'")->num_rows();
                            $ss = isset($s) ? ($s) : 0;
                            // Kalau belum ada, simpan `data user tersebut ke database
								if ($ss == 0) {
									$this->db->query("INSERT INTO web_surat(arti,asma,nama,audio,ayat,nomer,agama) 
									VALUES('" . $arti . "','" . $asma . "','" . $nama . "','" . $matching . "','" . $ayat . "','" . $nomor . "','ISLAM')");
								}
                            echo "SUKSES";
                            }
	}
}
