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
use BelCMS\Core\GetHost;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

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
            $get = $this->models->getMessages();
            if (!empty($get)) {
                foreach ($get as $key => $value) {
                    $a['msg'][$key] = $value;
                    $subject = $this->models->getSujet($value->subject);
                    if ($subject === false) {
                        $a['msg'][$key]->subject = 'Autre';
                    } else {
                        $a['msg'][$key]->subject = $subject->value;
                    }
                }
            } else {
                $a['msg'] = array();
            }
            $this->set($a);
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
            $b['object'] = $this->models->getObject();
            $this->set($b);
            $this->render('create');
        } else {
            Notification::warning('Vous devez être identifié.');
            $this->redirect('/user/login&echo', 3);
        }
    }

    public function newsend ()
    {
        if (User::isLogged() === true) {
            if (Captcha::verify() == true) {
                ########################################################################################
                $phone = preg_replace('/[^0-9+]/', '', $_POST['phone']);
                if (preg_match('/^\+?[1-9]\d{7,14}$/', $phone)) {
                    $data['phone'] = $phone;
                } else {
                    $data['phone'] = null;
                }
                ########################################################################################
                $data['user_hash_key'] = $_SESSION['USER']->user->hash_key;
                $data['title']         = Common::VarSecure($_POST['title'], null);
                $data['subject']       = Common::is_numeric($_POST['subject']);
                $data['ip_user']       = Common::GetIp();
                $data['priority']      = Common::VarSecure($_POST['priority'], null);
                $data['status']        = (int) 1;
                $data['number_id']     = Common::randomNumeric(6);
                ########################################################################################
                $msg['number_id']      = $data['number_id'];
                $msg['user_id']        = $data['user_hash_key'];
                $msg['message']        = Common::VarSecure($_POST['message'], true);
                ########################################################################################
                $return = $this->models->sendNewSupport ($data, $msg);
                if ($return === true) {
                    Notification::success(constant('MSG_BDD_OK'), 'Support');
                    $this->redirect('Support', 2);
                } else {
                    Notification::success(constant('ERROR_INSERT_BDD'), 'Support');
                    $this->redirect('support/create', 2);
                }
                ########################################################################################
            } else {
                Notification::error(constant('CODE_CAPTCHA_ERROR'), 'Captcha');
                return;
            }
        } else {
            Notification::warning('Vous devez être identifié.');
            $this->redirect('/user/login&echo', 3);
        }
    }

    public function view ()
    {
        if (User::isLogged() === true) {
            $id = $this->data[2];
            if (Common::is_numeric($id)) {
                $test_read = $this->models->testReadUser($_SESSION['USER']->user->hash_key);
                if ($test_read === true) {
                    $a['infos']    = $this->models->getMessageInfos ($id);
                    $a['infos']->subject = $this->models->getSujet($a['infos']->subject);
                    $a['messages'] = $this->models->getMessagesID ($id);
                    $this->set($a);
                }
            } else {
                Notification::warning(constant('ID_ERROR_MSG'), 'Support');
                $this->redirect('support/create', 2);
            }
            $this->render('view');
        } else {
            Notification::warning('Vous devez être identifié.');
            $this->redirect('user/login&echo', 3);
        }
    }

    public function reply ()
    {
        if (User::isLogged() === true) {
            $id = $_POST['id'];
            if (Common::is_numeric($id)) {
                $msg['number_id'] = $id;
                $msg['user_id']   = $_SESSION['USER']->user->hash_key;
                $msg['message']   = Common::VarSecure($_POST['message'], true);
                $return = $this->models->sendReply ($msg);
                if ($return === true) {
                    Notification::success(constant('MSG_BDD_OK'), 'Support');
                    $this->redirect('Support', 2);
                } else {
                    Notification::success(constant('ERROR_INSERT_BDD'), 'Support');
                    $this->redirect('support/create', 2);
                }
            } else {
                Notification::success(constant('ID_ERROR_MSG'), 'Support');
                $this->redirect('support/create', 2);
            }
        } else {
            Notification::warning('Vous devez être identifié.');
            $this->redirect('user/login&echo', 3);
        }
    }
}