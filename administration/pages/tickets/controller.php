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
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Tickets extends Pages
{
    var $useModels = 'Tickets';

    function index ()
    {
        if (User::isLogged()) {
            $tickets = $this->models->getAllTickets();
            foreach ($tickets as $key => $value) {
                $tickets[$key]->subject = $this->models->getSubjectOne($value->subject);
            }
            $get['tickets'] = $tickets;
            $this->set($get);
            $this->render('index');
        } else {
            $return['type'] = 'warning';
            $return['msg']  = 'Il est nécessaire d\'être identifié pour pouvoir consulter cette page.';
            $this->message($return['type'], $return['msg'], constant('INFO'));
            $this->redirect('user/login&echo', 2);
        }
    }

    public function read ()
    {
        if (User::isLogged()) { 
            $hash = $this->data[2];
            if (strlen($hash) == 16 and is_string($hash)) {
                $get['origin'] = $this->models->origin ($hash);
                $get['msg'] = $this->models->msg ($hash);
                $this->set($get);
                $this->render('read');
            }
        } else {
            $return['type'] = 'warning';
            $return['msg']  = 'Il est nécessaire d\'être identifié pour pouvoir consulter cette page.';
            $this->message($return['type'], $return['msg'], constant('INFO'));
            $this->redirect('user/login&echo', 2);
        }
    }

    public function send ()
    {
        $captcha = new Captcha();
        $d['captcha'] = $captcha->createCaptcha();
        $d['cat']     = $this->models->getSubject();
        $this->set($d);
        if (User::isLogged()) {
            $this->render('send');
        } else {
            $return['type'] = 'warning';
            $return['msg']  = 'Il est nécessaire d\'être identifié pour pouvoir consulter cette page.';
            $this->message($return['type'], $return['msg'], constant('INFO'));
            $this->redirect('user/login&echo', 2);
        }
    }

    public function submit ()
    {
        if (User::isLogged()) {
            if (Captcha::verifCaptcha($_POST['captcha']) == true and empty($_POST['captcha_value'])) {
                $submit['subject'] = is_numeric($_POST['cat']) ? $_POST['cat'] : 0;
                $submit['hash']    = strtoupper(Common::randomString(16));
                $submit['author']  = $_SESSION['USER']->user->hash_key;
                $submit['content'] = is_string($_POST['content']) ? $_POST['content'] : false;
                if ($submit['content'] === false) {
                    Notification::error('Le contenu doit obligatoirement être présent.', 'Captcha');
                    $this->redirect('Tickets', 2);
                    return;
                }
                $submit['status']  = 0;
                $dirWeb = 'uploads/tickets/';
                $dir = ROOT . DS . 'uploads' . DS . 'tickets'. DS;
                $extensions = array('.png','.gif','.jpg','.ico','.jpeg','.svg','.webp','.text','.zip','.rar','.pdf','.word');
                if (isset($_FILES['file']['name']) and !empty($_FILES['file']['name'])) {
                    $post['file']   = Common::Upload('file', $dir, $extensions, true);
                    $submit['file'] = $dirWeb . $post['file'];
                }
                $return = $this->models->send($submit);
                if ($return === true) {
                    Notification::error('L\'envoi du ticket a été effectué avec succès.', 'Ticket');
                    $this->redirect('Tickets', 2);
                } else {
                    Notification::error('Il y a eu un problème lors de la mise à jour de la base de données.', 'Ticket');
                    $this->redirect('Tickets', 2);
                }
            } else {
                Notification::error('Le captcha est erroné, merci de le refaire.', 'Captcha');
                $this->redirect('Tickets', 2);
                return;
            }
        } else {
            Notification::error('Vous devez impérativement être logué.', 'User');
            $this->redirect('user/login&echo', 2);
            return;
        }
        $this->redirect('Tickets', 2);
   }
} 