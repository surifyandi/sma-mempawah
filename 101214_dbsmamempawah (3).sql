-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Apr 2015 pada 11.44
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `101214_dbsmamempawah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('admin','operator') NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`, `level`, `create_date`, `update_date`) VALUES
(1, 'Surif Yandi', 'superadmin', '16a671d22ee64161c1a1d567fa7195ca', 'operator', '2014-12-19 09:35:58', '0000-00-00 00:00:00'),
(2, 'Dedy Ashardi', 'admin', '42e7526afb631a0410c7099f387ed6e7', 'admin', '2015-01-06 08:59:07', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agenda`
--

CREATE TABLE IF NOT EXISTS `tb_agenda` (
  `id_agenda` int(10) NOT NULL AUTO_INCREMENT,
  `judul_agenda` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_album`
--

CREATE TABLE IF NOT EXISTS `tb_album` (
  `id_album` int(10) NOT NULL AUTO_INCREMENT,
  `nama_album` varchar(200) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tb_album`
--

INSERT INTO `tb_album` (`id_album`, `nama_album`, `create_date`) VALUES
(1, 'Pramuka', '2014-12-30 06:18:33'),
(2, 'HUT Gudep MACAN', '2015-01-17 03:55:25'),
(3, 'Paskibra', '2015-01-17 04:00:05'),
(4, 'Pentas Seni', '2015-01-17 15:23:42'),
(5, 'Lomba Mading', '2015-01-17 16:41:21'),
(6, 'Class Meeting', '2015-01-17 16:45:54'),
(7, 'LP2D', '2015-01-17 16:49:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE IF NOT EXISTS `tb_berita` (
  `id_berita` int(10) NOT NULL AUTO_INCREMENT,
  `kategori` enum('berita','mading','ekskul','prakarya') NOT NULL,
  `judul_berita` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `kategori`, `judul_berita`, `isi`, `gambar`, `tipe_file`, `create_date`) VALUES
(3, 'berita', 'Peraturan Pendidikan Mempawah Kembali Gunakan KTSP 2006', '<p style="text-align: justify;">Peraturan pendidikan di Kabupaten Mempawah telah kembali mengacu pada pembelajaran kurikulum Tingkat Satuan Pendidikan (KTSP) 2006. Ketentuannya telah ditetapkan melalui peraturan Mendikbud Nomor 160 tahun 2014.</p>\n<p style="text-align: justify;">&nbsp;</p>\n<p style="text-align: justify;">Kepala Bidang (Kabid) Pendidikan Dasar Dinas Pendidikan, Pemuda dan Olahraga (Disdikpora) Mempawah, Drs. Sukriadi Masri, M.Pd menegaskan acuan pembelajaran kali ini, wajib kembali ke Kurikulum Tingkat Satuan Pendidikan (KTSP) 2006. Seperti hal yang sudah ditentukan dalam peraturan mentri pendidikan.</p>\n<p style="text-align: justify;">&nbsp;</p>\n<p style="text-align: justify;">&ldquo;Payung hukum penggunaan kembali KTSP 2006 jelas telah ditetapkan dalam Permendikbud Nomor 160 tahun 2014. Jika tetap memaksakan kehendak menggunakan kurikulum 2013, maka kita telah melanggar kebijakan pemerintah pusat,&rdquo; ujarnya, Kamis (1/1/2015)</p>', '386740-SDC17968.JPG', 'JPG', '2015-01-03 21:46:27'),
(8, 'ekskul', 'Paskibra', '\n', '638268-SDC17969.JPG', 'JPG', '2015-01-03 23:40:02'),
(9, 'ekskul', 'PMR', '\n', '22854-IMG_20141008_130642.JPG', 'JPG', '2015-01-03 23:44:06'),
(10, 'ekskul', 'Rohis', '<p>informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar informasi ekstrakurikuler ketiga tanpa gambar.</p>\n', '', '', '2015-01-03 23:46:58'),
(17, 'ekskul', 'Pramuka', '', '', '', '2015-01-05 10:10:47'),
(24, 'berita', 'Tak Hanya Ujian Hasil Belajar, UN Didorong Punya Efek Pembelajaran ', '<p style="text-align: justify;">Jakarta, Kemendikbud --- Ujian nasional (UN) tetap digunakan untuk pemetaan, dasar seleksi masuk jenjang pendidikan yang lebih tinggi, peningkatan mutu, dan pembinaan. Dengan tidak lagi menjadikan UN sebagai penentu kelulusan, Menteri Pendidikan dan Kebudayaan (Mendikbud) Anies Baswedan mengatakan, proses pembelajaran diharapkan dapat membentuk perilaku yang lebih positif. &ldquo;Tapi tetap harus ada pengawasan,&rdquo; kata Mendikbud saat bertemu dengan redaksi surat kabar Kompas, di kantor Kompas Gramedia Jakarta, Jumat (16/01/2015).</p>\n<p style="text-align: justify;">&nbsp;</p>\n<p style="text-align: justify;">Untuk pemetaan, Menteri Anies menjelaskan, dalam hasil UN akan terlihat jelas komponen-komponen penilaian. Setiap siswa yang menerima hasil ujian akan mengetahui capaiannya di antara siswa lainnya, maupun posisinya di rerata sekolah dan nasional. Dan nilai yang diperoleh siswa juga memiliki penjelasan kualitatif. &ldquo;Setiap orang tua yang terima nilai anaknya 6, dia bisa tahu 6 itu apa. Atau jika nilainya 7, baik, artinya dia bisa mengerjakan masalah dan mampu menjelaskan fisika dalam kehidupan sehari-hari,&rdquo; katanya. Mendikbud mengatakan, skala penilaian selain berupa angka juga keterangan yang dibagi atas empat tingkatan yaitu sangat baik, baik, cukup, kurang.</p>\n<p style="text-align: justify;">&nbsp;</p>\n<p style="text-align: justify;">Pengukuran nilai ini, kata dia, punya konsekuensi pada parameter. UN, lanjutnya, adalah assessment yang dilakukan oleh negara yang tujuannya untuk meningkatkan proses belajar. Bukan untuk menentukan nasib siswa. Dan bagi guru, kata Mendikbud, mereka punya bayangan anaknya bisa menguasai apa. Mendikbud mengatakan, kualitas UN akan terus ditingkatkan. Karena ke depan UN mulai dipakai sebagai tolok ukur anak-anak Indonesia yang mendaftar ke sekolah di luar negeri. Jumlah siswa Indonesia mencapai sepuluh persen dari siswa dunia.</p>\n<p style="text-align: justify;">&nbsp;</p>\n<p style="text-align: justify;">Sebagai negara yang masuk dalam empat negara dengan penduduk terbanyak, seharusnya standar Indonesia bisa dipakai sebagai tolok ukur internasional. &ldquo;Mereka sudah mengakui (UN) ini sebagai alat ukur kita. Kalau kita bisa improve terus, internasional bisa mengakui tolok ukur standar kita,&rdquo; tuturnya.</p>\n<p style="text-align: justify;">Sumber : <a href="http://www.kemdiknas.go.id/kemdikbud/berita/3724">kemendiknas.go.id</a></p>', '523822-20150116_141155_resized.jpg', 'jpg', '2015-01-17 11:05:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galeri`
--

CREATE TABLE IF NOT EXISTS `tb_galeri` (
  `id_gallery` int(10) NOT NULL AUTO_INCREMENT,
  `nama_foto` varchar(200) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_album` int(10) NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data untuk tabel `tb_galeri`
--

INSERT INTO `tb_galeri` (`id_gallery`, `nama_foto`, `nama_file`, `tipe_file`, `create_date`, `id_album`) VALUES
(27, '1', '925890-DSC_0834.JPG', 'JPG', '2015-01-17 15:07:38', 2),
(28, 'Siswa sedang melakukan latihan paskibra', '535831-SDC17886.JPG', 'JPG', '2015-01-17 15:09:17', 3),
(29, 'Siswa sedang melaksanakan upacara MOP', '767079-1.jpg', 'jpg', '2015-01-17 15:13:04', 1),
(30, 'Upacara MOP ', '252938-2.jpg', 'jpg', '2015-01-17 15:14:35', 1),
(31, '2', '130318-DSC_0941.JPG', 'JPG', '2015-01-17 15:16:48', 2),
(32, '3', '655988-DSC_0834.JPG', 'JPG', '2015-01-17 15:23:26', 2),
(33, 'Para Guru dan Staf sedang menyaksikan pementasan', '461351-SAM_6790.JPG', 'JPG', '2015-01-17 15:25:05', 4),
(34, 'Guru dan Siswa berkolaborasi di panggung seni', '412257-SAM_6846.JPG', 'JPG', '2015-01-17 15:26:56', 4),
(35, 'Siswa sedang melakukan latihan baris-berbaris paskibra', '350024-SDC17885.JPG', 'JPG', '2015-01-17 15:30:24', 3),
(36, 'Salah satu mading yang diikutkan lomba oleh siswa', '319502-SDC11212.JPG', 'JPG', '2015-01-17 16:43:23', 5),
(37, 'Siswa peroleh juara dari lomba mading', '154147-SDC11270.JPG', 'JPG', '2015-01-17 16:44:55', 5),
(38, 'Perolehan juara dari class meeting', '687160-SDC17952.JPG', 'JPG', '2015-01-17 16:47:34', 6),
(39, 'Bersama guru pemberian hadiah untuk juara class meeting', '677695-SDC17969.JPG', 'JPG', '2015-01-17 16:49:15', 6),
(40, 'Bersama guru pembimbing LP2D', '332853-SAM_6502.JPG', 'JPG', '2015-01-17 16:50:32', 7),
(41, 'Siswa melakukan permainan LP2D', '742657-SAM_6470.JPG', 'JPG', '2015-01-17 16:51:27', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar`
--

CREATE TABLE IF NOT EXISTS `tb_gambar` (
  `id_gambar` int(10) NOT NULL AUTO_INCREMENT,
  `nama_gambar` varchar(200) NOT NULL,
  `url` text NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `resolusi` varchar(100) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data untuk tabel `tb_gambar`
--

INSERT INTO `tb_gambar` (`id_gambar`, `nama_gambar`, `url`, `nama_file`, `resolusi`, `tipe_file`, `create_date`) VALUES
(10, 'OSIS', 'http://sman2mempawah.sch.id/system/application/views/gambar/566891-1798050_10201879684913530_2379199647120734394_n.jpg.jpg', '566891-1798050_10201879684913530_2379199647120734394_n.jpg', '460 x 320 px', 'jpg', '2015-01-18 01:34:21'),
(11, 'TP UKS', 'http://sman2mempawah.sch.id/system/application/views/gambar/236427-10365915_10201879681513445_6850502550820053560_n.jpg.jpg', '236427-10365915_10201879681513445_6850502550820053560_n.jpg', '460 x 320 px', 'jpg', '2015-01-18 01:52:37'),
(15, 'Pramuka', 'http://sman2mempawah.sch.id/system/application/views/gambar/172434-10669107_10201879681113435_8172089261844038335_o.jpg.jpg', '172434-10669107_10201879681113435_8172089261844038335_o.jpg', 'ukuran asli', 'jpg', '2015-01-18 02:05:52'),
(16, 'Paskibra', 'http://sman2mempawah.sch.id/system/application/views/gambar/554658-10389128_10201879678633373_4752134180102589240_n.jpg.jpg', '554658-10389128_10201879678633373_4752134180102589240_n.jpg', 'ukuran asli', 'jpg', '2015-01-18 02:11:55'),
(17, 'PMR', 'http://sman2mempawah.sch.id/system/application/views/gambar/985322-10670134_10201879680633423_3567326994196414865_n.jpg.jpg', '985322-10670134_10201879680633423_3567326994196414865_n.jpg', 'ukuran asli', 'jpg', '2015-01-18 02:12:32'),
(22, 'Perpustakaan', 'http://sman2mempawah.sch.id/system/application/views/gambar/233060-220145_1488811480011_4512188_o.jpg.jpg', '233060-220145_1488811480011_4512188_o.jpg', 'ukuran asli', 'jpg', '2015-01-18 02:58:28'),
(23, 'Lab. Bahasa', 'http://sman2mempawah.sch.id/system/application/views/gambar/642017-335403_1816680996544_1900661821_o.jpg.jpg', '642017-335403_1816680996544_1900661821_o.jpg', 'ukuran asli', 'jpg', '2015-01-18 03:00:18'),
(24, 'Lab.Komputer (ICT)', 'http://sman2mempawah.sch.id/system/application/views/gambar/187773-335403_1816680956543_585048710_o.jpg.jpg', '187773-335403_1816680956543_585048710_o.jpg', 'ukuran asli', 'jpg', '2015-01-18 03:05:00'),
(25, 'Lab. IPA', 'http://sman2mempawah.sch.id/system/application/views/gambar/108200-546750_2999713771624_176529764_n.jpg.jpg', '108200-546750_2999713771624_176529764_n.jpg', 'ukuran asli', 'jpg', '2015-01-18 03:12:13'),
(26, 'SMANDA', 'http://sman2mempawah.sch.id/system/application/views/gambar/347156-smanda.jpg.jpg', '347156-smanda.jpg', 'ukuran asli', 'jpg', '2015-01-18 03:22:33'),
(31, 'Guru dan Staf ', 'http://www.sman2mempawah.sch.id/system/application/views/gambar/926547-guru.jpg.jpg', '926547-guru.jpg', 'ukuran asli', 'jpg', '2015-01-18 07:45:52'),
(32, 'Struktur', 'http://www.sman2mempawah.sch.id/system/application/views/gambar/247521-struktur.jpg.jpg', '247521-struktur.jpg', 'ukuran asli', 'jpg', '2015-01-19 07:55:37'),
(33, 'Kepala Sekolah', 'http://www.sman2mempawah.sch.id/system/application/views/gambar/621902-kepala-sekolah.jpg.jpg', '621902-kepala-sekolah.jpg', 'ukuran asli', 'jpg', '2015-01-19 09:04:28'),
(35, 'Ruang Kelas', 'http://www.sman2mempawah.sch.id/system/application/views/gambar/337894-10700296_10201520701059158_2940191851204987416_o.jpg.jpg', '337894-10700296_10201520701059158_2940191851204987416_o.jpg', 'ukuran asli', 'jpg', '2015-01-19 09:17:46'),
(36, 'Ruang Multimedia', 'http://www.sman2mempawah.sch.id/system/application/views/gambar/956537-ruang-multimedia.jpg.jpg', '956537-ruang-multimedia.jpg', 'ukuran asli', 'jpg', '2015-01-19 09:27:12'),
(38, 'Mushola', 'http://www.sman2mempawah.sch.id/system/application/views/gambar/512139-mushola.jpg.jpg', '512139-mushola.jpg', 'ukuran asli', 'jpg', '2015-01-19 09:45:42'),
(39, 'Sarana Olahraga', 'http://www.sman2mempawah.sch.id/system/application/views/gambar/475518-sarana-olahraga.JPG.JPG', '475518-sarana-olahraga.JPG', 'ukuran asli', 'JPG', '2015-01-19 09:57:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengumuman`
--

CREATE TABLE IF NOT EXISTS `tb_pengumuman` (
  `id_pengumuman` int(10) NOT NULL AUTO_INCREMENT,
  `judul_pengumuman` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slide`
--

CREATE TABLE IF NOT EXISTS `tb_slide` (
  `id_slide` int(10) NOT NULL AUTO_INCREMENT,
  `judul_slide` varchar(200) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_slide`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `tb_slide`
--

INSERT INTO `tb_slide` (`id_slide`, `judul_slide`, `foto`, `tipe_file`, `create_date`) VALUES
(10, 'Lapangan Olahraga SMA Negeri 2 Mempawah', '958700-lapangan-olahraga.jpg', 'jpg', '2015-01-18 05:12:20'),
(12, 'SMA Negeri 2 Mempawah', '926010-smanda.jpg', 'jpg', '2015-01-18 05:24:32'),
(13, 'Gedung Kelas SMA Negeri 2 Mempawah', '444990-DSC_0074.jpg', 'jpg', '2015-01-18 05:53:40'),
(15, 'Siswa SMA Negeri 2 Mempawah', '484439-Siswa.jpg', 'jpg', '2015-01-18 07:36:11'),
(16, 'Guru dan Staf SMA Negeri 2 Mempawah', '34548-guru.jpg', 'jpg', '2015-01-18 07:42:15'),
(17, 'Paskibra SMA Negeri 2 Mempawah', '382903-Paskibra.jpg', 'jpg', '2015-01-18 07:56:30'),
(18, 'Tim Musik dan Seni SMA Negeri 2 Mempawah', '986921-tim-musik.jpg', 'jpg', '2015-01-18 08:03:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_statis`
--

CREATE TABLE IF NOT EXISTS `tb_statis` (
  `id_statis` int(4) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL,
  `judul_halaman` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_statis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tb_statis`
--

INSERT INTO `tb_statis` (`id_statis`, `kategori`, `judul_halaman`, `isi`) VALUES
(1, 'profil', 'Profil SMA NEGERI 2 Mempawah', '<p style="text-align: justify;"><strong><img src="../../system/application/views/gambar/347156-smanda.jpg.jpg" alt="" width="605" height="303" /><br /></strong></p>\n<p style="text-align: justify;">&nbsp;</p>\n<p style="text-align: justify;"><strong>SEJARAH BERDIRINYA SMA N 2 MEMPAWAH HILIR</strong></p>\n<p style="text-align: justify;">&nbsp;</p>\n<p style="text-align: justify;">Ditinjau secara historis, SMA Negeri 2 Mempawah Hilir berdiri pada tanggal 21 Maret 1988. Berdasarkan surat keputusan Menteri Pendidikan dan Kebudayaan Republik Indonesia tanggal 16 Januari 1987 dan keputusan Menteri Pendidikan dan Kebudayaan Republik Indonesia dengan surat No. 0135/01/1989 tentang pembukaan, penerimaan dan peningkatan sekolah tahun pelajaran 1988/1989 yang diresmikan oleh Gubernur Kalimantan Barat Bapak Parjoko pada tahun 1989.</p>\n<p style="text-align: justify;">&nbsp;</p>\n<p style="text-align: justify;">SMA Negeri 2 Mempawah Hilir banyak mengalami perubahan dan perkembangan dari keadaan serba kekurangan menjadi sekolah yang cukup memadahi dalam segala hal, baik mengenai sarana dan prasarana, tenaga pengajar dan hasil proses belajar mengajar itu sendiri. SMA Negeri 2 Mempawah Hilir menjadi sekolah yang keberadaannya diperhitungkan oleh sekolah-sekolah lainnya maupun masyarakat. Dimana SMA Negeri 2 Mempawah Hilir telah mendapatkan sertifikat Akreditasi predikat yang telah ditetapkan oleh Badan Akreditasi Nasional Sekolah/Madrasah (BAN-S/M) pada tanggal 25 Oktober 2011 dengan hasil A (sangat baik).</p>\n<p style="text-align: justify;">&nbsp;</p>\n<p style="text-align: justify;">Dilihat dari letak bangunannya, SMA Negeri 2 Mempawah Hilir terletak di jalan Chandramidi khususnya pada Keluraran Tengah yang tidak begitu jauh dari kantor Bupati Kabupaten Mempawah dan tidak jauh dari keramaian lalu lintas kendaraan yang merupakan letak yang sangat strategis. Namun para guru dan siswa mendapatkan situasi dan kondisi belajar mengajar yang tenang dan jauh dari pengaruh gangguan yang berasal dari luar, dalam melaksanakan proses belajar mengajar di SMA Negeri 2 Mempawah Hilir.</p>\n<p style="text-align: justify;">&nbsp;</p>\n<p><strong>DATA IDENTITAS SEKOLAH</strong></p>\n<p>&nbsp;</p>\n<ul>\n<li>Nama Sekolah : <strong>SMA Negeri 2 Mempawah Hilir</strong></li>\n<li>Nomor Pokok Sekolah Nasional&nbsp; : <strong>30101074</strong></li>\n<li>Nomor Statistik Sekolah (NSS)&nbsp; : <strong>301130210031</strong></li>\n<li>AlamatSekolah/Madrasah&nbsp; : <strong>Jalan Chandramidi Mempawah</strong></li>\n</ul>\n<p style="padding-left: 30px;">Kecamatan&nbsp; : <strong>Mempawah Hilir</strong></p>\n<p style="padding-left: 30px;">Kab&nbsp; : <strong>Mempawah</strong></p>\n<p style="padding-left: 30px;">Provinsi&nbsp; : <strong>Kalimantan Barat</strong></p>\n<p style="padding-left: 30px;">Kode Pos&nbsp; : <strong>78911</strong></p>\n<p style="padding-left: 30px;">Telepon dan Faksimil : <strong>(0561) 691520</strong></p>\n<p style="padding-left: 30px;">E-mail&nbsp; :<strong> <a>sma_2_mempawah@yahoo.co.id</a></strong></p>\n<ul>\n<li>Status Sekolah : <strong>Negeri</strong></li>\n<li>Tahun Berdiri Sekolah / Madrasah&nbsp; : <strong>1988</strong></li>\n<li>Status Akreditasi / Tahun&nbsp; : <strong>A / 2011</strong></li>\n<li>Nama Kepala Sekolah&nbsp; :<strong> Endang Superi Wahyudi, S.Pd.</strong></li>\n<li>NIP Kepala Sekolah&nbsp; : <strong>19650101 198811 1003</strong></li>\n</ul>'),
(2, 'organisasi', 'Organisasi & Ekstrakurikuler SMA NEGERI 2 Mempawah', '<table style="height: 634px;" width="585">\n<tbody>\n<tr>\n<td>\n<h3 style="text-align: center;">Organisasi Siswa Intra Sekolah (OSIS)</h3>\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="http://sman2mempawah.sch.id/system/application/views/gambar/566891-1798050_10201879684913530_2379199647120734394_n.jpg.jpg" alt="" width="263" height="182" /></p>\n</td>\n<td>\n<h3 style="text-align: center;">TP Pelaksana Usaha Kesehatan Sekolah (TP UKS)</h3>\n<p style="text-align: center;"><img style="display: block; margin-left: auto; margin-right: auto;" src="http://sman2mempawah.sch.id/system/application/views/gambar/236427-10365915_10201879681513445_6850502550820053560_n.jpg.jpg" alt="" width="231" height="160" /></p>\n<p>&nbsp;</p>\n</td>\n</tr>\n<tr>\n<td>\n<h3 style="text-align: center;">PASKIBRA</h3>\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="http://sman2mempawah.sch.id/system/application/views/gambar/554658-10389128_10201879678633373_4752134180102589240_n.jpg.jpg" alt="" width="260" height="259" /></p>\n</td>\n<td>\n<h3 style="text-align: center;">PALANG MERAH REMAJA (PMR)</h3>\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="http://sman2mempawah.sch.id/system/application/views/gambar/985322-10670134_10201879680633423_3567326994196414865_n.jpg.jpg" alt="" width="237" height="233" /></p>\n<p>&nbsp;</p>\n</td>\n</tr>\n</tbody>\n</table>\n<table style="height: 23px;" width="583">\n<tbody>\n<tr>\n<td>\n<h3 style="text-align: center;">PRAMUKA</h3>\n<p><img src="http://sman2mempawah.sch.id/system/application/views/gambar/172434-10669107_10201879681113435_8172089261844038335_o.jpg.jpg" alt="" width="574" height="201" /></p>\n</td>\n</tr>\n</tbody>\n</table>'),
(3, 'perpustakaan', 'Perpustakaan SMA NEGERI 2 Mempawah', '<h1><strong><img src="http://sman2mempawah.sch.id/system/application/views/gambar/233060-220145_1488811480011_4512188_o.jpg.jpg" alt="" width="578" height="433" /></strong></h1>\n<h1><strong>Profil Perpustakaan</strong></h1>\n<p style="text-align: justify;">Perpustakaan SMA Negeri 2 Mempawah berdiri tahun 1990 dengan ukuran luas gedung 120 M , serta memiliki tiga ruang di antaranya : ruang baca,ruang kerja,dan gudang.</p>\n<p style="text-align: justify;">Perpustakaan berfungsi sebagai informasi, edukasi , rekreasi, pelestarian dan deposit, serta penelitian yang ikut menentukan berlangsungnya proses pendidikan untuk mencerdaskan siswa.</p>\n<p style="text-align: justify;"><br /> Berkenaan dengan pentingnya fungsi perpustakaan, kegiatan penyelenggaraan perpustakaan sekolah berupaya menyediakan bahan perpustakaan sebagai sumber untuk belajar menggali informasi, menggembangkan kreasi dan sebagai tempat rekreasi bagi siswa,guru dan TU. Dalam kaitan ini, pihak sekolah bertanggung jawab dan selalu berusaha untuk meningkatkan mutu pendidikan melalui peningkatan peranan perpustakaan. Agar tugas tersebut dapat dilaksanakan secara berdaya guna, dan berhasil guna, perpustakaan perlu dibina dan dikembangkan secara terencana, dan terpadu,serta berkesinambungan.</p>\n<p style="text-align: justify;">&nbsp;</p>\n<h1 style="text-align: justify;"><strong>Visi dan Misi Perpustakaan</strong></h1>\n<p style="text-align: justify;">&nbsp;</p>\n<p style="text-align: justify;">Visi Perpustakaan &ldquo;<strong>Membaca Jadikan Budaya</strong>&ldquo;.</p>\n<p style="text-align: justify;">Adapun misi Perpustakaan :</p>\n<ul style="text-align: justify;">\n<li>Meningkatkan minat baca warga sekolah</li>\n<li>Perpustakaan dijadikan kegiatan belajar</li>\n<li>Perpustakaan dijasikan sebagai pusat informasi</li>\n<li>Mengembangkan bahan pustaka</li>\n<li>Meningkatkan SDM perpustakaan</li>\n<li>Meningkatkan layanan perpustakaan</li>\n<li>Mencipatakan penataan ruangan membaca yang menyenangkan</li>\n</ul>\n<h1 style="text-align: justify;">&nbsp;</h1>\n<h1 style="text-align: justify;">Kedudukan, Tugas Pokok dan Fungsi Perpustakaan</h1>\n<p style="text-align: justify;">&nbsp;</p>\n<ul style="text-align: justify;">\n<li>&nbsp;Kedudukan</li>\n</ul>\n<p style="text-align: justify;">Perpustakaan SMA Negeri 2 Mempawah merupakan unsur penunjang pendidikan yang sangat esensial dalam proses belajar mengajar secra aktif menjdi sumber informasi ilmu.</p>\n<p style="text-align: justify;">&nbsp;</p>\n<ul style="text-align: justify;">\n<li>Tugas Pokok</li>\n</ul>\n<p style="text-align: justify;">Perpustakaan SMA Negeri 2 Mempawah mempunyai tugas pokok membantu kelancaran terlaksananya program pendidikan khususnya dalam hal penyiapan dan pengolahan bahan perpustakaan serta layanan bahan informasi.</p>\n<p style="text-align: justify;">&nbsp;</p>\n<ul style="text-align: justify;">\n<li>Fungsi</li>\n</ul>\n<p style="text-align: justify;">Fungsi Perpustakaan SMA Negeri 2 Mempawah antara lain :</p>\n<ul>\n<li style="text-align: justify;">Menghidupkan organisasi untuk kebutuhan belajar mengajar</li>\n<li style="text-align: justify;">Merencanakan dan mengembangkan bahan pustaka</li>\n<li style="text-align: justify;">Menyelenggarakan perawatan dan pelestarian bahan perpustakaan</li>\n<li style="text-align: justify;">Mendidik siswa mampu mencari dan mengolah informasi sesuai kebutuhan</li>\n<li style="text-align: justify;">Melakasankan layanan perpustakaan sehingga siswa dan guru terbiasa memakai fasilits perpustakaan.</li>\n<li style="text-align: justify;">Mengembangkan minat baca</li>\n<li style="text-align: justify;">Menjalin kerjasama dengan lembaga lain bidang perpustakaan</li>\n</ul>'),
(4, 'sarana', 'Sarana dan Fasilitas SMA NEGERI 2 Mempawah', '<table style="height: 1045px;" width="601">\n<tbody>\n<tr>\n<td>\n<h2>Perpustakaan</h2>\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="../../system/application/views/gambar/233060-220145_1488811480011_4512188_o.jpg.jpg" alt="" width="295" height="221" /></p>\n</td>\n<td style="text-align: left;">\n<h2>&nbsp;Lab. Bahasa</h2>\n<p><img src="../../system/application/views/gambar/642017-335403_1816680996544_1900661821_o.jpg.jpg" alt="" width="296" height="219" /></p>\n</td>\n</tr>\n<tr>\n<td>\n<h2>&nbsp;Lab. Komputer (ICT)</h2>\n<p><img src="../../system/application/views/gambar/187773-335403_1816680956543_585048710_o.jpg.jpg" alt="" width="296" height="222" /></p>\n</td>\n<td>\n<h2>Lab. IPA</h2>\n<p><img src="../../system/application/views/gambar/108200-546750_2999713771624_176529764_n.jpg.jpg" alt="" width="296" height="221" /></p>\n</td>\n</tr>\n<tr>\n<td style="text-align: left;">\n<h2>Ruang Multimedia</h2>\n<p><img src="../../system/application/views/gambar/956537-ruang-multimedia.jpg.jpg" alt="" width="294" height="219" /></p>\n</td>\n<td>\n<h2>Ruang Kelas</h2>\n<p><img src="../../system/application/views/gambar/337894-10700296_10201520701059158_2940191851204987416_o.jpg.jpg" alt="" width="297" height="223" /></p>\n</td>\n</tr>\n<tr>\n<td>\n<h2>Lapangan Olahraga</h2>\n<p><img src="../../system/application/views/gambar/475518-sarana-olahraga.JPG.JPG" alt="" width="295" height="222" /></p>\n</td>\n<td>\n<h2>Mushola</h2>\n<p><img src="../../system/application/views/gambar/512139-mushola.jpg.jpg" alt="" width="296" height="222" /></p>\n</td>\n</tr>\n<tr>\n<td>&nbsp;</td>\n<td>&nbsp;</td>\n</tr>\n<tr>\n<td>&nbsp;</td>\n<td>&nbsp;</td>\n</tr>\n<tr>\n<td>&nbsp;</td>\n<td>&nbsp;</td>\n</tr>\n<tr>\n<td>&nbsp;</td>\n<td>&nbsp;</td>\n</tr>\n<tr>\n<td>&nbsp;</td>\n<td>&nbsp;</td>\n</tr>\n<tr>\n<td>&nbsp;</td>\n<td>&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p>&nbsp;</p>'),
(5, 'visimisi', 'Visi dan Misi SMA NEGERI 2 Mempawah', '<h1><img src="../../system/application/views/gambar/926547-guru.jpg.jpg" alt="" width="596" height="254" /></h1>\n<h1>VISI Sekolah :</h1>\n<p>&ldquo; UNGGUL DALAM PRESTASI, TERDEPAN DALAM KREASI, MANTAP DALAM IMTAK&rdquo;.</p>\n<p>&nbsp;</p>\n<h1 style="text-align: justify;">MISI Sekolah :</h1>\n<ol>\n<li style="text-align: justify;">Menumbuhkan semangat keunggulan secara intensif kepada seluruh warga sekolah untuk menjadi yang terbaik;</li>\n<li style="text-align: justify;">Mendorong dan membantu setiap siswa untu</li>\n<li style="text-align: justify;">Melaksanakan pembelajaran dan bimbingan secara efektif, sehingga setiap siswa berkembang secara optimal sesuai potensi yang dimiliki;</li>\n<li style="text-align: justify;">k mengenali potensi dirinya, sehingga dapat dikembangkan secara optimal;</li>\n<li style="text-align: justify;">Mengembangkan kompetensi tenaga pendidik dan kependidikan sesuai keahliannya agar optimal dalam melaksanakan tugasnya;</li>\n<li style="text-align: justify;">Mengembangkan sarana dan prasarana sekolah;</li>\n<li style="text-align: justify;">Menumbuhkan penghayatan terhadap ajaran agama yang dianut dan budaya bangsa, sehingga menjadi sumber kearifan dalam bertindak;</li>\n<li style="text-align: justify;">Mengembangkan manajemen transparansi, partisipatif, dan demokratis yang melibatkan seluruh warga sekolah dan kelompok kepentingan yang terkait dengan sekolah;</li>\n<li style="text-align: justify;">Mempersiapkan siswa untuk memasuki jenjang pendidikan yang lebih tinggi;</li>\n<li style="text-align: justify;">Mengoptimalkan seluruh potensi sekolah untuk menjadi sekolah unggulan;</li>\n<li style="text-align: justify;">Meningkatkan peran serta masyarakat dan stake holder daerah guna peningkatan mutu pendidikan;</li>\n<li style="text-align: justify;">Mengembangkan sikap peduli terhadap lingkungan melalui program kebersihan lingkungan, pengelolaan sampah, gerakan penghijauan (green school), dan gerakan hemat energi;</li>\n<li style="text-align: justify;">Menciptakan sekolah yang berwawasan 7 K.</li>\n<li style="text-align: justify;">Membantu pemerintah daerah dalam memepersiapkan sumber daya manusia yang mampu berkompetisi sesuai dengan kebutuhan daerah.</li>\n</ol>'),
(6, 'Tujuan', 'Tujuan SMA NEGERI 2 Mempawah', '<h1><img src="../../system/application/views/gambar/621902-kepala-sekolah.jpg.jpg" alt="" width="602" height="343" /></h1>\n<h1>A. Tujuan Sekolah</h1>\n<ol>\n<li style="text-align: justify;">Menghasilkan lulusan SMA yang memiliki semangat nasionalisme dan patriotisme serta kepedulian sehingga sanggup menjadi warga masyarakat yang biasa hidup berdampingan secara damai dan harmonis dalam suasana keberagaman etnis, agama, dan sosial budaya;</li>\n<li style="text-align: justify;">Menumbuhkan budaya senyum, sapa, dan santun (3S) kepada seluruh warga sekolah;</li>\n<li style="text-align: justify;">Memiliki dan mengoptimalkan tenaga pendidik dan kependidikan sesuai dengan bidang keahliannya;</li>\n<li style="text-align: justify;">Memiliki dan mengembangkan sarana dan prasarana berupa ruang belajar yang representative, kondusif sehingga tercipta suasana aman dan nyaman bagi guru dan peserta didik.</li>\n<li style="text-align: justify;">Memiliki dan mengembangkan perpustakaan sebaga</li>\n<li style="text-align: justify;">Dapat meluluskan siswa kelas XII, baik program IPA maupun IPS 100% dengan kenaikan nilai minimal 0,25 dari tahun sebelumnya;</li>\n<li style="text-align: justify;">i pusat referensi guru dan siswa yang representatif dalam menunjang pelaksanaan proses belajar mengajar;</li>\n<li style="text-align: justify;">Memiliki dan mengembangkan sarana pengembangan kreasi seni siswa dengan mengadakan alat-alat kesenian siswa sehingga mampu prestasi di bidang seni dapat diunggulkan minimal di tingkat Kabupaten;</li>\n<li style="text-align: justify;">Memiliki dan mengembangkan sarana dan prasarana pendukung berupa Laboratorium Fisika, Kimia, dan Biologi untuk melaksanakan proses pembelajaran yang kontekstual (CTL);</li>\n<li style="text-align: justify;">Memiliki dan mengembangkan Laboratorium Komputer dan Internet dalam rangka menghadapi tuntutan era globalisasi;</li>\n<li style="text-align: justify;">Memiliki dan mengembangkan sarana dan prasarana kegiatan ekstrakurikuler untuk mengembangkan bakat siswa;</li>\n<li style="text-align: justify;">Meningkatkan profesionalisme guru melalui kegiatan pengembangan profesi;</li>\n<li style="text-align: justify;">Menciptakan suasana sekolah yang aman, sehat, rindang, dan indah (ASRI);</li>\n<li style="text-align: justify;">Meningkatkan kerjasama dengan sekolah lain dalam rangka peningkatan mutu sekolah;</li>\n<li style="text-align: justify;">Meningkatkan kerjasama dengan orang tua, komite sekolah, dan stake holder pusat maupun daerah dalam rangka meningkatkan mutu pendidikan;</li>\n<li style="text-align: justify;">Membantu pemerintah daerah dalam menciptakan sumber daya manusia Kabupaten Pontianak yang bermutu dan berdaya saing baik secara lokal, nasional, maupun global.</li>\n</ol>\n<p>&nbsp;</p>\n<h1 style="text-align: justify;">B. Identifikasi Tantangan Nyata yang Dihadapi Sekolah</h1>\n<ol style="text-align: justify;">\n<li>Kegiatan proses belajar mengajar belum optimal;</li>\n<li>Perolehan nilai Ujian Nasional siswa program IPA maupun IPS belum mencapai rata-rata 7,50;</li>\n<li>Pelaksanaan pendidikan kecakapan hidup (Life Skill) berupa Mulok Pertanian dan Komputer belum dilaksanakan secara optimal;</li>\n<li>Kegiatan ekstrakurikuler olahraga belum dapat dilaksanakan secara optimal;</li>\n<li>Kegiatan di bidang seni belum dapat dilaksanakan secara optimal;</li>\n<li>Kegiatan ekstrakurikuler Pramuka, PMR, Paskibra, UKS, dan Mading perlu ditingkatkan.</li>\n<li>Struktur Organisasi dan Ketatalaksanaan Sekolah perlu ditingkatkan;</li>\n<li>Perlunya penambahan sarana dan prasarana belajar berupa ruang belajar (RKB), Laboratorium, WC, Gudang, Ruang Koperasi Siswa, dan Gallery Seni / Ruang Ekspresi Siswa;</li>\n<li>Kurangnya tenaga pendidik dan kependidikan;</li>\n<li>Belum optimalnya pelaksanaan Budaya Sekolah;</li>\n<li>Rendahnya partisipasi masyarakat dalam pengelolaan sekolah;</li>\n<li>Belum mampu menjuarai Olimpiade Tingkat Provinsi</li>\n</ol>\n<p style="text-align: justify;">&nbsp;</p>\n<h1 style="text-align: justify;">C. Sasaran/Tujuan Situasional Sekolah</h1>\n<ol>\n<li style="text-align: justify;">Meningkatkan daya serap mata pelajaran baik yang umum, maupun mata pelajaran yang diujikan secara nasional;</li>\n<li style="text-align: justify;">Meningkatkan rata - rata Nilai Ujian Akhir Nasional untuk Jurusan IPAdan IPS mencapai 7,50;</li>\n<li style="text-align: justify;">Siswa&nbsp;&nbsp; memiliki&nbsp;&nbsp; bekal berupa keterampilan pertanian dan&nbsp;&nbsp; komputer yang dapat digunakan apabila terjun ke masyarakat;</li>\n<li style="text-align: justify;">Mampu mengikuti&nbsp;&nbsp; dan&nbsp;&nbsp; menjuarai invitasi Bola Voli, Sepak Takraw, Sepak Bola, dan Tenis Meja Tingkat Kabupaten;</li>\n<li style="text-align: justify;">Memiliki Tim Kesenian dan Group yang dapat dipresentasikan pada acara perpisahan dan perlombaan seni;</li>\n<li style="text-align: justify;">Peningkatan kedisplinan, pengetahuan, dan kreativitas siswa;</li>\n<li style="text-align: justify;">Memberikan pengetahuan dan pengalaman kepada guru dan siswa dalam berorganisasi guna meningkatkan kinerja sekolah;</li>\n<li style="text-align: justify;">Memberikan pelayanan yang optimal guna meningkatkan mutu pendidikan, kretaivitas guru, dan kepercayaan masyarakat kepada sekolah;</li>\n<li style="text-align: justify;">Memberikan layanan yang optimal.</li>\n<li style="text-align: justify;">Terbentuknya budaya bersih, sehat, tertib, jujur, dan displin dalam diri siswa, guru, karyawan sekolah;</li>\n<li style="text-align: justify;">Meningkatkan partisipasi dan dukungan orang tua, kepedulian sosial warga sekolah, dan terciptanya suasana sekolah yang kondusif;</li>\n<li style="text-align: justify;">Memiliki Tim Olimpiade Sains dan mampu menjuarai tingkat Provinsi</li>\n</ol>\n<p>&nbsp;</p>'),
(7, 'struktur', 'Struktur Organisasi SMA Negeri 2 Mempawah', '<p><img src="../../system/application/views/gambar/247521-struktur.jpg.jpg" alt="" width="613" height="326" /></p>\n<h3>Keterangan :</h3>\n<p>------------------------------- KOMANDO</p>\n<p>___________________ KONSULTASI</p>'),
(8, 'dataguru', 'Data Guru dan TU', 'Data belum terisi'),
(9, 'prakarya', 'Prakarya Siswa', 'Data belum terisi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
