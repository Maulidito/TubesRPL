-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 09:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiketbus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `no_telp`, `username`, `password`) VALUES
('AD001', 'Andi', 812635417, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bis`
--

CREATE TABLE `bis` (
  `id_bis` varchar(255) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bis`
--

INSERT INTO `bis` (`id_bis`, `jumlah_kursi`) VALUES
('BS001', 50),
('BS002', 40),
('BS003', 50),
('BS004', 50),
('BS005', 45);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_pesanan` varchar(255) NOT NULL,
  `id_tiket` varchar(255) NOT NULL,
  `total_biaya` int(11) DEFAULT NULL,
  `tgl_pemesanan` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_pesanan`, `id_tiket`, `total_biaya`, `tgl_pemesanan`) VALUES
('PS1', 'TK001', 300000, '2021-05-06'),
('PS2', 'TK007', 250000, '2021-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `nomor_kursi` varchar(255) NOT NULL,
  `id_bis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`nomor_kursi`, `id_bis`) VALUES
('A04', 'BS001');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(255) NOT NULL,
  `id_pesanan` varchar(255) NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `nomor_rekening` varchar(255) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `nama_pengirim`, `nomor_rekening`, `total_pembayaran`, `tgl_pembayaran`, `status_pembayaran`) VALUES
('PB1', 'PS1', 'Andika', '9872615441623', 300000, '2021-05-06', 'Menunggu Konfirmasi Admin'),
('PB2', 'PS2', 'Rizki', '8274615442451623', 250000, '2021-05-10', 'Menunggu Konfirmasi Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(255) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jumlah_penumpang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_pemesan`, `no_telp`, `email`, `jumlah_penumpang`) VALUES
('PS1', 'Andi', 2147483647, 'andi@gmail.com', 3),
('PS2', 'Rizki', 2147483647, 'rizki@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` varchar(255) NOT NULL,
  `kota_asal` varchar(255) NOT NULL,
  `kota_tujuan` varchar(255) NOT NULL,
  `jam_keberangkatan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_bis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `kota_asal`, `kota_tujuan`, `jam_keberangkatan`, `harga`, `id_bis`) VALUES
('TK001', 'Cirebon', 'Bandung', '12.00', 100000, 'BS001'),
('TK002', 'Jakarta', 'Bandung', '13.00', 75000, 'BS002'),
('TK003', 'Jakarta', 'Bandung', '20.00', 75000, 'BS002'),
('TK004', 'Cirebon', 'Bandung', '15.00', 100000, 'BS001'),
('TK006', 'Bandung', 'Garut', '08.00', 125000, 'BS005'),
('TK007', 'Jakarta', 'Cirebon', '18.00', 125000, 'BS004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bis`
--
ALTER TABLE `bis`
  ADD PRIMARY KEY (`id_bis`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_pesanan`,`id_tiket`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`nomor_kursi`),
  ADD KEY `id_bis` (`id_bis`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_bis` (`id_bis`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`);

--
-- Constraints for table `kursi`
--
ALTER TABLE `kursi`
  ADD CONSTRAINT `kursi_ibfk_1` FOREIGN KEY (`id_bis`) REFERENCES `bis` (`id_bis`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_bis`) REFERENCES `bis` (`id_bis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
