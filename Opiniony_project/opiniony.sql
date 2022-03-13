-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 31, 2021 at 03:42 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opiniony`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(2, 'places'),
(1, 'restaurant'),
(3, 'stores');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`country_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `name`) VALUES
(19, 'algeria'),
(3, 'America'),
(7, 'australia'),
(6, 'brazil'),
(5, 'california'),
(4, 'canada'),
(10, 'china'),
(1, 'egypt'),
(13, 'england'),
(11, 'france'),
(15, 'germany'),
(8, 'india'),
(12, 'italia'),
(9, 'korea'),
(20, 'kuwait'),
(18, 'morocco'),
(2, 'russia'),
(22, 'sauidi_arabia'),
(16, 'south_africa'),
(14, 'spain'),
(17, 'tunisia'),
(23, 'turkey'),
(21, 'uae');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `content` varchar(500) CHARACTER SET utf8 NOT NULL,
  `rate` int(50) NOT NULL DEFAULT '0',
  `image` varchar(200) DEFAULT NULL,
  `country_id` int(50) NOT NULL,
  `category_id` int(50) NOT NULL,
  `create_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`),
  KEY `country_id` (`country_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `content`, `rate`, `image`, `country_id`, `category_id`, `create_date_time`) VALUES
(1, 2, 'hello ,I tried subway in london and it wasn\'t good as it was in newyork ', -1, NULL, 13, 1, '2021-12-20 08:54:13'),
(3, 2, 'hello h&m was a good place for shopping with a good price.', 1, NULL, 19, 3, '2021-12-25 19:19:39'),
(4, 2, 'hello, did you go to pyramids .it is amazing place.', 8, NULL, 3, 2, '2021-12-25 19:29:21'),
(8, 2, 'hello ,I tried buffalo in Mansoura and it was good .', 1, NULL, 7, 1, '2021-12-25 23:47:25'),
(22, 2, 'how are you?\r\nNike has a wonderful collection this year.', 0, '18.jpg', 6, 3, '2021-12-30 16:59:22'),
(23, 2, 'hi, Eiffel tower is beautiful place to visit.', 0, '4.jpg', 11, 2, '2021-12-30 17:18:50'),
(24, 2, 'hhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '10.jpg', 9, 1, '2021-12-30 20:10:18'),
(25, 2, '\r\nGreat Wall of China it is huge and wonderful place in china .', 0, '1.jpg', 10, 2, '2021-12-31 17:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

DROP TABLE IF EXISTS `rate`;
CREATE TABLE IF NOT EXISTS `rate` (
  `rate_id` int(50) NOT NULL AUTO_INCREMENT,
  `rate` int(255) NOT NULL,
  `post_id` int(50) NOT NULL,
  PRIMARY KEY (`rate_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_id`, `rate`, `post_id`) VALUES
(1, 10, 4),
(2, 8, 4),
(3, 9, 4),
(6, 7, 4),
(7, 9, 4),
(8, 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `country_id` int(50) NOT NULL,
  `create_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `birthday`, `email`, `password`, `country_id`, `create_date_time`) VALUES
(2, 'jina', '2001-05-02', 'jina@gmail.com', '12345678', 1, '2021-12-17 09:41:17'),
(5, 'hala', '1989-10-20', 'hala@gmail.com', '987654321', 7, '2021-12-17 11:39:43'),
(6, 'hassan', '1988-06-02', 'hassan@gmail.com', '987654321', 20, '2021-12-24 19:13:21'),
(7, 'rahma', '2021-12-05', 'hhhh@gmail.com', '172001', 1, '2021-12-28 11:53:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
