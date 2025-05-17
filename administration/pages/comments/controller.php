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

use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Comments extends AdminPages
{
    var $admin  = false;
    var $active = true;
    var $bdd    = 'ModelsComments';

    public function index ()
    {
        $d['comments'] = $this->models->getComments();
        $this->set($d);
        $menu[] = array('title' => 'Accueil', 'href' => 'comments?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Mot interdit', 'href' => 'comments/forbidden?admin&option=pages', 'ico'  => 'fa-solid fa-layer-group');
        $this->render('index', $menu);
    }

    public function editdls ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'comments?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $id = $this->data[2];
        if (ctype_digit($id)) {
            $d['comment'] = $this->models->getComment ($id);
            $this->set($d);
            $this->render('view', $menu);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Commentaire', $array['text'], $array['type']);
            $this->redirect('comments?admin&option=pages', 2);
        }

    }

    public function sendedit ()
    {
        if (ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
            $content = Common::VarSecure($_POST['content'], 'html');
            $return = $this->models->sendEdit($content, $id);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('EDITING_SUCCESS')
                );
                $this->error('Commentaire', $array['text'], $array['type']);
                $this->redirect('comments?admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'warning',
                    'text' => constant('EDIT_ERROR')
                );
                $this->error('Commentaire', $array['text'], $array['type']);
                $this->redirect('comments?admin&option=pages', 2);
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Commentaire', $array['text'], $array['type']);
            $this->redirect('comments?admin&option=pages', 2);
        }
    }

    public function forbidden ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'comments?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter', 'href' => 'comments/forbiddenAdd?admin&option=pages', 'ico'  => 'fa-solid fa-layer-group');

        $d['forbidden'] = $this->models->forbidden();
        $this->set($d);
        $this->render('forbidden', $menu);
    }
}
