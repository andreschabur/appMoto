-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2014 at 02:27 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mimoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_recorder`
--

CREATE TABLE IF NOT EXISTS `action_recorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `identifier` varchar(255) NOT NULL,
  `success` char(1) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_action_recorder_module` (`module`),
  KEY `idx_action_recorder_user_id` (`user_id`),
  KEY `idx_action_recorder_identifier` (`identifier`),
  KEY `idx_action_recorder_date_added` (`date_added`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `action_recorder`
--

INSERT INTO `action_recorder` (`id`, `module`, `user_id`, `user_name`, `identifier`, `success`, `date_added`) VALUES
(1, 'ar_admin_login', 1, 'kpizk', '127.0.0.1', '1', '2014-04-16 16:35:55'),
(2, 'ar_admin_login', 0, 'tiendavirtual', '127.0.0.1', '0', '2014-05-02 10:43:36'),
(3, 'ar_admin_login', 0, 'tiendavirtual', '127.0.0.1', '0', '2014-05-02 10:43:42'),
(4, 'ar_admin_login', 0, 'admin@localhost', '127.0.0.1', '0', '2014-05-02 10:43:55'),
(5, 'ar_admin_login', 0, 'admin', '127.0.0.1', '0', '2014-05-02 10:44:05'),
(6, 'ar_admin_login', 0, 'kpizk', '127.0.0.1', '0', '2014-05-02 10:45:04'),
(7, 'ar_admin_login', 0, 'kpizk', '127.0.0.1', '0', '2014-05-02 10:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `address_book`
--

CREATE TABLE IF NOT EXISTS `address_book` (
  `address_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL,
  `entry_gender` char(1) DEFAULT NULL,
  `entry_company` varchar(255) DEFAULT NULL,
  `entry_firstname` varchar(255) NOT NULL,
  `entry_lastname` varchar(255) NOT NULL,
  `entry_street_address` varchar(255) NOT NULL,
  `entry_suburb` varchar(255) DEFAULT NULL,
  `entry_postcode` varchar(255) NOT NULL,
  `entry_city` varchar(255) NOT NULL,
  `entry_state` varchar(255) DEFAULT NULL,
  `entry_country_id` int(11) NOT NULL DEFAULT '0',
  `entry_zone_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`address_book_id`),
  KEY `idx_address_book_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `address_format`
--

