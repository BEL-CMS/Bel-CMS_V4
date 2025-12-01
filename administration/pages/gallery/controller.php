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
        $menu[] = array('title' => 'Ajouter', 'href' => 'gallery/addimg?Admin&option=pages', 'ico'  => 'fa-solid fa-file-image');
        $menu[] = array('title' => 'catégories', 'href' => 'gallery/categories?Admin&option=pages', 'ico'  => 'fa-solid fa-list');
        $menu[] = array('title' => 'Sous-Catégories', 'href' => 'gallery/subcat?Admin&option=pages', 'ico'  => 'fa-solid fa-table-cells-large');
        $menu[] = array('title' => 'A validé', 'href' => 'gallery/valid?Admin&option=pages', 'ico'  => 'fa-solid fa-check-double');

        $a['screen'] = $this->models->getGallery ();

        foreach ($a['screen'] as $key => $value) {
            $a['screen'][$key]->name_cat = $this->models->getcat($value->cat_id);
            if ($a['screen'][$key]->name_cat === false) {
                $a['screen'][$key]->name_cat = (object) array('name' => 'Aucune');
            }
            $a['screen'][$key]->subcat   = $this->models->getNameCat($value->cat_id);
            if (empty($a['screen'][$key]->subcat)) {
                $a['screen'][$key]->subcat = (object) array('name' => 'Aucune');
            }
        }

        $this->set($a);
        $this->render ('index', $menu);
    }

    public function valid ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'gallery?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouté une image', 'href' => 'gallery/addImg/?Admin&option=pages', 'ico'  => 'fa-solid fa-image');
        $menu[] = array('title' => 'Liste de(s) catégorie(s)', 'href' => 'gallery/categories/?Admin&option=pages', 'ico'  => 'fa-solid fa-layer-group');
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
            $menu[] = array('title' => 'Accueil', 'href' => 'gallery?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
            $a['subcat'] = $this->models->subcat ();
            $this->set($a);
            $this->render ('add', $menu);
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
            $a['cat'] = $this->models->subcat();
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
        if (isset($_FILES['url']['error']) and $_FILES['url']['error'] != 0) {
            $array = array(
                'type' => 'error',
                'text' => 'Aucune image transférée'
            );
            $this->error('Galerie', $array['text'], $array['type']);
            $this->redirect('gallery?Admin&option=pages', 3);
            return false; 
        }

        $idcat = $_POST['id_cat'];
        $cat = $this->models->getIdcatToken ($idcat);
        $nameCat = str_replace(' ','_',$cat->name);

        $a['name']        = Common::VarSecure($_POST['name'], null);
        $a['description'] = Common::VarSecure($_POST['description'], 'html');
        $dir = ROOT . DS . 'uploads' . DS . 'gallery' . DS . $nameCat.DS;
        $dirWeb = 'uploads/gallery' . DS . $nameCat.DS;

        if (isset($_FILES['url']['name']) and !empty($_FILES['url']['name'])) {
            $a['url'] = Common::Upload('url', $dir, 'img', true);
            $a['url'] = $dirWeb . $a['url'];
        }

        $a['author'] = $_SESSION['USER']->user->hash_key;
        $a['cat_id'] = ctype_alnum($_POST['id_cat']) ? $_POST['id_cat'] : false;

        if ($a['cat_id'] === false) {
            $array = array(
                'type' => 'error',
                'text' => 'Catégorie ID inconnu'
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery?Admin&option=pages', 3);
            return false;
        }

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
        $menu[]   = array('title' => 'Sous-Catégories', 'href' => 'gallery/subcat?Admin&option=pages', 'ico'  => 'fa-solid fa-table-cells-large');

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
        // serial BDD unique par catégorie
        $key = strtoupper(Common::randomString(16));
        $a['name'] = Common::VarSecure($_POST['name'],null);

        if (!isset($_POST['access'])) {
            $a['access'] = 1;
        } else if (is_array($_POST['access'])) {
            $a['access'] = implode('|', $_POST['access']);
        } else {
            $a['access'] = 1;
        }

        $a['color']       = Common::VarSecure($_POST['color'], null);
        $a['description'] = Common::VarSecure($_POST['description'], 'html');

        $_POST['name']    = str_replace(' ','_',$_POST['name']);
        $_POST['name']    = str_replace('"','-',$_POST['name']);
        $_POST['name']    = urlencode($_POST['name']);
        $dir = ROOT . DS . 'uploads' . DS . 'gallery' .DS. $key;
        $dirWeb = 'uploads/gallery/'.$key.DS;


        if (!is_dir($dirWeb)) {
            mkdir($dirWeb, 0777, true);
            $fopen  = fopen($dirWeb . 'index.html', 'a+');
            fclose($fopen);
        }

        if (isset($_FILES['background']['name']) and !empty($_FILES['background']['name'])) {
            $a['background'] = Common::Upload('background', $dir, 'img', true);
            $a['background'] = $dirWeb.$a['background'];
        }

        $a['cat_id'] = strtoupper(Common::randomString(16));

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
            $this->redirect('gallery?Admin&option=pages', 3);
            return;
        }
        $this->render('editcat', $menu);
    }

    public function sendedit ()
    {
        if (is_numeric($_POST['id']) === true) {
            $dir = ROOT . DS . 'uploads' . DS . 'gallery' . DS;
            $dirWeb = 'uploads/gallery/';

            if (isset($_FILES['url']['name']) and !empty($_FILES['url']['name'])) {
                $a['url'] = Common::Upload('url', $dir, 'img', true);
                $a['url'] = $dirWeb . $a['url'];
            } else {
                $a['url'] = Common::VarSecure($_POST['url_2'], null);
            }
            $id = (int) $_POST['id'];

            $a['author'] = $_SESSION['USER']->user->hash_key;
            $cat_id = ctype_alnum($_POST['id_cat']) ? $_POST['id_cat'] : false;
            if ($cat_id !== false) {
                $a['cat_id']  = $_POST['id_cat'];
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => 'Catégorie ID inconnu'
                );
                $this->error('Galeries', $array['text'], $array['type']);
                $this->redirect('gallery?Admin&option=pages', 3);
            }
            if (!empty($_POST['description'])){
                $a['description'] = Common::truncate_3(Common::VarSecure($_POST['description'], null), 100);
            }

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
                    'type' => 'warning',
                    'text' => 'Erreur lors de la modification'
                );
                $this->error('Galeries', $array['text'], $array['type']);
                $this->redirect('gallery?Admin&option=pages', 3);
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery?Admin&option=pages', 3);
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

            $_POST['name']    = str_replace(' ','_',$_POST['name']);
            $_POST['name']    = str_replace('"','-',$_POST['name']);
            $_POST['name']    = urlencode($_POST['name']);
            $key = strtoupper(Common::randomString(16));
            $dir = ROOT . DS . 'uploads' . DS . 'gallery' .DS. $key;
            $dirWeb = 'uploads/gallery/'. $key .DS;


            if (!is_dir($dirWeb)) {
                mkdir($dirWeb, 0777, true);
                $fopen  = fopen($dirWeb . 'index.html', 'a+');
                fclose($fopen);
            }

            if (isset($_FILES['background']['name']) and !empty($_FILES['background']['name'])) {
                $a['background'] = Common::Upload('background', $dir, 'img', true);
                $a['background'] = $dirWeb.$a['background'];
                if ($_FILES['background']['error'] == 1) {
                    $array = array(
                        'type' => 'warning',
                        'text' => constant('La taille et le poids de l\'image est trop volumineuse.')
                    );
                    $this->error('Article', $array['text'], $array['type']);
                }
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
            $this->redirect('gallery?Admin&option=pages', 3);
            return;
        }
    }

    public function subcat  ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'gallery?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Liste de(s) catégorie(s)', 'href' => 'gallery/categories/?Admin&option=pages', 'ico'  => 'fa-solid fa-folder-plus');
        $menu[] = array('title' => 'Ajouter une sous-categorie', 'href' => 'gallery/addsubcategories/?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');

        $a['data'] = $this->models->subcat ();

        $this->set($a);
        $this->render('subcat', $menu);
    }

    public function addsubcategories ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'gallery?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $a['cat'] = $this->models->cat ();
        if (empty($a['cat'])) {
            $array = array(
                'type' => 'warning',
                'text' => 'Veuille créer une catégorie principale..'
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery/addcat/?Admin&option=pages', 3);
            return;
        }
        $id['id'] = ctype_alnum($this->data[2]) ? $this->data[2] : 'Error ID';
        $this->set($a);
        $this->set($id);
        $this->render('addsubmenu', $menu);
    }

    public function deletesubcat ()
    {
        if (is_numeric($this->data[2]) === true) {
            $id = $this->data[2];
            $return = $this->models->delsubcat ($id);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('DEL_SUCCESS')
                );
                $this->error('Galeries', $array['text'], $array['type']);
                $this->redirect('gallery/subcategories/?Admin&option=pages', 3);  
            } else {
                $array = array(
                    'type' => 'warning',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Galeries', $array['text'], $array['type']);
                $this->redirect('gallery/subcategories/?Admin&option=pages', 3);
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery/subcategories/?Admin&option=pages', 3);
            return;
        }
    }

    public function sendnewsubcat ()
    {
        if (!isset($_POST['access'])) {
            $_POST['access'] = array(1);
        }
        if (!in_array(1, $_POST['access'])) {
            array_push($_POST['access'], "1");
        }
        $data['name']            = Common::VarSecure($_POST['name'], null);
        $data['groups_access']   = implode('|', $_POST['access']);
        $data['color']           = strlen($_POST['color']) == 7 ? $_POST['color'] : '#333333';
        $data['bg_color']        = strlen($_POST['bg_color']) == 7 ? $_POST['bg_color'] : '#FFFFFF';
        $data['cat_id']          = ctype_alnum($_POST['id_cat']) ? $_POST['id_cat'] : false;

        if ($data['cat_id'] === false) {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery/sendnewsubcat/?Admin&option=pages', 3);  
        }

        $return = $this->models->sendnewsubcat($data);

        if ($return === true) {
            $array = array(
                'type' => 'success',
                'text' => constant('SEND_SUCCESS')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery/subcat?Admin&option=pages', 3); 
        } else {
            $array = array(
                'type' => 'warning',
                'text' => constant('SAVE_BDD_ERROR')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery/subcat?Admin&option=pages', 3);
        }
    }

    public function editsubcat () {
        if (is_numeric($this->data[2]) === true) {
            $menu[] = array('title' => 'Accueil', 'href' => 'gallery?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
            $id = (int) $this->data[2];
            $a['cat']  = $this->models->getSubCat ();
            $a['data'] = $this->models->getSubCatOne ($id);
            $a['data']->groups_access = explode('|', $a['data']->groups_access);
            $this->set($a);
            $this->render('editsubcat', $menu);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery/subcat/?Admin&option=pages', 3);
            return;
        }
    }

    public function sendeditsubcat ()
    {
        if (is_numeric($_POST['id']) === true) {
            $data['name']          = Common::VarSecure($_POST['name'], null);
            $data['color']         = strlen($_POST['color']) == 7 ? $_POST['color'] : '#000000';
            $data['bg_color']      = strlen($_POST['bg_color']) == 7 ? $_POST['bg_color'] : '#000000';
            $data['groups_access'] = implode('|', $_POST['groups_access']);
            $id = (int) $_POST['id'];
            $return = $this->models->sendeditsubcat ($data, $id);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('SEND_SUCCESS')
                );
            } else {
                $array = array(
                    'type' => 'warning',
                    'text' => constant('SAVE_BDD_ERROR')
                ); 
            }
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery/subcat?Admin&option=pages', 3); 
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('gallery/subcat/?Admin&option=pages', 3);
            return;
        }
    }
}