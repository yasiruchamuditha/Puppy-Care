-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2022 at 06:25 PM
-- Server version: 8.0.29
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmwcw`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `breed` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `age` int NOT NULL,
  `ContactNo` int NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`breed`, `Name`, `age`, `ContactNo`, `email`) VALUES
('eee', 'rr', 33, 3333, 'ropsadeste@vusra.com'),
('eee', 'eee', 22, 3333, 'ss@gmail');

-- --------------------------------------------------------

--
-- Table structure for table `crossing`
--

DROP TABLE IF EXISTS `crossing`;
CREATE TABLE IF NOT EXISTS `crossing` (
  `Breed` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Age` int NOT NULL,
  `Price` int NOT NULL,
  `ContactNo` int NOT NULL,
  `Email` varchar(100) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contact No` int NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tranner`
--

DROP TABLE IF EXISTS `tranner`;
CREATE TABLE IF NOT EXISTS `tranner` (
  `RegNo` varchar(20) NOT NULL,
  `ContactNo` int NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tranner`
--

INSERT INTO `tranner` (`RegNo`, `ContactNo`, `Address`, `Email`, `name`) VALUES
('', 3333, 'NO,198,ATHTHALAHENA ,HAWPE', 'yasiruchamudithawijesingccccccccccccccccccche@gmail.com', 'Yasiru Chamuditha');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Email` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ContactNo` int NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Name`, `ContactNo`, `Address`, `Password`) VALUES
('GADSE211F-012@student.nibm.lk', 'Yasiru Chamuditha', 4555, 'NO,198,ATHTHALAHENA ,HAWPE', '45'),
('ss@gmail', 'Yasiru Chamuditha', 11, 'NO,198,ATHTHALAHENA ,HAWPE', 'ss'),
('ssdddddddddd@gmail', 'Yasiru Chamuditha', 333, 'NO,198,ATHTHALAHENA ,HAWPE', '33'),
('xxxxxxxxxxxxxjesinghe@gmail.com', 'Yasiru Chamuditha', 3333, 'NO,198,ATHTHALAHENA ,HAWPE', '33'),
('yasiruchamudithawaaaaaaaaaijesinghe@gmail.com', 'Yasiru Chamuditha', 555, 'NO,198,ATHTHALAHENA ,HAWPE', 'aa'),
('yasiruchamudithawijesinghe@gmail.com', 'yasiru', 11111111, 'galle', 'ya12');

-- --------------------------------------------------------

--
-- Table structure for table `vetrinarysurgeon`
--

DROP TABLE IF EXISTS `vetrinarysurgeon`;
CREATE TABLE IF NOT EXISTS `vetrinarysurgeon` (
  `Name` varchar(100) NOT NULL,
  `RegNo` varchar(100) NOT NULL,
  `ContactNo` int NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vetrinarysurgeon`
--

INSERT INTO `vetrinarysurgeon` (`Name`, `RegNo`, `ContactNo`, `Email`, `Address`) VALUES
('Yasiru Chamuditha', '45', 3333, 'yasiruchamudithawijesinghe@gmail.com', 'NO,198,ATHTHALAHENA ,HAWPE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
