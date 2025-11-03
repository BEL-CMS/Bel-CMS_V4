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

use BelCMS\Core\Pages;
use BelCMS\Core\Captcha;
use BelCMS\Core\Config;
use BelCMS\Core\Notification;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Forum extends Pages
{
    var $useModels = 'Forum';

    public function index ()
    {
        $isAccess = false;
        $isAccessSub = false;

        $data['threads'] = $this->models->getForums ();
        foreach ($data['threads'] as $key => $value) {
            $data['threads'][$key]->subCat   = $this->models->subat ($value->id);
            foreach ($value->subCat as $ksub => $valueCount) {
                $data['threads'][$key]->subCat[$ksub]->nbMsg = $this->models->getCountPostThreads ($valueCount->id_supp);
                $data['threads'][$key]->subCat[$ksub]->nbsubcat = $this->models->getCountPostThreads ($valueCount->id);
            }
            /*
            foreach ($data['threads'][$key]->subCat as $sub) {
                if (strpos($sub->access_groups, '|') === false) {
                    $access_groups_sub = array($sub->access_groups);
                } else {
                    $access_groups_sub = implode('|', $sub->access_groups);
                }

                if (strpos($sub->access_admin, '|') === false) {
                    $access_admin_sub = array($sub->access_admin);
                } else {
                    $access_admin_sub = implode('|', $sub->access_admin);
                }

                $arrayGrp = array_merge($access_groups_sub, $access_admin_sub);

                foreach ($arrayGrp as $access) {
                    if (in_array($access, $_SESSION['USER']->groups->all_groups)) {
                        $isAccessSub = true;
                        break;
                    } else {
                        unset($data['threads'][$key]);
                    }
                }
            }
            */
        }
        foreach ($data['threads'] as $key => $value) {
            if (strpos('|', $value->access_admin) === false) {
                $access_admin = array($value->access_admin);
            } else {
                $access_admin = implode('|', $value->access_admin);
            }
            foreach ($access_admin as $access) {
                if (in_array($access, $_SESSION['USER']->groups->all_groups)) {
                    $isAccess = true;
                    break;
                }
            }
            if ($isAccess === false) {
                if (strpos('|', $value->access_groups) === false) {
                    $access_groups = array($value->access_groups);
                } else {
                    $access_groups = implode('|', $value->access_groups);
                }
                foreach ($access_groups as $access) {
                    if (!in_array($access, $_SESSION['USER']->groups->all_groups)) {
                        unset($data['threads'][$key]);
                    }
                }
            }
        }

        $data['countMessage'] = $this->models->getCountMsg ();
        $data['countThreads'] = $this->models->getCountThreads ();

        $this->set($data);
        $this->render('index');
    }

    public function subforum ()
    {
        $id = $this->data[2];
        if (ctype_digit($id)) {
            $data['threads'] = $this->models->nameThreads ($id);
            foreach ($data['threads'] as $key => $value) {
                $data['threads'][$key]->countMsg = $this->models->getCountMsgThreads ($value->id_message);
            }
            $this->set($data);
            $this->render('sub');
        } else {
            Notification::error('Erreur ID', 'ERREUR ID');
		    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
		    $this->redirect($referer, 3);
        }
    }

    public function forumMsg ()
    {
        $id = $this->data[2];
        if (empty($id)) {
            Notification::warning(constant('NO_ID_DEFINED'), 'No ID');
            $referer = 'forum';
            $this->redirect($referer, 3);
            return;
        }
        $config = Config::GetConfigPage('forum');
        $data['pagination'] = $this->pagination($config->config['MAX_PAGE'], 'forum/forumMsg/'.$id, constant('TABLE_FORUM_MSG'), array('name' => 'id_mdg', 'value' => $id));
        $captcha = new Captcha ();
        $data['captcha'] = $captcha->createCaptcha ();
        $id = $this->data[2];
        if (ctype_alnum($id)) {
            $data['message'] = $this->models->getMsg ($id);
            $data['id'] = $id;
            $data['title'] = $this->models->getnName ($id);
            $this->set($data);
            $this->render('message');
        } 
    }

    public function reply ()
    {
        $id = $this->data[2];
        if (User::isLogged()) {
            if (ctype_alnum($id)) {
            $d['id'] = $id;
            $captcha = new Captcha ();
            $d['captcha'] = $captcha->createCaptcha ();
            $this->set($d);
            $this->render('reply');
            } else {
                Notification::error('Erreur ID, l\'administrateur sera prévenue', 'ID');
                return;
            }
        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'user/login&echo';
            $this->redirect($referer, 3);
            return;
        }
    }

    public function formReply ()
    {
        $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
        $this->redirect($referer, 3);
        $id = $_POST['id'];
        if (ctype_alnum($id)) {
            if (User::isLogged()) {
                if (Captcha::verifCaptcha($_POST['captcha']) == true and empty($_POST['captcha_value'])) {
                    $data['content'] = Common::VarSecure($_POST['content'], 'html');
                    $data['id_mdg']  = $id;
                    $data['author']  = $_SESSION['USER']->user->hash_key;
                    $this->models->sendReply ($data);
                    Notification::success(constant('SEND_SUCCESS'), 'Insertion du post avec succès');
		            $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
		            $this->redirect($referer, 3);
                } else {
                    Notification::error(constant('CODE_CAPTCHA_ERROR'), 'Captcha');
		            $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
		            $this->redirect($referer, 3);
                    return;
                }
            } else {
                Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
                $referer = 'user/login?echo';
		        $this->redirect($referer, 3);
                return;
            } 
        } else {
            Notification::error('Erreur ID, l\'administrateur sera prévenue', 'ID');
		    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
		    $this->redirect($referer, 3);
            return;
        }
    }

    public function sendnew ()
    {
        if (User::isLogged()) {
            if (Captcha::verifCaptcha($_POST['captcha']) == true and empty($_POST['captcha_value'])) {
                $d['title']      = Common::VarSecure($_POST['title'], null);
                $d['id_message'] = Common::randomString(16);
                $d['author']     = $_SESSION['USER']->user->hash_key;
                $d['id_cat']     = Common::VarSecure($_POST['id'], null);
                $returnThreads = $this->models->sendThread($d);
                $a['id_mdg']   = $d['id_message'];
                $a['author']   = $d['author'];
                $a['content']  = Common::VarSecure($_POST['content'], 'html');	
                $returnMsg     = $this->models->sendMsg ($a);
                if ($returnThreads and $returnMsg == true) {
                    Notification::success(constant('SEND_SUCCESS'), 'Insertion du post');
                    $this->redirect('forum/forumMsg/'.$a['id_mdg'].'', 2);
                }
            } else {
                Notification::error(constant('CODE_CAPTCHA_ERROR'), 'Captcha');
		        $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
		        $this->redirect($referer, 3);
                return;
            }
        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'user/login?echo';
		    $this->redirect($referer, 3);
            return;
        }
    }

    public function sendReply ()
    {
        $id = $_POST['id'];
        if (User::isLogged()) {
            if (ctype_alnum($id)) {
                if (Captcha::verifCaptcha($_POST['captcha']) == true and empty($_POST['captcha_value'])) {
                    $d['content']  = Common::VarSecure($_POST['content'], 'html');
                    $d['author']   = $_SESSION['USER']->user->hash_key;
                    $d['id_mdg']   = $id;
                    $return = $this->models->sendReply ($d);
                    Notification::success($return['text'], 'Message');
                } else {
                    Notification::error(constant('CODE_CAPTCHA_ERROR'), 'Captcha');
                    return;
                }
            } else {
                Notification::error('Erreur ID, l\'administrateur sera prévenue', 'ID');
                return;
            }
        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'user/login&echo';
            $this->redirect($referer, 3);
            return;
        }
        $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
        $this->redirect($referer, 3);
    }

    public function category ()
    {
        $id = $this->data[2];
        if (User::isLogged()) {
            if (ctype_alnum($id)) {
                $data['data'] = $this->models->nameThreads ($id);
                foreach ($data['data'] as $key => $value) {
                    $data['data'][$key]->reply = $this->models->getnbMesg ($value->id_message);
                    $data['data'][$key]->last = $this->models->getLastMsg($value->id_message);
                }
                $data['id'] = $id;
                $this->set($data);
                $this->render('cat');
            } else {
                Notification::error('Erreur ID, l\'administrateur sera prévenue', 'ID');
                return;
                $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'forum';
                $this->redirect($referer, 3);
            }
        } else {
            Notification::error(constant('NO_USER_CONNECT'), 'Login requis');
            $referer = 'user/login&echo';
            $this->redirect($referer, 3);
            return;
        }
    }

    public function charte ()
    {
        $data['charte'] = $this->models->charte ();
        $this->set($data);
        $this->render ('charte');
    }
}