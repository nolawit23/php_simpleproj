-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 11:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drug`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `date` date NOT NULL,
  `boughtdrug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `Fname`, `Lname`, `sex`, `age`, `address`, `phone`, `date`, `boughtdrug`) VALUES
(1, 'Tekalgn', 'mamo', 'male', 21, 'DBU', '0954623567', '2017-08-08', ''),
(2, 'surafel', 'tadese', 'male', 22, 'sululta', '0920908978', '2023-06-09', ''),
(3, 'Teklemariam', 'Getnet', 'male', 24, 'Gondar', '0942860028', '2023-06-09', ''),
(4, 'surafel', 'tadese', 'male', 22, 'sululta', '0920908978', '2023-06-09', ''),
(5, 'surafel', 'tadese', 'male', 22, 'sululta', '0920908978', '2023-06-10', 'amoxcacilin'),
(6, 'Zemete', 'woldie', 'male', 24, 'gondar', '0984200042', '2023-06-10', 'e39374ae4329f93abb8a1356d8335f659ad4a9ec'),
(7, 'zemete', 'tefera', 'male', 90, 'bure', '0967383', '2023-06-11', 'f3d410c4f878c5a1a3ed08b26330106b99a2e949'),
(8, 'girma', 'tewachewe', 'male', 56, 'addis abeba', '09866636', '2023-06-11', 'e39374ae4329f93abb8a1356d8335f659ad4a9ec'),
(9, 'fitsum', 'yirga', 'male', 45, 'Bahirdar', '093564757', '2023-06-11', 'e39374ae4329f93abb8a1356d8335f659ad4a9ec'),
(10, '743198dfaf6183c6a5415afbeadcdfb4cf451418', '9df4ee51376fab5c00ac01a20b8818cc757e1e73', 'male', 25, 'sululta', '0920908978', '2023-06-11', 'fratile'),
(11, '3cda55e6d193dc5be77126ae38543ae80e56efd7', '732f8f4a1b5ccd46e3760764b36db623eaee2ea7', 'male', 43, 'Markos', 'd00f191ad47dfc', '2023-06-11', 'hdjakd'),
(12, 'a37780bdfdc271fab5bfc08255b67916bc52ec9a', 'edc9b27cf62e4647f2209b47e2899d9b77afc26f', 'male', 23, 'Bahirdar', '61909d7bdfa18f', '2023-06-12', 'shrop');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_id` varchar(20) NOT NULL,
  `drug_name` varchar(200) NOT NULL,
  `drug_dosage` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `company` varchar(200) NOT NULL,
  `drug_brand` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `pharmacy` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_id`, `drug_name`, `drug_dosage`, `quantity`, `price`, `expire_date`, `company`, `drug_brand`, `reg_date`, `pharmacy`, `status`) VALUES
