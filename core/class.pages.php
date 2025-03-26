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
use BelCMS\Requires\Common;

class Pages
{
    var     $vars = array(),
            $useModels,
            $errorInfos,
            $data,
            $typeMime = 'text/html';

    public  $models,
            $page,
            $subPage,
            $id;

    protected $pageName,
              $subPageName;

    public function __construct ()
    {
        self::isAccess();
        $this->data        = self::get();
        $this->pageName    = Dispatcher::page();
        $this->subPageName = Dispatcher::view();
        $this->id          = isset($_GET['id']) ? $_GET['id'] : 0 ;
        if (isset($this->useModels) and !empty($this->useModels)){
            self::loadModel($this->useModels);
        }
    }

    private function isAccess ()
    {
        $name = Common::VarSecure(Dispatcher::page(), null);
        $sql = new BDD;
        $sql->table('TABLE_CONFIG_PAGES');
        $where = array('name' => 'name', 'value' => $name);
        $sql->where($where);
        $sql->queryOne();
        if (!empty($sql->data)) {
            if ($sql->data->active != 1) {
                $this->errorInfos = array('error','La page est actuellement fermé', 'Page Fermer', false);
            } else {
                $groupsUser  = explode('|',$sql->data->access_groups);
                $groupsAdmin = explode('|',$sql->data->access_admin);
                $groups = array_unique(array_merge($groupsUser,$groupsAdmin), SORT_REGULAR);
                if (in_array(0, $groups)) {
                    return true;
                } else {
    
                }
            }
        } else {
            $this->errorInfos = array('error','La page est actuellement fermé', 'Page Fermer', false);
        }
    }
#########################################
    # Retourne le rendu de la page,
    # et gère les accès & variables (set);
    #########################################
    function render($filename)
    {
        extract($this->vars);
        // Démarre la mémoire tampon
        ob_start();
        // Si il y a un template 
        if (!empty($_SESSION['CONFIG_CMS']['CMS_TPL_WEBSITE'])) {
            // Si il y a un template avec une page custom
            $dir = constant('DIR_TPL').$_SESSION['CONFIG_CMS']['CMS_TPL_WEBSITE'].DS.'custom'.DS.strtolower($this->pageName).'.'.strtolower($filename).'.php';
            // Si le fichier existe, on inclut
            if (is_file($dir)) {
                include $dir;
            // Autrement on test de prendre la page par default
            } else {
                $dir = constant('DIR_PAGES').strtolower($this->pageName).DS.$filename.'.php';
                // test si le fichier exsite dans la page (normalement oui, c'est un fichier d'origine).
                if (is_file($dir)) {
                    include $dir;
                // Autrement une page d'erreur se met en route.
                } else {
                    $error_text = $dir. ' Introuvable';
                    $this->errorInfos = array('warning', $error_text, constant('NOT_FOUND'), true);
                    return false;
                }
            }
        // S'il n'y a pas de template
        } else {
            // On teste s'il a une page custom dans le template par défaut
            $custom = constant('DIR_TPL').strtolower('default').DS.'custom'.DS.strtolower($this->pageName).'.'.strtolower($filename).'.php';
            $dirDefault = constant('DIR_PAGES').strtolower($this->pageName).DS.$filename.'.php';
            // Si le fichier existe, on inclut
            if (is_file($custom)) {
                include $custom;
            // Si pas, on essaye d'inclure le fichier par défaut (il doit exister normalement !)
            } else if (is_file($dirDefault)) {
                include $dirDefault;
            // Vraiment, au cas où le fichier a été effacé, j'inclus une erreur
            } else {
                $error_text = 'Fichier manquant';
                $this->errorInfos = array('warning', $error_text, constant('FILE_NO_FOUND'), $full = true);
                return false;
            }
        }
        // Met en le tampon dans une variable ($this->page);
        $this->page = ob_get_contents();
        // Verifie si le tampon est rempli, 
        // Détruit les données du tampon de sortie
        // et éteint la temporisation de sortie.
        if (ob_get_length() != 0) {
            ob_end_clean();
        }
    }
    #########################################
    # inclus le models
    #########################################
    public function loadModel ($name)
    {
        $dir = constant('DIR_PAGES').strtolower($this->pageName).DS.'models.php';

        if (is_file($dir)) {
            require_once $dir;
            $name = "Belcms\Pages\Models\\".$name;
            $this->models = new $name();
        } else {
            $error_name   = constant('FILE_NO_FOUND_MODELS');
            $error_text   = constant('FILE').' : <br>'.$dir.' '.constant('NOT_FOUND');
            $this->errorInfos = array('error', $error_text, $error_name, $full = true);
            return false;
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
            $return = new Dispatcher;
            $return = $return->link;
        }
        return $return;
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
	# Pagination count nb ligne
	#########################################
	function paginationCount ($nb, $table, $where = false)
	{
		$return = 0;

		$sql = New BDD();
		$sql->table($table);
		if ($where !== false) {
			$sql->where($where);
		}
		$sql->count();
		$return = $sql->data;

		return $return;
	}
	#########################################
	# Pagination
	#########################################
	function pagination ($nbpp = '5', $page = null, $table = null, $where = false)
	{
		$nbpp        = $nbpp == 0 ? 5 : $nbpp;
		$current     = (int) Dispatcher::RequestPages();
		$page_url    = $page.'?';
		$total       = self::paginationCount($nbpp, $table, $where);
		$adjacents   = 1;
		$current     = ($current == 0 ? 1 : $current);
		$start       = ($current - 1) * $nbpp;
		$prev        = $current - 1;
		$next        = $current + 1;
		$setLastpage = ceil($total/$nbpp);
		$lpm1        = $setLastpage - 1;
		$setPaginate = null;

		if ($setLastpage > 1) {
			$setPaginate .= '<nav id="belcms_pagination"><ul>';
			if ($setLastpage < 7 + ($adjacents * 2)) {
				for ($counter = 1; $counter <= $setLastpage; $counter++) {
					if ($counter == $current) {
						$setPaginate.= '<li class="belcms_pagination_item active"><a href="#">'.$counter.'</a></li>';
					} else {
						$setPaginate.= '<li class="belcms_pagination_item"><a href="'.$page_url.'page='.$counter.'">'.$counter.'</a></li>';
					}
				}
			} else if($setLastpage > 5 + ($adjacents * 2)) {
				if ($current < 1 + ($adjacents * 2)) {
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
						if ($counter == $current) {
							$setPaginate.= '<li class="belcms_pagination_item active"><a href="#">'.$counter.'</a></li>';
						} else {
							$setPaginate.= '<li class="belcms_pagination_item"><a href="'.$page_url.'page='.$counter.'">'.$counter.'</a></li>';
						}
					}
					$setPaginate .= '<li class="belcms_pagination_item"><a href="'.$page_url.'page='.$lpm1.'">'.$lpm1.'</a></li>';
					$setPaginate .= '<li class="belcms_pagination_item"><a href="'.$page_url.'page='.$setLastpage.'">'.$setLastpage.'  </a></li>';
				}
				else if($setLastpage - ($adjacents * 2) > $current && $current > ($adjacents * 2)) {
					$setPaginate.= '<li class="belcms_pagination_item"><a href="'.$page_url.'page=1">1</a></li>';
					$setPaginate.= '<li class="belcms_pagination_item"><a href="'.$page_url.'page=2">2</a></li>';
					for ($counter = $current - $adjacents; $counter <= $current + $adjacents; $counter++) {
						if ($counter == $current) {
							$setPaginate.= '<li class="belcms_pagination_item active"><a href="#">'.$counter.'</a></li>';
						}
						else {
							$setPaginate.= '<li class="belcms_pagination_item"><a href="'.$page_url.'page='.$counter.'">'.$counter.'</a></li>';
						}
					}
					$setPaginate.= '<li class="belcms_pagination_item"><a href="'.$page_url.'page='.$lpm1.'">'.$lpm1.'</a></li>';
					$setPaginate.= '<li class="belcms_pagination_item"><a href="'.$page_url.'page='.$setLastpage.'">'.$setLastpage.'</a></li>';
				} else {
					$setPaginate.= '<li class="belcms_pagination_item"><a href="'.$page_url.'page=1">1</a></li>';
					$setPaginate.= '<li class="belcms_pagination_item"><a href="'.$page_url.'page=2">2</a></li>';
					for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++) {
						if ($counter == $current) {
							$setPaginate.= '<li class="belcms_pagination_item active"><a href="#">'.$counter.'</a></li>';
						} else {
							$setPaginate.= '<li class="belcms_pagination_item"><a href="'.$page_url.'page='.$counter.'">'.$counter.'</a></li>';
						}
					}
				}
			}

			if ($current < $counter - 1) {
				$setPaginate .= '<li class="belcms_pagination_item"><a href="'.$page_url.'page='.$next.'"><i class="fa-solid fa-forward"></i></a></li>';
				$setPaginate .= '<li class="belcms_pagination_item"><a href="'.$page_url.'page='.$setLastpage.'"><i class="fa-solid fa-slash"></i></a></li>';
			} else {
				$setPaginate .= '<li class="belcms_pagination_item disabled"><a href="#"><i class="fa-solid fa-forward"></i></a></li>';
				$setPaginate .= '<li class="belcms_pagination_item disabled"><a href="#"><i class="fa-solid fa-slash"></i></a></li>';
			}
		}

		return $setPaginate;
	}
    #########################################
    # Retourn un message d'information de type
    # error - success - warning - infos
    #########################################
    public function message ($type = null, $text = 'inconnu', $title = 'INFO', $full = false)
    {
        if ($type == null) {
            $type = constant('INFO');
        }
        ob_start();
        echo Notification::$type($text, $title, $full);
        $return =  ob_get_contents();
        ob_end_clean();
        echo $return;
    }

    public function interaction ($code, $msg, $page = null)
    {
        $data['author']  = $_SESSION['USER']->user->hash_key;
        $data['code']    = $code;
        $data['message'] = $msg;
        $data['page']    = $page;

        $sql = new BDD;
        $sql->table('TABLE_INTER_ADMIN');
        $sql->insert($data);
    }
}

