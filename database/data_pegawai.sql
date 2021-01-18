-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 09:26 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(20) NOT NULL,
  `nm_jabatan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`) VALUES
('JAB001', 'Direktur Utama'),
('JAB002', 'Kepala Bagian'),
('JAB003', 'Kasubag'),
('JAB004', 'Kepala Bidang'),
('JAB005', 'Kasi'),
('JAB006', 'Staff'),
('JAB007', 'Kepala Ruang'),
('JAB008', 'Kepala Installasi');

-- --------------------------------------------------------

--
-- Table structure for table `jjg`
--

CREATE TABLE `jjg` (
  `id` int(10) NOT NULL,
  `nm_jjg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jjg`
--

INSERT INTO `jjg` (`id`, `nm_jjg`) VALUES
(1, 'SD'),
(2, 'SDIT'),
(3, 'SMP'),
(4, 'MTs'),
(5, 'SMA'),
(6, 'SMK'),
(7, 'MAN'),
(8, 'D-2'),
(9, 'D-3'),
(10, 'D-4'),
(11, 'S-1'),
(12, 'S-2'),
(13, 'S-3');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_kel` varchar(20) NOT NULL,
  `no_pegawai` varchar(20) NOT NULL,
  `nm_kel` varchar(35) NOT NULL,
  `jk_kel` enum('Laki-laki','Perempuan','','') NOT NULL,
  `tpt_lhr_kel` varchar(32) NOT NULL,
  `tgl_lhr_kel` date NOT NULL,
  `agama_kel` varchar(20) NOT NULL,
  `alamat_kel` varchar(50) NOT NULL,
  `no_hp_kel` varchar(15) NOT NULL,
  `hubungan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id_kel`, `no_pegawai`, `nm_kel`, `jk_kel`, `tpt_lhr_kel`, `tgl_lhr_kel`, `agama_kel`, `alamat_kel`, `no_hp_kel`, `hubungan`) VALUES
('', '16102056', '', 'Perempuan', '', '0000-00-00', 'Islam', '', '', ''),
('00032', '16102011', 'Zefanya', 'Perempuan', 'Cilacap', '1995-11-20', 'Islam', 'Jl. Apel no 211', '08773526374', 'Adik Kandung'),
('00037', '16102111', 'Qory', 'Perempuan', 'Cilacap', '1993-06-10', 'Islam', 'Purwokerto, Banyumas', '083347264788', 'Kakak Kandung'),
('01', '112508378', 'Sumarno', 'Laki-laki', 'Cilacap', '1959-08-06', 'islam', 'Jalan Mangga no 129', '087223667126', 'orangtua'),
('02', '11212200420', 'Agus', 'Laki-laki', 'Banyumas', '1969-08-06', 'islam', 'Jl. Mangga no 34', '089837665890', 'orangtua'),
('03', '11212200421', 'Sukarni', 'Perempuan', 'Jakarta', '1964-08-09', 'Islam', 'Jakarta', '081823764990', 'Ibu'),
('04', '11212200430', 'Yossa', 'Laki-laki', 'Jakarta', '1964-08-29', 'Islam', 'Jakarta', '08187759984', 'Suami'),
('06', '11251100701', 'Linnn', 'Perempuan', 'Surabaya', '1984-05-23', 'Kristen', 'Surabaya', '087736725288', 'Istri'),
('07', '11251100702', 'Min', 'Laki-laki', 'Surabaya', '2019-08-02', 'Islam', 'Surabaya', '0877965443', 'Bapak'),
('08', '11251100703', 'Winda', 'Perempuan', 'Jakarta', '1985-08-14', 'Kristen', 'Jl. Diponegoro no 145', '08997765346', 'Istri'),
('09', '11251100704', 'Dina', 'Perempuan', 'Bandung', '1990-08-21', 'Islam', 'Jl. Melati no 45 ', '087456663123', 'Anak'),
('10', '11251100705', 'Bagus', 'Laki-laki', 'Pemalang', '1979-08-13', 'Islam', 'Jl. Matahari no 2', '081222776354', 'Suami'),
('11', '11251100712', 'Cindy', 'Perempuan', 'Cilacap', '1995-08-06', 'Kristen', 'Jl. Mawar no 98', '087765334234', 'Anak'),
('12', '11251100753', 'Yosi', 'Perempuan', 'Banyumas', '1989-08-02', 'Islam', 'Jl. Apel', '085662445378', 'Istri'),
('13', '11251100759', 'Ani', 'Perempuan', 'Jakarta', '1979-08-14', 'Islam', 'Jl. Merdeka no 1', '086654778654', 'Istri'),
('14', '11251200759', 'Yuni', 'Perempuan', 'Cilacap', '1992-08-09', 'Islam', 'jl. Merak no 67', '086654332456', 'Istri');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` varchar(20) NOT NULL,
  `nm_pangkat` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `nm_pangkat`) VALUES
