-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost

-- Generation Time: 2016-12-19 00:50:59
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se1`
--

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE `account` (
  `ID` int(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `EmailAdd` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` int(255) NOT NULL,
  `Weight` double NOT NULL,
  `Height` double NOT NULL,
  `hasFitbit` tinyint(1) NOT NULL,
  `Messages` varchar(2000) NOT NULL,
  `Longitude` double NOT NULL,
  `Latitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`ID`, `UserName`, `Password`, `EmailAdd`, `FirstName`, `LastName`, `Gender`, `Age`, `Weight`, `Height`, `hasFitbit`, `Messages`, `Longitude`, `Latitude`) VALUES
(1, 'sheetz', '123', 'yangs_uestc@163.com', 'Shang', 'Yang', '', 23, 140, 70, 1, 'hello', -74.4, 40.5),
(2, '', '123', '123@gmail.com', '', '', '', 22, 140, 70, 0, '', -74.4228545, 40.5265971),
(3, '', '123', '321@gmail.com', '', '', '', 0, 0, 0, 0, '', -74.4, 40.5);


-- --------------------------------------------------------

--
-- 表的结构 `friend`
--

CREATE TABLE `friend` (
  `ID` int(11) NOT NULL,
  `EmailAdd` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `Send` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `Request` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `FriendList` varchar(255) CHARACTER SET armscii8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `friend`
--

INSERT INTO `friend` (`ID`, `EmailAdd`, `Send`, `Request`, `FriendList`) VALUES
(1, 'yangs_uestc@163.com', '', '2,', '2,'),
(2, '123@gmail.com', '1,', '3,', '1,'),
(3, '321@gmail.com', '2', '', '');


-- --------------------------------------------------------

--
-- 表的结构 `plan`
--

CREATE TABLE `plan` (
  `ID` int(255) NOT NULL,
  `EmailAdd` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `PlanNum` int(255) NOT NULL,
  `StartDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndDate` date NOT NULL,
  `EndTime` time NOT NULL,
  `Body` varchar(255) CHARACTER SET armscii8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `plan`
--

INSERT INTO `plan` (`ID`, `EmailAdd`, `PlanNum`, `StartDate`, `StartTime`, `EndDate`, `EndTime`, `Body`) VALUES
(1, '123@gmail.com', 1, '2016-12-15', '21:00:00', '2016-12-15', '22:00:00', 'Breast,Back,Shoulder,Abs,Gluteus'),
(13, '123@gmail.com', 4, '2016-12-19', '00:30:00', '2016-12-19', '23:59:00', 'Breast,Abs'),
(11, '123@gmail.com', 2, '2016-12-01', '21:30:00', '2016-12-01', '22:30:00', 'Breast,Abs,Gluteus'),
(12, '123@gmail.com', 3, '2016-12-02', '21:30:00', '2016-12-02', '22:30:00', 'Breast,Legs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`ID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `friend`
--
ALTER TABLE `friend`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `plan`
--
ALTER TABLE `plan`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
