-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 03. lis 2020, 17:15
-- Verze serveru: 10.4.14-MariaDB
-- Verze PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `nastenka`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `info`
--

CREATE TABLE `info` (
  `datum_zad` date NOT NULL,
  `text_zad` varchar(200) NOT NULL,
  `datum_ode` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `info`
--

INSERT INTO `info` (`datum_zad`, `text_zad`, `datum_ode`, `id`) VALUES
('0000-00-00', '', '0000-00-00', 1),
('0000-00-00', '', '0000-00-00', 2),
('0000-00-00', '', '0000-00-00', 3),
('0000-00-00', '', '0000-00-00', 4),
('2020-11-08', 'tady nice', '0000-00-00', 5),
('2020-11-08', 'tady nice', '2020-11-29', 6),
('2020-12-05', 'vvxcvcx', '2020-11-07', 7);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
