-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 05:18 PM
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
-- Database: `artgl`
--

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`id`, `title`, `image_url`, `artist`, `description`) VALUES
(1, 'Forest at sunset', 'images/11.jpg', 'jose@2', 'a painting of a forest at sunset. The trees in the foreground have red and orange leaves, while the trees in the background are blue and purple. The sky is a gradient of orange, pink, and purple.'),
(2, 'messi in Stadium', 'messi.png', 'jose@2', 'Beautifull painting of messi standing in the pitch with the crowd cheering him on'),
(3, 'Foulness Bike Ride', 'images/5.jpg', 'jose@2', 'single-speed bicycle leaning against a yellow brick wall. The bicycle has a black seat and handlebars, and there is a silver chain on the right side.'),
(4, 'Collage of ripped posters on a wall.', 'images/7.jpg', 'kevo@5', 'a collage of ripped posters on a wall. The posters are advertising various events and are all different colors, shapes, and sizes. Some of the text that can be made out includes \"Liberté,\" \"ChicO Dill,\" \"Musique,\" \"Hauts-de-Seine,\" and \"Ambassadeurs.\"'),
(5, 'Vase of Flowers', 'images/18.jpg', 'Jan Davidsz de Heem.', 'breathtaking painting of a classic sports car slicing through a winding mountain road, with the sun setting behind, casting long shadows and illuminating the vibrant colors of the landscape.'),
(6, 'classic sports car painting', 'image1.png', 'jose@2', 'breathtaking painting of a classic sports car slicing through a winding mountain road, with the sun setting behind, casting long shadows and illuminating the vibrant colors of the landscape.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `artwork_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `artwork_id`, `user_id`, `username`, `comment`, `timestamp`) VALUES
(9, 1, 2, 'john', 'This artwork exudes an undeniable aura of elegance and sophistication. The meticulous attention to detail and the masterful use of color evoke a sense of wonder and captivation.', '2024-03-07 11:04:19'),
(10, 1, 1, 'jose', 'Ilove this art', '2024-03-07 11:04:51'),
(11, 2, 1, 'jose', 'oyeee\r\n', '2024-03-07 13:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`) VALUES
(1, 'images/1.jpg'),
(2, 'images/2.jpg'),
(3, 'images/3.jpg'),
(4, 'images/4.jpg'),
(5, 'images/5.jpg'),
(6, 'images/6.jpg'),
(7, 'images/7.jpg'),
(8, 'images/8.jpg'),
(9, 'images/9.jpg'),
(10, 'images/10.jpg'),
(11, 'images/11.jpg'),
(12, 'images/12.jpg'),
(13, 'images/13.jpg'),
(14, 'images/14.jpg'),
(15, 'images/15.jpg'),
(16, 'images/16.jpg'),
(17, 'images/17.jpg'),
(18, 'images/18.jpg'),
(19, 'images/19.jpg'),
(20, 'images/20.jpg'),
(21, 'images/21.jpg'),
(22, 'images/22.jpg'),
(23, 'images/23.jpg'),
(24, 'images/24.jpg'),
(25, 'images/25.jpg'),
(26, 'images/26.jpg'),
(27, 'images/27.jpg'),
(28, 'images/28.jpg'),
(29, 'images/29.jpg'),
(30, 'images/30.jpg'),
(31, 'images/31.jpg'),
(32, 'images/32.jpg'),
(33, 'images/33.jpg'),
(34, 'images/34.jpg'),
(35, 'images/35.jpg'),
(36, 'images/36.jpg'),
(37, 'images/37.jpg'),
(38, 'images/38.jpg'),
(39, 'images/39.jpg'),
(40, 'images/40.jpg'),
(41, 'images/41.jpg'),
(42, 'images/42.jpg'),
(43, 'images/43.jpg'),
(44, 'images/44.jpg'),
(45, 'images/45.jpg'),
(46, 'images/46.jpg'),
(47, 'images/47.jpg'),
(48, 'images/48.jpg'),
(49, 'images/49.jpg'),
(50, 'images/50.jpg'),
(51, 'images/51.jpg'),
(52, 'images/52.jpg'),
(53, 'images/53.jpg'),
(54, 'images/54.jpg'),
(55, 'images/55.jpg'),
(56, 'images/56.jpg'),
(57, 'images/57.jpg'),
(58, 'images/58.jpg'),
(59, 'images/59.jpg'),
(60, 'images/60.jpg'),
(61, 'images/61.jpg'),
(62, 'images/62.jpg'),
(63, 'images/63.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `id` int(11) NOT NULL,
  `artwork_id` int(11) DEFAULT NULL,
  `thumbnail_url` varchar(100) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`id`, `artwork_id`, `thumbnail_url`, `video_url`, `timestamp`) VALUES
(1, 1, 'thumbnail1.jpg', 'interview1.mp4', '2024-03-05 16:51:57'),
(3, 1, 'thumbnail1.jpg', 'interview1.mp4', '2024-03-05 16:51:57'),
(4, 1, 'thumbnail1.jpg', 'interview1.mp4', '2024-03-05 16:51:57'),
(5, 2, 'thumbnail1.jpg', 'interview1.mp4', '2024-03-05 16:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'jose', 'jose@gmail.com', '36d59b25b34f677e8f027b112241b69c'),
(2, 'john', 'john@gmail.com', 'be8682aec5d04c047a3342426eed1333'),
(3, 'jane', 'jane@gmail.com', '7e2c9d05b13bbadb54c4ee2c40490471');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artwork_id` (`artwork_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artwork_id` (`artwork_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`artwork_id`) REFERENCES `artwork` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_ibfk_1` FOREIGN KEY (`artwork_id`) REFERENCES `artwork` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
