-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2015 at 09:16 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `commers`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
`about_id` int(2) NOT NULL,
  `about_type` int(2) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_text` text
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_type`, `about_title`, `about_text`) VALUES
(2, 1, 'Tentang Kami', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare dolor at diam sodales mollis. Sed luctus, turpis id faucibus dapibus, eros dui imperdiet sem, eget semper ante sapien vel dolor. Donec tempor sodales mauris id finibus. Integer consectetur gravida velit varius hendrerit. In luctus odio id scelerisque varius. Integer suscipit id velit a tempus. Donec porta volutpat rutrum. Cras nec lobortis lectus. Donec a lorem ac eros elementum faucibus. Nam molestie purus vel purus placerat faucibus. Donec vitae ultricies urna, non hendrerit quam. Aenean imperdiet nunc est, ultrices suscipit sapien malesuada non. Vivamus aliquam ex ligula, sed accumsan augue molestie vel.</span></p>\r\n'),
(3, 2, 'private', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare dolor at diam sodales mollis. Sed luctus, turpis id faucibus dapibus, eros dui imperdiet sem, eget semper ante sapien vel dolor. Donec tempor sodales mauris id finibus. Integer consectetur gravida velit varius hendrerit. In luctus odio id scelerisque varius. Integer suscipit id velit a tempus. Donec porta volutpat rutrum. Cras nec lobortis lectus. Donec a lorem ac eros elementum faucibus. Nam molestie purus vel purus placerat faucibus. Donec vitae ultricies urna, non hendrerit quam. Aenean imperdiet nunc est, ultrices suscipit sapien malesuada non. Vivamus aliquam ex ligula, sed accumsan augue molestie vel.</span></p>\r\n'),
(6, 3, 'Penghargaan', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare dolor at diam sodales mollis. Sed luctus, turpis id faucibus dapibus, eros dui imperdiet sem, eget semper ante sapien vel dolor. Donec tempor sodales mauris id finibus. Integer consectetur gravida velit varius hendrerit. In luctus odio id scelerisque varius. Integer suscipit id velit a tempus. Donec porta volutpat rutrum. Cras nec lobortis lectus. Donec a lorem ac eros elementum faucibus. Nam molestie purus vel purus placerat faucibus. Donec vitae ultricies urna, non hendrerit quam. Aenean imperdiet nunc est, ultrices suscipit sapien malesuada non. Vivamus aliquam ex ligula, sed accumsan augue molestie vel.</span></p>\r\n'),
(7, 4, 'Kontak Kami', '<p>\r\n	<font size="4"><strong>PT. Merdeka Setiap Hari</strong></font><br />\r\n	<font size="2">Jl. Raya Cyber Crime no. 1010101<br />\r\n	Jakarta</font></p>\r\n<p>\r\n	<font size="2">Phone: +62.101010101<br />\r\n	Fax: +62.1010101010<br />\r\n	Email: support@kayytechin.com</font></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(2) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pw` varchar(255) NOT NULL,
  `admin_fullname` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_phone` varchar(255) DEFAULT NULL,
  `admin_status` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_pw`, `admin_fullname`, `admin_email`, `admin_phone`, `admin_status`) VALUES
(11, 'admin', '123456', 'admin', 'support@kayytechin.com', '08569709 9493 ', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
`bank_id` int(2) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_account` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`, `bank_account`) VALUES
(1, 'BCA', '89012345671'),
(2, 'BNI', '23456789'),
(4, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
`banner_id` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_tmp` varchar(255) NOT NULL,
  `banner_img` varchar(255) NOT NULL,
  `banner_link` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_name`, `banner_tmp`, `banner_img`, `banner_link`) VALUES
(1, 'banner11', '', '23883tEREUy1vSfuSu8LzTop3_IMG_2538.jpg', 'google.com'),
(7, 'banner2', 'banner2', '85470Tulips.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`brand_id` int(4) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_img` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_img`) VALUES
(17, 'a', '25675dvs.jpg'),
(18, 'b', '16059eamerica.jpg'),
(19, 'b', '3376volcom.jpg'),
(20, 'c', '41159wes.jpg'),
(21, 'd', '88073zo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`cat_id` int(5) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_img` varchar(255) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(15, 'Papan Skate', NULL),
(14, 'CATEGORY B', ''),
(13, 'CATEGORY A', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id_com` int(11) NOT NULL,
  `name_com` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `isi_com` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` enum('Y','N') DEFAULT 'N',
  `id_pg` int(50) DEFAULT NULL,
  `count_com` int(255) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_com`, `name_com`, `email`, `isi_com`, `tgl`, `time`, `status`, `id_pg`, `count_com`) VALUES
(18, 'nani', 'na@gmail.com', 'wah keren', '2014-05-07', '04:47:08', 'Y', 4, NULL),
(16, 'pjack', 'percy@yahoo.com', 'saya suka dengan produk ini', '2014-05-07', '04:05:42', 'Y', 19, NULL),
(17, 'budi', 'd@gmai.com', 'luar bisa sekali produk ini', '2014-05-07', '04:09:05', 'N', 19, NULL),
(15, 'asa', 'ymaulanapc@gmail.com', 'assdads', '2014-05-07', '02:50:14', 'N', 19, NULL),
(19, 'rudi', 'yusnapc@yahoo.co.id', 'wah saya suka sekali', '2014-05-23', '15:54:10', 'Y', 46, 3);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`contact_id` int(5) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_topic` varchar(255) NOT NULL,
  `contact_text` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_address`, `contact_num`, `contact_email`, `contact_topic`, `contact_text`) VALUES
(1, 'James Potter', '12 Grimauld Place', '49256718', 'jpotter@yahoo.com', 'la', 'hi son'),
(8, 'tt', 'ttt', '7777', 'ttt@gmail.com', 'Produk servis', 'trtrrt'),
(4, 'nanay', 'cip', '5555555', 'y@gmail.com', 'services', 'hall0'),
(5, 'mul', 'cipinang', '0214758625', 'ymaulanapc@gmail.com', '', 'test'),
(6, 'tam', 'gading', '222222', 'ym@gmail.com', '', 'hai broh'),
(7, 'gun', 'con', '9999999', 'gun@gmail.com', 'Karier', 'ggggggg');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
`lang_id` int(5) NOT NULL,
  `lang_name` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`lang_id`, `lang_name`) VALUES
(1, 'English'),
(3, 'Indonesian'),
(4, 'Arabic'),
(5, 'Chinese');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(10) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_tmp` varchar(255) NOT NULL,
  `news_img` varchar(255) DEFAULT NULL,
  `news_text` longtext,
  `news_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_status` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_tmp`, `news_img`, `news_text`, `news_date`, `news_status`) VALUES
(1, 'Lorem ipsum dolor sit amet', 'doc1', '51761images.jpg, 40546adidas_logo.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec libero ac dolor mattis dignissim eu vitae urna. Donec dignissim elit et nisl facilisis fringilla. Praesent eget augue quam. Aliquam hendrerit facilisis ligula non tincidunt. Cras sed orci nunc. Proin suscipit lacus sed mi ullamcorper, vel tempor libero varius. Aliquam pharetra augue vitae venenatis commodo. Donec pharetra fermentum elit, sed eleifend urna fermentum ut. Nullam feugiat interdum erat, et rhoncus justo tempus at. Vestibulum sed enim eget metus vulputate hendrerit. Curabitur viverra enim at augue interdum ultricies. Maecenas suscipit odio in justo facilisis, interdum laoreet lectus feugiat. Ut posuere condimentum pharetra. In id tempus enim, at gravida eros. Mauris porta massa iaculis risus adipiscing mollis.', '2014-04-22 08:41:39', 'published'),
(2, 'Field of Flowers', 'field-of-flowers', '94638Tulips.jpg', '<div>\r\n	A flower, sometimes known as a bloom or blossom, is the reproductive structure found in flowering plants (plants of the division Magnoliophyta, also called angiosperms). The biological function of a flower is to effect reproduction, usually by providing a mechanism for the union of sperm with eggs. Flowers may facilitate outcrossing (fusion of sperm and eggs from different individuals in a population) or allow selfing (fusion of sperm and egg from the same flower). Some flowers produce diaspores without fertilization (parthenocarpy). Flowers contain sporangia and are the site where gametophytes develop. Flowers give rise to fruit and seeds. Many flowers have evolved to be attractive to animals, so as to cause them to be vectors for the transfer of pollen.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	In addition to facilitating the reproduction of flowering plants, flowers have long been admired and used by humans to beautify their environment, and also as objects of romance, ritual, religion, medicine and as a source of food.</div>\r\n', '2014-03-04 21:56:52', 'unpublished'),
(4, 'Lorem ipsum dolor sit amet', 'koala-koala', '65024Koala.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec libero ac dolor mattis dignissim eu vitae urna. Donec dignissim elit et nisl facilisis fringilla. Praesent eget augue quam. Aliquam hendrerit facilisis ligula non tincidunt. Cras sed orci nunc. Proin suscipit lacus sed mi ullamcorper, vel tempor libero varius. Aliquam pharetra augue vitae venenatis commodo. Donec pharetra fermentum elit, sed eleifend urna fermentum ut. Nullam feugiat interdum erat, et rhoncus justo tempus at. Vestibulum sed enim eget metus vulputate hendrerit. Curabitur viverra enim at augue interdum ultricies. Maecenas suscipit odio in justo facilisis, interdum laoreet lectus feugiat. Ut posuere condimentum pharetra. In id tempus enim, at gravida eros. Mauris porta massa iaculis risus adipiscing mollis.', '2014-04-22 03:51:52', 'published'),
(3, 'Lorem ipsum dolor sit amet', 'test', '70697mountain-hi-res.JPG', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec libero ac dolor mattis dignissim eu vitae urna. Donec dignissim elit et nisl facilisis fringilla. Praesent eget augue quam. Aliquam hendrerit facilisis ligula non tincidunt. Cras sed orci nunc. Proin suscipit lacus sed mi ullamcorper, vel tempor libero varius. Aliquam pharetra augue vitae venenatis commodo. Donec pharetra fermentum elit, sed eleifend urna fermentum ut. Nullam feugiat interdum erat, et rhoncus justo tempus at. Vestibulum sed enim eget metus vulputate hendrerit. Curabitur viverra enim at augue interdum ultricies. Maecenas suscipit odio in justo facilisis, interdum laoreet lectus feugiat. Ut posuere condimentum pharetra. In id tempus enim, at gravida eros. Mauris porta massa iaculis risus adipiscing mollis.</p>\r\n', '2015-01-22 03:12:09', 'published'),
(5, 'lorem ipsum color diamet', '', '35721unsplash_525d7892901ff_1_2.JPG', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec libero ac dolor mattis dignissim eu vitae urna. Donec dignissim elit et nisl facilisis fringilla. Praesent eget augue quam. Aliquam hendrerit facilisis ligula non tincidunt. Cras sed orci nunc. Proin suscipit lacus sed mi ullamcorper, vel tempor libero varius. Aliquam pharetra augue vitae venenatis commodo. Donec pharetra fermentum elit, sed eleifend urna fermentum ut. Nullam feugiat interdum erat, et rhoncus justo tempus at. Vestibulum sed enim eget metus vulputate hendrerit. Curabitur viverra enim at augue interdum ultricies. Maecenas suscipit odio in justo facilisis, interdum laoreet lectus feugiat. Ut posuere condimentum pharetra. In id tempus enim, at gravida eros. Mauris porta massa iaculis risus adipiscing mollis.</p>\r\n', '2015-01-22 03:11:12', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
`nletter_id` int(4) NOT NULL,
  `nletter_title` varchar(255) NOT NULL,
  `nletter_tmp` varchar(255) NOT NULL,
  `nletter_text` text
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`nletter_id`, `nletter_title`, `nletter_tmp`, `nletter_text`) VALUES
(1, 'newsletter 1', 'newsletter-1', '<p>\r\n	1</p>\r\n<p>\r\n	2</p>\r\n<p>\r\n	3</p>\r\n<p>\r\n	4</p>\r\n<p>\r\n	5</p>\r\n<p>\r\n	6</p>\r\n<p>\r\n	Newsletter</p>\r\n'),
(3, 'newsletter3', 'newsletter3', '<p>\r\n	asdfasjaetj</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`order_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `order_total` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'new order',
  `order_shipcomp` varchar(255) DEFAULT NULL,
  `order_shipdate` date DEFAULT NULL,
  `order_shipnum` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `order_time` time DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `order_total`, `order_status`, `order_shipcomp`, `order_shipdate`, `order_shipnum`, `fullname`, `order_time`, `address`, `city`, `method`, `email`, `phone`) VALUES
(1, 1, '1070000', 'Process', 'JNE', '2014-03-13', '12346357', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 9, '', 'new order', NULL, '2014-04-29', NULL, 'yu', '03:09:27', 'asaas', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '21321321'),
(18, 10, '', 'new order', NULL, '2014-04-29', NULL, 'Wiguna Pratama', '02:41:25', 'Jakarta', '1-Jakarta', '1-Reguler', 'wiguna@l-cq.com', '083870088887'),
(17, 9, '', 'new order', NULL, '2014-04-29', NULL, 'yu', '02:29:57', 'asaas', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '21321321'),
(16, 9, '', 'new order', NULL, '2014-04-29', NULL, '', '02:11:41', 'asaas', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '21321321'),
(62, 11, '', 'new order', NULL, '2014-04-30', NULL, 'yu', '05:22:07', 'ccc', '1-Jakarta', '1-Reguler', 'yusnapc@yahoo.co.id', '2222'),
(61, 11, '', 'new order', NULL, '2014-04-30', NULL, 'yu', '05:19:26', 'ccc', '1-Jakarta', '1-Reguler', 'yusnapc@yahoo.co.id', '2222'),
(13, 1, '', 'new order', NULL, '2014-04-23', NULL, 'pjack', '05:08:16', 'Los Angeles', '1-Jakarta', '1-Reguler', 'percy@yahoo.com', '252525'),
(71, 11, '', 'new order', NULL, '2014-05-01', NULL, 'yu', '22:44:58', 'ccc', '1-Jakarta', '1-Reguler', 'yusnapc@yahoo.co.id', '2222'),
(20, 9, '', 'new order', NULL, '2014-04-29', NULL, 'yu', '03:38:02', 'asaas', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '21321321'),
(21, 9, '', 'new order', NULL, '2014-04-29', NULL, 'yu', '03:40:58', 'asaas', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '21321321'),
(22, 9, '', 'new order', NULL, '2014-04-29', NULL, 'yu', '03:50:56', 'asaas', '1-Jakarta', '1-Oke', 'ymaulanapc@gmail.com', '21321321'),
(23, 9, '', 'new order', NULL, '2014-04-29', NULL, 'yu', '03:58:23', 'asaas', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '21321321'),
(70, 11, '', 'new order', NULL, '2014-04-30', NULL, 'yu', '05:39:35', 'ccc', '1-Jakarta', '1-Reguler', 'yusnapc@yahoo.co.id', '2222'),
(69, 11, '', 'new order', NULL, '2014-04-30', NULL, 'yu', '05:36:39', 'ccc', '1-Jakarta', '1-Reguler', 'yusnapc@yahoo.co.id', '2222'),
(68, 11, '', 'new order', NULL, '2014-04-30', NULL, 'yu', '05:35:29', 'ccc', '1-Jakarta', '1-Reguler', 'yusnapc@yahoo.co.id', '2222'),
(67, 11, '', 'new order', NULL, '2014-04-30', NULL, 'yu', '05:28:51', 'ccc', '1-Jakarta', '1-Reguler', 'yusnapc@yahoo.co.id', '2222'),
(66, 11, '', 'new order', NULL, '2014-04-30', NULL, 'yu', '05:28:08', 'ccc', '1-Jakarta', '1-Reguler', 'yusnapc@yahoo.co.id', '2222'),
(50, 0, '', 'new order', NULL, '2014-04-30', NULL, '', '03:44:30', '', '', '', 'yusnapc@yahoo.co.id', ''),
(75, 12, '', 'new order', NULL, '2014-05-26', NULL, 'mulana', '12:55:02', 'jakarta raya', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '123123'),
(76, 12, '', 'new order', NULL, '2014-05-26', NULL, 'mulana', '13:05:54', 'jakarta raya', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '123123'),
(77, 12, '', 'new order', NULL, '2014-05-26', NULL, 'mulana', '13:14:59', 'jakarta raya', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '123123'),
(78, 12, '', 'new order', NULL, '2014-05-26', NULL, 'mulana', '13:21:16', 'jakarta raya', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '123123'),
(79, 12, '', 'new order', NULL, '2014-05-26', NULL, 'mulana', '13:30:04', 'jakarta raya', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '123123'),
(80, 12, '', 'new order', NULL, '2014-05-26', NULL, 'mulana', '13:36:43', 'jakarta raya', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '123123'),
(81, 12, '', 'new order', NULL, '2014-05-26', NULL, 'mulana', '13:39:30', 'jakarta raya', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '123123'),
(82, 12, '', 'new order', NULL, '2014-05-26', NULL, 'mulana', '13:42:17', 'jakarta raya', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '123123'),
(83, 12, '', 'new order', NULL, '2014-05-26', NULL, 'mulana', '13:47:36', 'jakarta raya', '1-Jakarta', '1-Reguler', 'ymaulanapc@gmail.com', '123123'),
(84, 11, '', 'new order', NULL, '2014-05-26', NULL, 'yu', '13:53:38', 'ccc', '1-Jakarta', '1-Reguler', 'yusnapc@yahoo.co.id', '2222'),
(85, 11, '', 'new order', NULL, '2014-06-03', NULL, 'yu', '13:45:18', 'ccc', '', '', 'yusnapc@yahoo.co.id', '2222'),
(86, 11, '', 'new order', NULL, '2014-06-03', NULL, 'yu', '13:45:35', 'ccc', '1-Jakarta', '1-Reguler', 'yusnapc@yahoo.co.id', '2222'),
(87, 11, '', 'new order', NULL, '2014-06-03', NULL, '', '14:26:05', '', '', '', '', ''),
(88, 11, '', 'new order', NULL, '2014-06-03', NULL, '', '14:34:35', '', '', '', '', ''),
(89, 11, '', 'new order', NULL, '2014-06-03', NULL, '', '14:45:38', '', '', '', '', ''),
(90, 11, '', 'new order', NULL, '2014-06-03', NULL, '', '14:46:26', '', '', '', '', ''),
(91, 11, '', 'new order', NULL, '2014-06-04', NULL, '', '14:19:30', '', '', '', '', ''),
(92, 11, '', 'new order', NULL, '2014-06-04', NULL, 'yu', '14:20:30', 'ccc', '1-Jakarta', '1-Reguler', 'yusnapc@yahoo.co.id', '2222'),
(93, 11, '', 'new order', NULL, '2014-06-04', NULL, 'yu', '14:21:17', 'ccc', '1-Jakarta', '1-Reguler', 'yusnapc@yahoo.co.id', '2222');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orderdetails_id` int(10) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `orderdetails_sum` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderdetails_id`, `user_id`, `product_id`, `orderdetails_sum`) VALUES
(1, 1, 1, 1),
(1, 1, 10, 2),
(15, 1, 21, 1),
(16, 9, 22, 1),
(17, 9, 22, 1),
(18, 10, 18, 3),
(18, 10, 4, 1),
(19, 9, 0, 1),
(19, 9, 22, 1),
(21, 9, 4, 1),
(22, 9, 19, 1),
(23, 9, 17, 1),
(24, 11, 18, 1),
(25, 11, 19, 1),
(27, 11, 17, 1),
(28, 11, 22, 1),
(29, 11, 18, 1),
(30, 11, 21, 1),
(31, 11, 10, 1),
(32, 11, 18, 1),
(33, 11, 22, 1),
(34, 11, 19, 1),
(35, 11, 10, 1),
(36, 11, 1, 1),
(37, 11, 21, 1),
(38, 10, 22, 1),
(40, 11, 22, 1),
(44, 11, 10, 1),
(51, 11, 22, 1),
(53, 11, 22, 1),
(54, 11, 8, 1),
(56, 11, 19, 1),
(57, 11, 1, 1),
(59, 11, 2, 1),
(60, 11, 8, 1),
(61, 11, 21, 1),
(63, 11, 17, 1),
(66, 11, 19, 1),
(67, 11, 18, 1),
(69, 11, 1, 1),
(70, 11, 19, 1),
(71, 11, 21, 1),
(72, 11, 21, 1),
(73, 11, 18, 1),
(74, 12, 21, 1),
(75, 12, 48, 2),
(76, 12, 48, 1),
(77, 12, 48, 1),
(78, 12, 48, 1),
(79, 12, 48, 1),
(80, 12, 48, 1),
(81, 12, 48, 1),
(82, 12, 48, 1),
(83, 12, 48, 1),
(84, 11, 48, 1),
(85, 11, 27, 1),
(87, 11, 47, 1),
(88, 11, 38, 1),
(89, 11, 26, 1),
(90, 11, 27, 1),
(91, 11, 46, 1),
(92, 11, 47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordertmp`
--

CREATE TABLE IF NOT EXISTS `ordertmp` (
`ordertmp_id` int(10) NOT NULL,
  `user_id` int(5) NOT NULL,
  `ordertmp_session` varchar(255) NOT NULL,
  `product_id` int(5) NOT NULL,
  `ordertmp_sum` int(10) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

--
-- Dumping data for table `ordertmp`
--

INSERT INTO `ordertmp` (`ordertmp_id`, `user_id`, `ordertmp_session`, `product_id`, `ordertmp_sum`, `date`, `time`) VALUES
(23, 3, '8bba6db1b200ba43cf65927fb6fce4a2', 18, 1, NULL, NULL),
(59, 3, '2af03234d8c470e624b475467b1548a3', 17, 3, NULL, NULL),
(76, 1, 'e5e4b2d56f8428bededac19b00ec03b6', 22, 1, '2014-04-29', '01:06:13'),
(85, 9, 'e5e4b2d56f8428bededac19b00ec03b6', 18, 2, '2014-04-29', '04:12:44'),
(145, 13, '5afds52vlvllrlakg80rnm2hi7', 57, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
`partner_id` int(4) NOT NULL,
  `partner_name` varchar(255) NOT NULL,
  `partner_img` varchar(255) NOT NULL,
  `partner_sort` int(4) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`partner_id`, `partner_name`, `partner_img`, `partner_sort`) VALUES
(1, 'partner1', '64096partner1.png', 1),
(2, 'partner2', '22754partner2.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

CREATE TABLE IF NOT EXISTS `pic` (
`pic_id` int(4) NOT NULL,
  `pic_name` varchar(255) NOT NULL,
  `pic_type` varchar(255) NOT NULL,
  `pic_tmp` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pic`
--

INSERT INTO `pic` (`pic_id`, `pic_name`, `pic_type`, `pic_tmp`) VALUES
(7, 'slide 5', 'image/jpeg', '7099slide-4.jpg'),
(5, 'slide 3', 'image/jpeg', '9778slide-6.jpg'),
(6, 'slide 4', 'image/jpeg', '52023slide-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`prod_id` int(5) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_tmp` varchar(255) NOT NULL,
  `prod_category` varchar(255) NOT NULL,
  `prod_brand` varchar(255) DEFAULT NULL,
  `prod_img` varchar(255) DEFAULT NULL,
  `prod_text` text,
  `prod_price` varchar(255) NOT NULL,
  `prod_pricedisc` varchar(255) DEFAULT NULL,
  `prod_weight` varchar(255) DEFAULT NULL,
  `prod_lang` varchar(255) NOT NULL,
  `prod_vid` varchar(255) DEFAULT NULL,
  `prod_vidtmp` varchar(255) DEFAULT NULL,
  `prod_unggulan` varchar(255) NOT NULL,
  `prod_special` varchar(255) NOT NULL,
  `prod_status` varchar(255) NOT NULL,
  `prod_desc` text,
  `stock` int(5) DEFAULT NULL,
  `prod_cil` varchar(255) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_tmp`, `prod_category`, `prod_brand`, `prod_img`, `prod_text`, `prod_price`, `prod_pricedisc`, `prod_weight`, `prod_lang`, `prod_vid`, `prod_vidtmp`, `prod_unggulan`, `prod_special`, `prod_status`, `prod_desc`, `stock`, `prod_cil`) VALUES
(57, 'New papan skate 4', 'new-papan-skate-4', '15', '', '22434unsplash_52424d6a9e278_1.JPG', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare dolor at diam sodales mollis. Sed luctus, turpis id faucibus dapibus, eros dui imperdiet sem, eget semper ante sapien vel dolor. Donec tempor sodales mauris id finibus. Integer consectetur gravida velit varius hendrerit. In luctus odio id scelerisque varius. Integer suscipit id velit a tempus. Donec porta volutpat rutrum. Cras nec lobortis lectus. Donec a lorem ac eros elementum faucibus. Nam molestie purus vel purus placerat faucibus. Donec vitae ultricies urna, non hendrerit quam. Aenean imperdiet nunc est, ultrices suscipit sapien malesuada non. Vivamus aliquam ex ligula, sed accumsan augue molestie vel.</span></p>\r\n', '200000', '150000', '500', '', '', '', 'unggulan', 'Yes', 'published', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare dolor at diam sodales mollis. Sed luctus, turpis id faucibus dapibus, eros dui imperdiet sem, eget semper ante sapien vel dolor. Donec tempor sodales mauris id finibus. Integer consectetur gravida velit varius hendrerit. In luctus odio id scelerisque varius. Integer suscipit id velit a tempus. Donec porta volutpat rutrum. Cras nec lobortis lectus. Donec a lorem ac eros elementum faucibus. Nam molestie purus vel purus placerat faucibus. Donec vitae ultricies urna, non hendrerit quam. Aenean imperdiet nunc est, ultrices suscipit sapien malesuada non. Vivamus aliquam ex ligula, sed accumsan augue molestie vel.</span></p>\r\n', NULL, ''),
(56, 'New papan skate 3', 'new-papan-skate-3', '15', '', '62042unsplash_52424d6a9e278_1.JPG', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare dolor at diam sodales mollis. Sed luctus, turpis id faucibus dapibus, eros dui imperdiet sem, eget semper ante sapien vel dolor. Donec tempor sodales mauris id finibus. Integer consectetur gravida velit varius hendrerit. In luctus odio id scelerisque varius. Integer suscipit id velit a tempus. Donec porta volutpat rutrum. Cras nec lobortis lectus. Donec a lorem ac eros elementum faucibus. Nam molestie purus vel purus placerat faucibus. Donec vitae ultricies urna, non hendrerit quam. Aenean imperdiet nunc est, ultrices suscipit sapien malesuada non. Vivamus aliquam ex ligula, sed accumsan augue molestie vel.</span></p>\r\n', '200000', '150000', '500', '', '', '', 'unggulan', 'Yes', 'published', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare dolor at diam sodales mollis. Sed luctus, turpis id faucibus dapibus, eros dui imperdiet sem, eget semper ante sapien vel dolor. Donec tempor sodales mauris id finibus. Integer consectetur gravida velit varius hendrerit. In luctus odio id scelerisque varius. Integer suscipit id velit a tempus. Donec porta volutpat rutrum. Cras nec lobortis lectus. Donec a lorem ac eros elementum faucibus. Nam molestie purus vel purus placerat faucibus. Donec vitae ultricies urna, non hendrerit quam. Aenean imperdiet nunc est, ultrices suscipit sapien malesuada non. Vivamus aliquam ex ligula, sed accumsan augue molestie vel.</span></p>\r\n', NULL, ''),
(55, 'New papan skate 2', 'new-papan-skate-2', '15', '', '74359unsplash_52424d6a9e278_1.JPG', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare dolor at diam sodales mollis. Sed luctus, turpis id faucibus dapibus, eros dui imperdiet sem, eget semper ante sapien vel dolor. Donec tempor sodales mauris id finibus. Integer consectetur gravida velit varius hendrerit. In luctus odio id scelerisque varius. Integer suscipit id velit a tempus. Donec porta volutpat rutrum. Cras nec lobortis lectus. Donec a lorem ac eros elementum faucibus. Nam molestie purus vel purus placerat faucibus. Donec vitae ultricies urna, non hendrerit quam. Aenean imperdiet nunc est, ultrices suscipit sapien malesuada non. Vivamus aliquam ex ligula, sed accumsan augue molestie vel.</span></p>\r\n', '200000', '150000', '500', '', '', '', 'unggulan', 'Yes', 'published', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare dolor at diam sodales mollis. Sed luctus, turpis id faucibus dapibus, eros dui imperdiet sem, eget semper ante sapien vel dolor. Donec tempor sodales mauris id finibus. Integer consectetur gravida velit varius hendrerit. In luctus odio id scelerisque varius. Integer suscipit id velit a tempus. Donec porta volutpat rutrum. Cras nec lobortis lectus. Donec a lorem ac eros elementum faucibus. Nam molestie purus vel purus placerat faucibus. Donec vitae ultricies urna, non hendrerit quam. Aenean imperdiet nunc est, ultrices suscipit sapien malesuada non. Vivamus aliquam ex ligula, sed accumsan augue molestie vel.</span></p>\r\n', NULL, ''),
(54, 'New papan skate 1', 'new-papan-skate-1', '15', '', '2912unsplash_52424d6a9e278_1.JPG', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare dolor at diam sodales mollis. Sed luctus, turpis id faucibus dapibus, eros dui imperdiet sem, eget semper ante sapien vel dolor. Donec tempor sodales mauris id finibus. Integer consectetur gravida velit varius hendrerit. In luctus odio id scelerisque varius. Integer suscipit id velit a tempus. Donec porta volutpat rutrum. Cras nec lobortis lectus. Donec a lorem ac eros elementum faucibus. Nam molestie purus vel purus placerat faucibus. Donec vitae ultricies urna, non hendrerit quam. Aenean imperdiet nunc est, ultrices suscipit sapien malesuada non. Vivamus aliquam ex ligula, sed accumsan augue molestie vel.</span></p>\r\n', '200000', '150000', '500', '', '', '', 'unggulan', 'Yes', 'published', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare dolor at diam sodales mollis. Sed luctus, turpis id faucibus dapibus, eros dui imperdiet sem, eget semper ante sapien vel dolor. Donec tempor sodales mauris id finibus. Integer consectetur gravida velit varius hendrerit. In luctus odio id scelerisque varius</span></p>\r\n', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
`region_id` int(2) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `region_tmp` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `region_name`, `region_tmp`) VALUES
(1, 'Jabodetabek', 'jabodetabek'),
(2, 'Jawa Barat', 'jawa-barat'),
(6, 'Sulawesi', 'sulawesi'),
(5, 'Kalimantan', 'kalimantan'),
(7, 'Jayapura', 'jayapura'),
(8, 'Sumatera', 'sumatera'),
(9, 'Jawa Timur & Bali', 'jawa-timur-&-bali'),
(10, 'Jawa Tengah', 'jawa-tengah');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
`setting_id` int(5) NOT NULL,
  `setting_twitter` varchar(255) DEFAULT NULL,
  `setting_fb` varchar(255) DEFAULT NULL,
  `setting_url` varchar(255) DEFAULT NULL,
  `setting_emailadmin` varchar(255) DEFAULT NULL,
  `setting_emailsendreceive` varchar(255) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_twitter`, `setting_fb`, `setting_url`, `setting_emailadmin`, `setting_emailsendreceive`) VALUES
(1, 'https://twitter.com', 'https://www.facebook.com', 'http://localhost/commers', 'support@kayytechin.com', 'support@kayytechin.com');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
`shipping_id` int(4) NOT NULL,
  `shipping_city` varchar(255) NOT NULL,
  `shipping_district` varchar(255) NOT NULL,
  `shipping_reg` varchar(255) NOT NULL,
  `shipping_ex` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `shipping_city`, `shipping_district`, `shipping_reg`, `shipping_ex`) VALUES
(1, 'Jakarta', 'Kelapa Gading', '20000', '27600'),
(2, 'Jakarta barat', 'DKI JAKARTA', '8000', '1200');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
`store_id` int(4) NOT NULL,
  `store_city` varchar(255) NOT NULL,
  `store_address` text NOT NULL,
  `store_img` varchar(255) NOT NULL,
  `store_map` varchar(255) NOT NULL,
  `region_id` int(2) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_city`, `store_address`, `store_img`, `store_map`, `region_id`) VALUES
(76, 'Outlet 2', '<p>\r\n	<font size="2">Jl. Raya Cyber Crime no. 1010101<br />\r\n	Jakarta</font></p>\r\n<p>\r\n	<font size="2">Phone: +62.101010101<br />\r\n	Fax: +62.1010101010<br />\r\n	Email: support@kayytechin.com</font></p>\r\n', '72574mountain-hi-res.JPG', '-6.204827176102235, 106.88895267868043', 2),
(75, 'Outlet 1', '<p>\r\n	<font size="2">Jl. Raya Cyber Crime no. 1010101<br />\r\n	Jakarta</font></p>\r\n<p>\r\n	<font size="2">Phone: +62.101010101<br />\r\n	Fax: +62.1010101010<br />\r\n	Email: support@kayytechin.com</font></p>\r\n', '93093work-station-straight-on-view.jpg', '-6.204827176102235, 106.88895267868043', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE IF NOT EXISTS `transfer` (
`transfer_id` int(5) NOT NULL,
  `transfer_rec` varchar(255) NOT NULL,
  `transfer_name` varchar(255) NOT NULL,
  `transfer_bankfrom` varchar(255) NOT NULL,
  `transfer_bankto` varchar(255) NOT NULL,
  `transfer_code` varchar(255) NOT NULL,
  `order_id` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(4) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pw` varchar(255) NOT NULL,
  `user_fullname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_newsletter` varchar(255) NOT NULL,
  `user_reg` datetime NOT NULL,
  `user_status` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pw`, `user_fullname`, `user_email`, `user_address`, `user_phone`, `user_newsletter`, `user_reg`, `user_status`) VALUES
(13, '', '1234', 'yesa', 'yesa@gmail.com', 'cip', '565757', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
`vid_id` int(5) NOT NULL,
  `vid_url` varchar(255) NOT NULL,
  `vid_title` varchar(255) NOT NULL,
  `vid_thumb` varchar(255) NOT NULL,
  `vid_length` varchar(255) NOT NULL,
  `vid_count` varchar(255) NOT NULL,
  `vid_rating` varchar(255) NOT NULL,
  `vid_admin` int(2) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`vid_id`, `vid_url`, `vid_title`, `vid_thumb`, `vid_length`, `vid_count`, `vid_rating`, `vid_admin`) VALUES
(1, 'http://www.youtube.com/watch?v=Z6_XcaDjwW0', '[Chip and Dale Full Episode] Donald Duck - Dragon Around', 'http://i1.ytimg.com/vi/Z6_XcaDjwW0/0.jpg', '421', '428065', '3.2756891', 1),
(2, 'http://www.youtube.com/watch?v=JMSbrFLBz64', 'Van Damme - Zero Gravity Split', 'http://i1.ytimg.com/vi/JMSbrFLBz64/0.jpg', '92', '2321281', '4.898052', 4),
(3, 'http://www.youtube.com/watch?v=gLDYtH1RH-U', 'Shanghai Tower (650 meters)', 'http://i1.ytimg.com/vi/gLDYtH1RH-U/0.jpg', '320', '29530297', '4.888874', 8),
(4, 'http://www.youtube.com/watch?v=ubGpDoyJvmI', 'Transformers: Age of Extinction Teaser Trailer', 'http://i1.ytimg.com/vi/ubGpDoyJvmI/0.jpg', '154', '9196806', '4.815467', 7),
(6, 'http://www.youtube.com/watch?v=3pmvkR3NbGM', 'Transformers 4 Super Bowl Trailer - Transformers Age of Extinction', 'http://i1.ytimg.com/vi/3pmvkR3NbGM/0.jpg', '36', '3656292', '4.773966', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
 ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
 ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
 ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
 ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id_com`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
 ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
 ADD PRIMARY KEY (`nletter_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ordertmp`
--
ALTER TABLE `ordertmp`
 ADD PRIMARY KEY (`ordertmp_id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
 ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `pic`
--
ALTER TABLE `pic`
 ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
 ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
 ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
 ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
 ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
 ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`vid_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
MODIFY `about_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
MODIFY `bank_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
MODIFY `brand_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `contact_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
MODIFY `lang_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
MODIFY `nletter_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `ordertmp`
--
ALTER TABLE `ordertmp`
MODIFY `ordertmp_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
MODIFY `partner_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pic`
--
ALTER TABLE `pic`
MODIFY `pic_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `prod_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
MODIFY `region_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
MODIFY `setting_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
MODIFY `shipping_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
MODIFY `store_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
MODIFY `transfer_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
MODIFY `vid_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
