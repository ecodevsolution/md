-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for shop
CREATE DATABASE IF NOT EXISTS `shop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `shop`;


-- Dumping structure for table shop.aboutus
CREATE TABLE IF NOT EXISTS `aboutus` (
  `idabout` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  PRIMARY KEY (`idabout`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.aboutus: ~0 rows (approximately)
/*!40000 ALTER TABLE `aboutus` DISABLE KEYS */;
INSERT INTO `aboutus` (`idabout`, `description`) VALUES
	(1, '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut consequat nibh mollis ligula mollis convallis. Morbi dignissim faucibus enim, sed fermentum ex commodo ut. Pellentesque laoreet arcu eu nulla elementum suscipit. Morbi rutrum quam ut tincidunt tincidunt. Nullam a condimentum dolor.&nbsp;</p>');
/*!40000 ALTER TABLE `aboutus` ENABLE KEYS */;


-- Dumping structure for table shop.bank
CREATE TABLE IF NOT EXISTS `bank` (
  `idbank` varchar(50) NOT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `account_no` varchar(50) DEFAULT NULL,
  `account_name` varchar(50) NOT NULL,
  `branch` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idbank`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table shop.bank: ~2 rows (approximately)
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
INSERT INTO `bank` (`idbank`, `bank_name`, `account_no`, `account_name`, `branch`) VALUES
	('BCA', 'BANK CENTRAL ASIA', '627xxxxxx', 'Muhamad Adinugraha', 'Pondok Gede'),
	('MANDIRI', 'BANK MANDIRI', '10042932xxxx', 'PT BAGUS PRRATAMA MANDIRI', 'Kemang Pratama');
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;