('PKT001', 'Juru Muda / I A'),
('PKT002', 'Juru Muda Tingkat I / I B'),
('PKT003', 'Juru / I C'),
('PKT004', 'Juru Tingkat I / I D'),
('PKT005', 'Pengatur Muda / II A'),
('PKT006', 'Pengatur Muda Tingkat I / II B'),
('PKT007', 'Pengatur / II C'),
('PKT008', 'Pengatur Tingkat I / II D'),
('PKT009', 'Penata Muda / III A'),
('PKT010', 'Penata Muda Tingkat I'),
('PKT011', 'Penata / III C'),
('PKT012', 'Penata Tingkat I / III D'),
('PKT013', 'Pembina / IV A'),
('PKT014', 'Pembina Tingkat I / IV B'),
('PKT015', 'Pembina Utama Muda / IV C'),
('PKT016', 'Pembina Utama Madya / IV D'),
('PKT017', 'Pembina Utama / IV E');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `no_pegawai` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nm_pegawai` varchar(32) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `tpt_lhr` varchar(32) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(32) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `tgl_msk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`no_pegawai`, `nip`, `nm_pegawai`, `jk`, `tpt_lhr`, `tgl_lhr`, `agama`, `no_hp`, `email`, `alamat`, `tgl_msk`) VALUES
('11212200420', '-', 'Amelia Pratiwi', 'Perempuan', 'rumbai', '1994-03-21', 'Islam', '085277882934', 'amel@gmail.com', 'jalan by pass', '2014-10-23'),
('11212200421', '-', 'Rifda Ariqah', 'Perempuan', 'Cilacap', '1993-01-09', 'Islam', '081382719291', 'ariqah@gmaik.com', 'jalan apel no. 18', '2013-10-23'),
('11212200430', '-', 'Husna Luthfiyah', 'Perempuan', 'Pekanbaru', '1998-05-23', 'Islam', '08526577819', 'husna.luthfiyah@gmail.com', 'Jalan Sukajadi', '2012-10-16'),
('112508378', '4435688', 'Sukarno', 'Laki-laki', 'Jakarta', '1987-08-06', 'Pilih Agama', '081224923354', 'm2mexacta@gmail.com', 'clp', '2009-09-16'),
('11251100701', '994586', 'Rusli Simatupang', 'Laki-laki', 'Bagan Api', '1994-10-03', 'Islam', '081224923350', 'tupang.rusli@gmail.com', 'Jalan Yuda Karya Panam', '2013-10-23'),
('11251100702', '2245', 'Novfriyanto JS', 'Laki-laki', 'Kuansing', '1992-11-02', 'Islam', '081224923351', 'nofri.js@gmail.com', 'jalan arengka', '2014-10-12'),
('11251100703', '-', 'Yehezkiel Saputra', 'Laki-laki', 'bagan api', '1994-12-01', 'Kristen Katolik', '081224923353', 'bibe.putra@gmail.com', 'jalan cipta karya', '2012-09-22'),
('11251100704', '6654', 'Minggus Awit Pangestu', 'Laki-laki', 'pasir pengarayan', '1994-07-23', 'Islam', '081224923359', 'minggus@gmail.com', 'jalan manunggal', '2013-07-23'),
('11251100705', '-', 'Yossy Suryani', 'Perempuan', 'perawang', '1991-01-01', 'Islam', '082198371293', 'yossy@gmail.com', 'jalan manunggal', '2012-10-23'),
('11251100712', '2666', 'M. Firdaus', 'Laki-laki', 'kota tengah', '1992-12-12', 'Islam', '081224923360', 'daus.kece@gmail.com', 'jalan cipta karya', '1993-10-09'),
('11251100753', '7775', 'Muhammad Fadhli Ihsan', 'Laki-laki', 'Pekanbaru', '1994-09-03', 'Islam', '081224923354', 'Fadhly.Ihsan@gmail.com', 'Jalan Tiung Nomor 12 Pekanbaru', '2011-10-16'),
('11251100759', '-', 'Susilo Bambang', 'Laki-laki', 'Bekasi', '1970-03-12', 'Islam', '813655902272', 'susilo.sby@gmail.com', 'Jalan Sudirman no. 12 pekanbaru', '2010-01-02'),
('11251200759', '-', 'Akhbar Setiawan', 'Laki-laki', 'Pekanbaru', '1994-02-02', 'Islam', '081224927618', 'akhbar@gmail.com', 'jalan cimpedak', '2012-10-17'),
('16102011', '20193008', 'Nous', 'Perempuan', 'Banyumas', '1992-01-16', 'Islam', '08665345788', 'nous@gmail.com', 'Jl. Alpukat no18', '2019-08-30'),
('16102043', '-', 'tika', 'Laki-laki', 'pml', '1999-08-05', 'Kristen Protestan', '0874356789', 'tik@email.com', 'cibelok', '2019-08-30'),
('16102056', '-', 'Qory', 'Perempuan', 'Cilacap', '1992-08-04', 'Islam', '083347772129', 'qory@gmail.com', 'majenang', '2019-08-30'),
('16102071', '-', 'windi', 'Perempuan', 'banyumas', '1994-08-07', 'Islam', '098876667', 'windi@gmail.com', 'bms', '2019-08-30'),
('16102111', '', 'Luthfi', 'Perempuan', 'Cilacap', '1993-06-10', 'Islam', '089223884516', 'lut@gmail.com', 'Jenang, Majenang, Cilacap', '2019-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pend` int(10) NOT NULL,
  `no_pegawai` varchar(20) NOT NULL,
  `thn_pend` varchar(10) NOT NULL,
  `jenjang` varchar(10) NOT NULL,
  `nm_pendidikan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pend`, `no_pegawai`, `thn_pend`, `jenjang`, `nm_pendidikan`) VALUES
