-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Lip 2024, 13:55
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `tangramy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wzory`
--

CREATE TABLE `wzory` (
  `id_wzoru` int(5) NOT NULL,
  `kategoria` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `nazwa` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `t1_x` float NOT NULL,
  `t1_y` float NOT NULL,
  `t1_rotate` int(5) NOT NULL,
  `t2_x` float NOT NULL,
  `t2_y` float NOT NULL,
  `t2_rotate` int(5) NOT NULL,
  `t3_aqua_x` float NOT NULL,
  `t3_aqua_y` float NOT NULL,
  `t3_aqua_rotate` int(5) NOT NULL,
  `t4_x` float NOT NULL,
  `t4_y` float NOT NULL,
  `t4_rotate` int(5) NOT NULL,
  `t5_x` float NOT NULL,
  `t5_y` float NOT NULL,
  `t5_rotate` int(5) NOT NULL,
  `k_x` float NOT NULL,
  `k_y` float NOT NULL,
  `k_rotate` int(5) NOT NULL,
  `k2_x` float NOT NULL,
  `k2_y` float NOT NULL,
  `k2_rotate` int(11) NOT NULL,
  `k3_x` float NOT NULL,
  `k3_y` float NOT NULL,
  `k3_rotate` int(11) NOT NULL,
  `k4_x` float NOT NULL,
  `k4_y` float NOT NULL,
  `k4_rotate` int(11) NOT NULL,
  `r_x` float NOT NULL,
  `r_y` float NOT NULL,
  `r_rotate` int(5) NOT NULL,
  `r2_x` float NOT NULL,
  `r2_y` float NOT NULL,
  `r2_rotate` int(11) NOT NULL,
  `zdjecie` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wzory`
--

INSERT INTO `wzory` (`id_wzoru`, `kategoria`, `nazwa`, `t1_x`, `t1_y`, `t1_rotate`, `t2_x`, `t2_y`, `t2_rotate`, `t3_aqua_x`, `t3_aqua_y`, `t3_aqua_rotate`, `t4_x`, `t4_y`, `t4_rotate`, `t5_x`, `t5_y`, `t5_rotate`, `k_x`, `k_y`, `k_rotate`, `k2_x`, `k2_y`, `k2_rotate`, `k3_x`, `k3_y`, `k3_rotate`, `k4_x`, `k4_y`, `k4_rotate`, `r_x`, `r_y`, `r_rotate`, `r2_x`, `r2_y`, `r2_rotate`, `zdjecie`) VALUES
(1, 'zwierzeta', 'Kot', 469, 203, 225, 271, 5, 45, 370, 303, 45, 568, 500, 90, 370, 303, 45, 370, 103, 45, 469, 202, 135, 370, 301, 225, 271, 202, 315, 824, 525, 45, 597, 892, 225, 'kot.jpg'),
(2, 'zwierzeta', 'Żółw', 135, 630, 270, 275, 340, 180, 530, 349, 225, 596, 414, 135, 200, 414.5, 315, 695, 316, 45, 794, 415, 135, 695, 514, 225, 596, 415, 315, 775, 745, 135, 408, 518, 315, 'zolw.jpg'),
(3, 'zwierzeta', 'Kruk', 349, 602, 315, 152, 205, 45, 785, 444, 135, 646, 304, 135, 250, 304.5, 315, 251, 107, 45, 350, 206, 135, 251, 305, 225, 152, 206, 315, 866, 444, 90, 446, 543, 270, 'kruk.jpg'),
(4, 'zwierzeta', 'Pies', 647, 677, 225, 234, 681, 225, 647, 480, 90, 647, 200, 90, 234, 614, 270, 647, 175, 0, 787, 175, 90, 787, 315, 180, 647, 315, 270, 234, -26, 0, 333, 394, 180, 'pies.jpg'),
(5, 'ludzie', 'Jeździec', 260, 674, 270, 239, 255, 90, 380, 396, 270, 380, 396, 0, 519, 534, 180, 539, 40, 45, 638, 139, 135, 539, 238, 225, 440, 139, 315, 1021, 396, 90, 601, 495, 270, 'jezdziec.jpg'),
(6, 'zwierzeta', 'Kura', 792.5, 259.5, 135, 595, 260, 315, 793, 63, 90, 596, 259, 135, 298, 556, 315, 594.5, 259, 45, 693.5, 358, 135, 594.5, 457, 225, 495.5, 358, 315, 460, 160, 90, 40, 259, 270, 'kura.jpg'),
(7, 'zwierzeta', 'Gęś', 388, 624, 90, 528, 624, 0, 473, 146, 135, 586, 426, 135, 387, 624, 315, 333, 146, 0, 473, 146, 90, 473, 286, 180, 333, 286, 270, 445, 173, 45, 218, 540, 225, 'ges.jpg'),
(8, 'zwierzeta', 'kogut', 250, 430, 45, 131, 210, 315, 728, 200, 135, 169, 350, 0, 449, 480, 270, 190, 210, 0, 330, 210, 90, 330, 350, 180, 190, 350, 270, 629, 139, 0, 728, 559, 180, 'kogut.jpg'),
(9, 'zwierzeta', 'Krab', 780, 226, 180, 221, 648, 270, 221, 90, 45, 501, 508, 180, 359, 367, 0, 358, 227, 0, 498, 227, 90, 498, 367, 180, 358, 367, 270, 753, 113, 45, 526, 480, 225, 'krab.jpg'),
(10, 'ludzie', 'Biegacz', 930, 717, 135, 110, 618, 315, 180, 618, 315, 716, 221, 135, 320, 618, 315, 518, 23, 45, 617, 122, 135, 518, 221, 225, 419, 122, 315, 876, 618, 90, 456, 717, 270, 'biegacz.jpg'),
(11, 'ludzie', 'Piłkarz', 644, 600, 45, 309, 500, 180, 644, 428, 45, 738, 335, 135, 287, 335, 315, 419, 6, 45, 518, 105, 135, 419, 204, 225, 320, 105, 315, 602, 434, 90, 182, 533, 270, 'pilkarz.jpg'),
(12, 'ludzie', 'Tancerka', 715, 79, 90, 335, 219, 180, 315, 219, 315, 447, 489, 90, 727, 769, 180, 453, 21, 45, 552, 120, 135, 453, 219, 225, 354, 120, 315, 635, 538, 135, 268, 311, 315, 'tancerka.jpg'),
(13, 'rzeczy', 'Dom', 373, 567, 270, 511, 427, 0, 652, 567, 135, 446, 147, 90, 726, 427, 180, 233, 427, 0, 373, 427, 90, 373, 567, 180, 233, 567, 270, 345, 409, 180, 246, -11, 0, 'dom.jpg'),
(14, 'rzeczy', 'Statek', 621, 545, 270, 63, 406, 0, 623, 265, 135, 621, 266, 90, 343, 545, 270, 203, 406, 0, 343, 406, 90, 343, 546, 180, 203, 546, 270, 873.5, 291.5, 45, 646.5, 658.5, 225, 'statek.jpg'),
(15, 'rzeczy', 'Bączek', 704, 362, 180, 424, 222, 0, 565, 362, 135, 145, 362, 0, 425, 642, 270, 354, 82, 0, 494, 82, 90, 494, 222, 180, 354, 222, 270, 399, 109, 45, 172, 476, 225, 'baczek.jpg'),
(16, 'rzeczy', 'Czajnik', 736, 458, 135, 538, 318, 315, 536, 266, 135, 535, 265, 90, 255, 546, 270, 597, 318, 0, 737, 318, 90, 737, 458, 180, 597, 458, 270, 368, 490, 135, 1, 263, 315, 'czajnik.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `wzory`
--
ALTER TABLE `wzory`
  ADD PRIMARY KEY (`id_wzoru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `wzory`
--
ALTER TABLE `wzory`
  MODIFY `id_wzoru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
