-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2018 at 09:26 PM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cools_map`
--

-- --------------------------------------------------------

--
-- Table structure for table `fotocopy`
--

CREATE TABLE `fotocopy` (
  `id_fc` int(5) NOT NULL,
  `coordinate` char(100) NOT NULL,
  `name` char(50) NOT NULL,
  `picture` char(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `indekos`
--

CREATE TABLE `indekos` (
  `id_kos` char(7) NOT NULL,
  `coordinate` char(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `picture` char(80) NOT NULL,
  `rates` smallint(15) NOT NULL,
  `rooms_facility` char(255) NOT NULL,
  `total_rooms` int(20) NOT NULL,
  `type` char(8) NOT NULL,
  `address` varchar(255) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jatim`
--

CREATE TABLE `jatim` (
  `kabupaten` varchar(50) NOT NULL,
  `kecamatan` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jatim`
--

INSERT INTO `jatim` (`kabupaten`, `kecamatan`) VALUES
('Jombang', 'Bandar Kedung Mulyo\r\nBareng\r\nDiwek\r\nGudo\r\nJogoroto\r\nJombang\r\nKabuh\r\nKesamben\r\nMegaluh\r\nMojoagung\r\nNgoro\r\nNgusikan\r\nPerak\r\nPeterongan\r\nPlandaan\r\nPloso\r\nSumobito\r\nTembelang\r\nWonosalam');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(10) NOT NULL,
  `level` char(20) NOT NULL,
  `level_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`, `level_code`) VALUES
(1, 'Administrator', 'adm'),
(2, 'Contributor', 'cnt'),
(3, 'User', 'usr');

-- --------------------------------------------------------

--
-- Table structure for table `pesantren`
--

CREATE TABLE `pesantren` (
  `id_ps` int(11) NOT NULL,
  `coordinate` char(100) NOT NULL,
  `name` char(100) NOT NULL,
  `image` char(255) NOT NULL,
  `phone_number` char(20) NOT NULL,
  `facility` text NOT NULL,
  `description` text NOT NULL,
  `daily_activities` text NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kecamatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` char(100) NOT NULL,
  `email` varchar(10) NOT NULL,
  `level` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `warnet`
--

CREATE TABLE `warnet` (
  `id_wnt` int(5) NOT NULL,
  `coordinate` char(100) NOT NULL,
  `name` char(50) NOT NULL,
  `facility` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kecamatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `warung`
--

CREATE TABLE `warung` (
  `id_wrg` int(5) NOT NULL,
  `coordinate` char(100) NOT NULL,
  `name` char(30) NOT NULL,
  `picture` char(80) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `worship_place`
--

CREATE TABLE `worship_place` (
  `id_wrsp` int(5) NOT NULL,
  `coordinate` char(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kecamatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotocopy`
--
ALTER TABLE `fotocopy`
  ADD PRIMARY KEY (`id_fc`),
  ADD UNIQUE KEY `kabupaten` (`kabupaten`),
  ADD KEY `kecamatan` (`kecamatan`);

--
-- Indexes for table `indekos`
--
ALTER TABLE `indekos`
  ADD UNIQUE KEY `kabupaten` (`kabupaten`),
  ADD UNIQUE KEY `kecamatan` (`kecamatan`);

--
-- Indexes for table `jatim`
--
ALTER TABLE `jatim`
  ADD UNIQUE KEY `kabupaten` (`kabupaten`),
  ADD KEY `kecamatan` (`kecamatan`(191)),
  ADD KEY `kecamatan_2` (`kecamatan`(191));

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`),
  ADD UNIQUE KEY `id_level_2` (`id_level`),
  ADD UNIQUE KEY `level_code` (`level_code`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `pesantren`
--
ALTER TABLE `pesantren`
  ADD PRIMARY KEY (`id_ps`),
  ADD UNIQUE KEY `kabupaten` (`kabupaten`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `level` (`level`);

--
-- Indexes for table `warnet`
--
ALTER TABLE `warnet`
  ADD PRIMARY KEY (`id_wnt`),
  ADD UNIQUE KEY `kabupaten` (`kabupaten`);

--
-- Indexes for table `warung`
--
ALTER TABLE `warung`
  ADD PRIMARY KEY (`id_wrg`),
  ADD UNIQUE KEY `kabupaten` (`kabupaten`);

--
-- Indexes for table `worship_place`
--
ALTER TABLE `worship_place`
  ADD PRIMARY KEY (`id_wrsp`),
  ADD UNIQUE KEY `kabupaten` (`kabupaten`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotocopy`
--
ALTER TABLE `fotocopy`
  MODIFY `id_fc` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pesantren`
--
ALTER TABLE `pesantren`
  MODIFY `id_ps` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warnet`
--
ALTER TABLE `warnet`
  MODIFY `id_wnt` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warung`
--
ALTER TABLE `warung`
  MODIFY `id_wrg` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `worship_place`
--
ALTER TABLE `worship_place`
  MODIFY `id_wrsp` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fotocopy`
--
ALTER TABLE `fotocopy`
  ADD CONSTRAINT `fotocopy_ibfk_1` FOREIGN KEY (`kabupaten`) REFERENCES `jatim` (`kabupaten`);

--
-- Constraints for table `indekos`
--
ALTER TABLE `indekos`
  ADD CONSTRAINT `indekos_ibfk_1` FOREIGN KEY (`kabupaten`) REFERENCES `jatim` (`kabupaten`);

--
-- Constraints for table `pesantren`
--
ALTER TABLE `pesantren`
  ADD CONSTRAINT `pesantren_ibfk_1` FOREIGN KEY (`kabupaten`) REFERENCES `jatim` (`kabupaten`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`id_level`) ON UPDATE NO ACTION;

--
-- Constraints for table `warnet`
--
ALTER TABLE `warnet`
  ADD CONSTRAINT `warnet_ibfk_1` FOREIGN KEY (`kabupaten`) REFERENCES `jatim` (`kabupaten`);

--
-- Constraints for table `warung`
--
ALTER TABLE `warung`
  ADD CONSTRAINT `warung_ibfk_1` FOREIGN KEY (`kabupaten`) REFERENCES `jatim` (`kabupaten`);

--
-- Constraints for table `worship_place`
--
ALTER TABLE `worship_place`
  ADD CONSTRAINT `worship_place_ibfk_1` FOREIGN KEY (`kabupaten`) REFERENCES `jatim` (`kabupaten`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;