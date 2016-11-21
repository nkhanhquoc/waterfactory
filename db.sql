/*
SQLyog Community v12.09 (64 bit)
MySQL - 5.6.25 : Database - proscom
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`proscom` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `proscom`;

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_assignment` */

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values ('admin','1',1468421772);

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item` */

insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('/*',2,NULL,NULL,NULL,1468421689,1468421689),('/admin/*',2,NULL,NULL,NULL,1468341067,1468341067),('/admin/assignment/*',2,NULL,NULL,NULL,1468339654,1468339654),('/admin/assignment/assign',2,NULL,NULL,NULL,1468339526,1468339526),('/admin/assignment/index',2,NULL,NULL,NULL,1468339490,1468339490),('/admin/assignment/revoke',2,NULL,NULL,NULL,1468339653,1468339653),('/admin/assignment/view',2,NULL,NULL,NULL,1468339512,1468339512),('/admin/default/*',2,NULL,NULL,NULL,1468339732,1468339732),('/admin/default/index',2,NULL,NULL,NULL,1468339725,1468339725),('/admin/menu/*',2,NULL,NULL,NULL,1468340134,1468340134),('/admin/menu/create',2,NULL,NULL,NULL,1468340044,1468340044),('/admin/menu/delete',2,NULL,NULL,NULL,1468340057,1468340057),('/admin/menu/index',2,NULL,NULL,NULL,1468339963,1468339963),('/admin/menu/update',2,NULL,NULL,NULL,1468340049,1468340049),('/admin/menu/view',2,NULL,NULL,NULL,1468339967,1468339967),('/admin/permission/*',2,NULL,NULL,NULL,1468341039,1468341039),('/admin/permission/assign',2,NULL,NULL,NULL,1468341032,1468341032),('/admin/permission/create',2,NULL,NULL,NULL,1468341001,1468341001),('/admin/permission/delete',2,NULL,NULL,NULL,1468341006,1468341006),('/admin/permission/index',2,NULL,NULL,NULL,1468340144,1468340144),('/admin/permission/remove',2,NULL,NULL,NULL,1468341033,1468341033),('/admin/permission/update',2,NULL,NULL,NULL,1468341003,1468341003),('/admin/permission/view',2,NULL,NULL,NULL,1468341000,1468341000),('/admin/role/*',2,NULL,NULL,NULL,1468341046,1468341046),('/admin/role/assign',2,NULL,NULL,NULL,1468341045,1468341045),('/admin/role/create',2,NULL,NULL,NULL,1468341044,1468341044),('/admin/role/delete',2,NULL,NULL,NULL,1468341045,1468341045),('/admin/role/index',2,NULL,NULL,NULL,1468341039,1468341039),('/admin/role/remove',2,NULL,NULL,NULL,1468341046,1468341046),('/admin/role/update',2,NULL,NULL,NULL,1468341045,1468341045),('/admin/role/view',2,NULL,NULL,NULL,1468341044,1468341044),('/admin/route/*',2,NULL,NULL,NULL,1468341048,1468341048),('/admin/route/assign',2,NULL,NULL,NULL,1468341047,1468341047),('/admin/route/create',2,NULL,NULL,NULL,1468341047,1468341047),('/admin/route/index',2,NULL,NULL,NULL,1468341046,1468341046),('/admin/route/refresh',2,NULL,NULL,NULL,1468341048,1468341048),('/admin/route/remove',2,NULL,NULL,NULL,1468341047,1468341047),('/admin/rule/*',2,NULL,NULL,NULL,1468341050,1468341050),('/admin/rule/create',2,NULL,NULL,NULL,1468341049,1468341049),('/admin/rule/delete',2,NULL,NULL,NULL,1468341049,1468341049),('/admin/rule/index',2,NULL,NULL,NULL,1468341048,1468341048),('/admin/rule/update',2,NULL,NULL,NULL,1468341049,1468341049),('/admin/rule/view',2,NULL,NULL,NULL,1468341049,1468341049),('/admin/user/*',2,NULL,NULL,NULL,1468341066,1468341066),('/admin/user/activate',2,NULL,NULL,NULL,1468341066,1468341066),('/admin/user/change-password',2,NULL,NULL,NULL,1468341066,1468341066),('/admin/user/delete',2,NULL,NULL,NULL,1468341053,1468341053),('/admin/user/index',2,NULL,NULL,NULL,1468341051,1468341051),('/admin/user/login',2,NULL,NULL,NULL,1468341054,1468341054),('/admin/user/logout',2,NULL,NULL,NULL,1468341055,1468341055),('/admin/user/request-password-reset',2,NULL,NULL,NULL,1468341065,1468341065),('/admin/user/reset-password',2,NULL,NULL,NULL,1468341065,1468341065),('/admin/user/signup',2,NULL,NULL,NULL,1468341064,1468341064),('/admin/user/view',2,NULL,NULL,NULL,1468341052,1468341052),('/app/*',2,NULL,NULL,NULL,1468341138,1468341138),('/app/galleryApi',2,NULL,NULL,NULL,1468341137,1468341137),('/banner/*',2,NULL,NULL,NULL,1468341159,1468341159),('/banner/create',2,NULL,NULL,NULL,1468341158,1468341158),('/banner/delete',2,NULL,NULL,NULL,1468341159,1468341159),('/banner/index',2,NULL,NULL,NULL,1468341149,1468341149),('/banner/update',2,NULL,NULL,NULL,1468341159,1468341159),('/banner/view',2,NULL,NULL,NULL,1468341157,1468341157),('/country/*',2,NULL,NULL,NULL,1468341170,1468341170),('/country/create',2,NULL,NULL,NULL,1468341160,1468341160),('/country/delete',2,NULL,NULL,NULL,1468341168,1468341168),('/country/index',2,NULL,NULL,NULL,1468341160,1468341160),('/country/update',2,NULL,NULL,NULL,1468341168,1468341168),('/country/view',2,NULL,NULL,NULL,1468341160,1468341160),('/debug/*',2,NULL,NULL,NULL,1468341111,1468341111),('/debug/default/*',2,NULL,NULL,NULL,1468341110,1468341110),('/debug/default/download-mail',2,NULL,NULL,NULL,1468341101,1468341101),('/debug/default/index',2,NULL,NULL,NULL,1468341071,1468341071),('/debug/default/toolbar',2,NULL,NULL,NULL,1468341077,1468341077),('/debug/default/view',2,NULL,NULL,NULL,1468341075,1468341075),('/distric/*',2,NULL,NULL,NULL,1468341185,1468341185),('/distric/create',2,NULL,NULL,NULL,1468341180,1468341180),('/distric/delete',2,NULL,NULL,NULL,1468341184,1468341184),('/distric/index',2,NULL,NULL,NULL,1468341176,1468341176),('/distric/update',2,NULL,NULL,NULL,1468341182,1468341182),('/distric/view',2,NULL,NULL,NULL,1468341179,1468341179),('/gii/*',2,NULL,NULL,NULL,1468341136,1468341136),('/gii/default/*',2,NULL,NULL,NULL,1468341135,1468341135),('/gii/default/action',2,NULL,NULL,NULL,1468341135,1468341135),('/gii/default/diff',2,NULL,NULL,NULL,1468341134,1468341134),('/gii/default/index',2,NULL,NULL,NULL,1468341113,1468341113),('/gii/default/preview',2,NULL,NULL,NULL,1468341134,1468341134),('/gii/default/view',2,NULL,NULL,NULL,1468341133,1468341133),('/menu/*',2,NULL,NULL,NULL,1468421684,1468421684),('/menu/create',2,NULL,NULL,NULL,1468421684,1468421684),('/menu/delete',2,NULL,NULL,NULL,1468421684,1468421684),('/menu/galleryApi',2,NULL,NULL,NULL,1468421684,1468421684),('/menu/index',2,NULL,NULL,NULL,1468421684,1468421684),('/menu/update',2,NULL,NULL,NULL,1468421684,1468421684),('/menu/view',2,NULL,NULL,NULL,1468421684,1468421684),('/mode/*',2,NULL,NULL,NULL,1468421686,1468421686),('/mode/create',2,NULL,NULL,NULL,1468421685,1468421685),('/mode/delete',2,NULL,NULL,NULL,1468421685,1468421685),('/mode/design',2,NULL,NULL,NULL,1479716667,1479716667),('/mode/index',2,NULL,NULL,NULL,1468421684,1468421684),('/mode/update',2,NULL,NULL,NULL,1468421685,1468421685),('/mode/view',2,NULL,NULL,NULL,1468421684,1468421684),('/module-status/*',2,NULL,NULL,NULL,1479716667,1479716667),('/module-status/create',2,NULL,NULL,NULL,1479716667,1479716667),('/module-status/delete',2,NULL,NULL,NULL,1479716667,1479716667),('/module-status/index',2,NULL,NULL,NULL,1479716667,1479716667),('/module-status/update',2,NULL,NULL,NULL,1479716667,1479716667),('/module-status/view',2,NULL,NULL,NULL,1479716667,1479716667),('/modules/*',2,NULL,NULL,NULL,1468421687,1468421687),('/modules/create',2,NULL,NULL,NULL,1468421686,1468421686),('/modules/delete',2,NULL,NULL,NULL,1468421687,1468421687),('/modules/index',2,NULL,NULL,NULL,1468421686,1468421686),('/modules/update',2,NULL,NULL,NULL,1468421686,1468421686),('/modules/view',2,NULL,NULL,NULL,1468421686,1468421686),('/output-mode/*',2,NULL,NULL,NULL,1468421688,1468421688),('/output-mode/create',2,NULL,NULL,NULL,1468421687,1468421687),('/output-mode/delete',2,NULL,NULL,NULL,1468421687,1468421687),('/output-mode/index',2,NULL,NULL,NULL,1468421687,1468421687),('/output-mode/update',2,NULL,NULL,NULL,1468421687,1468421687),('/output-mode/view',2,NULL,NULL,NULL,1468421687,1468421687),('/param-config/*',2,NULL,NULL,NULL,1468421688,1468421688),('/param-config/create',2,NULL,NULL,NULL,1468421688,1468421688),('/param-config/delete',2,NULL,NULL,NULL,1468421688,1468421688),('/param-config/index',2,NULL,NULL,NULL,1468421688,1468421688),('/param-config/update',2,NULL,NULL,NULL,1468421688,1468421688),('/param-config/view',2,NULL,NULL,NULL,1468421688,1468421688),('/provincial/*',2,NULL,NULL,NULL,1468421688,1468421688),('/provincial/create',2,NULL,NULL,NULL,1468421688,1468421688),('/provincial/delete',2,NULL,NULL,NULL,1468421688,1468421688),('/provincial/index',2,NULL,NULL,NULL,1468421688,1468421688),('/provincial/update',2,NULL,NULL,NULL,1468421688,1468421688),('/provincial/view',2,NULL,NULL,NULL,1468421688,1468421688),('/runtime-statistics/*',2,NULL,NULL,NULL,1479716667,1479716667),('/runtime-statistics/create',2,NULL,NULL,NULL,1479716667,1479716667),('/runtime-statistics/delete',2,NULL,NULL,NULL,1479716667,1479716667),('/runtime-statistics/index',2,NULL,NULL,NULL,1479716667,1479716667),('/runtime-statistics/update',2,NULL,NULL,NULL,1479716667,1479716667),('/runtime-statistics/view',2,NULL,NULL,NULL,1479716667,1479716667),('/runtime/*',2,NULL,NULL,NULL,1479716667,1479716667),('/runtime/create',2,NULL,NULL,NULL,1479716667,1479716667),('/runtime/delete',2,NULL,NULL,NULL,1479716667,1479716667),('/runtime/index',2,NULL,NULL,NULL,1479716667,1479716667),('/runtime/update',2,NULL,NULL,NULL,1479716667,1479716667),('/runtime/view',2,NULL,NULL,NULL,1479716667,1479716667),('/sensor/*',2,NULL,NULL,NULL,1479716667,1479716667),('/sensor/create',2,NULL,NULL,NULL,1479716667,1479716667),('/sensor/delete',2,NULL,NULL,NULL,1479716667,1479716667),('/sensor/index',2,NULL,NULL,NULL,1479716667,1479716667),('/sensor/update',2,NULL,NULL,NULL,1479716667,1479716667),('/sensor/view',2,NULL,NULL,NULL,1479716667,1479716667),('/site/*',2,NULL,NULL,NULL,1468421689,1468421689),('/site/captcha',2,NULL,NULL,NULL,1468421688,1468421688),('/site/error',2,NULL,NULL,NULL,1468421688,1468421688),('/site/index',2,NULL,NULL,NULL,1468421688,1468421688),('/site/login',2,NULL,NULL,NULL,1468421689,1468421689),('/site/logout',2,NULL,NULL,NULL,1468421689,1468421689),('/socket/*',2,NULL,NULL,NULL,1479716667,1479716667),('/socket/index',2,NULL,NULL,NULL,1479716667,1479716667),('/timer-counter/*',2,NULL,NULL,NULL,1479716667,1479716667),('/timer-counter/create',2,NULL,NULL,NULL,1479716667,1479716667),('/timer-counter/delete',2,NULL,NULL,NULL,1479716667,1479716667),('/timer-counter/index',2,NULL,NULL,NULL,1479716667,1479716667),('/timer-counter/update',2,NULL,NULL,NULL,1479716667,1479716667),('/timer-counter/view',2,NULL,NULL,NULL,1479716667,1479716667),('/user/*',2,NULL,NULL,NULL,1468421689,1468421689),('/user/create',2,NULL,NULL,NULL,1468421689,1468421689),('/user/delete',2,NULL,NULL,NULL,1468421689,1468421689),('/user/galleryApi',2,NULL,NULL,NULL,1468421689,1468421689),('/user/index',2,NULL,NULL,NULL,1468421689,1468421689),('/user/update',2,NULL,NULL,NULL,1468421689,1468421689),('/user/view',2,NULL,NULL,NULL,1468421689,1468421689),('admin',1,'Administrator',NULL,NULL,1468421733,1468421733);

/*Table structure for table `auth_item_child` */

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item_child` */

