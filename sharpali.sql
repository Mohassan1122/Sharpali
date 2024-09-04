-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2022 at 01:23 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharpali`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `image`, `name`, `created_at`) VALUES
(2, 'agency4-portfolio-single1.jpg', 'Artisan Network', '2022-07-13 14:23:56'),
(3, 'agency4-portfolio-single5.jpg', 'How to fix warning: mysqli_num_rows() expects parameter  boolean given in ...', '2022-07-13 14:25:01'),
(4, 'agency4-aboutus-highlight2-350x350.jpg', 'How to fix warning boolean given ', '2022-07-13 14:25:42'),
(5, 'agency4-portfolio-single6.jpg', '🔥How to Add Read More Button/Link in PHP || Limit Text Length in PHP and Provide Read More Link', '2022-07-13 14:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `body` varchar(200) DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `body`, `image`, `description`, `created_at`) VALUES
(4, 'How SEO can help with selling more and more to new clients?', 0x6167656e6379342d686f6d652d6e756d626572732d696d6167652e6a7067, '<p>ttytthhtQuisque id nulla finibus, <strong>semper odio nec, accumsan p</strong>urus. Sed at dolor ut purus congue congue vel non metus. Phasellus non interdum lacus, in vulputate purus.</p>\r\n', '2022-07-13 02:13:39'),
(6, 'Why proffesional SEO is so important on mobile devices?', 0x6167656e6379342d706f7274666f6c696f2d73696e676c65352e6a7067, '<p><span style=\"font-size:14px\">Quisque id nulla finibus, semper odio nec, accumsan purus. Sed at dolor ut purus congue congue vel non metus. Phasellus non interdum lacus, in vulputate purus.</span></p>\r\n', '2022-07-13 02:23:22'),
(7, 'How you can improve sale with our simple solutions in just 1 month?', 0x6167656e6379342d706f7274666f6c696f2d73696e676c65362e6a7067, '<h5><span style=\"font-size:14px\">Quisque id nulla finibus, semper odio nec, accumsan purus. Sed at dolor ut purus congue congue vel non metus. Phasellus non interdum lacus, in vulputate purus.</span></h5>\r\n', '2022-07-13 02:24:40'),
(8, 'Which keywords are the most important, conference and case study', 0x6167656e6379342d706f7274666f6c696f2d73696e676c65332e6a7067, '<h5><span style=\"font-size:14px\">Quisque id nulla finibus, semper odio nec, accumsan purus. Sed at dolor ut purus congue congue vel non metus. Phasellus non interdum lacus, in vulputate purus.</span></h5>\r\n', '2022-07-13 02:25:50'),
(9, 'How we set up key words for local medical healthcare', 0x6167656e6379342d706f7274666f6c696f2d73696e676c65342e6a7067, '<p>Add the relative form sizing classes to the&nbsp;<code>.input-group</code>&nbsp;itself and contents within will automatically resizeno need for repeating the form control size classes on each element.</p>\r\n', '2022-07-13 03:09:03'),
(10, 'Overview', 0x6167656e6379342d706f7274666f6c696f2d73696e676c65312e6a7067, '<p>We use a large block of connected links for our pagination, making links hard to miss and easily scalable&mdash;all while providing large hit areas. Pagination is built with list HTML elements so</p>\r\n', '2022-07-13 17:23:28'),
(11, 'Spasio Company – full case study of seo optimisation', 0x6167656e6379342d636f6e746163742d69636f6e312e706e67, '<p>&nbsp;</p>\r\n\r\n<p>To close <strong>Launchpad</strong> without opening an app, click the background, press the Esc (Eslcape) key, or pinch&nbsp;open with your thumb and three <strong>fingers</strong> on your trackpad.</p>\r\n', '2022-07-14 05:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `header` varchar(200) DEFAULT NULL,
  `body` varchar(2000) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `img`, `header`, `body`, `description`, `created_at`) VALUES
(2, 'agency4-portfolio-single3.jpg', 'Social Media Marketing', 'Spasio Company – full case study of seo optimisation', '<ul>\r\n	<li>We have over 15 years experience in the industry</li>\r\n	<li>One of the best ratings on the market - 98%</li>\r\n	<li>Our team is very qualified and we are still growing</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '2022-07-13 03:32:28'),
(4, 'agency4-home-numbers-image.jpg', ' the variable holding the connection ...', 'See the above link on keep.', '<p>we will retrieve the <em>image</em> content<strong> from</strong> the MySQL database and list them on the web page.</p>\r\n\r\n<ul>\r\n</ul>\r\n', '2022-07-13 16:18:37'),
(6, 'agency4-aboutus-highlight2.jpg', ' the variable holding the connection ', 'How we set up key words for local medical healthcare', '<p>The data, charset, and base64 parameters in the src attribute, are used</p>\r\n', '2022-07-14 02:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `image` varchar(350) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `image`, `name`, `description`, `created_at`) VALUES
(1, 'agency4-aboutus-highlight1.jpg', 'Mohammed Hassan', '<p>The data, charset, and base64 parameters in the src attribute, are used to&nbsp;<strong>display image BLOB from MySQL</strong>&nbsp;database.</p>\r\n', '2022-07-13 15:24:52'),
(3, 'agency4-aboutus-highlight2-350x350.jpg', 'Overview', '<p>We use a large block of connected links for our pagination, making links hard to miss and easily scalable&mdash;all while providing large hit areas. Pagination is built with list HTML elements so screen readers can announce the number of available links. Use a wrapping&nbsp;<code>&lt;nav&gt;</code>&nbsp;element to identify it as a navigation section to screen readers and other assistive technologies</p>\r\n', '2022-07-13 15:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pword` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pword`, `created_at`) VALUES
(5, 'mohammed hassan', 'f@gmail.com', 'daddy1122', '2022-07-12 21:05:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
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
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
