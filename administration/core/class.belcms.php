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

namespace BelCMS\Core;
use BelCMS\PDO\BDD;
use BelCMS\Core\Templates;
use BelCMS\Requires\Common;
use Dom\Notation;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
################################################
# Class Principale du CMS
################################################
final class BelCMS
{
    public  $link,
            $page,
            $widgets = array(),
            $templates;

    public function __construct ()
    {
        new Config;
        new User;
        self::getLangs();
		$this->link      = Dispatcher::page($_SESSION['CONFIG']['CMS_DEFAULT_PAGE']);
        $this->widgets   = self::WidgetsContent ();
        $this->page      = self::PageContent();
        $this->templates = self::Templates ();
        self::statsPages();
    }
    #########################################
    # inclus le contenu de la page
    #########################################
    public function PageContent ()
    {
        ob_start();
        $require = ucfirst($this->link);
        $view    = Dispatcher::view();
		$unavailable = new \Maintenance;
		if ($unavailable->status() == 'close') {
			if (User::isLogged()) {
				if (in_array(1, $_SESSION['USER']->groups->all_groups)) {
					Notification::alert($unavailable->description(), constant('WARNING'), false);
				}
			} else {
				if (empty($_SESSION['CONFIG_CMS']['CMS_WEBSITE_NAME'])) {
					$_SESSION['CONFIG_CMS']['CMS_WEBSITE_NAME'] = constant('NO_NAME');
				}
                require ROOT.DS.'assets'.DS.'templates'.DS.'maintenance'.DS.'tpl'.DS.'index.php';
				die();
			}
		}
        $dir = constant('DIR_PAGES').strtolower($this->link).DS.'controller.php';
        if (file_exists($dir)) {
            require_once $dir;
            $require = "Belcms\Pages\Controller\\".$require;
            $newPage = new $require;
            if (method_exists($newPage, $view)) {
                call_user_func_array(array($newPage,$view),Dispatcher::link());
                if (!empty($newPage->errorInfos) and is_array($newPage->errorInfos)) {
                    self::error($newPage->errorInfos[0], $newPage->errorInfos[1] , $newPage->errorInfos[2], $newPage->errorInfos[3]);
                } else {
                    echo $newPage->page;
                }
            } else {
                self::error('error', 'La page sollicitée ne peut pas être trouvée !', 'ERREUR 404', true);
                die();
            }
        } else {
           self::error404('ERREUR 404', 'La page que vous souhaitez consulter est introuvable.', true);
        }
        $content = ob_get_contents();
        echo $content;
        if (ob_get_length() != 0) {
            ob_end_clean();
        }
        return $content;
    }

    public function WidgetsContent ()
    {
		$return  = array();
		$listWidgetsActive = self::getWidgetsActive ();
		foreach ($listWidgetsActive as $value) {
			$dir = constant('DIR_WIDGETS').strtolower($value->name).DS.'controller.php';
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
	##################################################
	# Récupère la widgets actif
	# ne récupère pas les widgets dont les groupes
	# ne correspond pas au votre (sauf 0 ou admin nv1)
	##################################################
	private function getWidgetsActive ()
	{
		$page = strtolower($this->link);
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
				$a = explode('|', $v->pages);
				if (in_array($page, $a)) {
					$b[$k] = $v;
				}
			}
			foreach ($b as $k => $v) {
				if (isset($_SESSION['USER']) and !empty($_SESSION['USER'])) {
					if ($v->groups_access == 0 or in_array(1, $_SESSION['USER']->groups->all_groups)) {
						$return[$k] = $v;
					} else {
						$a = explode('|', $v->groups_access);
						if (in_array($_SESSION['USER']->groups->all_groups, $a)) {
							$return[$k] = $v;
						}
					}
				} else {
					if ($v->groups_access == 0) {
						$return[$k] = $v;
					}
				}
			}
		}
		return $return;
	}
    public function Templates ()
    {
		ob_start();
		new Templates($this);
		$content = ob_get_contents();
		if (ob_get_length() != 0) {
			ob_end_clean();
		}
		return $content;
    }

    #########################################
    # Retourn un message d'information de type
    # error - success - warning - infos
    #########################################
    private function error ($type = null, $text = 'inconnu', $title = 'INFO', $full = false)
    {
        if ($type == null) {
            $type = constant('INFO');
        }
        ob_start();
        echo Notification::$type($text, $title, $full);
        $return =  ob_get_contents();
        ob_end_clean();
        echo $return;
        if ($full === true) {
            die();
        }
    }
    private function error404 ($title, $text)
    {
        ob_start();
        echo Notification::error($text, $title, true);
        $return =  ob_get_contents();
        ob_end_clean();
        echo $return;
        die();
    }
    ##################################################
    # Statistique par page, incrémentation.
    ##################################################
    private function statsPages ()
    {
        if (Common::isBot() === false) {
            $sql = new BDD;
            $sql->table('TABLE_STATS');
            $sql->where(array(
                'name' => 'page',
                'value' => $this->link
            ));
            $sql->queryOne();
            if (!empty($sql->data)) {
                $update['nb_view'] = $sql->data->nb_view +1;
                $insert = new BDD;
                $insert->table('TABLE_STATS');
                $insert->where(array(
                    'name' => 'page',
                    'value' => $this->link
                ));
                $insert->update($update);
            }
        }
    }
    ##################################################
    # Inclus les fichiers langs.
    ##################################################
    private function getLangs ()
    {
        $scan = Common::ScanFiles(ROOT . DS . 'assets'.DS.'langs'.DS);
        foreach ($scan as $v) {
            require_once ROOT . DS . 'assets' . DS . 'langs' . DS.$v;
        }
    }
}