-- Dumping structure for table shop.banner_ads
CREATE TABLE IF NOT EXISTS `banner_ads` (
  `idbannerads` int(11) NOT NULL AUTO_INCREMENT,
  `banner` varchar(50) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`idbannerads`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.banner_ads: ~0 rows (approximately)
/*!40000 ALTER TABLE `banner_ads` DISABLE KEYS */;
INSERT INTO `banner_ads` (`idbannerads`, `banner`, `tag`, `flag`) VALUES
	(1, '6d9278947579dc0d40dd666ab3cc8e02.jpg', 'Examples', 1),
	(2, '709ff4fa5996cae86a213bd0067a90ee.png', 'A', 1);
/*!40000 ALTER TABLE `banner_ads` ENABLE KEYS */;


-- Dumping structure for table shop.banner_sale
CREATE TABLE IF NOT EXISTS `banner_sale` (
  `idbanner` int(11) NOT NULL AUTO_INCREMENT,
  `sale_slider` varchar(50) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idbanner`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.banner_sale: ~3 rows (approximately)
/*!40000 ALTER TABLE `banner_sale` DISABLE KEYS */;
INSERT INTO `banner_sale` (`idbanner`, `sale_slider`, `tag`) VALUES
	(1, '739cd8b1a7e255e1b3b68263d9ff0661.png', 'Sales'),
	(2, '9b8a3404aae7ed558aabc706af401ac3.png', 'adsd'),
	(3, 'e0df334aec82af73540e3bd097e5631f.png', 'sale');
/*!40000 ALTER TABLE `banner_sale` ENABLE KEYS */;


-- Dumping structure for table shop.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `idbrand` int(11) NOT NULL AUTO_INCREMENT,
  `brand_logo` varchar(50) NOT NULL DEFAULT '0',
  `brand_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idbrand`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.brand: ~2 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`idbrand`, `brand_logo`, `brand_name`) VALUES
	(2, '0', 'Adidas'),
	(3, 'dc9b127afa5e3fa2e301bfce887a57b1.jpg', 'Nike');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;


-- Dumping structure for table shop.contact
CREATE TABLE IF NOT EXISTS `contact` (
  `idcontact` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `notelp` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `workhour` varchar(50) NOT NULL,
  PRIMARY KEY (`idcontact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table shop.contact: ~0 rows (approximately)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;


-- Dumping structure for table shop.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `idcustomer` int(11) NOT NULL AUTO_INCREMENT,
  `is_guest` int(1) NOT NULL DEFAULT '0',
  `titles` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `bod` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcustomer`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table shop.customer: ~19 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`idcustomer`, `is_guest`, `titles`, `firstname`, `lastname`, `auth_key`, `bod`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(159, 1, '1', 'adi', 'nugraha', 'qIS7tNRyblKgVtvhaNt_BYccoCOC2H_Z', NULL, '$2y$13$r7B8mC68hV8i1vTJqBq5feLyZC1CyBh05bYavetTIlGT.DdoFoqLi', NULL, 'email@email.com', 0, 50616, 0),
	(161, 1, '1', 'adi', 'nugraha', 'Kz0XAa6HwzXRJJRFZm9WAUASXHGdATXP', NULL, '$2y$13$7psgpTW1r5z4tneFe1FcMuJnywFqRjoNihhx7PYO3a74daejsD/de', NULL, 'email1@email.com', 0, 50616, 0),
	(163, 1, '1', 'adi', 'nugraha', 'o4c8Qunl4VKivDhIxfELppwZCf_9kxQw', NULL, '$2y$13$w4cRDJt00qQbheSY1ce2NOzH3nDXxiaY3dtEQ72FKiDZZ5o1nYpqC', NULL, 'email2@email.com', 0, 50616, 0),
	(165, 1, '1', 'adi', 'nugraha', 'yf25VjV3R08IZvVwhRC5q01u5Ph7ezr-', NULL, '$2y$13$FMjSRfSjcoeOOsn9lJvoqe8tVBGnT/pbjyRdJEXn8E5/svihDAVPK', NULL, 'email3@email.com', 0, 50616, 0),
	(166, 1, '1', 'adi', 'nugraha', 'sNn1ZaW90Pq0kHRBg57jFwbAM2MLmTl7', NULL, '$2y$13$Jog0/TvrImp9wUyP./QY5u.qrBhGtvVZFk6OfxriUSwZM/PEymNNe', NULL, 'email4@email.com', 0, 50616, 0),
	(168, 1, '1', 'adi', 'nugraha', 'R6YEaCSmWZMWgxPEmaIDEqTVRB3mkmFc', NULL, '$2y$13$AK9DT01Zaha1fYwcADqS6.b5LSTMlGsUAfrrNgUMT9UqwTSYcbp3m', NULL, 'email5@email.com', 0, 50616, 0),
	(170, 1, '1', 'adi', 'nugraha', 'DidyFHCsoZYJtp-P7F_RNujmLob0XAjT', NULL, '$2y$13$nI880ZPiVIfL/mJrWsXomeB/mLCtsHagrbxjSGAFQBm5.K.amd9eu', NULL, 'email6@email.com', 0, 50616, 0),
	(171, 1, '1', 'adi', 'nugraha', '_6vxlxOVEIAWA9VasmoPQ_YYZ-9aAflB', NULL, '$2y$13$/3h//PbYMWM4DbdQ9AJbF.enKm/bWi2T0oWK2CXtjxPyDZMLESbkS', NULL, 'email7@email.com', 0, 50616, 0),
	(172, 1, '1', 'adi', 'nugraha', '1dfYGbBd5d9Qd0y6MlznYomAfYWi8HVR', NULL, '$2y$13$PyjTxETR0zJjT9AhqRycGe0e6PzH9/41p3rhAIOuDt4YjSHHKgDYW', NULL, 'email8@email.com', 0, 50616, 0),
	(173, 1, '1', 'vandi', 'vicario', 'ZoXMMQB815-Gjaf4gLoOKW3pAT2REbhU', NULL, '$2y$13$/BFsVdC1Ga7Jqmf49M2MpOlIuz7kHNie85gcDAkX7xKsfVZvUYCoa', NULL, 'vandivicario@gmail.com', 0, 70616, 0),
	(175, 1, '1', 'vandi', 'vicario', 'Z4wUNqR9UTals4fBgh680cdlGXj_7riK', NULL, '$2y$13$eIOw7uwCV7ZGx9P7YM7JOuiIxoxXYD7w.74nR2yZeXpQkjN37YExO', NULL, 'vandivicarioo@gmail.com', 0, 70616, 0),
	(177, 1, '1', 'vandi', 'vicario', 'a3mj3JlqCEC5VFLPiLtqmpQsbovENp_t', NULL, '$2y$13$WAh3ufGlV/AoIMiHsxBm3uBWk9eFUV4su2dLrNFUGvKTKd7khgbHq', NULL, 'vandivicariooo@gmail.com', 0, 70616, 0),
	(178, 0, '1', 'adi', 'nugraha', 'dMY4JKpqb6mwZMWHW3CN3CJuKeBgUWj2', NULL, '$2y$13$3poSrYRGR21ldGrIYr3zkeIwgUNuQ0m1h7icQTO/D23OeKn917J0y', NULL, 'muhamadadinugraha@gmail.com', 10, 20160706, 0),
	(179, 0, '1', 'adi', 'nugraha', 'jf9hWKNDzZ-0HO00UHC7d8dYDEz3Wq-n', NULL, '$2y$13$IkP.C9baJNPjfPFN.Uh7J.EEFmsSLinPcjbt7LDeSzZlSLomFCsnq', NULL, 'muhamadadinugrahaa@gmail.com', 0, 20160706, 0),
	(180, 0, '1', 'adi', 'nugraha', 'dSoiT2FyqAD-een5vGVHy3DqfsS1Iu9o', NULL, '$2y$13$94E.Q7/m0cEwhHt3ddnA/.J/jE3MIg/K1.xd8OJGloeDqj84ViTH6', NULL, 'muhamadadinugrahaaa@gmail.com', 0, 20160607, 0),
	(181, 0, '1', 'a', 'v', 'bWbEVgIkpp7Aam_HSxxpNc2dwydD7nbe', NULL, '$2y$13$VgjWgMKCbQAW8VBr3imGK.Ux6GOJM78ysyMPiPfALZZQbNCFtiw5y', NULL, 'a@a.cion', 0, 20160607, 0),
	(182, 0, '1', 'c', 's', 'SIumOk9hjsLa6RnlZ5WXtJ4KjVlmX_Pa', NULL, '$2y$13$6PHzsC.wUoNrxve8Mp/jy.izpiXnRa0tPTYNp66kIhP4W0aTiI13W', NULL, 'asd@asdasd.com', 0, 20160607, 0),
	(183, 0, '1', 'fg', 'asda', 'jtLrjkqtW7VtYpHa-YiHQA7JzsYDw5sp', NULL, '$2y$13$VuOgVsgvCxDHLnptvA2awOmbuqbY2kZ4Eo/OJo/vzfqUqEq0iWnB.', NULL, 'asd@asdasdasd.com', 0, 20160607, 0),
	(184, 0, '1', 'asda', 'asdasd', 'FQW-7UvpHjstoCtDiqH61czCatdrnC2p', NULL, '$2y$13$UUt6m4/aQ4gTJ91WAmTcqO5.fY1BX0NXNI4jeGseUpTMRMG4iYP5W', NULL, 'asd@asdasdasd23.com', 0, 20160607, 0),
	(185, 0, '2', 'qodrina', 'ramadhan', 'jbQ46xbZUm3mUur4BC9l0N15cEeI9beI', NULL, '$2y$13$R/4ngggyi1yRYntJC0mrTOAkWgMtXjmKuNLURc38qJGG0eV0qfGE6', NULL, 'qodrinaramadhan@gmail.com', 10, 20160608, 0),
	(186, 0, '1', 'adi', 'nugraha', 'DHiRMn3HwU6OS1Nw8k0PBYGsNyP1RC6d', NULL, '$2y$13$8Yt0LF8yD7QoWQAkEhZy/enDsPaxRI/OlEvPX.LlYI08ls4hDgniq', NULL, 'muhamad@gmai.com', 10, 20160609, 0);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


-- Dumping structure for table shop.customer_address
CREATE TABLE IF NOT EXISTS `customer_address` (
  `idaddress` int(11) NOT NULL AUTO_INCREMENT,
  `idcustomer` int(11) DEFAULT NULL,
  `address` text,
  `alias` varchar(50) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `idcity` int(11) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `idprovince` int(11) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idaddress`),
  KEY `FK_customer_address_customer` (`idcustomer`),
  CONSTRAINT `FK_customer_address_customer` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.customer_address: ~14 rows (approximately)
/*!40000 ALTER TABLE `customer_address` DISABLE KEYS */;
INSERT INTO `customer_address` (`idaddress`, `idcustomer`, `address`, `alias`, `zip`, `city`, `idcity`, `province`, `idprovince`, `phone`) VALUES
	(2, 159, 'jalan silliwangi', 'My Address', '23234', 'Cilegon', NULL, 'Banten', NULL, '081210854342'),
	(3, 161, 'jalan silliwangi', 'My Address', '23234', 'Cilegon', NULL, 'Banten', NULL, '081210854342'),
	(4, 163, 'jalan silliwangi', 'My Address', '23234', 'Cilegon', NULL, 'Banten', NULL, '081210854342'),
	(5, 165, 'jalan silliwangi', 'My Address', '23234', 'Cilegon', NULL, 'Banten', NULL, '081210854342'),
	(6, 166, 'jalan silliwangi', 'My Address', '23234', 'Cilegon', NULL, 'Banten', NULL, '081210854342'),
	(7, 168, 'jalan silliwangi', 'My Address', '23234', 'Cilegon', NULL, 'Banten', NULL, '081210854342'),
	(8, 170, 'jalan silliwangi', 'My Address', '23234', 'Cilegon', NULL, 'Banten', NULL, '081210854342'),
	(9, 171, 'jalan silliwangi', 'My Address', '23234', 'Cilegon', NULL, 'Banten', NULL, '081210854342'),
	(10, 172, 'jalan silliwangi', 'My Address', '23234', 'Cilegon', NULL, 'Banten', NULL, '081210854342'),
	(11, 173, 'jalan silliwangi', 'My Address', '17414', 'Jakarta Selatan', NULL, 'DKI Jakarta', NULL, '081210854342'),
	(12, 175, 'jalan silliwangi', 'My Address', '17414', 'Jakarta Selatan', NULL, 'DKI Jakarta', NULL, '081210854342'),
	(13, 177, 'jalan silliwangi', 'My Address', NULL, NULL, NULL, NULL, NULL, '081210854342'),
	(16, 185, 'Jalan Silliwangi 3 ', 'My Address', '17414', 'Jakarta Barat', 151, 'DKI Jakarta', 6, '081210854342'),
	(17, 185, 'Jalan Haji Karim no 29 ', 'Billing Address', '17414', 'Bekasi', 54, 'Jawa Barat', 9, '081210854342');
/*!40000 ALTER TABLE `customer_address` ENABLE KEYS */;


-- Dumping structure for table shop.detail_category
CREATE TABLE IF NOT EXISTS `detail_category` (
  `iddetail` int(11) NOT NULL AUTO_INCREMENT,
  `idsubcategory` int(11) DEFAULT NULL,
  `detail_name` varchar(50) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddetail`),
  KEY `FK_detail_category_sub_category` (`idsubcategory`),
  CONSTRAINT `FK_detail_category_sub_category` FOREIGN KEY (`idsubcategory`) REFERENCES `sub_category` (`idsubcategory`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.detail_category: ~9 rows (approximately)
/*!40000 ALTER TABLE `detail_category` DISABLE KEYS */;
INSERT INTO `detail_category` (`iddetail`, `idsubcategory`, `detail_name`, `flag`) VALUES
	(1, 1, 'Lengan panjang', 1),
	(2, 2, 'Running', 1),
	(3, 2, 'Gym', 1),
	(4, 5, 'Panjang', 1),
	(5, 5, 'Pendek', 1),
	(6, 6, 'Classic Hat', 1),
	(7, 6, 'Kupluk', 1),
	(8, 1, 'Lengan pendek', 1),
	(9, 1, 'Lengan ', 1);
/*!40000 ALTER TABLE `detail_category` ENABLE KEYS */;


-- Dumping structure for table shop.dtl_menu_user
CREATE TABLE IF NOT EXISTS `dtl_menu_user` (
  `urutan` int(11) NOT NULL AUTO_INCREMENT,
  `id_dtl_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `menu_detail_name` varchar(50) NOT NULL,
  `mod_by` varchar(50) NOT NULL,
  `mod_date` date NOT NULL,
  PRIMARY KEY (`urutan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.dtl_menu_user: ~7 rows (approximately)
/*!40000 ALTER TABLE `dtl_menu_user` DISABLE KEYS */;
INSERT INTO `dtl_menu_user` (`urutan`, `id_dtl_menu`, `id_menu`, `menu_detail_name`, `mod_by`, `mod_date`) VALUES
	(1, 1, 1, 'SLIDER', 'Admin', '2016-04-16'),
	(2, 2, 1, 'LOGO IMAGE', 'Admin', '2016-04-16'),
	(3, 1, 2, 'MENU', 'Admin', '2016-04-16'),
	(4, 1, 3, 'PAYMENT', 'Admin', '2016-04-16'),
	(5, 1, 5, 'USER', 'Admin', '2016-04-16'),
	(6, 2, 5, 'ROLES', 'Admin', '2016-04-16'),
	(7, 3, 5, 'SET PRIVILLAGE', 'Admin', '2016-04-16');
/*!40000 ALTER TABLE `dtl_menu_user` ENABLE KEYS */;


-- Dumping structure for table shop.image
CREATE TABLE IF NOT EXISTS `image` (
  `idimage` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `image_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `is_cover` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idimage`),
  KEY `fk-image-product_id-product_id` (`product_id`),
  CONSTRAINT `fk-image-product_id-product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`idproduk`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table shop.image: ~9 rows (approximately)
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` (`idimage`, `product_id`, `image_name`, `title`, `is_cover`) VALUES
	(32, 24, '53892be1a230a893ce132a354a5e21a1.jpg', '0', 1),
	(33, 24, '239d585932f6f5c829ce2eafee90da6b.jpg', '0', 0),
	(34, 24, '6bd50b74da11480ec5238fd2c57d3a95.jpg', '0', 0),
	(37, 26, '47b1ee696f14a069681902777d65cf76.jpg', '0', 1),
	(38, 26, 'b6fdf49fdcca14ea0777738c336f1010.jpg', '0', 0),
	(41, NULL, 'c2eb2616f4b58c947fd96ea46613da3a.png', '0', 1),
	(42, NULL, '6ca5586d28455039cf0e70771ed0e4d1.png', '0', 0),
	(46, NULL, '4101adc65b5b8e4743c4ff09ad2ae001.png', 'A', 0),
	(47, NULL, 'ac2ff19cc46c92534dfac5456f4cd92d.png', 'b', 1);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;


-- Dumping structure for table shop.info_box
CREATE TABLE IF NOT EXISTS `info_box` (
  `idbox` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(50) DEFAULT NULL,
  `tag_info` varchar(50) DEFAULT NULL,
  `tag_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idbox`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.info_box: ~3 rows (approximately)
/*!40000 ALTER TABLE `info_box` DISABLE KEYS */;
INSERT INTO `info_box` (`idbox`, `logo`, `tag_info`, `tag_desc`) VALUES
	(1, 'icon fa fa-dollar', 'MONEY BACK', '30 DAY MONEY BACK GUARANTEE.'),
	(2, 'icon fa fa-gift', 'SPECIAL SALE', 'ALL ITEMS-SALE UP TO 20% OFF'),
	(3, 'icon fa fa-truck', 'FREE SHIPPING', 'FREE SHIP-ON ODER OVER Rp 1.000.000,00');
/*!40000 ALTER TABLE `info_box` ENABLE KEYS */;


-- Dumping structure for table shop.kurir
CREATE TABLE IF NOT EXISTS `kurir` (
  `idkurir` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`idkurir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table shop.kurir: ~2 rows (approximately)
/*!40000 ALTER TABLE `kurir` DISABLE KEYS */;
INSERT INTO `kurir` (`idkurir`, `name`, `price`) VALUES
	('jne', 'JNE', 0),
	('tiki', 'TIKI', 0);
/*!40000 ALTER TABLE `kurir` ENABLE KEYS */;


-- Dumping structure for table shop.logo
CREATE TABLE IF NOT EXISTS `logo` (
  `idlogo` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idlogo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.logo: ~0 rows (approximately)
/*!40000 ALTER TABLE `logo` DISABLE KEYS */;
INSERT INTO `logo` (`idlogo`, `title`, `username`, `logo`) VALUES
	(1, 'DEMO', 'adinugraha', '1cd1266d9920e1833e3b58f4ce7d5e1b.png');
/*!40000 ALTER TABLE `logo` ENABLE KEYS */;


-- Dumping structure for table shop.main_category
CREATE TABLE IF NOT EXISTS `main_category` (
  `idmain` int(11) NOT NULL AUTO_INCREMENT,
  `main_category_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmain`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.main_category: ~5 rows (approximately)
/*!40000 ALTER TABLE `main_category` DISABLE KEYS */;
INSERT INTO `main_category` (`idmain`, `main_category_name`, `username`, `flag`) VALUES
	(1, 'Pakaian', 'junot', 1),
	(2, 'Sepatu', 'junot', 1),
	(3, 'Aksesoris', 'junot', 1),
	(4, 'Tas', 'junot', 1),
	(5, 'Oy', NULL, 1);
/*!40000 ALTER TABLE `main_category` ENABLE KEYS */;


-- Dumping structure for table shop.menu_user
CREATE TABLE IF NOT EXISTS `menu_user` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `mod_by` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  `mod_date` date NOT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.menu_user: ~5 rows (approximately)
/*!40000 ALTER TABLE `menu_user` DISABLE KEYS */;
INSERT INTO `menu_user` (`idmenu`, `menu_name`, `mod_by`, `flag`, `mod_date`) VALUES
	(1, 'SETTINGS', 'Admin', 1, '2016-04-16'),
	(2, 'CATEGORIES MENU', 'Admin', 1, '2016-04-16'),
	(3, 'CONFIRMATION', 'Admin', 1, '2016-04-16'),
	(4, 'USER REGISTRATION', 'Admin', 1, '2016-04-16'),
	(5, 'PRIVILLAGE', 'Admin', 1, '2016-04-16');
/*!40000 ALTER TABLE `menu_user` ENABLE KEYS */;


-- Dumping structure for table shop.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table shop.migration: ~3 rows (approximately)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1451849622),
	('m130524_201442_init', 1451849628),
	('m141123_221351_shop', 1451849633);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- Dumping structure for table shop.order
CREATE TABLE IF NOT EXISTS `order` (
  `idorder` int(11) NOT NULL,
  `idcustomer` int(11) NOT NULL,
  `idaddress` int(11) NOT NULL,
  `idinvoice` int(11) NOT NULL,
  `idshipping` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `total_weight` int(11) NOT NULL,
  `bank` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `account_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sub_total` float NOT NULL,
  `shipping` float NOT NULL,
  `tax` float NOT NULL,
  `grandtotal` float NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `noresi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `urutan` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idorder`,`urutan`),
  KEY `urutan` (`urutan`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table shop.order: ~19 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` (`idorder`, `idcustomer`, `idaddress`, `idinvoice`, `idshipping`, `service`, `total_weight`, `bank`, `account_name`, `sub_total`, `shipping`, `tax`, `grandtotal`, `status`, `date`, `noresi`, `urutan`) VALUES
	(1122387585, 110, 42, 42, 'jne', '', 0, 'BCA', 'Muhamad adinugraha', 100000, 13000, 10000, 113000, 1, '2016-04-02 19:08:54', NULL, 1),
	(1128053192, 107, 39, 39, 'jne', '', 0, 'BCA', 'Muhamad adinugraha', 100000, 13000, 10000, 113000, 1, '2016-04-02 19:03:00', NULL, 2),
	(1157147591, 175, 12, 12, 'jne', '', 0, 'BCA', 'muhamad adinugraha', 200000, 9000, 0, 209000, 1, '2016-06-07 16:52:29', NULL, 3),
	(1157220578, 165, 5, 5, 'REG', '', 0, 'BCA', 'Muhamad Adinugraha', 7500000, 0, 0, 7510000, 1, '2016-06-05 10:37:20', NULL, 4),
	(1157503402, 124, 59, 59, 'jne', '', 0, 'BCA', 'Muhamad adinugraha', 100000, 13000, 10000, 113000, 1, '2016-04-09 10:31:46', NULL, 5),
	(1159921092, 108, 40, 40, 'jne', '', 0, 'BCA', 'Muhamad adinugraha', 100000, 13000, 10000, 113000, 1, '2016-04-02 19:06:09', NULL, 6),
	(1170540685, 112, 44, 44, 'jne', '', 0, 'BCA', 'Muhamad adinugraha', 100000, 13000, 10000, 113000, 1, '2016-04-02 19:09:32', NULL, 7),
	(1171790585, 166, 6, 6, 'REG', '', 0, 'BCA', 'Muhamad Adinugraha', 7500000, 10000, 0, 7510000, 1, '2016-06-05 10:38:07', NULL, 8),
	(1203877446, 120, 52, 52, 'jne', '', 0, 'BCA', 'Muhamad adinugraha', 100000, 28000, 10000, 128000, 1, '2016-04-09 08:01:23', NULL, 9),
	(1209561300, 109, 41, 41, 'jne', '', 0, 'BCA', 'Muhamad adinugraha', 100000, 13000, 10000, 113000, 1, '2016-04-02 19:08:44', NULL, 10),
	(1222689817, 121, 53, 53, 'jne', '', 0, 'BCA', 'Muhamad adinugraha', 100000, 14000, 10000, 114000, 1, '2016-04-09 08:03:32', NULL, 11),
	(1228264191, 171, 9, 9, 'jne', '', 0, 'BCA', 'Muhamad Adinugraha', 7500000, 10000, 0, 7510000, 1, '2016-06-05 10:44:35', NULL, 12),
	(1231429997, 170, 8, 8, 'jne', '', 0, 'BCA', 'Muhamad Adinugraha', 7500000, 10000, 0, 7510000, 2, '2016-06-05 10:42:16', NULL, 13),
	(1242140823, 123, 57, 57, 'jne', '', 0, 'BCA', 'Muhamad adinugraha', 100000, 17000, 10000, 117000, 1, '2016-04-09 08:23:17', NULL, 14),
	(1263161047, 113, 45, 45, 'jne', '', 0, 'BCA', 'Muhamad adinugraha', 100000, 14000, 10000, 114000, 1, '2016-04-09 07:25:05', NULL, 15),
	(1285960326, 159, 11, 11, 'jne', '', 0, 'BCA', 'muhamad adinugraha', 200000, 9000, 0, 209000, 6, '2016-06-07 16:48:17', NULL, 16),
	(1313111449, 159, 43, 43, 'jne', '', 0, 'BCA', 'Muhamad adinugraha', 100000, 13000, 10000, 113000, 1, '2016-04-02 19:09:23', NULL, 17),
	(1345782205, 159, 10, 10, 'jne', '', 0, 'BCA', 'Muhamad Adinugraha', 7500000, 10000, 0, 7510000, 2, '2016-06-05 10:45:21', NULL, 18),
	(1389556092, 159, 16, 17, 'jne', '', 0, 'BCA', 'Muhamad Adinugraha', 7500000, 10000, 0, 7510000, 6, '2016-06-05 10:40:11', NULL, 19);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;


-- Dumping structure for table shop.order_item
CREATE TABLE IF NOT EXISTS `order_item` (
  `iddetail` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`iddetail`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table shop.order_item: ~25 rows (approximately)
/*!40000 ALTER TABLE `order_item` DISABLE KEYS */;
INSERT INTO `order_item` (`iddetail`, `order_id`, `product_id`, `qty`, `discount`, `price`) VALUES
	(1, 0, '0', 0, 0, 0),
	(2, 0, '0', 0, 0, 0),
	(3, 0, '0', 0, 0, 0),
	(4, 0, '0', 0, 0, 0),
	(5, 0, '0', 0, 0, 0),
	(6, 0, '0', 0, 0, 0),
	(7, 0, '0', 0, 0, 0),
	(8, 0, '0', 0, 0, 0),
	(9, 0, '0', 0, 0, 0),
	(10, 0, '0', 0, 0, 0),
	(11, 0, '0', 0, 0, 0),
	(12, 0, '0', 0, 0, 0),
	(13, 0, '0', 0, 0, 0),
	(14, 1170540685, '18', 1, 10, 100000),
	(15, 1263161047, '18', 1, 10, 100000),
	(16, 1232041262, '18', 2, 10, 100000),
	(17, 1203877446, '18', 1, 10, 100000),
	(18, 1222689817, '18', 1, 10, 100000),
	(19, 1407510866, '18', 1, 10, 100000),
	(20, 1242140823, '18', 1, 10, 100000),
	(21, 1157503402, '18', 1, 10, 100000),
	(22, 1231429997, '24', 75, 10, 100000),
	(23, 1345782205, '18', 75, 10, 100000),
	(24, 1285960326, '18', 2, 10, 100000),
	(25, 1157147591, '18', 2, 10, 100000);
/*!40000 ALTER TABLE `order_item` ENABLE KEYS */;


-- Dumping structure for table shop.order_status
CREATE TABLE IF NOT EXISTS `order_status` (
  `idstatus` int(11) NOT NULL AUTO_INCREMENT,
  `idorder` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `updateby` varchar(50) NOT NULL,
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.order_status: ~45 rows (approximately)
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` (`idstatus`, `idorder`, `status`, `date`, `updateby`) VALUES
	(5, 1285960326, 2, '2016-07-12', 'adi nugraha'),
	(6, 1285960326, 2, '2016-07-12', 'adi nugraha'),
	(7, 1285960326, 2, '2016-07-12', 'adi nugraha'),
	(8, 1285960326, 4, '2016-07-12', 'adi nugraha'),
	(9, 1285960326, 4, '2016-07-12', 'adi nugraha'),
	(10, 1285960326, 4, '2016-07-12', 'adi nugraha'),
	(11, 1285960326, 4, '2016-07-12', 'adi nugraha'),
	(12, 1285960326, 2, '2016-07-12', 'adi nugraha'),
	(13, 1285960326, 2, '2016-07-12', 'adi nugraha'),
	(14, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(15, 1285960326, 4, '2016-07-12', 'adi nugraha'),
	(16, 1285960326, 5, '2016-07-12', 'adi nugraha'),
	(17, 1285960326, 4, '2016-07-12', 'adi nugraha'),
	(18, 1285960326, 2, '2016-07-12', 'adi nugraha'),
	(19, 1285960326, 3, '2016-07-12', 'adi nugraha'),
	(20, 1285960326, 5, '2016-07-12', 'adi nugraha'),
	(21, 1285960326, 5, '2016-07-12', 'adi nugraha'),
	(22, 1285960326, 2, '2016-07-12', 'adi nugraha'),
	(23, 1285960326, 3, '2016-07-12', 'adi nugraha'),
	(24, 1285960326, 3, '2016-07-12', 'adi nugraha'),
	(25, 1285960326, 3, '2016-07-12', 'adi nugraha'),
	(26, 1285960326, 2, '2016-07-12', 'adi nugraha'),
	(27, 1285960326, 2, '2016-07-12', 'adi nugraha'),
	(28, 1285960326, 3, '2016-07-12', 'adi nugraha'),
	(29, 1285960326, 3, '2016-07-12', 'adi nugraha'),
	(30, 1285960326, 4, '2016-07-12', 'adi nugraha'),
	(31, 1285960326, 4, '2016-07-12', 'adi nugraha'),
	(32, 1285960326, 4, '2016-07-12', 'adi nugraha'),
	(33, 1285960326, 4, '2016-07-12', 'adi nugraha'),
	(34, 1285960326, 5, '2016-07-12', 'adi nugraha'),
	(35, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(36, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(37, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(38, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(39, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(40, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(41, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(42, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(43, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(44, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(45, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(46, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(47, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(48, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(49, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(50, 1285960326, 6, '2016-07-12', 'adi nugraha'),
	(51, 1231429997, 2, '2016-07-13', 'adi nugraha'),
	(52, 1231429997, 2, '2016-07-13', 'adi nugraha');
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;


-- Dumping structure for table shop.privillage_user
CREATE TABLE IF NOT EXISTS `privillage_user` (
  `idprivillage` int(11) NOT NULL AUTO_INCREMENT,
  `idrole` int(11) DEFAULT NULL,
  `idmenu` int(11) DEFAULT NULL,
  `iddtlmenu` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`idprivillage`)
) ENGINE=InnoDB AUTO_INCREMENT=1017 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.privillage_user: ~12 rows (approximately)
/*!40000 ALTER TABLE `privillage_user` DISABLE KEYS */;
INSERT INTO `privillage_user` (`idprivillage`, `idrole`, `idmenu`, `iddtlmenu`, `name`, `status`, `flag`) VALUES
	(1005, 1, 1, 0, 'SETTINGS', 'HEAD', 1),
	(1006, 1, 2, 0, 'CATEGORIES MENU', 'HEAD', 0),
	(1007, 1, 3, 0, 'CONFIRMATION', 'HEAD', 0),
	(1008, 1, 4, 0, 'USER REGISTRATION', 'HEAD', 1),
	(1009, 1, 5, 0, 'PRIVILLAGE', 'HEAD', 1),
	(1010, 1, 1, 1, 'SLIDER', 'DETAIL', 1),
	(1011, 1, 1, 2, 'LOGO IMAGE', 'DETAIL', 1),
	(1012, 1, 2, 1, 'MENU', 'DETAIL', 0),
	(1013, 1, 3, 1, 'PAYMENT', 'DETAIL', 0),
	(1014, 1, 5, 1, 'USER', 'DETAIL', 1),
	(1015, 1, 5, 2, 'ROLES', 'DETAIL', 1),
	(1016, 1, 5, 3, 'SET PRIVILLAGE', 'DETAIL', 1);
/*!40000 ALTER TABLE `privillage_user` ENABLE KEYS */;


-- Dumping structure for table shop.product
CREATE TABLE IF NOT EXISTS `product` (
  `idproduk` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL DEFAULT '0',
  `idmain` int(11) DEFAULT NULL,
  `idsub` int(11) DEFAULT NULL,
  `iddetail` int(11) DEFAULT NULL,
  `idbrand` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `condition` int(11) DEFAULT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `minqty` int(11) DEFAULT NULL,
  `maxqty` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `tax` float DEFAULT NULL,
  `service` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `price` decimal(19,4) DEFAULT NULL,
  `final_price` decimal(19,4) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproduk`),
  KEY `FK_product_main_category` (`idmain`),
  KEY `FK_product_sub_category` (`idsub`),
  KEY `FK_product_detail_category` (`iddetail`),
  KEY `FK_product_brand` (`idbrand`),
  CONSTRAINT `FK_product_brand` FOREIGN KEY (`idbrand`) REFERENCES `brand` (`idbrand`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_product_detail_category` FOREIGN KEY (`iddetail`) REFERENCES `detail_category` (`iddetail`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_product_main_category` FOREIGN KEY (`idmain`) REFERENCES `main_category` (`idmain`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_product_sub_category` FOREIGN KEY (`idsub`) REFERENCES `sub_category` (`idsubcategory`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table shop.product: ~2 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`idproduk`, `iduser`, `idmain`, `idsub`, `iddetail`, `idbrand`, `title`, `sale`, `condition`, `tag`, `sku`, `stock`, `minqty`, `maxqty`, `weight`, `short_description`, `description`, `tax`, `service`, `discount`, `price`, `final_price`, `status`) VALUES
	(24, 0, 1, 1, 8, 2, 'Fashion Jacket', 0, 1, 'Fashion, Jacket', '00007870909004', 100, 1, 10, 1000, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<ul>\r\n<li>Any Product types that You want - Simple, Configurable, Bundled and Grouped Products</li>\r\n<li>Downloadable/Digital Products, Virtual Products</li>\r\n<li>Inventory Management with Backordered items</li>\r\n<li>Customer Personalized Products - upload text for embroidery, monogramming, etc.</li>\r\n<li>Create Store-specific attributes on the fly</li>\r\n<li>Advanced Pricing Rules and support for Special Prices</li>\r\n<li>Tax Rates per location, customer group and product type</li>\r\n<li>Detailed Configuration Options in Theme Admin Penl</li>\r\n</ul>', 0, 2750, 0, 275000.0000, 277750.0000, 1),
	(26, 0, 1, 1, 1, 3, 'Pink Fashion Dress', 0, 1, 'Pink , Fashion', '102929001011', 10, 1, 10, 1000, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<ul>\r\n<li>Any Product types that You want - Simple, Configurable, Bundled and Grouped Products</li>\r\n<li>Downloadable/Digital Products, Virtual Products</li>\r\n<li>Inventory Management with Backordered items</li>\r\n<li>Customer Personalized Products - upload text for embroidery, monogramming, etc.</li>\r\n<li>Create Store-specific attributes on the fly</li>\r\n<li>Advanced Pricing Rules and support for Special Prices</li>\r\n<li>Tax Rates per location, customer group and product type</li>\r\n<li>Detailed Configuration Options in Theme Admin Penl</li>\r\n</ul>', 0, 1020, 0, 102000.0000, 103020.0000, 1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


-- Dumping structure for table shop.product_review
CREATE TABLE IF NOT EXISTS `product_review` (
  `idreview` int(11) NOT NULL AUTO_INCREMENT,
  `idcustomer` int(11) NOT NULL DEFAULT '0',
  `idproduct` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`idreview`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table shop.product_review: ~0 rows (approximately)
/*!40000 ALTER TABLE `product_review` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_review` ENABLE KEYS */;


-- Dumping structure for table shop.role
CREATE TABLE IF NOT EXISTS `role` (
  `idrole` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.role: ~0 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`idrole`, `rolename`) VALUES
	(1, 'Administration'),
	(2, 'Owner');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;


-- Dumping structure for table shop.seo
CREATE TABLE IF NOT EXISTS `seo` (
  `idseo` int(11) NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(50) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(500) NOT NULL,
  `meta_author` varchar(50) NOT NULL,
  PRIMARY KEY (`idseo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.seo: ~0 rows (approximately)
/*!40000 ALTER TABLE `seo` DISABLE KEYS */;
INSERT INTO `seo` (`idseo`, `meta_title`, `meta_keyword`, `meta_description`, `meta_author`) VALUES
	(1, 'sa', 'sa', 'asd', 'sa');
/*!40000 ALTER TABLE `seo` ENABLE KEYS */;


-- Dumping structure for table shop.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `idslider` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  `slider_img` varchar(50) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `tag_highligt` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idslider`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.slider: ~3 rows (approximately)
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` (`idslider`, `category`, `slider_img`, `tag`, `tag_highligt`) VALUES
	(3, '1', '0370fc3d96f9e3dda4797974c6edfe63.jpg', 'THE NEW', 'IMAC'),
	(4, '2', '48ddf8d871bfd78089e6da4e33ea7b36.png', 'Coba', '1'),
	(5, '1', 'eb23201bac3476a7ac6f6027b3d1df3d.png', 'a', 'b'),
	(6, '3', '8cf09d409d0c0037b0861cc00408f280.png', 'c', 'd');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;


-- Dumping structure for table shop.sub_category
CREATE TABLE IF NOT EXISTS `sub_category` (
  `idsubcategory` int(11) NOT NULL AUTO_INCREMENT,
  `idmaincategory` int(11) DEFAULT NULL,
  `sub_category_name` varchar(50) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsubcategory`),
  KEY `FK_sub_category_main_category` (`idmaincategory`),
  CONSTRAINT `FK_sub_category_main_category` FOREIGN KEY (`idmaincategory`) REFERENCES `main_category` (`idmain`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table shop.sub_category: ~9 rows (approximately)
/*!40000 ALTER TABLE `sub_category` DISABLE KEYS */;
INSERT INTO `sub_category` (`idsubcategory`, `idmaincategory`, `sub_category_name`, `flag`) VALUES
	(1, 1, 'Atasan', 1),
	(2, 2, 'Sepatu Olahraga', 1),
	(3, 2, 'Sandal atau Flip', 1),
	(4, 2, 'Boots', 1),
	(5, 2, 'Kaos Kaki', 1),
	(6, 3, 'Topi', 1),
	(7, 3, 'Dompet', 1),
	(8, 3, 'Kacamata', 1),
	(9, 1, 'Bawahan', 1);
/*!40000 ALTER TABLE `sub_category` ENABLE KEYS */;


-- Dumping structure for table shop.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idrole` int(11) NOT NULL,
  `idcity` int(11) DEFAULT NULL,
  `idprovince` int(11) DEFAULT NULL,
  `courier` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_toko` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'My Store',
  `paket` tinyint(4) DEFAULT NULL,
  `domain` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `balanced` float DEFAULT '0',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT '123 Street Name, City, Indonesia',
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT '(123) 456-7890',
  `work_hour` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Mon - Sun / 9:00AM - 8:00PM',
  `description` text COLLATE utf8_unicode_ci,
  `logo` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'logo.jpg',
  `status` smallint(6) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table shop.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `idrole`, `idcity`, `idprovince`, `courier`, `province`, `city`, `firstname`, `lastname`, `email`, `nama_toko`, `paket`, `domain`, `auth_key`, `password_hash`, `password_reset_token`, `balanced`, `address`, `phone`, `work_hour`, `description`, `logo`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 0, 0, '', '', '21', 'adi', 'nugraha', 'adinugraha@gmail.com', '', 0, '', 'xHP3gCf8cgB-4a4SpgAS7KmgEip5LcAx', '$2y$13$HnyEJQ6vaR0odcHUy90LA.WeWod3hor1D2ilxKUvBE6nlzjkgeIv.', NULL, 0, '123 Street Name, City, Indonesia', '(123) 456-7890', 'Mon - Sun / 9:00AM - 8:00PM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '', 10, 1451849723, 1451849723),
	(2, 1, NULL, NULL, NULL, NULL, NULL, 's', 'sad', 'asdas@asdasd.com', 'My Store', NULL, NULL, 'SrbzEPqOCzynWSFV3roR5xxPV_UT9k54', '$2y$13$SlGpuw2raSOz3y8eeQAg.ufh5oSOEypTl3BWkP6zbJJUrIL2vNW1.', NULL, 0, '123 Street Name, City, Indonesia', '(123) 456-7890', 'Mon - Sun / 9:00AM - 8:00PM', NULL, 'logo.jpg', 10, 20160711, 0),
	(3, 1, NULL, NULL, NULL, NULL, NULL, 's', 'sad', 'adasd@sdasd.com', 'My Store', NULL, NULL, 'Faw2Sob4iA_yP38u_shl11rtsvQDVt59', '$2y$13$yOxJGo2WJRmhO1/dBphYG.RBwU1YtGtZAihFu2uhOHPbrIgBUOWru', NULL, 0, '123 Street Name, City, Indonesia', '(123) 456-7890', 'Mon - Sun / 9:00AM - 8:00PM', NULL, 'logo.jpg', 10, 20160711, 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
