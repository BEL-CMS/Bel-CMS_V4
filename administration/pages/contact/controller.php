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

use BelCMS\Core\eMail;
use BelCMS\Core\Interaction;
use BelCMS\Core\Notification;
use BelCMS\Core\Secure;
use BelCMS\Core\Security;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset = "utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Contact extends AdminPages
{
    var $admin  = false; // Admin suprême uniquement (Groupe 1);
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'modelsContact'; // Nom du Models (récupération de données)

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'contact?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Catégorie', 'href' => 'contact/category?Admin&option=pages', 'ico'  => 'fa-solid fa-layer-group');

        $d['mails'] = $this->models->getMails();

        foreach ($d['mails'] as $key => $value) {
            if (!empty($this->models->getCatName($value->category)->content)) {
                $d['mails'][$key]->category = $this->models->getCatName($value->category)->content;
            } else {
                $d['mails'][$key]->category = constant('CAT_DELETE');
            }
        }

        $this->set($d);

        $this->render('index', $menu);
    }

    public function category()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'contact?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter', 'href' => 'contact/addnewcat?Admin&option=pages', 'ico'  => 'fa-solid fa-layer-group');

        $d['cat'] = $this->models->getCat();
        $this->set($d);

        $this->render('category', $menu);
    }

    public function edit ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'contact?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter', 'href' => 'contact/addnewcat?Admin&option=pages', 'ico'  => 'fa-solid fa-layer-group');

        if (ctype_digit($this->data[2])) {
            $id = $this->data[2];
            $d['name'] = $this->models->getCatForID($id)->content;
            $d['id'] = $this->data[2];
            $this->set($d);
        } else {
            #######################################################
            $msg = $_SESSION['USER']->user->username . ' à tenter de changer l\'ID : ' . $this->data[2];
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Modification d\'ID');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::error(text: constant('ID_ERROR'), title: constant('CONTACT'));
            $this->redirect('contact?admin&option=pages', 3);
        }

        $this->render('edit', $menu);
    }

    public function sendeditcat()
    {
        $content = $_POST['content'];
        if (empty($content)) {
            Notification::warning(text: constant('CAT_NULL'), title: constant('CONTACT'));
            $this->redirect('contact/category?Admin&option=pages', 3);
            return;
        } else {
            if (ctype_digit($_POST['id'])) {
                $content = Common::VarSecure($_POST['content'], null);
                $id = $_POST['id'];
                $return = $this->models->sendeditcat ($id, $content);
                if ($return === true) {
                    Notification::success(text: constant('SEND_EDIT_SUCCESS'), title: constant('CONTACT'));
                    $this->redirect('contact/category?admin&option=pages', 3);
                } else {
                    Notification::warning(text: constant('EDIT_ERROR'), title: constant('CONTACT'));
                    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : constant('CONTACT');
                    $this->redirect($referer, 3);
                }
            } else {
                #######################################################
                $msg = $_SESSION['USER']->user->username . ' à tenter de changer l\'ID : ' . $this->data[2];
                $interaction = new Interaction();
                $interaction->status('red');
                $interaction->message($msg);
                $interaction->title('Modification d\'ID');
                $interaction->author($_SESSION['USER']->user->hash_key);
                $interaction->setAdmin();
                #######################################################
                Notification::error(text: constant('ID_ERROR'), title: constant('CONTACT'));
                $this->redirect('contact?admin&option=pages', 3);
            }
        }
    }

    public function addnewcat ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'contact?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Accueil Catégories', 'href' => 'contact/category?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $this->render('addnewcat', $menu);
    }

    public function sendcat ()
    {
        $content        = Common::VarSecure($_POST['content'], null);
        $sql['content'] = $content;
        if (empty($content)) {
            Notification::warning(text: constant('CAT_NULL'), title: constant('CONTACT'));
            $this->redirect('contact/category?Admin&option=pages', 3);
            return;
        }
        $return  = $this->models->sendcat($sql);
        if ($return === true) {
            Notification::success(text: constant('SAVE_BDD_SUCCESS'), title: constant('CONTACT'));
            $this->redirect('contact/category?Admin&option=pages', 3);
        } else {
            Notification::warning(text: constant('DEL_BDD_ERROR'), title: constant('CONTACT'));
            $this->redirect('contact/category?Admin&option=pages', 3); 
        }
    }

    public function delete ()
    {
        $id = $this->data[2];
        if (ctype_digit($id)) {
            $return = $this->models->deleteCat($id);
            if ($return === true) {
                Notification::success(text: constant('DEL_SUCCESS'), title: constant('CONTACT'));
                $this->redirect('contact/category?admin&option=pages', 3);
            } else {
                Notification::warning(text: constant('DEL_ERROR'), title: constant('CONTACT'));
                $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : constant('CONTACT');
                $this->redirect($referer, 3);
            }
        } else {
            #######################################################
            $msg = $_SESSION['USER']->user->username . ' à tenter de changer l\'ID : ' . $this->data[2];
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Modification d\'ID');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::error(text: constant('ID_ERROR'), title: constant('CONTACT'));
            $this->redirect('contact?admin&option=pages', 3);
        }
    }

    public function read ()
    {
        $MailConfig = array();
        $menu[] = array('title' => 'Accueil', 'href' => 'contact?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');

        $getMailConfig = $this->models->configMails();

        foreach ($getMailConfig as $key => $value) {
            $MailConfig[$value->name] = $value->config;
        }

        if ($MailConfig['setFrom'] == 'contact@ndd.com' or empty($MailConfig['setFrom'])) {
            Notification::warning(text: constant('MAIL_FAILS'), title: constant('CONTACT'));
            $this->redirect('mail?admin&option=parameter', 3);
            return;
        }

        if (ctype_digit($this->data[2])) {
            $d['mails'] = $this->models->getMailsForID($this->data[2]);
            if (!empty($this->models->getCatName($d['mails']->category)->content)) {
                $d['mails']->category = $this->models->getCatName($d['mails']->category)->content;
            } else {
                $d['mails']->category = constant('CAT_DELETE');
            }
            $this->models->readMail($this->data[2]);
            $this->set($d);
            $this->render('readmsg', $menu);
        } else {
            #######################################################
            $msg = $_SESSION['USER']->user->username . ' à tenter de changer l\'ID : ' . $this->data[2];
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Modification d\'ID');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::error(text: constant('ID_ERROR'), title: constant('CONTACT'));
            $this->redirect('contact?admin&option=pages', 3);
        }
    }

    public function sendreply ()
    {
        if (ctype_digit($_POST['id'])) {
            $infos = $this->models->getMailsForID($_POST['id']);
            $setFrom = $_SESSION['CONFIG']['CMS_MAIL'];
            $userMail = $infos->mail_user;
            $subject = $infos->object;
            $tpl = $_POST['content'];
            //Common::SendMail();
            self::templateMail($setFrom, $userMail, $subject, $tpl);
            $this->models->mailSend($_POST['id']);
        } else {
            #######################################################
            $msg = $_SESSION['USER']->user->username . ' à tenter de changer l\'ID : ' . $this->data[2];
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Modification d\'ID');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::error(text: constant('ID_ERROR'), title: constant('CONTACT'));
            $this->redirect('contact?admin&option=pages', 3);
        }
    }
    private function templateMail ($setFrom, $userMail, $subject, $tpl)
    {
        #########################################
        require_once ROOT.DS.'core'.DS.'class.mail.php';
        $mail = new eMail;
        $mail->addAdress($userMail);
        $mail->subject($subject);
        $mail->body($tpl);
        $mail->submit();
        #########################################
    }
}