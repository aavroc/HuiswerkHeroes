-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 28 jan 2020 om 17:15
-- Serverversie: 10.1.37-MariaDB
-- PHP-versie: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `huiswerkheroes`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `les`
--

CREATE TABLE `les` (
  `les_naam` varchar(100) NOT NULL,
  `user1` varchar(150) NOT NULL,
  `user2` varchar(150) NOT NULL,
  `vak` varchar(50) NOT NULL,
  `niveau` varchar(10) NOT NULL,
  `leslocatie` varchar(50) NOT NULL,
  `datum` date NOT NULL,
  `tijd` time NOT NULL,
  `tijdsduur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leslocatie`
--

CREATE TABLE `leslocatie` (
  `naamLocatie` varchar(50) NOT NULL,
  `adres` varchar(65) NOT NULL,
  `plaats` varchar(50) NOT NULL,
  `tijd_open` time NOT NULL,
  `tijd_sluiten` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `niveaus`
--

CREATE TABLE `niveaus` (
  `niveau_id` int(11) NOT NULL,
  `niveau` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(150) NOT NULL,
  `achternaam` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `userprofile`
--

CREATE TABLE `userprofile` (
  `id` int(3) NOT NULL,
  `voorkeur` varchar(100) NOT NULL,
  `rol` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vakken`
--

CREATE TABLE `vakken` (
  `vak_id` int(3) NOT NULL,
  `vak` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `niveaus`
--
ALTER TABLE `niveaus`
  ADD PRIMARY KEY (`niveau_id`);

--
-- Indexen voor tabel `vakken`
--
ALTER TABLE `vakken`
  ADD PRIMARY KEY (`vak_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
