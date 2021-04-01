-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for registry
CREATE DATABASE IF NOT EXISTS `registry` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `registry`;

-- Dumping structure for table registry.registry
CREATE TABLE IF NOT EXISTS `registry` (
  `name` varchar(747) COLLATE utf8_bin NOT NULL,
  `code` varchar(11) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `age` int(11) NOT NULL,
  `address` varchar(50) COLLATE utf8_bin NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table registry.registry: ~5 rows (approximately)
/*!40000 ALTER TABLE `registry` DISABLE KEYS */;
INSERT INTO `registry` (`name`, `code`, `description`, `id`, `age`, `address`) VALUES
	('ritvars eglÄjs', '09099111078', 'testing with -', 25, 25, 'sigulda'),
	('zigurds susurs', '11111122222', 'SkrÄ“jÄ“js', 26, 30, 'sigulda'),
	('agnese kudelkina', '99999988888', 'Best person', 27, 25, 'madona'),
	('jÄnis bÄ“rziÅ†Å¡', '12312312121', '', 28, 60, 'cÄ“sis'),
	('juris vÄ«tols', '22222211111', '', 29, 40, 'jelgava');
/*!40000 ALTER TABLE `registry` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
