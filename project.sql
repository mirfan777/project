-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 11:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `kode_booking` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `gambar_mobil` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `transmisi` varchar(50) NOT NULL,
  `kursi` varchar(3) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `lama` int(11) NOT NULL,
  `tgl_ambil` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`kode_booking`, `nama`, `umur`, `email`, `hp`, `id_mobil`, `gambar_mobil`, `merk`, `tipe`, `transmisi`, `kursi`, `lokasi`, `harga`, `lama`, `tgl_ambil`, `tgl_pengembalian`, `total`) VALUES
(1, 'ucup', '25', 'ucup@gmail.com', '081548652', 9, '61eaa8f455c83.png', ' Toyota Vios', 'Sedan', 'Automatic', ' 5', ' Jakarta', 950000, 4, '2022-01-22', '2022-01-26', 3752500),
(2, 'udin', '22', 'udingaming123124@gmail.com', '1022455694563', 9, '61eaa8f455c83.png', ' Toyota Vios', 'Sedan', 'Automatic', ' 5', ' Jakarta', 950000, 5, '2022-01-24', '2022-01-29', 4702500),
(3, 'ucup', '22', 'ucup@gmail.com', '012216846', 15, '61eaaba06f532.jpg', ' Daihatsu Copen', 'SUV', 'Automatic', ' 2', ' Bali', 1250000, 4, '2022-02-04', '2022-02-08', 4937500),
(4, 'adul', '23', 'adul@gmail.com', '9021321312', 9, '61eaa8f455c83.png', ' Toyota Vios', 'Sedan', 'Automatic', ' 5', ' Jakarta', 950000, 3, '2022-02-03', '2022-02-06', 2850000);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `gambar_mobil` varchar(100) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `transmisi` varchar(20) NOT NULL,
  `kursi` varchar(10) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `gambar_mobil`, `merk`, `tipe`, `transmisi`, `kursi`, `lokasi`, `harga`) VALUES
(9, '61eaa8f455c83.png', ' Toyota Vios', 'Sedan', 'Automatic', ' 5', ' Jakarta', 950000),
(10, '61eaa9bbcfc25.jpg', ' Honda Civic Turbo', 'Sedan', 'Automatic', ' 5', ' Bandung', 1200000),
(11, '61eaaa3f0f987.png', 'Toyota Fortuner', 'SUV', 'Manual', '7', 'Jakarta', 550000),
(12, '61eaaa5def949.png', 'Toyota Fortuner', 'SUV', 'Automatic', '7', 'Medan', 600000),
(13, '61eaaaebea01c.jpg', 'Mitsubishi Pajero Sport', 'SUV', 'Automatic', '7', 'Papua', 560000),
(14, '61eaab2b593f4.jpg', ' Honda Brio', 'SUV', 'Manual', ' 5', ' Jakarta', 450000),
(15, '61eaaba06f532.jpg', '  Daihatsu Copen', 'Convertible', 'Automatic', '  2', '  Bali', 1250000),
(16, '61eaac5656afc.png', 'Mitsubishi Xpander', 'MPV', 'Manual', '7', 'Jakarta', 650000),
(17, '61eaace789903.png', 'Honda Mobilio', 'MPV', 'Manual', '7', 'Balikpapan', 680000),
(18, '61eaad5e5c39d.png', 'Toyota Kijang Innova', 'MPV', 'Manual', '7', 'Surabaya', 550000),
(19, '61eaaf61964d4.jpg', '   Toyota Hilux', 'Off Road', 'Manual', '   5', '   Bandung', 780000),
(20, '61eaafaf713db.jpg', 'Honda Brio', 'Hatchback ', 'Manual', '5', 'Yogyakarta', 650000),
(21, '61eaaffe43b0d.jpg', '  Toyota Hilux', 'Off Road', 'Manual', '  5', '  Pontianak', 750000),
(22, '61eab02b5268f.png', 'Honda Mobilio', 'MPV', 'Manual', '7', 'Makassar', 650000),
(23, '61eab0571fc9d.jpg', 'Honda Brio', 'Hatchback ', 'Manual', '5', 'Bali', 750000),
(24, '61eab0f87cda1.png', 'Toyota Kijang Innova', 'MPV', 'Manual', '7', 'Papua', 650000),
(25, '61eab17685424.jpg', 'Mitsubishi Pajero Sport', 'SUV', 'Manual', '7', 'Makassar', 750000),
(26, '61eab1a17b196.png', 'Toyota Kijang Innova', 'MPV', 'Manual', '7', 'Jakarta', 650000),
(27, '61eab1d631d35.png', 'Mitsubishi Xpander', 'MPV', 'Manual', '7', 'Jakarta', 700000),
(28, '61eab20065d15.png', 'Toyota Kijang Innova', 'MPV', 'Manual', '7', 'Bali', 700000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`) VALUES
('ucup', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`kode_booking`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `kode_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
