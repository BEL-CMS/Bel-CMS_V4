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

namespace BelCMS\Core;
use Belcms\Templates\Models\Landing as models;
use BelCMS\Core\Debug as debug;
use BelCMS\PDO\BDD;

if (!defined('CHECK_INDEX')):
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

################################################
# Class Landing (Home)
################################################
final class Landing
{
    public  $dir,
            $user,
            $page,
            $host;

    function __construct()
    {
        if (Dispatcher::isManagement() !== true) {
            if (self::getActiveLanding() === true) {
                $this->dir = constant('DIR_TPL').$_SESSION['CONFIG']['CMS_TEMPLATE'].DS.'landing.php';
                if (is_file($this->dir)) {
                    self::render();
                    die();
                }
            }
        }
    }

    public function getActiveLanding () : bool
    {
        $return = false;
        if (isset($_SESSION['CONFIG']['CMS_LANDING'])) {
            if ($_SESSION['CONFIG']['CMS_LANDING'] == 'true' and !isset($_GET['params'])) {
                $return = true;
            }
        } else {
            new Config;
            if ($_SESSION['CONFIG']['CMS_LANDING'] == 'true' and !isset($_GET['params'])) {
                $return = true;
            } else {
               $return = false;
            }
        }
        return $return;
    }

    public function render ()
    {
        if (self::getActiveLanding() === true) {
            ob_start();
            if (is_file($this->dir)) {
                require_once $this->dir;
                $content = ob_get_contents();
                if (ob_get_length() != 0) {
                    ob_end_clean();
                }
                echo $content;
            }
        }
    }
}