-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2018 at 11:12 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bis_doodle`
--

-- --------------------------------------------------------

--
-- Table structure for table `choice_dates`
--

CREATE TABLE `choice_dates` (
  `id_choice` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `id_pos_date` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choice_dates`
--

INSERT INTO `choice_dates` (`id_choice`, `id_participant`, `id_pos_date`, `id_event`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 2, 1, 1),
(6, 2, 4, 1),
(7, 3, 1, 1),
(8, 4, 2, 1),
(9, 4, 3, 1),
(10, 6, 5, 2),
(11, 6, 7, 2),
(12, 6, 8, 2),
(13, 6, 10, 2),
(14, 7, 5, 2),
(15, 7, 6, 2),
(16, 7, 9, 2),
(17, 8, 74, 4),
(18, 8, 75, 4),
(19, 9, 76, 5),
(20, 9, 79, 5),
(21, 9, 80, 5),
(22, 10, 78, 5),
(23, 10, 80, 5),
(24, 10, 81, 5),
(25, 11, 77, 5),
(26, 11, 79, 5),
(27, 11, 81, 5),
(28, 13, 76, 5),
(29, 13, 78, 5),
(30, 13, 79, 5),
(31, 13, 81, 5),
(32, 14, 77, 5),
(33, 14, 78, 5),
(34, 14, 79, 5),
(35, 14, 80, 5),
(36, 14, 81, 5),
(37, 15, 85, 7),
(38, 15, 86, 7),
(39, 15, 88, 7),
(40, 16, 84, 7),
(41, 16, 85, 7),
(42, 16, 82, 7),
(43, 16, 86, 7),
(44, 18, 86, 7),
(45, 19, 86, 7),
(46, 20, 90, 8),
(47, 20, 93, 8),
(48, 22, 90, 8),
(49, 22, 91, 8),
(50, 22, 92, 8);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author_name` varchar(60) NOT NULL,
  `place` varchar(255) DEFAULT NULL,
  `note` text,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_event`, `title`, `created_at`, `author_name`, `place`, `note`, `hash`) VALUES
(1, 'Marriage', '2018-09-07 10:45:03', 'Jean-Marc', 'Bruxelles', 'ptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incid', 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'Anniversaire', '2018-09-07 11:51:05', 'Patrick', 'Louvain-La-Neuve', 's unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fug', 'c81e728d9d4c2f636f067f89cc14862c'),
(3, 'Meeting', '2018-09-07 11:52:22', 'Jean-Marc', 'Louvain-La-Neuve', 's unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fug', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(4, 'Marriage', '2018-09-07 14:42:53', 'Patrick', 'Bruxelles', 'Rien', 'a87ff679a2f3e71d9181a67b7542122c'),
(5, 'Meeting', '2018-09-07 16:05:45', 'Willy', 'Louvain-La-Neuve', 'Rien', 'e4da3b7fbbce2345d7772b0674a318d5'),
(6, 'Anniversaire', '2018-09-07 16:55:13', 'Patrick', 'Louvain-La-Neuve', 'ptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incid', '1679091c5a880faf6fb5e6087eb1b2dc'),
(7, 'Marriage', '2018-09-11 09:17:05', 'Pierre', 'Bruxelles', 'Rien', '8f14e45fceea167a5a36dedd4bea2543'),
(8, 'Anniversaire', '2018-09-19 11:05:19', 'Patrick', 'Nullpart', 'ptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incid', 'c9f0f895fb98ab9159f51fd0297e236d');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id_participant` int(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id_participant`, `firstname`, `id_event`) VALUES
(1, 'Adam', 1),
(2, 'Pierre', 1),
(3, 'marie', 1),
(4, 'William', 1),
(5, 'jean', 1),
(6, 'Jean-Marc', 2),
(7, 'Adam', 2),
(8, 'Bernard', 4),
(9, 'Bernard', 5),
(10, 'Adam', 5),
(11, 'Jean-Marc', 5),
(12, 'Jean', 5),
(13, 'Paul', 5),
(14, 'Armand', 5),
(15, 'Bernard', 7),
(16, 'William', 7),
(17, 'Adam', 7),
(18, 'marie', 7),
(19, 'Marie2', 7),
(20, 'Bernard', 8),
(21, 'Jean', 8),
(22, 'Marc', 8);

