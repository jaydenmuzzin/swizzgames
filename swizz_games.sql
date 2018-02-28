-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2017 at 05:13 AM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swizz_games`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `developer` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `year` smallint(4) NOT NULL,
  `description` text,
  `coverart` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `developer`, `publisher`, `year`, `description`, `coverart`) VALUES
(1, 'Overwatch', 'Blizzard Entertainment', 'Blizzard Entertainment', 2016, 'Multiplayer first-person shooter, where two teams of six heroes with completely unique abilites face against each other in different modes.', 'https://cdn0.vox-cdn.com/uploads/chorus_image/image/53691749/overwatch-4k.0.0.jpg'),
(9, 'Doom', 'id Software', 'Bethesda Softworks', 2016, 'An FPS where you play as an unarmed marine battling against demonic forces from Hell as they try to take over Mars.', 'https://i.ytimg.com/vi/B55t28q2ceA/maxresdefault.jpg'),
(10, 'Tetris', 'List', 'List', 1984, 'A tile-matching puzzle game where you must use blocks called ''Tetriminos'' to clear a certain number of lines to advance to the next level.', 'https://upload.wikimedia.org/wikipedia/en/7/7c/Tetris-VeryFirstVersion.png'),
(12, 'Call of Duty 4: Modern Warfare', 'Infinity Ward', 'Activision', 2007, 'FPS taking place in modern times where players engage in tactical gameplay using modern equipment, and compete in different modes.', 'http://vignette4.wikia.nocookie.net/callofduty/images/a/a2/Call_of_Duty_4_Modern_Warfare_Remaster_Trailer_Screenshot_5.jpg/revision/latest?cb=20160502210100'),
(13, 'Crash Bandicoot', 'Naughty Dog', 'Sony Computer Enterainment', 1996, 'Platformer where you play as Crash Bandicoot in an attempt to stop the evil Dr. Neo Cortex by completing progressively harder levels.', 'https://r.mprd.se/media/images/36716-Crash_Bandicoot_[U]-7.png'),
(14, 'Spyro the Dragon', 'Insomniac Games', 'Sony Computer Enterainment', 1998, 'Players control a dragon named Spyro in this platformer, exploring different realms and worlds, in order to save elders trapped in crystal, reclaim stolen treasure and defeat antagonist Gnasty Gnorc.', 'https://r.mprd.se/media/images/52800-Spyro_the_Dragon_(E)-2.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
