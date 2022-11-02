-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 05:10 AM
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
-- Database: `musically`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `thumbnail`) VALUES
(0, 'rap', 'rap musics', '1666415795maxresdefault.jpg'),
(1, 'other', 'uncategorized songs', '1666415754download.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `music` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `auther_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `body`, `thumbnail`, `music`, `date_time`, `category_id`, `auther_id`, `is_featured`) VALUES
(13, 'kusu kusu', ' Kusu Kusu Song Download From Satyameva Jayate 2 Sung by Zahrah S Khan &amp; Dev Negi Music By Tanishk Bagchi in 190kbs &amp; 320Kbps only on Pagalworld.From New Music Album &quot;Satyameva Jayate 2 (2021) Mp3 Songs&quot;. Free Download or listen online - in HD High Original iTunes Rip Quality Audio.\r\n\r\nNora Fatehi&#039;s belly dancing moves, charming expressions, and gorgeous outfits make this a great show for her fans. The performance of the Moroccan beauty bely dancing is not her first. We have previously seen her perform in songs such as &#039;O Saki Saki&#039; and &#039;Dilbar&#039;.', '1666410557ab67616d0000b2736c2949cd2c53f81b36a975d1.jpeg', '1666410557y2mate.com - Kusu Kusu Song Ft Nora Fatehi  Satyameva Jayate 2  John A Divya K  Tanishk B Zahrah Khan Dev N.mp3', '2022-10-22 03:49:17', 1, 31, 0),
(14, 'Till i  collapse', '&quot;&#039;Till I Collapse&quot; is a song by American rapper Eminem featuring fellow American rapper and singer Nate Dogg, released from his fourth studio album The ...', '1666472780artworks-000161139232-rkikne-t500x500.jpg', '1666472780y2mate.com - Till I Collapse.mp3', '2022-10-22 21:06:20', 0, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(30, 'Afzal', 'Iqbal', 'afzzal', 'afzaliqbal715@gmail.com', '$2y$10$k/bKbSFR6.TW7ZF97na23uOIZXWKruojczHoC6vApjl191AEaJf9W', '1666332706PowerPeople_Melissa001.png', 1),
(31, 'anirudh', 'ravichander', 'anirudh', 'anirudh715@gmail.com', '$2y$10$6qUCc86BaI5ZNLXw8.ip2OEEpqWWbPF.mQyD0lJe4tYNaG8JW6/16', '16663847504RqfmPhND0cKe83kCohjCW06Q02.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gc_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_gc_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
