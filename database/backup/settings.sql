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
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'site_name', 'Test Site', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'meta_author', 'Suhendar', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'meta_keyword', 'kantor akuntan,akuntan publik', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'meta_content', 'Testing', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'company_name', 'PT Test Indonesia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'company_address', 'Jalan pemuda Perjuangan No.6A/100', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'company_city', 'Bandung', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'company_country', 'Indonesia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 'company_phone_number', '485882000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 'company_fax_number', '485882000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'company_email', 'ssuhendar@bdo.co.id', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'limit_page', '10', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'social_facebook', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'social_twitter', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'social_glus', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'social_linkedin', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
