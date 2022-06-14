<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('core');
		$this->load->library('pdf');
	}

	function index()
	{
		$data['province'] = $this->core->get_provinsi();
		$this->load->view('ppdb/form-ppdb', $data);
	}

	function get_subprovinsi()
	{
		$id = $this->input->post('id');
		$data = $this->core->get_subprovinsi($id);
		echo json_encode($data);
	}

	function random_number($length) {
		$str = "";
		$characters = array_merge(range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
	
	function kepo($data){
	  $filter  	= strip_tags(htmlspecialchars(($data),ENT_QUOTES));
      $string   = preg_replace("/[^a-zA-Z0-9]/", "", $filter);
	  $trim     = trim($string);
	  $getext  	= str_replace(" ", "", $trim);
	  return $getext;
    }
	
	function adding()
	{
		$no_pendaftaran 		  = $this->core->kode_ppdb();
		$post_subject 			  = "Pendaftaran PPDB | Diterima";
		//die(print_r($kode_barang));
		$nama                     = $this->input->post('nama');
		$nik                  	  = $this->input->post('nik');
		$jenis                    = $this->input->post('jenis');
		$jalur                    = $this->input->post('jalur');
		$agama                    = $this->input->post('agama');
		//die(print_r($saumbung));
		$hp_hp                     = $this->input->post('telpon');
		$hobi                     = $this->input->post('hobi');
		$jenkel                   = $this->input->post('jenkel');
		$cita           		  = $this->input->post('cita');
		$tempatlahir              = $this->input->post('tempat');
		$tanggalahir              = $this->input->post('tanggal');
		$email           		  = $this->input->post('email');

		$tinggal              	  = $this->input->post('tinggal');
		$rt                 	  = $this->input->post('rt');
		$rw           		  	  = $this->input->post('rw');
		$alamat           		  = $this->input->post('alamat');
		$provinsi                 = $this->input->post('province');
		$kota           		  = $this->input->post('kota');

		$kodepos           		  = $this->input->post('kodepos');
		$asal	                  = $this->input->post('asal');
		$alamatsekolah            = $this->input->post('alamatsekolah');

		$tinggi           		  = $this->input->post('tinggi');
		$berat	                  = $this->input->post('berat');
		$jarak		              = $this->input->post('jarak');
		$saudara	              = $this->input->post('saudara');

		$ayah           		  = $this->input->post('ayah');
		$ayahlahir	              = $this->input->post('ayahlahir');
		$ayahpendidikan		      = $this->input->post('ayahpendidikan');
		$ayahpekerjaan            = $this->input->post('ayahpekerjaan');
		$ayahpendapatan           = $this->input->post('ayahpendapatan');

		$ibu           			  = $this->input->post('ibu');
		$ibulahir	              = $this->input->post('ibulahir');
		$ibupendidikan		      = $this->input->post('ibupendidikan');
		$ibupekerjaan             = $this->input->post('ibupekerjaan');
		$ibupendapatan            = $this->input->post('ibupendapatan');

		$wali          			  = $this->input->post('wali');
		$walilahir	              = $this->input->post('walilahir');
		$walipendidikan		      = $this->input->post('walipendidikan');
		$walipekerjaan            = $this->input->post('walipekerjaan');
		$walipendapatan           = $this->input->post('walipendapatan');
		$date                     = date("Y-m-d H:i:s"); // Mendapatkan tanggal sekarang

		$check_nik = $this->db->query("SELECT * FROM sr_ppdb WHERE nik = '$nik'");
		if (empty($nama) || empty($nik)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('ppdb');
		} else if ($check_nik->num_rows() <> 0) {
			$this->session->set_flashdata("msg", "<br/><br/><div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
            NIK sudah terdaftar, Kamu lupa ya?
            </div><br/>");
			redirect('ppdb');
		} else {
			$data = array(
				'no_pendaftaran'			=> $no_pendaftaran,
				'nik'        				=> $nik,
				'jenis_pendaftaran'			=> $jenis,
				'jalur_pendaftaran' 	 	=> $jalur,	
				'hobi'     				    => $hobi,
				'cita_cita'  		        => $cita,
				'nama_siswa'  		 	 	=> $nama,
				'jenis_kelamin' 		    => $jenkel,
				'tempat_lahir'   		    => $tempatlahir,
				'tanggal_lahir'   		    => $tanggalahir,
				'agama'						=> $agama,
				'provinsi' 		  			=> $provinsi,
				'kota'		      			=> $kota,
				'alamat'     	    		=> $alamat,
				'rt'       		  			=> $rt,
				'rw'		      			=> $rw,
				'kode_pos'        			=> $kodepos,
				'tempat_tinggal'  			=> $tinggal,
				'transportasi'     			=> "",
				'no_hp'       				=> $hp_hp,
				'email'  	        		=> $email,
				'kewarganegaraan'			=> "WNI",
				'foto'		       			=> "",
				'tinggi_badan'  		    => $tinggi,
				'berat_badan'   		    => $berat,
				'jarak_ke_sekolah'  	 	=> $jarak,
				'waktu_tempuh_ke_sekolah'   => "",
				'jumlah_saudara'		    => $saudara,
				'asal_sekolah'  		    => $asal,
				'alamat_sekolah_asal'   	=> $alamatsekolah,
				
				'nama_ayah'				    => $ayah,
				'tahun_lahir_ayah' 		    => $ayahlahir,
				'pendidikan_ayah'		   	=> $ayahpendidikan,
				'pekerjaan_ayah'  		    => $ayahpekerjaan,
				'penghasilan_ayah'		   	=> $ayahpendapatan,

				'nama_ibu'				    => $ibu,
				'tahun_lahir_ibu' 		    => $ibulahir,
				'pendidikan_ibu'		   	=> $ibupendidikan,
				'pekerjaan_ibu'  		    => $ibupekerjaan,
				'penghasilan_ibu'		   	=> $ibupendapatan,

				'nama_wali'				    => $wali,
				'tahun_lahir_wali' 		    => $walilahir,
				'pendidikan_wali'		   	=> $walipendidikan,
				'pekerjaan_wali'  		    => $walipekerjaan,
				'penghasilan_wali'		   	=> $walipendapatan,
				
				//DATE
				'tanggal_daftar'		   	=> $date,
			);
			$lastid 		= $this->core->input_data2($data, 'sr_ppdb');
			
			$price 		 	= 100000;
			$service		= "Pendaftaran PPDB ".$nama." - NO Pendaftaran : ".$no_pendaftaran."";
			$invoice_code	= "ID-".$this->random_number(5)."";
			$date2			= date("Y-m-d");

			$datainv = array(
				'code'				=> $invoice_code,
				'identification'	=> $no_pendaftaran,
				'custumer' 			=> $nama,
				'service' 			=> $service,
				'price' 			=> $price,
				'number'			=> $hp_hp,
				'email' 			=> $email,
				'date' 				=> $date2
			);
			$this->core->input_data($datainv,'sr_invoice');
			$datamail 	= array(
				'no_pendaftaran'		=> $no_pendaftaran,
				'nama' 					=> $nama
			);
			$this->load->library('email');
			$config = array();
			$config['charset'] = 'utf-8';
			$config['useragent'] = 'Codeigniter';
			$config['protocol'] = "smtp";
			$config['mailtype'] = "html";
			$config['smtp_host'] = "ssl://mail.proschool.id"; //"mail.1tenda.com";
			$config['smtp_port'] = "465";
			$config['smtp_timeout'] = "400";
			$config['smtp_user'] = "noreply@proschool.id"; //"techpresently99@gmail.com";
			$config['smtp_pass'] = "@Komputer7"; // "komputer7"; 
			$config['crlf'] = "\r\n";
			$config['newline'] = "\r\n";
			$config['wordwrap'] = TRUE;
			//memanggil library email dan set konfigurasi untuk pengiriman email
			$this->email->initialize($config);
			//konfigurasi pengiriman
			$this->email->from($config['smtp_user']);
			$this->email->to($email);
			$this->email->subject($post_subject);
			$body = $this->load->view('mail/ppdb-mail.php', $datamail, TRUE);
			$this->email->message($body);
			$this->email->send();
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
				Selamat, data anda telah terkirim!
			</div>");
			redirect('portal/thanks');
		}
	}
	
	function pay($value='')
	{
		$where = array('identification' => $value);
		$data['edit'] 		= $this->core->edit($where,'sr_invoice')->result();
		$data['method']		= $this->core->selectmethod();
		//die(print_r($value));
		$this->load->view('ppdb/form-payment',$data, FALSE);
	}
	
	function paying(){
		//default
		$id = $this->input->post('id');
		$total = $this->kepo($this->input->post('price',TRUE));
		$email = $this->input->post('email');
		$nomer = $this->input->post('nomer');
		$method = $this->input->post('method');
		$service = $this->input->post('service');
		$nama = $this->input->post('nama');
		
		if(!preg_match('/[^+0-9]/',$nomer)) {
			if(substr($nomer, 0, 3)=='62'){
				$no_pengirim_pulsa = $nomer;
			} else if(substr($nomer, 0, 1)=='0') {
				$no_pengirim_pulsa = '62'.substr($nomer, 1);
			}
		}
		
		$data = array(
			//'number' 	=> $no_pengirim_pulsa,
			'email' 	=> $email,
			'method'	=> $method
		);
		//die(print_r($data));
		$where = array(
			'code' => $id
		);
		$this->core->update($where,$data,'sr_invoice');
		//PAYMENT PROSSESS
				$merchantCode = 'D11838';//'D6271'; // from duitku
				$merchantKey = '03123db62b6f0ef72c604087d8d88b28';// from duitku
				$paymentAmount = $total; // Total DP
				$paymentMethod = $method; // Method Payment
				$merchantOrderId = time(); // from merchant, unique
				$merchantOrder = $id; // ID Invoice
				$genrates	 = $service; // from merchant, unique
				$productDetails = $genrates;
				$email = $email; // your customer email
				$phoneNumber = $no_pengirim_pulsa ;//'08123456789'; // your customer phone number (optional)
				$additionalParam = ''; // optional
				$merchantUserInfo = ''; // optional
				$customerVaName = $nama ; // display name on bank confirmation display
				$callbackUrl 	= 'https://proschool.weddingquora.com/get/duitku'; // url for callback
				$returnUrl 		= 'https://proschool.weddingquora.com/another/success'; // url for redirect 
				$expiryPeriod = '4320'; // ( 1440 -> 24jam ) set the expired time in minutes
				 
                // Address 
                $alamat = $this->input->post('alamat');
                $city = "Jakarta";
                $postalCode = $this->input->post('poscode');
                $countryCode = "ID";
				
				$signature = md5($merchantCode . $merchantOrder . $paymentAmount . $merchantKey);

				$item1 = array(
					'name' => $genrates,
					'price' => $paymentAmount,
					'quantity' => 1);
					
				$itemDetails = array(
					$item1
				);
				
				# untuk costumer detail
				
			    $address = array(
                    'firstName' => $nama,
                    'lastName' => "",//
                    'address' => $alamat,
                    'city' => $city,
                    'postalCode' => $postalCode,
                    'phone' => $no_pengirim_pulsa,
                    'countryCode' => $countryCode
                );
				
				$customerDetail = array(
					'firstName' => $nama,
					'lastName' => "",//$lastName,
					'email' => $email,
					'phoneNumber' => $no_pengirim_pulsa,
					'billingAddress' => $address,
					'shippingAddress' => $address
				);

				$params = array(
					'merchantCode' => $merchantCode,
					'paymentAmount' => $paymentAmount,
					'paymentMethod' => $paymentMethod,
					'merchantOrderId' => $merchantOrder,
					'productDetails' => $productDetails,
					'customerVaName' => $customerVaName,
					'email' => $email,
					'phoneNumber' => $phoneNumber,
					'callbackUrl' => $callbackUrl,
					'returnUrl' => $returnUrl,
					'signature' => $signature,
					'expiryPeriod' => $expiryPeriod,
					'itemDetails' => $itemDetails,
					'customerDetail' => $customerDetail
				);
				
				$params_string = json_encode($params);
				$url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
				//$url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry'; // Production
				$ch = curl_init();

				curl_setopt($ch, CURLOPT_URL, $url); 
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
				curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
					'Content-Type: application/json',                                                                                
					'Content-Length: ' . strlen($params_string))                                                                       
				);   
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                //die(print_r($url));
				//execute post
				$request = curl_exec($ch);
				$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				
					if($httpCode == 200)
					{
							$result = json_decode($request, true);
							$reference = $result['reference'];
							$amount = $result['amount'];
							//$vaNumber = $result['vaNumber'];
							$link   = $result['paymentUrl'];
							if ($paymentMethod == "SA" || "VC") {
								$vaNumber = '';
							}else{
								$vaNumber = $result['vaNumber'];
							}
							
								if ( $result['statusCode'] == 00) { 
								//Success
									$status = "Success";
								} elseif($result['statusCode'] == 01) {
								//Pending
									$status = "Pending";
								} elseif($result['statusCode'] == 02) {
								//Canceled
									$status = "Error";
								}
								//update    
								$update_layanan = $this->db->query("UPDATE sr_invoice SET noreff='".$reference."', link='".$link."' WHERE code='".$id."' ");
								header('location: '. $result['paymentUrl']);
								echo "paymentUrl :". $result['paymentUrl'] . "<br />";
								echo "merchantCode :". $result['merchantCode'] . "<br />";
								echo "reference :". $result['reference'] . "<br />";
								echo "vaNumber :". $result['vaNumber'] . "<br />";
								echo "amount :". $result['amount'] . "<br />";
								echo "statusCode :". $result['statusCode'] . "<br />";
								echo "statusMessage :". $result['statusMessage'] . "<br />";
					}
					else
					echo $httpCode;
	}
	
	public function data()
	{
		$data['page'] 	 	= 'ppdb';
		$data['dropdown']	= $this->core->selectkelas();
		$type = $this->session->userdata('type_users');
		$unit = $this->session->userdata('unit');
		//die(print_r($type));
		if ($type == "SISWA") {
			redirect('dashboard');
		} elseif ($type == "GURU") {
			$data['ppdb']    	= $this->db->query("SELECT * FROM sr_ppdb")->result_array();// WHERE unit='$unit'
		} else {
			$data['ppdb']    	= $this->db->query("SELECT * FROM sr_ppdb")->result_array();
		}
		$this->load->view('template', $data, FALSE);
	}

	public function cetakformulir()
    {
		$this->load->view('ppdb/cetakformulir');
    }

	public function cetak_formulir()
    {
		//$no_pendaftaran = $value;
		$no_pendaftaran = $this->input->post('no_pendaftaran');
		$cek = $this->db->query("SELECT * FROM sr_ppdb WHERE no_pendaftaran = '$no_pendaftaran'");
		//die(print_r($no_pendaftaran));
		if ($cek->num_rows() > 0) {
			$get = $cek->row();
			//die(print_r($get));
			$d['tanggal_daftar'] = $get->tanggal_daftar;
			$d['no_pendaftaran'] = $get->no_pendaftaran;
			$d['nama_siswa'] 	 = $get->nama_siswa;
			$d['id_ppdb'] 		 = $get->id_ppdb;
			$statusnya			 = $get->status;
			if($statusnya == "1"){
				$d['statusbadge'] 		 = "badge-success";
				$d['statustext'] 		 = "text-success";
				$d['status'] 		 	 = "Pendaftaran telah dikonfirmasi";
				$d['titlestatus'] 		 = "Selamat pendaftaran anda telah dikonfirmasi, harap lakukan pembayaran";
			}else{
				$d['statusbadge'] 		 = "badge-warning";
				$d['statustext'] 		 = "text-warning";
				$d['status'] 			 = "Menunggu pendaftaran dikonfirmasi oleh tim kami";
				$d['titlestatus'] 		 = "Pendaftaran anda belum dikonfirmasi, harap tunggu 1x24";
			}
			//DETAIL
			$this->load->view('ppdb/detailformulir',$d);
		} else {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Calon pendaftar tidak ditemukan!
			</div>");
			redirect("ppdb/cetakformulir");
		}
    }

	public function download($no_pendaftaran = "")
	{
		$sekolah = $this->db->query("SELECT * FROM web_sekolah WHERE id = 1")->row();
		
		$cek = $this->db->query("SELECT * FROM sr_ppdb WHERE no_pendaftaran = '$no_pendaftaran'");
		//die(print_r($cek));
		if ($cek->num_rows() > 0) {
			$get = $cek->row();
			//ANOTHER PAGE
			//die(print_r($get));
			$d['nama_sekolah'] = $sekolah->nama_sekolah;
			$d['logo'] = $sekolah->logo;
			$d['alamat_sekolah'] = $sekolah->alamat . ', ' . $sekolah->kodepos;
			$d['kontak_sekolah'] = 'Telp.' . $sekolah->no_telepon . ' | Email:  ' . $sekolah->email;

			$d['id_ppdb'] = $get->id_ppdb;
			$d['no_pendaftaran'] = $get->no_pendaftaran;
			$d['jenis_pendaftaran'] = $get->jenis_pendaftaran;
			$d['jalur_pendaftaran'] = $get->jalur_pendaftaran;
			$d['hobi'] = $get->hobi;
			$d['cita_cita'] = $get->cita_cita;
			//DETAIL
			$d['nama_siswa'] = $get->nama_siswa;
			$d['jenis_kelamin'] = $get->jenis_kelamin;
			$d['nik'] = $get->nik;
			$d['tempat_lahir'] = $get->tempat_lahir;
			$d['tanggal_lahir'] = $get->tanggal_lahir;
			$d['agama'] = $get->agama;
			$d['alamat'] = $get->alamat;
			$d['rt'] = $get->rt;
			$d['rw'] = $get->rw;
			$d['province'] = $get->provinsi;
			$d['kota'] = $get->kota;
			$d['kode_pos'] = $get->kode_pos;
			$d['tempat_tinggal'] = $get->tempat_tinggal;
			$d['transportasi'] = $get->transportasi;
			$d['no_hp'] = $get->no_hp;
			$d['email'] = $get->email;
			$d['kewarganegaraan'] = $get->kewarganegaraan;

			$d['tinggi_badan'] = $get->tinggi_badan;
			$d['berat_badan'] = $get->berat_badan;
			$d['jarak_ke_sekolah'] = $get->jarak_ke_sekolah;
			$d['waktu_tempuh_ke_sekolah'] = $get->waktu_tempuh_ke_sekolah;
			$d['jumlah_saudara'] = $get->jumlah_saudara;

			$d['asal_sekolah'] = $get->asal_sekolah;
			$d['alamat_sekolah_asal'] = $get->alamat_sekolah_asal;

			$d['nama_ayah'] = $get->nama_ayah;
			$d['tahun_lahir_ayah'] = $get->tahun_lahir_ayah;
			$d['pendidikan_ayah'] = $get->pendidikan_ayah;
			$d['pekerjaan_ayah'] = $get->pekerjaan_ayah;
			$d['penghasilan_ayah'] = $get->penghasilan_ayah;

			$d['nama_ibu'] = $get->nama_ibu;
			$d['tahun_lahir_ibu'] = $get->tahun_lahir_ibu;
			$d['pendidikan_ibu'] = $get->pendidikan_ibu;
			$d['pekerjaan_ibu'] = $get->pekerjaan_ibu;
			$d['penghasilan_ibu'] = $get->penghasilan_ibu;

			$d['nama_wali'] = $get->nama_wali;
			$d['tahun_lahir_wali'] = $get->tahun_lahir_wali;
			$d['pendidikan_wali'] = $get->pendidikan_wali;
			$d['pekerjaan_wali'] = $get->pekerjaan_wali;
			$d['penghasilan_wali'] = $get->penghasilan_wali;
			$d['status'] = $get->status;
			$d['foto'] = $get->foto;
			$this->load->library('pdf');

			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "pendaftaran-$no_pendaftaran.pdf";
			$this->pdf->load_view('cetak/cetak_formulir_ppdb', $d);
		} else {
			$this->session->set_flashdata("error", "No Pendaftaran Tidak Ditemukan");
			redirect("dashboard");
		}
	}

	function deletes($id)
	{
		$this->db->where('id_ppdb', $id);
		$query               = $this->db->get('sr_ppdb');
		$row                 = $query->row();
		$this->db->delete('sr_ppdb', array('id_ppdb' => $id));
		$this->session->set_flashdata("msg", "<div class='alert alert-danger' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Calon pendaftar Berhasil Dihapus!
	    </div>");
		redirect('ppdb/data');
	}

	function terima($id)
	{
		$data['status'] = '1';//terima
		$this->db->trans_start();
		$this->db->where('id_ppdb', $id);
		$this->db->update('sr_ppdb', $data);
		$this->db->trans_complete();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Data pendaftar telah diterima!
		</div><br/><br/>");
		redirect('ppdb/data');
	}

	function tolak($id)
	{
		$data['status'] = '-1';//terima
		$this->db->trans_start();
		$this->db->where('id_ppdb', $id);
		$this->db->update('sr_ppdb', $data);
		$this->db->trans_complete();
		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Data pendaftar telah diterima!
		</div><br/><br/>");
		redirect('ppdb/data');
	}
}
