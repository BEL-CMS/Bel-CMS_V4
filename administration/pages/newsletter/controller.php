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

use BelCMS\Core\Interaction;
use BelCMS\Core\Notification;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Newsletter extends AdminPages
{
    var $admin  = false;
    var $active = true;
    var $bdd    = 'ModelsNewsletter';

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'newsletter?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Template', 'href' => 'newsletter/tpl?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
        $menu[] = array('title' => 'Envoyer', 'href' => 'newsletter/send?admin&option=pages', 'ico'  => 'fa-solid fa-puzzle-piece');

        $a['data'] = $this->models->getList ();
        $this->set($a);
        $this->render ('index', $menu);
    }

    public function tpl ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'newsletter?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter', 'href' => 'newsletter/tpladd?Admin&option=pages', 'ico'  => 'fa-solid fa-clone');

        $a['data'] = $this->models->getListTpl();
        $this->set($a);
        $this->render('tpl', $menu);
    }

    public function tpladd ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'newsletter/tpl?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $this->render('tpladd', $menu);
    }
}