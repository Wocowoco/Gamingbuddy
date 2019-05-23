-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 mei 2019 om 12:30
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
(1, 'Woco', '$2y$10$hHJ.bRLtmNtcuMNnn9UiueFdKrXUie24/SzT/MBlSZRY4mTYYpYbi', 'Wouter', 'Cornelis', 'Welkom op mijn profiel!\r\nLaatste tijd speel ik geen Apex Legends meer maar nog wel League of Legends, voeg me dus gerust toe.'),
(88, 'Mathh', '$2y$10$N/WF3GQF230Pmd54HPeJqee.qs3uhLASnpgRrPXizSWNbr5G8kB0.', 'Matthias', 'Hernalsteen', 'Ik speel games tijdens de weekends'),
(89, 'ZeroZero', '$2y$10$.SHV3bSy3Ax/bgfafy.loO4MH3jzGZp/pwNrpUOLxEe2JKNRocWnK', 'Bram', 'Vereecken', NULL),
(90, 'Azobeef', '$2y$10$WuJYvDvobhRd7PfZuyPxPe.OY5hp3NA8lYpmqWdJN.h/SSZZS8LPK', 'Azo', 'Beef', 'Happy times'),
(91, 'Madagasci', '$2y$10$l0A./EiWfWHstC2OIrgTp.J9x06LdVlQWp0IZWcTkiR48TW209ioC', 'Ben', 'De Cleyn', 'League of Legends only'),
(92, 'ColtzBe', '$2y$10$w0qY4j1Ay9TgOxfWL86B6.48gyZ2Jzi4y1FQFfAnKlwObLFfJdb5y', 'Jef', 'Vets', '-- Niet meer op GamingBuddy --'),
(93, 'Dizzy', '$2y$10$O255f6aofu2mDnoK4DsS9.k.GEM3FOsgQhe2poRaa2cCxxssTg8/e', 'Matthieu', 'Moortgat', NULL),
(94, 'shern', '$2y$10$9ACWHcwTSEFegl1o2sYmB.fwOQmZIRbxqIe8Fxhr8D1d/.5k4ddGa', 'shern', 'achternaam', NULL),
(95, 'maqenzie_02', '$2y$10$xuebl9Z6o4C64Hns3gUrjO.M2dA.17HKwEF2gsSnHaqeq69PJXRBm', 'troll', 'lolol', NULL),
(96, 'lolaccounts', '$2y$10$SVvTx4bURZF63kFnJpX8CuA0MZsNSekBCsXIvz4G955/6/oG1AKDm', 'lol', 'accounts', NULL),
(97, 'apexaccounts', '$2y$10$Y3L13OaZk.nHAGi3lG3NiuoY/X3oFIptKlGj/pzHV.UurWK8j.xsu', 'apex', 'accounts', 'Lijst van Apex accounts voor het testen van zoekfunctie');

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
(1, 1, 'Woco', 6, 5, 'Mirage main, lifeline on the side'),
(22, 89, 'McB.ZeroZero', 1, 5, 'Lifeliiiine <3'),
(23, 91, 'Moodoogoosci', 1, 7, 'Gotta go fast'),
(24, 92, 'ColtzBe', 2, 8, 'Who\'s ready to fly on a zipline'),
(25, 97, 'cnd_3th', 2, 1, ''),
(26, 97, 'Dakotaz', 2, 1, ''),
(27, 97, 'Bonescythe', 1, 7, ''),
(28, 97, 'Robcor', 7, 8, ''),
(29, 97, 'ThiccBoisOnly', 3, 4, ''),
(30, 97, 'WraithTllYerrDead', 9, 1, 'Wraith main, don\'t @ me'),
(31, 97, '_aywee901', 6, 1, '');

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
(1, 1, 'Woco', 0, 78, 3, 5, 'EUW', 'Als ik solo speel neem ik vaak mid, maar als ik premade kan spelen met een ADC speel ik liever Support.'),
(91, 88, 'joeki6', 0, 1, 3, 4, 'EUW', 'Ik speel vaak tijdens de weekends'),
(92, 89, 'ZeroZerow', 13, 66, 4, 5, 'EUW', 'Als ik ADC speel ik vooral Kai\'Sa of Xayah'),
(93, 90, 'Azobeef', 16, 111, 2, 3, 'EUW', ''),
(94, 92, 'ColtzBe', 11, 51, 2, 1, 'EUW', ''),
(95, 91, 'Madagasci', 0, 60, 4, 5, 'EUW', ''),
(96, 93, 'Dizzy22', 13, 66, 2, 3, 'EUW', ''),
(97, 94, 'shern', 27, 88, 4, 6, 'NA', ''),
(98, 96, 'IPMagazine', 8, 1097, 3, 1, 'NA', ''),
(99, 96, 'HYPESTÂºHYPE', 0, 595, 2, 6, 'NA', ''),
(100, 96, 'Hunter JSR', 17, 462, 4, 2, 'NA', ''),
(101, 96, 'Sameri', 0, 448, 3, 4, 'NA', ''),
(102, 96, 'Squiggal', 5, 370, 2, 6, 'NA', ''),
(103, 96, 'FrostSickle', 0, 369, 5, 1, 'NA', ''),
(104, 96, 'ZÃ¸eScript', 14, 373, 2, 1, 'NA', ''),
(105, 96, '456456', 9, 308, 3, 6, 'JP', ''),
(106, 96, 'æµ…é‡Žç«£é£›', 16, 305, 2, 3, 'JP', ''),
(107, 96, 'Oyasuminasai', 21, 425, 4, 6, 'OCE', ''),
(108, 96, 'LeafeÃ¶n', 11, 471, 2, 5, 'OCE', ''),
(109, 96, 'RemTaro', 11, 436, 3, 1, 'RU', ''),
(110, 96, 'AÑ€Ð¸', 12, 423, 5, 4, 'RU', '');

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
(1, 89, 1, 'Al veel Apexkes gewonnen door het feit dat hij een goede Bangalore is '),
(89, 1, 1, 'Zeer tof om Apex Legends mee te spelen. Speelt steeds Lifeline en staat vaak de loot af'),
(91, 1, 1, 'Goeie aggressive botlane support'),
(92, 89, 1, 'Flapuit, maar da maakt het als maar beter'),
(93, 1, 1, 'Speelt ni supergoed, maar kan wel een tege zn verlies'),
(93, 91, 1, 'Botlane duo\'s gedaan en zo goed als alles gewonne'),
(94, 1, 0, '3 games gespeeld alle 3 verloren'),
(95, 1, 1, '(â•¯Â°â–¡Â°ï¼‰â•¯ï¸µ â”»â”â”»');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT voor een tabel `gb_apexdata`
--
ALTER TABLE `gb_apexdata`
  MODIFY `ApexID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT voor een tabel `gb_apexrole`
--
ALTER TABLE `gb_apexrole`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `gb_loldata`
--
ALTER TABLE `gb_loldata`
  MODIFY `LoLID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

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
