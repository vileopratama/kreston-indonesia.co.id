-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Sep 2016 pada 04.56
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
-- Struktur dari tabel `navigations`
--

CREATE TABLE `navigations` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `order` int(5) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `navigations`
--

INSERT INTO `navigations` (`id`, `parent_id`, `name`, `url`, `order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, 'Home', 'home', 1, 1, '2016-09-30 09:29:24', 1, '2016-09-30 09:29:24', 1),
(2, 0, 'Who We Are', '@url(who we are)', 2, 1, '2016-09-30 09:32:57', 1, '2016-09-30 09:32:57', 1),
(3, 2, 'About Us', '@page(about us)', 1, 1, '2016-09-30 09:34:01', 1, '2016-09-30 09:34:01', 1),
(4, 2, 'Services', '@page(services)', 2, 1, '2016-09-30 09:34:47', 1, '2016-09-30 09:34:47', 1),
(5, 2, 'Achievements', '@page(achievements)', 3, 1, '2016-09-30 09:35:55', 1, '2016-09-30 09:35:55', 1),
(6, 2, 'Testimonials', '@page(testimonial)', 4, 1, '2016-09-30 09:38:42', 1, '2016-09-30 09:38:42', 1),
(7, 2, 'Our Divisions', '@page(our-divisions)', 5, 1, '2016-09-30 09:42:25', 1, '2016-09-30 09:42:25', 1),
(8, 0, 'News', 'News', 4, 1, '2016-09-30 09:51:08', 1, '2016-09-30 09:53:14', 1),
(9, 0, 'Article', 'Article', 5, 1, '2016-09-30 09:51:39', 1, '2016-09-30 09:52:54', 1),
(10, 0, 'Our Partner', '@partner', 3, 1, '2016-09-30 09:52:03', 1, '2016-09-30 09:52:03', 1),
(11, 0, 'Gallery', '@gallery', 6, 1, '2016-09-30 09:54:15', 1, '2016-09-30 09:54:15', 1),
(12, 0, 'Career', '@career', 7, 1, '2016-09-30 09:54:56', 1, '2016-09-30 09:54:56', 1),
(13, 0, 'Contact Us', '@contact', 8, 1, '2016-09-30 09:55:13', 1, '2016-09-30 09:55:13', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
