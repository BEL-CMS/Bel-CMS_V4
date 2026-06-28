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
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Inbox extends Pages
{
    var $useModels = 'Inbox';

    public function index ()
    {  
        if (User::isLogged()) { 
            $d['data'] = $this->models->getMsgForUSer();

            foreach ($d['data'] as $key => $value) {
                $user = User::getNameForHash($value->sendto);
                $d['data'][$key]->author = $user;
                $d['data'][$key]->date   = Common::TransformDate($value->date_insert, 'MEDIUM', 'SHORT');
            }
        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'user/login&echo';
            $this->redirect($referer, 3);
            return;
        }
        $this->set ($d);
        $this->render ('index');
    }

    public function new ()
    {
        $this->render('new');
    }

    public function search ()
    {
        $search = $_GET['term'];
        echo json_encode($this->models->searchUser($search));
    }

    public function newsend ()
    {
        if (User::isLogged()) {
            $author = Common::VarSecure($_POST['author'], null);
            $author = User::getHashForName($author);

            if ($author !== null && strlen($author) != 32) {
                Notification::warning('Utilisateur inconnu', 'Utilisateur');
            } else {
                $data['sendto']        = $author;
                $data['hash_key']      = $_SESSION['USER']->user->hash_key;
                $data['close']         = 0;
                $data['read_msg_send'] = 1;
                $data['archive']       = 0;
                $data['key_crypt']     = Common::randomString(32);
                $data['key_mail']      = Common::randomString(32);
                $data['object']        = Common::VarSecure($_POST['object'], null);
                $data['unique_key']    = Common::randomString(32);

                $send['content']       = Common::encryptDecrypt($_POST['author'], $data['key_crypt']);
                $send['hash_key']      = $data['hash_key'];
                $send['key_mail']      = $data['key_mail'];
                $send['unique_key']    = $data['unique_key'];

                $this->models->addMail ($data, $send);

                Notification::success('Le message privé a bien été envoyé.', 'Mail interne');
                $this->redirect('inbox', 2);
            }
        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'user/login&echo';
            $this->redirect($referer, 3);
            return;
        }
    }
}