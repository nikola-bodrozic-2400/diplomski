-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2016 at 12:44 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

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
  `body` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sym_article`
--

INSERT INTO `sym_article` (`id`, `owner_id`, `title`, `time`, `location`, `body`) VALUES
(20, 23, 'Testovi monitora', '2016-05-08 09:00:00', '44.817457, 20.464354', 'When its, 2560 x 1440 models with 144Hz+ refresh rates have proven popular choices for those wanting a combination of speed and image performance. Models like the Dell S2716DG combine exceptional responsiveness with attractive features such as a 2560 x 1440 resolution and the inclusion of Nvidia G-SYNC variable refresh rate technologies. Some users prefer either smaller screens, a slightly higher pixel density, something a little cheaper or perhaps a combination of these. The AOC AG241QX, of the company’s new AGON range, heeds the call of such users. This shrinks things down into a 23.8” screen size, keeping key attractive features such as a 144Hz refresh rate and 2560 x 1440 resolution. We take a look at this model and see whether this product is as interesting in practice as it is on paper.\r\n\r\nSpecifications\r\n\r\nThe monitor uses a 23.8” TN (Twisted Nematic) panel with support for a 144Hz refresh rate. This panel offers true 8-bit colour without dithering and boasts a 1ms grey to grey response time. As usual you shouldn’t put too much weight into such a specification. Some of the key ‘talking points’ of this monitor have been highlighted in blue below.'),
(24, 24, 'Printer of year', '2011-01-01 00:00:00', '44.817457, 20.464354', 'sit amet, consectetur adipiscing elit. Mauris ornare lorem vel metus varius semper. Nulla molestie nulla id tellus elementum finibus. Nulla condimentum mauris sed loreulis nec a arcu. Curabitur nisl tellus, vulputate a erat in, aliquam pulvinar lorem. Sed in pretium sem. Suspendisse potenti. Sed vitae libero maximus, mattis magna in, eleifend lacus. Etiam blandit vehicula mauris, ut lacinia ante condimentum eu.\r\n\r\nAenean maximus quam eu dolor pharetra euismod. Fusce vitae porta neque. Fusce vestibulum neque lacus, nec viverra nulla feugiat at. Fusce non venenatis odio, id congue elit. In luctus risus id turpis ornare aliquet. Vestibulum efficitur mollis quam, ut consectetur metus lacinia in. Vivamus ut dictum libero. Integer erat augue, dictum quis auctor et, eleifend vitae lacus. Ut cursus accumsan lorem ac congue. Suspendisse laoreet suscipit dignissim. Aliquam vehicula efficitur urna sit amet pharetra. Suspendisse sed tempor justo, a commodo justo. Proin ut sem risus. Ut consectetur velit quis sollicitudin bibendum. Ut congue, mauris quis sagittis fermentum, diam ante euismod ante, sit amet ornare augue dolor eget elit.');

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
(67, 'ROLE_SAVETNIK', 0, 0, 'savetnik'),
(68, 'ROLE_RW', 1, 1, 'rw');

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
(45, 'we', '$2y$13$DJx3KavW677PeYX2iweN6.NWZ9sPgXlZICe.XTnzMadwi5w2OQBOi', '["ROLE_RW"]', 1, 'qe@q.m', 'we');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sym_roles`
--
ALTER TABLE `sym_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `sym_user`
--
ALTER TABLE `sym_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
