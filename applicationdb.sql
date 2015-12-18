-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 18 дек 2015 в 08:55
-- Версия на сървъра: 5.6.26
-- PHP Version: 7.0.0RC6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applicationdb`
--

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `comment_text` varchar(3000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`id`, `comment_text`, `user_id`, `date_time`) VALUES
(6, '<img alt="" src="https://pbs.twimg.com/profile_images/663653377017061376/C8hg9fpl.jpg">', 2, '2015-12-18 18:46:37'),
(8, 'test Daragan', 2, '2015-12-18 18:45:22'),
(13, 'time zone test edit', 1, '2015-12-18 17:14:27'),
(17, 'edit test 12', 1, '2015-12-18 17:15:29'),
(19, 'test end', 1, '2015-12-18 17:41:00'),
(20, '<ul><li><b><i><u>test second</u></i></b></li></ul>', 1, '2015-12-18 17:55:28'),
(21, 'tes<b>sttts</b>', 5, '2015-12-18 17:56:43'),
(22, '<img alt="" src="https://pbs.twimg.com/profile_images/663653377017061376/C8hg9fpl.jpg">', 1, '2015-12-18 18:47:53');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Filip', '$2y$10$QzCSbtNgdrcxM39qoH878eBVKBqq1ggho3Jikg.j7lm2EM71VS1fW'),
(2, 'Dragan', '$2y$10$V2YHSSKT8EcQ.iir2BX6r.oiTMDYH9wftyy1IzaikFANYA4MSJw0G'),
(4, 'dffsf', '$2y$10$k6wHfxDNGlI9Kx4Vw8zRkud688IRwfkhi3jwgw5qU0NmQqqA9wJ2u'),
(5, 'testt', '$2y$10$iB8uTohMv7tp6RKugSZlvOahMMpn7.Qzn1oslPzixNd9zmjEwVof6'),
(6, 'second', '$2y$10$5lL76iszTXhXdoxwm7vKXuZ2mKLJOCxo5cxacYn/HHpxKaBZ4vme.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
