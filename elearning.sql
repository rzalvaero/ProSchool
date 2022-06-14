-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2022 pada 12.04
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `username`, `password`) VALUES
(1, 'Administrator', 'admin@admin.com', 'admin', '$2y$10$8SoPqIecyMythHypIhN90OUrIFpvazbImXIgBcKZQenn9SVcD47fS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_alasan`
--

CREATE TABLE IF NOT EXISTS `cms_alasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cms_alasan`
--

INSERT INTO `cms_alasan` (`id`, `title`, `desc`) VALUES
(1, 'Akreditasi \'A\'', 'Mendapat nilai Akreditasi \'A\' untuk seluruh sekolah yang berada di bawah naungan Yayasan DesaTecch Nusantara'),
(2, 'Kemajuan Tekhnologi', 'Di dukung Infrastruktur Tekhnologi yang Mutakhir untuk menunjang Peserta Didik'),
(3, 'Telah Bersertifikat', 'Sistem Manajemen Sekolah telah mendapat sertifikat ISO 9001:2015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_beasiswa`
--

CREATE TABLE IF NOT EXISTS `cms_beasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `syarat1` varchar(150) NOT NULL,
  `syarat2` varchar(150) NOT NULL,
  `syarat3` varchar(150) NOT NULL,
  `syarat4` varchar(150) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cms_beasiswa`
--

INSERT INTO `cms_beasiswa` (`id`, `nama`, `desc`, `syarat1`, `syarat2`, `syarat3`, `syarat4`, `gambar`) VALUES
(1, 'BEASISWA Hafiz Al-Qur’an', 'Sekolah kami telah membuka pendaftaran BEASISWA Hafiz Al-Qur’an loh, Program ini didirikan untuk menunjang dan menganalisa minat terhadap Al-Qur\'an ', 'Sertifikat hafalan 10 Juz', 'Membuat Essai tentang diri sendiri dan alasan memilih program studi pilihan 1', 'Rata-rata nilai rapor semester 1-5, di atas 8.00', 'Pendaftaran dan pengiriman berkas dilakukan melalui website', ''),
(2, 'BEASISWA Aperti BUMN ', 'Dinaungi oleh Aliansi Perguruan Tinggi Swasta Berbasis Badan Usaha Milik Negara (APERTI BUMN) . Beasiswa diberikan untuk siswa berprestasi se - Indonesia berupa beasiswa pendidikan.⁣', 'Sertifikat hafalan 10 Juz', 'Membuat Essai tentang diri sendiri dan alasan memilih program studi pilihan 1', 'Rata-rata nilai rapor semester 1-5, di atas 8.00', 'Pendaftaran dan pengiriman berkas dilakukan melalui website', ''),
(3, 'BEASISWA PT BCA Finance', '\nPT. BCA Finance mengadakan Program Beasiswa BCA Finance Peduli 2022 dengan memberikan:\n- Bantuan dana pendidikan sebesar Rp 3.500.000,- per semester\n- Pelatihan skill relevan untuk penerima Beasiswa Semester 8 sebagai persiapan memasuki dunia kerja.', ' Melampirkan Softcopy Surat Keterangan Tidak Mampu (SKTM) dari Kelurahan sesuai dengan daerah asal pada KTP.', 'Melampirkan Softcopy tagihan rekening listrik 2 bulan terakhir, sesuai dengan daerah asal pada KTP.', 'Tidak pernah terlibat dalam tindak kasus pidana / kasus perdata, serta penyalahgunaan NAPZA (narkotika, psikotropika dan zat adiktif).', 'IPK minimum 3,20; IPS terakhir 3,00 dan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_gambar`
--

CREATE TABLE IF NOT EXISTS `cms_gambar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_introduction`
--

CREATE TABLE IF NOT EXISTS `cms_introduction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` text NOT NULL,
  `gambar` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cms_introduction`
--

INSERT INTO `cms_introduction` (`id`, `deskripsi`, `gambar`) VALUES
(1, 'Yayasan Masjid PB. Soedirman, Cijantung Jakarta Timur adalah salah satu yayasan Islam di Indonesia. Didirikan pada tahun 1966, dengan Akte Notaris Nomor: 127-II-1966 tanggal 21 Februari 1966. Cita-cita awal berdirinya yayasan ini adalah untuk mewujudkan sebuah bangunan masjid sebagai sarana ibadah umat Islam Cijantung dan sekitarnya, khususnya para perwira TNI AD dan keluarganya. Dengan bantuan Gubernur DKI Jakarta Letjen. (Purn.) Tjokropranolo (waktu itu), maka dibangunlah sebuah bangunan masjid, yang kemudian diberi nama ”Masjid Panglima Besar Jenderal Soedirman”. Peletakan batu pertama dilakukan oleh Gubernur DKI Jakarta, Tjokropranolo, pada 30 Nopember 1979, dan diresmikan penggunaannya oleh Presiden RI Jenderal TNI AD. (Purn) H.M. Soeharto, pada hari Kamis, 12 Nopember 1981.\n<br><br>\nDalam perjalan waktu sampai saat ini, Mengingat belum tersedianya sekolah sebagai sarana pendidikan di Cijantung, maka tahun 1969 mulai dirintis berdirinya sekolah-sekolah dari TK, SD, SMEP, SMP, SMA, STM, SMEA, dan PGA 4 Tahun. Semua sekolah yang dikelolanya sudah memperoleh akreditasi ‘A’ Plus dari Badan Akreditasi Sekolah/Provinsi (BAS/P).\n\n', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_profil`
--

CREATE TABLE IF NOT EXISTS `cms_profil` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `desc` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cms_profil`
--

INSERT INTO `cms_profil` (`id`, `desc`, `gambar`) VALUES
(1, 'Yayasan Pendidikan Assalam Kemiri merupakan sebuah lembaga Yang Mempunyai 3 Instansi yaitu PON-PES Tahfidz Assalam, SMP Plus Mutiara Bangsa kemiri, SMK Mutiara Bangsa Kemiri Yayasan Pendidikan assalam didirikan pada tahun 2008 bertempat di desa Kemiri, Tangerang, Banten. Tepatnya di Kampus Biru.\n<br><br>\nSecara usia, Yayan Pendidikan Assalam Masih Baru. Tetapi semangat, visi, dan misinya mengantarkan menjadi lembaga yang cepat berkembang dan cepat beradaptasi baik dari sisi program maupun sistem yang dibangun.\n<br><br>\nMoto Yayasan Pendidikan Assalam adalah \"Senyum, Sapa, Salam\", dimana Yayasan Pendidikan Assalam memandang pembangunan akhlak adalah prioritas utama dan nantinya wajib diikuti kemampuan akademiknya. Targetnya adalah lulusan Yayasan Pendidikan Assalam nantinya menjadi insan berakhlak yang mempunyai banyak prestasi.\n<br><br>\nBerikut program unggulan Yayasan Pendidikan Assalam yaitu\n<br><br>\nProgram penguatan akhlak, dimana akhlak yang baik menjadi dasar dalam semua pengembangan program yang ada\nLancar Membaca Alqur\'an melalui program Qiro\'ati\nProgram tahfidz\nProgram Empatunggulan Learning meliputi penguatan Bahasa Mandarin, Bahasa Inggris, Bahasa Jepang dan Bahasa Arab\nProgram lancar membaca kitab kuning dengan metode yang sangat mudah untuk diterapkan, yaitu metode Al Miftah\nProgram Pendampingan olimpiade, dimana seluruh siswa yang berkeinginan khusus di bidang pelajaran tertentu diberikan pelatihan lebih agar bisa mengikuti berbagai kejuaraan dan olimpiade.', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_slider`
--

CREATE TABLE IF NOT EXISTS `cms_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagline` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cms_slider`
--

INSERT INTO `cms_slider` (`id`, `tagline`, `title`, `gambar`) VALUES
(2, 'Raih Mimpimu', 'Belajar Dari Sekolah dengan pembelajaran Terbaik', ''),
(3, 'Kami senang melihat Anda', 'Jelajahi lulusan kami yang brilian', ''),
(4, 'Tujuan pendidikan', 'Bergabunglah dengan sekolah terbaik untuk putra putri anda', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_ulasan`
--

CREATE TABLE IF NOT EXISTS `cms_ulasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cms_ulasan`
--

INSERT INTO `cms_ulasan` (`id`, `nama`, `kelas`, `desc`) VALUES
(1, 'Druna Patricia', 'XI Multimedia 1A', 'Bagus banget sekolahnya, muridnya baik, dan pengajarnya gaul gaul'),
(2, 'Pina Karambol', 'X Administrasi 2B', 'Bagus banget sekolahnya, muridnya baik, dan pengajarnya gaul gaul'),
(3, 'Steven Muhammad', 'XII IPA 3A', 'Bagus banget sekolahnya, muridnya baik, dan pengajarnya gaul gaul'),
(4, 'Ade Alfarezy', 'VII - 1', 'Bagus banget sekolahnya, muridnya baik, dan pengajarnya gaul gaul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_visimisi`
--

CREATE TABLE IF NOT EXISTS `cms_visimisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cms_visimisi`
--

INSERT INTO `cms_visimisi` (`id`, `desc`) VALUES
(1, 'VISI :\n<br>\nMenjadilembagadakwahdanpendidikanislamyang terkemukadan modern dalammencerahkandanmencerdaskankehidupanbangsagunamembentukmasyarakat yang beriman, berilmu, beramal, danbertakwamenujuizzulislamwalmuslim. <br><br>\n\nMISI :\n<br>\nMembinauntukmengembangkandakwahdanpendidikanislamdalamarti yang seluas-luasnyadengansemangatamarma’rufnahyimunkar.\nMengawaldanmembelaaqidahislamiyahberdasarkan Al-Qur’an danSunnahRosul.\nMenegakkannilai-nilaikemanusiaansesuaiajaranislam demi kesejahteraanumatdanbangsalahirdanbatin.\nMeningkatkankwalitas SDM gunamewujudkanmasyarakat yang beriman, berilmu, beramal, danbertakwamelaluipengembangankegiatan yang meningkatkan IMTAQ dan IPTEK sesuaidenganaqidah Islam.\nTUJUAN :\n<br>\nMendidiksiswa/i untukmenjadikaderpembangunanakhlak\nMendidiksiswa/i agar menjadianak yang berjiwabersihdansuci\nMendidiksiswa/i agar bisamenjadimisiislamdikemuadianhari\n \n<br><br>\nCITA - CITA :\n<br>\nMembinadanmengembangkanpendidikanislamdalamarti yang seluas-luasnya.\nMeningkatkanmutudanmenyebarkansyiarislammelaluipendidikan, dakwah, bimbinganibadadanseni.\nMembentukmasyarakat yang berilmu, beramal, danbertakwakepadaAlloh SWT. Serta mencintaiBangsadanNegara Republik Indonesia.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `das_kategori`
--

CREATE TABLE IF NOT EXISTS `das_kategori` (
  `id_das_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_dana` varchar(50) DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `dana` double DEFAULT NULL,
  `sisa_dana` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_das_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `das_kategori`
--

INSERT INTO `das_kategori` (`id_das_kategori`, `jenis_dana`, `tahun_ajaran`, `dana`, `sisa_dana`, `tanggal`) VALUES
(1, 'baksos', '2011', 200000, 200000, '2022-04-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `das_sumber_dana`
--

CREATE TABLE IF NOT EXISTS `das_sumber_dana` (
  `id_das_sumber_dana` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_dana_masuk` varchar(100) DEFAULT NULL,
  `jumlah_dana` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_das_sumber_dana`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `das_user`
--

CREATE TABLE IF NOT EXISTS `das_user` (
  `id_das_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_das` int(11) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `total_terima` double DEFAULT NULL,
  `sisa_saldo` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `no_das` varchar(25) NOT NULL,
  `status_das_user` char(1) NOT NULL DEFAULT '0',
  `open` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_das_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `das_user_bendahara`
--

CREATE TABLE IF NOT EXISTS `das_user_bendahara` (
  `id_das_user_bendahara` int(11) NOT NULL AUTO_INCREMENT,
  `id_das_bendahara` int(11) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `total_terima` double DEFAULT NULL,
  `sisa_saldo` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `no_das` varchar(25) DEFAULT NULL,
  `status_das_user` char(1) DEFAULT '0',
  PRIMARY KEY (`id_das_user_bendahara`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `das_user_bendahara_output`
--

CREATE TABLE IF NOT EXISTS `das_user_bendahara_output` (
  `id_das_user_bendahara_output` int(11) NOT NULL AUTO_INCREMENT,
  `id_das_user_bendahara` int(11) DEFAULT NULL,
  `jenis_das` varchar(15) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ada_nota` char(1) DEFAULT '0',
  `ada_bku` char(1) DEFAULT '0',
  PRIMARY KEY (`id_das_user_bendahara_output`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `das_user_output`
--

CREATE TABLE IF NOT EXISTS `das_user_output` (
  `id_das_user_output` int(11) NOT NULL AUTO_INCREMENT,
  `id_das_user` int(11) DEFAULT NULL,
  `jenis_das` varchar(50) NOT NULL,
  `jumlah` double DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ada_nota` char(1) NOT NULL DEFAULT '0',
  `ada_bku` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_das_user_output`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_inventarisasi`
--

CREATE TABLE IF NOT EXISTS `det_inventarisasi` (
  `id_det_inventarisasi` varchar(50) NOT NULL,
  `id_inventarisasi` varchar(50) DEFAULT NULL,
  `id_pengajuan` varchar(50) DEFAULT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_inventarisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_pengadaan`
--

CREATE TABLE IF NOT EXISTS `det_pengadaan` (
  `id_det_pengadaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengadaan` varchar(50) DEFAULT NULL,
  `nama_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_pengadaan` double DEFAULT NULL,
  `harga_realisasi` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  PRIMARY KEY (`id_det_pengadaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_pengelolaan`
--

CREATE TABLE IF NOT EXISTS `det_pengelolaan` (
  `id_det_pengelolaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengelolaan` varchar(50) DEFAULT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_pengelolaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_penghapusan`
--

CREATE TABLE IF NOT EXISTS `det_penghapusan` (
  `id_det_penghapusan` int(50) NOT NULL AUTO_INCREMENT,
  `id_penghapusan` varchar(50) DEFAULT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `jenis_hapus` varchar(50) DEFAULT NULL,
  `nilai_asset` double DEFAULT NULL,
  PRIMARY KEY (`id_det_penghapusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_perencanaan`
--

CREATE TABLE IF NOT EXISTS `det_perencanaan` (
  `id_det_perencanaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_perencanaan` varchar(50) DEFAULT NULL,
  `id_kategori_asset` varchar(50) DEFAULT NULL,
  `id_jenis_asset` varchar(50) DEFAULT NULL,
  `nama_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  PRIMARY KEY (`id_det_perencanaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_bebas_dt`
--

CREATE TABLE IF NOT EXISTS `pembayaran_bebas_dt` (
  `id_pembayaran_bebas_dt` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembayaran_bebas` int(11) DEFAULT NULL,
  `bayar` float DEFAULT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_pembayaran_bebas_dt`),
  KEY `id_pembayaran_bebas` (`id_pembayaran_bebas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_bebas_dt`
--

INSERT INTO `pembayaran_bebas_dt` (`id_pembayaran_bebas_dt`, `id_pembayaran_bebas`, `bayar`, `tanggal`) VALUES
(1, 78, 200000, '2022-05-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_absen`
--

CREATE TABLE IF NOT EXISTS `sr_absen` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `tahun_ajaran` varchar(50) DEFAULT NULL,
  `keterangan` enum('SAKIT','IZIN','ALPA') DEFAULT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  `tanggal_absen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_absen`
--

INSERT INTO `sr_absen` (`id_absen`, `idusers`, `type`, `tahun_ajaran`, `keterangan`, `alasan`, `tanggal_absen`) VALUES
(118, '11', 'SISWA', '2021/2022-2', NULL, NULL, '2022-04-01'),
(119, '11', 'SISWA', '2021/2022-2', NULL, NULL, '2022-04-11'),
(122, '11', 'SISWA', '2021/2022-2', NULL, NULL, '2022-04-21'),
(123, '11', 'SISWA', '2021/2022-2', NULL, NULL, '2022-04-20'),
(124, '1', 'GURU', '2021/2022-2', NULL, NULL, '2022-04-20'),
(125, '1', 'GURU', '2021/2022-2', NULL, NULL, '2022-04-21'),
(126, '1', 'GURU', '2021/2022-2', NULL, NULL, '2022-04-25'),
(127, '1', 'GURU', '2021/2022-2', NULL, NULL, '2022-05-12'),
(128, '11', 'SISWA', '2021/2022-2', NULL, NULL, '2022-05-12'),
(129, '11', 'SISWA', '2021/2022-2', NULL, NULL, '2022-05-11'),
(130, '11', 'SISWA', '2021/2022-2', NULL, NULL, '2022-05-17'),
(131, '11', 'SISWA', '2021/2022-2', NULL, NULL, '2022-05-23'),
(132, '1', 'GURU', '2021/2022-2', NULL, NULL, '2022-05-23'),
(133, '1', 'GURU', '2021/2022-2', NULL, NULL, '2022-05-25'),
(134, '11', 'SISWA', '2021/2022-2', NULL, NULL, '2022-05-31'),
(135, '1', 'GURU', '2021/2022-2', NULL, NULL, '2022-05-31'),
(136, '1', 'GURU', '2021/2022-2', NULL, NULL, '2022-06-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_account`
--

CREATE TABLE IF NOT EXISTS `sr_account` (
  `id_akun` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) DEFAULT NULL,
  `kode_akun` varchar(20) DEFAULT NULL,
  `jenis_akun` int(20) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `modul_keuangan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB AUTO_INCREMENT=622667 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_account`
--

INSERT INTO `sr_account` (`id_akun`, `unit`, `kode_akun`, `jenis_akun`, `kategori`, `keterangan`, `modul_keuangan`) VALUES
(1, '5', '1-1000', 1, 'utama', 'AKTIVA', NULL),
(622655, '5', '1-1100', 2, 'keuangan', 'Kas Tunai SMA', 'aset'),
(622656, '5', '1-1900', 2, 'keuangan', 'Piutang', 'aset'),
(622657, '5', '2-2000', 1, 'utama', 'PASIVA', 'aset'),
(622658, '5', '4-4000', 1, 'utama', 'Pendapatan', 'pendapatan'),
(622660, '5', '5-5000', 1, 'utama', 'Beban', 'biaya'),
(622662, '5', '1-900', 1, 'utama', 'AKTIVA', 'biaya'),
(622663, '5', '4-4010', 1, 'pendapatan baju SD', 'pendapatan baju SD', 'pendapatan'),
(622664, '5', '4-4020', 2, 'keuangan', 'pendapatan baju SMP', 'pendapatan'),
(622665, '', '4-4030', 2, 'pembayaran', 'Pendapatan Buku Paket ', 'pendapatan'),
(622666, '5', '4-4030', 1, 'keuangan', 'Konsumsi SD', 'aset');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_akun_gaji`
--

CREATE TABLE IF NOT EXISTS `sr_akun_gaji` (
  `id_akun_gaji` int(11) NOT NULL AUTO_INCREMENT,
  `akun_gaji` varchar(20) DEFAULT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_akun_gaji`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_akun_gaji`
--

INSERT INTO `sr_akun_gaji` (`id_akun_gaji`, `akun_gaji`, `id_user`, `unit`) VALUES
(1, '622662', '40', '5'),
(2, '622662', '38', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_bukukerja`
--

CREATE TABLE IF NOT EXISTS `sr_bukukerja` (
  `bukukerja_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` int(11) NOT NULL,
  `nomer` varchar(100) NOT NULL,
  `matapelajaran` varchar(10) NOT NULL,
  `files` varchar(255) NOT NULL,
  `created` varchar(100) NOT NULL,
  PRIMARY KEY (`bukukerja_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_bukukerja`
--

INSERT INTO `sr_bukukerja` (`bukukerja_id`, `unit`, `nomer`, `matapelajaran`, `files`, `created`) VALUES
(2, 5, 'Buku kerja nomer 1', 'Pendidikan', 'Buku_Kerja_Guru_1.docx', '2022-03-25 15:34:30'),
(3, 5, 'Buku kerja nomer 1', 'Bahasa Ind', 'photo-1453728013993-6d66e9c9123a.jpg', '2022-05-27 14:35:08'),
(4, 5, 'Buku kerja nomer 2', 'Pendidikan', 'photo-1453728013993-6d66e9c9123a1.jpg', '2022-05-27 15:07:48'),
(5, 5, 'Buku kerja nomer 1', 'Pendidikan', 'Gambar.pdf', '2022-05-27 15:14:12'),
(6, 5, 'Buku kerja nomer 1', 'Pendidikan', 'file-sample_150kB.pdf', '2022-05-27 15:21:55'),
(7, 5, 'Buku kerja nomer 1', 'Matematika', 'screencapture-search-google-search-console-performance-search-analytics-2022-05-27-11_17_24.pdf', '2022-05-27 15:22:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_bulan`
--

CREATE TABLE IF NOT EXISTS `sr_bulan` (
  `id_bulan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bulan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_bulan`),
  UNIQUE KEY `nama_bulan` (`nama_bulan`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_bulan`
--

INSERT INTO `sr_bulan` (`id_bulan`, `nama_bulan`) VALUES
(2, 'Agustus'),
(10, 'April'),
(6, 'Desember'),
(8, 'Febuari'),
(7, 'Januari'),
(1, 'Juli'),
(12, 'Juni'),
(9, 'Maret'),
(11, 'Mei'),
(5, 'November'),
(4, 'Oktober'),
(3, 'September');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_butir_sikap`
--

CREATE TABLE IF NOT EXISTS `sr_butir_sikap` (
  `idbutir_sikap` int(11) NOT NULL AUTO_INCREMENT,
  `bs_kategori` varchar(10) NOT NULL,
  `bs_kode` varchar(255) NOT NULL,
  `bs_keterangan` text NOT NULL,
  `bs_unit` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idbutir_sikap`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_butir_sikap`
--

INSERT INTO `sr_butir_sikap` (`idbutir_sikap`, `bs_kategori`, `bs_kode`, `bs_keterangan`, `bs_unit`) VALUES
(1, '2', 'Jujur (1.1)', 'Tidak mau berbohong atau tidak mencontek', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_ekstra`
--

CREATE TABLE IF NOT EXISTS `sr_ekstra` (
  `idekstra` int(11) NOT NULL AUTO_INCREMENT,
  `e_nama` varchar(255) NOT NULL,
  `unit` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idekstra`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_ekstra`
--

INSERT INTO `sr_ekstra` (`idekstra`, `e_nama`, `unit`) VALUES
(2, 'Futsal', '5'),
(3, 'Baca Tulis Al Quran', '5'),
(4, 'Pertanian', '5'),
(5, 'Pramuka', '5'),
(6, 'Qiroah', '5'),
(7, 'Basket', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_gaji_karyawan`
--

CREATE TABLE IF NOT EXISTS `sr_gaji_karyawan` (
  `id_gaji_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `gaji_pokok` varchar(100) DEFAULT NULL,
  `gaji_potongan` varchar(100) DEFAULT NULL,
  `gaji_pendapatan_lain_lain` varchar(100) DEFAULT NULL,
  `akun` varchar(20) DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_gaji_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_gaji_karyawan`
--

INSERT INTO `sr_gaji_karyawan` (`id_gaji_karyawan`, `gaji_pokok`, `gaji_potongan`, `gaji_pendapatan_lain_lain`, `akun`, `unit`, `id_user`, `tanggal`) VALUES
(9, '300000', '2000', '100000', '622662', '5', 40, '2022-04-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_gaji_karyawan_perbulan`
--

CREATE TABLE IF NOT EXISTS `sr_gaji_karyawan_perbulan` (
  `id_gaji_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `gaji_pokok` varchar(100) DEFAULT NULL,
  `gaji_potongan` varchar(100) DEFAULT NULL,
  `gaji_pendapatan_lain_lain` varchar(100) DEFAULT NULL,
  `akun` varchar(20) DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_gaji_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_gaji_karyawan_perbulan`
--

INSERT INTO `sr_gaji_karyawan_perbulan` (`id_gaji_karyawan`, `gaji_pokok`, `gaji_potongan`, `gaji_pendapatan_lain_lain`, `akun`, `unit`, `id_user`, `tanggal`) VALUES
(14, '400000', '2000', '100000', '622662', '5', 40, '2022-04-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_guestbook`
--

CREATE TABLE IF NOT EXISTS `sr_guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_visit` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_created` varchar(100) NOT NULL,
  `user_ip` varchar(20) DEFAULT NULL,
  `user_os` varchar(100) DEFAULT NULL,
  `user_browser` varchar(100) DEFAULT NULL,
  `approve` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_guestbook`
--

INSERT INTO `sr_guestbook` (`id`, `unit`, `user_name`, `user_email`, `user_visit`, `user_phone`, `user_created`, `user_ip`, `user_os`, `user_browser`, `approve`) VALUES
(7, '2', 'Reza Lesmana Putra', 'rzalvaero@gmail.com', '2022-05-20', '088906033372', '2022-03-17 15:00:01', '::1', 'Windows 10', '99.0.4844.51', 1),
(8, '3', 'Rohman', 'rohman@gmail.com', '2022-02-07', '081283960337', '2022-05-31 18:21:06', '125.160.19.100', 'Windows 10', '102.0.5005.62', 0),
(9, '4', 'damara', 'foreverbarca24@gmail.com', '2022-06-02', '087820513599', '2022-06-02 12:04:09', '180.252.171.39', 'Windows 10', '102.0.5005.63', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_guru_tes`
--

CREATE TABLE IF NOT EXISTS `sr_guru_tes` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_guru` int(6) NOT NULL,
  `jenis` enum('acak','paket') NOT NULL,
  `id_mapel` int(6) DEFAULT NULL,
  `id_paket` int(6) DEFAULT NULL,
  `nama_ujian` varchar(200) NOT NULL,
  `jumlah_soal` int(6) DEFAULT NULL,
  `waktu` int(6) NOT NULL,
  `detil_jenis` varchar(200) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `terlambat` datetime NOT NULL,
  `token` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_guru_tes`
--

INSERT INTO `sr_guru_tes` (`id`, `id_guru`, `jenis`, `id_mapel`, `id_paket`, `nama_ujian`, `jumlah_soal`, `waktu`, `detil_jenis`, `tgl_mulai`, `terlambat`, `token`) VALUES
(5, 1, 'paket', NULL, 7, 'Ujian Paket ips', 10, 1110, '', '2022-04-02 06:07:00', '2022-04-05 06:07:00', '234'),
(7, 1, 'paket', NULL, 9, 'ujian uas', 10, 10, '', '2022-04-04 15:41:00', '2022-04-05 17:41:00', '123'),
(8, 1, 'paket', NULL, 8, 'paket baru', 10, 10, '', '2022-04-04 15:49:00', '2022-04-06 16:49:00', '123'),
(9, 1, 'paket', NULL, 8, 'paket ujian sd ipa', 10, 15, '', '2022-04-04 16:18:00', '2022-04-06 19:18:00', '123'),
(10, 1, 'paket', NULL, 8, 'Ujian Paketyyy', 10, 10, '', '2022-04-05 10:14:00', '2022-04-06 09:14:00', '123'),
(11, 1, 'paket', NULL, 10, 'adadsa', 0, 60, '', '2022-05-23 10:26:00', '2022-05-24 10:26:00', 'asa'),
(12, 1, 'acak', 56, NULL, 'UTS Matematika', 2, 20, '', '2022-06-02 14:08:00', '2022-06-15 14:09:00', 'B01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_ikut_ujian`
--

CREATE TABLE IF NOT EXISTS `sr_ikut_ujian` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_tes` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `jml_benar` int(6) NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  `nilai_bobot` decimal(10,2) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_ikut_ujian`
--

INSERT INTO `sr_ikut_ujian` (`id`, `id_tes`, `id_user`, `jml_benar`, `nilai`, `nilai_bobot`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(28, 7, 11, 2, '100.00', '0.00', '2022-04-04 16:22:46', '2022-04-04 16:32:46', 'N'),
(29, 9, 12, 0, '0.00', '0.00', '2022-04-05 11:27:11', '2022-04-05 11:42:11', 'N'),
(30, 7, 12, 0, '0.00', '0.00', '2022-04-05 14:36:39', '2022-04-05 14:46:39', 'N'),
(31, 12, 11, 0, '0.00', '0.00', '2022-06-02 14:16:27', '2022-06-02 14:36:27', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_ikut_ujian_detil_jawaban`
--

CREATE TABLE IF NOT EXISTS `sr_ikut_ujian_detil_jawaban` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_ikut_ujian` int(10) NOT NULL,
  `id_soal` int(10) NOT NULL,
  `jawaban_user` varchar(1) NOT NULL,
  `status_jawaban` int(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_ikut_ujian_detil_jawaban`
--

INSERT INTO `sr_ikut_ujian_detil_jawaban` (`id`, `id_ikut_ujian`, `id_soal`, `jawaban_user`, `status_jawaban`, `updated_at`) VALUES
(39, 28, 28, 'C', 1, '2022-04-04 16:23:31'),
(40, 28, 30, 'D', 1, '2022-04-04 16:23:35'),
(41, 29, 30, 'B', 0, '2022-04-05 11:27:16'),
(42, 30, 28, 'B', 0, '2022-04-05 14:36:43'),
(43, 30, 30, 'B', 0, '2022-04-05 14:36:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_interval_predikat`
--

CREATE TABLE IF NOT EXISTS `sr_interval_predikat` (
  `idinterval_predikat` int(11) NOT NULL AUTO_INCREMENT,
  `idkkm` int(11) NOT NULL,
  `amin` int(11) NOT NULL,
  `amax` int(11) NOT NULL,
  `bmin` int(11) NOT NULL,
  `bmax` int(11) NOT NULL,
  `cmin` int(11) NOT NULL,
  `cmax` int(11) NOT NULL,
  `dmin` int(11) NOT NULL,
  `dmax` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  PRIMARY KEY (`idinterval_predikat`),
  KEY `idkkm` (`idkkm`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_interval_predikat`
--

INSERT INTO `sr_interval_predikat` (`idinterval_predikat`, `idkkm`, `amin`, `amax`, `bmin`, `bmax`, `cmin`, `cmax`, `dmin`, `dmax`, `unit`) VALUES
(6, 2, 88, 100, 79, 87, 65, 78, 0, 64, 5),
(7, 3, 80, 100, 75, 85, 60, 70, 10, 50, 5),
(8, 4, 90, 100, 70, 89, 60, 69, 0, 59, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_invoice`
--

CREATE TABLE IF NOT EXISTS `sr_invoice` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `identification` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `custumer` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `service` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `price` int(10) NOT NULL,
  `noreff` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `method` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `number` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `sistem` enum('Auto','Manual') COLLATE utf8_swedish_ci NOT NULL,
  `status` enum('Pending','Success','Error') COLLATE utf8_swedish_ci NOT NULL,
  `jenis` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `place_from` enum('WEB','API') COLLATE utf8_swedish_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `tf` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `sr_invoice`
--

INSERT INTO `sr_invoice` (`id`, `code`, `identification`, `custumer`, `service`, `price`, `noreff`, `method`, `email`, `number`, `sistem`, `status`, `jenis`, `place_from`, `date`, `link`, `tf`) VALUES
(31, 'ID-05778', 'REG-20220407-0001', 'Reza Lesmana Putra', 'Pendaftaran PPDB Reza Lesmana Putra - NO Pendaftaran : REG-20220407-0001', 100000, 'D118380JHUHXVSE2XG2GY', 'A1', 'rzalvaero@gmail.com', '081280462650', 'Auto', 'Success', '', 'WEB', '2022-04-07', 'https://sandbox.duitku.com/topup/topupdirectv2.aspx?ref=A115ZUW64YPNHMWDI', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_invoice_body`
--

CREATE TABLE IF NOT EXISTS `sr_invoice_body` (
  `id_invoice` int(11) NOT NULL AUTO_INCREMENT,
  `nama_akun` varchar(200) DEFAULT NULL,
  `idusers` varchar(20) DEFAULT NULL,
  `tanggal` varchar(200) DEFAULT NULL,
  `bulan` varchar(200) DEFAULT NULL,
  `akun` varchar(200) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `id_akun` varchar(200) DEFAULT NULL,
  `no_ref` varchar(200) DEFAULT NULL,
  `credit` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `balance` varchar(200) DEFAULT NULL,
  `pajak` varchar(200) DEFAULT NULL,
  `unit_pos` varchar(200) DEFAULT NULL,
  `nominal` varchar(200) DEFAULT NULL,
  `debet` varchar(200) DEFAULT NULL,
  `akun_kas` varchar(200) DEFAULT NULL,
  `nama_akun_kas` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_invoice`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_invoice_body`
--

INSERT INTO `sr_invoice_body` (`id_invoice`, `nama_akun`, `idusers`, `tanggal`, `bulan`, `akun`, `deskripsi`, `id_akun`, `no_ref`, `credit`, `status`, `jenis`, `balance`, `pajak`, `unit_pos`, `nominal`, `debet`, `akun_kas`, `nama_akun_kas`) VALUES
(17, 'SMK-1-900-AKTIVA', '40', '2022-04-12', '2022-04', 'AKTIVA', 'GajiSMK-1-900-AKTIVA Ahwanto, A.Ma-', '622662', 'GK1204202219671206 198903 1 0032', '498000', 'keluar', 'Gaji', '-498000', '0', '', '498000', '0', '622655', NULL),
(49, 'SMK-1-900-AKTIVA', NULL, '2022-04-13', '0', 'A', 'Kas KeluarSMK-1-900-AKTIVA-tess', '622662', 'sjkfs', '2000', 'keluar', 'keluar', '-500000', '0', '1', '2000', '0', '622655', 'Kas Tunai SMA'),
(50, 'SMK-5-5000-Beban', NULL, '2022-04-13', '0', 'e', 'Kas KeluarSMK-5-5000-Beban-tess', '622660', 'sjkfs', '1000', 'keluar', 'keluar', '-1000', '0', '2', '1000', '0', '622655', 'Kas Tunai SMA'),
(51, 'SMK-4-4000-Pendapatan', NULL, '2022-04-13', '0', 'P', 'Kas MasukSMK-4-4000-Pendapatan-sdf', '622658', '2342', '2000', 'masuk', 'masuk', '2000', '0', '1', '2000', '0', '622655', 'Kas Tunai SMA'),
(52, 'SMK-4-4010-Pendapatan SPP', NULL, '2022-04-13', '0', 'e', 'Kas MasukSMK-4-4010-Pendapatan SPP-sdf', '0', '2342', '4000', 'masuk', 'masuk', '4000', '0', '2', '4000', '0', '622655', 'Kas Tunai SMA'),
(54, '-1-1100-Kas Tunai SMA', NULL, '2022-04-13', '2022-04', 'Kas Tunai SMA', 'SPP--1-1100-Kas Tunai SMA-11111', '622655', 'SPP-2022-04-13-11111', '0', 'masuk', 'SPP', '10000', '0', '', NULL, '10000', '', 'Pendapatan SPP'),
(55, 'SMK - test', NULL, '2022-04-14', '2022-04', 'Kas Tunai SMA', 'transfer dari akun Kas Tunai SMA ke akun Piutang', '622655', 'transfer2022-04-14622655-622656', '300000', 'transfer', 'transfer in', '-290000', '0', '', '300000', '0', '622656', 'Piutang'),
(56, 'SMK - test', NULL, '2022-04-14', '2022-04', 'Kas Tunai SMA', 'transfer dari akun Kas Tunai SMA ke akun Piutang', '622656', 'transfer2022-04-14622655-622656', '0', 'transfer', 'transfer out', '300000', '0', '', '300000', '300000', '622656', 'Piutang'),
(57, 'SMK - TEST', NULL, '2022-04-14', '2022-04', 'Piutang', 'transfer dari akun Piutang ke akun Piutang', '622656', 'transfer2022-04-14622656-622656', '20000', 'transfer', 'transfer in', '280000', '0', '', '20000', '0', '622656', 'Piutang'),
(58, 'SMK - TEST', NULL, '2022-04-14', '2022-04', 'Piutang', 'transfer dari akun Piutang ke akun Piutang', '622656', 'transfer2022-04-14622656-622656', '0', 'transfer', 'transfer out', '320000', '0', '', '20000', '20000', '622656', 'Piutang'),
(59, '-1-1100-Kas Tunai SMA', NULL, '2022-04-16', '2022-04', 'Kas Tunai SMA', 'SPP--1-1100-Kas Tunai SMA-11111', '622655', 'SPP-2022-04-16-11111', '0', 'masuk', 'SPP', '-280000', '0', '', '10000', '10000', '', 'Pendapatan SPP'),
(60, '-1-1100-Kas Tunai SMA', NULL, '2022-04-17', '2022-04', 'Kas Tunai SMA', 'SPP--1-1100-Kas Tunai SMA-11111', '622655', 'SPP-2022-04-17-11111', '0', 'masuk', 'SPP', '-270000', '0', '', '10000', '10000', '', NULL),
(61, '-1-1100-Kas Tunai SMA', NULL, '2022-04-17', '2022-04', 'Kas Tunai SMA', 'SPP--1-1100-Kas Tunai SMA-11111', '622655', 'SPP-2022-04-17-11111', '0', 'masuk', 'SPP', '-260000', '0', '', '10000', '10000', '622658', 'Pendapatan'),
(62, '-1-1100-Kas Tunai SMA', NULL, '2022-05-31', '2022-05', 'Kas Tunai SMA', 'SPP--1-1100-Kas Tunai SMA-11111', '622655', 'SPP-2022-05-31-11111', '0', 'masuk', 'SPP', '-250000', '0', '', '10000', '10000', NULL, NULL),
(63, '-1-1100-Kas Tunai SMA', NULL, '2022-05-31', '2022-05', 'Kas Tunai SMA', 'SPP--1-1100-Kas Tunai SMA-11111', '622655', 'SPP-2022-05-31-11111', '0', 'masuk', 'SPP', '-240000', '0', '', '10000', '10000', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_jabatan`
--

CREATE TABLE IF NOT EXISTS `sr_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_jabatan`
--

INSERT INTO `sr_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(3, 'Guru'),
(4, 'Staff TU / Operator'),
(5, 'Staff Keuangan / Bendahara'),
(6, 'Kepala Sekolah'),
(7, 'Alumni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_jenis_bayar`
--

CREATE TABLE IF NOT EXISTS `sr_jenis_bayar` (
  `id_jenis_bayar` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` varchar(20) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `tipe` varchar(20) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_bayar`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_jenis_bayar`
--

INSERT INTO `sr_jenis_bayar` (`id_jenis_bayar`, `id_pos`, `tingkat`, `tipe`, `unit`) VALUES
(2, '3', '2022', 'bulanan', '5'),
(6, '1', '2022', 'bebas', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_jenis_pengaduan`
--

CREATE TABLE IF NOT EXISTS `sr_jenis_pengaduan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_kamar`
--

CREATE TABLE IF NOT EXISTS `sr_kamar` (
  `id_kamar` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(10) NOT NULL,
  `nama_kamar` varchar(100) NOT NULL,
  `kategori_kamar` varchar(10) NOT NULL,
  `kapasitas_kamar` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_kamar`
--

INSERT INTO `sr_kamar` (`id_kamar`, `unit`, `nama_kamar`, `kategori_kamar`, `kapasitas_kamar`) VALUES
(1, '5', 'MELATI - I', '1', '10'),
(2, '5', 'ANGREK - I', '2', '5'),
(3, '3', 'Kumala Sutan Daulay', '1', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_kamar_kategori`
--

CREATE TABLE IF NOT EXISTS `sr_kamar_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_kamar_kategori`
--

INSERT INTO `sr_kamar_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Regular'),
(2, 'VIP'),
(3, 'VVIP\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_kamar_penghuni`
--

CREATE TABLE IF NOT EXISTS `sr_kamar_penghuni` (
  `id_penghuni` int(11) NOT NULL AUTO_INCREMENT,
  `id_kamar` varchar(10) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `unit` varchar(11) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id_penghuni`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_kamar_penghuni`
--

INSERT INTO `sr_kamar_penghuni` (`id_penghuni`, `id_kamar`, `id_siswa`, `unit`, `status`) VALUES
(1, '1', '11', '5', 0),
(2, '1', '12', '5', 0),
(3, '1', '13', '5', 0),
(4, '2', '14', '5', 0),
(5, '2', '15', '5', 0),
(6, '2', '16', '5', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_kelas`
--

CREATE TABLE IF NOT EXISTS `sr_kelas` (
  `idkelas` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) NOT NULL,
  `walikelas` varchar(50) NOT NULL,
  `k_tingkat` int(11) NOT NULL,
  `k_romawi` varchar(20) NOT NULL,
  `k_keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`idkelas`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_kelas`
--

INSERT INTO `sr_kelas` (`idkelas`, `unit`, `walikelas`, `k_tingkat`, `k_romawi`, `k_keterangan`) VALUES
(1, '5', '1', 10, 'X - AP', 'Administrasi Perkantoran'),
(2, '5', '1', 10, 'X - AB', 'Administrasi Bisnis'),
(3, '5', '37', 10, 'X - TKJ', 'Tekhnik Komputer Jaringan'),
(4, '5', '38', 10, 'X - MM', 'Multimedia'),
(5, '5', '40', 11, 'XI - AP', 'Administrasi Perkantoran'),
(6, '5', '39', 11, 'XI - AB', 'Administrasi Bisnis'),
(11, '5', '45', 11, 'XI - TKJ', 'Tekhnik Komputer Jaringan'),
(16, '5', '45', 11, 'XI - MM', 'Multimedia'),
(17, '5', '44', 12, 'XII - AP', 'Administrasi Perkantoran'),
(19, '5', '41', 12, 'XII - AB', 'Administrasi Bisnis'),
(20, '5', '59', 12, 'XII - TKJ', 'Tekhnik Komputer Jaringan'),
(21, '5', '57', 12, 'XII - MM', 'Multimedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_kelas_guru`
--

CREATE TABLE IF NOT EXISTS `sr_kelas_guru` (
  `idkelas_guru` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` int(10) UNSIGNED NOT NULL,
  `idkelas` int(11) NOT NULL,
  PRIMARY KEY (`idkelas_guru`),
  KEY `idusers` (`idusers`),
  KEY `idkelas` (`idkelas`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_kelas_guru`
--

INSERT INTO `sr_kelas_guru` (`idkelas_guru`, `idusers`, `idkelas`) VALUES
(17, 37, 2),
(18, 38, 4),
(22, 1, 1),
(23, 39, 2),
(24, 39, 3),
(25, 39, 4),
(26, 39, 5),
(27, 39, 6),
(28, 40, 1),
(29, 41, 1),
(30, 41, 2),
(31, 41, 3),
(32, 41, 4),
(33, 41, 5),
(34, 41, 6),
(35, 40, 2),
(36, 40, 4),
(37, 40, 3),
(38, 40, 5),
(39, 40, 6),
(40, 42, 1),
(41, 43, 3),
(42, 44, 5),
(43, 45, 6),
(50, 57, 17),
(52, 45, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_keluar`
--

CREATE TABLE IF NOT EXISTS `sr_keluar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `akun` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `total` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `keterangan` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_kesehatan`
--

CREATE TABLE IF NOT EXISTS `sr_kesehatan` (
  `idkesehatan` int(11) NOT NULL AUTO_INCREMENT,
  `ks_aspek` varchar(255) NOT NULL,
  `unit` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idkesehatan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_kesehatan`
--

INSERT INTO `sr_kesehatan` (`idkesehatan`, `ks_aspek`, `unit`) VALUES
(2, 'Penglihatan tes 123 3343', NULL),
(3, 'Pendengaran', NULL),
(4, 'Penciuman', '3'),
(5, 'uks sekola', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_kkm`
--

CREATE TABLE IF NOT EXISTS `sr_kkm` (
  `idkkm` int(11) NOT NULL AUTO_INCREMENT,
  `idkelas` int(11) NOT NULL,
  `idmata_pelajaran` int(11) NOT NULL,
  `k_kkm` int(11) NOT NULL,
  `unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`idkkm`),
  KEY `idkelas` (`idkelas`),
  KEY `idmata_pelajaran` (`idmata_pelajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_kkm`
--

INSERT INTO `sr_kkm` (`idkkm`, `idkelas`, `idmata_pelajaran`, `k_kkm`, `unit`) VALUES
(2, 1, 2, 40, 5),
(4, 17, 49, 20, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_kode_kelompok`
--

CREATE TABLE IF NOT EXISTS `sr_kode_kelompok` (
  `id_kode_kelompok` int(11) NOT NULL,
  `unit` varchar(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kode` varchar(2) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_kompetensi_dasar`
--

CREATE TABLE IF NOT EXISTS `sr_kompetensi_dasar` (
  `id_kompetensidasar` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(10) NOT NULL,
  `idtahun_pelajaran` int(11) NOT NULL,
  `idusers` int(11) UNSIGNED NOT NULL,
  `idkelas` int(11) NOT NULL,
  `idmata_pelajaran` int(11) NOT NULL,
  `kd_kategori` enum('Pengetahuan','Keterampilan') NOT NULL,
  `kd` varchar(100) NOT NULL,
  `kd_nama` text NOT NULL,
  `kd_status` enum('Y','N') NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL,
  `bagan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kompetensidasar`),
  KEY `idtahun_pelajaran` (`idtahun_pelajaran`),
  KEY `idusers` (`idusers`),
  KEY `idmata_pelajaran` (`idmata_pelajaran`),
  KEY `idkelas` (`idkelas`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_kompetensi_dasar`
--

INSERT INTO `sr_kompetensi_dasar` (`id_kompetensidasar`, `unit`, `idtahun_pelajaran`, `idusers`, `idkelas`, `idmata_pelajaran`, `kd_kategori`, `kd`, `kd_nama`, `kd_status`, `mata_pelajaran`, `bagan`) VALUES
(29, '5', 1, 1, 1, 2, 'Pengetahuan', '1.1', 'Melafalkan huruf konsonan', 'Y', '', ''),
(30, '5', 1, 1, 1, 2, 'Pengetahuan', '1.2', 'Membaca cepat dan tepat', 'Y', '', ''),
(31, '5', 1, 42, 1, 2, 'Keterampilan', '1.1', 'Membaca puisi', 'Y', '', ''),
(32, '5', 1, 42, 1, 2, 'Keterampilan', '1.2', 'Berpidato tentang hari kemerdekaan', 'Y', '', ''),
(33, '5', 1, 42, 1, 49, 'Pengetahuan', '1.1', 'Mengetahui anatomi makhluk hidup', 'Y', '', ''),
(34, '5', 1, 42, 1, 49, 'Pengetahuan', '1.2', 'Mengetahui cara fotosintesis', 'Y', '', ''),
(35, '5', 1, 42, 1, 49, 'Keterampilan', '1.1', 'Mengamati pertumbuhan kecambah', 'Y', '', ''),
(38, '5', 1, 42, 1, 49, 'Keterampilan', '1.2', 'Mengamati struktur lapisan tumbuhan', 'Y', '', ''),
(39, '5', 1, 42, 1, 50, 'Pengetahuan', '1.1', 'Mengetahui sejarah kemerdekaan', 'Y', '', ''),
(40, '5', 1, 42, 1, 50, 'Pengetahuan', '1.2', 'Mengetahui penjajahan belanda', 'Y', '', ''),
(41, '5', 1, 42, 1, 50, 'Keterampilan', '1.1', 'Menghapal isi sumpah pemuda', 'Y', '', ''),
(42, '5', 1, 42, 1, 50, 'Keterampilan', '1.2', 'Membaca UUD 1945', 'Y', '', ''),
(43, '5', 1, 42, 1, 3, 'Pengetahuan', '1.1', 'Mengetahui algoritma', 'Y', '', ''),
(44, '5', 1, 42, 1, 3, 'Pengetahuan', '1.2', 'Mengetahui perhitungan logaritma', 'Y', '', ''),
(45, '5', 1, 42, 1, 3, 'Keterampilan', '1.1', 'Menghitung perkalian dan pertambahan', 'Y', '', ''),
(46, '5', 1, 42, 1, 3, 'Keterampilan', '1.2', 'Menghitung panjang jalan raya', 'Y', '', ''),
(47, '5', 1, 42, 1, 46, 'Pengetahuan', '1.1', 'Memahami isi UUD 1945', 'Y', '', ''),
(48, '5', 1, 42, 1, 46, 'Pengetahuan', '1.2', 'Memahami isi pancasila', 'Y', '', ''),
(49, '5', 1, 42, 1, 46, 'Keterampilan', '1.1', 'Membaca isi pancasila', 'Y', '', ''),
(50, '5', 1, 42, 1, 46, 'Keterampilan', '1.2', 'Membaca UUD 1945', 'Y', '', ''),
(51, '5', 1, 42, 1, 47, 'Pengetahuan', '1.1', 'Memahami cara melukis', 'Y', '', ''),
(52, '5', 1, 42, 1, 47, 'Pengetahuan', '1.2', 'Memahami tangga nada', 'Y', '', ''),
(53, '5', 1, 42, 1, 47, 'Keterampilan', '1.1', 'Memainkan lagu dengan gitar', 'Y', '', ''),
(54, '5', 1, 42, 1, 47, 'Keterampilan', '1.2', 'Melukis wajah pahlawan', 'Y', '', ''),
(55, '5', 1, 40, 1, 1, 'Pengetahuan', '1.1', 'Mengetahui sejarah Nabi Muhammad SAW', 'Y', '', ''),
(56, '5', 1, 40, 1, 1, 'Pengetahuan', '1.2', 'Memahami sejarah Islam ', 'Y', '', ''),
(57, '5', 1, 40, 1, 1, 'Keterampilan', '1.1', 'Membaca Al-Qur&#039;an', 'Y', '', ''),
(58, '5', 1, 40, 1, 1, 'Keterampilan', '1.2', 'Menulis surah dalam Al-Qur&#039;an', 'Y', '', ''),
(59, '5', 1, 39, 1, 48, 'Pengetahuan', '1.1', 'Memahami permainan bola kasti', 'Y', '', ''),
(60, '5', 1, 39, 1, 48, 'Keterampilan', '1.1', 'Memainkan bola kasti', 'Y', '', ''),
(61, '5', 1, 41, 1, 51, 'Pengetahuan', '1.1', 'Memahami grammer', 'Y', '', ''),
(62, '5', 1, 41, 1, 51, 'Keterampilan', '1.1', 'Melaksanakan TOEFL', 'Y', '', ''),
(63, '5', 1, 57, 17, 2, 'Pengetahuan', '1.1', '1.1 KD 1 ', 'Y', '', ''),
(64, '5', 1, 57, 17, 2, 'Keterampilan', '1.1', 'WKD', 'Y', '', ''),
(65, '5', 1, 57, 17, 51, 'Pengetahuan', '1.1', 'sad', 'Y', '', ''),
(66, '5', 1, 57, 17, 51, 'Keterampilan', '1.2', 'sadas', 'Y', '', ''),
(67, '5', 2, 42, 1, 2, 'Pengetahuan', '1.1', 'asdasd', 'Y', '', ''),
(68, '5', 2, 42, 1, 2, 'Keterampilan', '1.2', 'asasddsa', 'Y', '', ''),
(71, '5', 1, 37, 2, 2, 'Pengetahuan', '1.1', 'kd 1 kelas 2', 'Y', '', ''),
(72, '5', 1, 37, 2, 2, 'Keterampilan', '1.1', 'kd 2 kelas 2', 'Y', '', ''),
(73, '5', 1, 37, 2, 49, 'Pengetahuan', '1.1', 'kd 1 kelas 2', 'Y', '', ''),
(74, '5', 1, 37, 2, 49, 'Keterampilan', '1.1', 'kd 2 kelas 2', 'Y', '', ''),
(75, '5', 1, 37, 2, 50, 'Pengetahuan', '1.1', 'kd 1 kelas 2', 'Y', '', ''),
(76, '5', 1, 37, 2, 50, 'Keterampilan', '1.1', 'kd 2 kelas 2', 'Y', '', ''),
(77, '5', 1, 37, 2, 3, 'Pengetahuan', '1.1', 'kd 1 kelas 2', 'Y', '', ''),
(78, '5', 1, 37, 2, 3, 'Keterampilan', '1.1', 'kd 2 kelas 2', 'Y', '', ''),
(79, '5', 1, 37, 2, 46, 'Pengetahuan', '1.1', 'kd 1 kelas 2', 'Y', '', ''),
(80, '5', 1, 37, 2, 46, 'Keterampilan', '1.2', 'kd 2 kelas 2', 'Y', '', ''),
(81, '5', 1, 37, 2, 47, 'Pengetahuan', '1.1', 'kd 1 kelas 2', 'Y', '', ''),
(82, '5', 1, 37, 2, 47, 'Keterampilan', '1.1', 'kd 2 kelas 2', 'Y', '', ''),
(83, '5', 1, 40, 2, 1, 'Pengetahuan', '1.1', 'kd 1 kelas 2', 'Y', '', ''),
(84, '5', 1, 40, 2, 1, 'Keterampilan', '1.1', 'kd 2 kelas 2', 'Y', '', ''),
(85, '5', 1, 41, 2, 51, 'Pengetahuan', '1.1', 'kd 1 kelas 2', 'Y', '', ''),
(86, '5', 1, 41, 2, 51, 'Keterampilan', '1.1', 'kd 2 kelas 2', 'Y', '', ''),
(87, '5', 1, 39, 2, 48, 'Pengetahuan', '1.1', 'kd 1 kelas 2', 'Y', '', ''),
(88, '5', 1, 39, 2, 48, 'Keterampilan', '1.1', 'kd 2 kelas 2', 'Y', '', ''),
(89, '5', 2, 42, 1, 49, 'Pengetahuan', '1.1', 'kd 1 kelas 1', 'Y', '', ''),
(90, '5', 2, 42, 1, 49, 'Keterampilan', '1.1', 'kd 2 kelas 1', 'Y', '', ''),
(91, '5', 1, 44, 5, 2, 'Pengetahuan', '1.1', 'tessttt', 'Y', '', ''),
(92, '5', 1, 44, 5, 2, 'Pengetahuan', '1.2', 'kemampuan berpikir', 'Y', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_kompetensi_dasar_lama`
--

CREATE TABLE IF NOT EXISTS `sr_kompetensi_dasar_lama` (
  `id_kompetensidasar` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(10) NOT NULL,
  `kd` varchar(100) NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL,
  `bagan` varchar(225) NOT NULL,
  PRIMARY KEY (`id_kompetensidasar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_kompetensi_dasar_lama`
--

INSERT INTO `sr_kompetensi_dasar_lama` (`id_kompetensidasar`, `unit`, `kd`, `mata_pelajaran`, `bagan`) VALUES
(1, '5', 'K 3 - Kompetensi inti pengetahuan', 'Seni Budaya dan Prakarya', '<ol><li>Memahami Kompetensi Dasar</li><li>Memahami Konsep Seni</li><li>Memahami Konsep Keindahan</li><li>Menganalisis jenis, fungsi dan unsur seni budaya Nusantara</li><li>Menganalisis perkembangan seni budaya Nusantara</li><');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_kompetensi_inti`
--

CREATE TABLE IF NOT EXISTS `sr_kompetensi_inti` (
  `idkompetensiinti` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kd` varchar(100) NOT NULL,
  `nama_kd` text NOT NULL,
  `kategori_kd` enum('Pengetahuan','Keterampilan') NOT NULL,
  PRIMARY KEY (`idkompetensiinti`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_kompetensi_inti`
--

INSERT INTO `sr_kompetensi_inti` (`idkompetensiinti`, `kode_kd`, `nama_kd`, `kategori_kd`) VALUES
(1, 'K 1', 'Kompetensi inti sikap spiritual test lagi', 'Keterampilan'),
(2, 'K 2', 'Kompetensi inti sikap sosial ', 'Pengetahuan'),
(3, 'K 3', 'Kompetensi inti pengetahuan test', 'Pengetahuan'),
(4, 'K 4', 'Kompetensi inti keterampilan ', 'Keterampilan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_kota`
--

CREATE TABLE IF NOT EXISTS `sr_kota` (
  `city_id` int(11) NOT NULL,
  `province_id` varchar(11) NOT NULL,
  `province` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `postal_code` int(11) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_kota`
--

INSERT INTO `sr_kota` (`city_id`, `province_id`, `province`, `type`, `city_name`, `postal_code`) VALUES
(1, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Barat', 23681),
(2, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Barat Daya', 23764),
(3, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Besar', 23951),
(4, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Jaya', 23654),
(5, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Selatan', 23719),
(6, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Singkil', 24785),
(7, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Tamiang', 24476),
(8, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Tengah', 24511),
(9, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Tenggara', 24611),
(10, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Timur', 24454),
(11, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Utara', 24382),
(12, '32', 'Sumatera Barat', 'Kabupaten', 'Agam', 26411),
(13, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Alor', 85811),
(14, '19', 'Maluku', 'Kota', 'Ambon', 97222),
(15, '34', 'Sumatera Utara', 'Kabupaten', 'Asahan', 21214),
(16, '24', 'Papua', 'Kabupaten', 'Asmat', 99777),
(17, '1', 'Bali', 'Kabupaten', 'Badung', 80351),
(18, '13', 'Kalimantan Selatan', 'Kabupaten', 'Balangan', 71611),
(19, '15', 'Kalimantan Timur', 'Kota', 'Balikpapan', 76111),
(20, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Banda Aceh', 23238),
(21, '18', 'Lampung', 'Kota', 'Bandar Lampung', 35139),
(22, '9', 'Jawa Barat', 'Kabupaten', 'Bandung', 40311),
(23, '9', 'Jawa Barat', 'Kota', 'Bandung', 40111),
(24, '9', 'Jawa Barat', 'Kabupaten', 'Bandung Barat', 40721),
(25, '29', 'Sulawesi Tengah', 'Kabupaten', 'Banggai', 94711),
(26, '29', 'Sulawesi Tengah', 'Kabupaten', 'Banggai Kepulauan', 94881),
(27, '2', 'Bangka Belitung', 'Kabupaten', 'Bangka', 33212),
(28, '2', 'Bangka Belitung', 'Kabupaten', 'Bangka Barat', 33315),
(29, '2', 'Bangka Belitung', 'Kabupaten', 'Bangka Selatan', 33719),
(30, '2', 'Bangka Belitung', 'Kabupaten', 'Bangka Tengah', 33613),
(31, '11', 'Jawa Timur', 'Kabupaten', 'Bangkalan', 69118),
(32, '1', 'Bali', 'Kabupaten', 'Bangli', 80619),
(33, '13', 'Kalimantan Selatan', 'Kabupaten', 'Banjar', 70619),
(34, '9', 'Jawa Barat', 'Kota', 'Banjar', 46311),
(35, '13', 'Kalimantan Selatan', 'Kota', 'Banjarbaru', 70712),
(36, '13', 'Kalimantan Selatan', 'Kota', 'Banjarmasin', 70117),
(37, '10', 'Jawa Tengah', 'Kabupaten', 'Banjarnegara', 53419),
(38, '28', 'Sulawesi Selatan', 'Kabupaten', 'Bantaeng', 92411),
(39, '5', 'DI Yogyakarta', 'Kabupaten', 'Bantul', 55715),
(40, '33', 'Sumatera Selatan', 'Kabupaten', 'Banyuasin', 30911),
(41, '10', 'Jawa Tengah', 'Kabupaten', 'Banyumas', 53114),
(42, '11', 'Jawa Timur', 'Kabupaten', 'Banyuwangi', 68416),
(43, '13', 'Kalimantan Selatan', 'Kabupaten', 'Barito Kuala', 70511),
(44, '14', 'Kalimantan Tengah', 'Kabupaten', 'Barito Selatan', 73711),
(45, '14', 'Kalimantan Tengah', 'Kabupaten', 'Barito Timur', 73671),
(46, '14', 'Kalimantan Tengah', 'Kabupaten', 'Barito Utara', 73881),
(47, '28', 'Sulawesi Selatan', 'Kabupaten', 'Barru', 90719),
(48, '17', 'Kepulauan Riau', 'Kota', 'Batam', 29413),
(49, '10', 'Jawa Tengah', 'Kabupaten', 'Batang', 51211),
(50, '8', 'Jambi', 'Kabupaten', 'Batang Hari', 36613),
(51, '11', 'Jawa Timur', 'Kota', 'Batu', 65311),
(52, '34', 'Sumatera Utara', 'Kabupaten', 'Batu Bara', 21655),
(53, '30', 'Sulawesi Tenggara', 'Kota', 'Bau-Bau', 93719),
(54, '9', 'Jawa Barat', 'Kabupaten', 'Bekasi', 17837),
(55, '9', 'Jawa Barat', 'Kota', 'Bekasi', 17121),
(56, '2', 'Bangka Belitung', 'Kabupaten', 'Belitung', 33419),
(57, '2', 'Bangka Belitung', 'Kabupaten', 'Belitung Timur', 33519),
(58, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Belu', 85711),
(59, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Bener Meriah', 24581),
(60, '26', 'Riau', 'Kabupaten', 'Bengkalis', 28719),
(61, '12', 'Kalimantan Barat', 'Kabupaten', 'Bengkayang', 79213),
(62, '4', 'Bengkulu', 'Kota', 'Bengkulu', 38229),
(63, '4', 'Bengkulu', 'Kabupaten', 'Bengkulu Selatan', 38519),
(64, '4', 'Bengkulu', 'Kabupaten', 'Bengkulu Tengah', 38319),
(65, '4', 'Bengkulu', 'Kabupaten', 'Bengkulu Utara', 38619),
(66, '15', 'Kalimantan Timur', 'Kabupaten', 'Berau', 77311),
(67, '24', 'Papua', 'Kabupaten', 'Biak Numfor', 98119),
(68, '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Bima', 84171),
(69, '22', 'Nusa Tenggara Barat (NTB)', 'Kota', 'Bima', 84139),
(70, '34', 'Sumatera Utara', 'Kota', 'Binjai', 20712),
(71, '17', 'Kepulauan Riau', 'Kabupaten', 'Bintan', 29135),
(72, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Bireuen', 24219),
(73, '31', 'Sulawesi Utara', 'Kota', 'Bitung', 95512),
(74, '11', 'Jawa Timur', 'Kabupaten', 'Blitar', 66171),
(75, '11', 'Jawa Timur', 'Kota', 'Blitar', 66124),
(76, '10', 'Jawa Tengah', 'Kabupaten', 'Blora', 58219),
(77, '7', 'Gorontalo', 'Kabupaten', 'Boalemo', 96319),
(78, '9', 'Jawa Barat', 'Kabupaten', 'Bogor', 16911),
(79, '9', 'Jawa Barat', 'Kota', 'Bogor', 16119),
(80, '11', 'Jawa Timur', 'Kabupaten', 'Bojonegoro', 62119),
(81, '31', 'Sulawesi Utara', 'Kabupaten', 'Bolaang Mongondow (Bolmong)', 95755),
(82, '31', 'Sulawesi Utara', 'Kabupaten', 'Bolaang Mongondow Selatan', 95774),
(83, '31', 'Sulawesi Utara', 'Kabupaten', 'Bolaang Mongondow Timur', 95783),
(84, '31', 'Sulawesi Utara', 'Kabupaten', 'Bolaang Mongondow Utara', 95765),
(85, '30', 'Sulawesi Tenggara', 'Kabupaten', 'Bombana', 93771),
(86, '11', 'Jawa Timur', 'Kabupaten', 'Bondowoso', 68219),
(87, '28', 'Sulawesi Selatan', 'Kabupaten', 'Bone', 92713),
(88, '7', 'Gorontalo', 'Kabupaten', 'Bone Bolango', 96511),
(89, '15', 'Kalimantan Timur', 'Kota', 'Bontang', 75313),
(90, '24', 'Papua', 'Kabupaten', 'Boven Digoel', 99662),
(91, '10', 'Jawa Tengah', 'Kabupaten', 'Boyolali', 57312),
(92, '10', 'Jawa Tengah', 'Kabupaten', 'Brebes', 52212),
(93, '32', 'Sumatera Barat', 'Kota', 'Bukittinggi', 26115),
(94, '1', 'Bali', 'Kabupaten', 'Buleleng', 81111),
(95, '28', 'Sulawesi Selatan', 'Kabupaten', 'Bulukumba', 92511),
(96, '16', 'Kalimantan Utara', 'Kabupaten', 'Bulungan (Bulongan)', 77211),
(97, '8', 'Jambi', 'Kabupaten', 'Bungo', 37216),
(98, '29', 'Sulawesi Tengah', 'Kabupaten', 'Buol', 94564),
(99, '19', 'Maluku', 'Kabupaten', 'Buru', 97371),
(100, '19', 'Maluku', 'Kabupaten', 'Buru Selatan', 97351),
(101, '30', 'Sulawesi Tenggara', 'Kabupaten', 'Buton', 93754),
(102, '30', 'Sulawesi Tenggara', 'Kabupaten', 'Buton Utara', 93745),
(103, '9', 'Jawa Barat', 'Kabupaten', 'Ciamis', 46211),
(104, '9', 'Jawa Barat', 'Kabupaten', 'Cianjur', 43217),
(105, '10', 'Jawa Tengah', 'Kabupaten', 'Cilacap', 53211),
(106, '3', 'Banten', 'Kota', 'Cilegon', 42417),
(107, '9', 'Jawa Barat', 'Kota', 'Cimahi', 40512),
(108, '9', 'Jawa Barat', 'Kabupaten', 'Cirebon', 45611),
(109, '9', 'Jawa Barat', 'Kota', 'Cirebon', 45116),
(110, '34', 'Sumatera Utara', 'Kabupaten', 'Dairi', 22211),
(111, '24', 'Papua', 'Kabupaten', 'Deiyai (Deliyai)', 98784),
(112, '34', 'Sumatera Utara', 'Kabupaten', 'Deli Serdang', 20511),
(113, '10', 'Jawa Tengah', 'Kabupaten', 'Demak', 59519),
(114, '1', 'Bali', 'Kota', 'Denpasar', 80227),
(115, '9', 'Jawa Barat', 'Kota', 'Depok', 16416),
(116, '32', 'Sumatera Barat', 'Kabupaten', 'Dharmasraya', 27612),
(117, '24', 'Papua', 'Kabupaten', 'Dogiyai', 98866),
(118, '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Dompu', 84217),
(119, '29', 'Sulawesi Tengah', 'Kabupaten', 'Donggala', 94341),
(120, '26', 'Riau', 'Kota', 'Dumai', 28811),
(121, '33', 'Sumatera Selatan', 'Kabupaten', 'Empat Lawang', 31811),
(122, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Ende', 86351),
(123, '28', 'Sulawesi Selatan', 'Kabupaten', 'Enrekang', 91719),
(124, '25', 'Papua Barat', 'Kabupaten', 'Fakfak', 98651),
(125, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Flores Timur', 86213),
(126, '9', 'Jawa Barat', 'Kabupaten', 'Garut', 44126),
(127, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Gayo Lues', 24653),
(128, '1', 'Bali', 'Kabupaten', 'Gianyar', 80519),
(129, '7', 'Gorontalo', 'Kabupaten', 'Gorontalo', 96218),
(130, '7', 'Gorontalo', 'Kota', 'Gorontalo', 96115),
(131, '7', 'Gorontalo', 'Kabupaten', 'Gorontalo Utara', 96611),
(132, '28', 'Sulawesi Selatan', 'Kabupaten', 'Gowa', 92111),
(133, '11', 'Jawa Timur', 'Kabupaten', 'Gresik', 61115),
(134, '10', 'Jawa Tengah', 'Kabupaten', 'Grobogan', 58111),
(135, '5', 'DI Yogyakarta', 'Kabupaten', 'Gunung Kidul', 55812),
(136, '14', 'Kalimantan Tengah', 'Kabupaten', 'Gunung Mas', 74511),
(137, '34', 'Sumatera Utara', 'Kota', 'Gunungsitoli', 22813),
(138, '20', 'Maluku Utara', 'Kabupaten', 'Halmahera Barat', 97757),
(139, '20', 'Maluku Utara', 'Kabupaten', 'Halmahera Selatan', 97911),
(140, '20', 'Maluku Utara', 'Kabupaten', 'Halmahera Tengah', 97853),
(141, '20', 'Maluku Utara', 'Kabupaten', 'Halmahera Timur', 97862),
(142, '20', 'Maluku Utara', 'Kabupaten', 'Halmahera Utara', 97762),
(143, '13', 'Kalimantan Selatan', 'Kabupaten', 'Hulu Sungai Selatan', 71212),
(144, '13', 'Kalimantan Selatan', 'Kabupaten', 'Hulu Sungai Tengah', 71313),
(145, '13', 'Kalimantan Selatan', 'Kabupaten', 'Hulu Sungai Utara', 71419),
(146, '34', 'Sumatera Utara', 'Kabupaten', 'Humbang Hasundutan', 22457),
(147, '26', 'Riau', 'Kabupaten', 'Indragiri Hilir', 29212),
(148, '26', 'Riau', 'Kabupaten', 'Indragiri Hulu', 29319),
(149, '9', 'Jawa Barat', 'Kabupaten', 'Indramayu', 45214),
(150, '24', 'Papua', 'Kabupaten', 'Intan Jaya', 98771),
(151, '6', 'DKI Jakarta', 'Kota', 'Jakarta Barat', 11220),
(152, '6', 'DKI Jakarta', 'Kota', 'Jakarta Pusat', 10540),
(153, '6', 'DKI Jakarta', 'Kota', 'Jakarta Selatan', 12230),
(154, '6', 'DKI Jakarta', 'Kota', 'Jakarta Timur', 13330),
(155, '6', 'DKI Jakarta', 'Kota', 'Jakarta Utara', 14140),
(156, '8', 'Jambi', 'Kota', 'Jambi', 36111),
(157, '24', 'Papua', 'Kabupaten', 'Jayapura', 99352),
(158, '24', 'Papua', 'Kota', 'Jayapura', 99114),
(159, '24', 'Papua', 'Kabupaten', 'Jayawijaya', 99511),
(160, '11', 'Jawa Timur', 'Kabupaten', 'Jember', 68113),
(161, '1', 'Bali', 'Kabupaten', 'Jembrana', 82251),
(162, '28', 'Sulawesi Selatan', 'Kabupaten', 'Jeneponto', 92319),
(163, '10', 'Jawa Tengah', 'Kabupaten', 'Jepara', 59419),
(164, '11', 'Jawa Timur', 'Kabupaten', 'Jombang', 61415),
(165, '25', 'Papua Barat', 'Kabupaten', 'Kaimana', 98671),
(166, '26', 'Riau', 'Kabupaten', 'Kampar', 28411),
(167, '14', 'Kalimantan Tengah', 'Kabupaten', 'Kapuas', 73583),
(168, '12', 'Kalimantan Barat', 'Kabupaten', 'Kapuas Hulu', 78719),
(169, '10', 'Jawa Tengah', 'Kabupaten', 'Karanganyar', 57718),
(170, '1', 'Bali', 'Kabupaten', 'Karangasem', 80819),
(171, '9', 'Jawa Barat', 'Kabupaten', 'Karawang', 41311),
(172, '17', 'Kepulauan Riau', 'Kabupaten', 'Karimun', 29611),
(173, '34', 'Sumatera Utara', 'Kabupaten', 'Karo', 22119),
(174, '14', 'Kalimantan Tengah', 'Kabupaten', 'Katingan', 74411),
(175, '4', 'Bengkulu', 'Kabupaten', 'Kaur', 38911),
(176, '12', 'Kalimantan Barat', 'Kabupaten', 'Kayong Utara', 78852),
(177, '10', 'Jawa Tengah', 'Kabupaten', 'Kebumen', 54319),
(178, '11', 'Jawa Timur', 'Kabupaten', 'Kediri', 64184),
(179, '11', 'Jawa Timur', 'Kota', 'Kediri', 64125),
(180, '24', 'Papua', 'Kabupaten', 'Keerom', 99461),
(181, '10', 'Jawa Tengah', 'Kabupaten', 'Kendal', 51314),
(182, '30', 'Sulawesi Tenggara', 'Kota', 'Kendari', 93126),
(183, '4', 'Bengkulu', 'Kabupaten', 'Kepahiang', 39319),
(184, '17', 'Kepulauan Riau', 'Kabupaten', 'Kepulauan Anambas', 29991),
(185, '19', 'Maluku', 'Kabupaten', 'Kepulauan Aru', 97681),
(186, '32', 'Sumatera Barat', 'Kabupaten', 'Kepulauan Mentawai', 25771),
(187, '26', 'Riau', 'Kabupaten', 'Kepulauan Meranti', 28791),
(188, '31', 'Sulawesi Utara', 'Kabupaten', 'Kepulauan Sangihe', 95819),
(189, '6', 'DKI Jakarta', 'Kabupaten', 'Kepulauan Seribu', 14550),
(190, '31', 'Sulawesi Utara', 'Kabupaten', 'Kepulauan Siau Tagulandang Biaro (Sitaro)', 95862),
(191, '20', 'Maluku Utara', 'Kabupaten', 'Kepulauan Sula', 97995),
(192, '31', 'Sulawesi Utara', 'Kabupaten', 'Kepulauan Talaud', 95885),
(193, '24', 'Papua', 'Kabupaten', 'Kepulauan Yapen (Yapen Waropen)', 98211),
(194, '8', 'Jambi', 'Kabupaten', 'Kerinci', 37167),
(195, '12', 'Kalimantan Barat', 'Kabupaten', 'Ketapang', 78874),
(196, '10', 'Jawa Tengah', 'Kabupaten', 'Klaten', 57411),
(197, '1', 'Bali', 'Kabupaten', 'Klungkung', 80719),
(198, '30', 'Sulawesi Tenggara', 'Kabupaten', 'Kolaka', 93511),
(199, '30', 'Sulawesi Tenggara', 'Kabupaten', 'Kolaka Utara', 93911),
(200, '30', 'Sulawesi Tenggara', 'Kabupaten', 'Konawe', 93411),
(201, '30', 'Sulawesi Tenggara', 'Kabupaten', 'Konawe Selatan', 93811),
(202, '30', 'Sulawesi Tenggara', 'Kabupaten', 'Konawe Utara', 93311),
(203, '13', 'Kalimantan Selatan', 'Kabupaten', 'Kotabaru', 72119),
(204, '31', 'Sulawesi Utara', 'Kota', 'Kotamobagu', 95711),
(205, '14', 'Kalimantan Tengah', 'Kabupaten', 'Kotawaringin Barat', 74119),
(206, '14', 'Kalimantan Tengah', 'Kabupaten', 'Kotawaringin Timur', 74364),
(207, '26', 'Riau', 'Kabupaten', 'Kuantan Singingi', 29519),
(208, '12', 'Kalimantan Barat', 'Kabupaten', 'Kubu Raya', 78311),
(209, '10', 'Jawa Tengah', 'Kabupaten', 'Kudus', 59311),
(210, '5', 'DI Yogyakarta', 'Kabupaten', 'Kulon Progo', 55611),
(211, '9', 'Jawa Barat', 'Kabupaten', 'Kuningan', 45511),
(212, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Kupang', 85362),
(213, '23', 'Nusa Tenggara Timur (NTT)', 'Kota', 'Kupang', 85119),
(214, '15', 'Kalimantan Timur', 'Kabupaten', 'Kutai Barat', 75711),
(215, '15', 'Kalimantan Timur', 'Kabupaten', 'Kutai Kartanegara', 75511),
(216, '15', 'Kalimantan Timur', 'Kabupaten', 'Kutai Timur', 75611),
(217, '34', 'Sumatera Utara', 'Kabupaten', 'Labuhan Batu', 21412),
(218, '34', 'Sumatera Utara', 'Kabupaten', 'Labuhan Batu Selatan', 21511),
(219, '34', 'Sumatera Utara', 'Kabupaten', 'Labuhan Batu Utara', 21711),
(220, '33', 'Sumatera Selatan', 'Kabupaten', 'Lahat', 31419),
(221, '14', 'Kalimantan Tengah', 'Kabupaten', 'Lamandau', 74611),
(222, '11', 'Jawa Timur', 'Kabupaten', 'Lamongan', 64125),
(223, '18', 'Lampung', 'Kabupaten', 'Lampung Barat', 34814),
(224, '18', 'Lampung', 'Kabupaten', 'Lampung Selatan', 35511),
(225, '18', 'Lampung', 'Kabupaten', 'Lampung Tengah', 34212),
(226, '18', 'Lampung', 'Kabupaten', 'Lampung Timur', 34319),
(227, '18', 'Lampung', 'Kabupaten', 'Lampung Utara', 34516),
(228, '12', 'Kalimantan Barat', 'Kabupaten', 'Landak', 78319),
(229, '34', 'Sumatera Utara', 'Kabupaten', 'Langkat', 20811),
(230, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Langsa', 24412),
(231, '24', 'Papua', 'Kabupaten', 'Lanny Jaya', 99531),
(232, '3', 'Banten', 'Kabupaten', 'Lebak', 42319),
(233, '4', 'Bengkulu', 'Kabupaten', 'Lebong', 39264),
(234, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Lembata', 86611),
(235, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Lhokseumawe', 24352),
(236, '32', 'Sumatera Barat', 'Kabupaten', 'Lima Puluh Koto/Kota', 26671),
(237, '17', 'Kepulauan Riau', 'Kabupaten', 'Lingga', 29811),
(238, '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Lombok Barat', 83311),
(239, '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Lombok Tengah', 83511),
(240, '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Lombok Timur', 83612),
(241, '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Lombok Utara', 83711),
(242, '33', 'Sumatera Selatan', 'Kota', 'Lubuk Linggau', 31614),
(243, '11', 'Jawa Timur', 'Kabupaten', 'Lumajang', 67319),
(244, '28', 'Sulawesi Selatan', 'Kabupaten', 'Luwu', 91994),
(245, '28', 'Sulawesi Selatan', 'Kabupaten', 'Luwu Timur', 92981),
(246, '28', 'Sulawesi Selatan', 'Kabupaten', 'Luwu Utara', 92911),
(247, '11', 'Jawa Timur', 'Kabupaten', 'Madiun', 63153),
(248, '11', 'Jawa Timur', 'Kota', 'Madiun', 63122),
(249, '10', 'Jawa Tengah', 'Kabupaten', 'Magelang', 56519),
(250, '10', 'Jawa Tengah', 'Kota', 'Magelang', 56133),
(251, '11', 'Jawa Timur', 'Kabupaten', 'Magetan', 63314),
(252, '9', 'Jawa Barat', 'Kabupaten', 'Majalengka', 45412),
(253, '27', 'Sulawesi Barat', 'Kabupaten', 'Majene', 91411),
(254, '28', 'Sulawesi Selatan', 'Kota', 'Makassar', 90111),
(255, '11', 'Jawa Timur', 'Kabupaten', 'Malang', 65163),
(256, '11', 'Jawa Timur', 'Kota', 'Malang', 65112),
(257, '16', 'Kalimantan Utara', 'Kabupaten', 'Malinau', 77511),
(258, '19', 'Maluku', 'Kabupaten', 'Maluku Barat Daya', 97451),
(259, '19', 'Maluku', 'Kabupaten', 'Maluku Tengah', 97513),
(260, '19', 'Maluku', 'Kabupaten', 'Maluku Tenggara', 97651),
(261, '19', 'Maluku', 'Kabupaten', 'Maluku Tenggara Barat', 97465),
(262, '27', 'Sulawesi Barat', 'Kabupaten', 'Mamasa', 91362),
(263, '24', 'Papua', 'Kabupaten', 'Mamberamo Raya', 99381),
(264, '24', 'Papua', 'Kabupaten', 'Mamberamo Tengah', 99553),
(265, '27', 'Sulawesi Barat', 'Kabupaten', 'Mamuju', 91519),
(266, '27', 'Sulawesi Barat', 'Kabupaten', 'Mamuju Utara', 91571),
(267, '31', 'Sulawesi Utara', 'Kota', 'Manado', 95247),
(268, '34', 'Sumatera Utara', 'Kabupaten', 'Mandailing Natal', 22916),
(269, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Manggarai', 86551),
(270, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Manggarai Barat', 86711),
(271, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Manggarai Timur', 86811),
(272, '25', 'Papua Barat', 'Kabupaten', 'Manokwari', 98311),
(273, '25', 'Papua Barat', 'Kabupaten', 'Manokwari Selatan', 98355),
(274, '24', 'Papua', 'Kabupaten', 'Mappi', 99853),
(275, '28', 'Sulawesi Selatan', 'Kabupaten', 'Maros', 90511),
(276, '22', 'Nusa Tenggara Barat (NTB)', 'Kota', 'Mataram', 83131),
(277, '25', 'Papua Barat', 'Kabupaten', 'Maybrat', 98051),
(278, '34', 'Sumatera Utara', 'Kota', 'Medan', 20228),
(279, '12', 'Kalimantan Barat', 'Kabupaten', 'Melawi', 78619),
(280, '8', 'Jambi', 'Kabupaten', 'Merangin', 37319),
(281, '24', 'Papua', 'Kabupaten', 'Merauke', 99613),
(282, '18', 'Lampung', 'Kabupaten', 'Mesuji', 34911),
(283, '18', 'Lampung', 'Kota', 'Metro', 34111),
(284, '24', 'Papua', 'Kabupaten', 'Mimika', 99962),
(285, '31', 'Sulawesi Utara', 'Kabupaten', 'Minahasa', 95614),
(286, '31', 'Sulawesi Utara', 'Kabupaten', 'Minahasa Selatan', 95914),
(287, '31', 'Sulawesi Utara', 'Kabupaten', 'Minahasa Tenggara', 95995),
(288, '31', 'Sulawesi Utara', 'Kabupaten', 'Minahasa Utara', 95316),
(289, '11', 'Jawa Timur', 'Kabupaten', 'Mojokerto', 61382),
(290, '11', 'Jawa Timur', 'Kota', 'Mojokerto', 61316),
(291, '29', 'Sulawesi Tengah', 'Kabupaten', 'Morowali', 94911),
(292, '33', 'Sumatera Selatan', 'Kabupaten', 'Muara Enim', 31315),
(293, '8', 'Jambi', 'Kabupaten', 'Muaro Jambi', 36311),
(294, '4', 'Bengkulu', 'Kabupaten', 'Muko Muko', 38715),
(295, '30', 'Sulawesi Tenggara', 'Kabupaten', 'Muna', 93611),
(296, '14', 'Kalimantan Tengah', 'Kabupaten', 'Murung Raya', 73911),
(297, '33', 'Sumatera Selatan', 'Kabupaten', 'Musi Banyuasin', 30719),
(298, '33', 'Sumatera Selatan', 'Kabupaten', 'Musi Rawas', 31661),
(299, '24', 'Papua', 'Kabupaten', 'Nabire', 98816),
(300, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Nagan Raya', 23674),
(301, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Nagekeo', 86911),
(302, '17', 'Kepulauan Riau', 'Kabupaten', 'Natuna', 29711),
(303, '24', 'Papua', 'Kabupaten', 'Nduga', 99541),
(304, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Ngada', 86413),
(305, '11', 'Jawa Timur', 'Kabupaten', 'Nganjuk', 64414),
(306, '11', 'Jawa Timur', 'Kabupaten', 'Ngawi', 63219),
(307, '34', 'Sumatera Utara', 'Kabupaten', 'Nias', 22876),
(308, '34', 'Sumatera Utara', 'Kabupaten', 'Nias Barat', 22895),
(309, '34', 'Sumatera Utara', 'Kabupaten', 'Nias Selatan', 22865),
(310, '34', 'Sumatera Utara', 'Kabupaten', 'Nias Utara', 22856),
(311, '16', 'Kalimantan Utara', 'Kabupaten', 'Nunukan', 77421),
(312, '33', 'Sumatera Selatan', 'Kabupaten', 'Ogan Ilir', 30811),
(313, '33', 'Sumatera Selatan', 'Kabupaten', 'Ogan Komering Ilir', 30618),
(314, '33', 'Sumatera Selatan', 'Kabupaten', 'Ogan Komering Ulu', 32112),
(315, '33', 'Sumatera Selatan', 'Kabupaten', 'Ogan Komering Ulu Selatan', 32211),
(316, '33', 'Sumatera Selatan', 'Kabupaten', 'Ogan Komering Ulu Timur', 32312),
(317, '11', 'Jawa Timur', 'Kabupaten', 'Pacitan', 63512),
(318, '32', 'Sumatera Barat', 'Kota', 'Padang', 25112),
(319, '34', 'Sumatera Utara', 'Kabupaten', 'Padang Lawas', 22763),
(320, '34', 'Sumatera Utara', 'Kabupaten', 'Padang Lawas Utara', 22753),
(321, '32', 'Sumatera Barat', 'Kota', 'Padang Panjang', 27122),
(322, '32', 'Sumatera Barat', 'Kabupaten', 'Padang Pariaman', 25583),
(323, '34', 'Sumatera Utara', 'Kota', 'Padang Sidempuan', 22727),
(324, '33', 'Sumatera Selatan', 'Kota', 'Pagar Alam', 31512),
(325, '34', 'Sumatera Utara', 'Kabupaten', 'Pakpak Bharat', 22272),
(326, '14', 'Kalimantan Tengah', 'Kota', 'Palangka Raya', 73112),
(327, '33', 'Sumatera Selatan', 'Kota', 'Palembang', 31512),
(328, '28', 'Sulawesi Selatan', 'Kota', 'Palopo', 91911),
(329, '29', 'Sulawesi Tengah', 'Kota', 'Palu', 94111),
(330, '11', 'Jawa Timur', 'Kabupaten', 'Pamekasan', 69319),
(331, '3', 'Banten', 'Kabupaten', 'Pandeglang', 42212),
(332, '9', 'Jawa Barat', 'Kabupaten', 'Pangandaran', 46511),
(333, '28', 'Sulawesi Selatan', 'Kabupaten', 'Pangkajene Kepulauan', 90611),
(334, '2', 'Bangka Belitung', 'Kota', 'Pangkal Pinang', 33115),
(335, '24', 'Papua', 'Kabupaten', 'Paniai', 98765),
(336, '28', 'Sulawesi Selatan', 'Kota', 'Parepare', 91123),
(337, '32', 'Sumatera Barat', 'Kota', 'Pariaman', 25511),
(338, '29', 'Sulawesi Tengah', 'Kabupaten', 'Parigi Moutong', 94411),
(339, '32', 'Sumatera Barat', 'Kabupaten', 'Pasaman', 26318),
(340, '32', 'Sumatera Barat', 'Kabupaten', 'Pasaman Barat', 26511),
(341, '15', 'Kalimantan Timur', 'Kabupaten', 'Paser', 76211),
(342, '11', 'Jawa Timur', 'Kabupaten', 'Pasuruan', 67153),
(343, '11', 'Jawa Timur', 'Kota', 'Pasuruan', 67118),
(344, '10', 'Jawa Tengah', 'Kabupaten', 'Pati', 59114),
(345, '32', 'Sumatera Barat', 'Kota', 'Payakumbuh', 26213),
(346, '25', 'Papua Barat', 'Kabupaten', 'Pegunungan Arfak', 98354),
(347, '24', 'Papua', 'Kabupaten', 'Pegunungan Bintang', 99573),
(348, '10', 'Jawa Tengah', 'Kabupaten', 'Pekalongan', 51161),
(349, '10', 'Jawa Tengah', 'Kota', 'Pekalongan', 51122),
(350, '26', 'Riau', 'Kota', 'Pekanbaru', 28112),
(351, '26', 'Riau', 'Kabupaten', 'Pelalawan', 28311),
(352, '10', 'Jawa Tengah', 'Kabupaten', 'Pemalang', 52319),
(353, '34', 'Sumatera Utara', 'Kota', 'Pematang Siantar', 21126),
(354, '15', 'Kalimantan Timur', 'Kabupaten', 'Penajam Paser Utara', 76311),
(355, '18', 'Lampung', 'Kabupaten', 'Pesawaran', 35312),
(356, '18', 'Lampung', 'Kabupaten', 'Pesisir Barat', 35974),
(357, '32', 'Sumatera Barat', 'Kabupaten', 'Pesisir Selatan', 25611),
(358, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Pidie', 24116),
(359, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Pidie Jaya', 24186),
(360, '28', 'Sulawesi Selatan', 'Kabupaten', 'Pinrang', 91251),
(361, '7', 'Gorontalo', 'Kabupaten', 'Pohuwato', 96419),
(362, '27', 'Sulawesi Barat', 'Kabupaten', 'Polewali Mandar', 91311),
(363, '11', 'Jawa Timur', 'Kabupaten', 'Ponorogo', 63411),
(364, '12', 'Kalimantan Barat', 'Kabupaten', 'Pontianak', 78971),
(365, '12', 'Kalimantan Barat', 'Kota', 'Pontianak', 78112),
(366, '29', 'Sulawesi Tengah', 'Kabupaten', 'Poso', 94615),
(367, '33', 'Sumatera Selatan', 'Kota', 'Prabumulih', 31121),
(368, '18', 'Lampung', 'Kabupaten', 'Pringsewu', 35719),
(369, '11', 'Jawa Timur', 'Kabupaten', 'Probolinggo', 67282),
(370, '11', 'Jawa Timur', 'Kota', 'Probolinggo', 67215),
(371, '14', 'Kalimantan Tengah', 'Kabupaten', 'Pulang Pisau', 74811),
(372, '20', 'Maluku Utara', 'Kabupaten', 'Pulau Morotai', 97771),
(373, '24', 'Papua', 'Kabupaten', 'Puncak', 98981),
(374, '24', 'Papua', 'Kabupaten', 'Puncak Jaya', 98979),
(375, '10', 'Jawa Tengah', 'Kabupaten', 'Purbalingga', 53312),
(376, '9', 'Jawa Barat', 'Kabupaten', 'Purwakarta', 41119),
(377, '10', 'Jawa Tengah', 'Kabupaten', 'Purworejo', 54111),
(378, '25', 'Papua Barat', 'Kabupaten', 'Raja Ampat', 98489),
(379, '4', 'Bengkulu', 'Kabupaten', 'Rejang Lebong', 39112),
(380, '10', 'Jawa Tengah', 'Kabupaten', 'Rembang', 59219),
(381, '26', 'Riau', 'Kabupaten', 'Rokan Hilir', 28992),
(382, '26', 'Riau', 'Kabupaten', 'Rokan Hulu', 28511),
(383, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Rote Ndao', 85982),
(384, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Sabang', 23512),
(385, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sabu Raijua', 85391),
(386, '10', 'Jawa Tengah', 'Kota', 'Salatiga', 50711),
(387, '15', 'Kalimantan Timur', 'Kota', 'Samarinda', 75133),
(388, '12', 'Kalimantan Barat', 'Kabupaten', 'Sambas', 79453),
(389, '34', 'Sumatera Utara', 'Kabupaten', 'Samosir', 22392),
(390, '11', 'Jawa Timur', 'Kabupaten', 'Sampang', 69219),
(391, '12', 'Kalimantan Barat', 'Kabupaten', 'Sanggau', 78557),
(392, '24', 'Papua', 'Kabupaten', 'Sarmi', 99373),
(393, '8', 'Jambi', 'Kabupaten', 'Sarolangun', 37419),
(394, '32', 'Sumatera Barat', 'Kota', 'Sawah Lunto', 27416),
(395, '12', 'Kalimantan Barat', 'Kabupaten', 'Sekadau', 79583),
(396, '28', 'Sulawesi Selatan', 'Kabupaten', 'Selayar (Kepulauan Selayar)', 92812),
(397, '4', 'Bengkulu', 'Kabupaten', 'Seluma', 38811),
(398, '10', 'Jawa Tengah', 'Kabupaten', 'Semarang', 50511),
(399, '10', 'Jawa Tengah', 'Kota', 'Semarang', 50135),
(400, '19', 'Maluku', 'Kabupaten', 'Seram Bagian Barat', 97561),
(401, '19', 'Maluku', 'Kabupaten', 'Seram Bagian Timur', 97581),
(402, '3', 'Banten', 'Kabupaten', 'Serang', 42182),
(403, '3', 'Banten', 'Kota', 'Serang', 42111),
(404, '34', 'Sumatera Utara', 'Kabupaten', 'Serdang Bedagai', 20915),
(405, '14', 'Kalimantan Tengah', 'Kabupaten', 'Seruyan', 74211),
(406, '26', 'Riau', 'Kabupaten', 'Siak', 28623),
(407, '34', 'Sumatera Utara', 'Kota', 'Sibolga', 22522),
(408, '28', 'Sulawesi Selatan', 'Kabupaten', 'Sidenreng Rappang/Rapang', 91613),
(409, '11', 'Jawa Timur', 'Kabupaten', 'Sidoarjo', 61219),
(410, '29', 'Sulawesi Tengah', 'Kabupaten', 'Sigi', 94364),
(411, '32', 'Sumatera Barat', 'Kabupaten', 'Sijunjung (Sawah Lunto Sijunjung)', 27511),
(412, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sikka', 86121),
(413, '34', 'Sumatera Utara', 'Kabupaten', 'Simalungun', 21162),
(414, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Simeulue', 23891),
(415, '12', 'Kalimantan Barat', 'Kota', 'Singkawang', 79117),
(416, '28', 'Sulawesi Selatan', 'Kabupaten', 'Sinjai', 92615),
(417, '12', 'Kalimantan Barat', 'Kabupaten', 'Sintang', 78619),
(418, '11', 'Jawa Timur', 'Kabupaten', 'Situbondo', 68316),
(419, '5', 'DI Yogyakarta', 'Kabupaten', 'Sleman', 55513),
(420, '32', 'Sumatera Barat', 'Kabupaten', 'Solok', 27365),
(421, '32', 'Sumatera Barat', 'Kota', 'Solok', 27315),
(422, '32', 'Sumatera Barat', 'Kabupaten', 'Solok Selatan', 27779),
(423, '28', 'Sulawesi Selatan', 'Kabupaten', 'Soppeng', 90812),
(424, '25', 'Papua Barat', 'Kabupaten', 'Sorong', 98431),
(425, '25', 'Papua Barat', 'Kota', 'Sorong', 98411),
(426, '25', 'Papua Barat', 'Kabupaten', 'Sorong Selatan', 98454),
(427, '10', 'Jawa Tengah', 'Kabupaten', 'Sragen', 57211),
(428, '9', 'Jawa Barat', 'Kabupaten', 'Subang', 41215),
(429, '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Subulussalam', 24882),
(430, '9', 'Jawa Barat', 'Kabupaten', 'Sukabumi', 43311),
(431, '9', 'Jawa Barat', 'Kota', 'Sukabumi', 43114),
(432, '14', 'Kalimantan Tengah', 'Kabupaten', 'Sukamara', 74712),
(433, '10', 'Jawa Tengah', 'Kabupaten', 'Sukoharjo', 57514),
(434, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sumba Barat', 87219),
(435, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sumba Barat Daya', 87453),
(436, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sumba Tengah', 87358),
(437, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sumba Timur', 87112),
(438, '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Sumbawa', 84315),
(439, '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Sumbawa Barat', 84419),
(440, '9', 'Jawa Barat', 'Kabupaten', 'Sumedang', 45326),
(441, '11', 'Jawa Timur', 'Kabupaten', 'Sumenep', 69413),
(442, '8', 'Jambi', 'Kota', 'Sungaipenuh', 37113),
(443, '24', 'Papua', 'Kabupaten', 'Supiori', 98164),
(444, '11', 'Jawa Timur', 'Kota', 'Surabaya', 60119),
(445, '10', 'Jawa Tengah', 'Kota', 'Surakarta (Solo)', 57113),
(446, '13', 'Kalimantan Selatan', 'Kabupaten', 'Tabalong', 71513),
(447, '1', 'Bali', 'Kabupaten', 'Tabanan', 82119),
(448, '28', 'Sulawesi Selatan', 'Kabupaten', 'Takalar', 92212),
(449, '25', 'Papua Barat', 'Kabupaten', 'Tambrauw', 98475),
(450, '16', 'Kalimantan Utara', 'Kabupaten', 'Tana Tidung', 77611),
(451, '28', 'Sulawesi Selatan', 'Kabupaten', 'Tana Toraja', 91819),
(452, '13', 'Kalimantan Selatan', 'Kabupaten', 'Tanah Bumbu', 72211),
(453, '32', 'Sumatera Barat', 'Kabupaten', 'Tanah Datar', 27211),
(454, '13', 'Kalimantan Selatan', 'Kabupaten', 'Tanah Laut', 70811),
(455, '3', 'Banten', 'Kabupaten', 'Tangerang', 15914),
(456, '3', 'Banten', 'Kota', 'Tangerang', 15111),
(457, '3', 'Banten', 'Kota', 'Tangerang Selatan', 15332),
(458, '18', 'Lampung', 'Kabupaten', 'Tanggamus', 35619),
(459, '34', 'Sumatera Utara', 'Kota', 'Tanjung Balai', 21321),
(460, '8', 'Jambi', 'Kabupaten', 'Tanjung Jabung Barat', 36513),
(461, '8', 'Jambi', 'Kabupaten', 'Tanjung Jabung Timur', 36719),
(462, '17', 'Kepulauan Riau', 'Kota', 'Tanjung Pinang', 29111),
(463, '34', 'Sumatera Utara', 'Kabupaten', 'Tapanuli Selatan', 22742),
(464, '34', 'Sumatera Utara', 'Kabupaten', 'Tapanuli Tengah', 22611),
(465, '34', 'Sumatera Utara', 'Kabupaten', 'Tapanuli Utara', 22414),
(466, '13', 'Kalimantan Selatan', 'Kabupaten', 'Tapin', 71119),
(467, '16', 'Kalimantan Utara', 'Kota', 'Tarakan', 77114),
(468, '9', 'Jawa Barat', 'Kabupaten', 'Tasikmalaya', 46411),
(469, '9', 'Jawa Barat', 'Kota', 'Tasikmalaya', 46116),
(470, '34', 'Sumatera Utara', 'Kota', 'Tebing Tinggi', 20632),
(471, '8', 'Jambi', 'Kabupaten', 'Tebo', 37519),
(472, '10', 'Jawa Tengah', 'Kabupaten', 'Tegal', 52419),
(473, '10', 'Jawa Tengah', 'Kota', 'Tegal', 52114),
(474, '25', 'Papua Barat', 'Kabupaten', 'Teluk Bintuni', 98551),
(475, '25', 'Papua Barat', 'Kabupaten', 'Teluk Wondama', 98591),
(476, '10', 'Jawa Tengah', 'Kabupaten', 'Temanggung', 56212),
(477, '20', 'Maluku Utara', 'Kota', 'Ternate', 97714),
(478, '20', 'Maluku Utara', 'Kota', 'Tidore Kepulauan', 97815),
(479, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Timor Tengah Selatan', 85562),
(480, '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Timor Tengah Utara', 85612),
(481, '34', 'Sumatera Utara', 'Kabupaten', 'Toba Samosir', 22316),
(482, '29', 'Sulawesi Tengah', 'Kabupaten', 'Tojo Una-Una', 94683),
(483, '29', 'Sulawesi Tengah', 'Kabupaten', 'Toli-Toli', 94542),
(484, '24', 'Papua', 'Kabupaten', 'Tolikara', 99411),
(485, '31', 'Sulawesi Utara', 'Kota', 'Tomohon', 95416),
(486, '28', 'Sulawesi Selatan', 'Kabupaten', 'Toraja Utara', 91831),
(487, '11', 'Jawa Timur', 'Kabupaten', 'Trenggalek', 66312),
(488, '19', 'Maluku', 'Kota', 'Tual', 97612),
(489, '11', 'Jawa Timur', 'Kabupaten', 'Tuban', 62319),
(490, '18', 'Lampung', 'Kabupaten', 'Tulang Bawang', 34613),
(491, '18', 'Lampung', 'Kabupaten', 'Tulang Bawang Barat', 34419),
(492, '11', 'Jawa Timur', 'Kabupaten', 'Tulungagung', 66212),
(493, '28', 'Sulawesi Selatan', 'Kabupaten', 'Wajo', 90911),
(494, '30', 'Sulawesi Tenggara', 'Kabupaten', 'Wakatobi', 93791),
(495, '24', 'Papua', 'Kabupaten', 'Waropen', 98269),
(496, '18', 'Lampung', 'Kabupaten', 'Way Kanan', 34711),
(497, '10', 'Jawa Tengah', 'Kabupaten', 'Wonogiri', 57619),
(498, '10', 'Jawa Tengah', 'Kabupaten', 'Wonosobo', 56311),
(499, '24', 'Papua', 'Kabupaten', 'Yahukimo', 99041),
(500, '24', 'Papua', 'Kabupaten', 'Yalimo', 99481),
(501, '5', 'DI Yogyakarta', 'Kota', 'Yogyakarta', 55222);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_mapel_kd`
--

CREATE TABLE IF NOT EXISTS `sr_mapel_kd` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_guru` int(6) UNSIGNED NOT NULL DEFAULT 0,
  `id_mapel` int(6) NOT NULL,
  `tingkat` int(2) NOT NULL,
  `semester` enum('0','1','2') NOT NULL,
  `no_kd` varchar(5) NOT NULL,
  `jenis` enum('P','K','SSp','SSo') NOT NULL,
  `bobot` int(2) NOT NULL,
  `nama_kd` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_guru` (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=1169 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_mapel_kd`
--

INSERT INTO `sr_mapel_kd` (`id`, `id_guru`, `id_mapel`, `tingkat`, `semester`, `no_kd`, `jenis`, `bobot`, `nama_kd`) VALUES
(1, 0, 0, 0, '0', '', 'SSo', 0, 'jujur'),
(2, 0, 0, 0, '0', '', 'SSo', 0, 'disiplin'),
(3, 0, 0, 0, '0', '', 'SSo', 0, 'tanggung jawab'),
(4, 0, 0, 0, '0', '', 'SSo', 0, 'toleransi'),
(5, 0, 0, 0, '0', '', 'SSo', 0, 'gotong royong'),
(6, 0, 0, 0, '0', '', 'SSo', 0, 'santun'),
(7, 0, 0, 0, '0', '', 'SSo', 0, 'percaya diri'),
(8, 0, 0, 0, '0', '', 'SSp', 0, 'berdoa sebelum dan sesudah melakukan kegiatan		'),
(9, 0, 0, 0, '0', '', 'SSp', 0, 'menjalankan ibadah sesuai dengan agamanya		'),
(10, 0, 0, 0, '0', '', 'SSp', 0, 'memberi salam pada saat awal dan akhir kegiatan		'),
(11, 0, 0, 0, '0', '', 'SSp', 0, 'bersyukur atas nikmat dan karunia Tuhan Yang Maha Esa		'),
(12, 0, 0, 0, '0', '', 'SSp', 0, 'mensyukuri kemampuan manusia dalam mengendalikan diri		'),
(13, 0, 0, 0, '0', '', 'SSp', 0, 'bersyukur ketika berhasil mengerjakan sesuatu		'),
(14, 0, 0, 0, '0', '', 'SSp', 0, 'berserah diri (tawakal) kepada Tuhan setelah berikhtiar atau melakukan usaha		'),
(15, 0, 0, 0, '0', '', 'SSp', 0, 'memelihara hubungan baik dengan sesama umat		'),
(16, 0, 0, 0, '0', '', 'SSp', 0, 'bersyukur sebagai bangsa Indonesia		'),
(17, 0, 0, 0, '0', '', 'SSp', 0, 'menghormati orang lain yang menjalankan ibadah sesuai dengan agamanya		\r\n'),
(18, 16, 2, 7, '1', 'K01', 'P', 0, 'Memahami dalil, dasar dan tujuan akidah Islam'),
(19, 16, 2, 7, '1', 'K01', 'K', 0, 'Menyajikan fakta dan fenomena kebenaran akidah Islam'),
(20, 16, 2, 7, '1', 'K02', 'P', 0, 'Mengidentifikasi sifat-sifat wajib Allah yang nafsiyah, salbiyah, ma\"ani dan ma\"nawiyah'),
(21, 16, 2, 7, '1', 'K02', 'K', 0, 'Menyajikan contoh fenomena kehidupan yang muncul sebagai bukti dari sifat wajib, mustahil, jaiz'),
(22, 16, 2, 7, '1', 'K03', 'P', 0, 'Memahami pengertian contoh dan dampak positif sifat ikhlas, taat, khauf dan taubat'),
(25, 16, 9, 7, '1', 'K01', 'K', 0, 'Ketrampilan 1'),
(26, 16, 9, 7, '1', 'K02', 'K', 0, 'Kompetensi Ketrampilan 2'),
(28, 16, 2, 7, '1', 'K04', 'P', 0, 'Memahami adab shalat dan dzikir'),
(29, 10, 9, 8, '1', 'K01', 'P', 0, 'memahami sistem gerak pada manusia'),
(30, 10, 9, 8, '1', 'K01', 'K', 0, 'membuat tulisan berbagai gangguanpada sistem gerak manusia'),
(33, 11, 8, 9, '1', 'Kd1', 'P', 0, 'Memahami sifat dan operasi aljabar  pada bilangan berpangkat dan bentuk akar'),
(34, 11, 8, 9, '1', 'Kd2', 'P', 0, 'memahami perbandingan bertingkat dan persentase serta mendiskripsikan permasalahan menggunakan tabel'),
(38, 15, 10, 7, '1', 'kd 01', 'P', 0, 'Memahami konsep ruang dan interaksi antar ruang di Indonesia'),
(40, 5, 5, 7, '1', 'k01', 'P', 0, 'memahami sejarah komitmen'),
(41, 15, 10, 7, '1', 'KD02', 'P', 0, 'mengidentifikasi interaksi sosial dalam ruang dan pengaruhnya terhadap kehidupan sosial'),
(42, 15, 10, 7, '1', 'KD01', 'K', 0, 'menjelaskan konsep ruang dan interaksi antara ruang di Indonesia'),
(43, 15, 10, 7, '1', 'KD02', 'K', 0, 'menyajikan hasil indentifikasi tentang interaksin sosial dalam ruang'),
(44, 15, 10, 7, '1', 'K03', 'P', 0, 'memahami konsep interaksi antara  manusia dengan ruang'),
(45, 20, 14, 7, '1', 'KD311', 'P', 0, 'jenis, sifat, karakter, dan teknik pengolahan serat dan tekstil'),
(46, 20, 14, 7, '1', 'KD312', 'P', 0, 'prinsip perancangan, pembuatan, dan penyajian produk kerajinan dari bahan serat dan tekstil'),
(47, 10, 9, 8, '1', 'K02', 'P', 0, 'memahami  gerak lurus dan pengaruh gaya terhadap gerak berdasarkan hukum Newton'),
(48, 10, 9, 8, '1', 'K03', 'P', 0, 'menerapkan konsep usaha dan pesawat sederhana'),
(49, 10, 9, 8, '1', 'K04', 'P', 0, 'menganalisis keterkaitan struktur jaringan tumbuhan danpemanfatannya dalam teknologi'),
(50, 10, 9, 8, '1', 'K05', 'P', 0, 'menganalisis sistem pencernaan pada manusia'),
(52, 20, 14, 7, '1', 'KD321', 'P', 0, 'perkembangan teknologi, keselamatan kerja, sketsa, dan gambar teknik '),
(53, 20, 14, 7, '1', 'KD322', 'P', 0, 'karakteristik, kekuatan bahan, serta peralatan kerja pengolahnya'),
(54, 20, 14, 7, '1', 'KD331', 'P', 0, 'tanaman sayuran yang dapat dikembangkan  sesuai kebutuhan wilayah setempat'),
(55, 20, 14, 7, '1', 'KD332', 'P', 0, 'Memahami tahapan budidaya tanaman sayuran'),
(56, 20, 14, 7, '1', 'KD341', 'P', 0, 'pembuatan, penyajian dan pengemasan bahan pangan buah menjadi makanan dan  minuman segar'),
(57, 20, 14, 7, '1', 'KD342', 'P', 0, 'pembuatan, penyajian dan pengemasan bahan hasil samping dari pengolahan makanan dan minuman buah seg'),
(58, 20, 14, 8, '1', 'KD3.1', 'P', 0, 'memahami pengetahuan tentang jenis, sifat, karakter dan teknik pengolahan bahan lunak  '),
(59, 20, 14, 8, '1', 'KD3.1', 'P', 0, 'memahami pengetahuan tentang prinsip perancangan, pembuatan, dan penyajian produk kerajinan \r\n'),
(60, 20, 14, 8, '1', 'KD3.2', 'P', 0, 'memahamiperkembangan, peralatan, dan media pengantar teknologi informasi dan komunikasi\r\n'),
(61, 20, 14, 8, '1', 'KD3.2', 'P', 0, 'memahami penerapan jenis, karakteristik, dan istilah-istilah teknologi informasi dan komunikasi\r\n'),
(62, 20, 14, 8, '1', 'KD3.3', 'P', 0, 'memahami komoditas ternak kesayangan yang dapat dikembangkan sesuai kebutuhan wilayah setempat\r\n'),
(63, 20, 14, 8, '1', 'KD3.3', 'P', 0, ' memahamikebutuhan dan karakteristik sarana dan peralatan budidaya ternak kesayangan '),
(65, 20, 14, 8, '1', 'KD3.3', 'P', 0, 'memahami tahapan budidaya ternak kesayangan '),
(66, 20, 14, 8, '1', 'KD3.4', 'P', 0, 'menganalisis rancangan pembuatan bahan pangan serealia, kacang-kacangan dan umbi menjadi makanan dan'),
(67, 20, 14, 7, '1', 'KD411', 'K', 0, 'pengolahan serat/tekstil '),
(68, 20, 14, 7, '1', 'KD412', 'K', 0, 'menyajikan produk kerajinan dari bahan serat/tekstil yang kreatif dan inovatif'),
(69, 20, 14, 7, '1', 'KD421', 'K', 0, 'sketsa dan gambar teknik dari suatu rancangan produk'),
(70, 20, 14, 7, '1', 'KD422', 'K', 0, 'produk sederhana menggunakan peralatan kerja sesuai dengan jenis, karakteristik, dan kekuatan bahan'),
(71, 20, 14, 7, '1', 'KD431', 'K', 0, 'komoditas tanaman sayuran yang akan dibudidayakan  sesuai kebutuhan wilayah'),
(72, 20, 14, 7, '1', 'KD432', 'K', 0, 'tahapan budidaya tanaman sayuran'),
(73, 20, 14, 7, '1', 'KD441', 'K', 0, 'Buah segar menjadi makanan dan minuman  sesuai pengetahuan rancangan dan bahan'),
(74, 20, 14, 7, '1', 'KD442', 'K', 0, 'menyaji, dan mengemas bahan hasil samping dari pengolahan makanan dan minuman buah segar  menjadi pr'),
(75, 20, 14, 8, '1', 'KD4.1', 'K', 0, 'memilih jenis bahan dan teknik pengolahan bahan lunak yang sesuai dengan potensi daerah setempat '),
(76, 20, 14, 8, '1', 'KD4.1', 'K', 0, 'perancangan, pembuatan dan penyajian produk kerajinan dari bahan lunak yang kreatif dan inovatif, se'),
(77, 20, 14, 8, '1', 'KD4.2', 'K', 0, 'memanipulasi sistem teknologi informasi dan komunikasi'),
(78, 20, 14, 8, '1', 'KD4.2', 'K', 0, 'membuat produk teknologi informasi dan komunikasi dengan menggunakan bahan-bahan yang tersedia di se'),
(79, 20, 14, 8, '1', 'KD4.3', 'K', 0, 'menentukan komoditas ternak kesayangan  yang dapat dikembangkan sesuai kebutuhan wilayah setempat'),
(80, 20, 14, 8, '1', 'KD4.3', 'K', 0, 'mempersiapkan sarana dan peralatan budidaya ternak kesayangan '),
(82, 20, 14, 8, '1', 'KD4.3', 'K', 0, 'mempraktikkan tahapan budidaya ternak kesayangan'),
(84, 19, 9, 7, '1', 'K01', 'P', 0, 'Menerapkan konsep pengukuran berbagai besaran menggunakan satuan setandar'),
(85, 19, 9, 7, '1', 'K02', 'P', 0, 'Mengklasifikasikan makhluk hidup dan benda berdasarkan karakteristik yang diamati'),
(86, 19, 9, 7, '1', 'K03', 'P', 0, 'Menjelaskan konsep campuran dan zat tunggal (unsur dan senyawa),sifat fisika dan kimia'),
(88, 19, 9, 7, '1', 'K04', 'P', 0, 'Menganalisis konsep suhu, pemuian,kalor,perpindahan kalor,dan penerapan dalam kehidupan'),
(89, 19, 9, 7, '1', 'K05', 'P', 0, 'Menganalisis konsep energi,berbagai sumber energi,dan perubahan bentuk energi dalam kehidupan'),
(91, 19, 9, 7, '1', 'K01', 'K', 0, 'Menyajikan data hasil pengukuran dengan alat ukur'),
(92, 19, 9, 7, '1', 'K02', 'K', 0, 'Menyajikan hasil pengklasifikasian makhluk hidup'),
(93, 19, 9, 7, '1', 'K03', 'K', 0, 'Menyajikan hasil penyelidikan atau karya tentang sifat larutan, perubahan fisika dan kimia'),
(95, 19, 9, 7, '1', 'K04', 'K', 0, 'Melakukan percobaan untuk menyelidiki pengaruh kalor,suhu, dan wujud benda'),
(96, 19, 9, 7, '1', 'K05', 'K', 0, 'Menyajikan hasil percobaan tentang perubahan bentuk energi'),
(98, 10, 9, 8, '1', 'K06', 'P', 0, 'Menjelaskan berbagai zat aditif dalam makanan dan minuman, zat adiktif, serta dampaknya terhadap kes'),
(99, 10, 9, 8, '1', 'K02', 'K', 0, 'menyajikan hasil penyelidikan pengaruh gaya terhadap gerak benda'),
(100, 10, 9, 8, '1', 'K03', 'K', 0, 'mnyajikan hasil penyelidikan tentang manfaat penggunaan pesawat sederhana'),
(101, 10, 9, 8, '1', 'K04', 'K', 0, 'mengkomunikasikan teknologi yang terinspirasi oleh hasil pengamatan struktur tumbuhan'),
(102, 10, 9, 8, '1', 'K05', 'K', 0, 'menyajikan hasil penyelidikan tentang pencernaan mekanis dan kimiawi'),
(103, 10, 9, 8, '1', 'K06', 'K', 0, 'membuat karya tulis tentang dampak penyalahgunaan zat aditif dan zat adiktif bagi kesehatan'),
(107, 1, 15, 9, '1', '2.1', 'P', 0, 'Praktek membaca cerita pendek'),
(108, 1, 15, 9, '1', '2.2', 'P', 0, 'mendiskusikan praktek membaca cerita pendek'),
(109, 1, 15, 9, '1', '2.3', 'P', 0, 'Melagukan tembang Sinom'),
(110, 1, 15, 9, '1', '2.4', 'P', 0, 'Melagukan Tembang Dhandhanggula'),
(111, 1, 15, 9, '1', '3.1', 'P', 0, 'Menanggapi cerita pendek kegiatan di sekolah'),
(112, 1, 15, 9, '1', '3.2 ', 'P', 0, 'Menanggapi naskah cerita pendek kegiatan lingkungan tempat tinggal'),
(113, 1, 15, 9, '1', '4.1', 'P', 0, 'Menulis cerita pendek kegiata  sekolah'),
(114, 1, 15, 9, '1', '4.2', 'P', 0, 'Menulis cerita gambar kegiatan sekolah'),
(115, 1, 15, 9, '1', '4.3', 'P', 0, 'menulis cerita pendek kegiatan lingkungan tempat tinggal'),
(117, 13, 13, 7, '1', 'KD01', 'P', 0, 'Memahami konsep permainan bola besar'),
(118, 13, 13, 7, '1', 'KD02', 'P', 0, 'Memahami konsep permainan bola kecil'),
(119, 13, 13, 7, '1', 'KD03', 'P', 0, 'Memahami konsep nomor atletik'),
(120, 13, 13, 7, '1', 'KD05', 'P', 0, 'Memahami konsep senam lantai'),
(121, 13, 13, 7, '1', 'KD06', 'P', 0, 'Memahami konsep aktivitas ritmik'),
(122, 13, 13, 7, '1', 'KD07', 'P', 0, 'Memahami konsep kebugaran jasmani'),
(125, 13, 13, 7, '1', 'KD01', 'K', 0, 'Mempraktikkan permainan bola besar'),
(126, 13, 13, 7, '1', 'KD02', 'K', 0, 'Mempraktikkan permainan bola kecil'),
(127, 13, 13, 7, '1', 'KD03', 'K', 0, 'Mempraktikkan nomor atletik'),
(128, 13, 13, 7, '1', 'KD05', 'K', 0, 'Mempraktikkan senam lantai'),
(129, 13, 13, 7, '1', 'KD06', 'K', 0, 'Mempraktikkan aktivitas ritmik'),
(130, 13, 13, 7, '1', 'KD07', 'K', 0, 'Mempraktikkan latihan kebugaran jasmani'),
(133, 5, 5, 7, '1', 'k02', 'P', 0, 'memahami semangat pendiri negara dalam perumusan pancasila'),
(134, 5, 5, 7, '1', 'k03', 'P', 0, 'sejarah pengesahan uud negara RI'),
(135, 5, 5, 7, '1', 'k04', 'P', 0, 'memahami keragaman suku agama ras budaya'),
(136, 15, 10, 7, '1', 'K04', 'P', 0, 'memahami kronologi perubahan dan kesinambungan dalam kihidupan bangsa Indonesia'),
(138, 13, 13, 8, '1', 'KD01', 'P', 0, 'Memahami konsep permainan bola besar.'),
(139, 13, 13, 8, '1', 'KD02', 'P', 0, 'Memahami konsep permainan bola kecil.'),
(140, 13, 13, 8, '1', 'KD03', 'P', 0, 'Memahami konsep nomor atletik '),
(141, 13, 13, 8, '1', 'KD05', 'P', 0, 'Memahami konsep senam lantai '),
(142, 13, 13, 8, '1', 'KD06', 'P', 0, 'Memahami konsep aktivitas ritmik '),
(143, 13, 13, 8, '1', 'KD07', 'P', 0, 'Memahami konsep kebugaran jasmani'),
(146, 13, 13, 8, '1', 'KD01', 'K', 0, 'Mempraktikkan permainan bola besar.'),
(147, 13, 13, 8, '1', 'KD02', 'K', 0, 'Mempraktikkan permainan bola kecil '),
(148, 13, 13, 8, '1', 'KD03', 'K', 0, 'Mempraktikkan keterampilan atletik'),
(149, 13, 13, 8, '1', 'KD05', 'K', 0, 'Mempraktikkan senam lantai '),
(150, 13, 13, 8, '1', 'KD06', 'K', 0, 'Mempraktikkan aktivitas ritmik'),
(151, 13, 13, 8, '1', 'KD07', 'K', 0, 'Mempraktikkan latihan kebugaran jasmani'),
(154, 15, 10, 7, '1', 'K03', 'K', 0, 'menjelaskan hasil analisis tentang konsep intruksi antara manusia dengan ruang'),
(155, 15, 10, 7, '1', 'K04', 'K', 0, 'menguraikan kronologi perubahan dan kesinambungan dalam kehidupan bangsa Indonesia'),
(156, 5, 5, 7, '1', '4.1', 'K', 0, 'menyaji hasil telaah sejarah semangat pendiri negara dalam merumuskan dasar negara'),
(157, 5, 5, 7, '1', 'k.2', 'K', 0, 'menyaji hasil telaah tentang pengesahan uud 1945'),
(158, 5, 5, 7, '1', 'k.3', 'K', 0, 'menyajikan isi pembukaan uud ri'),
(159, 5, 5, 7, '1', 'k.4', 'K', 0, 'menyaji hasil pengamatan tentang norma norma yang berlaku dalam masyarakat'),
(160, 9, 8, 7, '1', '3.1  ', 'P', 0, 'Menjelaskan,menguraikan dan mengoprasikan Bilangan'),
(161, 9, 8, 7, '1', '3.2', 'P', 0, 'Menjelaskan dan mengoprasikan Himpunan'),
(162, 9, 8, 7, '1', '3.3', 'P', 0, 'Mampu menyelesaikan operasi bentuk aljabar'),
(163, 9, 8, 7, '1', '3.4', 'P', 0, 'Menjelaskan Persamaan dan pertidak samaan linear satu variabel'),
(164, 16, 2, 7, '1', 'K05', 'P', 0, 'Menganalisis kisah keteladanan Nabi Sulaiman dan umatnya'),
(165, 16, 2, 8, '1', 'K01', 'P', 0, 'memahami hakikat beriman kepada kitab-kitab Allah SWT'),
(166, 16, 2, 8, '1', 'K02', 'P', 0, 'Memahami pengertian ,contoh dan dampak positif sifat tawakal, ikhtiar, sabar,syukur dan qona\"ah'),
(167, 16, 2, 8, '1', 'K03', 'P', 0, 'Memahami pengertian contoh dan dampak negatif sifta ananiah, putus asa, gadab dan tamak'),
(168, 16, 2, 8, '1', 'K04', 'P', 0, 'Memahami Adab kepada orang tua dan guru'),
(169, 16, 2, 8, '1', 'K05', 'P', 0, 'Menganilisis kisah keteladanan Nabi Yunus dan Nabi Ayub'),
(170, 16, 2, 7, '1', 'K03', 'K', 0, 'Menceritakan kisah dari perilaku ikhlas, taat, khauf dan taubat dalam fenomena kehidupan'),
(171, 16, 2, 7, '1', 'K04', 'K', 0, 'Menyimulasikan adab shalat dan dzikir'),
(172, 16, 2, 7, '1', 'K05', 'K', 0, 'Menceritakan kisah keteladanan Nabi Sulaiamn dan umatnya'),
(173, 16, 2, 8, '1', 'K01', 'K', 0, 'Menyajikan data dari berbagai sumber tentang kebenaran kitab-kitab Allah SWT'),
(174, 16, 2, 8, '1', 'K02', 'K', 0, 'Menunjukkan contoh perilaku tawakal, ikhtiar, sabar, syukur dan qana\"ah'),
(175, 16, 2, 8, '1', 'K03', 'K', 0, 'Mensimulasikan akibat buruk dari ananiah, putus asa, gadab, tamak dalam kehidupan sehari-hari'),
(176, 16, 2, 8, '1', 'K04', 'K', 0, 'Mensimulasikan adab kepada orang tua dan guru'),
(177, 16, 2, 8, '1', 'K05', 'K', 0, 'Menceritakan kisah keteladanan Nabi Yunus dan Nabi Ayub'),
(178, 16, 4, 7, '1', 'K01', 'P', 0, 'Memahami pola dakwah nabi Muhammad saw di Makkah'),
(179, 16, 4, 7, '1', 'K02', 'P', 0, 'Menganalisis pola dakwah Nabi Muhammad Saw di Makkah'),
(180, 16, 4, 7, '1', 'K03', 'P', 0, 'Memahami sejarah Nabi Muhhamd Saw dalam membangun masyarakat melalui kegiatan ekonomi dan perdaganga'),
(181, 16, 4, 7, '1', 'K01', 'K', 0, 'Memahami pola dakwah nabi Muhammad saw di Makkah'),
(182, 16, 4, 7, '1', 'K02', 'K', 0, 'Menganalisis pola dakwah Nabi Muhammad Saw di Makkah'),
(183, 16, 4, 7, '1', 'K03', 'K', 0, 'Memahami sejarah Nabi Muhammad dalam membangung masyarakat melalui perekonomian'),
(184, 16, 4, 7, '1', 'K04', 'K', 0, 'Memahami misi nabi Muhammad saw sebagai rahmat bagi alam semesta'),
(185, 16, 4, 7, '1', 'K05', 'K', 0, 'Memahami pola dakwah Nabi Muhammad Saw di Madinah'),
(186, 16, 4, 8, '1', 'K01', 'P', 0, 'Memahami sejarah berdirinya Dinasti Abbasiyah'),
(187, 16, 4, 8, '1', 'K02', 'P', 0, 'Mengidentifikasi tokoh ilmuwan muslim pada masa dinasti Abbasiyah'),
(188, 16, 4, 8, '1', 'K03', 'P', 0, 'Mengidentifikasi para \"ulama penyusun Kutubus Sittah pada masa dinasti Abbasiyah'),
(189, 16, 4, 8, '1', 'K04', 'P', 0, 'Mengidentifikasi perkembangan kebudayaan/peradaban Islam pada masa Dinasti Abbasiyah'),
(190, 16, 4, 8, '1', 'K05', 'P', 0, 'Menyimpulkan kemajuankebudayaan/peradaban Islam yang diraih pada masa Dinasti Abbasiyah'),
(191, 16, 4, 8, '1', 'K01', 'K', 0, 'Menceritakan silsilah kekhalifahan Dinasti Abbasiyah'),
(192, 16, 4, 8, '1', 'K02', 'K', 0, 'Menceritakan biografi dan karya para ilmuwan muslim pada masa dinasti Abbasiyah'),
(193, 16, 4, 8, '1', 'K03', 'K', 0, 'Memaparkan peran ilmuwan muslim pada masa dinasti Abbasiyah'),
(194, 16, 4, 8, '1', 'K04', 'K', 0, 'Menceritakan perkembangan Islam pada masa Dinasti Abbasiyah'),
(195, 9, 8, 7, '1', '4.1', 'K', 0, 'Menyelesaikan masalah yang berkaitan tentang bilangan bulat'),
(196, 9, 8, 7, '1', '4.2', 'K', 0, 'Menyelesaikan masalah yang berkaitan dg masalah himpunan'),
(197, 9, 8, 7, '1', '4.3', 'K', 0, 'Menyelesaikan masalah pada bentuk dan operasi aljabar'),
(198, 9, 8, 7, '1', '4.4', 'K', 0, 'Menyelesaikan masalah yang berkaitan Persamaan dan pertadaksamaan linear satu variabel'),
(199, 15, 5, 8, '1', 'kd1', 'P', 0, 'memahami nilai-nilai Pancasila sebagai dasar negara dan pandangan hidup bangsa'),
(200, 15, 5, 8, '1', 'kd02', 'P', 0, 'memahami fungsi-fungsi lembaga-lembaga negara dalam uud negara republik Indonesia'),
(201, 15, 5, 8, '1', 'kd03', 'P', 0, 'memahami tata urutan peraturan perundangan nasional'),
(202, 15, 5, 8, '1', 'kd04', 'P', 0, 'memahami norma dan kebiasaan antar daerah di Indonesia'),
(203, 15, 5, 8, '1', 'kd4.1', 'K', 0, 'menalar nilai-nilai Pancasila sebagai dasar negara dan pandangan hidup bangsa dalam kehidupan sehari'),
(204, 15, 5, 8, '1', 'kd4.2', 'K', 0, 'menyajikan hasil telaah fungsi lembaga-lembaga negara dalam UUD negara RI Tahun 1945'),
(205, 15, 5, 8, '1', 'kd4.3', 'K', 0, 'menyajikan hasi telaah tata urutanperaturan perundang-undangan'),
(206, 15, 5, 8, '1', 'kd4.4', 'K', 0, 'menalar hasil telaah norma dan kebiasaan antar daerah di Indonesia'),
(207, 15, 5, 8, '1', 'kd4.5', 'K', 0, 'menyajikanbentuk partisipasi kewarganegaran yang mencerminkan komitmen terhadap keutuhan nasional'),
(208, 11, 8, 8, '1', 'KD1', 'P', 0, 'menentukan pola pada barisan bilangan dan barisan konfigurasi obyek'),
(209, 11, 8, 8, '1', 'KD2', 'P', 0, 'Menjelaskan kedudukan titik dalam bidang kartesius'),
(210, 11, 8, 8, '1', 'KD3', 'P', 0, 'mendiskripsikan dan menyatakan relasi dan fungsi dengan menggunakan berbagai representasi'),
(211, 11, 8, 8, '1', 'KD4', 'P', 0, 'menjelaskan gradien, persamaan dan grafik garis lurus'),
(212, 12, 11, 7, '1', '3.1', 'P', 0, 'Teks interaksi transaksional tindakan menyapa, berpamitan, terima kasih dan meminta maaf serta respo'),
(213, 12, 11, 7, '1', '3.2', 'P', 0, 'Teks interaksi transaksional tindakan memberi dan meminta informasi jati diri pendek dan sederhana'),
(214, 12, 11, 7, '1', '3.3', 'P', 0, 'Teks transaksional lisan dan tulis memberi dan meminta nama hari, bulan, waktu dalam hari/angka, tan'),
(215, 12, 11, 7, '1', '3.4', 'P', 0, 'Teks interaksi transaksional memberi dan meminta nama dan jumlah binatang, benda dan bangunan'),
(216, 12, 11, 7, '1', '4.1', 'K', 0, 'Menyusun teks transaksional menyapa, berpamitan, terima kasih dan meminta maaf.'),
(217, 17, 6, 7, '1', 'K31', 'P', 0, 'Mengidentifikasi informasi dan menelaah struktur dan kebahasaan teks deskripsi'),
(218, 12, 11, 7, '1', '4.2', 'K', 0, 'Menyusun teks transaksional memberi dan meminta informasi jati diri pendek dan sederhana'),
(219, 17, 6, 7, '1', 'K32', 'P', 0, 'Mengidentifikasi unsur dan menelaah struktur dan kebahasaan teks fantasi'),
(220, 17, 6, 7, '1', 'K33', 'P', 0, 'Mengidentifikasi teks dan menelaah struktur dan kebahasaan teks prosedur'),
(221, 12, 11, 7, '1', '4.3', 'K', 0, 'Menyusun teks transaksional memberi dan meminta nama hari, bulan, waktu dalam hari/angka, tanggal/ta'),
(222, 17, 6, 7, '1', 'K34', 'P', 0, 'Mengidentifikasi informasi dan menelaah struktur dan kebahasaan teks laporan hasil observasi'),
(223, 12, 11, 7, '1', '4.4', 'K', 0, 'Menyusun teks transaksional memberi dan meminta nama dan jumlah binatang, benda dan bangunan publik'),
(224, 11, 8, 8, '1', 'KD1', 'K', 0, 'menyelesaikan masalah yang berkaitan dengan pola pada barisan bilangan'),
(225, 11, 8, 8, '1', 'KD2', 'K', 0, 'menyelesaikan masalah yag berkaitan dengan titik dalam bidang kartesius'),
(226, 11, 8, 8, '1', 'KD3', 'K', 0, 'Menyelesaikan masalah yang berkaitan dengan relasi dan fungsi'),
(227, 11, 8, 8, '1', 'KD4', 'K', 0, 'menyelesaikan masalah yang berkaitan dengan SPLDV'),
(228, 17, 6, 7, '1', 'K41', 'K', 0, 'Menjelaskan isi dan menyajikan data, gagasan dan kesan teks deskripsi secara lisan dan tulis'),
(229, 17, 6, 7, '1', 'K42', 'K', 0, 'Menceritakan kembali dan menyajikan gagasan kreatif teks fantasi'),
(230, 17, 6, 7, '1', 'K43', 'K', 0, 'Menyimpulkan isi dan menyajikan data teks prosedur'),
(231, 17, 6, 7, '1', 'K44', 'K', 0, 'Menyimpulkan isi dan menyajikan rangkuman teks hasil observasi'),
(232, 1, 16, 7, '1', '1.1', 'P', 0, 'membaca ayat'),
(233, 1, 16, 7, '1', '1.2', 'P', 0, 'Menulis ayat'),
(234, 1, 16, 7, '1', '1.3', 'P', 0, 'Menghafal surat '),
(235, 1, 16, 7, '1', '1.4', 'P', 0, 'Menerjemahkan ayat'),
(256, 3, 12, 7, '1', 'K01', 'P', 0, 'memahami konsep dan prosedur menggambar flora fauna dan alam benda'),
(257, 3, 12, 7, '1', 'K02', 'P', 0, 'memahami konsep dan prosedur menggambar gubahan'),
(258, 3, 12, 7, '1', 'K03', 'P', 0, 'memahami tehnik vokal dalam bernyanyi lagu unisono'),
(259, 3, 12, 7, '1', 'K04', 'P', 0, 'memahami tehnik bermain musik ansambel sederhana'),
(260, 3, 15, 7, '1', 'K01', 'P', 0, 'Memahami isi teks lisan sesuai dengan unggah ungguh jawa							'),
(261, 3, 15, 7, '1', 'K02', 'P', 0, 'Memahami tujuan ,fungsi menceritakan pengalaman'),
(262, 3, 15, 7, '1', 'K03', 'P', 0, 'memahami cangkriman dan parikan'),
(264, 3, 15, 7, '1', 'K01', 'K', 0, 'Menyusun teks lisan sesuai unggah ungguh jawa untuk berbagai kepentingan'),
(265, 3, 15, 7, '1', 'K02', 'K', 0, 'Menyusun teks lisan dan tulis untuk menceritakan pengalaman'),
(269, 3, 15, 8, '1', 'K01', 'P', 0, 'memahami isi teks cerita legenda'),
(270, 3, 15, 8, '1', 'K02', 'P', 0, 'menelaah teks piwulang serat Wulangreh pupuh Gambuh'),
(271, 3, 15, 8, '1', 'K03', 'P', 0, 'menelaah teks berita'),
(272, 3, 15, 8, '1', 'K04', 'P', 0, 'memahami isi teks dialog berisi pesan'),
(273, 3, 15, 8, '1', 'K01', 'K', 0, 'menceritakan kembali cerita legenda dengan dialeg setempat'),
(274, 3, 15, 8, '1', 'K02', 'K', 0, 'menanggapi teks piwulang serat Wulangreh pupuh Gambuh'),
(275, 3, 15, 8, '1', 'K03', 'K', 0, 'menulis berita dan membaca teknik'),
(276, 3, 15, 8, '1', 'K04', 'K', 0, 'menyampaikan pesan secara lisan'),
(277, 3, 15, 8, '1', 'K05', 'K', 0, 'mengalihaksarakan serat Wulangreh pupuh Gambuh satu pada dari huruf latin ke huruf Jawa'),
(278, 17, 11, 8, '1', 'K31', 'P', 0, 'Teks lisan dan tulis meminta perhatian, mengecek pemahaman, menghargai, meminta dan mengungkapkan pe'),
(279, 17, 11, 8, '1', 'K32', 'P', 0, 'Teks lisan dan tulis tentang kemampuan dan kemauan'),
(280, 17, 11, 8, '1', 'K33', 'P', 0, 'Teks lisan dan tulis tentang memberi keharusan, himbauan dan larangan'),
(281, 17, 11, 8, '1', 'K34', 'P', 0, 'Teks lisan dan tulis tentang menyuruh, mengajak, dan meminta ijin'),
(282, 17, 11, 8, '1', 'K35', 'P', 0, 'Teks greeting card'),
(283, 17, 11, 8, '1', 'K36', 'P', 0, 'Teks lisan dan tulis tentang keberadaan orang, benda, dan binatang'),
(284, 17, 11, 8, '1', 'K37', 'P', 0, 'Teks lisan dan tulis tentang Simple Present Tense'),
(285, 17, 11, 8, '1', 'K41', 'K', 0, 'Menyusun teks lisan meminta perhatian, mengecek pemahaman, menghargai, meminta dan mengungkapkan pen'),
(286, 17, 11, 8, '1', 'K42', 'K', 0, 'Menyusun teks lisan dan tulis tentang kemampuan dan kemauan'),
(287, 17, 11, 8, '1', 'K43', 'K', 0, 'Menyusun teks lisan dan tulis keharusan, larangan dan himbauan'),
(288, 17, 11, 8, '1', 'K44', 'K', 0, 'Menyusun teks lisan dan tulis tentang menyuruh, mengajak dan meminta ijin'),
(289, 17, 11, 8, '1', 'K45', 'K', 0, 'Menyusun teks greeting card'),
(290, 17, 11, 8, '1', 'K46', 'K', 0, 'Menyusun teks lisan dan tulis tentang keberadaan orang, benda, dan binatang '),
(291, 17, 11, 8, '1', 'K47', 'K', 0, 'Menyusun teks lisan dan tulis tentang Simple Present Tense'),
(293, 6, 3, 7, '1', 'K01', 'P', 0, 'memahami najis dan tata cara menyucikan'),
(294, 6, 3, 7, '1', 'K02', 'P', 0, 'menganalisis hadas dan menyucikan'),
(295, 6, 3, 7, '1', 'K03', 'P', 0, 'memahami waktu-waktu shalat lima waktu'),
(296, 6, 3, 7, '1', 'K04', 'P', 0, 'memahami ketentuan sujud sahwi'),
(297, 6, 3, 7, '1', 'K05', 'P', 0, 'memahami ketentuan azan dan iqamah'),
(298, 6, 3, 7, '1', 'K06', 'P', 0, 'menganalisis ketentuan shalat berjamaah'),
(299, 6, 3, 7, '1', 'K07', 'P', 0, 'memahami tata cara berzikir dan berdoa setelah shalat'),
(300, 6, 3, 8, '1', 'K01', 'P', 0, 'memahami ketentuan sujud syukur'),
(301, 6, 3, 8, '1', 'K02', 'P', 0, 'memahami ketentuan sujud tilawah'),
(302, 6, 3, 8, '1', 'K03', 'P', 0, 'menganalisis ketentuan ibadah puasa'),
(303, 6, 3, 8, '1', 'K04', 'P', 0, 'menganalisis ketentuan pelaksanaan zakat'),
(304, 7, 7, 7, '1', 'K01', 'P', 0, 'mengidentifikasi bunyi kata, frasa dan kal b Arab yg berkaitan dg at Ta rifu binnafsi wa bil amiliin'),
(305, 7, 7, 7, '1', 'KD2', 'P', 0, 'melafalkan bunyi kata, frasa dan kal b Arab yg berkaitan dg at Ta rifu binnafsi wa bil amiliin'),
(306, 7, 7, 7, '1', 'KD3', 'P', 0, 'menemukan makna kata, frasa dan kal b Arab yg berkaitan dg at Ta rifu binnafsi wa bil amiliin'),
(307, 7, 7, 7, '1', 'KD1', 'K', 0, 'Mendemontrasikan ungkapan sederhana tentang topik at ta rifu binnafsi wabilamiliina fil madrosah,alm'),
(308, 7, 7, 7, '1', 'KD2', 'K', 0, 'Menunjukkan ungkapan sederhana tentang topik at ta rifu binnafsi wabilamiliina fil madrosah, almarof'),
(309, 7, 7, 7, '1', 'KD3', 'K', 0, 'Menyampaikan info lisan tentang topik at ta rifu binnafsi wabilamiliina fil madrosah, almarof'),
(310, 7, 7, 7, '1', 'KD4', 'K', 0, 'Mengungkapkan info scr tertulis sederhana tentang topik at ta rifu binnafsi wabilamiliina fil madros'),
(311, 7, 7, 7, '1', 'KD5', 'K', 0, 'Menyusun teks sederhana tentang topik at ta rifu binnafsi wabilamiliina fil madrosah, almarof'),
(312, 7, 7, 8, '1', 'KD1', 'P', 0, 'Mengidentifikasii bunyi,makna dan gagasan dari kata, frase, kal b Arab  dg topik assa ah, yaumiyatun'),
(313, 7, 7, 8, '1', 'KD2', 'P', 0, 'Melafalkan bunyi,makna dan gagasan dari kata, frase, kal b Arab dg topik assa\'ah,yaumiyatuna fil mad'),
(314, 7, 7, 8, '1', 'KD3', 'P', 0, 'Menemukan makna dan gagasan dari kata, frase dan kal b Arab dg topik assa\'ah, yaumiyatuna fil madros'),
(315, 7, 7, 8, '1', 'KD1', 'K', 0, 'Mendemontrasikan ungkapan info lisan dan tulisan sederhana tentang topik assa\'ah, yaumiyatuna fil ma'),
(316, 7, 7, 8, '1', 'KD2', 'K', 0, 'Menunjukkan ungkapan sederhana tentang topik assa\'ah, yaumiyatuna fil madrosah dan yaumiyatuna fil b'),
(317, 7, 7, 8, '1', 'KD3', 'K', 0, 'Menyampaikan info lisan tentang topik assa\'ah, yaumiyatuna fil baiti dan yaumiyatuna fil baiti.'),
(319, 9, 8, 8, '1', '3.1', 'P', 0, 'Menentukan pola pd barisan bilangan dan barisan konfigurasi obyek'),
(320, 9, 8, 8, '1', '3.2', 'P', 0, 'Menjelaskan kedudukan titik dalam bidang koordinat kartesius'),
(321, 9, 8, 8, '1', '3.3', 'P', 0, 'Mendiskripsikan dan menyatakan relasi dan fungsi dg menggunakan berbagai representasi'),
(322, 6, 1, 8, '1', 'k01', 'K', 0, 'menerapkan hukum bacaan mad iwad, layyin, mad Arid lissukun dalam Al-Wuran surah-surah pendek piliha'),
(323, 6, 1, 8, '1', 'k02', 'K', 0, 'menuliskan isi kandungan QS.Quraisy [106], Al-Insyirah [94] tentang ketentuan rizqi dari Allah'),
(324, 20, 14, 8, '1', 'KD4.4', 'K', 0, 'mengolah, menyaji dan mengemas bahan pangan serealia, kacang- kacangan dan umbi yang ada di wilayah '),
(325, 6, 1, 8, '1', 'K02', 'K', 0, 'mensimulasikan sikap tolong menolong dan peduli terhadap anak yatim sesuai isi QS. Al-Kautsar [108],'),
(326, 9, 8, 8, '1', '4.1', 'K', 0, 'Menyelesaikan masalah yg berkaitan dg pola pd barisan bilangan'),
(327, 9, 8, 8, '1', '4.2', 'K', 0, 'Menyelesaikan masalah yang berkaitan dg kedudukan ttk dalam bidang kartesius'),
(328, 9, 8, 8, '1', '4.3', 'K', 0, 'Menyelesaikan masalah yang berkaitan dg relasi dan fungsi'),
(329, 9, 8, 8, '1', '4.4', 'K', 0, 'Menyelesaikan masalah yang berkaitan dg gradien, persamaan, dan grafik garis lurus'),
(330, 6, 1, 8, '1', 'K01', 'P', 0, 'memahami hukum bacaan mad iwad, layyin, mad Arid lissukun dalam Al-Wuran surah-surah pendek piliha'),
(331, 6, 1, 8, '1', 'K02', 'P', 0, 'memahami isi kandungan QS.Quraisy [106], Al-Insyirah [94] tentang ketentuan rizqi dari Allah'),
(332, 6, 1, 8, '1', 'K03', 'P', 0, 'memahami isi kandungan QS. Al-Kautsar [108], dan QS. Al-Maun [107]'),
(333, 6, 3, 8, '1', 'K01', 'K', 0, 'memperagakan tata cara sujud syukur'),
(334, 6, 3, 8, '1', 'K02', 'K', 0, 'memperagakan tata cara sujud tilawah'),
(335, 6, 3, 8, '1', 'K03', 'K', 0, 'mensimulasikan tata cara melaksanakan puasa'),
(336, 6, 3, 8, '1', 'K04', 'K', 0, 'mendemonstrasikan pelaksanaan zakat'),
(337, 6, 3, 7, '1', 'K01', 'K', 0, 'mendemoinstrasikan tata cara bersuci'),
(338, 6, 3, 7, '1', 'K02', 'K', 0, 'mempraktikkan azan dan iqamah'),
(339, 6, 3, 7, '1', 'K03', 'K', 0, 'mempraktikkan shalat lima waktu'),
(340, 6, 3, 7, '1', 'K04', 'K', 0, 'memperagakan sujud sahwi'),
(341, 6, 3, 7, '1', 'K05', 'K', 0, 'mendemonstrasikan tata cara shalat berjamaah'),
(342, 6, 3, 7, '1', 'K06', 'K', 0, 'mendemonstrasikan zikir setelah shalat'),
(343, 3, 12, 7, '1', 'K01', 'K', 0, 'Menggambar floura fauna dan alam benda'),
(344, 3, 12, 7, '1', 'K02', 'K', 0, 'Menggambar gubahan flora fauna serta geometrik menjadi ragam hias'),
(345, 3, 12, 7, '1', 'K03', 'K', 0, 'Menyanyikan lagu secara unisono'),
(346, 3, 12, 7, '1', 'K04', 'K', 0, 'Memainkan musikansambel sederhana'),
(347, 14, 10, 8, '1', '3.1', 'P', 0, 'menelaah perubahan keruangan dan interaksi antar ruang di Indonesia dan negara - negara ASEAN'),
(348, 14, 10, 8, '1', '3.2', 'P', 0, 'menganalisis pengaruh interaksi sosial dalam ruang yang berbeda - beda'),
(351, 3, 12, 8, '1', 'K01', 'P', 0, 'Memahami konsep dan prosedur menggambar model pada berbagai bahan dan teknik'),
(352, 3, 12, 8, '1', 'K02', 'P', 0, 'Memahami konsep dan prosedur menggabar ilustrasi dg teknik manual dan digital'),
(353, 14, 10, 8, '1', '4.1', 'K', 0, 'menyajikan hasil telaah tentang Perubahan keruangan dan interaksi antar ruang di Indonesia dan ASEAN'),
(354, 14, 10, 8, '1', '4.2', 'K', 0, 'menyajikan hasil analisis tentang pengaruh interaksi sosial dalam ruang yang berbeda'),
(355, 3, 12, 8, '1', 'K03', 'P', 0, 'Memahami yeknik dan gaya lagu daerah secara unisono atau perorangan'),
(356, 3, 12, 8, '1', 'K04', 'P', 0, 'Memahami teknik dan gaya lagu daerah dalam bentuk vokal group'),
(358, 3, 12, 8, '1', 'K01', 'K', 0, 'Menggambar model pada berbagai bahan dan teknik'),
(359, 3, 12, 8, '1', 'K02', 'K', 0, 'Menggambar ilustrasi dengan teknik manual dan digital'),
(360, 3, 12, 8, '1', 'K03', 'K', 0, 'menyanyikan lagu daerah secara unisono atau perorangan'),
(361, 3, 12, 8, '1', 'K04', 'K', 0, 'Menyanyikan lagu daerah bentuk vokal group'),
(371, 7, 1, 7, '1', 'KD1', 'P', 0, 'Memahami kedudukan al-Qur an dan Hadits dalam kehidupan'),
(372, 7, 1, 7, '1', 'KD2', 'P', 0, 'Memahami isi kandungan Q.S al Fatihah, an Naas, al Falaq dan al Ikhlas tentang keesaan Alloh'),
(376, 7, 1, 7, '1', 'KD3', 'P', 0, 'Memahami keterkaitan isi kandungan hadits tentang iman dalam fenomena kehidupan dan akibatnya.'),
(378, 7, 1, 7, '1', 'KD1', 'K', 0, 'Membaca  Q.S al Fatihah, an Naas, al Falaq dan al Ikhlas.'),
(379, 7, 1, 7, '1', 'KD2', 'K', 0, 'Menghafal  Q.S al Fatihah, an Naas, al Falaq dan al Ikhlas secara fasih dan tartil.'),
(380, 7, 1, 7, '1', 'KD3', 'K', 0, 'Menulis hadits tentang iman  dan ibadah yang diterima Alloh.'),
(382, 7, 1, 7, '1', 'KD4', 'K', 0, 'Menerjemahkan makna hadits tentang iman dan ibadah yang diterima Alloh.'),
(386, 19, 9, 7, '2', 'K06', 'P', 0, 'Mengidentifikasi sistem organisasi kehidupan tingkat sel sampai organisme'),
(387, 19, 9, 7, '2', 'K07', 'P', 0, 'Menganalisis interaksi antara makhluk hidup dan lingkungannya'),
(388, 19, 9, 7, '2', 'K08', 'P', 0, 'Menganalisis terjadinya pencemaran lingkungan dan dampaknya'),
(389, 19, 9, 7, '2', 'K09', 'P', 0, 'Menganalisis perubahan iklim dan dampaknya bagi ekosistem'),
(390, 19, 9, 7, '2', 'K10', 'P', 0, 'Menjelaskan lapisan bumi,gunung api,gempa bumi dan tindakan pengurangan resiko'),
(391, 19, 9, 7, '2', 'K11', 'P', 0, 'Menganalisis sistem tata surya'),
(392, 19, 9, 7, '2', 'K06', 'K', 0, 'Membuat model struktur sel tumbuhan/hewan'),
(393, 19, 9, 7, '2', 'K07', 'K', 0, 'Menyajikan hasil pengamatan interaksi makhluk hidup dengan lingkungan'),
(394, 19, 9, 7, '2', 'K08', 'K', 0, 'Membuat tulisan tentang gagasan penyelesaian masalah pencemaran lingkungan'),
(395, 19, 9, 7, '2', 'K09', 'K', 0, 'Membuat tulisan tentang gagasan adaptasi perubahan iklim'),
(396, 19, 9, 7, '2', 'K10', 'K', 0, 'Mengomunikasikan upaya pengurangan resiko dan dampak bencana alam'),
(397, 19, 9, 7, '2', 'K11', 'K', 0, 'Menyajikan karya tentang dampak rotasi dan revolusi bumi dan bulan'),
(399, 10, 9, 8, '2', '3.7', 'P', 0, 'memahami sistem peredaran darah pada manusia,,'),
(400, 10, 9, 8, '2', '3.8', 'P', 0, 'memahami tekanan zat,'),
(401, 10, 9, 8, '2', '3.9', 'P', 0, 'menganalisis sistem pernapasan pada manusia,'),
(402, 10, 9, 8, '2', '3.10', 'P', 0, 'menganalisis sistem ekskresi pada manusia,'),
(403, 10, 9, 8, '2', '3.11', 'P', 0, 'menerapkan konsep getaran, gelombang dan bunyi,'),
(404, 10, 9, 8, '2', '4.7', 'K', 0, 'menyajikan hasil percobaan pengaruh aktivitas pada frekuensi denyut jantung, '),
(405, 10, 9, 8, '2', '4.8', 'K', 0, 'menyajikan data hasil percobaan untuk menyelidiki tekanan zat cair pada kedalaman tertentu, '),
(406, 10, 9, 8, '2', '4.9', 'K', 0, 'menyajikan karya tentang upaya menjaga kesehatan sistem pernapasan, '),
(407, 10, 9, 8, '2', '4.10', 'K', 0, 'membuat karya tentang sistem ekskresi pada manusia, '),
(408, 10, 9, 8, '2', '4.11', 'K', 0, 'menyajikan hasil percobaan tentang getaran, gelombang, dan bunyi, '),
(417, 20, 14, 8, '2', 'KD3.1', 'P', 0, 'Memahami desain kerajinan dari bahan limbah anorganik lunak atau keras '),
(418, 20, 14, 8, '2', 'KD3.1', 'P', 0, 'Mendeskripsikan proses modifikasi jenis bahan limbah anorganik'),
(419, 20, 14, 8, '2', 'KD3.2', 'P', 0, 'Memahami prosedur jenis produk rekayasa yang dibuat berdasarkan rangkaian pengubah besaran listrik'),
(420, 20, 14, 8, '2', 'KD3.2', 'P', 0, 'Mengidentifikasi bahan, material, dan alat bantu yang digunakan untuk membuat produk rekayasa berdas'),
(421, 20, 14, 8, '2', 'KD3.3', 'P', 0, 'Mengidentifikasi desain wadah budidaya ikan konsumsi diwilayah setempat'),
(422, 20, 14, 8, '2', 'KD3.3', 'P', 0, 'Memahami konsep dan prosedur pemeliharaan ikan hias sesuai wilayah    setempat'),
(423, 20, 14, 8, '2', 'KD3.4', 'P', 0, 'Memahami rancangan pembuatan,  penyajian, dan pengemasan olahan bahan pangan'),
(424, 20, 14, 8, '2', 'KD3.4', 'P', 0, 'Memahami manfaat dan proses olahan seralia dan umbi menjadi produk non pangan'),
(425, 20, 14, 8, '2', 'KD4.1', 'K', 0, 'Membuat karya kerajinan dan pengemasan '),
(426, 20, 14, 8, '2', 'KD4.1', 'K', 0, 'Memodifikasi kerajinan dan pengemasan'),
(427, 20, 14, 8, '2', 'KD4.2', 'K', 0, 'Membuat model alat pengubah listrik'),
(428, 20, 14, 8, '2', 'KD4.2', 'K', 0, 'Membuat produk sensor menggunakan teknologi kelistrikan'),
(429, 20, 14, 8, '2', 'KD4.3', 'K', 0, 'Mendesain wadah budidaya ikan hias '),
(430, 20, 14, 8, '2', 'KD4.3', 'K', 0, 'Memelihara ikan hias berdasarkan konsep dan prosedur sesuai wilayah setempat'),
(431, 20, 14, 8, '2', 'KD4.4', 'K', 0, 'Membuat olahan bahan pangan setengah jadi '),
(432, 20, 14, 8, '2', 'KD4.4', 'K', 0, 'Membuat olahan dari hasil samping seralia dan umbi '),
(433, 20, 14, 7, '2', 'KD3.1', 'P', 0, 'Memahami tentang jenis, sifat, karakter, dan Teknik pengolahan kertas dan plastik lembar'),
(434, 20, 14, 7, '2', 'KD3.1', 'P', 0, 'Memahami tentang prinsip perancangan, pembuatan, dan penyajian produk kerajinan'),
(435, 20, 14, 7, '2', 'KD3.2', 'P', 0, 'Memahami jenis-jenis dan fungsi teknologi konstruksi'),
(436, 20, 14, 7, '2', 'KD3.2', 'P', 0, 'Memahami sistem, jenis, serta karakteristik persambungan dan penguatan pada konstruksi'),
(437, 20, 14, 7, '2', 'KD3.3', 'P', 0, 'Memahami komoditas tanaman obat yang dapat dikembangkan'),
(438, 20, 14, 7, '2', 'KD3.3', 'P', 0, 'Memahami tahapan budidaya tanaman obat'),
(439, 20, 14, 7, '2', 'KD3.4', 'P', 0, 'Memahami rancangan pengolahan, penyajian, dan pengemasan bahan pangan sayuran'),
(442, 20, 14, 7, '2', 'KD3.4', 'P', 0, 'Memahami rancangan pengolahan, penyajian, dan pengemasan bahan hasil samping sayuran'),
(443, 20, 14, 7, '2', 'KD4.1', 'K', 0, 'Memilih jenis bahan dan teknik pengolahan kertas dan plastik'),
(444, 20, 14, 7, '2', 'KD4.1', 'K', 0, 'Merancang, membuat, dan menyajikan produk kerajinan dari bahan kertas dan plastik'),
(445, 20, 14, 7, '2', 'KD4.2', 'K', 0, 'Memanipulasi jenis-jenis dan fungsi teknologi konstruksi'),
(446, 20, 14, 7, '2', 'KD4.2', 'K', 0, 'Membuat produk teknologi konstruksi '),
(447, 20, 14, 7, '2', 'KD4.3', 'K', 0, 'Menentukan komoditas tanaman obat yang akan dibudidayakan'),
(448, 20, 14, 7, '2', 'KD4.3', 'K', 0, 'Mempraktikan tahapan budidaya tanaman obat '),
(449, 20, 14, 7, '2', 'KD4.4', 'K', 0, 'Mengolah, menyaji, dan mengemas bahan pangan sayuran'),
(450, 20, 14, 7, '2', 'KD4.4', 'K', 0, 'Mengolah, menyaji, dan mengemas bahan hasil samping sayuran menjadi produk pangan '),
(451, 17, 11, 8, '2', 'K.D.1', 'P', 0, 'Menerapkan fungsi sosial, struktur teks, unsur kebahasaan Present Continous Tense'),
(452, 17, 11, 8, '2', 'K.D. ', 'P', 0, 'Menerapkan fungsi sosial,struktur teks, unsur  kebahasaan Comparison Degree'),
(453, 17, 11, 8, '2', 'K.D. ', 'P', 0, 'Menerapkan fungsi sosial, struktur teks dan unsur kebahasaan Past Tense'),
(454, 17, 11, 8, '2', 'KD. 4', 'P', 0, 'Menerapkan dan membandingkan fungsi sosial, struktur teks, unsur kebahasaan teks recount'),
(455, 17, 11, 8, '2', 'K.D. ', 'P', 0, 'Membandingkan fungsi sosial, struktur teks dan unsur kebahasaan pesan singkat dan pengumuman'),
(456, 17, 11, 8, '2', 'K.D. ', 'P', 0, 'Menafsirkan fungsi sosial, struktur teks, unsur kebahasaan lagu'),
(459, 17, 11, 8, '2', 'K.D.1', 'K', 0, 'Menyusun kalimat Present Continous Tense'),
(462, 17, 11, 8, '2', 'K.D. ', 'K', 0, 'Menyusun kalimat perbandingan'),
(463, 17, 11, 8, '2', 'K.D 3', 'K', 0, 'Menyusun kalimat Past Tense'),
(464, 17, 11, 8, '2', 'K.D 4', 'K', 0, 'Menangkap makna dan menyusun teks recount'),
(465, 17, 11, 8, '2', 'K.D. ', 'K', 0, 'Menangkap makna dan menyusun teks pesan singkat dan pengumuman'),
(466, 17, 11, 8, '2', 'K.D.6', 'K', 0, 'Menangkap makna lagu'),
(470, 17, 6, 7, '2', 'K.D. ', 'P', 0, 'Mengidentifikasi informasi dan menyimpulkan isi puisi rakyat'),
(471, 17, 6, 7, '2', 'K.D.2', 'P', 0, 'Mengidentifikasi informasi dan menceritakan kembali fabel'),
(473, 17, 6, 7, '2', 'K.D. ', 'P', 0, 'Mengidentifikasi informasi dan menyimpulkan isi surat pribadi/dinas'),
(474, 17, 6, 7, '2', 'K.D.4', 'P', 0, 'Menemukan unsur-unsur dan membuat rangkuman isi buku fiksi/nonfiksi'),
(475, 17, 6, 7, '2', 'K.D.1', 'K', 0, 'Menelaah struktur dan mengungkapkan gagasan, pesan puisi rakyat'),
(476, 17, 6, 7, '2', 'K.D. ', 'K', 0, 'Menelaah struktur dan kebahasaan fabel'),
(477, 17, 6, 7, '2', 'K.D. ', 'K', 0, 'Memerankan isi fabel'),
(478, 17, 6, 7, '2', 'K.D. ', 'K', 0, 'Menelaah unsur dan kebahasaan dan menulis surat pribadi/dinas'),
(480, 17, 6, 7, '2', 'K.D. ', 'K', 0, 'Menelaah hubungan unsur dan menyajikan tanggapan isi buku fiksi/nonfiksi'),
(483, 14, 10, 8, '2', '3.1', 'P', 0, 'Memahami aspek keruangan dan konektivitas antar ruang dan waktu dalam lingkup nasional'),
(484, 14, 10, 8, '2', '3.4', 'P', 0, 'Mendiskripsikan bentuk-bentuk dan sifat dinamika interaksi manusia dengan lingkungan '),
(485, 14, 10, 8, '2', '3.3.', 'P', 0, 'Mendeskripsikn fungsi dan peran kelembagaan sosial, buadaya, ekonomi dan politik dalam masyarakat'),
(488, 14, 10, 8, '2', ' 4.3', 'K', 0, 'Menyajikan hasil pengamatan bentuk-bentuk dan sifat dinamika interaksi manusia dengan lingkungan'),
(490, 7, 7, 7, '2', 'KD.1', 'K', 0, 'Mendemonstrasikan ungkapan tentang al\'unwaan, baiti dan min yaumiyyatil usroh.'),
(491, 7, 7, 7, '2', 'KD.1', 'P', 0, 'Mengidentifikasi bunyi tentang Al\'unwaan, baiti dan min yaumiyyatil usroh.'),
(492, 7, 7, 8, '2', 'KD.1', 'K', 0, 'Mendemonstrasikan ungkapan tentang almihnah, allaa\'ibunarriyadhiyuun, almihnatu tibbiyyah dan attada'),
(493, 7, 7, 8, '2', 'KD.1', 'P', 0, 'Mengidentifikasi bunyi tentang almihnah, allaa\'ibunarriyadhiyun, almihnatu tibbiyyah dan attadawi.'),
(494, 12, 11, 7, '2', '3.5', 'P', 0, 'teks lisan dan tulis tentang orang, binatang dan benda lain dari sifatnya,															'),
(495, 12, 11, 7, '2', '3.6', 'P', 0, 'teks lisan dan tulis tentang orang, binatang dan benda lain dari tindakannya,															'),
(496, 12, 11, 7, '2', '3.7', 'P', 0, 'teks deskripsi lisan dan tulis tentang orang, binatang dan benda,															'),
(497, 12, 11, 7, '2', '3.8', 'P', 0, 'lagu remaja,															'),
(498, 12, 11, 7, '2', '4.5', 'K', 0, 'menyusun teks lisan dan tulis tentang orang, binatang dan benda lain dari sifatnya,															'),
(499, 12, 11, 7, '2', '4.6', 'K', 0, 'menyusun teks lisan dan tulis tentang orang, binatang dan benda lain dari tindakannya,														'),
(500, 12, 11, 7, '2', '4.7', 'K', 0, 'menyusun teks deskripsi lisan dan tulis tentang orang, binatang dan benda,															'),
(501, 12, 11, 7, '2', '4.8', 'K', 0, 'menafsirkan makna lagu remaja															'),
(502, 7, 7, 7, '2', 'KD.2', 'P', 0, 'Melafalkan bunyi huruf tentang al\'unwaan, baiti dan min yaumiyyatil usroh.'),
(503, 7, 7, 7, '2', 'KD.3', 'P', 0, 'Menemukan makna ujaran tentang al\'unwaan, baiti dan min yaumiyyatil usroh.'),
(504, 7, 7, 7, '2', 'KD.2', 'K', 0, 'Menunjukkan contoh ungkapan tentang al\'unwaan, baiti dan min yaumiyyatil usroh.'),
(505, 7, 7, 7, '2', 'KD.3', 'K', 0, 'Menyampaikan informasi lisan tentang Al\'unwaan, baiti dan min yaumiyyatil usroh.'),
(506, 7, 7, 7, '2', 'KD.4', 'K', 0, 'Mengungkapkan informasi tertulis tentang al\'unwaan, baiti dan min yaumiyyatil usroh.'),
(507, 7, 7, 7, '2', 'KD.5', 'K', 0, 'Menyusun teks tentang al\'unwaan, baiti dan min yaumiyyatil usroh.'),
(508, 7, 7, 8, '2', 'KD.2', 'P', 0, 'Melafalkan bunyi tentang almihnah, allaa\'ibunarriyadhiyun, almihnatu tibbiyyah dan attadawi.'),
(509, 7, 7, 8, '2', 'KD.3', 'P', 0, 'Menentukan makna tentang almihnah, allaa\'ibunarriyadhiyun, almihnatu tibbiyyah dan attadawi.'),
(511, 7, 7, 8, '2', 'KD.2', 'K', 0, 'Menunjukkan contoh tentang almihnah, allaa\'ibunarriyadhiyuun, almihnatu tibbiyyah dan attadawi.'),
(512, 15, 10, 7, '2', '3.4', 'P', 0, 'Memahami pengertian dinamika  interaksi manusia dengan lingkungan alam,sosial,budaya dan ekonomi'),
(513, 7, 7, 8, '2', 'KD.3', 'K', 0, 'Menyampaikan informasi lisan tentang almihnah, allaa\'ibunarriyadhiyuun, almihnatu tibbiyyah dan atta'),
(514, 7, 7, 8, '2', 'KD.4', 'K', 0, 'Mengungkapkan informasi tulis tentang almihnah, allaa\'ibunarriyadhiyuun, almihnatu tibbiyyah dan att'),
(515, 15, 10, 7, '2', '3.3', 'P', 0, 'Memahami jenis-jenis kelembagaan sosial ,budaya ekonomi dan politik dalam masyarakat'),
(516, 7, 7, 8, '2', 'KD.5', 'K', 0, 'Menyusun teks tentang almihnah, allaa\'ibunarriyadhiyuun, almihnatu tibbiyyah dan attadawi.'),
(517, 9, 8, 7, '2', 'KD3.7', 'P', 0, 'Mendeskripsikan lokasi benda dalam koordinat cartesius'),
(518, 9, 8, 7, '2', 'KD3.8', 'P', 0, 'Menaksir dan mengukur bangun tidak beraturan'),
(519, 9, 8, 7, '2', 'KD3.9', 'P', 0, 'Memahami konsep tranformasi'),
(520, 9, 8, 7, '2', 'KD3.1', 'P', 0, 'Menemukan peluang empirik dari sekelompok data'),
(521, 9, 8, 7, '2', 'KD4.6', 'K', 0, 'Menerapkan prinsip tranformasi'),
(522, 9, 8, 7, '2', 'KD4.7', 'K', 0, 'Menyelesaikan permasalahan yang berkaitan bangun segi empat'),
(523, 9, 8, 7, '2', 'KD4.8', 'K', 0, 'Mengolah dan menyajikan data dalam bentuk tabel'),
(524, 9, 8, 7, '2', 'KD4.9', 'K', 0, 'Melakukan percobaan bentuk empirik dalam bentuk tabel'),
(525, 9, 8, 7, '2', 'KD4.1', 'K', 0, 'Menerapkan konsep dan sifat sifat terkait garis dan sudut'),
(526, 9, 8, 7, '2', 'KD3.1', 'P', 0, 'Memahami berbagai konsep dan prinsip garis dan sudut'),
(527, 3, 12, 7, '2', 'KD 1', 'P', 0, 'Memahami konsep dan prosedur penerapan ragam hias pada bahan tekstil'),
(528, 3, 12, 7, '2', 'KD 2', 'P', 0, 'Memahami konsep dan prosedur penerapan ragam hias pada bahan alam'),
(529, 3, 12, 7, '2', 'KD 3', 'P', 0, 'Memahami konsep dasar permainan alat musik sederhana secara perorangan '),
(530, 3, 12, 7, '2', 'KD 4 ', 'P', 0, 'Memahami konsep dasar ansambel musik'),
(531, 3, 12, 7, '2', 'KD 1', 'K', 0, 'Menerapkan ragam hias pada bahan tekstil'),
(532, 3, 12, 7, '2', 'KD 2', 'K', 0, 'Menerapkan ragam hias pada bahan alam'),
(533, 3, 12, 7, '2', 'KD 3', 'K', 0, 'Memainkan alat musik sederhana secara perorangan'),
(534, 3, 12, 7, '2', 'KD 4', 'K', 0, 'Memainkan ansambel musik sejenis dan campuran'),
(535, 3, 12, 8, '2', 'KD 1', 'P', 0, 'Memahami prosedur menggambar poster dengan berbagai teknik '),
(536, 3, 12, 8, '2', 'KD 2', 'P', 0, 'Memahami prosedur menggambar komik dengan berbagai teknik '),
(537, 3, 12, 8, '2', 'KD 3', 'P', 0, 'Memahami teknik memainkan salah satu alat musik tradisional secara perorangan '),
(538, 3, 12, 8, '2', 'KD 4 ', 'P', 0, 'Memahami teknik memainkan alat-alat musik tradfisional secara kelompok '),
(539, 3, 12, 8, '2', 'KD 1', 'K', 0, 'Menggambar poster dengan berbagai media bahan dan teknik '),
(540, 3, 12, 8, '2', 'KD 2', 'K', 0, 'Menggambar komik dengan berbagai teknik'),
(541, 3, 12, 8, '2', 'KD 3', 'K', 0, 'Memainkan salah satu alat musik tradisional secara perorangan'),
(542, 3, 12, 8, '2', 'KD 4 ', 'K', 0, 'Memainkan alat-alat musik tradisional secara berkelompok'),
(543, 9, 8, 8, '2', '311', 'P', 0, 'Menaksir dan menghitung luas dan volum bangun ruang'),
(544, 9, 8, 8, '2', '312', 'P', 0, 'Memahami konsep perbandingan dan menggunakan tabel, grafik dan persamaan'),
(545, 9, 8, 8, '2', '313', 'P', 0, 'Menemukan peluang empirik dan teoritik dari data'),
(546, 9, 8, 8, '2', '314', 'P', 0, 'Memahami teknik penyajian data dua variabel pada grafik'),
(547, 9, 8, 8, '2', '4.6', 'K', 0, 'Menyelesaikan permasalahan hub sdt pusat,panjang busur dan luas juring'),
(548, 9, 8, 8, '2', '4.7', 'K', 0, 'Mengolah dan menginterpretasikan data dalam bentuk tabel'),
(549, 9, 8, 8, '2', '4.8', 'K', 0, 'Melakukan percobaan untuk peluang empirik dibandingkan dengan peluang teoritik'),
(550, 16, 2, 7, '2', 'KD01', 'P', 0, 'Menguraikan al-Asma al Husna (al-Aziz, Al Ghaffar, al-basit, an-nafi\', Ar rauf, al Barr, Al fattah, '),
(551, 16, 2, 7, '2', 'KD02', 'P', 0, 'Mendeskripsikan tugas dan sifat-sifat malaikat Allah serta makhluk gaib lainnya seperti jin, iblis, '),
(552, 16, 2, 7, '2', 'KD03', 'P', 0, 'Memahami akhlak tercela riya\' dan nifaq'),
(553, 13, 13, 7, '2', 'KD 01', 'P', 0, 'Memahami konsep dasar permainan bola besar'),
(554, 16, 2, 7, '2', 'KD04', 'P', 0, 'Memahami adab membaca Al Qur\'an dan adab berdoa'),
(555, 16, 2, 7, '2', 'KD05', 'P', 0, 'Menganalisis kisah keteladanan Ashabul Kahfi'),
(556, 13, 13, 7, '2', 'KD 02', 'P', 0, 'Memahami konsep dasar permainan bola kecil'),
(557, 16, 2, 7, '2', 'KD01', 'K', 0, 'Menyajikan fakta dan fenomena kebenaran sifat-sifat Allah yang terkandung dalam al-Asma Al- Husna'),
(558, 13, 13, 7, '2', 'KD 03', 'P', 0, 'Memahami konsep dasar atletik'),
(559, 16, 2, 7, '2', 'KD02', 'K', 0, 'Menyajikan kisah-kisah dalam fenomena kehidupan tentang kebenaran adanya malaikat dan makhluk gaib '),
(560, 16, 2, 7, '2', 'KD03', 'K', 0, 'Menyimulasikan contoh perilaku riya\' dan nifaq serta dampaknya dalam kehidupan sehari-hari'),
(561, 16, 2, 7, '2', 'KD04', 'K', 0, 'Menceritakan kisah keteladanan Ashabul Kahfi'),
(562, 13, 13, 7, '2', 'KD 05', 'P', 0, 'Memahami konsep dasar senam lantai'),
(563, 13, 13, 7, '2', 'KD 06', 'P', 0, 'Memahami konsep dasar senam irama'),
(564, 13, 13, 7, '2', 'KD 07', 'P', 0, 'Memahami konsep dasar latihan kebugaran jasmani'),
(567, 13, 13, 8, '2', 'KD 01', 'P', 0, 'Memahami konsep permainan bola besar'),
(568, 13, 13, 8, '2', 'KD 02', 'P', 0, 'Memahami konsep permainan bola kecil'),
(569, 16, 2, 8, '2', 'KD01', 'P', 0, 'Memahami pengertian, dalil dan pentingnya beriman kepada Rasul Allah Swt'),
(570, 13, 13, 8, '2', 'KD 03', 'P', 0, 'Memahami konsep nomor atletik'),
(571, 16, 2, 8, '2', 'KD02', 'P', 0, 'Menguraikan sifat-sifat Rasul Allah Swt'),
(572, 13, 13, 8, '2', 'KD 05', 'P', 0, 'Memahami konsep senam lantai'),
(573, 13, 13, 8, '2', 'KD 06', 'P', 0, 'Memahami konsep aktivitas ritmik'),
(574, 13, 13, 8, '2', 'KD 07', 'P', 0, 'Memahami konsep latihan kebugaran jasmani'),
(577, 16, 2, 8, '2', 'KD03', 'P', 0, 'Memahami pengertian, contoh dan hikmah mukjizat serta kejadian luar biasa lainnya (karamah, ma\'unah '),
(578, 9, 8, 7, '2', 'KD3.1', 'P', 0, 'Memahami konsep dan prinsip garis dan sudut dalam pemecahan masalah'),
(579, 16, 2, 8, '2', 'KD04', 'P', 0, 'Memahami pengertian, contoh dan dampak positifnya sifat husnudzan, tawadhu\', tasamuh dan ta\'awun'),
(580, 16, 2, 8, '2', 'KD05', 'P', 0, 'Memahami pengertian, contoh dan dampak negatifnya sifat hasad, dendam, ghibah, fitnah dan namimah'),
(581, 16, 2, 8, '2', 'KD06', 'P', 0, 'Memahami adab kepada saudara dan teman'),
(582, 16, 2, 8, '2', 'KD07', 'P', 0, 'menganalisis kisah keteladanan sahabat Abu Bakar ra'),
(583, 16, 2, 8, '2', 'KD01', 'K', 0, 'Menyajikan peta konsep pengertian, dalil dan pentingnya beriman kepada Rasul Allah Swt'),
(584, 16, 2, 8, '2', 'KD02', 'K', 0, 'Menyajikan peta konsep sifat-Sifat Rasul Allah Swt'),
(585, 16, 2, 8, '2', 'KD03', 'K', 0, 'Menyajikan kisah-kisah dari berbagai sumber tentang adanya mukjizat dan kejadian luar biasa lainnya'),
(586, 16, 2, 8, '2', 'KD04', 'K', 0, 'Mensimulasikan dampak positif dari akhlak terpuji (husnudzan, tawadhu\', tasamuh dan ta\'awun)'),
(587, 16, 2, 8, '2', 'KD05', 'K', 0, 'Mensimulasikan dampak negatif dari akhlak tercela (hasad, dendam, ghibah, dan namimah)'),
(588, 13, 13, 7, '2', 'KD 01', 'K', 0, 'Mempraktikkan teknik dasar permainan bola besar'),
(589, 7, 1, 7, '2', 'KD.1', 'P', 0, 'Memahami isi kandungan Q.S Al Kafirun dan Al Bayyianah dan hadits tentang toleransi.'),
(590, 16, 2, 8, '2', 'KD06', 'K', 0, 'Mensimulasikan adab kepada saudara dan teman'),
(591, 13, 13, 7, '2', 'KD 02', 'K', 0, 'Mempraktikkan teknik dasar permainan bola kecil'),
(592, 13, 13, 7, '2', 'KD 03', 'K', 0, 'Mempraktikkan teknik dasar salah satu nomor atletik'),
(593, 16, 2, 8, '2', 'KD07', 'K', 0, 'Menceritakan kisah keteladanan sahabat Abu Bakar ra'),
(594, 13, 13, 7, '2', 'KD 05', 'K', 0, 'Mempraktikkan teknik dasar senam lantai'),
(595, 13, 13, 7, '2', 'KD 06', 'K', 0, 'Mempraktikkan teknik dasar aktivitas ritmik'),
(596, 7, 1, 7, '2', 'KD.2', 'P', 0, 'Memahami isi kandungan QS. Al Lahab dan An Nashr.'),
(597, 13, 13, 7, '2', 'KD 07', 'K', 0, 'Mempraktikkan latihan kebugaran jasmani'),
(600, 13, 13, 8, '2', 'KD 01', 'K', 0, 'Mempraktikkan permainan bola besar'),
(601, 7, 1, 7, '2', 'KD.1', 'K', 0, 'Menerapkan hukum bacaan qolqolah dalam QS. Al Bayyinah dan Al Kafirun.');
INSERT INTO `sr_mapel_kd` (`id`, `id_guru`, `id_mapel`, `tingkat`, `semester`, `no_kd`, `jenis`, `bobot`, `nama_kd`) VALUES
(602, 13, 13, 8, '2', 'KD 02', 'K', 0, 'Mempraktikkan permainan bola kecil'),
(603, 13, 13, 8, '2', 'KD 03', 'K', 0, 'Mempraktikkan salah satu nomor atletik'),
(605, 7, 1, 7, '2', 'KD.2', 'K', 0, 'Menulis hadits tentang sikap tasamuh.'),
(606, 13, 13, 8, '2', 'KD 05', 'K', 0, 'Mempraktikkan senam lantai'),
(607, 13, 13, 8, '2', 'KD 06', 'K', 0, 'Mempraktikkan aktivitas ritmik'),
(608, 7, 1, 7, '2', 'KD.3.', 'K', 0, 'Menerjemahkan hadits tentang sikap tasamuh.'),
(609, 13, 13, 8, '2', 'KD 07', 'K', 0, 'Mempraktikkan latihan kebugaran jasmani'),
(612, 7, 1, 7, '2', 'KD.4.', 'K', 0, 'Menghafal hadits tentang sikap tasamuh.'),
(613, 15, 10, 7, '2', '4.4', 'K', 0, 'mengobservasi dan menyajikan bentuk-bentuk dinamika interaksi manusia dengan lingkungan alam,sosial,'),
(614, 16, 4, 7, '2', 'KD01', 'P', 0, 'Memahami berbagai prestasi yang dicapai oleh Khulafaurrasyidin'),
(615, 16, 4, 7, '2', 'KD02', 'P', 0, 'Memahami sejarah berdirinya Dinasti Bani Umayyah'),
(616, 16, 4, 7, '2', 'KD03', 'P', 0, 'Memahami perkembangan kebudayaan/peradaban Islam pada masa Dinasti Bani Umayyah'),
(617, 16, 4, 7, '2', 'KD04', 'P', 0, 'Memahami tokoh ilmuwan muslim dan perannya dalam kemajuan kebudayaan/peradaban islam pada masa Dinas'),
(618, 16, 4, 7, '2', 'KD05', 'P', 0, 'Memahami sikap dan gaya kepemimpinan Umar bin Abdul Azis'),
(619, 16, 4, 7, '2', 'KD01', 'K', 0, 'Meniru model kepemimpinan Khulafaurrasyidin'),
(620, 16, 4, 7, '2', 'KD02', 'K', 0, 'Menceritakan kisah ketegasan Abu Bakar as-Siddiq dalam menghadapi kekacauan umat Islam saat wafatnya'),
(621, 16, 4, 7, '2', 'KD03', 'K', 0, 'Menceritakan kisah tentang kehidupan Umar bin Abdul Azis dalam kehidupan sehari-hari'),
(622, 16, 4, 8, '2', 'KD01', 'P', 0, 'Memahami sejarah berdirinya Dinasti Ayyubiyah'),
(623, 16, 4, 8, '2', 'KD02', 'P', 0, 'Mengidentifikasi perkembangan kebudayaan/peradaban Islam pada masa Dinasti Ayyubiyah'),
(624, 16, 4, 8, '2', 'KD03', 'P', 0, 'Memahami semangat juang para penguasa Dinasti Ayyubiyah yang terkenal (Salahuddin al- Ayyubi, Al Adi'),
(625, 16, 4, 8, '2', 'KD04', 'P', 0, 'Mengidentifikasi ilmuwan muslim dinasti Ayyubiyah dan perannya dalam kemajuan kebudayaan/peradaban '),
(626, 16, 4, 8, '2', 'KD01', 'K', 0, 'menceritakan sejarah berdirinya Dinasti Ayyubiyah'),
(627, 16, 4, 8, '2', 'KD02', 'K', 0, 'Membuat peta konsep mengenai hal-hal yang dicapai pada masa Dinasti Ayyubiyah'),
(628, 16, 4, 8, '2', 'KD03', 'K', 0, 'Menceritakan biografi tokoh yang terkenal (salahudin al-Ayyubi, Al Adil dan Al Kamil) pada masa Dina'),
(629, 16, 4, 8, '2', 'KD04', 'K', 0, 'Memaparkan peran ilmuwan dalam memajukan kebudayaaan dan peradaban Islam pada masa Dinasti Ayyubiyah'),
(630, 15, 5, 8, '2', '3.4', 'P', 0, 'menemukan makna dan arti penting kebangkitan nasional dalam perjuangan kemerdekaan'),
(631, 15, 5, 8, '2', '3.5', 'P', 0, 'mengidentifikasi nilai dan semangat sumpah pemuda tahun1928 dalam bingkai Bhinika Tunggal Ika'),
(632, 15, 5, 8, '2', '3.6', 'P', 0, 'menggali pentingnya semangat dan komitmen kebangsaan untuk memperkuat negara kesatuan Republik Indon'),
(633, 15, 5, 8, '2', '4.4', 'K', 0, 'melaksanakan tanggungjawab terkait keberagaman suku,agamaras,dan antar golongan dalam bingkai Bhinne'),
(634, 15, 5, 8, '2', '4.5 ', 'K', 0, 'menunjukan prilaku bertanggungjawab dalam bekerjasama di berbagai bidang kehidupan dimasyarakat'),
(635, 15, 5, 8, '2', '4.6', 'K', 0, 'menunjukan contoh karakteristik daerah tempat tinggalnya dalam kerangka Negara Kesatuan Republik Ind'),
(636, 3, 15, 7, '2', 'KD 1', 'P', 0, 'Memahami geguritan '),
(637, 3, 15, 7, '2', 'KD 2', 'P', 0, 'Memahami lagu dolanan dan tembang macapat kinanti'),
(638, 3, 15, 7, '2', 'KD 3', 'P', 0, 'Memahami teks khusus yang berupa kalimat sederhana beraksara jawa'),
(639, 3, 15, 7, '2', 'KD 1', 'K', 0, 'Menyusun geguritan sederhana'),
(640, 3, 15, 7, '2', 'KD 2', 'K', 0, 'Melagukan lagu dolanan dan tembang macapat kinanti'),
(641, 3, 15, 7, '2', 'KD 3', 'K', 0, 'Membaca dan menulis kalimat sederhana beraksara jawa'),
(645, 6, 3, 7, '2', '3.1', 'P', 0, 'Ketentuan salat Jum\'at'),
(646, 6, 3, 7, '2', '3.2', 'P', 0, 'Ketentuan Khutbah Jum\'at'),
(647, 2, 6, 8, '2', '4.10', 'K', 0, 'Menyajikan informasi dan data dalam bentuk teks eksplanasi proses terjadinya fenomena alam'),
(648, 6, 3, 7, '2', '3.3', 'P', 0, 'Ketentuan Jama\' danQashar'),
(649, 2, 6, 8, '2', '4.11', 'K', 0, 'Menceritakan kembali isi teks ulasan tentang kualitas karya'),
(650, 6, 3, 7, '2', '3.4', 'P', 0, 'Kaifiat salat ketika sakit'),
(651, 2, 6, 8, '2', '4.12', 'K', 0, 'Menyajikan tanggapan tentang kualitas karya'),
(652, 2, 6, 8, '2', '4.13', 'K', 0, 'Menyimpulkan isi saran, ajakan, arahan, pertimbangan tentang hal positif'),
(653, 6, 3, 7, '2', '3.5', 'P', 0, 'Ketentuan salat sunat muakad'),
(655, 2, 6, 8, '2', '4.14', 'K', 0, 'Menyajikan teks persuasi'),
(656, 2, 6, 8, '2', '4.15', 'K', 0, 'Menginterpretasi drama'),
(657, 2, 6, 8, '2', '4.16', 'K', 0, 'Menyajikan drama dalam bentuk pentas/naskah'),
(658, 2, 6, 8, '2', '4.17', 'K', 0, 'Membuat peta konsep/garis alur dari buku fiksi dan non fiksi'),
(659, 6, 3, 7, '2', '3.6', 'P', 0, 'Salat sunat gairu muakad'),
(660, 6, 3, 7, '2', '4.1', 'K', 0, 'Mempraktekan salat Jumat'),
(661, 6, 3, 7, '2', '4.2', 'K', 0, 'Mendemonstrasikan khutbah Jumat'),
(662, 6, 3, 7, '2', '4.3', 'K', 0, 'Mempraktikan salat sunat muakad'),
(663, 6, 3, 7, '2', '4.4', 'K', 0, 'Mempraktikan salat sunat gairu muakad'),
(664, 2, 6, 8, '2', '3.10', 'P', 0, 'Menelaah teks eksplanasi berupa paparan kejadian alam'),
(665, 2, 6, 8, '2', '3.11', 'P', 0, 'Mengidentifikasi informasi pada teks ulasan tentang kualitas karya'),
(666, 2, 6, 8, '2', '3.12', 'P', 0, 'Menelaah struktur dan kebahasaan teks ulasan '),
(667, 2, 6, 8, '2', '3.13', 'P', 0, 'Mengidentifikasi jenis saran, ajakan, arahan, dan pertimbangan tentang berbagai hal positif'),
(668, 2, 6, 8, '2', '3.14', 'P', 0, 'Menelaah struktur dan kebahasaan teks persuasi'),
(669, 2, 6, 8, '2', '3.15', 'P', 0, 'Mengidentifikasi unsur-unsur drama'),
(670, 2, 6, 8, '2', '3.16', 'P', 0, 'Menelaah karakteristik unsur dan kaidah kebahasaan'),
(671, 2, 6, 8, '2', '3.17', 'P', 0, 'Menggali dan menemukan informasi dari buku fiksi dan non fiksi'),
(672, 1, 16, 7, '2', 'KD.1', 'P', 0, 'membaca ayat'),
(673, 1, 16, 7, '2', 'KD.2', 'P', 0, 'menulis ayat'),
(674, 1, 16, 7, '2', 'KD.3', 'P', 0, 'menghafal surat'),
(675, 1, 16, 7, '2', 'KD.4', 'P', 0, 'menerjemahkan surat'),
(678, 1, 16, 7, '2', 'KD3', 'K', 0, 'menghafal'),
(680, 5, 5, 7, '2', '3.5', 'P', 0, 'Memahami keberagaman suku, agama, ras, budaya, gender dalam bingkau Bhinneka Tunggal Ika'),
(681, 5, 5, 7, '2', '3.6', 'P', 0, 'Memahami pengertian dan makna NKRI'),
(682, 5, 5, 7, '2', '3.7', 'P', 0, 'Memahami daerah temoat tinggalnya dalam kerangka NKRI'),
(683, 5, 5, 7, '2', '4.5', 'K', 0, 'Berinterakasi dengan orang lain berdasarkan prinsip Bhenika Tunggal Ika'),
(684, 5, 5, 7, '2', '4.6', 'K', 0, 'Menampilkan perilakui kebersatuan dalam keberagaman'),
(685, 5, 5, 7, '2', '4.7', 'K', 0, 'Menyajikan karakteristik daerah tempat tinggal'),
(686, 6, 3, 8, '2', '3.1', 'P', 0, 'Ketentuan shadaqah,hibah dan hadiah'),
(687, 6, 3, 8, '2', '3.2', 'P', 0, ' Tata cara melaksanakan haji'),
(688, 6, 3, 8, '2', '3.3', 'P', 0, 'Tata cara melaksakan umrah'),
(689, 6, 3, 8, '2', '3.4', 'P', 0, 'Ketentuan makanan halal-haram'),
(690, 6, 3, 8, '2', '3.5', 'P', 0, 'Ketentuan minuman halal-haram'),
(691, 6, 3, 8, '2', '3.5', 'P', 0, 'Ketentuan minuman halal-haram'),
(692, 6, 3, 8, '2', '4.1', 'K', 0, 'Tata cara shadaqah,hibah,dan hadiah'),
(693, 6, 3, 8, '2', '4.2', 'K', 0, 'Tata cara haji dan umrah'),
(694, 6, 3, 8, '2', '4.3', 'K', 0, 'Tata cara mengkonsumsi makanan,minuman halal dan baik'),
(695, 11, 8, 8, '2', '311', 'P', 0, 'Menaksir dan menghitung Luas dan Volume bangun ruang'),
(696, 11, 8, 8, '2', '312', 'P', 0, 'Memahami konsep perbandingan dan menggunakan tabel grafik dan persamaan'),
(697, 11, 8, 8, '2', '313', 'P', 0, 'Menemukan peluang empirik dan teoritikal dari data'),
(698, 11, 8, 8, '2', '314', 'P', 0, 'memahami teknik penyajian data dua variabel pada grafik'),
(699, 11, 8, 8, '2', '46', 'K', 0, 'Menyelesaikan permasalahan hubungan sudut pusat, panjang busur dan luas juring'),
(700, 11, 8, 8, '2', '47', 'K', 0, 'mengolah dan menginterpretasikan data dalam bentuk tabel'),
(701, 11, 8, 8, '2', '48', 'K', 0, 'melakukan percobaan untuk peluang empirik dibandingkan peluang teoritik'),
(702, 3, 15, 8, '2', 'KD 1', 'P', 0, 'Memahami puisi jawa (geguritan)'),
(703, 3, 15, 8, '2', 'KD 2', 'P', 0, 'Memahami tembang macapat pangkur'),
(704, 3, 15, 8, '2', 'KD 3', 'P', 0, 'Memahami teks khusus kalimat sederhana beraksara jawa'),
(705, 3, 15, 8, '2', 'KD 1', 'K', 0, 'Membaca geguritan'),
(706, 3, 15, 8, '2', 'KD 2', 'K', 0, 'Melagukan tembang macapat pangkur'),
(707, 3, 15, 8, '2', 'KD 3', 'K', 0, 'Mebaca,menulis kalimat beraksara jawa'),
(708, 6, 1, 8, '2', '3.1', 'P', 0, 'Ketentuan hukum bacaan lam dan ra\' dalam Al-Qur\'an'),
(709, 6, 1, 8, '2', '3.2', 'P', 0, 'Kandungan QS.al-Humazah dan QS.at-Kasur tentang sifat cinta dunia dan melupakan kebahagiaan hakiki'),
(710, 6, 1, 8, '2', '3.3', 'P', 0, 'Kandungan Hadis tentang perilaku keseimbangan hidup di dunia dan akhirat'),
(711, 6, 1, 8, '2', '4.1', 'K', 0, 'Hukum bacaan lam dan ra\' dalam QS.al-Humazah QS.at-Takasur'),
(712, 6, 1, 8, '2', '4.2', 'K', 0, 'Sikap sesui dengan isi kandungan QS.al-Humazah QS.at-Takasur'),
(713, 6, 1, 8, '2', '4.3', 'K', 0, 'Sikap hidup seimbang antara dunia dan akhirat'),
(714, 2, 6, 8, '2', '3.18', 'P', 0, 'Menelaah unsur buku fiksi dan non fiksi'),
(715, 2, 6, 8, '2', '4.18', 'K', 0, 'Menyajikan tanggapan terhadap buku fiksi dan non fiksi'),
(716, 13, 13, 9, '1', 'KD 01', 'P', 0, 'Memahami konsep permainan bola besar'),
(717, 13, 13, 9, '1', 'KD 02', 'P', 0, 'Memahami konsep permainan bola kecil'),
(718, 13, 13, 9, '1', 'KD 03', 'P', 0, 'Memahami konsep nomor atletik'),
(719, 13, 13, 9, '1', 'KD 05', 'P', 0, 'Memahami konsep senam lantai'),
(720, 13, 13, 9, '1', 'KD 06', 'P', 0, 'Memahami konsep aktivitas ritmik'),
(721, 13, 13, 9, '1', 'KD 07', 'P', 0, 'Memahami konsep kebugaran jasmani'),
(722, 13, 13, 9, '1', 'KD 01', 'K', 0, 'Mempraktikkan permainan bola besar'),
(723, 13, 13, 9, '1', 'KD 02', 'K', 0, 'Mempraktikkan permainan bola kecil'),
(724, 13, 13, 9, '1', 'KD 03', 'K', 0, 'Mempraktikkan nomor atletik'),
(725, 13, 13, 9, '1', 'KD 05', 'K', 0, 'Mempraktikkan senam lantai'),
(726, 13, 13, 9, '1', 'KD 06', 'K', 0, 'Mempraktikkan aktivitas ritmik'),
(727, 13, 13, 9, '1', 'KD 07', 'K', 0, 'Mempraktikkan latihan kebugaran jasmani'),
(728, 8, 9, 9, '1', '3.1', 'P', 0, 'Memahami sistem reproduksi manusia dan gangguan sistem reproduksi serta penerapan pola hidup yang me'),
(729, 8, 9, 9, '1', '3.2', 'P', 0, 'Memahami sistem perkembangbiakan pada tumbuhan dan hewan'),
(730, 5, 10, 7, '1', '3.1', 'P', 0, 'Memahami konsep ruang dan interaksi antar ruang diindonesia serta pengaruh thd kehidupan manusia'),
(731, 5, 10, 7, '1', '3.2', 'P', 0, 'Mengidentifikasi interaksi sosial dalam ruang dan pengaruhnta thd kehidupan Km'),
(732, 5, 5, 8, '1', '3.1', 'P', 0, 'Menelaah pancasila sbg dasar negara dan pandangan hidup bangsa'),
(733, 5, 5, 8, '1', '3.2', 'P', 0, 'Menelaah makna dan fungsi uud ri 1945 serta peraturan perundang undangan lainya dlm sistem hukum nas'),
(734, 5, 5, 8, '1', '3.3', 'P', 0, 'Memahami tata urutan peraturan perundang undangan dalam sistem hukum nasional diindonesia'),
(735, 19, 6, 8, '1', 'K01', 'P', 0, 'Mengidentifikasi dan menelaah struktur dan unsur-unsur berita'),
(736, 5, 10, 7, '1', '4.1', 'K', 0, 'Menjelaskan konsep ruang dan interaksi antar ruang di Indonesia serta pengaruhnya thd kehidupan manu'),
(737, 19, 6, 8, '1', 'K02', 'P', 0, 'Mengidentifikasi informasi dan menelaah pola penyajian dan unsur kebahasaan iklan,slogan,dan poster'),
(738, 19, 6, 8, '1', 'K03', 'P', 0, 'Mengidentifikasi informasi, menelaah struktur dan kebahasaan teks eksposisi'),
(739, 19, 6, 8, '1', 'K04', 'P', 0, 'Mengidentifikasi dan menelaah unsur-unsur pembangun teks puisi'),
(740, 19, 6, 8, '1', 'K05', 'P', 0, 'Mengidentifikasi dan menelaah teks eksplanasi'),
(741, 5, 10, 7, '1', '4.2', 'K', 0, 'Menyajikanhasil identifikasi tentang interaksi sosial dlm ruang dan pengaruhnya thd kehidupan '),
(742, 19, 6, 8, '1', 'K01', 'K', 0, 'Menyimpulkan dan menyajikan data dan informasi dalam bentuk teks berita'),
(743, 19, 6, 8, '1', 'K02', 'K', 0, 'Menyimpulkan dan menyajikan gagasan,pesan, dan ajakan dalam bentuk iklan, slogan dan poster'),
(744, 19, 6, 8, '1', 'K03', 'K', 0, 'Menyimpulkan isi, menyajikan gagasan dan pendapat dalam bentuk teks eksposisi'),
(745, 19, 6, 8, '1', 'K04', 'K', 0, 'Menyimpulkan, menyajikan gagasan, perasaan, dan pendapat dalam bentuk puisi'),
(746, 19, 6, 8, '1', 'K05', 'K', 0, 'Meringkas, menyajikan informasi dalam bentuk teks eksplanasi'),
(747, 8, 9, 9, '1', '3.3', 'P', 0, 'Menerapkan konsep pewarisan sifat dalam pemuliaan dan kelangsungan makhluk hidup'),
(748, 8, 9, 9, '1', '3.4', 'P', 0, 'Memahami konsep listrik statis dan gejalanya dalam kehidupan sehari hari termasuk kelistrikan pada s'),
(749, 0, 9, 9, '1', '3.5', 'P', 0, 'Menerapkan konsep rangkaian listrik, energi dan daya listrik sumber energi listrik serta upaya mengh'),
(750, 0, 9, 9, '1', '3.6', 'P', 0, 'Menerapkan konsep kemagnetan, induksi elektromagnetik dan pemanfaatan medan magnet termasuk pergerak'),
(751, 15, 15, 8, '1', '3.1', 'P', 0, 'Memahami berbagai fungsi teks lisan sesuai dengan unggah -ungguh jawa'),
(752, 15, 15, 8, '1', '3.2', 'P', 0, 'memahami strategi menyimak berita berbahasa jawa'),
(754, 5, 5, 8, '1', '4.1', 'K', 0, 'menyaji hasil telaah nilai nilai pancasila sbg dasar negara dan pandangan hidup'),
(755, 5, 5, 8, '1', '4.2', 'K', 0, 'menyajikan telaah makna kedudukan dan fungsi uud negara ri 45 dalam penerapan kehidupan sehari hari'),
(756, 5, 5, 8, '1', '4.3', 'K', 0, 'mendemonstrasikan pola pengembangan tata urutan perundang undangan di indonesia'),
(757, 14, 5, 9, '1', '3.1', 'P', 0, 'Mensyukuri Perwujudan Pancasila Sebagai Dasar Negara yang merupakan anugerah Tuhan yang Maha Esa'),
(758, 14, 5, 9, '1', '3.2', 'P', 0, 'Menghargai isi alenia dan pokok pikiran yang terkandung dalam Pembukaan Undang - Undang Dasar Negara'),
(759, 14, 5, 9, '1', '3.3', 'P', 0, 'Bersyukur Kepada Tuhan yang Maha Esa atas bentuk dan kedaulatan negara Republik Indonesia'),
(760, 14, 5, 9, '1', '3.4', 'P', 0, 'Menghormati dan Mengapresiasi Prinsip harmoni dalam keberagaman'),
(761, 14, 5, 9, '1', '3.5', 'P', 0, 'Menunjukan perilaku orang beriman dalam mencintai tanah air dalam bentuk Negara Indonesia'),
(762, 14, 5, 9, '1', '4.1', 'K', 0, 'Menunjukan sikap bangga dan bertanggung jawab akan tanah air '),
(763, 14, 5, 9, '1', '4.2', 'K', 0, 'Melaksanakan isi alenia dan pokok pikiran yang terkandung dalam pembukaan Undang - Undang Dasar RI'),
(764, 14, 5, 9, '1', '4.3', 'K', 0, 'Mengutamakan sikap tolerandalam menghadapi masalah akibat keberagaman '),
(765, 14, 5, 9, '1', '4.4', 'K', 0, 'Menunjukan sikap peduli terhadap masalah - masalah yang muncul dalam bidang sosial, budaya, ekonomi,'),
(766, 14, 5, 9, '1', '4.5', 'K', 0, 'Mengutamakan sikap disiplin sebagai warga negara '),
(767, 16, 2, 9, '1', 'K01', 'P', 0, 'Memahami pengertian beriman kepada hari Akhir dalil/ buktinya, serta tanda dan peristiwa yang berhub'),
(771, 16, 2, 9, '1', 'K02', 'P', 0, 'Memahami macam-macam alam gaib yang berhubungan dengan Hari Akhir (\'alam barzakh, yaumul ba\'ts, yaum'),
(772, 16, 2, 9, '1', 'K03', 'P', 0, 'Memahami pengertian, contoh dan dampak berilmu, kerja keras, kreatif, dan produktif dalam fenomena k'),
(773, 16, 2, 9, '1', 'K04', 'P', 0, 'Memahami adab Islami kepada tetangga'),
(774, 16, 2, 9, '1', 'K05', 'P', 0, 'Meganalisis kisah Sahabat Umar bin Khattab ra'),
(775, 16, 2, 9, '1', 'KD01', 'K', 0, 'Menyajikan data dari berbagai sumber tantang fakta dan fenomena hari Akhir dan alam gaib lain yang b'),
(776, 16, 2, 9, '1', 'KD02', 'K', 0, 'Menyajikan contoh perilaku berilmu, kerja keras, kreatif dan produktif'),
(777, 16, 2, 9, '1', 'KD03', 'K', 0, 'menyajikan kisah-kisah dari fenomena kehidupan tentang dampak positif dari berilmu, kerja keras, kre'),
(778, 16, 2, 9, '1', 'KD04', 'K', 0, 'Mensimulasikan adab islami kepada tetangga'),
(779, 16, 2, 9, '1', 'KD05', 'K', 0, 'menceritakan kisah keteladanan sahabat Umar bin Khattab ra'),
(780, 16, 4, 9, '1', 'KD01', 'P', 0, 'Memahami sejarah masuknya Islam di Nusantara melalui perdagangan, sosial dan pengajaran'),
(781, 16, 4, 9, '1', 'KD02', 'P', 0, 'Memahami bukti masuknya Islam di Nusantara abad ke-7, ke-11 dan ke-13.'),
(782, 16, 4, 9, '1', 'KD03', 'P', 0, 'Memahami faktor penyebab mudahnya perkembangan islam di Nusantara'),
(783, 16, 4, 9, '1', 'KD04', 'P', 0, 'Memahami sejarah kerajaan Islam di Jawa, Sumatera, dan Sulawesi'),
(784, 16, 4, 9, '1', 'KD05', 'P', 0, 'Memahami para tokoh beserta perannya dalam perkembangan Islam di Indonesia (Walisongo, Syaikh Abdur '),
(785, 16, 4, 9, '1', 'KD06', 'P', 0, 'Memahami peran para tokoh dalam perkembangan Islam di Indonesia'),
(786, 16, 4, 9, '1', 'KD07', 'P', 0, 'Menerapkan semangat perjuangan walisongo dalam menyebarkan agama Islam di Indonesia'),
(787, 16, 4, 9, '1', 'KD08', 'P', 0, 'Memahami semangat perjuangan Abdur Ra\'uf As singkili, Muhammad Arsyad al- Banjari, Kh. Hasyim Asy\'ar'),
(788, 16, 4, 9, '1', 'KD01', 'K', 0, 'Menceritakan alur perjalanan para pedagang Arab dalam berdakwah di Indonesia'),
(789, 16, 4, 9, '1', 'KD02', 'K', 0, 'Menceritakan perjuangan walisongo dalam menyebarkan agama Islam di Indonesia.'),
(790, 16, 4, 9, '1', 'KD03', 'K', 0, 'Menceritakan biografi Abdur rauf as- singkili, Muhammad Arsyad al-Banjari, KH. Hasyim Asy\'ari dan KH'),
(791, 8, 9, 9, '1', '4.1', 'K', 0, 'Menyajikan hasil penelusuran informasi terkait kesehatan dan upaya pencegahan gangguan pada organ re'),
(792, 8, 9, 9, '1', '4.2', 'K', 0, 'Menyajikan karya hasil perkembangbiakan pada tumbuhan'),
(793, 8, 9, 9, '1', '4.3', 'K', 0, 'Menyajikan hasil penelusuran informasi terkait tentang tanaman dan hewan hasil pemuliaan'),
(794, 8, 9, 9, '1', '4.4', 'K', 0, 'Menyajikan hasil pengamatan tentang gejala listrik statis dalam kehidupan sehari-hari'),
(795, 8, 9, 9, '1', '4.5', 'K', 0, 'Menyajikan hasil rancangan dan pengukuran berbagai rangkaian listrik'),
(796, 20, 6, 7, '1', 'KD3.1', 'P', 0, 'Mengidentifikasi informasi dan menelaah struktur dan kebahasaan teks deskripsi'),
(797, 20, 6, 7, '1', 'KD3.2', 'P', 0, 'Mengidentifikasi informasi dan menelaah struktur dan kebahasaan teks fantasi'),
(798, 20, 6, 7, '1', 'KD3.3', 'P', 0, 'Mengidentifikasi informasi dan menelaah struktur dan kebahasaan teks prosedur'),
(799, 20, 6, 7, '1', 'KD3.4', 'P', 0, 'Mengidentifikasi informasi dan menelaah struktur dan kebahasaan teks observasi'),
(800, 20, 6, 7, '1', 'KD4.1', 'K', 0, 'Menjelaskan isi dan menyajikan data, gagasan dan kesan teks deskripsi secara lisan dan tulis'),
(801, 20, 6, 7, '1', 'KD4.2', 'K', 0, 'Menceritakan kembali dan menyajikan gagasan kreatif teks fantasi'),
(802, 20, 6, 7, '1', 'KD4.3', 'K', 0, 'Menyimpulkan isi dan menyajikan data teks prosedur'),
(803, 20, 6, 7, '1', 'KD4.4', 'K', 0, 'Menyimpulkan isi dan menyajikan rangkuman teks hasil observasi'),
(804, 15, 5, 7, '1', '3.1 ', 'P', 0, 'menganalisis proses perumusan dan penetapan Pancasila sebagai Dasar Negara'),
(805, 15, 5, 7, '1', '3.2', 'P', 0, 'memahami norma-norma yang berlaku dalam kehidupan bermasyarakat untuk mewujudkan keadilan HBD tv'),
(806, 15, 5, 7, '1', '3.3', 'P', 0, 'menganalisis kesejahteraan perumusan da pengesyahan UUD Negara RI tahun 1945'),
(807, 20, 14, 9, '1', 'KD3.1', 'P', 0, 'memahami pengetahuan tentang jenis, sifat, karakter, dan teknik pengolahan bahan kayu,'),
(808, 20, 14, 9, '1', 'KD3.1', 'P', 0, 'menganalisis prinsip perancangan, pembuatan, dan penyajian produk kerajinan dari bahan kayu, bambu, '),
(809, 20, 14, 9, '1', 'KD3.2', 'P', 0, 'menganalisis prinsip kelistrikan dan sistem instalasi listrik rumah tangga\r\n'),
(811, 20, 14, 9, '1', 'KD3.2', 'P', 0, 'menganalisis instalasi listrik rumah tangga\r\n'),
(812, 20, 14, 9, '1', 'KD3.3', 'P', 0, 'memahami komoditas ikan konsumsi yang dapat dikembangkan sesuai kebutuhan wilayah setempat\r\n'),
(813, 20, 14, 9, '1', 'KD3.3', 'P', 0, 'memahami sarana dan peralatan untuk budidaya ikan konsumsi'),
(814, 20, 14, 9, '1', 'KD3.3', 'P', 0, 'memahami tahapan budidaya (pembesaran) ikan konsumsi'),
(815, 20, 14, 9, '1', 'KD3.4', 'P', 0, 'memahami  tentang prinsip perancangan, pembuatan, penyajian, dan pengemasan hasil peternakan'),
(818, 20, 14, 9, '1', 'KD4.1', 'K', 0, 'memilih jenis bahan dan teknik pengolahan bahan kayu dan bambu'),
(819, 20, 14, 9, '1', 'KD4.1', 'K', 0, 'merancang, membuat, dan menyajikan produk kerajinan dari bahan kayu, bambu, dan atau rotan '),
(820, 20, 14, 9, '1', 'KD4.2', 'K', 0, 'membuat desain konstruksi instalasi listrik rumah tangga'),
(821, 20, 14, 9, '1', 'KD4.2', 'K', 0, 'membuat instalasi listrik rumah tangga'),
(822, 20, 14, 9, '1', 'KD4.3', 'K', 0, 'menentukan komoditas ikan konsumsi yang dapat dikembangkan sesuai kebutuhan wilayah setempat'),
(823, 20, 14, 9, '1', 'KD4.3', 'K', 0, 'menyiapkan sarana dan peralatan untuk budidaya ikan konsumsi'),
(824, 20, 14, 9, '1', 'KD4.3', 'K', 0, 'mempraktikkan budidaya (pembesaran) ikan konsumsi'),
(825, 20, 14, 9, '1', 'KD4.4', 'K', 0, 'mengolah bahan pangan hasil peternakan dan perikanan yang ada di wilayah setem'),
(826, 1, 16, 8, '1', '4.3', 'P', 0, 'Menghafal'),
(827, 1, 16, 8, '1', '4.4', 'P', 0, 'Menulis'),
(828, 1, 16, 8, '1', '4.5', 'P', 0, 'Membaca'),
(829, 1, 16, 8, '1', '4.6', 'P', 0, 'Menerjemahkan'),
(830, 1, 16, 8, '1', '4.3', 'K', 0, 'Menghafal'),
(831, 1, 16, 8, '1', '4.4', 'K', 0, 'Membaca'),
(832, 1, 16, 8, '1', '4.5', 'K', 0, 'Menulis'),
(833, 1, 16, 8, '1', '4.6', 'K', 0, 'Menerjemah'),
(837, 1, 15, 9, '1', '4.3', 'P', 0, 'Menghargai dan menghayati ajaran agama yang dianut'),
(838, 1, 15, 9, '1', '4.4', 'P', 0, 'Menghargai dan menghayati perilaku jujur, disiplin, tanggungjawab, peduli dan santun dalam lingkunga'),
(839, 1, 15, 9, '1', '4.5', 'P', 0, 'Memahami pengetahuan (faktual, konseptual dan prosedural) berdasar rasa ingin tau tentang iptek seni'),
(840, 1, 15, 9, '1', '4.6', 'P', 0, 'Mencoba, mengolah dan menyajikan dalam ranah konkret'),
(841, 3, 12, 9, '1', 'K01', 'P', 0, 'Memahami konsep dan prosedur karya seni lukis dengan beragammedia dan teknik'),
(842, 3, 12, 9, '1', 'KD 2', 'P', 0, 'Memahami konsep dan prosedur karya seni patung dengan beragam media dan teknik'),
(843, 3, 12, 9, '1', 'KD 3', 'P', 0, 'Memahami cara mengubah musik modern secara unisono atau perorangan'),
(844, 3, 12, 9, '1', 'KD 4 ', 'P', 0, 'Memahami teknik bernyanyi modern'),
(845, 3, 12, 9, '1', 'KD 1', 'K', 0, 'Membuat karya seni lukis dengan berbagai media teknik'),
(846, 3, 12, 9, '1', 'KD 2', 'K', 0, 'Membuat karya seni patung dengan beragam media dan teknik'),
(847, 3, 12, 9, '1', 'KD 3', 'K', 0, 'Menggubahmusik modern secara unisono'),
(848, 3, 12, 9, '1', 'KD 4 ', 'K', 0, 'Menyanyikan musik modern secara perorangan atau kelompok'),
(849, 15, 10, 9, '1', '3:2', 'P', 0, 'Menelaah perubahan masyarakat Indonesia di zaman kemerdekaan sampai awal reformasi dalam segala aspe'),
(850, 15, 10, 9, '1', '31', 'P', 0, 'Menerapkan aspek keruangan dan konektifitas antar ruangan waktu dalam mewujudkan kesatuan wilayah Nu'),
(853, 8, 9, 9, '1', '3.5', 'P', 0, 'Menerapkan konsep rangkaian listrik, energi dan daya listrik, sumber energi listrik serta menghemat '),
(854, 20, 14, 9, '1', 'KD3.4', 'P', 0, 'menganalisis prinsip perancangan, pembuatan, penyajian, dan pengemasan bahan pangan hasil peternakan'),
(855, 20, 14, 9, '1', 'KD4.4', 'K', 0, 'membuat bahan pangan setengah jadi dari bahan pangan hasil peternakan  dan perikanan  yang ada di wi'),
(856, 15, 10, 9, '1', '4.1', 'K', 0, 'menyajikan hasil pengolahan telaah tentang hasil-hasil kebudayaandanfikiran masyarakat indonesia pad'),
(857, 15, 10, 9, '1', '4.2', 'K', 0, 'merumuskan alternatif tindakan nyata dalam mengatasi,masalah yangkelembagaan sosial,budaya ,ekonomi '),
(858, 20, 14, 8, '1', 'KD3.4', 'P', 0, 'menganalisis rancangan pembuatan, penyajian, dan pengemasan bahan pangan serealia, kacang-kacangan, '),
(859, 15, 5, 7, '1', '4.1', 'K', 0, 'menyajikan hasil analisisnproses perumusan dan penetapan Pancasila sebagai Dasar negara'),
(860, 15, 5, 7, '1', '4.2', 'K', 0, 'mengupayakan perilaku sesuai norma-norma yang berlaku dalam kehidupan bermasyarakat untuk mewujudkan'),
(861, 15, 5, 7, '1', '4.3', 'K', 0, 'menjelaskan proses kesejarahan perumusan dan pengesyaha UUD Negara RI tahun 1945'),
(862, 9, 8, 8, '1', '3.4', 'P', 0, 'Menjelaskan Gradien, Persamaan, dan grafik garis lurus'),
(863, 20, 14, 8, '1', 'KD4.4', 'K', 0, 'mengolah, menyaji dan mengemas bahan pangan serealia, kacang- kacangan dan umbi yang ada di wilayah '),
(864, 9, 8, 8, '1', '3.5', 'P', 0, 'Menjelaskan SPLDV dan penyelesaianya dengan masalah kontektual'),
(865, 9, 8, 8, '1', '4.5', 'K', 0, 'Menyelesaikan masalah yang berkaitan dg SPLDV'),
(867, 7, 7, 9, '1', '(KD1)', 'K', 0, 'Mendemontrasikan ungkapan sederhana tentang topik ro\'sussanatilhijriyatiljadidah, alhaflu bimaulidir'),
(868, 7, 7, 9, '1', '(KD2)', 'K', 0, 'Menunjukkan ungkapan sederhana tentang topik ro\'sussanatilhijriyatiljadidah,alhaflu bimaulidirrosul,'),
(869, 7, 7, 9, '1', '(KD3)', 'K', 0, 'Menyampaikan info lisan tentang topik rosussanatilhijriyatiljadidah, alhaflu bimaulidirrosul, nuzulu'),
(870, 7, 7, 9, '1', '(KD4)', 'K', 0, 'Mengungkapkan info scr tertulis sederhana tentang topik rosussanatilhijriyatiljadidah, alhaflu bimau'),
(871, 7, 7, 9, '1', '(KD5)', 'K', 0, 'Menyusun teks sederhana tentang topik rosussanatilhijriyatildadidah, alhaflu bimaulidirrosul, nuzulu'),
(872, 15, 15, 8, '1', '4.3', 'K', 0, 'menyusun tanggapan siaran berita berbahasa jawa'),
(873, 12, 11, 9, '1', '3.1', 'P', 0, 'Teks lisan dan tulis tentang tindakan menyatakan harapan,doa dan ucapan selamat.'),
(874, 12, 11, 9, '1', '3.2', 'P', 0, 'teks lisan dan tulis tentang memberi dan meminta informasi serta persetujuan dan ketidaksetujuan.'),
(875, 12, 11, 9, '1', '3.3', 'P', 0, 'Teks lisan dan tulis tentang label makanan/minuman dan obat.'),
(876, 12, 11, 9, '1', '3.4', 'P', 0, 'Teks lisan dan tulis prosedur membuat makanan/minuman dan manual.'),
(877, 12, 11, 9, '1', '3.5', 'P', 0, 'Teks lisan dan tulis tentang present continuous tense, past contunuous tense dan future tense.'),
(878, 12, 11, 9, '1', '3.6', 'P', 0, 'Teks lisan dan tulis tentang present perfect tense.'),
(879, 12, 11, 9, '1', '4.1', 'K', 0, 'Menyusun teks lisan dan tulis tentang tindakan menyatakan harapan, doa dan ucapan selamat.'),
(880, 12, 11, 9, '1', '4.2', 'K', 0, 'Menyusun teks lisan dan tulis tentang meminta dan memberi informasi serta persetujuan dan ketidakset'),
(881, 12, 11, 9, '1', '4.3', 'K', 0, 'Menangkap makna teks label makanan/minuman dan obat.'),
(882, 12, 11, 9, '1', '4.4', 'K', 0, 'Menangkap makna teks prosedur resep makanan/minuman dan manual.'),
(883, 12, 11, 9, '1', '4.5', 'K', 0, 'Menyusun teks lisan dan tulis tentang present continuous tense, past continuous tense dan future ten'),
(884, 12, 11, 9, '1', '4.6', 'K', 0, 'Menyusun teks lisan dan tulis tentang present perfect tense.'),
(885, 7, 7, 8, '1', '(KD4)', 'K', 0, 'Mengungkapkan info scr tertulis tentang topik assa\'ah,yaumiyatuna filmadrosah dan yaumiyatuna fil ba'),
(886, 7, 7, 8, '1', '(KD5)', 'K', 0, 'Menyusun teks sederhana tentang assa\'ah,yaumiyatuna fil madrosah dan yaumiyatuna fil baiti'),
(888, 7, 7, 9, '1', '(KD1)', 'P', 0, 'Mengidentifikasi bunyi, kata,frasa dan kal b Arab yang terkait dengan ro\'susanatilhijriyatiljadidah,'),
(889, 11, 8, 9, '1', 'kd3', 'P', 0, 'memahami konsep kesebangunan dan kekongruenan geometri melalui pengamatan'),
(890, 11, 8, 9, '1', 'kd4', 'P', 0, 'menentukan luas selimut dan volume tabung, kerucut dan bola'),
(891, 7, 7, 9, '1', '(KD2)', 'P', 0, 'Melafalkan bunyi,kata,frasa dan kal b Arab tentang ro\'sussanatilhijriyatiljadidah,alhaflu bimaulidir'),
(892, 11, 8, 9, '1', 'kd5', 'P', 0, 'menentukan rata-rata, median dan modus dari berbagai jenis data'),
(893, 7, 7, 9, '1', '(KD3)', 'P', 0, 'Menemukan makna kata,frasa dan kal b Arab tentang ro\'sussanatilhijriyatiljadidah, alhaflu bimaulidir'),
(894, 11, 8, 9, '1', 'kd1', 'K', 0, 'menggunakan konsep perbandingan untuk menyelesaikan masalah nyata mencakup perbandingan bertingkat d'),
(895, 11, 8, 9, '1', 'kd2', 'K', 0, 'mengenal pola bilangan, barisan, deret dan semacam dan menggunakan untuk menyelesaikan masalan nyata'),
(896, 11, 8, 9, '1', 'kd3', 'K', 0, 'menyelesaikan masalah nyata hasil pengamatan yang terkait penerapan kesebangunan dan kekongruenan'),
(897, 11, 8, 9, '1', 'kd04', 'K', 0, 'mengumpulkan, mengolah, menginterprestasi dan menampilkan data hasil pengamatan dalanm bentuk tabel '),
(898, 2, 6, 9, '1', '3.1.2', 'P', 0, 'Mengidentifikasi , menelaah struktur dan kebahasaan teks lanoran'),
(899, 2, 6, 9, '1', '3.3.4', 'P', 0, 'Mengidentifikasi , menelaah struktur dan ciri-'),
(900, 2, 6, 9, '1', '3.5.6', 'P', 0, 'Mengidentifikasi,menelaah struktur dan unsur-unsur pembangun cerpen'),
(901, 2, 6, 9, '1', '3.7.8', 'P', 0, 'Mengidentifikasi,menelaah struktur dan kebahasaan teks tanggapan.'),
(902, 2, 6, 9, '1', '3.9.1', 'P', 0, 'Mengidentifikasi,menelaah pendapat dan argumen dlm teks diskusi'),
(903, 2, 6, 9, '1', '4.1.2', 'K', 0, 'Menyimpulkan,menyajikan tujuan,bahan,alat langkah dan hasil laporan.'),
(904, 11, 8, 8, '1', 'kd5', 'P', 0, 'menjelaskan SPLDV dan menyelesaikannya dengan masalah kontektual'),
(905, 2, 6, 9, '1', '4.3.4', 'K', 0, 'Menyimpulkan,menuangkan gagasan,pikiran arahan dan pesan pidato'),
(906, 2, 6, 9, '1', '4.5.6', 'K', 0, 'Menyimpulkan,mengungkapkan pengalaman ,gagasan dan unsur-unsur pembangun cerpen.'),
(908, 2, 6, 9, '1', '4.7.8', 'K', 0, 'Menyimpulkan,mengungkapkan kritik,tanggapan,sanggahan dan pujian.'),
(909, 2, 6, 9, '1', '4.9.1', 'K', 0, 'Menyimpulkan,menyajikan gagasan/pendapat dan argumen dalam teks diskusi'),
(910, 7, 16, 7, '1', '(KD1)', 'P', 0, 'Menghapal dengan baik QS Annas sampai dengan Al Qodar.'),
(911, 7, 16, 7, '1', '(KD1)', 'K', 0, 'Melafalkan dengan fasih QS Annaas  sampai dengan Al Qodar'),
(912, 7, 16, 7, '1', '(KD2)', 'K', 0, 'Menulis ayat-ayat Al Quran, QS Annaas sampai dengan Al Qodar.'),
(913, 2, 6, 8, '1', '3.1.2', 'P', 0, 'Mengidentifikasi dan menelaah struktur dan unsur-unsur berita'),
(914, 2, 6, 8, '1', '3.3.4', 'P', 0, 'Mengidentifikasi informasi dan menelaah pola penyajian dan unsur kebahasaan iklan, slogan dan poster'),
(915, 2, 6, 8, '1', '3.5.6', 'P', 0, 'Mengidentifikasi Informasi, menelaah stuktur dan kebahasaan teks eskposisi.'),
(916, 2, 6, 8, '1', '3.7.8', 'P', 0, 'Mengidentifikasi dan menelaah unsur-unsur pembangun teks puisi.'),
(917, 2, 6, 8, '1', '3.9.1', 'P', 0, 'Mengidentifikasi dan menelaah teks ekplanasi'),
(918, 2, 6, 8, '1', '4.1.2', 'K', 0, 'Menyimpulkan dan menyajikan data dan informasi dalam bentuk teks berita.'),
(919, 2, 6, 8, '1', '4.3.4', 'K', 0, 'Menyimpulkan dan menyajikan gagasan, pesan, dan ajakan dalam bentuk iklan, slogan dan poster'),
(920, 2, 6, 8, '1', '4.5.6', 'K', 0, 'Menyimpulkan isi, menyajikan gagasan dan pendapat daam bentuk teks ekposisi'),
(921, 2, 6, 8, '1', '4.7.8', 'K', 0, 'Menyimpulkan , menyajikan gagasan, perasaan, dana pendapat dalam bentuk puisi.'),
(922, 2, 6, 8, '1', '4.9.1', 'K', 0, 'Meringkas, menyajikan informasi dalam bentuk teks ekplanasi'),
(928, 6, 1, 9, '1', '3.1', 'P', 0, 'Memahami ketentuan hukum madsilah, madbadal, madtamkin, madfarqi dalam Q.S. Al Qoriah (101), Q.S. Al'),
(929, 6, 1, 9, '1', '3.2', 'P', 0, 'Memahami isi kandungan Q.S. Al Qoriah (101), Q.S. Al Zazalah (99) tentang fenomena alam dalam kehidu'),
(930, 6, 1, 9, '1', '4.1', 'K', 0, 'menerapkan hukum madsilah, madbadal, madtamkin, dan madfarqi dalam Q.S. Al Qoriah (101), Q.S. Al Zaz'),
(931, 6, 1, 9, '1', '3.3', 'P', 0, 'Memahami keterkaitan isi kandungan H.R. Tirmidzi, Ibnu Majah, Ahmad, Al Bazzar tentang perilaku menj'),
(932, 6, 1, 9, '1', '4.2', 'K', 0, 'Mensimulasikan isi kandungan Q.S. Al Qoriah (101), Q.S. Al Zazalah (99) tentang fenomena alam dalam '),
(933, 6, 1, 9, '1', '4.3', 'K', 0, 'Mendemonstrasikan sikap tentang upaya pelestarian alam sesuai H.R. Tirmidzi, H.R Ibnu majah, Ahmad, '),
(934, 6, 1, 7, '1', '3.1', 'P', 0, 'Memahami kedudukan Al Qur\'an dan Hadist sebagai pedoman hidup umat manusia'),
(935, 6, 1, 7, '1', '3.2', 'P', 0, 'Memahami isi kandungan Q.S. Al Fatikah (1), Annas (114), Al Falaq (113) Al Ikhlas (112) tentang ke E'),
(936, 6, 1, 7, '1', '3.3', 'P', 0, 'Memahami keterkaitan isi kandungan Hadist tentang iman riwayat Ali bin Abi Tholib dari Ibnu Majah'),
(937, 6, 1, 7, '1', '4.1', 'K', 0, 'Membaca Q.S. Al Fatikhah, Annas, Al Falaq, Al Ikhlas dengan fasih dan tartil'),
(938, 6, 1, 7, '1', '4.2', 'K', 0, 'Menghafal Q.S. Al Fatikhah, Annas, Al Falaq, Al Ikhlas secara fasih dan tartil'),
(939, 6, 1, 7, '1', '4.3', 'K', 0, 'Menulis hadist tentang iman yang diterima Allah dan menulis hadist tentang ibadah yang diterima Alla'),
(940, 6, 3, 9, '1', '3.1', 'P', 0, 'Memahami ketentuan menyembelih binatang'),
(941, 6, 3, 9, '1', '3.2', 'P', 0, 'Memahami ketentuan Qurban dan Aqikoh'),
(942, 6, 3, 9, '1', '3.3', 'P', 0, 'Memahami ketentuan jual beli dan qirod'),
(943, 6, 3, 9, '1', '3.4', 'P', 0, 'Menganalisis larangan riba'),
(944, 6, 3, 9, '1', '4.1', 'K', 0, 'Mendemonstrasikan tata cara menyembelih binatang'),
(945, 6, 3, 9, '1', '4.2', 'K', 0, 'Menyajikan contoh tata cara pelaksanaan qurban dan aqikah'),
(946, 6, 3, 9, '1', '4.3', 'K', 0, 'Mempraktikan pelaksanaan jual beli dan qirod'),
(947, 6, 3, 9, '1', '4.4', 'K', 0, 'Mensimulasikan tata cara menghindari riba'),
(949, 1, 15, 9, '1', '4.3', 'K', 0, 'Menghargai dan menghayati ajaran agama yang dianut'),
(950, 1, 15, 9, '1', '4.4', 'K', 0, 'Menghargai dan menghayati perilaku jujur, disiplin, tanggungjawab, peduli dan santun dalam lingkunga'),
(951, 1, 15, 9, '1', '4.5', 'K', 0, 'Memahami pengetahuan (faktual, konseptual dan prosedural) berdasar rasa ingin tau tentang iptek seni'),
(952, 1, 15, 9, '1', '4.6', 'K', 0, 'Mencoba, mengolah dan menyajikan dalam ranah konkret'),
(953, 14, 5, 9, '2', '3.4', 'P', 0, 'Menganalisis prinsip persatuan dalam keberagaman suku, agama, ras, dan antargolongan (SARA), sosial,'),
(954, 14, 5, 9, '2', '3.5', 'P', 0, 'Menganalisis prinsip harmoni dalam keberagaman suku, agama, ras, dan antargolongan (SARA) sosial, bu'),
(955, 14, 5, 9, '2', '3.6', 'P', 0, 'Mengkreasikan konsep cinta tanah air/bela negara dalam konteks Negara Kesatuan Republik Indonesia'),
(956, 14, 5, 9, '2', '4.4', 'K', 0, 'Mendemonstrasikan hasil analisis prinsip persatuan dalam keberagaman suku, agama, ras, dan antargolo'),
(957, 14, 5, 9, '2', '4.5', 'K', 0, 'Menyampaikan hasil analisis prinsip harmoni dalam keberagaman suku, agama, ras, dan antargolongan (S'),
(958, 14, 5, 9, '2', '4.6', 'K', 0, 'Mengorganisasikan kegiatan lingkungan yang mencerminkan konsep cinta tanah air dalam konteks kehidup'),
(959, 15, 10, 9, '2', '3.3', 'P', 0, 'Menganalisis ketergantungan\r\nantarruang dilihat dari konsep\r\nekonomi (produksi, distribusi,\r\nkonsums'),
(960, 15, 10, 9, '2', '3.4', 'P', 0, 'Menganalisis kronologi, perubahan\r\ndan kesinambungan ruang (geografis,\r\npolitik, ekonomi, pendidikan'),
(961, 15, 10, 9, '2', '4.3', 'K', 0, 'Menyajikan hasil analisis tentang ketergantungan antarruang dilihat dari konsep ekonomi (produksi, d'),
(962, 15, 10, 9, '2', '4.4', 'K', 0, 'Menyajikan hasil analisis kronologi, perubahan dan kesinambungan ruang (geografis, politik, ekonomi,'),
(963, 13, 13, 9, '2', 'KD 01', 'P', 0, 'Memahami konsep permainan bola besar'),
(964, 13, 13, 9, '2', 'KD 02', 'P', 0, 'Memahami konsep permainan bola kecil'),
(965, 13, 13, 9, '2', 'KD 06', 'P', 0, 'Memahami konsep aktivitas ritmik'),
(966, 13, 13, 9, '2', 'KD 07', 'P', 0, 'Memahami konsep latihan kebugaran jasmani'),
(967, 13, 13, 9, '2', 'KD 01', 'K', 0, 'Mempraktikkan permainan bola besar'),
(968, 13, 13, 9, '2', 'KD 02', 'K', 0, 'Mempraktikkan permainan bola kecil'),
(969, 13, 13, 9, '2', 'KD 06', 'K', 0, 'Mempraktikkan aktivitas ritmik'),
(970, 13, 13, 9, '2', 'KD 07', 'K', 0, 'Mempraktikkan latihan kebugaran jasmani'),
(971, 5, 10, 7, '2', '3.3', 'P', 0, 'Memahami konsep interaksi antara \r\nmanusia dengan ruang sehingga \r\nmenghasilkan berbagai kegiatan \r\n'),
(972, 5, 10, 7, '2', '3.4', 'P', 0, '3.4 Memahami kronologi perubahan, dan \r\nkesinambungan dalam kehidupan \r\nbangsa Indonesia pada aspek '),
(973, 5, 10, 7, '2', '4.3', 'K', 0, 'Menjelaskan hasil analisis tentang  konsep interaksi antara manusia  dengan ruang sehingga menghasil'),
(974, 5, 10, 7, '2', '4.4', 'K', 0, 'Menguraikan kronologi perubahan,  dan kesinambungan dalam  kehidupan bangsa Indonesia pada  aspek po'),
(975, 8, 9, 9, '2', '3.6', 'P', 0, 'Menerapkan konsep kemagnetan, induksi elektromagnetik dan pemanfaatan medan magnet termasuk pergerak'),
(976, 8, 9, 9, '2', '3.7', 'P', 0, 'Menerapkan konsep bioteknologi dan perannya dalam kehidupan manusia'),
(977, 8, 9, 9, '2', '3.8', 'P', 0, 'Menghubungkan konsep partikel materi ( atom,ion,molekul ) struktur zat sederhana dengan sifat bahan'),
(978, 8, 9, 9, '2', '3.9', 'P', 0, 'Menghubungkan sifat fisika dan kimia tanah, organisme dalam tanah dan pentingnya tanah dalam kehidup'),
(979, 8, 9, 9, '2', '3.10', 'P', 0, 'Memahami proses dan produk teknologi ramah lingkungan untuk keberlanjutan kehidupan'),
(980, 8, 9, 9, '2', '4.6', 'K', 0, 'Membuat karya sederhana yang memanfaatkan prinsip elektromagnet'),
(981, 8, 9, 9, '2', '4.7', 'K', 0, 'Membuat salah satu produk bioteknologi konvensional yang ada di lingkungan sekitar'),
(982, 8, 9, 9, '2', '4.8', 'K', 0, 'Menyajikan hasil penyelidikan tentang sifat dan pemanfaatan bahan'),
(983, 8, 9, 9, '2', '4.9', 'K', 0, 'Menyajikan hasil penyelidikan tentang sifat - sifat tanah'),
(984, 8, 9, 9, '2', '4.10', 'K', 0, 'Menyajikan karya tentang proses dan produk teknologi sederhana yang ramah lingkungan'),
(985, 5, 5, 8, '2', '3.4', 'P', 0, 'Menganalisa makna dan arti\r\nKebangkitan nasional 1908 dalam\r\nperjuangan kemerdekaan Republik\r\nIndons'),
(986, 5, 5, 8, '2', '3.5', 'P', 0, 'Memproyeksikan nilai dan semangat\r\nSumpah Pemuda tahun 1928 dalam\r\nbingkai Bhinneka Tunggal Ika'),
(987, 5, 5, 8, '2', '3.6', 'P', 0, 'Menginterpretasikan semangat dan\r\nkomitmen kebangsaan kolektif\r\nuntuk memperkuat Negara Kesatuan\r\nRe'),
(988, 5, 5, 8, '2', '4.4', 'K', 0, 'Menyaji hasil penalaran tentang tokoh kebangkitan nasional dalam perjuangan kemerdekaan Republik Ind'),
(989, 5, 5, 8, '2', '4.5', 'K', 0, 'Mengaitkan hasil proyeksi nilai-nilai dan semangat Sumpah Pemuda Tahun 1928 dalam bingkai Bhineka Tu'),
(990, 5, 5, 8, '2', '4.6', 'K', 0, 'Mengorganisasikan kegiatan lingkungan yang mencerminkan semangat dan komitmen kebangsaan untuk mempe'),
(993, 16, 2, 9, '2', '01', 'P', 0, 'Menunjukkan bukti/dalil kebenaran akan adanya Qadha dan Qadar dan ciri-ciri perilaku orang yang beri'),
(994, 16, 2, 9, '2', '02', 'P', 0, 'Memahami pentingnya akhlak terpuji dalam pergaulan remaja dan dampak negatif pergaulan remaja yang t'),
(995, 16, 2, 9, '2', '03', 'P', 0, 'memahami adab terhadap lingkungan yaitu kepada binatang, tumbuhan, ditempat umum dan dijalan'),
(996, 16, 2, 9, '2', '04', 'P', 0, 'Menganalisis kisah keteladanan sahabat Usman bin Affan dan Ali bin Abi Thalib'),
(997, 16, 2, 9, '2', '01', 'K', 0, 'Menyajikan kisah-kisah dari berbagai sumber dalam fenomena kehidupan tentang Qadha dan Qadar'),
(998, 16, 2, 9, '2', '02', 'K', 0, 'Menyajikan data dari berbagai sumber tentang dampak negatif pergaulan remaja yang salah dalam fenome'),
(999, 16, 2, 9, '2', '03', 'K', 0, 'Mensimulasikan adab terhadap lingkungan, yaitu kepada binatang, tumbuhan, tempat umum dan jalan'),
(1000, 16, 2, 9, '2', '04', 'K', 0, 'Menceritakan kisah keteladanan Usman bin Affan dan Ali bin Abi Thalib'),
(1001, 16, 4, 9, '2', '01', 'P', 0, 'Memahami bentuk tradisi, adat dan seni budaya lokal sebagai bagian dari tradisi islam (Jawa, Sunda, '),
(1002, 16, 4, 9, '2', '02', 'P', 0, 'Menerapkan seni budaya lokal sebagai bagian dari tradisi Islam ( Jawa, Sunda, Melayu, Bugis, Minang '),
(1003, 16, 4, 9, '2', '03', 'P', 0, 'Menerapkan seni budaya lokal sebagai bagian dari tradisi Islam (Jawa, Sunda, Melayu, Bugis, Minang d'),
(1004, 16, 4, 9, '2', '04', 'P', 0, 'Menerapkan seni budaya lokal sebagai bagian dari tradisi Islam (Jawa, Sunda, melayu, Bugis, Minang d'),
(1005, 16, 4, 9, '2', '05', 'P', 0, 'Menerapkan seni budaya lokal sebagai bagian dari tradisi Islam (jawa, Sunda, Melayu, Bugis, Minang d'),
(1006, 16, 4, 9, '2', '06', 'P', 0, 'Menerapkan Seni budaya lokal sebagai bagian dari tradisi Islam (Jawa, Sunda, Melayu, Bugis, Minang d'),
(1007, 16, 4, 9, '2', '01', 'K', 0, 'Menunjukkan contoh tradisi, adat dan seni budaya lokal di Jawa, Sunda, Melayu, Bugis, Minang dan Mad'),
(1008, 16, 4, 9, '2', '02', 'K', 0, 'Menyajikan bentuk tradisi, adat dan seni budaya lokal di Jawa, Sunda, Melayu, Bugis, Minang dan Madu'),
(1009, 16, 4, 9, '2', '03', 'K', 0, 'Menyajikan bentuk tradisi, adat dan seni budaya lokal di Jawa, Sunda, Melayu, Bugis, Minang dan Madu'),
(1010, 16, 4, 9, '2', '04', 'K', 0, 'Menyajikan bentuk tradisi, adat dan seni budaya lokal di Jawa, Sunda, Melayu, Bugis, Minang dan Madu'),
(1011, 16, 4, 9, '2', '05', 'K', 0, 'Menyajikan bentuk tradisi, adat dan seni budaya lokal di Jawa, Sunda, Melayu, Bugis, Minang dan Madu'),
(1012, 16, 4, 9, '2', '06', 'K', 0, 'Menyajikan bentuk tradisi, adat dan seni budaya lokal di Jawa, Sunda, Melayu, Bugis, Minang dan Madu'),
(1013, 0, 14, 9, '2', '1.3.3', 'P', 0, 'memahami pengetahuan tentang\r\njenis, sifat, karakter, dan teknik\r\npengolahan bahan logam, batu, dan\r'),
(1014, 20, 14, 9, '2', '3.3.1', 'P', 0, 'memahami pengetahuan tentang\r\njenis, sifat, karakter, dan teknik\r\npengolahan bahan logam, batu, dan\r'),
(1015, 20, 14, 9, '2', '3.4.1', 'P', 0, 'menganalisis prinsip perancangan,\r\npembuatan, dan penyajian produk\r\nkerajinan dari bahan logam, batu'),
(1016, 20, 14, 9, '2', '3.3.2', 'P', 0, 'menganalisis dasar-dasar sistem\r\nelektronika analog, elektronika\r\ndigital, dan sistem pengendali'),
(1017, 20, 14, 9, '2', '3.4.2', 'P', 0, 'menganalisis penerapan sistem\r\npengendali elektronik'),
(1018, 20, 14, 9, '2', '3.4.3', 'P', 0, 'memahami komoditas ikan hias\r\nyang dapat dikembangkan sesuai\r\nkebutuhan wilayah setempat'),
(1019, 20, 14, 9, '2', '3.5.3', 'P', 0, 'memahami sarana dan peralatan\r\nuntuk budidaya ikan hias'),
(1020, 20, 14, 9, '2', '3.6.3', 'P', 0, 'memahami tahapan budidaya\r\n(pembesaran) ikan hias'),
(1021, 20, 14, 9, '2', '3.3.4', 'P', 0, 'menganalisis prinsip perancangan,\r\npembuatan, penyajian, dan\r\npengemasan bahan pangan setengah\r\njadi'),
(1022, 20, 14, 9, '2', '3.4.4', 'P', 0, 'menganalisis rancangan pembuatan,\r\npenyajian, dan pengemasan bahan\r\nhasil samping dari pengolahan ha'),
(1023, 20, 14, 9, '2', '4.3.1', 'K', 0, 'memilih jenis bahan dan teknik pengolahan bahan logam, batu, dan atau plastik,'),
(1024, 20, 14, 9, '2', '4.4.1', 'K', 0, 'merancang, membuat, dan menyajikan produk kerajinan dari bahan logam, batu, dan atau plastik,'),
(1025, 20, 14, 9, '2', '4.3.2', 'K', 0, 'memanipulasi sistem pengendali'),
(1026, 20, 14, 9, '2', '4.4.2', 'K', 0, 'membuat alat pengendali elektronik'),
(1027, 20, 14, 9, '2', '4.4.3', 'K', 0, 'menentukan komoditas ikan hias,'),
(1028, 20, 14, 9, '2', '4.5.3', 'K', 0, 'mengembangkan sarana dan peralatan untuk budidaya ikan hias'),
(1029, 20, 14, 9, '2', '4.6.3', 'K', 0, 'mempraktikkan budidaya (pembesaran) ikan hias'),
(1030, 20, 14, 9, '2', '4.3.4', 'K', 0, 'membuat bahan pangan setengah jadi dari hasil peternakan dan perikanan '),
(1031, 20, 14, 9, '2', '4.4.4', 'K', 0, 'mengolah bahan hasil samping dari pengolahan hasil peternakan dan perikanan'),
(1032, 7, 7, 9, '2', 'KD 1', 'P', 0, 'Mengidentifikasi bunyi kata,frasa dan kalimat  bahasa Arab yang berkaitan dengan tema Jamaluthobii\'a'),
(1033, 14, 10, 8, '2', '4.4', 'K', 0, 'analisis kronologi, perubahan dan kesinambungan ruang dari masa penjajahan sampai tumbuhnya semangat'),
(1034, 2, 6, 9, '2', '3.9', 'P', 0, 'mengidentifikasi informasi teksdiskusi berupa pemdapat pro kontra dari permasalahan aktual yg dibaca'),
(1035, 2, 6, 9, '2', '3.10', 'P', 0, 'Menelaah pendapat dan argumen\r\nyang mendukung dan yang kontra\r\ndalam teks diskusi berkaitan\r\ndengan '),
(1036, 2, 6, 9, '2', '3.11', 'P', 0, 'Mengidentifikasi isi ungkapan\r\nsimpati, kepedulian, empati, atau\r\nperasaan pribadi dari teks cerita\r'),
(1037, 2, 6, 9, '2', '3.12', 'P', 0, 'Menelaah struktur, kebahasaan,\r\ndan isi teks cerita inspiratif'),
(1038, 2, 6, 9, '2', '3.13', 'P', 0, 'Menggali informasi unsur-unsur\r\nbuku fiksi dan nonfiksi'),
(1039, 2, 6, 9, '2', '3.14', 'P', 0, 'Menelaah hubungan antara unsur-\r\nunsur buku fiksi/nonfiksi yang\r\n\r\ndibaca'),
(1040, 2, 6, 9, '2', '3.15', 'P', 0, 'Menemukan unsur-unsur dari\r\nbuku fiksi dan nonfiksi yang dibaca'),
(1041, 2, 6, 9, '2', '3.16', 'P', 0, 'Menelaah hubungan unsur-unsur\r\ndalam buku fiksi dan nonfiksi'),
(1042, 2, 6, 9, '2', '4.9', 'K', 0, 'Menyimpulkan isi gagasan, pendapat, argumen yang mendukung dan yang kontra serta solusi atas permasa'),
(1043, 2, 6, 9, '2', '4.10', 'K', 0, 'Menyajikan gagasan/pendapat, argumen yang mendukung dan yang kontra serta solusi atas permasalahan a'),
(1044, 2, 6, 9, '2', '4.11', 'K', 0, 'Menyimpulkan isi ungkapan simpati, kepedulian, empati atau perasaan pribadi dalam bentuk cerita insp'),
(1045, 2, 6, 9, '2', '4.12', 'K', 0, 'Mengungkapkan rasa simpati, empati, kepedulian, dan perasaan dalam bentuk cerita inspiratif dengan m'),
(1046, 2, 6, 9, '2', '4.13', 'K', 0, 'Membuat peta konsep/garis alur dari buku fiksi dan nonfiksi yang dibaca'),
(1047, 2, 6, 9, '2', '4.14', 'K', 0, 'Menyajikan tanggapan terhadap buku fiksi dan nonfiksi yang dibaca'),
(1048, 2, 6, 9, '2', '4.15', 'K', 0, 'Membuat peta pikiran/ rangkuman alur tentang isi buku nonfiksi/ buku fiksi yang dibaca'),
(1049, 2, 6, 9, '2', '4.16', 'K', 0, 'Menyajikan tanggapan terhadap isi buku fiksi nonfiksi yang dibaca'),
(1050, 7, 7, 9, '2', 'KD 2', 'P', 0, 'Melafalkan bunyi huruf,kata,frasa dan kalimat bahasa Arab yang berkaitan dengan tema Jamaluthobi\'ah,'),
(1051, 1, 16, 8, '2', '4.1', 'K', 0, 'Menulis'),
(1052, 1, 16, 8, '2', '4.2', 'K', 0, 'menghafal'),
(1053, 1, 16, 8, '2', '4.3', 'K', 0, 'Membaca'),
(1054, 1, 16, 8, '2', '4.4', 'K', 0, 'Menterjemahkan'),
(1055, 12, 11, 9, '2', '3.7', 'P', 0, 'Membandingkan teks lisan dan tulis tentang naratif'),
(1056, 12, 11, 9, '2', '3.8', 'P', 0, 'Teks lisan dan tulis meminta dan memberi informasi dengan menggunakan unsur kebahasaan passive voice'),
(1057, 7, 7, 9, '2', 'KD 3', 'P', 0, 'Menemukan makna atau gagasan dari ujaran kata, frasa dan kal b Arab yang berkaitan dengan Jamaluthob'),
(1058, 1, 16, 8, '2', '4.1', 'P', 0, 'Menulis'),
(1059, 1, 16, 8, '2', '4.2', 'P', 0, 'Membaca'),
(1060, 1, 16, 8, '2', '4.3', 'P', 0, 'Menerjemahkan'),
(1061, 1, 16, 8, '2', '4.4', 'P', 0, 'Menghapal'),
(1062, 12, 11, 9, '2', '3.9', 'P', 0, 'teks information report lisan dan tulis tentang memberi dan meminta informasi terkait mata pelajaran'),
(1063, 12, 11, 9, '2', '3.10', 'P', 0, 'Teks lisan dan tulis tentang iklan produk barang dan jasa'),
(1064, 12, 11, 9, '2', '3.11', 'P', 0, 'Teks lisan dan tulis lirik lagu remaja'),
(1065, 12, 11, 9, '2', '4.7', 'K', 0, 'Menangkap makna teks lisan dan tulis tentang teks naratif'),
(1066, 12, 11, 9, '2', '4.8', 'K', 0, 'Menyusun teks lisan dan tulis meminta dan memberi informasi dengan menggunakan unsur kebahasaan pass'),
(1067, 7, 7, 9, '2', 'KD 1', 'K', 0, 'Mendemontrasikan ungkapan tentang Jamaluthobi\'ah,Kholiqul \'alam dan Hafidzu\'alalbi\'ah '),
(1068, 12, 11, 9, '2', '4.9.1', 'K', 0, 'menangkap makna teks information report lisan dan tulis terkait topik dalam mata pelajaran lain di k'),
(1069, 12, 11, 9, '2', '4.9.2', 'K', 0, 'Menyusun teks lisan dan tulis report terkait topik dalam mata pelajaran lain di kelas IX'),
(1070, 12, 11, 9, '2', '4.10', 'K', 0, 'Menangkap makna teks lisan dan tulis teks iklan produk barang dan jasa'),
(1071, 12, 11, 9, '2', '4.11', 'K', 0, 'Menangkap makna teks lisan dan tulis lagu remaja'),
(1072, 7, 7, 9, '2', 'KD 2', 'K', 0, 'Menunjukkan contoh ungkapan tentang Jamaluthobi\'ah,Kholiqul\'alam dan Hafidzu\'alalbi\'ah.'),
(1073, 7, 7, 9, '2', 'KD3', 'K', 0, 'Menyampaikan info lisan tentang Jamaluthibi\'ah,Kholiqul \'alam dan Hafidzu\'alalbii\'ah.'),
(1074, 7, 7, 9, '2', 'KD4', 'K', 0, 'Mengungkapkan informasi tentang Jamaluthobi\'ah, Kholiqul \'alam dan hafidzu \'alalbii\'ah.'),
(1075, 7, 7, 9, '2', 'kd 5', 'K', 0, 'Menyusun teks sederhana tentang Jamaluthobi\'ah,Kholiqul \'alam dan Hafidzu\'alalbi\'ah.'),
(1076, 15, 15, 8, '2', '3.5', 'P', 0, 'Memahami puisi jawa (geguritan}'),
(1077, 15, 15, 8, '2', '3.6', 'P', 0, 'Memahami tembang Macapat Pangkur'),
(1078, 15, 15, 8, '2', '3.7', 'P', 0, 'Memahami teks khusus yang berupa kalimat sederhana berakasara jawa'),
(1079, 15, 15, 8, '2', '4.5', 'K', 0, 'Membaca geguritan'),
(1080, 15, 15, 8, '2', '4.6', 'K', 0, 'Melagukan tembang Macapat Pangkur'),
(1081, 15, 15, 8, '2', '4.7', 'K', 0, 'Membaca,menulis kalimat beraksara,Jawa'),
(1082, 19, 6, 8, '2', '(3.10', 'P', 0, 'Menelaah teks eksplanasi berupa paparan kejadian alam'),
(1083, 19, 6, 8, '2', '(3.11', 'P', 0, 'Mengidentifikasi informasi pada teks ulasan tentang kualitas karya'),
(1084, 19, 6, 8, '2', '(3.12', 'P', 0, 'Menelaah struktur dan kebahasaan teks ulasan'),
(1085, 19, 6, 8, '2', '(3.13', 'P', 0, 'Mengidentifikasi jenis saran, ajakan,arahan, dan pertimbangan tentang berbagai hal positif'),
(1086, 19, 6, 8, '2', '(3.14', 'P', 0, 'Menelaah struktur dan kebahasaan teks persuasi'),
(1087, 19, 6, 8, '2', '(3.15', 'P', 0, 'Mengidentifikasi unsur-unsur drama'),
(1088, 19, 6, 8, '2', '(3.16', 'P', 0, 'Menelaah karakteristik unsur dan kaidah kebahasaan'),
(1089, 19, 6, 8, '2', '(3.17', 'P', 0, 'Menggali dan menemukan informasi dari buku fiksi dan non fiksi'),
(1090, 19, 6, 8, '2', '(3.18', 'P', 0, 'Menelaah unsur buku fiksi dan non fiksi'),
(1091, 7, 16, 7, '2', 'KD1', 'P', 0, 'Hafal Al Qur\'an dari surat Al \'Alaq sampai Asy Syams'),
(1092, 7, 16, 7, '2', 'kd1', 'K', 0, 'Mampu membaca dengan makhroj dan tajwid yang baik dari QS Al \'Alaq sampai Asy Syams.'),
(1093, 10, 9, 8, '2', '3.12', 'P', 0, 'memahami cahaya dan alat optik.'),
(1094, 19, 6, 8, '2', '4.1', 'K', 0, 'Menyajikan informasi dan data dalam bentuk teks eksplanasi proses terjadinya fenomena alam'),
(1095, 19, 6, 8, '2', '4.11', 'K', 0, 'Menceritakan kembali isi teks ulasan tentang kualitas karya'),
(1096, 19, 6, 8, '2', '4.12', 'K', 0, 'Menyajikan tanggapan tentang kualitas karya');
INSERT INTO `sr_mapel_kd` (`id`, `id_guru`, `id_mapel`, `tingkat`, `semester`, `no_kd`, `jenis`, `bobot`, `nama_kd`) VALUES
(1097, 19, 6, 8, '2', '4.13', 'K', 0, 'Menyimpulkan isi saran, ajakan, arahan, pertimbangan tentang hal positif'),
(1098, 19, 6, 8, '2', '4.14', 'K', 0, 'Menyajikan teks persuasi'),
(1099, 19, 6, 8, '2', '4.15', 'K', 0, 'Menginterpretasi drama'),
(1100, 10, 9, 8, '2', '4.12', 'K', 0, 'menyajikan hasil percobaan tentang pembentukan bayangan pada cermin dan lensa.'),
(1101, 19, 6, 8, '2', '4.16', 'K', 0, 'Menyajikan drama dalam bentuk pentas atau naskah'),
(1102, 19, 6, 8, '2', '4.17', 'K', 0, 'Membuat peta konsep atau garis alur dari buku fiksi dan non fiksi'),
(1103, 19, 6, 8, '2', '4.18', 'K', 0, 'Menyajikan tanggapan terhadap buku fiksi dan non fiksi'),
(1104, 1, 15, 9, '2', '4.1', 'P', 0, 'Menghargai dan menghayati ajaran agama yang dianutnya.'),
(1105, 1, 15, 9, '2', '4.2', 'P', 0, 'Menghargai dan menghayati perilaku jujur, disiplin, tanggung jawab, peduli . . . .'),
(1106, 1, 15, 9, '2', '4.3', 'P', 0, 'Memahami dan menerapkan pengetahuan (faktual, konseptual, dan prosedural)'),
(1107, 1, 15, 9, '2', '4.4', 'P', 0, 'Mencoba, mengolah, dan menyaji dalam ranah konkret.'),
(1108, 1, 15, 9, '2', '4.1', 'K', 0, 'Menghargai dan menghayati ajaran agama yang dianutnya.'),
(1109, 1, 15, 9, '2', '4.2', 'K', 0, 'Menghargai dan menghayati perilaku jujur, disiplin, tanggung jawab, peduli . . . .'),
(1110, 1, 15, 9, '2', '4.3', 'K', 0, 'Memahami dan menerapkan pengetahuan (faktual, konseptual, dan prosedural)'),
(1111, 1, 15, 9, '2', '4.4', 'K', 0, 'Mencoba, mengolah, dan menyaji dalam ranah konkret.'),
(1112, 15, 5, 7, '2', '3.4', 'P', 0, 'Mengidentifikasi keberagama suku,Agama,ras dan antar golongan dalam bingkai Byinneka Tunggal Ika'),
(1113, 15, 5, 7, '2', '3.5', 'P', 0, 'Menganalisis bentuk-bentuk kerjasama dealam berbagai bidang kehidupan dalam masyarakat'),
(1114, 15, 5, 7, '2', '3.6', 'P', 0, 'Mengasasosiasikan karakteristik daerah dalam kerangka negara kesatuan Republik Indonesia'),
(1115, 15, 5, 7, '2', '4.4', 'K', 0, 'Mendemontrasikan hasil identifikasi hasil identifikasi suku,Agama,ras dan antar golongan dalam bingk'),
(1116, 15, 5, 7, '2', '4.5 ', 'K', 0, 'Menunjukan bentuk-bentuk kerjasama diberbagai bidang  kehidupan masyarkat'),
(1117, 15, 5, 7, '2', '4.6', 'K', 0, 'Melaksnakan penelitian sederhana untuk mengilustrasika karakteristik daerah tempat tinggalnya sebaga'),
(1118, 3, 12, 9, '2', 'Kd.1 ', 'P', 0, 'Mensintesis secarakonseptual dan operasional tentang seni lukis'),
(1119, 3, 12, 9, '2', 'KD.2', 'P', 0, 'Mensintesis secara konseptual dan operasional tentang seni patung'),
(1120, 3, 12, 9, '2', 'Kd.3', 'P', 0, 'Mensintesis secara konseptual dan operasional tentang seni grafis'),
(1121, 3, 12, 9, '2', 'Kd. 4', 'P', 0, 'Menganalisis prosedur mengubah lagu'),
(1122, 3, 12, 9, '2', 'Kd.1', 'K', 0, 'Membuat Karya Seni Grafis dengan Berbagai Media dan Teknik '),
(1123, 3, 12, 9, '2', 'KD.2', 'K', 0, 'Merancang penyelenggaraan pameran '),
(1124, 3, 12, 9, '2', 'Kd.3', 'K', 0, 'Menyanyikan musik modern sederhana secara perorangan maupun kelompok'),
(1125, 3, 12, 9, '2', 'Kd. 4', 'K', 0, 'Menyanyikan musik ansambel modern '),
(1126, 6, 1, 9, '2', '4,1', 'K', 0, 'Hukum Md Lazm mukhafaf Kalimi,Musqal Kalimi Musaqal Hrfi'),
(1127, 6, 1, 9, '2', '4,2', 'K', 0, 'Memahami isi kandungn HR Bukhari tentng menghargai waktu dan menuntut Ilmu'),
(1128, 6, 1, 9, '2', '4,3', 'K', 0, 'Memanfaatkan waktu dan Menuntut lmu Q.S.al-\'Asr (03),q.s al-\'Alaq (96)'),
(1129, 20, 6, 7, '2', 'KD1', 'P', 0, 'Mengidentifikasi informasi dan menyimpulkan isi puisi rakyat'),
(1130, 20, 6, 7, '2', 'KD2', 'P', 0, 'Mengidentifikasi informasi dan menceritakan kembali fabel'),
(1131, 20, 6, 7, '2', 'KD3', 'P', 0, 'Menceritakan informasi dan menyimpulkan isi surat pribadi'),
(1132, 20, 6, 7, '2', 'KD4', 'P', 0, 'Menemukan unsur-unsur dan membuat rangkuman isi buku fiksi atau non fiksi'),
(1133, 20, 6, 7, '2', 'KD1', 'K', 0, 'Menelaah struktur dan mengungkapkan gagasan pesan puisi rakyat'),
(1134, 20, 6, 7, '2', 'KD2', 'K', 0, 'Menelaah struktur dan kebahasaan fabel'),
(1135, 20, 6, 7, '2', 'KD3', 'K', 0, 'Memerankan isi fabel'),
(1136, 20, 6, 7, '2', 'KD4', 'K', 0, 'menelaah unsur, kebahasaan dan menulis surat pribadi atau dinas'),
(1137, 20, 6, 7, '2', 'KD5', 'K', 0, 'Menelaah hubungan unsur dan menyajikan tanggapan isi buku fiksi atau nonfiksi'),
(1138, 6, 3, 9, '2', '4.1', 'K', 0, 'Mendemontrasikan pelaksanaan pnjam meminjam'),
(1139, 6, 3, 9, '2', '4.2', 'K', 0, 'Mendemontrasikan tata cara pelaksaan utang piutang'),
(1140, 6, 3, 9, '2', '4.3 ', 'K', 0, 'Mensimulasikan tata cara gadai'),
(1141, 6, 3, 9, '2', '4.4', 'K', 0, 'Mensimulasikan tata cara pelaksanaan pemberian upah'),
(1142, 6, 1, 9, '2', '3.1', 'P', 0, 'Hukum Mad Lazim mukhafaf Kalimi,Musaqal Kalmi,Mad Lazim \r\n Musaqal Harfi dan Mad Lazi Mukhafaf Harfi'),
(1143, 6, 1, 9, '2', '3.2', 'P', 0, 'Memahami isi kandungan Q.S.al-Ashr (103) dan Q.S. al-Alaq (96) tentang menghargai waktu dan menuntut'),
(1144, 6, 1, 9, '2', '3.3.1', 'P', 0, 'Memahami isi kandungan H.R Bukhori dari Abdullah bin Umar tentan menghargai waktu dan HR Ibnu majah '),
(1145, 0, 8, 9, '2', '3.3', 'P', 0, 'menganalisis sifat-sifat fungsi kuadrat ditinjau dari koefisien dan determinannya'),
(1146, 0, 8, 9, '2', '3.5', 'P', 0, 'Menentukan orientasi dan lokasi benda dalam koordinat Cartesius'),
(1147, 0, 8, 9, '2', '3.9', 'P', 0, 'Menentukan peluang suatu kejadian sederhana  secara empirik dan teoritik'),
(1148, 0, 8, 9, '2', '3.13', 'P', 0, 'Memahami konsep ruang sampel suatu percobaan serta memilih strategi dan aturan-aturan yang sesuai un'),
(1149, 11, 8, 9, '2', '3.3', 'P', 0, 'menganalisis sifat-sifat fungsi kuadrat ditinjau dari koefisien dan determinannya'),
(1150, 11, 8, 9, '2', '3.5', 'P', 0, 'Menentukan orientasi dan lokasi benda dalam koordinat Cartesius'),
(1151, 11, 8, 9, '2', '3.9', 'P', 0, 'Menentukan peluang suatu kejadian sederhana  secara empirik dan teoritik'),
(1152, 11, 8, 9, '2', '3.13', 'P', 0, 'Memahami konsep ruang sampel suatu percobaan serta memilih strategi dan aturan-aturan yang sesuai un'),
(1153, 11, 8, 9, '2', '4.1', 'K', 0, 'Menyelesaikan permasalahan yang berkaitan persamaan linear dua variabel, SPLDV, dan fungsi kuadrat'),
(1154, 11, 8, 9, '2', '4.7', 'K', 0, 'Menerapkan prinsip-prinsip peluang untuk menyelesaikan masalah nyata'),
(1155, 11, 8, 9, '2', '4.8', 'K', 0, 'Membuat dan menyelesaikan model matematika dari berbagai permasalahan nyata'),
(1156, 6, 1, 7, '2', '3.1', 'P', 0, 'Memahami isi kandungan al-kafirun (109),Q.H al-Bayyinah(98) tentang toleransi'),
(1157, 6, 1, 7, '2', '3.2', 'P', 0, 'Memahami isi kandungan Q.S. al-Lahab (111),Q.S.an-Nashr(110) tentang problemayika dakwah'),
(1158, 6, 1, 7, '2', '4.1', 'K', 0, 'Menulis hadis tentang sikap tasamuh'),
(1159, 6, 1, 7, '2', '4.2', 'K', 0, 'Menerapkan hukum bacaan Qalqah Q.S. al-Bayyinah(98) al-Kafirun (1090'),
(1160, 6, 3, 9, '2', '3.1', 'P', 0, 'Memahami ketentuan pinjam meminjam'),
(1161, 6, 3, 9, '2', '3.2', 'P', 0, 'Memahami ketentuan utang piutang'),
(1162, 6, 3, 9, '2', '3.3.', 'P', 0, 'Memahami ketentuan pengurusan jenazah (Memandikan,Mengkafani,menyalati,menguburkan)'),
(1163, 6, 3, 9, '2', '3.4.', 'P', 0, 'Memahami ketentuan Waris'),
(1164, 1, 8, 7, '1', 'KD 1', 'P', 0, 'Mengetahui angka dan bilangan'),
(1165, 1, 8, 7, '1', 'KD 2', 'P', 0, 'Mengetahui deret geometri'),
(1166, 1, 8, 7, '1', 'KD 1', 'K', 0, 'Terampil'),
(1167, 1, 8, 7, '1', 'KD 2', 'K', 0, 'Pinter'),
(1168, 2, 6, 7, '1', '(3.1.', 'P', 0, 'Mengidentifikasi , menelaah struktur dan kebahasaan teks lanoran\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `sr_mata_pelajaran` (
  `idmata_pelajaran` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) NOT NULL,
  `mp_kode` varchar(50) NOT NULL,
  `mp_nama` varchar(255) NOT NULL,
  `mp_kelompok` enum('A','B','C','C1','C2') NOT NULL,
  `mp_urutan` int(11) NOT NULL,
  PRIMARY KEY (`idmata_pelajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_mata_pelajaran`
--

INSERT INTO `sr_mata_pelajaran` (`idmata_pelajaran`, `unit`, `mp_kode`, `mp_nama`, `mp_kelompok`, `mp_urutan`) VALUES
(1, '5', 'PAI', 'Pendidikan Agama Islam', 'A', 1),
(2, '5', 'BIND', 'Bahasa Indonesia', 'A', 3),
(3, '5', 'MTK', 'Matematika', 'A', 5),
(46, '5', 'PKn', 'Pendidikan Kewarganegaraan', 'A', 2),
(47, '5', 'SBdP', 'Seni Budaya dan Prakarya', 'B', 1),
(48, '5', 'PJOK', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'B', 2),
(49, '5', 'IPA', 'Ilmu Pengetahuan Alam', 'A', 6),
(50, '5', 'IPS', 'Ilmu Pengetahuan Sosial', 'A', 7),
(51, '5', 'BING', 'Bahasa Inggris', 'A', 8),
(63, '5', 'MM', 'Multimedia', 'C1', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_mata_pelajaran_guru`
--

CREATE TABLE IF NOT EXISTS `sr_mata_pelajaran_guru` (
  `idmata_pelajaran_guru` int(11) NOT NULL AUTO_INCREMENT,
  `idmata_pelajaran` int(11) NOT NULL,
  `idusers` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`idmata_pelajaran_guru`),
  KEY `idmata_pelajaran` (`idmata_pelajaran`),
  KEY `idusers` (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_mata_pelajaran_guru`
--

INSERT INTO `sr_mata_pelajaran_guru` (`idmata_pelajaran_guru`, `idmata_pelajaran`, `idusers`) VALUES
(12, 48, 39),
(13, 1, 40),
(14, 51, 41),
(15, 2, 37),
(16, 3, 37),
(17, 49, 37),
(18, 50, 37),
(19, 2, 38),
(20, 3, 38),
(21, 49, 38),
(22, 50, 38),
(23, 2, 42),
(24, 3, 42),
(25, 49, 42),
(26, 50, 42),
(27, 2, 43),
(28, 3, 43),
(29, 49, 43),
(30, 50, 43),
(31, 2, 44),
(32, 3, 44),
(33, 49, 44),
(34, 50, 44),
(35, 2, 45),
(36, 49, 45),
(37, 50, 45),
(38, 3, 45),
(42, 47, 38),
(43, 46, 38),
(44, 46, 37),
(45, 47, 37),
(46, 46, 45),
(47, 47, 45),
(48, 46, 44),
(49, 47, 44),
(50, 46, 42),
(51, 47, 42),
(52, 2, 57),
(53, 51, 57),
(54, 2, 1),
(55, 48, 40),
(56, 1, 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_materi`
--

CREATE TABLE IF NOT EXISTS `sr_materi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `kelas_id` varchar(11) NOT NULL,
  `pengajar_id` int(11) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `video` text NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sr_materi`
--

INSERT INTO `sr_materi` (`id`, `unit`, `mapel_id`, `kelas_id`, `pengajar_id`, `judul`, `konten`, `file`, `video`, `tgl_posting`, `publish`, `views`) VALUES
(2, '5', 51, '2', 0, 'Kata Kata B Inggris', NULL, NULL, 'https://www.youtube.com/watch?v=Ek2yatLDl2E', '2022-04-05 11:28:59', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_naikkelas`
--

CREATE TABLE IF NOT EXISTS `sr_naikkelas` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(6) NOT NULL,
  `ta` char(5) NOT NULL,
  `naik` enum('Y','N') NOT NULL,
  `catatan_wali` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_naikkelas`
--

INSERT INTO `sr_naikkelas` (`id`, `id_siswa`, `ta`, `naik`, `catatan_wali`) VALUES
(1, 11, '1', 'Y', 'Bagus, pertahankan'),
(2, 339, '20181', 'Y', 'Bagus, tingkatkan lagi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_nilai_absensi`
--

CREATE TABLE IF NOT EXISTS `sr_nilai_absensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tp_tahun` varchar(20) NOT NULL,
  `idsiswa` int(10) NOT NULL,
  `idkelas` varchar(50) NOT NULL,
  `s` int(3) NOT NULL,
  `i` int(3) NOT NULL,
  `a` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_nilai_absensi`
--

INSERT INTO `sr_nilai_absensi` (`id`, `tp_tahun`, `idsiswa`, `idkelas`, `s`, `i`, `a`) VALUES
(1, '2021/2022-2', 11, '1', 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_nilai_ekstrakulikuler`
--

CREATE TABLE IF NOT EXISTS `sr_nilai_ekstrakulikuler` (
  `id_nilai_ekstrakulikuler` int(11) NOT NULL AUTO_INCREMENT,
  `id_ekstrakulikuler` varchar(11) DEFAULT NULL,
  `id_siswa` varchar(11) DEFAULT NULL,
  `id_kelas` varchar(11) DEFAULT NULL,
  `unit` varchar(11) NOT NULL,
  `tahun_ajaran` varchar(50) DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id_nilai_ekstrakulikuler`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_nilai_ekstrakulikuler`
--

INSERT INTO `sr_nilai_ekstrakulikuler` (`id_nilai_ekstrakulikuler`, `id_ekstrakulikuler`, `id_siswa`, `id_kelas`, `unit`, `tahun_ajaran`, `nilai`, `deskripsi`) VALUES
(2, '3', '11', '1', '5', '2021/2022-2', '87', ''),
(3, '4', '11', '1', '5', '2021/2022-2', '65', ''),
(4, '2', '13', '1', '5', '2021/2022-2', '85', ''),
(5, '3', '13', '1', '5', '2021/2022-2', '85', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_nilai_keterampilan`
--

CREATE TABLE IF NOT EXISTS `sr_nilai_keterampilan` (
  `idnilai_keterampilan` int(11) NOT NULL AUTO_INCREMENT,
  `idtahun_pelajaran` int(11) NOT NULL,
  `idmata_pelajaran` int(11) NOT NULL,
  `idusers` int(10) UNSIGNED NOT NULL,
  `idkelas` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `idkompetensi_dasar` int(11) NOT NULL,
  `nk_harian` text NOT NULL,
  PRIMARY KEY (`idnilai_keterampilan`),
  KEY `idtahun_pelajaran` (`idtahun_pelajaran`),
  KEY `idmata_pelajaran` (`idmata_pelajaran`),
  KEY `idusers` (`idusers`),
  KEY `idkelas` (`idkelas`),
  KEY `idsiswa` (`idsiswa`),
  KEY `idkompetensi_dasar` (`idkompetensi_dasar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_nilai_pengetahuan`
--

CREATE TABLE IF NOT EXISTS `sr_nilai_pengetahuan` (
  `idnilai_pengetahuan` int(11) NOT NULL AUTO_INCREMENT,
  `idtahun_pelajaran` int(11) NOT NULL,
  `idmata_pelajaran` int(11) NOT NULL,
  `idusers` int(11) UNSIGNED NOT NULL,
  `idkelas` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `idkompetensi_dasar` int(11) NOT NULL,
  `np_harian` text DEFAULT NULL,
  PRIMARY KEY (`idnilai_pengetahuan`),
  KEY `idtahun_pelajaran` (`idtahun_pelajaran`),
  KEY `idusers` (`idusers`),
  KEY `idkelas` (`idkelas`),
  KEY `idsiswa` (`idsiswa`),
  KEY `idkompetensi_dasar` (`idkompetensi_dasar`),
  KEY `idmata_pelajaran` (`idmata_pelajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_nilai_pengetahuan`
--

INSERT INTO `sr_nilai_pengetahuan` (`idnilai_pengetahuan`, `idtahun_pelajaran`, `idmata_pelajaran`, `idusers`, `idkelas`, `idsiswa`, `idkompetensi_dasar`, `np_harian`) VALUES
(1, 1, 2, 1, 1, 11, 29, '60,75,89,'),
(2, 1, 2, 1, 1, 12, 29, '48,48,66,'),
(3, 1, 2, 1, 1, 13, 29, '60,75,80,'),
(4, 1, 2, 1, 1, 14, 29, ',,,'),
(5, 1, 2, 1, 1, 15, 29, ',,,'),
(6, 1, 2, 1, 1, 16, 29, ',,,'),
(7, 1, 2, 1, 1, 17, 29, ',,,'),
(8, 1, 2, 1, 1, 18, 29, ',,,'),
(9, 1, 2, 1, 1, 19, 29, ',,,'),
(10, 1, 2, 1, 1, 20, 29, ',,,'),
(11, 1, 2, 1, 1, 21, 29, ',,,'),
(12, 1, 2, 1, 1, 22, 29, ',,,'),
(13, 1, 2, 1, 1, 23, 29, ',,,'),
(14, 1, 2, 1, 1, 24, 29, ',,,'),
(15, 1, 2, 1, 1, 25, 29, ',,,'),
(16, 1, 2, 1, 1, 26, 29, ',,,'),
(17, 1, 2, 1, 1, 27, 29, ',,,'),
(18, 1, 2, 1, 1, 28, 29, ',,,'),
(19, 1, 2, 1, 1, 29, 29, ',,,'),
(20, 1, 2, 1, 1, 30, 29, ',,,'),
(21, 1, 2, 1, 1, 31, 29, ',,,'),
(22, 1, 2, 1, 1, 11, 30, '70,70,85,'),
(23, 1, 2, 1, 1, 12, 30, ',,,'),
(24, 1, 2, 1, 1, 13, 30, ',,,'),
(25, 1, 2, 1, 1, 14, 30, ',,,'),
(26, 1, 2, 1, 1, 15, 30, ',,,'),
(27, 1, 2, 1, 1, 16, 30, ',,,'),
(28, 1, 2, 1, 1, 17, 30, ',,,'),
(29, 1, 2, 1, 1, 18, 30, ',,,'),
(30, 1, 2, 1, 1, 19, 30, ',,,'),
(31, 1, 2, 1, 1, 20, 30, ',,,'),
(32, 1, 2, 1, 1, 21, 30, ',,,'),
(33, 1, 2, 1, 1, 22, 30, ',,,'),
(34, 1, 2, 1, 1, 23, 30, ',,,'),
(35, 1, 2, 1, 1, 24, 30, ',,,'),
(36, 1, 2, 1, 1, 25, 30, ',,,'),
(37, 1, 2, 1, 1, 26, 30, ',,,'),
(38, 1, 2, 1, 1, 27, 30, ',,,'),
(39, 1, 2, 1, 1, 28, 30, ',,,'),
(40, 1, 2, 1, 1, 29, 30, ',,,'),
(41, 1, 2, 1, 1, 30, 30, ',,,'),
(42, 1, 2, 1, 1, 31, 30, ',,,');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_nilai_pengetahuan_utsuas`
--

CREATE TABLE IF NOT EXISTS `sr_nilai_pengetahuan_utsuas` (
  `idnp_utsuas` int(11) NOT NULL AUTO_INCREMENT,
  `idtahun_pelajaran` int(11) NOT NULL,
  `idmata_pelajaran` int(11) NOT NULL,
  `idusers` int(11) UNSIGNED NOT NULL,
  `idkelas` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `idkompetensi_dasar` varchar(10) NOT NULL,
  `np_uts` double NOT NULL,
  `np_uas` double NOT NULL,
  PRIMARY KEY (`idnp_utsuas`),
  KEY `idtahun_pelajaran` (`idtahun_pelajaran`),
  KEY `idmata_pelajaran` (`idmata_pelajaran`),
  KEY `idusers` (`idusers`),
  KEY `idkelas` (`idkelas`),
  KEY `idsiswa` (`idsiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_nilai_pengetahuan_utsuas`
--

INSERT INTO `sr_nilai_pengetahuan_utsuas` (`idnp_utsuas`, `idtahun_pelajaran`, `idmata_pelajaran`, `idusers`, `idkelas`, `idsiswa`, `idkompetensi_dasar`, `np_uts`, `np_uas`) VALUES
(1, 1, 2, 1, 1, 11, '', 100, 80),
(2, 1, 2, 1, 1, 12, '', 90, 98),
(3, 1, 2, 1, 1, 13, '', 85, 80),
(4, 1, 2, 1, 1, 14, '', 0, 0),
(5, 1, 2, 1, 1, 15, '', 0, 0),
(6, 1, 2, 1, 1, 16, '', 0, 0),
(7, 1, 2, 1, 1, 17, '', 0, 0),
(8, 1, 2, 1, 1, 18, '', 0, 0),
(9, 1, 2, 1, 1, 19, '', 0, 0),
(10, 1, 2, 1, 1, 20, '', 0, 0),
(11, 1, 2, 1, 1, 21, '', 0, 0),
(12, 1, 2, 1, 1, 22, '', 0, 0),
(13, 1, 2, 1, 1, 23, '', 0, 0),
(14, 1, 2, 1, 1, 24, '', 0, 0),
(15, 1, 2, 1, 1, 25, '', 0, 0),
(16, 1, 2, 1, 1, 26, '', 0, 0),
(17, 1, 2, 1, 1, 27, '', 0, 0),
(18, 1, 2, 1, 1, 28, '', 0, 0),
(19, 1, 2, 1, 1, 29, '', 0, 0),
(20, 1, 2, 1, 1, 30, '', 0, 0),
(21, 1, 2, 1, 1, 31, '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_nilai_sikap_so`
--

CREATE TABLE IF NOT EXISTS `sr_nilai_sikap_so` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tp_tahun` varchar(20) NOT NULL,
  `id_guru` int(10) NOT NULL,
  `idsiswa` int(10) NOT NULL,
  `is_wali` enum('Y','N') NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `selalu` varchar(20) NOT NULL,
  `mulai_meningkat` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_nilai_sikap_so`
--

INSERT INTO `sr_nilai_sikap_so` (`id`, `tp_tahun`, `id_guru`, `idsiswa`, `is_wali`, `deskripsi`, `selalu`, `mulai_meningkat`) VALUES
(2, '2021/2022-2', 1, 11, 'Y', '<p>Mudah berbaur dengan teman teman</p>', '', ''),
(4, '2021/2022-2', 1, 28, 'Y', '<p>Baik dengan teman teman</p>', '', ''),
(5, '2021/2022-2', 1, 39, 'Y', '<p>Hormat Kepada Guru</p>', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_nilai_sikap_sp`
--

CREATE TABLE IF NOT EXISTS `sr_nilai_sikap_sp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tp_tahun` varchar(20) NOT NULL,
  `id_guru` int(10) NOT NULL,
  `idsiswa` int(10) NOT NULL,
  `is_wali` enum('Y','N') NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `selalu` varchar(20) NOT NULL,
  `mulai_meningkat` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_nilai_sikap_sp`
--

INSERT INTO `sr_nilai_sikap_sp` (`id`, `tp_tahun`, `id_guru`, `idsiswa`, `is_wali`, `deskripsi`, `selalu`, `mulai_meningkat`) VALUES
(1, '2021/2022-2', 1, 11, 'Y', ' Selalu melakukan sikap : berdoa sebelum dan sesudah melakukan kegiatan , menjalankan ibadah sesuai dengan agamanya ; Mulai meningkat pada sikap : memberi salam pada saat awal dan akhir kegiatan', '8-9', '10'),
(3, '2021/2022-2', 1, 17, 'Y', 'memberi salam pada saat awal dan akhir kegiatan', '', ''),
(4, '2021/2022-2', 1, 14, 'Y', '<p>Selalu jujur dalam kondisi apapun dimanapun</p>', '', ''),
(5, '2021/2022-2', 1, 12, 'Y', '<p>Berprilaku baik saat belajar</p>', '', ''),
(6, '2021/2022-2', 1, 13, 'Y', '<p>Tidak sombong</p>', '', ''),
(7, '2021/2022-2', 1, 19, 'Y', '<p>Berkomunikasi Baik Dengan Teman -teman sekolah</p>', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_pajak_keuangan`
--

CREATE TABLE IF NOT EXISTS `sr_pajak_keuangan` (
  `id_pajak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pajak` varchar(200) NOT NULL,
  `besaran_pajak` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pajak`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_pajak_keuangan`
--

INSERT INTO `sr_pajak_keuangan` (`id_pajak`, `nama_pajak`, `besaran_pajak`) VALUES
(5, 'PPH 201', '20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_paketsoal`
--

CREATE TABLE IF NOT EXISTS `sr_paketsoal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `jumlah_soal` int(5) NOT NULL,
  `unit` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_paketsoal`
--

INSERT INTO `sr_paketsoal` (`id`, `id_guru`, `id_mapel`, `nama_paket`, `jumlah_soal`, `unit`) VALUES
(8, 1, 3, 'Matematika', 10, 5),
(9, 1, 3, 'ujian matematika', 10, 5),
(10, 1, 1, 'Ujian', 0, 5),
(11, 1, 3, 'test', 0, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_pembayaran_bebas`
--

CREATE TABLE IF NOT EXISTS `sr_pembayaran_bebas` (
  `id_pembayaran_bebas` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `tagihan` float DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `tanggal` varchar(30) DEFAULT NULL,
  `bayar` float(30,0) DEFAULT NULL,
  `akun` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran_bebas`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_pembayaran_bebas`
--

INSERT INTO `sr_pembayaran_bebas` (`id_pembayaran_bebas`, `id_jenis_pembayaran`, `id_siswa`, `id_kelas`, `tagihan`, `unit`, `tanggal`, `bayar`, `akun`) VALUES
(53, 6, 87, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(54, 6, 88, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(55, 6, 89, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(56, 6, 90, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(57, 6, 91, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(58, 6, 92, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(59, 6, 93, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(60, 6, 94, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(61, 6, 95, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(62, 6, 96, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(63, 6, 97, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(64, 6, 98, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(65, 6, 99, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(66, 6, 100, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(67, 6, 101, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(68, 6, 102, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(69, 6, 103, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(70, 6, 104, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(71, 6, 105, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(72, 6, 106, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(73, 6, 107, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(74, 6, 108, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(75, 6, 145, 4, 200000, '5', '2022-04-13', NULL, '622655'),
(78, 6, 140, 11, 20000000, '5', '2022-04-16', NULL, '622655'),
(79, 6, 109, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(80, 6, 110, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(81, 6, 111, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(82, 6, 112, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(83, 6, 113, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(84, 6, 114, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(85, 6, 115, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(86, 6, 116, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(87, 6, 117, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(88, 6, 118, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(89, 6, 119, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(90, 6, 120, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(91, 6, 121, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(92, 6, 122, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(93, 6, 123, 5, 300000, NULL, '2022-05-31', NULL, '622655'),
(94, 6, 29, 1, 500000, NULL, '2022-05-31', NULL, '622655');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_pembayaran_bulanan`
--

CREATE TABLE IF NOT EXISTS `sr_pembayaran_bulanan` (
  `id_pembayaran_bulanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `bulan` varchar(15) DEFAULT NULL,
  `tagihan` float DEFAULT NULL,
  `bayar` float DEFAULT 0,
  `tanggal` varchar(20) NOT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `akun` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran_bulanan`)
) ENGINE=InnoDB AUTO_INCREMENT=1537 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_pembayaran_bulanan`
--

INSERT INTO `sr_pembayaran_bulanan` (`id_pembayaran_bulanan`, `id_jenis_pembayaran`, `id_siswa`, `id_kelas`, `bulan`, `tagihan`, `bayar`, `tanggal`, `unit`, `akun`) VALUES
(625, 2, 58, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(626, 2, 58, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(627, 2, 58, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(628, 2, 58, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(629, 2, 58, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(630, 2, 58, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(631, 2, 58, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(632, 2, 58, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(633, 2, 58, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(634, 2, 58, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(635, 2, 58, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(636, 2, 58, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(637, 2, 59, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(638, 2, 59, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(639, 2, 59, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(640, 2, 59, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(641, 2, 59, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(642, 2, 59, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(643, 2, 59, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(644, 2, 59, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(645, 2, 59, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(646, 2, 59, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(647, 2, 59, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(648, 2, 59, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(649, 2, 60, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(650, 2, 60, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(651, 2, 60, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(652, 2, 60, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(653, 2, 60, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(654, 2, 60, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(655, 2, 60, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(656, 2, 60, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(657, 2, 60, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(658, 2, 60, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(659, 2, 60, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(660, 2, 60, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(661, 2, 61, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(662, 2, 61, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(663, 2, 61, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(664, 2, 61, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(665, 2, 61, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(666, 2, 61, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(667, 2, 61, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(668, 2, 61, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(669, 2, 61, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(670, 2, 61, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(671, 2, 61, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(672, 2, 61, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(673, 2, 62, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(674, 2, 62, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(675, 2, 62, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(676, 2, 62, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(677, 2, 62, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(678, 2, 62, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(679, 2, 62, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(680, 2, 62, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(681, 2, 62, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(682, 2, 62, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(683, 2, 62, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(684, 2, 62, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(685, 2, 63, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(686, 2, 63, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(687, 2, 63, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(688, 2, 63, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(689, 2, 63, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(690, 2, 63, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(691, 2, 63, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(692, 2, 63, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(693, 2, 63, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(694, 2, 63, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(695, 2, 63, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(696, 2, 63, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(697, 2, 64, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(698, 2, 64, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(699, 2, 64, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(700, 2, 64, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(701, 2, 64, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(702, 2, 64, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(703, 2, 64, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(704, 2, 64, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(705, 2, 64, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(706, 2, 64, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(707, 2, 64, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(708, 2, 64, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(709, 2, 65, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(710, 2, 65, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(711, 2, 65, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(712, 2, 65, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(713, 2, 65, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(714, 2, 65, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(715, 2, 65, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(716, 2, 65, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(717, 2, 65, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(718, 2, 65, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(719, 2, 65, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(720, 2, 65, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(721, 2, 66, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(722, 2, 66, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(723, 2, 66, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(724, 2, 66, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(725, 2, 66, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(726, 2, 66, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(727, 2, 66, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(728, 2, 66, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(729, 2, 66, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(730, 2, 66, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(731, 2, 66, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(732, 2, 66, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(733, 2, 67, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(734, 2, 67, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(735, 2, 67, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(736, 2, 67, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(737, 2, 67, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(738, 2, 67, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(739, 2, 67, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(740, 2, 67, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(741, 2, 67, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(742, 2, 67, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(743, 2, 67, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(744, 2, 67, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(745, 2, 68, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(746, 2, 68, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(747, 2, 68, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(748, 2, 68, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(749, 2, 68, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(750, 2, 68, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(751, 2, 68, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(752, 2, 68, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(753, 2, 68, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(754, 2, 68, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(755, 2, 68, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(756, 2, 68, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(757, 2, 69, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(758, 2, 69, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(759, 2, 69, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(760, 2, 69, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(761, 2, 69, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(762, 2, 69, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(763, 2, 69, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(764, 2, 69, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(765, 2, 69, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(766, 2, 69, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(767, 2, 69, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(768, 2, 69, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(769, 2, 70, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(770, 2, 70, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(771, 2, 70, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(772, 2, 70, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(773, 2, 70, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(774, 2, 70, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(775, 2, 70, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(776, 2, 70, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(777, 2, 70, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(778, 2, 70, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(779, 2, 70, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(780, 2, 70, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(781, 2, 71, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(782, 2, 71, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(783, 2, 71, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(784, 2, 71, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(785, 2, 71, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(786, 2, 71, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(787, 2, 71, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(788, 2, 71, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(789, 2, 71, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(790, 2, 71, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(791, 2, 71, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(792, 2, 71, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(793, 2, 72, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(794, 2, 72, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(795, 2, 72, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(796, 2, 72, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(797, 2, 72, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(798, 2, 72, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(799, 2, 72, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(800, 2, 72, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(801, 2, 72, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(802, 2, 72, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(803, 2, 72, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(804, 2, 72, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(805, 2, 73, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(806, 2, 73, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(807, 2, 73, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(808, 2, 73, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(809, 2, 73, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(810, 2, 73, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(811, 2, 73, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(812, 2, 73, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(813, 2, 73, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(814, 2, 73, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(815, 2, 73, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(816, 2, 73, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(817, 2, 74, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(818, 2, 74, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(819, 2, 74, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(820, 2, 74, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(821, 2, 74, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(822, 2, 74, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(823, 2, 74, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(824, 2, 74, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(825, 2, 74, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(826, 2, 74, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(827, 2, 74, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(828, 2, 74, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(829, 2, 75, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(830, 2, 75, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(831, 2, 75, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(832, 2, 75, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(833, 2, 75, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(834, 2, 75, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(835, 2, 75, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(836, 2, 75, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(837, 2, 75, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(838, 2, 75, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(839, 2, 75, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(840, 2, 75, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(841, 2, 76, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(842, 2, 76, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(843, 2, 76, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(844, 2, 76, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(845, 2, 76, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(846, 2, 76, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(847, 2, 76, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(848, 2, 76, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(849, 2, 76, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(850, 2, 76, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(851, 2, 76, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(852, 2, 76, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(853, 2, 77, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(854, 2, 77, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(855, 2, 77, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(856, 2, 77, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(857, 2, 77, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(858, 2, 77, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(859, 2, 77, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(860, 2, 77, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(861, 2, 77, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(862, 2, 77, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(863, 2, 77, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(864, 2, 77, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(865, 2, 78, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(866, 2, 78, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(867, 2, 78, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(868, 2, 78, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(869, 2, 78, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(870, 2, 78, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(871, 2, 78, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(872, 2, 78, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(873, 2, 78, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(874, 2, 78, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(875, 2, 78, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(876, 2, 78, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(877, 2, 79, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(878, 2, 79, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(879, 2, 79, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(880, 2, 79, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(881, 2, 79, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(882, 2, 79, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(883, 2, 79, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(884, 2, 79, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(885, 2, 79, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(886, 2, 79, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(887, 2, 79, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(888, 2, 79, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(889, 2, 80, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(890, 2, 80, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(891, 2, 80, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(892, 2, 80, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(893, 2, 80, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(894, 2, 80, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(895, 2, 80, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(896, 2, 80, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(897, 2, 80, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(898, 2, 80, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(899, 2, 80, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(900, 2, 80, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(901, 2, 81, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(902, 2, 81, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(903, 2, 81, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(904, 2, 81, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(905, 2, 81, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(906, 2, 81, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(907, 2, 81, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(908, 2, 81, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(909, 2, 81, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(910, 2, 81, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(911, 2, 81, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(912, 2, 81, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(913, 2, 82, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(914, 2, 82, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(915, 2, 82, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(916, 2, 82, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(917, 2, 82, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(918, 2, 82, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(919, 2, 82, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(920, 2, 82, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(921, 2, 82, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(922, 2, 82, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(923, 2, 82, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(924, 2, 82, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(925, 2, 83, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(926, 2, 83, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(927, 2, 83, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(928, 2, 83, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(929, 2, 83, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(930, 2, 83, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(931, 2, 83, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(932, 2, 83, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(933, 2, 83, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(934, 2, 83, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(935, 2, 83, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(936, 2, 83, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(937, 2, 84, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(938, 2, 84, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(939, 2, 84, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(940, 2, 84, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(941, 2, 84, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(942, 2, 84, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(943, 2, 84, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(944, 2, 84, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(945, 2, 84, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(946, 2, 84, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(947, 2, 84, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(948, 2, 84, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(949, 2, 85, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(950, 2, 85, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(951, 2, 85, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(952, 2, 85, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(953, 2, 85, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(954, 2, 85, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(955, 2, 85, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(956, 2, 85, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(957, 2, 85, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(958, 2, 85, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(959, 2, 85, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(960, 2, 85, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(961, 2, 86, 3, 'Juli', 100000, 0, '2022-04-13', '5', '622655'),
(962, 2, 86, 3, 'Agustus', 100000, 0, '2022-04-13', '5', '622655'),
(963, 2, 86, 3, 'September', 100000, 0, '2022-04-13', '5', '622655'),
(964, 2, 86, 3, 'Oktober', 100000, 0, '2022-04-13', '5', '622655'),
(965, 2, 86, 3, 'November', 100000, 0, '2022-04-13', '5', '622655'),
(966, 2, 86, 3, 'Desember', 100000, 0, '2022-04-13', '5', '622655'),
(967, 2, 86, 3, 'Januari', 100000, 0, '2022-04-13', '5', '622655'),
(968, 2, 86, 3, 'Febuari', 100000, 0, '2022-04-13', '5', '622655'),
(969, 2, 86, 3, 'Maret', 100000, 0, '2022-04-13', '5', '622655'),
(970, 2, 86, 3, 'April', 100000, 0, '2022-04-13', '5', '622655'),
(971, 2, 86, 3, 'Mei', 100000, 0, '2022-04-13', '5', '622655'),
(972, 2, 86, 3, 'Juni', 100000, 0, '2022-04-13', '5', '622655'),
(973, 2, 140, 11, 'Juli', 10000, 10000, '2022-04-13', NULL, '622655'),
(974, 2, 140, 11, 'Agustus', 10000, 10000, '2022-04-13', NULL, '622655'),
(975, 2, 140, 11, 'September', 10000, 10000, '2022-04-13', NULL, '622655'),
(976, 2, 140, 11, 'Oktober', 10000, 10000, '2022-04-13', NULL, '622655'),
(977, 2, 140, 11, 'November', 10000, 10000, '2022-04-16', NULL, '622655'),
(978, 2, 140, 11, 'Desember', 10000, 10000, '2022-04-17', NULL, '622655'),
(979, 2, 140, 11, 'Januari', 10000, 10000, '2022-05-31', NULL, '622655'),
(980, 2, 140, 11, 'Febuari', 10000, 10000, '2022-05-31', NULL, '622655'),
(981, 2, 140, 11, 'Maret', 10000, 0, '2022-04-13', NULL, '622655'),
(982, 2, 140, 11, 'April', 10000, 0, '2022-04-13', NULL, '622655'),
(983, 2, 140, 11, 'Mei', 10000, 0, '2022-04-13', NULL, '622655'),
(984, 2, 140, 11, 'Juni', 10000, 0, '2022-04-13', NULL, '622655'),
(985, 2, 87, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(986, 2, 87, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(987, 2, 87, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(988, 2, 87, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(989, 2, 87, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(990, 2, 87, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(991, 2, 87, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(992, 2, 87, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(993, 2, 87, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(994, 2, 87, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(995, 2, 87, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(996, 2, 87, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(997, 2, 88, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(998, 2, 88, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(999, 2, 88, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1000, 2, 88, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1001, 2, 88, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1002, 2, 88, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1003, 2, 88, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1004, 2, 88, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1005, 2, 88, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1006, 2, 88, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1007, 2, 88, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1008, 2, 88, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1009, 2, 89, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1010, 2, 89, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1011, 2, 89, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1012, 2, 89, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1013, 2, 89, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1014, 2, 89, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1015, 2, 89, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1016, 2, 89, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1017, 2, 89, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1018, 2, 89, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1019, 2, 89, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1020, 2, 89, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1021, 2, 90, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1022, 2, 90, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1023, 2, 90, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1024, 2, 90, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1025, 2, 90, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1026, 2, 90, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1027, 2, 90, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1028, 2, 90, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1029, 2, 90, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1030, 2, 90, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1031, 2, 90, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1032, 2, 90, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1033, 2, 91, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1034, 2, 91, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1035, 2, 91, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1036, 2, 91, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1037, 2, 91, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1038, 2, 91, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1039, 2, 91, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1040, 2, 91, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1041, 2, 91, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1042, 2, 91, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1043, 2, 91, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1044, 2, 91, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1045, 2, 92, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1046, 2, 92, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1047, 2, 92, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1048, 2, 92, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1049, 2, 92, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1050, 2, 92, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1051, 2, 92, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1052, 2, 92, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1053, 2, 92, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1054, 2, 92, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1055, 2, 92, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1056, 2, 92, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1057, 2, 93, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1058, 2, 93, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1059, 2, 93, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1060, 2, 93, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1061, 2, 93, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1062, 2, 93, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1063, 2, 93, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1064, 2, 93, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1065, 2, 93, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1066, 2, 93, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1067, 2, 93, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1068, 2, 93, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1069, 2, 94, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1070, 2, 94, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1071, 2, 94, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1072, 2, 94, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1073, 2, 94, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1074, 2, 94, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1075, 2, 94, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1076, 2, 94, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1077, 2, 94, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1078, 2, 94, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1079, 2, 94, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1080, 2, 94, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1081, 2, 95, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1082, 2, 95, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1083, 2, 95, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1084, 2, 95, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1085, 2, 95, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1086, 2, 95, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1087, 2, 95, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1088, 2, 95, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1089, 2, 95, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1090, 2, 95, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1091, 2, 95, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1092, 2, 95, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1093, 2, 96, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1094, 2, 96, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1095, 2, 96, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1096, 2, 96, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1097, 2, 96, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1098, 2, 96, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1099, 2, 96, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1100, 2, 96, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1101, 2, 96, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1102, 2, 96, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1103, 2, 96, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1104, 2, 96, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1105, 2, 97, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1106, 2, 97, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1107, 2, 97, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1108, 2, 97, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1109, 2, 97, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1110, 2, 97, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1111, 2, 97, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1112, 2, 97, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1113, 2, 97, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1114, 2, 97, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1115, 2, 97, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1116, 2, 97, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1117, 2, 98, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1118, 2, 98, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1119, 2, 98, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1120, 2, 98, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1121, 2, 98, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1122, 2, 98, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1123, 2, 98, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1124, 2, 98, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1125, 2, 98, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1126, 2, 98, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1127, 2, 98, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1128, 2, 98, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1129, 2, 99, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1130, 2, 99, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1131, 2, 99, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1132, 2, 99, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1133, 2, 99, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1134, 2, 99, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1135, 2, 99, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1136, 2, 99, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1137, 2, 99, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1138, 2, 99, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1139, 2, 99, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1140, 2, 99, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1141, 2, 100, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1142, 2, 100, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1143, 2, 100, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1144, 2, 100, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1145, 2, 100, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1146, 2, 100, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1147, 2, 100, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1148, 2, 100, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1149, 2, 100, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1150, 2, 100, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1151, 2, 100, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1152, 2, 100, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1153, 2, 101, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1154, 2, 101, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1155, 2, 101, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1156, 2, 101, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1157, 2, 101, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1158, 2, 101, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1159, 2, 101, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1160, 2, 101, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1161, 2, 101, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1162, 2, 101, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1163, 2, 101, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1164, 2, 101, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1165, 2, 102, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1166, 2, 102, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1167, 2, 102, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1168, 2, 102, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1169, 2, 102, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1170, 2, 102, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1171, 2, 102, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1172, 2, 102, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1173, 2, 102, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1174, 2, 102, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1175, 2, 102, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1176, 2, 102, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1177, 2, 103, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1178, 2, 103, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1179, 2, 103, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1180, 2, 103, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1181, 2, 103, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1182, 2, 103, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1183, 2, 103, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1184, 2, 103, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1185, 2, 103, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1186, 2, 103, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1187, 2, 103, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1188, 2, 103, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1189, 2, 104, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1190, 2, 104, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1191, 2, 104, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1192, 2, 104, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1193, 2, 104, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1194, 2, 104, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1195, 2, 104, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1196, 2, 104, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1197, 2, 104, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1198, 2, 104, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1199, 2, 104, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1200, 2, 104, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1213, 2, 106, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1214, 2, 106, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1215, 2, 106, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1216, 2, 106, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1217, 2, 106, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1218, 2, 106, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1219, 2, 106, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1220, 2, 106, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1221, 2, 106, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1222, 2, 106, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1223, 2, 106, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1224, 2, 106, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1225, 2, 107, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1226, 2, 107, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1227, 2, 107, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1228, 2, 107, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1229, 2, 107, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1230, 2, 107, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1231, 2, 107, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1232, 2, 107, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1233, 2, 107, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1234, 2, 107, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1235, 2, 107, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1236, 2, 107, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1237, 2, 108, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1238, 2, 108, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1239, 2, 108, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1240, 2, 108, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1241, 2, 108, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1242, 2, 108, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1243, 2, 108, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1244, 2, 108, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1245, 2, 108, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1246, 2, 108, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1247, 2, 108, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1248, 2, 108, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1249, 2, 145, 4, 'Juli', 60000, 0, '2022-04-13', '5', '622656'),
(1250, 2, 145, 4, 'Agustus', 60000, 0, '2022-04-13', '5', '622656'),
(1251, 2, 145, 4, 'September', 60000, 0, '2022-04-13', '5', '622656'),
(1252, 2, 145, 4, 'Oktober', 60000, 0, '2022-04-13', '5', '622656'),
(1253, 2, 145, 4, 'November', 60000, 0, '2022-04-13', '5', '622656'),
(1254, 2, 145, 4, 'Desember', 60000, 0, '2022-04-13', '5', '622656'),
(1255, 2, 145, 4, 'Januari', 60000, 0, '2022-04-13', '5', '622656'),
(1256, 2, 145, 4, 'Febuari', 60000, 0, '2022-04-13', '5', '622656'),
(1257, 2, 145, 4, 'Maret', 60000, 0, '2022-04-13', '5', '622656'),
(1258, 2, 145, 4, 'April', 60000, 0, '2022-04-13', '5', '622656'),
(1259, 2, 145, 4, 'Mei', 60000, 0, '2022-04-13', '5', '622656'),
(1260, 2, 145, 4, 'Juni', 60000, 0, '2022-04-13', '5', '622656'),
(1261, 2, 34, 2, 'Juli', 60000, 0, '2022-04-13', '5', '622655'),
(1262, 2, 34, 2, 'Agustus', 60000, 0, '2022-04-13', '5', '622655'),
(1263, 2, 34, 2, 'September', 60000, 0, '2022-04-13', '5', '622655'),
(1264, 2, 34, 2, 'Oktober', 60000, 0, '2022-04-13', '5', '622655'),
(1265, 2, 34, 2, 'November', 60000, 0, '2022-04-13', '5', '622655'),
(1266, 2, 34, 2, 'Desember', 60000, 0, '2022-04-13', '5', '622655'),
(1267, 2, 34, 2, 'Januari', 60000, 0, '2022-04-13', '5', '622655'),
(1268, 2, 34, 2, 'Febuari', 60000, 0, '2022-04-13', '5', '622655'),
(1269, 2, 34, 2, 'Maret', 60000, 0, '2022-04-13', '5', '622655'),
(1270, 2, 34, 2, 'April', 60000, 0, '2022-04-13', '5', '622655'),
(1271, 2, 34, 2, 'Mei', 60000, 0, '2022-04-13', '5', '622655'),
(1272, 2, 34, 2, 'Juni', 60000, 0, '2022-04-13', '5', '622655'),
(1273, 2, 11, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1274, 2, 11, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1275, 2, 11, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1276, 2, 11, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1277, 2, 11, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1278, 2, 11, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1279, 2, 11, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1280, 2, 11, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1281, 2, 11, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1282, 2, 11, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1283, 2, 11, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1284, 2, 11, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1285, 2, 12, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1286, 2, 12, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1287, 2, 12, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1288, 2, 12, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1289, 2, 12, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1290, 2, 12, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1291, 2, 12, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1292, 2, 12, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1293, 2, 12, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1294, 2, 12, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1295, 2, 12, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1296, 2, 12, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1297, 2, 13, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1298, 2, 13, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1299, 2, 13, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1300, 2, 13, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1301, 2, 13, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1302, 2, 13, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1303, 2, 13, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1304, 2, 13, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1305, 2, 13, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1306, 2, 13, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1307, 2, 13, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1308, 2, 13, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1309, 2, 14, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1310, 2, 14, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1311, 2, 14, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1312, 2, 14, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1313, 2, 14, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1314, 2, 14, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1315, 2, 14, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1316, 2, 14, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1317, 2, 14, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1318, 2, 14, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1319, 2, 14, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1320, 2, 14, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1321, 2, 15, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1322, 2, 15, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1323, 2, 15, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1324, 2, 15, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1325, 2, 15, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1326, 2, 15, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1327, 2, 15, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1328, 2, 15, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1329, 2, 15, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1330, 2, 15, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1331, 2, 15, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1332, 2, 15, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1333, 2, 16, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1334, 2, 16, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1335, 2, 16, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1336, 2, 16, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1337, 2, 16, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1338, 2, 16, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1339, 2, 16, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1340, 2, 16, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1341, 2, 16, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1342, 2, 16, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1343, 2, 16, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1344, 2, 16, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1345, 2, 17, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1346, 2, 17, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1347, 2, 17, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1348, 2, 17, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1349, 2, 17, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1350, 2, 17, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1351, 2, 17, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1352, 2, 17, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1353, 2, 17, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1354, 2, 17, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1355, 2, 17, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1356, 2, 17, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1357, 2, 18, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1358, 2, 18, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1359, 2, 18, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1360, 2, 18, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1361, 2, 18, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1362, 2, 18, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1363, 2, 18, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1364, 2, 18, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1365, 2, 18, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1366, 2, 18, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1367, 2, 18, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1368, 2, 18, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1369, 2, 19, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1370, 2, 19, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1371, 2, 19, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1372, 2, 19, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1373, 2, 19, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1374, 2, 19, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1375, 2, 19, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1376, 2, 19, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1377, 2, 19, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1378, 2, 19, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1379, 2, 19, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1380, 2, 19, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1381, 2, 20, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1382, 2, 20, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1383, 2, 20, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1384, 2, 20, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1385, 2, 20, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1386, 2, 20, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1387, 2, 20, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1388, 2, 20, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1389, 2, 20, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1390, 2, 20, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1391, 2, 20, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1392, 2, 20, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655');
INSERT INTO `sr_pembayaran_bulanan` (`id_pembayaran_bulanan`, `id_jenis_pembayaran`, `id_siswa`, `id_kelas`, `bulan`, `tagihan`, `bayar`, `tanggal`, `unit`, `akun`) VALUES
(1393, 2, 21, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1394, 2, 21, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1395, 2, 21, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1396, 2, 21, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1397, 2, 21, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1398, 2, 21, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1399, 2, 21, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1400, 2, 21, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1401, 2, 21, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1402, 2, 21, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1403, 2, 21, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1404, 2, 21, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1405, 2, 22, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1406, 2, 22, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1407, 2, 22, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1408, 2, 22, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1409, 2, 22, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1410, 2, 22, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1411, 2, 22, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1412, 2, 22, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1413, 2, 22, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1414, 2, 22, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1415, 2, 22, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1416, 2, 22, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1417, 2, 23, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1418, 2, 23, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1419, 2, 23, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1420, 2, 23, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1421, 2, 23, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1422, 2, 23, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1423, 2, 23, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1424, 2, 23, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1425, 2, 23, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1426, 2, 23, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1427, 2, 23, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1428, 2, 23, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1429, 2, 24, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1430, 2, 24, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1431, 2, 24, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1432, 2, 24, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1433, 2, 24, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1434, 2, 24, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1435, 2, 24, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1436, 2, 24, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1437, 2, 24, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1438, 2, 24, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1439, 2, 24, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1440, 2, 24, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1441, 2, 25, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1442, 2, 25, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1443, 2, 25, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1444, 2, 25, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1445, 2, 25, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1446, 2, 25, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1447, 2, 25, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1448, 2, 25, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1449, 2, 25, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1450, 2, 25, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1451, 2, 25, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1452, 2, 25, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1453, 2, 26, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1454, 2, 26, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1455, 2, 26, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1456, 2, 26, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1457, 2, 26, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1458, 2, 26, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1459, 2, 26, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1460, 2, 26, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1461, 2, 26, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1462, 2, 26, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1463, 2, 26, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1464, 2, 26, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1465, 2, 27, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1466, 2, 27, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1467, 2, 27, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1468, 2, 27, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1469, 2, 27, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1470, 2, 27, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1471, 2, 27, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1472, 2, 27, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1473, 2, 27, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1474, 2, 27, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1475, 2, 27, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1476, 2, 27, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1477, 2, 28, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1478, 2, 28, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1479, 2, 28, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1480, 2, 28, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1481, 2, 28, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1482, 2, 28, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1483, 2, 28, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1484, 2, 28, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1485, 2, 28, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1486, 2, 28, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1487, 2, 28, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1488, 2, 28, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1489, 2, 29, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1490, 2, 29, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1491, 2, 29, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1492, 2, 29, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1493, 2, 29, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1494, 2, 29, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1495, 2, 29, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1496, 2, 29, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1497, 2, 29, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1498, 2, 29, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1499, 2, 29, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1500, 2, 29, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1501, 2, 30, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1502, 2, 30, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1503, 2, 30, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1504, 2, 30, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1505, 2, 30, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1506, 2, 30, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1507, 2, 30, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1508, 2, 30, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1509, 2, 30, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1510, 2, 30, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1511, 2, 30, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1512, 2, 30, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655'),
(1513, 2, 31, 1, 'Juli', 2000000, 0, '2022-05-31', NULL, '622655'),
(1514, 2, 31, 1, 'Agustus', 2000000, 0, '2022-05-31', NULL, '622655'),
(1515, 2, 31, 1, 'September', 2000000, 0, '2022-05-31', NULL, '622655'),
(1516, 2, 31, 1, 'Oktober', 2000000, 0, '2022-05-31', NULL, '622655'),
(1517, 2, 31, 1, 'November', 2000000, 0, '2022-05-31', NULL, '622655'),
(1518, 2, 31, 1, 'Desember', 2000000, 0, '2022-05-31', NULL, '622655'),
(1519, 2, 31, 1, 'Januari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1520, 2, 31, 1, 'Febuari', 2000000, 0, '2022-05-31', NULL, '622655'),
(1521, 2, 31, 1, 'Maret', 2000000, 0, '2022-05-31', NULL, '622655'),
(1522, 2, 31, 1, 'April', 2000000, 0, '2022-05-31', NULL, '622655'),
(1523, 2, 31, 1, 'Mei', 2000000, 0, '2022-05-31', NULL, '622655'),
(1524, 2, 31, 1, 'Juni', 2000000, 0, '2022-05-31', NULL, '622655');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_pengaduan`
--

CREATE TABLE IF NOT EXISTS `sr_pengaduan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `what` varchar(100) NOT NULL,
  `where` varchar(100) NOT NULL,
  `when` varchar(100) NOT NULL,
  `how` varchar(225) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `bukti` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_pengumuman`
--

CREATE TABLE IF NOT EXISTS `sr_pengumuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `tgl_tampil` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `tampil_siswa` tinyint(1) NOT NULL DEFAULT 1,
  `tampil_pengajar` tinyint(1) NOT NULL DEFAULT 1,
  `pengajar_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pengajar_id` (`pengajar_id`),
  KEY `pengajar_id_2` (`pengajar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sr_pengumuman`
--

INSERT INTO `sr_pengumuman` (`id`, `judul`, `konten`, `tgl_tampil`, `tgl_tutup`, `tampil_siswa`, `tampil_pengajar`, `pengajar_id`) VALUES
(6, 'imlek', '<p>Kepada seluruh SISWA, Libur <strong>IMLEK </strong>akan tiba!</p>\r\n', '2022-01-01', '2022-02-19', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_perpusbiaya`
--

CREATE TABLE IF NOT EXISTS `sr_perpusbiaya` (
  `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL,
  PRIMARY KEY (`id_biaya_denda`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_perpusbiaya`
--

INSERT INTO `sr_perpusbiaya` (`id_biaya_denda`, `harga_denda`, `stat`, `tgl_tetap`) VALUES
(1, '40005', 'Aktif', '2019-11-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_perpusbuku`
--

CREATE TABLE IF NOT EXISTS `sr_perpusbuku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `buku_id` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `thn_buku` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_perpusbuku`
--

INSERT INTO `sr_perpusbuku` (`id_buku`, `buku_id`, `id_kategori`, `id_rak`, `sampul`, `isbn`, `lampiran`, `title`, `penerbit`, `pengarang`, `thn_buku`, `isi`, `jml`, `tgl_masuk`) VALUES
(8, 'BK008', 2, 1, '0', '132-123-234-231', '0', 'CARA MUDAH BELAJAR PEMROGRAMAN C++', 'INFORMATIKA BANDUNG', 'BUDI RAHARJO ', '2012', '<table class=\"table table-bordered\" style=\"background-color: rgb(255, 255, 255); width: 653px; color: rgb(51, 51, 51);\"><tbody><tr><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Tipe Buku</td><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Kertas</td></tr><tr><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Bahasa</td><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Indonesia</td></tr></tbody></table>', 23, '2019-11-23 11:49:57'),
(9, 'BK009', 2, 1, NULL, '121-163-214-231', NULL, 'Perkembangan Tekhnologi WEB 2.0', 'Maju Haya', 'Reza Lesmana', '2022', NULL, 121, '2019-11-23 11:49:57'),
(10, 'BK0010', 2, 1, NULL, '212', NULL, 'Pemograman PHP', 'Guntur Purnomo', 'Joko Simajuntak', '2020', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_perpusdenda`
--

CREATE TABLE IF NOT EXISTS `sr_perpusdenda` (
  `id_denda` int(11) NOT NULL AUTO_INCREMENT,
  `pinjam_id` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL,
  `lama_waktu` int(11) NOT NULL,
  `tgl_denda` varchar(255) NOT NULL,
  PRIMARY KEY (`id_denda`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_perpusdenda`
--

INSERT INTO `sr_perpusdenda` (`id_denda`, `pinjam_id`, `denda`, `lama_waktu`, `tgl_denda`) VALUES
(3, 'PJ001', '0', 0, '2020-05-20'),
(5, 'PJ009', '0', 0, '2020-05-20'),
(6, 'PJ0012', '0', 0, '2022-03-14'),
(7, 'PJ0011', '0', 0, '2022-03-14'),
(8, 'PJ0013', '0', 0, '2022-03-14'),
(9, 'PJ0014', '0', 0, '2022-05-30'),
(10, 'PJ0015', '0', 0, '2022-05-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_perpuskategori`
--

CREATE TABLE IF NOT EXISTS `sr_perpuskategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_perpuskategori`
--

INSERT INTO `sr_perpuskategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Pemrograman'),
(3, 'Kamus'),
(4, 'Almanak'),
(5, 'Direktori'),
(6, 'Ensiklopedia'),
(7, 'Buku Ajar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_perpuspinjam`
--

CREATE TABLE IF NOT EXISTS `sr_perpuspinjam` (
  `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `pinjam_id` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_perpuspinjam`
--

INSERT INTO `sr_perpuspinjam` (`id_pinjam`, `pinjam_id`, `anggota_id`, `buku_id`, `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali`) VALUES
(12, 'PJ0012', '11', 'BK009', 'Di Kembalikan', '2022-03-14', 2, '2022-03-16', '2022-03-14'),
(13, 'PJ0013', '14', 'BK009', 'Di Kembalikan', '2022-03-14', 5, '2022-03-19', '2022-03-14'),
(14, 'PJ0014', '12', 'BK008', 'Di Kembalikan', '2022-05-30', 3, '2022-06-02', '2022-05-30'),
(17, 'PJ0017', '12', 'BK008', 'Dipinjam', '2022-05-30', 3, '2022-06-02', '0'),
(18, 'PJ0018', '14', 'BK0010', 'Dipinjam', '2022-05-30', 4, '2022-06-03', '0'),
(19, 'PJ0019', '17', 'BK0010', 'Dipinjam', '2022-05-30', 2, '2022-06-01', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_perpusrak`
--

CREATE TABLE IF NOT EXISTS `sr_perpusrak` (
  `id_rak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_perpusrak`
--

INSERT INTO `sr_perpusrak` (`id_rak`, `nama_rak`) VALUES
(1, 'Rak Buku 1'),
(3, 'Rak Buku 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_pos_pembayaran`
--

CREATE TABLE IF NOT EXISTS `sr_pos_pembayaran` (
  `id_pos` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) DEFAULT NULL,
  `kode_akun` varchar(5) DEFAULT NULL,
  `nama_pos` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_pos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_pos_pembayaran`
--

INSERT INTO `sr_pos_pembayaran` (`id_pos`, `unit`, `kode_akun`, `nama_pos`, `keterangan`) VALUES
(1, '5', '62265', 'SPP', 'Sumbangan Pendanaan Pendidikan'),
(2, '5', '1', 'Biaya Bangunan', 'Bangunan Sekolah'),
(3, '5', '62264', 'Buku Paket', 'Paket SMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_ppdb`
--

CREATE TABLE IF NOT EXISTS `sr_ppdb` (
  `id_ppdb` int(10) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` varchar(30) DEFAULT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `jenis_pendaftaran` varchar(25) DEFAULT NULL,
  `jalur_pendaftaran` varchar(25) DEFAULT NULL,
  `hobi` varchar(55) DEFAULT NULL,
  `cita_cita` varchar(55) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `tempat_lahir` varchar(55) DEFAULT NULL,
  `tanggal_lahir` varchar(15) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `alamat` varchar(155) DEFAULT NULL,
  `rt` varchar(4) DEFAULT NULL,
  `rw` varchar(4) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(15) DEFAULT NULL,
  `tempat_tinggal` varchar(55) DEFAULT NULL,
  `transportasi` varchar(15) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `kewarganegaraan` varchar(15) DEFAULT NULL,
  `foto` varchar(155) DEFAULT NULL,
  `tinggi_badan` varchar(3) DEFAULT NULL,
  `berat_badan` varchar(3) DEFAULT NULL,
  `jarak_ke_sekolah` varchar(4) DEFAULT NULL,
  `waktu_tempuh_ke_sekolah` varchar(4) DEFAULT NULL,
  `jumlah_saudara` varchar(2) DEFAULT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `alamat_sekolah_asal` varchar(255) NOT NULL,
  `nama_ayah` varchar(55) DEFAULT NULL,
  `tahun_lahir_ayah` varchar(4) DEFAULT NULL,
  `pendidikan_ayah` varchar(15) DEFAULT NULL,
  `pekerjaan_ayah` varchar(55) DEFAULT NULL,
  `penghasilan_ayah` varchar(55) DEFAULT NULL,
  `nama_ibu` varchar(55) DEFAULT NULL,
  `tahun_lahir_ibu` varchar(4) DEFAULT NULL,
  `pendidikan_ibu` varchar(15) DEFAULT NULL,
  `pekerjaan_ibu` varchar(55) DEFAULT NULL,
  `penghasilan_ibu` varchar(55) DEFAULT NULL,
  `nama_wali` varchar(55) DEFAULT NULL,
  `tahun_lahir_wali` varchar(4) DEFAULT NULL,
  `pendidikan_wali` varchar(15) DEFAULT NULL,
  `pekerjaan_wali` varchar(55) DEFAULT NULL,
  `penghasilan_wali` varchar(50) DEFAULT NULL,
  `status` char(1) DEFAULT '0',
  `tanggal_daftar` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_ppdb`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_ppdb`
--

INSERT INTO `sr_ppdb` (`id_ppdb`, `no_pendaftaran`, `nik`, `jenis_pendaftaran`, `jalur_pendaftaran`, `hobi`, `cita_cita`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `rt`, `rw`, `provinsi`, `kota`, `kode_pos`, `tempat_tinggal`, `transportasi`, `no_hp`, `email`, `kewarganegaraan`, `foto`, `tinggi_badan`, `berat_badan`, `jarak_ke_sekolah`, `waktu_tempuh_ke_sekolah`, `jumlah_saudara`, `asal_sekolah`, `alamat_sekolah_asal`, `nama_ayah`, `tahun_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `nama_ibu`, `tahun_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `nama_wali`, `tahun_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `status`, `tanggal_daftar`) VALUES
(5, 'REG-20220407-0001', '3175052605970002', 'Baru', 'Umum', 'Berenang', 'Astronot', 'Reza Lesmana Putra', 'Laki-laki', 'Jakarta', '1997-05-26', 'Islam', 'Jl Pertengahan', '11', '03', 'DKI Jakarta', NULL, '13770', 'Kos', '', '081280462650', 'rzalvaero@gmail.com', 'WNI', '', '170', '50', '50', '', '1', 'SMP Islam Malahayati', 'Jl Bima', 'Andriansyah', '1981', 'S1', 'Wiraswasta', '5.000.000 - 10.000.000', 'Tuti Yati', '1982', 'SMP Sederajat', 'Wiraswasta', '2.000.000 - 4.999.990', '', '', NULL, 'Pekerjaan', 'Pendapatan', '-', '2022-04-07 12:37:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_prestasi`
--

CREATE TABLE IF NOT EXISTS `sr_prestasi` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(6) NOT NULL,
  `ta` char(5) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_prestasi`
--

INSERT INTO `sr_prestasi` (`id`, `id_siswa`, `ta`, `jenis`, `keterangan`) VALUES
(1, 11, '1', 'Juara 1', 'Karate');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_prota`
--

CREATE TABLE IF NOT EXISTS `sr_prota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(10) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `pengetahuan` varchar(255) NOT NULL,
  `keterampilan` varchar(225) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `ket` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_prota`
--

INSERT INTO `sr_prota` (`id`, `unit`, `semester`, `pengetahuan`, `keterampilan`, `waktu`, `ket`) VALUES
(1, '5', '2021/2022-2', 'Pengetahuan Dasar', 'Keterampilan Dasar', '3 Pertemuan / 3 x 40', 'Keterngan'),
(2, '5', '2021/2022-1', '5', '5', '4 Pertemuan / 3 x 40', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_provinsi`
--

CREATE TABLE IF NOT EXISTS `sr_provinsi` (
  `province_id` int(11) NOT NULL,
  `province` varchar(100) NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_provinsi`
--

INSERT INTO `sr_provinsi` (`province_id`, `province`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_rencana_kd_keterampilan`
--

CREATE TABLE IF NOT EXISTS `sr_rencana_kd_keterampilan` (
  `idrencana_kd_keterampilan` int(11) NOT NULL AUTO_INCREMENT,
  `idtahun_pelajaran` int(11) NOT NULL,
  `idusers` int(10) UNSIGNED NOT NULL,
  `idkelas` int(11) NOT NULL,
  `idmata_pelajaran` int(11) NOT NULL,
  `rkdk_penilaian_harian` int(11) NOT NULL,
  PRIMARY KEY (`idrencana_kd_keterampilan`),
  KEY `idusers` (`idusers`),
  KEY `idtahun_pelajaran` (`idtahun_pelajaran`),
  KEY `idkelas` (`idkelas`),
  KEY `idmata_pelajaran` (`idmata_pelajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_rencana_kd_keterampilan`
--

INSERT INTO `sr_rencana_kd_keterampilan` (`idrencana_kd_keterampilan`, `idtahun_pelajaran`, `idusers`, `idkelas`, `idmata_pelajaran`, `rkdk_penilaian_harian`) VALUES
(11, 1, 1, 1, 2, 2),
(12, 1, 42, 1, 49, 2),
(13, 1, 42, 1, 50, 2),
(14, 1, 42, 1, 3, 2),
(15, 1, 42, 1, 46, 2),
(16, 1, 42, 1, 47, 2),
(17, 1, 40, 1, 1, 1),
(18, 1, 39, 1, 48, 2),
(19, 1, 41, 1, 51, 2),
(20, 1, 57, 17, 2, 2),
(21, 1, 57, 17, 51, 2),
(22, 2, 42, 1, 2, 1),
(24, 1, 37, 2, 2, 1),
(25, 1, 37, 2, 49, 1),
(26, 1, 37, 2, 50, 1),
(27, 1, 37, 2, 3, 1),
(28, 1, 37, 2, 46, 1),
(29, 1, 37, 2, 47, 1),
(30, 1, 40, 2, 1, 1),
(31, 1, 41, 2, 51, 1),
(32, 1, 39, 2, 48, 1),
(33, 2, 42, 1, 49, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_rencana_kd_pengetahuan`
--

CREATE TABLE IF NOT EXISTS `sr_rencana_kd_pengetahuan` (
  `idrencana_kd_pengetahuan` int(11) NOT NULL AUTO_INCREMENT,
  `idtahun_pelajaran` int(11) NOT NULL,
  `idusers` int(10) UNSIGNED NOT NULL,
  `idkelas` int(11) NOT NULL,
  `idmata_pelajaran` int(11) NOT NULL,
  `rkdp_penilaian_harian` int(11) NOT NULL,
  PRIMARY KEY (`idrencana_kd_pengetahuan`),
  KEY `idusers` (`idusers`),
  KEY `idtahun_pelajaran` (`idtahun_pelajaran`),
  KEY `idkelas` (`idkelas`),
  KEY `idmata_pelajaran` (`idmata_pelajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_rencana_kd_pengetahuan`
--

INSERT INTO `sr_rencana_kd_pengetahuan` (`idrencana_kd_pengetahuan`, `idtahun_pelajaran`, `idusers`, `idkelas`, `idmata_pelajaran`, `rkdp_penilaian_harian`) VALUES
(23, 1, 1, 1, 2, 3),
(24, 1, 42, 1, 49, 3),
(25, 1, 42, 1, 50, 2),
(26, 1, 42, 1, 3, 3),
(27, 1, 42, 1, 46, 2),
(28, 1, 42, 1, 47, 2),
(29, 1, 40, 1, 1, 2),
(30, 1, 39, 1, 48, 2),
(31, 1, 41, 1, 51, 2),
(33, 1, 57, 17, 2, 2),
(34, 1, 57, 17, 51, 2),
(35, 2, 42, 1, 2, 2),
(37, 1, 37, 2, 2, 1),
(38, 1, 37, 2, 49, 1),
(39, 1, 37, 2, 50, 1),
(40, 1, 37, 2, 3, 1),
(41, 1, 37, 2, 46, 1),
(42, 1, 37, 2, 47, 1),
(43, 1, 40, 2, 1, 1),
(44, 1, 41, 2, 51, 1),
(45, 1, 39, 2, 48, 1),
(46, 2, 42, 1, 49, 1),
(47, 1, 44, 5, 2, 3),
(48, 6, 41, 3, 51, 10),
(49, 6, 41, 1, 51, 4),
(50, 6, 41, 2, 51, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_rpp`
--

CREATE TABLE IF NOT EXISTS `sr_rpp` (
  `idkompetensi_dasar` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(10) NOT NULL,
  `idtahun_pelajaran` varchar(100) NOT NULL,
  `idusers` int(11) UNSIGNED NOT NULL,
  `idkelas` int(11) NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL,
  `kd_kategori` enum('Pengetahuan','Keterampilan') NOT NULL,
  `kd_nama` text NOT NULL,
  `kd_status` enum('Y','N') NOT NULL,
  `alokasi` varchar(100) DEFAULT NULL,
  `tujuan` varchar(255) NOT NULL,
  `materi` varchar(255) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `media` varchar(255) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `penilaian` varchar(255) NOT NULL,
  PRIMARY KEY (`idkompetensi_dasar`),
  KEY `idtahun_pelajaran` (`idtahun_pelajaran`),
  KEY `idusers` (`idusers`),
  KEY `idmata_pelajaran` (`mata_pelajaran`),
  KEY `idkelas` (`idkelas`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_rpp`
--

INSERT INTO `sr_rpp` (`idkompetensi_dasar`, `unit`, `idtahun_pelajaran`, `idusers`, `idkelas`, `mata_pelajaran`, `kd_kategori`, `kd_nama`, `kd_status`, `alokasi`, `tujuan`, `materi`, `metode`, `media`, `sumber`, `penilaian`) VALUES
(1, '5', '2021/2022-2', 0, 1, 'Bahasa Indonesia', 'Pengetahuan', 'RPP - Teks Prosedur ', 'Y', '3 Pertemuan / 3 x 40', '<p>Setelah kegiatan belajar mengajar selesai, peserta didik dapat :</p>\r\n\r\n<ol>\r\n	<li>Mengonstruksikan informasi;</li>\r\n	<li>Merancang pernyataan umum dan tahapan-tahapan;</li>\r\n	<li>Menganalisis struktur dan isi teks prosedur; dan</li>\r\n	<li>Mengembangka', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Konsep</td>\r\n			<td>Prinsip</td>\r\n			<td>Prosedur</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<ul>\r\n				<li>Isi Teks Prosedur</li>\r\n			</ul>\r\n			</td>\r\n			<td>\r\n			<ul>', '<p><em>Pendekatan : Saintifik Model </em></p>\r\n\r\n<p><em>Pembelajaran : Discovery learning</em></p>\r\n', '<p>HP atau Laptop</p>\r\n', '<ul>\r\n	<li>Buku penunjang kurikulum 2013 mata pelajaran Bahasa Indonesia Kelas XI Kemendikbud, 2017</li>\r\n	<li>Pengalaman peserta didik dan guru</li>\r\n</ul>\r\n', '<ul>\r\n	<li>a) Penilaian Sikap a. Ketepatan pegumpulan tugas (disiplin) b. Kejujuran pekerjaan (tidak plagiat)</li>\r\n	<li>b) Pengetahuan a. Pertanyaan tugas di googleclassroom</li>\r\n	<li>c) Keterampilan a. Tampilan tugas (guru sudah meminta agar tugas dike'),
(3, '5', '2021/2022-2', 0, 4, 'Multimedia', 'Keterampilan', 'RPP - Kesehatan, Keselamatan Kerja dan Lingkungan Hidup', 'Y', '3 Pertemuan / 3 x 40', '<p>Peserta didik mampu:</p>\r\n\r\n<ul>\r\n	<li>&nbsp;Menjelaskan perbedaan kesehatan dan keselamatan kerja</li>\r\n	<li>Menjelaskan peraturan dasar umum keselamatan kerja</li>\r\n	<li>Mengetahui macam-macam perlengkapan alat dan bahan dalam bekerja</li>\r\n</ul>\r\n', '<ol>\r\n	<li>a. Menjelaskan deskripsi Kesehatan, Keselamatan Kerja dan Lingkungan Hidup</li>\r\n	<li>b. Menjelaskan apa saja peralatan yang digunakan sebagai pelindung dalam keselamatan kerja</li>\r\n</ol>\r\n', '<ol>\r\n	<li>Model Pembelajaran</li>\r\n	<li>Kooperatif Learning</li>\r\n	<li>Direct Intruction (DI)</li>\r\n</ol>\r\n', '<p>Handphone / Tulis</p>\r\n', '<p>- Modul</p>\r\n\r\n<p>- Web-based IT</p>\r\n\r\n<p>- Buku teks kesehatan dan keselamatan kerja</p>\r\n', '<p>a. Teknik Penilaian : Tertulis, Lisan</p>\r\n\r\n<p>b. Bentuk instrumen : Tes lisan, Uji tulis</p>\r\n'),
(4, '5', '2021/2022-2', 0, 19, 'Seni Budaya dan Prakarya', 'Pengetahuan', 'Siklus Bisnis  Perusahaan', 'Y', '3 Pertemuan / 3 x 40', '<p>untuk memberikan kemampuan logical kepada murid</p>', '<p>bisnis komputerisasi</p>', '<p>online</p>', '<p>komputer</p>', '<p>di buku ,artikel dan majalah</p>', '<p>sikap dan penilaian individu</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_setting_gaji`
--

CREATE TABLE IF NOT EXISTS `sr_setting_gaji` (
  `id_setting_gaji` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) DEFAULT NULL,
  `nip` varchar(5) DEFAULT NULL,
  `nama` varchar(5) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `status_kepegawaian` varchar(20) DEFAULT NULL,
  `jenjang` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_setting_gaji`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_setting_pendapatan_lain_lain`
--

CREATE TABLE IF NOT EXISTS `sr_setting_pendapatan_lain_lain` (
  `id_setting_pendapatan_lain_lain` int(11) NOT NULL AUTO_INCREMENT,
  `nama_setting_pendapatan_lain_lain` varchar(50) NOT NULL,
  `nominal_setting_pendapatan_lain_lain` varchar(30) NOT NULL,
  PRIMARY KEY (`id_setting_pendapatan_lain_lain`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_setting_pendapatan_lain_lain`
--

INSERT INTO `sr_setting_pendapatan_lain_lain` (`id_setting_pendapatan_lain_lain`, `nama_setting_pendapatan_lain_lain`, `nominal_setting_pendapatan_lain_lain`) VALUES
(0, 'Uang Jalan', '10000'),
(1, 'Bonus THR', '100000'),
(2, 'Uang Makan', '60000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_setting_potongan`
--

CREATE TABLE IF NOT EXISTS `sr_setting_potongan` (
  `id_setting_potongan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_setting_potongan` varchar(50) NOT NULL,
  `nominal_setting_potongan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_setting_potongan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_setting_potongan`
--

INSERT INTO `sr_setting_potongan` (`id_setting_potongan`, `nama_setting_potongan`, `nominal_setting_potongan`) VALUES
(0, 'Transportasi', '200000'),
(1, 'BPJS Kesehatan1', '1000000'),
(2, 'makan', '2000'),
(4, 'Uang Sampah', '30000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_setting_tunjangan`
--

CREATE TABLE IF NOT EXISTS `sr_setting_tunjangan` (
  `id_setting_tunjangan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_setting_tunjangan` varchar(50) NOT NULL,
  `nominal_setting_tunjangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_setting_tunjangan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_setting_tunjangan`
--

INSERT INTO `sr_setting_tunjangan` (`id_setting_tunjangan`, `nama_setting_tunjangan`, `nominal_setting_tunjangan`) VALUES
(0, 'Tunjangan Hari Tua', '400000'),
(2, 'Tunjangan Anak', '100000'),
(4, 'Tunjang Hari Raya', '500000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_sikap`
--

CREATE TABLE IF NOT EXISTS `sr_sikap` (
  `id_sikap` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sikap` varchar(200) NOT NULL,
  PRIMARY KEY (`id_sikap`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_sikap`
--

INSERT INTO `sr_sikap` (`id_sikap`, `nama_sikap`) VALUES
(2, 'jujur'),
(3, 'bersih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_silabus`
--

CREATE TABLE IF NOT EXISTS `sr_silabus` (
  `idsilabus` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(100) NOT NULL,
  `kompetensi_dasar` varchar(100) NOT NULL,
  `indikator_kd` text NOT NULL,
  `materi_pembelajaran_kd` text NOT NULL,
  `kegiatan_pembelajaran_kd` text NOT NULL,
  `tk_kd` varchar(200) NOT NULL,
  `bi_kd` varchar(200) NOT NULL,
  `in_kd` varchar(200) NOT NULL,
  `alokasi` varchar(200) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  PRIMARY KEY (`idsilabus`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_silabus`
--

INSERT INTO `sr_silabus` (`idsilabus`, `unit`, `kompetensi_dasar`, `indikator_kd`, `materi_pembelajaran_kd`, `kegiatan_pembelajaran_kd`, `tk_kd`, `bi_kd`, `in_kd`, `alokasi`, `sumber`) VALUES
(11, '5', 'Mendiskripsikan fungsi \nkonsumsi dan \nfungsi \ntabungan', '<p><strong>Kognitif Konten</strong></p><ol><li>Mendiskripsikan hubungan konsumsi dan pendapatan</li><li>Menghitung kecenderungan konsumsi</li><li>Mengidentifikasi faktor yang mempengaruh konsumsi</li></ol>', '<ol><li>1. Konsumsi</li><li>1.1. Hubungan fungsional konsumsi dan pendapatan</li><li>1.2. Kecenderngan konsumsi</li><li>1.3. Faktor yang mempengaruhi konsumsi</li><li>1.4. kurva konsumsi</li></ol>', '<p>Mengamati, menghitung, menggambar, merumuskan dan memprediksi fungsi konsumsi</p>', 'Tes tertulis', 'Pilihan  ganda Essei', 'LP 1 Hubungan C  dan Y, kecenderung an, faktor,  kurva dan  fungsi  konsusi', '4 Pertemuan / 4 x 40', '<ul><li>Materi Ajar Fungsi Konsumsi dan Fungsi Tabungan</li><li>Power point 1-25</li><li>Lembar Penilaian</li><li>Kunci LP 1-3</li></ul>'),
(12, '5', 'test44', '<p>test4</p>', '<p>test5</p>', '<p>test6</p>', 'test', 'test2', 'test6', 'Default select', '<p>test3t</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_siswa`
--

CREATE TABLE IF NOT EXISTS `sr_siswa` (
  `idsiswa` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) NOT NULL,
  `s_nisn` varchar(50) NOT NULL,
  `s_nama` varchar(100) NOT NULL,
  `s_nik` varchar(255) NOT NULL,
  `s_jenis_kelamin` enum('P','L') NOT NULL,
  `s_tl_idprovinsi` int(11) NOT NULL,
  `s_tl_idkota` int(11) NOT NULL,
  `s_tanggal_lahir` date NOT NULL,
  `idkelas` int(11) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_telepon` varchar(20) NOT NULL,
  `s_wali` varchar(255) NOT NULL,
  `s_dusun` varchar(255) NOT NULL,
  `s_desa` varchar(255) NOT NULL,
  `s_kecamatan` varchar(255) NOT NULL,
  `s_domisili` enum('Dalam','Luar') NOT NULL,
  `s_abk` enum('Ya','Tidak') NOT NULL,
  `s_bsm_pip` enum('Ya','Tidak') NOT NULL,
  `s_keluarga_miskin` enum('Ya','Tidak') NOT NULL,
  `s_code_generator` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idsiswa`),
  KEY `s_tl_idprovinsi` (`s_tl_idprovinsi`),
  KEY `s_tl_idkota` (`s_tl_idkota`),
  KEY `idkelas` (`idkelas`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_siswa`
--

INSERT INTO `sr_siswa` (`idsiswa`, `unit`, `s_nisn`, `s_nama`, `s_nik`, `s_jenis_kelamin`, `s_tl_idprovinsi`, `s_tl_idkota`, `s_tanggal_lahir`, `idkelas`, `s_email`, `s_telepon`, `s_wali`, `s_dusun`, `s_desa`, `s_kecamatan`, `s_domisili`, `s_abk`, `s_bsm_pip`, `s_keluarga_miskin`, `s_code_generator`) VALUES
(11, '5', '204035871360', 'Aji Putra Arshavin ', '3401120912120001', 'L', 5, 210, '2012-01-09', 1, 'mas.ghaly88@gmail.com', '081977700271', 'Sulistyo', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', ''),
(12, '5', '204035871361', 'Alya Zafaranie Rahman', '3401124304130003', 'P', 5, 210, '2013-04-13', 1, 'lorin.enjubella88@gmail.com', '0819928822', 'Fauzur Rahman', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', '716258'),
(13, '5', '204035871362', 'Bintang Rakha Raqila', '3401120711120001', 'L', 5, 210, '2012-11-07', 1, '', '', 'Haryadi', 'POTRONALAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(14, '5', '204035871363', 'Damar Lestari', '3401126504130001', 'P', 5, 210, '2013-04-25', 1, '', '', 'Nuryanto', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(15, '5', '204035871364', 'Dava Bayu Setiawan', '3401122106130001', 'L', 5, 210, '2013-06-21', 1, '', '', 'Kumara', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(16, '5', '204035871365', 'Faris Husnul Arfan', '3401120805130001', 'P', 5, 210, '2013-05-08', 1, '', '', 'Madiyono', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(17, '5', '204035871366', 'Hasna Khaira Nadhiva', '3401125209120001', 'P', 5, 210, '2012-09-12', 1, '', '', 'Sutriyono', 'KLANGON', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(18, '5', '204035871367', 'Lafida Dwi Saputri', '3401126310120001', 'P', 5, 210, '2012-10-23', 1, '', '', 'Hajib Ja&#039;far', 'POTRONALAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(19, '5', '204035871368', 'Muhammad Barik Al-Bani', '3401120202130001', 'L', 5, 210, '2013-02-02', 1, '', '', 'Slamet Sulbani', 'SEMAWUNG', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Tidak', NULL),
(20, '5', '204035871369', 'Muhammad Haidar Yaqdhan', '3401121806130001', 'L', 5, 210, '2013-06-18', 1, '', '', 'Isdadi', 'POTRONALAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(21, '5', '204035871370', 'Muhammad Nehru Wiratama', '3310032711120002', 'L', 10, 196, '2012-11-27', 1, '', '', 'Bachtiar Bakriyanto', 'KARANGLO', 'TANJUNGAN', 'KEC. WEDI', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(22, '5', '204035871371', 'Rani Prasetya Mawardi', '3401126604130002', 'P', 5, 210, '2015-04-16', 1, '', '', 'Mawardi', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(23, '5', '204035871372', 'Raviola Eka Valentina', '3315136901130001', 'P', 10, 134, '2013-01-29', 1, '', '', 'Muhdaryanto', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(24, '5', '204035871373', 'Reza Rahardyan Firmansyah', '3401121101130001', 'L', 5, 210, '2013-01-11', 1, '', '', 'Hariyanto', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(25, '5', '204035871374', 'Saffa Arumi Ghaisani', '3205306505130002', 'P', 9, 126, '2013-05-25', 1, '', '', 'Ramdani', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(26, '5', '204035871375', 'Salma Safira', '3401125404130001', 'P', 5, 210, '2013-12-04', 1, '', '', 'Porwanto', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(27, '5', '204035871376', 'Shella Hikmatul Hidayah', '3401124902130001', 'P', 5, 210, '2013-09-02', 1, '', '', 'Haryanto', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(28, '5', '204035871377', 'Syakira Rizka Prawestri', '3401125109120001', 'P', 5, 210, '2012-11-09', 1, '', '', 'Walmuji', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(29, '5', '204035871378', 'Taufiq Hidayat', '3401122006130001', 'L', 5, 210, '2013-06-20', 1, '', '', 'Edi Hartanto', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(30, '5', '204035871379', 'Zahra Dian Salsabilla', '3401124203130001', 'P', 5, 210, '2013-03-02', 1, '', '', 'Muhdi', 'POTRONALAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(31, '5', '204035871380', 'Zahwa Adina Putri', '3308036006130001', 'P', 10, 249, '2013-06-20', 1, '', '', 'Afda Setiawan', 'GANJURAN', 'PLOSOGEDE', 'KEC. NGLUWAR', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(32, '5', '0119228271', 'Andhika Rohman Indra Wijaya', '3401122805110003', 'L', 5, 210, '2011-05-28', 2, '', '', 'Agus Anwari', 'POTRONALAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(33, '5', '0111065143', 'Adit Hendryawan', '3401121812110001', 'L', 5, 210, '2011-12-18', 2, '', '', 'SARJONO', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(34, '5', '0111566716', 'Alvino Bagus Hendrawan', '3308040907110003', 'L', 10, 249, '2011-07-09', 2, '', '', 'Muh Fahrudin', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(39, '5', '0123535887', 'Anissa Rizki Maulidza', '3401124302120001', 'P', 5, 210, '2012-02-03', 2, '', '', 'NARPANDI', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(40, '5', '0117476280', 'Asmawa Fastina Artanti', '3401124302120001', 'P', 10, 476, '2011-08-19', 2, '', '', 'SUDIYANTO', 'KLANGON', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(41, '5', '0108250622', 'Hafidz Nurul Ikhsan', '3401121410100002', 'L', 5, 210, '2010-10-14', 2, '', '', 'MUJIYANTA', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(42, '5', '0129187164', 'Hafiz il Sya&#039;bana', '3401120207120002', 'L', 5, 210, '2012-07-02', 2, '', '', 'UDIYANTO', 'POTRONALAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(43, '5', '0123340033', 'Haikal Daffa Salman Faiz', '3401121006120001', 'L', 5, 210, '2012-06-10', 2, '', '', 'GUNTORO', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(44, '5', '0112159539', 'Hammam Razka Pradipta', '3401120712110001', 'L', 5, 210, '2011-12-07', 2, '', '', 'AGUNG BUDIAJI', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(45, '5', '0111083351', 'Heevan Alyansyah Alfajr', '6302151410110001', 'L', 13, 203, '2011-10-14', 2, '', '', 'SYAHRUL FUJIANSYAH', 'POTRONALAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(46, '5', '0125752767', 'Najwa Zalfa Khoirunnisa', '3401126004120001', 'P', 5, 210, '2012-04-20', 2, '', '', 'OTANG HATAMI', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(47, '5', '0117400693', 'Nungraeni Desy Safira Putri', '3401124612110001', 'P', 5, 210, '2011-12-08', 2, '', '', 'SUTARI', 'PANTOG WETAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(48, '5', '0123596402', 'Nur Alifa Loveana Anjani', '3401125101120002', 'P', 5, 210, '2012-01-11', 2, '', '', 'NURKOYIN', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(49, '5', '0117452080', 'Oktaviar Alhuwa Mufid', '3401120710110001', 'L', 5, 210, '2011-10-07', 2, '', '', 'MUHYIDIN', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(50, '5', '0112830228', 'Qalitza Zahwa Khairani', '3401126509110001', 'P', 5, 210, '2011-09-15', 2, '', '', 'SUNGKONO', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(51, '5', '0121515850', 'Raffa Ahmad Sholikhin', '3401120803120001', 'L', 5, 210, '2012-03-08', 2, '', '', 'TOHA RUDIN', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(52, '5', '0121854845', 'Rendita Febriana Saputri', '3401124702120002', 'P', 5, 210, '2012-02-07', 2, '', '', 'YULI SUSANTO', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(53, '5', '0114655050', 'Reyhan Saputra', '3308081508120003', 'L', 10, 249, '2011-08-15', 2, '', '', 'FAJAR SETIADI', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(54, '5', '0124032295', 'Risky Putra Wahyu Pratama', '3401121602120004', 'L', 5, 210, '2012-02-16', 2, '', '', 'TRI YULIANA', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(55, '5', '0113120197', 'Tedy Ahmad Santoso', '3401120210110001', 'L', 5, 210, '2011-10-02', 2, '', '', 'SUYOTO', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(56, '5', '0129915965', 'Tsania Zahra Maulida', '3401125602120001', 'P', 5, 210, '2012-02-16', 2, '', '', 'SISWANTO', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(57, '5', '0125805929', 'Wanda Febriani Wulandari', '3211226902120002', 'P', 9, 440, '2012-02-29', 2, '', '', 'MUHROSID', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(58, '5', '0106708074', 'Ananda Aulia', '3401124611100001', 'P', 5, 210, '2010-11-06', 3, '', '', 'SUYADI', 'POTRONALAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(59, '5', '0108998849', 'Andini Nur Rahmawati', '3401124107100001', 'P', 5, 210, '2010-07-01', 3, '', '', 'YANI FATMAWATI', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(60, '5', '0111353064', 'Annas Hamid', '3401121804110001', 'L', 5, 210, '2011-04-18', 3, '', '', 'SURATIN', 'BANJARAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(61, '5', '0118767416', 'As Syifa Dwi Pradayanti  ', '3401124905110002', 'P', 5, 210, '2011-05-09', 3, '', '', 'SUPARNO', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(62, '5', '0082175383', 'Astri Widya Pramesti', '3401125408080002', 'P', 10, 196, '2008-08-14', 3, '', '', 'PRAWOTO SUHARYONO', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(63, '5', '0103368264', 'Bayu Ardhan Handaru', '3401120209100001', 'L', 5, 210, '2010-09-02', 3, '', '', 'KOMARUDIN', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(64, '5', '0103094001', 'Bintara Ardyama Saputra', '3401120907100001', 'L', 5, 210, '2010-07-09', 3, '', '', 'PARJIMIN', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(65, '5', '0107104381', 'Dava Jiffin Adelino Romadi', '3401121110100001', 'L', 5, 210, '2010-10-11', 3, '', '', 'EKA ROMADI', 'DUWET III', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(66, '5', '0102553662', 'Dayinta Kumala Wijaya Esti', '3401124607100002', 'P', 5, 210, '2010-07-06', 3, '', '', 'SUPRIYANTO', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(67, '5', '0117972015', 'Fendy Adinata Wicaksono', '3401122103110001', 'L', 5, 210, '2011-03-21', 3, '', '', 'MARWANTO', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(68, '5', '0101989546', 'Ghiffara Najwa Azzahra', '3401126508100001', 'P', 5, 210, '2010-08-25', 3, '', '', 'ASHARIHIDAYAT', 'POTRONALAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(69, '5', '0106111309', 'Hasna Nur Afifah', '3401125911100001', 'P', 5, 210, '2010-11-19', 3, '', '', 'SUBARDI', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(70, '5', '0111549550', 'Iin Wulan Safa Yanunisa', '3401126001110001', 'P', 5, 210, '2011-01-20', 3, '', '', 'AHMAD SUPRIYADI', 'POTRONALAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(71, '5', '0164045268', 'Imam Santoso', '3401120505090001', 'L', 5, 210, '2009-05-05', 3, '', '', 'NURROHMAN', 'POTRONALAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(72, '5', '0111117352', 'Irma Aprilia Fatmawati', '3401127103110001', 'P', 5, 210, '2011-03-31', 3, '', '', 'SUPARTO', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(73, '5', '0103650256', 'Khanif Choiru Rochman', '3401122407110001', 'L', 5, 210, '2010-07-24', 3, '', '', 'MUH AHMAD BANI', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(74, '5', '0103523847', 'Misbachul Lubab', '3401122907100001', 'L', 5, 210, '2010-07-29', 3, '', '', 'SUWITA', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(75, '5', '0105356940', 'Muhammad Abdul Azis Ramadhan', '3401120409100001', 'L', 5, 210, '2010-09-04', 3, '', '', 'SUDARYANTO', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(76, '5', '0122709840', 'Muvida Shobrina', '3401126608110001', 'P', 5, 210, '2012-08-26', 3, '', '', 'SUROTO', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(77, '5', '0113062348', 'Putri Khansa Udtiana Nafeeza', '3401124203110002', 'P', 5, 210, '2011-03-02', 3, '', '', 'DUL MASHUD', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(78, '5', '0102233405', 'Renata Okta Anjaini', '3401126210100002', 'P', 5, 210, '2010-10-22', 3, '', '', 'NURYANTO', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(79, '5', '0119158123', 'Rendra Alfirkhan Nakholid', '3401121504110001', 'L', 5, 210, '2011-04-15', 3, '', '', 'IDIK IRYANTO', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(80, '5', '0115192584', 'Rifqi Ahmad Yanuarivan', '3401120901110001', 'L', 5, 210, '2011-01-09', 3, '', '', 'MUH AHMAD', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(81, '5', '0112461768', 'Risnawati', '3401125606110001', 'P', 5, 210, '2011-06-26', 3, '', '', 'RISNAWATI', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(82, '5', '0096993456', 'Sri Astuti', '3401120407090001', 'P', 5, 210, '2009-07-04', 3, '', '', 'SITI KALIMAH', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(83, '5', '0111138060', 'Syifa Nuriasari', '3401126802110001', 'P', 5, 210, '2011-02-28', 3, '', '', 'NUR AKHABAH ZAIBAN', 'PRANAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(84, '5', '0114478714', 'Tri Ega Saputra', '3401122003110002', 'L', 5, 210, '2011-03-20', 3, '', '', 'SUKIDI', 'POTRONALAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(85, '5', '0109611361', 'Yumna Aulia Zulfa', '3401124110100001', 'P', 5, 210, '2010-10-01', 3, '', '', 'FARID PRATIKNA', 'POTRONALAN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(86, '5', '0112997704', 'Adnanda Galih Yudistira', '3401120305110001', 'L', 5, 210, '2011-05-03', 3, '', '', 'HERIYANTO', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Ya', NULL),
(87, '5', '0097073468', 'Adnan Rangga Kurniawan', '3401120103090001', 'L', 5, 210, '2009-03-01', 4, '', '', 'SUWARTO', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(88, '5', '0104677724', 'Ahmad Muthohar', '3401120301100001', 'L', 5, 210, '2010-01-03', 4, '', '', 'SUPRANTO', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(89, '5', '0108115939', 'Delia Anggraeni', '3401126604100001', 'P', 5, 210, '2010-04-26', 4, '', '', 'BADARI', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(90, '5', '0094626840', 'Destin Siti Arofah', '3401124112090001', 'P', 5, 210, '2009-12-01', 4, '', '', 'TUGIMIN', 'POTRONALAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(91, '5', '0103683075', 'Dwi Yuliana Putri', '3401124307100002', 'P', 5, 210, '2010-07-03', 4, '', '', 'MULYONO', 'BANJARAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(92, '5', '0103048390', 'Emeldy Bunga Astuti', '3308085205100003', 'P', 10, 250, '2010-05-12', 4, '', '', 'EDI SUPRAYITNO', 'NGABLAK', 'KEJI', 'KEC. MUNTILAN', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(93, '5', '0098885960', 'Evandra Emeraldgi Pratama', '3401120310090001', 'L', 5, 210, '2009-10-03', 4, '', '', 'NURWIYONO', 'PANTOG WETAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(94, '5', '0075465499', 'Fauziah Ardelinda', '3401127001070001', 'P', 5, 210, '2007-01-30', 4, '', '', 'SUPARMAN', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(95, '5', '0109742705', 'Galih Reza Oktaviano', '3401120505100001', 'L', 5, 210, '2010-05-05', 4, '', '', 'RIYANTO', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(96, '5', '0086716698', 'Galih Kurniawan', '3401122812080001', 'L', 5, 210, '2008-12-28', 4, '', '', 'SUMARWOTO', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(97, '5', '0082921451', 'Hesti Andriyani', '3401125004080001', 'P', 5, 210, '2008-04-10', 4, '', '', 'SUROTO', 'KEMPONG', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(98, '5', '0091536451', 'Hibban Adib Murthada', '3401122010090001', 'L', 5, 210, '2009-10-20', 4, '', '', 'MUHAMAD NASIR', 'SLANDEN', 'BANJAROYO', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Tidak', NULL),
(99, '5', '0157442061', 'Latifa Ramadhani', '3401126808090001', 'P', 5, 210, '2009-08-28', 4, '', '', 'ALIYADI', 'POTRONALAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Tidak', NULL),
(100, '5', '0103142489', 'Mardianty Putri Anggraeny', '3401124603100001', 'P', 5, 210, '2010-03-06', 4, '', '', 'SUDARMAN', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(101, '5', '0168301632', 'Muhammad Khoiruman Kafa', '3308090203100001', 'L', 10, 250, '2009-03-02', 4, '', '', 'MUHAMMAD BAEDHOWI', 'SARAGAN', 'RAMBEANAK', 'KEC. MUNGKID', 'Dalam', 'Tidak', 'Tidak', 'Tidak', NULL),
(102, '5', '0098955268', 'Muhammad Minan Fauzi', '3401122107090001', 'L', 5, 210, '2009-07-21', 4, '', '', 'SLAMET', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(103, '5', '0097560656', 'Naufal Hakim', '3401123010090001', 'L', 5, 210, '2009-10-30', 4, '', '', 'SUPNGATI WIDANIYAH', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Tidak', NULL),
(104, '5', '0093830651', 'Oktavia Arya Damayanti', '3401125210090001', 'P', 5, 210, '2010-10-12', 4, '', '', 'WAKIJAN', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(105, '5', '0098381033', 'Raffi Ahmad Afifudin', '3401121704090001', 'L', 5, 210, '2009-04-17', 4, '', '', 'NASRODIN', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(106, '5', '02040412029', 'Shafira Mutiara Valen', '3401125502100001', 'P', 5, 210, '2010-02-15', 4, '', '', 'NOFIYALDI', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Tidak', NULL),
(107, '5', '0093846102', 'Yuda Edi Wahyana', '3401120108090003', 'L', 5, 210, '2009-08-01', 4, '', '', 'PUTRI JAZIMAH', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(108, '5', '0082840617', 'Yusuf Pamungkas', '3401122804080001', 'L', 5, 210, '2008-04-28', 4, '', '', 'RAHMADI', 'POTRONALAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(109, '5', '0153278170', 'Afif Rafiudin', '3401122708090001', 'L', 5, 210, '2009-06-27', 5, '', '', 'JUDARDIN', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(110, '5', '088476284', 'Ahmad Faiq Athaya', '3401122802080001', 'L', 10, 249, '2008-02-28', 5, '', '', 'Ahmad Baehaqi', 'POTRONALAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Tidak', NULL),
(111, '5', '083034124', 'Amira Zerlinda', '3308026211080004', 'P', 34, 278, '2008-11-22', 5, '', '', 'Muhammad Zuamar', 'PANTOG WETAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Tidak', NULL),
(112, '5', '0072961067', 'Andrian Putra Pangestu', '3401122206070001', 'L', 5, 210, '2007-06-22', 5, '', '', 'SURAHMAN', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(113, '5', '0086534500', 'Gresiya Suma Safitri', '3401125010080002', 'P', 5, 210, '2008-10-10', 5, '', '', 'DUL JALIL', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(114, '5', '0095912960', 'Hasna Fathitya Sabrina', '3401126909090002', 'P', 5, 210, '2009-09-29', 5, '', '', 'EKO NURAHMAN SUROJO', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(115, '5', '0083313497', 'Indah Fitria Ningrum', '3401124210080001', 'P', 5, 210, '2008-10-02', 5, '', '', 'SUTARI', 'PANTOG WETAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(116, '5', '0087301623', 'Muhammad Ilham Sarifuddin', '3401122103080002', 'L', 5, 210, '2008-03-21', 5, '', '', 'NURCHOLIS', 'POTRONALAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(117, '5', '0155408388', 'Muhammad Raditya Ainul Yaqin', '3401121607080001', 'L', 5, 210, '2008-07-16', 5, '', '', 'FARIKIN', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(118, '5', '0095231681', 'Muhammad Shulhan Al-farisi', '3401120106090001', 'L', 5, 210, '2009-06-01', 5, '', '', 'SLAMET SULBANI', 'SEMAWUNG', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Tidak', 'Tidak', NULL),
(119, '5', '0153200473', 'Novaris Dwi Firmansyah', '3401121711080002', 'L', 10, 249, '2008-11-17', 5, '', '', 'SARYANTO', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(120, '5', '0072706748', 'Oktafiya Duwi Safitri', '3401125510070001', 'P', 5, 210, '2007-10-15', 5, '', '', 'SUNARDI', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(121, '5', '0083690882', 'Prastika Guntur Firmansyah', '3401120307080002', 'L', 5, 210, '2008-07-03', 5, '', '', 'KALIM', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(122, '5', '0098488467', 'Siti Musyafiani', '3401124901090001', 'P', 5, 210, '2009-09-10', 5, '', '', 'ZURISAM', 'PRANAN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(123, '5', '0158891388', 'Tegar Arya Pangestu', '3401121308080001', 'L', 5, 210, '2008-08-13', 5, '', '', 'HARYADI', 'SLANDEN', 'BANJAROYA', 'KEC. KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(124, '5', '0081232726', 'Adi Bagus Saputra', '3401120703080001', 'L', 5, 210, '2008-03-07', 6, '', '', 'Suwita', 'PRANAN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(125, '5', '0071776993', 'Ageng Ratri Dewi', '340112591207002', 'P', 5, 210, '2007-12-19', 6, '', '', 'Sudarman', 'SLANDEN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(126, '5', '0077101667', 'Ahmad Hidayat', '3401122701070002', 'L', 5, 210, '2007-01-27', 6, '', '', 'Masicun', 'PRANAN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(127, '5', '0074217306', 'Ahmad Mirza Arvinudin', '3401121612070001', 'L', 5, 210, '2007-12-16', 6, '', '', 'Muh Ahmad', 'PRANAN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(128, '5', '0074203935', 'Aqila Chusnia Mu&#039;mina', '3204156509070001', 'P', 9, 22, '2007-09-25', 6, '', '', 'Heru Gunadi', 'POTRONALAN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(129, '5', '0072510958', 'Ardian Ramadhan', '3401122209070001', 'L', 5, 210, '2007-09-22', 6, '', '', 'Widodo', 'PRANAN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(130, '5', '0089913911', 'Arif Duwiyanto', '3401122303090001', 'L', 5, 210, '2008-03-23', 6, '', '', 'Muh Ahmad Bani', 'PRANAN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(131, '5', '0085552671', 'Choiriatunnisa Tsani Hasya', '3401126707080002', 'P', 5, 210, '2008-07-27', 6, '', '', 'Riyadi', 'SLANDEN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(132, '5', '0071429595', 'Febriana Alfiyani', '3401124806810002', 'P', 5, 210, '2007-02-24', 6, '', '', 'Alfandi', 'PRANAN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(133, '5', '0066771589', 'Fitri Andriani', '3401125510060002', 'P', 5, 210, '2006-10-15', 6, '', '', 'Suroto', 'KEMPONG', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(134, '5', '0082016833', 'Iqbal Dzaky Reevansyah', '6302152103080001', 'L', 15, 215, '2008-03-21', 6, '', '', 'Fujiansyah', 'POTRONALAN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(135, '5', '0077252994', 'Junita Adinda Suryandika', '3401126606070001', 'P', 5, 210, '2007-06-26', 6, '', '', 'Suroto', 'PRANAN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(136, '5', '0077859964', 'Nabil Chandra Susilo Nugroho', '3401123011070001', 'L', 5, 210, '2007-11-30', 6, '', '', 'Sucipto Susilo', 'PRANAN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(137, '5', '0074539804', 'Revania Oktaviani', '3401126610070001', 'P', 5, 210, '2007-10-26', 6, '', '', 'Abidin', 'PRANAN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(138, '5', '0078559059', 'Zulfa Ulya', '3401126807070001', 'P', 5, 210, '2007-07-28', 6, '', '', 'Sudaryanto', 'SLANDEN', 'BANJAROYO', 'KALIBAWANG', 'Dalam', 'Tidak', 'Ya', 'Ya', NULL),
(140, '5', '11111', '11111', '111', 'L', 2, 56, '2021-01-16', 11, 'ghalyfadhillah@gmail.com', '087722777245', 'Gunadi Abdullah', 'ASDASD', 'ASDASD', 'ASDASD', 'Dalam', 'Tidak', 'Ya', 'Tidak', NULL),
(141, '5', '3243', '44334', '34243342', 'P', 10, 169, '2021-01-18', 16, 'saddsa@sadads.com', '2332', 'dassad', 'SADASD', 'SADSAD', 'SADASD', 'Dalam', 'Tidak', 'Tidak', 'Tidak', NULL),
(142, '5', '323242', '3243443', '232434', 'P', 8, 393, '2021-01-26', 17, 'dasdas@dsadsa.com', '432342', 'asddsa', 'SADASD', 'SADASD', 'ASDAS', 'Luar', 'Ya', 'Tidak', 'Tidak', NULL),
(143, '5', '11314141441', 'Jumaidi Saputraaaa', '14141413141', 'L', 6, 151, '1999-10-19', 2, 'jumaidi@gmail.com', '08937272728128', 'Budi', '-', '-', 'PONDOK AREN', 'Dalam', 'Ya', 'Ya', 'Ya', NULL),
(144, '5', '2131231231123', 'Ade Sentosah', '3175052605970002', 'L', 1, 94, '2022-02-22', 21, 'ade@gmail.com', '0819990281214', '', '', '', '', 'Dalam', 'Ya', 'Ya', 'Ya', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_soal`
--

CREATE TABLE IF NOT EXISTS `sr_soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `idmata_pelajaran` int(11) DEFAULT NULL,
  `idkelas` int(11) DEFAULT NULL,
  `idusers` int(11) DEFAULT NULL,
  `unit` int(10) NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_soal`
--

INSERT INTO `sr_soal` (`id_soal`, `idmata_pelajaran`, `idkelas`, `idusers`, `unit`) VALUES
(50, 3, 3, 1, 5),
(51, 3, 3, 1, 5),
(56, 49, 20, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_soaldetail`
--

CREATE TABLE IF NOT EXISTS `sr_soaldetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_soal` int(5) NOT NULL,
  `soal` text DEFAULT NULL,
  `gambar_soal` varchar(200) DEFAULT NULL,
  `opsi_a` text DEFAULT NULL,
  `opsi_b` text DEFAULT NULL,
  `opsi_c` text DEFAULT NULL,
  `opsi_d` text DEFAULT NULL,
  `opsi_e` text DEFAULT NULL,
  `jawaban` varchar(1) NOT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_soaldetail`
--

INSERT INTO `sr_soaldetail` (`id`, `id_soal`, `soal`, `gambar_soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `jawaban`, `status`) VALUES
(26, 50, 'Hasil dari 7.598 - 1.637 - 2.893 + 4.716 adalah', NULL, '7.784', '7.812', '7.856', '7.903', '7.901', 'A', 0),
(27, 51, 'Hasil pengerjaan dari 64 x 826 : 28 adalah ....', NULL, '1.678', '1.762', '1.888', '1.916', '1.915', 'C', 0),
(28, 51, 'Suhu udara di puncak gunung pada pukul 03.00 adalah -10° C. Setelah matahari terbit,\r\nenergi matahari menaikkan suhu udara di puncak gunung tersebut. Jika setiap jam suhu\r\nudara di puncak guning naik 5° C, suhu udara pada pukul 15.00 menjadi .... C°', NULL, '23', '24', '26', '28', '29', 'C', 1),
(29, 51, 'Bus Harapan Jaya berangkat dari terminal setiap 30 menit sekali. Bus Pelita Indah berangkat\r\ndari terminal setiap 45 menit sekali, dan bus Barokah berangkat setiap 60 menit sekali. Jika\r\n\r\nketiga bus berangkat bersama-sama pada pukul 05.00, ketiga bus akan berangkat bersama-\r\nsama lagi pada pukul ....', NULL, '07.00', '08.00', '09.00', '10.00', '11.00', 'B', 0),
(30, 51, 'Herlina ingin membuat gelang. Ia membeli manik-manik warna merah 80 butir, hijau 75\r\nbutir, dan biru 50 butir. Herlina akan membuat gelang dari manik-manik tersebut dengan\r\nbagian warna yang sama. Banyaknya manik-manik pada setiap gelang adalah', NULL, 'manik-manik merah 20, manik-manik hijau 15, manik-manik biru 10', 'manik-manik merah 18, manik-manik hijau 16, manik-manik biru 12', 'manik-manik merah 18, manik-manik hijau 15, manik-manik biru 10', 'manik-manik merah 16, manik-manik hijau 15, manik-manik biru 10', 'manik-manik merah 16, manik-manik hijau 15, manik-manik biru 11', 'D', 1),
(31, 51, 'KPK dari 85, 90, dan 125 dalam bentuk faktorisasi prima adalah ....', NULL, '2 x 3 x 52', '2 x 32 x 52', '2 x 33 x 52', '2 x 32 x 53', '2 x 32 x 54', 'D', 0),
(32, 56, 'test ? ', NULL, '1', '2', '3', '4', '5', 'C', 1),
(33, 56, 'test2', NULL, '1', '2', '3', '4', '5', 'E', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_tabungan`
--

CREATE TABLE IF NOT EXISTS `sr_tabungan` (
  `idtabungan` int(11) NOT NULL AUTO_INCREMENT,
  `idsiswa` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `debet` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `saldo` varchar(255) NOT NULL DEFAULT '0',
  `unit` varchar(10) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `tingkat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idtabungan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_tabungan`
--

INSERT INTO `sr_tabungan` (`idtabungan`, `idsiswa`, `tanggal`, `kode`, `catatan`, `debet`, `credit`, `saldo`, `unit`, `deskripsi`, `tingkat`) VALUES
(1, '323242', '2022-04-08', '', 'ok', '20000000', '0', '20000000', '5', 'Setor Tabungan-20000000-2022-04-08-3243443', '2022'),
(2, '0103368264', '2022-04-08', '', 'ok', '2000000', '0', '2000000', '5', 'Setor Tabungan-2000000-2022-04-08-Bayu Ardhan Handaru', '2022'),
(3, '0103368264', '2022-04-08', '', 'ok', '20000', '0', '2020000', '5', 'Setor Tabungan-20000-2022-04-08-Bayu Ardhan Handaru', '2022'),
(4, '0103368264', '2022-04-08', '', 'ok', '30000', '0', '2050000', '5', 'Setor Tabungan-30000-2022-04-08-Bayu Ardhan Handaru', '2022'),
(6, '0103368264', '2022-04-08', '', 'test', '0', '50000', '2000000', '5', 'Setor Tabungan-50000-2022-04-08-Bayu Ardhan Handaru', '2022'),
(7, '11111', '2022-04-13', '', 'ok', '200000', '0', '200000', '', 'Setor Tabungan-200000-2022-04-13-11111', '2022'),
(8, '11111', '2022-04-17', '', 'tabungan qurban', '0', '200000', '0', '5', 'Setor Tabungan-200000-2022-04-17-11111', '2022'),
(9, '11111', '2022-05-31', '', 'Bayar Makan', '0', '100000', '-100000', '', 'Setor Tabungan-100000-2022-05-31-11111', '2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_tahun_pelajaran`
--

CREATE TABLE IF NOT EXISTS `sr_tahun_pelajaran` (
  `idtahun_pelajaran` int(11) NOT NULL AUTO_INCREMENT,
  `tp_tahun` varchar(20) NOT NULL,
  PRIMARY KEY (`idtahun_pelajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_tahun_pelajaran`
--

INSERT INTO `sr_tahun_pelajaran` (`idtahun_pelajaran`, `tp_tahun`) VALUES
(1, '2019/2020-1'),
(2, '2019/2020-2'),
(3, '2020/2021-1'),
(4, '2020/2021-2'),
(5, '2021/2022-1'),
(6, '2021/2022-2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_tanggal_gaji`
--

CREATE TABLE IF NOT EXISTS `sr_tanggal_gaji` (
  `idtanggal_gaji` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(255) NOT NULL,
  `unit` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idtanggal_gaji`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_tanggal_gaji`
--

INSERT INTO `sr_tanggal_gaji` (`idtanggal_gaji`, `tanggal`, `unit`) VALUES
(1, '2022-04-06', '5'),
(3, '2022-03-30', '2 ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_tarif_gaji_user`
--

CREATE TABLE IF NOT EXISTS `sr_tarif_gaji_user` (
  `id_gaji` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) DEFAULT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `id_tunjangan` varchar(200) DEFAULT NULL,
  `deskripsi` varchar(20) DEFAULT NULL,
  `id_potongan` int(11) DEFAULT NULL,
  `id_lain` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_gaji`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_tarif_gaji_user`
--

INSERT INTO `sr_tarif_gaji_user` (`id_gaji`, `unit`, `id_user`, `id_tunjangan`, `deskripsi`, `id_potongan`, `id_lain`) VALUES
(8, '5', '40', '2', 'gaji_pokok', NULL, NULL),
(9, '5', '40', '2', 'gaji_pokok', NULL, NULL),
(10, '5', '40', '2', 'gaji_pokok', NULL, NULL),
(16, '5', '40', NULL, 'potongan', 2, NULL),
(21, '5', '40', NULL, 'lain', NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_tarif_unit_pos`
--

CREATE TABLE IF NOT EXISTS `sr_tarif_unit_pos` (
  `id_tarif_unit_pos` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit_pos` varchar(10) DEFAULT NULL,
  `unit` varchar(11) DEFAULT NULL,
  `id_kode_akun` varchar(20) DEFAULT NULL,
  `tipe` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tarif_unit_pos`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_tarif_unit_pos`
--

INSERT INTO `sr_tarif_unit_pos` (`id_tarif_unit_pos`, `id_unit_pos`, `unit`, `id_kode_akun`, `tipe`) VALUES
(8, '3', '', '622655', 'pendapatan'),
(9, '3', '5', '622656', 'pendapatan'),
(11, '3', '5', '622655', 'beban');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_tr_paketsoal`
--

CREATE TABLE IF NOT EXISTS `sr_tr_paketsoal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_soal` int(10) NOT NULL,
  `id_paket` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_tr_paketsoal`
--

INSERT INTO `sr_tr_paketsoal` (`id`, `id_soal`, `id_paket`) VALUES
(22, 25, 7),
(23, 24, 7),
(24, 28, 9),
(25, 30, 9),
(26, 30, 8),
(27, 32, 8),
(28, 32, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_unit_pos`
--

CREATE TABLE IF NOT EXISTS `sr_unit_pos` (
  `id_unit_pos` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) DEFAULT NULL,
  `nama_unit_pos` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_unit_pos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_unit_pos`
--

INSERT INTO `sr_unit_pos` (`id_unit_pos`, `unit`, `nama_unit_pos`) VALUES
(3, '5', 'Cateringg'),
(4, '5', 'SPP'),
(5, '', 'Uang Gedung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_users`
--

CREATE TABLE IF NOT EXISTS `sr_users` (
  `idusers` int(11) UNSIGNED NOT NULL,
  `unit` varchar(11) NOT NULL,
  `u_nbm_nip` varchar(255) NOT NULL,
  `u_nuptk_nuks` varchar(255) DEFAULT NULL,
  `u_tl_idprovinsi` int(11) NOT NULL,
  `u_tl_idkota` int(11) NOT NULL,
  `u_tanggal_lahir` date NOT NULL,
  `u_jenis_kelamin` enum('P','L') NOT NULL,
  `u_status_pegawai` varchar(100) NOT NULL,
  `u_tunjangan_apbd` varchar(100) DEFAULT NULL,
  `u_tugas_tambahan` varchar(100) DEFAULT NULL,
  `u_jenjang` varchar(50) NOT NULL,
  `u_perguruan_tinggi` varchar(255) NOT NULL,
  `u_jurusan` varchar(100) DEFAULT NULL,
  `u_tahun_lulus` varchar(20) NOT NULL,
  `u_npwp` varchar(255) DEFAULT NULL,
  `u_sertifikasi` enum('Sudah','Belum') NOT NULL,
  `u_sertifikasi_tahun` year(4) DEFAULT NULL,
  `u_prestasi` text DEFAULT NULL,
  `u_honor` int(11) NOT NULL,
  `u_kerja_pasangan` varchar(255) DEFAULT NULL,
  `u_alamat_tinggal` text NOT NULL,
  `u_photo` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idusers`),
  KEY `idusers` (`idusers`),
  KEY `u_tl_idprovinsi` (`u_tl_idprovinsi`),
  KEY `u_tl_idkota` (`u_tl_idkota`),
  KEY `idusers_2` (`idusers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sr_users`
--

INSERT INTO `sr_users` (`idusers`, `unit`, `u_nbm_nip`, `u_nuptk_nuks`, `u_tl_idprovinsi`, `u_tl_idkota`, `u_tanggal_lahir`, `u_jenis_kelamin`, `u_status_pegawai`, `u_tunjangan_apbd`, `u_tugas_tambahan`, `u_jenjang`, `u_perguruan_tinggi`, `u_jurusan`, `u_tahun_lulus`, `u_npwp`, `u_sertifikasi`, `u_sertifikasi_tahun`, `u_prestasi`, `u_honor`, `u_kerja_pasangan`, `u_alamat_tinggal`, `u_photo`, `status`) VALUES
(1, '5', '954033', '3433754656300012 / 16023L0010404122016516', 6, 153, '1987-02-13', 'L', 'GTY', '', 'Kepala Sekolah', 'S1', 'Undip', 'Sistem Informasi', '2010', '66.907.985.7-544.000', 'Sudah', 2013, 'Guru Teladan tahun 2015', 2600000, 'Pegawai Swasta', 'Lenteng Agung, Jagakarsa, Jakarta Selatan', '3454bd5004b1bd6d20a9ff3f633a37d1.png', 0),
(37, '5', '992052', '9060760662300003', 5, 210, '1982-07-28', 'P', 'GTY', 'PTTD', 'Guru Kelas II', 'S1', 'Univ Terbuka Yogyakarta', 'PGSD', '2018', '', 'Belum', 0000, '', 1000000, 'Swasta', 'Demangan, Banjarharjo, Kalibawang', 'f5b05744233acca3b73d179279d83ff4.jpg', 0),
(38, '5', '1062801', '', 5, 210, '1985-01-07', 'L', 'GTY', '', 'Guru Kelas IV', 'S1', 'Univ Sanata Dharma', 'PGSD', '2010', '91.003.379.4-544.000', 'Belum', 0000, '', 400000, 'Swasta', 'Duwet 3, Banjarharjo, Kalibawang', 'ef2cbde3636968a2bbb9f76a5df7909e.jpg', 0),
(39, '5', '1295422', '', 5, 210, '1992-07-19', 'L', 'GTT', '', 'Guru Penjasorkes', 'S1', 'Univ Ahmad Dahlan', 'PBSI', '2012', '', 'Belum', 0000, '', 350000, '', 'Paras, Banjarasri, Kalibawang', '9f23f5e97972e5e98537f51b76db76ec.jpg', 0),
(40, '5', '19671206 198903 1 003', '2538745647110043', 5, 210, '1967-12-06', 'L', 'PNS KEMENAG', '', 'Guru PAI', 'D2', 'UIN Sunan Kalij Jaga Yogyakarta', 'Pend. Agama Islam', '1993', '', 'Sudah', 2013, '', 4200000, 'IRT', 'Gunungmojo, Argosari, Sedayu, Bantul', '42ef1ac722851008e5e9bcb35351827c.jpg', 0),
(41, '5', '1335358', '', 9, 115, '1994-04-04', 'P', 'GTT', '', 'Operator', 'S1', 'UIN Raden Fatah Palembang', 'Pend. Bahasa Inggris', '2017', '', 'Belum', 0000, '', 150000, 'Swasta', 'Salam, Banjarharjo, Kalibawang', 'e20f5b298a4d05cb1d22977403f73062.jpg', 0),
(42, '5', '1335360', '', 5, 210, '1993-02-07', 'P', 'GTT', '', 'Guru Kelas I', 'S1', 'Univ Terbuka Banten', 'PGSD', '2018', '', 'Belum', 0000, '', 300000, 'Swasta', 'Pranan, Banjaroya, Kalibawang', '7079eeff453c257d36b51af9413281ec.jpeg', 0),
(43, '5', '1314346', '', 5, 210, '1974-10-27', 'P', 'GTT', '', 'Guru Kelas III', 'S1', 'Univ Widya Mataram Yogyakarta', 'Teknologi pertanian', '1998', '', 'Belum', 0000, '', 300000, 'Karyawan', 'Kedondong 1, Banjararum, Kalibawang', '373f490ef28c28450a359b46e73525d7.jpg', 0),
(44, '5', '1295423', '', 5, 210, '1987-04-15', 'P', 'GTT', '', 'Guru Kelas V', 'S1', 'Univ Indraprasta PGRI Jakarta', 'Pendidikan Matematika', '2011', '', 'Belum', 0000, '', 350000, 'Swasta', 'Semawung, Banjarharjo, Kalibawang', '17773abbb91433f028f4183bc51c80de.jpg', 0),
(45, '5', '1187611', '', 5, 210, '1991-05-08', 'P', 'GTY', '', 'Guru Kelas VI', 'S1', 'Univ PGRI Yogyakarta', 'Pendidikan Matematika', '2013', '', 'Belum', 0000, '', 400000, '', 'Semaken 3, Banjararum, Kalibawang', '785a17c1772c4c0ed74a372bffca962f.jpg', 0),
(57, '5', '104352', '10435342456', 2, 56, '2021-01-18', 'L', 'GTY', '', 'Operator', 'S1', 'Universitas Amikom Yogyakarta', 'Sistem Informasi', '2021', '9999999999999', 'Belum', 0000, 'Pegawai Terganteng', 5300000, 'Kepala Dinas Pariwisata', 'Jln Bintara RT 12 RW 09', 'fb9a0bb598302e966995357ef0d12ab8.png', 0),
(59, '5', '104353', '10435342457', 6, 153, '1987-12-23', 'L', 'GTY', '0', 'Kepala Program', 'S1', 'Universitas Indra Prasta PGRI', 'Pendidikan Ekonomi', '2017', '12.345.76543', 'Belum', 0000, '0', 1400000, '0', 'Jl. Rawa Sari', '8b1746b499eea7a042bf6bd4ffb35f80.png', 0),
(64, '2', '', NULL, 0, 0, '0000-00-00', 'P', '', NULL, NULL, '', '', NULL, '', NULL, 'Sudah', NULL, NULL, 0, NULL, '', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_virtualclass`
--

CREATE TABLE IF NOT EXISTS `sr_virtualclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) NOT NULL,
  `pengajar_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `libur` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_virtualclass`
--

INSERT INTO `sr_virtualclass` (`id`, `unit`, `pengajar_id`, `kelas_id`, `title`, `waktu`, `url`, `libur`) VALUES
(1, '', 0, 0, 'Tahun Baru Masehi', '2022-01-1', '', '1'),
(2, '', 0, 0, 'Hari Siwa Ratri', '2022-01-1', '', '2'),
(3, '', 0, 0, 'Tahun Baru Imlek 2573 Kongzili', '2022-02-1', '', '1'),
(4, '', 0, 0, 'Isra Mikraj Nabi Muhammad SAW', '2022-02-28', '', '1'),
(5, '', 0, 0, 'Hari Raya Nyepi', '2022-03-3', '', '1'),
(6, '', 0, 0, 'Hari Saraswati', '2022-03-26', '', '2'),
(7, '', 0, 0, 'Wafat Isa Al Masih', '2022-04-15', '', '1'),
(8, '', 0, 0, 'Hari Buruh Internasional', '2022-05-1', '', '1'),
(9, '', 0, 0, 'Hari Raya Idul Fitri 1443 Hijriyah', '2022-05-2', '', '1'),
(10, '', 0, 0, 'Hari Raya Idul Fitri 1443 Hijriyah', '2022-05-3', '', '1'),
(11, '', 0, 0, 'Hari Raya Waisak 2566', '2022-05-16', '', '1'),
(12, '', 0, 0, 'Kenaikan Isa Al Masih', '2022-05-26', '', '1'),
(13, '', 0, 0, 'Hari Lahirnya Pancasila', '2022-06-1', '', '1'),
(14, '', 0, 0, 'Penampahan Galungan', '2022-06-7', '', '2'),
(15, '', 0, 0, 'Hari Raya Galungan', '2022-06-8', '', '2'),
(16, '', 0, 0, 'Umanis Galungan', '2022-06-9', '', '2'),
(17, '', 0, 0, 'Hari Raya Kuningan', '2022-06-18', '', '2'),
(18, '', 0, 0, 'Hari Raya Idul Adha 1443 Hijriyah', '2022-07-9', '', '1'),
(19, '', 0, 0, 'Tahun Baru Islam 1444 Hijriyah', '2022-07-30', '', '1'),
(20, '', 0, 0, 'Hari Proklamasi Kemerdekaan RI', '2022-08-17', '', '1'),
(21, '', 0, 0, 'Maulid Nabi Muhammad SAW', '2022-10-8', '', '1'),
(22, '', 0, 0, 'Hari Saraswati', '2022-10-22', '', '2'),
(23, '', 0, 0, 'Hari Raya Natal', '2022-12-25', '', '1'),
(24, '5', 1, 1, 'BAB I - Adminstrasi Perkantoran Dasar', '2022-03-22', 'https://meet.jit.si/Lekum', ''),
(35, '5', 1, 1, 'BAB 1 - Membuat Company Profile', '2022-02-22', 'https://meet.jit.si/hQPtq', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr_wali_murid`
--

CREATE TABLE IF NOT EXISTS `sr_wali_murid` (
  `id_wali_murid` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `nik` varchar(200) DEFAULT NULL,
  `tempat_lahir` varchar(200) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(200) DEFAULT NULL,
  `agama` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `no_telp` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `idsiswa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_wali_murid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sr_wali_murid`
--

INSERT INTO `sr_wali_murid` (`id_wali_murid`, `nama_lengkap`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `email`, `no_telp`, `alamat`, `idsiswa`) VALUES
(2, 'Gilang', '3175052605971251', 'Madiun', '1978-02-01', 'Laki-laki', 'Islam', '', '081280462612', 'Jl Mandeh', 127),
(3, 'Tono', '21321424214124', 'Jakarta', '1982-06-22', 'Laki-laki', 'Islam', 'tono@gmail.com', '08976766562212', 'Jalan Cendrawasih', 87);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `multirole` enum('Y','N') DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `unit`, `ip_address`, `password`, `email`, `created_on`, `last_login`, `active`, `multirole`, `first_name`, `last_name`, `phone`) VALUES
(1, '5', '127.0.0.1', '$2y$12$DPBC0GqrE7QhiYgWOBdbW.c/jZQ0qD7KS7mO8z5HtaiPa35WwuxyK', 'sutan.daulay@gmail.com', 1268889823, 1645102751, 1, 'N', 'Sutan', 'Daulay, S.Kom', '081283960337'),
(37, '5', '127.0.0.1', '$2y$10$y6tuPYX8c8k2OkmmmLGQuOt6ReU7iYHzxEkTm9G..U4a1dJ20WqUS', 'h.yuliajie@gmail.com', 1604316790, 1611518343, 1, 'Y', 'Heri', 'Yuli Astuti, S.Pd.', '081802637311'),
(38, '5', '127.0.0.1', '$2y$10$3Hfg3GDUGrnqzRJeFO1L0u3tHe.jEvBjl0AUi3GGOeYcLKUDwI60a', 'foreverbarca24@gmail.com', 1604324461, 1640778495, 1, 'Y', 'Eka', 'Romadi, S.Pd.', '087719045202'),
(39, '5', '127.0.0.1', '$2y$10$P1fNQaXHq7SDMI89fVyeAuNtbskbLbS6X9GzuvqLhyOpYGjb2jr66', 'prodocid.id@gmail.com', 1604404981, 1611515571, 1, 'N', 'Muhammad ', 'Yuli Nugroho, S.Pd.', '081328086524'),
(40, '5', '127.0.0.1', '$2y$10$eICdXdcDjiUKA7ieNqHTueuCVl47eLEkdCzHccWoip7HvN4Sx7sa2', 'foreverbarca17@gmail.com', 1604405357, 1640675168, 1, 'N', 'Ahwanto, A.Ma', '', '081328579072'),
(41, '5', '127.0.0.1', '$2y$10$ZlApEjZiUXuUQvPrelvWWOjqIlCK6mWlgyZAtskny353GxpATj6.O', 'trilestari40@yahoo.com', 1604405791, 1645100999, 1, 'N', 'Tri ', 'Lestari, S.Pd', '085279657826'),
(42, '5', '127.0.0.1', '$2y$10$26FP8tRR/0UwORH8tI5eS.RNTMs3.RnIbZ7ldxy0PhIO/n94g2Jpe', 'widayatiasih93@gmail.com', 1604406384, 1645101063, 1, 'Y', 'Widayati ', 'Asih Rusilah, S.Pd', '087877633339'),
(43, '5', '127.0.0.1', '$2y$10$y6tuPYX8c8k2OkmmmLGQuOt6ReU7iYHzxEkTm9G..U4a1dJ20WqUS', 'tripuji298@gmail.com', 1604406639, NULL, 1, 'Y', 'Tri ', 'Puji Lestari, S.TP', '081225422320'),
(44, '5', '127.0.0.1', '$2y$10$vyeEuY7OB3ECbYUTZiBGnuCsW5GXcTrbxiB6NDON7oZkUA0/bKUEy', 'tutikrahayu086@gmail.com', 1604407059, 1645100832, 1, 'Y', 'Tutik ', 'Rahayu, S.Pd.', '087738264098'),
(45, '5', '127.0.0.1', '$2y$10$y6tuPYX8c8k2OkmmmLGQuOt6ReU7iYHzxEkTm9G..U4a1dJ20WqUS', 'fulileo.astuti06@gmail.com', 1604407243, NULL, 1, 'Y', 'Tri ', 'Fuji Astuti, S.Pd.', '085764945075'),
(57, '5', '127.0.0.1', '$2y$10$y6tuPYX8c8k2OkmmmLGQuOt6ReU7iYHzxEkTm9G..U4a1dJ20WqUS', 'ghalyfadhillah@gmail.com', 1610969508, 1612615966, 1, 'Y', 'Ghaly', 'Fadhillah, S.Kom', '087722777245'),
(59, '5', '103.119.141.186', '$2y$10$ztlP7HXx3yYRbbcldtK7V.dNLDzFirPis1LJ96KI6yftEFMBGS7py', 'saka87aja@gmail.com', 1640777850, NULL, 1, 'N', 'Galuh', 'Saka Twinta S.pd', '0838654876342'),
(64, '2', '::1', '$2y$10$38UHPhu.ge7KZfs4jmLsLukZyuK27j0rTOJBxvzdKQpCZKdIMabR6', 'rzalvaero@gmail.com', 4294967295, NULL, 1, 'N', 'Reza', 'Lesmana Putra A.md', '081280462659');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_backup`
--

CREATE TABLE IF NOT EXISTS `web_backup` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `datestamp` varchar(100) NOT NULL,
  `filedata` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `web_backup`
--

INSERT INTO `web_backup` (`id`, `datestamp`, `filedata`) VALUES
(5, '2022-02-19 14:41:34', 'backup-220219-db.zip'),
(6, '2022-02-20 17:07:15', 'backup-220220-db.zip'),
(7, '2022-02-22 14:13:51', 'backup-220222-db.zip'),
(8, '2022-02-23 15:17:49', 'backup-220223-db.zip'),
(9, '2022-03-02 10:02:40', 'backup-220302-db.zip'),
(10, '2022-03-09 09:55:35', 'backup-220309-db.zip'),
(11, '2022-03-09 17:18:41', 'backup-220309-db.zip'),
(12, '2022-03-10 10:46:56', 'backup-220310-db.zip'),
(13, '2022-03-10 19:27:32', 'backup-220310-db.zip'),
(14, '2022-03-22 10:40:55', 'backup-220322-db.zip'),
(15, '2022-05-30 17:08:10', 'backup-220530-db.zip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_calender`
--

CREATE TABLE IF NOT EXISTS `web_calender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) NOT NULL,
  `created` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `libur` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `web_calender`
--

INSERT INTO `web_calender` (`id`, `unit`, `created`, `kelas_id`, `title`, `waktu`, `url`, `libur`) VALUES
(1, '', 0, 0, 'Tahun Baru Masehi', '2022-01-1', '', '1'),
(2, '', 0, 0, 'Hari Siwa Ratri', '2022-01-1', '', '2'),
(3, '', 0, 0, 'Tahun Baru Imlek 2573 Kongzili', '2022-02-1', '', '1'),
(4, '', 0, 0, 'Isra Mikraj Nabi Muhammad SAW', '2022-02-28', '', '1'),
(5, '', 0, 0, 'Hari Raya Nyepi', '2022-03-3', '', '1'),
(6, '', 0, 0, 'Hari Saraswati', '2022-03-26', '', '2'),
(7, '', 0, 0, 'Wafat Isa Al Masih', '2022-04-15', '', '1'),
(8, '', 0, 0, 'Hari Buruh Internasional', '2022-05-1', '', '1'),
(9, '', 0, 0, 'Hari Raya Idul Fitri 1443 Hijriyah', '2022-05-2', '', '1'),
(10, '', 0, 0, 'Hari Raya Idul Fitri 1443 Hijriyah', '2022-05-3', '', '1'),
(11, '', 0, 0, 'Hari Raya Waisak 2566', '2022-05-16', '', '1'),
(12, '', 0, 0, 'Kenaikan Isa Al Masih', '2022-05-26', '', '1'),
(13, '', 0, 0, 'Hari Lahirnya Pancasila', '2022-06-1', '', '1'),
(14, '', 0, 0, 'Penampahan Galungan', '2022-06-7', '', '2'),
(15, '', 0, 0, 'Hari Raya Galungan', '2022-06-8', '', '2'),
(16, '', 0, 0, 'Umanis Galungan', '2022-06-9', '', '2'),
(17, '', 0, 0, 'Hari Raya Kuningan', '2022-06-18', '', '2'),
(18, '', 0, 0, 'Hari Raya Idul Adha 1443 Hijriyah', '2022-07-9', '', '1'),
(19, '', 0, 0, 'Tahun Baru Islam 1444 Hijriyah', '2022-07-30', '', '1'),
(20, '', 0, 0, 'Hari Proklamasi Kemerdekaan RI', '2022-08-17', '', '1'),
(21, '', 0, 0, 'Maulid Nabi Muhammad SAW', '2022-10-8', '', '1'),
(22, '', 0, 0, 'Hari Saraswati', '2022-10-22', '', '2'),
(23, '', 0, 0, 'Hari Raya Natal', '2022-12-25', '', '1'),
(24, '5', 1, 1, 'BAB I - Adminstrasi Perkantoran Dasar', '2022-03-22', 'https://meet.jit.si/Lekum', ''),
(35, '5', 1, 1, 'BAB 1 - Membuat Company Profile', '2022-02-22', 'https://meet.jit.si/hQPtq', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_default`
--

CREATE TABLE IF NOT EXISTS `web_default` (
  `id` int(10) NOT NULL,
  `url` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `maintenance` enum('tidak','iya') NOT NULL,
  `whatsapp_group` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `web_default`
--

INSERT INTO `web_default` (`id`, `url`, `title`, `logo`, `description`, `email`, `maintenance`, `whatsapp_group`, `whatsapp`) VALUES
(1, 'https://www.proschool.id/', 'PROschool by DesaTech', 'logo.png', 'Elearning by ProSchool for a Smart Learning for Student in New Era! ', 'admin@proschool.id', 'tidak', '#', '6281280462650');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_log`
--

CREATE TABLE IF NOT EXISTS `web_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `idusers` varchar(11) DEFAULT NULL,
  `datestamp` varchar(50) NOT NULL,
  `note` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `web_log`
--

INSERT INTO `web_log` (`id`, `unit`, `type`, `idusers`, `datestamp`, `note`) VALUES
(1, '5', 'siswa', '11', '2022-02-20 17:02:55', 'Anda merubah data Profile'),
(2, '5', 'guru', '1', '2022-02-20 17:06:20', 'Anda melakukan login dengan \"::1\"'),
(3, '5', 'guru', '1', '2022-02-22 10:08:16', 'Anda melakukan login dengan \"::1\"'),
(4, '5', 'siswa', '11', '2022-02-22 12:16:16', 'Anda melakukan login dengan \"::1\"'),
(5, '5', 'guru', '1', '2022-02-22 13:05:25', 'Anda melakukan login dengan \"::1\"'),
(6, '5', 'siswa', '11', '2022-02-22 15:13:52', 'Anda melakukan login dengan \"::1\"'),
(7, '5', 'guru', '1', '2022-02-22 15:53:42', 'Anda melakukan login dengan \"::1\"'),
(8, '5', 'siswa', '11', '2022-02-22 16:12:33', 'Anda melakukan login dengan \"::1\"'),
(9, '5', 'guru', '1', '2022-02-22 16:27:36', 'Anda melakukan login dengan \"::1\"'),
(10, '5', 'siswa', '11', '2022-02-22 16:43:03', 'Anda melakukan login dengan \"::1\"'),
(11, '5', 'guru', '1', '2022-02-22 16:50:10', 'Anda melakukan login dengan \"::1\"'),
(12, '5', 'siswa', '11', '2022-02-22 16:51:40', 'Anda melakukan login dengan \"::1\"'),
(13, '5', 'siswa', '11', '2022-02-22 21:25:17', 'Anda melakukan login dengan \"::1\"'),
(14, '5', 'siswa', '11', '2022-02-22 21:27:06', 'Anda mencetak Kartu Pelajar anda'),
(15, '5', 'guru', '1', '2022-02-22 21:34:26', 'Anda melakukan login dengan \"::1\"'),
(16, '5', 'guru', '1', '2022-02-22 21:34:26', 'Anda melakukan login dengan \"::1\"'),
(17, '5', 'guru', '1', '2022-02-23 10:23:03', 'Anda melakukan login dengan \"::1\"'),
(18, '5', 'guru', '1', '2022-02-23 12:29:26', 'Anda melakukan login dengan \"::1\"'),
(19, '5', 'siswa', '11', '2022-02-23 14:13:27', 'Anda melakukan login dengan \"::1\"'),
(20, '5', 'siswa', '11', '2022-02-23 14:13:31', 'Anda mencetak Kartu Pelajar anda'),
(21, '5', 'siswa', '11', '2022-02-23 14:13:51', 'Anda mencetak Kartu Pelajar anda'),
(22, '5', 'siswa', '11', '2022-02-23 14:14:46', 'Anda mencetak Kartu Pelajar anda'),
(23, '5', 'guru', '1', '2022-02-23 14:15:21', 'Anda melakukan login dengan \"::1\"'),
(24, '5', 'siswa', '11', '2022-02-23 15:18:46', 'Anda melakukan login dengan \"::1\"'),
(25, '5', 'siswa', '11', '2022-02-23 15:18:50', 'Anda mencetak Kartu Pelajar anda'),
(26, '5', 'guru', '1', '2022-02-23 15:20:38', 'Anda melakukan login dengan \"::1\"'),
(27, '5', 'guru', '1', '2022-02-23 15:40:07', 'Anda melakukan login dengan \"::1\"'),
(28, '5', 'siswa', '11', '2022-02-23 17:23:27', 'Anda melakukan login dengan \"::1\"'),
(29, '5', 'siswa', '11', '2022-02-23 17:23:30', 'Anda mencetak Kartu Pelajar anda'),
(30, '5', 'siswa', '11', '2022-02-23 17:23:33', 'Anda mencetak Kartu Pelajar anda'),
(31, '5', 'guru', '1', '2022-02-23 17:27:12', 'Anda melakukan login dengan \"::1\"'),
(32, '5', 'guru', '1', '2022-02-23 19:50:24', 'Anda melakukan login dengan \"::1\"'),
(33, '5', 'guru', '1', '2022-02-24 15:46:59', 'Anda melakukan login dengan \"::1\"'),
(34, '', 'siswa', '11', '2022-03-02 09:56:45', 'Anda melakukan login dengan \"::1\"'),
(35, '', 'guru', '1', '2022-03-02 09:59:59', 'Anda melakukan login dengan \"::1\"'),
(36, '', 'guru', '1', '2022-03-02 11:19:45', 'Anda melakukan login dengan \"::1\"'),
(37, '', 'guru', '1', '2022-03-02 11:36:54', 'Anda melakukan login dengan \"::1\"'),
(38, '', 'guru', '1', '2022-03-04 15:54:15', 'Anda melakukan login dengan \"::1\"'),
(39, '5', 'guru', '1', '2022-03-09 09:40:18', 'Anda melakukan login dengan \"::1\"'),
(40, '5', 'guru', '1', '2022-03-09 09:49:38', 'Anda melakukan login dengan \"::1\"'),
(41, '5', 'guru', '1', '2022-03-09 09:55:00', 'Anda melakukan login dengan \"::1\"'),
(42, '5', 'guru', '1', '2022-03-09 11:00:58', 'Anda melakukan login dengan \"::1\"'),
(43, '', 'siswa', '11', '2022-03-09 11:02:22', 'Anda melakukan login dengan \"::1\"'),
(44, '5', 'guru', '1', '2022-03-09 14:07:52', 'Anda melakukan login dengan \"::1\"'),
(45, '5', 'guru', '1', '2022-03-09 14:23:43', 'Anda melakukan login dengan \"::1\"'),
(46, '5', 'guru', '1', '2022-03-09 15:10:15', 'Anda melakukan login dengan \"::1\"'),
(47, '', 'siswa', '11', '2022-03-09 15:10:39', 'Anda melakukan login dengan \"::1\"'),
(48, '5', 'guru', '1', '2022-03-09 15:58:41', 'Anda melakukan login dengan \"::1\"'),
(49, '5', 'guru', '1', '2022-03-10 10:42:46', 'Anda melakukan login dengan \"::1\"'),
(50, '5', 'guru', '1', '2022-03-10 11:43:13', 'Anda melakukan login dengan \"::1\"'),
(51, '5', 'guru', '1', '2022-03-10 11:43:20', 'Anda melakukan login dengan \"::1\"'),
(52, '5', 'guru', '1', '2022-03-10 11:43:30', 'Anda melakukan login dengan \"::1\"'),
(53, '5', 'guru', '1', '2022-03-10 11:45:48', 'Anda melakukan login dengan \"::1\"'),
(54, '5', 'guru', '1', '2022-03-10 11:46:09', 'Anda melakukan login dengan \"::1\"'),
(55, '5', 'guru', '1', '2022-03-10 14:57:15', 'Anda melakukan login dengan \"::1\"'),
(56, '5', 'guru', '1', '2022-03-10 15:52:03', 'Anda melakukan login dengan \"::1\"'),
(57, '5', 'guru', '1', '2022-03-10 16:38:46', 'Anda melakukan login dengan \"::1\"'),
(58, '', 'siswa', '11', '2022-03-11 11:34:57', 'Anda melakukan login dengan \"::1\"'),
(59, '', 'siswa', '11', '2022-03-14 15:16:01', 'Anda melakukan login dengan \"::1\"'),
(60, '5', 'guru', '1', '2022-03-14 15:18:18', 'Anda melakukan login dengan \"::1\"'),
(61, '', 'siswa', '11', '2022-03-14 15:18:45', 'Anda melakukan login dengan \"::1\"'),
(62, '5', 'guru', '1', '2022-03-14 15:56:24', 'Anda melakukan login dengan \"::1\"'),
(63, '', 'siswa', '11', '2022-03-21 16:07:47', 'Anda melakukan login dengan \"::1\"'),
(64, '5', 'guru', '1', '2022-03-22 11:09:37', 'Anda melakukan login dengan \"::1\"'),
(65, '5', 'guru', '1', '2022-03-25 11:53:07', 'Anda melakukan login dengan \"::1\"'),
(66, '5', 'guru', '1', '2022-04-04 15:28:31', 'Anda melakukan login dengan \"::1\"'),
(67, '', 'siswa', '19', '2022-04-04 21:48:00', 'Anda melakukan login dengan \"::1\"'),
(68, '', 'siswa', NULL, '2022-04-04 21:57:45', 'Anda merubah data Profile'),
(69, '', 'siswa', NULL, '2022-04-04 21:58:38', 'Anda merubah data Profile'),
(70, '5', 'guru', '1', '2022-04-05 13:45:51', 'Anda melakukan login dengan \"::1\"'),
(71, '', 'siswa', '11', '2022-04-05 15:03:12', 'Anda melakukan login dengan \"::1\"'),
(72, '5', 'guru', '1', '2022-04-05 15:07:56', 'Anda melakukan login dengan \"::1\"'),
(73, '5', 'guru', '1', '2022-04-08 09:28:40', 'Anda melakukan login dengan \"103.119.140.138\"'),
(74, '5', 'guru', '1', '2022-04-08 13:03:17', 'Anda melakukan login dengan \"103.119.140.138\"'),
(75, '5', 'guru', '1', '2022-04-08 13:10:19', 'Anda melakukan login dengan \"103.119.140.138\"'),
(76, '5', 'guru', '1', '2022-04-08 13:17:21', 'Anda melakukan login dengan \"103.119.140.138\"'),
(77, '5', 'guru', '1', '2022-04-08 14:33:16', 'Anda melakukan login dengan \"103.119.140.138\"'),
(78, '5', 'guru', '1', '2022-04-08 15:06:27', 'Anda melakukan login dengan \"103.119.140.138\"'),
(79, '5', 'guru', '1', '2022-04-08 15:24:34', 'Anda melakukan login dengan \"103.119.140.138\"'),
(80, '5', 'guru', '1', '2022-04-08 20:39:41', 'Anda melakukan login dengan \"103.208.205.90\"'),
(81, '', 'siswa', '11', '2022-04-10 01:06:02', 'Anda melakukan login dengan \"103.208.205.90\"'),
(82, '', 'siswa', '11', '2022-04-10 01:59:38', 'Anda melakukan login dengan \"103.208.205.90\"'),
(83, '', 'siswa', '11', '2022-04-10 09:24:25', 'Anda melakukan login dengan \"103.208.205.90\"'),
(84, '', 'siswa', '11', '2022-04-10 10:24:36', 'Anda melakukan login dengan \"103.208.205.90\"'),
(85, '5', 'guru', '1', '2022-04-11 11:27:20', 'Anda melakukan login dengan \"36.69.82.37\"'),
(86, '5', 'guru', '1', '2022-04-11 14:18:47', 'Anda melakukan login dengan \"103.119.140.130\"'),
(87, '', 'siswa', '13', '2022-04-11 14:18:58', 'Anda melakukan login dengan \"103.119.140.130\"'),
(88, '5', 'guru', '1', '2022-04-11 14:21:37', 'Anda melakukan login dengan \"103.119.140.130\"'),
(89, '5', 'guru', '1', '2022-04-11 14:28:34', 'Anda melakukan login dengan \"103.119.140.130\"'),
(90, '5', 'guru', '1', '2022-04-12 07:42:04', 'Anda melakukan login dengan \"103.82.15.129\"'),
(91, '5', 'guru', '1', '2022-04-12 09:54:08', 'Anda melakukan login dengan \"103.119.141.200\"'),
(92, '', 'siswa', '11', '2022-04-12 10:00:23', 'Anda melakukan login dengan \"103.119.141.200\"'),
(93, '5', 'guru', '1', '2022-04-12 10:11:17', 'Anda melakukan login dengan \"103.119.141.200\"'),
(94, '5', 'guru', '1', '2022-04-12 13:54:05', 'Anda melakukan login dengan \"103.119.141.200\"'),
(95, '5', 'guru', '1', '2022-04-13 14:29:58', 'Anda melakukan login dengan \"103.119.141.200\"'),
(96, '5', 'guru', '1', '2022-04-17 21:01:50', 'Anda melakukan login dengan \"116.206.28.4\"'),
(97, '5', 'guru', '1', '2022-04-17 22:57:05', 'Anda melakukan login dengan \"103.82.15.129\"'),
(98, '5', 'guru', '1', '2022-04-17 22:57:37', 'Anda melakukan login dengan \"103.82.15.129\"'),
(99, '5', 'guru', '1', '2022-04-18 11:58:35', 'Anda melakukan login dengan \"103.119.141.124\"'),
(100, '5', 'guru', '1', '2022-04-18 14:12:55', 'Anda melakukan login dengan \"103.119.141.124\"'),
(101, '5', 'guru', '1', '2022-04-20 09:46:52', 'Anda melakukan login dengan \"103.208.205.90\"'),
(102, '', 'siswa', '11', '2022-04-20 11:27:52', 'Anda melakukan login dengan \"103.119.141.124\"'),
(103, '5', 'guru', '1', '2022-04-20 13:23:06', 'Anda melakukan login dengan \"103.119.141.124\"'),
(104, '', 'siswa', '11', '2022-04-21 10:05:55', 'Anda melakukan login dengan \"103.119.141.124\"'),
(105, '5', 'guru', '1', '2022-04-21 10:53:20', 'Anda melakukan login dengan \"103.119.141.124\"'),
(106, '5', 'guru', '1', '2022-04-21 11:41:29', 'Anda melakukan login dengan \"103.119.141.124\"'),
(107, '', 'siswa', '11', '2022-04-21 12:45:06', 'Anda melakukan login dengan \"103.119.141.124\"'),
(108, '', 'siswa', '11', '2022-04-21 13:34:28', 'Anda melakukan login dengan \"103.119.141.124\"'),
(109, '', 'siswa', '11', '2022-04-21 13:34:43', 'Anda melakukan login dengan \"103.119.141.124\"'),
(110, '', 'siswa', '124', '2022-04-21 13:58:41', 'Anda melakukan login dengan \"103.119.141.124\"'),
(111, '5', 'guru', '1', '2022-04-21 14:16:41', 'Anda melakukan login dengan \"103.119.141.124\"'),
(112, '5', 'guru', '1', '2022-04-21 16:04:12', 'Anda melakukan login dengan \"103.119.141.124\"'),
(113, '5', 'guru', '1', '2022-04-21 16:06:44', 'Anda melakukan login dengan \"103.119.141.124\"'),
(114, '5', 'guru', '1', '2022-04-21 16:07:33', 'Anda melakukan login dengan \"103.119.141.124\"'),
(115, '5', 'guru', '1', '2022-04-21 23:29:41', 'Anda melakukan login dengan \"103.208.205.90\"'),
(116, '5', 'guru', '1', '2022-04-22 09:56:23', 'Anda melakukan login dengan \"103.119.141.124\"'),
(117, '5', 'guru', '1', '2022-04-22 10:24:30', 'Anda melakukan login dengan \"103.119.141.124\"'),
(118, '5', 'guru', '1', '2022-04-25 10:47:33', 'Anda melakukan login dengan \"103.119.140.245\"'),
(119, '', 'siswa', '11', '2022-04-25 10:55:32', 'Anda melakukan login dengan \"103.119.140.245\"'),
(120, '5', 'guru', '1', '2022-04-25 10:56:08', 'Anda melakukan login dengan \"103.119.140.245\"'),
(121, '5', 'guru', '1', '2022-04-25 11:05:39', 'Anda melakukan login dengan \"103.119.140.245\"'),
(122, '5', 'guru', '1', '2022-04-25 11:07:56', 'Anda melakukan login dengan \"103.119.140.245\"'),
(123, '', 'siswa', '11', '2022-04-25 11:10:14', 'Anda melakukan login dengan \"103.119.140.245\"'),
(124, '5', 'guru', '1', '2022-04-25 11:10:26', 'Anda melakukan login dengan \"103.119.140.245\"'),
(125, '5', 'guru', '1', '2022-04-25 11:15:57', 'Anda melakukan login dengan \"103.119.140.245\"'),
(126, '', 'siswa', '11', '2022-04-25 15:47:04', 'Anda melakukan login dengan \"103.119.140.245\"'),
(127, '5', 'guru', '1', '2022-04-25 15:47:34', 'Anda melakukan login dengan \"103.119.140.245\"'),
(128, '5', 'guru', '1', '2022-04-26 09:08:53', 'Anda melakukan login dengan \"103.119.140.245\"'),
(129, '5', 'guru', '1', '2022-04-27 11:15:15', 'Anda melakukan login dengan \"103.119.140.245\"'),
(130, '5', 'guru', '1', '2022-04-27 12:31:14', 'Anda melakukan login dengan \"103.119.140.245\"'),
(131, '5', 'guru', '1', '2022-05-09 00:41:43', 'Anda melakukan login dengan \"110.136.9.128\"'),
(132, '5', 'guru', '1', '2022-05-09 08:13:16', 'Anda melakukan login dengan \"110.136.9.128\"'),
(133, '5', 'guru', '1', '2022-05-09 10:50:51', 'Anda melakukan login dengan \"110.136.9.128\"'),
(134, '5', 'guru', '1', '2022-05-09 16:13:54', 'Anda melakukan login dengan \"110.136.9.128\"'),
(135, '5', 'guru', '1', '2022-05-09 16:21:55', 'Anda melakukan login dengan \"103.208.205.90\"'),
(136, '5', 'guru', '1', '2022-05-09 22:32:29', 'Anda melakukan login dengan \"110.136.9.128\"'),
(137, '5', 'guru', '1', '2022-05-10 10:47:39', 'Anda melakukan login dengan \"110.136.9.128\"'),
(138, '5', 'guru', '1', '2022-05-11 11:44:33', 'Anda melakukan login dengan \"110.136.9.128\"'),
(139, '5', 'guru', '1', '2022-05-12 12:15:13', 'Anda melakukan login dengan \"110.136.9.128\"'),
(140, '5', 'guru', '1', '2022-05-12 12:29:10', 'Anda melakukan login dengan \"110.136.9.128\"'),
(141, '5', 'guru', '1', '2022-05-12 15:25:41', 'Anda melakukan login dengan \"103.208.205.90\"'),
(142, '5', 'guru', '1', '2022-05-12 15:43:51', 'Anda melakukan login dengan \"110.136.9.128\"'),
(143, '5', 'guru', '1', '2022-05-12 15:45:32', 'Anda melakukan login dengan \"110.136.9.128\"'),
(144, '5', 'guru', '1', '2022-05-12 15:46:38', 'Anda melakukan login dengan \"110.136.9.128\"'),
(145, '', 'siswa', '11', '2022-05-12 15:56:10', 'Anda melakukan login dengan \"103.208.205.90\"'),
(146, '5', 'guru', '1', '2022-05-12 15:56:24', 'Anda melakukan login dengan \"103.208.205.90\"'),
(147, '5', 'guru', '1', '2022-05-13 14:00:35', 'Anda melakukan login dengan \"110.136.9.128\"'),
(148, '5', 'guru', '1', '2022-05-14 04:37:29', 'Anda melakukan login dengan \"110.136.9.128\"'),
(149, '5', 'guru', '1', '2022-05-16 03:57:19', 'Anda melakukan login dengan \"110.137.154.125\"'),
(150, '5', 'guru', '1', '2022-05-16 04:43:16', 'Anda melakukan login dengan \"110.137.154.125\"'),
(151, '5', 'guru', '1', '2022-05-16 16:33:46', 'Anda melakukan login dengan \"110.137.154.125\"'),
(152, '5', 'guru', '1', '2022-05-17 06:40:24', 'Anda melakukan login dengan \"103.208.205.90\"'),
(153, '', 'siswa', '11', '2022-05-17 06:51:05', 'Anda melakukan login dengan \"103.208.205.90\"'),
(154, '5', 'guru', '1', '2022-05-17 07:11:22', 'Anda melakukan login dengan \"103.208.205.90\"'),
(155, '5', 'guru', '1', '2022-05-17 13:55:15', 'Anda melakukan login dengan \"110.137.154.125\"'),
(156, '5', 'guru', '1', '2022-05-17 15:21:14', 'Anda melakukan login dengan \"110.137.194.61\"'),
(157, '5', 'guru', '1', '2022-05-19 09:58:26', 'Anda melakukan login dengan \"125.165.146.142\"'),
(158, '', 'siswa', '11', '2022-05-23 10:20:57', 'Anda melakukan login dengan \"180.252.170.182\"'),
(159, '5', 'guru', '1', '2022-05-23 10:23:24', 'Anda melakukan login dengan \"180.252.170.182\"'),
(160, '5', 'guru', '1', '2022-05-23 11:20:31', 'Anda melakukan login dengan \"180.252.170.182\"'),
(161, '5', 'guru', '1', '2022-05-23 14:51:01', 'Anda melakukan login dengan \"180.252.170.182\"'),
(162, '5', 'guru', '1', '2022-05-23 15:15:09', 'Anda melakukan login dengan \"180.252.170.182\"'),
(163, '5', 'guru', '1', '2022-05-23 15:21:58', 'Anda melakukan login dengan \"180.252.170.182\"'),
(164, '5', 'guru', '1', '2022-05-23 15:57:43', 'Anda melakukan login dengan \"180.252.170.182\"'),
(165, '5', 'guru', '1', '2022-05-23 16:03:52', 'Anda melakukan login dengan \"180.252.170.182\"'),
(166, '5', 'guru', '1', '2022-05-24 09:58:21', 'Anda melakukan login dengan \"180.252.164.162\"'),
(167, '5', 'guru', '1', '2022-05-24 11:09:35', 'Anda melakukan login dengan \"180.252.164.162\"'),
(168, '5', 'guru', '1', '2022-05-24 14:57:57', 'Anda melakukan login dengan \"180.252.164.162\"'),
(169, '5', 'guru', '1', '2022-05-25 10:42:33', 'Anda melakukan login dengan \"180.252.162.178\"'),
(170, '5', 'guru', '1', '2022-05-25 11:14:28', 'Anda melakukan login dengan \"180.252.162.178\"'),
(171, '5', 'guru', '1', '2022-05-25 11:15:04', 'Anda melakukan login dengan \"180.252.162.178\"'),
(172, '5', 'guru', '1', '2022-05-25 13:59:43', 'Anda melakukan login dengan \"180.252.162.178\"'),
(173, '5', 'guru', '1', '2022-05-25 16:45:51', 'Anda melakukan login dengan \"180.252.162.178\"'),
(174, '5', 'guru', '1', '2022-05-25 16:46:03', 'Anda melakukan login dengan \"180.252.162.178\"'),
(175, '5', 'guru', '1', '2022-05-27 09:33:51', 'Anda melakukan login dengan \"180.252.167.162\"'),
(176, '5', 'guru', '1', '2022-05-27 15:04:33', 'Anda melakukan login dengan \"180.252.167.162\"'),
(177, '5', 'guru', '1', '2022-05-27 16:36:42', 'Anda melakukan login dengan \"180.252.167.162\"'),
(178, '5', 'guru', '1', '2022-05-29 23:57:58', 'Anda melakukan login dengan \"180.214.233.74\"'),
(179, '5', 'guru', '1', '2022-05-30 06:34:57', 'Anda melakukan login dengan \"180.214.232.93\"'),
(180, '5', 'guru', '1', '2022-05-30 10:22:54', 'Anda melakukan login dengan \"125.160.19.100\"'),
(181, '5', 'guru', '1', '2022-05-30 13:20:57', 'Anda melakukan login dengan \"125.160.19.100\"'),
(182, '5', 'guru', '1', '2022-05-30 13:25:44', 'Anda melakukan login dengan \"125.160.19.100\"'),
(183, '', 'siswa', '11', '2022-05-30 13:32:34', 'Anda melakukan login dengan \"125.160.19.100\"'),
(184, '5', 'guru', '1', '2022-05-30 14:56:39', 'Anda melakukan login dengan \"125.160.19.100\"'),
(185, '5', 'guru', '1', '2022-05-30 15:00:02', 'Anda melakukan login dengan \"125.160.19.100\"'),
(186, '', 'siswa', '11', '2022-05-30 15:02:53', 'Anda melakukan login dengan \"125.160.19.100\"'),
(187, '5', 'guru', '1', '2022-05-30 15:28:02', 'Anda melakukan login dengan \"125.160.19.100\"'),
(188, '5', 'guru', '1', '2022-05-30 15:35:36', 'Anda melakukan login dengan \"125.160.19.100\"'),
(189, '', 'siswa', '11', '2022-05-30 15:37:04', 'Anda melakukan login dengan \"125.160.19.100\"'),
(190, '', 'siswa', '11', '2022-05-30 15:37:19', 'Anda mencetak Kartu Pelajar anda'),
(191, '', 'siswa', '140', '2022-05-30 15:37:30', 'Anda melakukan login dengan \"125.160.19.100\"'),
(192, '', 'siswa', '11', '2022-05-30 17:05:28', 'Anda melakukan login dengan \"125.160.19.100\"'),
(193, '5', 'guru', '1', '2022-05-30 17:11:56', 'Anda melakukan login dengan \"125.160.19.100\"'),
(194, '', 'siswa', '11', '2022-05-30 17:15:33', 'Anda melakukan login dengan \"125.160.19.100\"'),
(195, '', 'siswa', '11', '2022-05-30 17:15:48', 'Anda mencetak Kartu Pelajar anda'),
(196, '5', 'guru', '1', '2022-05-31 10:32:50', 'Anda melakukan login dengan \"125.160.19.100\"'),
(197, '5', 'guru', '1', '2022-05-31 10:38:34', 'Anda melakukan login dengan \"125.160.19.100\"'),
(198, '5', 'guru', '1', '2022-05-31 10:53:03', 'Anda melakukan login dengan \"125.160.19.100\"'),
(199, '5', 'guru', '1', '2022-05-31 10:56:11', 'Anda melakukan login dengan \"125.160.19.100\"'),
(200, '5', 'guru', '1', '2022-05-31 11:04:28', 'Anda melakukan login dengan \"125.160.19.100\"'),
(201, '5', 'guru', '1', '2022-05-31 11:05:47', 'Anda melakukan login dengan \"125.160.19.100\"'),
(202, '5', 'guru', '1', '2022-05-31 11:09:42', 'Anda melakukan login dengan \"125.160.19.100\"'),
(203, '', 'siswa', '11', '2022-05-31 11:18:46', 'Anda melakukan login dengan \"125.160.19.100\"'),
(204, '5', 'guru', '1', '2022-05-31 11:39:59', 'Anda melakukan login dengan \"125.160.19.100\"'),
(205, '5', 'guru', '1', '2022-05-31 11:44:26', 'Anda melakukan login dengan \"125.160.19.100\"'),
(206, '', 'siswa', '11', '2022-05-31 14:02:39', 'Anda melakukan login dengan \"125.160.19.100\"'),
(207, '5', 'guru', '1', '2022-05-31 14:03:45', 'Anda melakukan login dengan \"125.160.19.100\"'),
(208, '', 'siswa', '11', '2022-05-31 14:08:11', 'Anda melakukan login dengan \"125.160.19.100\"'),
(209, '', 'siswa', '11', '2022-05-31 14:09:44', 'Anda mencetak Kartu Pelajar anda'),
(210, '5', 'guru', '1', '2022-05-31 14:33:21', 'Anda melakukan login dengan \"125.160.19.100\"'),
(211, '5', 'guru', '1', '2022-05-31 16:00:58', 'Anda melakukan login dengan \"125.160.19.100\"'),
(212, '5', 'guru', '1', '2022-05-31 17:02:59', 'Anda melakukan login dengan \"125.160.19.100\"'),
(213, '5', 'guru', '1', '2022-05-31 19:12:55', 'Anda melakukan login dengan \"125.160.19.100\"'),
(214, '5', 'guru', '1', '2022-06-01 13:24:30', 'Anda melakukan login dengan \"103.208.205.90\"'),
(215, '5', 'guru', '1', '2022-06-01 17:36:44', 'Anda melakukan login dengan \"180.252.171.39\"'),
(216, '5', 'guru', '1', '2022-06-02 13:13:26', 'Anda melakukan login dengan \"180.252.171.39\"'),
(217, '5', 'guru', '1', '2022-06-02 13:13:27', 'Anda melakukan login dengan \"180.252.171.39\"'),
(218, '5', 'guru', '1', '2022-06-02 13:33:21', 'Anda melakukan login dengan \"180.252.171.39\"'),
(219, '', 'siswa', '11', '2022-06-02 14:15:42', 'Anda melakukan login dengan \"180.252.171.39\"'),
(220, '', 'siswa', '11', '2022-06-02 15:20:02', 'Anda melakukan login dengan \"180.252.171.39\"'),
(221, '5', 'guru', '1', '2022-06-02 15:23:12', 'Anda melakukan login dengan \"180.252.171.39\"'),
(222, '5', 'guru', '1', '2022-06-02 16:09:04', 'Anda melakukan login dengan \"180.252.171.39\"'),
(223, '5', 'guru', '1', '2022-06-06 11:02:20', 'Anda melakukan login dengan \"36.69.170.29\"'),
(224, '5', 'guru', '1', '2022-06-13 11:36:06', 'Anda melakukan login dengan \"180.252.165.162\"'),
(225, '5', 'guru', '1', '2022-06-13 11:46:44', 'Anda melakukan login dengan \"180.252.165.162\"');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_payement_method`
--

CREATE TABLE IF NOT EXISTS `web_payement_method` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `sistem` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `rate` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `minimum` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `note` text COLLATE utf8_swedish_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `web_payement_method`
--

INSERT INTO `web_payement_method` (`id`, `gambar`, `sistem`, `name`, `nama`, `rate`, `minimum`, `note`, `status`) VALUES
(1, 'qris-tb.jpg', 'QRscan', 'QRIS', 'GOJEK | DANA | OVO | TCASH - An. Tempatbeli', '0.98', '50000', 'ID1020038171911', 'Not Active'),
(2, 'ovo-tb.jpg', 'Emoney', 'OVO', 'OVO Qr - Reza Lesmana Putra', '1', '50000', '081280462650', 'Not Active'),
(3, 'qr-dana.jpg', 'Credit', 'VC', 'Credit Card (Visa / Master)', '1', '50000', '', 'Active'),
(4, 'qr-dana.jpg', 'Bank', 'BK', 'BCA KlikPay', '1', '50000', '', 'Not Active'),
(5, 'qr-dana.jpg', 'Bank', 'M1', 'Mandiri Virtual Account', '1', '50000', '', 'Active'),
(6, 'qr-dana.jpg', 'Bank', 'BT', 'Permata Bank Virtual Account', '1', '50000', '', 'Active'),
(7, 'qr-dana.jpg', 'Bank', 'B1', 'CIMB Niaga Virtual Account', '1', '50000', '', 'Active'),
(8, 'qr-dana.jpg', 'Bank', 'A1', 'ATM Bersama', '1', '50000', '', 'Active'),
(9, 'qr-dana.jpg', 'Bank', 'I1', 'BNI Virtual Account', '1', '50000', '', 'Active'),
(10, 'qr-dana.jpg', 'Bank', 'VA', 'Maybank Virtual Account', '1', '50000', '', 'Active'),
(11, 'qr-dana.jpg', 'Emoney', 'OV', 'OVO Apps', '1', '50000', '', 'Active'),
(12, 'qr-dana.jpg', 'Retail', 'FT', 'Alfamart | POS Indonesia | Pegadaian', '1', '50000', '', 'Active'),
(13, 'qr-dana.jpg', 'Paylater', 'DN', 'Indodana Paylater', '0.98', '50000', '', 'Active'),
(14, 'qr-dana.jpg', 'QRscan', 'SP', 'QRIS via ShopeePay - OVO | GOPAY | DANA | LinkAja | Mandiripay', '0.98', '100000', '', 'Active'),
(15, 'qr-dana.jpg', 'Emoney', 'SA', 'ShopeePay Applink', '1', '100000', '', 'Active'),
(16, 'qr-dana.jpg', 'Emoney', 'LA', 'LINK Aja', '1', '50000', '', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_sekolah`
--

CREATE TABLE IF NOT EXISTS `web_sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(11) NOT NULL,
  `nama_sekolah` varchar(100) DEFAULT NULL,
  `kepsek` varchar(100) NOT NULL,
  `npsn` varchar(50) DEFAULT NULL,
  `nss` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kodepos` varchar(15) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `ttd` varchar(100) NOT NULL,
  `stampel` varchar(100) NOT NULL,
  `design` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `web_sekolah`
--

INSERT INTO `web_sekolah` (`id`, `unit`, `nama_sekolah`, `kepsek`, `npsn`, `nss`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kodepos`, `no_telepon`, `email`, `logo`, `ttd`, `stampel`, `design`) VALUES
(1, '1', 'SD ProSchool', 'Sutan Daulay', '20108989', '83960337', 'Jl. TB Simatupang, Menara 165, ESQ Tower No 1', 'Cilandak Timur', 'Pasar Minggu', 'Jakarta Selatan', 'DKI Jakarta', '12560', '082289663344', 'tk@proschool.id', 'twh.png', 'Kepsek_copy.png', 'STEMPEL-SMK.png', 'birunom.png'),
(2, '2', 'SMP ProSchool', 'Panji Nugraha', '20108997', '83960337', 'Jl. TB Simatupang, Menara 165, ESQ Tower No 1', 'Cilandak Timur', 'Pasar Minggu', 'Jakarta Selatan', 'DKI Jakarta', '12560', '082289663344', 'sd@proschool.id', 'twh.png', 'Kepsek_copy.png', 'STEMPEL-SMK.png', 'birunom.png'),
(3, '3', 'SMP ProSchool', 'Damara', '20108990', '83960337', 'Jl. TB Simatupang, Menara 165, ESQ Tower No 1', 'Cilandak Timur', 'Pasar Minggu', 'Jakarta Selatan', 'DKI Jakarta', '12560', '082289663344', 'smp@proschool.id', 'twh.png', 'Kepsek_copy.png', 'STEMPEL-SMK.png', 'birunom.png'),
(5, '5', 'SMK ProSchool', 'Reza Lesmana', '20108813', '83960337', 'Jl. TB Simatupang, Menara 165, ESQ Tower No 1', 'Cilandak Timur', 'Pasar Minggu', 'Jakarta Selatan', 'DKI Jakarta', '12560', '082289663344', 'smk@proschool.id', 'twh.png', 'Kepsek_copy.png', 'STEMPEL-SMK.png', 'birunom.png'),
(6, '6', 'SMA ProSchool', 'Haris Indra', '21312111', '83960337', NULL, NULL, NULL, NULL, NULL, NULL, '082289663344', 'sma@proschool.id', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_setting`
--

CREATE TABLE IF NOT EXISTS `web_setting` (
  `id` int(10) NOT NULL,
  `url` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tahun_ajaran` varchar(100) NOT NULL,
  `default_print` varchar(100) NOT NULL,
  `maintenance` enum('tidak','iya') NOT NULL,
  `whatsapp_group` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `web_setting`
--

INSERT INTO `web_setting` (`id`, `url`, `title`, `logo`, `description`, `email`, `phone`, `alamat`, `tahun_ajaran`, `default_print`, `maintenance`, `whatsapp_group`, `whatsapp`) VALUES
(1, 'https://www.proschool.id/', 'PROschool by DesaTech', 'logo.png', 'Elearning by ProSchool for a Smart Learning for Student in New Era! ', 'admin@proschool.id', '', ' Jl. TB Simatupang, Menara 165, ESQ Tower No 1', '2021/2022-2', 'A4', 'tidak', '#', '6281280462650');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_surat`
--

CREATE TABLE IF NOT EXISTS `web_surat` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `arti` varchar(100) NOT NULL,
  `asma` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `audio` varchar(100) NOT NULL,
  `ayat` varchar(10) NOT NULL,
  `nomer` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `web_surat`
--

INSERT INTO `web_surat` (`id_surat`, `arti`, `asma`, `nama`, `audio`, `ayat`, `nomer`, `agama`) VALUES
(1, 'Pembukaan', 'الفاتحة', 'Al Fatihah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/001AlFaatihah.mp3', '7', '1', 'ISLAM'),
(2, 'Sapi Betina', 'البقرة', 'Al Baqarah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/002AlBaqarah.mp3', '286', '2', 'ISLAM'),
(3, 'Keluarga Imran', 'آل عمران', 'Ali Imran', 'https://ia802609.us.archive.org/13/items/quraninindonesia/003AliImran.mp3', '200', '3', 'ISLAM'),
(4, 'Wanita', 'النساء', 'An Nisaa', 'https://ia802609.us.archive.org/13/items/quraninindonesia/004AnNisaa.mp3', '176', '4', 'ISLAM'),
(5, 'Hidangan', 'المائدة', 'Al Maidah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/005AlMaaidah.mp3', '120', '5', 'ISLAM'),
(6, 'Binatang Ternak', 'الأنعام', 'Al An039am', 'https://ia802609.us.archive.org/13/items/quraninindonesia/006AlAnaam.mp3', '165', '6', 'ISLAM'),
(7, 'Tempat Tertinggi', 'الأعراف', 'Al A039raf', 'https://ia802609.us.archive.org/13/items/quraninindonesia/007AlAaraaf.mp3', '206', '7', 'ISLAM'),
(8, 'Harta Rampasan Perang', 'الأنفال', 'Al Anfaal', 'https://ia802609.us.archive.org/13/items/quraninindonesia/008AlAnfaal.mp3', '75', '8', 'ISLAM'),
(9, 'Pengampunan', 'التوبة', 'At Taubah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/009AtTaubah.mp3', '129', '9', 'ISLAM'),
(10, 'Yunus', 'يونس', 'Yunus', 'https://ia802609.us.archive.org/13/items/quraninindonesia/010Yunus.mp3', '109', '10', 'ISLAM'),
(11, 'Hud', 'هود', 'Huud', 'https://ia802609.us.archive.org/13/items/quraninindonesia/011Huud.mp3', '123', '11', 'ISLAM'),
(12, 'Yusuf', 'يوسف', 'Yusuf', 'https://ia802609.us.archive.org/13/items/quraninindonesia/012Yusuf.mp3', '111', '12', 'ISLAM'),
(13, 'Guruh', 'الرعد', 'Ar Ra039du', 'https://ia802609.us.archive.org/13/items/quraninindonesia/013ArRaad.mp3', '43', '13', 'ISLAM'),
(14, 'Ibrahim', 'ابراهيم', 'Ibrahim', 'https://ia802609.us.archive.org/13/items/quraninindonesia/014Ibrahim.mp3', '52', '14', 'ISLAM'),
(15, 'Negeri Kaum Samud', 'الحجر', 'Al Hijr', 'https://ia802609.us.archive.org/13/items/quraninindonesia/015AlHijr.mp3', '99', '15', 'ISLAM'),
(16, 'Lebah', 'النحل', 'An Nahl', 'https://ia802609.us.archive.org/13/items/quraninindonesia/016AnNahl.mp3', '128', '16', 'ISLAM'),
(17, 'Keturunan Isra’il', 'الإسراء', 'Al Israa039', 'https://ia802609.us.archive.org/13/items/quraninindonesia/017AlIsraa.mp3', '111', '17', 'ISLAM'),
(18, 'Gua', 'الكهف', 'Al Kahfi', 'https://ia802609.us.archive.org/13/items/quraninindonesia/018AlKahfi.mp3', '110', '18', 'ISLAM'),
(19, 'Maryam', 'مريم', 'Maryam', 'https://ia802609.us.archive.org/13/items/quraninindonesia/019Maryam.mp3', '98', '19', 'ISLAM'),
(20, 'TaHa', 'طه', 'Thaahaa', 'https://ia802609.us.archive.org/13/items/quraninindonesia/020Thaahaa2.mp3', '135', '20', 'ISLAM'),
(21, 'Nabi-Nabi', 'الأنبياء', 'Al Anbiyaa', 'https://ia802609.us.archive.org/13/items/quraninindonesia/021AlAnbiyaa.mp3', '112', '21', 'ISLAM'),
(22, 'Haji', 'الحج', 'Al Hajj', 'https://ia802609.us.archive.org/13/items/quraninindonesia/022AlHajj.mp3', '78', '22', 'ISLAM'),
(23, 'Orang-Orang yang Beriman', 'المؤمنون', 'Al Mu039minun', 'https://ia802609.us.archive.org/13/items/quraninindonesia/023AlMuminuun.mp3', '118', '23', 'ISLAM'),
(24, 'Cahaya', 'النور', 'An Nuur', 'https://ia802609.us.archive.org/13/items/quraninindonesia/024AnNuur.mp3', '64', '24', 'ISLAM'),
(25, 'Pembeda', 'الفرقان', 'Al Furqaan', 'https://ia802609.us.archive.org/13/items/quraninindonesia/025AlFurqaan.mp3', '77', '25', 'ISLAM'),
(26, 'Para Penyair', 'الشعراء', 'Asy Syu039ara', 'https://ia802609.us.archive.org/13/items/quraninindonesia/026AsySyuaaraa.mp3', '227', '26', 'ISLAM'),
(27, 'Semut', 'النمل', 'An Naml', 'https://ia802609.us.archive.org/13/items/quraninindonesia/027AnNaml.mp3', '93', '27', 'ISLAM'),
(28, 'Cerita-Cerita', 'القصص', 'Al Qashash', 'https://ia802609.us.archive.org/13/items/quraninindonesia/028AlQashash.mp3', '88', '28', 'ISLAM'),
(29, 'Laba-Laba', 'العنكبوت', 'Al 039Ankabut', 'https://ia802609.us.archive.org/13/items/quraninindonesia/029AlAnkabuut.mp3', '69', '29', 'ISLAM'),
(30, 'Bangsa Romawi', 'الروم', 'Ar Ruum', 'https://ia802609.us.archive.org/13/items/quraninindonesia/030ArRuum.mp3', '60', '30', 'ISLAM'),
(31, 'Luqman', 'لقمان', 'Luqman', 'https://ia802609.us.archive.org/13/items/quraninindonesia/031Luqman.mp3', '34', '31', 'ISLAM'),
(32, 'Sujud', 'السجدة', 'As Sajdah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/032AsSajdah.mp3', '30', '32', 'ISLAM'),
(33, 'Golongan yang Bersekutu', 'الأحزاب', 'Al Ahzab', 'https://ia802609.us.archive.org/13/items/quraninindonesia/033AlAhzab.mp3', '73', '33', 'ISLAM'),
(34, 'Kaum Saba’', 'سبإ', 'Saba039', 'https://ia802609.us.archive.org/13/items/quraninindonesia/034Sabaa.mp3', '54', '34', 'ISLAM'),
(35, 'Pencipta', 'فاطر', 'Faathir', 'https://ia802609.us.archive.org/13/items/quraninindonesia/035Faathir.mp3', '45', '35', 'ISLAM'),
(36, 'YaSin', 'يس', 'Yaa Siin', 'https://ia802609.us.archive.org/13/items/quraninindonesia/036Yaasiin.mp3', '83', '36', 'ISLAM'),
(37, 'Yang Bersaf-saf', 'الصافات', 'Ash Shaaffat', 'https://ia802609.us.archive.org/13/items/quraninindonesia/037AshShaaffaat.mp3', '182', '37', 'ISLAM'),
(38, 'Sad', 'ص', 'Shaad', 'https://ia802609.us.archive.org/13/items/quraninindonesia/038Shaad.mp3', '88', '38', 'ISLAM'),
(39, 'Rombongan-Rombongan', 'الزمر', 'Az Zumar', 'https://ia802609.us.archive.org/13/items/quraninindonesia/039AzZumar.mp3', '75', '39', 'ISLAM'),
(40, 'Orang yang Beriman', 'غافر', 'Al Ghaafir', 'https://ia802609.us.archive.org/13/items/quraninindonesia/040AlMuumin.mp3', '85', '40', 'ISLAM'),
(41, 'Ha Mim As-Sajdah', 'فصلت', 'Al Fushilat', 'https://ia802609.us.archive.org/13/items/quraninindonesia/041Fushshilat.mp3', '54', '41', 'ISLAM'),
(42, 'Musyawarah', 'الشورى', 'Asy Syuura', 'https://ia802609.us.archive.org/13/items/quraninindonesia/042AsySyuura.mp3', '53', '42', 'ISLAM'),
(43, 'Perhiasan', 'الزخرف', 'Az Zukhruf', 'https://ia802609.us.archive.org/13/items/quraninindonesia/043AzZukhruf.mp3', '89', '43', 'ISLAM'),
(44, 'Kabut', 'الدخان', 'Ad Dukhaan', 'https://ia802609.us.archive.org/13/items/quraninindonesia/044AdDukhaan.mp3', '59', '44', 'ISLAM'),
(45, 'Yang Berlutut', 'الجاثية', 'Al Jaatsiyah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/045AlJaatsiyah.mp3', '37', '45', 'ISLAM'),
(46, 'Bukit-Bukit Pasir', 'الأحقاف', 'Al Ahqaaf', 'https://ia802609.us.archive.org/13/items/quraninindonesia/046AlAhqaaf.mp3', '35', '46', 'ISLAM'),
(47, 'Nabi Muhammad SAW', 'محمد', 'Muhammad', 'https://ia802609.us.archive.org/13/items/quraninindonesia/047Muhammad.mp3', '38', '47', 'ISLAM'),
(48, 'Kemenangan', 'الفتح', 'Al Fath', 'https://ia802609.us.archive.org/13/items/quraninindonesia/048AlFath.mp3', '29', '48', 'ISLAM'),
(49, 'Kamar-Kamar', 'الحجرات', 'Al Hujuraat', 'https://ia802609.us.archive.org/13/items/quraninindonesia/049AlHujuraat.mp3', '18', '49', 'ISLAM'),
(50, 'Qaf', 'ق', 'Qaaf', 'https://ia802609.us.archive.org/13/items/quraninindonesia/050Qaaf.mp3', '45', '50', 'ISLAM'),
(51, 'Angin yang menerbangkan', 'الذاريات', 'Adz Dzaariyaat', 'https://ia802609.us.archive.org/13/items/quraninindonesia/051AdzDzaariyaat.mp3', '60', '51', 'ISLAM'),
(52, 'Bukit', 'الطور', 'Ath Thuur', 'https://ia802609.us.archive.org/13/items/quraninindonesia/052AthThuur.mp3', '49', '52', 'ISLAM'),
(53, 'Bintang', 'النجم', 'An Najm', 'https://ia802609.us.archive.org/13/items/quraninindonesia/053AnNajm.mp3', '62', '53', 'ISLAM'),
(54, 'Bulan', 'القمر', 'Al Qamar', 'https://ia802609.us.archive.org/13/items/quraninindonesia/054AlQamar.mp3', '55', '54', 'ISLAM'),
(55, 'Yang Maha Pemurah', 'الرحمن', 'Ar Rahmaan', 'https://ia802609.us.archive.org/13/items/quraninindonesia/055ArRahmaan.mp3', '78', '55', 'ISLAM'),
(56, 'Hari Kiamat', 'الواقعة', 'Al Waaqi039ah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/056AlWaqiah.mp3', '96', '56', 'ISLAM'),
(57, 'Besi', 'الحديد', 'Al Hadiid', 'https://ia802609.us.archive.org/13/items/quraninindonesia/057AlHadiid.mp3', '29', '57', 'ISLAM'),
(58, 'Wanita yang Mengajukan Gugatan', 'المجادلة', 'Al Mujaadalah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/058AlMujaadilah.mp3', '22', '58', 'ISLAM'),
(59, 'Pengusiran', 'الحشر', 'Al Hasyr', 'https://ia802609.us.archive.org/13/items/quraninindonesia/059AlHasyr.mp3', '24', '59', 'ISLAM'),
(60, 'Perempuan yang Diuji', 'الممتحنة', 'Al mumtahanah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/060AlMumtahanah.mp3', '13', '60', 'ISLAM'),
(61, 'Barisan', 'الصف', 'Ash Shaff', 'https://ia802609.us.archive.org/13/items/quraninindonesia/061AshShaff.mp3', '14', '61', 'ISLAM'),
(62, 'Hari Jum’at', 'الجمعة', 'Al Jumuah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/062AlJumuah.mp3', '11', '62', 'ISLAM'),
(63, 'Orang-Orang yang Munafik', 'المنافقون', 'Al Munafiqun', 'https://ia802609.us.archive.org/13/items/quraninindonesia/063AlMunaafiquun.mp3', '11', '63', 'ISLAM'),
(64, 'Hari Ditampakkan Segala Kesalahan', 'التغابن', 'Ath Taghabun', 'https://ia802609.us.archive.org/13/items/quraninindonesia/064AtTaghaabun.mp3', '18', '64', 'ISLAM'),
(65, 'Talak', 'الطلاق', 'Ath Thalaaq', 'https://ia802609.us.archive.org/13/items/quraninindonesia/065AthThalaaq.mp3', '12', '65', 'ISLAM'),
(66, 'Mengharamkan', 'التحريم', 'At Tahriim', 'https://ia802609.us.archive.org/13/items/quraninindonesia/066AtTahrim.mp3', '12', '66', 'ISLAM'),
(67, 'Kerajaan', 'الملك', 'Al Mulk', 'https://ia802609.us.archive.org/13/items/quraninindonesia/067AlMulk.mp3', '30', '67', 'ISLAM'),
(68, 'Kalam', 'القلم', 'Al Qalam', 'https://ia802609.us.archive.org/13/items/quraninindonesia/068AlQalam.mp3', '52', '68', 'ISLAM'),
(69, 'Hari Kiamat', 'الحاقة', 'Al Haaqqah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/069AlHaaqqah.mp3', '52', '69', 'ISLAM'),
(70, 'Tempa-Tempat Naik', 'المعارج', 'Al Ma039aarij', 'https://ia802609.us.archive.org/13/items/quraninindonesia/070AlMaaarij.mp3', '44', '70', 'ISLAM'),
(71, 'Nuh', 'نوح', 'Nuh', 'https://ia802609.us.archive.org/13/items/quraninindonesia/071Nuh.mp3', '28', '71', 'ISLAM'),
(72, 'Jin', 'الجن', 'Al Jin', 'https://ia802609.us.archive.org/13/items/quraninindonesia/072AlJin.mp3', '28', '72', 'ISLAM'),
(73, 'Orang-orang yang Berselimut', 'المزمل', 'Al Muzammil', 'https://ia802609.us.archive.org/13/items/quraninindonesia/073AlMuzzammil.mp3', '20', '73', 'ISLAM'),
(74, 'Orang yang berkemul', 'المدثر', 'Al Muddastir', 'https://ia802609.us.archive.org/13/items/quraninindonesia/074AlMuddatstsir.mp3', '56', '74', 'ISLAM'),
(75, 'Hari Kiamat', 'القيامة', 'Al Qiyaamah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/075AlQiyaamah.mp3', '40', '75', 'ISLAM'),
(76, 'Manusia', 'الانسان', 'Al Insaan', 'https://ia802609.us.archive.org/13/items/quraninindonesia/076AlInsaan.mp3', '31', '76', 'ISLAM'),
(77, 'Malaikat yang Diutus', 'المرسلات', 'Al Mursalaat', 'https://ia802609.us.archive.org/13/items/quraninindonesia/077AlMursalaat.mp3', '50', '77', 'ISLAM'),
(78, 'Berita Besar', 'النبإ', 'An Naba039', 'https://ia802609.us.archive.org/13/items/quraninindonesia/078AnNaba.mp3', '40', '78', 'ISLAM'),
(79, 'Malaikat-Malaikat yang Mencabut', 'النازعات', 'An Naazi039at', 'https://ia802609.us.archive.org/13/items/quraninindonesia/079AnNaaziaat.mp3', '46', '79', 'ISLAM'),
(80, 'Ia Bermuka Masam', 'عبس', '039Abasa', 'https://ia802609.us.archive.org/13/items/quraninindonesia/080Abasa.mp3', '42', '80', 'ISLAM'),
(81, 'Menggulung', 'التكوير', 'At Takwiir', 'https://ia802609.us.archive.org/13/items/quraninindonesia/081AtTakwiir.mp3', '29', '81', 'ISLAM'),
(82, 'Terbelah', 'الإنفطار', 'Al Infithar', 'https://ia802609.us.archive.org/13/items/quraninindonesia/082AlInfithaar.mp3', '19', '82', 'ISLAM'),
(83, 'Kecurangan', 'المطففين', 'Al Muthaffifin', 'https://ia802609.us.archive.org/13/items/quraninindonesia/083AlMuthaffifin.mp3', '36', '83', 'ISLAM'),
(84, 'Terbelah', 'الإنشقاق', 'Al Insyiqaq', 'https://ia802609.us.archive.org/13/items/quraninindonesia/084AlInsyiqaaq.mp3', '25', '84', 'ISLAM'),
(85, 'Gugusan Bintang', 'البروج', 'Al Buruuj', 'https://ia802609.us.archive.org/13/items/quraninindonesia/085AlBuruuj.mp3', '22', '85', 'ISLAM'),
(86, 'Yang Datang di Malam Hari', 'الطارق', 'Ath Thariq', 'https://ia802609.us.archive.org/13/items/quraninindonesia/086AthThaariq.mp3', '17', '86', 'ISLAM'),
(87, 'Yang Paling Tinggi', 'الأعلى', 'Al A039laa', 'https://ia802609.us.archive.org/13/items/quraninindonesia/087AlAalaa.mp3', '19', '87', 'ISLAM'),
(88, 'Hari Pembalasan', 'الغاشية', 'Al Ghaasyiah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/088AlGhaasyiyah.mp3', '26', '88', 'ISLAM'),
(89, 'Fajar', 'الفجر', 'Al Fajr', 'https://ia802609.us.archive.org/13/items/quraninindonesia/089AlFajr.mp3', '30', '89', 'ISLAM'),
(90, 'Negeri', 'البلد', 'Al Balad', 'https://ia802609.us.archive.org/13/items/quraninindonesia/090AlBalad.mp3', '20', '90', 'ISLAM'),
(91, 'Matahari', 'الشمس', 'Asy Syams', 'https://ia802609.us.archive.org/13/items/quraninindonesia/091AsySyams.mp3', '15', '91', 'ISLAM'),
(92, 'Malam', 'الليل', 'Al Lail', 'https://ia802609.us.archive.org/13/items/quraninindonesia/092AlLail.mp3', '21', '92', 'ISLAM'),
(93, 'Waktu Dhuha', 'الضحى', 'Adh Dhuhaa', 'https://ia802609.us.archive.org/13/items/quraninindonesia/093AdhDhuhaa.mp3', '11', '93', 'ISLAM'),
(94, 'Kelapangan', 'الشرح', 'Asy Syarh', 'https://ia802609.us.archive.org/13/items/quraninindonesia/094AlamNasyrah.mp3', '8', '94', 'ISLAM'),
(95, 'Buah Tin', 'التين', 'At Tiin', 'https://ia802609.us.archive.org/13/items/quraninindonesia/095AtTiin.mp3', '8', '95', 'ISLAM'),
(96, 'Segumpal Darah', 'العلق', 'Al 039Alaq', 'https://ia802609.us.archive.org/13/items/quraninindonesia/096AlAlaq.mp3', '19', '96', 'ISLAM'),
(97, 'Kemuliaan', 'القدر', 'Al Qadr', 'https://ia802609.us.archive.org/13/items/quraninindonesia/097AlQadr.mp3', '5', '97', 'ISLAM'),
(98, 'Bukti yang Nyata', 'البينة', 'Al Bayyinah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/098AlBayyinah.mp3', '8', '98', 'ISLAM'),
(99, 'Keguncangan', 'الزلزلة', 'Az Zalzalah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/099AlZalzalah.mp3', '8', '99', 'ISLAM'),
(100, 'Kuda Perang yang Berlari Kencang', 'العاديات', 'Al 039Aadiyah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/100AlAadiyaat.mp3', '11', '100', 'ISLAM'),
(101, 'Hari Kiamat', 'القارعة', 'Al Qaari039ah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/101AlQaariah.mp3', '11', '101', 'ISLAM'),
(102, 'Bermegah-Megahan', 'التكاثر', 'At Takaatsur', 'https://ia802609.us.archive.org/13/items/quraninindonesia/102AtTakaatsur.mp3', '8', '102', 'ISLAM'),
(103, 'Masa', 'العصر', 'Al 039Ashr', 'https://ia802609.us.archive.org/13/items/quraninindonesia/103AlAshr.mp3', '3', '103', 'ISLAM'),
(104, 'Pengumpat', 'الهمزة', 'Al Humazah', 'https://ia802609.us.archive.org/13/items/quraninindonesia/104AlHumazah.mp3', '9', '104', 'ISLAM'),
(105, 'Gajah', 'الفيل', 'Al Fiil', 'https://ia802609.us.archive.org/13/items/quraninindonesia/105AlFiil.mp3', '5', '105', 'ISLAM'),
(106, 'Suku Quraysy', 'قريش', 'Quraisy', 'https://ia802609.us.archive.org/13/items/quraninindonesia/106Quraisy.mp3', '4', '106', 'ISLAM'),
(107, 'Barang-Barang yang Berguna', 'الماعون', 'Al Maa039uun', 'https://ia802609.us.archive.org/13/items/quraninindonesia/107AlMaauun.mp3', '7', '107', 'ISLAM'),
(108, 'Nikmat yang Banyak', 'الكوثر', 'Al Kautsar', 'https://ia802609.us.archive.org/13/items/quraninindonesia/108AlKautsar.mp3', '3', '108', 'ISLAM'),
(109, 'Orang-Orang Kafir', 'الكافرون', 'Al Kafirun', 'https://ia802609.us.archive.org/13/items/quraninindonesia/109AlKaafiruun.mp3', '6', '109', 'ISLAM'),
(110, 'Pertolongan', 'النصر', 'An Nashr', 'https://ia802609.us.archive.org/13/items/quraninindonesia/110AnNashr.mp3', '3', '110', 'ISLAM'),
(111, 'Gejolak Api', 'المسد', 'Al Lahab', 'https://ia802609.us.archive.org/13/items/quraninindonesia/111AlLahab.mp3', '5', '111', 'ISLAM'),
(112, 'Kemurnian Keesaan Allah', 'الإخلاص', 'Al Ikhlash', 'https://ia802609.us.archive.org/13/items/quraninindonesia/112AlIkhlash.mp3', '4', '112', 'ISLAM'),
(113, 'Waktu Subuh', 'الفلق', 'Al Falaq', 'https://ia802609.us.archive.org/13/items/quraninindonesia/113AlFalaq.mp3', '5', '113', 'ISLAM'),
(114, 'Manusia', 'الناس', 'An Naas', 'https://ia802609.us.archive.org/13/items/quraninindonesia/114AnNaas.mp3', '6', '114', 'ISLAM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_unit`
--

CREATE TABLE IF NOT EXISTS `web_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `web_unit`
--

INSERT INTO `web_unit` (`id`, `nama`) VALUES
(1, 'TK'),
(2, 'SD'),
(3, 'SMP'),
(4, 'SMA'),
(5, 'SMK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_visitor`
--

CREATE TABLE IF NOT EXISTS `web_visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(26) NOT NULL,
  `date` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `web_visitor`
--

INSERT INTO `web_visitor` (`id`, `ip`, `date`, `hits`, `online`, `time`) VALUES
(1, '::1', '2022-02-18', 2, '1645176744', '2022-02-18 16:31:40'),
(2, '::1', '2022-02-19', 31, '1645256376', '2022-02-19 11:16:58'),
(3, '::1', '2022-02-20', 4, '1645351663', '2022-02-20 17:00:45'),
(4, '::1', '2022-02-22', 127, '1645541912', '2022-02-22 10:08:17'),
(5, '::1', '2022-02-23', 20, '1645620624', '2022-02-23 10:23:03'),
(6, '::1', '2022-02-24', 2, '1645694578', '2022-02-24 15:46:59'),
(7, '::1', '2022-03-02', 88, '1646211941', '2022-03-02 09:56:45'),
(8, '::1', '2022-03-04', 11, '1646386633', '2022-03-04 14:46:36'),
(9, '::1', '2022-03-07', 9, '1646644603', '2022-03-07 10:15:52'),
(10, '::1', '2022-03-09', 107, '1646817882', '2022-03-09 09:40:18'),
(11, '::1', '2022-03-10', 27, '1646915630', '2022-03-10 10:39:58'),
(12, '::1', '2022-03-11', 12, '1646993633', '2022-03-11 09:02:06'),
(13, '::1', '2022-03-14', 25, '1647250952', '2022-03-14 09:43:53'),
(14, '::1', '2022-03-15', 7, '1647317290', '2022-03-15 09:29:17'),
(15, '::1', '2022-03-17', 6, '1647495518', '2022-03-17 09:40:46'),
(16, '::1', '2022-03-18', 4, '1647575703', '2022-03-18 10:37:35'),
(17, '::1', '2022-03-21', 17, '1647854259', '2022-03-21 09:22:58'),
(18, '::1', '2022-03-22', 20, '1647960899', '2022-03-22 08:55:55'),
(19, '::1', '2022-03-24', 3, '1648107873', '2022-03-24 12:04:58'),
(20, '::1', '2022-03-25', 8, '1648197338', '2022-03-25 09:53:23'),
(21, '::1', '2022-03-28', 4, '1648450552', '2022-03-28 09:16:06'),
(22, '::1', '2022-03-29', 2, '1648534395', '2022-03-29 10:38:38'),
(23, '::1', '2022-03-30', 5, '1648612601', '2022-03-30 08:53:33'),
(24, '::1', '2022-04-02', 1, '1648879777', '2022-04-02 13:09:37'),
(25, '::1', '2022-04-04', 44, '1649084372', '2022-04-04 09:56:21'),
(26, '::1', '2022-04-05', 38, '1649151217', '2022-04-05 10:00:14'),
(27, '::1', '2022-04-06', 3, '1649259253', '2022-04-06 21:52:45'),
(28, '::1', '2022-04-07', 15, '1649321433', '2022-04-07 11:07:35'),
(29, '103.208.205.90', '2022-04-07', 1, '1649339730', '2022-04-07 20:55:30'),
(30, '103.119.140.138', '2022-04-08', 17, '1649406274', '2022-04-08 09:28:40'),
(31, '103.208.205.90', '2022-04-08', 2, '1649425181', '2022-04-08 19:40:51'),
(32, '103.208.205.90', '2022-04-09', 1, '1649482892', '2022-04-09 12:41:32'),
(33, '125.160.237.228', '2022-04-09', 3, '1649487540', '2022-04-09 13:52:45'),
(34, '103.208.205.90', '2022-04-10', 12, '1649561416', '2022-04-10 00:47:11'),
(35, '36.69.82.37', '2022-04-11', 1, '1649651240', '2022-04-11 11:27:20'),
(36, '103.119.140.130', '2022-04-11', 13, '1649664543', '2022-04-11 12:47:40'),
(37, '103.82.15.129', '2022-04-12', 2, '1649724124', '2022-04-12 07:28:18'),
(38, '103.119.141.200', '2022-04-12', 22, '1649752534', '2022-04-12 08:44:33'),
(39, '114.124.236.5', '2022-04-12', 5, '1649737265', '2022-04-12 11:12:09'),
(40, '182.0.148.148', '2022-04-12', 1, '1649738113', '2022-04-12 11:35:13'),
(41, '103.119.141.200', '2022-04-13', 5, '1649835676', '2022-04-13 14:29:59'),
(42, '116.206.28.4', '2022-04-17', 4, '1650204358', '2022-04-17 21:01:50'),
(43, '103.82.15.129', '2022-04-17', 2, '1650211057', '2022-04-17 22:57:05'),
(44, '103.82.15.129', '2022-04-18', 1, '1650215446', '2022-04-18 00:10:46'),
(45, '180.243.8.227', '2022-04-18', 1, '1650226683', '2022-04-18 03:18:03'),
(46, '103.119.141.124', '2022-04-18', 20, '1650272541', '2022-04-18 09:51:17'),
(47, '103.119.141.124', '2022-04-19', 1, '1650346579', '2022-04-19 12:36:19'),
(48, '103.208.205.90', '2022-04-20', 7, '1650448575', '2022-04-20 09:46:53'),
(49, '103.119.141.124', '2022-04-20', 6, '1650443696', '2022-04-20 10:19:27'),
(50, '103.119.141.124', '2022-04-21', 122, '1650532298', '2022-04-21 09:53:25'),
(51, '103.208.205.90', '2022-04-21', 3, '1650558740', '2022-04-21 23:29:41'),
(52, '103.119.141.124', '2022-04-22', 3, '1650600059', '2022-04-22 09:56:24'),
(53, '103.119.140.245', '2022-04-25', 37, '1650876454', '2022-04-25 10:47:33'),
(54, '103.119.140.245', '2022-04-26', 1, '1650938933', '2022-04-26 09:08:53'),
(55, '103.119.140.245', '2022-04-27', 2, '1651037474', '2022-04-27 11:15:15'),
(56, '118.101.33.211', '2022-05-06', 1, '1651829751', '2022-05-06 16:35:51'),
(57, '110.136.9.128', '2022-05-09', 26, '1652110350', '2022-05-09 00:41:44'),
(58, '103.208.205.90', '2022-05-09', 1, '1652088115', '2022-05-09 16:21:55'),
(59, '110.136.9.128', '2022-05-10', 1, '1652154459', '2022-05-10 10:47:39'),
(60, '110.136.9.128', '2022-05-11', 1, '1652244273', '2022-05-11 11:44:33'),
(61, '110.136.9.128', '2022-05-12', 6, '1652345198', '2022-05-12 12:15:13'),
(62, '103.208.205.90', '2022-05-12', 8, '1652348718', '2022-05-12 15:25:41'),
(63, '110.136.9.128', '2022-05-13', 1, '1652425235', '2022-05-13 14:00:35'),
(64, '110.136.9.128', '2022-05-14', 1, '1652477849', '2022-05-14 04:37:29'),
(65, '110.137.154.125', '2022-05-16', 3, '1652693627', '2022-05-16 03:57:20'),
(66, '103.208.205.90', '2022-05-17', 6, '1652746282', '2022-05-17 06:40:24'),
(67, '110.137.154.125', '2022-05-17', 1, '1652770515', '2022-05-17 13:55:15'),
(68, '110.137.194.61', '2022-05-17', 4, '1652775674', '2022-05-17 15:10:29'),
(69, '125.165.146.142', '2022-05-19', 4, '1652930056', '2022-05-19 09:58:26'),
(70, '180.252.170.182', '2022-05-23', 46, '1653303865', '2022-05-23 10:20:57'),
(71, '180.252.164.162', '2022-05-24', 6, '1653379492', '2022-05-24 09:58:21'),
(72, '180.252.162.178', '2022-05-25', 24, '1653472805', '2022-05-25 10:42:33'),
(73, '180.252.167.162', '2022-05-27', 9, '1653644202', '2022-05-27 09:33:51'),
(74, '180.214.233.74', '2022-05-29', 1, '1653843478', '2022-05-29 23:57:58'),
(75, '180.214.232.93', '2022-05-30', 1, '1653867297', '2022-05-30 06:34:57'),
(76, '125.160.19.100', '2022-05-30', 61, '1653910771', '2022-05-30 10:22:54'),
(77, '125.160.19.100', '2022-05-31', 120, '1654001796', '2022-05-31 10:07:19'),
(78, '103.208.205.90', '2022-06-01', 1, '1654064670', '2022-06-01 13:24:30'),
(79, '180.252.171.39', '2022-06-01', 10, '1654086607', '2022-06-01 16:59:14'),
(80, '180.252.171.39', '2022-06-02', 26, '1654163064', '2022-06-02 09:58:19'),
(81, '180.252.171.107', '2022-06-03', 8, '1654271734', '2022-06-03 10:09:51'),
(82, '45.249.222.236', '2022-06-03', 1, '1654247725', '2022-06-03 16:15:25'),
(83, '180.252.171.107', '2022-06-04', 1, '1654333435', '2022-06-04 16:03:55'),
(84, '223.255.230.225', '2022-06-05', 1, '1654441514', '2022-06-05 22:05:14'),
(85, '36.69.170.29', '2022-06-06', 4, '1654500919', '2022-06-06 11:02:21'),
(86, '110.137.195.159', '2022-06-06', 6, '1654510827', '2022-06-06 15:14:34'),
(87, '110.137.195.159', '2022-06-07', 1, '1654581325', '2022-06-07 12:55:25'),
(88, '36.80.103.37', '2022-06-08', 4, '1654625625', '2022-06-08 00:54:17'),
(89, '110.137.195.159', '2022-06-08', 3, '1654703298', '2022-06-08 10:03:56'),
(90, '110.137.195.159', '2022-06-09', 1, '1654753134', '2022-06-09 12:38:54'),
(91, '180.252.165.162', '2022-06-13', 29, '1655106028', '2022-06-13 11:03:51');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sr_kelas_guru`
--
ALTER TABLE `sr_kelas_guru`
  ADD CONSTRAINT `sr_kelas_guru_ibfk_1` FOREIGN KEY (`idkelas`) REFERENCES `sr_kelas` (`idkelas`),
  ADD CONSTRAINT `sr_kelas_guru_ibfk_2` FOREIGN KEY (`idusers`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `sr_kkm`
--
ALTER TABLE `sr_kkm`
  ADD CONSTRAINT `sr_kkm_ibfk_1` FOREIGN KEY (`idmata_pelajaran`) REFERENCES `sr_mata_pelajaran` (`idmata_pelajaran`),
  ADD CONSTRAINT `sr_kkm_ibfk_2` FOREIGN KEY (`idkelas`) REFERENCES `sr_kelas` (`idkelas`);

--
-- Ketidakleluasaan untuk tabel `sr_kompetensi_dasar`
--
ALTER TABLE `sr_kompetensi_dasar`
  ADD CONSTRAINT `sr_kompetensi_dasar_ibfk_2` FOREIGN KEY (`idusers`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sr_kompetensi_dasar_ibfk_3` FOREIGN KEY (`idmata_pelajaran`) REFERENCES `sr_mata_pelajaran` (`idmata_pelajaran`),
  ADD CONSTRAINT `sr_kompetensi_dasar_ibfk_4` FOREIGN KEY (`idtahun_pelajaran`) REFERENCES `sr_tahun_pelajaran` (`idtahun_pelajaran`),
  ADD CONSTRAINT `sr_kompetensi_dasar_ibfk_5` FOREIGN KEY (`idkelas`) REFERENCES `sr_kelas` (`idkelas`);

--
-- Ketidakleluasaan untuk tabel `sr_nilai_pengetahuan_utsuas`
--
ALTER TABLE `sr_nilai_pengetahuan_utsuas`
  ADD CONSTRAINT `sr_nilai_pengetahuan_utsuas_ibfk_1` FOREIGN KEY (`idtahun_pelajaran`) REFERENCES `sr_tahun_pelajaran` (`idtahun_pelajaran`),
  ADD CONSTRAINT `sr_nilai_pengetahuan_utsuas_ibfk_2` FOREIGN KEY (`idmata_pelajaran`) REFERENCES `sr_mata_pelajaran` (`idmata_pelajaran`),
  ADD CONSTRAINT `sr_nilai_pengetahuan_utsuas_ibfk_4` FOREIGN KEY (`idkelas`) REFERENCES `sr_kelas` (`idkelas`),
  ADD CONSTRAINT `sr_nilai_pengetahuan_utsuas_ibfk_5` FOREIGN KEY (`idusers`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sr_nilai_pengetahuan_utsuas_ibfk_6` FOREIGN KEY (`idsiswa`) REFERENCES `sr_siswa` (`idsiswa`);

--
-- Ketidakleluasaan untuk tabel `sr_rencana_kd_keterampilan`
--
ALTER TABLE `sr_rencana_kd_keterampilan`
  ADD CONSTRAINT `sr_rencana_kd_keterampilan_ibfk_1` FOREIGN KEY (`idtahun_pelajaran`) REFERENCES `sr_tahun_pelajaran` (`idtahun_pelajaran`),
  ADD CONSTRAINT `sr_rencana_kd_keterampilan_ibfk_2` FOREIGN KEY (`idkelas`) REFERENCES `sr_kelas` (`idkelas`),
  ADD CONSTRAINT `sr_rencana_kd_keterampilan_ibfk_3` FOREIGN KEY (`idusers`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sr_rencana_kd_keterampilan_ibfk_4` FOREIGN KEY (`idmata_pelajaran`) REFERENCES `sr_mata_pelajaran` (`idmata_pelajaran`);

--
-- Ketidakleluasaan untuk tabel `sr_rencana_kd_pengetahuan`
--
ALTER TABLE `sr_rencana_kd_pengetahuan`
  ADD CONSTRAINT `sr_rencana_kd_pengetahuan_ibfk_1` FOREIGN KEY (`idtahun_pelajaran`) REFERENCES `sr_tahun_pelajaran` (`idtahun_pelajaran`),
  ADD CONSTRAINT `sr_rencana_kd_pengetahuan_ibfk_2` FOREIGN KEY (`idkelas`) REFERENCES `sr_kelas` (`idkelas`),
  ADD CONSTRAINT `sr_rencana_kd_pengetahuan_ibfk_3` FOREIGN KEY (`idusers`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sr_rencana_kd_pengetahuan_ibfk_4` FOREIGN KEY (`idmata_pelajaran`) REFERENCES `sr_mata_pelajaran` (`idmata_pelajaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
