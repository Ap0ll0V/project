-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 14 2024 г., 23:40
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fantadb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `prof`
--

CREATE TABLE `prof` (
  `Codice` int(11) NOT NULL,
  `Cognome` varchar(30) DEFAULT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `costo_periodo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `prof`
--

INSERT INTO `prof` (`Codice`, `Cognome`, `Nome`, `costo`, `costo_periodo`) VALUES
(1, 'Mainero', 'Fabrizio', 357, 577),
(2, 'Moramarco', 'Annarita', 160, 80),
(3, 'Romanini', 'Daniel', 3441, 2601),
(4, 'Mongiello', 'Dario G.', 1137, 1132),
(5, 'Barzizza', 'Filippo', 805, 400),
(6, 'Messina', 'Francesco P.', 358, 378),
(7, 'Thibault', 'Giulia', 1906, 1551),
(8, 'Bovi', 'Mariano', 515, 190),
(9, 'Bonansea', 'Marzia', 305, 555),
(10, 'Natta', 'Sandra', 2460, 1960),
(11, 'Disparti', 'Tania', 1650, 1350);

-- --------------------------------------------------------

--
-- Структура таблицы `squad`
--

CREATE TABLE `squad` (
  `Codice` int(11) NOT NULL,
  `Codsturd` int(11) NOT NULL,
  `codprof1` int(11) DEFAULT NULL,
  `codprof2` int(11) DEFAULT NULL,
  `codprof3` int(11) DEFAULT NULL,
  `codprof4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `squad`
--

INSERT INTO `squad` (`Codice`, `Codsturd`, `codprof1`, `codprof2`, `codprof3`, `codprof4`) VALUES
(1, 1, 1, 2, 3, 7),
(2, 2, 1, 3, 7, 10),
(3, 3, NULL, NULL, NULL, NULL),
(4, 4, 1, 3, 7, 11),
(5, 5, 3, 7, 10, 11),
(6, 6, 1, 3, 8, 10),
(7, 7, 3, 7, 10, 11),
(8, 8, 1, 3, 7, 10),
(9, 9, 1, 3, 10, NULL),
(10, 10, 1, 10, 3, NULL),
(11, 11, 3, 7, 10, 11),
(12, 12, 3, 7, 11, NULL),
(13, 13, 3, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `stud`
--

CREATE TABLE `stud` (
  `Codice` int(11) NOT NULL,
  `Cognome` varchar(30) DEFAULT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `credito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `stud`
--

INSERT INTO `stud` (`Codice`, `Cognome`, `Nome`, `credito`) VALUES
(1, 'Cicatiello', 'Alessandro', 1256),
(2, 'Di Domenico', 'Gabriele', 3160),
(3, 'Fornero', 'Piermario', 2000),
(4, 'Kukharonak', 'Stanislau', 3060),
(5, 'Mandaglio', 'Andrea', 1140),
(6, 'Nigro', 'Nicholas', 1461),
(7, 'Paglietta', 'Matteo', 1024),
(8, 'Palmero', 'Samuele', 2957),
(9, 'Ricca', 'Andrea', 2247),
(10, 'Salvai', 'Lorenzo', 2161),
(11, 'Santarelli', 'Davide Alessandro', 1587),
(12, 'Valenza', 'Alessandro', 4690),
(13, 'Zanella', 'Raoul', 1699);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`Codice`);

--
-- Индексы таблицы `squad`
--
ALTER TABLE `squad`
  ADD PRIMARY KEY (`Codice`);

--
-- Индексы таблицы `stud`
--
ALTER TABLE `stud`
  ADD PRIMARY KEY (`Codice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
