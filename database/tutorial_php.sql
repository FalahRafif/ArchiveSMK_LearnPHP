-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2020 at 07:50 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nrp` char(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'MR key', '124378127', 'FRTGa@gmail.com', 'Teknik Informatika', '1.png'),
(2, 'Farindra Diaz Ibrahim', '124378128', 'Yazbros@gmail.com', 'Teknik Informatika', '2.png'),
(3, 'muhammad Dava Ravfriza', '124378129', 'RRRfriza@gmail.com', 'Teknik Informatika', '3.png'),
(4, 'Zikri Endisyah Munandar', '124378130', 'zikrizikrizikri@gmail.com', 'Teknik Informatika', '4.png'),
(26, 'Irsyadul Akhyar Al Khatamy', '124378131', 'blidul@gmail.com', 'Teknik Informatika', '5.png'),
(27, 'Riyan Firdziyansyah', '124378132', 'kangminum@gmail.com', 'Teknik Informatika', '6.png'),
(28, 'hermansyah', '123123', 'hermanto@gmail.com', 'vizniz', '5d8abd4ce10b7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'asd', '$2y$10$wsK/mZr5Pc0bNuGQQnIPd.14v0AgUU68Z4OEy7eASiPxe45I6bfvC'),
(2, 'admin', '$2y$10$.TAaWSUP1fjGTGn8jhRRmOXM/TYo9iazYMj0OEs8aJUhkg5yhrgi6'),
(3, 'masteradmin', '$2y$10$S1gBBGLqa65JU7tgtZva4O8z96PYXW5CxMhs5ZCD2na/Ku4foRIcS'),
(4, '123123', '$2y$10$kefoNLnje9RmwSX.W/FbB.GemNd7nLF36CgstloYcj89XK.xhZM5.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
