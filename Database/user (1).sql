-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 11:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `frist_name` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8_unicode_520_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `date_of_brith` date NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `frist_name`, `last_name`, `phone_number`, `email`, `date_of_brith`, `username`, `password`) VALUES
(5, 'Chathura', 'Maduranga', '0710354287', 'chathura555maduranga555@gmail.com', '2024-01-10', '4998', '4998'),
(7, 'DANUJA', 'Adikari', '0710354287', 'chathura555maduranga555@gmail.com', '1999-03-10', '12345', '12345'),
(8, 'hansini', 'mwnaka', '071545654', 'sqysgw555@gmail.com', '1999-03-10', '111111', '111111'),
(9, 'pramod', 'dilshan', '0714586856', 'pramod555@gmail.com', '1999-02-28', '2222', '2222'),
(10, 'imalka', 'imalka', '071458232', 'imalka555@gmail.com', '1999-02-28', '3333', '3333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
