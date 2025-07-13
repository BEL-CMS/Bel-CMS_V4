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

#######################################################
# Demarre une $_SESSION                               #
#######################################################
if(!isset($_SESSION)) {                               #
    session_start();                                  #
}                                                     #
#######################################################
use Belcms\Administration\Administration;             #
use BelCMS\Core\BelCMS;                               #
use BelCMS\Core\Dispatcher;                           #
use BelCMS\Core\Ban;                                  #
use BelCMS\Core\Landing;                              #
#######################################################
# TimeZone et charset                                 #
#######################################################
ini_set('default_charset', 'utf-8');                  #
date_default_timezone_set('Europe/Brussels');         #
#######################################################
# Définit comme l'index                               #
#######################################################
define('CHECK_INDEX', true);                          #
define('VERSION_CMS', '4.0.0');                       #
define('DS', DIRECTORY_SEPARATOR);                    #
define('ROOT', __DIR__);                              #
define('SHOW_ALL_REQUEST_SQL', false);                #
define('ERROR_INDEX', '<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');         #
#######################################################
# Function debug                                      #
#######################################################
require_once 'debug.php';                             #
#######################################################
# MicroTime loading                                   #
#######################################################
$_SESSION['SESSION_START']  = microtime(true);        #
#########################################             #
$_SESSION['NB_REQUEST_SQL'] = 0;                      #
$_SESSION['CMS_DEBUG']      = true;                   #
#######################################################
# Install                                             #
#######################################################
if (is_file(ROOT.DS.'INSTALL'.DS.'index.php')) {      #
	header('Location: INSTALL/index.php');            #
	die();                                            #
}                                                     #
#######################################################
# Fichier requis                                      #
#######################################################
require_once ROOT.DS.'requires'.DS.'requires.all.php';#
#######################################################
# Fichier requis                                      #
# Bannissement                                        #
#######################################################
new Ban;                                              #
#######################################################
# Landing page                                        #
#######################################################
new Landing;                                          #
#######################################################
# Initialise le C.M.S                                 #
#######################################################
if (Dispatcher::isManagement() === true) {
	header('Content-Type: text/html');
	require_once ROOT.DS.'administration'.DS.'index.php';
	new Administration ();
} else {
	$belcms = new BelCMS;
	if (isset($_GET['echo'])) {
		header('Content-Type: text/html; charset=UTF-8');
		echo $belcms->page;
	} else if (isset($_GET['img'])) {
		header('Content-Type: image/png');
		echo $belcms->page;
	} else if (isset($_GET['json'])) {
		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode($belcms->page);
	} else if (isset($_GET['text'])) {
		echo $belcms->page;
	} else {
		header('Content-Type: text/html; charset=UTF-8');
		echo $belcms->templates;
	}
}