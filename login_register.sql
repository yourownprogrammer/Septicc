-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 08:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pole_number` varchar(50) NOT NULL,
  `house_number` int(11) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `delivery_time` varchar(50) NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `email`, `phone`, `street`, `city`, `pole_number`, `house_number`, `service_type`, `delivery_time`, `requested_at`) VALUES
(1, 'AbISHEK ADHIKARI', 'sudeep12@gmail.com', '9845122232', 'fdsf', 'Bharatpur', '12', 12345, 'Emptying Septic Tank', 'Deliver Now', '2024-11-20 09:46:00'),
(2, 'AbISHEK ADHIKARI', 'sudeep12@gmail.com', '9845122232', 'fdsf', 'Bharatpur', '22', 1234, 'Emptying Septic Tank', 'Schedule for Later', '2024-11-20 09:50:41'),
(3, 'ushan khdak', 'ushan2@gmail.com', '9856232145', 'sfsf', 'sdfds', '25', 36, 'Septage for Field', 'Deliver Now', '2024-11-20 10:02:28'),
(4, 'aysush shah', 'ramansing23@gmail.com', '9856232154', 'sdf', 'dg', '22', 22, 'Emptying Septic Tank', 'Deliver Now', '2024-11-20 10:09:50'),
(5, 'sdszs dfgd ', 'ramitpoudel123@gmail.com', '9874422223', 'seydrfr', 'eygrh', '233', 5444, 'Septage for Field', 'Deliver Now', '2024-11-20 10:12:14'),
(6, 'AbISHEK ADHIKARI', 'sudeep12@gmail.com', '9845151515', 'sam', 'sam', '12', 12, 'Emptying Septic Tank', 'Deliver Now', '2024-11-20 10:15:55'),
(7, 'AbISHEK ADHIKARI', 'sudeep12@gmail.com', '9845151515', 'sam', 'sam', '12', 12, 'Emptying Septic Tank', 'Deliver Now', '2024-11-20 10:18:22'),
(8, 'AbISHEK ADHIKARI', 'sudeep12@gmail.com', '9845151515', 'sam', 'sam', '12', 12, 'Emptying Septic Tank', 'Deliver Now', '2024-11-20 10:19:56'),
(9, 'AbISHEK ADHIKARI', 'abc123@gmail.com', '9845122232', 'Jaldevi tol', 'Bharatpur', '12', 1, 'Emptying Septic Tank', 'Deliver Now', '2024-11-20 10:20:18'),
(10, 'AbISHEK ADHIKARI', 'ramitpoudel123@gmail.com', '9845122232', 'Jaldevi tol', 'Bharatpur', '123', 456, 'Emptying Septic Tank', 'Deliver Now', '2024-11-20 10:24:57'),
(11, 'AbISHEK ADHIKARI', 'abc123@gmail.com', '9845122232', 'fdsf', 'Bharatpur', '12', 0, 'Emptying Septic Tank', 'Deliver Now', '2024-11-21 10:26:27'),
(12, 'hari sharma', 'sudeep12@gmail.com', '9877777777', 'abcd', 'oke', '21', 22, 'Emptying Septic Tank', 'Deliver Now', '2024-11-21 12:07:49'),
(13, 'hari sharma', 'sudeep12@gmail.com', '9877777777', 'abcd', 'oke', '21', 22, 'Emptying Septic Tank', 'Deliver Now', '2024-11-21 12:11:31'),
(14, 'hari sharma', 'sudeep12@gmail.com', '9877777777', 'abcd', 'oke', '21', 22, 'Emptying Septic Tank', 'Deliver Now', '2024-11-21 12:13:03'),
(15, 'Manish pandey', 'Manish@gmail.com', '9855555555', 'sfszsef', 'eatgs', '22', 20, 'Septage for Field', 'Deliver Now', '2024-11-21 12:17:32'),
(16, 'Riya Pradhan', 'riya@gmail.com', '9855555555', 'seven', 'chtwn', '23', 32, 'Emptying Septic Tank', 'Schedule for Later', '2024-11-21 12:18:58'),
(17, 'Jiba joju', 'jiba@gmail.com', '9845122232', 'Jaldevi tol', 'df', '22', 45, 'Septage for Field', 'Deliver Now', '2024-11-21 12:35:04'),
(18, 'ramit', 'poudelram@gmail.com', '9876543211', 'kol tol', 'bharatpur', '12', 34, 'Emptying Septic Tank', 'Deliver Now', '2024-11-22 04:48:46'),
(19, 'Ramit Poudel', 'poudelram@gmail.com', '9846253422', 'kl tol', 'bharatpur', '34', 34, 'Septage for Field', 'Deliver Now', '2024-11-22 04:56:06'),
(20, 'weas', 'asdf@gmail.com', 'fsadfe', 'ef', 'sdfsfds', '22', 1, 'Septage for Field', 'Deliver Now', '2024-11-24 05:05:01'),
(21, 'Prashish Dubey', 'Prashish14@gmail.com', '9842156891', 'raskesh', 'xdfgdfs', '45', 52, 'Emptying Septic Tank', 'Deliver Now', '2024-11-25 07:15:55'),
(22, 'AbISHEK ADHIKARI', 'Samrat111@gmail.com', '9811488326', 'sdf', 'sdfdzs', '22', 45, 'Septage for Field', 'Deliver Now', '2024-11-26 17:16:05'),
(23, 'AbISHEK ADHIKARI', 'sudeep12@gmail.com', '9845151515', 'Jaldevi tol', 'df', '22', 42, 'Septage for Field', 'schedule for later', '2024-11-27 05:03:11'),
(24, '', '', '', '', '', '', 0, 'select', 'select', '2024-11-27 06:54:33'),
(25, 'I dont know', 'ramayadav@gmail.com', '9842156891', 'jdsf', 'sdfsed', '21', 42, 'Septage for Field', 'select', '2024-11-27 07:39:00'),
(26, 'ram sdf', 'Samrat111@gmail.com', '9842156891', 'fdsf', 'Bharatpur', '12', 1221, 'Emptying Septic Tank', 'Deliver Now', '2024-11-27 11:42:37'),
(27, 'ram sdf', 'Samrat111@gmail.com', '9842156891', 'fdsf', 'Bharatpur', '12', 1221, 'Emptying Septic Tank', 'Deliver Now', '2024-11-27 12:47:18'),
(28, 'ram sdf', 'Samrat111@gmail.com', '9842156891', 'fdsf', 'Bharatpur', '12', 1221, 'Emptying Septic Tank', 'Deliver Now', '2024-11-27 12:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `user_type`) VALUES
(35, 'Admin', 'admin111@gmail.com', '$2y$10$BwPQq9TXpy0xUD7Atfkz9emY.uqEm8JoSYy1d77NxwEIxe/N6YwCK', 'admin'),
(36, 'Sam Rat', 'Samrat111@gmail.com', '$2y$10$sztO69KlV1NoHBHg4IZiWu8LuQ1BQEGMkn7SNv1wnmIxAvzwIvhNC', 'user'),
(37, 'Ayush Shah', 'aaaaaaa@gmail.com', '$2y$10$BiyhTykzCQxODZGIutoZZ.gYVTeUX5gmWCxILnwDCDz.vejDhrVtm', 'user'),
(38, 'Riya Thapa', 'riya@gmail.com', '$2y$10$JdrJlR27gJ077SRSz8eVxuriuM0BR13hPef0BKRmtZnghBHVp6ome', 'user'),
(39, 'Anish Damai', 'Anish12@gmail.com', '$2y$10$Jh85an6wcWlnjzHndf3iEeZDxFhPzm8o.I4W6Mcheiqp.KcMWV6P6', 'user'),
(40, 'ram yada', 'ram1@gmail.com', '$2y$10$dlZjvc/TUOmO6rzGKluGBehAn7mfoMlEHg6ARaVljNDHuggLVC9m2', 'user'),
(41, 'Man ish', 'Manish@gmail.com', '$2y$10$SlooVbBSa4ThlUj3D4EX.e65OJnQ7k4EazgyZTycb5TgESvoQWGpq', 'user'),
(42, 'Abc de', 'jiba@gmail.com', '$2y$10$XgDHUGwTRTZY8Ghfqx4mSelJ11XGJ61dhMKdUc6XA9VzcmF.o8bnW', 'user'),
(43, '', '', '$2y$10$e0KPlpFbChZhCMC3xFxuV.KEUZhLz8F9LEatWPpaXoen82C/h7boK', 'user'),
(44, 'RAM shah', 'rames123@gmail.com', '$2y$10$qP8FdneJQJ5hh4YS8sC7E.8eK0aJr/oNeZ1I4dXAefZteZxFEbn3G', 'user'),
(45, 'Bmc Nepal', 'Bmc@edu.np', '$2y$10$iSk0chzPjmhTgo2fVqYe/O/QDyj.mswPXWCRRJKBDduIMx1daJM4K', 'user'),
(46, 'Ram Niya', 'Ramm23@gmail.com', '$2y$10$QPbXqZsCfIGgg9yjSWmhPOdlmsKh3wbiljAUybSVNj9sTbY9BhIXy', 'user'),
(47, 'Ramit poudel', 'poudelram@gmail.com', '$2y$10$zakB4hObzt8CROW.w/5Ogu3jiJVw7bKRNIHw.DGd4mH7vFLrcEQ56', 'user'),
(48, 'Samrat adk', 'table@gmail.com', '$2y$10$nBw.QME.uZXoSUplOsEYl.3il4kJ02tmef.KjfNRx2LsRwHz30f/W', 'user'),
(49, 'Krishna adk', 'krishna@gmail.com', '$2y$10$WXvzqKBk10sRF2v/JKuJiOm3H7aEmB/Adj3VeB9AWLJOsfFCeJttO', 'user'),
(50, 'Prashish Dubey', 'Prashish14@gmail.com', '$2y$10$qLI1H5l2TUobpv15eUAAmexsu8p5m3pDsFgUA2tEK0oqZZZqalOKa', 'user'),
(51, 'Ram yadav', 'ramayadav@gmail.com', '$2y$10$bZCE.ya04r78FNWbDMA2Me0JJ5wbHu59B6USRrAimjWtCJkmtNfXu', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
