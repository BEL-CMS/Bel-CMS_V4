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

use BelCMS\Core\Notification;
use BelCMS\Core\Secure;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Articles extends AdminPages
{
    var $admin  = false; // Admin suprême uniquement (Groupe 1);
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'ModelsAtl'; // Nom du Models (récupération de données)

    public function index()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'articles?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Créer une catégorie additionnelle', 'href' => 'articles/addcat/?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');

        $a = $this->models->getCatArticles ();
        foreach ($a as $key => $value) {
            $a[$key]->countpage   = $this->models->countArticleForID($value->id_articles);
            $a[$key]->description = Common::truncate_3(Common::VarSecure($value->description,null), 95);
        }
        $d['cat'] = $a;
        if (count($a) == 0) {
            $msg = 'Il n\'y a pas d\'article disponible dans la base de données.';
            Notification::infos($msg, 'Articles');
        }
        $this->set($d);
        $this->render ('index', $menu);
    }

    public function view ()
    {
        $id = Secure::isString($this->data[2]);
        $a['view'] = $this->models->view ($id);
        $menu[] = array('title' => 'Accueil', 'href' => 'articles?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter une page', 'href' => 'articles/add/'.$id.'?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
        $a['id'] = $id;
        $this->set($a);
        $this->render ('view', $menu);
    }

    public function add ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'articles?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $a['id'] = Secure::isString($this->data[2]);
        $this->set($a);
        $this->render('add', $menu);
    }

    public function sendnew ()
    {
        $a['name']        = Common::VarSecure($_POST['name'], null);
        $a['content']     = Common::VarSecure($_POST['content'], 'html');
        $a['id_articles'] = Secure::isString($_POST['id']);
        $a['author']      = $_SESSION['USER']->user->hash_key;
        $return           = $this->models->addNewPage ($a);
        if ($return === true) {
            $array = array(
                'type' => 'success',
                'text' => constant('SAVE_BDD_SUCCESS')
            );
            $this->error('Article', $array['text'], $array['type']);
            $this->redirect('articles?admin&option=pages', 2);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('SAVE_BDD_ERROR')
            );
            $this->error('Article', $array['text'], $array['type']);
            $this->redirect('articles?admin&option=pages', 2);
        }
    }

    public function addArticles ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'articles?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
    }

    public function addcat ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'articles?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $a['ID'] = strtoupper(Common::randomString(16));
        $this->set($a);
        $this->render('addcat', $menu);
    }

    public function sendnewcat()
    {
        $a['id_articles'] = strlen($_POST['id_articles'] == 16) and is_string($_POST['id_articles']) ? $_POST['id_articles'] : false;
        if ($a['id_articles'] === false) {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Article', $array['text'], $array['type']);
            $this->redirect('articles?admin&option=pages', 2);
        } else {
            $a['name']        = Common::VarSecure($_POST['name'], null);
            if (empty($a['name'])) {
                $array = array(
                    'type' => 'error',
                    'text' => constant('EMPTY_NAME')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('articles?admin&option=pages', 2);
                return;
            }
            $a['description'] = Common::VarSecure($_POST['description'], 'html');
            $a['author']      = $_SESSION['USER']->user->hash_key;
            $a['id_articles'] = strtoupper(Common::randomString(16));
            $return           = $this->models->addNewCat($a);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('SAVE_BDD_SUCCESS')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('articles?admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('SAVE_BDD_ERROR')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('articles?admin&option=pages', 2);
            }
        }
    }

    public function del ()
    {
        $id_articles = strlen($this->data[2]) == 16 and is_string($this->data[2]) === true ? $this->data[2] : false;

        if ($id_articles == false or $id_articles == 0) {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Article', $array['text'], $array['type']);
            $this->redirect('articles?admin&option=pages', 2);
            return;
        } else {
            $return = $this->models->deleteAll ($this->data[2]);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('DEL_SUCCESS')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('articles?admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('articles?admin&option=pages', 2);
            }
        }
    }

    public function deletePage ()
    {
        if (!is_numeric($this->data[2])) {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Article', $array['text'], $array['type']);
            $this->redirect('articles?admin&option=pages', 2);
            return;
        } else {
            $return = $this->models->deletePage($this->data[2]);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('DEL_SUCCESS')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('articles?admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('articles?admin&option=pages', 2);
            }
        }
    }
}