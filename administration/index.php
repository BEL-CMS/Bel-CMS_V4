<?php

/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

namespace Belcms\Administration;

use BelCMS\Core\Dispatcher;
use BelCMS\Core\encrypt;
use BelCMS\Core\Interaction;
use BelCMS\Core\Notification;
use BelCMS\Core\Secure;
use BelCMS\Core\User as CoreUser;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

final class Administration
{
    var 	$page,
            $view,
            $link;
    public  $render,
            $data;
    private $controller;
    #########################################
    # redirige l'utilisateur si loguer ou pas
    #########################################
    function __construct()
    {
        if (isset($_SESSION['USER'])) {
            if ($_SESSION['USER']->user->admin == 1) {

                $this->link = Dispatcher::link();
                $this->page = Dispatcher::page();
                $this->view = Dispatcher::view();

                self::getLangs();

                if (isset($_SESSION['USER']->user->hash_key) && strlen($_SESSION['USER']->user->hash_key) == 32) {
                    if (isset($_SESSION['LOGIN_MANAGEMENT']) and $_SESSION['LOGIN_MANAGEMENT'] === true) {
                        require_once ROOT . DS . 'administration' . DS . 'intern' . DS . 'adminpages.php';
                        ############################################
                        if (isset($_SESSION['ADMIN']['LOG']) and $_SESSION['ADMIN']['LOG'] !== true) {
                            $msg = 'L\'utilisateur '.$_SESSION['USER']->user->username.' s\'est connecté à l\'administration.';
                            $interaction = new Interaction();
                            $interaction->status('green');
                            $interaction->message($msg);
                            $interaction->title('Connexion à l\'administration');
                            $interaction->author($_SESSION['USER']->user->hash_key);
                            $interaction->setAdmin();
                            $_SESSION['ADMIN']['LOG'] = true;
                        }
                        ############################################
                        self::base();
                    } else {
                        self::login();
                    }
                } else {
                    Common::Redirect('User/Login&echo');
                }
            } else {
                ############################################
                 # Notifier la commande
                ############################################
                $msg   = 'L\'utilisateur '.$_SESSION['USER']->user->username.' ne peut pas accéder à l\'administration.';
                $interaction = new Interaction();
                $interaction->status('orange');
                $interaction->message($msg);
                $interaction->title('Connexion à l\'administration');
                $interaction->author($_SESSION['USER']->user->hash_key);
                $interaction->setAdmin();
                #######################################################
                Notification::error('Vous n\'êtes pas autorisé à entrer dans l\'administration.', 'access', true);
                Common::Redirect('User/Login&echo', 3);
            }
        } else {
            ############################################
            # Tentative de connexion sans être logué
            ############################################
            $msg   = Common::GetIp(). ' à tenter de se connecter l\'administration sans être logué.';
            $interaction = new Interaction();
            $interaction->status('orange');
            $interaction->message($msg);
            $interaction->title('Connexion à l\'administration');
            $interaction->author(Common::GetIp());
            $interaction->setAdmin();
            #######################################################
            Notification::error(constant('ADMIN_CONNECT_LOSE'), 'Utilisateur', true);
        }
    }
    #########################################
    # Page principal avec le menu
    #########################################
    public function base()
    {
        $render        = self::getLinksPages();
        $menuPage      = self::menuPage();
        require_once ROOT . DS . 'administration' . DS . 'intern' . DS . 'layout.php';
    }
    #########################################
    # Gestion des pages & widgets + le dashboard
    #########################################
    private function getLinksPages()
    {
        $render = null;

        ob_start();

        $groups = $_SESSION['USER']->groups->all_groups;

        require_once ROOT . DS . 'administration' . DS . 'intern' . DS . 'adminpages.php';
        #####################################
        # Accessible Uniquement aux administrateurs de 1er niveau
        #####################################
        if (isset($_REQUEST['option']) and $_REQUEST['option'] == 'parameter') {
            if (
                Dispatcher::view() == strtolower('parameter') or
                Dispatcher::view() == strtolower('sendparameter') or
                Dispatcher::page() == strtolower('parameter') or
                $_REQUEST['option'] == 'parameter' or
                $_REQUEST['option'] == 'extras'
            ) {
                if (!in_array(1, $groups)) {
                    Notification::error(constant('NO_ACCESS_GROUP_PAGE'), 'Page');
                    $render = ob_get_contents();
                    if (ob_get_length() != 0) {
                        ob_end_clean();
                    }
                    $this->page = defined(strtoupper($this->page)) ? constant(strtoupper($this->page)) : $this->page;
                    $errorName = 'Accès non autorisé de ' . $_SESSION['USER']->user->username . ' à la page ' . $this->page . ' : paramètre';
                    return $render;
                }
            }
        }
        #####################################
        # End
        #####################################
        $this->page = strtolower($this->page);
        # requete page
        if (isset($_REQUEST['option']) and !empty($_REQUEST['option'])) {
            switch ($_REQUEST['option']) {
                case 'pages':
                    $requestPage = self::request('pages', $this->page);
                    break;

                case 'templates':
                    $requestPage = self::request('templates', $this->page);
                    break;

                case 'users':
                    $requestPage = self::request('users', $this->page);
                    break;

                case 'widgets':
                    $requestPage = self::request('widgets', $this->page);
                    break;

                case 'gaming':
                    $requestPage = self::request('gaming', $this->page);
                    break;

                case 'parameter':
                    $requestPage = self::request('parameter', $this->page);
                    break;

                case 'extras':
                    $requestPage = self::request('extras', $this->page);
                    break;

                default:
                    $requestPage = null;
                    break;
            }
            echo $requestPage;
        } else {
            require_once ROOT . DS . 'administration' . DS . 'intern' . DS . 'dashboard.php';
        }
        #####################################
        # end requete page
        #####################################
        # Mise en mémoire tempon
        #####################################
        $render = ob_get_contents();
        #####################################
        # reset le tempon
        #####################################
        if (ob_get_length() != 0) {
            ob_end_clean();
        }
        #####################################
        # Retourne le rendu de la page
        #####################################
        return $render;
    }
    #########################################
    # Requete des pages = menu
    #########################################
    private function request($request, $page)
    {
        $scan  = Common::ScanDirectory(ROOT.DS.'administration'.DS . $request);

        if (in_array($page, $scan)) {
            if (self::getAccessPage($page) === false) {
                Notification::error(constant('NO_ACCESS_GROUP_PAGE'), 'Page');
                $page = defined(strtoupper($page)) ? constant(strtoupper($page)) : $page;
            } else {
                $require = ROOT.DS.'administration'.DS . $request . DS . $page . DS . 'controller.php';
                if (!is_file($require)) {
                    Notification::error(constant('ACCESS_TO_CONTROLLER_IMPOSSIBLE') . '<br> ' . $require, 'Page', true);
                    die();
                }
                require_once $require;
                $this->controller = $this->page;
                $this->controller = new $this->controller;
                if ($this->controller->active === true) {
                    if (method_exists($this->controller, $this->view)) {
                        call_user_func_array(array($this->controller, $this->view), $this->link);
                    } else {
                        Notification::error(constant('THE_REQUESTED_SUBPAGE') . '<strong>' . $this->view . '</strong> ' . constant('IS_NOT_AVAILABLE_ON_THE_PAGE') . ' <strong>' . $page . '</strong>', constant('FILE'));
                    }
                    echo $this->controller->render;
                }
            }
        } else {
            Notification::error(constant('UNKNOWN_PAGE'), 'Page');
        }
    }
    #########################################
    # Page Login
    #########################################
    private function login()
    {
        if (CoreUser::isLogged()) {
            if (isset($_REQUEST['mail']) && isset($_REQUEST['password'])) {
                if (!empty($_REQUEST['mail']) && !empty($_REQUEST['password'])) {

                    if (Secure::isMail($_REQUEST['mail']) === false) {
                        $return['ajax'] = constant('PLEASE_ENTER_YOUR_MAIL');
                        echo json_encode($return);
                        return;
                    }

                    $return = array();

                    $sql = new BDD();
                    $sql->table('TABLE_USERS');
                    $sql->where(array('name' => 'mail', 'value' => $_REQUEST['mail']));
                    $sql->queryOne();
                    $data = $sql->data;

                    if (empty($data)) {
                        $return['ajax'] = 'le compte existe pas';
                        echo json_encode($return);
                        die();
                    }

                    $passwordCrypt =  new encrypt($data->password, $_SESSION['CONFIG']['CMS_KEY_ADMIN']);
                    $passwordSQL = $passwordCrypt->decrypt();

                    if ($passwordSQL == $_REQUEST['password']) {
                        if ($_SESSION['USER']->user->hash_key == $data->hash_key) {
                            $_SESSION['LOGIN_MANAGEMENT'] = true;
                            $return['ajax'] = constant('LOGIN_IN_PROGRESS');
                            echo json_encode($return);
                            return;
                        } else {
                            $return['ajax'] = constant('HASHKEY_DOES_NOT_MATCH_YOURS');
                        }
                    } else {
                        $return['ajax'] = constant('THE_PASS_IS_NOT_CORRECT');
                    }

                    echo json_encode($return);
                }
            } else {
                include ROOT . DS . 'administration' . DS . 'intern'.DS.'login.php';
            }
        } else {
            $return['ajax'] = 'vous devez etre logué';
            echo json_encode($return);
        }
    }
    #########################################
    # Menu des pages
    #########################################
    private function menuPage()
    {
        $pages  = self::getPages();
        $return = array();

        foreach ($pages as $k => $v) {
            $return['/' . $v . '?admin&option=pages'] = defined(strtoupper($v)) ? constant(strtoupper($v)) : $v;
        }
        return $return;
    }
    #########################################
    # Menu des Widgets
    #########################################
    private function menuWidget()
    {
        $widgets  = self::getWidgets();
        $return   = array();

        foreach ($widgets as $k => $v) {
            $return['/' . $v . '?admin&option=widgets'] = defined(strtoupper($v)) ? constant(strtoupper($v)) : $v;
        }
        return $return;
    }
    #########################################
    # Menu des Widgets
    #########################################
    private function menuTemplates()
    {
        $templates = self::getTemplates();
        $return    = array();

        foreach ($templates as $k => $v) {
            $return['/' . $v . '?admin&option=templates'] = defined(strtoupper($v)) ? constant(strtoupper($v)) : $v;
        }
        return $return;
    }
    #########################################
    # Menu Utilisateurs
    #########################################
    private function menuUsers()
    {
        $users  = self::getUsers();
        $return = array();

        foreach ($users as $k => $v) {
            $return['/' . $v . '?admin&option=users'] = defined(strtoupper($v)) ? constant(strtoupper($v)) : $v;
        }
        return $return;
    }
    #########################################
    # Menu gaming
    #########################################
    private function menuGaming()
    {
        $gaming  = self::getGaming();
        $return  = array();

        foreach ($gaming as $k => $v) {
            $return['/' . $v . '?admin&option=gaming'] = defined(strtoupper($v)) ? constant(strtoupper($v)) : $v;
        }
        return $return;
    }
    #########################################
    # Menu parameter
    #########################################
    private function menuParameter()
    {
        $parameter  = self::getParameter();
        $return     = array();

        foreach ($parameter as $k => $v) {
            $return['/' . $v . '?admin&option=parameter'] = defined(strtoupper($v)) ? constant(strtoupper($v)) : $v;
        }
        return $return;
    }
    #########################################
    # Menu Extras
    #########################################
    private function menuExtras()
    {
        $parameter  = self::getExtras();
        $return     = array();

        foreach ($parameter as $k => $v) {
            $return['/' . $v . '?admin&option=extras'] = defined(strtoupper($v)) ? constant(strtoupper($v)) : $v;
        }
        return $return;
    }
    #########################################
    # Scan le dossier des pages
    #########################################
    private function getPages()
    {
        $scan = Common::ScanDirectory(ROOT.DS.'administration'.DS . 'pages', true);
        asort($scan);
        return $scan;
    }
    #########################################
    # Scan le dossier des widgets
    #########################################
    private function getWidgets()
    {
        $scan = Common::ScanDirectory(ROOT.DS.'administration'.DS . 'widgets', true);
        asort($scan);
        return $scan;
    }
    #########################################
    # Scan le dossier d'utilisateurs
    #########################################
    private function getUsers()
    {
        $scan = Common::ScanDirectory(ROOT.DS.'administration'.DS . 'users', true);
        asort($scan);
        return $scan;
    }
    #########################################
    # Scan le dossier du templates
    #########################################
    private function getTemplates()
    {
        $scan = Common::ScanDirectory(ROOT.DS.'administration'.DS . 'templates', true);
        asort($scan);
        return $scan;
    }
    #########################################
    # Scan le dossier gaming
    #########################################
    private function getGaming()
    {
        $scan = Common::ScanDirectory(ROOT.DS.'administration'.DS . 'gaming', true);
        asort($scan);
        return $scan;
    }
    #########################################
    # Scan le dossier parameter
    #########################################
    private function getParameter()
    {
        $scan = Common::ScanDirectory(ROOT.DS.'administration'.DS . 'parameter', true);
        asort($scan);
        return $scan;
    }
    #########################################
    # Scan le dossier des pages
    #########################################
    private function getExtras()
    {
        $scan = Common::ScanDirectory(ROOT.DS.'administration'.DS . 'extras', true);
        asort($scan);
        return $scan;
    }
    #########################################
    # Autorisation des pages
    #########################################
    private function security()
    {
        $sql = new BDD();
        $sql->table('TABLE_USERS');
        $sql->where(array('name' => 'mail', 'value' => $_REQUEST['mail']));
        $sql->queryOne();
        $data = $sql->data;
    }
    #########################################
    # Accès au page admin via les groupes
    #########################################
    public function getAccessPage($page = null)
    {
        if ($page === null) {
            return false;
        } else {
            $bdd = self::accessSqlPages($page);
            if (isset($bdd[$page]->access_admin)) {
                if (in_array(0, $bdd[$page]->access_admin)) {
                    return true;
                } else {
                    foreach ($bdd[$page]->access_admin as $k => $v) {
                        $_SESSION['USER'] = CoreUser::getInfosUserAll($_SESSION['USER']->user->hash_key);
                        $access = $_SESSION['USER']->groups->all_groups;
                        if (isset($_SESSION['USER']->user->hash_key) && strlen($_SESSION['USER']->user->hash_key) == 32) {
                            if (in_array(1, $access)) {
                                return true;
                            }
                            if (in_array($v, $access)) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                }
            } else {
                return true;
            }
        }
    }
    #########################################
    # BDD Complet de la page demandé
    #########################################
    public function accessSqlPages($name)
    {
        $sql = new BDD();
        $sql->table('TABLE_CONFIG_PAGES');
        $sql->where(array('name' => 'name', 'value' => $name));
        $sql->queryAll();
        if (empty($sql->data)) {
            $return = false;
        } else {
            $return = $sql->data;
            foreach ($return as $k => $v) {
                $return[$v->name] = $v;
                $return[$v->name]->access_groups = explode('|', $return[$v->name]->access_groups);
                $return[$v->name]->access_admin  = explode('|', $return[$v->name]->access_admin);
                if (!empty($v->config)) {
                    $return[$v->name]->config = Common::transformOpt($return[$v->name]->config);
                } else {
                    unset($return[$v->name]->config);
                }
                unset($return[$k], $return[$v->name]->name);
            }
        }
        return $return;
    }
    #########################################
    # récupère tout les fichiers de lang et les inclus
    #########################################
    private function getLangs()
    {
        $scan = Common::ScanFiles(ROOT.DS.'administration'.DS . 'langs');
        foreach ($scan as $k => $v) {
            require_once ROOT.DS.'administration'.DS . 'langs' . DS . $v;
        }
        $lang = Common::ScanFiles(ROOT . DS . 'assets' . DS . 'langs' . DS);
        foreach ($lang as $v) {
            require_once ROOT . DS . 'assets' . DS . 'langs' . DS . $v;
        }

    }
}
