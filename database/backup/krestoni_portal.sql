-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Inang: localhost:3306
-- Waktu pembuatan: 10 Jan 2017 pada 11.00
-- Versi Server: 10.0.28-MariaDB
-- Versi PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `krestoni_portal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `advertisings`
--

CREATE TABLE IF NOT EXISTS `advertisings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `storage_location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `advertisings`
--

INSERT INTO `advertisings` (`id`, `name`, `link`, `storage_location`, `description`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Kreston Indonesia', 'http://www.kreston-indonesia.co.id', '/media/images/shared/advertising/58539795a074b.png', 'People do business', 1, '2016-10-20 05:08:33', 1, '2016-12-16 14:30:12', 1),
(2, 'Ikatan Akuntan Publik Indonesia', 'http://iapi.or.id', '/media/images/shared/advertising/58456c54a546f.png', 'Ikatan Publik Akuntan Indonesia', 0, '2016-10-20 05:10:28', 1, '2016-12-16 14:21:31', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order` int(3) NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Auditing', 'auditing', 2, 1, '2016-10-12 04:00:00', 1, '2016-10-20 05:23:13', 1),
(2, 'Accounting', 'accounting', 1, 1, '2016-10-11 08:00:00', 1, '0000-00-00 00:00:00', 0),
(3, 'Finance', 'finance', 3, 1, '2016-10-03 07:00:00', 1, '2016-10-20 05:26:05', 1),
(4, 'Tax', 'tax', 4, 1, '2016-10-11 05:00:00', 1, '2016-10-20 05:28:51', 1),
(5, 'Others', 'others', 5, 1, '2016-10-03 07:00:00', 1, '2016-10-20 05:30:37', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_messages`
--

CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(18) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `mobile_number`, `subject`, `message`, `ip_address`, `created_at`) VALUES
(6, 'Tamara Junyansyah', 'junyansyahtamara@gmail.com', '085881418796', 'Ketersediaan Magang Bagian Perpajakan', 'Yth Bapak/Ibu\r\nDi tempat\r\n\r\n\r\nPerkenalkan nama saya Tamara Junyansyah saya mahasiswi semester 6 di Perbanas Institute Jakarta  jurusan D3 Akuntansi Perpajakan. Maaf mengganggu, tujuan saya mengirim email ini adalah untuk menanyakan apakah di Kreaston Indonesia membuka lowongan magang untuk bagian pajak?\r\n\r\nSaya sangat mengharapkan balasan email ini dari Bapak/Ibu dan terima kasih atas perhatiannya.\r\n\r\nDengan Hormat\r\n\r\n\r\n(Tamara Junyansyah)\r\n\r\n\r\n', '114.4.78.222', '2016-12-26 12:58:57'),
(7, 'Joy Dove', 'joyid@hlsholding.com', '082157777064', 'General Audit', 'Dengan Hormat,\r\n\r\nKami mohon untuk diberikan penawaran general audit/financial statement 2016 untuk perusahaan kami, PT. Honour Lane Shipping dalam bahasa inggris.\r\n\r\nBest regards,\r\nJoy', '182.253.21.114', '2016-12-28 15:26:48'),
(15, 'Ikbal Adya Nugraha', 'ikbaladya@gmail.com', '085747782697', 'Job Opportunitieso', 'Dear, Kreston Indonesia\r\n\r\nI am Ikbal Adya Nugraha, freshgraduate from Jenderal Soedirman University. I am kindly ask for any job opportunities in kreston Indonesia. thank you for your attantion.\r\n\r\nBest Regards,\r\nIkbal Adya Nugraha', '114.121.128.42', '2017-01-05 03:23:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `fax_number` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `order` int(3) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `slug`, `address`, `contact_name`, `city`, `zip_code`, `country`, `phone_number`, `fax_number`, `email`, `website`, `order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'International Office', 'international-office', 'Kreston International Limited\r\nSpringfield Lyons Business Centre\r\nSpringfield Lyons Approach\r\nSpringfield', 'Jon Lisby', 'Chelmsford', 'Essex CM2 5LB', 'ENGLAND', '+44(0) 1245 449 266', '+44(0) 1245 462 882', 'Jon@kreston.com', 'www.kreston.com', 6, 1, '0000-00-00 00:00:00', 0, '2016-10-12 08:51:53', 1),
(2, 'Asia Pacific', 'asia-pacific', '27th Floor Bank Of East Asia Centre 56 Gloucester Road', 'Edmond Chan', 'Wanchai', '', 'Hongkong', '+852 2526 1311', '+852 2526 6136', 'edmon_chan@kreston.com', '', 7, 1, '2016-10-04 11:12:33', 1, '2016-10-12 08:52:14', 1),
(3, 'Americas', 'americas', 'Suite 2000 401 Plymouth Road Plymouth Meeting\r\n', 'Saul Reibstein', 'Pennsylvania', '19462', 'United States of America', '+1 610 862 2300', '+1 610 850 5222', '', '', 8, 1, '2016-10-07 04:43:20', 1, '2016-10-12 08:52:24', 1),
(4, 'Jakarta - Sudirman Office', 'jakarta-sudirman-office', 'Intiland Tower 18th Floor Jl.Jend. Sudirman Kav.32\r\n', 'Jakarta - Sudirman Office', 'DKI Jakarta', '10220', 'Indonesia', '+62 21 571 2000', '+62 21 571 1818 / 570 6118', 'hes-sudirman@kreston-indonesia.co.id', 'kreston-indonesia.co.id', 2, 1, '2016-10-07 04:49:40', 1, '2016-10-12 08:50:47', 1),
(5, 'Jakarta - Simatupang Office', 'jakarta-simatupang-office', '18 Office Park Tower A Lt. 20 Jl. TB. Simatupang No. 18', 'Desman P.L. Tobing', 'DKI Jakarta', '12520 ', 'Indonesia', '+62 21 2270 8292', '+62 21 2270 8299', 'hest-tbsimatupang@kreston-indonesia.co.id', 'kreston-indonesia.co.id', 1, 1, '2016-10-07 04:55:05', 1, '2016-10-12 08:50:33', 1),
(6, 'Medan Office', 'medan-office', 'Kreston Building Jl.Palang Merah No.40\r\n', 'Robby Sumargo', 'Medan', '20111', 'Indonesia', '+62 61 455 7925 / 415 7259', '+62 61 451 3159', 'hes-medan@kreston-indonesia.co.id', 'kreston-indonesia.co.id', 3, 1, '2016-10-07 04:58:12', 1, '2016-10-12 08:51:07', 1),
(7, 'Surabaya Office', 'surabaya-office', 'Darmo Park II Blok III No. 19-20 Jl. Mayjend sungkono', 'Ary Daniel Hartanto', 'Surabaya ', '60225', 'Indonesia', '+62 31 567 1713', '+62 61 563 1842', 'hes-surabaya@kreston-indonesia.co.id', 'kreston-indonesia.co.id', 4, 1, '2016-10-07 05:03:06', 1, '2016-10-12 08:51:26', 1),
(8, 'Yogyakarta Office', 'yogyakarta-office', 'Jl.Seturan Raya No. 100 R1', 'Iskandar Dzulqarnain', 'Yogyakarta ', '55281', 'Indonesia', '+62 274 433 2691', '+62 274 485 406', 'hes-yogyakarta@kreston-indonesia.co.id', 'kreston-indonesia.co.id', 5, 1, '2016-10-07 05:09:30', 1, '2016-10-12 08:51:37', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery_events`
--

CREATE TABLE IF NOT EXISTS `gallery_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `gallery_events`
--

INSERT INTO `gallery_events` (`id`, `name`, `date_from`, `date_to`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Outing in Cianjur', '2016-10-01', '2016-10-03', 1, '2016-10-03 07:00:00', 1, '0000-00-00 00:00:00', 0),
(2, 'Outing Singapore ', '2016-10-03', '2016-10-03', 1, '2016-10-03 09:47:35', 1, '2016-10-03 09:47:35', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery_photos`
--

CREATE TABLE IF NOT EXISTS `gallery_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_event_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo_storage_location` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `gallery_photos`
--

INSERT INTO `gallery_photos` (`id`, `gallery_event_id`, `description`, `photo_storage_location`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(11, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/b-vldclcuaauxmu.jpg', 1, '2016-10-07 02:43:59', 1, '2016-10-07 02:43:59', 1),
(12, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/activitypotatoastra01.jpg', 1, '2016-10-07 02:48:11', 1, '2016-10-07 02:48:11', 1),
(13, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/cibodas-outing.jpg', 1, '2016-10-07 02:50:08', 1, '2016-10-07 02:50:08', 1),
(14, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/pengalaman-outing.jpg', 1, '2016-10-07 02:50:53', 1, '2016-10-07 02:50:53', 1),
(15, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/gn-padang2.jpg', 1, '2016-10-07 02:51:34', 1, '2016-10-07 02:51:34', 1),
(16, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/img0891.jpg', 1, '2016-10-07 02:52:10', 1, '2016-10-07 02:52:10', 1),
(17, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/img6576.jpg', 1, '2016-10-07 02:53:20', 1, '2016-10-07 02:53:20', 1),
(18, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/slideoctagonbootcampguide.png', 1, '2016-10-07 04:00:18', 1, '2016-10-07 04:00:18', 1),
(19, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/slideoctagonfunrefresh.png', 1, '2016-10-07 04:00:30', 1, '2016-10-07 04:00:30', 1),
(20, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/img7824.jpg', 1, '2016-10-07 04:20:47', 1, '2016-10-07 04:20:47', 1),
(21, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/dsc7573.jpg', 1, '2016-10-07 04:22:33', 1, '2016-10-07 04:22:33', 1),
(22, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/cv2tva3veaabx8v.jpg', 1, '2016-10-07 04:24:55', 1, '2016-10-07 04:24:55', 1),
(23, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/outbound-lembang---lembang-adventure.jpg', 1, '2016-10-07 04:26:29', 1, '2016-10-07 04:26:29', 1),
(24, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/kemenkes.jpg', 1, '2016-10-07 04:27:04', 1, '2016-10-07 04:27:04', 1),
(25, 1, 'Lorem ipsum dolor sit amet, consectetur', 'gallery/outing-in-cianjur/outbound-team-building-dengan-armada-land-rover-dengan-start-hotel-menuju-hutan-sukawana-gunung-putri-dan-cikole-lembang-outbound-lembang-outbound-bandung-58.jpg', 1, '2016-10-07 04:27:10', 1, '2016-10-07 04:27:10', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `home_banners`
--

CREATE TABLE IF NOT EXISTS `home_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `storage_location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `home_banners`
--

INSERT INTO `home_banners` (`id`, `name`, `storage_location`, `description`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Kreston Team', '/media/images/shared/banner/5845683e4ee47.png', 'Kreston Indonesia Team', 1, '2016-09-28 19:20:15', 2, '2016-12-05 20:14:58', 2),
(2, 'Kreston Team', '/media/images/shared/banner/584568904fdf3.png', 'to provide the highest quality services in supporting our client''s desire for growth, strength and dominance', 1, '2016-09-28 21:52:41', 2, '2016-12-05 20:20:52', 2),
(3, 'Kreston Professional Team', '/media/images/shared/banner/58456920384ee.png', 'Professional Team', 1, '2016-09-28 22:29:55', 2, '2016-12-05 20:20:07', 2),
(4, 'Kreston Indonesia Slogan', '/media/images/shared/banner/58456a0995f93.png', 'Our Kreston Indonesia Slogan Motto', 1, '2016-12-05 20:23:20', 1, '2016-12-05 20:23:20', 1),
(5, 'Business Advisory Services', '/media/images/shared/banner/58456ad42752d.png', 'Financial Advisory, Internal Audit, Strategic Management', 1, '2016-12-05 20:26:30', 1, '2016-12-05 20:26:30', 1),
(6, 'Kreston Internatinal conference in Bangkok', '/media/images/shared/banner/58578755b7fea.jpg', 'Kreston Internatinal conference in Bangkok – Thailand November 11, 2016', 1, '2016-12-19 14:08:19', 1, '2016-12-19 14:08:19', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_vacancies`
--

CREATE TABLE IF NOT EXISTS `job_vacancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `due_date` date NOT NULL,
  `position` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `requirements` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `job_vacancies`
--

INSERT INTO `job_vacancies` (`id`, `name`, `due_date`, `position`, `location`, `description`, `responsibilities`, `requirements`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Internal Audit Supervisor', '2016-12-15', 'Auditor', 'Jakarta Sudirman Office', '<p>Kreston is one of the leading global organizations with more than 175,000 employees all over the world. There is no better time than now to join u.EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as</p>\r\n', '<ul>\r\n	<li>Increase the level of awareness and compliance with policy</li>\r\n	<li>Commitment to promote company values and ethics</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<ul>\r\n	<li>Candidate must possess at least a Bachelor&#39;s Degree, Economics, Finance/Accountancy/Banking or equivalent.</li>\r\n	<li>At least 3 year(s) of working experience in the related field is required for this position.</li>\r\n	<li>Preferably Supervisor / Coordinators specializing in Finance - Audit/Taxation or equivalent.</li>\r\n	<li>Preferably have a working experience in FMCG or distribution company</li>\r\n</ul>\r\n', 1, '2016-10-07 06:08:14', 1, '2016-10-07 06:09:02', 1),
(2, 'Junior Auditor (Graduate Trainee)', '2016-12-16', 'Auditor', 'Jakarta Simatupang Office', '<p>Kreston is one of the leading global organizations with more than 175,000 employees all over the world. There is no better time than now to join u.EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as</p>\r\n', '<ul>\r\n	<li>Increase the level of awareness and compliance with policy</li>\r\n	<li>Commitment to promote company values and ethics</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<ul>\r\n	<li>Candidate must possess at least a Bachelor&#39;s Degree, Economics, Finance/Accountancy/Banking or equivalent.</li>\r\n	<li>At least 3 year(s) of working experience in the related field is required for this position.</li>\r\n	<li>Preferably Supervisor / Coordinators specializing in Finance - Audit/Taxation or equivalent.</li>\r\n	<li>Preferably have a working experience in FMCG or distribution company</li>\r\n</ul>\r\n', 1, '2016-10-07 06:08:14', 1, '2016-10-07 06:09:02', 1),
(3, 'Internal Audit Staff', '2016-12-18', 'Auditor', 'Medan Office', '<p>Kreston is one of the leading global organizations with more than 175,000 employees all over the world. There is no better time than now to join u.EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as</p>\r\n', '<ul>\r\n	<li>Increase the level of awareness and compliance with policy</li>\r\n	<li>Commitment to promote company values and ethics</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<ul>\r\n	<li>Candidate must possess at least a Bachelor&#39;s Degree, Economics, Finance/Accountancy/Banking or equivalent.</li>\r\n	<li>At least 3 year(s) of working experience in the related field is required for this position.</li>\r\n	<li>Preferably Supervisor / Coordinators specializing in Finance - Audit/Taxation or equivalent.</li>\r\n	<li>Preferably have a working experience in FMCG or distribution company</li>\r\n</ul>\r\n', 1, '2016-10-07 06:08:14', 1, '2016-10-07 06:09:02', 1),
(4, 'Staff Audit Inventory', '2016-12-18', 'Auditor', 'Yogyakarta Office', '<p>Kreston is one of the leading global organizations with more than 175,000 employees all over the world. There is no better time than now to join u.EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as</p>\r\n', '<ul>\r\n	<li>Increase the level of awareness and compliance with policy</li>\r\n	<li>Commitment to promote company values and ethics</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<ul>\r\n	<li>Candidate must possess at least a Bachelor&#39;s Degree, Economics, Finance/Accountancy/Banking or equivalent.</li>\r\n	<li>At least 3 year(s) of working experience in the related field is required for this position.</li>\r\n	<li>Preferably Supervisor / Coordinators specializing in Finance - Audit/Taxation or equivalent.</li>\r\n	<li>Preferably have a working experience in FMCG or distribution company</li>\r\n</ul>\r\n', 1, '2016-10-07 06:08:14', 1, '2016-10-07 06:09:02', 1),
(5, 'Associate Auditor', '2016-12-18', 'Auditor', 'Jakarta Sudirman Office', '<p>Kreston is one of the leading global organizations with more than 175,000 employees all over the world. There is no better time than now to join u.EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as</p>\r\n', '<ul>\r\n	<li>Increase the level of awareness and compliance with policy</li>\r\n	<li>Commitment to promote company values and ethics</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<ul>\r\n	<li>Candidate must possess at least a Bachelor&#39;s Degree, Economics, Finance/Accountancy/Banking or equivalent.</li>\r\n	<li>At least 3 year(s) of working experience in the related field is required for this position.</li>\r\n	<li>Preferably Supervisor / Coordinators specializing in Finance - Audit/Taxation or equivalent.</li>\r\n	<li>Preferably have a working experience in FMCG or distribution company</li>\r\n</ul>\r\n', 1, '2016-10-07 06:08:14', 1, '2016-10-07 06:09:02', 1),
(6, 'Senior Auditor', '2016-12-18', 'Auditor', 'Jakarta Sudirman Office', '<p>Kreston is one of the leading global organizations with more than 175,000 employees all over the world. There is no better time than now to join u.EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as</p>\r\n', '<ul>\r\n	<li>Increase the level of awareness and compliance with policy</li>\r\n	<li>Commitment to promote company values and ethics</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<ul>\r\n	<li>Candidate must possess at least a Bachelor&#39;s Degree, Economics, Finance/Accountancy/Banking or equivalent.</li>\r\n	<li>At least 3 year(s) of working experience in the related field is required for this position.</li>\r\n	<li>Preferably Supervisor / Coordinators specializing in Finance - Audit/Taxation or equivalent.</li>\r\n	<li>Preferably have a working experience in FMCG or distribution company</li>\r\n</ul>\r\n', 1, '2016-10-07 06:08:14', 1, '2016-10-07 06:09:02', 1),
(7, 'Supervisor Auditor', '2016-12-18', 'Auditor', 'Jakarta Sudirman Office', '<p>Kreston is one of the leading global organizations with more than 175,000 employees all over the world. There is no better time than now to join u.EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as</p>\r\n', '<ul>\r\n	<li>Increase the level of awareness and compliance with policy</li>\r\n	<li>Commitment to promote company values and ethics</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<ul>\r\n	<li>Candidate must possess at least a Bachelor&#39;s Degree, Economics, Finance/Accountancy/Banking or equivalent.</li>\r\n	<li>At least 3 year(s) of working experience in the related field is required for this position.</li>\r\n	<li>Preferably Supervisor / Coordinators specializing in Finance - Audit/Taxation or equivalent.</li>\r\n	<li>Preferably have a working experience in FMCG or distribution company</li>\r\n</ul>\r\n', 1, '2016-10-07 06:08:14', 1, '2016-10-07 06:09:02', 1),
(8, 'Manager Auditor', '2016-12-18', 'Auditor', 'Jakarta Sudirman Office', '<p>Kreston is one of the leading global organizations with more than 175,000 employees all over the world. There is no better time than now to join u.EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as EY Indonesia is looking for talented candidates to join our Assurance practice to support and drive its growth as</p>\r\n', '<ul>\r\n	<li>Increase the level of awareness and compliance with policy</li>\r\n	<li>Commitment to promote company values and ethics</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<ul>\r\n	<li>Candidate must possess at least a Bachelor&#39;s Degree, Economics, Finance/Accountancy/Banking or equivalent.</li>\r\n	<li>At least 3 year(s) of working experience in the related field is required for this position.</li>\r\n	<li>Preferably Supervisor / Coordinators specializing in Finance - Audit/Taxation or equivalent.</li>\r\n	<li>Preferably have a working experience in FMCG or distribution company</li>\r\n</ul>\r\n', 1, '2016-10-07 06:08:14', 1, '2016-10-07 06:09:02', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `navigations`
--

CREATE TABLE IF NOT EXISTS `navigations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `post` varchar(100) NOT NULL,
  `order` int(5) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data untuk tabel `navigations`
--

INSERT INTO `navigations` (`id`, `parent_id`, `name`, `url`, `post`, `order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, 'Home', '/home', '', 1, 1, '2016-10-06 10:24:32', 1, '2016-10-06 10:24:32', 1),
(3, 0, 'About Us', '/page/about-us', '', 2, 1, '2016-10-06 10:37:23', 1, '2016-10-07 14:54:00', 1),
(4, 0, 'Services', '/page/services', '', 3, 1, '2016-10-06 17:25:48', 1, '2017-01-10 08:24:04', 1),
(5, 0, 'Gallery', '/gallery/collection', '', 7, 1, '2016-10-07 04:37:33', 1, '2016-10-07 04:37:33', 1),
(6, 0, 'Contact Us', '/contact-us', 'Contact Us', 8, 1, '2016-10-07 04:38:26', 1, '2016-10-12 08:42:51', 1),
(7, 0, 'Career', '/job-vacancy', '', 6, 1, '2016-10-07 05:59:24', 1, '2016-10-07 05:59:24', 1),
(8, 0, 'News', '/news', 'News', 5, 1, '2016-10-07 06:17:19', 1, '2016-10-07 19:58:35', 1),
(9, 0, 'Article', '/article', 'Article', 5, 1, '2016-10-07 06:18:20', 1, '2016-10-07 06:18:20', 1),
(10, 0, 'Our People', '/people', 'People', 4, 1, '2016-10-07 08:44:54', 1, '2016-10-11 21:45:19', 1),
(35, 3, 'Welcome', '/page/welcome', '', 1, 1, '2016-10-11 14:28:00', 1, '2016-10-11 14:28:00', 1),
(36, 3, 'Org Chart', '/page/org-chart', '', 2, 1, '2016-10-11 14:29:24', 1, '2016-10-11 14:29:24', 1),
(37, 3, 'History', '/page/history', '', 3, 1, '2016-10-11 14:42:23', 1, '2016-10-11 14:42:23', 1),
(38, 3, 'Our  Line  of  Business', '/page/our-line-of-business', '', 4, 1, '2016-10-11 14:43:03', 1, '2016-12-06 11:36:13', 1),
(39, 3, 'Methodology', '/page/methodology', '', 5, 0, '2016-10-11 14:43:52', 1, '2017-01-09 16:47:16', 1),
(40, 3, 'Affiliated International', '/page/affiliated-international', '', 6, 1, '2016-10-11 14:44:41', 1, '2016-10-11 14:44:41', 1),
(41, 4, 'Audit & Assurance', '/page/audit-assurance', '', 1, 1, '2016-10-11 14:51:47', 1, '2016-10-11 14:51:47', 1),
(42, 4, 'Tax', '/page/tax', '', 2, 1, '2016-10-11 14:52:41', 1, '2016-10-11 14:52:41', 1),
(43, 4, 'Business Advisory Services', '/page/business-advisory-services', '', 3, 1, '2016-10-11 14:55:21', 1, '2016-12-06 10:28:58', 1),
(44, 4, 'Advisory', 'page/Advisory', 'News', 3, 0, '2016-10-19 15:28:34', 1, '2016-12-06 14:03:03', 1),
(45, 3, 'Vision & Mission', '/page/vision-mission', '', 2, 1, '2016-12-06 09:11:30', 1, '2016-12-06 09:11:30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `short_content` mediumtext,
  `url` varchar(255) NOT NULL,
  `related_page` text,
  `related_navigation` text,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `template` varchar(255) NOT NULL DEFAULT 'page.blade.php',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `order` int(6) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `name`, `slug`, `content`, `short_content`, `url`, `related_page`, `related_navigation`, `meta_keyword`, `meta_description`, `template`, `is_active`, `order`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, 'About Us', 'about-us', '<h3><strong>Your Business Reinforcement</strong></h3>\r\n\r\n<p>Our Industry Experince Is Highly Regarded - We Provide , Broad Global Resources And Proven Experince In Consulting And Outsourcing</p>\r\n\r\n<p>There is point in time when your business needs reinforcement. We are commited to the timely and cost efficient use of our firm&#39;s Certified Public Accountants and support staff to provide necessary Reinformecent to Our clients, whenever their company requires profesional advice in the areas, such as taxation,advisory, and assurance services.</p>\r\n\r\n<p>Hendrawinata Eddy &amp; Siddharta (HES) is a member of Kreston International, one of the world&#39;s leading accounting and consulting organizations providing specialist advice to assist business owners to achieve success and reach their goals. Our industry experience is highly regarded-we provide,broad global resources and proven experience in consulting and outsourcing.</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://portal.kreston-indonesia.co.id/media/images/shared/people/57f381835cff6.jpg" style="height:244px; width:619px" /></p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://portal.kreston-indonesia.co.id/media/images/shared/people/57f6df8243fb8.jpg" /></p>\r\n\r\n<p>We Combine our expertise and experienced of more than 20 skilled professionals with more than 30 years of experience in the industry and supported by more than 200 supporting staffs , to be able to provide a wide range and value-added service to clients.In Indonesia, as in all the countries Kreston International operates,we share commitment to providing the same high quality service.All members our International Organization and committed to common standards and methodologies. The Strength of each local firm is reflected in the quality of our organization . Kreston International is an International accountancy organization operating in 94 countries , bringing together more than 19,500 profesional in 700 offices worldwide.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Your Business Alliance</strong></h3>\r\n\r\n<p>Maintaining Good Relationships With Our Clients Is Our First Priority</p>\r\n\r\n<p>We believe that people deal with people, not accounting firms. Maintaining good relationships with our clients is our first priority. we recruit, train , promote and recommend our staff to provide a total service that is reliable and cost-effective,providing quality solutions based on tried and tested methodologies.</p>\r\n\r\n<p>Our qualification not only describes the proficiency which our people possess, but the methodology we employ in every engagement,this includes well-managed traiffic communication with our clients,prom mptness and responsiveness to deadlines and client inquiries, effectiveness of refresentation and unique problem handling techniques for unexpected circumstances.</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://portal.kreston-indonesia.co.id/media/images/shared/people/57f6e018c462c.jpg" /></p>\r\n\r\n<p>We have successfully worked with different people,skills , alliances and technology from owner managed entreprenerial to publicly listed companies and multinational companies some of industries that we have effectively managed with more than 300 private and public companies are listed below :</p>\r\n\r\n<ul>\r\n	<li>&nbsp;Aviation</li>\r\n	<li>Chemical</li>\r\n	<li>Foundation</li>\r\n	<li>Hotel and Restaurant</li>\r\n	<li>Construction</li>\r\n	<li>Pulp &amp; Paper</li>\r\n	<li>Textile</li>\r\n	<li>Non Profit Organization</li>\r\n	<li>Banking</li>\r\n	<li>Communication</li>\r\n	<li>Insurance</li>\r\n	<li>Manufacturing</li>\r\n	<li>Oil,Gas And Mining</li>\r\n	<li>Trading</li>\r\n	<li>Power Plant</li>\r\n	<li>Building Management</li>\r\n	<li>Financial Institution</li>\r\n	<li>Hospitaly</li>\r\n	<li>Leasing</li>\r\n	<li>Plantation</li>\r\n	<li>Real Estate &amp; property</li>\r\n	<li>Education</li>\r\n	<li>Service Indusries</li>\r\n</ul>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '/page/about-us', '4;5;14;6;7;9', '', 'About us', 'About Us', 'layout.blade.php', 1, 1, '2016-10-04 17:12:18', 1, '2017-01-10 10:39:10', 1),
(2, 1, 'Services', 'services', '<h3><strong>Audit &amp; Assurance</strong></h3>\r\n\r\n<p>We are experts in providing audit &amp; assurance services ti all types of business including companies that are going for initial public Offering (IPO) bonds issuance, asset securitization merger transaction,acquisitions ,span off and conversion to international Finance Reporting Standard(IFRS)</p>\r\n\r\n<h3><strong>Tax Advisory Services</strong></h3>\r\n\r\n<ol>\r\n	<li>Tax Management &amp; Planning.</li>\r\n	<li>Tax Compliance Audit.</li>\r\n	<li>Tax Consultant.</li>\r\n	<li>Tax Preparation &amp; Filling</li>\r\n</ol>\r\n\r\n<p>Our tax Services include as a liaison to the state revenue/tax office for corporate and individuals.This Includes assistance on tax objections of the Company by preparing the necessary documentation</p>\r\n\r\n<h3><strong>Businness Advisory Services</strong></h3>\r\n\r\n<ol>\r\n	<li>Financial Advisory Services</li>\r\n	<li>Internal Audit</li>\r\n	<li>Strategic Management</li>\r\n</ol>\r\n\r\n<p style="text-align:center"><img alt="" src="http://portal.kreston-indonesia.co.id/media/images/shared/people/57f6e1a5adefe.JPG" /></p>\r\n\r\n<ol>\r\n</ol>\r\n', '', '/page/services', '10;11;12', '', '', '', 'layout.blade.php', 1, 4, '2016-10-05 09:33:06', 1, '2017-01-10 10:28:56', 1),
(3, 0, 'Our People', 'our-people', '<h3><strong>Our People</strong></h3>\r\n\r\n<p style="text-align:center"><img alt="" src="http://www.kreston-indonesia.co.id/images/partners.jpg" /></p>\r\n\r\n<p>At Kreston, people is more than just an asset, they are our precious resources. That&rsquo;s why we always treat our people as a part of big family instead of as an employee. We break free from the &ldquo;conventional-bureaucracy&rdquo; hierarchy system which may most organization adopt and moving to &ldquo;modern-transparent&rdquo; working environment. We believed that to be a winning team, we have to get along together, being equal but in proportional well mannered and worked as a team. Together as a team across our various departments within Kreston, our cross-functional support is here to serve you better.</p>\r\n\r\n<p>Our commitment to serve you better is a must and there is no room to bargain in any matters. We understand that to have this commitment is through quality people. We recruit talented, motivated and disciplined individuals, with good attitudes and a high degree of integrity; eager to learn as well as share their own knowledge and experiences. Besides the relevant academic qualification and industry experiences, our people are proactive, trustworthy, responsive and committed. We are committed to invest in our people, which are why we conduct various development programs to support and encourage continuing education of our professionals.</p>\r\n\r\n<p>Our people are easy to access without the hassle of bureaucracy. We believe by adding a personal touch and not just being a service provider, we could become your trusted partner while, at the same time, maintaining the independence and objectivity essential to a sound and professional relationship. Our services do not stop at the scope that we are engaged for but professionally, highlighting other areas that are of value-add to your business.</p>\r\n\r\n<p>BDO&rsquo;s core Employment Value Proposition (EVP)</p>\r\n\r\n<p>BDO&rsquo;s primary EVP is that &quot;BDO. Because relationships matter&quot;: those we build with clients, and those we foster internally with colleagues. By focusing on our EVP attributes below, we can ensure that we are placing the right people in the right environment, resulting exceptional client service.</p>\r\n\r\n<p>Partners and staff are accessible&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Clients know the people they are dealing with, creating a relationship that ensures everyone feels valued and understood</li>\r\n	<li>Employees are more invested and empowered due to direct client access</li>\r\n	<li>Within BDO, employees develop strong working relationships through proximity to partners and managers</li>\r\n</ul>\r\n\r\n<p>Our people managers encourage collaboration in an atmosphere of trust and cooperation, mentoring, consulting, and exchanging ideas</p>\r\n\r\n<ul>\r\n	<li>Clients benefit from BDO&rsquo;s collective expertise</li>\r\n	<li>Employees learn from each other and enhance their skills, while at the same time providing superior client service</li>\r\n</ul>\r\n\r\n<p>The BDO culture emphasizes career growth</p>\r\n\r\n<ul>\r\n	<li>Customized career paths are designed according to the strengths, skills, and personality of each employee, promoting personal and professional growth</li>\r\n</ul>\r\n\r\n<p>Location, Location, Location</p>\r\n\r\n<ul>\r\n	<li>Our clients can access us where and when they need us&nbsp;&nbsp;</li>\r\n	<li>Employees can live and work in the communities that meet their needs, now and in the future</li>\r\n</ul>\r\n', '', '/page/our-people', '', '', 'Our People', 'Our People', 'layout.blade.php', 0, 2, '2016-10-07 14:48:06', 1, '2017-01-09 15:57:23', 1),
(4, 1, 'Welcome', 'welcome', '<h3><strong>Your Business Reinforcement</strong></h3>\r\n\r\n<p><span style="color:#FF0000"><strong>Our Industry experince is highly regarded - we provide , broad global resources and proven experince in consulting and outsourcing.</strong></span></p>\r\n\r\n<p>There is point in time when your business needs reinforcement. We are commited to the timely and cost efficient use of our firm&#39;s Certified Public Accountants and support staff to provide necessary Reinformecent to Our clients, whenever their company requires profesional advice in the areas, such as taxation,advisory, and assurance services.</p>\r\n\r\n<p>Hendrawinata Eddy &amp; Siddharta (HES) is a member of Kreston International, one of the world&#39;s leading accounting and consulting organizations providing specialist advice to assist business owners to achieve success and reach their goals. Our industry experience is highly regarded-we provide,broad global resources and proven experience in consulting and outsourcing.</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://portal.kreston-indonesia.co.id/media/images/shared/58100f76e304c.jpg" /></p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://portal.kreston-indonesia.co.id/media/images/shared/58101018dd541.jpg" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>We Combine our expertise and experienced of more than 20 skilled professionals with more than 30 years of experience in the industry and supported by more than 200 supporting staffs , to be able to provide a wide range and value-added service to clients.</p>\r\n\r\n<p>In Indonesia, as in all the countries Kreston International operates,we share commitment to providing the same high quality service.All members our International Organization and committed to common standards and methodologies. The Strength of each local firm is reflected in the quality of our organization . Kreston International is an International accountancy organization operating in 94 countries , bringing together more than 19,500 profesional in 700 offices worldwide.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Your Business Alliance</strong></h3>\r\n\r\n<p><span style="color:#FF0000"><strong>Maintaining good relationships with our clients is our first priority.</strong></span></p>\r\n\r\n<p>We believe that people deal with people, not accounting firms. Maintaining good relationships with our clients is our first priority. we recruit, train , promote and recommend our staff to provide a total service that is reliable and cost-effective,providing quality solutions based on tried and tested methodologies.</p>\r\n\r\n<p>Our qualification not only describes the proficiency which our people possess, but the methodology we employ in every engagement,this includes well-managed traiffic communication with our clients,prom mptness and responsiveness to deadlines and client inquiries, effectiveness of refresentation and unique problem handling techniques for unexpected circumstances.</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://portal.kreston-indonesia.co.id/media/images/shared/58101169f39bf.jpg" /></p>\r\n\r\n<p>We have successfully worked with different people,skills , alliances and technology from owner managed entreprenerial to publicly listed companies and multinational companies some of industries that we have effectively managed with more than 300 private and public companies are listed below:</p>\r\n\r\n<ul>\r\n	<li>Aviation</li>\r\n	<li>Chemical</li>\r\n	<li>Foundation</li>\r\n	<li>Hotel and Restaurant</li>\r\n	<li>Construction</li>\r\n	<li>Pulp &amp; Paper</li>\r\n	<li>Textile</li>\r\n	<li>Non Profit Organization</li>\r\n	<li>Banking</li>\r\n	<li>Communication</li>\r\n	<li>Insurance</li>\r\n	<li>Manufacturing</li>\r\n	<li>Oil,Gas And Mining</li>\r\n	<li>Trading</li>\r\n	<li>Power Plant</li>\r\n	<li>Building Management</li>\r\n	<li>Financial Institution</li>\r\n	<li>Hospitaly</li>\r\n	<li>Leasing</li>\r\n	<li>Plantation</li>\r\n	<li>Real Estate &amp; property</li>\r\n	<li>Education</li>\r\n	<li>Service Indusries.</li>\r\n</ul>\r\n', '<p><span style="color:#FF0000"><strong>Our Industry experince is highly regarded - we provide , broad global resources and proven experince in consulting and outsourcing</strong></span></p>\r\n\r\n<p>There is point in time when your business needs reinforcement. We are commited to the timely and cost efficient use of our firm&#39;s Certified Public Accountants and support staff to provide necessary Reinformecent to Our clients, whenever their company requires profesional advice in the areas, such as taxation,advisory, and assurance services.</p>\r\n\r\n<p>Hendrawinata Eddy &amp; Siddharta (HES) is a member of Kreston International, one of the world&#39;s leading accounting and consulting organizations providing specialist advice to assist business owners to achieve success and reach their goals. Our industry experience is highly regarded-we provide,broad global resources and proven experience in consulting and outsourcing.</p>\r\n\r\n<p><a href="http://portal.kreston-indonesia.co.id/page/welcome">Read More</a></p>\r\n', '/page/welcome', '4;5;14;6;7;9', '', 'Welcome', 'Welcome To Kreston', 'layout.blade.php', 1, 1, '2016-10-11 14:24:35', 1, '2017-01-10 10:40:27', 1),
(5, 1, 'Org Chart', 'org-chart', '<p>Org Chart</p>\r\n', '', '/page/org-chart', '4;5;14;6;7;9', '', '', '', 'layout.blade.php', 1, 2, '2016-10-11 14:28:55', 1, '2017-01-10 10:39:54', 1),
(6, 1, 'History', 'history', '<h3><strong>Kreston Indonesia</strong></h3>\r\n\r\n<p style="text-align:center"><img alt="" src="http://portal.kreston-indonesia.co.id/media/images/shared/banner/5845683e4ee47.png" /></p>\r\n\r\n<p>Hendrawinata&nbsp; Eddy&nbsp; Siddharta&nbsp; &amp;Tanzil&nbsp; (HEST)&nbsp; is&nbsp; a&nbsp; member&nbsp; of&nbsp; Kreston&nbsp; International,&nbsp; one&nbsp; of the&nbsp; world&#39;s&nbsp; leading&nbsp; accounting&nbsp; and&nbsp; consulting&nbsp; organizations&nbsp; providing&nbsp; specialist&nbsp; advice to&nbsp; assist&nbsp; business&nbsp; owners&nbsp; to&nbsp; achieve&nbsp; success&nbsp; and&nbsp; reach&nbsp; their&nbsp; goals.&nbsp; Our&nbsp; industryexperience&nbsp; is&nbsp; highly&nbsp; regarded-we&nbsp; provide,&nbsp; broad&nbsp; global&nbsp; resources&nbsp; and&nbsp; proven&nbsp; experience in&nbsp; consulting&nbsp; and&nbsp; outsourcing.</p>\r\n\r\n<p>We&nbsp; combine&nbsp; our&nbsp; expertise&nbsp; and&nbsp; experience&nbsp; of&nbsp; more&nbsp; than&nbsp; 20&nbsp; skilled&nbsp; professionals&nbsp; with more&nbsp; than&nbsp; 30&nbsp; years&nbsp; of&nbsp; experience&nbsp; in&nbsp; the&nbsp; industry&nbsp; and&nbsp; supported&nbsp; by&nbsp; more&nbsp; than&nbsp; 200 members&nbsp; of&nbsp; our&nbsp; professional&nbsp; staff,&nbsp; to&nbsp; be&nbsp; able&nbsp; to&nbsp; provide&nbsp; a&nbsp; wide&nbsp; range&nbsp; and&nbsp; value-added services&nbsp; to&nbsp; clients.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Kreston International</strong></h3>\r\n\r\n<p style="text-align:center"><strong><img alt="" src="http://portal.kreston-indonesia.co.id/media/images/shared/banner/58457e783ded0.png" /></strong></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p>Kreston&nbsp; International&nbsp; Limited&nbsp; is&nbsp; a&nbsp; global&nbsp; network&nbsp; of&nbsp; independent&nbsp; accounting firms.Founded&nbsp; in&nbsp; 1971,&nbsp; we&nbsp; offer&nbsp; reliable&nbsp; and&nbsp; convenient&nbsp; access&nbsp; to&nbsp; quality&nbsp; services through&nbsp; member&nbsp; firms&nbsp; located&nbsp; around&nbsp; the&nbsp; globe.Currently&nbsp; ranked&nbsp; as&nbsp; the&nbsp; 13th&nbsp; largest&nbsp; accounting&nbsp; network&nbsp; in&nbsp; the&nbsp; world,&nbsp; Kreston&nbsp; now covers&nbsp; over&nbsp; 100&nbsp; countries&nbsp; and&nbsp; provides&nbsp; resources&nbsp; of&nbsp; over&nbsp; 20,000&nbsp; professionals&nbsp; and support&nbsp; staffs&nbsp; around&nbsp; the&nbsp; world.</p>\r\n\r\n<p>Kreston&nbsp; is&nbsp; continuously&nbsp; growing,&nbsp; and&nbsp; has&nbsp; member&nbsp; firms&nbsp; on&nbsp; all&nbsp; of&nbsp; the&nbsp; world&#39;s&nbsp; major continents.&nbsp; The&nbsp; members&nbsp; offer&nbsp; a&nbsp; reliable&nbsp; service&nbsp; and&nbsp; have&nbsp; an&nbsp; outstanding&nbsp; record of&nbsp; achievement&nbsp; on&nbsp; behalf&nbsp; of&nbsp; clients.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '/page/history', '4;5;14;6;7;9', '', '', '', 'layout.blade.php', 1, 5, '2016-10-11 14:30:05', 1, '2017-01-10 10:46:58', 1),
(7, 1, 'Our  Line  of  Business', 'our-line-of-business', '<h3><strong><em>Our&nbsp;Line&nbsp;of&nbsp;Business...</em></strong></h3>\r\n\r\n<p>Our Credential ranges from national to regional up to multinational company with more than 500 private &amp; public companies which covers almost all types of business which includes:</p>\r\n\r\n<table border="none" cellpadding="0" cellspacing="0" style="width:718px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:270px">\r\n			<ul>\r\n				<li>Manufacturing</li>\r\n				<li>Real&nbsp; Estate&nbsp; and&nbsp; Property</li>\r\n				<li>Hotel&nbsp; and&nbsp; Restaurant</li>\r\n				<li>Oil,&nbsp; Gas&nbsp; and&nbsp; Mining</li>\r\n				<li>Leasing</li>\r\n				<li>Manufacturing</li>\r\n				<li>Hospitality</li>\r\n				<li>Pulp&nbsp; and&nbsp; Paper</li>\r\n				<li>Communication</li>\r\n			</ul>\r\n			</td>\r\n			<td style="width:270px">\r\n			<ul>\r\n				<li>Power&nbsp; Plant</li>\r\n				<li>Education</li>\r\n				<li>Aviation</li>\r\n				<li>Banking</li>\r\n				<li>Plantation</li>\r\n				<li>Foundation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>\r\n				<li>Construction</li>\r\n				<li>Non-Profit&nbsp; Organization</li>\r\n			</ul>\r\n			</td>\r\n			<td style="width:270px">\r\n			<ul>\r\n				<li>Building&nbsp; Management</li>\r\n				<li>Financial&nbsp; Institution</li>\r\n				<li>Chemical</li>\r\n				<li>Insurance</li>\r\n				<li>Service&nbsp; Industries</li>\r\n				<li>Trading</li>\r\n				<li>Textile</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://portal.kreston-indonesia.co.id/media/images/shared/banner/584642d39ef2c.png" /></p>\r\n', '', '/page/our-line-of-business', '4;5;14;6;7;9', '', 'Industrial Experience Kreston', 'Kreston Our Credential ranges from national to regional up to multinational company with more than 500 private & public companies which covers almost all types of business which includes:', 'layout.blade.php', 1, 6, '2016-10-11 14:31:17', 1, '2017-01-10 10:47:29', 1),
(8, 1, 'Methodology', 'methodology', '<h3><strong>Methodology</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table class="table table-bordered table-striped text-left">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="4" style="background-color:#13add2; text-align:center"><span style="color:#FFF0F5">Quality Assurance</span></th>\r\n		</tr>\r\n		<tr>\r\n			<th style="background-color:#13add2; text-align:center"><span style="color:#FFF0F5">ACCEPTANCE</span></th>\r\n			<th style="background-color:#13add2; text-align:center"><span style="color:#FFF0F5">PLANNING/RISK ASSESSMENT</span></th>\r\n			<th style="background-color:#13add2; text-align:center"><span style="color:#FFF0F5">SUBSTANTIVE PROCEDURE</span></th>\r\n			<th style="background-color:#13add2; text-align:center"><span style="color:#FFF0F5">REPORTING</span></th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan="3" style="vertical-align:middle">1.Initial Client Assessment</td>\r\n			<td>3.Understand the entity &amp; its Environment</td>\r\n			<td rowspan="2" style="vertical-align:middle">9.Analytical Substantive Procedure</td>\r\n			<td rowspan="3" style="vertical-align:middle">12.Conclude the Audit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4.Evaluate the Design of Internal Control at the Entity Level</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5.Establish Audit Strategies</td>\r\n			<td rowspan="2" style="vertical-align:middle">10.Test of Details</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="3" style="vertical-align:middle">2.Identify Engagement Objectives</td>\r\n			<td>6.Understand Significant Processes and Evaluate Related Controls</td>\r\n			<td rowspan="3" style="vertical-align:middle">13. Communicate Results</td>\r\n		</tr>\r\n		<tr>\r\n			<td>7.Test of Control</td>\r\n			<td rowspan="2" style="vertical-align:middle">11.General Audit Procedure</td>\r\n		</tr>\r\n		<tr>\r\n			<td>8.Assess the Risk of Material Misstatement</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Audit Methodology</strong></h3>\r\n\r\n<p>Kreston Audit Methodology = Risk Based Audit ,&nbsp;Kreston International&rsquo;s means of complying with Firm policies and professional standards, including the standards established by the International Federation of Accountants (IFAC) ,Automated tools are designed to enable the audit team to be efficient and effective &quot;CaseWare&quot;</p>\r\n', '', '/page/methodology', '1;4;5;6;7;8;9', '', 'Methodology Kreston', 'Kreston Audit Methodology = Risk Based Audit , Kreston International’s means of complying with Firm policies and professional standards, including the standards established by the International Federation of Accountants (IFAC) ,Automated tools are designe', 'layout.blade.php', 0, 0, '2016-10-11 14:31:55', 1, '2016-12-19 15:15:43', 1),
(9, 1, 'Affiliated International', 'affiliated-international', '<p>Affiliated International</p>\r\n', '', '/page/affiliated-international', '4;5;14;6;7;9', '', '', '', 'layout.blade.php', 1, 7, '2016-10-11 14:32:35', 1, '2017-01-10 10:48:18', 1),
(10, 2, 'Audit & Assurance', 'audit-assurance', '<h3><strong>Audit &amp; Assurance</strong></h3>\r\n\r\n<p>The&nbsp; audit&nbsp; approach&nbsp; is&nbsp; derived&nbsp; from&nbsp; gaining&nbsp; a&nbsp; real&nbsp; understanding&nbsp; of&nbsp; your&nbsp; business and&nbsp; of&nbsp; the&nbsp; quality&nbsp; and&nbsp; effectiveness&nbsp; of&nbsp; your&nbsp; accounting&nbsp; and&nbsp; internal&nbsp; control systems&nbsp; which&nbsp; enable&nbsp; us&nbsp; to&nbsp; focus&nbsp; on&nbsp; the&nbsp; risks&nbsp; of&nbsp; material&nbsp; misstatements&nbsp; in&nbsp; the financial&nbsp; statements.</p>\r\n\r\n<p>We&nbsp; are&nbsp; experts&nbsp; in&nbsp; provide&nbsp; audit&nbsp; &amp;&nbsp; assurance&nbsp; services&nbsp; to&nbsp; all&nbsp; types&nbsp; of&nbsp; business including&nbsp; companies&nbsp; that&nbsp; are&nbsp; going&nbsp; for&nbsp; Initial&nbsp; Public&nbsp; Offering&nbsp; (IPO)&nbsp; bonds&nbsp; issuance, asset&nbsp; securitization&nbsp; merger&nbsp; transaction,&nbsp; acquisitions,&nbsp; spin&nbsp; off&nbsp; and&nbsp; conversion&nbsp; to International&nbsp; Finance&nbsp; Reporting&nbsp; Standard&nbsp; (IFRS).</p>\r\n\r\n<blockquote>\r\n<h3><span style="color:#40E0D0"><strong><em>People do business with people they know, like &amp; trust&nbsp;</em></strong></span></h3>\r\n</blockquote>\r\n', '', '/page/audit-assurance', '4;5;14;2;6;7;9', '', 'We are experts in providing audit & assurance services ti all types of business including companies that are going for initial public Offering (IPO) bonds issuance, asset securitization merger transaction,acquisitions ,span off and conversion to internati', '', 'layout.blade.php', 1, 1, '2016-10-11 14:49:49', 1, '2017-01-09 16:49:05', 1),
(11, 2, 'Tax', 'tax', '<h3><strong>Tax Advisory Services</strong></h3>\r\n\r\n<ol>\r\n	<li>Tax Management &amp; Planning.</li>\r\n	<li>Tax Compliance Audit.</li>\r\n	<li>Tax Consultant.</li>\r\n	<li>Tax Preparation &amp; Filling.</li>\r\n</ol>\r\n\r\n<p>Our tax Services include as a liaison to the state revenue/tax office for corporate and individuals.This Includes assistance on tax objections of the Company by preparing the necessary documentation</p>\r\n', '', '/page/tax', '10;11;12', '', 'Our Services Kreston', '', 'layout.blade.php', 1, 2, '2016-10-11 14:52:15', 1, '2017-01-10 10:36:09', 1),
(12, 2, 'Business Advisory Services', 'business-advisory-services', '<h3><strong>Businness Advisory Services</strong></h3>\r\n\r\n<p style="text-align:center"><img alt="" src="http://portal.kreston-indonesia.co.id/media/images/shared/banner/58456ad42752d.png" /></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<h3><strong><em>Financial&nbsp; Advisory&nbsp; Services</em></strong></h3>\r\n\r\n<p>Kreston&nbsp; Indonesia&nbsp; is&nbsp; able&nbsp; to&nbsp; provide&nbsp; a&nbsp; full&nbsp; range&nbsp; of&nbsp; accounting&nbsp; and&nbsp; outsourcing services&nbsp; to&nbsp; assist&nbsp; with&nbsp; the&nbsp; development&nbsp; and&nbsp; growth&nbsp; of&nbsp; your&nbsp; business&nbsp; both&nbsp; locally and&nbsp; internationally.</p>\r\n\r\n<p><strong>Our&nbsp; services&nbsp; include&nbsp; :</strong></p>\r\n\r\n<ul>\r\n	<li>Accounting&nbsp; &amp;Transactional&nbsp; Services</li>\r\n	<li>Management&nbsp; Accounting&nbsp; Services</li>\r\n	<li>Virtual&nbsp; CFO</li>\r\n</ul>\r\n\r\n<h3><strong><em>Internal&nbsp; Audit </em></strong></h3>\r\n\r\n<p>We&nbsp; offer&nbsp; professional&nbsp; internal&nbsp; audit&nbsp; know-how,&nbsp; industry&nbsp; and&nbsp; technical&nbsp; knowledge, and&nbsp; collaborative&nbsp; skill&nbsp; to&nbsp; work&nbsp; effectively&nbsp; with&nbsp; your&nbsp; organization&nbsp; to&nbsp; help&nbsp; you&nbsp; :</p>\r\n\r\n<ul>\r\n	<li>Receive&nbsp; higher&nbsp; quality&nbsp; and&nbsp; value&nbsp; from&nbsp; your&nbsp; internal&nbsp; audit&nbsp; investment</li>\r\n	<li>Improve&nbsp; your&nbsp; risk&nbsp; evaluation&nbsp; activities&nbsp; by&nbsp; objectively&nbsp; and&nbsp; proactively&nbsp; identifying high&nbsp; risk&nbsp; areas&nbsp; -&nbsp; before&nbsp; they&nbsp; become&nbsp; a&nbsp; problem</li>\r\n	<li>Manage&nbsp; your&nbsp; overall&nbsp; costs&nbsp; for&nbsp; internal&nbsp; audit&nbsp; by&nbsp; paying&nbsp; only&nbsp; for&nbsp; the&nbsp; productive time&nbsp; you&nbsp; need</li>\r\n</ul>\r\n\r\n<h3><strong><em>Strategic&nbsp; Management </em></strong></h3>\r\n\r\n<p>With&nbsp; our&nbsp; Consulting&nbsp; experience&nbsp; in&nbsp; various&nbsp; organizations,&nbsp; our&nbsp; consultant&nbsp; team&nbsp; has been&nbsp; recognized&nbsp; to&nbsp; be&nbsp; the&nbsp; most&nbsp; reliable&nbsp; and&nbsp; satisfactory&nbsp; professional&nbsp; partner&nbsp; to our&nbsp; clients&nbsp; in&nbsp; evaluating,&nbsp; improving,&nbsp; and&nbsp; designing&nbsp; system&nbsp; procedures&nbsp; in&nbsp; their companies.</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://portal.kreston-indonesia.co.id/media/images/shared/banner/584631dd41504.png" /></p>\r\n', '', '/page/business-advisory-services', '10;11;12', '', 'Business,Business Kreston Indonesia', '', 'layout.blade.php', 1, 3, '2016-10-11 14:54:49', 1, '2017-01-10 10:37:17', 1),
(13, 2, 'Advisory', 'advisory', '<p>Advisory</p>\r\n', '', '/page/advisory', '4;5;14;2;6;7;9', '', '', '', 'layout.blade.php', 0, 4, '2016-10-19 15:30:17', 1, '2017-01-09 16:52:14', 1),
(14, 1, 'Vision & Mission', 'vision-mission', '<h3><strong>Our &nbsp;Vision</strong></h3>\r\n\r\n<p>To become one of the leading and most trusted business partner in the region.<br />\r\n&nbsp;</p>\r\n\r\n<h3><strong>Our &nbsp;Mission</strong></h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To improve the quality of the resources to create the best and trusted professionals that would make Kreston Indonesia as one of the best accounting firm in Indonesia.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>To provide quality services and solution that can ad value to clients.</p>\r\n	</li>\r\n	<li>\r\n	<p>To create a harmonious and family-like work environment that can be proud of.</p>\r\n	</li>\r\n</ol>\r\n', '<h3><strong>Our &nbsp;Vision</strong></h3>\r\n\r\n<p>To become one of the leading and most trusted business partner in the region.<br />\r\n&nbsp;</p>\r\n\r\n<h3><strong>Our &nbsp;Mission</strong></h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p>To improve the quality of the resources to create the best and trusted professionals that would make Kreston Indonesia as one of the best accounting firm in Indonesia.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>To provide quality services and solution that can ad value to clients.</p>\r\n	</li>\r\n	<li>\r\n	<p>To create a harmonious and family-like work environment that can be proud of.</p>\r\n	</li>\r\n</ol>\r\n', '/page/vision-mission', '4;5;14;6;7;9', '', '', '', 'layout.blade.php', 1, 3, '2016-12-06 09:07:12', 1, '2017-01-10 10:40:54', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `photo_storage_location` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `order` int(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `people`
--

INSERT INTO `people` (`id`, `contact_id`, `photo_storage_location`, `name`, `email`, `slug`, `description`, `is_active`, `order`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 5, 'media/images/shared/our-partner/58456cda1dd2f.jpg', 'Drs. Maringan P.Sibarani', 'mp.sibarani@kreston-indonesia.co.id', 'drs-maringan-psibarani', 'Chairman with more than 30 years significant experience in the profession, having clients with various industry likes manufacturing, real estate and service. He specializes on auditing, management consulting and organizational restructuring. He has also been a partner of Arthur Andersen for more than 16 years in Indonesia and has also served as a director in several of Indonesia''s busines conglomerate.', 1, 1, '2016-09-29 09:41:10', 1, '2016-12-20 11:06:47', 1),
(3, 5, 'media/images/shared/our-partner/584575bdba7ff.jpg', 'Ryan Permana', 'ryan_permana@kreston-indonesia.co.id', 'ryan-permana', 'Partner and Founder, with more than 20 years significant experience the business of manufacturing, plantation, trading, and service companies.', 1, 2, '2016-09-29 15:55:14', 1, '2016-12-20 11:07:47', 1),
(4, 5, 'media/images/shared/our-partner/584576861d87c.jpg', 'Tan Siddharta', 'tan_siddharta@kreston-indonesia.co.id', 'tan-siddharta', 'Managing partner and founder,with more than 20 years experience in auditing corporate finance, human resources and equity restructuring. He used to work with coopers & Lybrand International and as Chief Financial Officer with one major paper mills company in Indonesia. His credential includies in public and private company. Multi national, regional and national company, with various type of business from financial services to plantations, from general trading to integrated manufacturing company.', 1, 3, '2016-10-07 08:53:19', 1, '2016-12-20 11:11:14', 1),
(5, 5, 'media/images/shared/our-partner/584576b7ed55f.jpg', 'Eddy P.Simon', 'eddy_simon@kreston-indonesia.co.id', 'eddy-psimon', 'Partner and founder, with more than 20 years experience in banking, auditing and Business operation. He used to work with Arthur Ancersen, SC. He specializes in micro finance and Business valuation. His credential includes internal audit manual for the Central Bank of Indonesia.', 1, 4, '2016-10-07 08:54:11', 1, '2016-12-20 11:12:58', 1),
(6, 5, 'media/images/shared/our-partner/584577219c374.jpg', 'Desman Tobing', 'desman_pl@kreston-indonesia.co.id', 'desman-tobing', 'Partner, has been in practice for more than 17 years, mostly under Deloitte, with clients in various industry such as manufacturing, trading, services, hospital, real estate and plantation.', 1, 5, '2016-10-07 08:54:40', 1, '2016-12-20 11:13:37', 1),
(7, 5, 'media/images/shared/our-partner/584577ec017d2.jpg', 'Florus Daeli', 'florus_daeli@kreston-indonesia.co.id', 'florus-daeli', 'Partner, working over 18 years of experience in auditing, assurance and financial consulting such as: Banks, Insurances, Coal, plantation, manufacturing, Real Estate, Foundation, Property and other variance industry, some Company listed on the Indonesia Stock Exchange (BEI) and State-Owned Enterprises (BUMN). He was working experience with SGV-Utomo (Arthur Andersen) -  Indonesia, and Indonesian Bank Restructuring Agency (IBRA). Currently active as Board Members Indonesian Institute of Certified Public Accountants (IAPI) and a chairman of Capital Market Accountant Forum (FAPM). ', 1, 6, '2016-10-07 08:57:22', 1, '2016-12-20 11:14:37', 1),
(8, 5, 'media/images/shared/our-partner/5845782ea892e.jpg', 'Darmawan Harianto,SE', 'darmawan_harianto@kreston-indonesia.co.id', 'darmawan-hariantose', 'Partner, with more than 17 years audit experience,which he spends 15 years in Arthur Andersen and Ernst & Young. His clients are more in the manufacturing,Trading, forward, services and real estate. He also in-charge of IFRS reporting.', 1, 7, '2016-10-07 08:59:13', 1, '2016-12-19 14:39:18', 1),
(9, 5, 'media/images/shared/our-partner/5845786c679f2.jpg', 'Sugito Wibowo, MM,CPA,BKP', 'sugito_w@kreston-indonesia.co.id', 'sugito-wibowo-mmcpabkp', 'Tax partner, with more than 20 years of experience in auditing and taxation in banking, telecommunication, manufacturing & trading and other services companies.', 1, 8, '2016-10-07 08:59:52', 1, '2016-12-19 14:39:38', 1),
(10, 5, 'media/images/shared/our-partner/584578fae8526.jpg', 'Drs. Iswanul', 'iswanul_cpa@kreston-indonesia.co.id', 'drs-iswanul', 'Partner, with more than 28 years experience in auditing, finance and Internal Audit Manager on several private and state owned companies. He specializes in manufacturing,Plantation, developer 7 real estate, contractor (building, telecommunication & electricity), hotels and restaurants, foundation and others.\r\n', 1, 9, '2016-10-07 09:00:43', 1, '2016-12-19 14:39:57', 1),
(11, 5, 'media/images/shared/our-partner/58457935eaf77.jpg', 'Ferdi Sulaiman', 'thomas_ferdi@kreston-indonesia.co.id', 'ferdi-sulaiman', 'Partner, with more than 30 years of experience in auditing, assurance and consulting. He used to work at Deloitte. He handless manufacturing, trading, financial services,And other services companies.', 1, 10, '2016-10-07 09:01:18', 1, '2016-12-19 14:40:17', 1),
(12, 5, 'media/images/shared/our-partner/5845797d7848b.jpg', 'Adeyana Widjaja', 'adeyana_widjaja@kreston-indonesia.co.id', 'adeyana-widjaja', 'Associate Partner, with more than 15 years experience in auditing and consulting. Specializes in manufacturing, plantation, financial services, mining,real estate and other Services companies.', 1, 11, '2016-10-07 09:01:51', 1, '2016-12-19 14:40:33', 1),
(13, 4, 'media/images/shared/our-partner/584579e87b1b9.jpg', 'Arief Hendra Winata', '', 'arief-hendra-winata', 'Partner, working over 37 years of experience in auditing, assurance and consulting such as : Banks, manufacturing, plantation, BUMN, Real Estate, Property company, trading and other variance industry. He was working experience with ministry of Finance, Touche Ross and Grant Thornton International.', 1, 12, '2016-10-07 09:02:23', 1, '2016-12-05 21:30:25', 1),
(14, 4, 'media/images/shared/our-partner/58457a1c62487.jpg', 'Erwin Agustian Winata', '', 'erwin-agustian-winata', 'Partner, with more than 12 years of experience in auditing, assurance and consulting. He used to work at Grant Thornton International. He handles manufacturing, property company, trading, contractor, plantations, mining, telecommunication company and other services companies.', 1, 13, '2016-10-07 09:02:49', 1, '2016-12-05 21:31:12', 1),
(15, 4, 'media/images/shared/our-partner/58457a4a10b82.jpg', 'Razmal Muin Sutan Rajo Mulia', '', 'razmal-muin-sutan-rajo-mulia', 'Partner, 22 years working in the Directorate General of Taxation Ministry of Finance as an examiner and is active as a tax partner. Beginning in 1988 worked in public accounting as a tax partner and began 1993 his handles about taxation and well as a public accountant who audited various types of companies. ', 1, 14, '2016-10-07 09:03:10', 1, '2016-12-05 21:31:49', 1),
(16, 6, 'media/images/shared/our-partner/58457b9eb577e.jpg', 'Robby Sumargo', '', 'robby-sumargo', 'Robby is a Chartered Accountant graduated from California State University of Fullerton and Master degree in Corporate Finance. He has 18 years of working experience in assurance, tax compliance, tax advisory/planning, and has experienced in assisting clients in various tax audit and investigation as well as tax appeal in tax court, with tax license for foreign company. Prior to joining Kreston International, he was with KPMG for 5 years in assurance, then with Grant Thornton for 13 years in assurance as principle partner as well as tax partner.\r\n', 1, 15, '2016-10-07 09:03:36', 1, '2016-12-05 21:38:38', 1),
(17, 4, 'media/images/shared/our-partner/58457ab03f38d.jpg', 'Anny Hutagaol', '', 'anny-hutagaol', 'Partner, with more than 10 years of experience in auditing, assurance and consulting. She used to work at Grant Thornton International. She handles manufacturing, trading, mining, plantations, BUMN (state owned enterprises) and other services companies.', 1, 16, '2016-10-07 09:04:05', 1, '2016-12-05 21:33:32', 1),
(18, 4, 'media/images/shared/our-partner/58457ae947ef9.jpg', 'Lisa Novianty Salim', '', 'lisa-novianty-salim', 'Lisa is an Assurance Partner and a Certified Public Accountant with the Indonesian Institute of Public Accountants. She begins her auditing career in 2003 with Grant Thornton and has obtained vast experience in auditing various types of industry, including plantations, manufacturing, contractors, and trading. She is also experienced in conducting special audit engagements, limited review, and other types of attestation services.	', 1, 17, '2016-10-07 09:04:30', 1, '2016-12-05 21:34:26', 1),
(19, 4, 'media/images/shared/our-partner/58457b0ed3821.jpg', 'Iskariman Supardjo', '', 'iskariman-supardjo', 'Partners, with more than 35 years of auditing experience in various companies such as banking, insurance, contractors, trading, industry, real estate, plantation. Also worked as a Civil Servant Development Financial Supervisory Agency (BPK) and once as an audit committee and internal audit officer in SOEs (State Owner Enterpries)', 1, 18, '2016-10-07 09:04:57', 1, '2016-12-05 21:35:25', 1),
(20, 4, 'media/images/shared/our-partner/58457b4a18c4f.jpg', 'Lianty Widjaja', '', 'lianty-widjaja', 'Partner, with more than 30 years experience the profession, having assurance clients with variants industry such as manufacturing, hospital, trading and service. She used to work with Touche Ross International and Grant Thornton International.', 1, 19, '2016-10-07 09:05:18', 1, '2016-12-05 21:36:03', 1),
(21, 7, 'media/images/shared/our-partner/58457c4498e01.jpg', 'Drs Josef Tanzil', '', 'drs-josef-tanzil', 'He is a member of Indonesian Institute of Accountants (IAI) , a member of Indonesian Institute of Certified Public Accountants (IAPI) and a registered accountant at Financial Services Authority. He has over 41 years of experience in auditing with clients in various industry such as manufacturing, trading, banking, real estate, plantation, services and others including non-profit organizations, world bank special programme, united nations organization grants and foreign aid foundations.', 1, 20, '2016-10-07 09:05:44', 1, '2016-12-05 21:40:22', 1),
(22, 7, 'media/images/shared/our-partner/58457c7818bda.jpg', 'Dra.Rita Susilowati', '', 'drarita-susilowati', 'She is a member of Indonesian Institute of Accountants IAI), a member of Indonesian Institute of Certified Public Accountants (IAPI)and a registered accountant at Financial Services Authority. She has over 27 years of experience in auditing with clients in various industry such as manufacturing, trading, banking, real estate, plantation, services and others including non-profit organizations, world bank special programme,united nations organization grants and foreign aid foundations\r\n', 1, 21, '2016-10-07 09:06:24', 1, '2016-12-05 21:41:15', 1),
(23, 7, 'media/images/shared/our-partner/58457cad4f59a.jpg', 'Ary Hartanto', '', 'ary-hartanto', 'He is a member of Indonesian Institute of Accountants (IAI) , a member of Indonesian Institute of Certified Public Accountants (IAPI) and a registered accountant at Financial Services Authority. He has over 41 years of experience in auditing with clients in various industry such as manufacturing, trading, banking, real estate, plantation, services and others including non-profit organizations, world bank special programme, united nations organization grants and foreign aid foundations.', 1, 22, '2016-10-07 09:08:03', 1, '2016-12-05 21:41:57', 1),
(24, 7, 'media/images/shared/our-partner/58457cde12cfe.jpg', 'Iskandar Dzulqarnain', '', 'iskandar-dzulqarnain', 'He is a member of Indonesian Institute of Accountants (IAI) , a member of Indonesian Institute of Certified Public Accountants (IAPI) and a registered accountant at Financial Services Authority. He has over 11 years of experience in auditing with clients in various industry such as manufacturing, trading, real estate and services.', 1, 23, '2016-10-07 09:08:51', 1, '2016-12-05 21:42:45', 1),
(25, 7, 'media/images/shared/our-partner/58457d125e3ac.jpg', 'Lantriningsih Sugianto', '', 'lantriningsih-sugianto', 'She is a member of Indonesian Institute of Accountants (IAI) , a member of Indonesian Institute of Certified Public Accountants (IAPI). She has over 21 years of experience in auditing with clients in various industry such as manufacturing, trading, real estate and services.\r\n\r\n\r\n', 1, 24, '2016-10-07 09:09:21', 1, '2016-12-05 21:43:35', 1),
(27, 5, 'img/default/no-image.png', 'Ferdinand Agung', 'ferdinand_agung@kreston-indonesia.co.id', 'ferdinand-agung', 'a member of Indonesian Institute of Certified Public Accountants (IAPI). She has experience in auditing', 1, 12, '2017-01-03 08:55:57', 1, '2017-01-03 08:55:57', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `popup_banners`
--

CREATE TABLE IF NOT EXISTS `popup_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `storage_location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `popup_banners`
--

INSERT INTO `popup_banners` (`id`, `name`, `storage_location`, `description`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Merry Chrismass', '/media/images/shared/banner/585395582f14a.png', 'Merry Chrismass Year of 2016 &New Year of 2017', 0, '2016-12-07 14:56:03', 1, '2017-01-09 09:26:59', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `total_view` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `category_id`, `type`, `content`, `total_view`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Kreston firm Nkonki, recognises excellence in Integrated Reporting ', 'kreston-firm-nkonki-recognises-excellence-in-integrated-reporting', 1, 'News', '<p><img alt="" src="http://kreston-indonesia.co.id/media/images/shared/news/57f6e2652c17f.png" style="float:left; height:373px; margin-left:5px; margin-right:5px; width:455px" /></p>\r\n\r\n<p>Kreston member in South Africa, Nkonki, has announced the results of its sixth Annual State Owned (SOC) Integrated Reporting Awards, with top honours going to the Airports Company South Africa SOC Limited. In second and third place respectively were Telkom SA SOC Limited and Transnet SOC Limited.ince 2011, Nkonki has been tracking, how South African SOCs are adopting integrated reporting best practice thereby creating a significant body of research to assist SOCs on their journey towards improved reporting.This is the first time in the history of the awards that three SOCs have achieved an &ldquo;A&rdquo; rating, meaning they scored higher than 80% in terms of applying all the necessary elements of the International Integrated Reporting Council&rsquo;s (IIRC) Integrated Reporting Framework, released in December 2013, and the new global standard for best practice in terms of integrated reporting.</p>\r\n\r\n<p>&ldquo;Increasingly, organisations around the world, both in the public and private sectors, are using integrated reporting to assist them to communicate a clear, concise story to explain how they create value. This is helping them to not only think holistically about their strategy and plans, but also to make informed decisions, and to manage key risks to build investor and stakeholder confidence. Most importantly, it is helping them to improve their performance as a result,&rdquo;&nbsp;</p>\r\n\r\n<p>Thanks to the King Code of Corporate Governance and the JSE&rsquo;s stringent listing requirements, South Africa was an early adopter of integrated reporting, and the country continues to set the trend globally. However, the more recent introduction of the International Integrated Reporting Framework seems to be presenting a significant challenge to both private and public sector organisations.</p>\r\n\r\n<p>&ldquo;Whilst it could be argued that JSE-listed companies have made more progress in this respect due to the fact that they are compelled to produce integrated reports as a listing requirement, this year our report shows that SOCs have not embraced the Framework to the same extent. In fact, the gap between those SOCs that are making an effort to embrace integrated reporting and produce a high quality integrated report and those that were not seems to be widening, which is of concern.&rdquo;</p>\r\n\r\n<p>Thuto adds: &ldquo;That being said, it is also clear from the 2016 report that there is a group of SOCs which have embraced the key concepts of the Framework and this represents a positive step forwards. More encouraging perhaps is that many of the SOCs reviewed by our independent panel still lead the way in terms of the early adoption of the Framework and are providing a good example to other members of the IIRC&rsquo;s global Public Sector Pioneer Network.&rdquo;Nkonki&rsquo;s report, entitled &ldquo;Integrated Reporting | A continued journey for Public Sector Entities in South Africa&rdquo; also indicates improvement in the disclosure of the Fundamental Concepts, which include the value creation model, the business model and the six capitals.</p>\r\n\r\n<p>Kreston CEO Jon Lisby added:</p>\r\n\r\n<p>&ldquo;I would like to thank Nkonki for producing this important report, and congratulate the winners, particularly the top three &ndash; Airports Company South Africa, Telkom and Transnet &ndash; for their continued efforts towards improved reporting. These companies should be seen as leaders in integrated reporting, and represent a beacon for others to follow. I also encourage the rest to continue to make progress,&rdquo;</p>\r\n\r\n<p>He concludes, &ldquo;As the primary objective of most public sector entities is to deliver services to the public, rather than to make profits and generate a return on equity to investors, their performance can only partially be evaluated by examining their financial position, financial performance and cash flows. Reports that don&rsquo;t fully embrace the principles of integrated reporting and the Framework only tell us a limited amount about how well an entity is equipped to deal with the challenges ahead and to continue delivering services and supporting its communities. In today&rsquo;s climate it&rsquo;s is becoming increasingly important for stakeholders to understand the full story in order to establish trustworthiness.&rdquo;</p>\r\n', 33, 1, '2016-10-07 06:48:29', 1, '2016-10-07 19:42:49', 1),
(2, 'Kreston adds to capability in Central Asia', 'kreston-adds-to-capability-in-central-asia', 1, 'News', '<p><img alt="" src="http://kreston-indonesia.co.id/media/images/shared/news/57f6e3ef9e161.jpg" style="float:left; height:306px; margin-left:5px; margin-right:5px; width:420px" /></p>\r\n\r\n<p>Kreston has admitted audit firm KPMT Orien LLC, Tajikistan, to membership, adding to its coverage across Central Asia.&nbsp;Kreston&rsquo;s member firm in Kyrgyzstan, Ansar Accountants, proposed the firm for membership.<strong>&nbsp;</strong>KPMT, which means &ldquo;Analytical and Consulting&rdquo; in the Tajik language, is headed up by three Partners who work mainly across the public, real estate and not for profit sectors from a single office in Dushanbe.&nbsp;Jon Lisby, Kreston CEO comments:&nbsp;&ldquo;It is excellent to welcome KMPT to the Kreston network and to strengthen our service offering in the region. Part of our strategy is to expand our coverage and raise our profile across Central Asia and this addition complements our current members in Kyrgyzstan, Afghanistan, Azerbaijan, Pakistan, Kazakhstan and Uzbekistan&rdquo;.</p>\r\n', 37, 1, '2016-10-07 06:53:50', 1, '2016-10-07 19:43:30', 1),
(3, 'Kreston Indonesia strengthens tax capability with the addition of Pratama Indomitra', 'kreston-indonesia-strengthens-tax-capability-with-the-addition-of-pratama-indomitra', 1, 'News', '<p><img alt="" src="http://kreston-indonesia.co.id/media/images/shared/news/57f6fce2ca8ff.jpg" style="float:left; height:292px; margin-left:5px; margin-right:5px; width:420px" />Kreston International has added significantly to Kreston&rsquo;s service offering in Indonesia with the admittance of PT Pratama Indomitra Konsultan.Founded in 2010, Pratama Indomitra<strong>&nbsp;</strong>offers Tax consulting, Transfer Pricing, Accounting, Risk Management and Corporate Governance services to its high profile clients. The firm will complement other services offered by Kreston&rsquo;s existing member in Indonesia, KAP Hendrawinata Eddy Siddharta &amp; Tanzil. Combined, Kreston Indonesia now has a resource of 29 Partners and more than 420 professional and support staff covering Jakarta, Medan, Surabaya and Yogyakarta.Kreston CEO Jon Lisby, comments:&ldquo;We are delighted to learn of the strengthening of our Indonesian resource and capability and welcome all from Pratama Indomitra to the network. Combined the firms are expected to advance within the Top 10 national rankings and will be better placed to compete in a highly competitive and challenging economic market&rdquo;.</p>\r\n\r\n<p>Josef Tanzil, Chairman of Kreston Indonesia<strong>&nbsp;</strong>said:&ldquo;It is a pleasure to welcome PT Pratama Indomitra Konsultan to join us as members of Kreston Indonesia. CEO, Mr Prianto Budi Saptono and Partners are prominent registered Tax Consultants and Licensed Tax Attorneys with extensive experience and who are renowned for offering trusted high quality services&rdquo;.</p>\r\n\r\n<p>Mr Prianto added:&quot;It is an honour to join Kreston Indonesia and we look forward to working alongside KAP Hendrawinata Eddy Siddharta &amp; Tanzil. We will now be able to offer the full service range so we can better compete in the local and global market place.&rdquo;&nbsp;</p>\r\n', 77, 1, '2016-10-07 08:38:09', 1, '2016-10-07 19:43:42', 1),
(4, 'Penyusutan Aktiva Tetap (Depresiasi) – Komersial vs Fiskal', 'penyusutan-aktiva-tetap-depresiasi-komersial-vs-fiskal', 1, 'Article', '<p>Pada modul Fixed Asset di ACCURATE menyediakan perhitunganpenyusutan fixed asset untuk Komersial dan Fiskal, Saat membuat New Fixed Asset seperti pada gambar dibawah ini kita menentukan Fixed Asset Type atas Fixed Asset tsb. Tipe Fixed Asset ini yang merujuk ke Perhitungan Fiskal. Karena itu ada kemungkinan untuk kita membuat Dua Tipe Fixed Asset seperti pada gambar adalah Tipe&nbsp;<strong>Kendaraan(Gol1)</strong>&nbsp;&amp;&nbsp;<strong>Kendaraan(Gol2)</strong>&nbsp;sama-sama kendaraan, namun masuk golongan penyusutan yang berbeda secara pajak.Sehubungan dengan perhitungan Penyusutan Komersial vs Fiskal, biasanya yang membedakan Komersial dengan Fiskal adalah perbedaan Umur dan atau Metode Penyusutan antara penggolongan yang Pajak tentukan dengan yang digunakan perusahaan untuk menyusutkan Fixed Asset nya menurut kepentingan si pengusaha. - See more at: http://softwareaccurate.com/penyusutan-aktiva-tetap-depresiasi-komersial-vs-fiskal/#sthash.naHiELK9.dpuf</p>\r\n\r\n<p>Saat membuat New Fixed Asset seperti pada gambar dibawah ini kita menentukan Fixed Asset Type atas Fixed Asset tsb. Tipe Fixed Asset ini yang merujuk ke Perhitungan Fiskal. Karena itu ada kemungkinan untuk kita membuat Dua Tipe Fixed Asset seperti pada gambar adalah Tipe&nbsp;<strong>Kendaraan(Gol1)</strong>&nbsp;&amp;&nbsp;<strong>Kendaraan(Gol2)</strong>&nbsp;sama-sama kendaraan, namun masuk golongan penyusutan yang berbeda secara pajak.Sehubungan dengan perhitungan Penyusutan Komersial vs Fiskal, biasanya yang membedakan Komersial dengan Fiskal adalah perbedaan Umur dan atau Metode Penyusutan antara penggolongan yang Pajak tentukan dengan yang digunakan perusahaan untuk menyusutkan Fixed Asset nya menurut kepentingan si pengusaha. - See more at: http://softwareaccurate.com/penyusutan-aktiva-tetap-depresiasi-komersial-vs-fiskal/#sthash.naHiELK9.dpuf</p>\r\n', 76, 1, '2016-10-07 20:03:38', 1, '2016-10-07 20:03:38', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `storage_location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `publications`
--

INSERT INTO `publications` (`id`, `title`, `storage_location`, `description`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Doing Business in Country Guides', '/media/files/shared/58072ec1a5326.xls', 'Testing', 1, '2016-10-19 15:47:54', 1, '2016-10-19 15:47:54', 1),
(2, 'Kreston International Annual Review 2016-2017', '/media/files/shared/58072ec1a5326.xls', 'Kreston International Annual Review 2016-2017', 1, '2016-10-19 15:48:19', 1, '2016-10-19 15:48:19', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'site_name', 'kreston-indonesia.co.id', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'meta_author', 'Kreston', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'meta_keyword', 'kantor akuntan, akuntan publik, Kreston International , Kreston , Kreston Indonesia, Hendrawinata Eddy Siddharta & Tanzil. KAP. HEST', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'meta_content', 'kantor akuntan, akuntan publik, Kreston International , Kreston , Kreston Indonesia, Hendrawinata Eddy Siddharta & Tanzil. KAP. HEST', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'company_name', 'Kreston Indonesia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'company_address', '18 Office Park Tower A Lt. 20 Jl. TB. Simatupang No. 18', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'company_city', 'DKI Jakarta 12520 ', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'company_country', 'Indonesia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 'company_phone_number', '+62 21 2270 8292', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 'company_fax_number', '+62 21 2270 8299', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'company_email', 'hest-tbsimatupang@kreston-indonesia.co.id', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'limit_page', '15', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'social_facebook', 'krestonindonesia18', '2016-10-07 10:00:00', 1, '2016-10-07 10:00:00', 1),
(14, 'social_gplus', 'kreston_indonesia', '2016-10-07 10:00:00', 1, '2016-10-07 10:00:00', 1),
(15, 'social_linkedin', 'kreston-indonesia', '2016-10-22 10:00:00', 1, '2016-10-22 10:00:00', 1),
(16, 'social_linkedin', 'kreston-indonesia', '2016-10-22 10:00:00', 1, '2016-10-22 10:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Sawerdy', 'Sawerdy', 'it@kreston.com', '$2y$10$oJ3llO4f4l5wErhahBVXGu/7KPjNVBp7zE7Tr6CPFpE77FExzJkd6', 'w4eqX4cHQhB46j6pPJc2VhSJLy9TSXNLsA4EWMBLFjbFGdGIYA4DlhXyNll0', 1, '2016-09-01 00:00:00', 1, '2016-12-16 10:55:43', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
