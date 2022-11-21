-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Lis 2022, 09:25
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wkproj`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `nick` text NOT NULL,
  `admin` int(11) NOT NULL,
  `data_utworzenia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `nick`, `admin`, `data_utworzenia`) VALUES
(1, 'admin', 'admin', 'admin', 1, '19.11.2022 23:08:35'),
(2, 'wojtek', 'wojtek', 'wojtekpl1233', 0, '19.11.2022 23:08:42'),
(3, 'asd', 'asd', 'asd', 0, '19.11.2022 23:09:19'),
(4, 'jddd', 'jddd', 'jddd', 0, '19.11.2022 23:12:41'),
(5, 'assssss', 'assssss', 'assssss', 0, '19.11.2022 23:15:53'),
(6, 'asdfasdfasdf', 'asdfasdfasdf', 'asdfasdfasdf', 0, '19.11.2022 23:16:24'),
(7, 'masnio', 'masno', 'masno', 0, '19.11.2022 23:16:38'),
(8, 'jebaczdisa', 'jebaczdisa', 'jebaczdisa', 0, '20.11.2022 00:44:46');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
