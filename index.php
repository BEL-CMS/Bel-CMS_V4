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
# Demarre une $_SESSION
#######################################################
if(!isset($_SESSION)) {
    session_start();
}
#######################################################
# TimeZone et charset
#######################################################
ini_set('default_charset', 'utf-8');
date_default_timezone_set('Europe/Brussels');
#######################################################
# Définit comme l'index
#######################################################
define('CHECK_INDEX', true);
define('VERSION_CMS', '4.0.0');
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__.DS);
define('CORE',ROOT.'core'.DS);
define('SPDO', __DIR__.'spdo'.DS );
define('SHOW_ALL_REQUEST_SQL', false);
#######################################################
# Function debug
#######################################################
require_once 'debug.php';
#######################################################
# MicroTime loading
#######################################################
$_SESSION['SESSION_START']  = microtime(true);
#######################################################
$_SESSION['NB_REQUEST_SQL'] = 0;
$_SESSION['CMS_DEBUG']      = true;
#######################################################
# Install
#######################################################
if (is_file(ROOT.DS.'INSTALL'.DS.'index.php')) {
    header('Location: INSTALL/index.php');
    die();
}
#######################################################
# Fichier requis
#######################################################
require_once ROOT.DS.'requires'.DS.'requires.all.php';
#######################################################
# Inclusion de la config de base du cms
#######################################################

#######################################################

#######################################################