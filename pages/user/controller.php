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

namespace Belcms\Pages\Controller;

use BelCMS\Core\Pages;
use BelCMS\Core\Secure;
use BelCMS\Core\User as CoreUser;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class User extends Pages
{
    var $useModels = 'ModelsUser',
        $dir       = 'user';
	#########################################
    #   Creation du dossier de l'utilisateur
    #########################################
    function __construct()
    {
        parent::__construct();
        if (CoreUser::isLogged() === true) {
            $dir = constant('DIR_UPLOADS_USER').$_SESSION['USER']->user->hash_key.'/';
            if (!is_dir($dir)) {
                mkdir($dir, 0774, true);
            }
            $fopen  = fopen($dir.'/index.html', 'a+');
            fclose($fopen);

            $dir = constant('DIR_UPLOADS_USER').$_SESSION['USER']->user->hash_key.'/avatar/';
            if (!is_dir($dir)) {
                mkdir($dir, 0774, true);
            }
            $fopen  = fopen($dir.'/index.html', 'a+');
            fclose($fopen);
        }
    }
	#########################################
    #   Page principal d'utilisateur
    #########################################
    public function index ()
    {
        if (CoreUser::isLogged()) {
            $this->render('index');
        } else {
            $this->redirect('/user/login&echo', 0);
        }
    }
    public function sendGeneral ()
    {
        $data = array(
            'username'  => Common::VarSecure($_POST['username'], null),
            'mail'      => Secure::isMail($_POST['mail'])
        );
        #-----------------------------------------------------------#
        if ($_SESSION['USER']->user->username != $data['username']) {
            $checkName = $this->models->checkUser($data['username']);
            if ($checkName >= 1) {
                $this->message('warning', constant('THIS_NAME_OR_PSEUDO_RESERVED'), constant('INFO'));
            } else {
                $data['username']   = str_replace(' ', '_', $data['username']);
                $update['username'] = $data['username'];
            }
        } else {
            $update['username'] = $_SESSION['USER']->user->username;
        }
        #-----------------------------------------------------------#
        $backlist = $this->models->blackListEmail($data['mail']);
        $arrayBlackList = array();
        foreach ($backlist as $k => $v) {
            $arrayBlackList[$v['id']] = $v['name'];
        }
        if (!empty($data['mail'])) {
            $tmpMailSplit = explode('@', $data['mail']);
            $tmpNdd =  explode('.', $tmpMailSplit[1]);
        }
        $checkMail = $this->models->checkMail($data['mail']);
        if (in_array($tmpNdd[0], $arrayBlackList)) {
            $this->message('warning', constant('NO_MAIL_ALLOWED'), constant('INFO'));
        }
        if ($_SESSION['USER']->user->mail != $data['mail']) {
            if ($checkMail >= 1) {
                $this->message('warning', constant('THIS_MAIL_IS_ALREADY_RESERVED'), constant('INFO'));
            } else {
                $update['mail'] = $data['mail'];
            }
        } else {
            $update['mail'] = $_SESSION['USER']->user->mail;
        }
        #-----------------------------------------------------------#
        $profils = array(
            'birthday'  => Common::DatetimeSQL($_POST['birthday'], false, 'Y-m-d'),
            'websites'  => Secure::isUrl($_POST['websites']),
            'country'   => Common::VarSecure($_POST['country'], null),
            'gender'    => Common::VarSecure($_POST['gender'], null),
            'info_text' => Common::VarSecure($_POST['info_text'], 'html')
        );
        #-----------------------------------------------------------#
        $result = array_merge($update, $profils);
        #-----------------------------------------------------------#
        $return = $this->models->updateUser ($result);
        $this->message($return['type'], $return['msg'], constant('INFO'));
        $this->redirect('user', 2);
    }
	#########################################
    #   Login
    #########################################
    public function login ()
    {
        if (CoreUser::isLogged()) {
            $this->redirect('/user', 2);
        } else {
            $d['page'] = 'login';
            $this->set($d);
            $this->render('login');
        }
    }
    public function getLogin ()
    { 
        $user     = $_POST['user'];
        $password = $_POST['password'];
        $return = $this->models->login($user, $password);
        $this->message($return['type'], $return['msg'], constant('INFO'));
        $this->redirect('/user/login&echo', 2);
    }
	#########################################
    #   S'enregistrer
    #########################################
    public function registred ()
    {
        if (CoreUser::isLogged()) {
            self::index();
        } else {
            $this->render('registred');
        }
    }
    #########################################
    #   Création d'un utilisateur
    #########################################
    public function createUser()
    {
        $error = 0;
        $array['username']  = Common::VarSecure($_POST['name'], null);
        $array['mail']      = Secure::isMail($_POST['mail']);
        $array['password']  = Common::VarSecure($_POST['password'], null);
        if (!empty($array['username'])) {
            $array['username'] = str_replace(' ', '_', $array['username']);
        }

        $backlist = $this->models->blackListEmail($array['mail']);
        $arrayBlackList = array();
        foreach ($backlist as $k => $v) {
            $arrayBlackList[$v['id']] = $v['name'];
        }
        if (!empty($array['mail'])) {
            $tmpMailSplit = explode('@', $array['mail']);
            $tmpNdd =  explode('.', $tmpMailSplit[1]);
        }

        $checkName = $this->models->checkUser($array['username']);
        $checkMail = $this->models->checkMail($array['mail']);

        if (empty($array['username']) or empty($array['mail']) or empty($array['password'])) {
            $this->message('warning', constant('UNKNOW_USER_MAIL_PASS'), constant('INFO'));
        } else if (in_array($tmpNdd[0], $arrayBlackList)) {
            $this->message('warning', constant('NO_MAIL_ALLOWED'), constant('INFO'));
        } else if (strlen($array['username']) < 3) {
            $this->message('warning', constant('MIN_THREE_CARACTER'), constant('INFO'));
        } else if (strlen($array['password']) < 6) {
            $return['msg']   = constant('MIN_SIX_CARACTER');
            $error++;
            $this->message('warning', constant('MIN_SIX_CARACTER'), constant('INFO'));
        } else if (strlen($array['username']) > 32) {
            $this->message('warning', constant('MAX_CARACTER'), constant('INFO'));
        } else if ($checkName >= 1) {
            $this->message('warning', constant('THIS_NAME_OR_PSEUDO_RESERVED'), constant('INFO'));
        } elseif ($checkMail >= 1) {
            $this->message('warning', constant('THIS_MAIL_IS_ALREADY_RESERVED'), constant('INFO'));
        } else {
            $return = $this->models->sendRegistration($array);
            CoreUser::login($array['username'], $array['password']);
            $this->message('success', $return['msg'], constant('INFO'));
            $this->redirect('user', 2);
        }
    }
	#########################################
    #   Supprimé un utilisateur
    #########################################
    public function deleteAccount ()
    {
        if (CoreUser::isLogged()) {
            $return = $this->models->deleteAccount ();
            $this->message($return['type'], $return['msg'], constant('INFO'));
            $this->redirect('/index.php', 2);
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user', 2);
        }
    }
	#########################################
    #   Login d'un utilisateur
    #########################################
    public function sendLogin ()
    {
        $user   = Common::VarSecure($_POST['user'], null);
        $mdp    = Common::VarSecure($_POST['password'], null);
        $return = CoreUser::login($user, $mdp);
        $this->message($return['type'], $return['msg'], constant('INFO'));
        $this->redirect('user', 2);
    }
	#########################################
    #   Mot de passe perdu
    #########################################
    public function passwordLost ()
    {
        if (CoreUser::isLogged()) {
            $d['page'] = 'passwordLost';
            $this->set($d);
            $this->render('login');
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user/login&echo', 0);
        }
    }
	#########################################
    #   Material
    #########################################
    public function material ()
    {
        if (CoreUser::isLogged()) {
            $this->render('material');
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));          
            $this->redirect('/user/login&echo', 0);
        }
    }
    public function sendMateriel ()
    {
        if (CoreUser::isLogged()) {
            foreach ($_POST as $key => $value) {
                $array[$key] = Common::VarSecure($value, null);
            }
            $return = $this->models->updateMaterial ($array);
            $this->message('success', $return['msg'], constant('INFO'));
            $this->redirect('/user/Material', 2);
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user/login&echo', 0);
        }
    }
	#########################################
    #   Social
    #########################################
    public function Social ()
    {
        if (CoreUser::isLogged()) {
            $this->render('social');
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user/login&echo', 0);
        }
    }
    public function submitsocial ()
    {
        if (CoreUser::isLogged()) {
            foreach ($_POST as $key => $value) {
                $array[$key] = Common::VarSecure($value, null);
            }
            $return = $this->models->updateSocial ($array);
            $this->message('success', $return['msg'], constant('INFO'));
            $this->redirect('/user/Social', 2);
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user/login&echo', 0);
        }
    }
	#########################################
    #   Changement de mot de passe
    #########################################
    public function mdp ()
    {
        if (CoreUser::isLogged()) {
            $this->render('mdp');
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user/login&echo', 0);
        }
    }
    public function submitPassword ()
    {
        if (CoreUser::isLogged()) {
            $data['password_old'] = Common::VarSecure($_POST['old_password'], 'html');
            $data['password_new'] = Common::VarSecure($_POST['password_new'], 'html');
            $return = $this->models->sendSecurity($data);
            
            if ($return['type'] == 'success') {
                $_SESSION['USER'] = CoreUser::getInfosUserAll();
            }
            
            $this->message($return['type'], $return['msg'], constant('INFO'));
            $this->redirect('/user/mdp', 2);
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user/login&echo', 0);
        }
    }
	#########################################
	# Deconnexion
	#########################################
	public function logout ()
	{
		$return = CoreUser::logout();
        $this->message($return['type'], $return['msg'], constant('INFO'));
		$this->redirect('User', 3);
	}
    #########################################
    #   Page principal profil
    #########################################
    public function profils ()
    {
        $this->render('profils');
    }
    public function deleteAvatar()
    {
        $id = Common::VarSecure(ROOT.$_POST['avatar']);
        $return = $this->models->DeleteAvatar($id);
        unlink($id);
        $this->message($return['type'], $return['msg'], constant('INFO'));
        $this->redirect('/User/profils', 2);
    }
    public function ActiveAvatar()
    {
        $id = Common::VarSecure($_POST['avatar']);
        $return = $this->models->ChangeAvatar($id);
        $_SESSION['USER'] = CoreUser::getInfosUserAll();
        $this->message($return['type'], $return['msg'], constant('INFO'));
        $this->redirect('/User/profils', 2);
    }
 
    public function sendNewAvatar ()
    {
        if ($_FILES['avatar']['error'] != 4) {
            $typeMime = getImageSize($_FILES['avatar']['tmp_name']);
            $typeMime = $typeMime['mime'];
        }
        if ($_FILES['avatar']['error'] != 4) {
            $dir = 'uploads/users/'.$_SESSION['USER']->user->hash_key.'/avatar/';
            $extensions = array('image/bmp', 'image/gif', 'image/x-icon', 'image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff', 'image/webp');
            if (!in_array($typeMime, $extensions)) {
                $return['msg']    = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, webp';
                $return['type']   = 'error';
                $return['title']  = 'Extention';
                $this->message($return['type'], $return['msg'], $return['title']);
             } else if (move_uploaded_file($_FILES['avatar']['tmp_name'], $dir.$_FILES['avatar']['name'])) {
                $return['msg']    = 'Upload effectué avec succès';
                $return['type']   = 'success';
                $return['title']  = 'Avatar';
                $this->message($return['type'], $return['msg'], $return['title']);
            } else {
                $return['msg']    = 'Echec de l\'upload !';
                $return['type']   = 'warning';
                $return['title']  = 'Erreur inconnu';
            }
        } else {
            $return['msg']    = 'Aucun upload d\'image en cours...';
            $return['type']   = 'error';
            $return['title']  = 'Aucune image';
            $this->message($return['type'], $return['msg'], $return['title']);
        }
        $this->redirect('/User/profils', 2);
    }

    public function changeGravatar ()
    {
       $num = isset($_POST['gravatar']) ? 1 : 0;
       $return = $this->models->changeGravatar ($num);
       $this->message($return['type'], $return['msg'], constant('INFO'));
       $this->redirect('/User/profils', 2);
    }
}