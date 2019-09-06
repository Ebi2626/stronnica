-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Wrz 2019, 15:27
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ksiegarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `avatary`
--

CREATE TABLE `avatary` (
  `idavatara` int(11) NOT NULL,
  `idklienta` int(11) NOT NULL,
  `avatar` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `idklienta` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `miejscowosc` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`idklienta`, `imie`, `nazwisko`, `miejscowosc`, `email`) VALUES
(1, 'Łukasz', 'Lewandowski', 'Poznań', 'luki@email.pl'),
(2, 'Jan', 'Nowak', 'Katowice', 'jn@email.pl'),
(3, 'Maciej', 'Wójcik', 'Bydgoszcz', 'maciejo22@email.pl'),
(4, 'Agnieszka', 'Psikuta', 'Lublin', 'apsia@email.pl'),
(5, 'Tomasz', 'Mazur', 'Jelenia Góra', 'mazur87@email.pl'),
(6, 'Michał', 'Zieliński', 'Kraków', 'zielu34@email.pl'),
(7, 'Artur', 'Rutkowski', 'Kielce', 'det.ew@email.pl'),
(8, 'Mateusz', 'Skorupa', 'Gdańsk', 'zolw3342@email.pl'),
(9, 'Jerzy', 'Rutkowski', 'Rybnik', 'juro88@email.pl'),
(10, 'Joanna', 'Dostojewska', 'Pułtusk', 'karenina@email.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `idksiazki` int(11) NOT NULL,
  `imieautora` text COLLATE utf8_polish_ci NOT NULL,
  `nazwiskoautora` text COLLATE utf8_polish_ci NOT NULL,
  `tytul` text COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `Rok wydania` int(11) NOT NULL,
  `Gatunek` text COLLATE utf8_polish_ci NOT NULL,
  `Okładka` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`idksiazki`, `imieautora`, `nazwiskoautora`, `tytul`, `cena`, `Rok wydania`, `Gatunek`, `Okładka`) VALUES
(1, 'Jan', 'Michalak', 'Zaawansowane programowanie w PHP', 52.02, 2010, 'Informatyka', ''),
(2, 'Andrzej', 'Krawczyk', 'Windows 8 PL. Zaawansowana administracja systemem', 44.99, 2012, 'Informatyka', ''),
(3, 'Paweł', 'Jakubowski', 'HTML5. Tworzenie witryn', 49.02, 2015, 'Informatyka', ''),
(4, 'Tomasz', 'Kowalski', 'Urządzenia techniki komputerowej', 37.57, 2010, 'Informatyka', ''),
(5, 'Łukasz', 'Pasternak', 'PHP. Tworzenie nowoczesnych stron WWW', 32.99, 2016, 'Informatyka', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `idzamowienia` int(11) NOT NULL,
  `idklienta` int(11) NOT NULL,
  `idksiazki` int(11) NOT NULL,
  `data` date NOT NULL,
  `status` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`idzamowienia`, `idklienta`, `idksiazki`, `data`, `status`) VALUES
(1, 2, 4, '2018-10-08', 'oczekiwanie'),
(2, 7, 1, '2018-09-05', 'wyslano'),
(3, 9, 1, '2018-10-11', 'oczekiwanie'),
(4, 2, 2, '2018-10-15', 'oczekiwanie'),
(5, 2, 5, '2018-08-12', 'wyslano'),
(6, 3, 2, '2018-10-20', 'wyslano'),
(7, 4, 3, '2018-08-14', 'wyslano'),
(8, 8, 1, '2018-08-19', 'wyslano'),
(9, 3, 5, '2018-11-19', 'wyslano'),
(10, 9, 2, '2018-12-28', 'oczekiwanie');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `avatary`
--
ALTER TABLE `avatary`
  ADD PRIMARY KEY (`idavatara`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`idklienta`),
  ADD KEY `id` (`idklienta`);

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`idksiazki`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`idzamowienia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `avatary`
--
ALTER TABLE `avatary`
  MODIFY `idavatara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `idklienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `idksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `idzamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
