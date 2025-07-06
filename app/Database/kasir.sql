-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 05:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nama`, `email`, `password`) VALUES
('Admin202501251512405527', 'thoriq', 'thoriqmandailing1@gmail.com', '$2y$10$gxrjUL450cTh0usj9JPIhOnrRplvu0auzfvNJBSaYE9f29z12qut2'),
('Admin202507051021333809', 'ThoriqNasution', 'thoriqdeveloper@gmail.com', '$2y$10$RRPwZ18yb8n7VKm4krSh7eawOlQ1zKmn9Dszk8C.OQv32VPtJGbqu');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `idMeja` varchar(35) NOT NULL,
  `noMeja` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`idMeja`, `noMeja`) VALUES
('Meja202507021031246785', 1),
('Meja202507050723477787', 2),
('Meja202507050723532354', 3),
('Meja202507050723589032', 4),
('Meja202507050724038297', 5),
('Meja202507050724086686', 6),
('Meja202507050724146786', 7),
('Meja202507050724194521', 8),
('Meja202507050724247189', 9),
('Meja202507050724303191', 10);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` varchar(35) NOT NULL,
  `namaMenu` varchar(100) NOT NULL,
  `hargaMenu` int(150) NOT NULL,
  `kategoriMenu` varchar(50) NOT NULL,
  `gambarMenu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `namaMenu`, `hargaMenu`, `kategoriMenu`, `gambarMenu`) VALUES
('Menu202507040423367479', 'mie goreng', 40000, 'makanan', '1751617078_9e3cea339af8d508e225.jpg'),
('Menu202507040818238985', 'ayam penyet', 35000, 'makanan', '1751617103_94966363ffa5b5cdeccf.jpg'),
('Menu202507040818521141', 'nasi goreng kampung', 40000, 'makanan', '1751617132_5f2f4ad633d417f842ca.jpeg'),
('Menu202507040819164804', 'burger', 80000, 'makanan', '1751617156_55418b50af440a115a4f.jpg'),
('Menu202507040820344887', 'Minuman Premium 1', 90000, 'minuman', '1751617234_8a5f813d5083eef20042.jpg'),
('Menu202507040821033444', 'Minuman Premium 2', 45000, 'minuman', '1751617263_b3afbff68d3e18853642.jpg'),
('Menu202507040821258139', 'Minuman Premium 3', 25000, 'minuman', '1751617285_7dbd67b1f75c7a9b4129.jpg'),
('Menu202507040821466865', 'Minuman Premium 4', 60000, 'minuman', '1751617306_b2d714c787a44bb36668.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `idSession` varchar(100) NOT NULL,
  `jwt` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksisementara`
--

CREATE TABLE `transaksisementara` (
  `idTransaksi` varchar(35) NOT NULL,
  `namaMenu` varchar(100) NOT NULL,
  `hargaMenu` int(150) NOT NULL,
  `jumlah` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksisementara`
--

INSERT INTO `transaksisementara` (`idTransaksi`, `namaMenu`, `hargaMenu`, `jumlah`) VALUES
('Transaksi202507051033088697', 'ayam penyet', 35000, 3),
('Transaksi202507051033147618', 'burger', 80000, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`idMeja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`idSession`);

--
-- Indexes for table `transaksisementara`
--
ALTER TABLE `transaksisementara`
  ADD PRIMARY KEY (`idTransaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
