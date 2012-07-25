# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.9)
# Database: j2exchange
# Generation Time: 2012-07-25 05:16:09 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `createdAt` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `description`, `createdAt`, `active`, `updatedAt`)
VALUES
	(1,'sunglasses','consumer sunglasses','2012-07-25 05:13:35',1,NULL),
	(2,'jeans','consumer jeans','2012-07-25 05:13:35',1,NULL),
	(3,'spa treatments','any spa treatments','2012-07-25 05:13:35',1,NULL),
	(4,'hotel room','hotel rooms','2012-07-25 05:13:35',1,NULL),
	(5,'vacation','vacation related items','2012-07-25 05:13:35',1,NULL),
	(6,'clothing','any clothing','2012-07-25 05:13:35',1,NULL),
	(7,'accessories','any accessories','2012-07-25 05:13:35',1,NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`id`, `createdAt`, `active`, `name`)
VALUES
	(1,'2012-07-25 05:13:35',1,'Oakley'),
	(2,'2012-07-25 05:13:35',1,'Diesel'),
	(3,'2012-07-25 05:13:35',1,'Hyatt'),
	(4,'2012-07-25 05:13:35',1,'Rejuvenate Spa');

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table company_exchange
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company_exchange`;

CREATE TABLE `company_exchange` (
  `company_id` int(11) NOT NULL,
  `exchange_id` int(11) NOT NULL,
  PRIMARY KEY (`company_id`,`exchange_id`),
  KEY `IDX_CBACA514979B1AD6` (`company_id`),
  KEY `IDX_CBACA51468AFD1A0` (`exchange_id`),
  CONSTRAINT `FK_CBACA51468AFD1A0` FOREIGN KEY (`exchange_id`) REFERENCES `exchanges` (`id`),
  CONSTRAINT `FK_CBACA514979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `company_exchange` WRITE;
/*!40000 ALTER TABLE `company_exchange` DISABLE KEYS */;

INSERT INTO `company_exchange` (`company_id`, `exchange_id`)
VALUES
	(1,1),
	(1,2),
	(1,3),
	(2,1),
	(2,2),
	(2,3),
	(3,1),
	(3,2),
	(3,3),
	(4,1),
	(4,2),
	(4,3);

/*!40000 ALTER TABLE `company_exchange` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table deal_company
# ------------------------------------------------------------

DROP TABLE IF EXISTS `deal_company`;

CREATE TABLE `deal_company` (
  `deal_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`deal_id`,`company_id`),
  KEY `IDX_ABA581C7F60E2305` (`deal_id`),
  KEY `IDX_ABA581C7979B1AD6` (`company_id`),
  CONSTRAINT `FK_ABA581C7979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  CONSTRAINT `FK_ABA581C7F60E2305` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table deal_offer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `deal_offer`;

CREATE TABLE `deal_offer` (
  `deal_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  PRIMARY KEY (`deal_id`,`offer_id`),
  KEY `IDX_6F094422F60E2305` (`deal_id`),
  KEY `IDX_6F09442253C674EE` (`offer_id`),
  CONSTRAINT `FK_6F09442253C674EE` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`),
  CONSTRAINT `FK_6F094422F60E2305` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table deals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `deals`;

CREATE TABLE `deals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `revenueTotal` double NOT NULL,
  `orderTotal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table exchanges
# ------------------------------------------------------------

DROP TABLE IF EXISTS `exchanges`;

CREATE TABLE `exchanges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `createdAt` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `exchanges` WRITE;
/*!40000 ALTER TABLE `exchanges` DISABLE KEYS */;

INSERT INTO `exchanges` (`id`, `name`, `createdAt`, `active`)
VALUES
	(1,'Exchange 1','2012-07-25 05:13:35',1),
	(2,'Exchange 2','2012-07-25 05:13:35',1),
	(3,'Exchange 3','2012-07-25 05:13:35',1);

