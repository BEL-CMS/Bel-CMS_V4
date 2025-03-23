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
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;
use BelCMS\Core\statsUser;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

################################################
# Class Principale du CMS
################################################
final class Pages
{
    var         $useModels;
    private     $routeName,
                $routePage,
                $routeView;
    public      $page;

	function __construct()
	{
        $this->routeName = Route::name();
        $this->routePage = Route::page();
        $this->routeView = Route::view();

        self::getLangs ();

		if (isset($this->useModels) and !empty($this->useModels)){
			self::loadModel($this->useModels);
		}
    }

    public function render ()
    {
        $page = Common::VarSecure($this->routePage, null);

        if (Secures::getPageActive($page) != true) {
            Notification::error('La page que vous recherchez est inaccessible.', 'Page');
            return false;
        }
        if (Secures::getAccessPage($page) != true) {
            Notification::error('Vous n\'avez pas les permissions nécessaires pour accéder à cette page.', 'Page');
            return false;
        }
        ob_start();
        self::getModels();
        echo self::getController();
        //echo 'teste render';
		// Met en le tampon dans une variable ($this->page);
		$page = ob_get_contents();
		// Verifie si le tampon est rempli, 
		// Détruit les données du tampon de sortie
		// et éteint la temporisation de sortie.
		if (ob_get_length() != 0) {
			ob_end_clean();
		}
        return $page;
    }

    private function getController ()
    {
        if (is_dir(ROOT.DS.'pages'.DS.$this->routePage) != true) {
            Notification::error(' La page que vous avez demandée <b>: '.Route::page().'</b> n\'exsite pas', 'Page', true);
            return false;
        }
        ob_start();
        $controller = ROOT.DS.'pages'.DS.$this->routePage.DS.'controller.php';
        if (is_file($controller)) {
            require_once $controller;
            $require = "Belcms\Pages\Controller\\".$this->routePage;
            $newPage = new $require;
            if (method_exists($newPage, $this->routeView)) {
                call_user_func_array(array($newPage,$this->routeView),Route::link());
                $content = ob_get_contents();
            } else {
                Notification::error(' La page que vous avez demandée : '.Route::page().DS.$this->routeView.' n\'est pas disponible.', 'Page');
                $content = ob_get_contents();
            }
        } else {
            Notification::error('Le controller n\'est pas présent dans le dossier : '.Route::page(), 'Page');
            $content = ob_get_contents();
        }
        if (ob_get_length() != 0) {
            ob_end_clean();
        }
        return $content;
    }

    private function getModels ()
    {
        $models = ROOT.DS.'pages'.DS.$this->routePage.'models.php';
        if (is_file($models)) {
            include $models;
        }
    }

	#########################################
	# inclus le models                      #
	#########################################
	private function loadModel ($name)
	{
		$dir = constant('DIR_PAGES').strtolower($name).DS.'models.php';

		if (is_file($dir)) {
			require_once $dir;
			$name = "Belcms\Pages\Models\\".$name;
			$this->models = new $name();
		}
	}
    #########################################
    # inclus tout les fichiers langs trouvé #
    #########################################
    private function getLangs ()
    { 
        $scan = Common::ScanFiles(ROOT.DS.'langs');
        foreach ($scan as $k => $v) {
            require_once ROOT.DS.'langs' . DS . $v;
        }
    }
}