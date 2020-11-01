-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 05:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_infokuliner`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kuliner`
--

CREATE TABLE `data_kuliner` (
  `id` int(11) NOT NULL,
  `Jenis_Kuliner` set('Makanan','Minuman') NOT NULL,
  `Nama_Kuliner` varchar(45) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kuliner`
--

INSERT INTO `data_kuliner` (`id`, `Jenis_Kuliner`, `Nama_Kuliner`, `Keterangan`, `id_admin`, `photo`) VALUES
(37, 'Makanan', 'Mie Kober', 'Mie Pedas hits', 1, 'kober.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_login`
--

CREATE TABLE `data_login` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `active` set('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_login`
--

INSERT INTO `data_login` (`id`, `email`, `password`, `active`) VALUES
(1, 'gitaoktayani@gmail.com', '8b976b8a0d658f6f4e4e0bde932f5bc6', 'Y'),
(2, 'gita.oktayani@undiksha.ac.id', 'afac2129d1b85dc057588b8663472ac3', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_makan`
--

CREATE TABLE `tempat_makan` (
  `id` int(11) NOT NULL,
  `Nama_Tempat` varchar(45) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat_makan`
--

INSERT INTO `tempat_makan` (`id`, `Nama_Tempat`, `Alamat`, `id_admin`) VALUES
(1, 'Richeese Factory Denpasar', 'jalan gatsu barat no 4 denpasar bali', 1),
(2, 'Ngerodok Resto', 'Jalam Mulawarman Gianyar', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kuliner`
--
ALTER TABLE `data_kuliner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_login`
--
ALTER TABLE `data_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kuliner`
--
ALTER TABLE `data_kuliner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
