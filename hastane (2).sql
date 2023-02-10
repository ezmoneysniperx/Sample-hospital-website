-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2021 at 10:01 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hastane`
--
CREATE DATABASE IF NOT EXISTS `hastane` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `hastane`;

-- --------------------------------------------------------

--
-- Table structure for table `randevu`
--

DROP TABLE IF EXISTS `randevu`;
CREATE TABLE IF NOT EXISTS `randevu` (
  `adsoyad` text COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` text COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `dogumtarih` date NOT NULL,
  `tckn` bigint(255) NOT NULL,
  `tel` bigint(255) NOT NULL,
  `poliklinik` text COLLATE utf8_turkish_ci NOT NULL,
  `randevutarih` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `randevu`
--

INSERT INTO `randevu` (`adsoyad`, `cinsiyet`, `eposta`, `dogumtarih`, `tckn`, `tel`, `poliklinik`, `randevutarih`) VALUES
('John Doe', 'Erkek', 'john@email.com', '1997-01-03', 99430823475, 5553432132, 'DİYETİSYEN', '2021-06-17'),
('John Doe', 'Erkek', '	\r\njohn@email.com', '1997-01-03', 99430823475, 5553432132, 'Goz', '2021-06-18'),
('John Doe', 'Erkek', 'john@email.com', '1997-01-03', 99430823475, 5553432132, 'THT', '2021-06-19'),
('John Doe', 'Erkek', 'john@email.com', '1997-01-03', 99560812266, 5553432133, 'NEFROLOJÄ°', '2021-06-25'),
('Mason Greenwood', 'Erkek', 'mg@email.com', '1998-12-30', 99560127364, 5553234322, 'EMG', '2021-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE IF NOT EXISTS `userinfo` (
  `adsoyad` text COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(130) CHARACTER SET utf8 NOT NULL,
  `cinsiyet` text CHARACTER SET utf8 NOT NULL,
  `tel` bigint(255) NOT NULL,
  `dogumtarih` date DEFAULT NULL,
  PRIMARY KEY (`eposta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`adsoyad`, `eposta`, `sifre`, `cinsiyet`, `tel`, `dogumtarih`) VALUES
('John Doe', 'john@email.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Erkek', 5553432133, '1997-01-03'),
('Blake Griffin', 'bg@email.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Erkek', 5433843275, NULL),
('Evan Fournier', 'ef@email.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Erkek', 5457738454, NULL),
('Addison Rae', 'ar@email.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'KadÄ±n', 5452231232, NULL),
('Mason Greenwood', 'mg@email.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Erkek', 5553234322, '1998-12-30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
