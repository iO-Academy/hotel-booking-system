# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.37)
# Database: hotelRoomBooking
# Generation Time: 2017-11-27 15:06:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table roomImages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roomImages`;

CREATE TABLE `roomImages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `imgName` varchar(40) NOT NULL DEFAULT '',
  `roomType` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `roomTypeFK` (`roomType`),
  CONSTRAINT `roomTypeFK` FOREIGN KEY (`roomType`) REFERENCES `roomTypes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table roomTypes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roomTypes`;

CREATE TABLE `roomTypes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(8) NOT NULL DEFAULT '',
  `pricePerNight` float NOT NULL,
  `numberOfAdults` int(11) NOT NULL,
  `hasCot` tinyint(1) NOT NULL,
  `minStay` int(11) NOT NULL,
  `numberInHotel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `roomTypes` WRITE;
/*!40000 ALTER TABLE `roomTypes` DISABLE KEYS */;

INSERT INTO `roomTypes` (`id`, `name`, `pricePerNight`, `numberOfAdults`, `hasCot`, `minStay`, `numberInHotel`)
VALUES
	(1,'Standard',60,2,0,2,6),
	(2,'Family',100,4,1,2,2),
	(3,'VIP',400,10,0,5,2);

/*!40000 ALTER TABLE `roomTypes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