insert  into `auth_item_child`(`parent`,`child`) values ('admin','/*'),('admin','/admin/*'),('admin','/admin/assignment/*'),('admin','/admin/assignment/assign'),('admin','/admin/assignment/index'),('admin','/admin/assignment/revoke'),('admin','/admin/assignment/view'),('admin','/admin/default/*'),('admin','/admin/default/index'),('admin','/admin/menu/*'),('admin','/admin/menu/create'),('admin','/admin/menu/delete'),('admin','/admin/menu/index'),('admin','/admin/menu/update'),('admin','/admin/menu/view'),('admin','/admin/permission/*'),('admin','/admin/permission/assign'),('admin','/admin/permission/create'),('admin','/admin/permission/delete'),('admin','/admin/permission/index'),('admin','/admin/permission/remove'),('admin','/admin/permission/update'),('admin','/admin/permission/view'),('admin','/admin/role/*'),('admin','/admin/role/assign'),('admin','/admin/role/create'),('admin','/admin/role/delete'),('admin','/admin/role/index'),('admin','/admin/role/remove'),('admin','/admin/role/update'),('admin','/admin/role/view'),('admin','/admin/route/*'),('admin','/admin/route/assign'),('admin','/admin/route/create'),('admin','/admin/route/index'),('admin','/admin/route/refresh'),('admin','/admin/route/remove'),('admin','/admin/rule/*'),('admin','/admin/rule/create'),('admin','/admin/rule/delete'),('admin','/admin/rule/index'),('admin','/admin/rule/update'),('admin','/admin/rule/view'),('admin','/admin/user/*'),('admin','/admin/user/activate'),('admin','/admin/user/change-password'),('admin','/admin/user/delete'),('admin','/admin/user/index'),('admin','/admin/user/login'),('admin','/admin/user/logout'),('admin','/admin/user/request-password-reset'),('admin','/admin/user/reset-password'),('admin','/admin/user/signup'),('admin','/admin/user/view'),('admin','/app/*'),('admin','/app/galleryApi'),('admin','/banner/*'),('admin','/banner/create'),('admin','/banner/delete'),('admin','/banner/index'),('admin','/banner/update'),('admin','/banner/view'),('admin','/country/*'),('admin','/country/create'),('admin','/country/delete'),('admin','/country/index'),('admin','/country/update'),('admin','/country/view'),('admin','/debug/*'),('admin','/debug/default/*'),('admin','/debug/default/download-mail'),('admin','/debug/default/index'),('admin','/debug/default/toolbar'),('admin','/debug/default/view'),('admin','/distric/*'),('admin','/distric/create'),('admin','/distric/delete'),('admin','/distric/index'),('admin','/distric/update'),('admin','/distric/view'),('admin','/gii/*'),('admin','/gii/default/*'),('admin','/gii/default/action'),('admin','/gii/default/diff'),('admin','/gii/default/index'),('admin','/gii/default/preview'),('admin','/gii/default/view'),('admin','/menu/*'),('admin','/menu/create'),('admin','/menu/delete'),('admin','/menu/galleryApi'),('admin','/menu/index'),('admin','/menu/update'),('admin','/menu/view'),('admin','/mode/*'),('admin','/mode/create'),('admin','/mode/delete'),('admin','/mode/design'),('admin','/mode/index'),('admin','/mode/update'),('admin','/mode/view'),('admin','/module-status/*'),('admin','/module-status/create'),('admin','/module-status/delete'),('admin','/module-status/index'),('admin','/module-status/update'),('admin','/module-status/view'),('admin','/modules/*'),('admin','/modules/create'),('admin','/modules/delete'),('admin','/modules/index'),('admin','/modules/update'),('admin','/modules/view'),('admin','/output-mode/*'),('admin','/output-mode/create'),('admin','/output-mode/delete'),('admin','/output-mode/index'),('admin','/output-mode/update'),('admin','/output-mode/view'),('admin','/param-config/*'),('admin','/param-config/create'),('admin','/param-config/delete'),('admin','/param-config/index'),('admin','/param-config/update'),('admin','/param-config/view'),('admin','/provincial/*'),('admin','/provincial/create'),('admin','/provincial/delete'),('admin','/provincial/index'),('admin','/provincial/update'),('admin','/provincial/view'),('admin','/runtime-statistics/*'),('admin','/runtime-statistics/create'),('admin','/runtime-statistics/delete'),('admin','/runtime-statistics/index'),('admin','/runtime-statistics/update'),('admin','/runtime-statistics/view'),('admin','/runtime/*'),('admin','/runtime/create'),('admin','/runtime/delete'),('admin','/runtime/index'),('admin','/runtime/update'),('admin','/runtime/view'),('admin','/sensor/*'),('admin','/sensor/create'),('admin','/sensor/delete'),('admin','/sensor/index'),('admin','/sensor/update'),('admin','/sensor/view'),('admin','/site/*'),('admin','/site/captcha'),('admin','/site/error'),('admin','/site/index'),('admin','/site/login'),('admin','/site/logout'),('admin','/socket/*'),('admin','/socket/index'),('admin','/timer-counter/*'),('admin','/timer-counter/create'),('admin','/timer-counter/delete'),('admin','/timer-counter/index'),('admin','/timer-counter/update'),('admin','/timer-counter/view'),('admin','/user/*'),('admin','/user/create'),('admin','/user/delete'),('admin','/user/galleryApi'),('admin','/user/index'),('admin','/user/update'),('admin','/user/view');

