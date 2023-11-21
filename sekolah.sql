-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 12:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `Npk` varchar(20) NOT NULL,
  `NAMA` varchar(20) NOT NULL,
  `JK` varchar(20) NOT NULL,
  `MAPEL` varchar(20) NOT NULL,
  `NO_HP` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `Npk`, `NAMA`, `JK`, `MAPEL`, `NO_HP`) VALUES
(1, '111', 'Marissa Dewi Sartika', 'PEREMPUAN', 'Produktif', '8012313442712'),
(2, '112', 'Amir Budiono', 'LAKI LAKI', 'Matematika', '8012313442712'),
(3, '113', 'Eka Mulyani', 'PEREMPUAN', 'Mandarin', '8012313442712'),
(4, '114', 'Sukadi', 'LAKI LAKI', 'Kimia', '8012313442712'),
(5, '115', 'Tiara Kusuma Dewi', 'PEREMPUAN', 'PemWeb', '8012313442712'),
(6, '116', 'Jaja Subagja', 'LAKI LAKI', 'Fisika', '8012313442712'),
(7, '117', 'Monica Irawati Kusum', 'PEREMPUAN', 'Matematika', '8012313442712'),
(8, '118', 'Sari Gumbira', 'PEREMPUAN', 'PemDes', '8012313442712'),
(9, '119', 'Rozan Hilmi Abdul Ha', 'LAKI LAKI', 'UI/UX', '8012313442712');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `NIS` varchar(20) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `KELAS` varchar(10) NOT NULL,
  `JURUSAN` varchar(50) NOT NULL,
  `JK` varchar(10) NOT NULL,
  `ALAMAT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `NIS`, `NAMA`, `KELAS`, `JURUSAN`, `JK`, `ALAMAT`) VALUES
(1, '22231001', 'Azizah\r\n', 'XI', 'RPL', 'PEREMPUAN', 'BUMI'),
(2, '22231002', 'Radit', 'XI', 'RPL 1', 'LAKI LAKI', 'BUMI'),
(3, '22231003', 'Najwa', 'XI', 'RPL 1', 'PEREMPUAN', 'BUMI'),
(4, '22231004', 'Virni', 'XI', 'RPL 1', 'PEREMPUAN', 'BUMI'),
(5, '22231005', 'Reivan', 'XI', 'RPL 1', 'LAKI LAKI', 'BUMI'),
(6, '22231006', 'Guritno', 'X', 'RPL 1', 'PEREMPUAN', 'BUMI'),
(7, '22231007', 'MARSO', 'XII', 'RPL 1', 'LAKI LAKI', 'MARS');

-- --------------------------------------------------------

--
-- Table structure for table `trans_mapel`
--

CREATE TABLE `trans_mapel` (
  `id` int(11) NOT NULL,
  `Npk` varchar(20) NOT NULL,
  `Nis` varchar(20) NOT NULL,
  `Mapel` varchar(50) NOT NULL,
  `Jam_mulai` varchar(5) NOT NULL,
  `Jam_akhir` varchar(5) NOT NULL,
  `Ta` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_mapel`
--

INSERT INTO `trans_mapel` (`id`, `Npk`, `Nis`, `Mapel`, `Jam_mulai`, `Jam_akhir`, `Ta`) VALUES
(1, '111', '22231001', 'Matematika', '13.40', '15.20', '2023'),
(2, '112', '22231002', 'Produktif', '08.00', '10.00', '2023'),
(3, '113', '22231003', 'Produktif', '10.30', '11.40', '2023'),
(4, '114', '22231004', 'PemWeb', '09.30', '13.40', '2023'),
(5, '115', '22231005', 'B.jepang', '07.30', '09.30', '2023'),
(6, '116', '22231006', 'Mandarin', '10.00', '11.40', '2023'),
(7, '117', '22231007', 'PemDes', '11.40', '14.00', '2023'),
(8, '118', '22231008', 'BasDat', '14.00', '15.40', '2023'),
(9, '119', '22231009', 'PPB', '13.40', '15.20', '2023'),
(10, '120', '22231010', 'Python', '08.00', '10.00', '2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_mapel`
--
ALTER TABLE `trans_mapel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trans_mapel`
--
ALTER TABLE `trans_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
