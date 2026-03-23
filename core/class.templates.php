<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.3]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
*/

namespace BelCMS\Core;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Templates
{
    public  $link,
            $css,
            $js,
            $page,
            $view,
            $widgets,
            $fullwide,
            $host,
            $keywords,
            $description,
            $custom_tpl;

    public function __construct($var = null)
    {
        $this->link         = ucfirst($var->link ?? '');
        $this->css          = self::cascadingStyleSheets($var->link);
        $this->js           = self::javaScript($var->link);
        $this->page         = $var->page;
        $this->view         = Dispatcher::view();
        $this->fullwide     = self::getFullWide();
        $this->host         = GetHost::getBaseUrl();
        $this->widgets      = $var->widgets;
        $this->description  = self::getDescription(Dispatcher::page());
        $this->keywords     = self::keywords(Dispatcher::page());
        $fileLoadTpl        = constant('DIR_TPL').self::getNameTpl().DS.'template.php';
        $fileLoadTplDefault = ROOT.DS.'assets'.DS.'templates'.DS.'default'.DS.'template.php';
        if ($_SESSION['CONFIG']['CMS_CUSTOM_CSS'] == 1) {
            $files = 'templates'.DS.self::getNameTpl().DS.'custom'.DS.'styles.css';
            $this->custom_tpl .= '<link href="'.$files.'" rel="stylesheet" type="text/css" media="all">'.PHP_EOL;
        } else {
            $this->custom_tpl = null;
        }
        if (is_file($fileLoadTpl) === true) {
            require $fileLoadTpl;
        } else {
            require $fileLoadTplDefault;
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
    protected function getDescription ($page)
    {
        if ($page != 'comments') {
            $page = Common::VarSecure($page, null);
            if ($page != '') {
                $sql = new BDD;
                $sql->table('TABLE_CONFIG_PAGES');
                $sql->where(array('name' => 'name', 'value' => $page));
                $sql->queryOne();
                $data = $sql->data;
                $return = $data->description;
                return $return;
            } else {
                return '';
            }
        } else {
            return '';
        }
    }
    #########################################
    # Récupère les page en fullwide
    #########################################
    protected function getFullWide ()
    {
        $page = explode(',', $_SESSION['CONFIG']['CMS_TPL_FULL']);
        foreach ($page as $k => $v) {
            $return[$k] = trim($v);
        }

        $page = strtolower(Dispatcher::page() ?? '');
        $view = strtolower(Dispatcher::view() ?? '');

        if (in_array($page, $return)) {
            return true;
        }
        if (in_array($view, $return)) {
            return true;
        }
    }
	private function getCssWidgets ()
	{
		$return = array();
		$a      = array();
		$b      = array();

		$sql = new BDD;
		$sql->table('TABLE_WIDGETS');
		$sql->where(array(
			'name'  => 'active',
			'value' => 1
		));
		$sql->orderby(array('name' => 'orderby', 'value' => 'ASC'));
		$sql->queryAll();
		if (!empty($sql->data)) {
			foreach ($sql->data as $k => $v) {
				if (empty($v->page)) {
					$b[$k] = $v;
				} else {
					$a = explode('|', $v->pages);
					if (empty($v->page)) {
						if (!in_array($this->configTPL->link, $a)) {
							$b[$k] = $v;
						}	
					}
				}
			}
			foreach ($b as $k => $v) {
				if (isset($_SESSION['USER'])) {
					if ($v->groups_access == 0 or in_array(1, $_SESSION['USER']->groups->all_groups)) {
						$return[$k] = $v;
					} else {
						$a = explode('|', $v->groups_access);
						if (in_array($_SESSION['USER']->groups->all_groups, $a)) {
							$return[$k] = $v;
						}
					}
				} else {
					$groups = explode('|', $v->groups_access);
					if (in_array(0, $groups)) {
						$return[$k] = $v;
					}
				}
			}
		}
		return $return;
	}
    #########################################
    # Gestions des styles (css)
    #########################################
    public function cascadingStyleSheets ($var) : string
    {
        $return         = '';
        $link           = strtolower($var);
        /* GLOBAL STYLE */
        $files[] = 'assets/css/belcms.global.css';
        $files[] = 'assets/css/color.css';
        /* jQuery ui 1.13.2 */
        $files[] = 'assets/plugins/jquery-ui-1.13.2/jquery-ui.structure.min.css';
        $files[] = 'assets/plugins/jquery-ui-1.13.2/themes/base/jquery-ui.min.css';
        /* bootstrap v5.3.3 */
        $files[] = 'assets/plugins/bootstrap-5.3.3/css/bootstrap.min.css';
        /* FONTAWASOME 6.5.1 ALL */
        $files[] = 'assets/plugins/fontawesome-6.5.1/css/all.min.css';

        $files[] = 'assets/plugins/lightbox/lightbox.css';

        if ($link == 'articles') {
            $files[] = 'assets/plugins/prism/prism.css';
        }
		/* widgets css */
		foreach (self::getCssWidgets() as $v) {
			/* widgets css default */
			$dirWidgets = constant('DIR_WIDGETS').strtolower($v->name).DS.'css'.DS.'styles.css';
			if (is_file($dirWidgets)) {
				$files[] = 'widgets/'.strtolower($v->name).'/css/styles.css';
			}
		}
        /* pages css */
        $dirPage = constant('DIR_PAGES').strtolower($var).DS.'css'.DS.'style.css';

        if (is_file($dirPage)) {
            $files[] = 'pages/'.strtolower($var).'/css/style.css';
        }

        foreach ($files as $v) {
            $return .= '<link href="'.$v.'" rel="stylesheet" type="text/css" media="all">'.PHP_EOL;
        }
        return $return;
    }
    #########################################
    # Gestions des scripts (js)
    #########################################
    public function javaScript ($var) : string
    {
        $link           = strtolower($var);
        $files          = array();
        $return         = '';
        /* jQuery 3.7.1 */
        $files[] = 'assets/plugins/jQuery/jquery-3.7.1.min.js';
        /* jQuery UI 1.13.2 */
        $files[] = 'assets/plugins/jquery-ui-1.13.2/jquery-ui.min.js';
        /* bootstrap v5.3.3 */
        $files[] = 'assets/plugins/bootstrap-5.3.3/js/bootstrap.min.js';
        /* FONTAWASOME 6.5.1 ALL */
        $files[] = 'assets/plugins/fontawesome-6.5.1/js/all.min.js';

        $files[] = 'assets/plugins/lightbox/lightbox.js';
        /* Tinymce */
        $files[] = 'assets/plugins/tinymce/tinymce.min.js';
        /* Tooltip */
        $files[] = 'assets/plugins/tooltip/popper.min.js';
        $files[] = 'assets/plugins/tooltip/tippy-bundle.umd.min.js';
        $files[] = 'assets/plugins/tooltip/tooltip.js';
        /* jQuery Widgets */
		foreach (self::getCssWidgets() as $v) {
			/* widgets css default */
			$dirWidgets = constant('DIR_WIDGETS').strtolower($v->name).DS.'js'.DS.'javascripts.js';
			if (is_file($dirWidgets)) {
				$files[] = 'widgets/'.strtolower($v->name).'/js/javascripts.js';
			}
		}
        /* jQuery BEL-CMS */
        $files[] = 'assets/js/belcms.core.js';
        /* pages js */

        $dirPage = ROOT.DS.'pages'.DS.strtolower($var).DS.'js'.DS.'javascripts.js';
		if ($dirPage) {
			$files[] = 'pages/'.strtolower($var). '/js/javascript.js';
		}
        if ($link == 'articles') {
            $files[] = 'assets/plugins/prism/prism.js';
        }

        foreach ($files as $v) {
            $return .= '	<script type="text/javascript" src="'.$v.'"></script>'.PHP_EOL;
        }
        return $return;
    }

    protected function keywords ($page)
    {
        if ($page != 'comments') {
            $page = Common::VarSecure($page, null);
            if ($page != '') {
                $sql = new BDD;
                $sql->table('TABLE_CONFIG_PAGES');
                $sql->where(array('name' => 'name', 'value' => $page));
                $sql->queryOne();
                $data = $sql->data;
                $return = $data->keywords;
                return $return;
            } else {
                return '';
            }
        } else {
            return '';
        }
    }
}