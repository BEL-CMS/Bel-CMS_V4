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

use BelCMS\Core\Notification;
use BelCMS\Core\Pages;
use BelCMS\Core\Captcha;
use BelCMS\Core\User;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Support extends Pages
{
    var $useModels = 'modelsSupport';

    public function index ()
    {
        if (User::isLogged() === true) {
            $this->render('index');
        } else {
            Notification::warning('Vous devez être identifié.');
            $this->redirect('/user/login&echo', 3);
        }
    }

    public function create ()
    {
        if (User::isLogged() === true) {
            $captcha = new Captcha();
            $a['captcha'] = $captcha->createCaptcha();
            $this->set($a);
            $this->render('create');
        } else {
            Notification::warning('Vous devez être identifié.');
            $this->redirect('/user/login&echo', 3);
        }
    }

    public function view ()
    {
        if (User::isLogged() === true) {
            $this->render('view');
        } else {
            Notification::warning('Vous devez être identifié.');
            $this->redirect('/user/login&echo', 3);
        }
    }
}