/*!40000 ALTER TABLE `exchanges` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table match_offer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `match_offer`;

CREATE TABLE `match_offer` (
  `match_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  PRIMARY KEY (`match_id`,`offer_id`),
  KEY `IDX_97BCF89F2ABEACD6` (`match_id`),
  KEY `IDX_97BCF89F53C674EE` (`offer_id`),
  CONSTRAINT `FK_97BCF89F53C674EE` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`),
  CONSTRAINT `FK_97BCF89F2ABEACD6` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table matches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `matches`;

CREATE TABLE `matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table offer_match_pricing_strategies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `offer_match_pricing_strategies`;

CREATE TABLE `offer_match_pricing_strategies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) DEFAULT NULL,
  `match_id` int(11) DEFAULT NULL,
  `revenue` decimal(10,2) NOT NULL,
  `payout` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AC2879DD53C674EE` (`offer_id`),
  KEY `IDX_AC2879DD2ABEACD6` (`match_id`),
  CONSTRAINT `FK_AC2879DD2ABEACD6` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_AC2879DD53C674EE` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table offers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `offers`;

CREATE TABLE `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `exchange_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `listPrice` decimal(10,2) NOT NULL,
  `whisperPrice` decimal(10,2) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `available` int(11) NOT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DA460427979B1AD6` (`company_id`),
  KEY `IDX_DA460427D3564642` (`createdBy`),
  KEY `IDX_DA460427E8DE7170` (`updatedBy`),
  KEY `IDX_DA4604274584665A` (`product_id`),
  KEY `IDX_DA46042768AFD1A0` (`exchange_id`),
  CONSTRAINT `FK_DA46042768AFD1A0` FOREIGN KEY (`exchange_id`) REFERENCES `exchanges` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_DA4604274584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_DA460427979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_DA460427D3564642` FOREIGN KEY (`createdBy`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_DA460427E8DE7170` FOREIGN KEY (`updatedBy`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;

INSERT INTO `offers` (`id`, `company_id`, `product_id`, `exchange_id`, `name`, `description`, `listPrice`, `whisperPrice`, `createdAt`, `updatedAt`, `active`, `available`, `createdBy`, `updatedBy`)
VALUES
	(1,1,1,1,'Signature Polarized Jupiter Squared Discount','Discount on Jupiter Squared sunglasses',200.00,100.00,'2012-07-25 05:13:35',NULL,1,50,NULL,NULL),
	(2,1,4,1,'Viker jeans end of season clearance','Clearance of Viker jeans',260.00,150.00,'2012-07-25 05:13:35',NULL,1,100,NULL,NULL),
	(3,2,2,1,'Polarized Radar Path Discount','Discount on Polarized Radar Path sunglasses',328.00,200.00,'2012-07-25 05:13:35',NULL,1,150,NULL,NULL),
	(4,2,3,1,'Shioner Sellout','Discount on Shioner jeans',278.00,150.00,'2012-07-25 05:13:35',NULL,1,100,NULL,NULL),
	(5,3,5,1,'Maui Oceanfront Sale','Discount on oceanfrom Maui rooms',400.00,250.00,'2012-07-25 05:13:35',NULL,1,20,NULL,NULL),
	(6,3,6,1,'Vail room discount','Discount on rooms in Vail, CO',350.00,200.00,'2012-07-25 05:13:35',NULL,1,10,NULL,NULL),
	(7,4,7,1,'4 hours of massage','Sale on 4 hr massage',250.00,150.00,'2012-07-25 05:13:35',NULL,1,10,NULL,NULL),
	(8,4,8,1,'Indulge Package discount','Discount on indulge package',400.00,150.00,'2012-07-25 05:13:35',NULL,1,10,NULL,NULL);

/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_category`;

CREATE TABLE `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `IDX_CDFC73564584665A` (`product_id`),
  KEY `IDX_CDFC735612469DE2` (`category_id`),
  CONSTRAINT `FK_CDFC735612469DE2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_CDFC73564584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;

INSERT INTO `product_category` (`product_id`, `category_id`)
VALUES
	(1,1),
	(1,7),
	(2,1),
	(2,7),
	(3,2),
	(3,6),
	(4,2),
	(4,6),
	(5,4),
	(5,5),
	(6,4),
	(6,5),
	(7,3),
	(8,3);

/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_offer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_offer`;

CREATE TABLE `product_offer` (
  `product_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`offer_id`),
  KEY `IDX_888AFC624584665A` (`product_id`),
  KEY `IDX_888AFC6253C674EE` (`offer_id`),
  CONSTRAINT `FK_888AFC6253C674EE` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_888AFC624584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exchange_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `code` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B3BA5A5AD3564642` (`createdBy`),
  KEY `IDX_B3BA5A5AE8DE7170` (`updatedBy`),
  KEY `IDX_B3BA5A5A68AFD1A0` (`exchange_id`),
  KEY `IDX_B3BA5A5A979B1AD6` (`company_id`),
  CONSTRAINT `FK_B3BA5A5A979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_B3BA5A5A68AFD1A0` FOREIGN KEY (`exchange_id`) REFERENCES `exchanges` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_B3BA5A5AD3564642` FOREIGN KEY (`createdBy`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_B3BA5A5AE8DE7170` FOREIGN KEY (`updatedBy`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `exchange_id`, `company_id`, `name`, `description`, `price`, `code`, `createdAt`, `active`, `updatedAt`, `createdBy`, `updatedBy`)
VALUES
	(1,1,1,'Signature Polarized Jupiter Squared','Polished Black/Black Iridium Polarized',200.00,'OO9135-10','2012-07-25 05:13:35',1,NULL,NULL,NULL),
	(2,1,1,'Polarized Radar Path','Jet Black/Black Iridium Polarized',260.00,'09-674J','2012-07-25 05:13:35',1,NULL,NULL,NULL),
	(3,1,2,'Shioner','Denim cotton, Worn effect, Dark wash, Low waisted, Button, zip fly closure, Five pockets, Logo details, Small studs, Stitched trimmed',328.00,'0801A','2012-07-25 05:13:35',1,NULL,NULL,NULL),
	(4,1,2,'Viker','Aged effect, Denim cotton, Dark wash, Mid Rise, Button closing, Five pockets, Straight leg cut, Cuffed hems, Logo details, Small studs',278.00,'0801M','2012-07-25 05:13:35',1,NULL,NULL,NULL),
	(5,1,3,'Oceanfront Maui','1 night ocean front room at Hyatt Regency Maui',400.00,'HI-34123','2012-07-25 05:13:35',1,NULL,NULL,NULL),
	(6,1,3,'Vail','1 night ocean front room at Park Hyatt Beaver Creek',350.00,'CO-34123','2012-07-25 05:13:35',1,NULL,NULL,NULL),
	(7,1,4,'4 hours massage','4 hours of massage',250.00,'4hrmsg','2012-07-25 05:13:35',1,NULL,NULL,NULL),
	(8,1,4,'Indulge yourself package','$400 in spa treatements.  2 hr massage, facial, mani/pedi, hair styling, makeover',400.00,'indulge','2012-07-25 05:13:35',1,NULL,NULL,NULL);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` datetime NOT NULL,
  `amount` double NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user_exchange
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_exchange`;

CREATE TABLE `user_exchange` (
  `user_id` int(11) NOT NULL,
  `exchange_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`exchange_id`),
  KEY `IDX_33B65479A76ED395` (`user_id`),
  KEY `IDX_33B6547968AFD1A0` (`exchange_id`),
  CONSTRAINT `FK_33B6547968AFD1A0` FOREIGN KEY (`exchange_id`) REFERENCES `exchanges` (`id`),
  CONSTRAINT `FK_33B65479A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_exchange` WRITE;
/*!40000 ALTER TABLE `user_exchange` DISABLE KEYS */;

