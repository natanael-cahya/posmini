-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 04:58 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posmini`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`) VALUES
(1, 'a', '$2a$12$TN8XzTkZIrGW1AcuA8eP7OMCZGdDTNOwo5oSBF/3cIWhzfaUYW7rC');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(150) NOT NULL,
  `deskripsi_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`) VALUES
('1', 'Aplikasi', '<p><strong>ini adalah deskripsi dari Aplikasi</strong></p>\r\n'),
('2', 'Gadget', '<p><strong>ini adalah deskripsi dari Gadget</strong></p>\r\n'),
('3', 'Buku', '<p><strong>ini adalah deskripsi dari Buku</strong></p>\r\n'),
('4', 'Aplikasi + Gadget', '<p><strong>ini adalah deskripsi dari Aplikasi + Gadget</strong></p>\r\n'),
('5', 'Sprinter', '<p><strong>ini adalah deskripsi dari Sprinter</strong></p>\r\n'),
('6', 'Printer', '<p><strong>ini adalah deskripsi dari printer</strong></p>\r\n'),
('7', 'Lainnya', '<p><strong>ini adalah deskripsi dari Lainnya</strong></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(50) NOT NULL,
  `img` varchar(125) NOT NULL,
  `id_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga`, `img`, `id_kategori`) VALUES
('1', 'Paket Advance', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non in, ducimus eos inventore fuga impedit porro dignissimos architecto tempora optio officia repudiandae vero ipsa ipsum dolorum veritatis minima maiores expedita</p>\r\n', '45000', 'paket-advance.png', '1'),
('2', 'Paket Desktop', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non in, ducimus eos inventore fuga impedit porro dignissimos architecto tempora optio officia repudiandae vero ipsa ipsum dolorum veritatis minima maiores expedita</p>\r\n', '12000', 'paket-desktop.png', '2'),
('3', 'Paket Lifestyle', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non in, ducimus eos inventore fuga impedit porro dignissimos architecto tempora optio officia repudiandae vero ipsa ipsum dolorum veritatis minima maiores expedita</p>\r\n', '15000', 'paket-lifestyle.png', '3'),
('4', 'Standart Repo', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non in, ducimus eos inventore fuga impedit porro dignissimos architecto tempora optio officia repudiandae vero ipsa ipsum dolorum veritatis minima maiores expedita</p>\r\n', '12000', 'standard_repo.png', '4'),
('619e31864ad52', 'Paket Sprinter', '<p><strong>paket sprinter nih boy</strong></p>\r\n', '3350000', '237797f481252613afaf63f5eb56b5d3.jpg', '5'),
('619ef93ccde1a', 'natanael60', 'Sistem Informasi', '120000', 'default.png', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `nama_produk` (`nama_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kategori_2` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
