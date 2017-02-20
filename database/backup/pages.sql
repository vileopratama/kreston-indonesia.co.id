-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Okt 2016 pada 12.05
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
-- Struktur dari tabel `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `related_page` text,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `name`, `slug`, `content`, `url`, `related_page`, `meta_keyword`, `meta_description`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, 'About Us', 'about-us', '<h3>Your Business Reinforcement</h3>\r\n\r\n<p>Our Industry Experince Is Highly Regarded - We Provide , Broad Global Resources And Proven Experince In Consulting And Outsourcing</p>\r\n\r\n<p>There is point in time when your business needs reinforcement. We are commited to the timely and cost efficient use of our firm&#39;s Certified Public Accountants and support staff to provide necessary Reinformecent to Our clients, whenever their company requires profesional advice in the areas, such as taxation,advisory, and assurance services.</p>\r\n\r\n<p>Hendrawinata Eddy &amp; Siddharta (HES) is a member of Kreston International, one of the world&#39;s leading accounting and consulting organizations providing specialist advice to assist business owners to achieve success and reach their goals. Our industry experience is highly regarded-we provide,broad global resources and proven experience in consulting and outsourcing.</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://localhost/kreston/public/../media/images/shared/people/57f381835cff6.jpg" style="height:244px; width:619px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '/page/about-us', '1;2', 'About us', 'About Us', 1, '2016-10-04 17:12:18', 1, '2016-10-05 16:56:52', 1),
(2, 0, 'Our Services', 'our-services', '<p>Our Services</p>\r\n', '/page/our-services', '1;2', '', '', 1, '2016-10-05 09:33:06', 1, '2016-10-05 09:59:52', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
