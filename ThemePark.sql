-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2022 at 09:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ThemePark`
--

-- --------------------------------------------------------

--
-- Table structure for table `cookies`
--

CREATE TABLE `cookies` (
  `cookie` varchar(120) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cookies`
--

INSERT INTO `cookies` (`cookie`, `user_id`) VALUES
('cfa618b267a0e0c7b5b9c87d186028184df0ad27c20c5abbda91f97b3f4b334212031d206c48749c7a0863dcf53d22104c2bf893b08a012b83fef1f2', 5),
('c3a96db5ce1e623ef983f2afb101c34b67c5f65bda5a4abe28f9050e0cd7303cfc2c984ce1f087a22ea57a72991aabc639cd13635cf84a52caae2f5d', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ride_list`
--

CREATE TABLE `ride_list` (
  `ride_id` int(11) NOT NULL,
  `ride_name` varchar(40) NOT NULL,
  `ride_description` varchar(120) NOT NULL,
  `adult_price` int(11) NOT NULL,
  `child_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ride_list`
--

INSERT INTO `ride_list` (`ride_id`, `ride_name`, `ride_description`, `adult_price`, `child_price`) VALUES
(2, 'Carousel', 'Merry-Go-Round', 400, 200),
(9, 'Haunted Mansion', 'Dark Rides', 200, 120),
(10, 'Gravitron', 'Flat Ride', 200, 120),
(12, 'Frisbee', 'Pendulum ride', 200, 120);

-- --------------------------------------------------------

--
-- Table structure for table `tickets_list`
--

CREATE TABLE `tickets_list` (
  `ticket_id` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `no_adult` int(11) NOT NULL DEFAULT 0,
  `ride_id` int(11) NOT NULL,
  `date_issued` datetime NOT NULL DEFAULT current_timestamp(),
  `no_child` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets_list`
--

INSERT INTO `tickets_list` (`ticket_id`, `customer_name`, `no_adult`, `ride_id`, `date_issued`, `no_child`) VALUES
(19, 'ajay parmar', 3, 2, '2022-03-18 17:50:58', 1),
(20, 'survesh', 2, 9, '2022-03-18 17:51:56', 2),
(21, 'Ramesh', 2, 9, '2022-03-23 02:41:45', 1),
(22, 'Dhruv', 2, 9, '2022-04-16 17:09:16', 1),
(23, 'Ramesh', 3, 10, '2022-04-16 17:13:02', 2),
(24, 'Hemang', 3, 9, '2022-04-16 17:13:16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(120) NOT NULL,
  `type` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `date_created`) VALUES
(1, 'Dhruv', NULL, 'admin@admin.com', '$2y$10$gamAKPfdqknOspwq6gmZC.A.xSErYXLg.lrTpdQaMdWvh/PmJTod6', 1, '2022-02-22 06:59:18'),
(5, 'Jay', NULL, 'jay@gmail.com', '$2y$10$JhlU4tidlVRgRI9PcZwvUu.20/VVKJxG19VatKKEu6fKYMHV0ncLu', 2, '2022-02-22 07:00:35'),
(6, 'Ramesh', 'kumal', 'ramesh@gmail.com', '$2y$10$5I13TUa38NsTMueh9sTyoOlPfEDWoC1TWNUVEp7nMU8dpcQqjZcOW', 2, '2022-02-25 07:56:35'),
(11, 'faiz', '0', 'faiz@gmail.com', '$2y$10$YZF9yDO4K6lUqpPVb6zBZOTAGtaPrf00wnSUZ3jSYkYQS1O2BvQii', 2, '2022-02-26 06:34:25'),
(12, 'naim', 'ghoda', 'naim@gmail.com', '$2y$10$yYuQLrgmSL/bptLbFJYshOBJ4KM7OpjM62C0Qi3fDvshuWwNrDrKa', 2, '2022-02-27 06:28:30'),
(13, 'Ram', '0', 'ram@gmail.com', '$2y$10$Mat3UrWDEJ4D918Ugt7gyet2Fw.XhWGYWl7FbEL.3gjORzoNtH6Ma', 1, '2022-02-27 09:08:29'),
(14, 'Shyam', '0', 'shyam@gmail.com', '$2y$10$fgvSV1EPNGzAGHDvOojiOu8AWHQxcybdTYfL24Ldb1q0oxBIKnYVW', 2, '2022-02-27 09:09:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ride_list`
--
ALTER TABLE `ride_list`
  ADD PRIMARY KEY (`ride_id`);

--
-- Indexes for table `tickets_list`
--
ALTER TABLE `tickets_list`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `foreign_key_ride_id` (`ride_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ride_list`
--
ALTER TABLE `ride_list`
  MODIFY `ride_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tickets_list`
--
ALTER TABLE `tickets_list`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets_list`
--
ALTER TABLE `tickets_list`
  ADD CONSTRAINT `foreign_key_ride_id` FOREIGN KEY (`ride_id`) REFERENCES `ride_list` (`ride_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
