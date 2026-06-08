-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Gostitelj: db
-- Čas nastanka: 08. jun 2026 ob 09.47
-- Različica strežnika: 8.0.46
-- Različica PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `rss_vaje`
--
DROP DATABASE IF EXISTS `rss_vaje`;
CREATE DATABASE IF NOT EXISTS `rss_vaje` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `rss_vaje`;

-- --------------------------------------------------------

--
-- Struktura tabele `Placilo`
--

CREATE TABLE `Placilo` (
  `idPlacilo` int NOT NULL,
  `Storitev_idStoritev` int NOT NULL,
  `znesek` decimal(6,2) NOT NULL,
  `datum_placila` date NOT NULL,
  `nacina_placila` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `Storitev`
--

CREATE TABLE `Storitev` (
  `idStoritev` int NOT NULL,
  `cena` decimal(6,2) NOT NULL,
  `datum_narocila` date NOT NULL,
  `dodatni_opis` tinytext,
  `Stranka_idStranka` int NOT NULL,
  `Vrsta_storitve_idVrsta_storitve` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `Storitev_has_Zaposleni`
--

CREATE TABLE `Storitev_has_Zaposleni` (
  `PK_S_Z` int NOT NULL,
  `Storitev_idStoritev` int NOT NULL,
  `Zaposleni_idZaposleni` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `Stranka`
--

CREATE TABLE `Stranka` (
  `idStranka` int NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefonska_stevilka` varchar(45) DEFAULT NULL,
  `naslov` varchar(45) DEFAULT NULL,
  `davcna_stevilka` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `Termin_snemanja`
--

CREATE TABLE `Termin_snemanja` (
  `idTermin_snemanja` int NOT NULL,
  `datum_snemanja` date NOT NULL,
  `lokacija` varchar(45) DEFAULT NULL,
  `trajanje` time DEFAULT NULL,
  `opis` tinytext,
  `Storitev_idStoritev` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `Vrsta_storitve`
--

CREATE TABLE `Vrsta_storitve` (
  `idVrsta_storitve` int NOT NULL,
  `storitev` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `Zaposleni`
--

CREATE TABLE `Zaposleni` (
  `idZaposleni` int NOT NULL,
  `ime` varchar(45) NOT NULL,
  `priimek` varchar(45) NOT NULL,
  `vloga` varchar(45) DEFAULT NULL,
  `telefonska_stevilka` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `Placilo`
--
ALTER TABLE `Placilo`
  ADD PRIMARY KEY (`idPlacilo`),
  ADD KEY `fk_placilo_storitev` (`Storitev_idStoritev`);

--
-- Indeksi tabele `Storitev`
--
ALTER TABLE `Storitev`
  ADD PRIMARY KEY (`idStoritev`),
  ADD KEY `TK_storitev_stranka` (`Stranka_idStranka`),
  ADD KEY `TK_storitev_vrsta` (`Vrsta_storitve_idVrsta_storitve`);

--
-- Indeksi tabele `Storitev_has_Zaposleni`
--
ALTER TABLE `Storitev_has_Zaposleni`
  ADD PRIMARY KEY (`PK_S_Z`),
  ADD KEY `fk_sz_storitev` (`Storitev_idStoritev`),
  ADD KEY `fk_sz_zaposleni` (`Zaposleni_idZaposleni`);

--
-- Indeksi tabele `Stranka`
--
ALTER TABLE `Stranka`
  ADD PRIMARY KEY (`idStranka`);

--
-- Indeksi tabele `Termin_snemanja`
--
ALTER TABLE `Termin_snemanja`
  ADD PRIMARY KEY (`idTermin_snemanja`),
  ADD KEY `fk_termin_storitev` (`Storitev_idStoritev`);

--
-- Indeksi tabele `Vrsta_storitve`
--
ALTER TABLE `Vrsta_storitve`
  ADD PRIMARY KEY (`idVrsta_storitve`);

--
-- Indeksi tabele `Zaposleni`
--
ALTER TABLE `Zaposleni`
  ADD PRIMARY KEY (`idZaposleni`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `Placilo`
--
ALTER TABLE `Placilo`
  MODIFY `idPlacilo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `Storitev`
--
ALTER TABLE `Storitev`
  MODIFY `idStoritev` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `Storitev_has_Zaposleni`
--
ALTER TABLE `Storitev_has_Zaposleni`
  MODIFY `PK_S_Z` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `Stranka`
--
ALTER TABLE `Stranka`
  MODIFY `idStranka` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `Termin_snemanja`
--
ALTER TABLE `Termin_snemanja`
  MODIFY `idTermin_snemanja` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `Vrsta_storitve`
--
ALTER TABLE `Vrsta_storitve`
  MODIFY `idVrsta_storitve` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `Zaposleni`
--
ALTER TABLE `Zaposleni`
  MODIFY `idZaposleni` int NOT NULL AUTO_INCREMENT;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `Placilo`
--
ALTER TABLE `Placilo`
  ADD CONSTRAINT `fk_placilo_storitev` FOREIGN KEY (`Storitev_idStoritev`) REFERENCES `Storitev` (`idStoritev`);

--
-- Omejitve za tabelo `Storitev`
--
ALTER TABLE `Storitev`
  ADD CONSTRAINT `TK_storitev_stranka` FOREIGN KEY (`Stranka_idStranka`) REFERENCES `Stranka` (`idStranka`),
  ADD CONSTRAINT `TK_storitev_vrsta` FOREIGN KEY (`Vrsta_storitve_idVrsta_storitve`) REFERENCES `Vrsta_storitve` (`idVrsta_storitve`);

--
-- Omejitve za tabelo `Storitev_has_Zaposleni`
--
ALTER TABLE `Storitev_has_Zaposleni`
  ADD CONSTRAINT `fk_sz_storitev` FOREIGN KEY (`Storitev_idStoritev`) REFERENCES `Storitev` (`idStoritev`),
  ADD CONSTRAINT `fk_sz_zaposleni` FOREIGN KEY (`Zaposleni_idZaposleni`) REFERENCES `Zaposleni` (`idZaposleni`);

--
-- Omejitve za tabelo `Termin_snemanja`
--
ALTER TABLE `Termin_snemanja`
  ADD CONSTRAINT `fk_termin_storitev` FOREIGN KEY (`Storitev_idStoritev`) REFERENCES `Storitev` (`idStoritev`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
