<?php

/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Core\Config;
use BelCMS\Core\Interaction;
use BelCMS\Core\Notification;
use BelCMS\Requires\Common;
use BelCMS\Core\eMail;
use BelCMS\Core\User;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Support extends AdminPages
{
    var $admin  = true;
    var $active = true;
    var $bdd    = 'ModelsSupport';

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'support?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo','active' => 'active');
        $menu[] = array('title' => 'Sujets', 'href' => 'support/subject?Admin&option=pages', 'ico'  => 'fa-solid fa-signature');

        $a['messages'] = $this->models->getMessages ();
        foreach ($a['messages'] as $key => $value) {
            $a['messages'][$key]->user_hash_key = User::getNameForHash($value->user_hash_key);
        }

        $this->set($a);
        $this->render('index', $menu);
    }

    public function read ()
    {
        $id = $this->data[2];
        if (Common::is_numeric($id)) {
            $menu[] = array('title' => 'Accueil', 'href' => 'support?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
            $menu[] = array('title' => 'Lire', 'href' => 'support/read/'.$id.'?Admin&option=pages', 'ico'  => 'fa-brands fa-readme','active' => 'active');

            $a['messages'] = $this->models->getMessagesReplyID ($id);
            $this->set($a);
            $b['infos'] = $this->models->getMessagesID ($id);
            if (empty($b['infos']->subject)) {
                $b['infos']->subject = 'Non définit';
            } else {
                $b['infos']->subject = $this->models->getSujet($b['infos']->subject)->value;
            }
            $this->set($b);

        } else {
            ####################################################### 
            $msg   = $_SESSION['USER']->user->username.' '.constant('NOTIFICATION_BYPASS');
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Support');
            $interaction->author(Common::GetIp());
            $interaction->setAdmin();
            #######################################################
            $return = array('text' => constant('ADMIN_TEXT_FALSE_ID'), 'type' => 'warning');
            $this->error(get_class($this), $return['text'], $return['type']);
            $this->redirect('support?Admin&option=pages', 3);
            return;
        }

        $id = $this->data[2];
        $this->render('read', $menu);
    }

    public function reply ()
    {
        $id = $_POST['id'];
        if (Common::is_numeric($id)) {
            $msg['number_id'] = $id;
            $msg['user_id']   = $_SESSION['USER']->user->hash_key;
            $msg['message']   = Common::VarSecure($_POST['message'], true);
            $return = $this->models->sendReply ($msg);
            if ($return === true) {
                Notification::success(constant('MSG_BDD_OK'), 'Support');
                $this->redirect('support?Admin&option=pages', 2);
            } else {
                Notification::warning(constant('ERROR_INSERT_BDD'), 'Support');
                $this->redirect('support?Admin&option=pages', 3);
            }
        } else {
            ####################################################### 
            $msg   = $_SESSION['USER']->user->username.' '.constant('NOTIFICATION_BYPASS');
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Support');
            $interaction->author(Common::GetIp());
            $interaction->setAdmin();
            #######################################################
            $return = array('text' => constant('ADMIN_TEXT_FALSE_ID'), 'type' => 'warning');
            $this->error(get_class($this), $return['text'], $return['type']);
            $this->redirect('support?Admin&option=pages', 3);
            return;
        }
    }

    public function readmsg ()
    {
        $id = $this->data[2];
        if (Common::is_numeric($id)) {
            $read = $this->models->readmsg ($id);
            if ($read === true) {
                Notification::success(constant('PARAMETER_EDITING_SUCCESS'), 'Support');
                $this->redirect('support?Admin&option=pages', 2);
            } else {
                Notification::warning(constant('DEL_BDD_ERROR'), 'Support');
                $this->redirect('support?Admin&option=pages', 3);
            }
        } else {
            ####################################################### 
            $msg   = $_SESSION['USER']->user->username.' '.constant('NOTIFICATION_BYPASS');
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Support');
            $interaction->author(Common::GetIp());
            $interaction->setAdmin();
            #######################################################
            $return = array('text' => constant('ADMIN_TEXT_FALSE_ID'), 'type' => 'warning');
            $this->error(get_class($this), $return['text'], $return['type']);
            $this->redirect('support?Admin&option=pages', 3);
            return;
        }
    }

    public function close ()
    {
        $id = $this->data[2];
        if (Common::is_numeric($id)) {
            $close = $this->models->close ($id);
             if ($close === true) {
                Notification::success(constant('PARAMETER_EDITING_SUCCESS'), 'Support');
                $this->redirect('support?Admin&option=pages', 2);
            } else {
                Notification::warning(constant('DEL_BDD_ERROR'), 'Support');
                $this->redirect('support?Admin&option=pages', 2);
            }
        } else {
            ####################################################### 
            $msg   = $_SESSION['USER']->user->username.' '.constant('NOTIFICATION_BYPASS');
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Support');
            $interaction->author(Common::GetIp());
            $interaction->setAdmin();
            #######################################################
            $return = array('text' => constant('ADMIN_TEXT_FALSE_ID'), 'type' => 'warning');
            $this->error(get_class($this), $return['text'], $return['type']);
            $this->redirect('support?Admin&option=pages', 2);
            return;
        }
    }

    public function subject ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'support?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Sujets', 'href' => 'support/subject?Admin&option=pages', 'ico'  => 'fa-solid fa-signature','active' => 'active');
        $a['subject'] = $this->models->getSubject ();
        $this->set($a);
        $this->render('subject', $menu);
    }

    public function sendnewsubject ()
    {
        $data['value'] = Common::VarSecure($_POST['name']);
        if ($this->models->testSubject($data['value']) === false) {
            $return = array('text' => constant('UNIQUE_NAME'), 'type' => 'warning');
            $this->error(get_class($this), $return['text'], $return['type']);
            $this->redirect('support/subject?Admin&option=pages', 3);
            return;
        }
        ####################################################### 
        $msg   = $_SESSION['USER']->user->username.' '.constant('NOTIFICATION_BYPASS');
        $interaction = new Interaction();
        $interaction->status('red');
        $interaction->message($msg);
        $interaction->title('Support');
        $interaction->author(Common::GetIp());
        $interaction->setAdmin();
        #######################################################
        $return = $this->models->sendnewsubject ($data);
        if ($return === true) {
            $this->redirect('support/subject?Admin&option=pages', 0);
        } else {
            Notification::warning(constant('DEL_BDD_ERROR'), 'Support');
            $this->redirect('support?Admin&option=pages', 3);
        }
    }

    public function editsubject ()
    {
        $id = $_POST['id'];
        if (Common::is_numeric($id)) {
            $data['value'] = Common::VarSecure($_POST['name']);
            if ($this->models->testSubject($data['value']) === false) {
                $return = array('text' => constant('UNIQUE_NAME'), 'type' => 'warning');
                $this->error(get_class($this), $return['text'], $return['type']);
                $this->redirect('support/subject?Admin&option=pages', 3);
                return;
            }
            $return = $this->models->editsubject ($id, $data);
            if ($return === true) {
                $this->redirect('support/subject?Admin&option=pages', 0);
            } else {
                Notification::warning(constant('DEL_BDD_ERROR'), 'Support');
                $this->redirect('support?Admin&option=pages', 3);
            }
        } else {
            ####################################################### 
            $msg   = $_SESSION['USER']->user->username.' '.constant('NOTIFICATION_BYPASS');
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Support');
            $interaction->author(Common::GetIp());
            $interaction->setAdmin();
            #######################################################
            $return = array('text' => constant('ADMIN_TEXT_FALSE_ID'), 'type' => 'warning');
            $this->error(get_class($this), $return['text'], $return['type']);
            $this->redirect('support?Admin&option=pages', 3);
            return;
        }
    }

    public function delsubject ()
    {
        $id = $_POST['id'];
        if (Common::is_numeric($id)) {
            $return = $this->models->delsubject ($id);
            if ($return === true) {
                $this->redirect('support/subject?Admin&option=pages', 0);
            } else {
                Notification::warning(constant('DEL_BDD_ERROR'), 'Support');
                $this->redirect('support?Admin&option=pages', 3);
            }
        } else {
            ####################################################### 
            $msg   = $_SESSION['USER']->user->username.' '.constant('NOTIFICATION_BYPASS');
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Support');
            $interaction->author(Common::GetIp());
            $interaction->setAdmin();
            #######################################################
            $return = array('text' => constant('ADMIN_TEXT_FALSE_ID'), 'type' => 'warning');
            $this->error(get_class($this), $return['text'], $return['type']);
            $this->redirect('support?Admin&option=pages', 3);
            return;
        }
    }
}