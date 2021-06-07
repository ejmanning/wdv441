-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2021 at 02:04 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdv441_2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `cms_id` int(11) NOT NULL,
  `keywords` varchar(150) DEFAULT NULL,
  `h1` varchar(150) DEFAULT NULL,
  `content` mediumtext DEFAULT NULL,
  `url_key` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cms_id`, `keywords`, `h1`, `content`, `url_key`, `title`) VALUES
(1, 'test,page', 'Test Page 1', 'This is the content for test page 1', 'test-page', 'CMS Test Page 1'),
(2, 'test,page,second', 'Test Page 2', 'this is the content of the second page.', 'test-page-2', 'Test Page 2 title'),
(3, 'erica, manning, developer', 'Erica Manning', 'This is Erica Manning\'s Awesome Page!', 'erica-manning', 'Erica\'s Page'),
(4, 'cool, awesome, neat', 'Garritt Grandberg', 'Garritt\'s page', 'garritt-grandberg', 'Garritt\'s Page ');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faqID` int(11) NOT NULL,
  `faqQuestion` varchar(500) NOT NULL,
  `faqAnswer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faqID`, `faqQuestion`, `faqAnswer`) VALUES
(1, 'How much does hosting cost?', 'The price varies, but typically just hosting costs $100/year.'),
(2, 'How long does it take to make a website?', 'Typically, it takes 2 - 4 weeks, depending on the size and features of the website. '),
(3, 'How much does a website cost?', 'Our typical mid size website costs $5,000 - $9,000. '),
(4, 'What color is the sky?', 'Blue!');

-- --------------------------------------------------------

--
-- Table structure for table `newsArticles`
--

CREATE TABLE `newsArticles` (
  `articleID` int(11) NOT NULL,
  `articleTitle` varchar(150) DEFAULT NULL,
  `articleContent` mediumtext DEFAULT NULL,
  `articleAuthor` varchar(150) DEFAULT NULL,
  `articleDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsArticles`
--

INSERT INTO `newsArticles` (`articleID`, `articleTitle`, `articleContent`, `articleAuthor`, `articleDate`) VALUES
(1, 'Erica\'s Article', 'Blah blah blah', 'Erica Manning', '2021-02-24 00:00:00'),
(2, 'Bob\'s Article', 'Blahsd', 'Bob', '2021-02-23 00:00:00'),
(3, 'Joe\'s Article', 'This is an article.', 'Joe Watznauer', '2021-02-24 00:00:00'),
(4, 'Good Article', 'Yes', 'EM', '2001-08-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `password`, `user_level`) VALUES
(1, 'ericam', '19247', 200),
(2, 'joey123', '19728', 200),
(3, 'bobby', '12345', 1),
(4, 'elmo', '19247', 1),
(5, 'dylan', '19247', 1),
(6, 'ggg', '19247', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`cms_id`),
  ADD UNIQUE KEY `url_key` (`url_key`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faqID`);

--
-- Indexes for table `newsArticles`
--
ALTER TABLE `newsArticles`
  ADD PRIMARY KEY (`articleID`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `cms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsArticles`
--
ALTER TABLE `newsArticles`
  MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
