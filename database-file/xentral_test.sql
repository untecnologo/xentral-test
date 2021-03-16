-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 01:44 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xentral_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(50) NOT NULL,
  `title` varchar(250) NOT NULL,
  `author` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `time_post` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `author`, `text`, `time_post`) VALUES
(1, 'PRIMER TITULO', 'valentina@gmail.com', '<p>estopy probando como se guarda esta informacion</p>\n', '2021-03-15 20:10:00.000000'),
(2, 'SEGUNDO TITULO', 'valentina@gmail.com', '<p>QUIERO VER COMO FUNCIONA</p>\n\n<div id=\"gtx-trans\" style=\"position: absolute; left: -45px; top: -4.8px;\">\n<div class=\"gtx-trans-icon\">&nbsp;</div>\n</div>\n', '2021-03-15 20:11:52.000000'),
(3, 'TERCER TITULO', 'valentina@gmail.com', '<p>INSPIRADO POR OPORTUNIDADES</p>\n', '2021-03-15 20:12:09.000000'),
(4, 'CUARTO TITULO', 'valentina@gmail.com', '<p>EX INEXPLICABLE LO QUE SIENTO HACIENDO ESTO</p>\n\n<div id=\"gtx-trans\" style=\"position: absolute; left: -125px; top: -4.8px;\">\n<div class=\"gtx-trans-icon\">&nbsp;</div>\n</div>\n', '2021-03-15 20:12:56.000000'),
(5, 'QUITNO TITULO', 'valentina@gmail.com', '<p>QUIERO PROBAR HASTA DONDE PEUDO LLEGAR</p>\n', '2021-03-15 20:13:14.000000'),
(6, 'sexto titulo', 'valentina@gmail.com', '<p>increible lo que pude hacer</p>\n', '2021-03-15 20:14:16.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'rafa@gmail.com', '1234567'),
(2, 'rafita@gmail.com', '1234566'),
(3, 'rafito@gmail.com', '$2y$10$AM.YznW.Xl7.MVIgnNClWuBMQy8GnlGynKGhmyRmBrUihtGPRVUFK'),
(4, 'danita@main.com', '$2y$10$pyGddfVsm9rrxALzWFNfbeI4K7lIHIOz7trnATaA6hib6e/SE4Ihm'),
(5, 'rafa14@gmail.com', '$2y$10$cJBPW/BhoycSt7nVoTVOROAerKkkgkyZH1ZID4CcmPFdS6JhZxT9O'),
(6, 'valentina@gmail.com', '$2y$10$66dvIs5W3hHSDN2xDAVadurQQNUOuQ1y0R5nkdKVmCGmd1YyDlEQy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
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
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
