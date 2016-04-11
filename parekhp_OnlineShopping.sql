-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2014 at 03:47 PM
-- Server version: 5.0.96
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `parekhp_OnlineShopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `Card_Type`
--

CREATE TABLE IF NOT EXISTS `Card_Type` (
  `Card_Type_ID` int(10) NOT NULL,
  `Card_Type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Card_Type`
--

INSERT INTO `Card_Type` (`Card_Type_ID`, `Card_Type`) VALUES
(1, 'Visa'),
(2, 'Master'),
(3, 'American Express');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `Category_ID` int(25) NOT NULL auto_increment,
  `Category_Name` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY  (`Category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`, `date`) VALUES
(1, 'Living Room', ''),
(2, 'Bed Room', ''),
(3, 'Kitchen', ''),
(4, 'Dining Hall', ''),
(5, 'Office', '');

-- --------------------------------------------------------

--
-- Table structure for table `Cst_dtl`
--

CREATE TABLE IF NOT EXISTS `Cst_dtl` (
  `Customer_ID` int(10) NOT NULL,
  `SSN` int(20) NOT NULL,
  `Card_Type_ID` int(10) NOT NULL,
  `Card_No` int(20) NOT NULL,
  `Expiry_Date` date NOT NULL,
  `CVV` int(10) NOT NULL,
  `BStreet` varchar(25) NOT NULL,
  `BCity` varchar(25) NOT NULL,
  `BState` varchar(19) NOT NULL,
  `BZip` int(10) NOT NULL,
  `SStreet` varchar(25) NOT NULL,
  `SCity` varchar(20) NOT NULL,
  `SState` varchar(20) NOT NULL,
  `Szip` int(10) NOT NULL,
  PRIMARY KEY  (`SSN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cst_dtl`
--

INSERT INTO `Cst_dtl` (`Customer_ID`, `SSN`, `Card_Type_ID`, `Card_No`, `Expiry_Date`, `CVV`, `BStreet`, `BCity`, `BState`, `BZip`, `SStreet`, `SCity`, `SState`, `Szip`) VALUES
(10, 25698456, 2147483647, 1, '0000-00-00', 211, 'Hague', 'Jersey', 'NJ', 79365, 'Lenord', 'bharat', 'odhav', 78954),
(10, 665266, 3, 2147483647, '2013-12-12', 211, 'Hague', 'Jersey', 'NJ', 79365, 'Lenord', 'bharat', 'odhav', 78954),
(31, 0, 1, 0, '0000-00-00', 0, '', '', '', 0, '', '', '', 0),
(6, 555555, 2, 555555555, '0000-00-00', 5555555, 'asdasd', 'asdasd', 'asdsd', 5555, 'asdasd', 'asdasd', 'aasdas', 5),
(6, 222, 1, 555555555, '0000-00-00', 5555555, 'asdasd', 'asdasd', 'asdsd', 5555, 'asdasd', 'asdasd', 'aasdas', 5),
(6, 54541, 1, 555555555, '0000-00-00', 55, 'asdasd', 'asdasd', 'asdsd', 5555, 'asdasd', 'asdasd', 'aasdas', 5),
(6, 7, 1, 0, '0000-00-00', 0, '', '', '', 0, '', '', '', 0),
(6, 78, 1, 0, '0000-00-00', 0, '', '', '', 0, '', '', '', 0),
(6, 11, 1, 0, '0000-00-00', 0, '', '', '', 0, '', '', '', 0),
(6, 123, 1, 0, '0000-00-00', 0, '', '', '', 0, '', '', '', 0),
(6, 65, 1, 0, '0000-00-00', 0, '', '', '', 0, '', '', '', 0),
(6, 99, 1, 0, '0000-00-00', 0, '', '', '', 0, '', '', '', 0),
(6, 4556788, 1, 0, '0000-00-00', 0, '', '', '', 0, '', '', '', 0),
(6, 9876890, 1, 77777777, '0000-00-00', 123, 'hague', 'jersey', 'nj', 7307, 'hague', 'jersey', 'nj', 7307),
(6, 987689023, 1, 77777777, '0000-00-00', 123, 'hague', 'jersey', 'nj', 7307, 'hague', 'jersey', 'nj', 7307),
(6, 3333, 1, 0, '0000-00-00', 0, '', '', '', 0, '', '', '', 0),
(13, 1, 1, 0, '0000-00-00', 1, '1', '1', '1', 1, '1', '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_dtl`
--

