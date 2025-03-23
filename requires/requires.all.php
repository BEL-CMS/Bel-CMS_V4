<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
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
# Principaux fichiers à inclure
################################################
$files = array (
	CORE.'class.route.php',
	ROOT.DS.'langs'.DS.'langs.fr.php',
    SPDO.'config.pdo.php',
    SPDO.'tables.php',
    SPDO.'class.pdo.php',
    SPDO.'connect.php',
	CORE.'class.stats.user.php',
	ROOT.DS.'requires'.DS.'common.php',
    CORE.'class.secure.php',
	CORE.'class.secures.php',
	CORE.'class.encrypt.php',
	CORE.'class.config.php',
	ROOT.DS.'ban'.DS.'index.php',
	CORE.'class.like.php',
	CORE.'class.groups.php',
	CORE.'class.notification.php',
	CORE.'class.user.php',
	CORE.'class.visitor.php',
	CORE.'class.extends.php',
	CORE.'class.pages.php',
	CORE.'class.extends.widgets.php',
	CORE.'class.widgets.php',
	CORE.'class.template.php',
	CORE.'class.belcms.php',
	CORE.'class.gethost.php',
	CORE.'class.extends.admin.php',
	ROOT.DS.'administration'.DS.'index.php'
);
foreach ($files as $include) {
	try {
		require_once $include;
	} catch (Exception $e) {
		debug($e->getMessage());
	}
}

################################################
# base des dossiers et les mets comme constante
################################################
$dir = array(
	'DIR_ASSETS'        	=> ROOT.DS.'assets'.DS,
	'DIR_CONFIG'        	=> ROOT.DS.'config'.DS,
	'TABLE_PAGES_CONFIG'    => ROOT.DS.'config_pages'.DS,
	'DIR_CORE'          	=> ROOT.DS.'core'.DS,
	'DIR_ERROR'         	=> ROOT.DS.'error'.DS, 
	'DIR_LANGS'         	=> ROOT.DS.'langs'.DS,
	'DIR_ADMIN'         	=> ROOT.DS.'administration'.DS,
	'DIR_PAGES'         	=> ROOT.DS.'pages'.DS,
	'DIR_REQUIRES'      	=> ROOT.DS.'requires'.DS,
	'DIR_SPDO'          	=> ROOT.DS.'spdo'.DS,
	'DIR_TPL'           	=> ROOT.DS.'templates'.DS,
	'DIR_UPLOADS'       	=> ROOT.DS.'uploads'.DS,
	'DIR_UPLOADS_MARKET' 	=> ROOT.DS.'market'.DS,
	'DIR_UPLOADS_USER'  	=> ROOT.DS.'uploads'.DS.'users'.DS,
	'DIR_UPLOADS_MAILS' 	=> ROOT.DS.'uploads'.DS.'mails'.DS,
	'DIRE_USER'         	=> ROOT.DS.'users'.DS,
	'DIR_WIDGETS'       	=> ROOT.DS.'widgets'.DS,
	'DIR_TABLE_CUSTOM'      => ROOT.DS.'spdo'.DS.'custom'.DS,
);
foreach ($dir as $name => $value) {
	if (!defined(strtoupper($name))) {
		define($name, $value);
	}
}