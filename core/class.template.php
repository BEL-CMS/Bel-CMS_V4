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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

################################################
# Class Template
################################################
final class template
{
    public  $js,
            $css,
            $widget,
            $page;
    ################################################
    # Rendu de la page template.php
    ################################################
    public function render ()
    {
        $var = new \stdClass(); 
        ob_start();
        $dirDefault = ROOT.DS.'assets'.DS.'default'.DS.'template'.DS.'default'.DS.'index.php';
        $dir        = ROOT.DS.'templates'.DS.constant('CMS_TEMPLATE').DS.'index.php';

        $var->css   = self::css ();
        $var->js    = self::javascripts ();
        $var->host  = Common::getBaseUrl ();
        $var->title = constant('CMS_NAME').' : '.ucfirst(Route::page()).' : '.ucfirst(Route::view());
        $var->full  = self::getFullWide ();
        if (empty($_SESSION['description'])) {
            $var->description = constant('CMS_DESCRIPTION');
        } else {
            $var->description = $_SESSION['description'];
        }
        $widgets['right']  = new Widgets('right');
        $widgets['bottom'] = new Widgets('bottom');
        $widgets['left']   = new Widgets('left');
        $widgets['top']    = new Widgets('top');

        $page  = self::getPage();
        $var->page = $page;

        if (is_file($dir)) {
            require_once $dir;
            $content = ob_get_contents();
        } else {
            require_once $dirDefault;
            $content = ob_get_contents();
        }
		if (ob_get_length() != 0) {
			ob_end_clean();
		}
        return $content;
    }
    ################################################
    # Rendu de la page
    ################################################
    public function getPage ()
    {
        ob_start();
        $page = new Pages();
        echo $page->render();
        $content = ob_get_contents();
        if (ob_get_length() != 0) {
            ob_end_clean();
        }
        return $content;
    }
	#########################################
	# Récupère les page en fullwide
	#########################################
	protected function getFullWide ()
	{
		$page = explode('|', constant('CMS_TPL_FULL'));
		foreach ($page as $k => $v) {
			$return[$k] = trim($v);
		}

		$page = strtolower(Route::page() ?? '');
		$view = strtolower(Route::view() ?? '');

		if (in_array($page, $return)) {
			return true;
		}
		if (in_array($view, $return)) {
			return true;
		}
	}
	#########################################
	# Récupère le nom du template si pas
	# default sera utilisé
	#########################################
	protected function getNameTpl () : string
	{
		$return = 'default';
		$sql = new BDD;
		$sql->table('TABLE_CONFIG');
		$sql->where(array(
			'name'  => 'name',
			'value' => 'CMS_TEMPLATE'
		));
		$sql->fields(array('value'));
		$sql->queryOne();
		if (!empty($sql->data->value)) {
			$return = $sql->data->value;
		}
		return $return;
	}
    ################################################
    # Inclusion des js
    ################################################
    public function javascripts ()
    {
        $files = array();
        $return = '';

        if (constant('CMS_JQUERY') == 1) {
            $files[] = '/assets/jquery-3.7.1.min.js';
            $files[] = '/assets/plugins/jquery-ui.min.js';
        }
        $files[] = '/assets/plugins/popper.min.js';

        $files[] = '/assets/plugins/glightbox/glightbox.min.js';
        $files[] = 'assets/plugins/tooltip/tippy-bundle.umd.min.js';
        $files[] = '/assets/plugins/tinymce/tinymce.min.js';
        $files[] = '/assets/belcms.core.js';

        if (constant('CMS_FONTAWSOME') == 1) {
            $files[] = '/assets/plugins/FontAwesome6.5.2/FontAwesome.all.6.5.2.min.js';
        }

        if (constant('CMS_BOOTSTRAP') == 1) {
            $files[] = '/assets/plugins/bootstrap-5.3.3/bootstrap.min.js';
        }

        if (is_file(ROOT.DS.'pages'.DS.strtolower(Route::page()).DS.'js'.DS.'javascript.js')) {
            $files[] = '/pages'.DS.strtolower(Route::page()).DS.'js'.DS.'javascript.js';
        }
    
        foreach ($files as $v) {
            $return .= '<script type="text/javascript" src="'.$v.'"></script>'.PHP_EOL;
        }

        return $return;
}
    ################################################
    # Inclusion des CSS nécessaire
    ################################################
    public function css ()
    {
        $files = array();
        $return = '';

        $files[] = '/assets/plugins/belcms.css';

        $files[] = '/assets/plugins/tooltip/scale.css';

        $files[] = '/assets/plugins/glightbox/glightbox.min.css';

        if (constant('CMS_FONTAWSOME') == 1) {
            $files[] = '/assets/plugins/FontAwesome6.5.2/FontAwesome.all.6.5.2.min.css';
        }

        if (constant('CMS_BOOTSTRAP') == 1) {
            $files[] = '/assets/plugins/bootstrap-5.3.3/bootstrap.min.css';
        }

        if (is_file(ROOT.DS.'pages'.DS.strtolower(Route::page()).DS.'css'.DS.'style.css')) {
            $files[] = '/pages'.DS.strtolower(Route::page()).DS.'css'.DS.'style.css';
        }

        foreach ($files as $v) {
            $return .= '	<link href="'.$v.'" rel="stylesheet" type="text/css" media="all">'.PHP_EOL;
        }
        
        return $return;
    }
}