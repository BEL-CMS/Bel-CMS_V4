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
use BelCMS\Core\Captcha;
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

    function index ()
    {
        $forum = $this->models->getNameForum ();
        foreach ($forum as $key => $value) {
            $forum[$key]->category = $this->models->getForumForID($value->id);
            foreach ($forum[$key]->category as $catKey => $catValue) {
                $forum[$key]->category[$catKey]->threads = $this->models->getIdMsg($catValue->id);
            }
        }
        foreach ($forum as $key => $value) {
            foreach ($value->category as $a => $b) {
                if (!empty($b->threads->id_message)) {
                    $msgId = $b->threads->id_message;
                    $countMessage = $this->models->getCountMsg($msgId);
                    $value->category[$a]->countMessage = $countMessage;
                    $value->category[$a]->countSubject = $this->models->getNbsubject($b->threads->id_cat);
                }
            }
        }
        $d['forum'] = $forum;
        $this->set($d);
        $this->render ('index');
    }

    public function subforum ()
    {
        $id = $this->data['2'];
        if (ctype_digit($id)) {
            $d['data'] = $this->models->getThreads ($id);
            $d['id']   = $id;
            $this->set($d);
            $this->render('subforum');
        } else {
            // error ID
            return;
        }
    }

    public function readpost ()
    {
        $id = $this->data[2];
        if (ctype_alnum($id)) {
            $d['readtitle'] = $this->models->getTitleMsg ($id);
            $d['data']      = $this->models->getReadMsg ($id);
            $this->set($d);
            $this->render ('readpost');
        } else {
            // Error ID
            return;
        }
    }

    public function reply ()
    {
        $id = $this->data[2];
        if (ctype_alnum($id)) {
            $captcha = new Captcha ();
            $d['captcha'] = $captcha->createCaptcha ();
            $d['id'] = $id;
            $this->set($d);
            $this->render('reply');
        } else {
            // Error ID
            return;
        }
    }

    public function sendReply ()
    {
        $id = $_POST['id'];
        if (User::isLogged()) {
            if (ctype_alnum($id)) {
                if (Captcha::verifCaptcha($_POST['captcha']) == true and empty($_POST['captcha_value'])) {
                    $d['content']  = Common::VarSecure($_POST['content'], 'html');
                    $d['author']   = $_SESSION['USER']->user->hash_key;
                    $d['id_mdg']   = $id;
                    $return = $this->models->sendReply ($d);
                    Notification::success($return['text'], 'Message');
                    $this->redirect('forum/readpost/'.$d['id_mdg'].'', 2);
                } else {
                    Notification::error('Le captcha intégral ne s\'aligne pas avec nos attentes.', 'Captcha');
                    return;
                }
            } else {
                // Error ID
                return;
            }
        } else {
            Notification::error('Il est nécessaire d\'être connecté.', 'Login requis');
            return;
        }
    }

    public function newpost ()
    {
        if (User::isLogged()) {
            $id = $this->data['2'];
            if (ctype_alnum($id)) {
                $captcha = new Captcha ();
                $d['captcha'] = $captcha->createCaptcha ();
                $d['id']      = $id;
                $this->set($d);
                $this->render('newpost');
            } else {
                // Error ID
                return;
            }
        } else {
            Notification::error('Il est nécessaire d\'être connecté.', 'Login requis');
            return;
        }
    }

    public function sendnew ()
    {
        if (User::isLogged()) {
            if (Captcha::verifCaptcha($_POST['captcha']) == true and empty($_POST['captcha_value'])) {
                $d['title']      = Common::VarSecure($_POST['title'], null);
                $d['id_message'] = Common::randomString(16);
                $d['author']     = $_SESSION['USER']->user->hash_key;
                $d['id_cat']     = Common::VarSecure($_POST['id'], null);
                $returnThreads = $this->models->sendThread($d);
                $a['id_mdg']   = $d['id_message'];
                $a['author']   = $d['author'];
                $a['content']  =  Common::VarSecure($_POST['content'], 'html');	
                $returnMsg     = $this->models->sendMsg ($a);
                if ($returnThreads and $returnMsg == true) {
                    Notification::success(constant('SEND_SUCCESS'), 'Insertion du post');
                    $this->redirect('forum/readpost/'.$a['id_mdg'].'', 2);
                }
            } else {
                Notification::error('Le captcha intégral ne s\'aligne pas avec nos attentes.', 'Captcha');
                return;
            }
        } else {
            Notification::error('Il est nécessaire d\'être connecté.', 'Login requis');
            return;
        }
    }
}