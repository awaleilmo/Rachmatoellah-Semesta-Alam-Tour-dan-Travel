-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 02:32 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bungsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `priviledge` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `priviledge`, `created_at`, `updated_at`) VALUES
(2, 'admin', '$2y$10$ycZ.gETLztOmh/qO.IUyTewhxCdxHLSXsuWw.lrPjs0x4evsexeFW', 1, '2019-01-28 07:10:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, '45DSC_0467.jpg', 'Mesjid Selemiyye, Edirne Turkey', '2019-01-28 10:49:17', '0000-00-00 00:00:00'),
(9, '69DSC_0277.jpg', 'City tour ke gunung Uhud Madinah', '2019-01-28 10:49:49', '0000-00-00 00:00:00'),
(10, '45DSC_0467-1.jpg', 'Arrival Umrah', '2019-01-28 10:50:38', '0000-00-00 00:00:00'),
(11, '33DSC_0622.jpg', 'Berpose di Troy, Cannakale Turkey', '2019-01-28 10:51:04', '0000-00-00 00:00:00'),
(12, '97DSC_1421.jpg', 'Persiapan Umrah di Masjid Bir Ali', '2019-01-28 10:51:29', '0000-00-00 00:00:00'),
(13, '5DSC_1110.jpg', 'Group RSA tour di taman Bunga Tulip di Emirgan Park Istambul Turkey', '2019-01-28 10:51:48', '0000-00-00 00:00:00'),
(14, '86DSC_1262.jpg', 'Di Taman Mesjid Biru Istambul', '2019-01-28 10:52:14', '0000-00-00 00:00:00'),
(15, '2DSC_1358.jpg', 'Miqat di Mesjid Bir Ali, Madinah', '2019-01-28 10:52:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE IF NOT EXISTS `harga` (
  `id` int(11) NOT NULL,
  `promo` date NOT NULL,
  `quad` int(200) NOT NULL,
  `triple` int(100) NOT NULL,
  `dbl` int(100) NOT NULL,
  `ket` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id`, `promo`, `quad`, `triple`, `dbl`, `ket`, `created_at`, `updated_at`) VALUES
(4, '2019-02-28', 24000000, 24600000, 25600000, 'Pesawat: Garuda Indonesia/ Saudia Airlines (GA/SV)\n\nHotel Madinah: Royal Andalus (*3)\n\nHotel Mekah: AlMarsa AlJariyah(*3)               \n             ', '2019-01-31 06:55:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `tanggal`, `jumlah`, `created_at`, `updated_at`) VALUES
(3, '2019-02-28', '127', '2019-02-01 16:21:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE IF NOT EXISTS `kuisioner` (
  `id` int(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `pengeluaran` varchar(100) NOT NULL,
  `k1` varchar(10) NOT NULL,
  `k2` varchar(10) NOT NULL,
  `k3` varchar(10) NOT NULL,
  `k4` varchar(10) NOT NULL,
  `k5` varchar(10) NOT NULL,
  `k6` varchar(10) NOT NULL,
  `k7` varchar(10) NOT NULL,
  `k8` varchar(10) NOT NULL,
  `k9` varchar(10) NOT NULL,
  `k10` varchar(10) NOT NULL,
  `k11` varchar(10) NOT NULL,
  `k12` varchar(10) NOT NULL,
  `k13` varchar(10) NOT NULL,
  `k14` varchar(10) NOT NULL,
  `k15` varchar(10) NOT NULL,
  `k16` varchar(10) NOT NULL,
  `k17` varchar(10) NOT NULL,
  `k18` varchar(10) NOT NULL,
  `k19` longtext NOT NULL,
  `k20` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuisioner`
--

INSERT INTO `kuisioner` (`id`, `nama`, `alamat`, `jk`, `umur`, `pendidikan`, `pekerjaan`, `pengeluaran`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `k9`, `k10`, `k11`, `k12`, `k13`, `k14`, `k15`, `k16`, `k17`, `k18`, `k19`, `k20`, `created_at`, `updated_at`) VALUES
(1, 'awaludin', 'cikeusik, pandeglang, banten', 'Laki - Laki', '20 - 25', 'SLTA', 'Swasta', '< 2 - 3 juta', '1', '2', '3', '4', '5', '4', '3', '2', '1', '2', '3', '4', '5', '4', '3', '2', '1', '2', 'udh pernah', 'lu ae', '2019-02-03 19:33:05', '0000-00-00 00:00:00'),
(2, 'Agis Maulana', 'rangkas bitung, lebah', 'Laki - Laki', '20 - 25', 'Sarjana', 'Wiraswasta', '< 2 juta', '2', '3', '4', '5', '4', '3', '2', '1', '2', '3', '4', '5', '4', '3', '2', '1', '2', '3', 'a', 'aaaa', '2019-02-03 19:34:17', '0000-00-00 00:00:00'),
(3, 'Wahyu', 'ciracas,kota serang', 'Laki - Laki', '20 - 25', 'Sarjana', 'Wiraswasta', '< 2 - 3 juta', '3', '4', '5', '4', '3', '2', '1', '2', '3', '4', '5', '4', '3', '2', '1', '2', '3', '4', 'asd', 'asdas', '2019-02-03 19:35:13', '0000-00-00 00:00:00'),
(4, 'erni nuraini', 'ciracas,kota serang', 'Perempuan', '20 - 25', 'Sarjana', 'Swasta', '< 2 juta', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '2', '3', '4', '3', 'asdas', 'bkch', '2019-02-03 19:36:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id` int(11) NOT NULL,
  `sangatsetuju` int(11) NOT NULL,
  `setuju` int(11) NOT NULL,
  `ragu` int(11) NOT NULL,
  `tidaksetuju` int(11) NOT NULL,
  `sangattidaksetuju` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `sangatsetuju`, `setuju`, `ragu`, `tidaksetuju`, `sangattidaksetuju`, `created_at`, `updated_at`) VALUES
(1, 7, 30, 15, 14, 6, '2019-02-03 19:40:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `pesan` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `pesan`, `created_at`, `updated_at`) VALUES
(5, 'samsudin', 'bagai mana cara pemesanan nya', '2019-02-05 09:15:32', '0000-00-00 00:00:00'),
(6, 'admin', 'klik saja lalu kirim kan', '2019-02-05 09:16:25', '0000-00-00 00:00:00'),
(7, 'admin', 'Ambil Paket Yang sesuai', '2019-02-05 09:23:02', '0000-00-00 00:00:00'),
(8, 'awal', 'dddddddddd', '2019-02-07 07:51:53', '0000-00-00 00:00:00'),
(9, 'admin', 'kl', '2019-02-18 13:19:54', '0000-00-00 00:00:00'),
(10, 'admin', 'kl', '2019-02-18 13:20:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin_log`
--

CREATE TABLE IF NOT EXISTS `tb_admin_log` (
  `id` int(11) NOT NULL,
  `tgl` datetime DEFAULT NULL,
  `expired` datetime DEFAULT NULL,
  `token` varchar(40) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `useragent` varchar(150) DEFAULT NULL,
  `stat` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin_log`
--

INSERT INTO `tb_admin_log` (`id`, `tgl`, `expired`, `token`, `username`, `ip`, `useragent`, `stat`) VALUES
(25, '2019-01-28 08:13:05', '0000-00-00 00:00:00', '', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 9),
(26, '2019-01-28 08:13:49', '2019-01-28 14:13:49', '9b0b7ef2c15e1abb8288cf79a449c72f41bdab57', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(27, '2019-01-28 08:14:30', '2019-01-28 14:14:30', '4be92d148d063a9ff94740cd512a2ec5be5ae030', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(28, '2019-01-28 08:16:11', '2019-01-28 14:16:11', '3852c8b349e6a5411f26653ba07640d9a5763c31', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(29, '2019-01-28 08:31:10', '2019-01-28 14:31:10', 'cb22091bee7083e08895336ee8772bf202ee1264', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(30, '2019-01-28 08:32:36', '2019-01-28 14:32:36', '0d3c7ecf408a70102e33aa3fec19f70c2313ebf1', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(31, '2019-01-28 10:45:04', '2019-01-28 16:45:04', '72888112a4492205fa5784db590ce45f9e86f7cf', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(32, '2019-01-28 10:45:16', '2019-01-28 16:45:16', '55fdaf0b004527330e6d625f2ccb1fa4f40f4579', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(33, '2019-01-28 11:48:15', '2019-01-28 17:48:15', '888d9ff76c067aac62c5979e542f6c8af83a0422', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(34, '2019-01-28 12:32:08', '2019-01-28 18:32:08', '2ced9754a9b331f5746ebdcbc5f46a4c387d5c32', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(35, '2019-01-28 17:19:15', '2019-01-28 23:19:15', '985cf1ff733c4bb78c4a81b90c34c6944d9cec10', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(36, '2019-01-28 17:19:15', '2019-01-28 23:19:15', '1f88184b52decd881abdcd8c97e84d472c532386', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(37, '2019-01-29 16:56:36', '2019-01-29 22:56:36', '703247092424a9a24b809d82b9a234f2e98c921e', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(38, '2019-01-29 17:23:31', '2019-01-29 23:23:31', '573ccd26b054fdf665eb7242ca8dd3007dbddd75', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(39, '2019-01-29 18:10:28', '2019-01-30 00:10:28', '979d29aa7eb1e8b0853b46ab898ff8f041f9a7d8', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(40, '2019-01-29 19:53:28', '2019-01-30 01:53:28', '34227bcf339a167b2c7314e75f8952200fcc90d2', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(41, '2019-01-30 08:52:54', '2019-01-30 14:52:54', 'a7bdbe5a4a2014f0228a7703bb6f7430ad31b616', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(42, '2019-01-31 07:33:46', '2019-01-31 13:33:46', 'a016c820984ee99ac17ef8869e2bd0675fe76764', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(43, '2019-01-31 09:43:55', '2019-01-31 15:43:55', '8e2b9671db0d6b3596144d1b1f40d726511dde39', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116 (Edition Campaign 34)', 1),
(44, '2019-02-01 17:04:44', '2019-02-01 23:04:44', '93a521247867dd3670ee91a47ae2530ea7568341', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36 OPR/47.0.2631.39 (Edition Campaign 34)', 1),
(45, '2019-02-03 22:28:45', '2019-02-04 04:28:45', '660f458ec7337996c4d7dc1a908f7c268a774aba', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36 OPR/47.0.2631.39 (Edition Campaign 34)', 1),
(46, '2019-02-05 09:27:10', '2019-02-05 15:27:10', '4600b5a57ae0f80be74214e807e3ff5e8a38f5d6', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.53', 1),
(47, '2019-02-05 10:16:06', '2019-02-05 16:16:06', 'ec222c1bc91101435503c187733f6af9f76662da', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.53', 1),
(48, '2019-02-07 08:54:19', '2019-02-07 14:54:19', '5e5662997d60d467dcaad5e636846c677ed83043', 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.53', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin_log`
--
ALTER TABLE `tb_admin_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_admin_log`
--
ALTER TABLE `tb_admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
