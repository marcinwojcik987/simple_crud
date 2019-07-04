-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Cze 2019, 14:29
-- Wersja serwera: 10.3.15-MariaDB
-- Wersja PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `loty`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `departure` date NOT NULL,
  `arrival` date NOT NULL,
  `seats` tinyint(4) NOT NULL,
  `tourist` tinyint(4) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `flights`
--

INSERT INTO `flights` (`id`, `departure`, `arrival`, `seats`, `tourist`, `price`) VALUES
(3, '0000-00-00', '0000-00-00', 0, 0, ''),
(4, '2019-06-05', '2019-06-19', 56, 127, '765'),
(5, '2019-06-27', '2019-06-30', 11, 12, '13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `turist`
--

CREATE TABLE `turist` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `surname` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `notes` varchar(50) NOT NULL,
  `birth` date NOT NULL,
  `flylist` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `turist`
--

INSERT INTO `turist` (`id`, `name`, `surname`, `sex`, `country`, `notes`, `birth`, `flylist`) VALUES
(4, 'Marcin ', 'm', '', 'Polska', 'e', '2019-06-05', '0000-00-00'),
(5, 'Natalia', 'f', '', 'Wielka Brytania', '55', '2019-06-07', '0000-00-00'),
(6, 'Marcin WÃ³', 'f', '', 'Polska', '', '0000-00-00', '0000-00-00'),
(8, 'WÃ³jcik', 'WÃ³jcik', '', 'Polska', '', '0000-00-00', '0000-00-00'),
(10, 'Marcin', 'WÃ³jcik', 'f', 'Polska', 'o', '2019-06-26', '0000-00-00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `turist`
--
ALTER TABLE `turist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `turist`
--
ALTER TABLE `turist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
