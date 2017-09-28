-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2017 at 11:36 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

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

CREATE TABLE `article_user` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fol_apartment`
--

CREATE TABLE `fol_apartment` (
  `id` int(11) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `rent_amount` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lang` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fol_apartment`
--

INSERT INTO `fol_apartment` (`id`, `slug`, `rent_amount`, `area_id`, `lat`, `lang`) VALUES
(1, 'hyggeligt-raekkehus-med-central-beliggenhed', 30000, 1, 55.706631, 11.580622),
(2, 'utrolig-udsigtslejlighed-i-det-prisbelonnede-8', 12000, 1, 55.682789, 13.591911),
(3, 'stor-skon-villa-med-havudsigt', 18000, 2, 55.399837, 11.372463);

-- --------------------------------------------------------

--
-- Table structure for table `fol_city`
--

CREATE TABLE `fol_city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fol_city`
--

INSERT INTO `fol_city` (`id`, `name`) VALUES
(1, 'Kopenhagen'),
(2, 'Slagelse'),
(3, 'Hellerup');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nb_nesting`
--

CREATE TABLE `nb_nesting` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Nesting ';

--
-- Dumping data for table `nb_nesting`
--

INSERT INTO `nb_nesting` (`id`, `parent_id`, `name`) VALUES
(1, 0, 'North America'),
(2, 1, 'USA'),
(3, 2, 'California'),
(4, 2, 'Texas'),
(5, 1, 'Canada'),
(6, 1, 'San Francisco, CA'),
(7, 3, 'Los Angeles, CA'),
(8, 0, 'Europe'),
(9, 4, 'Italy'),
(10, 4, 'Germany');

-- --------------------------------------------------------

--
-- Table structure for table `sym_article`
--

CREATE TABLE `sym_article` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  `preview` tinyint(1) NOT NULL,
  `progres` int(11) NOT NULL,
  `kategorija_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sym_article`
--

INSERT INTO `sym_article` (`id`, `owner_id`, `title`, `time`, `location`, `body`, `preview`, `progres`, `kategorija_id`) VALUES
(1, 48, 'mikin post', '2012-01-01 00:00:00', '44.817457, 20.464354', 'ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 100, NULL),
(2, 49, 'perin post', '2012-01-01 00:00:00', '44.817457, 20.464354', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 0, 14, NULL),
(3, 48, 'Testovi monitora', '2012-01-01 00:00:00', '44.817457, 20.464354', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a...\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a...\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a...', 0, 100, NULL),
(4, 48, 'Najnoviji procesori', '2012-01-01 00:00:00', '44.817457, 20.464354', 'ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 0, 100, NULL),
(7, 56, 'Testovi monitora', '2012-01-01 00:00:00', '44.817457, 20.464354', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a...\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a...', 0, 100, NULL),
(8, 48, 'Testovi monitora', '2012-01-01 00:00:00', '44.817457, 20.464354', 'probni fgjghjghjghjghj', 0, 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sym_ideja`
--

CREATE TABLE `sym_ideja` (
  `id` int(11) NOT NULL,
  `text` longtext COLLATE utf8_unicode_ci,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sym_kategorija`
--

CREATE TABLE `sym_kategorija` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sym_kategorija`
--

INSERT INTO `sym_kategorija` (`id`, `title`) VALUES
(1, 'sport'),
(2, 'putovanja');

-- --------------------------------------------------------

--
-- Table structure for table `sym_roles`
--

CREATE TABLE `sym_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `can_read` tinyint(1) NOT NULL,
  `can_rw` tinyint(1) NOT NULL,
  `hname` varchar(24) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sym_user`
--

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
(25, 'admin', '$2y$13$DqDmj06uFq2oGNnkXOahCe4e9VyvDKf1d/VL.ibwaIfzwwxgDtWye', '["ROLE_ADMIN"]', 1, 'admin@example.com', 'administrator'),
(48, 'mika', '$2y$13$PIx9tJnckSndT0YCwv3yUemN/SOf9ZRyVDFaBax.kxUHGECHUtr4y', '["ROLE_NOVINAR"]', 1, 'mika@qw.com', 'mika'),
(49, 'pera', '$2y$13$pSgioxdvDwEy4okjETjhyuKHB5ypIL844uwfYieapKVi.ba/a1VC6', '["ROLE_NOVINAR"]', 1, 'pera@qw.com', 'pera'),
(50, 'laza', '$2y$13$TJDmN9u9p/RSbe6zM/Pig.gsGTj336NHOL.PjQWH5/8hNUgnufhG.', '["ROLE_MANAGER"]', 1, 'laza@qw.com', 'laza'),
(51, 'donald', '$2y$13$aq.c1rM3iP94ujmp1S6SHO/JOQSmLtaNdBrg8Ippk9DkAOZU6ySaa', '["ROLE_NARUCILAC"]', 1, 'r34rrrr@rrr.com', 'donald'),
(56, 'probni', '$2y$13$VlV9y3LZQmlzT05w2QVkFenXH1.OYwj3DBFNnVYXssdbBi8uBkIMG', '["ROLE_NOVINAR"]', 1, 'qweqweqweqwe@wer.yu', 'probni'),
(57, 'test55', '$2y$13$FKBoKFsFgqki6DsJRH23ce607FByvakjKSqi7nOADslR8KCMDdTvq', '["ROLE_MANAGER","ROLE_LEKTOR"]', 1, 'rrr34rr@rrr.com', 'test55');

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
-- Indexes for table `fol_apartment`
--
ALTER TABLE `fol_apartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fol_city`
--
ALTER TABLE `fol_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `nb_nesting`
--
ALTER TABLE `nb_nesting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sym_article`
--
ALTER TABLE `sym_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B8677DCD7E3C61F9` (`owner_id`),
  ADD KEY `IDX_B8677DCD8051CF1F` (`kategorija_id`);

--
-- Indexes for table `sym_ideja`
--
ALTER TABLE `sym_ideja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sym_kategorija`
--
ALTER TABLE `sym_kategorija`
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
-- AUTO_INCREMENT for table `fol_apartment`
--
ALTER TABLE `fol_apartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fol_city`
--
ALTER TABLE `fol_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nb_nesting`
--
ALTER TABLE `nb_nesting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sym_article`
--
ALTER TABLE `sym_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sym_ideja`
--
ALTER TABLE `sym_ideja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sym_kategorija`
--
ALTER TABLE `sym_kategorija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sym_roles`
--
ALTER TABLE `sym_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sym_user`
--
ALTER TABLE `sym_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
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
  ADD CONSTRAINT `FK_B8677DCD7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `sym_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B8677DCD8051CF1F` FOREIGN KEY (`kategorija_id`) REFERENCES `sym_kategorija` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
