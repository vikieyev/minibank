-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 02:00 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minibank`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jenis_trx`
--

CREATE TABLE `data_jenis_trx` (
  `kode_transaksi` varchar(50) NOT NULL,
  `ket_transaksi` varchar(50) NOT NULL,
  `jenis_neraca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `no_rek` varchar(50) NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `debet` int(15) NOT NULL,
  `kredit` int(15) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_transaksi` int(15) NOT NULL,
  `rek_tujuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_nasabah`
--

CREATE TABLE `master_nasabah` (
  `kode_nasabah` varchar(50) NOT NULL,
  `nama_nasabah` varchar(50) NOT NULL,
  `alamat_nasabah` varchar(50) NOT NULL,
  `tgl_lahir_nasabah` date NOT NULL,
  `nama_ibu_kandung` varchar(50) NOT NULL,
  `no_tlp_nasabah` int(15) NOT NULL,
  `jenis_program` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_tabungan`
--

CREATE TABLE `master_tabungan` (
  `kode_tabungan` varchar(10) NOT NULL,
  `nama_tabungan` varchar(100) NOT NULL,
  `setoran_minimal` bigint(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jenis_trx`
--
ALTER TABLE `data_jenis_trx`
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kode_transaksi` (`no_rek`);

--
-- Indexes for table `master_nasabah`
--
ALTER TABLE `master_nasabah`
  ADD PRIMARY KEY (`kode_nasabah`);

--
-- Indexes for table `master_tabungan`
--
ALTER TABLE `master_tabungan`
  ADD KEY `kode_tabungan` (`kode_tabungan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id_transaksi` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