CREATE TABLE IF NOT EXISTS `emp_dtl` (
  `User_ID` int(20) NOT NULL,
  `User_TypeID` int(20) default NULL,
  `User_Name` varchar(30) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Designation` varchar(30) NOT NULL,
  `Salary` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `Order_ID` int(10) NOT NULL auto_increment,
  `Order_No` varchar(25) NOT NULL,
  `Order_Date` date NOT NULL,
  PRIMARY KEY  (`Order_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_ID`, `Order_No`, `Order_Date`) VALUES
(12, '13-11-30/10', '2013-11-30'),
(11, '13-11-30/10', '2013-11-30'),
(10, '13-11-30/10', '2013-11-30'),
(9, '13-11-30/10', '2013-11-30'),
(8, '13-11-30/10', '2013-11-30'),
(7, '13-11-30/10', '2013-11-30'),
(13, '13-12-01/10', '2013-12-01'),
(14, '13-12-01/31', '2013-12-01'),
(15, '13-12-01/34', '2013-12-01'),
(16, '13-12-01/34', '2013-12-01'),
(17, '13-12-01/34', '2013-12-01'),
(18, '13-12-01/34', '2013-12-01'),
(19, '13-12-01/34', '2013-12-01'),
(20, '13-12-01/34', '2013-12-01'),
(21, '13-12-01/34', '2013-12-01'),
(22, '13-12-01/34', '2013-12-01'),
(23, '13-12-01/34', '2013-12-01'),
(24, '13-12-01/34', '2013-12-01'),
(25, '13-12-01/34', '2013-12-01'),
(26, '13-12-01/34', '2013-12-01'),
(27, '13-12-01/34', '2013-12-01'),
(28, '13-12-01/3', '2013-12-01'),
(29, '13-12-03/6', '2013-12-03'),
(30, '13-12-03/6', '2013-12-03'),
(31, '13-12-03/6', '2013-12-03'),
(32, '13-12-03/6', '2013-12-03'),
(33, '13-12-03/6', '2013-12-03'),
(34, '13-12-03/6', '2013-12-03'),
(35, '13-12-03/6', '2013-12-03'),
(36, '13-12-03/6', '2013-12-03'),
(37, '13-12-03/6', '2013-12-03'),
(38, '13-12-03/6', '2013-12-03'),
(39, '13-12-03/6', '2013-12-03'),
(40, '13-12-03/6', '2013-12-03'),
(41, '13-12-03/6', '2013-12-03'),
(42, '13-12-03/6', '2013-12-03'),
(43, '13-12-03/6', '2013-12-03'),
(44, '13-12-03/6', '2013-12-03'),
(45, '13-12-03/6', '2013-12-03'),
(46, '13-12-03/6', '2013-12-03'),
(47, '13-12-03/6', '2013-12-03'),
(48, '13-12-17/6', '2013-12-17'),
(49, '14-01-14/6', '2014-01-14'),
(50, '14-01-14/6', '2014-01-14'),
(51, '14-01-22/6', '2014-01-22'),
(52, '14-01-22/6', '2014-01-22'),
(53, '14-03-18/6', '2014-03-18'),
(54, '14-08-31/13', '2014-08-31'),
(55, '14-08-31/14', '2014-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `Order_Details`
--

CREATE TABLE IF NOT EXISTS `Order_Details` (
  `Order_ID` int(10) NOT NULL,
  `Order_No` varchar(20) NOT NULL,
  `User_ID` int(10) NOT NULL,
  `Product_ID` int(10) NOT NULL,
  `Qty` int(10) NOT NULL,
  `Total` int(20) NOT NULL,
  PRIMARY KEY  (`Order_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Order_Details`
--

INSERT INTO `Order_Details` (`Order_ID`, `Order_No`, `User_ID`, `Product_ID`, `Qty`, `Total`) VALUES
(7, '13-11-30/10', 10, 1, 0, 0),
(8, '13-11-30/10', 10, 1, 0, 0),
(9, '13-11-30/10', 10, 1, 0, 0),
(10, '13-11-30/10', 10, 1, 0, 0),
(11, '13-11-30/10', 10, 1, 0, 0),
(12, '13-11-30/10', 10, 1, 0, 0),
(13, '13-12-01/10', 10, 1, 0, 0),
(14, '13-12-01/31', 31, 2, 0, 0),
(15, '13-12-01/34', 34, 0, 0, 0),
(16, '13-12-01/34', 34, 0, 0, 0),
(17, '13-12-01/34', 34, 0, 0, 0),
(18, '13-12-01/34', 34, 0, 0, 0),
(19, '13-12-01/34', 34, 0, 0, 0),
(20, '13-12-01/34', 34, 0, 0, 0),
(21, '13-12-01/34', 34, 0, 0, 0),
(22, '13-12-01/34', 34, 0, 0, 0),
(23, '13-12-01/34', 34, 0, 0, 0),
(24, '13-12-01/34', 34, 0, 0, 0),
(25, '13-12-01/34', 34, 0, 0, 0),
(26, '13-12-01/34', 34, 0, 0, 0),
(27, '13-12-01/34', 34, 76, 0, 0),
(28, '13-12-01/3', 3, 1, 0, 0),
(29, '13-12-03/6', 6, 61, 0, 0),
(30, '13-12-03/6', 6, 91, 10, 3330),
(31, '13-12-03/6', 6, 91, 10, 3330),
(32, '13-12-03/6', 6, 1, 4, 3000),
(33, '13-12-03/6', 6, 3, 3, 1479),
(34, '13-12-03/6', 6, 2, 1, 741),
(35, '13-12-03/6', 6, 2, 1, 741),
(36, '13-12-03/6', 6, 2, 1, 741),
(37, '13-12-03/6', 6, 2, 1, 741),
(38, '13-12-03/6', 6, 2, 1, 741),
(39, '13-12-03/6', 6, 91, 4, 1332),
(40, '13-12-03/6', 6, 1, 4, 3000),
(41, '13-12-03/6', 6, 1, 4, 3000),
(42, '13-12-03/6', 6, 1, 4, 3000),
(43, '13-12-03/6', 6, 1, 6, 4500),
(44, '13-12-03/6', 6, 91, 5, 1665),
(45, '13-12-03/6', 6, 31, 5, 1605),
(46, '13-12-03/6', 6, 31, 5, 1605),
(47, '13-12-03/6', 6, 98, 8, 2664),
(48, '13-12-17/6', 6, 93, 4, 1332),
(49, '14-01-14/6', 6, 8, 5, 680),
(50, '14-01-14/6', 6, 91, 2, 666),
(51, '14-01-22/6', 6, 47, 5, 1665),
(52, '14-01-22/6', 6, 47, 5, 1665),
(53, '14-03-18/6', 6, 62, 4, 1332),
(54, '14-08-31/13', 13, 1, 1, 750),
(55, '14-08-31/14', 14, 61, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Category_ID` int(25) NOT NULL,
  `Sub_CategoryID` int(25) NOT NULL,
  `Product_ID` int(25) NOT NULL auto_increment,
  `Product_Name` varchar(90) NOT NULL,
  `Price` int(20) NOT NULL,
  `Short_Descr` varchar(100) NOT NULL,
  `Dtl_Descr` varchar(1000) NOT NULL,
  `quntity` int(11) NOT NULL,
  `Model` varchar(20) NOT NULL,
  `Dimension` varchar(50) NOT NULL,
  `Weight` varchar(20) NOT NULL,
  PRIMARY KEY  (`Product_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Category_ID`, `Sub_CategoryID`, `Product_ID`, `Product_Name`, `Price`, `Short_Descr`, `Dtl_Descr`, `quntity`, `Model`, `Dimension`, `Weight`) VALUES
(1, 1, 1, 'New Khaki', 750, 'Khaki is a new collection.', ' Khaki is upholstery collection creates a warm inviting cottage atmosphere with the comfortable cushioning surrounded with the warm tones and slipcover look of the soft upholstery fabric that perfectly captures the essence of cottage styled furniture. ', -1, '7880001', '84"W x 41"D x 38"H', '154 lbs'),
(1, 1, 2, 'Grey', 741, 'Very good and confertable.', 'Grey upholstery collection creates a warm inviting cottage atmosphere with the comfortable cushioning surrounded with the warm tones and slipcover look of the soft upholstery fabric that perfectly captures the essence of cottage styled furniture.', 10, '7880002', '84"W x 41"D x 38"H', '164 lbs'),
(1, 1, 3, 'Brown', 493, 'Good and attractive', 'Track arms along with the boxed seat and back cushions all supported by dark finish legs makes the warm inviting Vintage Casual design of the “Alenya-Quartz” upholstery collection the perfecting addition to the relaxing décor of any living area.', 10, '780003', '84"W x 34"D x 38"H', '156 lbs'),
(1, 1, 4, 'Chocolate edition', 874, 'Attractive and awesome', 'Chocolate edition match upholstery features DuraBlend® upholstery in the seating areas with skillfully matched vinyl everywhere else', 10, '780004', '93"W x 39"D x 38"H', '155 lbs'),
(1, 1, 5, 'Extended Chocalate edition', 745, 'Good attractive and useful', 'ith the supportive back and seat cushions stylishly adorned with tufted detailing along with the thick padded arms', 10, '780005', '85"W x 39"D x 38"H', '145 lbs'),
(1, 2, 6, 'Accent Chair', 245, 'White Material: 	Bonded Leather', 'Winging It. Modern sophistication meets enduring tradition in the sleekly styled Jameson collection.', 10, '790001', '30 X 41 X 34', '100 lbs'),
(1, 2, 7, 'White cradle chair', 124, 'White cradle is confortable and compact', 'White cradle is confortable and compact', 10, '790002', '24 X 23 X 27', '145 lbs'),
(1, 2, 8, 'White accent chair', 136, 'Very good and confertable.', 'Attractive chair with comfortable sitting', 5, '790003', '25 X 26 X 21', '132 lbs'),
(1, 2, 9, 'Grey accent chair', 145, 'Good confortable chair', 'very confertable and attractive', 10, '790004', '21 X 19 X 22', '100 lbs'),
(1, 2, 10, 'Modern accent chair', 101, 'modern accent chair with low price', 'lowese price in its range and very confotable', 10, '790005', '21 X 19 X 22', '100 lbs'),
(1, 3, 11, 'Loveseat Red', 200, 'Very good and attractive', 'Perfect thing to light up your living room', 10, '800001', '24 X 23 X 27', '144 lbs'),
(1, 3, 12, 'White Loveseat', 123, 'Very good and confortable', 'Good and low price', 10, '800002', '25 X 26 X 21', '100 lbs'),
(1, 3, 13, 'Grey Loveseat', 123, 'Very good and confertable.', 'Good and low price', 10, '800003', '24 X 23 X 27', '100 lbs'),
(1, 3, 14, 'Wooden Loveseat', 124, 'Very good and confertable.', 'Attractive chair with comfortable sitting', 10, '800004', '21 X 19 X 22', '100 lbs'),
(1, 3, 15, 'Glider Loveseat', 136, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '800005', '30 X 41 X 34', '144 lbs'),
(1, 4, 16, 'New excellent ', 512, 'Very good and confertable.', 'Attracti and awesome to watch', 10, '810001', '33 X 31 X 23', '165 lbs'),
(1, 4, 17, 'Revised edition for Tv', 124, 'Good attractive and useful', 'Good and low price', 10, '810002', '30 X 41 X 34', '100 lbs'),
(1, 4, 18, 'Black cabinet', 124, 'Good attractive and useful', 'Good and low price', 10, '810003', '84"W x 41"D x 38"H', '145 lbs'),
(1, 4, 19, 'Simple and sober cabinet', 124, 'Very good and confertable.', 'Good and low price', 10, '810004', '24 X 23 X 27', '100 lbs'),
(1, 4, 20, 'Simple cabinet', 123, 'Very good and confertable.', 'Good and low price', 10, '810005', '30 X 41 X 34', '144 lbs'),
(1, 5, 21, 'a', 1, 'Very good and confertable.', 'Good and low price', 10, '7880001', '24 X 23 X 27', '100 lbs'),
(1, 5, 22, 'a', 1, 'Very good and confertable.', 'Good and low price', 10, '780003', '24 X 23 X 27', '100 lbs'),
(1, 5, 23, 'New Khaki', 1, 'Very good and confertable.', 'Good and low price', 10, '2', '24 X 23 X 27', '100 lbs'),
(1, 5, 24, 'Accent Chair', 124, 'Very good and confertable.', 'Good and low price', 10, '7880001', '24 X 23 X 27', '100 lbs'),
(1, 5, 25, '1', 123, 'Khaki is a new collection.', 'Attracti and awesome to watch', 10, '7880001', '2', '145 lbs'),
(1, 6, 26, 'New Khaki', 124, 'Good attractive and useful', 'Good and low price', 10, '2', '24 X 23 X 27', '145 lbs'),
(1, 6, 27, 'Accent Chair', 123, 'Good attractive and useful', 'Good and low price', 10, '780003', '2', '145 lbs'),
(1, 6, 28, '1', 123, 'Good attractive and useful', 'Good and low price', 10, '780003', '30 X 41 X 34', '144 lbs'),
(1, 6, 29, 'Accent Chair', 123, 'Attractive and awesome', 'Good and low price', 10, '7880001', '2', '100 lbs'),
(1, 6, 30, 'New Khaki', 123, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '2', '2', '145 lbs'),
(2, 7, 31, 'Bed 1', 321, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 5, '9999', '30 X 41 X 34', '170'),
(2, 7, 32, 'Bed 1', 33, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 7, 33, 'Bed 1', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 7, 34, 'Bed 1', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 7, 35, 'Bed 1', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 8, 36, 'Mirror', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 8, 37, 'Mirror', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 8, 38, 'Mirror', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 8, 39, 'Mirror', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 8, 40, 'Mirror', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 9, 41, 'Lamp', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 9, 42, 'Lamp', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 9, 43, 'Lamp', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 9, 44, 'Lamp', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 9, 45, 'Lamp', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 10, 46, 'wardrob', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 10, 47, 'wardrob', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 5, '9999', '30 X 41 X 34', '170'),
(2, 10, 48, 'wardrob', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 10, 49, 'wardrob', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 10, 50, 'wardrob', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 11, 51, 'Mattress', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 11, 52, 'Mattress', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 11, 53, 'Mattress', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 11, 54, 'Mattress', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 11, 55, 'Mattress', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 12, 56, 'Headboard', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 12, 57, 'Headboard', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 12, 58, 'Headboard', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 12, 59, 'Headboard', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(2, 12, 60, 'Headboard', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 13, 61, 'Kitchen cart', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 13, 62, 'Kitchen cart', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 13, 63, 'Kitchen cart', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 13, 64, 'Kitchen cart', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 13, 65, 'Kitchen cart', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 14, 66, 'Shelves', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 14, 67, 'Shelves', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 14, 68, 'Shelves', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 14, 69, 'Shelves', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 14, 70, 'Shelves', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 15, 71, 'PotRacks', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 15, 72, 'PotRacks', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 15, 73, 'PotRacks', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 15, 74, 'PotRacks', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 15, 75, 'PotRacks', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 16, 76, 'Steptools', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 16, 77, 'Steptools', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 16, 78, 'Steptools', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 16, 79, 'Steptools', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 16, 80, 'Steptools', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 17, 81, 'Cabinets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 17, 82, 'Cabinets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 17, 83, 'Cabinets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 17, 84, 'Cabinets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 17, 85, 'Cabinets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 18, 86, 'Kitchen Island', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 18, 87, 'Kitchen Island', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 18, 88, 'Kitchen Island', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 18, 89, 'Kitchen Island', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(3, 18, 90, 'Kitchen Island', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 19, 91, 'Dining Table', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 3, '9999', '30 X 41 X 34', '170'),
(4, 19, 92, 'Dining Table', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 19, 93, 'Dining Table', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 6, '9999', '30 X 41 X 34', '170'),
(4, 19, 94, 'Dining Table', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 19, 95, 'Dining Table', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 20, 96, 'Dining Chair', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 20, 97, 'Dining Chair', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 20, 98, 'Dining Chair', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 20, 99, 'Dining Chair', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 20, 100, 'Dining Chair', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 21, 101, 'Bar Stools', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 21, 102, 'Bar Stools', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 21, 103, 'Bar Stools', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 21, 104, 'Bar Stools', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 21, 105, 'Bar Stools', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 22, 106, 'Buffets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 22, 107, 'Buffets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 22, 108, 'Buffets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 22, 109, 'Buffets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 22, 110, 'Buffets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 23, 111, 'Pub Sets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 23, 112, 'Pub Sets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 23, 113, 'Pub Sets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 23, 114, 'Pub Sets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 23, 115, 'Pub Sets', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 24, 116, 'Bars', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 24, 117, 'Bars', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 24, 118, 'Bars', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 24, 119, 'Bars', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(4, 24, 120, 'Bars', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 25, 121, 'Desks', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 25, 122, 'Desks', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 25, 123, 'Desks', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 25, 124, 'Desks', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 25, 125, 'Desks', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 26, 126, 'Office Chairs', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 26, 127, 'Office Chairs', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 26, 128, 'Office Chairs', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 26, 129, 'Office Chairs', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 26, 130, 'Office Chairs', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 27, 131, 'Bookshelves', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 27, 132, 'Bookshelves', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 27, 133, 'Bookshelves', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 27, 134, 'Bookshelves', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 27, 135, 'Bookshelves', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 28, 136, 'File Cabinet', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 28, 137, 'File Cabinet', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 28, 138, 'File Cabinet', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 28, 139, 'File Cabinet', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 28, 140, 'File Cabinet', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 29, 141, 'Tables', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 29, 142, 'Tables', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 29, 143, 'Tables', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 29, 144, 'Tables', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 29, 145, 'Tables', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 30, 146, 'Printer & Machine Stands', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 30, 147, 'Printer & Machine Stands', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 30, 148, 'Printer & Machine Stands', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 30, 149, 'Printer & Machine Stands', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 30, 150, 'Printer & Machine Stands', 333, 'Good attractive and useful', 'Attractive chair with comfortable sitting', 10, '9999', '30 X 41 X 34', '170'),
(5, 0, 151, 'Test', 23, 'asdasd', 'asdasd', 3, '2323', '23 X 23 X 23', '234'),
(1, 0, 152, 'Test', 23, 'asdasd', 'asdasd', 3, '2323', '23 X 23 X 23', '234');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `cartproduct_id` int(10) NOT NULL auto_increment,
  `Product_Name` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `user_id` int(10) NOT NULL,
  `cst_quntity` int(20) NOT NULL,
  `Product_ID` int(18) NOT NULL,
  `model` int(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `dimension` varchar(20) NOT NULL,
  `ttlamt` int(20) NOT NULL,
  PRIMARY KEY  (`cartproduct_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`cartproduct_id`, `Product_Name`, `price`, `description`, `user_id`, `cst_quntity`, `Product_ID`, `model`, `weight`, `dimension`, `ttlamt`) VALUES
(9, 'New first sofa', '500$', 'Short Description', 10, 67, 1, 789564, '154 lbs', '45 X 65 X 89', 33500),
(10, 'New Khaki', '750', 'Khaki is a new collection.', 10, 0, 1, 7880001, '154 lbs', '84', 0),
(11, 'Brown', '493', 'Good and attractive', 10, 1, 3, 780003, '156 lbs', '84', 493),
(14, 'Steptools', '333', 'Good attractive and useful', 34, 0, 76, 9999, '170', '30 X 41 X 34', 0),
(15, 'New Khaki', '750$', 'Khaki is a new collection.', 3, 0, 1, 7880001, '154 lbs', '84', 0),
(43, 'Kitchen cart', '333$', 'Good attractive and useful', 14, 0, 61, 9999, '170', '30 X 41 X 34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `Category_ID` int(25) NOT NULL,
  `Sub_CategoryID` int(25) NOT NULL auto_increment,
  `Sub_Category_Name` varchar(50) NOT NULL,
  PRIMARY KEY  (`Sub_CategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`Category_ID`, `Sub_CategoryID`, `Sub_Category_Name`) VALUES
(1, 1, 'Sofas'),
(1, 2, 'Chairs'),
(1, 3, 'Loveseats'),
(1, 4, 'Entertainment'),
(1, 5, 'Recliner'),
(1, 6, 'Ottomans'),
(2, 7, 'King / Queen Beds'),
(2, 8, 'Dressers / Mirrors'),
(2, 9, 'Night Lamps'),
(2, 10, 'Wardrobes'),
(2, 11, 'Mattresses'),
(2, 12, 'Headboards'),
(3, 13, 'Kitchen Cart'),
(3, 14, 'Shelves'),
(3, 15, 'Pot Racks'),
(3, 16, 'Step Stools'),
(3, 17, 'Cabinets'),
(3, 18, 'Kitchen Islands'),
(4, 19, 'Dining Table'),
(4, 20, 'Dining Chairs'),
(4, 21, 'Bar Stools'),
(4, 22, 'Buffets'),
(4, 23, 'Pub Sets'),
(4, 24, 'Bars'),
(5, 25, 'Desks'),
(5, 26, 'Office Chairs'),
(5, 27, 'Bookshelves'),
(5, 28, 'File Cabinet'),
(5, 29, 'Tables'),
(5, 30, 'Printer and Machine stands'),
(0, 31, 'Entertainmnt');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(15) NOT NULL auto_increment,
  `User_Name` varchar(30) NOT NULL,
  `User_TypeID` int(5) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Confirm_Password` varchar(50) NOT NULL,
  `Street` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Zip` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email_ID` varchar(30) NOT NULL,
  PRIMARY KEY  (`User_ID`,`User_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `User_TypeID`, `First_Name`, `Last_Name`, `Confirm_Password`, `Street`, `City`, `State`, `Zip`, `Password`, `Email_ID`) VALUES
(1, 'admin', 1, 'Pritesh', 'Parekh', 'admin', 'Hague', 'Jersey', 'NJ', '07307', 'e6e061838856bf47e1de730719fb2609', 'pritesh@gmai.com'),
(5, 'a', 3, 'a', 'a', '', 'asdasd', 'asda', 'asdasd', '55', '0cc175b9c0f1b6a831c399e269772661', 'abc@abc.com'),
(6, 'prit', 3, 'pritesh', 'parekh', '', 'Hague', 'asda', 'asdasd', '55', '81dc9bdb52d04dc20036dbd8313ed055', 'a@b.com'),
(7, 'emp', 2, 'employee', 'emp', '1234', 'aa', 'aaa', 'aa', '09090', '1234', 'a@a.com'),
(8, 'emp123', 2, 'employee', 'emp', '1234', 'aa', 'aaa', 'aa', '09090', '81dc9bdb52d04dc20036dbd8313ed055', 'pritesh.parekh@outlook.com'),
(9, 's', 3, 's', 's', '', 's', 's', 's', 's', '0cc175b9c0f1b6a831c399e269772661', 's'),
(10, '', 3, '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(11, '', 3, '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(12, '', 3, ' s', 's', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(14, 'pritesh', 3, 'PRITESH', 'PAREKH', '', 'hague', 'ahmedanad', 'gujarat', '20303', '81dc9bdb52d04dc20036dbd8313ed055', 'a@b.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `User_TypeID` int(5) NOT NULL,
  `User_Type` varchar(10) NOT NULL,
  PRIMARY KEY  (`User_TypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`User_TypeID`, `User_Type`) VALUES
(1, 'OWNER'),
(2, 'EMPLOYEE'),
(3, 'CUSTOMER');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
