-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 08:50 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;  
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testsql`
--

---------------------------------------------------------- 

--


/*
phone number, email, full name, date of birth, address,
*/



CREATE TABLE `users` (
  `Id` int(11) UNSIGNED AUTO_INCREMENT primary key,
  `Phone` int(30) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `DateOfBirth` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Code` mediumint(30) NOT NULL,
  `TotalAmount` int(30) NOT NULL,
  `FrontCard` varchar(255) NOT NULL,
  `BackCard` varchar(255) NOT NULL,
  `LoginAttempts` int(30),
  `LockedTimeStamp` datetime,
  `timestamp_users` datetime
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `wallet` (
  `userId` int(11),
  `Id` int(11) UNSIGNED AUTO_INCREMENT primary key,
  `CardNumber` int(30) NOT NULL,
  `Expiration` date NOT NULL,
  `CVV` int(30) NOT NULL,
  `WithdrawMoney` int(30) NOT NULL,
  `DepositMoney` int(30) NOT NULL,
  `Money` int(30) NOT NULL,
  `Code` int(30) NOT NULL,
  `Note` varchar(255) NOT NULL,
  `Carrier` varchar(255) NOT NULL,
  `PendingStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
