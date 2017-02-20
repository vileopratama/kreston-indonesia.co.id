-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Inang: localhost:3306
-- Waktu pembuatan: 03 Jan 2017 pada 08.48
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

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
(26, 5, 'http://portal.kreston-indonesia.co.id', 'Ferdinand Agung', 'ferdinand_agung@kreston-indonesia.co.id', 'ferdinand-agung', 'Ferdinand Agung', 1, 12, '2016-12-20 11:18:22', 1, '2016-12-20 11:20:03', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
