-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 03:13 AM
-- Server version: 5.1.54
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taketwo`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminx`
--

CREATE TABLE IF NOT EXISTS `adminx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminUname` varchar(50) NOT NULL,
  `adminPwd` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `adminx`
--

INSERT INTO `adminx` (`id`, `adminUname`, `adminPwd`) VALUES
(1, 'Aditya', 'aditya1234'),
(2, 'Irfaan', 'irfaan1234');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clnFn` varchar(50) NOT NULL,
  `clnLn` varchar(50) NOT NULL,
  `clnUn` varchar(50) NOT NULL,
  `clnEmail` varchar(50) NOT NULL,
  `clnPhone` varchar(10) NOT NULL,
  `clnPwd` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `clnFn`, `clnLn`, `clnUn`, `clnEmail`, `clnPhone`, `clnPwd`) VALUES
(1, 'user1', 'aaa', 'user111', 'user1@gmail.com', '5111 1111', 'u111'),
(2, 'user2', 'bbb', 'user222', 'user2@gmail.com', '5222 2222', 'u222'),
(3, 'user3', 'ccc', 'user333', 'user3@gmail.com', '5333 3333', 'u333'),
(4, 'user4', 'ddd', 'user444', 'user4@gmail.com', '5444 4444', 'u444'),
(5, 'user5', 'eee', 'user555', 'user5@gmail.com', '5555 5555', 'u555'),
(30, 'Irfaan', 'Chundoo', 'irfan2023', 'irfann@gmail.com', '5738 2873', 'irfaan2023'),
(31, 'aaaaaaaaaaaaaaa', 'bbbbbbbbbbbbbbbbbbb', 'asdfghjkl', 'aaaaaaaaaaaa@gmail.com', '5888 8888', 'password4'),
(15, 'Sarah', 'Johnes', 'SaraJ01', 'saraH@gmail.com', '5673 3633', 'sarah123456'),
(27, 'Jennifer', 'Taii', 'JenTaii', 'jenTaii@gmail.com', '5673 3633', 'jenny');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cName` varchar(50) NOT NULL,
  `cSurname` varchar(50) NOT NULL,
  `cAge` varchar(6) NOT NULL,
  `cgender` varchar(5) NOT NULL,
  `cQuality_service` varchar(10) NOT NULL,
  `cPhoto_quality` varchar(10) NOT NULL,
  `cRecommend` varchar(10) NOT NULL,
  `cSuggestion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `cName`, `cSurname`, `cAge`, `cgender`, `cQuality_service`, `cPhoto_quality`, `cRecommend`, `cSuggestion`) VALUES
(1, 'Test', 'oneeeeeee', '10', '1', '1', '1', '100', 'The besttttttttttt'),
(2, 'again', 'test twoo', '100', '1', '100', '100', '100', '2nd testing'),
(3, 'again', 'oneeeeeee', '0', '', '', '', '', 'no'),
(4, 'hfhf', 'eeeee', '31', 'F', '', '', '', 'did it work?\\r\\n'),
(5, 'qqqqqqqqq', 'qqqqqqqq', '60', 'F', '', '', '', ''),
(6, 'qqqqqqqqq', 'qqqqqqqq', '31-60', 'X', 'Average', 'Good', 'No', 'hi'),
(7, 'Test', 'oneeeeeee', '0-30', 'M', 'Poor', 'Low', 'Yes', 'hiiiiiiiiiiii'),
(8, 'Irfaan', 'Irfaan', '0-30', 'M', 'Excellent', 'Vgood', 'Yes', 'Test, all 3 forms'),
(9, 'aditya', 'doula', '0-30', 'M', 'Excellent', 'Vgood', 'Yes', 'test @23.39');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cName` varchar(50) NOT NULL,
  `cSurname` varchar(50) NOT NULL,
  `cEmail` varchar(100) NOT NULL,
  `cMessage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `cName`, `cSurname`, `cEmail`, `cMessage`) VALUES
(1, 'test', 'one', '1@q.com', '1'),
(2, 'John', 'john', '1@q.com', 'Hi wanted to test'),
(3, 'Irfaan ', 'Irfaan', 'irfaan@gmail.com', 'testingg'),
(4, 'aditya', 'doula', 'aditya@gmail.com', '20/08/23 @23.37\\r\\n');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cName` varchar(50) NOT NULL,
  `cSurname` varchar(50) NOT NULL,
  `cPhone` varchar(10) NOT NULL,
  `cEmail` varchar(100) NOT NULL,
  `cMeeting_date` date NOT NULL,
  `cMessage` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `cName`, `cSurname`, `cPhone`, `cEmail`, `cMeeting_date`, `cMessage`) VALUES
(1, 'John', 'Doe', '5123', '1@gmail.com', '2023-08-14', 'Test 1 on today'),
(2, 'John', 'Doe', '5123', 'r33r@gmail.com', '2023-08-14', 'test 2'),
(3, 'Sara', 'John', '5123', 'sara@gmail.com', '2023-08-14', 'new test to see if full phone number gets inserted'),
(4, 'Sara', 'John', '5123', 'sara@gmail.com', '2023-08-14', 'jfnnnnnrjj'),
(5, 'Sara', 'John', '5123', 'sara@gmail.com', '2023-08-15', ''),
(6, 'Sara', 'Doe', '5123 4567', 'sara@gmail.com', '2023-08-08', 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii'),
(7, 'Sara', 'John', '56733738', 'sara@gmail.com', '2023-08-25', 'it worksssssssssssss'),
(8, 'John ', 'Doe', '5123 4567', 'r33r@gmail.com', '2023-07-06', 'Hello again, does it work?'),
(9, 'not', 'login', '5000 0000', 'notloggin@gmail.com', '2023-08-18', 'test, this has not be logged in'),
(10, 'Irfaan', 'Chundoo', '5123 4567', 'Irfaan@gmail.com', '2023-08-23', 'Testingg'),
(11, 'aditya', 'doula', '5123 4567', 'aditya@gmail.com', '2023-08-20', '@23.38');
