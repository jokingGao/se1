-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 12 月 14 日 02:36
-- 服务器版本: 5.1.53
-- PHP 版本: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `se1`
--

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `EmailAdd` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Age` int(255) NOT NULL,
  `Weight` double NOT NULL,
  `Height` double NOT NULL,
  `hasFitbit` tinyint(1) NOT NULL,
  `Messages` varchar(2000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`ID`, `UserName`, `Password`, `EmailAdd`, `FirstName`, `LastName`, `Age`, `Weight`, `Height`, `hasFitbit`, `Messages`) VALUES
(1, 'sheetz', '123', 'yangs_uestc@163.com', 'Shang', 'Yang', 23, 176.3, 68.5, 1, 'hello');

-- --------------------------------------------------------

--
-- 表的结构 `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `EmailAdd` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `StartDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndDate` date NOT NULL,
  `EndTime` time NOT NULL,
  `Body` varchar(255) CHARACTER SET armscii8 NOT NULL,
  PRIMARY KEY (`EmailAdd`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `plan`
--

