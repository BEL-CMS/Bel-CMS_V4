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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
#########################################
# Demarre la class extendsPages
#########################################
class extendsPages
{
    var 	$dir,
            $vars = array(),
            $useModels;
    public 	$render,
            $data,
            $models,
            $notification;

    function __construct()
    {
        self::loadLang();

        if (isset($this->useModels) and !empty($this->useModels)) {
            self::loadModel($this->useModels);
        }
        // Extrait les debug($this);
        // Extrait le données mis en variable pour les données à la page HTML.
        $this->data = self::get();
    }
    #########################################
    # Redirect
    #########################################
    function redirect ($url = null, $time = null)
    {
        if ($url === true) {
            $url = $_SERVER['HTTP_REFERER'];
            header("refresh:$time;url='$url'");
        }

        $scriptName = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);

        $fullUrl = ($_SERVER['HTTP_HOST'].$scriptName);

        if (!strpos($_SERVER['HTTP_HOST'], $scriptName)) {
            $fullUrl = $_SERVER['HTTP_HOST'].$scriptName.$url;
        }

        if (!strpos($fullUrl, 'http://')) {
            if ($_SERVER['SERVER_PORT'] == 80) {
                $url = 'http://'.$fullUrl;
            } else if ($_SERVER['SERVER_PORT'] == 443) {
                $url = 'https://'.$fullUrl;
            } else {
                $url = 'http://'.$fullUrl;
            }
        }
        header("refresh:$time;url='$url'");
    }
    #########################################
    # Redirection direct
    #########################################
    function linkHeader ($url = null)
    {
        header("Content-disposition: attachment; filename=$url");
        header("Content-Type: application/force-download");
        readfile($url);
    }
    #########################################
    # Retourne le rendu de la page,
    # et gère les accès & variables (set);
    #########################################
    function render($filename)
    {
        extract($this->vars);
        $dir = ROOT.DS.'pages'.DS.$this->dir.DS.$filename.'.php';
        $dirCustom = ROOT.DS.'templates'.DS.constant('CMS_TEMPLATE').DS.'custom'.DS.$filename.'.php';

        if (empty(constant('CMS_TEMPLATE')) and is_file($dirCustom) ) {
            require_once $dirCustom;
            die();
        }
        if (!is_file($dir)) {
            Notification::error('La page <b>'.$filename.'</b> n\'est pas inclu dans le dossier : '.ucfirst($this->dir).'.', 'Page');
        } else {
            require_once $dir;
        }
    }
    #########################################
    # inclus le models
    #########################################
    public function loadModel ($name)
    {
        $dir = ROOT.DS.'pages'.DS.strtolower($this->dir).DS.'models.php';
        if (is_file($dir)) {
            require_once $dir;
            $name = "Belcms\Pages\Models\\".$name;
            $this->models = new $name();
        }
    }
    #########################################
    # Assemble les variable passé par,
    # le controller en $this-set(array());
    #########################################
    public function set ($d)
    {
        $this->vars = array_merge($this->vars,$d);
    }
    #########################################
    # Récupère les données passées par
    # un formulaire ou un lien.
    #########################################
    public function get ()
    {
        $request = $_SERVER['REQUEST_METHOD'] == 'POST' ? 'POST' : 'GET';
        if ($request == 'POST') {
            $return = $_POST;
        } else if ($request == 'GET') {
            $return = new Route;
            $return = $return->link;
        }
        return $return;
    }
    #########################################
    # récupere le fichier de langue
    #########################################
    public function loadLang ()
    {
        $fileLoadlang = ROOT.DS.'pages'.DS.$this->dir.DS.'langs'.DS.'langs.'.constant('CMS_LANGS').'.php';
        if (is_file($fileLoadlang)) {
            require $fileLoadlang;
        }
    }
    public function notification ($error, $message, $title, $full = false)
    {
        switch ($error) {
            case 'alert':
                $return = Notification::alert($message, $title, $full);
            break;

            case 'error':
                $return = Notification::error($message, $title, $full);
            break;

            case 'warning':
                $return = Notification::warning($message, $title, $full);
            break;

            case 'success':
                $return = Notification::success($message, $title, $full);
            break;

            case 'infos':
                $return = Notification::infos($message, $title, $full);
            break;

            default:
                $return = false;
            break;
        }
        return $return;
    }
}