('345', 'protein', '22', 80, 150, '2024-04-26', 'Ethiopia', 'EDAs', '2023-06-12', 'yigarde', 'available'),
('4445', 'tra', '888', 45, 230, '2023-06-16', 'Ethiopia', 'EDAs', '2023-06-12', 'markos', 'available'),
('56724', 'amoxcacilin', '2', 6, 290, '2023-06-30', 'Ethiopia', 'EDAs', '2023-06-12', 'markos', 'available'),
('675', 'protein', '11', 12, 100, '2023-06-16', 'Ethiopia', 'EDAs', '2023-06-12', 'worku', 'available'),
('7376', 'amoxcacilin', '2', 30, 330, '2024-12-27', 'Germany', 'vh', '2023-06-12', 'lalibela', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
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
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `fname`, `mname`, `age`, `sex`, `address`, `phone`, `email`, `role`, `salary`, `status`) VALUES
('1007', 'Tadesse', 'Yibeltal', 21, 'male', 'Markos', '0934526357', 'tadesse@gmail.com', 'pharmasist', 18900, 'Active'),
('1009', 'surafel', 'tadese', 21, 'male', 'sululta', '0920908978', 'surafeltadese2121@gmail.com', 'pharmasist', 18900, 'Active'),
('1015', 'Zemete', 'woldie', 23, 'male', 'gondar', '0984200042', 'zemie@gmail.com', 'cordinator', 20100, 'Active'),
('1212', 'dani', 'rad', 21, 'male', 'adama', '0934526357', 'tadesse@gmail.com', 'pharmasist', 20900, 'Active'),
('334', 'Yirga', 'Eskezia', 21, 'male', 'Bahirdar', '0947876554', 'yirga@gmail.com', 'admin', 12090, 'Active'),
('7890', 'edeshewe', 'amare', 21, 'male', 'gondar', '0932095262', 'zemie@gmail.com', 'pharmasist', 9000, 'Active'),
('921', 'kebede', 'Ayalew', 21, 'male', 'Debrebirhan', '0910364765', 'abebe@gmail.com', 'cashier', 4500, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `email` varchar(20) NOT NULL,
  `comment` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resetpass`
--

CREATE TABLE `resetpass` (
  `username` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `saled_drug`
--

CREATE TABLE `saled_drug` (
  `id` int(11) NOT NULL,
  `drug_id` varchar(50) NOT NULL,
  `drug_name` varchar(100) NOT NULL,
  `drug_dosage` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saled_drug`
--

INSERT INTO `saled_drug` (`id`, `drug_id`, `drug_name`, `drug_dosage`, `quantity`, `price`, `date`) VALUES
(4, 'chloroquin-2', 'chloroquin', '250', 2, 150, '2017-08-06'),
(5, 'chloroquin-2', 'chloroquin', '250', 1, 150, '2017-08-06'),
(6, 'Clo67', 'Clotrimazole', '200', 2, 300, '2017-08-10'),
(7, '111', 'parectamol', '10', 2, 40, '2023-06-08'),
(8, '111', 'parectamol', '10', 2, 40, '2023-06-09'),
(9, '13', 'Shrop', '10', 2, 220, '2023-06-09'),
(10, '13', 'Shrop', '10', 3, 330, '2023-06-09'),
(11, '111', 'parectamol', '10', 100, 2000, '2023-06-09'),
(12, '111', 'parectamol', '10', 6, 120, '2023-06-09'),
(13, '13', 'Shrop', '10', 2, 220, '2023-06-09'),
(14, '13', 'Shrop', '10', 2, 220, '2023-06-09'),
(15, '233', 'dropexcelin', '10', 10, 2000, '2023-06-09'),
(16, '233', 'dropexcelin', '10', 10, 2000, '2023-06-09'),
(17, '233', 'dropexcelin', '10', 50, 10000, '2023-06-09'),
(18, '233', 'dropexcelin', '10', 20, 4000, '2023-06-11'),
(19, '233', 'dropexcelin', '10', 50, 10000, '2023-06-11'),
(20, '123', 'amoxcacilin', '10', 2, 220, '2023-06-11'),
(21, '345', 'protein', '22', 10, 1500, '2023-06-12'),
(22, '345', 'protein', '22', 10, 1500, '2023-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
  `Photo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `fname`, `mname`, `lname`, `age`, `sex`, `username`, `password`, `usertype`, `status`, `Photo`) VALUES
('1015', 'Teklemariam', 'Getnet', 'Andargie', 21, 'male', 'Tekle', '8cb2237d0679ca88db6464eac60da96345513964', 'manager', 'deactivate', 'user.jpg'),
('123', 'Zemete', 'Woldie', 'Yeshzerf', 21, 'male', 'Zemete', '29e9728722bcb01545f677321c2ae02c7a631ab2', 'cordinator', 'Active', 'WIN_20230526_12_00_33_Pro.jpg'),
('125', 'Zemete', 'Woldie', 'Yeshzerf', 21, 'male', 'Saka', '2ca73e3f6b75e3533f5635503d7ea35d18d7547e', 'admin', 'Active', 'user.jpg'),
('1998', 'Eyob', 'Fasil', 'Negash', 25, 'male', 'Eyob', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'cordinator', 'Active', 'user.jpg'),
('22', 'Biruhtesfa', 'Wossen', 'Tarekegn', 21, 'male', 'Bura', 'aaef946fd335f182d4d67f6d999d9920c52b25be', 'manager', 'Active', 'user.jpg'),
('2345', 'Zelalem', 'Birhanu', 'molla', 21, 'male', 'Zola', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pharmasist', 'Active', 'user.jpg'),
('243', 'Teklemariam', 'Getnet', 'Andargie', 21, 'male', 'Adyam', '6a250c6f5a5cd10025c32849c2368788c350d517', 'admin', 'Active', 'IMG_20230212_093825_008.jpg'),
('263', 'tewachewe', 'belachewe', 'tefera', 21, 'male', 'tewachewe', '8cb2237d0679ca88db6464eac60da96345513964', 'admin', 'Active', 'user.jpg'),
('35', 'abebech', 'molla', 'kasa', 21, 'male', 'abebech', '8cb2237d0679ca88db6464eac60da96345513964', 'cordinator', 'Active', 'user.jpg'),
('358', 'shewani', 'shewa', 'shewa', 22, 'male', 'admin', 'Tekle1009', 'admin', 'Active', '1.jpg'),
('435', 'Fitsum', 'Molla', 'Lakew', 21, 'male', 'fitsum', '907aa388d81ff292241386f19c0095b4e059f53a', 'cashier', 'Active', 'user.jpg'),
('555', 'teddy', 'sura', 'geee', 21, 'male', 'teddy', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'cashier', 'Active', 'user.jpg'),
('563', 'Yirga', 'Eskezia', 'Getie', 21, 'male', 'Yirga', '6c983179018e59498eb03ad7f3eea8a997aee1d8', 'pharmasist', 'Active', 'user.jpg'),
('63266', 'Girma', 'Tewachew', 'Kassie', 21, 'male', 'Girma', '44d44b7acf8f7f314cfc382faaee0a13b2aa02e4', 'manager', 'Active', 'photo_5909129303235345993_y.jpg'),
('6574', 'belachewe', 'yirga', 'bekalu', 21, 'male', 'belachewe', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'cashier', 'Active', 'user.jpg'),
('67', 'zelalem', 'nega', 'baye', 21, 'male', 'zelalem', '8cb2237d0679ca88db6464eac60da96345513964', 'pharmasist', 'Active', 'user.jpg'),
('673', 'Abe', 'kebe', 'sete', 21, 'male', 'Abe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pharmasist', 'Active', 'user.jpg'),
('6743', 'kebede', 'alemu', 'abebe', 21, 'male', 'kebede', '8cb2237d0679ca88db6464eac60da96345513964', 'pharmasist', 'Active', 'user.jpg'),
('7845', 'lemlem', 'tefera', 'gedfewe', 21, 'male', 'lemlem', '8cb2237d0679ca88db6464eac60da96345513964', 'cordinator', 'Active', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `saled_drug`
--
ALTER TABLE `saled_drug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `saled_drug`
--
ALTER TABLE `saled_drug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
