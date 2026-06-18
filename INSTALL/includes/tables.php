<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

if ($_SERVER['SERVER_PORT'] == '80') {
	$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
} else {
	$host = 'https://'.$_SERVER['HTTP_HOST'].'/';
}
function randomString($length) {
	$str = random_bytes($length);
	$str = base64_encode($str);
	$str = str_replace(["+", "/", "="], "", $str);
	$str = substr($str, 0, $length);
	return strtoupper($str);
}
$_SESSION['HTTP_HOST'] = $host;
$current    = new DateTime('now');
$date       = $current->format('Y-m-d H:i:s');
$error      = false;
$class      = null;
$insert     = null;
$sql        = null;

switch ($_POST['table']) {
	case 'articles':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(64) NOT NULL,
			`publish` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`id_articles` varchar(16) DEFAULT NULL,
			`description` text,
			`author` varchar(32) NOT NULL,
			`accessgrp` text,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'articles_content':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`id_articles` varchar(16) DEFAULT NULL,
			`name` varchar(128) NOT NULL,
			`content` longtext,
			`publish` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`view` int NOT NULL DEFAULT '0',
			`author` varchar(32) NOT NULL,
			`pagenumber` int DEFAULT NULL,
			`accessgrp` text,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'ban':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`who` varchar(32) DEFAULT NULL,
			`author` varchar(32) DEFAULT NULL,
			`ip` text,
			`email` text,
			`date` datetime DEFAULT NULL,
			`endban` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`timeban` varchar(5) DEFAULT '0',
			`reason` text,
			`number` int NOT NULL DEFAULT '0',
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'buy_mails':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`mails` varchar(256) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'buy_ndd':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`websites` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'buy_plan':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
			`price_unique` varchar(7) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break; 

	case 'buy_plan_infos':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(255) DEFAULT NULL,
			`value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'buy_users':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`mail_user` varchar(128) DEFAULT NULL,
			`dateinsert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`ip` varchar(40) DEFAULT NULL,
			`plan` tinyint DEFAULT NULL,
			`currency` varchar(6) NOT NULL,
			`website_1` varchar(128) DEFAULT NULL,
			`website_2` varchar(128) DEFAULT NULL,
			`website_3` varchar(128) DEFAULT NULL,
			`emailbelcms_1` varchar(128) DEFAULT NULL,
			`emailbelcms_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
			`emailbelcms_3` varchar(128) DEFAULT NULL,
			`emailbelcms_4` varchar(128) DEFAULT NULL,
			`emailbelcms_5` varchar(128) DEFAULT NULL,
			`phpversion` varchar(10) NOT NULL DEFAULT 'PHP-8.4',
			`comment` text,
			`active` tinyint(1) DEFAULT '0',
			`date_end` datetime DEFAULT CURRENT_TIMESTAMP,
			`file` varchar(256) DEFAULT NULL,
			`unique_key` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'captcha':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`IP` varchar(45) NOT NULL,
			`timelast` int NOT NULL,
			`code` varchar(32) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'comments':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`page` varchar(32) NOT NULL,
			`page_sub` varchar(32) NOT NULL,
			`page_id` int NOT NULL,
			`comment` text,
			`hash_key` varchar(32) NOT NULL,
			`date_com` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'config':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
			`value` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

		$insert = "INSERT INTO `".$_SESSION['prefix'].$table."`(`id`, `name`, `value`) VALUES
			(1, 'CMS_VERSION', '4.0.1'),
			(2, 'CMS_NAME', 'Bel-CMS Installation'),
			(3, 'CMS_HIGHLIGHT', '1'),
			(4, 'CMS_FONTAWSOME', '1'),
			(5, 'CMS_JQUERY', '1'),
			(6, 'CMS_BOOTSTRAP', '1'),
			(7, 'CMS_DEFAULT_PAGE', 'news'),
			(8, 'CMS_WEBSITE_LANG', 'fr'),
			(9, 'CMS_TEMPLATE', ''),
			(10, 'CMS_TPL_FULL', 'readmore|downloads|members|forum|articles'),
			(11, 'CMS_DESCRIPTION', ''),
			(12, 'CMS_COOKIES', '".randomString(6)."'),
			(13, 'CMS_LOG_MAX', '1 YEAR'),
			(14, 'CMS_WEBSITE_KEYWORDS', ''),
			(15, 'CMS_DATE_INSTALL', '".$date."'),
			(16, 'CMS_KEY_ADMIN', '".randomString(32)."'),
			(17, 'CMS_LOGO', ''),
			(18, 'CMS_CHARTE', 'En poursuivant votre navigation sur ce site, vous acceptez nos conditions générales d\'utilisation et notamment que des cookies soient utilisés afin de vous connecter automatiquement.'),
			(19, 'CMS_VALIDATION_TIME', '3'),
			(20, 'CMS_KEYWORDS', ''),
			(21, 'CMS_MAIL', 'contact@ndd.com'),
			(22, 'CMS_VALIDATION', '0'),
			(23, 'CMS_FUSEAU', '2'),
			(24, 'CMS_LANDING', 'true'),
			(25, 'CMS_LANG', 'fr'),
			(26, 'CMS_CAPTCHA_TIME', '2'),
			(27, 'CMS_CUSTOM_CSS', '1');";
	break;

	case 'config_pages':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
				`id` int(11) NOT NULL,
				`name` varchar(64) NOT NULL,
				`visits` int(11) NOT NULL DEFAULT 0,
				`active` tinyint(1) NOT NULL DEFAULT 1,
				`description` text DEFAULT NULL,
				`infos_sup` text DEFAULT NULL,
				`keywords` varchar(64) DEFAULT NULL,
				`access_groups` text DEFAULT NULL,
				`access_admin` text DEFAULT NULL,
				`config` text NOT NULL,
				`ver` varchar(6) NOT NULL DEFAULT '1.0.0',
				`date_page` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";;


		$insert = "INSERT INTO `".$_SESSION['prefix'].$table."`(`id`, `name`, `visits`, `active`, `description`, `infos_sup`, `keywords`, `access_groups`, `access_admin`, `config`, `ver`, `date_page`) VALUES
			('', 'news', 0, 1, NULL, NULL, NULL, NULL, '0', '1', 'MAX_NEWS=4', '1.0.0', '2025-02-12 22:22:37'),
			('', 'user', 0, 1, NULL, NULL, NULL, NULL, '0', '1', '', '1.0.0', '2025-02-12 22:22:37'),
			('', 'forum', 0, 1, '', NULL, NULL, NULL, '2', '1', 'MAX_PAGE=6', '1.0.0', '2025-03-21 15:09:18'),
			('', 'newsletter', 0, 1, NULL, NULL, NULL, NULL, '0', '1', '', '1.0.0', '2025-03-21 15:09:18'),
			('', 'gallery', 0, 1, NULL, NULL, NULL, NULL, '0', '1', 'MAX_PAGE=6', '1.0.0', '2025-04-04 15:00:16'),
			('', 'links', 0, 1, NULL, NULL, NULL, NULL, '0', '1', 'MAX_PAGE=6', '1.0.0', '2025-04-09 08:52:33'),
			('', 'members', 0, 1, NULL, NULL, NULL, NULL, '0', '1', 'MAX_PPR=8', '1.0.0', '2025-04-09 15:46:59'),
			('', 'downloads', 0, 1, NULL, NULL, NULL, NULL, '0', '1', 'MAX_PPR=6', '1.0.0', '2025-04-11 16:59:39'),
			('', 'articles', 0, 1, NULL, NULL, NULL, NULL, '0', '1', '', '1.0.0', '2025-04-13 09:49:11'),
			('', 'guestbook', 0, 1, NULL, NULL, NULL, NULL, '0', '1|2', '', '1.0.0', '2025-04-14 12:27:04'),
			('', 'shoutbox', 0, 1, NULL, NULL, NULL, NULL, '0', '1|2', '', '1.0.0', '2025-04-14 12:27:04'),
			('', 'contact', 0, 1, NULL, NULL, NULL, NULL, '0', '1|2', 'EMAIL=stive@determe.be', '1.0.0', '2025-04-14 12:27:04'),
			('', 'calendar', 0, 1, NULL, NULL, NULL, NULL, '0', '1', '', '1.0.0', '2026-03-10 14:52:12'),
			('', 'inbox', 0, 1, NULL, NULL, NULL, NULL, '1|2', '1', '', '1.0.0', '2026-03-10 14:52:12'),
			('', 'buyPlan', 0, 1, NULL, NULL, NULL, NULL, '2', '1', '', '1.0.0', '2026-04-30 12:12:44'),
			('', 'typoghrapy', 0, 1, NULL, NULL, NULL, NULL, '0', '0', '', '1.0.0', '2026-05-16 15:33:37'),
			('', 'teams', 0, 1, NULL, NULL, NULL, NULL, '0', '1', '', '1.0.0', '2026-06-05 13:58:21'),
			('', 'support', 0, 1, NULL, NULL, NULL, NULL, '2', '1', '', '1.0.0', '2026-06-15 17:40:07');";
	break;

	case 'contact':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`user` text,
			`mail_user` varchar(128) DEFAULT NULL,
			`ip_user` varchar(45) DEFAULT NULL,
			`category` int DEFAULT NULL,
			`object` varchar(64) DEFAULT NULL,
			`message` text,
			`read_mail` int DEFAULT '0',
			`send_reply` int NOT NULL DEFAULT '0',
			`date_mail` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'contact_cat':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`content` varchar(128) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'downloads':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(128) NOT NULL,
			`description` text,
			`idcat` int NOT NULL,
			`size` varchar(64) NOT NULL DEFAULT '0',
			`uploader` varchar(32) NOT NULL,
			`date` datetime DEFAULT CURRENT_TIMESTAMP,
			`view` int DEFAULT NULL,
			`dls` int DEFAULT NULL,
			`screen` text NOT NULL,
			`download` text NOT NULL,
			`access` text,
			`torrent` text,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'downloads_cat':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(128) DEFAULT NULL,
			`banniere` text,
			`ico` text,
			`description` text,
			`id_groups` varchar(64) NOT NULL DEFAULT '1',
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'events':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(100) NOT NULL,
			`image` varchar(100) DEFAULT NULL,
			`start_date` varchar(10) NOT NULL,
			`end_date` varchar(10) DEFAULT NULL,
			`start_time` varchar(10) DEFAULT NULL,
			`end_time` varchar(10) DEFAULT NULL,
			`color` varchar(7) DEFAULT NULL,
			`location` varchar(255) DEFAULT NULL,
			`description` text,
			`state` tinyint DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'events_cat':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(32) NOT NULL,
			`color` varchar(7) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'forum':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`icon` text,
			`title` varchar(64) NOT NULL,
			`tags` text,
			`subtitle` varchar(128) DEFAULT NULL,
			`access_groups` text,
			`access_admin` text,
			`activate` tinyint(1) NOT NULL DEFAULT '1',
			`orderby` int NOT NULL DEFAULT '1',
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'forum_msg':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`id_mdg` varchar(16) DEFAULT NULL,
			`author` varchar(32) DEFAULT NULL,
			`date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`files` text,
			`content` text,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'forum_name':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`id_forum` int NOT NULL,
			`id_supp` varchar(8) DEFAULT NULL,
			`title` varchar(128) NOT NULL,
			`subtitle` varchar(256) NOT NULL,
			`orderby` int DEFAULT NULL,
			`lock` tinyint(1) DEFAULT NULL,
			`icon` text NOT NULL,
			`access_groups` text,
			`access_admin` text,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'forum_threads':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`id_cat` int DEFAULT NULL,
			`id_message` varchar(16) NOT NULL,
			`title` varchar(128) DEFAULT NULL,
			`author` varchar(32) DEFAULT NULL,
			`lock_post` tinyint(1) NOT NULL DEFAULT '0',
			`view_post` tinyint(1) NOT NULL DEFAULT '0',
			`date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'gallery':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(64) DEFAULT NULL,
			`author` varchar(32) DEFAULT NULL,
			`date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`url` varchar(256) NOT NULL,
			`description` text,
			`valid` int NOT NULL DEFAULT '1',
			`cat_id` varchar(16) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'gallery_cat':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(64) NOT NULL,
			`access` text,
			`color` varchar(7) NOT NULL DEFAULT '#333333',
			`description` text,
			`background` text,
			`datecreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`cat_id` varchar(16) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'gallery_sub_cat':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` text,
			`color` varchar(64) NOT NULL,
			`bg_color` varchar(32) NOT NULL,
			`groups_access` text,
			`cat_id` varchar(16) DEFAULT NULL,
			`main_id` varchar(16) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'gallery_vote':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`author` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
			`id_vote` int NOT NULL,
			`date_vote` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'game_rank':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` tinytext,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'groups':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(32) NOT NULL,
			`id_group` int NOT NULL,
			`image` text,
			`color` varchar(128) NOT NULL DEFAULT '#000000',
			`description` text,
			PRIMARY KEY (`id`),
			UNIQUE KEY `name` (`name`),
			UNIQUE KEY `id_group` (`id_group`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

		$insert = "INSERT INTO `".$_SESSION['prefix'].$table."`(`id`, `name`, `id_group`, `image`, `color`, `description`) VALUES
			(1, 'ADMINISTRATOR', 1, '', '#a54c76ff', 'Administrateur principal'),
			(2, 'MEMBERS', 2, '', '#2381c0ff', 'Membres');";
	break;

	case 'guestbook':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`username` varchar(64) NOT NULL,
			`mail` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
			`message` text,
			`date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`avatar` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
			`ip` varchar(64) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'inbox':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`object` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
			`sendto` varchar(32) NOT NULL,
			`date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`hash_key` varchar(16) DEFAULT NULL,
			`close` varchar(1) DEFAULT '0',
			`read_msg_send` varchar(1) DEFAULT NULL,
			`read_msg_receive` int DEFAULT '0',
			`archive` tinyint(1) DEFAULT '0',
			`key_crypt` varchar(32) DEFAULT NULL,
			`key_mail` varchar(32) NOT NULL,
			`unique_key` varchar(32) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;


	case 'inbox_msg':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`hash_key` varchar(16) DEFAULT NULL,
			`date_insert` datetime DEFAULT CURRENT_TIMESTAMP,
			`content` mediumtext,
			`key_mail` varchar(32) DEFAULT NULL,
			`unique_key` varchar(32) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'interaction':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`title` tinytext,
			`author` varchar(32) NOT NULL,
			`date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`message` text,
			`status` tinytext,
			`IP` tinytext,
			`machine` varchar(64) DEFAULT NULL,
			`navigateur` varchar(128) DEFAULT NULL,
			`referer` tinytext,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'interaction_admin':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`title` tinytext,
			`author` varchar(45) DEFAULT NULL,
			`date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`message` text,
			`status` tinytext,
			`IP` tinytext,
			`machine` varchar(64) DEFAULT NULL,
			`navigateur` varchar(128) DEFAULT NULL,
			`referer` tinytext,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'like':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(64) DEFAULT NULL,
			`num` varchar(64) DEFAULT '0',
			`date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`author` varchar(32) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'links':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(32) DEFAULT NULL,
			`link` varchar(128) DEFAULT NULL,
			`author` varchar(32) DEFAULT NULL,
			`description` text,
			`date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`view` int NOT NULL DEFAULT '0',
			`click` int NOT NULL DEFAULT '0',
			`cat` int DEFAULT '0',
			`valid` tinyint(1) NOT NULL DEFAULT '1',
			`img` text,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'links_cat':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(64) DEFAULT NULL,
			`color` varchar(16) DEFAULT NULL,
			`description` text,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'mails_blacklist':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(255) NOT NULL,
			PRIMARY KEY (`id`),
			UNIQUE KEY `name` (`name`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

		$insert = "INSERT INTO `".$_SESSION['prefix'].$table."`(`id`, `name`) VALUES
			(1, '0-mail'),
			(2, '10minutemail'),
			(3, 'brefmail'),
			(4, 'dodgeit'),
			(5, 'dontreg'),
			(6, 'e4ward'),
			(7, 'ephemail'),
			(8, 'filzmail'),
			(9, 'gishpuppy'),
			(10, 'guerrillamail'),
			(11, 'haltospam'),
			(12, 'jetable'),
			(13, 'kasmail'),
			(14, 'link2mail'),
			(15, 'mail'),
			(16, 'mail-temporaire'),
			(17, 'maileater'),
			(18, 'mailexpire'),
			(19, 'mailhazard'),
			(20, 'mailinator'),
			(21, 'mailNull'),
			(22, 'mytempemail'),
			(23, 'mytrashmail'),
			(24, 'nobulk'),
			(25, 'nospamfor'),
			(26, 'PookMail'),
			(27, 'saynotospams'),
			(28, 'shortmail'),
			(29, 'sneakemail'),
			(30, 'spam'),
			(31, 'spambob'),
			(32, 'spambox'),
			(33, 'spamDay'),
			(34, 'spamfree24'),
			(35, 'spamgourmet'),
			(36, 'spamh0le'),
			(37, 'spaml'),
			(38, 'tempemail'),
			(39, 'tempInbox'),
			(40, 'tempomail'),
			(41, 'temporaryinbox'),
			(42, 'trashmail'),
			(43, 'willhackforfood'),
			(44, 'willSelfdestruct'),
			(45, 'wuzupmail'),
			(46, 'yopmail'),
			(47, 'shaw.ca'),
			(48, 'netzero.net');";
	break;

	case 'mails_config':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(255) DEFAULT NULL,
			`config` varchar(255) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

		$insert = "INSERT INTO `".$_SESSION['prefix'].$table."`(`id`, `name`, `config`) VALUES
			(1, 'host', ''),
			(2, 'Port', '587'),
			(3, 'SMTPAuth', 'true'),
			(4, 'SMTPAutoTLS', '1'),
			(6, 'WordWrap', '65'),
			(7, 'IsHTML', 'true'),
			(9, 'setFrom', ''),
			(10, 'fromName', ''),
			(11, 'charset', 'UTF-8'),
			(12, 'username', ''),
			(13, 'Password', '');";
	break;

	case 'maintenance':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(128) DEFAULT NULL,
			`value` varchar(256) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

	$insert = "INSERT INTO `".$_SESSION['prefix'].$table."`(`id`, `name`, `value`) VALUES
		(1, 'status', 'open'),
		(2, 'title', 'Le site est temporairement inaccessible'),
		(3, 'description', 'En raison de travaux de maintenance prévus, le site est temporairement indisponible.');";
	break;

	case 'news':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`rewrite_name` varchar(128) NOT NULL,
			`name` varchar(128) NOT NULL,
			`date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`author` varchar(32) DEFAULT NULL,
			`authoredit` varchar(32) DEFAULT NULL,
			`content` text NOT NULL,
			`additionalcontent` text,
			`tags` text,
			`cat` varchar(16) DEFAULT NULL,
			`view` int DEFAULT '0',
			`img` varchar(255) DEFAULT NULL,
			`like_post` int NOT NULL DEFAULT '0',
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'newsletter':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`hash_key` varchar(32) DEFAULT NULL,
			`ip` text,
			`mail` varchar(128) DEFAULT NULL,
			`date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'newsletter_send':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`template` int DEFAULT NULL,
			`date_send` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`author` varchar(32) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'newsletter_tpl':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(64) DEFAULT NULL,
			`content` text,
			`date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`author` varchar(32) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'news_cat':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`value` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'shoutbox':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`hash_key` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
			`msg` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
			`date_msg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`file` text,
			`image` text,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'stats':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`nb_view` bigint NOT NULL DEFAULT '0',
			`page` varchar(32) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

		$insert = "INSERT INTO `".$_SESSION['prefix'].$table."`(`id`, `nb_view`, `page`) VALUES
			('', 0, 'articles'),
			('', 0, 'buyPlan'),
			('', 0, 'calendar'),
			('', 0, 'comments'),
			('', 0, 'contact'),
			('', 0, 'cookies'),
			('', 0, 'donations'),
			('', 0, 'downloads'),
			('', 0, 'faq'),
			('', 0, 'forum'),
			('', 0, 'gallery'),
			('', 0, 'inbox'),
			('', 0, 'games'),
			('', 0, 'groups'),
			('', 0, 'guestbook'),
			('', 0, 'links'),
			('', 0, 'mails'),
			('', 0, 'market'),
			('', 0, 'members'),
			('', 0, 'news'),
			('', 0, 'newsletter'),
			('', 0, 'search'),
			('', 0, 'shoutbox'),
			('', 0, 'survey'),
			('', 0, 'teams'),
			('', 0, 'user'),
			('', 0, 'support',
			('', 0, 'typoghrapy'),
			('', 0, 'contact');";
	break;

	case 'support':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`user_hash_key` varchar(32) DEFAULT NULL,
			`ip_user` varchar(45) NOT NULL DEFAULT '127.0.0.1',
			`title` varchar(64) DEFAULT NULL,
			`subject` varchar(255) DEFAULT NULL,
			`priority` int DEFAULT NULL,
			`status` int DEFAULT '0',
			`created_at` datetime DEFAULT CURRENT_TIMESTAMP,
			`number_id` int DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'support_object':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`value` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'support_replies':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`number_id` int DEFAULT NULL,
			`user_id` varchar(32) DEFAULT NULL,
			`message` text,
			`created_at` datetime DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'teams':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(64) DEFAULT NULL,
			`foundation` date DEFAULT NULL,
			`contact` text,
			`joining` tinyint(1) NOT NULL DEFAULT '1',
			`logo` varchar(256) DEFAULT NULL,
			`screen` varchar(256) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'templates':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(64) DEFAULT NULL,
			`value` text,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

		$insert = "INSERT INTO `".$_SESSION['prefix'].$table."`(`id`, `name`, `value`) VALUES
			('', 'color_1', '#f8f8f8'),
			('', 'background', '#FFF'),
			('', 'border', '0.175'),
			('', 'text', '#252529'),
			('', 'links', '#252529')";
	break;

	case 'users':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`username` varchar(32) NOT NULL,
			`hash_key` varchar(32) NOT NULL,
			`password` varchar(255) NOT NULL,
			`mail` varchar(128) NOT NULL,
			`ip` varchar(45) NOT NULL,
			`valid` float NOT NULL DEFAULT '1',
			`expire` float NOT NULL DEFAULT '0',
			`token` varchar(50) DEFAULT NULL,
			`gold` int NOT NULL DEFAULT '0',
			`number_valid` varchar(32) DEFAULT NULL,
			`2FA` tinyint(1) DEFAULT '0',
			`admin` tinyint(1) NOT NULL DEFAULT '0',
			`root` tinyint(1) NOT NULL DEFAULT '0',
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'users_games':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`hash_key` varchar(32) DEFAULT NULL,
			`date_join` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`rank` tinyint DEFAULT NULL,
			`id_game` tinyint DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'users_groups':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`hash_key` varchar(32) NOT NULL,
			`user_group` int DEFAULT '0',
			`user_groups` text NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'users_hardware':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`hash_key` varchar(32) NOT NULL,
			`internet_connection` text,
			`OS` text,
			`tower` text,
			`model_tower` text,
			`cooling` text,
			`model_cooling` text,
			`cpu` text,
			`model_cpu` text,
			`motherboard` text,
			`model_motherboard` text,
			`ram` text,
			`model_ram` text,
			`qty_ram` text,
			`graphics_card` text,
			`model_graphics_card` text,
			`ssd_m2` text,
			`size_hdd` text,
			`psu` text,
			`watt` text,
			`screen` text,
			`screen_resolution` text,
			`keyboard` text,
			`mouse` text,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'users_page':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`hash_key` varchar(32) NOT NULL,
			`namepage` text,
			`last_visit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'users_profils':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`hash_key` varchar(32) NOT NULL,
			`gender` varchar(11) DEFAULT NULL,
			`public_mail` varchar(128) DEFAULT NULL,
			`websites` text,
			`list_ip` text,
			`avatar` text,
			`info_text` text,
			`birthday` date DEFAULT NULL,
			`country` varchar(30) DEFAULT NULL,
			`hight_avatar` varchar(255) DEFAULT NULL,
			`friends` longtext,
			`date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`visits` int DEFAULT NULL,
			`gravatar` tinyint(1) NOT NULL DEFAULT '0',
			`profils` tinyint(1) NOT NULL DEFAULT '0',
			`phone` varchar(30) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'users_social':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`hash_key` varchar(32) NOT NULL,
			`facebook` text,
			`youtube` text,
			`whatsapp` text,
			`instagram` text,
			`messenger` text,
			`tiktok` text,
			`snapchat` text,
			`telegram` text,
			`pinterest` text,
			`x_twitter` text,
			`reddit` text,
			`linkedIn` text,
			`skype` text,
			`viber` text,
			`teams_ms` text,
			`discord` text,
			`twitch` text,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'visitors':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`visitor_user` varchar(255) DEFAULT NULL,
			`visitor_ip` text NOT NULL,
			`visitor_browser` varchar(255) DEFAULT NULL,
			`visitor_hour` smallint NOT NULL DEFAULT '0',
			`visitor_minute` smallint NOT NULL DEFAULT '0',
			`visitor_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`visitor_day` varchar(2) NOT NULL,
			`visitor_month` varchar(2) NOT NULL,
			`visitor_year` smallint NOT NULL,
			`visitor_refferer` varchar(255) DEFAULT NULL,
			`visitor_page` text,
			`visitor_country` varchar(100) DEFAULT NULL,
			`visitor_city` varchar(100) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'visitors_online':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`session_id` varchar(255) NOT NULL,
			`ip` varchar(45) NOT NULL,
			`country` varchar(10) DEFAULT 'UN',
			`user_id` int DEFAULT '0',
			`username` varchar(255) DEFAULT NULL,
			`user_agent` text,
			`page` text,
			`is_bot` tinyint(1) DEFAULT '0',
			`last_activity` int NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'visitors_stats':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`date_visit` date NOT NULL,
			`month_visit` varchar(7) NOT NULL,
			`year_visit` varchar(4) NOT NULL,
			`ip` varchar(45) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	break;

	case 'widgets':
		$drop = 'DROP TABLE IF EXISTS `'.$_SESSION['prefix'].$table.'`';
		$sql  = "CREATE TABLE IF NOT EXISTS `".$_SESSION['prefix'].$table."` (
			`id` int NOT NULL AUTO_INCREMENT,
			`name` varchar(64) NOT NULL,
			`title` varchar(64) NOT NULL,
			`groups_access` varchar(255) NOT NULL,
			`groups_admin` varchar(255) NOT NULL,
			`active` tinyint(1) DEFAULT NULL,
			`pos` varchar(6) NOT NULL,
			`orderby` int NOT NULL,
			`pages` text NOT NULL,
			`opttions` text,
			PRIMARY KEY (`id`),
			UNIQUE KEY `name` (`name`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

		$insert = "INSERT INTO `".$_SESSION['prefix'].$table."`(`id`, `name`, `title`, `groups_access`, `groups_admin`, `active`, `pos`, `orderby`, `pages`, `opttions`) VALUES
			(1, 'stats', 'statistiques', '0', '0', 1, 'right', 1, '', NULL),
			(2, 'Survey', 'Sondages', '0', '0', 0, 'right', 0, '', NULL),
			(3, 'Shoutbox', 'T\'chat', '0', '1', 1, 'right', 1, '', NULL);";
	break;
}

$pdo_options = array();
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES utf8';

if (!is_null($drop)) {
	try {
		$cnx = new PDO('mysql:host='.$_SESSION['host'].';port='.$_SESSION['port'].';dbname='.$_SESSION['dbname'], $_SESSION['username'], $_SESSION['password'], $pdo_options);;
		$cnx->exec($drop);
	} catch(PDOException $Exception) {
		$error = 'ERROR DELETE DATA : '.$table.' : '.$Exception->getMessage();
		echo $error;
	}
	unset($cnx);
}
try { 
	$cnx = new PDO('mysql:host='.$_SESSION['host'].';port='.$_SESSION['port'].';dbname='.$_SESSION['dbname'], $_SESSION['username'], $_SESSION['password'], $pdo_options);
	$cnx->exec($sql);
	$error = 'Table_'.$_SESSION['prefix'].$table.' créer avec succès';
} catch(PDOException $Exception) {
	$error = 'ERROR BDD INSERT DATA : '.$table.' : '.$Exception->getMessage();
	echo $error;
}
unset($cnx);

if (!is_null($insert) and !empty($error)) {
	try {
		$cnx = new PDO('mysql:host='.$_SESSION['host'].';port='.$_SESSION['port'].';dbname='.$_SESSION['dbname'], $_SESSION['username'], $_SESSION['password'], $pdo_options);
		$cnx->exec($insert);
		echo 'Création et Insertion des donnes de la table '.$_SESSION['prefix'].$table.' ajouté avec succès';
	} catch(PDOException $Exception) {
		$error = 'ERROR BDD INSERT DATA : '.$table.' : '.$Exception->getMessage();
		echo $error;
	}
	unset($cnx);
}