INSERT INTO `user_exchange` (`user_id`, `exchange_id`)
VALUES
	(1,1),
	(1,2),
	(1,3),
	(2,1),
	(2,2),
	(2,3),
	(3,1),
	(3,2),
	(3,3),
	(4,1),
	(4,2),
	(4,3);

/*!40000 ALTER TABLE `user_exchange` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `current_exchange_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `username_canonical` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_canonical` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_1483A5E9A0D96FBF` (`email_canonical`),
  KEY `IDX_1483A5E9979B1AD6` (`company_id`),
  KEY `IDX_1483A5E9D67B7A79` (`current_exchange_id`),
  CONSTRAINT `FK_1483A5E9D67B7A79` FOREIGN KEY (`current_exchange_id`) REFERENCES `exchanges` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_1483A5E9979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `company_id`, `current_exchange_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `firstName`, `lastName`, `createdAt`, `active`)
VALUES
	(1,1,1,'oakley@j2exchange.com','oakley@j2exchange.com','oakley@j2exchange.com','oakley@j2exchange.com',0,'t6oczzuzq1w04808kwwowc4k88kkc0w','ZkkySvkGrXIgjLKeQMu9/ObT2OtO91IbvRWxGgvkyQjKGoZ7LKh7ZbeAKmqW0hjMpDUZxfVsvWNl0QHhFYlEvg==',NULL,0,0,NULL,'3sd8q8tjmxogkgw84g4g4ocows0wo4gccwco0480ko8scgwscc',NULL,'a:0:{}',0,NULL,NULL,NULL,'2012-07-25 05:13:35',1),
	(2,2,1,'diesel@j2exchange.com','diesel@j2exchange.com','diesel@j2exchange.com','diesel@j2exchange.com',0,'t6oczzuzq1w04808kwwowc4k88kkc0w','ZkkySvkGrXIgjLKeQMu9/ObT2OtO91IbvRWxGgvkyQjKGoZ7LKh7ZbeAKmqW0hjMpDUZxfVsvWNl0QHhFYlEvg==',NULL,0,0,NULL,'218pax9ksvogcg48swgcscwkkggkkgks48o4wcsw8w0swoo444',NULL,'a:0:{}',0,NULL,NULL,NULL,'2012-07-25 05:13:35',1),
	(3,3,1,'hyatt@j2exchange.com','hyatt@j2exchange.com','hyatt@j2exchange.com','hyatt@j2exchange.com',0,'t6oczzuzq1w04808kwwowc4k88kkc0w','ZkkySvkGrXIgjLKeQMu9/ObT2OtO91IbvRWxGgvkyQjKGoZ7LKh7ZbeAKmqW0hjMpDUZxfVsvWNl0QHhFYlEvg==',NULL,0,0,NULL,'4ap3zvwk4c004sk084c4gogwk40c84ow4kow04w0g0o0k8socc',NULL,'a:0:{}',0,NULL,NULL,NULL,'2012-07-25 05:13:35',1),
	(4,4,1,'spa@j2exchange.com','spa@j2exchange.com','spa@j2exchange.com','spa@j2exchange.com',0,'t6oczzuzq1w04808kwwowc4k88kkc0w','ZkkySvkGrXIgjLKeQMu9/ObT2OtO91IbvRWxGgvkyQjKGoZ7LKh7ZbeAKmqW0hjMpDUZxfVsvWNl0QHhFYlEvg==',NULL,0,0,NULL,'kf315jf05fk0os8oko0wossk8o8wgsckksc8sc8sogk084wck',NULL,'a:0:{}',0,NULL,NULL,NULL,'2012-07-25 05:13:35',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