CREATE TABLE IF NOT EXISTS `address_format` (
  `address_format_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_format` varchar(128) NOT NULL,
  `address_summary` varchar(48) NOT NULL,
  PRIMARY KEY (`address_format_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `address_format`
--

INSERT INTO `address_format` (`address_format_id`, `address_format`, `address_summary`) VALUES
(1, '$firstname $lastname$cr$streets$cr$city, $postcode$cr$statecomma$country', '$city / $country'),
(2, '$firstname $lastname$cr$streets$cr$city, $state    $postcode$cr$country', '$city, $state / $country'),
(3, '$firstname $lastname$cr$streets$cr$city$cr$postcode - $statecomma$country', '$state / $country'),
(4, '$firstname $lastname$cr$streets$cr$city ($postcode)$cr$country', '$postcode / $country'),
(5, '$firstname $lastname$cr$streets$cr$postcode $city$cr$country', '$city / $country');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_groups_id` int(11) DEFAULT NULL,
  `admin_firstname` varchar(32) NOT NULL DEFAULT '',
  `admin_lastname` varchar(32) DEFAULT NULL,
  `admin_email_address` varchar(96) NOT NULL DEFAULT '',
  `admin_password` varchar(40) NOT NULL DEFAULT '',
  `admin_created` datetime DEFAULT NULL,
  `admin_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin_logdate` datetime DEFAULT NULL,
  `admin_lognum` int(11) NOT NULL DEFAULT '0',
  `admin_cat_access` text NOT NULL,
  `admin_right_access` text NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_email_address` (`admin_email_address`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_groups_id`, `admin_firstname`, `admin_lastname`, `admin_email_address`, `admin_password`, `admin_created`, `admin_modified`, `admin_logdate`, `admin_lognum`, `admin_cat_access`, `admin_right_access`) VALUES
(1, 1, 'Andres', 'Chabur', 'kpizk@localhost', '$P$Dki.KVxvfLEwtH8rV5jGJkfZJJirKH0', '2014-04-16 14:27:53', '2014-04-16 15:44:59', '2014-04-16 15:41:28', 17, 'ALL', '');

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `user_password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `user_name`, `user_password`) VALUES
(1, 'kpizk', '$P$D5cv3B3mj1MZdn.m3bmOv3DM9B1uWy.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_files`
--

CREATE TABLE IF NOT EXISTS `admin_files` (
  `admin_files_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_files_name` varchar(64) NOT NULL DEFAULT '',
  `admin_files_is_boxes` tinyint(5) NOT NULL DEFAULT '0',
  `admin_files_to_boxes` int(11) NOT NULL DEFAULT '0',
  `admin_groups_id` set('1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_files_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `admin_files`
--

INSERT INTO `admin_files` (`admin_files_id`, `admin_files_name`, `admin_files_is_boxes`, `admin_files_to_boxes`, `admin_groups_id`) VALUES
(1, 'administrator.php', 1, 0, '1'),
(2, 'configuration.php', 1, 0, '1'),
(3, 'catalog.php', 1, 0, '1'),
(4, 'modules.php', 1, 0, '1'),
(5, 'customers.php', 1, 0, '1'),
(6, 'taxes.php', 1, 0, '1'),
(7, 'localization.php', 1, 0, '1'),
(8, 'reports.php', 1, 0, '1'),
(9, 'tools.php', 1, 0, '1'),
(10, 'admin_members.php', 0, 1, '1'),
(11, 'admin_files.php', 0, 1, '1'),
(12, 'configuration.php', 0, 2, '1'),
(13, 'categories.php', 0, 3, '1'),
(14, 'products_attributes.php', 0, 3, '1'),
(15, 'manufacturers.php', 0, 3, '1'),
(16, 'reviews.php', 0, 3, '1'),
(17, 'specials.php', 0, 3, '1'),
(18, 'products_expected.php', 0, 3, '1'),
(19, 'modules.php', 0, 4, '1'),
(20, 'customers.php', 0, 5, '1'),
(21, 'orders.php', 0, 5, '1'),
(22, 'countries.php', 0, 6, '1'),
(23, 'zones.php', 0, 6, '1'),
(24, 'geo_zones.php', 0, 6, '1'),
(25, 'tax_classes.php', 0, 6, '1'),
(26, 'tax_rates.php', 0, 6, '1'),
(27, 'currencies.php', 0, 7, '1'),
(28, 'languages.php', 0, 7, '1'),
(29, 'orders_status.php', 0, 7, '1'),
(30, 'stats_products_viewed.php', 0, 8, '1'),
(31, 'stats_products_purchased.php', 0, 8, '1'),
(32, 'stats_customers.php', 0, 8, '1'),
(33, 'backup.php', 0, 9, '1'),
(34, 'banner_manager.php', 0, 9, '1'),
(35, 'cache.php', 0, 9, '1'),
(36, 'define_language.php', 0, 9, '1'),
(37, 'file_manager.php', 0, 9, '1'),
(38, 'mail.php', 0, 9, '1'),
(39, 'newsletters.php', 0, 9, '1'),
(40, 'server_info.php', 0, 9, '1'),
(41, 'whos_online.php', 0, 9, '1'),
(42, 'banner_statistics.php', 0, 9, '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin_groups`
--

CREATE TABLE IF NOT EXISTS `admin_groups` (
  `admin_groups_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_groups_name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`admin_groups_id`),
  UNIQUE KEY `admin_groups_name` (`admin_groups_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_groups`
--

INSERT INTO `admin_groups` (`admin_groups_id`, `admin_groups_name`) VALUES
(2, 'Customer Relations'),
(1, 'Top Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `banners_id` int(11) NOT NULL AUTO_INCREMENT,
  `banners_title` varchar(64) NOT NULL,
  `banners_url` varchar(255) NOT NULL,
  `banners_image` varchar(64) NOT NULL,
  `banners_group` varchar(10) NOT NULL,
  `banners_html_text` text,
  `expires_impressions` int(7) DEFAULT '0',
  `expires_date` datetime DEFAULT NULL,
  `date_scheduled` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `date_status_change` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`banners_id`),
  KEY `idx_banners_group` (`banners_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banners_id`, `banners_title`, `banners_url`, `banners_image`, `banners_group`, `banners_html_text`, `expires_impressions`, `expires_date`, `date_scheduled`, `date_added`, `date_status_change`, `status`) VALUES
(1, 'osCommerce', 'http://www.oscommerce.com', 'banners/oscommerce.gif', '468x50', '', 0, NULL, NULL, '2014-04-16 16:34:50', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banners_history`
--

CREATE TABLE IF NOT EXISTS `banners_history` (
  `banners_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `banners_id` int(11) NOT NULL,
  `banners_shown` int(5) NOT NULL DEFAULT '0',
  `banners_clicked` int(5) NOT NULL DEFAULT '0',
  `banners_history_date` datetime NOT NULL,
  PRIMARY KEY (`banners_history_id`),
  KEY `idx_banners_history_banners_id` (`banners_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `banners_history`
--

INSERT INTO `banners_history` (`banners_history_id`, `banners_id`, `banners_shown`, `banners_clicked`, `banners_history_date`) VALUES
(1, 1, 17, 0, '2014-05-02 10:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_image` varchar(64) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(3) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`categories_id`),
  KEY `idx_categories_parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_image`, `parent_id`, `sort_order`, `date_added`, `last_modified`) VALUES
(1, 'category_hardware.gif', 0, 1, '2014-04-16 16:34:50', NULL),
(2, 'category_software.gif', 0, 2, '2014-04-16 16:34:50', NULL),
(3, 'category_dvd_movies.gif', 0, 3, '2014-04-16 16:34:50', NULL),
(4, 'subcategory_graphic_cards.gif', 1, 0, '2014-04-16 16:34:50', NULL),
(5, 'subcategory_printers.gif', 1, 0, '2014-04-16 16:34:50', NULL),
(6, 'subcategory_monitors.gif', 1, 0, '2014-04-16 16:34:50', NULL),
(7, 'subcategory_speakers.gif', 1, 0, '2014-04-16 16:34:50', NULL),
(8, 'subcategory_keyboards.gif', 1, 0, '2014-04-16 16:34:50', NULL),
(9, 'subcategory_mice.gif', 1, 0, '2014-04-16 16:34:50', NULL),
(10, 'subcategory_action.gif', 3, 0, '2014-04-16 16:34:50', NULL),
(11, 'subcategory_science_fiction.gif', 3, 0, '2014-04-16 16:34:50', NULL),
(12, 'subcategory_comedy.gif', 3, 0, '2014-04-16 16:34:50', NULL),
(13, 'subcategory_cartoons.gif', 3, 0, '2014-04-16 16:34:50', NULL),
(14, 'subcategory_thriller.gif', 3, 0, '2014-04-16 16:34:50', NULL),
(15, 'subcategory_drama.gif', 3, 0, '2014-04-16 16:34:50', NULL),
(16, 'subcategory_memory.gif', 1, 0, '2014-04-16 16:34:50', NULL),
(17, 'subcategory_cdrom_drives.gif', 1, 0, '2014-04-16 16:34:50', NULL),
(18, 'subcategory_simulation.gif', 2, 0, '2014-04-16 16:34:50', NULL),
(19, 'subcategory_action_games.gif', 2, 0, '2014-04-16 16:34:50', NULL),
(20, 'subcategory_strategy.gif', 2, 0, '2014-04-16 16:34:50', NULL),
(21, 'category_gadgets.png', 0, 4, '2014-04-16 16:34:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories_description`
--

CREATE TABLE IF NOT EXISTS `categories_description` (
  `categories_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `categories_name` varchar(32) NOT NULL,
  PRIMARY KEY (`categories_id`,`language_id`),
  KEY `idx_categories_name` (`categories_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_description`
--

INSERT INTO `categories_description` (`categories_id`, `language_id`, `categories_name`) VALUES
(10, 1, 'Action'),
(19, 1, 'Action'),
(13, 1, 'Cartoons'),
(17, 1, 'CDROM Drives'),
(12, 1, 'Comedy'),
(15, 1, 'Drama'),
(3, 1, 'DVD Movies'),
(21, 1, 'Gadgets'),
(4, 1, 'Graphics Cards'),
(1, 1, 'Hardware'),
(8, 1, 'Keyboards'),
(16, 1, 'Memory'),
(9, 1, 'Mice'),
(6, 1, 'Monitors'),
(5, 1, 'Printers'),
(11, 1, 'Science Fiction'),
(18, 1, 'Simulation'),
(2, 1, 'Software'),
(7, 1, 'Speakers'),
(20, 1, 'Strategy'),
(14, 1, 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `label`, `estado`) VALUES
(1, 'defecto', 'I'),
(2, 'Condiciones', 'A'),
(3, 'Seguridad', 'A'),
(4, 'Accesorios Externos', 'A'),
(5, 'Sonido', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `cilindraje`
--

CREATE TABLE IF NOT EXISTS `cilindraje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cilindraje`
--

INSERT INTO `cilindraje` (`id`, `descripcion`) VALUES
(1, '0 - 50 cc'),
(2, '51 - 125 cc'),
(3, '126 - 250 cc'),
(4, '251 - 500 cc'),
(5, '501 cc o más');

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `ciudad_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2221 ;

--
-- Dumping data for table `ciudad`
--

INSERT INTO `ciudad` (`id`, `descripcion`, `departamento_id`, `ciudad_id`) VALUES
(1164, 'ABEJORRAL                     ', 5, 2),
(1165, 'ABREGO                        ', 54, 3),
(1166, 'ABRIAQUI                      ', 5, 4),
(1167, 'ACACIAS                       ', 50, 6),
(1168, 'ACANDI                        ', 27, 6),
(1169, 'ACEVEDO                       ', 41, 6),
(1170, 'ACHI                          ', 13, 6),
(1171, 'AGRADO                        ', 41, 13),
(1172, 'AGUA DE DIOS -BOGOTA-         ', 25, 1),
(1173, 'AGUACHICA                     ', 20, 11),
(1174, 'AGUADA                        ', 68, 13),
(1175, 'AGUADAS                       ', 17, 13),
(1176, 'AGUAZUL                       ', 85, 10),
(1177, 'AGUSTIN CODAZZI               ', 20, 13),
(1178, 'AIPE                          ', 41, 16),
(1179, 'ALBAN                         ', 25, 19),
(1180, 'ALBAN                         ', 52, 19),
(1181, 'ALBANIA                       ', 18, 29),
(1182, 'ALBANIA                       ', 68, 20),
(1183, 'ALCALA                        ', 76, 20),
(1184, 'ALDANA                        ', 52, 22),
(1185, 'ALEJANDRIA                    ', 5, 21),
(1186, 'ALGECIRAS                     ', 41, 20),
(1187, 'ALMAGUER                      ', 19, 22),
(1188, 'ALMEIDA                       ', 15, 22),
(1189, 'ALPUJARRA                     ', 73, 24),
(1190, 'ALTAMIRA                      ', 41, 26),
(1191, 'ALTO BAUDO                    ', 27, 25),
(1192, 'ALTOS DEL ROSARIO             ', 13, 30),
(1193, 'ALVARADO                      ', 73, 26),
(1194, 'AMAGA                         ', 5, 30),
(1195, 'AMALFI                        ', 5, 31),
(1196, 'AMBALEMA                      ', 73, 30),
(1197, 'ANAPOIMA                      ', 25, 35),
(1198, 'ANCUYA                        ', 52, 36),
(1199, 'ANDALUCIA                     ', 76, 36),
(1200, 'ANDES                         ', 5, 34),
(1201, 'ANGELOPOLIS                   ', 5, 36),
(1202, 'ANGOSTURA                     ', 5, 38),
(1203, 'ANOLAIMA                      ', 25, 40),
(1204, 'ANORI                         ', 5, 40),
(1205, 'ANSERMA                       ', 17, 42),
(1206, 'ANSERMANUEVO                  ', 76, 41),
(1207, 'ANZA                          ', 5, 44),
(1208, 'ANZOATEGUI                    ', 73, 43),
(1209, 'APARTADO                      ', 5, 45),
(1210, 'APIA                          ', 66, 45),
(1211, 'AQUITANIA                     ', 15, 47),
(1212, 'ARACATACA                     ', 47, 52),
(1213, 'ARANZAZU                      ', 17, 50),
(1214, 'ARATOCA                       ', 68, 51),
(1215, 'ARAUCA                        ', 81, 1),
(1216, 'ARAUQUITA                     ', 81, 65),
(1217, 'ARBELAEZ                      ', 25, 53),
(1218, 'ARBOLEDA                      ', 52, 51),
(1219, 'ARBOLEDAS                     ', 54, 51),
(1220, 'ARBOLETES                     ', 5, 51),
(1221, 'ARCABUCO                      ', 15, 51),
(1222, 'ARENAL                        ', 13, 42),
(1223, 'ARGELIA                       ', 5, 55),
(1224, 'ARGELIA                       ', 19, 50),
(1225, 'ARGELIA                       ', 76, 54),
(1226, 'ARIGUANI                      ', 47, 58),
(1227, 'ARJONA                        ', 13, 52),
(1228, 'ARMENIA                       ', 5, 59),
(1229, 'ARMENIA                       ', 63, 1),
(1230, 'ARMERO                        ', 73, 55),
(1231, 'ASTREA                        ', 20, 32),
(1232, 'ATACO                         ', 73, 67),
(1233, 'AYAPEL                        ', 23, 68),
(1234, 'BAGADO                        ', 27, 73),
(1235, 'BAHIA SOLANO                  ', 27, 75),
(1236, 'BAJO BAUDO                    ', 27, 77),
(1237, 'BALBOA                        ', 19, 75),
(1238, 'BALBOA                        ', 66, 75),
(1239, 'BARANOA                       ', 8, 78),
(1240, 'BARAYA                        ', 41, 78),
(1241, 'BARBACOAS                     ', 52, 79),
(1242, 'BARBOSA                       ', 5, 79),
(1243, 'BARBOSA                       ', 68, 77),
(1244, 'BARICHARA                     ', 68, 79),
(1245, 'BARRANCA DE UPIA              ', 50, 110),
(1246, 'BARRANCABERMEJA               ', 68, 81),
(1247, 'BARRANCAS                     ', 44, 78),
(1248, 'BARRANCO DE LOBA              ', 13, 74),
(1249, 'BARRANCO MINA                 ', 94, 343),
(1250, 'BARRANQUILLA                  ', 8, 1),
(1251, 'BECERRIL                      ', 20, 35),
(1252, 'BELALCAZAR                    ', 17, 88),
(1253, 'BELEN                         ', 15, 87),
(1254, 'BELEN                         ', 52, 83),
(1255, 'BELEN DE LOS ANDAQUIES        ', 18, 94),
(1256, 'BELEN DE UMBRIA               ', 66, 88),
(1257, 'BELLO                         ', 5, 88),
(1258, 'BELMIRA                       ', 5, 86),
(1259, 'BELTRAN                       ', 25, 86),
(1260, 'BERBEO                        ', 15, 90),
(1261, 'BETANIA                       ', 5, 91),
(1262, 'BETEITIVA                     ', 15, 92),
(1263, 'BETULIA                       ', 5, 93),
(1264, 'BETULIA                       ', 68, 92),
(1265, 'BITUIMA                       ', 25, 95),
(1266, 'BOAVITA                       ', 15, 97),
(1267, 'BOCHALEMA                     ', 54, 99),
(1268, 'BOGOTA D.C.                   ', 11, 1),
(1269, 'BOJACA                        ', 25, 99),
(1270, 'BOJAYA                        ', 27, 99),
(1271, 'BOLIVAR                       ', 19, 100),
(1272, 'BOLIVAR                       ', 68, 101),
(1273, 'BOLIVAR                       ', 76, 100),
(1274, 'BOSCONIA                      ', 20, 60),
(1275, 'BOYACA                        ', 15, 104),
(1276, 'BRICEÑO                       ', 5, 107),
(1277, 'BRICEÑO                       ', 15, 106),
(1278, 'BUCARAMANGA                   ', 68, 1),
(1279, 'BUCARASICA                    ', 54, 109),
(1280, 'BUENAVENTURA                  ', 76, 109),
(1281, 'BUENAVISTA                    ', 15, 109),
(1282, 'BUENAVISTA                    ', 23, 79),
(1283, 'BUENAVISTA                    ', 63, 111),
(1284, 'BUENAVISTA                    ', 70, 110),
(1285, 'BUENOS AIRES                  ', 19, 110),
(1286, 'BUESACO                       ', 52, 110),
(1287, 'BUGA                          ', 76, 111),
(1288, 'BUGALAGRANDE                  ', 76, 113),
(1289, 'BURITICA                      ', 5, 113),
(1290, 'BUSBANZA                      ', 15, 114),
(1291, 'CAÑAS GORDAS                  ', 5, 138),
(1292, 'CABRERA                       ', 25, 120),
(1293, 'CABRERA                       ', 68, 121),
(1294, 'CABUYARO                      ', 50, 124),
(1295, 'CACAHUAL                      ', 94, 886),
(1296, 'CACERES                       ', 5, 120),
(1297, 'CACHIPAY                      ', 25, 123),
(1298, 'CACHIRA                       ', 54, 128),
(1299, 'CACOTA                        ', 54, 125),
(1300, 'CAICEDO                       ', 5, 125),
(1301, 'CAICEDONIA                    ', 76, 122),
(1302, 'CAIMITO                       ', 70, 124),
(1303, 'CAJAMARCA                     ', 73, 124),
(1304, 'CAJIBIO                       ', 19, 130),
(1305, 'CAJICA                        ', 25, 126),
(1306, 'CALAMAR                       ', 13, 140),
(1307, 'CALAMAR                       ', 95, 15),
(1308, 'CALARCA                       ', 63, 130),
(1309, 'CALDAS                        ', 5, 129),
(1310, 'CALDAS                        ', 15, 131),
(1311, 'CALDONO                       ', 19, 137),
(1312, 'CALI                          ', 76, 1),
(1313, 'CALIFORNIA                    ', 68, 132),
(1314, 'CALIMA                        ', 76, 126),
(1315, 'CALOTO                        ', 19, 142),
(1316, 'CAMPAMENTO                    ', 5, 134),
(1317, 'CAMPO DE LA CRUZ              ', 8, 137),
(1318, 'CAMPOALEGRE                   ', 41, 132),
(1319, 'CAMPOHERMOSO                  ', 15, 135),
(1320, 'CANALETE                      ', 23, 90),
(1321, 'CANDELARIA                    ', 8, 141),
(1322, 'CANDELARIA                    ', 76, 130),
(1323, 'CANTAGALLO                    ', 13, 160),
(1324, 'CAPARRAPI                     ', 25, 148),
(1325, 'CAPITANEJO                    ', 68, 147),
(1326, 'CAQUEZA                       ', 25, 151),
(1327, 'CARACOLI                      ', 5, 142),
(1328, 'CARAMANTA                     ', 5, 145),
(1329, 'CARCASI                       ', 68, 152),
(1330, 'CAREPA                        ', 5, 147),
(1331, 'CARMEN APICALA                ', 73, 148),
(1332, 'CARMEN DE CARUPA              ', 25, 154),
(1333, 'CARMEN DE VIBORAL             ', 5, 148),
(1334, 'CAROLINA                      ', 5, 150),
(1335, 'CARTAGENA                     ', 13, 1),
(1336, 'CARTAGENA DEL CHAIRA          ', 18, 150),
(1337, 'CARTAGO                       ', 76, 147),
(1338, 'CARURU                        ', 97, 161),
(1339, 'CASABIANCA                    ', 73, 152),
(1340, 'CASTILLA LA NUEVA             ', 50, 201),
(1341, 'CAUCASIA                      ', 5, 154),
(1342, 'CEPITA                        ', 68, 160),
(1343, 'CERETE                        ', 23, 162),
(1344, 'CERINZA                       ', 15, 162),
(1345, 'CERRITO                       ', 68, 162),
(1346, 'CERRO SAN ANTONIO             ', 47, 161),
(1347, 'CHACHAGUI                     ', 52, 240),
(1348, 'CHAGUANI                      ', 25, 168),
(1349, 'CHALAN                        ', 70, 230),
(1350, 'CHAMEZA                       ', 85, 15),
(1351, 'CHAPARRAL                     ', 73, 168),
(1352, 'CHARALA                       ', 68, 167),
(1353, 'CHARTA                        ', 68, 169),
(1354, 'CHIA                          ', 25, 175),
(1355, 'CHIGORODO                     ', 5, 172),
(1356, 'CHIMA                         ', 23, 168),
(1357, 'CHIMA                         ', 68, 176),
(1358, 'CHIMICHAGUA                   ', 20, 175),
(1359, 'CHINACOTA                     ', 54, 172),
(1360, 'CHINAVITA                     ', 15, 172),
(1361, 'CHINCHINA                     ', 17, 174),
(1362, 'CHINU                         ', 23, 182),
(1363, 'CHIPAQUE                      ', 25, 178),
(1364, 'CHIPATA                       ', 68, 179),
(1365, 'CHIQUINQUIRA                  ', 15, 176),
(1366, 'CHIQUIZA                      ', 15, 232),
(1367, 'CHIRIGUANA                    ', 20, 178),
(1368, 'CHISCAS                       ', 15, 180),
(1369, 'CHITA                         ', 15, 183),
(1370, 'CHITAGA                       ', 54, 174),
(1371, 'CHITARAQUE                    ', 15, 185),
(1372, 'CHIVATA                       ', 15, 187),
(1373, 'CHIVOLO                       ', 47, 170),
(1374, 'CHIVOR                        ', 15, 236),
(1375, 'CHOACHI                       ', 25, 181),
(1376, 'CHOCONTA                      ', 25, 183),
(1377, 'CICUCO                        ', 13, 188),
(1378, 'CIENAGA                       ', 47, 189),
(1379, 'CIENAGA DE ORO                ', 23, 189),
(1380, 'CIENEGA                       ', 15, 189),
(1381, 'CIMITARRA                     ', 68, 190),
(1382, 'CIRCASIA                      ', 63, 190),
(1383, 'CISNEROS                      ', 5, 190),
(1384, 'CIUDAD BOLIVAR                ', 5, 101),
(1385, 'CLEMENCIA                     ', 13, 222),
(1386, 'COCORNA                       ', 5, 197),
(1387, 'COELLO                        ', 73, 200),
(1388, 'COGUA                         ', 25, 200),
(1389, 'COLOMBIA                      ', 41, 206),
(1390, 'COLON                         ', 52, 203),
(1391, 'COLON                         ', 86, 219),
(1392, 'COLOSO                        ', 70, 204),
(1393, 'COMBITA                       ', 15, 204),
(1394, 'CONCEPCION                    ', 5, 206),
(1395, 'CONCEPCION                    ', 68, 207),
(1396, 'CONCORDIA                     ', 5, 209),
(1397, 'CONDOTO                       ', 27, 205),
(1398, 'CONFINES                      ', 68, 209),
(1399, 'CONSACA                       ', 52, 207),
(1400, 'CONTADERO                     ', 52, 210),
(1401, 'CONTRATACION                  ', 68, 211),
(1402, 'CONVENCION                    ', 54, 206),
(1403, 'COPACABANA                    ', 5, 212),
(1404, 'COPER                         ', 15, 212),
(1405, 'CORDOBA                       ', 13, 212),
(1406, 'CORDOBA                       ', 52, 215),
(1407, 'CORDOBA                       ', 63, 212),
(1408, 'CORINTO                       ', 19, 212),
(1409, 'COROMORO                      ', 68, 217),
(1410, 'COROZAL                       ', 70, 215),
(1411, 'CORRALES                      ', 15, 215),
(1412, 'COTA                          ', 25, 214),
(1413, 'COVARACHIA                    ', 15, 218),
(1414, 'COYAIMA                       ', 73, 217),
(1415, 'CRAVO NORTE                   ', 81, 220),
(1416, 'CUASPUD                       ', 52, 224),
(1417, 'CUBARA                        ', 15, 223),
(1418, 'CUCAITA                       ', 15, 224),
(1419, 'CUCUNUBA                      ', 25, 224),
(1420, 'CUCUTA                        ', 54, 1),
(1421, 'CUCUTILLA                     ', 54, 223),
(1422, 'CUITIVA                       ', 15, 226),
(1423, 'CUMARAL                       ', 50, 226),
(1424, 'CUMARIBO                      ', 99, 773),
(1425, 'CUMBAL                        ', 52, 227),
(1426, 'CUMBITARA                     ', 52, 233),
(1427, 'CUNDAY                        ', 73, 226),
(1428, 'CURITI                        ', 68, 229),
(1429, 'CURRILLO                      ', 18, 205),
(1430, 'CURUMANI                      ', 20, 228),
(1431, 'DABEIBA                       ', 5, 234),
(1432, 'DAGUA                         ', 76, 233),
(1433, 'DIBULLA                       ', 44, 90),
(1434, 'DISTRACCION                   ', 44, 98),
(1435, 'DOLORES                       ', 73, 236),
(1436, 'DON MATIAS                    ', 5, 237),
(1437, 'DOSQUEBRADAS                  ', 66, 170),
(1438, 'DUITAMA                       ', 15, 238),
(1439, 'DURANIA                       ', 54, 239),
(1440, 'EBEJICO                       ', 5, 240),
(1441, 'EL AGUILA                     ', 76, 243),
(1442, 'EL BAGRE                      ', 5, 250),
(1443, 'EL BANCO                      ', 47, 245),
(1444, 'EL CAIRO                      ', 76, 246),
(1445, 'EL CALVARIO                   ', 50, 245),
(1446, 'EL CANTON DE SAN PABLO        ', 27, 135),
(1447, 'EL CARMEN                     ', 54, 245),
(1448, 'EL CARMEN DE ATRATO           ', 27, 245),
(1449, 'EL CARMEN DE BOLIVAR          ', 13, 244),
(1450, 'EL CARMEN DE CHUCURI          ', 68, 235),
(1451, 'EL CASTILLO                   ', 50, 251),
(1452, 'EL CERRITO                    ', 76, 248),
(1453, 'EL CHARCO                     ', 52, 250),
(1454, 'EL COCUY                      ', 15, 244),
(1455, 'EL COLEGIO                    ', 25, 245),
(1456, 'EL COPEY                      ', 20, 238),
(1457, 'EL DONCELLO                   ', 18, 247),
(1458, 'EL DORADO                     ', 50, 270),
(1459, 'EL DOVIO                      ', 76, 250),
(1460, 'EL ENCANTO                    ', 91, 263),
(1461, 'EL ESPINO                     ', 15, 248),
(1462, 'EL FLORIAN                    ', 68, 271),
(1463, 'EL GUACAMAYO                  ', 68, 245),
(1464, 'EL GUAMO                      ', 13, 248),
(1465, 'EL MOLINO                     ', 44, 110),
(1466, 'EL PASO                       ', 20, 250),
(1467, 'EL PAUJIL                     ', 18, 256),
(1468, 'EL PEÑON                      ', 13, 268),
(1469, 'EL PEÑON                      ', 25, 248),
(1470, 'EL PEÑON                      ', 68, 250),
(1471, 'EL PIÑON                      ', 47, 258),
(1472, 'EL PLAYON                     ', 68, 255),
(1473, 'EL RETEN                      ', 47, 268),
(1474, 'EL RETORNO                    ', 95, 25),
(1475, 'EL ROSARIO                    ', 52, 256),
(1476, 'EL TABLON                     ', 52, 258),
(1477, 'EL TAMBO                      ', 19, 256),
(1478, 'EL TAMBO                      ', 52, 260),
(1479, 'EL TARRA                      ', 54, 250),
(1480, 'EL ZULIA                      ', 54, 261),
(1481, 'ELIAS                         ', 41, 244),
(1482, 'ENCINO                        ', 68, 264),
(1483, 'ENCISO                        ', 68, 266),
(1484, 'ENTRERRIOS                    ', 5, 264),
(1485, 'ENVIGADO                      ', 5, 266),
(1486, 'ESPINAL                       ', 73, 268),
(1487, 'FACATATIVA                    ', 25, 269),
(1488, 'FALAN                         ', 73, 270),
(1489, 'FILADELFIA                    ', 17, 272),
(1490, 'FILANDIA                      ', 63, 272),
(1491, 'FIRAVITOBA                    ', 15, 272),
(1492, 'FLANDES                       ', 73, 275),
(1493, 'FLORENCIA                     ', 18, 1),
(1494, 'FLORENCIA                     ', 19, 290),
(1495, 'FLORESTA                      ', 15, 276),
(1496, 'FLORIDA                       ', 76, 275),
(1497, 'FLORIDABLANCA                 ', 68, 276),
(1498, 'FOMEQUE                       ', 25, 279),
(1499, 'FONSECA                       ', 44, 279),
(1500, 'FORTUL                        ', 81, 300),
(1501, 'FOSCA                         ', 25, 281),
(1502, 'FRANCISCO PIZARRO             ', 52, 520),
(1503, 'FREDONIA                      ', 5, 282),
(1504, 'FRESNO                        ', 73, 283),
(1505, 'FRONTINO                      ', 5, 284),
(1506, 'FUENTE DE ORO                 ', 50, 287),
(1507, 'FUNDACION                     ', 47, 288),
(1508, 'FUNES                         ', 52, 287),
(1509, 'FUNZA                         ', 25, 286),
(1510, 'FUQUENE                       ', 25, 288),
(1511, 'FUSAGASUGA                    ', 25, 290),
(1512, 'GACHALA                       ', 25, 293),
(1513, 'GACHANCIPA                    ', 25, 295),
(1514, 'GACHANTIVA                    ', 15, 293),
(1515, 'GACHETA                       ', 25, 297),
(1516, 'GALAN                         ', 68, 296),
(1517, 'GALAPA                        ', 8, 296),
(1518, 'GALERAS                       ', 70, 235),
(1519, 'GAMA                          ', 25, 299),
(1520, 'GAMARRA                       ', 20, 295),
(1521, 'GAMBITA                       ', 68, 298),
(1522, 'GAMEZA                        ', 15, 296),
(1523, 'GARAGOA                       ', 15, 299),
(1524, 'GARZON                        ', 41, 298),
(1525, 'GENOVA                        ', 63, 302),
(1526, 'GIGANTE                       ', 41, 306),
(1527, 'GINEBRA                       ', 76, 306),
(1528, 'GIRALDO                       ', 5, 306),
(1529, 'GIRARDOT                      ', 25, 307),
(1530, 'GIRARDOTA                     ', 5, 308),
(1531, 'GIRON                         ', 68, 307),
(1532, 'GOMEZ PLATA                   ', 5, 310),
(1533, 'GONZALEZ                      ', 20, 310),
(1534, 'GRAMALOTE                     ', 54, 313),
(1535, 'GRANADA                       ', 5, 313),
(1536, 'GRANADA                       ', 25, 312),
(1537, 'GRANADA                       ', 50, 313),
(1538, 'GUACA                         ', 68, 318),
(1539, 'GUACAMAYAS                    ', 15, 317),
(1540, 'GUACARI                       ', 76, 318),
(1541, 'GUACHETA                      ', 25, 317),
(1542, 'GUACHUCAL                     ', 52, 317),
(1543, 'GUADALUPE                     ', 5, 315),
(1544, 'GUADALUPE                     ', 41, 319),
(1545, 'GUADALUPE                     ', 68, 320),
(1546, 'GUADUAS                       ', 25, 320),
(1547, 'GUAITARILLA                   ', 52, 320),
(1548, 'GUALMATAN                     ', 52, 323),
(1549, 'GUAMAL                        ', 47, 318),
(1550, 'GUAMAL                        ', 50, 318),
(1551, 'GUAMO                         ', 73, 319),
(1552, 'GUAPI                         ', 19, 318),
(1553, 'GUAPOTA                       ', 68, 322),
(1554, 'GUARANDA                      ', 70, 265),
(1555, 'GUARNE                        ', 5, 318),
(1556, 'GUASCA                        ', 25, 322),
(1557, 'GUATAPE                       ', 5, 321),
(1558, 'GUATAQUI                      ', 25, 324),
(1559, 'GUATAVITA                     ', 25, 326),
(1560, 'GUATEQUE                      ', 15, 322),
(1561, 'GUATICA                       ', 66, 318),
(1562, 'GUAVATA                       ', 68, 324),
(1563, 'GUAYABAL DE SIQUIMA           ', 25, 328),
(1564, 'GUAYABETAL                    ', 25, 335),
(1565, 'GUAYATA                       ', 15, 325),
(1566, 'GUEPSA                        ', 68, 327),
(1567, 'GUICAN                        ', 15, 332),
(1568, 'GUTIERREZ                     ', 25, 339),
(1569, 'HACARI                        ', 54, 344),
(1570, 'HATILLO DE LOBA               ', 13, 300),
(1571, 'HATO                          ', 68, 344),
(1572, 'HATO COROZAL                  ', 85, 125),
(1573, 'HATONUEVO                     ', 44, 378),
(1574, 'HELICONIA                     ', 5, 347),
(1575, 'HERRAN                        ', 54, 347),
(1576, 'HERVEO                        ', 73, 347),
(1577, 'HISPANIA                      ', 5, 353),
(1578, 'HOBO                          ', 41, 349),
(1579, 'HONDA                         ', 73, 349),
(1580, 'IBAGUE                        ', 73, 1),
(1581, 'ICONONZO                      ', 73, 352),
(1582, 'IIES                          ', 52, 523),
(1583, 'IMUES                         ', 52, 354),
(1584, 'INIRIDA                       ', 94, 1),
(1585, 'INZA                          ', 19, 355),
(1586, 'IPIALES                       ', 52, 356),
(1587, 'IQUIRA                        ', 41, 357),
(1588, 'ISNOS                         ', 41, 359),
(1589, 'ITAGUI                        ', 5, 360),
(1590, 'ITSMINA                       ', 27, 361),
(1591, 'ITUANGO                       ', 5, 361),
(1592, 'IZA                           ', 15, 362),
(1593, 'JAMBALO                       ', 19, 364),
(1594, 'JAMUNDI                       ', 76, 364),
(1595, 'JARDIN                        ', 5, 364),
(1596, 'JENESANO                      ', 15, 367),
(1597, 'JERICO                        ', 5, 368),
(1598, 'JERICO                        ', 15, 368),
(1599, 'JERUSALEM                     ', 25, 368),
(1600, 'JESUS MARIA                   ', 68, 683),
(1601, 'JORDAN                        ', 68, 370),
(1602, 'JUAN DE ACOSTA                ', 8, 372),
(1603, 'JUNIN                         ', 25, 372),
(1604, 'JURADO                        ', 27, 372),
(1605, 'LA ARGENTINA                  ', 41, 378),
(1606, 'LA BELLEZA                    ', 68, 377),
(1607, 'LA CALERA                     ', 25, 377),
(1608, 'LA CAPILLA                    ', 15, 380),
(1609, 'LA CEJA                       ', 5, 376),
(1610, 'LA CELIA                      ', 66, 383),
(1611, 'LA CHORRERA                   ', 91, 405),
(1612, 'LA CRUZ                       ', 52, 378),
(1613, 'LA CUMBRE                     ', 76, 377),
(1614, 'LA DORADA                     ', 17, 380),
(1615, 'LA DORADA                     ', 86, 757),
(1616, 'LA ESPERANZA                  ', 54, 385),
(1617, 'LA ESTRELLA                   ', 5, 380),
(1618, 'LA FLORIDA                    ', 52, 381),
(1619, 'LA GLORIA                     ', 20, 383),
(1620, 'LA GUADALUPE                  ', 94, 885),
(1621, 'LA JAGUA DE IBIRICO           ', 20, 400),
(1622, 'LA LLANADA                    ', 52, 385),
(1623, 'LA MACARENA                   ', 50, 503),
(1624, 'LA MERCED                     ', 17, 388),
(1625, 'LA MESA                       ', 25, 386),
(1626, 'LA MONTAÑITA                  ', 18, 410),
(1627, 'LA PALMA                      ', 25, 394),
(1628, 'LA PAZ                        ', 20, 621),
(1629, 'LA PAZ                        ', 68, 397),
(1630, 'LA PEÑA                       ', 25, 398),
(1631, 'LA PEDRERA                    ', 91, 407),
(1632, 'LA PLATA                      ', 41, 396),
(1633, 'LA PLAYA                      ', 54, 398),
(1634, 'LA PRIMAVERA                  ', 99, 524),
(1635, 'LA SALINA                     ', 85, 136),
(1636, 'LA SIERRA                     ', 19, 392),
(1637, 'LA TEBAIDA                    ', 63, 401),
(1638, 'LA TOLA                       ', 52, 390),
(1639, 'LA UNION                      ', 5, 400),
(1640, 'LA UNION                      ', 52, 399),
(1641, 'LA UNION                      ', 70, 400),
(1642, 'LA UNION                      ', 76, 400),
(1643, 'LA URIBE                      ', 50, 370),
(1644, 'LA UVITA                      ', 15, 403),
(1645, 'LA VEGA                       ', 19, 397),
(1646, 'LA VEGA                       ', 25, 402),
(1647, 'LA VICTORIA                   ', 15, 401),
(1648, 'LA VICTORIA                   ', 76, 403),
(1649, 'LA VIRGINIA                   ', 66, 400),
(1650, 'LABATECA                      ', 54, 377),
(1651, 'LABRANZAGRANDE                ', 15, 377),
(1652, 'LANDAZURI                     ', 68, 385),
(1653, 'LEBRIJA                       ', 68, 406),
(1654, 'LEIVA                         ', 52, 405),
(1655, 'LEJANIAS                      ', 50, 400),
(1656, 'LENGUAZAQUE                   ', 25, 407),
(1657, 'LERIDA                        ', 73, 408),
(1658, 'LETICIA                       ', 91, 1),
(1659, 'LIBANO                        ', 73, 411),
(1660, 'LIBORINA                      ', 5, 411),
(1661, 'LINARES                       ', 52, 411),
(1662, 'LITORAL DEL BAJO SAN JUAN     ', 27, 250),
(1663, 'LLORO                         ', 27, 413),
(1664, 'LOPEZ                         ', 19, 418),
(1665, 'LORICA                        ', 23, 417),
(1666, 'LOS ANDES                     ', 52, 418),
(1667, 'LOS CORDOBAS                  ', 23, 419),
(1668, 'LOS PALMITOS                  ', 70, 418),
(1669, 'LOS PATIOS                    ', 54, 405),
(1670, 'LOS SANTOS                    ', 68, 418),
(1671, 'LOURDES                       ', 54, 418),
(1672, 'LURUACO                       ', 8, 421),
(1673, 'MACANAL                       ', 15, 425),
(1674, 'MACARAVITA                    ', 68, 425),
(1675, 'MACEO                         ', 5, 425),
(1676, 'MACHETA                       ', 25, 426),
(1677, 'MADRID                        ', 25, 430),
(1678, 'MAGANGUE                      ', 13, 430),
(1679, 'MAGUI                         ', 52, 427),
(1680, 'MAHATES                       ', 13, 433),
(1681, 'MAICAO                        ', 44, 430),
(1682, 'MAJAGUAL                      ', 70, 429),
(1683, 'MALAGA                        ', 68, 432),
(1684, 'MALAMBO                       ', 8, 433),
(1685, 'MALLAMA                       ', 52, 435),
(1686, 'MANATI                        ', 8, 436),
(1687, 'MANAURE                       ', 20, 443),
(1688, 'MANAURE                       ', 44, 560),
(1689, 'MANI                          ', 85, 139),
(1690, 'MANIZALES                     ', 17, 1),
(1691, 'MANTA                         ', 25, 436),
(1692, 'MANZANARES                    ', 17, 433),
(1693, 'MAPIRIPAN                     ', 50, 325),
(1694, 'MARGARITA                     ', 13, 440),
(1695, 'MARIA LA BAJA                 ', 13, 442),
(1696, 'MARINILLA                     ', 5, 440),
(1697, 'MARIPI                        ', 15, 442),
(1698, 'MARIQUITA                     ', 73, 443),
(1699, 'MARMATO                       ', 17, 442),
(1700, 'MARQUETALIA                   ', 17, 444),
(1701, 'MARSELLA                      ', 66, 440),
(1702, 'MARULANDA                     ', 17, 446),
(1703, 'MATANZA                       ', 68, 444),
(1704, 'MEDELLIN                      ', 5, 1),
(1705, 'MEDINA                        ', 25, 438),
(1706, 'MELGAR                        ', 73, 449),
(1707, 'MERCADERES                    ', 19, 450),
(1708, 'MESETAS                       ', 50, 330),
(1709, 'MILAN                         ', 18, 460),
(1710, 'MIRAFLORES                    ', 15, 455),
(1711, 'MIRAFLORES                    ', 95, 200),
(1712, 'MIRANDA                       ', 19, 455),
(1713, 'MIRITI-PARANA                 ', 91, 460),
(1714, 'MISTRATO                      ', 66, 456),
(1715, 'MITU                          ', 97, 1),
(1716, 'MOÑITOS                       ', 23, 500),
(1717, 'MOCOA                         ', 86, 1),
(1718, 'MOGOTES                       ', 68, 464),
(1719, 'MOLAGAVITA                    ', 68, 684),
(1720, 'MOMIL                         ', 23, 464),
(1721, 'MOMPOS                        ', 13, 468),
(1722, 'MONGUA                        ', 15, 464),
(1723, 'MONGUI                        ', 15, 466),
(1724, 'MONIQUIRA                     ', 15, 469),
(1725, 'MONTEBELLO                    ', 5, 467),
(1726, 'MONTECRISTO                   ', 13, 458),
(1727, 'MONTELIBANO                   ', 23, 466),
(1728, 'MONTENEGRO                    ', 63, 470),
(1729, 'MONTERIA                      ', 23, 1),
(1730, 'MONTERREY                     ', 85, 162),
(1731, 'MORALES                       ', 13, 473),
(1732, 'MORALES                       ', 19, 473),
(1733, 'MORELIA                       ', 18, 479),
(1734, 'MORICHAL NUEVO                ', 94, 888),
(1735, 'MORROA                        ', 70, 473),
(1736, 'MOSQUERA                      ', 25, 473),
(1737, 'MOSQUERA                      ', 52, 473),
(1738, 'MOTAVITA                      ', 15, 476),
(1739, 'MURILLO                       ', 73, 461),
(1740, 'MURINDO                       ', 5, 475),
(1741, 'MUTATA                        ', 5, 480),
(1742, 'MUTISCUA                      ', 54, 480),
(1743, 'MUZO                          ', 15, 480),
(1744, 'NARIÑO                        ', 5, 483),
(1745, 'NARIÑO                        ', 25, 483),
(1746, 'NATAGA                        ', 41, 483),
(1747, 'NATAGAIMA                     ', 73, 483),
(1748, 'NECHI                         ', 5, 495),
(1749, 'NECOCLI                       ', 5, 490),
(1750, 'NEIRA                         ', 17, 486),
(1751, 'NEIVA                         ', 41, 1),
(1752, 'NEMOCON                       ', 25, 486),
(1753, 'NILO                          ', 25, 488),
(1754, 'NIMAIMA                       ', 25, 489),
(1755, 'NOBSA                         ', 15, 491),
(1756, 'NOCAIMA                       ', 25, 491),
(1757, 'NOVITA                        ', 27, 491),
(1758, 'NUEVO COLON                   ', 15, 494),
(1759, 'NUNCHIA                       ', 85, 225),
(1760, 'NUQUI                         ', 27, 495),
(1761, 'OBANDO                        ', 76, 497),
(1762, 'OCAÑA                         ', 54, 498),
(1763, 'OCAMONTE                      ', 68, 498),
(1764, 'OIBA                          ', 68, 500),
(1765, 'OICATA                        ', 15, 500),
(1766, 'OLAYA                         ', 5, 501),
(1767, 'OLAYA HERRERA                 ', 52, 490),
(1768, 'ONZAGA                        ', 68, 502),
(1769, 'OPORAPA                       ', 41, 503),
(1770, 'ORITO                         ', 86, 320),
(1771, 'OROCUE                        ', 85, 230),
(1772, 'ORTEGA                        ', 73, 504),
(1773, 'OSPINA                        ', 52, 506),
(1774, 'OSPINA PEREZ                  ', 25, 506),
(1775, 'OTANCHE                       ', 15, 507),
(1776, 'OVEJAS                        ', 70, 508),
(1777, 'PACHAVITA                     ', 15, 511),
(1778, 'PACHO                         ', 25, 513),
(1779, 'PACOA                         ', 97, 511),
(1780, 'PACORA                        ', 17, 513),
(1781, 'PADILLA                       ', 19, 513),
(1782, 'PAEZ                          ', 15, 514),
(1783, 'PAEZ                          ', 19, 517),
(1784, 'PAICOL                        ', 41, 518),
(1785, 'PAILITAS                      ', 20, 517),
(1786, 'PAIME                         ', 25, 518),
(1787, 'PAIPA                         ', 15, 516),
(1788, 'PAJARITO                      ', 15, 518),
(1789, 'PALERMO                       ', 41, 524),
(1790, 'PALESTINA                     ', 17, 524),
(1791, 'PALESTINA                     ', 41, 530),
(1792, 'PALMAR                        ', 68, 522),
(1793, 'PALMAR DE VARELA              ', 8, 520),
(1794, 'PALMAS DEL SOCORRO            ', 68, 524),
(1795, 'PALMIRA                       ', 76, 520),
(1796, 'PALMITO                       ', 70, 523),
(1797, 'PALOCABILDO                   ', 73, 520),
(1798, 'PAMPLONA                      ', 54, 518),
(1799, 'PAMPLONITA                    ', 54, 520),
(1800, 'PANA PANA                     ', 94, 887),
(1801, 'PANDI                         ', 25, 524),
(1802, 'PANQUEBA                      ', 15, 522),
(1803, 'PAPUNAHUA                     ', 97, 777),
(1804, 'PARAMO                        ', 68, 533),
(1805, 'PARATEBUENO                   ', 25, 530),
(1806, 'PASCA                         ', 25, 535),
(1807, 'PASTO                         ', 52, 1),
(1808, 'PATIA                         ', 19, 532),
(1809, 'PAUNA                         ', 15, 531),
(1810, 'PAYA                          ', 15, 533),
(1811, 'PAZ DE ARIPORO                ', 85, 250),
(1812, 'PAZ DE RIO                    ', 15, 537),
(1813, 'PEÑOL                         ', 5, 541),
(1814, 'PEDRAZA                       ', 47, 541),
(1815, 'PELAYA                        ', 20, 550),
(1816, 'PENSILVANIA                   ', 17, 541),
(1817, 'PEQUE                         ', 5, 543),
(1818, 'PEREIRA                       ', 66, 1),
(1819, 'PESCA                         ', 15, 542),
(1820, 'PIAMONTE                      ', 19, 533),
(1821, 'PIEDECUESTA                   ', 68, 547),
(1822, 'PIEDRAS                       ', 73, 547),
(1823, 'PIENDAMO                      ', 19, 548),
(1824, 'PIJAO                         ', 63, 548),
(1825, 'PIJIÑO DEL CARMEN             ', 47, 545),
(1826, 'PINCHOTE                      ', 68, 549),
(1827, 'PINILLOS                      ', 13, 549),
(1828, 'PIOJO                         ', 8, 549),
(1829, 'PISBA                         ', 15, 550),
(1830, 'PITAL                         ', 41, 548),
(1831, 'PITALITO                      ', 41, 551),
(1832, 'PIVIJAY                       ', 47, 551),
(1833, 'PLANADAS                      ', 73, 555),
(1834, 'PLANETA RICA                  ', 23, 555),
(1835, 'PLATO                         ', 47, 555),
(1836, 'POLICARPA                     ', 52, 540),
(1837, 'POLONUEVO                     ', 8, 558),
(1838, 'PONEDERA                      ', 8, 560),
(1839, 'POPAYAN                       ', 19, 1),
(1840, 'PORE                          ', 85, 263),
(1841, 'POTOSI                        ', 52, 560),
(1842, 'PRADERA                       ', 76, 563),
(1843, 'PRADO                         ', 73, 563),
(1844, 'PROVIDENCIA                   ', 52, 565),
(1845, 'PROVIDENCIA                   ', 88, 564),
(1846, 'PUEBLO NUEVO                  ', 23, 570),
(1847, 'PUEBLO RICO                   ', 66, 572),
(1848, 'PUEBLO VIEJO                  ', 47, 570),
(1849, 'PUEBLORRICO                   ', 5, 576),
(1850, 'PUERRES                       ', 52, 573),
(1851, 'PUERTO ASIS                   ', 86, 568),
(1852, 'PUERTO BERRIO                 ', 5, 579),
(1853, 'PUERTO BOYACA                 ', 15, 572),
(1854, 'PUERTO CAICEDO                ', 86, 569),
(1855, 'PUERTO CARREÑO                ', 99, 1),
(1856, 'PUERTO COLOMBIA               ', 8, 573),
(1857, 'PUERTO COLOMBIA               ', 94, 884),
(1858, 'PUERTO CONCORDIA              ', 50, 504),
(1859, 'PUERTO ESCONDIDO              ', 23, 574),
(1860, 'PUERTO GAITAN                 ', 50, 568),
(1861, 'PUERTO GUZMAN                 ', 86, 571),
(1862, 'PUERTO LEGUIZAMO              ', 86, 573),
(1863, 'PUERTO LIBERTADOR             ', 23, 580),
(1864, 'PUERTO LLERAS                 ', 50, 577),
(1865, 'PUERTO LOPEZ                  ', 50, 573),
(1866, 'PUERTO NARE                   ', 5, 585),
(1867, 'PUERTO NARIÑO                 ', 91, 540),
(1868, 'PUERTO RICO                   ', 18, 592),
(1869, 'PUERTO RICO                   ', 50, 590),
(1870, 'PUERTO RONDON                 ', 81, 591),
(1871, 'PUERTO SALGAR                 ', 25, 572),
(1872, 'PUERTO SANTANDER              ', 54, 553),
(1873, 'PUERTO SANTANDER              ', 91, 669),
(1874, 'PUERTO TEJADA                 ', 19, 573),
(1875, 'PUERTO TRIUNFO                ', 5, 591),
(1876, 'PULI                          ', 25, 580),
(1877, 'PUPIALES                      ', 52, 585),
(1878, 'PURACE                        ', 19, 585),
(1879, 'PURIFICACION                  ', 73, 585),
(1880, 'PURISIMA                      ', 23, 586),
(1881, 'QUEBRADANEGRA                 ', 25, 592),
(1882, 'QUETAME                       ', 25, 594),
(1883, 'QUIBDO                        ', 27, 1),
(1884, 'QUIMBAYA                      ', 63, 594),
(1885, 'QUINCHIA                      ', 66, 594),
(1886, 'QUIPAMA                       ', 15, 580),
(1887, 'QUIPILE                       ', 25, 596),
(1888, 'RAFAEL REYES                  ', 25, 599),
(1889, 'RAGONVALIA                    ', 54, 599),
(1890, 'RAMIRIQUI                     ', 15, 599),
(1891, 'RAQUIRA                       ', 15, 600),
(1892, 'RECETOR                       ', 85, 279),
(1893, 'REGIDOR                       ', 13, 580),
(1894, 'REMEDIOS                      ', 5, 604),
(1895, 'REMOLINO                      ', 47, 605),
(1896, 'REPELON                       ', 8, 606),
(1897, 'RESTREPO                      ', 50, 606),
(1898, 'RESTREPO                      ', 76, 606),
(1899, 'RETIRO                        ', 5, 607),
(1900, 'RICAURTE                      ', 25, 612),
(1901, 'RICAURTE                      ', 52, 612),
(1902, 'RIO DE ORO                    ', 20, 614),
(1903, 'RIO VIEJO                     ', 13, 600),
(1904, 'RIOBLANCO                     ', 73, 616),
(1905, 'RIOFRIO                       ', 76, 616),
(1906, 'RIOHACHA                      ', 44, 1),
(1907, 'RIONEGRO                      ', 5, 615),
(1908, 'RIOSUCIO                      ', 17, 614),
(1909, 'RIOSUCIO                      ', 27, 615),
(1910, 'RISARALDA                     ', 17, 616),
(1911, 'RIVERA                        ', 41, 615),
(1912, 'ROBERTO PAYAN                 ', 52, 621),
(1913, 'ROLDANILLO                    ', 76, 622),
(1914, 'RONCESVALLES                  ', 73, 622),
(1915, 'RONDON                        ', 15, 621),
(1916, 'ROSAS                         ', 19, 622),
(1917, 'ROVIRA                        ', 73, 624),
(1918, 'SABANAGRANDE                  ', 8, 634),
(1919, 'SABANALARGA                   ', 5, 628),
(1920, 'SABANALARGA                   ', 8, 638),
(1921, 'SABANALARGA                   ', 85, 300),
(1922, 'SABANETA                      ', 5, 631),
(1923, 'SABOYA                        ', 15, 632),
(1924, 'SACAMA                        ', 85, 315),
(1925, 'SACHICA                       ', 15, 638),
(1926, 'SAHAGUN                       ', 23, 660),
(1927, 'SALADOBLANCO                  ', 41, 660),
(1928, 'SALAMINA                      ', 17, 653),
(1929, 'SALAMINA                      ', 47, 675),
(1930, 'SALAZAR                       ', 54, 660),
(1931, 'SALDAÑA                       ', 73, 671),
(1932, 'SALENTO                       ', 63, 690),
(1933, 'SALGAR                        ', 5, 642),
(1934, 'SAMACA                        ', 15, 646),
(1935, 'SAMANA                        ', 17, 662),
(1936, 'SAMANIEGO                     ', 52, 678),
(1937, 'SAMPUES                       ', 70, 706),
(1938, 'SAN AGUSTIN                   ', 41, 668),
(1939, 'SAN ALBERTO                   ', 20, 710),
(1940, 'SAN ANDRES                    ', 5, 647),
(1941, 'SAN ANDRES                    ', 88, 1),
(1942, 'SAN ANDRES DE SOTAVENTO       ', 23, 670),
(1943, 'SAN ANTERO                    ', 23, 672),
(1944, 'SAN ANTONIO                   ', 73, 675),
(1945, 'SAN ANTONIO DE TENA           ', 25, 645),
(1946, 'SAN BENITO ABAD               ', 70, 678),
(1947, 'SAN BERNARDO                  ', 25, 649),
(1948, 'SAN BERNARDO                  ', 52, 685),
(1949, 'SAN BERNARDO DEL VIENTO       ', 23, 675),
(1950, 'SAN CALIXTO                   ', 54, 670),
(1951, 'SAN CARLOS                    ', 5, 649),
(1952, 'SAN CARLOS                    ', 23, 678),
(1953, 'SAN CARLOS GUAROA             ', 50, 680),
(1954, 'SAN CAYETANO                  ', 25, 653),
(1955, 'SAN CAYETANO                  ', 54, 673),
(1956, 'SAN CRISTOBAL                 ', 13, 620),
(1957, 'SAN DIEGO                     ', 20, 750),
(1958, 'SAN EDUARDO                   ', 15, 660),
(1959, 'SAN ESTANISLAO                ', 13, 647),
(1960, 'SAN FELIPE                    ', 94, 883),
(1961, 'SAN FERNANDO                  ', 13, 650),
(1962, 'SAN FRANCISCO                 ', 5, 652),
(1963, 'SAN FRANCISCO                 ', 25, 658),
(1964, 'SAN FRANCISCO                 ', 86, 755),
(1965, 'SAN JACINTO                   ', 13, 654),
(1966, 'SAN JERONIMO                  ', 5, 656),
(1967, 'SAN JOSE DE LA FRAGUA         ', 18, 610),
(1968, 'SAN JOSE DE LA MONTAÑA        ', 5, 658),
(1969, 'SAN JOSE DE OCUNE             ', 99, 760),
(1970, 'SAN JOSE DE PARE              ', 15, 664),
(1971, 'SAN JOSE DEL GUAVIARE         ', 95, 1),
(1972, 'SAN JOSE DEL PALMAR           ', 27, 660),
(1973, 'SAN JUAN BETULIA              ', 70, 702),
(1974, 'SAN JUAN DE ARAMA             ', 50, 683),
(1975, 'SAN JUAN DE RIOSECO           ', 25, 662),
(1976, 'SAN JUAN DE URABA             ', 5, 659),
(1977, 'SAN JUAN DEL CESAR            ', 44, 650),
(1978, 'SAN JUAN NEPOMUCENO           ', 13, 657),
(1979, 'SAN JUANITO                   ', 50, 686),
(1980, 'SAN LORENZO                   ', 52, 687),
(1981, 'SAN LUIS                      ', 5, 660),
(1982, 'SAN LUIS                      ', 73, 678),
(1983, 'SAN LUIS DE CUBARRAL          ', 50, 223),
(1984, 'SAN LUIS DE GACENO            ', 15, 667),
(1985, 'SAN LUIS DE PALENQUE          ', 85, 325),
(1986, 'SAN MARCOS                    ', 70, 708),
(1987, 'SAN MARTIN                    ', 20, 770),
(1988, 'SAN MARTIN                    ', 50, 689),
(1989, 'SAN MARTIN DE LOBA            ', 13, 667),
(1990, 'SAN MATEO                     ', 15, 673),
(1991, 'SAN MIGUEL DE SEMA            ', 15, 676),
(1992, 'SAN ONOFRE                    ', 70, 713),
(1993, 'SAN PABLO                     ', 13, 670),
(1994, 'SAN PABLO                     ', 52, 693),
(1995, 'SAN PABLO BORBUR              ', 15, 681),
(1996, 'SAN PEDRO                     ', 5, 664),
(1997, 'SAN PEDRO                     ', 70, 717),
(1998, 'SAN PEDRO                     ', 76, 670),
(1999, 'SAN PEDRO DE CARTAGO          ', 52, 694),
(2000, 'SAN PEDRO DE URABA            ', 5, 665),
(2001, 'SAN PELAYO                    ', 23, 686),
(2002, 'SAN RAFAEL                    ', 5, 667),
(2003, 'SAN ROQUE                     ', 5, 670),
(2004, 'SAN ROSA VITERBO              ', 15, 693),
(2005, 'SAN SEBASTIAN                 ', 19, 693),
(2006, 'SAN SEBASTIAN BUENAVISTA      ', 47, 692),
(2007, 'SAN VICENTE                   ', 5, 674),
(2008, 'SAN VICENTE DEL CAGUAN        ', 18, 753),
(2009, 'SAN ZENON                     ', 47, 703),
(2010, 'SANDONA                       ', 52, 683),
(2011, 'SANTA ANA                     ', 47, 707),
(2012, 'SANTA BARBARA                 ', 5, 679),
(2013, 'SANTA BARBARA                 ', 52, 696),
(2014, 'SANTA CATALINA                ', 13, 673),
(2015, 'SANTA ISABEL                  ', 73, 686),
(2016, 'SANTA LUCIA                   ', 8, 675),
(2017, 'SANTA MARIA                   ', 15, 690),
(2018, 'SANTA MARIA                   ', 41, 676),
(2019, 'SANTA MARTA                   ', 47, 1),
(2020, 'SANTA RITA                    ', 99, 572),
(2021, 'SANTA ROSA                    ', 13, 683),
(2022, 'SANTA ROSA                    ', 19, 701),
(2023, 'SANTA ROSA DE CABAL           ', 66, 682),
(2024, 'SANTA ROSA DE OSOS            ', 5, 686),
(2025, 'SANTA ROSA DEL SUR            ', 13, 688),
(2026, 'SANTA ROSALIA                 ', 99, 624),
(2027, 'SANTA SOFIA                   ', 15, 696),
(2028, 'SANTACRUZ                     ', 52, 699),
(2029, 'SANTAFE DE ANTIOQUIA          ', 5, 42),
(2030, 'SANTANA                       ', 15, 686),
(2031, 'SANTANDER DE QUILICHAO        ', 19, 698),
(2032, 'SANTIAGO                      ', 54, 680),
(2033, 'SANTIAGO                      ', 86, 760),
(2034, 'SANTO DOMINGO                 ', 5, 690),
(2035, 'SANTO TOMAS                   ', 8, 685),
(2036, 'SANTUARIO                     ', 5, 697),
(2037, 'SANTUARIO                     ', 66, 687),
(2038, 'SAPUYES                       ', 52, 720),
(2039, 'SARAVENA                      ', 81, 736),
(2040, 'SARDINATA                     ', 54, 720),
(2041, 'SASAIMA                       ', 25, 718),
(2042, 'SATIVANORTE                   ', 15, 720),
(2043, 'SATIVASUR                     ', 15, 723),
(2044, 'SEGOVIA                       ', 5, 736),
(2045, 'SESQUILE                      ', 25, 736),
(2046, 'SEVILLA                       ', 76, 736),
(2047, 'SIACHOQUE                     ', 15, 740),
(2048, 'SIBATE                        ', 25, 740),
(2049, 'SIBUNDOY                      ', 86, 749),
(2050, 'SILOS                         ', 54, 743),
(2051, 'SILVANIA                      ', 25, 743),
(2052, 'SILVIA                        ', 19, 743),
(2053, 'SIMIJACA                      ', 25, 745),
(2054, 'SIMITI                        ', 13, 744),
(2055, 'SINCE                         ', 70, 742),
(2056, 'SINCELEJO                     ', 70, 1),
(2057, 'SIPI                          ', 27, 745),
(2058, 'SITIONUEVO                    ', 47, 745),
(2059, 'SOACHA                        ', 25, 754),
(2060, 'SOATA                         ', 15, 753),
(2061, 'SOCHA                         ', 15, 757),
(2062, 'SOCOTA                        ', 15, 755),
(2063, 'SOGAMOSO                      ', 15, 759),
(2064, 'SOLANO                        ', 18, 756),
(2065, 'SOLEDAD                       ', 8, 758),
(2066, 'SOLITA                        ', 18, 785),
(2067, 'SOMONDOCO                     ', 15, 761),
(2068, 'SONSON                        ', 5, 756),
(2069, 'SOPETRAN                      ', 5, 761),
(2070, 'SOPLAVIENTO                   ', 13, 760),
(2071, 'SOPO                          ', 25, 758),
(2072, 'SORA                          ', 15, 762),
(2073, 'SORACA                        ', 15, 764),
(2074, 'SOTAQUIRA                     ', 15, 763),
(2075, 'SOTARA                        ', 19, 760),
(2076, 'SUAN                          ', 8, 770),
(2077, 'SUAREZ                        ', 19, 780),
(2078, 'SUAREZ                        ', 73, 770),
(2079, 'SUAZA                         ', 41, 770),
(2080, 'SUBACHOQUE                    ', 25, 769),
(2081, 'SUCRE                         ', 70, 771),
(2082, 'SUESCA                        ', 25, 772),
(2083, 'SUPATA                        ', 25, 777),
(2084, 'SUPIA                         ', 17, 777),
(2085, 'SUSA                          ', 25, 779),
(2086, 'SUSACON                       ', 15, 774),
(2087, 'SUTAMARCHAN                   ', 15, 776),
(2088, 'SUTATAUSA                     ', 25, 781),
(2089, 'SUTATENZA                     ', 15, 778),
(2090, 'TABIO                         ', 25, 785),
(2091, 'TADO                          ', 27, 787),
(2092, 'TALAIGUA NUEVO                ', 13, 780),
(2093, 'TAMALAMEQUE                   ', 20, 787),
(2094, 'TAMARA                        ', 85, 400),
(2095, 'TAME                          ', 81, 794),
(2096, 'TAMESIS                       ', 5, 789),
(2097, 'TAMINANGO                     ', 52, 786),
(2098, 'TANGUA                        ', 52, 788),
(2099, 'TARAIRA                       ', 97, 666),
(2100, 'TARAPACA                      ', 91, 798),
(2101, 'TARAZA                        ', 5, 790),
(2102, 'TARQUI                        ', 41, 791),
(2103, 'TARSO                         ', 5, 792),
(2104, 'TASCO                         ', 15, 790),
(2105, 'TAURAMENA                     ', 85, 410),
(2106, 'TAUSA                         ', 25, 793),
(2107, 'TELLO                         ', 41, 799),
(2108, 'TENA                          ', 25, 797),
(2109, 'TENERIFE                      ', 47, 798),
(2110, 'TENJO                         ', 25, 799),
(2111, 'TENZA                         ', 15, 798),
(2112, 'TEORAMA                       ', 54, 800),
(2113, 'TERUEL                        ', 41, 801),
(2114, 'TESALIA                       ', 41, 797),
(2115, 'TIBACUY                       ', 25, 805),
(2116, 'TIBANA                        ', 15, 804),
(2117, 'TIBASOSA                      ', 15, 806),
(2118, 'TIBIRITA                      ', 25, 807),
(2119, 'TIBU                          ', 54, 810),
(2120, 'TIERRALTA                     ', 23, 807),
(2121, 'TIMANA                        ', 41, 807),
(2122, 'TIMBIO                        ', 19, 807),
(2123, 'TIMBIQUI                      ', 19, 809),
(2124, 'TINJACA                       ', 15, 808),
(2125, 'TIPACOQUE                     ', 15, 810),
(2126, 'TIQUISIO                      ', 13, 810),
(2127, 'TITIRIBI                      ', 5, 809),
(2128, 'TOCA                          ', 15, 814),
(2129, 'TOCAIMA                       ', 25, 815),
(2130, 'TOCANCIPA                     ', 25, 817),
(2131, 'TOGUI                         ', 15, 816),
(2132, 'TOLEDO                        ', 5, 819),
(2133, 'TOLEDO                        ', 54, 820),
(2134, 'TOLU                          ', 70, 820),
(2135, 'TOLUVIEJO                     ', 70, 823),
(2136, 'TOPAGA                        ', 15, 820),
(2137, 'TOPAIPI                       ', 25, 823),
(2138, 'TORIBIO                       ', 19, 821),
(2139, 'TORO                          ', 76, 823),
(2140, 'TOTA                          ', 15, 822),
(2141, 'TOTORO                        ', 19, 824),
(2142, 'TRINIDAD                      ', 85, 430),
(2143, 'TRUJILLO                      ', 76, 828),
(2144, 'TUBARA                        ', 8, 832),
(2145, 'TULUA                         ', 76, 834),
(2146, 'TUMACO                        ', 52, 835),
(2147, 'TUNJA                         ', 15, 1),
(2148, 'TUNUNGUA                      ', 15, 832),
(2149, 'TUQUERRES                     ', 52, 838),
(2150, 'TURBACO                       ', 13, 836),
(2151, 'TURBANA                       ', 13, 838),
(2152, 'TURBO                         ', 5, 837),
(2153, 'TURMEQUE                      ', 15, 835),
(2154, 'TUTA                          ', 15, 837),
(2155, 'TUTAZA                        ', 15, 839),
(2156, 'UBALA                         ', 25, 839),
(2157, 'UBAQUE                        ', 25, 841),
(2158, 'UBATE                         ', 25, 843),
(2159, 'ULLOA                         ', 76, 845),
(2160, 'UMBITA                        ', 15, 842),
(2161, 'UNE                           ', 25, 845),
(2162, 'UNGUIA                        ', 27, 800),
(2163, 'URAMITA                       ', 5, 842),
(2164, 'URIBIA                        ', 44, 847),
(2165, 'URRAO                         ', 5, 847),
(2166, 'URUMITA                       ', 44, 855),
(2167, 'USIACURI                      ', 8, 849),
(2168, 'UTICA                         ', 25, 851),
(2169, 'VALDIVIA                      ', 5, 854),
(2170, 'VALLE DE SAN JUAN             ', 73, 854),
(2171, 'VALLE DEL GUAMEZ              ', 86, 865),
(2172, 'VALLEDUPAR                    ', 20, 1),
(2173, 'VALPARAISO                    ', 5, 856),
(2174, 'VALPARAISO                    ', 18, 860),
(2175, 'VEGACHI                       ', 5, 858),
(2176, 'VENADILLO                     ', 73, 861),
(2177, 'VENECIA                       ', 5, 861),
(2178, 'VENTAQUEMADA                  ', 15, 861),
(2179, 'VERGARA                       ', 25, 862),
(2180, 'VERSALLES                     ', 76, 863),
(2181, 'VIANI                         ', 25, 867),
(2182, 'VICTORIA                      ', 17, 867),
(2183, 'VIGIA DEL FUERTE              ', 5, 873),
(2184, 'VIJES                         ', 76, 869),
(2185, 'VILLA CARO                    ', 54, 871),
(2186, 'VILLA DE LEYVA                ', 15, 407),
(2187, 'VILLA DEL ROSARIO             ', 54, 874);
INSERT INTO `ciudad` (`id`, `descripcion`, `departamento_id`, `ciudad_id`) VALUES
(2188, 'VILLAGARZON                   ', 86, 885),
(2189, 'VILLAGOMEZ                    ', 25, 871),
(2190, 'VILLAHERMOSA                  ', 73, 870),
(2191, 'VILLAMARIA                    ', 17, 873),
(2192, 'VILLANUEVA                    ', 13, 873),
(2193, 'VILLANUEVA                    ', 44, 874),
(2194, 'VILLANUEVA                    ', 85, 440),
(2195, 'VILLAPINZON                   ', 25, 873),
(2196, 'VILLARRICA                    ', 73, 738),
(2197, 'VILLAVICENCIO                 ', 50, 1),
(2198, 'VILLAVIEJA                    ', 41, 872),
(2199, 'VILLETA                       ', 25, 875),
(2200, 'VIOTA                         ', 25, 878),
(2201, 'VIRACACHA                     ', 15, 879),
(2202, 'VISTA HERMOSA                 ', 50, 711),
(2203, 'VITERBO                       ', 17, 877),
(2204, 'YACOPI                        ', 25, 885),
(2205, 'YAGUARA                       ', 41, 885),
(2206, 'YALI                          ', 5, 885),
(2207, 'YARUMAL                       ', 5, 887),
(2208, 'YAVARETE                      ', 97, 889),
(2209, 'YOLOMBO                       ', 5, 890),
(2210, 'YONDO                         ', 5, 893),
(2211, 'YOPAL                         ', 85, 1),
(2212, 'YOTOCO                        ', 76, 890),
(2213, 'YUCUANQUER                    ', 52, 885),
(2214, 'YUMBO                         ', 76, 892),
(2215, 'ZAMBRANO                      ', 13, 894),
(2216, 'ZARAGOZA                      ', 5, 895),
(2217, 'ZARZAL                        ', 76, 895),
(2218, 'ZETAQUIRA                     ', 15, 897),
(2219, 'ZIPACON                       ', 25, 898),
(2220, 'ZIPAQUIRA                     ', 25, 899);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `label`) VALUES
(1, 'Negro'),
(2, 'Blanco'),
(3, 'Azul'),
(4, 'Rojo'),
(5, 'Verde');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `configuration_id` int(11) NOT NULL AUTO_INCREMENT,
  `configuration_title` varchar(255) NOT NULL,
  `configuration_key` varchar(255) NOT NULL,
  `configuration_value` text NOT NULL,
  `configuration_description` varchar(255) NOT NULL,
  `configuration_group_id` int(11) NOT NULL,
  `sort_order` int(5) DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `use_function` varchar(255) DEFAULT NULL,
  `set_function` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`configuration_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=259 ;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`configuration_id`, `configuration_title`, `configuration_key`, `configuration_value`, `configuration_description`, `configuration_group_id`, `sort_order`, `last_modified`, `date_added`, `use_function`, `set_function`) VALUES
(1, 'Store Name', 'STORE_NAME', 'Mi moto', 'The name of my store', 1, 1, NULL, '2014-04-16 16:34:51', NULL, NULL),
(2, 'Store Owner', 'STORE_OWNER', 'Andres Chabur', 'The name of my store owner', 1, 2, NULL, '2014-04-16 16:34:51', NULL, NULL),
(3, 'E-Mail Address', 'STORE_OWNER_EMAIL_ADDRESS', 'andres_chabur@hotmail.com', 'The e-mail address of my store owner', 1, 3, NULL, '2014-04-16 16:34:51', NULL, NULL),
(4, 'E-Mail From', 'EMAIL_FROM', '"Andres Chabur" <andres_chabur@hotmail.com>', 'The e-mail address used in (sent) e-mails', 1, 4, NULL, '2014-04-16 16:34:51', NULL, NULL),
(5, 'Country', 'STORE_COUNTRY', '223', 'The country my store is located in <br /><br /><strong>Note: Please remember to update the store zone.</strong>', 1, 6, NULL, '2014-04-16 16:34:51', 'tep_get_country_name', 'tep_cfg_pull_down_country_list('),
(6, 'Zone', 'STORE_ZONE', '18', 'The zone my store is located in', 1, 7, NULL, '2014-04-16 16:34:51', 'tep_cfg_get_zone_name', 'tep_cfg_pull_down_zone_list('),
(7, 'Expected Sort Order', 'EXPECTED_PRODUCTS_SORT', 'desc', 'This is the sort order used in the expected products box.', 1, 8, NULL, '2014-04-16 16:34:51', NULL, 'tep_cfg_select_option(array(''asc'', ''desc''), '),
(8, 'Expected Sort Field', 'EXPECTED_PRODUCTS_FIELD', 'date_expected', 'The column to sort by in the expected products box.', 1, 9, NULL, '2014-04-16 16:34:51', NULL, 'tep_cfg_select_option(array(''products_name'', ''date_expected''), '),
(9, 'Switch To Default Language Currency', 'USE_DEFAULT_LANGUAGE_CURRENCY', 'false', 'Automatically switch to the language''s currency when it is changed', 1, 10, NULL, '2014-04-16 16:34:51', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(10, 'Send Extra Order Emails To', 'SEND_EXTRA_ORDER_EMAILS_TO', '', 'Send extra order emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 1, 11, NULL, '2014-04-16 16:34:51', NULL, NULL),
(11, 'Use Search-Engine Safe URLs', 'SEARCH_ENGINE_FRIENDLY_URLS', 'false', 'Use search-engine safe urls for all site links', 1, 12, NULL, '2014-04-16 16:34:51', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(12, 'Display Cart After Adding Product', 'DISPLAY_CART', 'true', 'Display the shopping cart after adding a product (or return back to their origin)', 1, 14, NULL, '2014-04-16 16:34:51', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(13, 'Allow Guest To Tell A Friend', 'ALLOW_GUEST_TO_TELL_A_FRIEND', 'false', 'Allow guests to tell a friend about a product', 1, 15, NULL, '2014-04-16 16:34:51', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(14, 'Default Search Operator', 'ADVANCED_SEARCH_DEFAULT_OPERATOR', 'and', 'Default search operators', 1, 17, NULL, '2014-04-16 16:34:51', NULL, 'tep_cfg_select_option(array(''and'', ''or''), '),
(15, 'Store Address and Phone', 'STORE_NAME_ADDRESS', 'Store Name\nAddress\nCountry\nPhone', 'This is the Store Name, Address and Phone used on printable documents and displayed online', 1, 18, NULL, '2014-04-16 16:34:51', NULL, 'tep_cfg_textarea('),
(16, 'Show Category Counts', 'SHOW_COUNTS', 'true', 'Count recursively how many products are in each category', 1, 19, NULL, '2014-04-16 16:34:51', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(17, 'Tax Decimal Places', 'TAX_DECIMAL_PLACES', '0', 'Pad the tax value this amount of decimal places', 1, 20, NULL, '2014-04-16 16:34:51', NULL, NULL),
(18, 'Display Prices with Tax', 'DISPLAY_PRICE_WITH_TAX', 'false', 'Display prices with tax included (true) or add the tax at the end (false)', 1, 21, NULL, '2014-04-16 16:34:51', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(19, 'First Name', 'ENTRY_FIRST_NAME_MIN_LENGTH', '2', 'Minimum length of first name', 2, 1, NULL, '2014-04-16 16:34:51', NULL, NULL),
(20, 'Last Name', 'ENTRY_LAST_NAME_MIN_LENGTH', '2', 'Minimum length of last name', 2, 2, NULL, '2014-04-16 16:34:51', NULL, NULL),
(21, 'Date of Birth', 'ENTRY_DOB_MIN_LENGTH', '10', 'Minimum length of date of birth', 2, 3, NULL, '2014-04-16 16:34:52', NULL, NULL),
(22, 'E-Mail Address', 'ENTRY_EMAIL_ADDRESS_MIN_LENGTH', '6', 'Minimum length of e-mail address', 2, 4, NULL, '2014-04-16 16:34:52', NULL, NULL),
(23, 'Street Address', 'ENTRY_STREET_ADDRESS_MIN_LENGTH', '5', 'Minimum length of street address', 2, 5, NULL, '2014-04-16 16:34:52', NULL, NULL),
(24, 'Company', 'ENTRY_COMPANY_MIN_LENGTH', '2', 'Minimum length of company name', 2, 6, NULL, '2014-04-16 16:34:52', NULL, NULL),
(25, 'Post Code', 'ENTRY_POSTCODE_MIN_LENGTH', '4', 'Minimum length of post code', 2, 7, NULL, '2014-04-16 16:34:52', NULL, NULL),
(26, 'City', 'ENTRY_CITY_MIN_LENGTH', '3', 'Minimum length of city', 2, 8, NULL, '2014-04-16 16:34:52', NULL, NULL),
(27, 'State', 'ENTRY_STATE_MIN_LENGTH', '2', 'Minimum length of state', 2, 9, NULL, '2014-04-16 16:34:52', NULL, NULL),
(28, 'Telephone Number', 'ENTRY_TELEPHONE_MIN_LENGTH', '3', 'Minimum length of telephone number', 2, 10, NULL, '2014-04-16 16:34:52', NULL, NULL),
(29, 'Password', 'ENTRY_PASSWORD_MIN_LENGTH', '5', 'Minimum length of password', 2, 11, NULL, '2014-04-16 16:34:52', NULL, NULL),
(30, 'Credit Card Owner Name', 'CC_OWNER_MIN_LENGTH', '3', 'Minimum length of credit card owner name', 2, 12, NULL, '2014-04-16 16:34:52', NULL, NULL),
(31, 'Credit Card Number', 'CC_NUMBER_MIN_LENGTH', '10', 'Minimum length of credit card number', 2, 13, NULL, '2014-04-16 16:34:52', NULL, NULL),
(32, 'Review Text', 'REVIEW_TEXT_MIN_LENGTH', '50', 'Minimum length of review text', 2, 14, NULL, '2014-04-16 16:34:52', NULL, NULL),
(33, 'Best Sellers', 'MIN_DISPLAY_BESTSELLERS', '1', 'Minimum number of best sellers to display', 2, 15, NULL, '2014-04-16 16:34:52', NULL, NULL),
(34, 'Also Purchased', 'MIN_DISPLAY_ALSO_PURCHASED', '1', 'Minimum number of products to display in the ''This Customer Also Purchased'' box', 2, 16, NULL, '2014-04-16 16:34:52', NULL, NULL),
(35, 'Address Book Entries', 'MAX_ADDRESS_BOOK_ENTRIES', '5', 'Maximum address book entries a customer is allowed to have', 3, 1, NULL, '2014-04-16 16:34:52', NULL, NULL),
(36, 'Search Results', 'MAX_DISPLAY_SEARCH_RESULTS', '20', 'Amount of products to list', 3, 2, NULL, '2014-04-16 16:34:52', NULL, NULL),
(37, 'Page Links', 'MAX_DISPLAY_PAGE_LINKS', '5', 'Number of ''number'' links use for page-sets', 3, 3, NULL, '2014-04-16 16:34:52', NULL, NULL),
(38, 'Special Products', 'MAX_DISPLAY_SPECIAL_PRODUCTS', '9', 'Maximum number of products on special to display', 3, 4, NULL, '2014-04-16 16:34:52', NULL, NULL),
(39, 'New Products Module', 'MAX_DISPLAY_NEW_PRODUCTS', '9', 'Maximum number of new products to display in a category', 3, 5, NULL, '2014-04-16 16:34:52', NULL, NULL),
(40, 'Products Expected', 'MAX_DISPLAY_UPCOMING_PRODUCTS', '10', 'Maximum number of products expected to display', 3, 6, NULL, '2014-04-16 16:34:52', NULL, NULL),
(41, 'Manufacturers List', 'MAX_DISPLAY_MANUFACTURERS_IN_A_LIST', '0', 'Used in manufacturers box; when the number of manufacturers exceeds this number, a drop-down list will be displayed instead of the default list', 3, 7, NULL, '2014-04-16 16:34:52', NULL, NULL),
(42, 'Manufacturers Select Size', 'MAX_MANUFACTURERS_LIST', '1', 'Used in manufacturers box; when this value is ''1'' the classic drop-down list will be used for the manufacturers box. Otherwise, a list-box with the specified number of rows will be displayed.', 3, 7, NULL, '2014-04-16 16:34:52', NULL, NULL),
(43, 'Length of Manufacturers Name', 'MAX_DISPLAY_MANUFACTURER_NAME_LEN', '15', 'Used in manufacturers box; maximum length of manufacturers name to display', 3, 8, NULL, '2014-04-16 16:34:52', NULL, NULL),
(44, 'New Reviews', 'MAX_DISPLAY_NEW_REVIEWS', '6', 'Maximum number of new reviews to display', 3, 9, NULL, '2014-04-16 16:34:52', NULL, NULL),
(45, 'Selection of Random Reviews', 'MAX_RANDOM_SELECT_REVIEWS', '10', 'How many records to select from to choose one random product review', 3, 10, NULL, '2014-04-16 16:34:52', NULL, NULL),
(46, 'Selection of Random New Products', 'MAX_RANDOM_SELECT_NEW', '10', 'How many records to select from to choose one random new product to display', 3, 11, NULL, '2014-04-16 16:34:52', NULL, NULL),
(47, 'Selection of Products on Special', 'MAX_RANDOM_SELECT_SPECIALS', '10', 'How many records to select from to choose one random product special to display', 3, 12, NULL, '2014-04-16 16:34:52', NULL, NULL),
(48, 'Categories To List Per Row', 'MAX_DISPLAY_CATEGORIES_PER_ROW', '3', 'How many categories to list per row', 3, 13, NULL, '2014-04-16 16:34:52', NULL, NULL),
(49, 'New Products Listing', 'MAX_DISPLAY_PRODUCTS_NEW', '10', 'Maximum number of new products to display in new products page', 3, 14, NULL, '2014-04-16 16:34:52', NULL, NULL),
(50, 'Best Sellers', 'MAX_DISPLAY_BESTSELLERS', '10', 'Maximum number of best sellers to display', 3, 15, NULL, '2014-04-16 16:34:53', NULL, NULL),
(51, 'Also Purchased', 'MAX_DISPLAY_ALSO_PURCHASED', '6', 'Maximum number of products to display in the ''This Customer Also Purchased'' box', 3, 16, NULL, '2014-04-16 16:34:53', NULL, NULL),
(52, 'Customer Order History Box', 'MAX_DISPLAY_PRODUCTS_IN_ORDER_HISTORY_BOX', '6', 'Maximum number of products to display in the customer order history box', 3, 17, NULL, '2014-04-16 16:34:53', NULL, NULL),
(53, 'Order History', 'MAX_DISPLAY_ORDER_HISTORY', '10', 'Maximum number of orders to display in the order history page', 3, 18, NULL, '2014-04-16 16:34:53', NULL, NULL),
(54, 'Product Quantities In Shopping Cart', 'MAX_QTY_IN_CART', '99', 'Maximum number of product quantities that can be added to the shopping cart (0 for no limit)', 3, 19, NULL, '2014-04-16 16:34:53', NULL, NULL),
(55, 'Small Image Width', 'SMALL_IMAGE_WIDTH', '100', 'The pixel width of small images', 4, 1, NULL, '2014-04-16 16:34:53', NULL, NULL),
(56, 'Small Image Height', 'SMALL_IMAGE_HEIGHT', '80', 'The pixel height of small images', 4, 2, NULL, '2014-04-16 16:34:53', NULL, NULL),
(57, 'Heading Image Width', 'HEADING_IMAGE_WIDTH', '57', 'The pixel width of heading images', 4, 3, NULL, '2014-04-16 16:34:53', NULL, NULL),
(58, 'Heading Image Height', 'HEADING_IMAGE_HEIGHT', '40', 'The pixel height of heading images', 4, 4, NULL, '2014-04-16 16:34:53', NULL, NULL),
(59, 'Subcategory Image Width', 'SUBCATEGORY_IMAGE_WIDTH', '100', 'The pixel width of subcategory images', 4, 5, NULL, '2014-04-16 16:34:53', NULL, NULL),
(60, 'Subcategory Image Height', 'SUBCATEGORY_IMAGE_HEIGHT', '57', 'The pixel height of subcategory images', 4, 6, NULL, '2014-04-16 16:34:53', NULL, NULL),
(61, 'Calculate Image Size', 'CONFIG_CALCULATE_IMAGE_SIZE', 'true', 'Calculate the size of images?', 4, 7, NULL, '2014-04-16 16:34:53', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(62, 'Image Required', 'IMAGE_REQUIRED', 'true', 'Enable to display broken images. Good for development.', 4, 8, NULL, '2014-04-16 16:34:53', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(63, 'Gender', 'ACCOUNT_GENDER', 'true', 'Display gender in the customers account', 5, 1, NULL, '2014-04-16 16:34:53', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(64, 'Date of Birth', 'ACCOUNT_DOB', 'true', 'Display date of birth in the customers account', 5, 2, NULL, '2014-04-16 16:34:53', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(65, 'Company', 'ACCOUNT_COMPANY', 'true', 'Display company in the customers account', 5, 3, NULL, '2014-04-16 16:34:53', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(66, 'Suburb', 'ACCOUNT_SUBURB', 'true', 'Display suburb in the customers account', 5, 4, NULL, '2014-04-16 16:34:53', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(67, 'State', 'ACCOUNT_STATE', 'true', 'Display state in the customers account', 5, 5, NULL, '2014-04-16 16:34:53', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(68, 'Installed Modules', 'MODULE_PAYMENT_INSTALLED', 'cod.php;paypal_express.php', 'List of payment module filenames separated by a semi-colon. This is automatically updated. No need to edit. (Example: cod.php;paypal_express.php)', 6, 0, NULL, '2014-04-16 16:34:53', NULL, NULL),
(69, 'Installed Modules', 'MODULE_ORDER_TOTAL_INSTALLED', 'ot_subtotal.php;ot_tax.php;ot_shipping.php;ot_total.php', 'List of order_total module filenames separated by a semi-colon. This is automatically updated. No need to edit. (Example: ot_subtotal.php;ot_tax.php;ot_shipping.php;ot_total.php)', 6, 0, NULL, '2014-04-16 16:34:53', NULL, NULL),
(70, 'Installed Modules', 'MODULE_SHIPPING_INSTALLED', 'flat.php', 'List of shipping module filenames separated by a semi-colon. This is automatically updated. No need to edit. (Example: ups.php;flat.php;item.php)', 6, 0, NULL, '2014-04-16 16:34:53', NULL, NULL),
(71, 'Installed Modules', 'MODULE_ACTION_RECORDER_INSTALLED', 'ar_admin_login.php;ar_contact_us.php;ar_reset_password.php;ar_tell_a_friend.php', 'List of action recorder module filenames separated by a semi-colon. This is automatically updated. No need to edit.', 6, 0, NULL, '2014-04-16 16:34:53', NULL, NULL),
(72, 'Installed Modules', 'MODULE_SOCIAL_BOOKMARKS_INSTALLED', 'sb_email.php;sb_facebook.php;sb_google_plus_share.php;sb_pinterest.php;sb_twitter.php', 'List of social bookmark module filenames separated by a semi-colon. This is automatically updated. No need to edit.', 6, 0, NULL, '2014-04-16 16:34:53', NULL, NULL),
(73, 'Enable Cash On Delivery Module', 'MODULE_PAYMENT_COD_STATUS', 'True', 'Do you want to accept Cash On Delevery payments?', 6, 1, NULL, '2014-04-16 16:34:53', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(74, 'Payment Zone', 'MODULE_PAYMENT_COD_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', 6, 2, NULL, '2014-04-16 16:34:53', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes('),
(75, 'Sort order of display.', 'MODULE_PAYMENT_COD_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:34:53', NULL, NULL),
(76, 'Set Order Status', 'MODULE_PAYMENT_COD_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', 6, 0, NULL, '2014-04-16 16:34:53', 'tep_get_order_status_name', 'tep_cfg_pull_down_order_statuses('),
(77, 'Enable Flat Shipping', 'MODULE_SHIPPING_FLAT_STATUS', 'True', 'Do you want to offer flat rate shipping?', 6, 0, NULL, '2014-04-16 16:34:53', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(78, 'Shipping Cost', 'MODULE_SHIPPING_FLAT_COST', '5.00', 'The shipping cost for all orders using this shipping method.', 6, 0, NULL, '2014-04-16 16:34:54', NULL, NULL),
(79, 'Tax Class', 'MODULE_SHIPPING_FLAT_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', 6, 0, NULL, '2014-04-16 16:34:54', 'tep_get_tax_class_title', 'tep_cfg_pull_down_tax_classes('),
(80, 'Shipping Zone', 'MODULE_SHIPPING_FLAT_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', 6, 0, NULL, '2014-04-16 16:34:54', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes('),
(81, 'Sort Order', 'MODULE_SHIPPING_FLAT_SORT_ORDER', '0', 'Sort order of display.', 6, 0, NULL, '2014-04-16 16:34:54', NULL, NULL),
(82, 'Default Currency', 'DEFAULT_CURRENCY', 'USD', 'Default Currency', 6, 0, NULL, '2014-04-16 16:34:54', NULL, NULL),
(83, 'Default Language', 'DEFAULT_LANGUAGE', 'en', 'Default Language', 6, 0, NULL, '2014-04-16 16:34:54', NULL, NULL),
(84, 'Default Order Status For New Orders', 'DEFAULT_ORDERS_STATUS_ID', '1', 'When a new order is created, this order status will be assigned to it.', 6, 0, NULL, '2014-04-16 16:34:54', NULL, NULL),
(85, 'Display Shipping', 'MODULE_ORDER_TOTAL_SHIPPING_STATUS', 'true', 'Do you want to display the order shipping cost?', 6, 1, NULL, '2014-04-16 16:34:54', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(86, 'Sort Order', 'MODULE_ORDER_TOTAL_SHIPPING_SORT_ORDER', '2', 'Sort order of display.', 6, 2, NULL, '2014-04-16 16:34:54', NULL, NULL),
(87, 'Allow Free Shipping', 'MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING', 'false', 'Do you want to allow free shipping?', 6, 3, NULL, '2014-04-16 16:34:54', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(88, 'Free Shipping For Orders Over', 'MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER', '50', 'Provide free shipping for orders over the set amount.', 6, 4, NULL, '2014-04-16 16:34:54', 'currencies->format', NULL),
(89, 'Provide Free Shipping For Orders Made', 'MODULE_ORDER_TOTAL_SHIPPING_DESTINATION', 'national', 'Provide free shipping for orders sent to the set destination.', 6, 5, NULL, '2014-04-16 16:34:54', NULL, 'tep_cfg_select_option(array(''national'', ''international'', ''both''), '),
(90, 'Display Sub-Total', 'MODULE_ORDER_TOTAL_SUBTOTAL_STATUS', 'true', 'Do you want to display the order sub-total cost?', 6, 1, NULL, '2014-04-16 16:34:54', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(91, 'Sort Order', 'MODULE_ORDER_TOTAL_SUBTOTAL_SORT_ORDER', '1', 'Sort order of display.', 6, 2, NULL, '2014-04-16 16:34:54', NULL, NULL),
(92, 'Display Tax', 'MODULE_ORDER_TOTAL_TAX_STATUS', 'true', 'Do you want to display the order tax value?', 6, 1, NULL, '2014-04-16 16:34:54', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(93, 'Sort Order', 'MODULE_ORDER_TOTAL_TAX_SORT_ORDER', '3', 'Sort order of display.', 6, 2, NULL, '2014-04-16 16:34:54', NULL, NULL),
(94, 'Display Total', 'MODULE_ORDER_TOTAL_TOTAL_STATUS', 'true', 'Do you want to display the total order value?', 6, 1, NULL, '2014-04-16 16:34:54', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(95, 'Sort Order', 'MODULE_ORDER_TOTAL_TOTAL_SORT_ORDER', '4', 'Sort order of display.', 6, 2, NULL, '2014-04-16 16:34:54', NULL, NULL),
(96, 'Minimum Minutes Per E-Mail', 'MODULE_ACTION_RECORDER_CONTACT_US_EMAIL_MINUTES', '15', 'Minimum number of minutes to allow 1 e-mail to be sent (eg, 15 for 1 e-mail every 15 minutes)', 6, 0, NULL, '2014-04-16 16:34:54', NULL, NULL),
(97, 'Minimum Minutes Per E-Mail', 'MODULE_ACTION_RECORDER_TELL_A_FRIEND_EMAIL_MINUTES', '15', 'Minimum number of minutes to allow 1 e-mail to be sent (eg, 15 for 1 e-mail every 15 minutes)', 6, 0, NULL, '2014-04-16 16:34:54', NULL, NULL),
(98, 'Allowed Minutes', 'MODULE_ACTION_RECORDER_ADMIN_LOGIN_MINUTES', '5', 'Number of minutes to allow login attempts to occur.', 6, 0, NULL, '2014-04-16 16:34:55', NULL, NULL),
(99, 'Allowed Attempts', 'MODULE_ACTION_RECORDER_ADMIN_LOGIN_ATTEMPTS', '3', 'Number of login attempts to allow within the specified period.', 6, 0, NULL, '2014-04-16 16:34:55', NULL, NULL),
(100, 'Allowed Minutes', 'MODULE_ACTION_RECORDER_RESET_PASSWORD_MINUTES', '5', 'Number of minutes to allow password resets to occur.', 6, 0, NULL, '2014-04-16 16:34:55', NULL, NULL),
(101, 'Allowed Attempts', 'MODULE_ACTION_RECORDER_RESET_PASSWORD_ATTEMPTS', '1', 'Number of password reset attempts to allow within the specified period.', 6, 0, NULL, '2014-04-16 16:34:55', NULL, NULL),
(102, 'Enable E-Mail Module', 'MODULE_SOCIAL_BOOKMARKS_EMAIL_STATUS', 'True', 'Do you want to allow products to be shared through e-mail?', 6, 1, NULL, '2014-04-16 16:34:55', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(103, 'Sort Order', 'MODULE_SOCIAL_BOOKMARKS_EMAIL_SORT_ORDER', '10', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:34:55', NULL, NULL),
(104, 'Enable Google+ Share Module', 'MODULE_SOCIAL_BOOKMARKS_GOOGLE_PLUS_SHARE_STATUS', 'True', 'Do you want to allow products to be shared through Google+?', 6, 1, NULL, '2014-04-16 16:34:55', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(105, 'Annotation', 'MODULE_SOCIAL_BOOKMARKS_GOOGLE_PLUS_SHARE_ANNOTATION', 'None', 'The annotation to display next to the button.', 6, 1, NULL, '2014-04-16 16:34:55', NULL, 'tep_cfg_select_option(array(''Inline'', ''Bubble'', ''Vertical-Bubble'', ''None''), '),
(106, 'Width', 'MODULE_SOCIAL_BOOKMARKS_GOOGLE_PLUS_SHARE_WIDTH', '', 'The maximum width of the button.', 6, 0, NULL, '2014-04-16 16:34:55', NULL, NULL),
(107, 'Height', 'MODULE_SOCIAL_BOOKMARKS_GOOGLE_PLUS_SHARE_HEIGHT', '15', 'Sets the height of the button.', 6, 1, NULL, '2014-04-16 16:34:55', NULL, 'tep_cfg_select_option(array(''15'', ''20'', ''24'', ''60''), '),
(108, 'Alignment', 'MODULE_SOCIAL_BOOKMARKS_GOOGLE_PLUS_SHARE_ALIGN', 'Left', 'The alignment of the button assets.', 6, 1, NULL, '2014-04-16 16:34:55', NULL, 'tep_cfg_select_option(array(''Left'', ''Right''), '),
(109, 'Sort Order', 'MODULE_SOCIAL_BOOKMARKS_GOOGLE_PLUS_SHARE_SORT_ORDER', '20', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:34:55', NULL, NULL),
(110, 'Enable Facebook Module', 'MODULE_SOCIAL_BOOKMARKS_FACEBOOK_STATUS', 'True', 'Do you want to allow products to be shared through Facebook?', 6, 1, NULL, '2014-04-16 16:34:55', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(111, 'Sort Order', 'MODULE_SOCIAL_BOOKMARKS_FACEBOOK_SORT_ORDER', '30', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:34:55', NULL, NULL),
(112, 'Enable Twitter Module', 'MODULE_SOCIAL_BOOKMARKS_TWITTER_STATUS', 'True', 'Do you want to allow products to be shared through Twitter?', 6, 1, NULL, '2014-04-16 16:34:55', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(113, 'Sort Order', 'MODULE_SOCIAL_BOOKMARKS_TWITTER_SORT_ORDER', '40', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:34:55', NULL, NULL),
(114, 'Enable Pinterest Module', 'MODULE_SOCIAL_BOOKMARKS_PINTEREST_STATUS', 'True', 'Do you want to allow Pinterest Button?', 6, 1, NULL, '2014-04-16 16:34:55', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(115, 'Layout Position', 'MODULE_SOCIAL_BOOKMARKS_PINTEREST_BUTTON_COUNT_POSITION', 'None', 'Horizontal or Vertical or None', 6, 2, NULL, '2014-04-16 16:34:55', NULL, 'tep_cfg_select_option(array(''Horizontal'', ''Vertical'', ''None''), '),
(116, 'Sort Order', 'MODULE_SOCIAL_BOOKMARKS_PINTEREST_SORT_ORDER', '50', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:34:55', NULL, NULL),
(117, 'Country of Origin', 'SHIPPING_ORIGIN_COUNTRY', '223', 'Select the country of origin to be used in shipping quotes.', 7, 1, NULL, '2014-04-16 16:34:55', 'tep_get_country_name', 'tep_cfg_pull_down_country_list('),
(118, 'Postal Code', 'SHIPPING_ORIGIN_ZIP', 'NONE', 'Enter the Postal Code (ZIP) of the Store to be used in shipping quotes.', 7, 2, NULL, '2014-04-16 16:34:55', NULL, NULL),
(119, 'Enter the Maximum Package Weight you will ship', 'SHIPPING_MAX_WEIGHT', '50', 'Carriers have a max weight limit for a single package. This is a common one for all.', 7, 3, NULL, '2014-04-16 16:34:55', NULL, NULL),
(120, 'Package Tare weight.', 'SHIPPING_BOX_WEIGHT', '3', 'What is the weight of typical packaging of small to medium packages?', 7, 4, NULL, '2014-04-16 16:34:55', NULL, NULL),
(121, 'Larger packages - percentage increase.', 'SHIPPING_BOX_PADDING', '10', 'For 10% enter 10', 7, 5, NULL, '2014-04-16 16:34:55', NULL, NULL),
(122, 'Display Product Image', 'PRODUCT_LIST_IMAGE', '1', 'Do you want to display the Product Image?', 8, 1, NULL, '2014-04-16 16:34:55', NULL, NULL),
(123, 'Display Product Manufacturer Name', 'PRODUCT_LIST_MANUFACTURER', '0', 'Do you want to display the Product Manufacturer Name?', 8, 2, NULL, '2014-04-16 16:34:55', NULL, NULL),
(124, 'Display Product Model', 'PRODUCT_LIST_MODEL', '0', 'Do you want to display the Product Model?', 8, 3, NULL, '2014-04-16 16:34:55', NULL, NULL),
(125, 'Display Product Name', 'PRODUCT_LIST_NAME', '2', 'Do you want to display the Product Name?', 8, 4, NULL, '2014-04-16 16:34:55', NULL, NULL),
(126, 'Display Product Price', 'PRODUCT_LIST_PRICE', '3', 'Do you want to display the Product Price', 8, 5, NULL, '2014-04-16 16:34:55', NULL, NULL),
(127, 'Display Product Quantity', 'PRODUCT_LIST_QUANTITY', '0', 'Do you want to display the Product Quantity?', 8, 6, NULL, '2014-04-16 16:34:55', NULL, NULL),
(128, 'Display Product Weight', 'PRODUCT_LIST_WEIGHT', '0', 'Do you want to display the Product Weight?', 8, 7, NULL, '2014-04-16 16:34:55', NULL, NULL),
(129, 'Display Buy Now column', 'PRODUCT_LIST_BUY_NOW', '4', 'Do you want to display the Buy Now column?', 8, 8, NULL, '2014-04-16 16:34:55', NULL, NULL),
(130, 'Display Category/Manufacturer Filter (0=disable; 1=enable)', 'PRODUCT_LIST_FILTER', '1', 'Do you want to display the Category/Manufacturer Filter?', 8, 9, NULL, '2014-04-16 16:34:55', NULL, NULL),
(131, 'Location of Prev/Next Navigation Bar (1-top, 2-bottom, 3-both)', 'PREV_NEXT_BAR_LOCATION', '2', 'Sets the location of the Prev/Next Navigation Bar (1-top, 2-bottom, 3-both)', 8, 10, NULL, '2014-04-16 16:34:55', NULL, NULL),
(132, 'Check stock level', 'STOCK_CHECK', 'true', 'Check to see if sufficent stock is available', 9, 1, NULL, '2014-04-16 16:34:55', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(133, 'Subtract stock', 'STOCK_LIMITED', 'true', 'Subtract product in stock by product orders', 9, 2, NULL, '2014-04-16 16:34:55', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(134, 'Allow Checkout', 'STOCK_ALLOW_CHECKOUT', 'true', 'Allow customer to checkout even if there is insufficient stock', 9, 3, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(135, 'Mark product out of stock', 'STOCK_MARK_PRODUCT_OUT_OF_STOCK', '***', 'Display something on screen so customer can see which product has insufficient stock', 9, 4, NULL, '2014-04-16 16:34:56', NULL, NULL),
(136, 'Stock Re-order level', 'STOCK_REORDER_LEVEL', '5', 'Define when stock needs to be re-ordered', 9, 5, NULL, '2014-04-16 16:34:56', NULL, NULL),
(137, 'Store Page Parse Time', 'STORE_PAGE_PARSE_TIME', 'false', 'Store the time it takes to parse a page', 10, 1, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(138, 'Log Destination', 'STORE_PAGE_PARSE_TIME_LOG', '/var/log/www/tep/page_parse_time.log', 'Directory and filename of the page parse time log', 10, 2, NULL, '2014-04-16 16:34:56', NULL, NULL),
(139, 'Log Date Format', 'STORE_PARSE_DATE_TIME_FORMAT', '%d/%m/%Y %H:%M:%S', 'The date format', 10, 3, NULL, '2014-04-16 16:34:56', NULL, NULL),
(140, 'Display The Page Parse Time', 'DISPLAY_PAGE_PARSE_TIME', 'true', 'Display the page parse time (store page parse time must be enabled)', 10, 4, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(141, 'Store Database Queries', 'STORE_DB_TRANSACTIONS', 'false', 'Store the database queries in the page parse time log', 10, 5, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(142, 'Use Cache', 'USE_CACHE', 'false', 'Use caching features', 11, 1, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(143, 'Cache Directory', 'DIR_FS_CACHE', '/var/www/testProyectos/mimoto/catalog/includes/work/', 'The directory where the cached files are saved', 11, 2, NULL, '2014-04-16 16:34:56', NULL, NULL),
(144, 'E-Mail Transport Method', 'EMAIL_TRANSPORT', 'sendmail', 'Defines if this server uses a local connection to sendmail or uses an SMTP connection via TCP/IP. Servers running on Windows and MacOS should change this setting to SMTP.', 12, 1, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''sendmail'', ''smtp''),'),
(145, 'E-Mail Linefeeds', 'EMAIL_LINEFEED', 'LF', 'Defines the character sequence used to separate mail headers.', 12, 2, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''LF'', ''CRLF''),'),
(146, 'Use MIME HTML When Sending Emails', 'EMAIL_USE_HTML', 'false', 'Send e-mails in HTML format', 12, 3, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''true'', ''false''),'),
(147, 'Verify E-Mail Addresses Through DNS', 'ENTRY_EMAIL_ADDRESS_CHECK', 'false', 'Verify e-mail address through a DNS server', 12, 4, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(148, 'Send E-Mails', 'SEND_EMAILS', 'true', 'Send out e-mails', 12, 5, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(149, 'Enable download', 'DOWNLOAD_ENABLED', 'false', 'Enable the products download functions.', 13, 1, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(150, 'Download by redirect', 'DOWNLOAD_BY_REDIRECT', 'false', 'Use browser redirection for download. Disable on non-Unix systems.', 13, 2, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(151, 'Expiry delay (days)', 'DOWNLOAD_MAX_DAYS', '7', 'Set number of days before the download link expires. 0 means no limit.', 13, 3, NULL, '2014-04-16 16:34:56', NULL, ''),
(152, 'Maximum number of downloads', 'DOWNLOAD_MAX_COUNT', '5', 'Set the maximum number of downloads. 0 means no download authorized.', 13, 4, NULL, '2014-04-16 16:34:56', NULL, ''),
(153, 'Enable GZip Compression', 'GZIP_COMPRESSION', 'false', 'Enable HTTP GZip compression.', 14, 1, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''true'', ''false''), '),
(154, 'Compression Level', 'GZIP_LEVEL', '5', 'Use this compression level 0-9 (0 = minimum, 9 = maximum).', 14, 2, NULL, '2014-04-16 16:34:56', NULL, NULL),
(155, 'Session Directory', 'SESSION_WRITE_DIRECTORY', '/var/www/testProyectos/mimoto/catalog/includes/work/', 'If sessions are file based, store them in this directory.', 15, 1, NULL, '2014-04-16 16:34:56', NULL, NULL),
(156, 'Force Cookie Use', 'SESSION_FORCE_COOKIE_USE', 'False', 'Force the use of sessions when cookies are only enabled.', 15, 2, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(157, 'Check SSL Session ID', 'SESSION_CHECK_SSL_SESSION_ID', 'False', 'Validate the SSL_SESSION_ID on every secure HTTPS page request.', 15, 3, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(158, 'Check User Agent', 'SESSION_CHECK_USER_AGENT', 'False', 'Validate the clients browser user agent on every page request.', 15, 4, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(159, 'Check IP Address', 'SESSION_CHECK_IP_ADDRESS', 'False', 'Validate the clients IP address on every page request.', 15, 5, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(160, 'Prevent Spider Sessions', 'SESSION_BLOCK_SPIDERS', 'True', 'Prevent known spiders from starting a session.', 15, 6, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(161, 'Recreate Session', 'SESSION_RECREATE', 'True', 'Recreate the session to generate a new session ID when the customer logs on or creates an account (PHP >=4.1 needed).', 15, 7, NULL, '2014-04-16 16:34:56', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(162, 'Last Update Check Time', 'LAST_UPDATE_CHECK_TIME', '', 'Last time a check for new versions of osCommerce was run', 6, 0, NULL, '2014-04-16 16:34:56', NULL, NULL),
(163, 'Enable PayPal Express Checkout', 'MODULE_PAYMENT_PAYPAL_EXPRESS_STATUS', 'True', 'Do you want to accept PayPal Express Checkout payments?', 6, 1, NULL, '2014-04-16 16:35:16', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(164, 'Seller Account', 'MODULE_PAYMENT_PAYPAL_EXPRESS_SELLER_ACCOUNT', 'andres_chabur@hotmail.com', 'The email address of the seller account if no API credentials has been setup.', 6, 0, NULL, '2014-04-16 16:35:16', NULL, NULL),
(165, 'API Username', 'MODULE_PAYMENT_PAYPAL_EXPRESS_API_USERNAME', '', 'The username to use for the PayPal API service', 6, 0, NULL, '2014-04-16 16:35:16', NULL, NULL),
(166, 'API Password', 'MODULE_PAYMENT_PAYPAL_EXPRESS_API_PASSWORD', '', 'The password to use for the PayPal API service', 6, 0, NULL, '2014-04-16 16:35:16', NULL, NULL),
(167, 'API Signature', 'MODULE_PAYMENT_PAYPAL_EXPRESS_API_SIGNATURE', '', 'The signature to use for the PayPal API service', 6, 0, NULL, '2014-04-16 16:35:16', NULL, NULL),
(168, 'Transaction Server', 'MODULE_PAYMENT_PAYPAL_EXPRESS_TRANSACTION_SERVER', 'Live', 'Use the live or testing (sandbox) gateway server to process transactions?', 6, 0, NULL, '2014-04-16 16:35:16', NULL, 'tep_cfg_select_option(array(''Live'', ''Sandbox''), '),
(169, 'Transaction Method', 'MODULE_PAYMENT_PAYPAL_EXPRESS_TRANSACTION_METHOD', 'Sale', 'The processing method to use for each transaction.', 6, 0, NULL, '2014-04-16 16:35:16', NULL, 'tep_cfg_select_option(array(''Authorization'', ''Sale''), '),
(170, 'PayPal Account Optional', 'MODULE_PAYMENT_PAYPAL_EXPRESS_ACCOUNT_OPTIONAL', 'False', 'This must also be enabled in your PayPal account, in Profile > Website Payment Preferences.', 6, 0, NULL, '2014-04-16 16:35:16', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(171, 'PayPal Instant Update', 'MODULE_PAYMENT_PAYPAL_EXPRESS_INSTANT_UPDATE', 'True', 'Support PayPal shipping and tax calculations on the PayPal.com site during Express Checkout.', 6, 0, NULL, '2014-04-16 16:35:16', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(172, 'PayPal Checkout Image', 'MODULE_PAYMENT_PAYPAL_EXPRESS_CHECKOUT_IMAGE', 'Static', 'Use static or dynamic Express Checkout image buttons. Dynamic images are used with PayPal campaigns.', 6, 0, NULL, '2014-04-16 16:35:16', NULL, 'tep_cfg_select_option(array(''Static'', ''Dynamic''), '),
(173, 'Debug E-Mail Address', 'MODULE_PAYMENT_PAYPAL_EXPRESS_DEBUG_EMAIL', '', 'All parameters of an invalid transaction will be sent to this email address.', 6, 0, NULL, '2014-04-16 16:35:16', NULL, NULL),
(174, 'Payment Zone', 'MODULE_PAYMENT_PAYPAL_EXPRESS_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', 6, 2, NULL, '2014-04-16 16:35:16', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes('),
(175, 'Sort order of display.', 'MODULE_PAYMENT_PAYPAL_EXPRESS_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:16', NULL, NULL),
(176, 'Set Order Status', 'MODULE_PAYMENT_PAYPAL_EXPRESS_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', 6, 0, NULL, '2014-04-16 16:35:16', 'tep_get_order_status_name', 'tep_cfg_pull_down_order_statuses('),
(177, 'PayPal Transactions Order Status Level', 'MODULE_PAYMENT_PAYPAL_EXPRESS_TRANSACTIONS_ORDER_STATUS_ID', '4', 'Include PayPal transaction information in this order status level', 6, 0, NULL, '2014-04-16 16:35:16', 'tep_get_order_status_name', 'tep_cfg_pull_down_order_statuses('),
(178, 'cURL Program Location', 'MODULE_PAYMENT_PAYPAL_EXPRESS_CURL', '/usr/bin/curl', 'The location to the cURL program application.', 6, 0, NULL, '2014-04-16 16:35:16', NULL, NULL),
(179, 'Installed Modules', 'MODULE_HEADER_TAGS_INSTALLED', 'ht_canonical.php;ht_manufacturer_title.php;ht_category_title.php;ht_product_title.php;ht_robot_noindex.php', 'List of header tag module filenames separated by a semi-colon. This is automatically updated. No need to edit.', 6, 0, NULL, '2014-04-16 16:35:16', NULL, NULL),
(180, 'Enable Category Title Module', 'MODULE_HEADER_TAGS_CATEGORY_TITLE_STATUS', 'True', 'Do you want to allow category titles to be added to the page title?', 6, 1, NULL, '2014-04-16 16:35:16', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(181, 'Sort Order', 'MODULE_HEADER_TAGS_CATEGORY_TITLE_SORT_ORDER', '200', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:17', NULL, NULL),
(182, 'Enable Manufacturer Title Module', 'MODULE_HEADER_TAGS_MANUFACTURER_TITLE_STATUS', 'True', 'Do you want to allow manufacturer titles to be added to the page title?', 6, 1, NULL, '2014-04-16 16:35:17', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(183, 'Sort Order', 'MODULE_HEADER_TAGS_MANUFACTURER_TITLE_SORT_ORDER', '100', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:17', NULL, NULL),
(184, 'Enable Product Title Module', 'MODULE_HEADER_TAGS_PRODUCT_TITLE_STATUS', 'True', 'Do you want to allow product titles to be added to the page title?', 6, 1, NULL, '2014-04-16 16:35:17', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(185, 'Sort Order', 'MODULE_HEADER_TAGS_PRODUCT_TITLE_SORT_ORDER', '300', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:17', NULL, NULL),
(186, 'Enable Canonical Module', 'MODULE_HEADER_TAGS_CANONICAL_STATUS', 'True', 'Do you want to enable the Canonical module?', 6, 1, NULL, '2014-04-16 16:35:17', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(187, 'Sort Order', 'MODULE_HEADER_TAGS_CANONICAL_SORT_ORDER', '400', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:17', NULL, NULL),
(188, 'Enable Robot NoIndex Module', 'MODULE_HEADER_TAGS_ROBOT_NOINDEX_STATUS', 'True', 'Do you want to enable the Robot NoIndex module?', 6, 1, NULL, '2014-04-16 16:35:17', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(189, 'Pages', 'MODULE_HEADER_TAGS_ROBOT_NOINDEX_PAGES', 'account.php;account_edit.php;account_history.php;account_history_info.php;account_newsletters.php;account_notifications.php;account_password.php;address_book.php;address_book_process.php;checkout_confirmation.php;checkout_payment.php;checkout_payment_address.php;checkout_process.php;checkout_shipping.php;checkout_shipping_address.php;checkout_success.php;cookie_usage.php;create_account.php;create_account_success.php;login.php;logoff.php;password_forgotten.php;password_reset.php;product_reviews_write.php;shopping_cart.php;ssl_check.php;tell_a_friend.php', 'The pages to add the meta robot noindex tag to.', 6, 0, NULL, '2014-04-16 16:35:17', 'ht_robot_noindex_show_pages', 'ht_robot_noindex_edit_pages('),
(190, 'Sort Order', 'MODULE_HEADER_TAGS_ROBOT_NOINDEX_SORT_ORDER', '500', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:17', NULL, NULL),
(191, 'Installed Modules', 'MODULE_ADMIN_DASHBOARD_INSTALLED', 'd_total_revenue.php;d_total_customers.php;d_orders.php;d_customers.php;d_admin_logins.php;d_security_checks.php;d_latest_news.php;d_latest_addons.php;d_version_check.php;d_reviews.php', 'List of Administration Tool Dashboard module filenames separated by a semi-colon. This is automatically updated. No need to edit.', 6, 0, NULL, '2014-04-16 16:35:17', NULL, NULL),
(192, 'Enable Administrator Logins Module', 'MODULE_ADMIN_DASHBOARD_ADMIN_LOGINS_STATUS', 'True', 'Do you want to show the latest administrator logins on the dashboard?', 6, 1, NULL, '2014-04-16 16:35:17', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(193, 'Sort Order', 'MODULE_ADMIN_DASHBOARD_ADMIN_LOGINS_SORT_ORDER', '500', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:17', NULL, NULL),
(194, 'Enable Customers Module', 'MODULE_ADMIN_DASHBOARD_CUSTOMERS_STATUS', 'True', 'Do you want to show the newest customers on the dashboard?', 6, 1, NULL, '2014-04-16 16:35:17', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(195, 'Sort Order', 'MODULE_ADMIN_DASHBOARD_CUSTOMERS_SORT_ORDER', '400', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:17', NULL, NULL),
(196, 'Enable Latest Add-Ons Module', 'MODULE_ADMIN_DASHBOARD_LATEST_ADDONS_STATUS', 'True', 'Do you want to show the latest osCommerce Add-Ons on the dashboard?', 6, 1, NULL, '2014-04-16 16:35:17', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(197, 'Sort Order', 'MODULE_ADMIN_DASHBOARD_LATEST_ADDONS_SORT_ORDER', '800', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:17', NULL, NULL),
(198, 'Enable Latest News Module', 'MODULE_ADMIN_DASHBOARD_LATEST_NEWS_STATUS', 'True', 'Do you want to show the latest osCommerce News on the dashboard?', 6, 1, NULL, '2014-04-16 16:35:17', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(199, 'Sort Order', 'MODULE_ADMIN_DASHBOARD_LATEST_NEWS_SORT_ORDER', '700', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:17', NULL, NULL),
(200, 'Enable Orders Module', 'MODULE_ADMIN_DASHBOARD_ORDERS_STATUS', 'True', 'Do you want to show the latest orders on the dashboard?', 6, 1, NULL, '2014-04-16 16:35:17', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(201, 'Sort Order', 'MODULE_ADMIN_DASHBOARD_ORDERS_SORT_ORDER', '300', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:17', NULL, NULL),
(202, 'Enable Security Checks Module', 'MODULE_ADMIN_DASHBOARD_SECURITY_CHECKS_STATUS', 'True', 'Do you want to run the security checks for this installation?', 6, 1, NULL, '2014-04-16 16:35:17', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(203, 'Sort Order', 'MODULE_ADMIN_DASHBOARD_SECURITY_CHECKS_SORT_ORDER', '600', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:17', NULL, NULL),
(204, 'Enable Total Customers Module', 'MODULE_ADMIN_DASHBOARD_TOTAL_CUSTOMERS_STATUS', 'True', 'Do you want to show the total customers chart on the dashboard?', 6, 1, NULL, '2014-04-16 16:35:17', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(205, 'Sort Order', 'MODULE_ADMIN_DASHBOARD_TOTAL_CUSTOMERS_SORT_ORDER', '200', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(206, 'Enable Total Revenue Module', 'MODULE_ADMIN_DASHBOARD_TOTAL_REVENUE_STATUS', 'True', 'Do you want to show the total revenue chart on the dashboard?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(207, 'Sort Order', 'MODULE_ADMIN_DASHBOARD_TOTAL_REVENUE_SORT_ORDER', '100', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(208, 'Enable Version Check Module', 'MODULE_ADMIN_DASHBOARD_VERSION_CHECK_STATUS', 'True', 'Do you want to show the version check results on the dashboard?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(209, 'Sort Order', 'MODULE_ADMIN_DASHBOARD_VERSION_CHECK_SORT_ORDER', '900', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(210, 'Enable Latest Reviews Module', 'MODULE_ADMIN_DASHBOARD_REVIEWS_STATUS', 'True', 'Do you want to show the latest reviews on the dashboard?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(211, 'Sort Order', 'MODULE_ADMIN_DASHBOARD_REVIEWS_SORT_ORDER', '1000', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(212, 'Installed Modules', 'MODULE_BOXES_INSTALLED', 'bm_categories.php;bm_manufacturers.php;bm_search.php;bm_whats_new.php;bm_information.php;bm_shopping_cart.php;bm_manufacturer_info.php;bm_order_history.php;bm_best_sellers.php;bm_product_notifications.php;bm_product_social_bookmarks.php;bm_specials.php;bm_reviews.php;bm_languages.php;bm_currencies.php', 'List of box module filenames separated by a semi-colon. This is automatically updated. No need to edit.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(213, 'Enable Best Sellers Module', 'MODULE_BOXES_BEST_SELLERS_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(214, 'Content Placement', 'MODULE_BOXES_BEST_SELLERS_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(215, 'Sort Order', 'MODULE_BOXES_BEST_SELLERS_SORT_ORDER', '5030', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(216, 'Enable Categories Module', 'MODULE_BOXES_CATEGORIES_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(217, 'Content Placement', 'MODULE_BOXES_CATEGORIES_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(218, 'Sort Order', 'MODULE_BOXES_CATEGORIES_SORT_ORDER', '1000', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(219, 'Enable Currencies Module', 'MODULE_BOXES_CURRENCIES_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(220, 'Content Placement', 'MODULE_BOXES_CURRENCIES_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(221, 'Sort Order', 'MODULE_BOXES_CURRENCIES_SORT_ORDER', '5090', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(222, 'Enable Information Module', 'MODULE_BOXES_INFORMATION_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(223, 'Content Placement', 'MODULE_BOXES_INFORMATION_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(224, 'Sort Order', 'MODULE_BOXES_INFORMATION_SORT_ORDER', '1050', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(225, 'Enable Languages Module', 'MODULE_BOXES_LANGUAGES_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(226, 'Content Placement', 'MODULE_BOXES_LANGUAGES_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(227, 'Sort Order', 'MODULE_BOXES_LANGUAGES_SORT_ORDER', '5080', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(228, 'Enable Manufacturer Info Module', 'MODULE_BOXES_MANUFACTURER_INFO_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(229, 'Content Placement', 'MODULE_BOXES_MANUFACTURER_INFO_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(230, 'Sort Order', 'MODULE_BOXES_MANUFACTURER_INFO_SORT_ORDER', '5010', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(231, 'Enable Manufacturers Module', 'MODULE_BOXES_MANUFACTURERS_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(232, 'Content Placement', 'MODULE_BOXES_MANUFACTURERS_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(233, 'Sort Order', 'MODULE_BOXES_MANUFACTURERS_SORT_ORDER', '1020', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(234, 'Enable Order History Module', 'MODULE_BOXES_ORDER_HISTORY_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(235, 'Content Placement', 'MODULE_BOXES_ORDER_HISTORY_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(236, 'Sort Order', 'MODULE_BOXES_ORDER_HISTORY_SORT_ORDER', '5020', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(237, 'Enable Product Notifications Module', 'MODULE_BOXES_PRODUCT_NOTIFICATIONS_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(238, 'Content Placement', 'MODULE_BOXES_PRODUCT_NOTIFICATIONS_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(239, 'Sort Order', 'MODULE_BOXES_PRODUCT_NOTIFICATIONS_SORT_ORDER', '5040', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:18', NULL, NULL),
(240, 'Enable Product Social Bookmarks Module', 'MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:18', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(241, 'Content Placement', 'MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:19', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(242, 'Sort Order', 'MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_SORT_ORDER', '5050', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:19', NULL, NULL),
(243, 'Enable Reviews Module', 'MODULE_BOXES_REVIEWS_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:19', NULL, 'tep_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` (`configuration_id`, `configuration_title`, `configuration_key`, `configuration_value`, `configuration_description`, `configuration_group_id`, `sort_order`, `last_modified`, `date_added`, `use_function`, `set_function`) VALUES
(244, 'Content Placement', 'MODULE_BOXES_REVIEWS_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:19', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(245, 'Sort Order', 'MODULE_BOXES_REVIEWS_SORT_ORDER', '5070', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:19', NULL, NULL),
(246, 'Enable Search Module', 'MODULE_BOXES_SEARCH_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:19', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(247, 'Content Placement', 'MODULE_BOXES_SEARCH_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:19', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(248, 'Sort Order', 'MODULE_BOXES_SEARCH_SORT_ORDER', '1030', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:19', NULL, NULL),
(249, 'Enable Shopping Cart Module', 'MODULE_BOXES_SHOPPING_CART_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:19', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(250, 'Content Placement', 'MODULE_BOXES_SHOPPING_CART_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:19', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(251, 'Sort Order', 'MODULE_BOXES_SHOPPING_CART_SORT_ORDER', '5000', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:19', NULL, NULL),
(252, 'Enable Specials Module', 'MODULE_BOXES_SPECIALS_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:19', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(253, 'Content Placement', 'MODULE_BOXES_SPECIALS_CONTENT_PLACEMENT', 'Right Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:19', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(254, 'Sort Order', 'MODULE_BOXES_SPECIALS_SORT_ORDER', '5060', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:19', NULL, NULL),
(255, 'Enable What''s New Module', 'MODULE_BOXES_WHATS_NEW_STATUS', 'True', 'Do you want to add the module to your shop?', 6, 1, NULL, '2014-04-16 16:35:19', NULL, 'tep_cfg_select_option(array(''True'', ''False''), '),
(256, 'Content Placement', 'MODULE_BOXES_WHATS_NEW_CONTENT_PLACEMENT', 'Left Column', 'Should the module be loaded in the left or right column?', 6, 1, NULL, '2014-04-16 16:35:19', NULL, 'tep_cfg_select_option(array(''Left Column'', ''Right Column''), '),
(257, 'Sort Order', 'MODULE_BOXES_WHATS_NEW_SORT_ORDER', '1040', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2014-04-16 16:35:19', NULL, NULL),
(258, 'Installed Template Block Groups', 'TEMPLATE_BLOCK_GROUPS', 'boxes;header_tags', 'This is automatically updated. No need to edit.', 6, 0, NULL, '2014-04-16 16:35:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configuration_group`
--

CREATE TABLE IF NOT EXISTS `configuration_group` (
  `configuration_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `configuration_group_title` varchar(64) NOT NULL,
  `configuration_group_description` varchar(255) NOT NULL,
  `sort_order` int(5) DEFAULT NULL,
  `visible` int(1) DEFAULT '1',
  PRIMARY KEY (`configuration_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `configuration_group`
--

INSERT INTO `configuration_group` (`configuration_group_id`, `configuration_group_title`, `configuration_group_description`, `sort_order`, `visible`) VALUES
(1, 'My Store', 'General information about my store', 1, 1),
(2, 'Minimum Values', 'The minimum values for functions / data', 2, 1),
(3, 'Maximum Values', 'The maximum values for functions / data', 3, 1),
(4, 'Images', 'Image parameters', 4, 1),
(5, 'Customer Details', 'Customer account configuration', 5, 1),
(6, 'Module Options', 'Hidden from configuration', 6, 0),
(7, 'Shipping/Packaging', 'Shipping options available at my store', 7, 1),
(8, 'Product Listing', 'Product Listing    configuration options', 8, 1),
(9, 'Stock', 'Stock configuration options', 9, 1),
(10, 'Logging', 'Logging configuration options', 10, 1),
(11, 'Cache', 'Caching configuration options', 11, 1),
(12, 'E-Mail Options', 'General setting for E-Mail transport and HTML E-Mails', 12, 1),
(13, 'Download', 'Downloadable products options', 13, 1),
(14, 'GZip Compression', 'GZip compression options', 14, 1),
(15, 'Sessions', 'Session options', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE IF NOT EXISTS `counter` (
  `startdate` char(8) DEFAULT NULL,
  `counter` int(12) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`startdate`, `counter`, `id`) VALUES
('20140502', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `counter_history`
--

CREATE TABLE IF NOT EXISTS `counter_history` (
  `month` char(8) DEFAULT NULL,
  `counter` int(12) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `countries_id` int(11) NOT NULL AUTO_INCREMENT,
  `countries_name` varchar(255) NOT NULL,
  `countries_iso_code_2` char(2) NOT NULL,
  `countries_iso_code_3` char(3) NOT NULL,
  `address_format_id` int(11) NOT NULL,
  PRIMARY KEY (`countries_id`),
  KEY `IDX_COUNTRIES_NAME` (`countries_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countries_id`, `countries_name`, `countries_iso_code_2`, `countries_iso_code_3`, `address_format_id`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 1),
(2, 'Albania', 'AL', 'ALB', 1),
(3, 'Algeria', 'DZ', 'DZA', 1),
(4, 'American Samoa', 'AS', 'ASM', 1),
(5, 'Andorra', 'AD', 'AND', 1),
(6, 'Angola', 'AO', 'AGO', 1),
(7, 'Anguilla', 'AI', 'AIA', 1),
(8, 'Antarctica', 'AQ', 'ATA', 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1),
(10, 'Argentina', 'AR', 'ARG', 1),
(11, 'Armenia', 'AM', 'ARM', 1),
(12, 'Aruba', 'AW', 'ABW', 1),
(13, 'Australia', 'AU', 'AUS', 1),
(14, 'Austria', 'AT', 'AUT', 5),
(15, 'Azerbaijan', 'AZ', 'AZE', 1),
(16, 'Bahamas', 'BS', 'BHS', 1),
(17, 'Bahrain', 'BH', 'BHR', 1),
(18, 'Bangladesh', 'BD', 'BGD', 1),
(19, 'Barbados', 'BB', 'BRB', 1),
(20, 'Belarus', 'BY', 'BLR', 1),
(21, 'Belgium', 'BE', 'BEL', 1),
(22, 'Belize', 'BZ', 'BLZ', 1),
(23, 'Benin', 'BJ', 'BEN', 1),
(24, 'Bermuda', 'BM', 'BMU', 1),
(25, 'Bhutan', 'BT', 'BTN', 1),
(26, 'Bolivia', 'BO', 'BOL', 1),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', 1),
(28, 'Botswana', 'BW', 'BWA', 1),
(29, 'Bouvet Island', 'BV', 'BVT', 1),
(30, 'Brazil', 'BR', 'BRA', 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1),
(33, 'Bulgaria', 'BG', 'BGR', 1),
(34, 'Burkina Faso', 'BF', 'BFA', 1),
(35, 'Burundi', 'BI', 'BDI', 1),
(36, 'Cambodia', 'KH', 'KHM', 1),
(37, 'Cameroon', 'CM', 'CMR', 1),
(38, 'Canada', 'CA', 'CAN', 1),
(39, 'Cape Verde', 'CV', 'CPV', 1),
(40, 'Cayman Islands', 'KY', 'CYM', 1),
(41, 'Central African Republic', 'CF', 'CAF', 1),
(42, 'Chad', 'TD', 'TCD', 1),
(43, 'Chile', 'CL', 'CHL', 1),
(44, 'China', 'CN', 'CHN', 1),
(45, 'Christmas Island', 'CX', 'CXR', 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1),
(47, 'Colombia', 'CO', 'COL', 1),
(48, 'Comoros', 'KM', 'COM', 1),
(49, 'Congo', 'CG', 'COG', 1),
(50, 'Cook Islands', 'CK', 'COK', 1),
(51, 'Costa Rica', 'CR', 'CRI', 1),
(52, 'Cote D''Ivoire', 'CI', 'CIV', 1),
(53, 'Croatia', 'HR', 'HRV', 1),
(54, 'Cuba', 'CU', 'CUB', 1),
(55, 'Cyprus', 'CY', 'CYP', 1),
(56, 'Czech Republic', 'CZ', 'CZE', 1),
(57, 'Denmark', 'DK', 'DNK', 1),
(58, 'Djibouti', 'DJ', 'DJI', 1),
(59, 'Dominica', 'DM', 'DMA', 1),
(60, 'Dominican Republic', 'DO', 'DOM', 1),
(61, 'East Timor', 'TP', 'TMP', 1),
(62, 'Ecuador', 'EC', 'ECU', 1),
(63, 'Egypt', 'EG', 'EGY', 1),
(64, 'El Salvador', 'SV', 'SLV', 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1),
(66, 'Eritrea', 'ER', 'ERI', 1),
(67, 'Estonia', 'EE', 'EST', 1),
(68, 'Ethiopia', 'ET', 'ETH', 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1),
(70, 'Faroe Islands', 'FO', 'FRO', 1),
(71, 'Fiji', 'FJ', 'FJI', 1),
(72, 'Finland', 'FI', 'FIN', 1),
(73, 'France', 'FR', 'FRA', 1),
(74, 'France, Metropolitan', 'FX', 'FXX', 1),
(75, 'French Guiana', 'GF', 'GUF', 1),
(76, 'French Polynesia', 'PF', 'PYF', 1),
(77, 'French Southern Territories', 'TF', 'ATF', 1),
(78, 'Gabon', 'GA', 'GAB', 1),
(79, 'Gambia', 'GM', 'GMB', 1),
(80, 'Georgia', 'GE', 'GEO', 1),
(81, 'Germany', 'DE', 'DEU', 5),
(82, 'Ghana', 'GH', 'GHA', 1),
(83, 'Gibraltar', 'GI', 'GIB', 1),
(84, 'Greece', 'GR', 'GRC', 1),
(85, 'Greenland', 'GL', 'GRL', 1),
(86, 'Grenada', 'GD', 'GRD', 1),
(87, 'Guadeloupe', 'GP', 'GLP', 1),
(88, 'Guam', 'GU', 'GUM', 1),
(89, 'Guatemala', 'GT', 'GTM', 1),
(90, 'Guinea', 'GN', 'GIN', 1),
(91, 'Guinea-bissau', 'GW', 'GNB', 1),
(92, 'Guyana', 'GY', 'GUY', 1),
(93, 'Haiti', 'HT', 'HTI', 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1),
(95, 'Honduras', 'HN', 'HND', 1),
(96, 'Hong Kong', 'HK', 'HKG', 1),
(97, 'Hungary', 'HU', 'HUN', 1),
(98, 'Iceland', 'IS', 'ISL', 1),
(99, 'India', 'IN', 'IND', 1),
(100, 'Indonesia', 'ID', 'IDN', 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1),
(102, 'Iraq', 'IQ', 'IRQ', 1),
(103, 'Ireland', 'IE', 'IRL', 1),
(104, 'Israel', 'IL', 'ISR', 1),
(105, 'Italy', 'IT', 'ITA', 1),
(106, 'Jamaica', 'JM', 'JAM', 1),
(107, 'Japan', 'JP', 'JPN', 1),
(108, 'Jordan', 'JO', 'JOR', 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1),
(110, 'Kenya', 'KE', 'KEN', 1),
(111, 'Kiribati', 'KI', 'KIR', 1),
(112, 'Korea, Democratic People''s Republic of', 'KP', 'PRK', 1),
(113, 'Korea, Republic of', 'KR', 'KOR', 1),
(114, 'Kuwait', 'KW', 'KWT', 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO', 1),
(117, 'Latvia', 'LV', 'LVA', 1),
(118, 'Lebanon', 'LB', 'LBN', 1),
(119, 'Lesotho', 'LS', 'LSO', 1),
(120, 'Liberia', 'LR', 'LBR', 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1),
(122, 'Liechtenstein', 'LI', 'LIE', 1),
(123, 'Lithuania', 'LT', 'LTU', 1),
(124, 'Luxembourg', 'LU', 'LUX', 1),
(125, 'Macau', 'MO', 'MAC', 1),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD', 1),
(127, 'Madagascar', 'MG', 'MDG', 1),
(128, 'Malawi', 'MW', 'MWI', 1),
(129, 'Malaysia', 'MY', 'MYS', 1),
(130, 'Maldives', 'MV', 'MDV', 1),
(131, 'Mali', 'ML', 'MLI', 1),
(132, 'Malta', 'MT', 'MLT', 1),
(133, 'Marshall Islands', 'MH', 'MHL', 1),
(134, 'Martinique', 'MQ', 'MTQ', 1),
(135, 'Mauritania', 'MR', 'MRT', 1),
(136, 'Mauritius', 'MU', 'MUS', 1),
(137, 'Mayotte', 'YT', 'MYT', 1),
(138, 'Mexico', 'MX', 'MEX', 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', 1),
(141, 'Monaco', 'MC', 'MCO', 1),
(142, 'Mongolia', 'MN', 'MNG', 1),
(143, 'Montserrat', 'MS', 'MSR', 1),
(144, 'Morocco', 'MA', 'MAR', 1),
(145, 'Mozambique', 'MZ', 'MOZ', 1),
(146, 'Myanmar', 'MM', 'MMR', 1),
(147, 'Namibia', 'NA', 'NAM', 1),
(148, 'Nauru', 'NR', 'NRU', 1),
(149, 'Nepal', 'NP', 'NPL', 1),
(150, 'Netherlands', 'NL', 'NLD', 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1),
(152, 'New Caledonia', 'NC', 'NCL', 1),
(153, 'New Zealand', 'NZ', 'NZL', 1),
(154, 'Nicaragua', 'NI', 'NIC', 1),
(155, 'Niger', 'NE', 'NER', 1),
(156, 'Nigeria', 'NG', 'NGA', 1),
(157, 'Niue', 'NU', 'NIU', 1),
(158, 'Norfolk Island', 'NF', 'NFK', 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1),
(160, 'Norway', 'NO', 'NOR', 1),
(161, 'Oman', 'OM', 'OMN', 1),
(162, 'Pakistan', 'PK', 'PAK', 1),
(163, 'Palau', 'PW', 'PLW', 1),
(164, 'Panama', 'PA', 'PAN', 1),
(165, 'Papua New Guinea', 'PG', 'PNG', 1),
(166, 'Paraguay', 'PY', 'PRY', 1),
(167, 'Peru', 'PE', 'PER', 1),
(168, 'Philippines', 'PH', 'PHL', 1),
(169, 'Pitcairn', 'PN', 'PCN', 1),
(170, 'Poland', 'PL', 'POL', 1),
(171, 'Portugal', 'PT', 'PRT', 1),
(172, 'Puerto Rico', 'PR', 'PRI', 1),
(173, 'Qatar', 'QA', 'QAT', 1),
(174, 'Reunion', 'RE', 'REU', 1),
(175, 'Romania', 'RO', 'ROM', 1),
(176, 'Russian Federation', 'RU', 'RUS', 1),
(177, 'Rwanda', 'RW', 'RWA', 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1),
(179, 'Saint Lucia', 'LC', 'LCA', 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1),
(181, 'Samoa', 'WS', 'WSM', 1),
(182, 'San Marino', 'SM', 'SMR', 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1),
(184, 'Saudi Arabia', 'SA', 'SAU', 1),
(185, 'Senegal', 'SN', 'SEN', 1),
(186, 'Seychelles', 'SC', 'SYC', 1),
(187, 'Sierra Leone', 'SL', 'SLE', 1),
(188, 'Singapore', 'SG', 'SGP', 4),
(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 1),
(190, 'Slovenia', 'SI', 'SVN', 1),
(191, 'Solomon Islands', 'SB', 'SLB', 1),
(192, 'Somalia', 'SO', 'SOM', 1),
(193, 'South Africa', 'ZA', 'ZAF', 1),
(194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 1),
(195, 'Spain', 'ES', 'ESP', 3),
(196, 'Sri Lanka', 'LK', 'LKA', 1),
(197, 'St. Helena', 'SH', 'SHN', 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1),
(199, 'Sudan', 'SD', 'SDN', 1),
(200, 'Suriname', 'SR', 'SUR', 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1),
(202, 'Swaziland', 'SZ', 'SWZ', 1),
(203, 'Sweden', 'SE', 'SWE', 1),
(204, 'Switzerland', 'CH', 'CHE', 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1),
(206, 'Taiwan', 'TW', 'TWN', 1),
(207, 'Tajikistan', 'TJ', 'TJK', 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1),
(209, 'Thailand', 'TH', 'THA', 1),
(210, 'Togo', 'TG', 'TGO', 1),
(211, 'Tokelau', 'TK', 'TKL', 1),
(212, 'Tonga', 'TO', 'TON', 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1),
(214, 'Tunisia', 'TN', 'TUN', 1),
(215, 'Turkey', 'TR', 'TUR', 1),
(216, 'Turkmenistan', 'TM', 'TKM', 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 1),
(218, 'Tuvalu', 'TV', 'TUV', 1),
(219, 'Uganda', 'UG', 'UGA', 1),
(220, 'Ukraine', 'UA', 'UKR', 1),
(221, 'United Arab Emirates', 'AE', 'ARE', 1),
(222, 'United Kingdom', 'GB', 'GBR', 1),
(223, 'United States', 'US', 'USA', 2),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1),
(225, 'Uruguay', 'UY', 'URY', 1),
(226, 'Uzbekistan', 'UZ', 'UZB', 1),
(227, 'Vanuatu', 'VU', 'VUT', 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1),
(229, 'Venezuela', 'VE', 'VEN', 1),
(230, 'Viet Nam', 'VN', 'VNM', 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1),
(234, 'Western Sahara', 'EH', 'ESH', 1),
(235, 'Yemen', 'YE', 'YEM', 1),
(236, 'Yugoslavia', 'YU', 'YUG', 1),
(237, 'Zaire', 'ZR', 'ZAR', 1),
(238, 'Zambia', 'ZM', 'ZMB', 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `currencies_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `code` char(3) NOT NULL,
  `symbol_left` varchar(12) DEFAULT NULL,
  `symbol_right` varchar(12) DEFAULT NULL,
  `decimal_point` char(1) DEFAULT NULL,
  `thousands_point` char(1) DEFAULT NULL,
  `decimal_places` char(1) DEFAULT NULL,
  `value` float(13,8) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`currencies_id`),
  KEY `idx_currencies_code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currencies_id`, `title`, `code`, `symbol_left`, `symbol_right`, `decimal_point`, `thousands_point`, `decimal_places`, `value`, `last_updated`) VALUES
(1, 'U.S. Dollar', 'USD', '$', '', '.', ',', '2', 1.00000000, '2014-04-16 16:35:04'),
(2, 'Euro', 'EUR', '', 'â‚¬', '.', ',', '2', 1.00000000, '2014-04-16 16:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customers_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_gender` char(1) DEFAULT NULL,
  `customers_firstname` varchar(255) NOT NULL,
  `customers_lastname` varchar(255) NOT NULL,
  `customers_dob` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `customers_email_address` varchar(255) NOT NULL,
  `customers_default_address_id` int(11) DEFAULT NULL,
  `customers_telephone` varchar(255) NOT NULL,
  `customers_fax` varchar(255) DEFAULT NULL,
  `customers_password` varchar(60) NOT NULL,
  `customers_newsletter` char(1) DEFAULT NULL,
  PRIMARY KEY (`customers_id`),
  KEY `idx_customers_email_address` (`customers_email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers_basket`
--

CREATE TABLE IF NOT EXISTS `customers_basket` (
  `customers_basket_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL,
  `products_id` tinytext NOT NULL,
  `customers_basket_quantity` int(2) NOT NULL,
  `final_price` decimal(15,4) DEFAULT NULL,
  `customers_basket_date_added` char(8) DEFAULT NULL,
  PRIMARY KEY (`customers_basket_id`),
  KEY `idx_customers_basket_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers_basket_attributes`
--

CREATE TABLE IF NOT EXISTS `customers_basket_attributes` (
  `customers_basket_attributes_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL,
  `products_id` tinytext NOT NULL,
  `products_options_id` int(11) NOT NULL,
  `products_options_value_id` int(11) NOT NULL,
  PRIMARY KEY (`customers_basket_attributes_id`),
  KEY `idx_customers_basket_att_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers_info`
--

CREATE TABLE IF NOT EXISTS `customers_info` (
  `customers_info_id` int(11) NOT NULL,
  `customers_info_date_of_last_logon` datetime DEFAULT NULL,
  `customers_info_number_of_logons` int(5) DEFAULT NULL,
  `customers_info_date_account_created` datetime DEFAULT NULL,
  `customers_info_date_account_last_modified` datetime DEFAULT NULL,
  `global_product_notifications` int(1) DEFAULT '0',
  `password_reset_key` char(40) DEFAULT NULL,
  `password_reset_date` datetime DEFAULT NULL,
  PRIMARY KEY (`customers_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `pais_id` int(11) DEFAULT NULL,
  `departamento_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id`, `descripcion`, `pais_id`, `departamento_id`) VALUES
(5, 'ANTIOQUIA                     ', 1, 5),
(8, 'ATLANTICO                     ', 1, 8),
(11, 'SANTAFE DE BOGOTA             ', 1, 11),
(13, 'BOLIVAR                       ', 1, 13),
(15, 'BOYACA                        ', 1, 15),
(17, 'CALDAS                        ', 1, 17),
(18, 'CAQUETA                       ', 1, 18),
(19, 'CAUCA                         ', 1, 19),
(20, 'CESAR                         ', 1, 20),
(23, 'CORDOBA                       ', 1, 23),
(25, 'CUNDINAMARCA                  ', 1, 25),
(27, 'CHOCO                         ', 1, 27),
(41, 'HUILA                         ', 1, 41),
(44, 'LA GUAJIRA                    ', 1, 44),
(47, 'MAGDALENA                     ', 1, 47),
(50, 'META                          ', 1, 50),
(52, 'NARIÑO', 1, 52),
(54, 'NORTE DE SANTANDER            ', 1, 54),
(63, 'QUINDIO                       ', 1, 63),
(66, 'RISARALDA                     ', 1, 66),
(68, 'SANTANDER                     ', 1, 68),
(70, 'SUCRE                         ', 1, 70),
(73, 'TOLIMA                        ', 1, 73),
(76, 'VALLE DEL CAUCA               ', 1, 76),
(81, 'ARAUCA                        ', 1, 81),
(85, 'CASANARE                      ', 1, 85),
(86, 'PUTUMAYO                      ', 1, 86),
(88, 'ARCHIPIELAGO DE SAN ANDRES    ', 1, 88),
(91, 'AMAZONAS                      ', 1, 91),
(94, 'GUAINIA                       ', 1, 94),
(95, 'GUAVIARE                      ', 1, 95),
(97, 'VAUPES                        ', 1, 97),
(99, 'VICHADA                       ', 1, 99);

-- --------------------------------------------------------

--
-- Table structure for table `geo_zones`
--

CREATE TABLE IF NOT EXISTS `geo_zones` (
  `geo_zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `geo_zone_name` varchar(32) NOT NULL,
  `geo_zone_description` varchar(255) NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`geo_zone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `geo_zones`
--

INSERT INTO `geo_zones` (`geo_zone_id`, `geo_zone_name`, `geo_zone_description`, `last_modified`, `date_added`) VALUES
(1, 'Florida', 'Florida local sales tax zone', NULL, '2014-04-16 16:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `languages_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `code` char(2) NOT NULL,
  `image` varchar(64) DEFAULT NULL,
  `directory` varchar(32) DEFAULT NULL,
  `sort_order` int(3) DEFAULT NULL,
  PRIMARY KEY (`languages_id`),
  KEY `IDX_LANGUAGES_NAME` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`languages_id`, `name`, `code`, `image`, `directory`, `sort_order`) VALUES
(1, 'English', 'en', 'icon.gif', 'english', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE IF NOT EXISTS `manufacturers` (
  `manufacturers_id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturers_name` varchar(32) NOT NULL,
  `manufacturers_image` varchar(64) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY (`manufacturers_id`),
  KEY `IDX_MANUFACTURERS_NAME` (`manufacturers_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturers_id`, `manufacturers_name`, `manufacturers_image`, `date_added`, `last_modified`, `estado`) VALUES
(11, 'Honda', 'honda.jpg', '2014-04-25 00:00:00', NULL, 'A'),
(12, 'Suzuki', 'suzuki.jpg', '2014-04-25 00:00:00', NULL, 'A'),
(13, 'Yamaha', 'yamaha.jpg', '2014-04-25 00:00:00', NULL, 'A'),
(14, 'AKT', 'akt.jpg', '2014-04-25 00:00:00', NULL, 'A'),
(15, 'Auteco', 'auteco.jpg', '2014-04-25 00:00:00', NULL, 'A'),
(16, 'Kawasaki', 'kawasaki.jpg', '2014-04-25 00:00:00', NULL, 'A'),
(17, 'Ayco', 'ayco.jpg', '2014-04-25 00:00:00', NULL, 'A'),
(18, 'KTM', 'ktm.jpg', '2014-04-25 00:00:00', NULL, 'A'),
(19, 'Jialing', 'jialing.jpg', '2014-04-25 00:00:00', NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers_info`
--

CREATE TABLE IF NOT EXISTS `manufacturers_info` (
  `manufacturers_id` int(11) NOT NULL,
  `languages_id` int(11) NOT NULL,
  `manufacturers_url` varchar(255) NOT NULL,
  `url_clicked` int(5) NOT NULL DEFAULT '0',
  `date_last_click` datetime DEFAULT NULL,
  PRIMARY KEY (`manufacturers_id`,`languages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers_info`
--

INSERT INTO `manufacturers_info` (`manufacturers_id`, `languages_id`, `manufacturers_url`, `url_clicked`, `date_last_click`) VALUES
(1, 1, 'http://www.matrox.com', 0, NULL),
(2, 1, 'http://www.microsoft.com', 0, NULL),
(3, 1, 'http://www.warner.com', 0, NULL),
(4, 1, 'http://www.fox.com', 0, NULL),
(5, 1, 'http://www.logitech.com', 0, NULL),
(6, 1, 'http://www.canon.com', 0, NULL),
(7, 1, 'http://www.sierra.com', 0, NULL),
(8, 1, 'http://www.infogrames.com', 0, NULL),
(9, 1, 'http://www.hewlettpackard.com', 0, NULL),
(10, 1, 'http://www.samsung.com', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `newsletters_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `module` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_sent` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `locked` int(1) DEFAULT '0',
  PRIMARY KEY (`newsletters_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orders_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL,
  `customers_name` varchar(255) NOT NULL,
  `customers_company` varchar(255) DEFAULT NULL,
  `customers_street_address` varchar(255) NOT NULL,
  `customers_suburb` varchar(255) DEFAULT NULL,
  `customers_city` varchar(255) NOT NULL,
  `customers_postcode` varchar(255) NOT NULL,
  `customers_state` varchar(255) DEFAULT NULL,
  `customers_country` varchar(255) NOT NULL,
  `customers_telephone` varchar(255) NOT NULL,
  `customers_email_address` varchar(255) NOT NULL,
  `customers_address_format_id` int(5) NOT NULL,
  `delivery_name` varchar(255) NOT NULL,
  `delivery_company` varchar(255) DEFAULT NULL,
  `delivery_street_address` varchar(255) NOT NULL,
  `delivery_suburb` varchar(255) DEFAULT NULL,
  `delivery_city` varchar(255) NOT NULL,
  `delivery_postcode` varchar(255) NOT NULL,
  `delivery_state` varchar(255) DEFAULT NULL,
  `delivery_country` varchar(255) NOT NULL,
  `delivery_address_format_id` int(5) NOT NULL,
  `billing_name` varchar(255) NOT NULL,
  `billing_company` varchar(255) DEFAULT NULL,
  `billing_street_address` varchar(255) NOT NULL,
  `billing_suburb` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_postcode` varchar(255) NOT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_country` varchar(255) NOT NULL,
  `billing_address_format_id` int(5) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `cc_type` varchar(20) DEFAULT NULL,
  `cc_owner` varchar(255) DEFAULT NULL,
  `cc_number` varchar(32) DEFAULT NULL,
  `cc_expires` varchar(4) DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_purchased` datetime DEFAULT NULL,
  `orders_status` int(5) NOT NULL,
  `orders_date_finished` datetime DEFAULT NULL,
  `currency` char(3) DEFAULT NULL,
  `currency_value` decimal(14,6) DEFAULT NULL,
  PRIMARY KEY (`orders_id`),
  KEY `idx_orders_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
  `orders_products_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `products_model` varchar(12) DEFAULT NULL,
  `products_name` varchar(64) NOT NULL,
  `products_price` decimal(15,4) NOT NULL,
  `final_price` decimal(15,4) NOT NULL,
  `products_tax` decimal(7,4) NOT NULL,
  `products_quantity` int(2) NOT NULL,
  PRIMARY KEY (`orders_products_id`),
  KEY `idx_orders_products_orders_id` (`orders_id`),
  KEY `idx_orders_products_products_id` (`products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products_attributes`
--

CREATE TABLE IF NOT EXISTS `orders_products_attributes` (
  `orders_products_attributes_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `orders_products_id` int(11) NOT NULL,
  `products_options` varchar(32) NOT NULL,
  `products_options_values` varchar(32) NOT NULL,
  `options_values_price` decimal(15,4) NOT NULL,
  `price_prefix` char(1) NOT NULL,
  PRIMARY KEY (`orders_products_attributes_id`),
  KEY `idx_orders_products_att_orders_id` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products_download`
--

CREATE TABLE IF NOT EXISTS `orders_products_download` (
  `orders_products_download_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL DEFAULT '0',
  `orders_products_id` int(11) NOT NULL DEFAULT '0',
  `orders_products_filename` varchar(255) NOT NULL DEFAULT '',
  `download_maxdays` int(2) NOT NULL DEFAULT '0',
  `download_count` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orders_products_download_id`),
  KEY `idx_orders_products_download_orders_id` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE IF NOT EXISTS `orders_status` (
  `orders_status_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `orders_status_name` varchar(32) NOT NULL,
  `public_flag` int(11) DEFAULT '1',
  `downloads_flag` int(11) DEFAULT '0',
  PRIMARY KEY (`orders_status_id`,`language_id`),
  KEY `idx_orders_status_name` (`orders_status_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_status`
--

INSERT INTO `orders_status` (`orders_status_id`, `language_id`, `orders_status_name`, `public_flag`, `downloads_flag`) VALUES
(1, 1, 'Pending', 1, 0),
(2, 1, 'Processing', 1, 1),
(3, 1, 'Delivered', 1, 1),
(4, 1, 'PayPal [Transactions]', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_status_history`
--

CREATE TABLE IF NOT EXISTS `orders_status_history` (
  `orders_status_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `orders_status_id` int(5) NOT NULL,
  `date_added` datetime NOT NULL,
  `customer_notified` int(1) DEFAULT '0',
  `comments` text,
  PRIMARY KEY (`orders_status_history_id`),
  KEY `idx_orders_status_history_orders_id` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_total`
--

CREATE TABLE IF NOT EXISTS `orders_total` (
  `orders_total_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `value` decimal(15,4) NOT NULL,
  `class` varchar(32) NOT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`orders_total_id`),
  KEY `idx_orders_total_orders_id` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pais`
--

INSERT INTO `pais` (`id`, `descripcion`) VALUES
(1, 'Colombia'),
(2, 'Venezuela');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_quantity` int(6) NOT NULL,
  `products_model` varchar(12) DEFAULT NULL,
  `products_image` varchar(64) DEFAULT NULL,
  `products_price` decimal(15,4) NOT NULL,
  `products_date_added` datetime NOT NULL,
  `products_last_modified` datetime DEFAULT NULL,
  `products_date_available` datetime DEFAULT NULL,
  `products_weight` decimal(5,2) DEFAULT NULL,
  `products_status` tinyint(1) NOT NULL,
  `products_tax_class_id` int(11) DEFAULT NULL,
  `manufacturers_id` int(11) DEFAULT NULL,
  `products_ordered` int(11) NOT NULL DEFAULT '0',
  `cilindraje_id` int(11) DEFAULT NULL,
  `placa` varchar(6) NOT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `color_id` int(11) NOT NULL,
  `negociable` varchar(2) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `products_file_image` blob NOT NULL,
  `path` varchar(255) NOT NULL,
  `anio` int(11) NOT NULL,
  `tipo_producto_id` int(11) NOT NULL,
  `ciudad_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `pais_id` int(11) NOT NULL,
  PRIMARY KEY (`products_id`),
  KEY `idx_products_model` (`products_model`),
  KEY `idx_products_date_added` (`products_date_added`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `products_quantity`, `products_model`, `products_image`, `products_price`, `products_date_added`, `products_last_modified`, `products_date_available`, `products_weight`, `products_status`, `products_tax_class_id`, `manufacturers_id`, `products_ordered`, `cilindraje_id`, `placa`, `observacion`, `color_id`, `negociable`, `usuario_id`, `products_file_image`, `path`, `anio`, `tipo_producto_id`, `ciudad_id`, `departamento_id`, `pais_id`) VALUES
(47, 50000, '2008', 'IMG-20140120-WA0000.jpg', 1400000.0000, '2014-05-08 14:22:33', '2014-05-08 14:22:33', '2014-05-08 14:22:33', NULL, 1, NULL, 11, 0, 2, 'VBZ54A', 'xx', 1, 'SI', 1, '', 'IMG-20140120-WA0000.jpg', 2010, 0, 0, 0, 0),
(48, 50000, '2008', 'IMG-20140219-WA0002.jpg', 2400000.0000, '2014-05-08 14:27:30', '2014-05-08 14:27:30', '2014-05-08 14:27:30', NULL, 1, NULL, 11, 0, 1, 'VBZ54A', 'xxx', 2, 'NO', 1, '', 'IMG-20140219-WA0002.jpg', 2010, 0, 0, 0, 0),
(50, 123456, '1999', '2014-02-20 21.44.22.jpg', 2000000.0000, '2014-05-12 16:06:52', '2014-05-12 16:06:52', '2014-05-12 16:06:52', NULL, 1, NULL, 12, 0, 1, 'SAP50S', 'rr', 1, 'NO', 1, '', '2014-02-20 21.44.22.jpg', 2013, 0, 0, 0, 0),
(56, 123456, 'eco delux', 'IMG-20140206-WA0002.jpg', 456789.0000, '2014-05-13 07:38:06', '2014-05-13 07:38:06', '2014-05-13 07:38:06', NULL, 1, NULL, 12, 0, 1, 'ght89u', '1', 1, 'NO', 19, '', 'IMG-20140206-WA0002.jpg', 2012, 0, 0, 0, 0),
(57, 123456, 'eco delux', 'IMG-20140117-WA0001.jpg', 456789.0000, '2014-05-13 07:43:03', '2014-05-13 07:43:03', '2014-05-13 07:43:03', NULL, 1, NULL, 11, 0, 1, 'ght89u', '1', 1, 'NO', 21, '', 'IMG-20140117-WA0001.jpg', 0, 0, 0, 0, 0),
(58, 123456, 'eco delux', 'IMG-20140118-WA0001.jpg', 456789.0000, '2014-05-13 07:48:27', '2014-05-13 07:48:27', '2014-05-13 07:48:27', NULL, 1, NULL, 11, 0, 1, 'ght89u', '1', 1, 'NO', 22, '', 'IMG-20140118-WA0001.jpg', 0, 0, 0, 0, 0),
(59, 123456, 'eco delux', 'IMG-20140118-WA0001.jpg', 456789.0000, '2014-05-13 07:49:06', '2014-05-13 07:49:06', '2014-05-13 07:49:06', NULL, 1, NULL, 11, 0, 1, 'ght89u', '1', 1, 'NO', 23, '', 'IMG-20140118-WA0001.jpg', 0, 0, 0, 0, 0),
(60, 123456, 'eco delux', 'IMG-20140118-WA0001.jpg', 456789.0000, '2014-05-13 07:49:33', '2014-05-13 07:49:33', '2014-05-13 07:49:33', NULL, 1, NULL, 11, 0, 1, 'ght89u', '1', 1, 'NO', 24, '', 'IMG-20140118-WA0001.jpg', 0, 0, 0, 0, 0),
(61, 123456, 'eco delux', 'IMG-20140118-WA0001.jpg', 456789.0000, '2014-05-13 07:51:48', '2014-05-13 07:51:48', '2014-05-13 07:51:48', NULL, 1, NULL, 11, 0, 1, 'ght89u', '1', 1, 'NO', 25, '', 'IMG-20140118-WA0001.jpg', 0, 0, 0, 0, 0),
(62, 123456, 'eco delux', 'IMG-20140118-WA0001.jpg', 456789.0000, '2014-05-13 07:54:37', '2014-05-13 07:54:37', '2014-05-13 07:54:37', NULL, 1, NULL, 11, 0, 1, 'ght89u', '1', 1, 'NO', 26, '', 'IMG-20140118-WA0001.jpg', 0, 0, 0, 0, 0),
(63, 123456, 'eco delux', 'IMG-20140118-WA0001.jpg', 456789.0000, '2014-05-13 07:55:25', '2014-05-13 07:55:25', '2014-05-13 07:55:25', NULL, 1, NULL, 11, 0, 1, 'ght89u', '1', 1, 'NO', 27, '', 'IMG-20140118-WA0001.jpg', 0, 0, 0, 0, 0),
(64, 123456, 'eco delux', 'IMG-20140118-WA0001.jpg', 456789.0000, '2014-05-13 07:57:35', '2014-05-13 07:57:35', '2014-05-13 07:57:35', NULL, 1, NULL, 11, 0, 1, 'ght89u', '1', 1, 'NO', 28, '', 'IMG-20140118-WA0001.jpg', 0, 0, 0, 0, 0),
(65, 123456, 'eco delux', 'IMG-20140118-WA0001.jpg', 456789.0000, '2014-05-13 07:58:25', '2014-05-13 07:58:25', '2014-05-13 07:58:25', NULL, 1, NULL, 11, 0, 1, 'ght89u', '1', 1, 'NO', 29, '', 'IMG-20140118-WA0001.jpg', 0, 0, 0, 0, 0),
(66, 123456, 'eco delux', 'IMG-20140118-WA0001.jpg', 456789.0000, '2014-05-13 08:07:38', '2014-05-13 08:07:38', '2014-05-13 08:07:38', NULL, 1, NULL, 11, 0, 1, 'ght89u', '1', 1, 'NO', 30, '', 'IMG-20140118-WA0001.jpg', 0, 0, 0, 0, 0),
(67, 25000, 'Señoritera', '20140511_162559.jpg', 2550000.0000, '2014-05-14 15:39:13', '2014-05-14 15:39:13', '2014-05-14 15:39:13', NULL, 1, NULL, 15, 0, 2, 'NSI21B', NULL, 1, 'SI', 33, '', '20140511_162559.jpg', 2010, 8, 0, 66, 0),
(70, 19000, 'Discovery', '20140511_155020.jpg', 2600000.0000, '2014-05-14 17:13:26', '2014-05-14 17:13:26', '2014-05-14 17:13:26', NULL, 1, NULL, 15, 0, 3, 'BCK78C', NULL, 1, 'SI', 33, '', '20140511_155020.jpg', 2011, 4, 0, 66, 1),
(71, 35000, 'rx', '20140511_155020.jpg', 3000000.0000, '2014-05-15 07:41:41', '2014-05-15 07:41:41', '2014-05-15 07:41:41', NULL, 1, NULL, 12, 0, 2, 'SPD82C', 'Leydi', 1, 'SI', 34, '', '20140511_155020.jpg', 2006, 4, 0, 66, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE IF NOT EXISTS `products_attributes` (
  `products_attributes_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `options_id` int(11) NOT NULL,
  `options_values_id` int(11) DEFAULT NULL,
  `options_values_price` decimal(15,4) DEFAULT NULL,
  `price_prefix` char(1) DEFAULT NULL,
  `options_label` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_label` varchar(255) NOT NULL,
  `option_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`products_attributes_id`),
  KEY `idx_products_attributes_products_id` (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=916 ;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`products_attributes_id`, `products_id`, `options_id`, `options_values_id`, `options_values_price`, `price_prefix`, `options_label`, `category_id`, `category_label`, `option_status`) VALUES
(1, 1, 4, 1, 0.0000, '+', '', 0, '', 0),
(2, 1, 4, 2, 50.0000, '+', '', 0, '', 0),
(3, 1, 4, 3, 70.0000, '+', '', 0, '', 0),
(4, 1, 3, 5, 0.0000, '+', '', 0, '', 0),
(5, 1, 3, 6, 100.0000, '+', '', 0, '', 0),
(6, 2, 4, 3, 10.0000, '-', '', 0, '', 0),
(7, 2, 4, 4, 0.0000, '+', '', 0, '', 0),
(8, 2, 3, 6, 0.0000, '+', '', 0, '', 0),
(9, 2, 3, 7, 120.0000, '+', '', 0, '', 0),
(10, 26, 3, 8, 0.0000, '+', '', 0, '', 0),
(11, 26, 3, 9, 6.0000, '+', '', 0, '', 0),
(26, 22, 5, 10, 0.0000, '+', '', 0, '', 0),
(27, 22, 5, 13, 0.0000, '+', '', 0, '', 0),
(28, 34, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(29, 34, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(30, 34, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(31, 34, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(32, 34, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(33, 34, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 1),
(34, 34, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 1),
(35, 34, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 1),
(36, 34, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 1),
(37, 34, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 1),
(38, 34, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 1),
(39, 34, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 1),
(40, 34, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 1),
(41, 34, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 1),
(42, 34, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 1),
(43, 34, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 1),
(44, 34, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 1),
(45, 34, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 1),
(46, 34, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 1),
(47, 34, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 1),
(48, 34, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 1),
(49, 34, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 1),
(50, 34, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 1),
(51, 34, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 1),
(52, 35, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(53, 35, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(54, 35, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(55, 35, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 0),
(56, 35, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(57, 35, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(58, 35, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 1),
(59, 35, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 1),
(60, 35, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(61, 35, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(62, 35, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(63, 35, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(64, 35, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(65, 35, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(66, 35, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(67, 35, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(68, 35, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 1),
(69, 35, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 1),
(70, 35, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(71, 35, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(72, 35, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(73, 35, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(74, 35, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(75, 35, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(76, 36, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(77, 36, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(78, 36, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(79, 36, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 0),
(80, 36, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(81, 36, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(82, 36, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(83, 36, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(84, 36, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(85, 36, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 1),
(86, 36, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(87, 36, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(88, 36, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(89, 36, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 1),
(90, 36, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(91, 36, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(92, 36, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(93, 36, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(94, 36, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(95, 36, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(96, 36, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 1),
(97, 36, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(98, 36, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(99, 36, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(124, 38, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 0),
(125, 38, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(126, 38, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(127, 38, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(128, 38, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(129, 38, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(130, 38, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(131, 38, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(132, 38, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 1),
(133, 38, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(134, 38, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(135, 38, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 1),
(136, 38, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(137, 38, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 1),
(138, 38, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(139, 38, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(140, 38, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 1),
(141, 38, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(142, 38, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(143, 38, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(144, 38, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(145, 38, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(146, 38, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(147, 38, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 1),
(148, 39, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 0),
(149, 39, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(150, 39, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(151, 39, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(152, 39, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(153, 39, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(154, 39, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(155, 39, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(156, 39, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 1),
(157, 39, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(158, 39, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(159, 39, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 1),
(160, 39, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(161, 39, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 1),
(162, 39, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(163, 39, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(164, 39, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 1),
(165, 39, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(166, 39, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(167, 39, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(168, 39, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(169, 39, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(170, 39, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(171, 39, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 1),
(172, 40, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 0),
(173, 40, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(174, 40, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(175, 40, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(176, 40, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(177, 40, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(178, 40, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(179, 40, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(180, 40, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 1),
(181, 40, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(182, 40, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(183, 40, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 1),
(184, 40, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(185, 40, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 1),
(186, 40, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(187, 40, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(188, 40, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 1),
(189, 40, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(190, 40, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(191, 40, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(192, 40, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(193, 40, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(194, 40, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(195, 40, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 1),
(196, 41, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 0),
(197, 41, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(198, 41, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(199, 41, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(200, 41, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(201, 41, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(202, 41, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(203, 41, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(204, 41, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 1),
(205, 41, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(206, 41, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(207, 41, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 1),
(208, 41, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(209, 41, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 1),
(210, 41, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(211, 41, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(212, 41, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 1),
(213, 41, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(214, 41, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(215, 41, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(216, 41, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(217, 41, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(218, 41, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(219, 41, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 1),
(220, 42, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 0),
(221, 42, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(222, 42, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(223, 42, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(224, 42, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(225, 42, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(226, 42, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(227, 42, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(228, 42, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 1),
(229, 42, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(230, 42, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(231, 42, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 1),
(232, 42, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(233, 42, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 1),
(234, 42, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(235, 42, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(236, 42, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 1),
(237, 42, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(238, 42, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(239, 42, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(240, 42, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(241, 42, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(242, 42, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(243, 42, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 1),
(244, 43, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 0),
(245, 43, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(246, 43, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(247, 43, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(248, 43, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(249, 43, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(250, 43, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(251, 43, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(252, 43, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 1),
(253, 43, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(254, 43, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(255, 43, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 1),
(256, 43, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(257, 43, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 1),
(258, 43, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(259, 43, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(260, 43, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 1),
(261, 43, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(262, 43, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(263, 43, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(264, 43, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(265, 43, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(266, 43, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(267, 43, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 1),
(268, 44, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 0),
(269, 44, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(270, 44, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(271, 44, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(272, 44, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(273, 44, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(274, 44, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(275, 44, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(276, 44, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 1),
(277, 44, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(278, 44, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(279, 44, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 1),
(280, 44, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(281, 44, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 1),
(282, 44, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(283, 44, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(284, 44, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 1),
(285, 44, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(286, 44, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(287, 44, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(288, 44, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(289, 44, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(290, 44, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(291, 44, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 1),
(316, 46, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(317, 46, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(318, 46, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(319, 46, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(320, 46, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(321, 46, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(322, 46, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(323, 46, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(324, 46, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(325, 46, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(326, 46, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(327, 46, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(328, 46, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(329, 46, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(330, 46, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 1),
(331, 46, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(332, 46, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(333, 46, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(334, 46, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(335, 46, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(336, 46, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(337, 46, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(338, 46, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(339, 46, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(340, 47, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(341, 47, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(342, 47, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(343, 47, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 0),
(344, 47, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(345, 47, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 1),
(346, 47, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 1),
(347, 47, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(348, 47, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(349, 47, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(350, 47, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(351, 47, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(352, 47, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 1),
(353, 47, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(354, 47, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(355, 47, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 1),
(356, 47, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(357, 47, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(358, 47, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 1),
(359, 47, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(360, 47, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 1),
(361, 47, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(362, 47, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(363, 47, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 1),
(364, 48, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(365, 48, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(366, 48, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(367, 48, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(368, 48, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(369, 48, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(370, 48, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(371, 48, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(372, 48, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(373, 48, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(374, 48, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(375, 48, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(376, 48, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(377, 48, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(378, 48, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(379, 48, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(380, 48, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(381, 48, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(382, 48, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(383, 48, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(384, 48, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(385, 48, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(386, 48, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(387, 48, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(412, 50, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(413, 50, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(414, 50, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(415, 50, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(416, 50, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(417, 50, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(418, 50, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(419, 50, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(420, 50, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(421, 50, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(422, 50, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(423, 50, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(424, 50, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(425, 50, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(426, 50, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(427, 50, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(428, 50, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(429, 50, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(430, 50, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(431, 50, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(432, 50, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(433, 50, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(434, 50, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(435, 50, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(436, 51, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(437, 51, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(438, 51, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(439, 51, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(440, 51, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(441, 51, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(442, 51, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(443, 51, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(444, 51, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(445, 51, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(446, 51, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(447, 51, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(448, 51, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(449, 51, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(450, 51, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(451, 51, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(452, 51, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(453, 51, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(454, 51, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(455, 51, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(456, 51, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(457, 51, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(458, 51, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(459, 51, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(460, 52, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(461, 52, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(462, 52, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(463, 52, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(464, 52, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(465, 52, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(466, 52, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(467, 52, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(468, 52, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(469, 52, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(470, 52, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(471, 52, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(472, 52, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(473, 52, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(474, 52, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(475, 52, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(476, 52, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(477, 52, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(478, 52, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(479, 52, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(480, 52, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(481, 52, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(482, 52, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(483, 52, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(484, 53, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(485, 53, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(486, 53, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(487, 53, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(488, 53, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(489, 53, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(490, 53, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(491, 53, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(492, 53, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(493, 53, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(494, 53, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(495, 53, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(496, 53, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(497, 53, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(498, 53, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(499, 53, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(500, 53, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(501, 53, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(502, 53, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(503, 53, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(504, 53, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(505, 53, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(506, 53, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(507, 53, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(508, 54, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(509, 54, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(510, 54, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(511, 54, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(512, 54, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(513, 54, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(514, 54, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(515, 54, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(516, 54, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(517, 54, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(518, 54, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(519, 54, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(520, 54, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(521, 54, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(522, 54, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(523, 54, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(524, 54, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(525, 54, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(526, 54, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(527, 54, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(528, 54, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(529, 54, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(530, 54, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(531, 54, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(532, 55, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(533, 55, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 1),
(534, 55, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(535, 55, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(536, 55, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(537, 55, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(538, 55, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(539, 55, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(540, 55, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(541, 55, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(542, 55, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(543, 55, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(544, 55, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(545, 55, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(546, 55, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(547, 55, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(548, 55, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(549, 55, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(550, 55, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(551, 55, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(552, 55, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(553, 55, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(554, 55, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(555, 55, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(556, 56, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(557, 56, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(558, 56, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(559, 56, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(560, 56, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(561, 56, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(562, 56, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(563, 56, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(564, 56, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(565, 56, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(566, 56, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(567, 56, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(568, 56, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(569, 56, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(570, 56, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(571, 56, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(572, 56, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(573, 56, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(574, 56, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(575, 56, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(576, 56, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(577, 56, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(578, 56, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(579, 56, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(580, 57, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(581, 57, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(582, 57, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(583, 57, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(584, 57, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(585, 57, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(586, 57, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(587, 57, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(588, 57, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(589, 57, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(590, 57, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(591, 57, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(592, 57, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(593, 57, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(594, 57, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(595, 57, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(596, 57, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(597, 57, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(598, 57, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(599, 57, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(600, 57, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(601, 57, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(602, 57, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(603, 57, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(604, 58, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(605, 58, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(606, 58, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(607, 58, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(608, 58, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(609, 58, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(610, 58, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(611, 58, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(612, 58, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(613, 58, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(614, 58, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(615, 58, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(616, 58, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(617, 58, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(618, 58, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(619, 58, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(620, 58, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(621, 58, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(622, 58, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(623, 58, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(624, 58, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(625, 58, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(626, 58, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(627, 58, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(628, 59, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(629, 59, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(630, 59, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(631, 59, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(632, 59, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(633, 59, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(634, 59, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(635, 59, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(636, 59, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(637, 59, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(638, 59, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(639, 59, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(640, 59, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(641, 59, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(642, 59, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(643, 59, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(644, 59, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(645, 59, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(646, 59, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(647, 59, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(648, 59, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(649, 59, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(650, 59, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(651, 59, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(652, 60, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(653, 60, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(654, 60, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(655, 60, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(656, 60, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(657, 60, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(658, 60, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(659, 60, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(660, 60, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(661, 60, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(662, 60, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(663, 60, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(664, 60, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(665, 60, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(666, 60, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(667, 60, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(668, 60, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(669, 60, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(670, 60, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(671, 60, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(672, 60, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(673, 60, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(674, 60, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(675, 60, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(676, 61, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(677, 61, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(678, 61, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(679, 61, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(680, 61, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(681, 61, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(682, 61, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(683, 61, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(684, 61, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(685, 61, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(686, 61, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(687, 61, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(688, 61, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(689, 61, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(690, 61, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(691, 61, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(692, 61, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(693, 61, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(694, 61, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(695, 61, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(696, 61, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(697, 61, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(698, 61, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(699, 61, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(700, 62, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(701, 62, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(702, 62, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(703, 62, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(704, 62, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(705, 62, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(706, 62, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(707, 62, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(708, 62, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(709, 62, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(710, 62, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(711, 62, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(712, 62, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(713, 62, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(714, 62, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(715, 62, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(716, 62, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(717, 62, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(718, 62, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(719, 62, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(720, 62, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(721, 62, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(722, 62, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(723, 62, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(724, 63, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(725, 63, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(726, 63, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(727, 63, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(728, 63, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(729, 63, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(730, 63, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(731, 63, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(732, 63, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(733, 63, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(734, 63, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(735, 63, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(736, 63, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(737, 63, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(738, 63, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(739, 63, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(740, 63, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(741, 63, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(742, 63, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(743, 63, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(744, 63, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(745, 63, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(746, 63, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(747, 63, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(748, 64, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(749, 64, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(750, 64, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(751, 64, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(752, 64, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(753, 64, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(754, 64, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(755, 64, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(756, 64, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(757, 64, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(758, 64, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(759, 64, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(760, 64, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(761, 64, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(762, 64, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(763, 64, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(764, 64, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(765, 64, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(766, 64, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(767, 64, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(768, 64, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(769, 64, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(770, 64, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(771, 64, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(772, 65, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(773, 65, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(774, 65, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(775, 65, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(776, 65, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(777, 65, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(778, 65, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(779, 65, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(780, 65, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(781, 65, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(782, 65, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(783, 65, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(784, 65, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(785, 65, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(786, 65, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(787, 65, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(788, 65, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(789, 65, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(790, 65, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(791, 65, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(792, 65, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(793, 65, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(794, 65, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(795, 65, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(796, 66, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(797, 66, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(798, 66, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 0),
(799, 66, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 1),
(800, 66, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 0),
(801, 66, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(802, 66, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(803, 66, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(804, 66, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(805, 66, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0);
INSERT INTO `products_attributes` (`products_attributes_id`, `products_id`, `options_id`, `options_values_id`, `options_values_price`, `price_prefix`, `options_label`, `category_id`, `category_label`, `option_status`) VALUES
(806, 66, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(807, 66, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(808, 66, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(809, 66, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(810, 66, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(811, 66, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(812, 66, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(813, 66, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(814, 66, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(815, 66, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(816, 66, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(817, 66, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(818, 66, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(819, 66, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(820, 67, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(821, 67, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(822, 67, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(823, 67, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 0),
(824, 67, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(825, 67, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(826, 67, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(827, 67, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(828, 67, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(829, 67, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(830, 67, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(831, 67, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(832, 67, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(833, 67, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(834, 67, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(835, 67, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(836, 67, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(837, 67, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(838, 67, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(839, 67, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(840, 67, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(841, 67, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(842, 67, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(843, 67, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(868, 70, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(869, 70, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(870, 70, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(871, 70, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 0),
(872, 70, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(873, 70, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(874, 70, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(875, 70, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(876, 70, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(877, 70, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(878, 70, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(879, 70, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(880, 70, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(881, 70, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(882, 70, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(883, 70, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(884, 70, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(885, 70, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(886, 70, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(887, 70, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(888, 70, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(889, 70, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(890, 70, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(891, 70, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0),
(892, 71, 6, NULL, NULL, NULL, 'Financiamiento', 2, 'Condiciones', 1),
(893, 71, 7, NULL, NULL, NULL, 'Motor Recien Reparado', 2, 'Condiciones', 0),
(894, 71, 8, NULL, NULL, NULL, 'Nunca Chocada', 2, 'Condiciones', 1),
(895, 71, 9, NULL, NULL, NULL, 'Recibo Moto', 2, 'Condiciones', 0),
(896, 71, 10, NULL, NULL, NULL, 'Único Dueño', 2, 'Condiciones', 1),
(897, 71, 11, NULL, NULL, NULL, 'Alarma', 3, 'Seguridad', 0),
(898, 71, 12, NULL, NULL, NULL, 'Candado', 3, 'Seguridad', 0),
(899, 71, 13, NULL, NULL, NULL, 'Rastreo Satelital', 3, 'Seguridad', 0),
(900, 71, 14, NULL, NULL, NULL, 'Inmovilizador', 3, 'Seguridad', 0),
(901, 71, 15, NULL, NULL, NULL, 'Tranca Palanca', 3, 'Seguridad', 0),
(902, 71, 16, NULL, NULL, NULL, 'Alforjas', 4, 'Accesorios Externos', 0),
(903, 71, 17, NULL, NULL, NULL, 'Casco', 4, 'Accesorios Externos', 0),
(904, 71, 18, NULL, NULL, NULL, 'Casco Integrado', 4, 'Accesorios Externos', 0),
(905, 71, 19, NULL, NULL, NULL, 'Cauchos nuevos', 4, 'Accesorios Externos', 0),
(906, 71, 20, NULL, NULL, NULL, 'Escape Cromado', 4, 'Accesorios Externos', 0),
(907, 71, 21, NULL, NULL, NULL, 'Estribos', 4, 'Accesorios Externos', 0),
(908, 71, 22, NULL, NULL, NULL, 'Flecos', 4, 'Accesorios Externos', 0),
(909, 71, 23, NULL, NULL, NULL, 'Header', 4, 'Accesorios Externos', 0),
(910, 71, 24, NULL, NULL, NULL, 'Maleta', 4, 'Accesorios Externos', 0),
(911, 71, 25, NULL, NULL, NULL, 'Mata perros', 4, 'Accesorios Externos', 0),
(912, 71, 26, NULL, NULL, NULL, 'Parabrisas', 4, 'Accesorios Externos', 0),
(913, 71, 27, NULL, NULL, NULL, 'Posapies', 4, 'Accesorios Externos', 0),
(914, 71, 28, NULL, NULL, NULL, 'Cornetas', 5, 'Sonido', 0),
(915, 71, 29, NULL, NULL, NULL, 'Equipo de CD', 5, 'Sonido', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes_download`
--

CREATE TABLE IF NOT EXISTS `products_attributes_download` (
  `products_attributes_id` int(11) NOT NULL,
  `products_attributes_filename` varchar(255) NOT NULL DEFAULT '',
  `products_attributes_maxdays` int(2) DEFAULT '0',
  `products_attributes_maxcount` int(2) DEFAULT '0',
  PRIMARY KEY (`products_attributes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_attributes_download`
--

INSERT INTO `products_attributes_download` (`products_attributes_id`, `products_attributes_filename`, `products_attributes_maxdays`, `products_attributes_maxcount`) VALUES
(26, 'unreal.zip', 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products_description`
--

CREATE TABLE IF NOT EXISTS `products_description` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `products_name` varchar(64) NOT NULL DEFAULT '',
  `products_description` text,
  `products_url` varchar(255) DEFAULT NULL,
  `products_viewed` int(5) DEFAULT '0',
  PRIMARY KEY (`products_id`,`language_id`),
  KEY `products_name` (`products_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `products_description`
--

INSERT INTO `products_description` (`products_id`, `language_id`, `products_name`, `products_description`, `products_url`, `products_viewed`) VALUES
(1, 1, 'Matrox G200 MMS', 'Reinforcing its position as a multi-monitor trailblazer, Matrox Graphics Inc. has once again developed the most flexible and highly advanced solution in the industry. Introducing the new Matrox G200 Multi-Monitor Series; the first graphics card ever to support up to four DVI digital flat panel displays on a single 8&quot; PCI board.<br /><br />With continuing demand for digital flat panels in the financial workplace, the Matrox G200 MMS is the ultimate in flexible solutions. The Matrox G200 MMS also supports the new digital video interface (DVI) created by the Digital Display Working Group (DDWG) designed to ease the adoption of digital flat panels. Other configurations include composite video capture ability and onboard TV tuner, making the Matrox G200 MMS the complete solution for business needs.<br /><br />Based on the award-winning MGA-G200 graphics chip, the Matrox G200 Multi-Monitor Series provides superior 2D/3D graphics acceleration to meet the demanding needs of business applications such as real-time stock quotes (Versus), live video feeds (Reuters &amp; Bloombergs), multiple windows applications, word processing, spreadsheets and CAD.', 'www.matrox.com/mga/products/g200_mms/home.cfm', 0),
(2, 1, 'Matrox G400 32MB', '<strong>Dramatically Different High Performance Graphics</strong><br /><br />Introducing the Millennium G400 Series - a dramatically different, high performance graphics experience. Armed with the industry''s fastest graphics chip, the Millennium G400 Series takes explosive acceleration two steps further by adding unprecedented image quality, along with the most versatile display options for all your 3D, 2D and DVD applications. As the most powerful and innovative tools in your PC''s arsenal, the Millennium G400 Series will not only change the way you see graphics, but will revolutionize the way you use your computer.<br /><br /><strong>Key features:</strong><ul><li>New Matrox G400 256-bit DualBus graphics chip</li><li>Explosive 3D, 2D and DVD performance</li><li>DualHead Display</li><li>Superior DVD and TV output</li><li>3D Environment-Mapped Bump Mapping</li><li>Vibrant Color Quality rendering </li><li>UltraSharp DAC of up to 360 MHz</li><li>3D Rendering Array Processor</li><li>Support for 16 or 32 MB of memory</li></ul>', 'www.matrox.com/mga/products/mill_g400/home.htm', 0),
(3, 1, 'Microsoft IntelliMouse Pro', 'Every element of IntelliMouse Pro - from its unique arched shape to the texture of the rubber grip around its base - is the product of extensive customer and ergonomic research. Microsoft''s popular wheel control, which now allows zooming and universal scrolling functions, gives IntelliMouse Pro outstanding comfort and efficiency.', 'www.microsoft.com/hardware/mouse/intellimouse.asp', 1),
(4, 1, 'The Replacement Killers', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />Languages: English, Deutsch.<br />Subtitles: English, Deutsch, Spanish.<br />Audio: Dolby Surround 5.1.<br />Picture Format: 16:9 Wide-Screen.<br />Length: (approx) 80 minutes.<br />Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', 'www.replacement-killers.com', 0),
(5, 1, 'Blade Runner - Director''s Cut', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).<br />Languages: English, Deutsch.<br />Subtitles: English, Deutsch, Spanish.<br />Audio: Dolby Surround 5.1.<br />Picture Format: 16:9 Wide-Screen.<br />Length: (approx) 112 minutes.<br />Other: Interactive Menus, Chapter Selection, Subtitles (more languages).', 'www.bladerunner.com', 0),
(6, 1, 'The Matrix', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch.\r<br />\nAudio: Dolby Surround.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 131 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Making Of.', 'www.thematrix.com', 0),
(7, 1, 'You''ve Got Mail', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch, Spanish.\r<br />\nSubtitles: English, Deutsch, Spanish, French, Nordic, Polish.\r<br />\nAudio: Dolby Digital 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 115 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', 'www.youvegotmail.com', 0),
(8, 1, 'A Bug''s Life', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Digital 5.1 / Dobly Surround Stereo.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 91 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', 'www.abugslife.com', 0),
(9, 1, 'Under Siege', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Surround 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 98 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', 0),
(10, 1, 'Under Siege 2 - Dark Territory', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Surround 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 98 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', 0),
(11, 1, 'Fire Down Below', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Surround 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 100 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', 0),
(12, 1, 'Die Hard With A Vengeance', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Surround 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 122 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', 0),
(13, 1, 'Lethal Weapon', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Surround 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 100 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', 0),
(14, 1, 'Red Corner', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Surround 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 117 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', 0),
(15, 1, 'Frantic', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Surround 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 115 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', 0),
(16, 1, 'Courage Under Fire', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Surround 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 112 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', 0),
(17, 1, 'Speed', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Surround 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 112 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', 0),
(18, 1, 'Speed 2: Cruise Control', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Surround 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 120 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', 0),
(19, 1, 'There''s Something About Mary', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Surround 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 114 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', 1),
(20, 1, 'Beloved', 'Regional Code: 2 (Japan, Europe, Middle East, South Africa).\r<br />\nLanguages: English, Deutsch.\r<br />\nSubtitles: English, Deutsch, Spanish.\r<br />\nAudio: Dolby Surround 5.1.\r<br />\nPicture Format: 16:9 Wide-Screen.\r<br />\nLength: (approx) 164 minutes.\r<br />\nOther: Interactive Menus, Chapter Selection, Subtitles (more languages).', '', 0),
(21, 1, 'SWAT 3: Close Quarters Battle', '<strong>Windows 95/98</strong><br /><br />211 in progress with shots fired. Officer down. Armed suspects with hostages. Respond Code 3! Los Angles, 2005, In the next seven days, representatives from every nation around the world will converge on Las Angles to witness the signing of the United Nations Nuclear Abolishment Treaty. The protection of these dignitaries falls on the shoulders of one organization, LAPD SWAT. As part of this elite tactical organization, you and your team have the weapons and all the training necessary to protect, to serve, and "When needed" to use deadly force to keep the peace. It takes more than weapons to make it through each mission. Your arsenal includes C2 charges, flashbangs, tactical grenades. opti-Wand mini-video cameras, and other devices critical to meeting your objectives and keeping your men free of injury. Uncompromised Duty, Honor and Valor!', 'www.swat3.com', 0),
(22, 1, 'Unreal Tournament', 'From the creators of the best-selling Unreal, comes Unreal Tournament. A new kind of single player experience. A ruthless multiplayer revolution.<br /><br />This stand-alone game showcases completely new team-based gameplay, groundbreaking multi-faceted single player action or dynamic multi-player mayhem. It''s a fight to the finish for the title of Unreal Grand Master in the gladiatorial arena. A single player experience like no other! Guide your team of ''bots'' (virtual teamates) against the hardest criminals in the galaxy for the ultimate title - the Unreal Grand Master.', 'www.unrealtournament.net', 0),
(23, 1, 'The Wheel Of Time', 'The world in which The Wheel of Time takes place is lifted directly out of Jordan''s pages; it''s huge and consists of many different environments. How you navigate the world will depend largely on which game - single player or multipayer - you''re playing. The single player experience, with a few exceptions, will see Elayna traversing the world mainly by foot (with a couple notable exceptions). In the multiplayer experience, your character will have more access to travel via Ter''angreal, Portal Stones, and the Ways. However you move around, though, you''ll quickly discover that means of locomotion can easily become the least of the your worries...<br /><br />During your travels, you quickly discover that four locations are crucial to your success in the game. Not surprisingly, these locations are the homes of The Wheel of Time''s main characters. Some of these places are ripped directly from the pages of Jordan''s books, made flesh with Legend''s unparalleled pixel-pushing ways. Other places are specific to the game, conceived and executed with the intent of expanding this game world even further. Either way, they provide a backdrop for some of the most intense first person action and strategy you''ll have this year.', 'www.wheeloftime.com', 0),
(24, 1, 'Disciples: Sacred Lands', 'A new age is dawning...<br /><br />Enter the realm of the Sacred Lands, where the dawn of a New Age has set in motion the most momentous of wars. As the prophecies long foretold, four races now clash with swords and sorcery in a desperate bid to control the destiny of their gods. Take on the quest as a champion of the Empire, the Mountain Clans, the Legions of the Damned, or the Undead Hordes and test your faith in battles of brute force, spellbinding magic and acts of guile. Slay demons, vanquish giants and combat merciless forces of the dead and undead. But to ensure the salvation of your god, the hero within must evolve.<br /><br />The day of reckoning has come... and only the chosen will survive.', '', 1),
(25, 1, 'Microsoft Internet Keyboard PS/2', 'The Internet Keyboard has 10 Hot Keys on a comfortable standard keyboard design that also includes a detachable palm rest. The Hot Keys allow you to browse the web, or check e-mail directly from your keyboard. The IntelliType Pro software also allows you to customize your hot keys - make the Internet Keyboard work the way you want it to!', '', 1),
(26, 1, 'Microsoft IntelliMouse Explorer', 'Microsoft introduces its most advanced mouse, the IntelliMouse Explorer! IntelliMouse Explorer features a sleek design, an industrial-silver finish, a glowing red underside and taillight, creating a style and look unlike any other mouse. IntelliMouse Explorer combines the accuracy and reliability of Microsoft IntelliEye optical tracking technology, the convenience of two new customizable function buttons, the efficiency of the scrolling wheel and the comfort of expert ergonomic design. All these great features make this the best mouse for the PC!', 'www.microsoft.com/hardware/mouse/explorer.asp', 0),
(27, 1, 'Hewlett Packard LaserJet 1100Xi', 'HP has always set the pace in laser printing technology. The new generation HP LaserJet 1100 series sets another impressive pace, delivering a stunning 8 pages per minute print speed. The 600 dpi print resolution with HP''s Resolution Enhancement technology (REt) makes every document more professional.<br /><br />Enhanced print speed and laser quality results are just the beginning. With 2MB standard memory, HP LaserJet 1100xi users will be able to print increasingly complex pages. Memory can be increased to 18MB to tackle even more complex documents with ease. The HP LaserJet 1100xi supports key operating systems including Windows 3.1, 3.11, 95, 98, NT 4.0, OS/2 and DOS. Network compatibility available via the optional HP JetDirect External Print Servers.<br /><br />HP LaserJet 1100xi also features The Document Builder for the Web Era from Trellix Corp. (featuring software to create Web documents).', 'www.pandi.hp.com/pandi-db/prodinfo.main?product=laserjet1100', 0),
(28, 1, 'Samsung Galaxy Tab', '<p>Powered by a Cortex A8 1.0GHz application processor, the Samsung GALAXY Tab is designed to deliver high performance whenever and wherever you are. At the same time, HD video contents are supported by a wide range of multimedia formats (DivX, XviD, MPEG4, H.263, H.264 and more), which maximizes the joy of entertainment.</p><p>With 3G HSPA connectivity, 802.11n Wi-Fi, and Bluetooth 3.0, the Samsung GALAXY Tab enhances users'' mobile communication on a whole new level. Video conferencing and push email on the large 7-inch display make communication more smooth and efficient. For voice telephony, the Samsung GALAXY Tab turns out to be a perfect speakerphone on the desk, or a mobile phone on the move via Bluetooth headset.</p>', 'http://galaxytab.samsungmobile.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE IF NOT EXISTS `products_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `image` varchar(64) DEFAULT NULL,
  `htmlcontent` text,
  `sort_order` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `file_image` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_images_prodid` (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `products_id`, `image`, `htmlcontent`, `sort_order`, `path`, `file_image`) VALUES
(1, 28, 'samsung/galaxy_tab_1.jpg', NULL, 1, '', ''),
(2, 28, 'samsung/galaxy_tab_2.jpg', NULL, 2, '', ''),
(3, 28, 'samsung/galaxy_tab_3.jpg', NULL, 3, '', ''),
(4, 28, 'samsung/galaxy_tab_4.jpg', '<object type="application/x-shockwave-flash" width="640" height="385" data="http://www.youtube.com/v/tAbsmHMAhrQ?fs=1&amp;autoplay=1"><param name="movie" value="http://www.youtube.com/v/tAbsmHMAhrQ?fs=1&amp;autoplay=1" /><param name="allowFullScreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="wmode" value="transparent" /></object>', 4, '', ''),
(5, 50, '2014-02-21 14.18.07.jpg', NULL, 1, '2014-02-21 14.18.07.jpg', ''),
(6, 50, 'IMG-20140117-WA0001.jpg', NULL, 2, 'IMG-20140117-WA0001.jpg', ''),
(7, 50, 'IMG-20140118-WA0000.jpg', NULL, 3, 'IMG-20140118-WA0000.jpg', ''),
(8, 50, 'IMG-20140206-WA0000.jpg', NULL, 4, 'IMG-20140206-WA0000.jpg', ''),
(9, 50, 'IMG-20140206-WA0002.jpg', NULL, 5, 'IMG-20140206-WA0002.jpg', ''),
(10, 50, 'IMG-20140211-WA0000.jpg', NULL, 6, 'IMG-20140211-WA0000.jpg', ''),
(11, 50, 'EPSON011.JPG', NULL, 7, 'EPSON011.JPG', ''),
(12, 51, '2014-02-21 14.18.07.jpg', NULL, 1, '2014-02-21 14.18.07.jpg', ''),
(13, 51, 'IMG-20140117-WA0001.jpg', NULL, 2, 'IMG-20140117-WA0001.jpg', ''),
(14, 51, 'IMG-20140118-WA0000.jpg', NULL, 3, 'IMG-20140118-WA0000.jpg', ''),
(15, 51, 'IMG-20140206-WA0000.jpg', NULL, 4, 'IMG-20140206-WA0000.jpg', ''),
(16, 51, 'IMG-20140206-WA0002.jpg', NULL, 5, 'IMG-20140206-WA0002.jpg', ''),
(17, 51, 'IMG-20140211-WA0000.jpg', NULL, 6, 'IMG-20140211-WA0000.jpg', ''),
(18, 51, 'EPSON011.JPG', NULL, 7, 'EPSON011.JPG', ''),
(19, 52, '2014-02-21 14.18.07.jpg', NULL, 1, '2014-02-21 14.18.07.jpg', ''),
(20, 52, 'IMG-20140117-WA0001.jpg', NULL, 2, 'IMG-20140117-WA0001.jpg', ''),
(21, 52, 'IMG-20140118-WA0000.jpg', NULL, 3, 'IMG-20140118-WA0000.jpg', ''),
(22, 52, 'IMG-20140206-WA0000.jpg', NULL, 4, 'IMG-20140206-WA0000.jpg', ''),
(23, 52, 'IMG-20140206-WA0002.jpg', NULL, 5, 'IMG-20140206-WA0002.jpg', ''),
(24, 52, 'IMG-20140211-WA0000.jpg', NULL, 6, 'IMG-20140211-WA0000.jpg', ''),
(25, 52, 'EPSON011.JPG', NULL, 7, 'EPSON011.JPG', ''),
(26, 53, '2014-02-21 14.18.07.jpg', NULL, 1, '2014-02-21 14.18.07.jpg', ''),
(27, 53, 'IMG-20140117-WA0001.jpg', NULL, 2, 'IMG-20140117-WA0001.jpg', ''),
(28, 53, 'IMG-20140118-WA0000.jpg', NULL, 3, 'IMG-20140118-WA0000.jpg', ''),
(29, 53, 'IMG-20140206-WA0000.jpg', NULL, 4, 'IMG-20140206-WA0000.jpg', ''),
(30, 53, 'IMG-20140206-WA0002.jpg', NULL, 5, 'IMG-20140206-WA0002.jpg', ''),
(31, 53, 'IMG-20140211-WA0000.jpg', NULL, 6, 'IMG-20140211-WA0000.jpg', ''),
(32, 53, 'EPSON011.JPG', NULL, 7, 'EPSON011.JPG', ''),
(33, 54, '2014-02-21 14.18.07.jpg', NULL, 1, '2014-02-21 14.18.07.jpg', ''),
(34, 54, 'IMG-20140117-WA0001.jpg', NULL, 2, 'IMG-20140117-WA0001.jpg', ''),
(35, 54, 'IMG-20140118-WA0000.jpg', NULL, 3, 'IMG-20140118-WA0000.jpg', ''),
(36, 54, 'IMG-20140206-WA0000.jpg', NULL, 4, 'IMG-20140206-WA0000.jpg', ''),
(37, 54, 'IMG-20140206-WA0002.jpg', NULL, 5, 'IMG-20140206-WA0002.jpg', ''),
(38, 54, 'IMG-20140211-WA0000.jpg', NULL, 6, 'IMG-20140211-WA0000.jpg', ''),
(39, 54, 'EPSON011.JPG', NULL, 7, 'EPSON011.JPG', ''),
(40, 55, '2014-02-21 14.18.07.jpg', NULL, 1, '2014-02-21 14.18.07.jpg', ''),
(41, 55, 'IMG-20140117-WA0001.jpg', NULL, 2, 'IMG-20140117-WA0001.jpg', ''),
(42, 55, 'IMG-20140118-WA0000.jpg', NULL, 3, 'IMG-20140118-WA0000.jpg', ''),
(43, 55, 'IMG-20140206-WA0000.jpg', NULL, 4, 'IMG-20140206-WA0000.jpg', ''),
(44, 55, 'IMG-20140206-WA0002.jpg', NULL, 5, 'IMG-20140206-WA0002.jpg', ''),
(45, 55, 'IMG-20140211-WA0000.jpg', NULL, 6, 'IMG-20140211-WA0000.jpg', ''),
(46, 55, 'EPSON011.JPG', NULL, 7, 'EPSON011.JPG', ''),
(47, 56, '2014-02-21 14.18.07.jpg', NULL, 1, '2014-02-21 14.18.07.jpg', ''),
(48, 56, '2014-02-21 14.19.40.jpg', NULL, 2, '2014-02-21 14.19.40.jpg', ''),
(49, 56, 'IMG-20140118-WA0000.jpg', NULL, 3, 'IMG-20140118-WA0000.jpg', ''),
(50, 56, 'IMG-20140120-WA0000.jpg', NULL, 4, 'IMG-20140120-WA0000.jpg', ''),
(51, 56, 'IMG-20140206-WA0001.jpg', NULL, 5, 'IMG-20140206-WA0001.jpg', ''),
(52, 56, 'IMG-20140206-WA0003.jpg', NULL, 6, 'IMG-20140206-WA0003.jpg', ''),
(53, 56, 'IMG-20140206-WA0006.jpg', NULL, 7, 'IMG-20140206-WA0006.jpg', ''),
(54, 57, '2014-02-21 14.18.07.jpg', NULL, 1, '2014-02-21 14.18.07.jpg', ''),
(55, 57, 'IMG-20140118-WA0000.jpg', NULL, 2, 'IMG-20140118-WA0000.jpg', ''),
(56, 57, 'IMG-20140120-WA0000.jpg', NULL, 3, 'IMG-20140120-WA0000.jpg', ''),
(57, 57, 'IMG-20140206-WA0000.jpg', NULL, 4, 'IMG-20140206-WA0000.jpg', ''),
(58, 57, 'IMG-20140206-WA0001.jpg', NULL, 5, 'IMG-20140206-WA0001.jpg', ''),
(59, 57, 'IMG-20140206-WA0002.jpg', NULL, 6, 'IMG-20140206-WA0002.jpg', ''),
(60, 57, 'IMG-20140206-WA0003.jpg', NULL, 7, 'IMG-20140206-WA0003.jpg', ''),
(61, 58, 'IMG-20140206-WA0004.jpg', NULL, 1, 'IMG-20140206-WA0004.jpg', ''),
(62, 58, 'IMG-20140215-WA0000.jpg', NULL, 2, 'IMG-20140215-WA0000.jpg', ''),
(63, 58, 'IMG-20140206-WA0006.jpg', NULL, 3, 'IMG-20140206-WA0006.jpg', ''),
(64, 58, 'IMG-20140206-WA0002.jpg', NULL, 4, 'IMG-20140206-WA0002.jpg', ''),
(65, 58, 'IMG-20140206-WA0001.jpg', NULL, 5, 'IMG-20140206-WA0001.jpg', ''),
(66, 58, 'IMG-20140206-WA0000.jpg', NULL, 6, 'IMG-20140206-WA0000.jpg', ''),
(67, 58, 'IMG-20140120-WA0000.jpg', NULL, 7, 'IMG-20140120-WA0000.jpg', ''),
(68, 59, 'IMG-20140206-WA0004.jpg', NULL, 1, 'IMG-20140206-WA0004.jpg', ''),
(69, 59, 'IMG-20140215-WA0000.jpg', NULL, 2, 'IMG-20140215-WA0000.jpg', ''),
(70, 59, 'IMG-20140206-WA0006.jpg', NULL, 3, 'IMG-20140206-WA0006.jpg', ''),
(71, 59, 'IMG-20140206-WA0002.jpg', NULL, 4, 'IMG-20140206-WA0002.jpg', ''),
(72, 59, 'IMG-20140206-WA0001.jpg', NULL, 5, 'IMG-20140206-WA0001.jpg', ''),
(73, 59, 'IMG-20140206-WA0000.jpg', NULL, 6, 'IMG-20140206-WA0000.jpg', ''),
(74, 59, 'IMG-20140120-WA0000.jpg', NULL, 7, 'IMG-20140120-WA0000.jpg', ''),
(75, 60, 'IMG-20140206-WA0004.jpg', NULL, 1, 'IMG-20140206-WA0004.jpg', ''),
(76, 60, 'IMG-20140215-WA0000.jpg', NULL, 2, 'IMG-20140215-WA0000.jpg', ''),
(77, 60, 'IMG-20140206-WA0006.jpg', NULL, 3, 'IMG-20140206-WA0006.jpg', ''),
(78, 60, 'IMG-20140206-WA0002.jpg', NULL, 4, 'IMG-20140206-WA0002.jpg', ''),
(79, 60, 'IMG-20140206-WA0001.jpg', NULL, 5, 'IMG-20140206-WA0001.jpg', ''),
(80, 60, 'IMG-20140206-WA0000.jpg', NULL, 6, 'IMG-20140206-WA0000.jpg', ''),
(81, 60, 'IMG-20140120-WA0000.jpg', NULL, 7, 'IMG-20140120-WA0000.jpg', ''),
(82, 61, 'IMG-20140206-WA0004.jpg', NULL, 1, 'IMG-20140206-WA0004.jpg', ''),
(83, 61, 'IMG-20140215-WA0000.jpg', NULL, 2, 'IMG-20140215-WA0000.jpg', ''),
(84, 61, 'IMG-20140206-WA0006.jpg', NULL, 3, 'IMG-20140206-WA0006.jpg', ''),
(85, 61, 'IMG-20140206-WA0002.jpg', NULL, 4, 'IMG-20140206-WA0002.jpg', ''),
(86, 61, 'IMG-20140206-WA0001.jpg', NULL, 5, 'IMG-20140206-WA0001.jpg', ''),
(87, 61, 'IMG-20140206-WA0000.jpg', NULL, 6, 'IMG-20140206-WA0000.jpg', ''),
(88, 61, 'IMG-20140120-WA0000.jpg', NULL, 7, 'IMG-20140120-WA0000.jpg', ''),
(89, 62, 'IMG-20140206-WA0004.jpg', NULL, 1, 'IMG-20140206-WA0004.jpg', ''),
(90, 62, 'IMG-20140215-WA0000.jpg', NULL, 2, 'IMG-20140215-WA0000.jpg', ''),
(91, 62, 'IMG-20140206-WA0006.jpg', NULL, 3, 'IMG-20140206-WA0006.jpg', ''),
(92, 62, 'IMG-20140206-WA0002.jpg', NULL, 4, 'IMG-20140206-WA0002.jpg', ''),
(93, 62, 'IMG-20140206-WA0001.jpg', NULL, 5, 'IMG-20140206-WA0001.jpg', ''),
(94, 62, 'IMG-20140206-WA0000.jpg', NULL, 6, 'IMG-20140206-WA0000.jpg', ''),
(95, 62, 'IMG-20140120-WA0000.jpg', NULL, 7, 'IMG-20140120-WA0000.jpg', ''),
(96, 63, 'IMG-20140206-WA0004.jpg', NULL, 1, 'IMG-20140206-WA0004.jpg', ''),
(97, 63, 'IMG-20140215-WA0000.jpg', NULL, 2, 'IMG-20140215-WA0000.jpg', ''),
(98, 63, 'IMG-20140206-WA0006.jpg', NULL, 3, 'IMG-20140206-WA0006.jpg', ''),
(99, 63, 'IMG-20140206-WA0002.jpg', NULL, 4, 'IMG-20140206-WA0002.jpg', ''),
(100, 63, 'IMG-20140206-WA0001.jpg', NULL, 5, 'IMG-20140206-WA0001.jpg', ''),
(101, 63, 'IMG-20140206-WA0000.jpg', NULL, 6, 'IMG-20140206-WA0000.jpg', ''),
(102, 63, 'IMG-20140120-WA0000.jpg', NULL, 7, 'IMG-20140120-WA0000.jpg', ''),
(103, 64, 'IMG-20140206-WA0004.jpg', NULL, 1, 'IMG-20140206-WA0004.jpg', ''),
(104, 64, 'IMG-20140215-WA0000.jpg', NULL, 2, 'IMG-20140215-WA0000.jpg', ''),
(105, 64, 'IMG-20140206-WA0006.jpg', NULL, 3, 'IMG-20140206-WA0006.jpg', ''),
(106, 64, 'IMG-20140206-WA0002.jpg', NULL, 4, 'IMG-20140206-WA0002.jpg', ''),
(107, 64, 'IMG-20140206-WA0001.jpg', NULL, 5, 'IMG-20140206-WA0001.jpg', ''),
(108, 64, 'IMG-20140206-WA0000.jpg', NULL, 6, 'IMG-20140206-WA0000.jpg', ''),
(109, 64, 'IMG-20140120-WA0000.jpg', NULL, 7, 'IMG-20140120-WA0000.jpg', ''),
(110, 65, 'IMG-20140206-WA0004.jpg', NULL, 1, 'IMG-20140206-WA0004.jpg', ''),
(111, 65, 'IMG-20140215-WA0000.jpg', NULL, 2, 'IMG-20140215-WA0000.jpg', ''),
(112, 65, 'IMG-20140206-WA0006.jpg', NULL, 3, 'IMG-20140206-WA0006.jpg', ''),
(113, 65, 'IMG-20140206-WA0002.jpg', NULL, 4, 'IMG-20140206-WA0002.jpg', ''),
(114, 65, 'IMG-20140206-WA0001.jpg', NULL, 5, 'IMG-20140206-WA0001.jpg', ''),
(115, 65, 'IMG-20140206-WA0000.jpg', NULL, 6, 'IMG-20140206-WA0000.jpg', ''),
(116, 65, 'IMG-20140120-WA0000.jpg', NULL, 7, 'IMG-20140120-WA0000.jpg', ''),
(117, 66, 'IMG-20140206-WA0004.jpg', NULL, 1, 'IMG-20140206-WA0004.jpg', ''),
(118, 66, 'IMG-20140215-WA0000.jpg', NULL, 2, 'IMG-20140215-WA0000.jpg', ''),
(119, 66, 'IMG-20140206-WA0006.jpg', NULL, 3, 'IMG-20140206-WA0006.jpg', ''),
(120, 66, 'IMG-20140206-WA0002.jpg', NULL, 4, 'IMG-20140206-WA0002.jpg', ''),
(121, 66, 'IMG-20140206-WA0001.jpg', NULL, 5, 'IMG-20140206-WA0001.jpg', ''),
(122, 66, 'IMG-20140206-WA0000.jpg', NULL, 6, 'IMG-20140206-WA0000.jpg', ''),
(123, 66, 'IMG-20140120-WA0000.jpg', NULL, 7, 'IMG-20140120-WA0000.jpg', ''),
(124, 67, '20140511_162446.jpg', NULL, 1, '20140511_162446.jpg', ''),
(125, 67, '20140511_162520.jpg', NULL, 2, '20140511_162520.jpg', ''),
(126, 67, '20140511_162531.jpg', NULL, 3, '20140511_162531.jpg', ''),
(127, 67, '20140511_162542.jpg', NULL, 4, '20140511_162542.jpg', ''),
(128, 67, '20140511_162552.jpg', NULL, 5, '20140511_162552.jpg', ''),
(129, 67, '20140511_162607.jpg', NULL, 6, '20140511_162607.jpg', ''),
(130, 67, '20140511_162630.jpg', NULL, 7, '20140511_162630.jpg', ''),
(131, 70, '20140511_154856.jpg', NULL, 1, '20140511_154856.jpg', ''),
(132, 70, '20140511_154751.jpg', NULL, 2, '20140511_154751.jpg', ''),
(133, 70, '20140511_154808.jpg', NULL, 3, '20140511_154808.jpg', ''),
(134, 70, '20140511_154821.jpg', NULL, 4, '20140511_154821.jpg', ''),
(135, 70, '20140511_154906.jpg', NULL, 5, '20140511_154906.jpg', ''),
(136, 70, '20140511_154947.jpg', NULL, 6, '20140511_154947.jpg', ''),
(137, 70, '20140511_154846.jpg', NULL, 7, '20140511_154846.jpg', ''),
(138, 71, '20140511_154947.jpg', NULL, 1, '20140511_154947.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `products_notifications`
--

CREATE TABLE IF NOT EXISTS `products_notifications` (
  `products_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`products_id`,`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products_options`
--

CREATE TABLE IF NOT EXISTS `products_options` (
  `products_options_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `products_options_name` varchar(32) NOT NULL DEFAULT '',
  `category_id` int(11) NOT NULL,
  `estado` varchar(1) NOT NULL,
  PRIMARY KEY (`products_options_id`,`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_options`
--

INSERT INTO `products_options` (`products_options_id`, `language_id`, `products_options_name`, `category_id`, `estado`) VALUES
(1, 1, 'Color', 1, 'I'),
(2, 1, 'Size', 1, 'I'),
(3, 1, 'Model', 1, 'I'),
(4, 1, 'Memory', 1, 'I'),
(5, 1, 'Version', 1, 'I'),
(6, 1, 'Financiamiento', 2, 'A'),
(7, 1, 'Motor Recien Reparado', 2, 'A'),
(8, 1, 'Nunca Chocada', 2, 'A'),
(9, 1, 'Recibo Moto', 2, 'A'),
(10, 1, 'Único Dueño', 2, 'A'),
(11, 1, 'Alarma', 3, 'A'),
(12, 1, 'Candado', 3, 'A'),
(13, 1, 'Rastreo Satelital', 3, 'A'),
(14, 1, 'Inmovilizador', 3, 'A'),
(15, 1, 'Tranca Palanca', 3, 'A'),
(16, 1, 'Alforjas', 4, 'A'),
(17, 1, 'Casco', 4, 'A'),
(18, 1, 'Casco Integrado', 4, 'A'),
(19, 1, 'Cauchos nuevos', 4, 'A'),
(20, 1, 'Escape Cromado', 4, 'A'),
(21, 1, 'Estribos', 4, 'A'),
(22, 1, 'Flecos', 4, 'A'),
(23, 1, 'Header', 4, 'A'),
(24, 1, 'Maleta', 4, 'A'),
(25, 1, 'Mata perros', 4, 'A'),
(26, 1, 'Parabrisas', 4, 'A'),
(27, 1, 'Posapies', 4, 'A'),
(28, 1, 'Cornetas', 5, 'A'),
(29, 1, 'Equipo de CD', 5, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `products_options_values`
--

CREATE TABLE IF NOT EXISTS `products_options_values` (
  `products_options_values_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `products_options_values_name` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`products_options_values_id`,`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_options_values`
--

INSERT INTO `products_options_values` (`products_options_values_id`, `language_id`, `products_options_values_name`) VALUES
(1, 1, '4 mb'),
(2, 1, '8 mb'),
(3, 1, '16 mb'),
(4, 1, '32 mb'),
(5, 1, 'Value'),
(6, 1, 'Premium'),
(7, 1, 'Deluxe'),
(8, 1, 'PS/2'),
(9, 1, 'USB'),
(10, 1, 'Download: Windows - English'),
(13, 1, 'Box: Windows - English');

-- --------------------------------------------------------

--
-- Table structure for table `products_options_values_to_products_options`
--

CREATE TABLE IF NOT EXISTS `products_options_values_to_products_options` (
  `products_options_values_to_products_options_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_options_id` int(11) NOT NULL,
  `products_options_values_id` int(11) NOT NULL,
  PRIMARY KEY (`products_options_values_to_products_options_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `products_options_values_to_products_options`
--

INSERT INTO `products_options_values_to_products_options` (`products_options_values_to_products_options_id`, `products_options_id`, `products_options_values_id`) VALUES
(1, 4, 1),
(2, 4, 2),
(3, 4, 3),
(4, 4, 4),
(5, 3, 5),
(6, 3, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 5, 10),
(13, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `products_tipo_publicacion`
--

CREATE TABLE IF NOT EXISTS `products_tipo_publicacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `tipo_publicacion_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad_fotos` int(11) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `precio` decimal(15,0) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `products_tipo_publicacion`
--

INSERT INTO `products_tipo_publicacion` (`id`, `products_id`, `tipo_publicacion_id`, `descripcion`, `cantidad_fotos`, `ubicacion`, `precio`, `estado`, `tipo`) VALUES
(1, 36, 1, 'Publicación ORO', 8, 'Superior', 45000, 'A', 'NUEVO'),
(2, 38, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(3, 39, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(4, 40, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(5, 41, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(6, 42, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(7, 43, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(8, 44, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(9, 46, 1, 'Publicación ORO', 8, 'Superior', 45000, 'A', 'NUEVO'),
(10, 47, 3, 'Publicación PLATA', 6, 'Alta', 40000, 'A', 'NUEVO'),
(11, 48, 3, 'Publicación PLATA', 6, 'Alta', 40000, 'A', 'NUEVO'),
(13, 50, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(14, 51, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(15, 52, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(16, 53, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(17, 54, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(18, 55, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(19, 56, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(20, 57, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(21, 58, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(22, 59, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(23, 60, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(24, 61, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(25, 62, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(26, 63, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(27, 64, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(28, 65, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(29, 66, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(30, 67, 3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO'),
(32, 70, 1, 'Publicación ORO', 8, 'Superior', 45000, 'A', 'NUEVO'),
(33, 71, 1, 'Publicación ORO', 8, 'Superior', 45000, 'A', 'NUEVO');

-- --------------------------------------------------------

--
-- Table structure for table `products_to_categories`
--

CREATE TABLE IF NOT EXISTS `products_to_categories` (
  `products_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`products_id`,`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_to_categories`
--

INSERT INTO `products_to_categories` (`products_id`, `categories_id`) VALUES
(1, 4),
(2, 4),
(3, 9),
(4, 10),
(5, 11),
(6, 10),
(7, 12),
(8, 13),
(9, 10),
(10, 10),
(11, 10),
(12, 10),
(13, 10),
(14, 15),
(15, 14),
(16, 15),
(17, 10),
(18, 10),
(19, 12),
(20, 15),
(21, 18),
(22, 19),
(23, 20),
(24, 20),
(25, 8),
(26, 9),
(27, 5),
(28, 21);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `reviews_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `customers_name` varchar(255) NOT NULL,
  `reviews_rating` int(1) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `reviews_status` tinyint(1) NOT NULL DEFAULT '0',
  `reviews_read` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reviews_id`),
  KEY `idx_reviews_products_id` (`products_id`),
  KEY `idx_reviews_customers_id` (`customers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviews_id`, `products_id`, `customers_id`, `customers_name`, `reviews_rating`, `date_added`, `last_modified`, `reviews_status`, `reviews_read`) VALUES
(1, 19, 0, 'John Doe', 5, '2014-04-16 16:35:09', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews_description`
--

CREATE TABLE IF NOT EXISTS `reviews_description` (
  `reviews_id` int(11) NOT NULL,
  `languages_id` int(11) NOT NULL,
  `reviews_text` text NOT NULL,
  PRIMARY KEY (`reviews_id`,`languages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews_description`
--

INSERT INTO `reviews_description` (`reviews_id`, `languages_id`, `reviews_text`) VALUES
(1, 1, 'This has to be one of the funniest movies released for 1999!');

-- --------------------------------------------------------

--
-- Table structure for table `sec_directory_whitelist`
--

CREATE TABLE IF NOT EXISTS `sec_directory_whitelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `directory` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sec_directory_whitelist`
--

INSERT INTO `sec_directory_whitelist` (`id`, `directory`) VALUES
(1, 'admin/backups'),
(2, 'admin/images/graphs'),
(3, 'images'),
(4, 'images/banners'),
(5, 'images/dvd'),
(6, 'images/gt_interactive'),
(7, 'images/hewlett_packard'),
(8, 'images/matrox'),
(9, 'images/microsoft'),
(10, 'images/samsung'),
(11, 'images/sierra'),
(12, 'includes/work'),
(13, 'pub');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `sesskey` varchar(32) NOT NULL,
  `expiry` int(11) unsigned NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`sesskey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sesskey`, `expiry`, `value`) VALUES
('aco42b2va4n7vfvc9lr4sgu013', 1399046949, 'language|s:7:"english";languages_id|s:1:"1";redirect_origin|a:2:{s:4:"page";s:9:"index.php";s:3:"get";a:0:{}}'),
('btstm6aqgv03korgn86ciqthb6', 1397685595, 'language|s:7:"english";languages_id|s:1:"1";admin|a:2:{s:2:"id";s:1:"1";s:8:"username";s:5:"kpizk";}'),
('hik1hn6bsov5abmcpaqqulsql5', 1399491747, 'language|s:7:"english";languages_id|s:1:"1";redirect_origin|a:2:{s:4:"page";s:9:"index.php";s:3:"get";a:0:{}}'),
('r81nkmr9erlb6bsjfobc57jdk4', 1399046846, 'sessiontoken|s:32:"62ac2f15c4d57efebebb15813927ce22";cart|O:12:"shoppingCart":5:{s:8:"contents";a:1:{i:24;a:1:{s:3:"qty";i:1;}}s:5:"total";d:90;s:6:"weight";d:8;s:6:"cartID";s:5:"99171";s:12:"content_type";b:0;}language|s:7:"english";languages_id|s:1:"1";currency|s:3:"USD";navigation|O:17:"navigationHistory":2:{s:4:"path";a:1:{i:0;a:4:{s:4:"page";s:9:"index.php";s:4:"mode";s:6:"NONSSL";s:3:"get";a:0:{}s:4:"post";a:0:{}}}s:8:"snapshot";a:0:{}}');

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE IF NOT EXISTS `specials` (
  `specials_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `specials_new_products_price` decimal(15,4) NOT NULL,
  `specials_date_added` datetime DEFAULT NULL,
  `specials_last_modified` datetime DEFAULT NULL,
  `expires_date` datetime DEFAULT NULL,
  `date_status_change` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`specials_id`),
  KEY `idx_specials_products_id` (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`specials_id`, `products_id`, `specials_new_products_price`, `specials_date_added`, `specials_last_modified`, `expires_date`, `date_status_change`, `status`) VALUES
(1, 3, 39.9900, '2014-04-16 16:35:10', NULL, NULL, NULL, 1),
(2, 5, 30.0000, '2014-04-16 16:35:10', NULL, NULL, NULL, 1),
(3, 6, 30.0000, '2014-04-16 16:35:10', NULL, NULL, NULL, 1),
(4, 16, 29.9900, '2014-04-16 16:35:10', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tax_class`
--

CREATE TABLE IF NOT EXISTS `tax_class` (
  `tax_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_class_title` varchar(32) NOT NULL,
  `tax_class_description` varchar(255) NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`tax_class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tax_class`
--

INSERT INTO `tax_class` (`tax_class_id`, `tax_class_title`, `tax_class_description`, `last_modified`, `date_added`) VALUES
(1, 'Taxable Goods', 'The following types of products are included non-food, services, etc', '2014-04-16 16:35:10', '2014-04-16 16:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `tax_rates`
--

CREATE TABLE IF NOT EXISTS `tax_rates` (
  `tax_rates_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_zone_id` int(11) NOT NULL,
  `tax_class_id` int(11) NOT NULL,
  `tax_priority` int(5) DEFAULT '1',
  `tax_rate` decimal(7,4) NOT NULL,
  `tax_description` varchar(255) NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`tax_rates_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tax_rates`
--

INSERT INTO `tax_rates` (`tax_rates_id`, `tax_zone_id`, `tax_class_id`, `tax_priority`, `tax_rate`, `tax_description`, `last_modified`, `date_added`) VALUES
(1, 1, 1, 1, 7.0000, 'FL TAX 7.0%', '2014-04-16 16:35:10', '2014-04-16 16:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_producto`
--

CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `descripcion`) VALUES
(1, 'Clasicas'),
(2, 'Cuatriciclos y triciclos'),
(3, 'Custom / Chopper'),
(4, 'De calle '),
(5, 'Deportivas / Naked'),
(6, 'Enduro / Cross y Trial'),
(7, 'Otro'),
(8, 'Scooter y ciclo motores'),
(9, 'Touring');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_publicacion`
--

CREATE TABLE IF NOT EXISTS `tipo_publicacion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad_fotos` int(11) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `precio` decimal(15,0) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_publicacion`
--

INSERT INTO `tipo_publicacion` (`id`, `descripcion`, `cantidad_fotos`, `ubicacion`, `precio`, `estado`, `tipo`) VALUES
(1, 'Publicación ORO', 8, 'Superior', 45000, 'A', 'NUEVO'),
(2, 'Publicación PLATA', 6, 'Alta', 40000, 'A', 'NUEVO'),
(3, 'Publicación BRONCE', 4, 'Media', 35000, 'A', 'NUEVO');

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `telefonodos` varchar(15) DEFAULT NULL,
  `ciudad` int(11) NOT NULL,
  `departamento` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `tipo_identificacion` varchar(10) NOT NULL,
  `pais` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`id`, `nombre`, `apellido`, `correo`, `password`, `salt`, `telefono`, `telefonodos`, `ciudad`, `departamento`, `direccion`, `identificacion`, `tipo_identificacion`, `pais`) VALUES
(1, 'Hector Andres', 'Chabur Tabares', 'hchabur@kpizk.com', 'xxx123', '', '', '', 1, 5, '', '', '', 1),
(2, 'Liliana', 'Perilla', 'lperilla', 'xxx', '', '', '', 1, 5, '', '', '', 1),
(3, 'nombre', 'apellido', 'correo', '123', '', '', '', 1, 5, '', '', '', 1),
(4, 'nombre', 'apellido', 'correo1@correo.com', '123456', '', '', '', 1, 5, '', '', '', 1),
(5, 'nombre', 'apellido', 'correo2@correo.com', '123456', '', '', '', 1, 5, '', '', '', 1),
(6, 'Santiago', 'Mejia Vargas', 'santiago@kpizk.com', '123', NULL, '', '', 1, 5, '', '', '', 1),
(7, 'Sandro', 'Salazar', 'sandre@sandre.com', 'kpizk', NULL, '321456', '21321654', 1, 5, 'las brazilias', '1088258569', 'cc', 1),
(8, 'Sandro', 'Salazar', 'sandrxe@sandre.com', 'kpizk', NULL, '321456', '21321654', 1, 5, 'las brazilias', '1088258569', 'cc', 1),
(9, 'Sandro', 'Salazar', 'sandrex@sandre.com', 'kpizk', NULL, '321456', '21321654', 1, 5, 'las brazilias', '1088258569', 'cc', 1),
(10, 'Sandro', 'Salazar', 'sandrex1@sandre.com', 'kpizk', NULL, '321456', '21321654', 1, 5, 'las brazilias', '1088258569', 'cc', 1),
(11, 'El enano', 'Brazilinio', 'elenano@kpizk.com', 'kpizk', NULL, '6321546', '211326', 1, 5, 'sao paulo', '123456', 'CC', 1),
(12, 'El enano', 'Brazilinio', 'elenano1@kpizk.com', 'kpizk', NULL, '6321546', '211326', 1, 5, 'sao paulo', '123456', 'CC', 1),
(13, 'El enano', 'Brazilinio', 'elenano2@kpizk.com', 'kpizk', NULL, '6321546', '211326', 1, 5, 'sao paulo', '123456', 'CC', 1),
(14, 'El enano', 'Brazilinio', 'elenano3@kpizk.com', 'kpizk', NULL, '6321546', '211326', 1, 5, 'sao paulo', '123456', 'CC', 1),
(15, 'El enano', 'Brazilinio', 'elenano4@kpizk.com', 'kpizk', NULL, '6321546', '211326', 1, 5, 'sao paulo', '123456', 'CC', 1),
(16, 'El enano', 'Brazilinio', 'elenano5@kpizk.com', 'kpizk', NULL, '6321546', '211326', 1, 5, 'sao paulo', '123456', 'CC', 1),
(17, 'El enano', 'Brazilinio', 'elenano6@kpizk.com', 'kpizk', NULL, '6321546', '211326', 1, 5, 'sao paulo', '123456', 'CC', 1),
(18, 'El enano', 'Brazilinio', 'elenano7@kpizk.com', 'kpizk', NULL, '6321546', '211326', 1, 5, 'sao paulo', '123456', 'CC', 1),
(19, 'david', 'zapata', 'david@kpizk.com', 'kpizk', NULL, '123465', '123465', 1, 5, 'kpizk', '123456897', 'CC', 1),
(20, 'david', 'zapata', 'david1@kpizk.com', 'kpizk', NULL, '123465', '123465', 1, 5, 'kpizk', '123456897', 'CC', 1),
(21, 'david', 'zapata', 'david3@kpizk.com', 'kpizk', NULL, '123465', '123465', 1, 5, 'kpizk', '123456897', 'CC', 1),
(22, 'david', 'zapata', 'david4@kpizk.com', 'kpizk', NULL, '123465', '123465', 1, 5, 'kpizk', '123456897', 'CC', 1),
(23, 'david', 'zapata', 'david5@kpizk.com', 'kpizk', NULL, '123465', '123465', 1, 5, 'kpizk', '123456897', 'CC', 1),
(24, 'david', 'zapata', 'david6@kpizk.com', 'kpizk', NULL, '123465', '123465', 1, 5, 'kpizk', '123456897', 'CC', 1),
(25, 'david', 'zapata', 'david7@kpizk.com', 'kpizk', NULL, '123465', '123465', 1, 5, 'kpizk', '123456897', 'CC', 1),
(26, 'david', 'zapata', 'david8@kpizk.com', 'kpizk', NULL, '123465', '123465', 1, 5, 'kpizk', '123456897', 'CC', 1),
(27, 'david', 'zapata', 'david9@kpizk.com', 'kpizk', NULL, '123465', '123465', 1, 5, 'kpizk', '123456897', 'CC', 1),
(28, 'david', 'zapata', 'david10@kpizk.com', 'kpizk', NULL, '123465', '123465', 1, 5, 'kpizk', '123456897', 'CC', 1),
(29, 'david', 'zapata', 'david11@kpizk.com', 'kpizk', NULL, '123465', '123465', 1, 5, 'kpizk', '123456897', 'CC', 1),
(30, 'david', 'zapata', 'david12@kpizk.com', 'kpizk', NULL, '123465', '123465', 1, 5, 'kpizk', '123456897', 'CC', 1),
(33, 'Cesar Augusto', 'Tabares Cardona', 'ankpi@hotmail.com', 'kpizk', NULL, '3148155078', '3184246820', 1818, 66, 'Los alpes dosquebradas', '10882585071', 'CC', 1),
(34, 'Sandro enano', 'Salazar', 'elnano@kpizk.com', 'kpizk', NULL, '321654', '132987', 0, 0, 'brazil', '123456', 'CC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `whos_online`
--

CREATE TABLE IF NOT EXISTS `whos_online` (
  `customer_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `session_id` varchar(128) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `time_entry` varchar(14) NOT NULL,
  `time_last_click` varchar(14) NOT NULL,
  `last_page_url` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `whos_online`
--

INSERT INTO `whos_online` (`customer_id`, `full_name`, `session_id`, `ip_address`, `time_entry`, `time_last_click`, `last_page_url`, `id`) VALUES
(0, 'Guest', 'r81nkmr9erlb6bsjfobc57jdk4', '127.0.0.1', '1399045233', '1399045406', '/testProyectos/mimoto/catalog/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE IF NOT EXISTS `zones` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_country_id` int(11) NOT NULL,
  `zone_code` varchar(32) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  PRIMARY KEY (`zone_id`),
  KEY `idx_zones_country_id` (`zone_country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=182 ;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `zone_country_id`, `zone_code`, `zone_name`) VALUES
(1, 223, 'AL', 'Alabama'),
(2, 223, 'AK', 'Alaska'),
(3, 223, 'AS', 'American Samoa'),
(4, 223, 'AZ', 'Arizona'),
(5, 223, 'AR', 'Arkansas'),
(6, 223, 'AF', 'Armed Forces Africa'),
(7, 223, 'AA', 'Armed Forces Americas'),
(8, 223, 'AC', 'Armed Forces Canada'),
(9, 223, 'AE', 'Armed Forces Europe'),
(10, 223, 'AM', 'Armed Forces Middle East'),
(11, 223, 'AP', 'Armed Forces Pacific'),
(12, 223, 'CA', 'California'),
(13, 223, 'CO', 'Colorado'),
(14, 223, 'CT', 'Connecticut'),
(15, 223, 'DE', 'Delaware'),
(16, 223, 'DC', 'District of Columbia'),
(17, 223, 'FM', 'Federated States Of Micronesia'),
(18, 223, 'FL', 'Florida'),
(19, 223, 'GA', 'Georgia'),
(20, 223, 'GU', 'Guam'),
(21, 223, 'HI', 'Hawaii'),
(22, 223, 'ID', 'Idaho'),
(23, 223, 'IL', 'Illinois'),
(24, 223, 'IN', 'Indiana'),
(25, 223, 'IA', 'Iowa'),
(26, 223, 'KS', 'Kansas'),
(27, 223, 'KY', 'Kentucky'),
(28, 223, 'LA', 'Louisiana'),
(29, 223, 'ME', 'Maine'),
(30, 223, 'MH', 'Marshall Islands'),
(31, 223, 'MD', 'Maryland'),
(32, 223, 'MA', 'Massachusetts'),
(33, 223, 'MI', 'Michigan'),
(34, 223, 'MN', 'Minnesota'),
(35, 223, 'MS', 'Mississippi'),
(36, 223, 'MO', 'Missouri'),
(37, 223, 'MT', 'Montana'),
(38, 223, 'NE', 'Nebraska'),
(39, 223, 'NV', 'Nevada'),
(40, 223, 'NH', 'New Hampshire'),
(41, 223, 'NJ', 'New Jersey'),
(42, 223, 'NM', 'New Mexico'),
(43, 223, 'NY', 'New York'),
(44, 223, 'NC', 'North Carolina'),
(45, 223, 'ND', 'North Dakota'),
(46, 223, 'MP', 'Northern Mariana Islands'),
(47, 223, 'OH', 'Ohio'),
(48, 223, 'OK', 'Oklahoma'),
(49, 223, 'OR', 'Oregon'),
(50, 223, 'PW', 'Palau'),
(51, 223, 'PA', 'Pennsylvania'),
(52, 223, 'PR', 'Puerto Rico'),
(53, 223, 'RI', 'Rhode Island'),
(54, 223, 'SC', 'South Carolina'),
(55, 223, 'SD', 'South Dakota'),
(56, 223, 'TN', 'Tennessee'),
(57, 223, 'TX', 'Texas'),
(58, 223, 'UT', 'Utah'),
(59, 223, 'VT', 'Vermont'),
(60, 223, 'VI', 'Virgin Islands'),
(61, 223, 'VA', 'Virginia'),
(62, 223, 'WA', 'Washington'),
(63, 223, 'WV', 'West Virginia'),
(64, 223, 'WI', 'Wisconsin'),
(65, 223, 'WY', 'Wyoming'),
(66, 38, 'AB', 'Alberta'),
(67, 38, 'BC', 'British Columbia'),
(68, 38, 'MB', 'Manitoba'),
(69, 38, 'NF', 'Newfoundland'),
(70, 38, 'NB', 'New Brunswick'),
(71, 38, 'NS', 'Nova Scotia'),
(72, 38, 'NT', 'Northwest Territories'),
(73, 38, 'NU', 'Nunavut'),
(74, 38, 'ON', 'Ontario'),
(75, 38, 'PE', 'Prince Edward Island'),
(76, 38, 'QC', 'Quebec'),
(77, 38, 'SK', 'Saskatchewan'),
(78, 38, 'YT', 'Yukon Territory'),
(79, 81, 'NDS', 'Niedersachsen'),
(80, 81, 'BAW', 'Baden-WÃ¼rttemberg'),
(81, 81, 'BAY', 'Bayern'),
(82, 81, 'BER', 'Berlin'),
(83, 81, 'BRG', 'Brandenburg'),
(84, 81, 'BRE', 'Bremen'),
(85, 81, 'HAM', 'Hamburg'),
(86, 81, 'HES', 'Hessen'),
(87, 81, 'MEC', 'Mecklenburg-Vorpommern'),
(88, 81, 'NRW', 'Nordrhein-Westfalen'),
(89, 81, 'RHE', 'Rheinland-Pfalz'),
(90, 81, 'SAR', 'Saarland'),
(91, 81, 'SAS', 'Sachsen'),
(92, 81, 'SAC', 'Sachsen-Anhalt'),
(93, 81, 'SCN', 'Schleswig-Holstein'),
(94, 81, 'THE', 'ThÃ¼ringen'),
(95, 14, 'WI', 'Wien'),
(96, 14, 'NO', 'NiederÃ¶sterreich'),
(97, 14, 'OO', 'OberÃ¶sterreich'),
(98, 14, 'SB', 'Salzburg'),
(99, 14, 'KN', 'KÃ¤rnten'),
(100, 14, 'ST', 'Steiermark'),
(101, 14, 'TI', 'Tirol'),
(102, 14, 'BL', 'Burgenland'),
(103, 14, 'VB', 'Voralberg'),
(104, 204, 'AG', 'Aargau'),
(105, 204, 'AI', 'Appenzell Innerrhoden'),
(106, 204, 'AR', 'Appenzell Ausserrhoden'),
(107, 204, 'BE', 'Bern'),
(108, 204, 'BL', 'Basel-Landschaft'),
(109, 204, 'BS', 'Basel-Stadt'),
(110, 204, 'FR', 'Freiburg'),
(111, 204, 'GE', 'Genf'),
(112, 204, 'GL', 'Glarus'),
(113, 204, 'JU', 'GraubÃ¼nden'),
(114, 204, 'JU', 'Jura'),
(115, 204, 'LU', 'Luzern'),
(116, 204, 'NE', 'Neuenburg'),
(117, 204, 'NW', 'Nidwalden'),
(118, 204, 'OW', 'Obwalden'),
(119, 204, 'SG', 'St. Gallen'),
(120, 204, 'SH', 'Schaffhausen'),
(121, 204, 'SO', 'Solothurn'),
(122, 204, 'SZ', 'Schwyz'),
(123, 204, 'TG', 'Thurgau'),
(124, 204, 'TI', 'Tessin'),
(125, 204, 'UR', 'Uri'),
(126, 204, 'VD', 'Waadt'),
(127, 204, 'VS', 'Wallis'),
(128, 204, 'ZG', 'Zug'),
(129, 204, 'ZH', 'ZÃ¼rich'),
(130, 195, 'A CoruÃ±a', 'A CoruÃ±a'),
(131, 195, 'Alava', 'Alava'),
(132, 195, 'Albacete', 'Albacete'),
(133, 195, 'Alicante', 'Alicante'),
(134, 195, 'Almeria', 'Almeria'),
(135, 195, 'Asturias', 'Asturias'),
(136, 195, 'Avila', 'Avila'),
(137, 195, 'Badajoz', 'Badajoz'),
(138, 195, 'Baleares', 'Baleares'),
(139, 195, 'Barcelona', 'Barcelona'),
(140, 195, 'Burgos', 'Burgos'),
(141, 195, 'Caceres', 'Caceres'),
(142, 195, 'Cadiz', 'Cadiz'),
(143, 195, 'Cantabria', 'Cantabria'),
(144, 195, 'Castellon', 'Castellon'),
(145, 195, 'Ceuta', 'Ceuta'),
(146, 195, 'Ciudad Real', 'Ciudad Real'),
(147, 195, 'Cordoba', 'Cordoba'),
(148, 195, 'Cuenca', 'Cuenca'),
(149, 195, 'Girona', 'Girona'),
(150, 195, 'Granada', 'Granada'),
(151, 195, 'Guadalajara', 'Guadalajara'),
(152, 195, 'Guipuzcoa', 'Guipuzcoa'),
(153, 195, 'Huelva', 'Huelva'),
(154, 195, 'Huesca', 'Huesca'),
(155, 195, 'Jaen', 'Jaen'),
(156, 195, 'La Rioja', 'La Rioja'),
(157, 195, 'Las Palmas', 'Las Palmas'),
(158, 195, 'Leon', 'Leon'),
(159, 195, 'Lleida', 'Lleida'),
(160, 195, 'Lugo', 'Lugo'),
(161, 195, 'Madrid', 'Madrid'),
(162, 195, 'Malaga', 'Malaga'),
(163, 195, 'Melilla', 'Melilla'),
(164, 195, 'Murcia', 'Murcia'),
(165, 195, 'Navarra', 'Navarra'),
(166, 195, 'Ourense', 'Ourense'),
(167, 195, 'Palencia', 'Palencia'),
(168, 195, 'Pontevedra', 'Pontevedra'),
(169, 195, 'Salamanca', 'Salamanca'),
(170, 195, 'Santa Cruz de Tenerife', 'Santa Cruz de Tenerife'),
(171, 195, 'Segovia', 'Segovia'),
(172, 195, 'Sevilla', 'Sevilla'),
(173, 195, 'Soria', 'Soria'),
(174, 195, 'Tarragona', 'Tarragona'),
(175, 195, 'Teruel', 'Teruel'),
(176, 195, 'Toledo', 'Toledo'),
(177, 195, 'Valencia', 'Valencia'),
(178, 195, 'Valladolid', 'Valladolid'),
(179, 195, 'Vizcaya', 'Vizcaya'),
(180, 195, 'Zamora', 'Zamora'),
(181, 195, 'Zaragoza', 'Zaragoza');

-- --------------------------------------------------------

--
-- Table structure for table `zones_to_geo_zones`
--

CREATE TABLE IF NOT EXISTS `zones_to_geo_zones` (
  `association_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_country_id` int(11) NOT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `geo_zone_id` int(11) DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`association_id`),
  KEY `idx_zones_to_geo_zones_country_id` (`zone_country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `zones_to_geo_zones`
--

INSERT INTO `zones_to_geo_zones` (`association_id`, `zone_country_id`, `zone_id`, `geo_zone_id`, `last_modified`, `date_added`) VALUES
(1, 223, 18, 1, NULL, '2014-04-16 16:35:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
