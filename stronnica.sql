-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Paź 2019, 20:12
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
-- Baza danych: `stronnica`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `idklienta` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `miejscowosc` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `Avatar` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`idklienta`, `imie`, `nazwisko`, `miejscowosc`, `email`, `haslo`, `Avatar`) VALUES
(1, 'Łukasz', 'Lewandowski', 'Poznań', 'luki@email.pl', '$2y$10$pW/mZXhEBmSKmCPZ3FWIiueCAkkIQOeLLCvNAQ3AREa.ODdlDyNiO', 'human.png'),
(2, 'Jan', 'Nowak', 'Katowice', 'jn@email.pl', '$2y$10$pW/mZXhEBmSKmCPZ3FWIiueCAkkIQOeLLCvNAQ3AREa.ODdlDyNiO', 'human.png'),
(3, 'Maciej', 'Wójcik', 'Bydgoszcz', 'maciejo22@email.pl', '$2y$10$pW/mZXhEBmSKmCPZ3FWIiueCAkkIQOeLLCvNAQ3AREa.ODdlDyNiO', 'human.png'),
(4, 'Agnieszka', 'Psikuta', 'Lublin', 'apsia@email.pl', '$2y$10$pW/mZXhEBmSKmCPZ3FWIiueCAkkIQOeLLCvNAQ3AREa.ODdlDyNiO', 'human.png'),
(5, 'Edwin', 'Harmata', 'Kraków', 'edwin.harmata@gmail.com', '$2y$10$pW/mZXhEBmSKmCPZ3FWIiueCAkkIQOeLLCvNAQ3AREa.ODdlDyNiO', 'human.png'),
(6, 'Michał', 'Zieliński', 'Kraków', 'zielu34@email.pl', '$2y$10$pW/mZXhEBmSKmCPZ3FWIiueCAkkIQOeLLCvNAQ3AREa.ODdlDyNiO', 'human.png'),
(7, 'Artur', 'Rutkowski', 'Kielce', 'det.ew@email.pl', '$2y$10$pW/mZXhEBmSKmCPZ3FWIiueCAkkIQOeLLCvNAQ3AREa.ODdlDyNiO', 'human.png'),
(8, 'Mateusz', 'Skorupa', 'Gdańsk', 'zolw3342@email.pl', '$2y$10$pW/mZXhEBmSKmCPZ3FWIiueCAkkIQOeLLCvNAQ3AREa.ODdlDyNiO', 'human.png'),
(9, 'Jerzy', 'Rutkowski', 'Rybnik', 'juro88@email.pl', '$2y$10$pW/mZXhEBmSKmCPZ3FWIiueCAkkIQOeLLCvNAQ3AREa.ODdlDyNiO', 'human.png'),
(10, 'Joanna', 'Dostojewska', 'Pułtusk', 'karenina@email.pl', '$2y$10$pW/mZXhEBmSKmCPZ3FWIiueCAkkIQOeLLCvNAQ3AREa.ODdlDyNiO', 'human.png'),
(11, 'Lola', 'Kola', 'KrakÃ³w', 'lola@patola.pl', '$2y$10$RuGQaUkyLGphxXEpTvCpvO89xouo6Jq5tBgTds/Ndo5LQI6G5Nl/K', 'human.png'),
(12, 'Sebastian', 'Testowy', 'KrakÃ³w', 'seba@testowy.pl', '$2y$10$pszxm82DcrGxRl3VunZvmuUt.Of5HQF8ER.sY4nle3HZbaMwlwkCi', 'human.png'),
(13, 'Testowy', 'Tester', 'ChrzanÃ³w', 'testowy@tester.pl', '$2y$10$cQJu6vMe2pZG/eSpaXW9K.m9ml90DQz.r5yUvHwHHNDLP0Cyp4p/m', 'human.png'),
(14, '', '', '', '', '', 'human.png');

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
  `Okladka` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`idksiazki`, `imieautora`, `nazwiskoautora`, `tytul`, `cena`, `Rok wydania`, `Gatunek`, `Okladka`) VALUES
(1, 'Jan', 'Michalak', 'Zaawansowane programowanie w PHP', 52.02, 2010, 'Informatyka', '1.jpg'),
(2, 'Andrzej', 'Krawczyk', 'Windows 8 PL. Zaawansowana administracja systemem', 44.99, 2012, 'Informatyka', '2.jpg'),
(3, 'Paweł', 'Jakubowski', 'HTML5. Tworzenie witryn', 49.02, 2015, 'Informatyka', '3.jpg'),
(4, 'Tomasz', 'Kowalski', 'Urządzenia techniki komputerowej', 37.57, 2010, 'Informatyka', '4.jpg'),
(5, 'Łukasz', 'Pasternak', 'PHP. Tworzenie nowoczesnych stron WWW', 32.99, 2016, 'Informatyka', '5.jpg'),
(6, 'Ross', 'Kenneth', 'Matematyka dyskretna', 79.98, 2012, 'Matematyka', '6.jpg'),
(7, 'Wojciech', 'Kordecki', 'Matematyka dyskretna dla informatyków', 59.99, 2018, 'Matematyka', '7.jpg'),
(8, 'Joanna', 'Piasecka', 'Algebra liniowa z elementami geometrii', 19.99, 2019, 'Matematyka', '8.jpg'),
(9, 'Witold', 'Kołodziej', 'Analiza matematyczna', 39.99, 2009, 'Matematyka', '9.jpg'),
(10, 'Ian', 'Stewart', 'Podstawy matematyki', 89.99, 2009, 'Matematyka', '10.jpg'),
(11, 'Gavin', 'Hesketh', 'Cząstki elementarne', 89.99, 2017, 'Fizyka', '11.jpg'),
(12, 'Józef', 'Spałek', 'Wstęp do fizyki materii skondensowanej', 29.99, 2017, 'Fizyka', '12.jpg'),
(13, 'Danuta ', 'Adamska-Rutkowska', 'Kwantowa rzeczywistość', 49.99, 2019, 'Fizyka', '13.jpg'),
(14, 'Hobson', 'Art', 'Kwanty dla każdego. Jak zrozumieć to, czego nikt nie rozumie', 39.99, 2018, 'Fizyka', '14.jpg'),
(15, 'Deruelle', 'Nathalie', 'Fale grawitacyjne. Nowa era astrofizyki ', 9.99, 2019, 'Fizyka', '15.jpg'),
(16, 'Marek', 'Blicharski', 'Inżynieria materiałowa', 9.99, 2017, 'Inzynieria', '16.jpg'),
(17, 'Gibilisco', 'Stan', 'Schematy elektroniczne i elektryczne. Przewodnik dla początkujących', 39.99, 2014, 'Inzynieria', '17.jpg'),
(18, 'Dariusz', 'Butrymowicz ', 'Chłodnictwo i klimatyzacja', 29.99, 2016, 'Inzynieria', '18.jpg'),
(19, 'Zenon', 'Wiłun', 'Zarys geotechniki', 59.99, 2013, 'Inzynieria', '19.webp');

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
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `idklienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `idksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `idzamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