/*Table structure for table `auth_rule` */

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_rule` */

/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `priority` int(11) unsigned DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `banner` */

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `country_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  CONSTRAINT `country_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `country` */

insert  into `country`(`id`,`code`,`name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'084','Việt Nam',1,'2016-09-21 00:02:09',1,'2016-09-21 23:57:29');

/*Table structure for table `data_client` */

DROP TABLE IF EXISTS `data_client`;

CREATE TABLE `data_client` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) unsigned NOT NULL,
  `data` text CHARACTER SET latin1 NOT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '0 - not been sent, 1 - sent',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `module_id` (`module_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `data_client_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`),
  CONSTRAINT `data_client_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `data_client` */

/*Table structure for table `distric` */

DROP TABLE IF EXISTS `distric`;

CREATE TABLE `distric` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `provincial_id` int(11) unsigned NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `provincial_id` (`provincial_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `distric_ibfk_1` FOREIGN KEY (`provincial_id`) REFERENCES `provincial` (`id`),
  CONSTRAINT `distric_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  CONSTRAINT `distric_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `distric` */

insert  into `distric`(`id`,`name`,`code`,`provincial_id`,`updated_by`,`updated_at`,`created_by`,`created_at`) values (1,'Ba Đình','001',1,1,'2016-09-21 23:58:50',1,'2016-09-21 23:26:24');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  `icon` tinytext,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`parent`,`route`,`order`,`data`,`icon`) values (1,'Admin',NULL,NULL,1,NULL,'icon-user-following'),(2,'Account',1,'/admin/user/index',1,NULL,'icon-users'),(3,'Menu',1,'/menu/index',2,NULL,'icon-list'),(4,'Location',NULL,NULL,2,NULL,'icon-home'),(5,'Country',4,'/country/index',1,NULL,'icon-plane'),(6,'Distric',4,'/distric/index',3,NULL,'icon-plane'),(7,'Provincial',4,'/provincial/index',2,NULL,'icon-plane'),(8,'Modules',NULL,NULL,3,NULL,'icon-grid'),(9,'Mode',8,'/mode/index',1,NULL,'icon-plus'),(10,'Module',8,'/modules/index',2,NULL,'icon-plus'),(11,'Output mode',8,'/output-mode/index',3,NULL,'icon-plus'),(12,'Parameter',8,'/param-config/index',4,NULL,'icon-plus'),(13,'Sensor',8,'/sensor/index',11,NULL,'icon-plus'),(14,'Time counter',8,'/timer-counter/index',11,NULL,'icon-plus'),(15,'Runtime statistics',8,'/runtime-statistics/index',11,NULL,'icon-plus');

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1467445829),('m140506_102106_rbac_init',1467445887),('m140602_111327_create_menu_table',1467445835),('m160312_050000_create_user',1467445836);

/*Table structure for table `mode` */

DROP TABLE IF EXISTS `mode`;

CREATE TABLE `mode` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `mode_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  CONSTRAINT `mode_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `mode` */

insert  into `mode`(`id`,`name`,`image_path`,`updated_at`,`updated_by`,`created_at`,`created_by`) values (1,'Demo','/uploads/mode/52f70295f962367496a5b336116465e8.jpg','2016-11-21 08:54:22',1,'2016-09-20 23:45:22',1);

/*Table structure for table `module_status` */

DROP TABLE IF EXISTS `module_status`;

CREATE TABLE `module_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) unsigned NOT NULL,
  `bom_doi_luu_1` varchar(50) DEFAULT NULL,
  `bom_doi_luu_2` varchar(50) DEFAULT NULL,
  `bom_cap_nuoc_lanh_1` varchar(50) DEFAULT NULL,
  `bom_cap_nuoc_lanh_2` varchar(50) DEFAULT NULL,
  `bom_hoi_duong_ong_1` varchar(50) DEFAULT NULL,
  `bom_hoi_duong_ong_2` varchar(50) DEFAULT NULL,
  `bom_tang_ap_1` varchar(50) DEFAULT NULL,
  `bom_tang_ap_2` varchar(50) DEFAULT NULL,
  `bom_ha_nhiet_bon_gia_nhiet_1` varchar(50) DEFAULT NULL,
  `bom_ha_nhiet_bon_gia_nhiet_2` varchar(50) DEFAULT NULL,
  `van_dien_tu_ba_nga` varchar(50) DEFAULT NULL,
  `van_dien_tu_mot_chieu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_id` (`module_id`),
  CONSTRAINT `module_status_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `module_status` */

/*Table structure for table `modules` */

DROP TABLE IF EXISTS `modules`;

CREATE TABLE `modules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `msisdn` varchar(15) NOT NULL,
  `mode_id` int(10) unsigned DEFAULT '0',
  `country_id` int(11) unsigned DEFAULT NULL,
  `privincial_id` int(11) unsigned DEFAULT NULL,
  `distric_id` int(11) unsigned DEFAULT NULL,
  `customer_code` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `alarm` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `money` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_code` (`customer_code`),
  KEY `mode_id` (`mode_id`),
  KEY `country_id` (`country_id`),
  KEY `privincial_id` (`privincial_id`),
  KEY `distric_id` (`distric_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`mode_id`) REFERENCES `mode` (`id`),
  CONSTRAINT `modules_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  CONSTRAINT `modules_ibfk_3` FOREIGN KEY (`privincial_id`) REFERENCES `provincial` (`id`),
  CONSTRAINT `modules_ibfk_4` FOREIGN KEY (`distric_id`) REFERENCES `distric` (`id`),
  CONSTRAINT `modules_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  CONSTRAINT `modules_ibfk_6` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `modules` */

