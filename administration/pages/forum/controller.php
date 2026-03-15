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
use BelCMS\Core\Interaction;
use BelCMS\Core\Notification;
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
        $menu[] = array('title' => constant('CAT_SUB'), 'href' => 'Forum/CatSecond?admin&option=pages', 'ico'  => 'fa-regular fa-square-plus');

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
        $menu[] = array('title' => constant('CAT_SUB'), 'href' => 'Forum/catsecond?admin&option=pages', 'ico'  => 'fa-regular fa-square-plus');

        $d['main'] = $this->models->getForum();
        $this->set($d);
        $this->render ('mainCat', $menu);
    }

    public function MainCatEdit ()
    {
        if (ctype_digit(text: $this->data[2])) {
            $menu[] = array('title' => constant('HOME'), 'href' => 'Forum?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
            $menu[] = array('title' => constant('MAIN_CAT'), 'href' => 'Forum/MainCat?admin&option=pages', 'ico'  => 'fa-solid fa-keyboard');
            $menu[] = array('title' => constant('ADD_MAIN_CAT'), 'href' => 'Forum/addMainCat?admin&option=pages', 'ico'  => 'fa-solid fa-circle-plus');
            $menu[] = array('title' => constant('CAT_SUB'), 'href' => 'Forum/addCatSecond?admin&option=pages', 'ico'  => 'fa-regular fa-square-plus');
            $d['forum'] = $this->models->getNameForum($this->data[2]);
            $this->set($d);
            $this->render ('maincatedit', $menu);
        } else {
            #######################################################
            $msg = $_SESSION['USER']->user->username . ' à tenter de changer l\'ID : ' . $this->data[2];
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Modification d\'ID');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::error(text: constant('ID_ERROR'), title: constant('FORUM'));
            $this->redirect('forum?admin&option=pages', 3);
        } 
    }

    public function editCatMain ()
    {
        if (ctype_digit(text: $_POST['id'])) {

            $id = $_POST['id'];
            $data['title']     = Common::VarSecure($_POST['title'], null);
            $data['subtitle'] = Common::VarSecure($_POST['subtitle'], null);
            $data['icon']     = Common::VarSecure($_POST['icon'], null);

            $return = $this->models->sendEditMain ($id, $data);

            if ($return === true) {
                #######################################################
                Notification::success(text: constant('EDITING_SUCCESS'), title: constant('FORUM'));
                $this->redirect('Forum/MainCat?admin&option=pages', 3);
            } else {
                #######################################################
                Notification::error(text: constant('EDIT_ERROR'), title: constant('FORUM'));
                $this->redirect('Forum/MainCat?admin&option=pages', 3);
            }
        } else {
            #######################################################
            $msg = $_SESSION['USER']->user->username . ' à tenter de changer l\'ID : ' . $this->data[2];
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Modification d\'ID');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::error(text: constant('ID_ERROR'), title: constant('Forum'));
            $this->redirect('forum?admin&option=pages', 3);
        }
    }

    public function MainCatDel ()
    {
        if (ctype_digit(text: $this->data[2])) {

            $return = $this->models->DeltMainCat ($this->data[2]);

            if ($return === true) {
                #######################################################
                Notification::success(text: constant('DEL_SUCCESS'), title: constant('FORUM'));
                $this->redirect('Forum/MainCat?admin&option=pages', 3);
            } else {
                #######################################################
                Notification::error(text: constant('EDIT_ERROR'), title: constant('FORUM'));
                $this->redirect('Forum/MainCat?admin&option=pages', 3);
            }
        } else {
            #######################################################
            $msg = $_SESSION['USER']->user->username . ' à tenter de changer l\'ID : ' . $this->data[2];
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Modification d\'ID');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::error(text: constant('ID_ERROR'), title: constant('FORUM'));
            $this->redirect('forum?admin&option=pages', 3);
        }
    }

    public function catSecond ()
    {
        $menu[] = array('title' => constant('HOME'), 'href' => 'Forum?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => constant('MAIN_CAT'), 'href' => 'Forum/MainCat?admin&option=pages', 'ico'  => 'fa-solid fa-keyboard');
        $menu[] = array('title' => constant('ADD_SECOND_CAT'), 'href' => 'Forum/addSecondCat?admin&option=pages', 'ico'  => 'fa-solid fa-circle-plus');

        $d['data'] = $this->models->getCat ();

        foreach ($d['data'] as $key => $value) {
            $d['data'][$key]->nameForum = $this->models->getNameForumID($value->id_forum);
        }

        $this->set($d);
        $this->render ('catsecond', $menu);
    }

    public function addSecondCat ()
    {
        $menu[] = array('title' => constant('HOME'), 'href' => 'Forum?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => constant('MAIN_CAT'), 'href' => 'Forum/MainCat?admin&option=pages', 'ico'  => 'fa-solid fa-keyboard');

        $d['cat'] = $this->models->getForum ();
        $this->set($d);
        $this->render ('addseconcat', $menu);
    }

    public function sendseconcat ()
    {
        $data['id_forum'] = (int) $_POST['id_forum'];
        $data['title']    = Common::VarSecure($_POST['title'], null);
        $data['subtitle'] = Common::VarSecure($_POST['subtitle'], null);
        $data['orderby']  = (int) $_POST['orderby'];
        $data['icon']     = Common::VarSecure($_POST['icon'], null);
        $data['id_supp']  = Common::randomString(8);

        $return = $this->models->sendSecondCat ($data);

        if ($return === true) {
            #######################################################
            Notification::success(text: constant('SAVE_BDD_SUCCESS'), title: constant('FORUM'));
            $this->redirect('Forum/catsecond?admin&option=pages', 3);
        } else {
            #######################################################
            Notification::error(text: constant('SAVE_BDD_ERROR'), title: constant('FORUM'));
            $this->redirect('Forum/sendseconcat?admin&option=pages', 3);
        }

    }

    public function seconCatEdit ()
    {
        $id = $this->data[2];
        if (ctype_digit(text: $this->data[2])) {
            $menu[] = array('title' => constant('HOME'), 'href' => 'Forum/MainCat?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
            $menu[] = array('title' => constant('MAIN_CAT'), 'href' => 'Forum/catsecond?admin&option=pages', 'ico'  => 'fa-solid fa-keyboard');

            $d['data'] = $this->models->getSecCat ($id);
            $d['cat'] = $this->models->getForum ();

            $this->set($d);
            $this->render('secondcatedit', $menu);
        } else {
            #######################################################
            $msg = $_SESSION['USER']->user->username . ' à tenter de changer l\'ID Forum: ' . $this->data[2];
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Modification d\'ID');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::error(text: constant('ID_ERROR'), title: constant('FORUM'));
            $this->redirect('forum?admin&option=pages', 3);
        }  
    }

    public function sendeditseconcat ()
    {

        $id = $_POST['id'];
        if (ctype_digit(text: $id)) {
            $data['id_forum']  = (int) $_POST['id_forum'];
            $data['title']     = Common::VarSecure($_POST['title']);
            $data['subtitle']  = Common::VarSecure($_POST['subtitle']);
            $data['orderby']   = (int) $_POST['orderby'];
            $data['icon']      = Common::VarSecure($_POST['icon']);
            #######################################################
            $return = $this->models->sendEditSecondCat ($id, $data);
            #######################################################
            if ($return === true) {
                #######################################################
                Notification::success(text: constant('SAVE_BDD_SUCCESS'), title: constant('FORUM'));
                $this->redirect('Forum/catsecond?admin&option=pages', 3);
            } else {
                #######################################################
                Notification::error(text: constant('SAVE_BDD_ERROR'), title: constant('FORUM'));
                $this->redirect('Forum/sendseconcat?admin&option=pages', 3);
            }
        } else {
            #######################################################
            $msg = $_SESSION['USER']->user->username . ' à tenter de changer l\'ID du forum: ' . $id;
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Modification d\'ID');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::error(text: constant('ID_ERROR'), title: constant('FORUM'));
            $this->redirect('forum?admin&option=pages', 3);
        }
    }

    public function seconCatDel ()
    {
        if (ctype_digit(text: $this->data[2])) {

            $return = $this->models->DeltSecondMainCat ($this->data[2]);

            if ($return === true) {
                #######################################################
                Notification::success(text: constant('DEL_SUCCESS'), title: constant('FORUM'));
                $this->redirect('Forum/MainCat?admin&option=pages', 3);
            } else {
                #######################################################
                Notification::error(text: constant('EDIT_ERROR'), title: constant('FORUM'));
                $this->redirect('Forum/MainCat?admin&option=pages', 3);
            }
        } else {
            #######################################################
            $msg = $_SESSION['USER']->user->username . ' à tenter de changer l\'ID Forum: ' . $this->data[2];
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Modification d\'ID');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::error(text: constant('ID_ERROR'), title: constant('FORUM'));
            $this->redirect('forum?admin&option=pages', 3);
        }
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