(1, '11251100753', '2000-2006', 'SD', 'SDN 002 Arindo 2'),
(2, '11251100753', '2006-2009', 'MTs', 'MTs Darul Hikmah Pekanbaru'),
(3, '11251100753', '2009-2012', 'MAN', 'MAN 2 Model Pekanbaru'),
(4, '11251100753', '2012-2016', 'S-1', 'Teknik Informatika UIN SUSKA RIa'),
(5, '11212200430', '2004-2010', 'SD', 'SDN 002 Arindo 2'),
(6, '11212200430', '2010-2013', 'MTs', 'Mts Darul Hikmah'),
(7, '11212200430', '2013-2016', 'SMA', 'SMK 2 Tandun'),
(11, '11251100759', '1980-1987', 'SD', 'SDN 01 Jakarta'),
(12, '11251100759', '1987-1990', 'SMP', 'SMP 01 Jakarta'),
(13, '11251100759', '1990-1993', 'SMK', 'SMK 03 Jakarta'),
(17, '112508378', '2000-2006', 'SD', 'SDN 002 Arindo 2'),
(18, '112508378', '2006-2009', 'MTs', 'Mts Darul Hikmah'),
(19, '112508378', '2009-2012', 'MAN', 'MAN 2 Model'),
(20, '11251100701', '2000-2006', 'SD', 'SDN 01 Bagan Api'),
(21, '11251100701', '2006-2009', 'SMP', 'SMPN 01 Bagan Api'),
(22, '11251100701', '2009-2012', 'SMA', 'SMAN 01 Bagan APi'),
(23, '11251100701', '2012-2015', 'S-1', 'Teknik Informatika UIN SUSKA'),
(24, '11251100702', '2000-2006', 'SD', 'SDN 022 Kuansing'),
(25, '11251100702', '2006-2009', 'SMP', 'SMPN 022 Kuansing'),
(26, '11251100702', '2009-2012', 'MAN', 'MAN Model Kuansing'),
(27, '11251100702', '2012-2015', 'S-1', 'Teknik Informatika'),
(28, '11251100703', '2000-2006', 'SD', 'SDN 038 Kampar'),
(29, '11251100703', '2006-2009', 'SMP', 'SMPN 038 Kampar'),
(30, '11251100703', '2009-2012', 'SMA', 'SMAN 038 Kampar'),
(31, '11251100704', '2000-2006', 'SD', 'SDN 012 Rohul'),
(32, '11251100704', '2006-2009', 'MTs', 'MTs Darul Hikmah Pekanbaru'),
(33, '11251100704', '2009-2012', 'SMA', 'SMAN 012 Rohul'),
(34, '11251100712', '1998-2004', 'SD', 'SDN 048 Koteng'),
(35, '11251100712', '200042007', 'SMP', 'SMPN 048 Koteng'),
(36, '11251100712', '2007-2010', 'SMA', 'SMAN 048 Koteng'),
(38, '11212200420', '2006-2009', 'SMP', 'SMP 012 Rumbai'),
(39, '11212200420', '2009-2012', 'SMK', 'SMA 012 Rumbai'),
(40, '11212200421', '2000-2006', 'SD', 'SDN 01 Cilacap'),
(41, '11212200421', '2006-2009', 'SMP', 'SMP 01 Cilacap'),
(42, '11212200421', '2009-2012', 'SMA', 'SMA 01 Cilacap'),
(43, '11251100705', '1998-2004', 'SD', 'SDN 02 Perawang'),
(44, '11251100705', '2004-2007', 'SMP', 'SMP 03 Perawang'),
(45, '11251100705', '2007-2010', 'SMK', 'SMK 05 Perawang'),
(46, '11251100704', '2000-2006', 'SD', 'SDN 022 Kampar'),
(47, '11251100704', '2006-2009', 'SMP', 'SMP 022 Kampar'),
(48, '11251100704', '2009-2012', 'SMK', 'SMK 022 Kampar'),
(49, '11212200430', '2000-2006', 'SD', 'SDN 003 Pekanbaru'),
(50, '11212200430', '2006-2009', 'SMP', 'SMP 004 Pekanbaru'),
(51, '11212200430', '2009-2012', 'MAN', 'MAN 1 Pekanbaru'),
(52, '11212200430', '', '', ''),
(53, '16102056', '2000-2013', 'SMP', 'zz'),
(54, '16102056', '', '', ''),
(55, '16102056', '', '', ''),
(56, '16102043', '2000-2010', 'SD', 'tadika mesra'),
(57, '16102043', '', '', ''),
(58, '16102043', '', '', ''),
(62, '16102071', '2009-2010', 'MTs', 'zz'),
(63, '16102071', '', '', ''),
(64, '16102071', '', '', ''),
(68, '16102011', '2011-2013', 'D-3', 'Poltekkes'),
(69, '16102011', '', '', ''),
(70, '16102011', '', '', ''),
(71, '16102111', '2012-2015', 'SMA', 'SMA N 1'),
(72, '16102111', '2016-2020', 'S-1', 'ITT'),
(73, '16102111', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman_krj`
--

CREATE TABLE `pengalaman_krj` (
  `id_peng_krj` int(10) NOT NULL,
  `no_pegawai` varchar(20) NOT NULL,
  `thn_krj` varchar(10) NOT NULL,
  `nm_krj` varchar(32) NOT NULL,
  `nm_pt` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengalaman_krj`
--

INSERT INTO `pengalaman_krj` (`id_peng_krj`, `no_pegawai`, `thn_krj`, `nm_krj`, `nm_pt`) VALUES
(1, '11251100753', '2013', 'Staff seo planner', 'KUDASEO'),
(3, '112508378', '2012-2014', 'staff keuangan bank BRI', 'Bank BRI'),
(4, '11251100701', '2013-2014', 'PT. Timun Emas', 'Karyawan'),
(5, '11251100702', '', '', ''),
(6, '11251100703', '', '', ''),
(7, '11251100704', '', '', ''),
(8, '11251100712', '', '', ''),
(9, '11212200420', '2001-2009', 'Staff Keuangan', 'PT Bumi'),
(10, '11212200421', '', '', ''),
(11, '11251100705', '', '', ''),
(12, '11251100704', '', '', ''),
(13, '11212200430', '', '', ''),
(14, '11251100701', '', '', ''),
(15, '16102056', '2012-2019', 'staff', 'zz'),
(16, '16102043', '2012-2020', 'karyawan', 'kedai uncle muthu'),
(18, '16102071', '2013-2015', 'staff', 'zz'),
(20, '16102011', '2015-2019', 'staff', 'RSUD ABC'),
(21, '16102111', '2021-2022', 'Staff', 'PT Uni');

-- --------------------------------------------------------

--
-- Table structure for table `sk_krj`
--

CREATE TABLE `sk_krj` (
  `no_sk` varchar(20) NOT NULL,
  `no_pegawai` varchar(20) NOT NULL,
  `tgl_sk` date NOT NULL,
  `id_jabatan` varchar(20) NOT NULL,
  `id_pangkat` varchar(20) NOT NULL,
  `id_unit_krj` varchar(20) NOT NULL,
  `status_sk` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk_krj`
--

INSERT INTO `sk_krj` (`no_sk`, `no_pegawai`, `tgl_sk`, `id_jabatan`, `id_pangkat`, `id_unit_krj`, `status_sk`) VALUES
('SK/00000000334', '16102071', '2019-08-30', 'JAB002', 'PKT011', 'UKJ004', 'aktif'),
('SK/000000004336', '16102043', '2019-08-30', 'JAB002', 'PKT015', 'UKJ002', 'aktif'),
('SK/0000000220', '16102056', '2019-08-30', 'JAB003', 'PKT014', 'UKJ001', 'aktif'),
('SK/00000032212', '16102111', '2019-08-31', 'JAB006', 'PKT001', 'UKJ007', 'aktif'),
('SK/000005564', '16102011', '2019-08-30', 'JAB006', 'PKT001', 'UKJ004', 'aktif'),
('SK/ZT/10/15/00001', '11251100753', '2011-10-16', 'JAB004', 'PKT003', 'UKJ009', 'nonaktif'),
('SK/ZT/10/15/00002', '11212200430', '2012-10-16', 'JAB004', 'PKT002', 'UKJ009', 'nonaktif'),
('SK/ZT/10/15/00003', '11251100759', '2010-01-02', 'JAB001', 'PKT012', 'UKJ013', 'aktif'),
('SK/ZT/10/15/00004', '11212200430', '2015-10-16', 'JAB004', 'PKT003', 'UKJ003', 'nonaktif'),
('SK/ZT/10/15/00005', '11251100753', '2011-10-16', 'JAB003', 'PKT006', 'UKJ005', 'aktif'),
('SK/ZT/10/15/00006', '11251200759', '2012-10-17', 'JAB003', 'PKT005', 'UKJ004', 'aktif'),
('SK/ZT/10/15/00009', '11212200430', '2015-10-19', 'JAB003', 'PKT006', 'UKJ009', 'aktif'),
('SK/ZT/10/15/00010', '112508378', '2012-10-20', 'JAB004', 'PKT008', 'UKJ007', 'nonaktif'),
('SK/ZT/10/15/00011', '112508378', '2009-09-16', 'JAB003', 'PKT009', 'UKJ003', 'aktif'),
('SK/ZT/10/15/00012', '11251100701', '2013-10-23', 'JAB005', 'PKT007', 'UKJ001', 'aktif'),
('SK/ZT/10/15/00013', '11251100702', '2014-10-12', 'JAB005', 'PKT008', 'UKJ002', 'aktif'),
('SK/ZT/10/15/00014', '11251100703', '2012-09-22', 'JAB003', 'PKT007', 'UKJ010', 'aktif'),
('SK/ZT/10/15/00015', '11251100704', '2013-07-23', 'JAB003', 'PKT010', 'UKJ006', 'aktif'),
('SK/ZT/10/15/00016', '11251100712', '1993-10-09', 'JAB003', 'PKT008', 'UKJ004', 'aktif'),
('SK/ZT/10/15/00017', '11212200420', '2014-10-23', 'JAB004', 'PKT006', 'UKJ011', 'aktif'),
('SK/ZT/10/15/00018', '11212200421', '2013-10-23', 'JAB004', 'PKT005', 'UKJ009', 'aktif'),
('SK/ZT/10/15/00019', '11251100705', '2012-10-23', 'JAB003', 'PKT007', 'UKJ005', 'aktif'),
('SK/ZT/10/15/00020', '11251100704', '2014-10-23', 'JAB004', 'PKT006', 'UKJ003', 'aktif'),
('SK/ZT/10/15/00021', '11212200430', '2011-10-23', 'JAB004', 'PKT005', 'UKJ011', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `unit_krj`
--

CREATE TABLE `unit_krj` (
  `id_unit_krj` varchar(20) NOT NULL,
  `nm_unit_krj` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_krj`
--

INSERT INTO `unit_krj` (`id_unit_krj`, `nm_unit_krj`) VALUES
('UKJ001', 'Ruang Merpati'),
('UKJ002', 'Ruang Merpati VIP'),
('UKJ003', 'Ruang Kepodang'),
('UKJ004', 'Ruang Kasuari'),
('UKJ005', 'Ruang Camar'),
('UKJ006', 'Ruang Jalak'),
('UKJ007', 'Ruang Nuri'),
('UKJ008', 'Ruang Garuda'),
('UKJ009', 'Ruang Cucakrowo'),
('UKJ010', 'Ruang VIP Rajawali'),
('UKJ011', 'Ruang ICU'),
('UKJ012', 'Ruang Perinatologi'),
('UKJ013', 'Ruang IGD');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `user` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `level` enum('admin','pengguna') NOT NULL,
  `blokir` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `nama`, `level`, `blokir`) VALUES
('USR001', 'admin', 'admin', 'admin', 'admin', 'N'),
('USR002', 'aku', 'aku123', 'aku', 'admin', 'N'),
('USR003', 'qory', 'qory', 'qory', 'pengguna', 'N'),
('USR004', 'windi', 'windi', 'windi', 'pengguna', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `jjg`
--
ALTER TABLE `jjg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_kel`),
  ADD KEY `nip` (`no_pegawai`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`),
  ADD KEY `id_pangkat` (`id_pangkat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`no_pegawai`),
  ADD KEY `nip` (`no_pegawai`),
  ADD KEY `nip_2` (`no_pegawai`),
  ADD KEY `nip_3` (`nip`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pend`),
  ADD KEY `nip` (`no_pegawai`),
  ADD KEY `nip_2` (`no_pegawai`);

--
-- Indexes for table `pengalaman_krj`
--
ALTER TABLE `pengalaman_krj`
  ADD PRIMARY KEY (`id_peng_krj`),
  ADD KEY `nip` (`no_pegawai`),
  ADD KEY `nip_2` (`no_pegawai`);

--
-- Indexes for table `sk_krj`
--
ALTER TABLE `sk_krj`
  ADD PRIMARY KEY (`no_sk`),
  ADD KEY `nip` (`no_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_pangkat` (`id_pangkat`),
  ADD KEY `id_unit_krj` (`id_unit_krj`);

--
-- Indexes for table `unit_krj`
--
ALTER TABLE `unit_krj`
  ADD PRIMARY KEY (`id_unit_krj`),
  ADD KEY `id_unit_krj` (`id_unit_krj`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jjg`
--
ALTER TABLE `jjg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pend` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `pengalaman_krj`
--
ALTER TABLE `pengalaman_krj`
  MODIFY `id_peng_krj` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`no_pegawai`) REFERENCES `pegawai` (`no_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sk_krj`
--
ALTER TABLE `sk_krj`
  ADD CONSTRAINT `sk_krj_ibfk_1` FOREIGN KEY (`no_pegawai`) REFERENCES `pegawai` (`no_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sk_krj_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sk_krj_ibfk_4` FOREIGN KEY (`id_pangkat`) REFERENCES `pangkat` (`id_pangkat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sk_krj_ibfk_5` FOREIGN KEY (`id_unit_krj`) REFERENCES `unit_krj` (`id_unit_krj`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