insert  into `modules`(`id`,`name`,`msisdn`,`mode_id`,`country_id`,`privincial_id`,`distric_id`,`customer_code`,`address`,`alarm`,`created_by`,`created_at`,`updated_by`,`updated_at`,`money`) values (1,NULL,'000986953037',1,1,1,1,'000001','16/55, ngõ 381 Nguyễn Khang, Cầu Giấy, Hà Nội',NULL,1,'2016-09-21 23:56:57',1,'2016-09-21 23:56:57',NULL);

/*Table structure for table `output_mode` */

DROP TABLE IF EXISTS `output_mode`;

CREATE TABLE `output_mode` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) unsigned NOT NULL,
  `convection_pump` varchar(255) DEFAULT NULL,
  `cold_water_supply_pump` varchar(255) DEFAULT NULL,
  `return_pump` varchar(255) DEFAULT NULL,
  `incresed_pressure_pump` varchar(255) DEFAULT NULL,
  `heat_pump` varchar(255) DEFAULT NULL,
  `heater_resister` varchar(255) DEFAULT NULL,
  `three_way_valve` varchar(255) DEFAULT NULL,
  `backflow_valve` varchar(255) DEFAULT NULL,
  `reserved` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `module_id` (`module_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `output_mode_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`),
  CONSTRAINT `output_mode_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  CONSTRAINT `output_mode_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `output_mode` */

insert  into `output_mode`(`id`,`module_id`,`convection_pump`,`cold_water_supply_pump`,`return_pump`,`incresed_pressure_pump`,`heat_pump`,`heater_resister`,`three_way_valve`,`backflow_valve`,`reserved`,`updated_at`,`updated_by`,`created_at`,`created_by`) values (1,1,'000000110000000100000000','000000110000000100000000','000000110000000100000000','000000110000000100000000','000000110000000000000011','011001000000000100000000','000000110101000000001010','000000010000000100000000','0000000100000000','2016-09-23 08:46:25',1,'2016-09-23 00:06:15',1);

/*Table structure for table `param_config` */

DROP TABLE IF EXISTS `param_config`;

CREATE TABLE `param_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) unsigned NOT NULL,
  `convection_pump` varchar(255) DEFAULT NULL,
  `cold_water_supply_pump` varchar(255) DEFAULT NULL,
  `return_pump` varchar(255) DEFAULT NULL,
  `incresed_pressure_pump` varchar(255) DEFAULT NULL,
  `heat_pump` varchar(255) DEFAULT NULL,
  `heat_resistor` varchar(255) DEFAULT NULL,
  `three_way_valve` varchar(255) DEFAULT NULL,
  `backflow_valve` varchar(255) DEFAULT NULL,
  `reserved` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `module_id` (`module_id`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `param_config_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`),
  CONSTRAINT `param_config_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  CONSTRAINT `param_config_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `param_config` */