-- --------------------------------------------------------

--
-- Table structure for table `possible_dates`
--

CREATE TABLE `possible_dates` (
  `id_pos_date` int(11) NOT NULL,
  `date` date NOT NULL,
  `hour` time DEFAULT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `possible_dates`
--

INSERT INTO `possible_dates` (`id_pos_date`, `date`, `hour`, `id_event`) VALUES
(1, '2018-09-08', '20:00:00', 1),
(2, '2018-09-15', '20:00:00', 1),
(3, '2018-09-22', '20:00:00', 1),
(4, '2018-10-13', '20:00:00', 1),
(5, '2018-09-08', '10:00:00', 2),
(6, '2018-09-08', '20:00:00', 2),
(7, '2018-09-16', '10:00:00', 2),
(8, '2018-09-16', '20:00:00', 2),
(9, '2018-09-22', '10:00:00', 2),
(10, '2018-09-22', '20:00:00', 2),
(11, '0000-00-00', '00:00:00', 3),
(12, '0000-00-00', '00:00:00', 3),
(13, '0000-00-00', '00:00:00', 3),
(14, '0000-00-00', '00:00:00', 3),
(15, '0000-00-00', '00:00:00', 3),
(71, '2018-09-23', '11:00:00', 4),
(72, '2018-09-30', '11:00:00', 4),
(73, '2018-09-14', '11:00:00', 4),
(74, '2018-09-19', '11:00:00', 4),
(75, '2018-09-25', '11:00:00', 4),
(76, '2018-09-09', '10:00:00', 5),
(77, '2018-09-16', '10:00:00', 5),
(78, '2018-09-23', '10:00:00', 5),
(79, '2018-10-12', '10:00:00', 5),
(80, '2018-11-10', '10:00:00', 5),
(81, '2018-12-15', '10:00:00', 5),
(82, '2018-09-13', '10:00:00', 7),
(83, '2018-09-13', '20:00:00', 7),
(84, '2018-09-12', '10:00:00', 7),
(85, '2018-09-12', '20:00:00', 7),
(86, '2018-09-22', '10:00:00', 7),
(87, '2018-09-22', '20:00:00', 7),
(88, '2018-09-30', '10:00:00', 7),
(89, '2018-09-30', '20:00:00', 7),
(90, '2018-09-21', '10:00:00', 8),
(91, '2018-09-21', '20:00:00', 8),
(92, '2018-09-23', '10:00:00', 8),
(93, '2018-09-23', '20:00:00', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choice_dates`
--
ALTER TABLE `choice_dates`
  ADD PRIMARY KEY (`id_choice`),
  ADD KEY `FK_id_participant` (`id_participant`),
  ADD KEY `FK_id_event(3)` (`id_event`),
  ADD KEY `FK_id_pos_date` (`id_pos_date`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id_participant`),
  ADD KEY `FK_id_event` (`id_event`);

--
-- Indexes for table `possible_dates`
--
ALTER TABLE `possible_dates`
  ADD PRIMARY KEY (`id_pos_date`),
  ADD KEY `FK_id_event(2)` (`id_event`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choice_dates`
--
ALTER TABLE `choice_dates`
  MODIFY `id_choice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `possible_dates`
--
ALTER TABLE `possible_dates`
  MODIFY `id_pos_date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choice_dates`
--
ALTER TABLE `choice_dates`
  ADD CONSTRAINT `FK_id_event(3)` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`),
  ADD CONSTRAINT `FK_id_participant` FOREIGN KEY (`id_participant`) REFERENCES `participants` (`id_participant`),
  ADD CONSTRAINT `FK_id_pos_date` FOREIGN KEY (`id_pos_date`) REFERENCES `possible_dates` (`id_pos_date`);

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `FK_id_event` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`);

--
-- Constraints for table `possible_dates`
--
ALTER TABLE `possible_dates`
  ADD CONSTRAINT `FK_id_event(2)` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
