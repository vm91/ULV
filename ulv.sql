-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Vert: 127.0.0.1
-- Generert den: 08. Apr, 2013 22:31 PM
-- Tjenerversjon: 5.5.27
-- PHP-Versjon: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ulv`
--

-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `poststed`
--

CREATE TABLE IF NOT EXISTS `poststed` (
  `postnr` int(4) NOT NULL,
  `poststed` varchar(30) NOT NULL,
  PRIMARY KEY (`postnr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `bruker`
--

CREATE TABLE IF NOT EXISTS `bruker` (
  `BrukerID` int(7) NOT NULL AUTO_INCREMENT,
  `Fornavn` varchar(30) NOT NULL,
  `Etternavn` varchar(30) NOT NULL,
  `Brukernavn` varchar(20) NOT NULL,
  `Epost` varchar(50) NOT NULL,
  `Telefonnr` int(8),
  `Adresse` varchar(50),
  `Postnr` int(4),
  `Fodselsnr` int(6),
  `Passord` BINARY(32) NOT NULL,
  `Bilde` varchar(50),
  PRIMARY KEY (BrukerID),
  CONSTRAINT fk_bruker FOREIGN KEY (Postnr)
  REFERENCES poststed(Postnr)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AdminNR` int(5) NOT NULL,
  `BrukerID` int(7) NOT NULL,
  PRIMARY KEY (`AdminNR`),
  CONSTRAINT fk_admin FOREIGN KEY (BrukerID)
  REFERENCES bruker(BrukerID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `laerer`
--

CREATE TABLE IF NOT EXISTS `laerer` (
  `LaererNR` int(5) NOT NULL,
  `BrukerID` int(7) NOT NULL,
  PRIMARY KEY (`LaererNR`),
  CONSTRAINT fk_laerer FOREIGN KEY (BrukerID)
  REFERENCES bruker(BrukerID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  StudentNR int(5) NOT NULL,
  BrukerID int(7) NOT NULL,
  PRIMARY KEY (StudentNR),
  CONSTRAINT fk_student FOREIGN KEY (BrukerID)
  REFERENCES bruker(BrukerID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `gruppe`
--

CREATE TABLE IF NOT EXISTS `gruppe` (
  `GruppeID` int(5) NOT NULL AUTO_INCREMENT,
  `Gruppenavn` varchar(50) NOT NULL,
  PRIMARY KEY (`GruppeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `gruppedeltaker`
--

CREATE TABLE IF NOT EXISTS `gruppedeltaker` (
  `GruppeID` int(5) NOT NULL,
  `BrukerID` int(7) NOT NULL,
  CONSTRAINT pk_gruppedeltaker PRIMARY KEY (GruppeID, BrukerID),
  CONSTRAINT fk_gruppedeltaker_bruker FOREIGN KEY (BrukerID)
  REFERENCES bruker(BrukerID),
  CONSTRAINT fk_gruppedeltaker_gruppe FOREIGN KEY (GruppeID)
  REFERENCES gruppe(GruppeID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `studie`
--

CREATE TABLE IF NOT EXISTS `studie` (
  `StudieID` int(5) NOT NULL AUTO_INCREMENT,
  `Studienavn` varchar(30) NOT NULL,
  `Info` TEXT,
  PRIMARY KEY (`StudieID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `kurs`
--

CREATE TABLE IF NOT EXISTS `kurs` (
  `KursID` int(5) NOT NULL AUTO_INCREMENT,
  `Kursnavn` varchar(25) NOT NULL,
  PRIMARY KEY (`KursID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `studiekurs`
--

CREATE TABLE IF NOT EXISTS `studiekurs` (
  `StudieID` int(5) NOT NULL,
  `KursID` int(5) NOT NULL,
  CONSTRAINT pk_studiekurs PRIMARY KEY (StudieID, KursID),
  CONSTRAINT fk_studiekurs_studie FOREIGN KEY (StudieID)
  REFERENCES studie(StudieID),
  CONSTRAINT fk_studiekurs_kurs FOREIGN KEY (KursID)
  REFERENCES kurs(KursID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `kursdeltaker`
--

CREATE TABLE IF NOT EXISTS `kursdeltaker` (
  `BrukerID` int(7) NOT NULL,
  `KursID` int(5) NOT NULL,
  `Kursrolle` varchar(50) NOT NULL,
  CONSTRAINT pk_kursdeltager PRIMARY KEY (BrukerID, KursID),
  CONSTRAINT fk_kursdeltaker_bruker FOREIGN KEY (BrukerID)
  REFERENCES bruker(BrukerID),
  CONSTRAINT fk_kursdeltaker_kurs FOREIGN KEY (KursID)
  REFERENCES kurs(KursID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `frister`
--

CREATE TABLE IF NOT EXISTS `frister` (
  `FristID` int(8) NOT NULL AUTO_INCREMENT,
  `KursID` int(5) NOT NULL,
  `Tittel` varchar(50) NOT NULL,
  `Tid` time NOT NULL,
  `Dato` date NOT NULL,
  PRIMARY KEY (`FristID`),
  CONSTRAINT fk_frister FOREIGN KEY (KursID)
  REFERENCES kurs(KursID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `kursfeed`
--

CREATE TABLE IF NOT EXISTS `kursfeed` (
  `FeedID` int(80) NOT NULL AUTO_INCREMENT,
  `KursID` int(5) NOT NULL,
  `Overskrift` varchar(100) NOT NULL,
  `Melding` TEXT,
  PRIMARY KEY (`FeedID`),
  CONSTRAINT fk_kursfeed FOREIGN KEY (KursID)
  REFERENCES kurs(KursID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Tabellstruktur for tabell `kursitem`
--

CREATE TABLE IF NOT EXISTS `kursitem` (
  `ItemID` int(7) NOT NULL AUTO_INCREMENT,
  `KursID` int(5) NOT NULL,
  `Item` int(8) NOT NULL,
  PRIMARY KEY (`ItemID`),
  CONSTRAINT fk_kursItem FOREIGN KEY (KursID)
  REFERENCES kurs(KursID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `forum` (
  `ForumID` int(7) NOT NULL AUTO_INCREMENT,
  `Forumnavn` varchar(20) NOT NULL,
  `KursID` int(5) NOT NULL,
  `Innlegg` int(4) NOT NULL,
  PRIMARY KEY (`ForumID`),
  CONSTRAINT fk_forum FOREIGN KEY (KursID)
  REFERENCES kurs(KursID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Begrensninger for dumpede tabeller
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