/*Table structure for table `provincial` */

DROP TABLE IF EXISTS `provincial`;

CREATE TABLE `provincial` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `country_id` (`country_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `provincial_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  CONSTRAINT `provincial_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  CONSTRAINT `provincial_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `provincial` */

insert  into `provincial`(`id`,`name`,`code`,`country_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Hà Nội','004',1,1,'2016-09-21 23:57:52',1,'2016-09-21 23:57:52');

/*Table structure for table `runtime_statistics` */

DROP TABLE IF EXISTS `runtime_statistics`;

CREATE TABLE `runtime_statistics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) unsigned NOT NULL,
  `time_bom_doi_luu_1` varchar(50) DEFAULT NULL,
  `time_bom_doi_luu_2` varchar(50) DEFAULT NULL,
  `time_chay_bom_cap_nuoc_lanh_1` varchar(50) DEFAULT NULL,
  `time_chay_bom_cap_nuoc_lanh_2` varchar(50) DEFAULT NULL,
  `time_chay_bom_hoi_duong_ong_1` varchar(50) DEFAULT NULL,
  `time_chay_bom_hoi_duong_ong_2` varchar(50) DEFAULT NULL,
  `time_chay_bom_tang_ap_1` varchar(50) DEFAULT NULL,
  `time_chay_bom_tang_ap_2` varchar(50) DEFAULT NULL,
  `time_chay_bom_nhiet_bon_gia_nhiet_1` varchar(50) DEFAULT NULL,
  `time_chay_bom_nhiet_bon_gia_nhiet_2` varchar(50) DEFAULT NULL,
  `time_chay_van_dien_tu_ba_nga` varchar(50) DEFAULT NULL,
  `time_chay_van_dien_tu_mot_chieu` varchar(50) DEFAULT NULL,
  `du_phong` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_id` (`module_id`),
  CONSTRAINT `runtime_statistics_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `runtime_statistics` */

/*Table structure for table `sensor` */

DROP TABLE IF EXISTS `sensor`;

CREATE TABLE `sensor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) unsigned NOT NULL,
  `cam_bien_dan_thu` varchar(50) DEFAULT NULL,
  `cam_bien_bon_solar` varchar(50) DEFAULT NULL,
  `cam_bien_muc_nuoc_bon_solar` varchar(50) DEFAULT NULL,
  `cam_bien_nhiet_do_bon_gia_nhiet` varchar(50) DEFAULT NULL,
  `cam_bien_ap_suat_bon_gia_nhiet` varchar(50) DEFAULT NULL,
  `cam_bien_ap_suat_duong_ong` varchar(50) DEFAULT NULL,
  `cam_bien_nhiet_do_duong_ong` varchar(50) DEFAULT NULL,
  `cam_bien_nhiet_dinh_bon_solar` varchar(50) DEFAULT NULL,
  `cam_bien_tran` varchar(50) DEFAULT NULL,
  `du_phong` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_id` (`module_id`),
  CONSTRAINT `sensor_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sensor` */

/*Table structure for table `timer_counter` */

DROP TABLE IF EXISTS `timer_counter`;

CREATE TABLE `timer_counter` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) unsigned NOT NULL,
  `counter` varchar(50) DEFAULT NULL,
  `timer_1` varchar(50) DEFAULT NULL,
  `timer_2` varchar(50) DEFAULT NULL,
  `timer_3` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_id` (`module_id`),
  CONSTRAINT `timer_counter_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `timer_counter` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (1,'admin','sDpSntYFL2Tbld3ZfnPXe0wSzn-r4V5G','$2y$13$46QB0TBZ9CWF7N2SZlvYIOXdzwdnzn2S.Rl1b52Uh2C0C3e9tIoA6','GTkjZ53Gy9V050Cam3cmmM_eqAHX3xTa_1467446155','admin@gmail.com',1,1467446155,1467446155);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
