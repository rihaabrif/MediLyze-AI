-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 22, 2025 at 02:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

CREATE SCHEMA IF NOT EXISTS `medilyze_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;;
USE `medilyze_db`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medilyze_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture_path` varchar(255) DEFAULT 'assets/images/default_avatar.jpg',
  `age` int(11) DEFAULT NULL,
  `height_cm` int(11) DEFAULT NULL,
  `weight_kg` int(11) DEFAULT NULL,
  `existing_diseases` text DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone_number`, `city`, `password`, `profile_picture_path`, `age`, `height_cm`, `weight_kg`, `existing_diseases`, `allergies`, `created_at`) VALUES
(3, 'Rihaab', 'rihaabrifqi@gmail.com', '0774486355', 'Wellawatta', '$2y$10$Iv74aWU0biIjKMeh5RWZl.MNthJ8uyRhhF9H55znRm7J65e8pxh86', 'uploads/profile_pictures/3-Rihaab.jpg', 17, 174, 52, '', '', '2025-10-19 15:31:35'),
(4, 'Ammaar Ghani', 'ghaniammaar@gmail.com', '0773396788', 'Maradana', '$2y$10$SGAZ.u6HwcPG4YJYuboqoeZ8J5dWbLUnV4cWWBvKb6C5He29T469y', 'uploads/profile_pictures/4-AmmaarGhani.png', 17, 195, 150, '', '', '2025-10-19 15:56:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
