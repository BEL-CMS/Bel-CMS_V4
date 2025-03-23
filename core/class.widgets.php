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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

final class Widgets
{
    public      $pos,
                $widgets;
    protected   $config;

    public function __construct($pos) {
        $this->pos = $pos;
        $this->config = self::getBDDConfig();
        $this->widgets = self::getWidgets();
    }
	##################################################
	# Récupère la widgets mis dans la variable.
	# $this->widgets[x][nom] = array();
	##################################################
	private function getWidgets ()
	{
		$return  = array();
		$listWidgetsActive = $this->config;
		foreach ($listWidgetsActive as $value) {
			$dir = ROOT.DS.'widgets'.DS.strtolower($value->name).DS.'controller.php';
			if (is_file($dir)) {
				require $dir;
				$require = "Belcms\Widgets\Controller\\".ucfirst($value->name)."\\".ucfirst($value->name);
				$widgets = new $require();
				if (method_exists($widgets, 'index')) {
					$widgets->index($value);
					$view = $widgets->view;
				}
			} else {
				return false;
			}
			switch ($value->pos) {
				case 'top':
					$return['top'][$value->name] = array('view' => $view);
				break;
				case 'right':
					$return['right'][$value->name] = array('view' => $view);
				break;
				case 'bottom':
					$return['bottom'][$value->name] = array('view' => $view);
				break;
				case 'left':
					$return['left'][$value->name] = array('view' => $view);
				break;
			}
		}
		return $return;
	}

    private function getBDDConfig ()
    {
        $where[] = array('name' => 'active', 'value' => '1');
        $where[] = array('name' => 'pos', 'value' => $this->pos);
        $sql = new BDD;
        $sql->table('TABLE_WIDGETS');
        $sql->where($where);
        $sql->queryAll();
        return $sql->data;
    }
}