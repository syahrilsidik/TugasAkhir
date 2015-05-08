-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2014 at 02:00 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mokiju`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `menu` varchar(20) NOT NULL,
  `link` varchar(20) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `menu`, `link`, `access`) VALUES
(1, 0, 'Home', 'home', 123),
(2, 0, 'Absensi', 'absensi', 13),
(3, 2, 'Add Absensi', 'absensi/add_absensi', 1),
(4, 0, 'Keluhan', 'keluhan', 1),
(5, 0, 'Booking', 'booking', 12),
(6, 0, 'Users', 'user', 2),
(7, 6, 'Tambah User', 'user/adduser', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailabsensi`
--

CREATE TABLE IF NOT EXISTS `tb_detailabsensi` (
`no_detailabsensi` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `kegiatan` varchar(30) NOT NULL,
  `lab` varchar(20) NOT NULL,
  `uraian` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_detailabsensi`
--

INSERT INTO `tb_detailabsensi` (`no_detailabsensi`, `no`, `tgl_masuk`, `jam_mulai`, `jam_selesai`, `kegiatan`, `lab`, `uraian`) VALUES
(1, 'AB26082014150848SN', '2014-08-05', '00:00:10', '00:00:11', 'sw', '', 'YUTR'),
(2, 'AB26082014150848SN', '2014-08-05', '00:00:10', '00:00:11', 'sw', '', 'YUTR'),
(3, 'AB26082014150815SN', '2014-08-05', '10:10:10', '20:20:20', 'Assistants', 'B203', 'Pelajaran Pak Yedi'),
(4, 'AB26082014150815SN', '2014-08-05', '10:10:10', '00:00:00', '2', 'Test', 'wer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailbooking`
--

CREATE TABLE IF NOT EXISTS `tb_detailbooking` (
  `tgl_pakai` date NOT NULL,
  `nama_matakuliah` varchar(50) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `jam_selesai` time NOT NULL,
  `jam_mulai` time NOT NULL,
  `nama_lab` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detailbooking`
--

INSERT INTO `tb_detailbooking` (`tgl_pakai`, `nama_matakuliah`, `nama_kelas`, `jam_selesai`, `jam_mulai`, `nama_lab`) VALUES
('0000-00-00', '', 'TI-48', '13:00:00', '09:00:00', '-Choose-'),
('2014-08-06', 'asdasdasd', 'TI-48', '13:00:00', '09:00:00', '-Choose-'),
('2014-08-06', 'asdasdasd', 'TI-48', '13:00:00', '09:00:00', '-Choose-'),
('2014-08-06', 'asdasdasd', 'TI-48', '13:00:00', '09:00:00', '-Choose-'),
('2014-08-06', 'asdasdasd', 'TI-48', '13:00:00', '09:00:00', '-Choose-'),
('0000-00-00', '', '', '00:00:00', '00:00:00', '-Choose-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailjadwal`
--

CREATE TABLE IF NOT EXISTS `tb_detailjadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `nama_dosen` varchar(35) NOT NULL,
  `nama_matakuliah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailkeluhan`
--

CREATE TABLE IF NOT EXISTS `tb_detailkeluhan` (
  `id_keluhan` varchar(20) NOT NULL,
  `keluhan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detailkeluhan`
--

INSERT INTO `tb_detailkeluhan` (`id_keluhan`, `keluhan`) VALUES
('KL140806023539', 'sss'),
('KL140811052629', 'asdasd'),
('KL140811052629', ''),
('KL140816161639', 'nnnnnnnnnn'),
('KL140816162748', 'mm'),
('KL140819083947', 'PC 21 Harap Diinstall'),
('KL140823143936', 'aduuuh capek nich'),
('KL140823143936', 'aduuh dingin nich\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `id_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_headerabsensi`
--

CREATE TABLE IF NOT EXISTS `tb_headerabsensi` (
  `no` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jam_datang` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_headerabsensi`
--

INSERT INTO `tb_headerabsensi` (`no`, `id_pegawai`, `tgl_masuk`, `jam_datang`, `jam_pulang`) VALUES
('AB26082014150815SN', 'P001', '2014-08-05', '01:01:01', '10:10:10'),
('AB26082014150848SN', 'P001', '2014-08-05', '00:00:08', '00:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_headerbooking`
--

CREATE TABLE IF NOT EXISTS `tb_headerbooking` (
  `id_booking` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_headerbooking`
--

INSERT INTO `tb_headerbooking` (`id_booking`, `id_pegawai`, `tgl_pesan`, `nama_pemesan`) VALUES
('0', 'P001', '2014-08-26', 'Nasrul'),
('BL140826154120', 'P001', '2014-08-26', 'Nasrul'),
('BL140826154618', 'P001', '2014-08-26', 'Nasrul'),
('BL140826154711', 'P001', '2014-08-26', 'Nasrul'),
('BL140826154906', 'P001', '2014-08-26', 'Nasrul'),
('BL140826155047', 'P001', '2014-08-26', 'Nasrul'),
('BL140826155207', 'P001', '2014-08-26', 'Nasrul'),
('BL140826155723', 'P001', '2014-08-26', 'Nasrul'),
('BL140826155816', 'P001', '2014-08-26', 'Nasrul'),
('BL140826155931', 'P001', '2014-08-26', 'Nasrul'),
('BL140826160443', 'P001', '2014-08-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_headerjadwal`
--

CREATE TABLE IF NOT EXISTS `tb_headerjadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `hari` date NOT NULL,
  `lab` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_headerkeluhan`
--

CREATE TABLE IF NOT EXISTS `tb_headerkeluhan` (
  `id_keluhan` varchar(20) NOT NULL,
  `id_lab` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `tgl_keluhan` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `pengerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_headerkeluhan`
--

INSERT INTO `tb_headerkeluhan` (`id_keluhan`, `id_lab`, `id_pegawai`, `tgl_keluhan`, `status`, `pengerjaan`) VALUES
('KL140806023539', 'P001', 'P001', '2014-08-06', 'Medium', 'Sedang Berjalan'),
('KL140811052629', 'P001', 'P001', '2014-08-11', 'Medium', 'Sedang Berjalan'),
('KL140816161639', 'P001', 'P001', '2014-08-16', 'Urgent', 'Sedang Berjalan'),
('KL140816162401', '-Choose-', 'P001', '2014-08-16', 'Medium', 'Belum Dikerjakan'),
('KL140816162533', '-Choose-', 'P001', '2014-08-16', 'Medium', 'Belum Dikerjakan'),
('KL140816162748', 'P001', 'P001', '2014-08-16', 'Medium', 'Belum Dikerjakan'),
('KL140816170407', '-Choose-', '0', '2014-08-17', '-Choose-', 'Belum Dikerjakan'),
('KL140819083947', 'P001', 'P001', '2014-08-19', 'Medium', 'Sedang Berjalan'),
('KL140823143936', 'P001', 'P001', '2014-08-23', 'Medium', 'Belum Dikerjakan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluhanmhs`
--

CREATE TABLE IF NOT EXISTS `tb_keluhanmhs` (
  `id_keluhanmhs` varchar(20) NOT NULL,
  `nama_mhs` varchar(25) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `lab` varchar(10) NOT NULL,
  `tgl_keluhan` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `pengerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keluhanmhs`
--

INSERT INTO `tb_keluhanmhs` (`id_keluhanmhs`, `nama_mhs`, `kelas`, `lab`, `tgl_keluhan`, `status`, `keluhan`, `pengerjaan`) VALUES
('MHS140826185124', '0', '0', '-Choose-', '2014-08-26', '0', '', 'Belum Dikerjakan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lab`
--

CREATE TABLE IF NOT EXISTS `tb_lab` (
  `id_lab` varchar(20) NOT NULL,
  `nama_lab` varchar(10) NOT NULL,
  `pen_jawab` varchar(20) NOT NULL COMMENT 'id_pegawai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lab`
--

INSERT INTO `tb_lab` (`id_lab`, `nama_lab`, `pen_jawab`) VALUES
('lab01', 'LAB B1', 'P005'),
('lab02', 'LAB B2', 'P001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matakuliah`
--

CREATE TABLE IF NOT EXISTS `tb_matakuliah` (
  `id_matakuliah` varchar(20) NOT NULL,
  `nama_matakuliah` varchar(50) NOT NULL,
  `id_dosen` varchar(20) NOT NULL,
  `sks` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE IF NOT EXISTS `tb_pegawai` (
  `id_pegawai` varchar(20) NOT NULL,
  `nama_pegawai` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `user_access` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_pegawai`, `alamat`, `no_hp`, `jabatan`, `jurusan`, `password`, `kelas`, `user_access`) VALUES
('admin', 'Sunan Satria', 'sadasd', 'asda', 'admin', 'asd', 'sn', 'sd', ''),
('Administrator', 'Rian', 'sf', 'as', 'administrator', 'f', 'ri', 'sda', ''),
('P001', 'Syahril Sidik', 'jadfhkdjsfhskdjfhksdjfhksdjfhkjh', '088803906579', 'asleb', 'Informatika Komputer', 'sdk', 'IK-346', 'asleb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detailabsensi`
--
ALTER TABLE `tb_detailabsensi`
 ADD PRIMARY KEY (`no_detailabsensi`);

--
-- Indexes for table `tb_headerabsensi`
--
ALTER TABLE `tb_headerabsensi`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_headerbooking`
--
ALTER TABLE `tb_headerbooking`
 ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `tb_headerjadwal`
--
ALTER TABLE `tb_headerjadwal`
 ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_headerkeluhan`
--
ALTER TABLE `tb_headerkeluhan`
 ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `tb_keluhanmhs`
--
ALTER TABLE `tb_keluhanmhs`
 ADD PRIMARY KEY (`id_keluhanmhs`);

--
-- Indexes for table `tb_lab`
--
ALTER TABLE `tb_lab`
 ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
 ADD PRIMARY KEY (`id_matakuliah`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
 ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_detailabsensi`
--
ALTER TABLE `tb_detailabsensi`
MODIFY `no_detailabsensi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
