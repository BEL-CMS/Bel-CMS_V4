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

use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Tickets extends AdminPages
{
    var $admin  = false;
    var $active = true;
    var $bdd    = 'ModelsTickets';

    public function index ()
    {
        $data = $this->models->getTickets();

        foreach ($data as $key => $value) {
            $subject = $this->models->getSubjectOne($value->subject);
            $author = User::getNameForHash($value->author);
            $data[$key]->subject = $subject;
            $author = User::getNameForHash($value->author);
            $data[$key]->author = $author;
        }
        $d['data'] = $data;
        $this->set($d);
        $this->render('index');
    }

    public function read ()
    {
        $hash = $this->data[2];
        if (strlen($hash) == 16 and is_string($hash)) {
            $get['origin'] = $this->models->getTicket($hash);
            $msg = $this->models->msg($hash);
            $this->models->read($hash);
            foreach ($msg as $key => $value) {
                $id_cat = Common::randomString(6);
                $msg[$key]->hashid = $id_cat;
            }
            $get['msg'] = $msg;
            $this->set($get);
            $this->render('read');
        }
    }

    public function reply ()
    {
        $set['id_tickets'] = $_POST['id'];
        if (strlen($set['id_tickets']) == 16 and is_string($set['id_tickets'])) {
            $set['id_tickets'] = $_POST['id'];
            $set['author'] = $_SESSION['USER']->user->hash_key;
            $set['content'] = Common::VarSecure($_POST['content'], 'html');
            if (empty($set['content'])) {
                $array = array(
                    'type' => 'warning',
                    'text' => constant('ERROR_NO_DATA')
                );
                $this->error('Tickets', $array['text'], $array['type']);
                $this->redirect('tickets?admin&option=pages', 2);
            }
            $return = $this->models->reply ($set);
            if ($return === true) {

            } else {
                
            }
        }
    }
}