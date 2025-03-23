-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 23 mars 2025 à 10:57
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `belcms`
--

-- --------------------------------------------------------

--
-- Structure de la table `belcms_ban`
--

DROP TABLE IF EXISTS `belcms_ban`;
CREATE TABLE IF NOT EXISTS `belcms_ban` (
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `belcms_config`
--

DROP TABLE IF EXISTS `belcms_config`;
CREATE TABLE IF NOT EXISTS `belcms_config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `belcms_config`
--

INSERT INTO `belcms_config` (`id`, `name`, `value`) VALUES
(1, 'CMS_VERSION', '4.0.0'),
(2, 'CMS_NAME', 'Bel-CMS demo'),
(20, 'CMS_HIGHLIGHT', '1'),
(4, 'CMS_FONTAWSOME', '1'),
(5, 'CMS_JQUERY', '1'),
(6, 'CMS_BOOTSTRAP', '1'),
(7, 'CMS_PAGE_DEFAULT', 'news'),
(8, 'CMS_LANGS', 'fr'),
(9, 'CMS_TEMPLATE', 'bel_cms'),
(10, 'CMS_TPL_FULL', 'readmore|downloads\r\n'),
(11, 'CMS_DESCRIPTION', ''),
(12, 'CMS_COOKIES', 'SEUOED'),
(13, 'CMS_LOG_MAX', '1 MONTH'),
(14, 'CMS_WEBSITE_KEYWORDS', NULL),
(15, 'CMS_DATE_INSTALL', '2024-09-17 14:55:56'),
(16, 'CMS_API_CLEF', 'eb21c285b2408ebe665c478ae7aadaea'),
(17, 'CMS_LOGO', '/assets/img/logo.png'),
(18, 'CMS_CHARTE', 'En poursuivant votre navigation sur ce site, vous acceptez nos conditions générales d\'utilisation et notamment que des cookies soient utilisés afin de vous connecter automatiquement.'),
(19, 'CMS_VALIDATION_TIME', '3'),
(21, 'CMS_KEYWORDS', 'iuohiuh'),
(22, 'CMS_MAIL', 'wampserver@wampserver.invalid'),
(23, 'CMS_VALIDATION', '0'),
(24, 'CMS_FUSEAU', '2');

-- --------------------------------------------------------

--
-- Structure de la table `belcms_config_pages`
--

DROP TABLE IF EXISTS `belcms_config_pages`;
CREATE TABLE IF NOT EXISTS `belcms_config_pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `visits` int NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `access_groups` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `access_admin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `config` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ver` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1.0.0',
  `date_page` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `belcms_config_pages`
--

INSERT INTO `belcms_config_pages` (`id`, `name`, `visits`, `active`, `description`, `access_groups`, `access_admin`, `config`, `ver`, `date_page`) VALUES
(1, 'news', 639, 1, 'je suis la news', '0', '2', 'MAX_NEWS==5', '1.0.0', '2025-02-12 22:22:37'),
(2, 'user', 0, 0, 'Description utilisateurs', '0', '1', '', '1.0.0', '2025-02-12 22:22:37'),
(3, 'forum', 0, 1, 'Forum de discution', '2', '1', '', '1.0.0', '2025-03-21 15:09:18');

-- --------------------------------------------------------

--
-- Structure de la table `belcms_downloads`
--

DROP TABLE IF EXISTS `belcms_downloads`;
CREATE TABLE IF NOT EXISTS `belcms_downloads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` text,
  `idcat` int NOT NULL,
  `size` varchar(64) NOT NULL,
  `uploader` varchar(32) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `view` int NOT NULL,
  `dls` int NOT NULL,
  `screen` text NOT NULL,
  `download` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `belcms_downloads_cat`
--

DROP TABLE IF EXISTS `belcms_downloads_cat`;
CREATE TABLE IF NOT EXISTS `belcms_downloads_cat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `banniere` text,
  `ico` text,
  `description` text,
  `id_groups` varchar(64) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `belcms_downloads_cat`
--

-- --------------------------------------------------------

--
-- Structure de la table `belcms_forum`
--

DROP TABLE IF EXISTS `belcms_forum`;
CREATE TABLE IF NOT EXISTS `belcms_forum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `icon` text,
  `title` varchar(64) NOT NULL,
  `subtitle` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `access_groups` text NOT NULL,
  `access_admin` text NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '1',
  `orderby` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `belcms_forum_msg`
--

DROP TABLE IF EXISTS `belcms_forum_msg`;
CREATE TABLE IF NOT EXISTS `belcms_forum_msg` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_mdg` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `author` varchar(32) DEFAULT NULL,
  `date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `files` text,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `belcms_forum_name`
--

DROP TABLE IF EXISTS `belcms_forum_name`;
CREATE TABLE IF NOT EXISTS `belcms_forum_name` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_forum` int NOT NULL,
  `title` varchar(128) NOT NULL,
  `subtitle` varchar(256) NOT NULL,
  `orderby` int DEFAULT NULL,
  `lock` tinyint(1) DEFAULT NULL,
  `icon` text NOT NULL,
  `access_groups` text,
  `access_admin` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Structure de la table `belcms_forum_threads`
--

DROP TABLE IF EXISTS `belcms_forum_threads`;
CREATE TABLE IF NOT EXISTS `belcms_forum_threads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cat` int DEFAULT NULL,
  `id_message` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `author` varchar(32) DEFAULT NULL,
  `lock_post` tinyint(1) NOT NULL DEFAULT '0',
  `view_post` tinyint(1) NOT NULL DEFAULT '0',
  `date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `belcms_groups`
--

DROP TABLE IF EXISTS `belcms_groups`;
CREATE TABLE IF NOT EXISTS `belcms_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `id_group` int NOT NULL,
  `image` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `color` varchar(128) NOT NULL DEFAULT '#000000',
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `id_group` (`id_group`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `belcms_groups`
--

INSERT INTO `belcms_groups` (`id`, `name`, `id_group`, `image`, `color`, `description`) VALUES
(1, 'ADMINISTRATOR', 1, '', '#58d90b', 'Administrateur principal'),
(2, 'MEMBERS', 2, '', '#c03323', 'rouge bleu');

-- --------------------------------------------------------

--
-- Structure de la table `belcms_like`
--

DROP TABLE IF EXISTS `belcms_like`;
CREATE TABLE IF NOT EXISTS `belcms_like` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `num` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `belcms_mails_blacklist`
--

DROP TABLE IF EXISTS `belcms_mails_blacklist`;
CREATE TABLE IF NOT EXISTS `belcms_mails_blacklist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `belcms_mails_blacklist`
--

INSERT INTO `belcms_mails_blacklist` (`id`, `name`) VALUES
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
(48, 'netzero.net');

-- --------------------------------------------------------

--
-- Structure de la table `belcms_news`
--

DROP TABLE IF EXISTS `belcms_news`;
CREATE TABLE IF NOT EXISTS `belcms_news` (
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Structure de la table `belcms_news_cat`
--

DROP TABLE IF EXISTS `belcms_news_cat`;
CREATE TABLE IF NOT EXISTS `belcms_news_cat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `belcms_users`
--

DROP TABLE IF EXISTS `belcms_users`;
CREATE TABLE IF NOT EXISTS `belcms_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `hash_key` varchar(32) NOT NULL,
  `password` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mail` varchar(128) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `valid` float NOT NULL DEFAULT '1',
  `expire` float NOT NULL DEFAULT '0',
  `token` varchar(50) DEFAULT NULL,
  `number_valid` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `belcms_users_groups`
--

DROP TABLE IF EXISTS `belcms_users_groups`;
CREATE TABLE IF NOT EXISTS `belcms_users_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hash_key` varchar(32) NOT NULL,
  `user_group` int DEFAULT '0',
  `user_groups` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `belcms_users_hardware`
--

DROP TABLE IF EXISTS `belcms_users_hardware`;
CREATE TABLE IF NOT EXISTS `belcms_users_hardware` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hash_key` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

--
-- Structure de la table `belcms_users_page`
--

DROP TABLE IF EXISTS `belcms_users_page`;
CREATE TABLE IF NOT EXISTS `belcms_users_page` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hash_key` varchar(32) NOT NULL,
  `namepage` text,
  `last_visit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1604 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `belcms_users_profils`
--

DROP TABLE IF EXISTS `belcms_users_profils`;
CREATE TABLE IF NOT EXISTS `belcms_users_profils` (
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash_key` (`hash_key`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `belcms_users_social`
--

DROP TABLE IF EXISTS `belcms_users_social`;
CREATE TABLE IF NOT EXISTS `belcms_users_social` (
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash_key` (`hash_key`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `belcms_visitors`
--

DROP TABLE IF EXISTS `belcms_visitors`;
CREATE TABLE IF NOT EXISTS `belcms_visitors` (
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
  `visitor_page` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12587 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `belcms_visitors`
--

--
-- Structure de la table `belcms_widgets`
--

DROP TABLE IF EXISTS `belcms_widgets`;
CREATE TABLE IF NOT EXISTS `belcms_widgets` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
