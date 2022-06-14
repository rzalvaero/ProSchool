<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('core');
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
		$data['page'] 	 	= 'buku';
		$data['rak']		= $this->core->selectrak();
		$data['kategori']	= $this->core->selectbuku();
		$data['buku']    	= $this->db->query("SELECT * FROM sr_perpusbuku")->result_array();
		$this->load->view('template', $data);
	}

	public function bukudetail($value = '')
	{
		$data['detail']  = $this->db->query("SELECT SB.* , SK.nama_kategori, SR.nama_rak FROM sr_perpusbuku SB
		LEFT JOIN sr_perpuskategori SK on SK.id_kategori = SB.id_kategori
		LEFT JOIN sr_perpusrak SR on SR.id_rak = SB.id_rak
		WHERE SB.id_buku='$value'")->result_array();
		$data['page']	= 'buku_detail';
		$this->load->view('template', $data);
	}

	public function transaksi()
	{
		if ($this->session->userdata('type_users') == 'SISWA') {
			/* $data['pinjam'] = $this->db->query(
				"SELECT DISTINCT `pinjam_id`, `anggota_id`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM sr_perpuspinjam WHERE status = 'Dipinjam' 
				AND anggota_id = ? ORDER BY pinjam_id DESC",
				array($this->session->userdata('id'))
			); */
			$idsiswa = $this->session->userdata('id');
			$data['pinjam'] = $this->db->query("SELECT DISTINCT SS.s_nama ,SP.pinjam_id, SP.anggota_id, SP.status, SP.tgl_pinjam, SP.lama_pinjam, SP.tgl_balik, SP.tgl_kembali FROM sr_perpuspinjam SP LEFT JOIN sr_siswa SS on SS.idsiswa = SP.anggota_id WHERE  SS.idsiswa='$idsiswa' AND SP.status = 'Dipinjam' ORDER BY SP.pinjam_id DESC")->result_array();
		} else {
			$data['pinjam'] = $this->db->query("SELECT DISTINCT SS.s_nama ,SP.pinjam_id, SP.anggota_id, SP.status, SP.tgl_pinjam, SP.lama_pinjam, SP.tgl_balik, SP.tgl_kembali FROM sr_perpuspinjam SP LEFT JOIN sr_siswa SS on SS.idsiswa = SP.anggota_id WHERE SP.status = 'Dipinjam' ORDER BY SP.pinjam_id DESC")->result_array();
		}
		$data['user'] = $this->core->get_table('sr_siswa');
		$data['buku'] =  $this->db->query("SELECT * FROM sr_perpusbuku ORDER BY id_buku DESC")->result_array();
		$data['nop'] = $this->core->buat_kode('sr_perpuspinjam', 'PJ', 'id_pinjam', 'ORDER BY id_pinjam DESC LIMIT 1');
		$data['page']	= 'buku_transaksi';
		$this->load->view('template', $data);
	}

	public function kembali()
	{
		$id = $this->session->userdata('id');
		$data['page'] 	 	= 'buku_kembali';
		if ($this->session->userdata('type_users') == 'SISWA') {
			/* $this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `anggota_id`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tbl_pinjam WHERE anggota_id = ? AND status = 'Di Kembalikan' 
				ORDER BY id_pinjam DESC", array($this->session->userdata('id'))); */
			$idsiswa = $this->session->userdata('id');
			$data['pinjam'] = $this->db->query("SELECT DISTINCT SS.s_nama ,SP.pinjam_id, SP.anggota_id, SP.status, 
			SP.tgl_pinjam, SP.lama_pinjam, SP.tgl_balik, SP.tgl_kembali FROM sr_perpuspinjam SP
			LEFT JOIN sr_siswa SS on SS.idsiswa = SP.anggota_id WHERE SS.idsiswa='$idsiswa' AND SP.status = 'Di Kembalikan' 
			ORDER BY SP.pinjam_id DESC")->result_array();
		} else {
			$data['pinjam'] = $this->db->query("SELECT DISTINCT SS.s_nama ,SP.pinjam_id, SP.anggota_id, SP.status, 
			SP.tgl_pinjam, SP.lama_pinjam, SP.tgl_balik, SP.tgl_kembali FROM sr_perpuspinjam SP
			LEFT JOIN sr_siswa SS on SS.idsiswa = SP.anggota_id WHERE SP.status = 'Di Kembalikan' 
			ORDER BY SP.pinjam_id DESC")->result_array();
		}
		$this->load->view('template',$data);
	}
	
	public function buku()
	{
		$id = $this->input->post('kode_buku');
		$row = $this->db->query("SELECT * FROM sr_perpusbuku WHERE buku_id ='$id'");
		//die(print_r($row));
		if ($row->num_rows() > 0) {
			$tes = $row->row();
			$item = array(
				'id'      => $id,
				'qty'     => 1,
				'price'   => '0',
				'name'    => $tes->title,
				'options' => array('isbn' => $tes->isbn, 'thn' => $tes->thn_buku, 'penerbit' => $tes->penerbit)
			);
			$cart = array($item);
			$this->session->set_userdata('cart', serialize($cart));

			//if(!$this->session->has_userdata('cart')) {
			//$cart = array($item);
			//$this->session->set_userdata('cart', serialize($cart));
			//} else {
			//$index = $id;
			//	$cart = array_values(unserialize($this->session->userdata('cart')));
			//	if($index == -1) {
			///		array_push($cart, $item);
			//	$this->session->set_userdata('cart', serialize($cart));
			//} else {
			//	$cart[$index]['quantity']++;
			//		$this->session->set_userdata('cart', serialize($cart));
			//	}
			//}
		} else {
		}
	}

	public function prosespinjam()
	{
		$post = $this->input->post();
		//die(print_r($post));
		if (!empty($post['tambah'])) {

			$tgl = $post['tgl'];
			$tgl2 = date('Y-m-d', strtotime('+' . $post['lama'] . ' days', strtotime($tgl)));

			$hasil_cart = array_values(unserialize($this->session->userdata('cart')));
			foreach ($hasil_cart as $isi) {
				$data[] = array(
					'pinjam_id' => htmlentities($post['nopinjam']),
					'anggota_id' => htmlentities($post['anggota_id']),
					'buku_id' => $isi['id'],
					'status' => 'Dipinjam',
					'tgl_pinjam' => htmlentities($post['tgl']),
					'lama_pinjam' => htmlentities($post['lama']),
					'tgl_balik'  => $tgl2,
					'tgl_kembali'  => '0',
				);
			}
			$total_array = count($data);
			if ($total_array != 0) {
				$this->db->insert_batch('sr_perpuspinjam', $data);

				$cart = array_values(unserialize($this->session->userdata('cart')));
				for ($i = 0; $i < count($cart); $i++) {
					unset($cart[$i]);
					// $this->session->unset_userdata($cart[$i]);
					// $this->session->unset_userdata('cart');
				}
			}

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('buku/transaksi'));
		}

		if ($this->input->get('pinjam_id')) {
			$this->core->delete_table('sr_perpuspinjam', 'pinjam_id', $this->input->get('pinjam_id'));
			$this->core->delete_table('tbl_denda', 'pinjam_id', $this->input->get('pinjam_id'));

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p>  Hapus Transaksi Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('buku/transaksi'));
		}

		if ($this->input->get('kembali')) {
			$id = $this->input->get('kembali');
			$pinjam = $this->db->query("SELECT  * FROM sr_perpuspinjam WHERE pinjam_id = '$id'");

			foreach ($pinjam->result_array() as $isi) {
				$pinjam_id = $isi['pinjam_id'];
				$denda = $this->db->query("SELECT * FROM sr_perpusdenda WHERE pinjam_id = '$pinjam_id'");
				$jml = $this->db->query("SELECT * FROM sr_perpuspinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();
				if ($denda->num_rows() > 0) {
					$s = $denda->row();
					echo $s->denda;
				} else {
					$date1 = date('Ymd');
					$date2 = preg_replace('/[^0-9]/', '', $isi['tgl_balik']);
					$diff = $date2 - $date1;
					if ($diff >= 0) {
						$harga_denda = 0;
						$lama_waktu = 0;
					} else {
						$dd = $this->M_Admin->get_tableid_edit('sr_perpusbiaya', 'stat', 'Aktif');
						$harga_denda = $jml * ($dd->harga_denda * abs($diff));
						$lama_waktu = abs($diff);
					}
				}
			}

			$data = array(
				'status' => 'Di Kembalikan',
				'tgl_kembali'  => date('Y-m-d'),
			);

			$total_array = count($data);
			if ($total_array != 0) {
				$this->db->where('pinjam_id', $this->input->get('kembali'));
				$this->db->update('sr_perpuspinjam', $data);
			}

			$data_denda = array(
				'pinjam_id' => $this->input->get('kembali'),
				'denda' => $harga_denda,
				'lama_waktu' => $lama_waktu,
				'tgl_denda' => date('Y-m-d'),
			);
			$this->db->insert('sr_perpusdenda', $data_denda);

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Pengembalian Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('buku/transaksi'));
		}
	}

	public function buku_list()
	{
	?>
		<div class="table-responsive">
			<table class="table display data-table text-nowrap">
				<thead>
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Penerbit</th>
						<th>Tahun</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach (array_values(unserialize($this->session->userdata('cart'))) as $items) { ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $items['name']; ?></td>
							<td><?= $items['options']['penerbit']; ?></td>
							<td><?= $items['options']['thn']; ?></td>
							<td style="width:17%">
								<a href="javascript:void(0)" id="delete_buku<?= $no; ?>" data_<?= $no; ?>="<?= $items['id']; ?>" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<script>
							$(document).ready(function() {
								$("#delete_buku<?= $no; ?>").click(function(e) {
									$.ajax({
										type: "POST",
										url: "<?php echo base_url('transaksi/del_cart'); ?>",
										data: 'kode_buku=' + $(this).attr("data_<?= $no; ?>"),
										beforeSend: function() {},
										success: function(html) {
											$("#tampil").html(html);
										}
									});
								});
							});
						</script>
					<?php $no++;
					} ?>
				</tbody>
			</table>
		</div>
		<?php foreach (array_values(unserialize($this->session->userdata('cart'))) as $items) { ?>
			<input type="hidden" value="<?= $items['id']; ?>" name="idbuku[]">
		<?php } ?>
		<div id="tampil"></div>
	<?php
	}

	public function result()
	{

		$user = $this->core->get_tableid_edit('sr_siswa', 'idsiswa', $this->input->post('kode_anggota'));
		//die(print_r($user));
		error_reporting(0);
		if ($user->s_nama != null) {
			echo '<table class="table table-striped">
						<tr>
							<td>Nama Anggota</td>
							<td>:</td>
							<td>' . $user->s_nama . '</td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td>:</td>
							<td>' . $user->s_telepon . '</td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td>:</td>
							<td>' . $user->s_email . '</td>
						</tr>
						
					</table>';
		} else {
			echo 'Anggota Tidak Ditemukan !';
		}
	}

	function add()
	{
		$kategori 	  			= $this->input->post('kategori');
		$rak 	  				= $this->input->post('rak');
		$isbn 	      			= $this->input->post('isbn');
		$jumlah 				= $this->input->post('jumlah');
		$tahun 	  				= $this->input->post('tahun');
		$judul 	      			= $this->input->post('judul');
		$pengarang 				= $this->input->post('pengarang');
		$penerbit 				= $this->input->post('penerbit');
		$buku_id 				= $this->core->buat_kode('sr_perpusbuku', 'BK', 'id_buku', 'ORDER BY id_buku DESC LIMIT 1');

		if (empty($kategori) || empty($rak) || empty($jumlah) || empty($isbn)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('buku');
		} else {
			$data = array(
				'buku_id'		=> $buku_id,
				'id_kategori'	=> $kategori,
				'id_rak'		=> $rak,
				'isbn'			=> $isbn,
				'jml'			=> $jumlah,
				'thn_buku'		=> $tahun,
				'title'			=> $judul,
				'pengarang'		=> $pengarang,
				'penerbit'		=> $penerbit
			);
			$this->core->input_data($data, 'sr_perpusbuku');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Selamat, Buku telah terdaftar!
		</div>");
			redirect('buku');
		}
	}

	function add_rak()
	{
		$rak 	  				= $this->input->post('rak');
		if (empty($rak)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('buku/rak');
		} else {
			$data = array(
				'nama_rak'		=> $rak
			);
			$this->core->input_data($data, 'sr_perpusrak');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Selamat, Rak telah terdaftar!
		</div>");
			redirect('buku/rak');
		}
	}

	function add_kategori()
	{
		$jenis_buku 	  				= $this->input->post('jenis_buku');
		if (empty($jenis_buku)) {
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
			Mohon mengisi semua input!
			</div>");
			redirect('buku/rak');
		} else {
			$data = array(
				'nama_kategori'		=> $jenis_buku
			);
			$this->core->input_data($data, 'sr_perpuskategori');
			$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Selamat, Kategori telah terdaftar!
		</div>");
			redirect('buku/kategori');
		}
	}

	public function kategori()
	{
		$data['page'] 	 	= 'buku_kategori';
		$data['rak']		= $this->core->selectrak();
		$data['kategori']	= $this->core->selectbuku();
		$data['buku']    	= $this->db->query("SELECT * FROM sr_perpuskategori")->result_array();
		$this->load->view('template', $data);
	}

	public function rak()
	{
		$data['page'] 	 	= 'buku_rak';
		$data['rak']		= $this->core->selectrak();
		$data['kategori']	= $this->core->selectbuku();
		$data['buku']    	= $this->db->query("SELECT * FROM sr_perpusrak")->result_array();
		$this->load->view('template', $data);
	}

	public function denda()
	{
		$data['page'] 	 	= 'buku_denda';
		$data['buku']    	= $this->db->query("SELECT * FROM sr_perpusdenda")->result_array();
		//denda
		$id 	= "1";
		$where  = array('id_biaya_denda' => $id);
		$data['setting'] = $this->core->edit($where, 'sr_perpusbiaya')->result();
		$this->load->view('template', $data);
	}

	function delete_buku($id)
	{
		$where = array('id_buku' => $id);
		$this->core->deletes($where, 'sr_perpusbuku');
		$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Selamat, data Peminjam telah dihapus!
		</div>");
		redirect('buku/transaksi');
	}

	function delete_pinjam($value=''){
		$where = array('pinjam_id' => $value);
		$this->core->deletes($where,'sr_perpuspinjam');
		$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Selamat, data Peminjam telah dihapus!
		</div>");
		redirect('buku/transaksi');
	}

	function delete_rak($id)
	{
		$where = array('id_rak' => $id);
		$this->core->deletes($where, 'sr_perpusrak');
		$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Selamat, data Rak telah dihapus!
		</div>");
		redirect('buku/rak');
	}

	function delete_kategori($id)
	{
		$where = array('id_kategori' => $id);
		$this->core->deletes($where, 'sr_perpuskategori');
		$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' style='font-size: 10px; margin:-15px 0px 15px 0px;'>
		Selamat, data Kategori telah dihapus!
		</div>");
		redirect('buku/kategori');
	}

	function denda_update()
	{
		$id = $this->input->post('id');
		$tanggal = $this->input->post('tanggal');
		$denda = $this->input->post('denda');
		$data = array(
			'tgl_tetap' 	=> $tanggal,
			'harga_denda' 	=> $denda
		);
		$where = array(
			'id_biaya_denda' => $id
		);
		$this->core->update($where, $data, 'sr_perpusbiaya');


		$this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert' style='font-size: 10px; margin:15px 0px -15px 0px;'>
		Success update Denda!
		</div><br/>");
		redirect('buku/denda');
	}
}
