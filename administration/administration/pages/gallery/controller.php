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
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Gallery extends AdminPages
{
    var $admin  = false;
    var $active = true;
    var $bdd    = 'ModelsGallery';

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'gallery?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouté une image', 'href' => 'gallery/addImg/?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
        $menu[] = array('title' => 'Validation', 'href' => 'gallery/valid/?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
        $menu[] = array('title' => 'Liste de(s) catégorie(s)', 'href' => 'gallery/categories/?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
        $a['gallery'] = $this->models->getGalleryValid();
        foreach ($a['gallery'] as $key => $v) {
            $a['gallery'][$key]->id_cat = $this->models->getcat($v->id_cat);
        }
        $this->set($a);
        $this->render ('index', $menu);
    }

    public function valid ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'gallery?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouté une image', 'href' => 'gallery/addImg/?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
        $menu[] = array('title' => 'Liste de(s) catégorie(s)', 'href' => 'gallery/categories/?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
        $a['gallery'] = $this->models->getGalleryValid();
        foreach ($a['gallery'] as $key => $v) {
            $a['gallery'][$key]->id_cat = $this->models->getcat($v->id_cat);
        }
        $this->set($a);
        $this->render ('valid', $menu);
    }

    public function addImg ()
    {
        $cat['cat'] = $this->models->cat();
        if (count($cat['cat']) == 0) {
            $msg = 'La sélection d\'une catégorie est nécessaire.';
            Notification::infos($msg, 'Galeries');
            $this->redirect('gallery/addcat?admin&option=pages', 2);
            return;
        } else {
            $this->set($cat);
            $this->render ('add');
        }
    }

    public function deleteimg ()
    {
        $id = is_numeric($this->data[2]) === true ? true : false;

        if ($id == false or $id == 0) {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Galerie', $array['text'], $array['type']);
            $this->redirect('gallery?admin&option=pages', 2);
            return;
        } else {
            $return = $this->models->delimg($this->data[2]);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('DEL_SUCCESS')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('gallery?admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('gallery?admin&option=pages', 2);
            }
        }
    }

    public function deletecat ()
    {
        $id = is_numeric($this->data[2]) === true ? true : false;

        if ($id == false or $id == 0) {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Galerie', $array['text'], $array['type']);
            $this->redirect('gallery/categories?admin&option=pages', 2);
            return;
        } else {
            $return = $this->models->deletecat($this->data[2]);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('DEL_SUCCESS')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('gallery/categories?admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('gallery/categories?admin&option=pages', 2);
            }
        }
    }

    public function editimg ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'gallery?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        if (is_numeric($this->data[2]) === true) {
            $a['cat'] = $this->models->cat();
            $id = (int) $this->data[2];
            $a['img'] = $this->models->getimg($id);
            $this->set($a);
            $this->render ('editimg');
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery/categories/?Admin&option=pages', 3);
            return;
        }
    }

    public function sendnew ()
    {
        $a['name']        = Common::VarSecure($_POST['name'], null);
        $a['description'] = Common::VarSecure($_POST['description'], 'html');
        $dir = ROOT . DS . 'uploads' . DS . 'gallery' . DS;
        $dirWeb = 'uploads/gallery';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
            $fopen  = fopen($dir . 'index.html', 'a+');
            fclose($fopen);
        }

        $extensions = array('.png', '.gif', '.jpg', '.ico', '.jpeg', '.svg', '.webp');
        if (isset($_FILES['url']['name']) and !empty($_FILES['url']['name'])) {
            $a['url'] = Common::Upload('url', $dir, $extensions, true);
            $a['url'] = $dirWeb . $a['url'];
        }

        $a['author'] = $_SESSION['USER']->user->hash_key;
        $a['id_cat'] = (int) $_POST['id_cat'];

        $return = $this->models->addNew($a);

        if ($return === true) {
            $array = array(
                'type' => 'success',
                'text' => constant('SAVE_BDD_SUCCESS')
            );
            $this->error('Galerie', $array['text'], $array['type']);
            $this->redirect('gallery?Admin&option=pages', 2);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('SAVE_BDD_ERROR')
            );
            $this->error('Galerie', $array['text'], $array['type']);
            $this->redirect('gallery?Admin&option=pages', 3);
        }
    }

    public function categories ()
    {
        $menu[]   = array('title' => 'Accueil', 'href' => 'gallery?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[]   = array('title' => 'Ajouter une categorie', 'href' => 'gallery/addcat/?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
        $a['cat'] = $this->models->cat ();
        $this->set($a);
        $this->render('categories', $menu);
    }

    public function addcat ()
    {
        $a['groups'] = $this->models->groups();
        $this->set($a);
        $menu[] = array('title' => 'Accueil de la rubrique', 'href' => 'gallery/categories?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $this->render('addcat', $menu);
    }

    public function sendnewcat ()
    {
        $a['name']        = Common::VarSecure($_POST['name'],null);

        if (!isset($_POST['access'])) {
            $a['access'] = 1;
        } else if (is_array($_POST['access'])) {
            $a['access'] = implode('|', $_POST['access']);
        } else {
            $a['access'] = 1;
        }

        $a['color']       = Common::VarSecure($_POST['color'], null);
        $a['description'] = Common::VarSecure($_POST['description'], 'html');

        $dir = ROOT . DS . 'uploads' . DS . 'gallery' . DS . 'cat' .DS;
        $dirWeb = 'uploads/gallery/cat/';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
            $fopen  = fopen($dir . 'index.html', 'a+');
            fclose($fopen);
        }

        $extensions = array('.png', '.gif', '.jpg', '.ico', '.jpeg', '.svg', '.webp');
        if (isset($_FILES['background']['name']) and !empty($_FILES['background']['name'])) {
            $a['background'] = Common::Upload('background', $dir, $extensions, true);
            $a['background'] = $dirWeb.$a['background'];
        }
        $return = $this->models->addCat ($a);

        if ($return === true) {
            $array = array(
                'type' => 'success',
                'text' => constant('SAVE_BDD_SUCCESS')
            );
            $this->error('Article', $array['text'], $array['type']);
            $this->redirect('gallery/categories?Admin&option=pages', 2);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('SAVE_BDD_ERROR')
            );
            $this->error('Article', $array['text'], $array['type']);
            $this->redirect('gallery/categories?Admin&option=pages', 2);
        }
    }

    public function editcat ()
    {
        $menu[] = array('title' => 'Accueil de la rubrique', 'href' => 'gallery/categories?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        if (is_numeric($this->data[2]) === true) {
            $id = (int) $this->data[2];
            $a['cat']    = $this->models->getcat ($id);
            $a['groups'] = $this->models->groups ();
            $this->set($a);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery/categories/?Admin&option=pages', 3);
            return;
        }
        $this->render('editcat', $menu);
    }

    public function sendedit ()
    {
        if (is_numeric($_POST['id']) === true) {
            $dir = ROOT . DS . 'uploads' . DS . 'gallery' . DS;
            $dirWeb = 'uploads/gallery/';
            $extensions = array('.png', '.gif', '.jpg', '.ico', '.jpeg', '.svg', '.webp');
            if (isset($_FILES['url']['name']) and !empty($_FILES['url']['name'])) {
                $a['url'] = Common::Upload('url', $dir, $extensions, true);
                $a['url'] = $dirWeb . $a['url'];
            } else {
                $a['url'] = Common::VarSecure($_POST['url_2'], null);
            }
            $id = (int) $_POST['id'];

            $a['author'] = $_SESSION['USER']->user->hash_key;
            $a['id_cat'] = (int) $_POST['id_cat'];
            $a['description'] = Common::truncate_3(Common::VarSecure($_POST['description'], null), 100);

            $return = $this->models->sendedit($a, $id);

            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('SAVE_BDD_SUCCESS')
                );
                $this->error('Galerie', $array['text'], $array['type']);
                $this->redirect('gallery?Admin&option=pages', 2);

            $a['name'] = Common::VarSecure($_POST['name'], null);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('ID_ERROR')
                );
                $this->error('Galeries', $array['text'], $array['type']);
                $this->redirect('gallery/categories/?Admin&option=pages', 3);
            return;
            }
        }
    }

    public function sendeditcat ()
    {
        if (is_numeric($_POST['id']) === true) {
            $id = (int) $_POST['id'];

            $a['name'] = Common::VarSecure($_POST['name'], null);

            if (!isset($_POST['access'])) {
                $a['access'] = 1;
            } else if (is_array($_POST['access'])) {
                $a['access'] = implode('|', $_POST['access']);
            } else {
                $a['access'] = 1;
            }
            $a['color']       = Common::VarSecure($_POST['color'], null);
            $a['description'] = Common::VarSecure($_POST['description'], 'html');
            $dir = ROOT . DS . 'uploads' . DS . 'gallery' . DS . 'cat' . DS;
            $dirWeb = 'uploads/gallery/cat/';
            $extensions = array('.png', '.gif', '.jpg', '.ico', '.jpeg', '.svg', '.webp');
            if (isset($_FILES['background']['name']) and !empty($_FILES['background']['name'])) {
                $a['background'] = Common::Upload('background', $dir, $extensions, true);
                $a['background'] = $dirWeb . $a['background'];
            }
            $return = $this->models->editCat($a, $id);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('EDITING_SUCCESS')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('gallery/categories?Admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('EDIT_ERROR')
                );
                $this->error('Article', $array['text'], $array['type']);
                $this->redirect('gallery/categories?Admin&option=pages', 2);
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery/categories/?Admin&option=pages', 3);
            return;
        }
    }
}