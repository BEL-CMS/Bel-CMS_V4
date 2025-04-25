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

use BelCMS\Core\Captcha;
use BelCMS\Core\Notification;
use BelCMS\Core\Pages;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Guestbook extends Pages
{
    var $useModels = 'Guestbook';

    public function index ()
    {
        $a['guest'] = $this->models->getGuest ();
        $this->set($a);
        $captcha = new Captcha ();
        $d['captcha'] = $captcha->createCaptcha ();
        $this->render ('index');
    }

    public function new ()
    {
        if (Captcha::verifCaptcha($_POST['captcha']) == true and empty($_POST['captcha_value'])) {
            $data['author']  = $_POST['user'];
            $data['message'] = $_POST['msg'];
            $return = $this->models->addnew ($data);
            if ($return === false) {
                Notification::error('Une erreur s\'est produite lors du transfert vers la base de données.', 'Captcha');
            } else {
                $type = $return['type'];
                Notification::$type($return['msg'], 'Guestbook');
            }
        } else {
            Notification::error('Le captcha intégral ne s\'aligne pas avec nos attentes.', 'Captcha');
            return;
        }
        $this->redirect('Guestbook', 2);
    }

}