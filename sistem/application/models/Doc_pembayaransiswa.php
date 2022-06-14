<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doc_pembayaransiswa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function pembayaran_siswa_bebas($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("select sr_pos_pembayaran.`nama_pos`   AS `nama_pos_keuangan`,
       sr_pembayaran_bebas.`id_pembayaran_bebas` AS `id_pembayaran_bebas`,
       sr_pembayaran_bebas.`id_jenis_pembayaran` AS `id_jenis_pembayaran`,
       sr_pembayaran_bebas.`id_siswa`            AS `id_siswa`,
       sr_pembayaran_bebas.`id_kelas`            AS `id_kelas`,
       `sr_jenis_bayar`.`tingkat`    AS `tahun_ajaran`,
       `sr_jenis_bayar`.`tipe` AS `tipe_pembayaran`,
       sr_pembayaran_bebas.`tagihan`             AS `tagihan`,
       sr_pembayaran_bebas.`bayar`             AS `bayar`,
       `sr_siswa`.`s_nama`                      AS `nama_siswa`,
       `sr_siswa`.`s_nisn`                      AS `nis`,
       `sr_kelas`.`k_keterangan`                AS `nama_kelas`
       FROM sr_pembayaran_bebas 
JOIN sr_jenis_bayar on sr_jenis_bayar.id_jenis_bayar = sr_pembayaran_bebas.id_jenis_pembayaran
join sr_siswa on sr_siswa.idsiswa = sr_pembayaran_bebas.id_siswa   
           join sr_account on sr_account.id_akun = sr_pembayaran_bebas.akun
 join sr_kelas on sr_kelas.idkelas = sr_pembayaran_bebas.id_kelas
join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos

 WHERE tingkat = '$tahun_ajaran' AND tipe = 'Bebas' AND id_siswa = '$id_siswa'");
		return $q;
	}

	public function pembayaran_siswa_bulanan($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("
	select sr_pembayaran_bulanan.`id_pembayaran_bulanan` AS `id_pembayaran_bulanan`,
       sr_pembayaran_bulanan.`id_jenis_pembayaran`   AS `id_jenis_pembayaran`,
       sr_pembayaran_bulanan.`id_kelas`              AS `id_kelas`,
       sr_pembayaran_bulanan.`id_siswa`              AS `id_siswa`,
       sr_pembayaran_bulanan.`tagihan`               AS `tagihan`,
       sr_pembayaran_bulanan.`bayar`                 AS `bayar`,
       sr_pembayaran_bulanan.`bulan`                 AS `bulan`,
       sr_pembayaran_bulanan.`tanggal`               AS `tanggal`,
       sr_pos_pembayaran.`nama_pos`       AS `nama_pos_keuangan`,
       sr_jenis_bayar.`tingkat`        AS `tahun_ajaran`,
       sr_jenis_bayar.`tipe`     AS `tipe_pembayaran`,
       `sr_siswa`.`s_nama`                          AS `nama_siswa`,
       `sr_siswa`.`s_nisn`                          AS `nis`,
       `sr_kelas`.`k_keterangan`                    AS `nama_kelas`
from sr_pembayaran_bulanan
join sr_jenis_bayar on sr_pembayaran_bulanan.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos
join sr_siswa on sr_siswa.idsiswa = sr_pembayaran_bulanan.id_siswa
join sr_kelas on sr_kelas.idkelas = sr_pembayaran_bulanan.id_kelas
 WHERE tingkat = '$tahun_ajaran' AND tipe = 'bulanan' AND id_siswa = '$id_siswa' GROUP BY id_jenis_bayar");
		return $q;
	}

	public function pembayaran_siswa_bulanan_detail($id_jenis_pembayaran,$id_siswa) {
		$q = $this->db->query("select sr_pembayaran_bulanan.`id_pembayaran_bulanan` AS `id_pembayaran_bulanan`,
       sr_pembayaran_bulanan.`id_jenis_pembayaran`   AS `id_jenis_pembayaran`,
       sr_pembayaran_bulanan.`id_kelas`              AS `id_kelas`,
       sr_pembayaran_bulanan.`id_siswa`              AS `id_siswa`,
       sr_pembayaran_bulanan.`tagihan`               AS `tagihan`,
       sr_pembayaran_bulanan.`bayar`                 AS `bayar`,
       sr_pembayaran_bulanan.`bulan`                 AS `bulan`,
       sr_pembayaran_bulanan.`tanggal`               AS `tanggal`,
       sr_pos_pembayaran.`nama_pos`       AS `nama_pos_keuangan`,
       sr_jenis_bayar.`tingkat`        AS `tahun_ajaran`,
       sr_jenis_bayar.`tipe`     AS `tipe_pembayaran`,
       `sr_siswa`.`s_nama`                          AS `nama_siswa`,
       `sr_siswa`.`s_nisn`                          AS `nis`,
       `sr_kelas`.`k_keterangan`                    AS `nama_kelas`

from sr_pembayaran_bulanan
join sr_jenis_bayar on sr_pembayaran_bulanan.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos
join sr_siswa on sr_siswa.idsiswa = sr_pembayaran_bulanan.id_siswa
join sr_kelas on sr_kelas.idkelas = sr_pembayaran_bulanan.id_kelas
 WHERE id_jenis_bayar = '$id_jenis_pembayaran' AND tipe = 'bulanan' AND id_siswa = '$id_siswa'");
		return $q;
	}


	public function jenis_pembayaran_bulanan($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("select sr_pembayaran_bulanan.`id_pembayaran_bulanan` AS `id_pembayaran_bulanan`,
       sr_pembayaran_bulanan.`id_jenis_pembayaran`   AS `id_jenis_pembayaran`,
       sr_pembayaran_bulanan.`id_kelas`              AS `id_kelas`,
       sr_pembayaran_bulanan.`id_siswa`              AS `id_siswa`,
       sr_pembayaran_bulanan.`tagihan`               AS `tagihan`,
       sr_pembayaran_bulanan.`bayar`                 AS `bayar`,
       sr_pembayaran_bulanan.`bulan`                 AS `bulan`,
       sr_pembayaran_bulanan.`tanggal`               AS `tanggal`,
       sr_pos_pembayaran.`nama_pos`       AS `nama_pos_keuangan`,
       sr_jenis_bayar.`tingkat`        AS `tahun_ajaran`,
       sr_jenis_bayar.`tipe`     AS `tipe_pembayaran`,
       `sr_siswa`.`s_nama`                          AS `nama_siswa`,
       `sr_siswa`.`s_nisn`                          AS `nis`,
       `sr_kelas`.`k_keterangan`                    AS `nama_kelas`
from sr_pembayaran_bulanan
join sr_jenis_bayar on sr_pembayaran_bulanan.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos
join sr_siswa on sr_siswa.idsiswa = sr_pembayaran_bulanan.id_siswa
join sr_kelas on sr_kelas.idkelas = sr_pembayaran_bulanan.id_kelas
WHERE tingkat = '$tahun_ajaran' AND tipe = 'bulanan' AND id_siswa = '$id_siswa' GROUP BY id_jenis_pembayaran");
		return $q;
	}

	public function jenis_pembayaran_bebas($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("select sr_pos_pembayaran.`nama_pos`   AS `nama_pos_keuangan`,
       sr_pembayaran_bebas.`id_pembayaran_bebas` AS `id_pembayaran_bebas`,
       sr_pembayaran_bebas.`id_jenis_pembayaran` AS `id_jenis_pembayaran`,
       sr_pembayaran_bebas.`id_siswa`            AS `id_siswa`,
       sr_pembayaran_bebas.`id_kelas`            AS `id_kelas`,
       `sr_jenis_bayar`.`tingkat`    AS `tahun_ajaran`,
       `sr_jenis_bayar`.`tipe` AS `tipe_pembayaran`,
       sr_pembayaran_bebas.`tagihan`             AS `tagihan`,
              sr_pembayaran_bebas.`bayar`             AS `bayar`,
       `sr_siswa`.`s_nama`                      AS `nama_siswa`,
       `sr_siswa`.`s_nisn`                      AS `nis`,
       `sr_kelas`.`k_keterangan`                AS `nama_kelas`
       FROM sr_pembayaran_bebas
JOIN sr_jenis_bayar on sr_jenis_bayar.id_jenis_bayar = sr_pembayaran_bebas.id_jenis_pembayaran
join sr_siswa on sr_siswa.idsiswa = sr_pembayaran_bebas.id_siswa    

           
 join sr_kelas on sr_kelas.idkelas = sr_pembayaran_bebas.id_kelas
join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos
 WHERE tingkat = '$tahun_ajaran' AND tipe = 'bebas' AND id_siswa = '$id_siswa' GROUP BY id_jenis_pembayaran");
		return $q;
	}

	public function pembayaran_bulanan_terakhir($tahun_ajaran,$id_siswa) {

		$q = $this->db->query("select sr_pembayaran_bulanan.`id_pembayaran_bulanan` AS `id_pembayaran_bulanan`,
       sr_pembayaran_bulanan.`id_jenis_pembayaran`   AS `id_jenis_pembayaran`,
       sr_pembayaran_bulanan.`id_kelas`              AS `id_kelas`,
       sr_pembayaran_bulanan.`id_siswa`              AS `id_siswa`,
       sr_pembayaran_bulanan.`tagihan`               AS `tagihan`,
       sr_pembayaran_bulanan.`bayar`                 AS `bayar`,
       sr_pembayaran_bulanan.`bulan`                 AS `bulan`,
       sr_pembayaran_bulanan.`tanggal`               AS `tanggal`,
       sr_pos_pembayaran.`nama_pos`       AS `nama_pos_keuangan`,
       sr_jenis_bayar.`tingkat`        AS `tahun_ajaran`,
       sr_jenis_bayar.`tipe`     AS `tipe_pembayaran`,
       `sr_siswa`.`s_nama`                          AS `nama_siswa`,
       `sr_siswa`.`s_nisn`                          AS `nis`,
       `sr_kelas`.`k_keterangan`                    AS `nama_kelas`
from sr_pembayaran_bulanan
join sr_jenis_bayar on sr_pembayaran_bulanan.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos
join sr_siswa on sr_siswa.idsiswa = sr_pembayaran_bulanan.id_siswa     
    join sr_account on sr_account.id_akun = sr_pembayaran_bulanan.akun
join sr_kelas on sr_kelas.idkelas = sr_pembayaran_bulanan.id_kelas
WHERE tingkat = '$tahun_ajaran' AND tipe = 'bulanan' AND id_siswa = '$id_siswa' AND bayar > 0 ORDER BY tanggal DESC");
		return $q;
	}

	public function pembayaran_bebas_terakhir($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("SELECT * FROM pembayaran_bebas_dt
    join sr_pembayaran_bebas on pembayaran_bebas_dt.id_pembayaran_bebas = sr_pembayaran_bebas.id_pembayaran_bebas
		INNER JOIN sr_jenis_bayar ON sr_pembayaran_bebas.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
		INNER JOIN sr_pos_pembayaran ON sr_jenis_bayar.id_pos =sr_pos_pembayaran.id_pos WHERE tingkat = '$tahun_ajaran' AND tipe = 'bebas' AND id_siswa = '$id_siswa'");
		return $q;
	}

	public function daftar_pembayaran_bulanan($tahun_ajaran,$query) {
		if(!empty($query)) {
			$query = "AND (s_nisn LIKE '%$query%' OR s_nama LIKE '%$query%' OR k_keterangan LIKE '%$query%')";
		}
		$q = $this->db->query("select sr_pembayaran_bulanan.`id_pembayaran_bulanan` AS `id_pembayaran_bulanan`,
       sr_pembayaran_bulanan.`id_jenis_pembayaran`   AS `id_jenis_pembayaran`,
       sr_pembayaran_bulanan.`id_kelas`              AS `id_kelas`,
       sr_pembayaran_bulanan.`id_siswa`              AS `id_siswa`,
       sr_pembayaran_bulanan.`tagihan`               AS `tagihan`,
       sr_pembayaran_bulanan.`bayar`                 AS `bayar`,
       sr_pembayaran_bulanan.`bulan`                 AS `bulan`,
       sr_pembayaran_bulanan.`tanggal`               AS `tanggal`,
       sr_pos_pembayaran.`nama_pos`       AS `nama_pos_keuangan`,
       sr_jenis_bayar.`tingkat`        AS `tahun_ajaran`,
       sr_jenis_bayar.`tipe`     AS `tipe_pembayaran`,
       `sr_siswa`.`s_nama`                          AS `nama_siswa`,
       `sr_siswa`.`s_nisn`                          AS `nis`,
       `sr_kelas`.`k_keterangan`                    AS `nama_kelas`
from sr_pembayaran_bulanan
join sr_jenis_bayar on sr_pembayaran_bulanan.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos
join sr_siswa on sr_siswa.idsiswa = sr_pembayaran_bulanan.id_siswa       
    join sr_account on sr_account.id_akun = sr_pembayaran_bebas.akun

    
join sr_kelas on sr_kelas.idkelas = sr_pembayaran_bulanan.id_kelas WHERE tingkat = '$tahun_ajaran' AND tipe = 'bulanan' AND bayar > 0 $query");
		return $q;
	}

	public function daftar_pembayaran_bebas($tahun_ajaran,$query) {
		if(!empty($query)) {
			$query = "AND (nis LIKE '%$query%' OR nama_siswa LIKE '%$query%' OR nama_kelas LIKE '%$query%')";
		}
		$q = $this->db->query("SELECT * FROM pembayaran_bebas_dt 
		INNER JOIN sr_pembayaran_bebas ON pembayaran_bebas_dt.id_pembayaran_bebas = sr_pembayaran_bebas.id_pembayaran_bebas 
		INNER JOIN sr_siswa ON pembayaran_bebas.id_siswa = sr_siswa.idsiswa
		INNER JOIN sr_kelas ON pembayaran_bebas.id_kelas = sr_kelas.idkelas
		INNER JOIN mst_jenis_pembayaran ON pembayaran_bebas.id_jenis_pembayaran = mst_jenis_pembayaran.id_jenis_pembayaran 
		INNER JOIN mst_pos_keuangan ON mst_jenis_pembayaran.id_pos_keuangan = mst_pos_keuangan.id_pos_keuangan WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bebas' $query");
		return $q;
	}


	public function pembayaran_bulanan_terakhir_umum($tahun_ajaran) {
		$q = $this->db->query("select sr_pembayaran_bulanan.`id_pembayaran_bulanan` AS `id_pembayaran_bulanan`,
       sr_pembayaran_bulanan.`id_jenis_pembayaran`   AS `id_jenis_pembayaran`,
       sr_pembayaran_bulanan.`id_kelas`              AS `id_kelas`,
       sr_pembayaran_bulanan.`id_siswa`              AS `id_siswa`,
       sr_pembayaran_bulanan.`tagihan`               AS `tagihan`,
       sr_pembayaran_bulanan.`bayar`                 AS `bayar`,
       sr_pembayaran_bulanan.`bulan`                 AS `bulan`,
       sr_pembayaran_bulanan.`tanggal`               AS `tanggal`,
       sr_pos_pembayaran.`nama_pos`       AS `nama_pos_keuangan`,
       sr_jenis_bayar.`tingkat`        AS `tahun_ajaran`,
       sr_jenis_bayar.`tipe`     AS `tipe_pembayaran`,
       `sr_siswa`.`s_nama`                          AS `nama_siswa`,
       `sr_siswa`.`s_nisn`                          AS `nis`,
       `sr_kelas`.`k_keterangan`                    AS `nama_kelas`
from sr_pembayaran_bulanan
join sr_jenis_bayar on sr_pembayaran_bulanan.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos
join sr_siswa on sr_siswa.idsiswa = sr_pembayaran_bulanan.id_siswa
join sr_kelas on sr_kelas.idkelas = sr_pembayaran_bulanan.id_kelas WHERE tingkat = '$tahun_ajaran' AND tipe = 'bulanan' AND bayar > 0 ORDER BY tanggal DESC LIMIT 5");
		return $q;
	}

	public function pembayaran_bebas_terakhir_umum($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM pembayaran_bebas_dt 
		INNER JOIN pembayaran_bebas ON pembayaran_bebas_dt.id_pembayaran_bebas = pembayaran_bebas.id_pembayaran_bebas 
		INNER JOIN sr_siswa ON pembayaran_bebas.id_siswa = sr_siswa.idsiswa
		INNER JOIN sr_kelas ON pembayaran_bebas.id_kelas = sr_kelas.idkelas
		INNER JOIN mst_jenis_pembayaran ON pembayaran_bebas.id_jenis_pembayaran = mst_jenis_pembayaran.id_jenis_pembayaran 
		INNER JOIN mst_pos_keuangan ON mst_jenis_pembayaran.id_pos_keuangan = mst_pos_keuangan.id_pos_keuangan WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bebas' LIMIT 5");
		return $q;
	}

}
