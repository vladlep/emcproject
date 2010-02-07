-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2010 at 05:23 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imobiliare`
--

-- --------------------------------------------------------

--
-- Table structure for table `anunt`
--

CREATE TABLE IF NOT EXISTS `anunt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proprietar` int(11) NOT NULL,
  `tip_oferta` varchar(20) NOT NULL,
  `tip_imobil` varchar(30) NOT NULL,
  `pret` int(11) NOT NULL,
  `confort` int(11) NOT NULL,
  `zona` varchar(50) NOT NULL,
  `suprafata` int(11) NOT NULL,
  `etaj` int(11) NOT NULL,
  `poza` varchar(255) DEFAULT NULL,
  `nr_camere` int(11) NOT NULL,
  `nr_bai` int(11) NOT NULL,
  `data_anunt` date NOT NULL,
  `Detalii` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `anunt`
--

INSERT INTO `anunt` (`id`, `id_proprietar`, `tip_oferta`, `tip_imobil`, `pret`, `confort`, `zona`, `suprafata`, `etaj`, `poza`, `nr_camere`, `nr_bai`, `data_anunt`, `Detalii`) VALUES
(1, 1, 'Vanzare', 'Casa', 120000, 3, 'balcescu', 233, 0, 'pic1265511228.jpg', 5, 2, '2010-02-07', ''),
(2, 2, 'Vanzare', 'Casa', 1200000, 3, 'soarelui', 322, 0, 'pic1265511596.gif', 6, 3, '2010-02-07', 'Casa in stil barbar rusesc, furata de la popor moldovean, de catre mine'),
(3, 3, 'Vanzare', 'Casa', 1200000, 3, 'soarelui', 322, 0, 'pic1265511712.gif', 6, 3, '2010-02-07', 'Casa in stil barbar rusesc, furata de la popor moldovean, de catre mine'),
(4, 4, 'Vanzare', 'Casa', 233, 2, 'Calea sagului', 200, 0, 'pic1265511828.jpg', 6, 2, '2010-02-07', ''),
(5, 5, 'Vanzare', 'Casa', 233, 2, 'soarelui', 22, 0, 'pic1265511943.gif', 3, 1, '2010-02-07', ''),
(6, 6, 'Vanzare', 'Casa', 322000, 3, 'Freidorf', 544, 0, 'pic1265512126.jpg', 10, 3, '2010-02-07', ''),
(7, 7, 'Vanzare', 'Apartament', 1222333, 3, 'rusia', 322, 2, 'pic1265512182.jpg', 3, 1, '2010-02-07', ''),
(8, 8, 'Vanzare', 'Apartament', 324455, 3, 'dambovita', 222, 2, 'pic1265512223.jpg', 2, 2, '2010-02-07', '');

-- --------------------------------------------------------

--
-- Table structure for table `proprietar`
--

CREATE TABLE IF NOT EXISTS `proprietar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(255) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `proprietar`
--

INSERT INTO `proprietar` (`id`, `nume`, `telefon`, `email`) VALUES
(1, 'dima', '0213456674', 'dima@yahoo.com'),
(5, 'mircea badea', '0213456677', 'mircea.badea@tahoo.com'),
(4, 'marius antonescu', '0213456674', 'marius.ionescu@yahoo.com'),
(6, 'liana lupsa', '0724320223', 'liana_delia_l@yahoo.com'),
(7, 'vladimir putin', '098776655', 'doijf@kk.com'),
(8, 'gigi becali', '3222445', 'antonia@hotmail.usa');
