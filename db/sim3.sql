-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Jul 2017 pada 16.55
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sim3_admin`
--

CREATE TABLE `sim3_admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sim3_admin`
--

INSERT INTO `sim3_admin` (`username`, `password`) VALUES
('aoko', '$2y$10$nNCtfJrRtynbBHrv0HHyDec8sQOgpm9J76FQEF9i1VptgpAI6.qsG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sim3_angkatan`
--

CREATE TABLE `sim3_angkatan` (
  `id` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sim3_angkatan`
--

INSERT INTO `sim3_angkatan` (`id`, `tahun`) VALUES
(1, 2006),
(2, 2007),
(3, 2008),
(4, 2009),
(5, 2010),
(6, 2011),
(7, 2012),
(8, 2014),
(9, 2015),
(10, 2016),
(11, 2017);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sim3_bio`
--

CREATE TABLE `sim3_bio` (
  `nama` varchar(100) DEFAULT NULL,
  `panggilan` varchar(100) DEFAULT NULL,
  `nrp` varchar(10) NOT NULL,
  `angkatan` varchar(4) DEFAULT NULL,
  `departemen` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `ttl` varchar(100) DEFAULT NULL,
  `no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `asal` varchar(300) DEFAULT NULL,
  `kos` varchar(300) DEFAULT NULL,
  `pesantren` varchar(100) DEFAULT NULL,
  `alamatpesantren` varchar(255) DEFAULT NULL,
  `tk` varchar(100) DEFAULT NULL,
  `sd` varchar(100) DEFAULT NULL,
  `smp` varchar(100) DEFAULT NULL,
  `sma` varchar(100) DEFAULT NULL,
  `ayah` varchar(100) DEFAULT NULL,
  `ibu` varchar(100) DEFAULT NULL,
  `lastlogin` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sim3_cp`
--

CREATE TABLE `sim3_cp` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sim3_cp`
--

INSERT INTO `sim3_cp` (`id`, `nama`, `no`) VALUES
(0, 'Jauhar Nafis', '+6285655267983');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sim3_departemen`
--

CREATE TABLE `sim3_departemen` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fakultas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sim3_departemen`
--

INSERT INTO `sim3_departemen` (`id`, `nama`, `fakultas`) VALUES
(2, 'Elektro', 4),
(5, 'Informatika', 3),
(6, 'Statistika', 1),
(7, 'Matematika', 1),
(8, 'Biologi', 1),
(9, 'Kimia', 1),
(10, 'Fisika', 1),
(11, 'Teknik Mesin', 5),
(12, 'Teknik Fisika', 5),
(13, 'Teknik Industri', 5),
(14, 'Teknik Material dan Metalurgi', 5),
(15, 'Teknik Kimia', 5),
(16, 'Teknik Sipil', 6),
(17, 'Arsitektur', 6),
(18, 'Teknik Lingkungan', 6),
(19, 'Teknik Geomatika', 6),
(20, 'Desain Produk Industri', 6),
(21, 'Perencanaan Wilayah dan Kota', 6),
(22, 'Teknik Geofisika', 6),
(23, 'Desain Interior', 6),
(24, 'Teknik Perkapalan', 7),
(25, 'Teknik Sistem Perkapalan', 7),
(26, 'Teknik Kelautan', 7),
(27, 'Transportasi Laut', 7),
(28, 'Teknik Informatika', 8),
(29, 'Sistem Informasi', 8),
(30, 'Teknik Elektro', 9),
(31, 'Teknik Biomedik', 9),
(32, 'Teknik Komputer', 9),
(33, 'Manajemen Bisnis', 10),
(34, 'Manajemen Teknologi', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sim3_fakultas`
--

CREATE TABLE `sim3_fakultas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sim3_fakultas`
--

INSERT INTO `sim3_fakultas` (`id`, `nama`) VALUES
(1, 'Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA)'),
(5, 'Fakultas Teknologi Industri (FTI)'),
(6, 'Fakultas Teknik Sipil dan Perencanaan (FTSP)'),
(7, 'Fakultas Teknologi Kelautan (FTK)'),
(8, 'Fakultas Teknologi Informasi (FTIF)'),
(9, 'Fakultas Teknologi Elektro (FTE)'),
(10, 'Fakultas Bisnis dan Manajemen Teknologi (FBMT)'),
(11, 'Fakultas Vokasi (FV)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sim3_log`
--

CREATE TABLE `sim3_log` (
  `id` int(11) NOT NULL,
  `nrp` varchar(20) NOT NULL,
  `log` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sim3_user`
--

CREATE TABLE `sim3_user` (
  `nrp` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sim3_angkatan`
--
ALTER TABLE `sim3_angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sim3_bio`
--
ALTER TABLE `sim3_bio`
  ADD KEY `NRP` (`nrp`);

--
-- Indexes for table `sim3_cp`
--
ALTER TABLE `sim3_cp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sim3_departemen`
--
ALTER TABLE `sim3_departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sim3_fakultas`
--
ALTER TABLE `sim3_fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sim3_log`
--
ALTER TABLE `sim3_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sim3_user`
--
ALTER TABLE `sim3_user`
  ADD PRIMARY KEY (`nrp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sim3_angkatan`
--
ALTER TABLE `sim3_angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sim3_departemen`
--
ALTER TABLE `sim3_departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `sim3_fakultas`
--
ALTER TABLE `sim3_fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sim3_log`
--
ALTER TABLE `sim3_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
