-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Mrz 2019 um 09:17
-- Server-Version: 10.1.36-MariaDB
-- PHP-Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `housemanagement`
--
CREATE DATABASE housemanagement;
USE housemanagement;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `description` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `floor`
--

CREATE TABLE `floor` (
  `ID` int(11) NOT NULL,
  `Description` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `household`
--

CREATE TABLE `household` (
  `UserID` int(11) NOT NULL,
  `Position` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `room`
--

CREATE TABLE `room` (
  `ID` int(11) NOT NULL,
  `Description` varchar(40) DEFAULT NULL,
  `FloorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roominventory`
--

CREATE TABLE `roominventory` (
  `RoomID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Description` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(40) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `Birthdate` datetime DEFAULT NULL,
  `EMail` varchar(40) DEFAULT NULL,
  `Workplace` varchar(40) DEFAULT NULL,
  `RoomID` int(11) DEFAULT NULL,
  `Money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userwork`
--

CREATE TABLE `userwork` (
  `UserID` int(11) NOT NULL,
  `WorkID` int(11) NOT NULL,
  `Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `work`
--

CREATE TABLE `work` (
  `ID` int(11) NOT NULL,
  `Description` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`UserID`);

--
-- Indizes für die Tabelle `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RoomFloor` (`FloorID`);

--
-- Indizes für die Tabelle `roominventory`
--
ALTER TABLE `roominventory`
  ADD PRIMARY KEY (`RoomID`,`CategoryID`),
  ADD KEY `FK_Category` (`CategoryID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_UserRoom` (`RoomID`);

--
-- Indizes für die Tabelle `userwork`
--
ALTER TABLE `userwork`
  ADD PRIMARY KEY (`UserID`,`WorkID`),
  ADD KEY `FK_Works` (`WorkID`);

--
-- Indizes für die Tabelle `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `floor`
--
ALTER TABLE `floor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `household`
--
ALTER TABLE `household`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `room`
--
ALTER TABLE `room`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `work`
--
ALTER TABLE `work`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `household`
--
ALTER TABLE `household`
  ADD CONSTRAINT `FK_UserHousehold` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- Constraints der Tabelle `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `FK_RoomFloor` FOREIGN KEY (`FloorID`) REFERENCES `floor` (`ID`);

--
-- Constraints der Tabelle `roominventory`
--
ALTER TABLE `roominventory`
  ADD CONSTRAINT `FK_Category` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_Room` FOREIGN KEY (`RoomID`) REFERENCES `room` (`ID`);

--
-- Constraints der Tabelle `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_UserRoom` FOREIGN KEY (`RoomID`) REFERENCES `room` (`ID`);

--
-- Constraints der Tabelle `userwork`
--
ALTER TABLE `userwork`
  ADD CONSTRAINT `FK_UsersWork` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `FK_Works` FOREIGN KEY (`WorkID`) REFERENCES `work` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
