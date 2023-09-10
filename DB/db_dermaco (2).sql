-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2023 at 10:35 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_dermaco`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_paswword` varchar(100) NOT NULL,
  `admin_contact` varchar(100) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_paswword`, `admin_contact`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123', '8281769433');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(11) NOT NULL auto_increment,
  `branch_name` varchar(100) NOT NULL,
  `branch_contact` int(11) NOT NULL,
  `branch_email` varchar(100) NOT NULL,
  `branch_password` varchar(100) NOT NULL,
  `location_id` int(11) NOT NULL,
  `branch_photo` varchar(500) NOT NULL,
  PRIMARY KEY  (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `branch_contact`, `branch_email`, `branch_password`, `location_id`, `branch_photo`) VALUES
(1, 'Dermacopvt op', 2147483647, 'dermacopvt@gmail.com', '987', 1, '7.png'),
(2, 'Dermadipvt', 2147483647, 'dermadi@gmail.com', '159', 2, 'p7.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL auto_increment,
  `district_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Idukki'),
(2, 'Ernakulam'),
(3, 'Kollam'),
(7, 'Kottayam'),
(8, 'Alappuzha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `location_id` int(11) NOT NULL auto_increment,
  `location_name` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  PRIMARY KEY  (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`location_id`, `location_name`, `place_id`) VALUES
(1, 'kacherithazham', 2),
(2, 'vannapuram', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL auto_increment,
  `place_name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(2, 'Thodupuzha', 1),
(3, 'Muvattupuzha', 2),
(4, 'Alappy', 8),
(5, 'Pala', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomdetails`
--

CREATE TABLE `tbl_roomdetails` (
  `room_id` int(11) NOT NULL auto_increment,
  `room_details` varchar(500) NOT NULL,
  `room_image` varchar(500) NOT NULL,
  `room_rate` varchar(100) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `room_service` varchar(500) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY  (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_roomdetails`
--

INSERT INTO `tbl_roomdetails` (`room_id`, `room_details`, `room_image`, `room_rate`, `room_type`, `room_service`, `branch_id`) VALUES
(3, 'Bathroom Attached room', '8.png', '3000', 'single', 'food Service', 1),
(4, '150x359ich room', 'Screenshot 2023-08-07 213815.png', '3000', 'Double', 'Food Services', 2),
(5, 'Big room', 'm0.png', '2000', 'Double', 'Food Services', 1),
(6, 'Nice Room', '1.png', '2000', 'single', 'Running Water Service', 1),
(7, 'Medium Sized Room', 'p1.png', '1000', 'single', 'Washing MAchine Availble', 2),
(8, 'big Room', 'Screenshot 2023-08-07 220356.png', '2000', 'single', 'Food Service available', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(100) NOT NULL,
  `user_contact` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_proof` varchar(500) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_photo`, `user_proof`, `user_password`, `place_id`) VALUES
(1, ' Sara ', ' 4562598458', 'sara@gmail.com', '4.png', '5.png', '1236', 2),
(2, 'Maya', '9856347522', 'maya@gmail.com', 'p7.png', '6.png', '456', 3);
