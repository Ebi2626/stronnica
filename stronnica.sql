-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lis 2019, 20:29
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.2.12

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
(5, 'Edwin', 'Harmata', 'Kraków', 'edwin.harmata@gmail.com', '$2y$10$pW/mZXhEBmSKmCPZ3FWIiueCAkkIQOeLLCvNAQ3AREa.ODdlDyNiO', 'edwin.harmata_5.jpg'),
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
  `Okladka` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `Opis` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`idksiazki`, `imieautora`, `nazwiskoautora`, `tytul`, `cena`, `Rok wydania`, `Gatunek`, `Okladka`, `Opis`) VALUES
(1, 'Jan', 'Michalak', 'Zaawansowane programowanie w PHP', 52.02, 2010, 'Informatyka', '1.jpg', 'Autorzy tej książki skupiają się na zaawansowanych zagadnieniach związanych z językiem PHP. W trakcie lektury dowiesz się, jak stworzyć aplikację dla platform mobilnych, zintegrować swój serwis z takimi portalami, jak Facebook i Twitter. Znajdziesz tu rozdziały poświęcone ważnemu tematowi programowania baz danych — poczynając od mało znanych baz NoSQL, poprzez CouchDB, MongoDB i SQLite, aż do Oracle, rozszerzeń MySQLi, PDO, ADOdb oraz systemu wyszukiwania pełnotekstowego Sphinx. Nauczysz się korzystać z bibliotek open source oraz parsować wiadomości RSS, generować dokumenty PDF, pobierać dane ze stron WWW, korzystać z bibliotek Map Google i Google Chart, a także tworzyć wiadomości e-mail i SMS. Ta książka zaczyna się w miejscu, w którym inne kończą omawianie PHP. Jeżeli tworzysz nowatorskie aplikacje albo chcesz zintegrować się z serwisami społecznościowymi, musisz ją mieć!'),
(2, 'Andrzej', 'Krawczyk', 'Windows 8 PL. Zaawansowana administracja systemem', 44.99, 2012, 'Informatyka', '2.jpg', 'Ta książka stanowi doskonałe wprowadzenie w zaawansowane zagadnienia związane z Windows 8. Dzięki niej możesz zapoznać się m.in. z różnicami i możliwościami poszczególnych wersji systemu, sposobem jego instalowania czy przygotowania do pracy zgodnie z Twoimi preferencjami. Dowiesz się też, jak zarządzać komputerem czy kontami użytkowników przy użyciu różnych technik i narzędzi, a także plikami i folderami. Nauczysz się lepiej obsługiwać napędy dyskowe czy wykorzystywać nowe techniki uwierzytelniania użytkowników. Przekonasz się też, jak zabezpieczać ważne pliki przy użyciu nowych mechanizmów. A w końcu zmusisz system, by pracował tak wydajnie, jak to tylko możliwe!'),
(3, 'Paweł', 'Jakubowski', 'HTML5. Tworzenie witryn', 49.02, 2015, 'Informatyka', '3.jpg', 'Dzięki kolejnej książce z serii \"Nieoficjalny podręcznik\" nie musisz odkrywać tajników HTML5 na własną rękę. Znajdziesz tu wszystkie istotne informacje, dzięki którym błyskawicznie zaczniesz korzystać z dobrodziejstw HTML5. W trakcie lektury nauczysz się dynamicznie rysować elementy, używać geolokalizacji oraz przechowywać dane użytkowników w lokalnych magazynach danych. Ponadto poznasz nowe znaczniki oraz ich przeznaczenie. HTML5 to przyszłość sieci, dlatego już dziś warto poznać jego możliwości!'),
(4, 'Tomasz', 'Kowalski', 'Urządzenia techniki komputerowej', 37.57, 2010, 'Informatyka', '4.jpg', 'Technik informatyk niewątpliwie musi posiadać wszelkie umiejętności związane z obsługą i serwisowaniem komputerów oraz urządzeń peryferyjnych. Powinien także potrafić zdiagnozować pojawiające się problemy oraz doskonale rozumieć rolę poszczególnych komponentów składających się na sprawny komputer. Technik informatyk powinien również doskonale znać zasady działania sprzętu komputerowego. Dzięki temu podręcznikowi uczeń posiądzie wiedzę nie tylko dotyczącą powyższych zagadnień ale także dowie się, jak przetwarzane są informacje, jakie elementy zawiera w sobie pecet i jak współdziałają ze sobą różne jego podsystemy. Będzie się również orientował wśród typów pamięci komputerowych, rozróżniał typy transmisji danych i umiał podłączać się do internetu albo innej sieci - przewodowej lub bezprzewodowej. '),
(5, 'Łukasz', 'Pasternak', 'PHP. Tworzenie nowoczesnych stron WWW', 32.99, 2016, 'Informatyka', '5.jpg', 'Jeśli chcesz biegle posługiwać się algorytmami, wziąłeś do ręki właściwą książkę! Przedstawiono tu podstawy implementacji algorytmów i struktur danych w PHP, dzięki czemu poznasz rodzaje struktur i powody, dla których warto je wybierać, a także dowiesz się, gdzie i kiedy należy stosować poszczególne algorytmy. Znajdziesz tu dużo praktycznych przykładów, które uzupełniono rysunkami i wyczerpującym komentarzem. Przystępne i zrozumiałe wyjaśnienia ułatwią Ci szybkie przyswojenie prezentowanych koncepcji, nawet tak złożonych, jak programowanie dynamiczne, algorytmy zachłanne, algorytmy z nawrotami czy funkcyjne struktury danych.'),
(6, 'Ross', 'Kenneth', 'Matematyka dyskretna', 79.98, 2012, 'Matematyka', '6.jpg', 'Książka nadaje się idealnie do samodzielnego studiowania - zawiera wiele ćwiczeń i przykładów z odpowiedziami lub wskazówkami, a na końcu każdego rozdziału podsumowanie podanych w nim informacji.  Dobry, precyzyjnie napisany podręcznik, przeznaczony jest dla studentów pierwszych lat matematyki, informatyki i innych kierunków ścisłych na uniwersytetach, wyższych uczelniach pedagogicznych oraz wyższych uczelniach technicznych.'),
(7, 'Wojciech', 'Kordecki', 'Matematyka dyskretna dla informatyków', 59.99, 2018, 'Matematyka', '7.jpg', 'Ten podręcznik powstał na bazie doświadczeń autorów w prowadzeniu zajęć z matematyki dyskretnej, teorii grafów i algorytmów kombinatorycznych na Politechnice Wrocławskiej na Wydziale Podstawowych Problemów Techniki, na Uniwersytecie Ekonomicznym w Poznaniu na Wydziale Informatyki i Gospodarki Elektronicznej oraz w Państwowej Wyższej Szkole Zawodowej im. Witelona w Legnicy na Wydziale Nauk Technicznych i Ekonomicznych. Zajęcia te były prowadzone dla studentów informatyki, a także dla tych z kierunku informatyka i ekonometria. I to przede wszystkim dla studentów kierunków informatycznych przeznaczona jest ta książka. Zawiera ona również wiadomości bardziej zaawansowane, przydatne dla doktorantów i zaawansowanych programistów, dając im teoretyczne podstawy do studiowania algorytmów.'),
(8, 'Joanna', 'Piasecka', 'Algebra liniowa z elementami geometrii', 19.99, 2019, 'Matematyka', '8.jpg', ' Książka przeznaczona jest dla studentów wszystkich niematematycznych kierunków studiów technicznych i ekonomicznych. Zawiera informacje teoretyczne, przykłady i zadania z rozwiązaniami z zakresu: podstawowych struktur algebraicznych, teorii liczb zespolonych, macierzy i wyznaczników, teorii układów równań liniowych, przestrzeni wektorowych, geometrii analitycznej w R3 . Zamieszczono w niej 96 rozwiązanych przykładów oraz ponad 400 zadań - z odpowiedziami do samodzielnego rozwiązania. Rozwiązane przykłady są wzbogacone o szczegółowy komentarz pozwalający zrozumieć związki między wcześniejszymi definicjami i twierdzeniami a zagadnieniami praktycznymi. Zadania są różnorodne, a ich trudność odpowiednio stopniowana. Dzięki temu przedstawiony materiał staje się łatwy do przyswojenia.'),
(9, 'Witold', 'Kołodziej', 'Analiza matematyczna', 39.99, 2009, 'Matematyka', '9.jpg', 'Współczesna analiza matematyczna to przedmiot trudny i zbyt obszerny, by można go było wyłożyć studentom bez odwoływania się do podręcznika. [...] W polskiej literaturze matematycznej brakuje podręcznika do analizy dostosowanego do programu studiów matematyczno-fizycznych wyższych uczelni technicznych. Niniejsza książka stanowi próbę wypełnienia tej luki.  (Z \"Przedmowy\" do pierwszego wydania)  Po latach wznawiamy podręcznik analizy matematycznej napisany przez wieloletniego wykładowcę Politechniki Warszawskiej z myślą o studentach wyższych szkół technicznych. W książce w sposób niezwykle przystępny zostały zaprezentowane zagadnienia omawiane na wykładach matematyki na pierwszym i drugim roku studiów:'),
(10, 'Ian', 'Stewart', 'Podstawy matematyki', 89.99, 2009, 'Matematyka', '10.jpg', 'Książka \"Podstawy matematyki\" pozwoli zajrzeć w świat myślenia matematycznego, w którym definicje formalne i dowody prowadzą ku zdumiewającym, nowym sposobom definiowania, dowodzenia, obrazowania i zapisu symbolicznego matematyki, dalece wykraczającym poza nasze oczekiwania. Innymi słowy, \"Podstawy matematyki\" to podręcznik inny niż wszystkie, napisany przez mistrza - Iana Stewarta. Niniejsza książka przeznaczona jest dla czytelników, którzy pragną przejść od matematyki szkolnej do w pełni rozwiniętego stylu rozumowania matematyków zawodowych. Jest przeznaczona zarówno dla uczniów szkół średnich, rozważających pogłębianie wiedzy matematycznej, studentów pierwszych lat uniwersytetów i uczelni technicznych, jak i dla wszystkich osób poszukujących wglądu w fundamentalne idee i procesy myślowe matematyków. Prezentowane w niej formalne podejście do matematyki budowane jest jako naturalna konsekwencja leżących u jej podstaw pojęć oraz idei. Poruszane w niej tematy obejmują: naturę myślenia matematycznego, przegląd intuicyjnego rozwoju takich pojęć, jak zbiory, relacje, funkcje, wprowadzenie do logiki w postaci praktykowanej przez matematyków, metody dowodzenia (łącznie z analizą sposobu zapisywania dowodu matematycznego), rozwój aksjomatycznych systemów liczbowych, poczynając od liczb naturalnych po konstrukcje liczb rzeczywistych i zespolonych, liczby kardynalne. '),
(11, 'Gavin', 'Hesketh', 'Cząstki elementarne', 89.99, 2017, 'Fizyka', '11.jpg', 'Ta książka opowiada o cząstkach, najbardziej fundamentalnych obiektach, jakie znamy, z których zbudowany jest cały nasz Wszechświat. Co prawda, najlepszym językiem do opisu świata cząstek jest matematyka, jednak koncepcje, opisujące rzeczywistość w najmniejszej skali można oddzielić od matematycznych równań i uczynić je zrozumiałymi dla każdego. Książka brytyjskiego fizyka, Gavina Hesketha \"Cząstki elementarne\" to opowieść o tym, co wiemy, czego jeszcze nie wiemy, i naszym nieustannym dążeniu do poszerzania wiedzy o najbardziej tajemniczych obiektach w naszym świecie. To opowieść o kwarkach i leptonach, bozonach i symetriach, a także o największym eksperymencie w historii badań najmniejszych składników materii, jakie udało nam się do tej pory odkryć. Żyjemy w złotej epoce fizyki cząstek, gdyż dysponujemy największym narzędziem badawczym, dzięki któremu przesuwamy granice ludzkiej wiedzy. Najbardziej ekscytujące jest jednak to, że możemy znajdować się u progu całkowicie nowego odkrycia, znacznie ważniejszego niż bozon Higgsa, odkrycia, które może doprowadzić do nowej rewolucji w postrzeganiu Wszechświata i naszego w nim miejsca. '),
(12, 'Józef', 'Spałek', 'Wstęp do fizyki materii skondensowanej', 29.99, 2017, 'Fizyka', '12.jpg', 'Podstawą fizyki materii skondensowanej są kwantowe własności materiałów – cieczy kwantowych i innych układów wielocząstkowych – oraz ich własności fizyczne i zachodzące w nich przejścia fazowe.  Książka jest nowoczesnym podręcznikiem, w którym oprócz zagadnień omawianych tradycyjnie są opisane również najnowsze odkrycia z ostatnich lat. Wiele z nich jest przedstawionych w nowy, przejrzysty sposób, dzięki czemu łatwiejsze staje się samodzielne ich zgłębianie.'),
(13, 'Danuta ', 'Adamska-Rutkowska', 'Kwantowa rzeczywistość', 49.99, 2019, 'Fizyka', '13.jpg', 'Czym jest rzeczywistość? Jak ją dostrzec, poczuć i zrozumieć? Najnowsze badania dowodzą, że to co widzimy i możemy dotknąć już nie wystarcza aby określić materię. Współczesna fizyka kwantowa udowadnia, że rzeczywistość ma wiele wymiarów i jest zupełnie inna niż nam dotychczas się wydawało. Autorki prezentują wyniki badań naukowców z wielu krajów, którzy próbują wyjaśnić jej strukturę.   W książce znajdziesz szczegółową analizę bilokacji czyli przebywania w dwóch różnych miejscach równocześnie. Relacjonują własne doznania i przeżycia z miejsc, w których nie mogły przebywać fizycznie, a jedynie wykorzystując to zjawisko. Definiują również alternatywne rzeczywistości oraz wyjaśniają czym jest świadomość, podświadomość i nadświadomość jako istotne czynniki wpływające na obraz otaczającego nas świata. Opisują zjawiska paranormalne oraz ich związek z funkcjonowaniem mózgu człowieka. Ich relacje z doświadczeń niecodziennych zjawisk metafizycznych są dowodem potwierdzającym istnienie światów równoległych oraz dają wgląd na nową rzeczywistość.   Dodatkowo Autorki tworzą intrygującą wizję przyszłości, gdzie wszyscy będziemy stanowili wspólny układ, który powinien funkcjonować w pełnej harmonii. Aby to osiągnąć niezbędna jest jednak zmiana naszej świadomości i przekonań. Najnowsze ustalenia fizyki kwantowej zmuszają nas dziś do zupełnie innej oceny zarówno sensu życia, jak i naszego w nim udziału.'),
(14, 'Hobson', 'Art', 'Kwanty dla każdego. Jak zrozumieć to, czego nikt nie rozumie', 39.99, 2018, 'Fizyka', '14.jpg', 'Sądzisz, że Wszechświat jest zbudowany z cząstek - bardzo małych okruszków materii, takich jak neutron, proton, czy elektron? Wierzysz, że kot Schrödingera - bohater słynnego eksperymentu myślowego genialnego, austriackiego fizyka - jest żywy i martwy jednocześnie, dopóki ktoś nie zajrzy do pudła, w którym go zamknięto wraz z trucizną? Jesteś przekonany, że - tak jak uczono cię w szkole - foton jest zarazem cząstką i falą? Jeśli tak, \"Kwanty dla każdego\" zmienią twoje życie, pokazując, że wszystko to nie jest do końca prawdą. Teoria kwantowa może wydawać się dziwna, ale nie jest wcale zagadkowa i można o niej opowiedzieć zrozumiałym językiem, a także w prosty sposób wyjaśnić wszystkie paradoksy. Poza tym jest po prostu piękna. Książka Arta Hobsona pozwoli ci zachwycić się Wszechświatem takim, jakim go opisuje teoria kwantów; takim, jakim jest on naprawdę. Art Hobson jest emerytowanym profesorem fizyki. Prowadzi badania na University of Arkansas w Fayetteville. Zanim zaczął studiować fizykę na University of Arkansas, był zawodowym muzykiem'),
(15, 'Deruelle', 'Nathalie', 'Fale grawitacyjne. Nowa era astrofizyki ', 9.99, 2019, 'Fizyka', '15.jpg', '14 września 2015 roku zaczęła się era nowej astronomii, która przez najbliższe stulecia kształtować będzie naszą wizję świata, opartą na obserwacji nie światła, lecz fal grawitacyjnych emitowanych przez ruchy i drgania ciał niebieskich. Od tego czasu zarejestrowaliśmy nie tylko fale grawitacyjne, emitowane wskutek łączenia się czarnych dziur, ale również gwiazd neutronowych. Nasza wiedza rozwija się w tempie wprost fenomenalnym!Nathalie Deruelle i Jean-Pierre Lasota, fizycy zaangażowani w badania fal grawitacyjnych, opowiadają w swojej książce zarówno o historii, jak i o najnowszych obserwacjach i wynikach. Zadają pytanie, jak zadziwiające niespodzianki przyniesie nam jeszcze astronomia fal grawitacyjnych i jak bardzo odmieni nasz obecny obraz Wszechświata. '),
(16, 'Marek', 'Blicharski', 'Inżynieria materiałowa', 9.99, 2017, 'Inzynieria', '16.jpg', 'Podręcznik Inżynieria Materiałowa zawiera syntetyczny wykład podstaw materiałoznawstwa. Autor omawia: - budowę wewnętrzną ciał stałych - związki między strukturą i własnościami a procesem wytwarzania materiałów - własności głównych grup materiałów inżynierskich - problemy formowania materiałów i korozji - własności elektryczne, magnetyczne, optyczne oraz cieplne materiałów.  Cennym uzupełnieniem książki jest słowniczek pojęć stosowanych w inżynierii materiałowej.'),
(17, 'Gibilisco', 'Stan', 'Schematy elektroniczne i elektryczne. Przewodnik dla początkujących', 39.99, 2014, 'Inzynieria', '17.jpg', 'Zawsze marzyłeś o zbudowaniu własnego układu elektronicznego, a lutownica nie jest Ci obca? Już czas, byś przystąpił do dzieła! Jeśli jednak setki linii, dziwnych znaczków i opisów przyprawiają Cię o zawrót głowy i masz problem z odczytaniem schematu układu elektronicznego, koniecznie zajrzyj do tej książki!  Dzięki niej błyskawicznie nauczysz się czytać schematy elektryczne i elektroniczne. Już za chwilę rozróżnienie schematu ideowego, blokowego i wykonawczego stanie się dla Ciebie bułką z masłem. Zobaczysz, jak wyglądają na schematach diody, rezystory, kondensatory, lampy elektronowe, ogniwa i baterie. Dowiesz się, jak przeanalizować schemat i odkryć mechanizm jego działania. W końcu zostaniesz specjalistą od wykrywania i diagnozowania usterek na podstawie schematu. Książka ta jest doskonałą lekturą dla wszystkich pasjonatów elektroniki, chcących biegle korzystać ze schematów elektrycznych i elektronicznych!'),
(18, 'Dariusz', 'Butrymowicz ', 'Chłodnictwo i klimatyzacja', 29.99, 2016, 'Inzynieria', '18.jpg', 'Jest to nowoczesny podręcznik, w którym kompleksowo omówiono:      podstawy termodynamiczne chłodnictwa,     czynniki chłodnicze i chłodziwa,     substytucję czynników chłodniczych,     układy techniczne stosowane w urządzeniach służących do obniżania temperatury,     konkretne rozwiązania wykorzystywane w budowie maszyn, aparatury i instalacji chłodniczych oraz klimatyzacyjnych, a także chłodni.  Książka polecana studentom kierunku chłodnictwo i klimatyzacja oraz specjalistom z branży chłodniczej i klimatyzacyjnej.'),
(19, 'Zenon', 'Wiłun', 'Zarys geotechniki', 59.99, 2013, 'Inzynieria', '19.webp', 'Klasyczny podręcznik akademicki z zakresu geotechniki. Omówiono rodzaje gruntów, ich właściwości i stany, metody badań ośrodków gruntowych i określania parametrów geotechnicznych, rozkład naprężeń w ośrodku gruntowym, odkształcenia i nośność podłoża gruntowego, geotechnikę korpusów ziemnych, fundamentowanie budynków, geotechnikę nawierzchni drogowych oraz przykłady zastosowania teorii w praktyce. ');

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
(10, 9, 2, '2018-12-28', 'oczekiwanie'),
(11, 5, 3, '2019-11-04', 'wyslano'),
(12, 5, 4, '2019-11-04', 'oczekujaca');

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
  MODIFY `idzamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
