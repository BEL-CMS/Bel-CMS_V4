<?php
/**
* Bel-CMS [Content management system]
* @version 4.2.1 [PHP8.5]
* @link https://bel-cms.dev
* @link https://determe.be
* @license MIT License
* @copyright 2015-2026 Bel-CMS
* @author as Stive - stive@determe.be
*/

namespace Belcms\Pages\Controller;

use BelCMS\Core\Captcha;
use BelCMS\Core\encrypt;
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
            $content = null;
            $number_id = (isset($_GET['number_id']) and strlen($_GET['number_id']) == 32) ? $_GET['number_id'] : null;

            if ($number_id != null) {
                $a['content'] = $this->models->getMsgUnique ($number_id);
                foreach ($a['content'] as $key => $value) {
                    $user = User::getInfosUserAll($value->sender_id);
					$a['content'][$key]->username   = $user->user->username;
					$a['content'][$key]->avatar     = $user->profils->avatar;
                    $encrypt = new encrypt($value->message,$value->key_secret);
                    $a['content'][$key]->message = $encrypt->decrypt();
                }
            } else {
                $a['content'] = null;
            }

			$a['data'] = $this->models->getMsgForUSer();
			foreach ($a['data'] as $key => $value) {
				$a['data'][$key]->infos = $this->models->getMsgInfos($value->message_id);
                $encrypt = new encrypt($value->message,$value->key_secret);
                $a['data'][$key]->message = $encrypt->decrypt();
				if (User::ifUserExist($value->sender_id)) {
					$user = User::getInfosUserAll($value->sender_id);
					$a['data'][$key]->sender_id  = $user->user->username;
					$a['data'][$key]->avatar     = $user->profils->avatar;
				} else {
					$a['data'][$key]->sender_id = constant('ERROR_NO_USER');
					$a['data'][$key]->avatar = constant('DEFAULT_AVATAR');
				}
				$a['data'][$key]->sender_id = $value->sender_id;
			}
			$this->set($a); 
        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'user/login&echo';
            $this->redirect($referer, 3);
            return;
        }
        $this->render ('index');
    }

    public function new ()
    {
        if (User::isLogged()) { 
            $a['captcha'] = (new Captcha())->createCaptcha();
            $this->set($a);
            $this->render('new');
        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'user/login&echo';
            $this->redirect($referer, 3);
            return;
        }
    }

    public function search ()
    {
        $search = $_GET['term'];
        echo json_encode($this->models->searchUser($search));
    }

    public function newsend ()
    {
        if (User::isLogged()) {
            if (empty($_POST['author'])) {
                Notification::warning('Utilisateur inconnu', 'Utilisateur');
				$this->redirect('inbox/new', 3);
            } else {
				$author = Common::VarSecure($_POST['author'], null);
				$author = User::getHashForName($author);
                $data['sender_id']    = $_SESSION['USER']->user->hash_key;
                $data['recipient_id'] = $author;
                $data['subject']      = Common::VarSecure($_POST['subject'], false);
                $data['message']      = Common::VarSecure($_POST['message'], true);
                $data['key_secret']   = Common::randomString(32);
                $data['message_id']   = Common::randomString(32);
                $encrypt    = new encrypt($data['message'],$data['key_secret']);
                $data['message'] = $encrypt->encrypt();

                $send['message_id'] = $data['message_id'];
                $send['user_id']    = $data['sender_id'];
                $send['is_read']    = 1;
                $send['is_deleted'] = 0;
                $send['deleted_at'] = 0;

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

    public function reply ()
    {
        if (User::isLogged()) {
            $send['sender_id'] = strlen($_SESSION['USER']->user->hash_key) == 32 ? $_SESSION['USER']->user->hash_key : false;
            if ($send['sender_id'] === false) {
                Notification::error('Votre authentification n\'est pas correcte !', 'Authentification');
                $referer = 'user';
                $this->redirect($referer, 3);
                return;
            }

            $send['recipient_id'] = strlen($_POST['recipient_id']) == 32 ? $_POST['recipient_id'] : false;
            if ($send['recipient_id'] === false) {
                Notification::error('La clé fournie pour le destinataire ne convient pas !', 'Authentification');
                $referer = 'inbox';
                $this->redirect($referer, 3);
                return;
            }

            $send['subject']     = Common::VarSecure($_POST['subject'], false);
            $message             =  Common::VarSecure($_POST['message'], true);
            $encrypt             = new encrypt($message, $_POST['key_secret']);
            $send['message']     = $encrypt->encrypt();
            $send['key_secret']  = $_POST['key_secret'];
            $send['message_id']  = Common::VarSecure($_POST['message_id'], false);

            $return = $this->models->sendReply($send);
            debug($return);

        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'user/login&echo';
            $this->redirect($referer, 3);
            return;
        }
    }
}