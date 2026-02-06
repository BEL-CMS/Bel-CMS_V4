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

use BelCMS\Core\config;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Forum extends AdminPages
{
    var $admin  = false;
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'ModelsForum';

    public function index ()
    {
        $menu[] = array('title' => constant('HOME'), 'href' => 'Forum?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => constant('CAT'), 'href' => 'Forum/category?admin&option=pages', 'ico'  => 'fa-solid fa-puzzle-piece');
        $menu[] = array('title' => constant('ALL_MSG_POST'), 'href' => 'Forum/Threads?admin&option=pages', 'ico'  => 'fa-solid fa-comment-dots');

        $d['message'] = $this->models->getAllMsg();
        $this->set($d);

        $this->render('index', $menu);
    }

    public function category ()
    {
        $menu[] = array('title' => constant('HOME'), 'href' => 'Forum?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => constant('MAIN_CAT'), 'href' => 'Forum/MainCat?admin&option=pages', 'ico'  => 'fa-solid fa-keyboard');
        $menu[] = array('title' => constant('CAT_SUB'), 'href' => 'Forum/addCatSecond?admin&option=pages', 'ico'  => 'fa-regular fa-square-plus');

        $d['cat'] = $this->models->getCat ();
        foreach ($d['cat'] as $key => $value) {
            $id_forum = (int) $value->id_forum;
            $d['cat'][$key]->nameForum = $this->models->getNameForum($id_forum);
        }
        $this->set($d);

        $this->render('category', $menu);
    }

    public function mainCat ()
    {
        $menu[] = array('title' => constant('HOME'), 'href' => 'Forum?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => constant('MAIN_CAT'), 'href' => 'Forum/MainCat?admin&option=pages', 'ico'  => 'fa-solid fa-keyboard');
        $menu[] = array('title' => constant('ADD_MAIN_CAT'), 'href' => 'Forum/addMainCat?admin&option=pages', 'ico'  => 'fa-solid fa-circle-plus');
        $menu[] = array('title' => constant('CAT_SUB'), 'href' => 'Forum/addCatSecond?admin&option=pages', 'ico'  => 'fa-regular fa-square-plus');

        $d['main'] = $this->models->getForum();
        $this->set($d);
        $this->render ('mainCat', $menu);
    }

    public function threads ()
    {
        $menu[] = array('title' => constant('HOME'), 'href' => 'Forum?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');

        $d['threads'] = $this->models->getThreads();

        $this->set($d);

        $this->render('threads', $menu);
    }

    public function addMainCat ()
    {
        $this->render ('addmaincat');
    }
    
    public function AddCatMain ()
    {
        $d['title']    = Common::VarSecure($_POST['title'], null);
        $d['subtitle'] = Common::VarSecure($_POST['subtitle'], null);
        $d['icon']     = Common::VarSecure($_POST['icon'], null);

        if (empty($d['title'])) {
            $return = array(
                'type' => 'error',
                'text' => 'Aucun titre transmis'
            );
        } else {
            $return = $this->models->AddCatMain ($d);
        }
        $return = $this->error('Forum', $return['text'], $return['type']);
        $this->redirect('Forum/MainCat?admin&option=pages', 3);
        return $return;
    }
}