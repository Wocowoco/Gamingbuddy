-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 mei 2019 om 09:36
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
  `LastName` varchar(30) NOT NULL,
  `Bio` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gb_account`
--

INSERT INTO `gb_account` (`ID`, `Username`, `Password`, `Name`, `LastName`, `Bio`) VALUES
(1, 'Woco', '$2y$10$xrcTnJJT7SOacsqUU1PIFu0hdYCqKcZyJCSjqycROIsar2frsoX8O', 'Wouter', 'Cornelis', 'Dit is Wouter\'s test bio.\r\nMet een tweede regel.\r\n\r\nHierboven zou een lege regel moeten staan, aangezien dit regel 4 is.'),
(2, 'matth', '$2y$10$xrcTnJJT7SOacsqUU1PIFu0hdYCqKcZyJCSjqycROIsar2frsoX8O', 'Matthias', 'Hernalsteen', NULL),
(3, 'petsel', '$2y$10$rGgHDmPKucSLM95rtek3iuaiQnkj28ht5ag483ISVCyz6HXp36EjK', 'Peter', 'Selie', NULL),
(4, 'lolplayer', '$2y$10$QgWykm.4YZKkcXVfUDPfveEKJSfWvDI.XZbbHrreLWXGadTI65Rvu', 'League', 'Player', NULL),
(21, 'kookpot', '$2y$10$s7hEXDT7pTlObpmA1U27jehp/fc9u1b1Uz06.WtcYIsLVE9LyLikO', 'Pot', 'Kook', NULL),
(22, 'wachtwoordtest', '$2y$10$57faHUbF8diYfBQoMe9Nf.xFUBh5YXW.u.blqSsC2aEV6gWuYEvAi', 'lol', 'lol', NULL),
(24, 'qwerty', '$2y$10$1NjXo6rykiEytmoRRuBAVuSSE0nu6HUSs1q0GoMeuNEnSNnVXwrO2', 'qwerty', 'okokokok', NULL),
(38, 'aanmaaktest', '$2y$10$6IXO71gphNo1QvY1X1llFeK2I.zAt9h8qImYr1bvdwp.H1ULNyj9K', 'Test', '123', NULL),
(39, 'een', '$2y$10$LZkai/4e9dRjv7BRBnxjsujAGivz7j.jVYZMrXJ/EEOZJPalCV1Vq', 'Dit', 'is', NULL),
(40, 'test60', '$2y$10$gg8mOHKwxGQg4MPRG7zOxuunhq38EdcZNMM/hHyNUrkhVCxiZCRLi', 'dit', 'is', NULL),
(41, 'tabeltest', '$2y$10$kiiwFlYSSjTlnZJtdBaCWuESCWnYeoHDBt.gS.OvCAB69FFK0MFA2', 'tabeltest', 'tabeltest', NULL),
(42, 'uiop789', '$2y$10$Ej9wjT5AudziMB36R4Q4juU3YGmaamG7H5m/AY84qqrz2ifmRNSqK', 'xdfhcgjkl', 'cnvb,km', NULL),
(43, 'jury', '$2y$10$Ir.Ymd0Cc7OgM1WZ.AMUueSmwka02oX84/IARZc5eqms37ndhFE7O', 'test1', 'test2', NULL),
(44, '789456123', '$2y$10$7ekg6c5f7xaFgBRcLxDWtOdCtpN7DsBzmg1YOB/7fjP4lV1W/PmiS', 'fsdhjkl;', 'jkl;', NULL),
(45, '1234', '$2y$10$CGzk16mhCvJ07vSH4swLBeVyG1p.5Kx1uYTcGQ.YybExkXgT3BN5K', 'lol', 'lol', NULL),
(46, 'mar', '$2y$10$Ts/xnaMRowB3TZFBbFw3Dej9.qLiywmCqXhZFWChF77DwIlQTR4qS', 'hbhj', 'uhuh', NULL),
(48, '17april2019', '$2y$10$9gl9nxCyWY7v0AN2c6p94Om/rUp/F6vS08XznNze2ucwUWDpcg.Ai', '17', 'april', NULL),
(49, '21april', '$2y$10$DKZM1ZKA34zjl3Y5n/MLgOXGszNx7wRdOtiCKuQ3i.uQazYD8w.0q', '21', 'april', NULL),
(56, '22april', '$2y$10$9wFXk30u.db2ZocGvHGoiuZSzTD7nLruDNzoI4AHexH.ghEOKLxcy', 'april', '22', NULL),
(64, 'test', '$2y$10$zx3NfhpT8aNv2HWYQnUjsuefO7KC1/LTJOMru9RWtCtRct6gEkTB.', 'qwerty', 'qwerty', NULL),
(73, '22april2019', '$2y$10$Pq1/Vj7JSXlHnQ6.VSpWiuJs8fzHoFzu3pwy3xrRASyauk8SpNDOq', '22', 'april', NULL),
(75, '23april', '$2y$10$mYMGJ/AgNty64f0KnbmcyeTLYoqmCU.5w2dekK8gb9MkW5gvdK5hW', '23', 'april', NULL),
(76, '24april', '$2y$10$Cqib3R8ys6Xu5b3b9qfW3eQnZ87lmicrahA2r.hx/oSKIleWBEZIG', '24', 'april', NULL),
(77, '26april', '$2y$10$EEZmPyP7dYeX5PLBvTDdk.X.re/VWHXtwZcJBvrzJwFECHit3kSn.', '26', 'april', NULL),
(78, '29april', '$2y$10$hQISVnFFkDWRYsJkHEkfle0qk6L2RLwzkdZgS3s2I7iSnf2mJ2yta', '29', 'april', NULL),
(79, '3mei', '$2y$10$0HbOruIMekU.G7Y4GWMeFeAwRjCqCv/zACZRiz6g9asQEVRu7j5dK', '3', 'mei', NULL),
(80, '5mei', '$2y$10$FR1VWzyXU6vGh5wVa6Mo4.fGocoYFHyxXJv0lW//AsaoW5.bTuS2a', '5', 'mei', 'Testbio'),
(81, '9mei', '$2y$10$Us8ltwtPB.Fj7iGskFHQWO9Wgnxga/C7vdZ8Oy4uOJbwEPPM4Sw5a', '9', 'mei', 'Dit is een test.\r\nDit is een tweede test.'),
(82, '11mei', '$2y$10$rCC2YWCQAuwVe1ntbVW2h.a0EPBC0QjOXRE9tHreQZkzQwuBrx6/.', '11', 'mei', 'Het profiel aangemaakt op 11 Mei.\r\nHeeft zowel LoL als Apex account met beschrijving.'),
(84, 'test2', '$2y$10$c2m5TRWv//cGoCqga6u9huXeuiLt7l0Dw1lo0KRjXMtgHtZM4R7iy', 'test2', 'test2', NULL),
(85, 'Reviewer', '$2y$10$fBGEhu2RYNLdWXyIFGHjSuHVmc.M/Pb6vEbPErHI1AgnoVzDVFAYi', 'top', 'reviews', NULL),
(86, '20mei', '$2y$10$apY0H4s1oFwJ2CYDgY6qWuBWITzvdTh6b6aF12HQ1A.ACDs2pxJcm', '20', 'mei', 'test'),
(87, '21mei', '$2y$10$mq8s2HyKldK3PsQQUL4oqOlzNHPtvz1taTj68sFIZ5N0MVuBQr05e', 'qwerty', 'qwerty', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gb_apexdata`
--

