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

namespace Belcms\Pages\Controller;

use BelCMS\Core\Pages;
use BelCMS\Core\User;
use BelCMS\Core\Captcha;
use BelCMS\Core\Notification;
use BelCMS\Core\Secure as CoreSecure;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Contact extends Pages
{
    var $useModels = 'contact';

    public function index()
    {
        if (User::isLogged()) {
            $data['username'] = $_SESSION['USER']->user->username;
            $data['mail']     = $_SESSION['USER']->user->mail;
        } else {
            $data['username'] = '';
            $data['mail']     = '';
        }
        $captcha = new Captcha ();
        $data['captcha'] = $captcha->createCaptcha ();
        $data['cat'] = $this->models->getCat();
        $this->set($data);
        $this->render('index');
    }

    public function send ()
    {
        $data['user']      = Common::VarSecure($_POST['user'], null);
        $data['mail_user'] = CoreSecure::isMail($_POST['mail_user']);
        $data['category']  = CoreSecure::isBool($_POST['category']);
        $data['object']    = Common::VarSecure($_POST['object'], null);
        $data['ip_user']   = Common::GetIp();
        $data['message']   = Common::VarSecure($_POST['message'], 'html');

        if (empty($data['mail_user'])) {
            Notification::error(text: constant('ERROR_EMAIL_CONTACT'), title: constant('CONTACT'));
        } else if (empty($data['message'])) {
            Notification::error(text: constant('ERROR_TEXT_CONTACT'), title: constant('CONTACT'));
        } else {
            $return = $this->models->send($data);

            if ($return === true) {
                Notification::success(text: constant('SUCCESS_SEND_CONTACT'), title: constant('CONTACT'));
            } else {
                Notification::warning(text: constant('ERROR_INSERT_BDD'), title: constant('CONTACT'));
            }
        }

        $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'contact';
        $this->redirect($referer, 3);
    }
}