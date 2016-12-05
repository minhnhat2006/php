-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2016 at 02:36 PM
-- Server version: 5.7.9-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `addressbook`
--
CREATE DATABASE IF NOT EXISTS `addressbook` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `addressbook`;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `entry_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;


-- --------------------------------------------------------

--
-- Table structure for table `group_connector`
--

CREATE TABLE IF NOT EXISTS `group_connector` (
  `group_connector_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_group_id` int(10) unsigned NOT NULL,
  `child_group_id` int(10) unsigned NOT NULL,
  `is_inherited` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_connector_id`),
  KEY `parent_group_id` (`parent_group_id`),
  KEY `child_group_id` (`child_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_connector_path`
--

CREATE TABLE IF NOT EXISTS `group_connector_path` (
  `group_connector_path_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_connector_id` int(10) unsigned NOT NULL,
  `parent_group_id` int(10) unsigned NOT NULL,
  `child_group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`group_connector_path_id`),
  KEY `group_connector_id` (`group_connector_id`),
  KEY `indirect_group_id` (`parent_group_id`),
  KEY `child_group_id` (`child_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_entry`
--

CREATE TABLE IF NOT EXISTS `group_entry` (
  `group_entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL,
  `entry_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`group_entry_id`),
  KEY `group_id` (`group_id`),
  KEY `entry_id` (`entry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entry`
--
ALTER TABLE `entry`
  ADD CONSTRAINT `entry_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `group_connector`
--
ALTER TABLE `group_connector`
  ADD CONSTRAINT `group_connector_ibfk_1` FOREIGN KEY (`parent_group_id`) REFERENCES `group` (`group_id`),
  ADD CONSTRAINT `group_connector_ibfk_2` FOREIGN KEY (`child_group_id`) REFERENCES `group` (`group_id`);

--
-- Constraints for table `group_connector_path`
--
ALTER TABLE `group_connector_path`
  ADD CONSTRAINT `group_connector_path_ibfk_1` FOREIGN KEY (`group_connector_id`) REFERENCES `group_connector` (`group_connector_id`),
  ADD CONSTRAINT `group_connector_path_ibfk_2` FOREIGN KEY (`parent_group_id`) REFERENCES `group` (`group_id`),
  ADD CONSTRAINT `group_connector_path_ibfk_3` FOREIGN KEY (`child_group_id`) REFERENCES `group` (`group_id`);

--
-- Constraints for table `group_entry`
--
ALTER TABLE `group_entry`
  ADD CONSTRAINT `group_entry_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`),
  ADD CONSTRAINT `group_entry_ibfk_2` FOREIGN KEY (`entry_id`) REFERENCES `entry` (`entry_id`);
