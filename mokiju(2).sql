-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2014 at 07:25 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `menu`, `link`, `access`) VALUES
(1, 0, 'Home', 'home', 123),
(2, 0, 'Absensi', 'absensi', 13),
(3, 2, 'Add Absensi', 'absensi/add_absensi', 1),
(4, 0, 'Keluhan', 'keluhan', 123),
(5, 0, 'Booking', 'booking', 12),
(6, 0, 'Users', 'user', 2),
(7, 6, 'Tambah User', 'user/adduser', 2),
(8, 4, 'Keluhan Mahasiswa', 'keluhan/mhsview', 123);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_detailabsensi`
--

INSERT INTO `tb_detailabsensi` (`no_detailabsensi`, `no`, `tgl_masuk`, `jam_mulai`, `jam_selesai`, `kegiatan`, `lab`, `uraian`) VALUES
(1, 'AB26082014150848SN', '2014-08-05', '00:00:10', '00:00:11', 'qweqweqwe', 'werwerew', 'werwerwer'),
(2, 'AB26082014150848SN', '2014-08-05', '00:00:10', '00:00:11', 'sw', '', 'YUTR'),
(5, 'AB28082014110826SN', '2014-08-29', '13:00:00', '17:00:00', 'Asistensi', 'Lab B2', 'Web Desain'),
(6, 'AB28082014110826SN', '2014-08-29', '17:00:00', '20:00:00', 'Maintenance', 'Lab B2', 'Install Deep Freze');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailbooking`
--

CREATE TABLE IF NOT EXISTS `tb_detailbooking` (
  `id_booking` varchar(20) NOT NULL,
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

INSERT INTO `tb_detailbooking` (`id_booking`, `tgl_pakai`, `nama_matakuliah`, `nama_kelas`, `jam_selesai`, `jam_mulai`, `nama_lab`) VALUES
('BL140827105326', '2014-08-07', 'Matematika', 'IK-346', '13:00:00', '08:00:00', 'P001'),
('BL140829101728', '2014-08-25', 'Auto CAD', 'TO-34', '13:00:00', '08:00:00', 'P001');

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
('KL140823143936', 'aduuh dingin nich\r\n'),
('KL140827183737', 'asas'),
('KL140827183748', 'd'),
('KL140827184343', ',m'),
('KL140827194050', 'asdasd'),
('KL140827194050', 'eede'),
('KL140828030320', 'asdasdasd');

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
('AB26082014150848SN', 'P001', '2014-08-05', '00:00:08', '00:00:20'),
('AB28082014110826SN', 'P001', '2014-08-29', '08:00:00', '20:40:00');

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
('BL140827105326', 'P001', '2014-08-27', 'Fadel'),
('BL140829101728', 'P001', '2014-08-29', 'Sultan');

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
('KL140806023539', 'P001', 'P001', '2014-08-06', 'Medium', 'Selesai'),
('KL140811052629', 'P001', 'P001', '2014-08-11', 'Medium', 'Sedang Berjalan'),
('KL140816161639', 'P001', 'P001', '2014-08-16', 'Urgent', 'Sedang Berjalan'),
('KL140816162401', '-Choose-', 'P001', '2014-08-16', 'Medium', 'Belum Dikerjakan'),
('KL140816162533', '-Choose-', 'P001', '2014-08-16', 'Medium', 'Belum Dikerjakan'),
('KL140816162748', 'P001', 'P001', '2014-08-16', 'Medium', 'Belum Dikerjakan'),
('KL140816170407', '-Choose-', '0', '2014-08-17', '-Choose-', 'Belum Dikerjakan'),
('KL140819083947', 'P001', 'P001', '2014-08-19', 'Medium', 'Sedang Berjalan'),
('KL140823143936', 'P001', 'P001', '2014-08-23', 'Medium', 'Belum Dikerjakan'),
('KL140827183737', 'LAB B1', 'Administrator', '2014-08-27', 'Medium', 'Belum Dikerjakan'),
('KL140827183748', 'LAB B1', 'Administrator', '2014-08-27', 'Medium', 'Belum Dikerjakan'),
('KL140827184343', 'lab02', 'Administrator', '2014-08-27', 'Medium', 'Belum Dikerjakan'),
('KL140827194050', 'lab01', 'Administrator', '2014-08-27', 'Urgent', 'Belum Dikerjakan'),
('KL140828030320', 'lab02', 'Admin', '2014-08-28', 'Urgent', 'Belum Dikerjakan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
('ik346', 'IK-346'),
('ik347', 'IK-347'),
('ik348', 'IK-348'),
('ti44', 'TI-44'),
('ti46', 'TI-46'),
('ti48', 'TI-48');

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
('MHS140828060415', '0', '0', 'LAB B2', '2014-08-28', '0', 'Mouse PC-21 Bermasalah', 'Selesai'),
('MHS140829100643', '0', '0', '-Choose-', '2014-08-29', '0', '', 'Belum Dikerjakan'),
('MHS140829100803', '0', '0', 'LAB B2', '2014-08-29', '0', 'Mouse Hilang PC b2-01', 'Sedang Berjalan');

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
  `id_lab` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_pegawai`, `alamat`, `no_hp`, `jabatan`, `jurusan`, `password`, `kelas`, `id_lab`) VALUES
('admin', 'Sunan Satria', 'Jl. Keselamatan', 'asda', 'admin', '-----', 'sn', '-Choose-', ''),
('Administrator', 'Rian Padriani', 's', 'as', 'administrator', '------', 'ri', '-Choose-', ''),
('P001', 'Syahril Sidik', 'jadfhkdjsfhskdjfhksdjfhksdjfhkjh', '088803906579', 'asleb', 'Informatika Komputer', 'sdk', 'IK-346', 'lab02'),
('P002', 'Enjang Mulyana', 'Jl. Kalirusak', '0888898989887', 'asleb', 'Sastra Otomotif', 'em', 'SO-666', 'lab01');

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
-- Indexes for table `tb_headerkeluhan`
--
ALTER TABLE `tb_headerkeluhan`
 ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
 ADD PRIMARY KEY (`id_kelas`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_detailabsensi`
--
ALTER TABLE `tb_detailabsensi`
MODIFY `no_detailabsensi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
