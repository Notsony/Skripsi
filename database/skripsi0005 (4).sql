-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Jul 2019 pada 15.49
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi0005`
--
CREATE DATABASE IF NOT EXISTS `skripsi0005` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `skripsi0005`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_pnl`
--

DROP TABLE IF EXISTS `daftar_pnl`;
CREATE TABLE IF NOT EXISTS `daftar_pnl` (
`id` int(11) NOT NULL,
  `nik` char(10) NOT NULL,
  `kode_pnl` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_pnl`
--

INSERT INTO `daftar_pnl` (`id`, `nik`, `kode_pnl`) VALUES
(1, '0509078402', 1),
(2, '164KE282', 1),
(3, '022810741', 1),
(4, '164KE282', 2),
(5, '164KE282', 3),
(6, '0503017001', 4),
(7, '022810741', 3),
(8, '0503017001', 5),
(9, '0503017001', 6),
(10, '0509078402', 8),
(11, '164KE282', 9),
(12, '0509078402', 10),
(13, '164KE282', 11),
(14, '022810741', 14),
(15, '022810741', 15),
(16, '022810741', 16),
(17, '022810741', 17),
(18, '0525016601', 18),
(19, '0525016601', 19),
(20, '0505078102', 20),
(21, '0505078102', 21),
(22, '0511127103', 23),
(23, '0511127103', 24),
(24, '0511127103', 25),
(25, '0511127103', 26),
(26, '0511127103', 27),
(27, '0505078102', 28),
(28, '0505078102', 29),
(29, '0505078102', 30),
(30, '0511057301', 31),
(31, '0511057301', 32),
(32, '0511057301', 33),
(33, '0511057301', 34),
(34, '022810741', 35),
(35, '0509078402', 36),
(36, '0511057301', 37),
(37, '0518017901', 37),
(38, '0518017901', 39),
(39, '0518017901', 40),
(40, '0511057301', 41),
(41, '0509078402', 18),
(42, '022810741', 8),
(43, '0509078402', 14),
(44, '0511057301', 42),
(45, '0511127103', 43),
(46, '0518017901', 44),
(47, '022810741', 45),
(48, '0509078402', 49),
(49, '0509078402', 51),
(50, '0509078402', 52),
(51, '0525016601', 53);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE IF NOT EXISTS `dosen` (
  `nik` char(10) NOT NULL,
  `nm_dosen` varchar(50) NOT NULL,
  `prodi` char(16) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bd_minat` varchar(30) NOT NULL,
  `password` char(10) NOT NULL,
  `foto` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nik`, `nm_dosen`, `prodi`, `status`, `bd_minat`, `password`, `foto`) VALUES
('022810741', 'Rosa Delima S.Kom., M.Kom.', 'Informatika', 'Dosen', 'Analisis', '022810741', '67_Rosa-Delima_FTI-20.jpg'),
('0503017001', 'Yetli Oeslan S.Kom., M.T.', 'Sistem Informasi', 'Dosen', 'Analisis', '0503017001', '29_Yetli-Oslan_FTI-35.jpg'),
('0505078102', 'Yuan Lukito, S.Kom., M.Cs.', 'Informatika', 'Dosen', 'Programming', '0505078102', '72_Yuan_FTI-22.jpg'),
('0509078402', 'Halim Budi Santoso S.Kom., MBA., M.T.', 'Sistem Informasi', 'Dosen', 'Programming', '0509078402', '12_Halim-Budi_FTI_SI-3.jpg'),
('0511057301', 'Budi Susanto, S.Kom., M.T.', 'Informatika', 'Dekan', 'Programming', '0511057301', '24_Budi-Susanto_FTI-32.jpg'),
('0511127103', 'Restyandito, S.Kom, MSIS, Ph.D', 'Informatika', 'Dosen', 'Programming', '0511127103', '15_Restyandito_FTI-29.jpg'),
('0518017901', 'Gloria Virginia, S.Kom., MAI, Ph.D.', 'Informatika', 'Kaprodi', 'Programming', '0518017901', 'GV_ProfilePict_rev_5.jpg'),
('0525016601', 'Drs. Jong Jek Siang., M.Sc', 'Sistem Informasi', 'Kaprodi', 'Statistika', '0525016601', '50_JJ-Siay_FTI-38.jpg'),
('164KE282', 'Argo Wibowo S.T., M.T.', 'Sistem Informasi', 'Dosen', 'Programming', '164KE282', '1_Argo-Wibowo_FTI_SI-1.jpg'),
('9999999999', 'Sony Mandala', 'Sistem Informasi', 'Admin', 'Analisis', '9999999999', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

DROP TABLE IF EXISTS `laporan`;
CREATE TABLE IF NOT EXISTS `laporan` (
`kode_pnl` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `smb_dana` char(10) NOT NULL,
  `jml_dana` int(13) NOT NULL,
  `proposal` char(1) NOT NULL,
  `akhir` char(1) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`kode_pnl`, `judul`, `smb_dana`, `jml_dana`, `proposal`, `akhir`, `tahun`) VALUES
(1, 'PENGEMBANGAN SISTEM INFORMASI AKTIVITAS PERTANIAN UNTUK SISTEM INFORMASI PERTANIAN TERINTEGRASI\r\n\r\n\r', 'LPPM', 7800000, 'V', 'V', 2017),
(2, 'PENGELOLAAN APLIKASI GAME SMARTPHONE TCG UNTUK PEMBELAJARAN MAHASISWA', 'FTI', 10000000, '', 'V', 2016),
(3, 'PENGEMBANGAN SISTEM PELAPORAN BERSTANDAR AKUNTANSI PADA SISTEM INFORMASI KEUANGAN GEREJA\r\n\r\n', 'FTI', 5000000, 'V', 'V', 2017),
(4, 'GENERATOR JADWAL KULIAH DENGAN TEKNIK PENCARIAN DAN PENYARINGAN\r\n\r\n\r\n', 'LPPM', 7850000, 'V', '', 2017),
(5, 'PROSES ETL (EXTRACT TRANSFORMATION LOADING) DATA WAREHOUSE UNTUK PENINGKATAN KINERJA BIODATA DALAM M', 'LPPM', 1000000, '', 'V', 2016),
(6, 'SISTEM INFORMASI E-CLASS', 'FTI', 3000000, '', 'V', 2016),
(8, 'PENGEMBANGAN PORTAL WEB SISTEM INFORMASI PERTANIAN TERINTEGRASI BERBASIS LAYANAN\r\n\r\n', 'LPPM', 11918000, 'V', 'V', 2017),
(9, 'PENGEMBANGAN SISTEM INFORMASI PELATIHAN DAN PELAYANAN UNTUK SISTEM INFORMASI PERTANIAN TERINTEGRASI\r', 'LPPM', 6942000, 'V', 'V', 2017),
(10, 'PERANCANGAN DISASTER RECOVER PLAN (DRP) DI UNIVERSITAS KRISTEN DUTA WACANA (UKDW) YOGYAKARTA', 'FTI', 5000000, 'V', 'V', 2017),
(11, 'PENGEMBANGAN SISTEM GAME MOBILE', 'LPPM', 7000000, '', 'V', 2016),
(13, 'PENGEMBANGAN SISTEM PELAPORAN BERSTANDAR AKUNTANSI PADA SISTEM INFORMASI KEUANGAN GEREJA', 'LPPM', 6000000, 'V', 'V', 2017),
(14, 'PENGEMBANGAN BLUEPRINT SISTEM INFORMASI PERTANIAN TERINTEGRASI DENGAN PENDEKATAN ENTERPRISE ARCHITEC', 'FTI', 150000000, '', 'V', 2016),
(15, 'PENERAPAN ALGORITMA A*, IDA*, JUMP POINT SEARCH, PEA*, THETA*, DAN FIELD D*PADA PERMAINAN PACMAN', 'FTI', 2000000, 'V', 'V', 2016),
(16, 'STUDI AWAL IDENTIFIKASI PENGGUNAAN TEKNOLOGI INFORMASI DI BIDANG PERTANIAN MENGGUNAKAN PENDEKATAN PARTISIPATIF', 'FTI', 10365000, 'V', 'V', 2015),
(17, 'SISTEM INFORMASI KEUANGAN PADA GEREJA KRISTEN JAWA DAN GEREJA KRISTEN INDONESIA\r\n', 'LPPM', 10000000, 'V', 'V', 2015),
(18, 'ANALISIS IPK MAHASISWA TAHUN PERTAMA DAN KORELASINYA DENGAN KEBERHASILAN STUDI. STUDI KASUS: MAHASISWA PROGRAM STUDI SISTEM INFORMASI UKDW', 'FTI', 7000000, '', 'V', 2016),
(19, 'ANALISIS FAKTOR - FAKTOR YANG MEMPENGARUHI MOTIVASI BELAJAR DAN KORELASINYA TERHADAP PRESTASI BELAJAR', 'FTI', 10000000, '', 'V', 2015),
(20, 'PERANCANGAN DAN IMPLEMENTASI SISTEM PENGATURAN ALAT ELEKTRONIK TERPUSAT BERBASIS IOT', 'FTI', 5000000, 'V', 'V', 2017),
(21, 'DETEKSI SPAM PADA KOMENTAR INSTAGRAM BERBAHASA INDONESIA', 'FTI', 8005000, 'V', '', 2017),
(23, 'TINGKAT PEMANFAATAN MEDIA SOSIAL PENELITI UNTUK KOMUNIKASI ILMIAH', 'FTI', 3727000, 'V', 'V', 2017),
(24, 'PENGARUH UKURAN LAYAR DAN JENIS INTERAKSI PADA PIRANTI BERGERAK', 'FTI', 8000000, 'V', '', 2017),
(25, 'ADOPSI TEKNOLOGI OLEH ORANG LANJUT USIA DI YOGYAKARTA', 'FTI', 8000000, 'V', 'V', 2017),
(26, 'RANCANG BANGUN DATASET STATUS DAN KOMENTAR TERHADAP CALON PRESIDEN REPUBLIK INDONESIA 2014 DARI SITUS FACEBOOK', 'FTI', 11600000, '', 'V', 2016),
(27, 'EVALUASI DESAIN ARSITEKTUR APLIKASI MULTIENANCY BERBASIS KOMPUTASI AWAN', 'FTI', 7000000, '', 'V', 2016),
(28, 'KLASIFIKASI SENTIMEN MENGGUNAKAN ALGORITMA NAÏVE BAYES PADA DATASET KOMENTAR FACEBOOK PAGE CALON PRESIDEN INDONESIA', 'LPPM', 5940000, '', 'V', 2016),
(29, 'IMPLEMENTASI CROWDSOURCED LABELLING BERBASIS WEB MENGGUNAKAN METODE WEIGHTED MAJORITY VOTING', 'FTI', 10002500, 'V', 'V', 2015),
(30, 'KOMPARASI METODE K-NEAREST NEIGHBORS DAN NAÏVE BAYES DALAM INDOOR POSITIONING SYSTEM BERBASIS WIFI STUDI KASUS : RUANG PUBLIK DI UNIVERSITAS KRISTEN DUTA WACANA', 'FTI', 7625460, 'V', 'V', 2015),
(31, 'PEMODELAN LINKED OPEN DATA UNTUK MUSEUM-MUSEUM DI YOGYAKARTA', 'FTI', 2000000, 'V', 'V', 2015),
(32, 'IDENTIFIKASI DIGITAL LITERACY MASYARAKAT BANTUL DAERAH ISTIMEWA YOGYAKARTA', 'LPPM', 9819090, '', 'V', 2015),
(33, 'PENGKAJIAN DAN PENGEMBANGAN BIDANG PERPUSTAKAAN KAJIAN KATEGORI OBJEK BUDAYA YOGYAKARTA UNTUK YOGYASIANAA\r\n', 'FTI', 10000000, 'V', 'V', 2014),
(34, 'PEMODELAN DATA BERBASIS SEMANTIC WEB UNTUK KATALOG PERPUSTAKAAN', 'FTI', 8000000, 'V', 'V', 2014),
(35, 'PENERAPAN METODE CHILD CENTERED DESIGN UNTUK PEMBANGUNAN APLIKASI BAGI ANAK (SUB TOPIK: PENGUJIAN VALIDITAS APLIKASI)', 'FTI', 6770000, 'V', 'V', 2014),
(36, 'PENERAPAN TECHNOLOGY ACCEPTANCE MODEL UNTUK MENGETAHUI PERSEPSI PENGGUNA SISTEM INFORMASI STUDI KASUS: E-CLASS UNIVERSITAS KRISTEN DUTA WACANA\r\n', 'FTI', 8000000, '', 'V', 2014),
(37, 'ANALISIS DAFTAR KATA STOP WORD BAHASA INDONESIA BERDASAR KOLEKSI BERITA', 'FTI', 8000000, 'V', 'V', 2014),
(39, 'FRAMEWORK PENDUKUNG PROSES SELEKSI, KATEGORISASI, DAN ABSTRAKSI DALAM PENYUSUNAN RENCANA STRATEGI ORGANISASI', 'FTI', 8000000, '', 'V', 2014),
(40, 'PEMBANGUNAN TESAURUS BAHASA INDONESIA MENGGUNAKAN SIMPLE KNOWLEDGE ORGANIZATION SYSTEM', 'FTI', 5000000, '', 'V', 2015),
(41, 'JOGJASIANA PROTOTYPE : JOGJA IN JOGJA COLLECTION', 'FTI', 20000000, 'V', 'V', 2013),
(42, 'PENGEMBANGAN WEB PROFIL PROGRAM STUDI TEKNIK INFORMATIKA FAKULTAS TEKNOLOGI INFORMASI UNIVERSITAS KRISTEN DUTA WACANA YOGYAKARTA', 'FTI', 17700000, 'V', 'V', 2013),
(43, 'PERTIMBANGAN KEMAMPUAN KOGNITIF DALAM MERANCANG ANTARMUKA PENGGUNA BAGI PENGGUNA BUTA HURUF', 'FTI', 3000000, 'V', 'V', 2013),
(44, 'REPRESENTASI DOKUMEN BERBASIS LEXICON', 'FTI', 12000000, 'V', 'V', 2013),
(45, 'ANALISIS PENERAPAN METODE CERTAINTY FACTOR UNTUK PENANGANAN KETIDAKPASTIAN PADA SISTEM DIAGNOSIS PENYAKIT\r\n', 'FTI', 3000000, 'V', 'V', 2013),
(49, 'AUDIT TATA KELOLA SISTEM INFORMASI MENGGUNAKAN KERANGKA KERJA CONTROL OBJECTIVE FOR INFORMATION AND RELATED TECHNOLOGY (COBIT) STUDI KASUS: SISTEM INFORMASI KEUANGAN UNIVERSITAS KRISTEN DUTA WACANA', 'FTI', 10000000, '', 'V', 2015),
(51, 'TOUCH PANEL USABILITY UNTUK PENGGUNA APLIKASI MOBILE LANJUT USIA', 'FTI', 9000000, 'V', 'V', 2015),
(52, 'PENGENALAN KERIS JAWA MENGGUNAKAN METODE HIBRID DAN SIMILARITY', 'FTI', 5000000, '', 'V', 2015),
(53, 'Sistem Informasi Pembuatan Data Warehouse', 'FTI', 7000000, '', 'V', 2017),
(54, 'Sistem Informasi Rumah Sakit JIH', 'LPPM', 6000000, '', 'V', 2017);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_pnl`
--
ALTER TABLE `daftar_pnl`
 ADD PRIMARY KEY (`id`), ADD KEY `nik` (`nik`), ADD KEY `kode_pnl` (`kode_pnl`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
 ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
 ADD PRIMARY KEY (`kode_pnl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_pnl`
--
ALTER TABLE `daftar_pnl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
MODIFY `kode_pnl` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_pnl`
--
ALTER TABLE `daftar_pnl`
ADD CONSTRAINT `daftar_pnl_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `dosen` (`nik`),
ADD CONSTRAINT `daftar_pnl_ibfk_2` FOREIGN KEY (`kode_pnl`) REFERENCES `laporan` (`kode_pnl`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;