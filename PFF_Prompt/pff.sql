-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2018 at 01:34 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pff`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int(4) DEFAULT NULL,
  `last_name` varchar(5) DEFAULT NULL,
  `first_name` varchar(4) DEFAULT NULL,
  `drafted_by` varchar(20) DEFAULT NULL,
  `draft_type` varchar(2) DEFAULT NULL,
  `draft_season` int(4) DEFAULT NULL,
  `draft_round` int(1) DEFAULT NULL,
  `draft_pick` int(3) DEFAULT NULL,
  `date_of_birth` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `last_name`, `first_name`, `drafted_by`, `draft_type`, `draft_season`, `draft_round`, `draft_pick`, `date_of_birth`) VALUES
(4317, 'Ryan', 'Matt', 'Atlanta Falcons', 'AD', 2008, 1, 3, '5/17/1985'),
(698, 'Brady', 'Tom', 'New England Patriots', 'AD', 2000, 6, 199, '8/3/1977');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `yards` int(3) DEFAULT NULL,
  `week` int(2) DEFAULT NULL,
  `touchdowns` int(1) DEFAULT NULL,
  `player_id` int(4) DEFAULT NULL,
  `on_home_team` varchar(5) DEFAULT NULL,
  `interceptions` int(1) DEFAULT NULL,
  `home_team` varchar(20) DEFAULT NULL,
  `completions` int(2) DEFAULT NULL,
  `away_team` varchar(20) DEFAULT NULL,
  `attempts` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`yards`, `week`, `touchdowns`, `player_id`, `on_home_team`, `interceptions`, `home_team`, `completions`, `away_team`, `attempts`) VALUES
(406, 5, 3, 698, 'FALSE', 0, 'Cleveland Browns', 28, 'New England Patriots', 40),
(376, 6, 3, 698, 'TRUE', 0, 'New England Patriots', 29, 'Cincinnati Bengals', 35),
(222, 7, 2, 698, 'FALSE', 0, 'Pittsburgh Steelers', 19, 'New England Patriots', 26),
(315, 8, 4, 698, 'FALSE', 0, 'Buffalo Bills', 22, 'New England Patriots', 33),
(316, 10, 0, 698, 'TRUE', 1, 'New England Patriots', 23, 'Seattle Seahawks', 32),
(280, 11, 4, 698, 'FALSE', 0, 'San Francisco 49ers', 24, 'New England Patriots', 40),
(286, 12, 1, 698, 'FALSE', 0, 'New York Jets', 30, 'New England Patriots', 50),
(269, 13, 1, 698, 'TRUE', 0, 'New England Patriots', 33, 'Los Angeles Rams', 46),
(406, 14, 3, 698, 'TRUE', 1, 'New England Patriots', 25, 'Baltimore Ravens', 38),
(188, 15, 0, 698, 'FALSE', 0, 'Denver Broncos', 16, 'New England Patriots', 32),
(214, 16, 3, 698, 'TRUE', 0, 'New England Patriots', 17, 'New York Jets', 27),
(276, 17, 3, 698, 'FALSE', 0, 'Miami Dolphins', 25, 'New England Patriots', 33),
(287, 19, 2, 698, 'TRUE', 2, 'New England Patriots', 18, 'Houston Texans', 38),
(384, 20, 3, 698, 'TRUE', 0, 'New England Patriots', 32, 'Pittsburgh Steelers', 42),
(466, 21, 2, 698, 'FALSE', 1, 'Atlanta Falcons', 43, 'New England Patriots', 62),
(334, 1, 2, 4317, 'TRUE', 0, 'Atlanta Falcons', 27, 'Tampa Bay Buccaneers', 39),
(396, 2, 3, 4317, 'FALSE', 1, 'Oakland Raiders', 26, 'Atlanta Falcons', 34),
(240, 3, 2, 4317, 'FALSE', 0, 'New Orleans Saints', 20, 'Atlanta Falcons', 30),
(503, 4, 4, 4317, 'TRUE', 1, 'Atlanta Falcons', 28, 'Carolina Panthers', 37),
(267, 5, 1, 4317, 'FALSE', 0, 'Denver Broncos', 15, 'Atlanta Falcons', 28),
(335, 6, 3, 4317, 'FALSE', 1, 'Seattle Seahawks', 27, 'Atlanta Falcons', 42),
(273, 7, 1, 4317, 'TRUE', 1, 'Atlanta Falcons', 22, 'Los Angeles Chargers', 34),
(288, 8, 3, 4317, 'TRUE', 0, 'Atlanta Falcons', 28, 'Green Bay Packers', 35),
(344, 9, 4, 4317, 'FALSE', 0, 'Tampa Bay Buccaneers', 25, 'Atlanta Falcons', 34),
(267, 10, 1, 4317, 'FALSE', 1, 'Philadelphia Eagles', 18, 'Atlanta Falcons', 33),
(269, 12, 2, 4317, 'TRUE', 1, 'Atlanta Falcons', 26, 'Arizona Cardinals', 34),
(297, 13, 1, 4317, 'TRUE', 1, 'Atlanta Falcons', 22, 'Kansas City Chiefs', 34),
(237, 14, 3, 4317, 'FALSE', 0, 'Los Angeles Rams', 18, 'Atlanta Falcons', 28),
(286, 15, 2, 4317, 'TRUE', 0, 'Atlanta Falcons', 17, 'San Francisco 49ers', 23),
(277, 16, 2, 4317, 'FALSE', 0, 'Carolina Panthers', 27, 'Atlanta Falcons', 33),
(331, 17, 4, 4317, 'TRUE', 0, 'Atlanta Falcons', 27, 'New Orleans Saints', 36),
(338, 19, 3, 4317, 'TRUE', 0, 'Atlanta Falcons', 26, 'Seattle Seahawks', 37),
(392, 20, 4, 4317, 'TRUE', 0, 'Atlanta Falcons', 27, 'Green Bay Packers', 38),
(284, 21, 2, 4317, 'TRUE', 0, 'Atlanta Falcons', 17, 'New England Patriots', 23);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
