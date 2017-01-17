-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2017 at 11:56 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logan`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_user`
--

DROP TABLE IF EXISTS `article_user`;
CREATE TABLE `article_user` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sym_article`
--

DROP TABLE IF EXISTS `sym_article`;
CREATE TABLE `sym_article` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  `preview` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'da li je post u preview modu',
  `progres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sym_article`
--

INSERT INTO `sym_article` (`id`, `owner_id`, `title`, `time`, `location`, `body`, `preview`, `progres`) VALUES
(25, 46, 'qweqweqwe', '2012-01-01 00:00:00', '44.817457, 20.464354', 'sliderrtytyrtyrtyrty', 1, 44);

-- --------------------------------------------------------

--
-- Table structure for table `sym_ideja`
--

DROP TABLE IF EXISTS `sym_ideja`;
CREATE TABLE `sym_ideja` (
  `id` int(11) NOT NULL,
  `text` longtext COLLATE utf8_unicode_ci,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sym_roles`
--

DROP TABLE IF EXISTS `sym_roles`;
CREATE TABLE `sym_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `can_read` tinyint(1) NOT NULL,
  `can_rw` tinyint(1) NOT NULL,
  `hname` varchar(24) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sym_roles`
--

INSERT INTO `sym_roles` (`id`, `name`, `can_read`, `can_rw`, `hname`) VALUES
(67, 'ROLE_SAVETNIK', 0, 0, 'savetnik');

-- --------------------------------------------------------

--
-- Table structure for table `sym_user`
--

DROP TABLE IF EXISTS `sym_user`;
CREATE TABLE `sym_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json_array)',
  `is_active` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(24) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sym_user`
--

INSERT INTO `sym_user` (`id`, `username`, `password`, `roles`, `is_active`, `email`, `ime`) VALUES
(23, 'ron', '$2y$13$ISvCgSU8dfvuORJrkYWyyuWgWB9C4EmolfA65a12IgT9DR04KGW.a', '["ROLE_NOVINAR"]', 1, 'ron@example.com', 'ronald'),
(24, 'mike', '$2y$13$LwYWEcyei1UjcC2cmGJZ5OvH.BJVyRksDKd4LMOntg3EW2OwXUZ66', '["ROLE_NOVINAR"]', 1, 'mike@example.com', 'michael'),
(25, 'admin', '$2y$13$DqDmj06uFq2oGNnkXOahCe4e9VyvDKf1d/VL.ibwaIfzwwxgDtWye', '["ROLE_ADMIN"]', 1, 'admin@example.com', 'administrator'),
(44, 'sav', '$2y$13$fDF5RAqlEDbn9dYFzBuqYeTPCuUdxOUrZQRqbv5gxOdcjcTfU.0Pe', '["ROLE_SAVETNIK"]', 1, 'wesdfsr@wer.lm', 'savetnik'),
(45, 'we', '$2y$13$DJx3KavW677PeYX2iweN6.NWZ9sPgXlZICe.XTnzMadwi5w2OQBOi', '["ROLE_RW"]', 1, 'qe@q.m', 'we'),
(46, 'test4', '$2y$13$DFJlvBAWl3t0TXjjqoViyu/Ylj7rA88vX0ZqnO614mumoTX9ZFfzi', '["ROLE_NOVINAR"]', 1, 'ssss@www.yu', 'test4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_user`
--
ALTER TABLE `article_user`
  ADD PRIMARY KEY (`article_id`,`user_id`),
  ADD KEY `IDX_3DD151487294869C` (`article_id`),
  ADD KEY `IDX_3DD15148A76ED395` (`user_id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `sym_article`
--
ALTER TABLE `sym_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B8677DCD7E3C61F9` (`owner_id`);

--
-- Indexes for table `sym_ideja`
--
ALTER TABLE `sym_ideja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sym_roles`
--
ALTER TABLE `sym_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sym_user`
--
ALTER TABLE `sym_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9CF39129F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_9CF3912935C246D5` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sym_article`
--
ALTER TABLE `sym_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sym_ideja`
--
ALTER TABLE `sym_ideja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sym_roles`
--
ALTER TABLE `sym_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `sym_user`
--
ALTER TABLE `sym_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_user`
--
ALTER TABLE `article_user`
  ADD CONSTRAINT `FK_3DD151487294869C` FOREIGN KEY (`article_id`) REFERENCES `sym_article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3DD15148A76ED395` FOREIGN KEY (`user_id`) REFERENCES `sym_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sym_article`
--
ALTER TABLE `sym_article`
  ADD CONSTRAINT `FK_B8677DCD7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `sym_user` (`id`) ON DELETE CASCADE;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
