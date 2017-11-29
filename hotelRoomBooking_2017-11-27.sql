# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.37)
# Database: hotelRoomBooking
# Generation Time: 2017-11-27 15:02:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bookings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `roomType` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `customerId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `roomTypeForBookingFK` (`roomType`),
  CONSTRAINT `roomTypeForBookingFK` FOREIGN KEY (`roomType`) REFERENCES `roomTypes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;

INSERT INTO `bookings` (`id`, `roomType`, `date`, `customerId`)
VALUES
	(1,3,'2017-01-13',5),
	(3,2,'2017-01-20',3),
	(4,2,'2017-01-11',2),
	(5,3,'2017-01-06',9),
	(6,1,'2017-01-03',4),
	(8,2,'2017-01-25',8),
	(10,3,'2017-01-15',5),
	(11,1,'2017-01-05',4),
	(12,1,'2017-01-09',5),
	(13,1,'2017-01-07',4),
	(14,2,'2017-01-08',1),
	(15,1,'2017-01-18',2),
	(17,2,'2017-01-26',7),
	(18,3,'2017-01-12',3),
	(19,2,'2017-01-03',2),
	(20,2,'2017-01-25',1),
	(21,1,'2017-01-17',2),
	(22,3,'2017-01-31',9),
	(23,2,'2017-01-26',1),
	(24,1,'2017-01-24',3),
	(27,3,'2017-01-16',5),
	(29,2,'2017-01-13',10),
	(31,2,'2017-01-02',5),
	(32,2,'2017-01-27',7),
	(33,3,'2017-01-08',9),
	(35,3,'2017-01-05',9),
	(36,2,'2017-01-05',9),
	(37,3,'2017-01-17',5),
	(38,2,'2017-01-19',5),
	(39,1,'2017-01-03',9),
	(40,2,'2017-01-15',10),
	(41,3,'2017-01-14',5),
	(42,1,'2017-01-10',5),
	(43,1,'2017-01-01',10),
	(44,2,'2017-01-16',10),
	(45,3,'2017-01-09',3),
	(46,3,'2017-01-07',9),
	(47,3,'2017-01-30',9),
	(48,2,'2017-01-06',1),
	(49,2,'2017-01-12',5),
	(50,2,'2017-01-29',2),
	(51,1,'2017-01-19',2),
	(52,1,'2017-01-20',2),
	(53,1,'2017-01-04',4),
	(54,1,'2017-01-06',4),
	(55,1,'2017-01-02',10),
	(56,1,'2017-01-04',9),
	(57,1,'2017-01-25',3),
	(58,1,'2017-01-23',3),
	(59,1,'2017-01-04',11),
	(60,1,'2017-01-05',11),
	(61,1,'2017-01-03',12),
	(62,1,'2017-01-04',12),
	(63,1,'2017-01-03',13),
	(64,1,'2017-01-04',13),
	(65,1,'2017-01-04',14),
	(66,1,'2017-01-05',14),
	(67,2,'2017-01-03',5),
	(68,2,'2017-01-02',2),
	(69,2,'2017-01-06',9),
	(70,2,'2017-01-07',1),
	(71,2,'2017-01-12',2),
	(72,2,'2017-01-13',5),
	(73,2,'2017-01-14',10),
	(74,2,'2017-01-20',5),
	(75,2,'2017-01-21',3),
	(76,2,'2017-01-30',2),
	(77,3,'2017-01-09',9),
	(78,3,'2017-01-10',9),
	(79,3,'2017-01-11',3),
	(80,3,'2017-01-10',3),
	(81,3,'2017-01-13',3),
	(82,3,'2017-01-27',9),
	(83,3,'2017-01-29',9),
	(84,3,'2017-01-28',9);

/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;


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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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