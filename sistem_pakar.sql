-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 10:21 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `id_pengetahuan` int(5) NOT NULL,
  `kode_penyakit` varchar(4) NOT NULL,
  `kode_gejala` varchar(4) NOT NULL,
  `nilai_belief` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` varchar(4) NOT NULL,
  `nama_gejala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`) VALUES
('G001', 'Sesak nafas'),
('G002', 'Diare'),
('G003', 'Bersin-bersin'),
('G004', 'Badan membiru'),
('G005', 'Gangguan Pertumbuhan'),
('G006', 'Mati mendadak'),
('G007', 'Diare Kehijauan'),
('G008', 'Kaki meradang/lumpuh'),
('G009', 'Sayap Menggantung'),
('G010', 'Kepala Terputar'),
('G011', 'Menggigil'),
('G012', 'Bulu Kusam & Mengkerut'),
('G013', 'Diare Keputihan'),
('G014', 'Perut Membesar'),
('G015', 'Ada Papula Berwarna Hitam'),
('G016', 'Jengger Membengkak'),
('G017', 'Bercak Kuning Pada Rongga Mulut'),
('G018', 'Keluar Cairan Dari Hidung'),
('G019', 'Pembengkakan Sinus dan Mata'),
('G020', 'Kepala Bengkak'),
('G021', 'Kelopak Mata Lengket'),
('G022', 'Kaki Pincang'),
('G023', 'Kaki Bengkak'),
('G024', 'Wajah Pucat'),
('G025', 'Mata Berwarna Kelabu'),
('G026', 'Mata Berair');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_konsul_temp`
--

CREATE TABLE `hasil_konsul_temp` (
  `temp_kode_gejala` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakar`
--

CREATE TABLE `pakar` (
  `id_pakar` int(5) NOT NULL,
  `nama_pakar` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakar`
--

INSERT INTO `pakar` (`id_pakar`, `nama_pakar`, `username`, `password`) VALUES
(1, 'agung', 'pakar', 'pakar');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` varchar(4) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`) VALUES
('P002', 'vsvcsvs2235'),
('P004', 'bulu kusam');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` int(5) NOT NULL,
  `kode_penyakit` varchar(4) NOT NULL,
  `penyebab` text NOT NULL,
  `penanggulangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`id_pengetahuan`),
  ADD KEY `kode_gejala` (`kode_gejala`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `pakar`
--
ALTER TABLE `pakar`
  ADD PRIMARY KEY (`id_pakar`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `id_pengetahuan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakar`
--
ALTER TABLE `pakar`
  MODIFY `id_pakar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD CONSTRAINT `basis_pengetahuan_ibfk_1` FOREIGN KEY (`kode_gejala`) REFERENCES `gejala` (`kode_gejala`),
  ADD CONSTRAINT `basis_pengetahuan_ibfk_2` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`);

--
-- Constraints for table `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `solusi_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
