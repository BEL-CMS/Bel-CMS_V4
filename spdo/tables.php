<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.3]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

if (defined('DB_PREFIX')) { $DB_PREFIX = constant('DB_PREFIX'); } else { $DB_PREFIX = ''; }

$tables = array(
    #####################################################
    # Tables
    #####################################################
    'TABLE_ARTICLES'            => $DB_PREFIX.'articles',
    'TABLE_ARTICLES_CONTENT'    => $DB_PREFIX.'articles_content',
    'TABLE_BAN'                 => $DB_PREFIX.'ban',
    'TABLE_CAPTCHA'             => $DB_PREFIX.'captcha',
    'TABLE_COMMENTS'            => $DB_PREFIX.'comments',
    'TABLE_STATS'               => $DB_PREFIX.'stats',
    'TABLE_WIDGETS'             => $DB_PREFIX.'widgets',
    'TABLE_CONFIG'              => $DB_PREFIX.'config',
    'TABLE_CONFIG_PAGES'        => $DB_PREFIX.'config_pages',
    'TABLE_DOWNLOADS'           => $DB_PREFIX.'downloads',
    'TABLE_DOWNLOADS_CAT'       => $DB_PREFIX.'downloads_cat',
    'TABLE_FORUM'               => $DB_PREFIX.'forum',
    'TABLE_FORUM_MSG'           => $DB_PREFIX.'forum_msg',
    'TABLE_FORUM_NAME'          => $DB_PREFIX.'forum_name',
    'TABLE_FORUM_THREAD'        => $DB_PREFIX.'forum_threads',
    'TABLE_GALLERY'             => $DB_PREFIX.'gallery',
    'TABLE_GALLERY_CAT'         => $DB_PREFIX.'gallery_cat',
    'TABLE_FAQ'                 => $DB_PREFIX.'faq',
    'TABLE_FAQ_CAT'             => $DB_PREFIX.'faq_cat',
    'GUESTBOOK'                 => $DB_PREFIX.'guestbook',
    'TABLE_INTERACTION'         => $DB_PREFIX.'interaction',
    'TABLE_INTERACTION_ADMIN'   => $DB_PREFIX.'interaction_admin',
    'TABLE_GROUPS'              => $DB_PREFIX.'groups',
    'TABLE_LIKE'                => $DB_PREFIX.'like',
    'TABLE_LINKS'               => $DB_PREFIX.'links',
    'TABLE_LINKS_CAT'           => $DB_PREFIX.'links_cat',
    'TABLE_INTER_ADMIN'         => $DB_PREFIX.'interaction_admin',
    'TABLE_NEWS'                => $DB_PREFIX.'news',
    'TABLE_NEWS_CAT'            => $DB_PREFIX.'news_cat',
    'TALBE_NEWSLETTER'          => $DB_PREFIX.'newsletter',
    'TABLE_PAGES_STATS'         => $DB_PREFIX.'page_stats',
    'TABLE_TICKET'              => $DB_PREFIX.'ticket',
    'TABLE_TICKET_CAT'          => $DB_PREFIX.'ticket_cat',
    'TABLE_TICKET_REP'          => $DB_PREFIX.'ticket_rep',
    'TABLE_MAIL_BLACKLIST'      => $DB_PREFIX.'mails_blacklist',
    'TABLE_MAIL_CONFIG'         => $DB_PREFIX.'mails_config',
    'TABLE_USERS'               => $DB_PREFIX.'users',
    'TABLE_USERS_GAMING'        => $DB_PREFIX.'users_gaming',
    'TABLE_USERS_GROUPS'        => $DB_PREFIX.'users_groups',
    'TABLE_USERS_NOTIFICATION'  => $DB_PREFIX.'users_notification',
    'TABLE_USERS_PAGE'          => $DB_PREFIX.'users_page',
    'TABLE_USERS_PROFILS'       => $DB_PREFIX.'users_profils',
    'TABLE_USERS_SOCIAL'        => $DB_PREFIX.'users_social',
    'TABLE_USERS_HARDWARE'      => $DB_PREFIX.'users_hardware',
    #####################################################
);
#####################################################
foreach ($tables as $name => $value) {
    define($name, $value); unset($tables);
}
#####################################################
?>