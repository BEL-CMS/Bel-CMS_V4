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

if (!defined('CHECK_INDEX')):
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
################################################
# Principaux fichier a inclure
################################################
$files = array (
	ROOT.DS.'requires'.DS.'common.php',
	ROOT.DS.'core'.DS.'class.error.php',
	ROOT.DS.'core'.DS.'class.dispatcher.php',
	ROOT.DS.'spdo'.DS.'config.pdo.php',
	ROOT.DS.'spdo'.DS.'tables.php',
	ROOT.DS.'spdo'.DS.'connect.php',
	ROOT.DS.'core'.DS.'class.constant.php',
	ROOT.DS.'spdo'.DS.'spdo.class.php',
	ROOT.DS.'core'.DS.'class.encrypt.php',
	ROOT.DS.'core'.DS.'class.mail.php',
	ROOT.DS.'core'.DS.'class.secure.php',
	ROOT.DS.'core'.DS.'class.security.php',
	ROOT.DS.'core'.DS.'class.groups.php',
	ROOT.DS.'core'.DS.'class.ban.php',
	ROOT.DS.'core'.DS.'class.gethost.php',
	ROOT.DS.'core'.DS.'class.captcha.php',
	ROOT.DS.'core'.DS.'class.config.php',
	ROOT.DS.'core'.DS.'class.landing.php',
	ROOT.DS.'core'.DS.'class.comment.php',
	ROOT.DS.'core'.DS.'class.user.php',
	ROOT.DS.'core'.DS.'class.pages.php',
	ROOT.DS.'core'.DS.'class.notification.php',
	ROOT.DS.'core'.DS.'class.templates.php',
	ROOT.DS.'core'.DS.'class.belcms.php',
);
foreach ($files as $include) {
	try {
		require $include;
	} catch (\Throwable $e) {
		throw var_dump($e);
	}
}