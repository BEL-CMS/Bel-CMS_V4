<?php
/**
 * Bel-CMS [Content management system]
 *  * @version 4.2.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
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
        $this->data        = self::get();
        $this->pageName    = Dispatcher::page();
        $this->subPageName = Dispatcher::view();
        $this->id          = isset($_GET['id']) ? $_GET['id'] : 0 ;
        self::isAccess(); 
        if (isset($this->useModels) and !empty($this->useModels)){
            self::loadModel($this->useModels);
        }
        self::BanForIdFail();
    }

    private function isAccess ()
    {
 		// Test si l'utilisateur a accès à la page.
        $security = Security::getAccessPage(strtolower($this->pageName));
		if ($security === false or $security == null) {
			$this->errorInfos = array('warning', constant('NO_ACCESS_GROUP_PAGE'), 'Info', $full = false);
			return false;
		}
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
        if (!empty($_SESSION)) {
            // Si il y  pas de template 
            if (empty($_SESSION['CONFIG']['CMS_TEMPLATE'])) {
                $dir = 'assets'.DS.'templates'.DS.'default'.DS.'custom'.DS.strtolower($this->pageName).'.'.strtolower($filename).'.php';
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
            } else {
                // S'il y a un template avec une page custom
                $dir = constant('DIR_TPL'). $_SESSION['CONFIG']['CMS_TEMPLATE'].DS.'custom'.DS.strtolower($this->pageName).'.'.strtolower($filename).'.php';
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
    # Nombre total d'éléments
    #########################################
    public static function paginationCount(string $table, array|false $where = false): int
    {
        $sql = new BDD();
        $sql->table($table);

        if ($where !== false) {
            $sql->where($where);
        }

        $sql->count();

        return (int) $sql->data;
    }
    #########################################
    # Pagination Bootstrap 5
    #########################################
    public static function pagination(int $nbpp = 5, ?string $page = null, ?string $table = null, array|false $where = false, string|bool $custom = false): string 
    {
        /* Vérifications */
        if ($table === null || $table === '') {
            return '';
        }
        $nbpp = $nbpp > 0 ? $nbpp : 5;
        /* Nombre total d'éléments */
        $total = self::paginationCount($table, $where);
        if ($total <= 0) {
            return '';
        }
        /* Calcul des pages */
        $lastPage   = (int) ceil($total / $nbpp);
        $currentPage = max(1, (int) Dispatcher::RequestPages());

        /* Empêche d'aller au-delà de la dernière page */
        if ($currentPage > $lastPage) {
            $currentPage = $lastPage;
        }

        /* Une seule page : aucune pagination nécessaire */
        if ($lastPage <= 1) {
            return '';
        }

        /* URL de base */
        $baseUrl = $page ?? '';
        /*
        * Conservation des paramètres GET existants,
        * sauf le paramètre page qui sera remplacé.
        */
        $queryParams = $_GET;
        unset($queryParams['page']);

        /* Création d'une URL de pagination */
        $createUrl = static function (int $pageNumber) use ($baseUrl, $queryParams): string 
        {
            $params = array_merge(
                $queryParams,
                ['page' => $pageNumber]
            );

            $separator = str_contains($baseUrl, '?') ? '&' : '?';

            return htmlspecialchars(
                $baseUrl . $separator . http_build_query($params),
                ENT_QUOTES,
                'UTF-8'
            );
        };

        /* Création d'un bouton normal */
        $createPageItem = static function (int $pageNumber, string $content, bool $active = false, bool $disabled = false, ?string $label = null) use ($createUrl): string 
        {
            $classes = ['page-item'];

            if ($active) {
                $classes[] = 'active';
            }
            if ($disabled) {
                $classes[] = 'disabled';
            }
            $ariaCurrent = $active
                ? ' aria-current="page"'
                : '';
            $ariaLabel = $label !== null
                ? ' aria-label="' . htmlspecialchars(
                    $label,
                    ENT_QUOTES,
                    'UTF-8'
                ) . '"'
                : '';
            if ($active || $disabled) {
                return sprintf(
                    '<li class="%s"%s>
                        <span class="page-link"%s>%s</span>
                    </li>',
                    implode(' ', $classes),
                    $ariaCurrent,
                    $ariaLabel,
                    $content
                );
            }
            return sprintf(
                '<li class="%s">
                    <a class="page-link" href="%s"%s>%s</a>
                </li>',
                implode(' ', $classes),
                $createUrl($pageNumber),
                $ariaLabel,
                $content
            );
        };

        /* Création des numéros à afficher */
        $visiblePages = [];

        for ($number = 1; $number <= $lastPage; $number++) {
            $isFirstPages = $number <= 2;
            $isLastPages  = $number >= $lastPage - 1;
            $isNearCurrent = abs($number - $currentPage) <= 1;

            if ($isFirstPages || $isLastPages || $isNearCurrent) {
                $visiblePages[] = $number;
            }
        }
        /* Construction HTML*/
        if ($custom === false) {
            $html = '<div class=""container><div class="row"><nav id="belcms_pagination" aria-label="Navigation des pages">';
            $html .= '<ul class="pagination justify-content-center flex-wrap">';
            /* Première page */
            $html .= $createPageItem(
                1,
                '<i class="fa-solid fa-angles-left"></i>',
                false,
                $currentPage === 1,
                'Première page'
            );
            /* Page précédente */
            $html .= $createPageItem(
                max(1, $currentPage - 1),
                '<i class="fa-solid fa-angle-left"></i>',
                false,
                $currentPage === 1,
                'Page précédente'
            );
            /* Pages numérotées et séparateurs */
            $previousPage = null;

            foreach ($visiblePages as $pageNumber) {
                /*
                * Ajout des points de suspension
                */
                if (
                    $previousPage !== null
                    && $pageNumber > $previousPage + 1
                ) {
                    $html .= '
                        <li class="page-item disabled">
                            <span class="page-link">…</span>
                        </li>
                    ';
                }

                $html .= $createPageItem(
                    $pageNumber,
                    (string) $pageNumber,
                    $pageNumber === $currentPage
                );

                $previousPage = $pageNumber;
            }

            /* Page suivante */
            $html .= $createPageItem(
                min($lastPage, $currentPage + 1),
                '<i class="fa-solid fa-angle-right"></i>',
                false,
                $currentPage === $lastPage,
                'Page suivante'
            );

            /* Dernière page */
            $html .= $createPageItem(
                $lastPage,
                '<i class="fa-solid fa-angles-right"></i>',
                false,
                $currentPage === $lastPage,
                'Dernière page'
            );

            $html .= '</ul>';
            $html .= '</nav></div></div>';
        } else {
            $html = $custom;
        }

        return $html;
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

    ##################################################
    # Blocage automatique, identifiant [NO-ID NUMERIC]
    ##################################################
    private function BanForIdFail ()
    {
        $return = true;
        $pages  = strtolower(Dispatcher::page());
        $view   = strtolower(Dispatcher::view());
        $id     = Dispatcher::id();

        $array = array(
            'members'  => 'detail',
            'articles' => 'getpages',
            'gallery'  => 'detail',
        );

        if (array_key_exists($pages, $array) and in_array($view, $array)) {
            return $return;
        } else {
            if (!is_numeric($id)) {
                $return = Common::SecureRequest(Dispatcher::link()[2], false);
            }
        }

        return $return;
    }
}