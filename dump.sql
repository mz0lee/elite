-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2015 at 11:53 AM
-- Server version: 5.1.73-14.12-log
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mzolee_elite`
--

-- --------------------------------------------------------

--
-- Table structure for table `pocitace`
--

CREATE TABLE IF NOT EXISTS `pocitace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazov` varchar(300) NOT NULL,
  `kod` varchar(50) NOT NULL,
  `vyrobca` varchar(100) NOT NULL,
  `cena` float NOT NULL,
  `sklad` int(11) NOT NULL,
  `procesor` varchar(200) NOT NULL,
  `grafika` varchar(200) NOT NULL,
  `pevny_disk` varchar(200) NOT NULL,
  `pamat` varchar(200) NOT NULL,
  `ostatne` varchar(500) NOT NULL,
  `date_inserted` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kod` (`kod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `pocitace`
--

INSERT INTO `pocitace` (`id`, `nazov`, `kod`, `vyrobca`, `cena`, `sklad`, `procesor`, `grafika`, `pevny_disk`, `pamat`, `ostatne`, `date_inserted`, `date_modified`) VALUES
(112, 'Prestigio ION® PC Atom 230 (1,6G) NV9400 2GB 160GB HDMI GL čierny', 'SKION_PC_002B', 'Prestigo', 239, 5, 'AtomTM Processor 230 1.6GHz', 'Integrovaná grafika NVIDIA9400 (s plnou podporou DirectX 10 a prehráváním Full HD videa)', '160GB SATA, 2,5" ', 'SODIMM DDR2 2GB Ostatné: LAN Realtek', '', '2015-02-23 09:19:14', '2015-02-23 09:19:14'),
(113, 'Lenovo ThinkCentre Edge 93 SFF 10AQ0-03N', 'LTCE_PC_001B', 'Lenovo', 399, 3, 'Intel Core i3 4130 Haswell', 'Intel HD graphics 4400', 'HDD 500GB 7200 otáčok', '4GB DDR3', '', '2015-02-23 09:19:14', '2015-02-23 09:19:14'),
(114, 'Alza GameBox GTX750 W8.1', 'AGB_PC_001', 'Alza', 600.17, 6, 'Intel Core i3-4160 Haswell Refresh 3.6Ghz', 'Nvidia GeForce GTX750 2GB', 'HDD 1000GB', '4GB DDR3', '', '2015-02-23 09:19:14', '2015-02-23 09:19:14'),
(115, 'Alza Little Monster Anniversary', 'ALM_PC_001', 'Alza', 1200.69, 5, 'Intel Core i5 4690K Haswell Refresh OC 4.2GHz', 'NVIDIA GeForce GTX760 2GB', 'SSD 120GB, HDD 2000GB', '16GB DDR3', '', '2015-02-23 09:19:14', '2015-02-23 09:19:14'),
(116, 'Lenovo IdeaCentre Q190', 'LIC_PC_003', 'Lenovo', 211.91, 7, 'Intel Celeron 1017 Ivy Bridge', 'Intel HD Graphics', 'HDD 500GB 5400 otáčok', '4GB DDR3', '', '2015-02-23 09:19:14', '2015-02-23 09:19:14'),
(117, 'HP Pavilion 500-306nc', 'HPP_PC_056', 'HP', 812.11, 6, 'Intel Core i7 4790S Haswell', 'NVIDIA GeForce GTX 745 4 GB GDDR3', 'HDD 3 TB 7200 otáčok + 16 GB cache na zrýchlenie behu OS', '8 GB DDR3', '', '2015-02-23 09:19:14', '2015-02-23 09:19:14'),
(118, 'ASUS X555LA-XX061H', 'ASUS_NB_123', 'ASUS', 395, 10, 'Intel Core i3 4010U Haswell', 'Intel HD Graphics 4400', 'HDD 500GB', '4GB', '', '2015-02-23 09:19:14', '2015-02-23 09:19:14'),
(119, 'Fujitsu Lifebook A512', 'FLB_NB_043', 'Fujitsu', 271.61, 8, 'Intel Pentium 2020M Ivy Bridge', 'Intel HD Graphics', 'HDD 500GB 5400 otáček', '4GB DDR3', '', '2015-02-23 09:19:14', '2015-02-23 09:19:14');

--
-- Triggers `pocitace`
--
DROP TRIGGER IF EXISTS `pocitace_ADEL`;
DELIMITER //
CREATE TRIGGER `pocitace_ADEL` AFTER DELETE ON `pocitace`
 FOR EACH ROW BEGIN
INSERT into pocitace_histo (`id`,`nazov`,`kod`,`vyrobca`,`cena`,`sklad`,`procesor`,`grafika`,`pevny_disk`,`pamat`,`ostatne`,`date_inserted`,`date_modified`) VALUES (OLD.`id`,OLD.`nazov`,OLD.`kod`,OLD.`vyrobca`,OLD.`cena`,OLD.`sklad`,OLD.`procesor`,OLD.`grafika`,OLD.`pevny_disk`,OLD.`pamat`,OLD.`ostatne`,OLD.`date_inserted`,NOW());
END
//
DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