CREATE TABLE `gb_apexdata` (
  `ApexID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `OriginName` varchar(30) NOT NULL,
  `PrefRole1` int(11) NOT NULL,
  `PrefRole2` int(11) NOT NULL,
  `Bio` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gb_apexdata`
--

INSERT INTO `gb_apexdata` (`ApexID`, `AccountID`, `OriginName`, `PrefRole1`, `PrefRole2`, `Bio`) VALUES
(1, 1, 'WocoOrigin', 6, 5, NULL),
(2, 45, '123Origin', 6, 5, NULL),
(7, 1, 'Apex18April', 9, 8, NULL),
(9, 56, '22april', 4, 1, NULL),
(10, 73, 'bloodbang', 2, 1, NULL),
(11, 75, '23aprilApex', 6, 3, NULL),
(12, 78, '29aprildbtest', 9, 6, NULL),
(14, 79, '3MeiApex', 5, 8, NULL),
(16, 79, '3ApexMei2', 2, 3, NULL),
(17, 80, '5MeiApexDel', 5, 2, 'Test'),
(18, 81, '9mei', 1, 2, 'Test5\r\nEn een 2de testlijn!!'),
(19, 81, '9meibio', 2, 1, 'Apex Legends bio test.\r\nIn 2 regels.'),
(20, 82, '11mei', 4, 5, '11Mei Apex beschrijving.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gb_apexrole`
--

CREATE TABLE `gb_apexrole` (
  `roleID` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gb_apexrole`
--

INSERT INTO `gb_apexrole` (`roleID`, `Name`) VALUES
(1, 'Bangalore'),
(2, 'Bloodhound'),
(3, 'Caustic'),
(4, 'Gibraltar'),
(5, 'Lifeline'),
(6, 'Mirage'),
(7, 'Octane'),
(8, 'Pathfinder'),
(9, 'Wraith');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gb_loldata`
--

CREATE TABLE `gb_loldata` (
  `LoLID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `SummonerName` varchar(40) NOT NULL,
  `RankID` int(11) NOT NULL,
  `Level` int(11) NOT NULL DEFAULT '1',
  `PrefRole1` int(11) NOT NULL,
  `PrefRole2` int(11) NOT NULL,
  `Zone` varchar(4) NOT NULL,
  `Bio` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gb_loldata`
--

INSERT INTO `gb_loldata` (`LoLID`, `AccountID`, `SummonerName`, `RankID`, `Level`, `PrefRole1`, `PrefRole2`, `Zone`, `Bio`) VALUES
(1, 1, 'Woco', 0, 1, 3, 5, 'EUW', 'Main League Account'),
(2, 2, 'SummonerMatthias', 11, 1, 4, 5, 'EUW', NULL),
(3, 4, 'EenNaam', 22, 1, 2, 6, 'NA', NULL),
(4, 3, 'test', 27, 1, 5, 2, 'NA', NULL),
(57, 2, 'aanmaaktest2', 27, 1, 1, 2, 'LAN', NULL),
(58, 38, 'Aanmaaktest', 27, 1, 1, 6, 'EUW', NULL),
(63, 1, 'BRWocoTest', 14, 1, 1, 5, 'BR', NULL),
(64, 1, 'WocoLan', 7, 1, 3, 1, 'LAN', NULL),
(65, 41, 'NATabtest', 26, 1, 5, 6, 'NA', NULL),
(66, 1, 'WocoJap', 18, 1, 2, 6, 'JP', NULL),
(67, 42, 'naamKR', 8, 1, 5, 2, 'KR', NULL),
(68, 43, 'testnaam', 1, 1, 3, 4, 'EUW', NULL),
(69, 1, 'WocEUNE', 23, 1, 5, 2, 'EUNE', NULL),
(71, 1, 'qwertyuio', 6, 1, 2, 3, 'EUNE', NULL),
(72, 1, 'testform', 25, 1, 4, 2, 'EUW', NULL),
(73, 1, 'WocoOCE', 24, 1, 3, 6, 'OCE', NULL),
(74, 46, 'jnjn', 14, 1, 4, 2, 'KR', NULL),
(75, 46, 'lala', 19, 1, 2, 4, 'JP', NULL),
(77, 56, '22april', 22, 1, 2, 6, 'LAS', NULL),
(78, 73, 'silversea3', 10, 1, 4, 2, 'SEA', NULL),
(79, 80, '5MeiLolDel', 13, 1, 1, 5, 'SEA', NULL),
(81, 80, '5Mei6MeiDelTest', 19, 1, 2, 1, 'EUNE', NULL),
(82, 81, '9meiLolbio', 1, 1, 5, 6, 'EUNE', 'Test11'),
(83, 81, '9meibio', 6, 1, 1, 2, 'CN', 'Test1\r\nTest2\r\nTest3'),
(84, 82, '11mei', 15, 1, 3, 4, 'EUW', 'Testbeschrijving voor 11 Mei.\r\nDit is regel1.\r\n\r\nEn dit is regel 4 (geen regel 3).'),
(85, 84, 'Dragoonix', 10, 1, 3, 5, 'EUW', 'Kan elke rol spelen'),
(86, 85, 'Test9000', 27, 1, 6, 4, 'EUW', 'dszgfh;uli\'[\r\ni;ulyksz'),
(88, 86, 'zDSGfhjku;iolhjgfdx', 0, 1, 4, 2, 'EUW', '21312.'),
(89, 87, 'dragoonix', 0, 1, 2, 4, 'EUW', '21Mei test');

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
(0, 'Kon rank niet vinden.'),
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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gb_review`
--

CREATE TABLE `gb_review` (
  `fromAccountID` int(11) NOT NULL,
  `toAccountID` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gb_review`
--

INSERT INTO `gb_review` (`fromAccountID`, `toAccountID`, `type`, `text`) VALUES
(1, 82, 0, 'Test'),
(2, 1, 0, 'Test slechte review'),
(64, 1, 1, 'Test goede review'),
(77, 1, 1, 'Test positieve review\r\n'),
(80, 1, 1, 'Testreview'),
(82, 1, 1, 'Dit is een testreview voor het verwijderen van reviews'),
(82, 80, 0, 'Negatief review test'),
(85, 1, 1, 'Zeer leuk om met samen te spelen. Zeer sportief!');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gb_reviewtype`
--

CREATE TABLE `gb_reviewtype` (
  `typeID` int(11) NOT NULL,
  `typeText` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gb_reviewtype`
--

INSERT INTO `gb_reviewtype` (`typeID`, `typeText`) VALUES
(0, 'Negative'),
(1, 'Postive');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gb_account`
--
ALTER TABLE `gb_account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `gb_apexdata`
--
ALTER TABLE `gb_apexdata`
  ADD PRIMARY KEY (`ApexID`),
  ADD KEY `AccountID` (`AccountID`),
  ADD KEY `PrefRole1` (`PrefRole1`),
  ADD KEY `PrefRole2` (`PrefRole2`);

--
-- Indexen voor tabel `gb_apexrole`
--
ALTER TABLE `gb_apexrole`
  ADD PRIMARY KEY (`roleID`);

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
-- Indexen voor tabel `gb_review`
--
ALTER TABLE `gb_review`
  ADD PRIMARY KEY (`fromAccountID`,`toAccountID`),
  ADD KEY `toAccountID` (`toAccountID`),
  ADD KEY `type` (`type`);

--
-- Indexen voor tabel `gb_reviewtype`
--
ALTER TABLE `gb_reviewtype`
  ADD PRIMARY KEY (`typeID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gb_account`
--
ALTER TABLE `gb_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT voor een tabel `gb_apexdata`
--
ALTER TABLE `gb_apexdata`
  MODIFY `ApexID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `gb_apexrole`
--
ALTER TABLE `gb_apexrole`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `gb_loldata`
--
ALTER TABLE `gb_loldata`
  MODIFY `LoLID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

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
-- Beperkingen voor tabel `gb_apexdata`
--
ALTER TABLE `gb_apexdata`
  ADD CONSTRAINT `gb_apexdata_ibfk_1` FOREIGN KEY (`AccountID`) REFERENCES `gb_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gb_apexdata_ibfk_2` FOREIGN KEY (`PrefRole1`) REFERENCES `gb_apexrole` (`roleID`),
  ADD CONSTRAINT `gb_apexdata_ibfk_3` FOREIGN KEY (`PrefRole2`) REFERENCES `gb_apexrole` (`roleID`);

--
-- Beperkingen voor tabel `gb_loldata`
--
ALTER TABLE `gb_loldata`
  ADD CONSTRAINT `gb_loldata_ibfk_1` FOREIGN KEY (`Zone`) REFERENCES `gb_lolzone` (`zoneID`),
  ADD CONSTRAINT `gb_loldata_ibfk_2` FOREIGN KEY (`PrefRole1`) REFERENCES `gb_lolrole` (`roleID`),
  ADD CONSTRAINT `gb_loldata_ibfk_3` FOREIGN KEY (`PrefRole2`) REFERENCES `gb_lolrole` (`roleID`),
  ADD CONSTRAINT `gb_loldata_ibfk_4` FOREIGN KEY (`RankID`) REFERENCES `gb_lolrank` (`rankID`),
  ADD CONSTRAINT `gb_loldata_ibfk_7` FOREIGN KEY (`AccountID`) REFERENCES `gb_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `gb_review`
--
ALTER TABLE `gb_review`
  ADD CONSTRAINT `gb_review_ibfk_1` FOREIGN KEY (`fromAccountID`) REFERENCES `gb_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gb_review_ibfk_2` FOREIGN KEY (`toAccountID`) REFERENCES `gb_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gb_review_ibfk_3` FOREIGN KEY (`type`) REFERENCES `gb_reviewtype` (`typeID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
