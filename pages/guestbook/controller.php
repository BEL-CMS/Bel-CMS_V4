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

use BelCMS\Core\Captcha;
use BelCMS\Core\Notification;
use BelCMS\Core\Pages;
use BelCMS\Core\Secure;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

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
        $a['captcha'] = (new Captcha())->createCaptcha();
        $this->set($a);
        $this->render ('index');
    }

    public function new ()
    {
        if (Captcha::verify()) {
            $data['mail']     = Secure::isMail($_POST['mail']);
            $data['username'] = Common::VarSecure($_POST['username']);
            $data['message']  = Common::VarSecure($_POST['message'], null);
            $data['ip']       = Common::GetIp();
            $data['avatar']   = Common::VarSecure($_POST['avatar'], null);
            $return = $this->models->addnew ($data);
            if ($return === false) {
                Notification::error(constant('ERROR_INSERT_BDD'), 'Message');
            } else {
                $type = $return['type'];
                Notification::$type($return['msg'], 'Guestbook');
            }
        } else {
            $error = $_SESSION['CAPTCHA_ERROR'] ?? null;
            Notification::error(htmlspecialchars($error['message']), 'Captcha');
		    $this->redirect('Guestbook', 5);
            return;
        }
        $this->redirect('Guestbook', 2);
    }

    public function view ()
    {
        $d['data'] = $this->models->getGuest();
        $this->set($d);
        $this->render('view');
    }

}