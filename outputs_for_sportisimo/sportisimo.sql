-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1:3306
-- Vytvořeno: Úte 25. říj 2022, 11:52
-- Verze serveru: 5.7.36
-- Verze PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `sportisimo`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(57, 'Calvin Klein'),
(58, 'Tommy Hilfiger'),
(59, 'Levis'),
(60, 'Valentino'),
(61, 'Prada'),
(52, 'Adidas'),
(53, 'Puma'),
(54, 'Nike'),
(55, 'Reebook'),
(56, 'Guess'),
(62, 'Gucci'),
(63, 'Lacoste'),
(64, 'Bandi'),
(65, 'Balenciaga'),
(66, 'H&M'),
(67, 'Bershka'),
(68, 'Zara'),
(69, 'Mustang'),
(70, 'Gant'),
(71, 'Diesel'),
(72, 'Dolce&Gabana'),
(73, 'Chanel'),
(74, 'Pepe Jeans');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
