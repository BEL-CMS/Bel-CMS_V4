<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
*/

namespace Belcms\Pages\Controller;

use BelCMS\Core\headerPages;
use BelCMS\Core\Pages;
use BelCMS\Core\Captcha;
use BelCMS\Core\Config;
use BelCMS\Core\Notification;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Forum extends Pages
{
    var $useModels = 'Forum';

    public function index ()
    {
        $data['threads']      = $this->models->getForums ();
        foreach ($data['threads'] as $key => $value) {
            $data['threads'][$key]->subCat   = $this->models->subat ($value->id);
            foreach ($value->subCat as $ksub => $valueCount) {
                $data['threads'][$key]->subCat[$ksub]->nbMsg = $this->models->getCountPostThreads ($valueCount->id_supp);
                $data['threads'][$key]->subCat[$ksub]->nbsubcat = $this->models->getCountPostThreads ($valueCount->id);
            }
        }
        $menu  = array(array('name'=> 'Accueil', 'title'=>'Forum','href'=>'forum'), array('name'=>'Règles','href'=> 'forum/charte','title'=>'Règlements'));
        new headerPages('Forum', $menu, 'Bienvenue sur le forum de '.$_SESSION['CONFIG']['CMS_NAME'], 'Discute, apprends et partage dans une communauté bienveillante.', null);
        $data['countMessage'] = $this->models->getCountMsg ();
        $data['countThreads'] = $this->models->getCountThreads ();
        $this->set($data);
        $this->render ('index');
    }

    public function subforum ()
    {
        $id = $this->data[2];
        if (ctype_digit($id)) {
        $menu  = array(array('name'=> 'Accueil', 'title'=>'Forum','href'=>'forum'), array('name'=>'Règles','href'=> 'forum/charte','title'=>'Règlements'));
        new headerPages('Forum', $menu, 'Bienvenue sur le forum de '.$_SESSION['CONFIG']['CMS_NAME'], 'Discute, apprends et partage dans une communauté bienveillante.', null);
            $data['threads'] = $this->models->nameThreads ($id);
            foreach ($data['threads'] as $key => $value) {
                $data['threads'][$key]->countMsg = $this->models->getCountMsgThreads ($value->id_message);
            }
            $this->set($data);
            $this->render('sub');
        } else {
            Notification::error('Erreur ID', 'ERREUR ID');
		    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
		    $this->redirect($referer, 3);
        }
    }

    public function forumMsg ()
    {
        $id = $this->data[2];
        if (empty($id)) {
            Notification::warning(constant('NO_ID_DEFINED'), 'No ID');
            $referer = 'forum';
            $this->redirect($referer, 3);
            return;
        }
        $config = Config::GetConfigPage('forum');
        $data['pagination'] = $this->pagination($config->config['MAX_PAGE'], 'forum/forumMsg/'.$id, constant('TABLE_FORUM_MSG'), array('name' => 'id_mdg', 'value' => $id));
        $id = $this->data[2];
        if (ctype_alnum($id)) {
            $menu  = array(array('name'=> 'Accueil', 'title'=>'Forum','href'=>'forum'), array('name'=>'Règles','href'=> 'forum/charte','title'=>'Règlements'));
            new headerPages('Forum', $menu, 'Bienvenue sur le forum de '.$_SESSION['CONFIG']['CMS_NAME'], 'Discute, apprends et partage dans une communauté bienveillante.', null);
            $data['message'] = $this->models->getMsg ($id);
            $data['id'] = $id;
            $data['title'] = $this->models->getnName ($id);
            $this->set($data);
            $this->render('message');
        } 
    }

    public function reply ()
    {
        $id = $this->data[2];
        if (User::isLogged()) {
            if (ctype_alnum($id)) {
            $d['id'] = $id;
            $captcha = new Captcha ();
            $d['captcha'] = $captcha->createCaptcha ();
            $this->set($d);
            $this->render('reply');
            } else {
                Notification::error('Erreur ID, l\'administrateur sera prévenue', 'ID');
                return;
            }
        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'login&echo';
            $this->redirect($referer, 3);
            return;
        }
    }

    public function formReply ()
    {
        $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
        $this->redirect($referer, 3);
        $id = $_POST['id'];
        if (ctype_alnum($id)) {
            $menu  = array(array('name'=> 'Accueil', 'title'=>'Forum','href'=>'forum'), array('name'=>'Règles','href'=> 'forum/charte','title'=>'Règlements'));
            new headerPages('Forum', $menu, 'Bienvenue sur le forum de '.$_SESSION['CONFIG']['CMS_NAME'], 'Discute, apprends et partage dans une communauté bienveillante.', null);
            if (User::isLogged()) {
                $data['content'] = Common::VarSecure($_POST['content'], true);
                $data['id_mdg']  = $id;
                $data['author']  = $_SESSION['USER']->user->hash_key;
                $this->models->sendReply ($data);
                Notification::success(constant('SEND_SUCCESS'), 'Insertion du post avec succès');
                $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
                $this->redirect($referer, 3);
            } else {
                Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
                $referer = 'login?echo';
		        $this->redirect($referer, 3);
                return;
            } 
        } else {
            Notification::error('Erreur ID, l\'administrateur sera prévenue', 'ID');
		    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
		    $this->redirect($referer, 3);
            return;
        }
    }

    public function sendnew ()
    {
        if (User::isLogged()) {
            $d['title']      = Common::VarSecure($_POST['title'], null);
            $d['id_message'] = Common::randomString(16);
            $d['author']     = $_SESSION['USER']->user->hash_key;
            $d['id_cat']     = Common::VarSecure($_POST['id'], null);
            $returnThreads = $this->models->sendThread($d);
            $a['id_mdg']   = $d['id_message'];
            $a['author']   = $d['author'];
            $a['content']  = Common::VarSecure($_POST['content'], 'html');	
            $returnMsg     = $this->models->sendMsg ($a);
            if ($returnThreads and $returnMsg == true) {
                Notification::success(constant('SEND_SUCCESS'), 'Insertion du post');
                $this->redirect('forum/forumMsg/'.$a['id_mdg'].'', 2);
            }
        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'login?echo';
		    $this->redirect($referer, 3);
            return;
        }
    }

    public function sendReply ()
    {
        $id = $_POST['id'];
        if (User::isLogged()) {
            $d['content']  = Common::VarSecure($_POST['content'], 'html');
            $d['author']   = $_SESSION['USER']->user->hash_key;
            $d['id_mdg']   = $id;
            $return = $this->models->sendReply ($d);
            Notification::success($return['text'], 'Message');
        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'login&echo';
            $this->redirect($referer, 3);
            return;
        }
        $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
        $this->redirect($referer, 3);
    }

    public function category ()
    {
        $id = $this->data[2];
        if (User::isLogged()) {
            $menu  = array(array('name'=> 'Accueil', 'title'=>'Forum','href'=>'forum'), array('name'=>'Règles','href'=> 'forum/charte','title'=>'Règlements'));
            new headerPages('Forum', $menu, 'Bienvenue sur le forum de '.$_SESSION['CONFIG']['CMS_NAME'], 'Discute, apprends et partage dans une communauté bienveillante.', null);
            $data['data'] = $this->models->nameThreads ($id);
            foreach ($data['data'] as $key => $value) {
                $data['data'][$key]->reply = $this->models->getnbMesg ($value->id_message);
                $data['data'][$key]->last = $this->models->getLastMsg($value->id_message);
            }
            $data['id'] = $id;
            $this->set($data);
            $this->render('cat');
        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'login&echo';
            $this->redirect($referer, 3);
            return;
        }
    }

    public function charte ()
    {
        $menu  = array(array('name'=> 'Accueil', 'title'=>'Forum','href'=>'forum'));
        new headerPages('Forum', $menu, 'Conditions d\'utilisation du Forum', '', 'fa-solid fa-comment-dots');
        $data['charte'] = $this->models->charte ();
        $data['charte'] = Common::VarSecure($data['charte'], true, ['allow_class' => true]);
        $this->set($data);
        $this->render ('charte');
    }
}