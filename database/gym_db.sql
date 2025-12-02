-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2025 at 05:38 PM
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
-- Database: `gym_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_member`
--

CREATE TABLE `jenis_member` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_member`
--

INSERT INTO `jenis_member` (`id`, `nama_jenis`, `harga`) VALUES
(1, 'Gold', 500000),
(2, 'Silver', 300000),
(3, 'Silver Membership', 300000),
(4, 'Gold Membership', 500000),
(5, 'Platinum VIP', 1000000),
(6, 'Student Promo', 150000),
(7, 'Couple Package', 550000),
(8, 'Day Pass', 50000),
(9, 'Corporate Plan', 2500000),
(10, 'Ladies Club', 250000),
(11, 'Power Lifter Pro', 450000),
(12, 'Yoga Class Only', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama_member`, `no_telp`) VALUES
(1, 'Ahmad Santoso', '081234567890'),
(2, 'Budi Pratama', '081398765432'),
(3, 'Citra Lestari', '081122334455'),
(4, 'Doni Kurniawan', '085712340987'),
(5, 'Eka Putri', '089654321012'),
(6, 'Fajar Nugraha', '082167894321'),
(7, 'Gita Gutawa', '081233445566'),
(8, 'Hadi Waluyo', '081908765432'),
(9, 'Indah Permata', '087811223344'),
(10, 'Joko Anwar', '085233445577');

-- --------------------------------------------------------

--
-- Table structure for table `pelatih`
--

CREATE TABLE `pelatih` (
  `id` int(11) NOT NULL,
  `nama_pelatih` varchar(100) NOT NULL,
  `keahlian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelatih`
--

INSERT INTO `pelatih` (`id`, `nama_pelatih`, `keahlian`) VALUES
(1, 'Coach Budi', 'Body Building'),
(2, 'Coach Ani', 'Yoga'),
(3, 'Coach Ade Rai KW', 'Body Building'),
(4, 'Coach Susi Susanti', 'Cardio & Stamina'),
(5, 'Coach Budi Strong', 'Power Lifting'),
(6, 'Coach Rina Zen', 'Yoga & Pilates'),
(7, 'Coach Jojo', 'Crossfit'),
(8, 'Coach Bambang', 'Calisthenics'),
(9, 'Coach Lisa', 'Zumba Dance'),
(10, 'Coach Tyson', 'Boxing'),
(11, 'Coach Dr. Asep', 'Rehabilitation'),
(12, 'Coach Sarah', 'Nutrition & Diet');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `id_pelatih` int(11) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_member`, `id_jenis`, `id_pelatih`, `tanggal_daftar`) VALUES
(1, 1, 2, 1, '2023-11-01'),
(2, 2, 1, 5, '2023-11-02'),
(3, 3, 4, 7, '2023-11-03'),
(4, 4, 3, 3, '2023-11-05'),
(5, 5, 10, 4, '2023-11-06'),
(6, 6, 6, 2, '2023-11-08'),
(7, 7, 5, 10, '2023-11-10'),
(8, 8, 2, 8, '2023-11-12'),
(9, 9, 8, 4, '2023-11-15'),
(10, 10, 9, 6, '2023-11-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_member`
--
ALTER TABLE `jenis_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelatih`
--
ALTER TABLE `pelatih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_pelatih` (`id_pelatih`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_member`
--
ALTER TABLE `jenis_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelatih`
--
ALTER TABLE `pelatih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_member` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pelatih`) REFERENCES `pelatih` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
