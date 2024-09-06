-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 11:50 AM
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
(2, 'Aqsaa', 'aqsaa1234');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `clnFn`, `clnLn`, `clnUn`, `clnEmail`, `clnPhone`, `clnPwd`) VALUES
(1, 'user1', 'aaa', 'user111', 'user1@gmail.com', '5111 1111', 'u111'),
(2, 'user2', 'bbb', 'user222', 'user2@gmail.com', '5222 2222', 'u222'),
(3, 'user3', 'ccc', 'user333', 'user3@gmail.com', '5333 3333', 'u333'),
(4, 'user4', 'ddd', 'user444', 'user4@gmail.com', '5444 4444', 'u444'),
(5, 'user5', 'eee', 'user555', 'user5@gmail.com', '5555 5555', 'u555'),
(6, 'Jennifer', 'Taii', 'jentaii', 'jentaii@gmail.com', '5673 7837', 'jenny'),
(7, 'Phoenix', 'Flame', 'phoenixfire', 'phoenix.flame@example.com', '5550 1111', 'burningpassion'),
(8, 'Skyler', 'Wolfe', 'wolfstorm', 'skyler.wolfe@example.com', '5551 2222', 'moonhowl'),
(9, 'Alexa', 'Midnight', 'midnightecho', 'alexa.midnight@example.com', '5552 3333', 'shadowwhisper'),
(10, 'Raven', 'Shadow', 'shadowraven', 'raven.shadow@example.com', '5553 4444', 'darknessfalls'),
(11, 'Scarlett', 'Rose', 'scarlettrose', 'scarlett.rose@example.com', '5554 5555', 'redpetals'),
(12, 'Phoenix', 'Blaze', 'phoenixblaze', 'phoenix.blaze@example.com', '5555 6666', 'firebird'),
(13, 'Serenity', 'Waves', 'serenitywaves', 'serenity.waves@example.com', '5556 7777', 'oceanbreeze'),
(14, 'Blaze', 'Storm', 'blazestorm', 'blaze.storm@example.com', '5557 8888', 'thunderstrike'),
(15, 'Apollo', 'Light', 'apollolight', 'apollo.light@example.com', '5558 9999', 'sunbeam'),
(16, 'Luna', 'Shadow', 'lunashadow', 'luna.shadow@example.com', '5559 0000', 'moonlight'),
(17, 'Aurora', 'Borealis', 'auroraborealis', 'aurora.borealis@example.com', '5550 1111', 'northernlights'),
(18, 'Orion', 'Night', 'oriannight', 'orion.night@example.com', '5551 2222', 'stargazer'),
(19, 'Luna', 'Starshine', 'lunastar', 'luna.starshine@example.com', '5556 1234', 'starrynight'),
(20, 'Xander', 'Frost', 'frostbite', 'xander.frost@example.com', '5557 9876', 'frozenheart'),
(21, 'Aurora', 'Blaze', 'aurorab', 'aurora.blaze@example.com', '5558 5678', 'firestorm'),
(22, 'Nova', 'Storm', 'nova_89', 'nova.storm@example.com', '5559 2345', 'lightningstrike');

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
  `cProduct_quality` varchar(10) NOT NULL,
  `cRecommend` varchar(10) NOT NULL,
  `cSuggestion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `cName`, `cSurname`, `cAge`, `cgender`, `cQuality_service`, `cProduct_quality`, `cRecommend`, `cSuggestion`) VALUES
(1, 'Luna', 'Starshine', '0-30', 'F', 'Good', 'Very Good', 'Yes', 'I love your products! They are of excellent quality.'),
(2, 'Xander', 'Frost', '31-60', 'M', 'Average', 'Good', 'Maybe', 'The service was good, but the product quality could be improved.'),
(3, 'Aurora', 'Blaze', '61-100', 'F', 'Excellent', 'Very Good', 'Yes', 'I recommend your products to everyone! They are amazing.'),
(4, 'Nova', 'Storm', '0-30', 'M', 'Good', 'Average', 'Yes', 'I had a good experience with your service, but the product quality was average.'),
(5, 'Phoenix', 'Flame', '31-60', 'F', 'Very Good', 'Good', 'Yes', 'I really love your products! They exceeded my expectations.'),
(6, 'Skyler', 'Wolfe', '61-100', 'M', 'Good', 'Very Good', 'Maybe', 'The service was good overall, but I think the product quality could be better.'),
(7, 'Alexa', 'Midnight', '0-30', 'F', 'Excellent', 'Excellent', 'Yes', 'Your products are fantastic! I''m a satisfied customer.'),
(8, 'Raven', 'Shadow', '31-60', 'M', 'Good', 'Very Good', 'Yes', 'I had a good experience with your service. The product quality was very good.'),
(9, 'Scarlett', 'Rose', '61-100', 'F', 'Excellent', 'Excellent', 'Yes', 'I love your products! The quality is excellent.'),
(10, 'Phoenix', 'Blaze', '0-30', 'M', 'Very Good', 'Good', 'Yes', 'Your products are really good. I would recommend them to others.'),
(11, 'Serenity', 'Waves', '31-60', 'F', 'Good', 'Average', 'Maybe', 'The service was good, but I think there''s room for improvement in product quality.'),
(12, 'Blaze', 'Storm', '61-100', 'M', 'Excellent', 'Very Good', 'Yes', 'Your products are excellent! I''m very satisfied with my purchase.'),
(13, 'Apollo', 'Light', '0-30', 'X', 'Good', 'Average', 'No', 'I had a good experience with your service. The product quality was average.'),
(14, 'Luna', 'Shadow', '31-60', 'M', 'Average', 'Good', 'Maybe', 'I think your products are good, but there''s room for improvement in quality.'),
(15, 'Aurora', 'Borealis', '61-100', 'F', 'Excellent', 'Excellent', 'Yes', 'I love your products! They are of top-notch quality.'),
(16, 'Orion', 'Night', '0-30', 'X', 'Good', 'Very Good', 'Yes', 'Your products are good. I would recommend them to others.'),
(17, 'Draco', 'Malfoy', '31-60', 'M', 'Average', 'Good', 'No', 'The service was satisfactory, but the product quality could be improved.'),
(18, 'Bellatrix', 'Lestrange', '61-100', 'F', 'Good', 'Very Good', 'Maybe', 'The service was good, but I expected better quality products.'),
(19, 'Hermione', 'Granger', '0-30', 'X', 'Excellent', 'Excellent', 'Yes', 'Your products are excellent! I highly recommend them.'),
(20, 'Ron', 'Weasley', '31-60', 'M', 'Good', 'Average', 'Maybe', 'I think your products are good, but the service could be improved.'),
(21, 'Ginny', 'Weasley', '61-100', 'F', 'Very Good', 'Good', 'Yes', 'Your products are really good. I would definitely recommend them to others.'),
(22, 'Harry', 'Potter', '0-30', 'M', 'Very Good', 'Good', 'Yes', 'I love your products! They are amazing.'),
(23, 'Luna', 'Starshine', '31-60', 'F', 'Good', 'Average', 'Maybe', 'The service was good, but I think the product quality could be improved.'),
(24, 'Neville', 'Longbottom', '61-100', 'M', 'Excellent', 'Very Good', 'Yes', 'I love your products! They are excellent quality.'),
(25, 'Luna', 'Starshine', '0-30', 'M', 'Very Good', 'Good', 'Yes', 'Your products are very good. I recommend them to others.'),
(26, 'Ginny', 'Weasley', '31-60', 'F', 'Good', 'Average', 'Maybe', 'The service was good, but I think the product quality could be improved.'),
(27, 'Hermione', 'Granger', '61-100', 'M', 'Excellent', 'Very Good', 'Yes', 'I love your products! They are of excellent quality.'),
(28, 'Luna', 'Starshine', '0-30', 'F', 'Good', 'Very Good', 'Yes', 'Your products are really good. I love them.'),
(29, 'Luna', 'Starshine', '31-60', 'F', 'Good', 'Average', 'Maybe', 'The service was good, but I think the product quality could be better.'),
(30, 'Luna', 'Starshine', '61-100', 'F', 'Excellent', 'Excellent', 'Yes', 'I love your products! They are amazing.'),
(31, 'Luna', 'Starshine', '0-30', 'F', 'Very Good', 'Good', 'Yes', 'Your products are very good. I recommend them to others.'),
(32, 'Luna', 'Starshine', '31-60', 'F', 'Good', 'Average', 'Maybe', 'The service was good, but I think the product quality could be improved.'),
(33, 'Luna', 'Starshine', '61-100', 'F', 'Excellent', 'Very Good', 'Yes', 'I love your products! They are of excellent quality.');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cName` varchar(50) NOT NULL,
  `cSurname` varchar(50) NOT NULL,
  `cEmail` varchar(100) NOT NULL,
  `cMessage` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `cName`, `cSurname`, `cEmail`, `cMessage`) VALUES
