-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 12, 2025 at 06:35 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeria`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obrazy`
--

CREATE TABLE `obrazy` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL,
  `sciezka` varchar(255) NOT NULL,
  `kategoria` varchar(100) DEFAULT NULL,
  `slowa_kluczowe` text DEFAULT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obrazy`
--

INSERT INTO `obrazy` (`id`, `nazwa`, `sciezka`, `kategoria`, `slowa_kluczowe`, `data_dodania`) VALUES
(41, 'tygrys', 'uploads/1747065082.png', 'zwierzeta', 'tygrys', '2025-05-12 15:51:22'),
(42, 'wiewiórka', 'uploads/1747065096.png', 'zwierzeta', 'wiewiórka', '2025-05-12 15:51:36'),
(43, 'ludzie1', 'uploads/1747065111.png', 'ludzie', 'ludzie1', '2025-05-12 15:51:51'),
(44, 'ludzie2', 'uploads/1747065121.avif', 'ludzie', 'ludzie2', '2025-05-12 15:52:01'),
(45, 'rzeczy1', 'uploads/1747065146.jpg', 'przedmioty', 'rzeczy1', '2025-05-12 15:52:26'),
(46, 'rzeczy2', 'uploads/1747065153.webp', 'przedmioty', 'rzeczy2', '2025-05-12 15:52:33'),
(47, 'krajobraz1', 'uploads/1747065166.jpg', 'krajobraz', 'krajobraz2', '2025-05-12 15:52:46'),
(48, 'krajobraz2', 'uploads/1747065173.png', 'krajobraz', 'krajobraz2', '2025-05-12 15:52:53');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `obrazy`
--
ALTER TABLE `obrazy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obrazy`
--
ALTER TABLE `obrazy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
