-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2017 at 12:12 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `drug`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `Fname`, `Lname`, `sex`, `age`, `address`, `phone`, `date`) VALUES
(1, 'Tekalgn', 'mamo', 'male', 21, 'DBU', '0954623567', '2017-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE IF NOT EXISTS `drug` (
  `drug_id` varchar(20) NOT NULL,
  `drug_name` varchar(200) NOT NULL,
  `drug_dosage` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `company` varchar(200) NOT NULL,
  `drug_brand` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`drug_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_id`, `drug_name`, `drug_dosage`, `quantity`, `price`, `expire_date`, `company`, `drug_brand`, `reg_date`, `status`) VALUES
('4545', 'Indomethacin', '44', 32, 56, '2017-05-01', 'gdg', 'APF', '2017-08-02', 'expired'),
('9021', 'Benadryl', '300', 450, 200, '2017-08-26', 'Canada', 'ATF', '2017-08-10', 'available'),
('chloroquin-2', 'chloroquin', '250', 187, 150, '2017-11-10', 'Canada', 'ATF', '2017-08-01', 'available'),
('chloroquin-3', 'chloroquin', '250', 200, 150, '2017-09-16', 'Canada', 'ATF', '2017-08-01', 'available'),
('Clo67', 'Clotrimazole', '200', 198, 300, '2018-03-14', 'Ethiopian', 'APF', '2017-08-10', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empid` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `fname`, `mname`, `age`, `sex`, `address`, `phone`, `email`, `role`, `salary`, `status`) VALUES
('921', 'kebede', 'Ayalew', 21, 'male', 'Debrebirhan', '0910364765', 'abebe@gmail.com', 'cashier', 4500, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `email` varchar(20) NOT NULL,
  `comment` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saled_drug`
--

CREATE TABLE IF NOT EXISTS `saled_drug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_id` varchar(50) NOT NULL,
  `drug_name` varchar(100) NOT NULL,
  `drug_dosage` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `saled_drug`
--

INSERT INTO `saled_drug` (`id`, `drug_id`, `drug_name`, `drug_dosage`, `quantity`, `price`, `date`) VALUES
(4, 'chloroquin-2', 'chloroquin', '250', 2, 150, '2017-08-06'),
(5, 'chloroquin-2', 'chloroquin', '250', 1, 150, '2017-08-06'),
(6, 'Clo67', 'Clotrimazole', '200', 2, 300, '2017-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` varchar(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `Photo` varchar(60) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `fname`, `mname`, `lname`, `age`, `sex`, `username`, `password`, `usertype`, `status`, `Photo`) VALUES
('2059', 'habte', 'mune', 'mune', 21, 'male', 'habte', 'habtye', 'cordinator', 'Active', '10.jpg'),
('358', 'shewani', 'shewa', 'shewa', 22, 'male', 'admin', 'admin', 'admin', 'Active', '1.jpg'),
('412', 'manye', 'manye', 'abebe', 22, 'male', 'manye', 'manye', 'pharmasist', 'Active', '1.jpg'),
('8762', 'Zelelew', 'Shewakena', 'Abate', 21, 'male', 'zelelew', '1234', 'cashier', 'Active', '6.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