(1, 'Luna', 'Starshine', 'luna.starshine@example.com', 'Hello, I''m interested in your products. Can you provide me with some information about the prices?'),
(2, 'Xander', 'Frost', 'xander.frost@example.com', 'Hi there, I''m considering making a purchase. Could you please send me a catalog along with the prices?'),
(3, 'Aurora', 'Blaze', 'aurora.blaze@example.com', 'Good day! I''m Aurora and I''m curious about your services. Can you give me a quote for the items I''m interested in?'),
(4, 'Nova', 'Storm', 'nova.storm@example.com', 'Greetings! I''m Nova and I''m looking to buy some of your products. Could you let me know if there are any special offers available?'),
(5, 'Phoenix', 'Flame', 'phoenix.flame@example.com', 'Hey, I''m interested in your merchandise. Can you provide details on the pricing and any ongoing promotions?'),
(6, 'Skyler', 'Wolfe', 'skyler.wolfe@example.com', 'Hi, I''m Skyler and I''m interested in purchasing your goods. Can you please let me know if there are any discounts available?'),
(7, 'Alexa', 'Midnight', 'alexa.midnight@example.com', 'Hello, I''m considering making a purchase from your store. Could you provide me with a price list for your products?'),
(8, 'Raven', 'Shadow', 'raven.shadow@example.com', 'Hi there, I''m Raven and I''m interested in your offerings. Can you provide me with pricing information for the items I''m interested in?'),
(9, 'Scarlett', 'Rose', 'scarlett.rose@example.com', 'Greetings! I''m Scarlett and I''m interested in buying from you. Can you please send me details about the prices?'),
(10, 'Phoenix', 'Blaze', 'phoenix.blaze@example.com', 'Hello, I''m interested in your products. Can you provide me with pricing information and any ongoing promotions?'),
(11, 'Serenity', 'Waves', 'serenity.waves@example.com', 'Hi, I''m Serenity and I''m considering purchasing from your store. Can you provide me with pricing details for the items I''m interested in?'),
(12, 'Blaze', 'Storm', 'blaze.storm@example.com', 'Hey there, I''m interested in making a purchase. Can you please send me information about the prices?'),
(13, 'Xander', 'Frost', 'xander.frost@example.com', 'I''m Xander again! Just wanted to follow up on my previous inquiry. Any updates on the pricing?'),
(14, 'Skyler', 'Wolfe', 'skyler.wolfe@example.com', 'Hi, it''s Skyler here. I have some questions regarding the prices. Can you assist me with that?'),
(15, 'Aurora', 'Blaze', 'aurora.blaze@example.com', 'Hello again! Aurora here. I noticed your prices have changed. Could you explain the updates?'),
(16, 'Luna', 'Starshine', 'luna.starshine@example.com', 'Hey, Luna here. I''m ready to make a purchase. Can you provide me with the buying process?'),
(17, 'Jennifer', 'Taii', 'jentaii@gmail.com', 'Hi, Jenny here!. I''m ready to buy! Could you confirm the prices before I proceed?'),
(18, 'Luna', 'Starshine', 'luna.starshine@example.com', 'Hey, i wanted to know if discounts are available on large reservation price?'),
(19, 'Luna', 'Starshine', 'luna.starshine@example.com', 'I want to buy 3 photos from your portrait gallery and 2 more from your still life collection, I also wanted to discuss a photo shoot ?');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `cName`, `cSurname`, `cPhone`, `cEmail`, `cMeeting_date`, `cMessage`) VALUES
(1, 'Luna', 'Starshine', '5556 1234', 'luna.starshine@example.com', '2024-05-15', 'Booking for a custom portrait session.'),
(2, 'Xander', 'Frost', '5557 9876', 'xander.frost@example.com', '2024-05-20', 'Reserving a spot for the outdoor photo shoot event.'),
(3, 'Aurora', 'Blaze', '5558 5678', 'aurora.blaze@example.com', '2024-05-25', 'Making a reservation for the sunset photography workshop.'),
(4, 'Nova', 'Storm', '5559 2345', 'nova.storm@example.com', '2024-06-01', 'Booking for a family portrait session.'),
(5, 'Phoenix', 'Flame', '5550 1111', 'phoenix.flame@example.com', '2024-06-05', 'Reserving a slot for the newborn baby photoshoot.'),
(6, 'Skyler', 'Wolfe', '5551 2222', 'skyler.wolfe@example.com', '2024-06-10', 'Making a reservation for the pet photography session.'),
(7, 'Alexa', 'Midnight', '5552 3333', 'alexa.midnight@example.com', '2024-06-15', 'Booking for a corporate headshot session.'),
(8, 'Raven', 'Shadow', '5553 4444', 'raven.shadow@example.com', '2024-06-20', 'Reserving a spot for the fashion photography workshop.'),
(9, 'Scarlett', 'Rose', '5554 5555', 'scarlett.rose@example.com', '2024-06-25', 'Making a reservation for the engagement photoshoot.'),
(10, 'Phoenix', 'Blaze', '5555 6666', 'phoenix.blaze@example.com', '2024-06-30', 'Booking for a custom wedding photography package.'),
(11, 'Serenity', 'Waves', '5556 7777', 'serenity.waves@example.com', '2024-07-05', 'Reserving a slot for the maternity photoshoot.'),
(12, 'Blaze', 'Storm', '5557 8888', 'blaze.storm@example.com', '2024-07-10', 'Making a reservation for the graduation portrait session.'),
(13, 'Apollo', 'Light', '5558 9999', 'apollo.light@example.com', '2024-07-15', 'Booking for a celestial-themed photo session.'),
(14, 'Luna', 'Shadow', '5559 0000', 'luna.shadow@example.com', '2024-07-20', 'Reserving a spot for the nighttime portrait session.'),
(15, 'Aurora', 'Borealis', '5550 1111', 'aurora.borealis@example.com', '2024-07-25', 'Making a reservation for the northern lights photography tour.'),
(16, 'Orion', 'Night', '5551 2222', 'orion.night@example.com', '2024-07-30', 'Booking for a stargazing and astrophotography event.'),
(17, 'Luna', 'Starshine', '5556 1234', 'luna.starshine@example.com', '2024-08-05', 'Booking for a sunrise photoshoot.'),
(18, 'Luna', 'Starshine', '5556 1234', 'luna.starshine@example.com', '2024-08-10', 'Reserving a spot for the full moon photography session.');
