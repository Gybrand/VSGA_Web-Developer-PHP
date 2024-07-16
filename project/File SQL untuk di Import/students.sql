-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 03:03 AM
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
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(6) NOT NULL,
  `name` varchar(191) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `birth` varchar(191) NOT NULL,
  `age` varchar(191) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `keluhanutama` varchar(200) NOT NULL,
  `anamnesis` varchar(100) NOT NULL,
  `pemeriksaanfisik` varchar(100) NOT NULL,
  `pemeriksaanlaboratorium` varchar(100) NOT NULL,
  `pemeriksaanimejing` varchar(100) NOT NULL,
  `terapi` varchar(100) NOT NULL,
  `instruksilanjutan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `gender`, `birth`, `age`, `pekerjaan`, `phone`, `keluhanutama`, `anamnesis`, `pemeriksaanfisik`, `pemeriksaanlaboratorium`, `pemeriksaanimejing`, `terapi`, `instruksilanjutan`) VALUES
(1, 'Palulu', 'Laki-Laki', '22 November 2004', '21', 'Pejabat', '0812334656905', 'Sehat', 'Aman', 'Sehat', 'Sehat', 'Sehat', 'Tidak Ada', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
