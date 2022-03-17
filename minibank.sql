-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 11:43 PM
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

--
-- Dumping data for table `data_jenis_trx`
--

INSERT INTO `data_jenis_trx` (`kode_transaksi`, `ket_transaksi`, `jenis_neraca`) VALUES
('333', 'debet atm', 'Debet'),
('444', 'tarik tunai atm', 'Debet'),
('111', 'setor tunai', 'Kredit'),
('555', 'setor alfamart', 'Kredit'),
('666', 'tranfer atm', 'Transfer');

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

--
-- Dumping data for table `data_transaksi`
--

INSERT INTO `data_transaksi` (`no_rek`, `jenis_transaksi`, `debet`, `kredit`, `tgl_transaksi`, `id_transaksi`, `rek_tujuan`) VALUES
('1', '111', 0, 0, '2022-03-16', 1, ''),
('2', '111', 0, 120000, '2022-03-16', 2, ''),
('2', '444', 50000, 0, '2022-03-14', 3, ''),
('2', '111', 0, 10000, '2022-03-22', 4, ''),
('2', '333', 10000, 0, '2022-03-14', 5, ''),
('1', '111', 0, 100000, '2022-03-15', 6, ''),
('3', '555', 0, 150000, '2022-03-15', 7, ''),
('3', '666', 50000, 0, '2022-03-15', 8, '1'),
('1', '666', 50000, 0, '2022-03-15', 9, '3'),
('3', '666', 50000, 0, '2022-03-15', 10, '1'),
('1', '666', 0, 50000, '2022-03-15', 11, ''),
('1', '666', 50000, 0, '2022-03-15', 12, '3'),
('3', '666', 0, 50000, '2022-03-15', 13, ''),
('3', '666', 50000, 0, '2022-03-15', 14, '1'),
('1', '666', 0, 50000, '2022-03-15', 15, ''),
('2', '666', 25000, 0, '2022-03-15', 16, '1'),
('1', '666', 0, 25000, '2022-03-15', 17, ''),
('4', '111', 0, 50000, '2022-03-16', 20, ''),
('4', '111', 0, 10000, '2022-03-16', 21, '');

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

--
-- Dumping data for table `master_nasabah`
--

INSERT INTO `master_nasabah` (`kode_nasabah`, `nama_nasabah`, `alamat_nasabah`, `tgl_lahir_nasabah`, `nama_ibu_kandung`, `no_tlp_nasabah`, `jenis_program`) VALUES
('1', 'yuslich', 'menganti 1', '2022-03-15', 'ibu', 894100, '3'),
('2', 'budi', 'gresik', '2022-03-16', 'ibu', 894101, '1'),
('3', 'mita', 'pelem watu', '2022-03-08', 'mita', 894103, '1'),
('4', 'yani', 'bogor', '2022-03-16', 'yani', 888999, '3');

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
-- Dumping data for table `master_tabungan`
--

INSERT INTO `master_tabungan` (`kode_tabungan`, `nama_tabungan`, `setoran_minimal`) VALUES
('123', 'pendidikan', 100000),
('1', 'simpeda', 500000),
('3', 'tabanas', 23000),
('D1', 'deposito pemula', 5),
('5', 'batara', 60000);

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
  MODIFY `id_transaksi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
