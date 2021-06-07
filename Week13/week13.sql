-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table wdv441_2021.cms
CREATE TABLE IF NOT EXISTS `cms` (
  `cms_id` int(11) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(150) DEFAULT NULL,
  `h1` varchar(150) DEFAULT NULL,
  `content` mediumtext,
  `url_key` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`cms_id`),
  UNIQUE KEY `url_key` (`url_key`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table wdv441_2021.cms: ~0 rows (approximately)
/*!40000 ALTER TABLE `cms` DISABLE KEYS */;
REPLACE INTO `cms` (`cms_id`, `keywords`, `h1`, `content`, `url_key`, `title`) VALUES
	(1, 'test,page', 'Test Page 1', 'This is the content for test page 1', 'test-page', 'CMS Test Page 1'),
	(2, 'test,page,second', 'Test Page 2', 'this is the content of the second page.', 'test-page-2', 'Test Page 2 title');
/*!40000 ALTER TABLE `cms` ENABLE KEYS */;

-- Dumping structure for table wdv441_2021.newsarticles
CREATE TABLE IF NOT EXISTS `newsarticles` (
  `articleID` int(11) NOT NULL AUTO_INCREMENT,
  `articleTitle` varchar(150) DEFAULT NULL,
  `articleContent` mediumtext,
  `articleAuthor` varchar(150) DEFAULT NULL,
  `articleDate` datetime DEFAULT NULL,
  PRIMARY KEY (`articleID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table wdv441_2021.newsarticles: ~6 rows (approximately)
/*!40000 ALTER TABLE `newsarticles` DISABLE KEYS */;
REPLACE INTO `newsarticles` (`articleID`, `articleTitle`, `articleContent`, `articleAuthor`, `articleDate`) VALUES
	(1, 'Test Article 1', 'Content 1', 'GG2', '2021-02-18 00:00:00'),
	(2, 'Test Article 2', 'test 3', 'GG999', '2021-02-18 00:00:00'),
	(3, 'Test Article 3', 'testing 3', 'GG3', '2021-02-25 00:00:00'),
	(4, 'Test Article 4', 'testing 4', 'Erica', '2021-02-25 00:00:00'),
	(5, 'Test Article 5', 'testing 5', 'Will', '2021-03-11 00:00:00'),
	(6, 'Test Article 6', 'testing 6', 'Norman', '2021-03-11 00:00:00');
/*!40000 ALTER TABLE `newsarticles` ENABLE KEYS */;

-- Dumping structure for table wdv441_2021.users
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userlevel` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table wdv441_2021.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`userId`, `username`, `password`, `userlevel`) VALUES
	(1, 'testuser1', 'test1', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
