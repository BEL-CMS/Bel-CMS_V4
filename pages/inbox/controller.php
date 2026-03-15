<?php
/**
* Bel-CMS [Content management system]
* @version 4.0.0 [PHP8.4]
* @link https://bel-cms.dev
* @link https://determe.be
* @license MIT License
* @copyright 2015-2026 Bel-CMS
* @author as Stive - stive@determe.be
*/

namespace Belcms\Pages\Controller;
use BelCMS\Core\Pages;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Inbox extends Pages
{
    var $useModels = 'Inbox';

    public function index ()
    {   
        $user = $_SESSION['USER']->user->hash_key;
        $d['data'] = $this->models->getMsgForUSer($user);
        $this->set ($d);
        $this->render ('index');
    }
}