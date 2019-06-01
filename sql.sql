-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2019 at 11:30 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nita`
--

-- --------------------------------------------------------

--
-- Table structure for table `modals`
--

CREATE TABLE `modals` (
  `id_modals` int(11) NOT NULL,
  `modals` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modals`
--

INSERT INTO `modals` (`id_modals`, `modals`) VALUES
(1, '10000');

-- --------------------------------------------------------

--
-- Table structure for table `perhari`
--

CREATE TABLE `perhari` (
  `id_perhari` int(11) NOT NULL,
  `keterangan` varchar(550) NOT NULL,
  `referensi` varchar(200) NOT NULL,
  `pendapatan` varchar(50) NOT NULL,
  `pengeluaran` varchar(50) NOT NULL,
  `tgl_perhari` date NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perhari`
--

INSERT INTO `perhari` (`id_perhari`, `keterangan`, `referensi`, `pendapatan`, `pengeluaran`, `tgl_perhari`, `waktu`) VALUES
(2, 'Kulakan Tiket Pulsa', '1001A', '500', '0', '2019-03-20', '2019-03-17 06:57:05'),
(3, 'Kulakan Tiket Pulsa', '1001B', '0', '5000', '2019-03-21', '2019-03-17 10:02:39'),
(4, 'Jual Pulsa', '1001C', '0', '500', '2019-03-18', '2019-03-17 12:46:46'),
(5, 'Jual Pulsa Listrik', '1001D', '30000', '0', '2019-04-25', '2019-03-17 16:36:53'),
(6, 'coba', 'coba', '1000', '1000', '2019-04-25', '2019-03-21 19:44:25'),
(7, 'koba', 'koba', '10000', '10000', '2019-04-25', '2019-03-21 19:45:00'),
(8, 'Kulakan Tiket Pulsa', '100', '10000', '10000', '2019-03-18', '2019-03-21 19:45:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modals`
--
ALTER TABLE `modals`
  ADD PRIMARY KEY (`id_modals`);

--
-- Indexes for table `perhari`
--
ALTER TABLE `perhari`
  ADD PRIMARY KEY (`id_perhari`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modals`
--
ALTER TABLE `modals`
  MODIFY `id_modals` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `perhari`
--
ALTER TABLE `perhari`
  MODIFY `id_perhari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
