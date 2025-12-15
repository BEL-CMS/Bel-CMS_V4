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

use BelCMS\Core\Config;
use BelCMS\Core\Interaction;
use BelCMS\Core\Notification;
use BelCMS\Requires\Common;
use BelCMS\Core\eMail;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Newsletter extends AdminPages
{
    var $admin  = false;
    var $active = true;
    var $bdd    = 'ModelsNewsletter';

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'newsletter?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Template', 'href' => 'newsletter/tpl?Admin&option=pages', 'ico'  => 'fa-solid fa-sitemap');
        $menu[] = array('title' => 'Envoyer', 'href' => 'newsletter/send?admin&option=pages', 'ico'  => 'fa-solid fa-paper-plane');

        $a['data'] = $this->models->getList ();
        $this->set($a);
        $this->render ('index', $menu);
    }

    public function tpl ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'newsletter?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter', 'href' => 'newsletter/tpladd?Admin&option=pages', 'ico'  => 'fa-solid fa-clone');

        $a['data'] = $this->models->getListTpl();
        $this->set($a);
        $this->render('tpl', $menu);
    }

    public function tpladd ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'newsletter/tpl?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $this->render('tpladd', $menu);
    }

    public function sendnewtpl ()
    {
        $data['content'] = Common::VarSecure($_POST['content'], 'html');
        $data['author']  = $_SESSION['USER']->user->hash_key;
        $data['name']    = Common::VarSecure($_POST['name'], null);

        $return = $this->models->sendNewTpl ($data);

        if ($return === true) {
            $array = array(
                'type' => 'success',
                'text' => constant('SEND_SUCCESS')
            );
            $this->error('Newsletter', $array['text'], $array['type']);
            $this->redirect('newsletter/tpl?Admin&option=pages', 3);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('SAVE_BDD_ERROR')
            );
            $this->error('Newsletter', $array['text'], $array['type']);
            $this->redirect('newsletter/tpl?Admin&option=pages', 3);
        }
    }

    public function send ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'newsletter?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $d['template'] = $this->models->getListTpl ();
        $d['groups']   = Config::getGroups();

        $this->set($d);
        $this->render('send', $menu);
    }

    public function sendmail()
    {
        #########################################
        $tpl = is_numeric($_POST['tpl']);
        #########################################
        if ($tpl === false) {
            $array = array(
                'type' => 'error',
                'text' => 'Erreur ID du template'
            );
            $this->error('Newsletter', $array['text'], $array['type']);
            $this->redirect('newsletter/send?admin&option=pages', 3);
        }
        #########################################
        foreach ($_POST['groups'] as $value) {
            $user = $this->models->getUsers ($value);
            if (!empty($user)) {
                foreach ($user as $key => $value) {
                    $userMail = $key;
                    $userName = $value;
                    self::getTplSend($tpl, $userMail, $userName);
                }
            }
        }
        #########################################
        $array = array(
            'type' => 'success',
            'text' => 'Les messages électroniques ont été envoyés avec succès.'
        );
        $this->error('Newsletter', $array['text'], $array['type']);
        $this->redirect('newsletter/send?admin&option=pages', 3);
    }

    private function getTplSend ($id, $userMail, $userName)
    {
        #########################################
        $getInfosMail = $this->models->getInfosMail();
        foreach ($getInfosMail as $value) {
            $dataMail[$value->name] = $value->config;
        }
        $dataMail = (object) $dataMail;
        #########################################
        require_once ROOT . DS . 'core' . DS . 'class.mail.php';
        #########################################
        $id = is_numeric($id) ? $id : false;
        #########################################
        if ($id !== false) {
            $data = $this->models->getTpl ($id);
            $tpl = str_replace("{user}", $userName, $data->content);
            $tpl = str_replace("{mail}", $userMail, $data->content);
            #########################################
            $email = new eMail;
            $email->setFrom($dataMail->setFrom);
            $email->addAdress($userMail, $userMail);
            $email->subject($data->name);
            $email->body($tpl);
            $email->submit();
            #########################################
        }
    }
}