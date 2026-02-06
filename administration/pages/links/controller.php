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

use BelCMS\Core\Secure;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Links extends AdminPages
{
    var $admin  = false;
    var $active = true;
    var $bdd    = 'ModelsLinks';

    public function index ()
    {
        $menu[] = array('title' => 'Ajouté un lien', 'href' => 'links/add?Admin&option=pages', 'ico'  => 'fa-solid fa-plus');
        $menu[] = array('title' => 'Liste de(s) catégorie(s)', 'href' => 'links/cat?Admin&option=pages', 'ico'  => 'fa-solid fa-table');
        $menu[] = array('title' => 'Validation', 'href' => 'links/valid?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');

        $links = $this->models->getLinks ();
        $d['links'] = $links;
        $this->set($d);

        $this->render('index', $menu);
    }

    public function editdls ()
    {
        $id = $this->data[2];
        if (ctype_digit($id)) {
            $menu[] = array('title' => 'Accueil', 'href' => 'links&option=pages', 'ico'  => 'fa-solid fa-house');
            $link = $this->models->getLink ($id);
            $d['link'] = $link;
            $this->set($d);
            $this->render('edit', $menu);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('link?admin&option=pages', 2);
        }
    }

    public function sendedit ()
    {
        $id = $_POST['id'];
        if (ctype_digit($id)) {
            $d['name']        = Common::VarSecure($_POST['name'], null);
            $d['color']       = Common::VarSecure($_POST['color'], null);
            $d['description'] = Common::VarSecure($_POST['description'], 'html');
            $return = $this->models->sendeditcat ($d, $id);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('EDIT_PARAM_SUCCESS')
                );
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('EDIT_PARAM_ERROR')
                );
            }
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('links?admin&option=pages', 2);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('links?admin&option=pages', 2);
        }
    }

    public function add ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'links?admin&option=pages', 'ico'  => 'fa-solid fa-house');
        $d['cat'] = $this->models->getCat ();
        $this->set($d);
        $this->render('add', $menu);
    }

    public function send ()
    {
        $d['name']        = Common::VarSecure($_POST['name'], null);
        $d['link']        = Secure::isUrl($_POST['link']) ? $_POST['link'] : 'https://bel-cms.dev';
        $d['author']      = $_SESSION['USER']->user->hash_key;
        $d['description'] = Common::VarSecure($_POST['description'], 'html');
        $d['valid']       = 1;
        $d['cat']         = (int) $_POST['cat'];
        if (isset($_FILES['img'])) {
            $screen = Common::Upload('img', 'uploads/links', false, true);
            $d['img'] = '/uploads/links/' . $screen;
        } else {
            $d['img'] = '/assets/img/no-image-png.png';
        }
        $return = $this->models->send ($d);
        if ($return === true) {
            $array = array(
                'type' => 'success',
                'text' => constant('SEND_SUCCESS')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('links?admin&option=pages', 2);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('DEL_BDD_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('links?admin&option=pages', 2);
        }
    }

    public function delete ()
    {
        $id = $this->data[2];
        if (ctype_digit($id)) {
            $return = $this->models->senddelete($id);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('DEL_SUCCESS')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('links?admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('links?admin&option=pages', 2);
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('links?admin&option=pages', 2);
        }
    }

    public function valid()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'links?admin&option=pages', 'ico'  => 'fa-solid fa-house');
        $menu[] = array('title' => 'Ajouté un lien', 'href' => 'links/add?Admin&option=pages', 'ico'  => 'fa-solid fa-plus');
        $menu[] = array('title' => 'Liste de(s) catégorie(s)', 'href' => 'links/cat?Admin&option=pages', 'ico'  => 'fa-solid fa-table');

        $d['links'] = $this->models->getUrlValid();
        $this->set($d);

        $this->render ('valid', $menu);
    }

    public function valide ()
    {
        $id = $this->data[2];
        if (ctype_digit($id)) {
            $return = $this->models->valide($id);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('VALID_SUCCESS')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('links?admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('links?admin&option=pages', 2);
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('DEL_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('links?admin&option=pages', 2);
        }
    }

    public function cat ()
    {
        $d['cat'] = $this->models->getCat ();
        $this->set($d);
        $menu[] = array('title' => 'Accueil', 'href' => 'links/cat?Admin&option=pages', 'ico'  => 'fa-solid fa-house');
        $menu[] = array('title' => 'Ajouté une catégorie', 'href' => 'links/addcat?Admin&option=pages', 'ico'  => 'fa-solid fa-plus');
        $this->render('cat', $menu);
    }

    public function deletecat ()
    {
        $id = $this->data[2];
        if (ctype_digit($id)) {
            $return = $this->models->senddeletecat($id);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('DEL_SUCCESS')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('links/cat?admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('links/cat?admin&option=pages', 2);
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('links/cat?admin&option=pages', 2);
        }
    }

    public function editcat ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'links/cat?Admin&option=pages', 'ico'  => 'fa-solid fa-house');
        $menu[] = array('title' => 'Ajouté une catégorie', 'href' => 'links/addcat?Admin&option=pages', 'ico'  => 'fa-solid fa-plus');
        $id = $this->data[2];
        if (ctype_digit($id)) {
            $d['cat'] = $this->models->editcat ($id);
            $this->set($d);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('DEL_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('links/cat?admin&option=pages', 2);
        }

        $this->render('editcat', $menu);
    }

    public function addcat ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'links/cat?Admin&option=pages', 'ico'  => 'fa-solid fa-house');

        $this->render ('addcat', $menu);
    }

    public function sendeditcat ()
    {
        $d['name'] = Common::VarSecure($_POST['name']);
        $d['color'] = Common::VarSecure($_POST['color']);
        $d['description'] = Common::VarSecure($_POST['description']);

        $return = $this->models->addNewCat($d);

        if ($return === true) {
            $array = array(
                'type' => 'success',
                'text' => constant('VALID_SUCCESS')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('links/cat?Admin&option=pages', 2);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('DEL_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('links/cat?Admin&option=pages', 2);
        }
    }
}