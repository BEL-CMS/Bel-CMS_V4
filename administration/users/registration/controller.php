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

use BelCMS\Core\Interaction;
use BelCMS\Core\MsgAdmin;
use BelCMS\Core\Notification;
use BelCMS\Core\Secure;
use BelCMS\Core\User;
use BelCMS\Requires\Common;
use BelCMS\Core\encrypt;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Registration extends AdminPages
{
    var $admin  = true;
    var $active = true;
    var $bdd    = 'UsersModels';

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'registration?admin&option=users', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Créer un utilisateur', 'href' => 'registration/add?admin&option=users', 'ico'  => 'fa-solid fa-pen-to-square');

        $d['users'] = $this->models->getUsers();
        foreach ($d['users'] as $key => $value) {
            $d['users'][$key]->profils = User::getInfosUserAll($value->hash_key);
        }
        $this->set($d);
        $this->render('index', $menu);
    }

    public function add ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'registration?admin&option=users', 'ico'  => 'fa-solid fa-igloo');
        $this->render('add', $menu);
    }

    public function edit ()
    {
        $id = strlen($this->data[2]) != 32 ? true : false;
        if ($id == false or $id == 0) {
            $inter = new Interaction();
            $a['interaction'] = $inter->get($this->data[2]);
            $a['user']  = User::getInfosUserAll($this->data[2]);
            #######################################################
            $this->set($a);
            $this->render('edit');
        } else {
            #######################################################
            $inter = new Interaction();
            $inter->title(constant('ID_ERROR_TITLE'));
            $inter->message(constant('ID_ERROR_MSG'));
            $inter->author($_SESSION['USER']->user->hash_key);
            $inter->status('red');
            $inter->set();
            #######################################################
            $array = array(
                'type' => 'error',
                'text' => constant('ADMIN_TEXT_FALSE_ID')
            );
            $this->error('Utilisateur', $array['text'], $array['type']);
            $this->redirect('registration?admin&option=users', 2);
            return;
        }
    }

    public function updateUser ()
    {
        $id = Common::hash_key($this->data['id']) ? true : false;
        $infosUser = User::getInfosUserAll($this->data['id']);

        $this->models->addCountry (Common::VarSecure($_POST['country'],null), $this->data['id']);

        $user = $infosUser->user->username;
        if ($id === true) {
            $data = array(
                'username'  => Common::VarSecure($_POST['username'], null),
            );
            if ($user == $_POST['username']) {
                $this->redirect('registration?admin&option=users', 2);
                Notification::success('Rien ne change, c\'est votre nom d\'utilisateur.', get_class($this));
                return;
            }
            #-----------------------------------------------------------#
            if ($_SESSION['USER']->user->username != $data['username']) {
                $checkName = $this->models->checkUser($data['username']);
                if ($checkName >= 1) {
                    Notification::warning(constant('THIS_NAME_OR_PSEUDO_RESERVED'), get_class($this));
                    $this->redirect('registration?admin&option=users', 2);
                } else {
                    $data['username']   = str_replace(' ', '_', $data['username']);
                    $update['username'] = $data['username'];
                }
            } else {
                $update['username'] = $_SESSION['USER']->user->username;
                #######################################################
                $msg   = $_SESSION['USER']->user->username . ' à modifier les paramètres de l\'utilisateur ' . $update['username'];
                #######################################################
                $interaction = new Interaction();
                $interaction->status('green');
                $interaction->message($msg);
                $interaction->title('Changement dans le profiles');
                $interaction->author($_SESSION['USER']->user->hash_key);
                $interaction->setAdmin();
                #######################################################
                $this->redirect('registration?admin&option=users', 2);
            }
        } else {
            Notification::error('Un administrateur a reçu des informations sur une situation alarmante relative à l\'ID.', get_class($this));
            #######################################################
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message(constant('ID_ERROR_MSG'));
            $interaction->title('Usurpation d\'identité');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            $this->redirect('registration?admin&option=users', 2);
        }
    }

    public function admin ()
    {
        $root = ($_SESSION['USER']->user->root == '1') ? true : false;
        $id = Common::hash_key($this->id) ? true : false;
        if ($id === true and $root === true) {
            if ($_REQUEST['admin'] == 'on') {
                $return = $this->models->adminOn($this->id);
            } else {
                $return = $this->models->adminOff($this->id);
            }
            if ($return == true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('EDIT_PARAM_SUCCESS')
                );
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('EDIT_ERROR')
                );
            }
            $this->error('Utilisateur', $array['text'], $array['type']);
            $this->redirect('registration?admin&option=users', 2);
        } else {
            Notification::error('Un administrateur a reçu des informations sur une situation alarmante relative à l\'ID.', get_class($this));
            #######################################################
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message(constant('ID_ERROR_MSG'));
            $interaction->title('ID invalide ou interdiction ROOT');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            $this->redirect('registration?admin&option=users', 2);
        }
    }

    public function adduser ()
    {
        $insert             = array();
        $password           = Common::VarSecure($_POST['password'], null);
        $password_repeat    = Common::VarSecure($_POST['password_repeat'], null);
        $insert['hash_key'] = md5(uniqid(rand(), true));

        if ($password != $password_repeat) {
            $array = array(
                'type' => 'warning',
                'text' => constant('Les mots de passe sont différents.')
            );
            $this->error('Utilisateur', $array['text'], $array['type']);
            $this->redirect('registration/add?admin&option=users', 2);
            return;
        } else {
            $passwordCrypt =  new encrypt($password, $_SESSION['CONFIG']['CMS_KEY_ADMIN']);
            $password = $passwordCrypt->encrypt();
            $insert['password'] = $password;
        }

        $username  = Common::cleanText($_POST['username']);
        $testeUser = $this->models->checkUser ($username);

        if ($testeUser === true) {
            $insert['username'] = $username;
        } else {
            $array = array(
                'type' => 'warning',
                'text' => constant('Le nom d\'utilisateur existe déjà !')
            );
            $this->error('Utilisateur', $array['text'], $array['type']);
            $this->redirect('registration/add?admin&option=users', 2);
            return;
        }

        // mail

        debug($insert);
    }
}