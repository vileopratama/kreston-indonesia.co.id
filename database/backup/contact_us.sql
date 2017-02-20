-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Okt 2016 pada 10.20
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `fax_number` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `address`, `contact_name`, `city`, `country`, `phone_number`, `fax_number`, `email`, `website`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'International Office', 'Kreston International Limited\r\nSpringfield Lyons Business Centre\r\nSpringfield Lyons Approach\r\nSpringfield', 'Jon Lisby', 'Chelmsford,Essex CM2 5LB', 'ENGLAND', '+44(0) 1245 449 266', '+44(0) 1245 462 882', 'Jon@kreston.com', 'www.kreston.com', 1, '0000-00-00 00:00:00', 0, '2016-10-04 11:27:12', 1),
(2, 'Asia Pacific', '27th Floor Bank Of East Asia Centre 56 Gloucester Road', 'Edmond Chan', 'Wanchai', 'Hongkong', '+852 2526 1311', '+852 2526 6136', 'edmon_chan@kreston.com', NULL, 1, '2016-10-04 11:12:33', 1, '2016-10-04 11:12:33', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
