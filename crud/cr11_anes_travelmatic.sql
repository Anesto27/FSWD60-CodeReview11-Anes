-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 24. Mrz 2019 um 12:39
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_anes_travelmatic`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `concerts`
--

CREATE TABLE `concerts` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(55) DEFAULT NULL,
  `event_img` varchar(500) DEFAULT NULL,
  `eventDate` date DEFAULT NULL,
  `event_price` int(22) DEFAULT NULL,
  `event_address` varchar(55) DEFAULT NULL,
  `event_web_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `concerts`
--

INSERT INTO `concerts` (`event_id`, `event_name`, `event_img`, `eventDate`, `event_price`, `event_address`, `event_web_address`) VALUES
(1, '', 'a', '1991-12-12', 11, 'BÃ©csi Ãºt 52. I. em. 1.', '12'),
(2, '', 'a', '2019-10-10', 0, 'a', 'a');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `user_name` varchar(55) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_admin` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`customer_id`, `user_name`, `email`, `password`, `user_admin`) VALUES
(1, 'Anes Smajic', 'smajic.kairo@gmx.at', '0d89db5aae3bf7797def438d2184d58d9b6aaa86645231f054c6e52f409aeb62', 'Y'),
(2, 'Florian Steiner', 'flo@gmx.at', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'N'),
(3, 'Goran Stevic', 'goran@gmx.at', 'dbe08c149b95e2b97bfcfc4b593652adbf8586c6759bdff47b533cb4451287fb', 'N'),
(4, 'Ismet Mesic', 'mesic@gmx.at', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Y'),
(5, 'Florian Steiner', 'flo1@gmx.at', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'N'),
(6, 'Adrijana Zenicanin', 'audry@gmx.at', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'N'),
(8, 'Sadila', 'sada@gmx.at', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'N'),
(9, 'Lejla Smajic', 'lejla@gmx.at', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'N');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurants_id` int(11) NOT NULL,
  `restaurant_name` varchar(55) DEFAULT NULL,
  `restaurant_img` varchar(500) DEFAULT NULL,
  `restaurant_descrp` varchar(500) DEFAULT NULL,
  `telephone_number` varchar(55) DEFAULT NULL,
  `restaurant_type` varchar(55) DEFAULT NULL,
  `restaurant_address` varchar(55) DEFAULT NULL,
  `restaurant_web_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `todo`
--

CREATE TABLE `todo` (
  `todo_id` int(11) NOT NULL,
  `place_name` varchar(55) DEFAULT NULL,
  `place_img` varchar(500) DEFAULT NULL,
  `place_descrp` varchar(500) DEFAULT NULL,
  `place_type` varchar(55) DEFAULT NULL,
  `place_address` varchar(55) DEFAULT NULL,
  `place_web_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `todo`
--

INSERT INTO `todo` (`todo_id`, `place_name`, `place_img`, `place_descrp`, `place_type`, `place_address`, `place_web_address`) VALUES
(4, 'Castle SchÃ¶nbrunn', 'https://www.schoenbrunn.at/fileadmin/_processed_/b/b/csm_Schoenbrunn-homepage_a325399359.jpg', 'the biggest Castle in Vienna', 'Castle', 'SchÃ¶nbrunner SchloÃŸstraÃŸe 47', 'www.schoenbrunn.at'),
(5, 'Stephansdom', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Wien_-_Stephansdom_%281%29.JPG/220px-Wien_-_Stephansdom_%281%29.JPG', 'The biggest Church in Vienna!', 'Church', 'Stephansplatz 1', 'www.stephansdom.at'),
(6, 'Aqua Terra', 'https://www.vienna.at/2018/12/ABD0082-20120913-4-3-227036432732-3643x2732.jpg', 'There you can see many different animals !', 'Museum', 'Fritz-GrÃ¼nbaum-Platz 1', 'https://www.haus-des-meeres.at/'),
(7, 'Donauturm', 'https://images.derstandard.at/img/2018/01/11/Donauturm-2BreiteKLEINER1200pix.jpg?tc=12&s=48a55f7e', 'Highest tower in vienna!', 'tower', ' DonauturmstraÃŸe 8', 'www.donauturm.at');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`event_id`);

--
-- Indizes für die Tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indizes für die Tabelle `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurants_id`);

--
-- Indizes für die Tabelle `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`todo_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `concerts`
--
ALTER TABLE `concerts`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurants_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `todo`
--
ALTER TABLE `todo`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
