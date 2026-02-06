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
use BelCMS\Core\Notification;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Guestbook extends AdminPages
{
    var $admin  = false;
    var $active = true;
    var $bdd    = 'ModelsGuestbook';

    public function index ()
    {
        $a['data'] = $this->models->getList ();
        $this->set($a);
        $this->render ('index');
    }

    public function edit ()
    {
        $id = (int) $this->id;
        $a['data'] = $this->models->getEdit($id);
        $this->set($a);
        $this->render('edit');
    }

    public function sendedit ()
    {
        $id = (int) $_POST['id'];
        $a['message'] = Common::VarSecure($_POST['message'], 'html');
        $return = $this->models->sendEdit($a, $id);
        if ($return === true) {
            #######################################################
            $msg   = $_SESSION['USER']->user->username . ' à modifier le message d\'ID: ' . $id;
            $interaction = new Interaction();
            $interaction->status('green');
            $interaction->message($msg);
            $interaction->title('Modification du message');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::success(constant('NEW_PARAMETER_SUCCESS'), constant('GUESTBOOK'));
            $this->redirect('guestbook?admin&option=pages', 2);
            return;
        } else {
            #######################################################
            $msg   = $_SESSION['USER']->user->username . ' à tenter de modifier le de l\'id : ' . $id;
            $interaction = new Interaction();
            $interaction->status('grey');
            $interaction->message($msg);
            $interaction->title('Modification du message');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::warning(constant('NEW_PARAMETER_ERROR'), constant('GUESTBOOK'));
            $this->redirect('guestbook?admin&option=pages', 2);
        }
    }

    public function delete ()
    {
        $id = (int) $this->id;
        $return = $this->models->delete($id);
        if ($return === true) {
            #######################################################
            $msg = $_SESSION['USER']->user->username . ' à effacé le message d\'ID: ' . $id;
            $interaction = new Interaction();
            $interaction->status('green');
            $interaction->message($msg);
            $interaction->title('Modification du message');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::success(constant('DELETE_MSG_ADMIN'), constant('GUESTBOOK'));
            $this->redirect('guestbook?admin&option=pages', 2);
            return;
        } else {
            #######################################################
            $msg = $_SESSION['USER']->user->username . ' a tenter de modifier l\'ID : ' . $id;
            $interaction = new Interaction();
            $interaction->status('grey');
            $interaction->message($msg);
            $interaction->title('Modification du message');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::warning(constant('DELETE_MSG_ADMIN_FAIL'), constant('GUESTBOOK'));
            $this->redirect('guestbook?admin&option=pages', 2);
        }
    }
}