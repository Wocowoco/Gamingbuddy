-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 apr 2019 om 17:48
-- Serverversie: 10.1.38-MariaDB
-- PHP-versie: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamingbuddy`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gb_account`
--

CREATE TABLE `gb_account` (
  `ID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gb_account`
--

INSERT INTO `gb_account` (`ID`, `Username`, `Password`, `Name`, `LastName`) VALUES
(1, 'woco', '$2y$10$xrcTnJJT7SOacsqUU1PIFu0hdYCqKcZyJCSjqycROIsar2frsoX8O', 'Wouter', 'Cornelis'),
(2, 'matth', '$2y$10$xrcTnJJT7SOacsqUU1PIFu0hdYCqKcZyJCSjqycROIsar2frsoX8O', 'Matthias', 'Hernalsteen'),
(3, 'petsel', '$2y$10$rGgHDmPKucSLM95rtek3iuaiQnkj28ht5ag483ISVCyz6HXp36EjK', 'Peter', 'Selie'),
(4, 'lolplayer', '$2y$10$QgWykm.4YZKkcXVfUDPfveEKJSfWvDI.XZbbHrreLWXGadTI65Rvu', 'League', 'Player'),
(21, 'kookpot', '$2y$10$s7hEXDT7pTlObpmA1U27jehp/fc9u1b1Uz06.WtcYIsLVE9LyLikO', 'Pot', 'Kook'),
(22, 'wachtwoordtest', '$2y$10$57faHUbF8diYfBQoMe9Nf.xFUBh5YXW.u.blqSsC2aEV6gWuYEvAi', 'lol', 'lol'),
(24, 'qwerty', '$2y$10$1NjXo6rykiEytmoRRuBAVuSSE0nu6HUSs1q0GoMeuNEnSNnVXwrO2', 'qwerty', 'okokokok'),
(38, 'aanmaaktest', '$2y$10$6IXO71gphNo1QvY1X1llFeK2I.zAt9h8qImYr1bvdwp.H1ULNyj9K', 'Test', '123'),
(39, 'een', '$2y$10$LZkai/4e9dRjv7BRBnxjsujAGivz7j.jVYZMrXJ/EEOZJPalCV1Vq', 'Dit', 'is'),
(40, 'test60', '$2y$10$gg8mOHKwxGQg4MPRG7zOxuunhq38EdcZNMM/hHyNUrkhVCxiZCRLi', 'dit', 'is'),
(41, 'tabeltest', '$2y$10$kiiwFlYSSjTlnZJtdBaCWuESCWnYeoHDBt.gS.OvCAB69FFK0MFA2', 'tabeltest', 'tabeltest'),
(42, 'uiop789', '$2y$10$Ej9wjT5AudziMB36R4Q4juU3YGmaamG7H5m/AY84qqrz2ifmRNSqK', 'xdfhcgjkl', 'cnvb,km'),
(43, 'jury', '$2y$10$Ir.Ymd0Cc7OgM1WZ.AMUueSmwka02oX84/IARZc5eqms37ndhFE7O', 'test1', 'test2'),
(44, '789456123', '$2y$10$7ekg6c5f7xaFgBRcLxDWtOdCtpN7DsBzmg1YOB/7fjP4lV1W/PmiS', 'fsdhjkl;', 'jkl;'),
(45, '1234', '$2y$10$CGzk16mhCvJ07vSH4swLBeVyG1p.5Kx1uYTcGQ.YybExkXgT3BN5K', 'lol', 'lol'),
(46, 'mar', '$2y$10$Ts/xnaMRowB3TZFBbFw3Dej9.qLiywmCqXhZFWChF77DwIlQTR4qS', 'hbhj', 'uhuh'),
(47, 'deletetest', '$2y$10$DnzGPklmTYkEHRtXnpOIcuYPlJNoTnq8NQsT.uDTy5kCi0eOGY2UK', 'opoi', ';opiouyhfg'),
(48, '17april2019', '$2y$10$9gl9nxCyWY7v0AN2c6p94Om/rUp/F6vS08XznNze2ucwUWDpcg.Ai', '17', 'april'),
(49, '21april2019', '$2y$10$DKZM1ZKA34zjl3Y5n/MLgOXGszNx7wRdOtiCKuQ3i.uQazYD8w.0q', 'fdhcgkjl', 'fhgkjl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gb_loldata`
--

CREATE TABLE `gb_loldata` (
  `LoLID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `SummonerName` varchar(40) NOT NULL,
  `RankID` int(11) NOT NULL,
  `PrefRole1` int(11) NOT NULL,
  `PrefRole2` int(11) NOT NULL,
  `Zone` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gb_loldata`
--

INSERT INTO `gb_loldata` (`LoLID`, `AccountID`, `SummonerName`, `RankID`, `PrefRole1`, `PrefRole2`, `Zone`) VALUES
(1, 1, 'Woco', 9, 3, 5, 'EUW'),
(2, 2, 'SummonerMatthias', 11, 4, 5, 'EUW'),
(3, 4, 'EenNaam', 22, 2, 6, 'NA'),
(4, 3, 'test', 27, 5, 2, 'NA'),
(57, 2, 'aanmaaktest2', 27, 1, 2, 'LAN'),
(58, 38, 'Aanmaaktest', 27, 1, 6, 'EUW'),
(63, 1, 'BRWocoTest', 14, 1, 5, 'BR'),
(64, 1, 'WocoLan', 7, 3, 1, 'LAN'),
(65, 41, 'NATabtest', 26, 5, 6, 'NA'),
(66, 1, 'WocoJap', 18, 2, 6, 'JP'),
(67, 42, 'naamKR', 8, 5, 2, 'KR'),
(68, 43, 'testnaam', 1, 3, 4, 'EUW'),
(69, 1, 'WocEUNE', 23, 5, 2, 'EUNE'),
(71, 1, 'qwertyuio', 6, 2, 3, 'EUNE'),
(72, 1, 'testform', 25, 4, 2, 'EUW'),
(73, 1, 'WocoOCE', 24, 3, 6, 'OCE'),
(74, 46, 'jnjn', 14, 4, 2, 'KR'),
(75, 46, 'lala', 19, 2, 4, 'JP');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gb_lolrank`
--

CREATE TABLE `gb_lolrank` (
  `rankID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gb_lolrank`
--

INSERT INTO `gb_lolrank` (`rankID`, `Name`) VALUES
(1, 'Iron IV'),
(2, 'Iron III'),
(3, 'Iron II'),
(4, 'Iron I'),
(5, 'Bronze IV'),
(6, 'Bronze III'),
(7, 'Bronze II'),
(8, 'Bronze I'),
(9, 'Silver IV'),
(10, 'Silver III'),
(11, 'Silver II'),
(12, 'Silver I'),
(13, 'Gold IV'),
(14, 'Gold III'),
(15, 'Gold II'),
(16, 'Gold I'),
(17, 'Platinum IV'),
(18, 'Platinum III'),
(19, 'Platinum II'),
(20, 'Platinum I'),
(21, 'Diamond IV'),
(22, 'Diamond III'),
(23, 'Diamond II'),
(24, 'Diamond I'),
(25, 'Master'),
(26, 'Grand Master'),
(27, 'Challenger');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gb_lolrole`
--

CREATE TABLE `gb_lolrole` (
  `roleID` int(11) NOT NULL,
  `Name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gb_lolrole`
--

INSERT INTO `gb_lolrole` (`roleID`, `Name`) VALUES
(1, 'Top'),
(2, 'Jungler'),
(3, 'Mid'),
(4, 'Bot'),
(5, 'Support'),
(6, 'Fill');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gb_lolzone`
--

CREATE TABLE `gb_lolzone` (
  `zoneID` varchar(4) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gb_lolzone`
--

INSERT INTO `gb_lolzone` (`zoneID`, `Name`) VALUES
('BR', 'Brazil'),
('CN', 'People\'s Republic of China'),
('EUNE', 'Europe Nordic & East'),
('EUW', 'Europe West'),
('JP', 'Japan'),
('KR', 'Republic of Korea'),
('LAN', 'Latin America North'),
('LAS', 'Latin America South'),
('NA', 'North America'),
('OCE', 'Oceania'),
('RU', 'Russia'),
('SEA', 'South East Asia'),
('TR', 'Turkey');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gb_account`
--
ALTER TABLE `gb_account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `gb_loldata`
--
ALTER TABLE `gb_loldata`
  ADD PRIMARY KEY (`LoLID`),
  ADD KEY `Zone` (`Zone`),
  ADD KEY `PrefRole1` (`PrefRole1`),
  ADD KEY `PrefRole2` (`PrefRole2`),
  ADD KEY `RankID` (`RankID`),
  ADD KEY `gb_loldata_ibfk_7` (`AccountID`);

--
-- Indexen voor tabel `gb_lolrank`
--
ALTER TABLE `gb_lolrank`
  ADD PRIMARY KEY (`rankID`);

--
-- Indexen voor tabel `gb_lolrole`
--
ALTER TABLE `gb_lolrole`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexen voor tabel `gb_lolzone`
--
ALTER TABLE `gb_lolzone`
  ADD PRIMARY KEY (`zoneID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gb_account`
--
ALTER TABLE `gb_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT voor een tabel `gb_loldata`
--
ALTER TABLE `gb_loldata`
  MODIFY `LoLID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT voor een tabel `gb_lolrank`
--
ALTER TABLE `gb_lolrank`
  MODIFY `rankID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT voor een tabel `gb_lolrole`
--
ALTER TABLE `gb_lolrole`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `gb_loldata`
--
ALTER TABLE `gb_loldata`
  ADD CONSTRAINT `gb_loldata_ibfk_1` FOREIGN KEY (`Zone`) REFERENCES `gb_lolzone` (`zoneID`),
  ADD CONSTRAINT `gb_loldata_ibfk_2` FOREIGN KEY (`PrefRole1`) REFERENCES `gb_lolrole` (`roleID`),
  ADD CONSTRAINT `gb_loldata_ibfk_3` FOREIGN KEY (`PrefRole2`) REFERENCES `gb_lolrole` (`roleID`),
  ADD CONSTRAINT `gb_loldata_ibfk_4` FOREIGN KEY (`RankID`) REFERENCES `gb_lolrank` (`rankID`),
  ADD CONSTRAINT `gb_loldata_ibfk_7` FOREIGN KEY (`AccountID`) REFERENCES `gb_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
