-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 15, 2024 alle 10:31
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carello`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carello`
--

CREATE TABLE `carello` (
  `Codice` int(11) NOT NULL,
  `Codut` int(11) DEFAULT NULL,
  `Codkit` int(11) DEFAULT NULL,
  `Quantita` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `kit`
--

CREATE TABLE `kit` (
  `Codice` int(11) NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `Prezzo` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `Codice` int(11) NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Struttura della tabella `log`
--
CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `codut` int(11) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `kit`
--

INSERT INTO `kit` (`Codice`, `Nome`, `Prezzo`) VALUES
(1, 'Kit M.P.', 15.99),
(2, 'Kit I.H.S', 18.99),
(3, 'Kit M.M', 1000.99);

-- --------------------------------------------------------


--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`Codice`, `Nome`, `Email`, `Password`) VALUES
(1, 'prova', 'prova.prova@example.com', 'password');


INSERT INTO `log` (`id`, `codut`) VALUES
(1, 1);

ALTER TABLE `carello`
  ADD PRIMARY KEY (`Codice`);

--
-- Indici per le tabelle `kit`
--
ALTER TABLE `kit`
  ADD PRIMARY KEY (`Codice`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`Codice`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per la tabella `carello`
--
ALTER TABLE `carello`
  MODIFY `Codice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `Codice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
