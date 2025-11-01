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

use BelCMS\Core\config;
use BelCMS\Core\Notification;
use BelCMS\Core\Secure;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset = "utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Downloads extends AdminPages
{
    var $admin  = false; // Admin suprême uniquement (Groupe 1);
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'ModelsDls'; // Nom du Models (récupération de données)

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'downloads?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter un téléchargement', 'href' => 'downloads/add?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
        $menu[] = array('title' => 'Catégorie', 'href' => 'downloads/category?Admin&option=pages', 'ico'  => 'fa-solid fa-layer-group');

        $d['downloads'] = $this->models->getAllDls();
        $this->set($d);

        $this->render('index', $menu);
    }

    public function add ()
    {
        $a['cat'] = $this->models->getCat();
        if (empty($a['cat'])) {
            Notification::warning('Une catégorie est nécessaire.', 'Téléchargements');
            $this->redirect('downloads/newcategorys?Admin&option=pages', 2);
            return;
        }
        $this->set($a);
        $this->render('add');
    }

    public function sendnew ()
    {
        $send['name']        = Common::VarSecure($_POST['name'], null);
        $send['description'] = Common::VarSecure($_POST['description'], 'html');
        $send['uploader']    = $_SESSION['USER']->user->hash_key;

        if (isset($_FILES['torrent'])) {
            if ($_FILES['torrent']['error'] != 4) {
                $torrent           = Common::Upload('torrent', 'uploads/downloads/torrent/', 'all', true);
                $send['torrent']   = 'uploads/downloads/torrent/' . $torrent;
            }
        }

        if (!empty($_POST['link'])) {
            $send['download'] = Common::VarSecure($_POST['link'], 'url');
            $send['size'] =  (int) ($_POST['size']);
        } else {
            if ($_FILES['download']['error'] == 4) {
                $array = array(
                    'type' => 'error',
                    'text' => 'Aucun fichier'
                );
                $this->error('Téléchargement', $array['text'], $array['type']);
                $this->redirect('downloads?admin&option=pages', 3);
            } else {
                if (isset($_FILES['download'])) {
                    $screen           = Common::Upload('download', 'uploads/downloads', 'all', true);
                    $send['download'] = 'uploads/downloads/' . $screen;
                    $send['size']     = $_FILES['download']['size'];
                }
            }
        }

        if (isset($_FILES['screen'])) {
            $screen         = Common::Upload('screen', 'uploads/downloads/screen','img',true);
            $send['screen'] = 'uploads/downloads/screen/' . $screen;
        }

        $send['idcat'] = $_POST['idcat'] == is_numeric(($_POST['idcat'])) ? $_POST['idcat'] : 0;

        $this->models->AddNewsUpload($send);

        $array = array(
            'type' => 'success',
            'text' => 'Fichier uploadé avec succès'
        );

        $this->error('Téléchargement', $array['text'], $array['type']);
        $this->redirect('downloads?admin&option=pages', 3);
    }

    public function editdls ()
    {
        $id = $this->data[2];
        if (ctype_digit($id)) {
            $d['data']        = $this->models->getOneDls ($id);
            $d['data']->idcat = $this->models->getCatOne ($d['data']->idcat);
            $d['cat']         = $this->models->getCat ();
            $d['groups']      = config::getGroups();
            if (empty($d['cat'])) {
                Notification::warning('Une catégorie est nécessaire.', 'Téléchargements');
                $this->redirect('downloads/newcategorys?Admin&option=pages', 2);
                return;
            }
            $this->set($d);
            $this->render('editdls');
        }
    }

    public function editnew ()
    {
        if (ctype_digit($_POST['id']) == true) {

            $id = (int) $_POST['id'];

            $insert = array();

            if (!empty($_POST['link'])) {
                $insert['download'] = Common::VarSecure($_POST['link'], 'url');
            } else {
                if (isset($_FILES['download'])) {
                    if ($_FILES['download']['error'] != 4) {
                        $dls              = Common::Upload('download', 'uploads/downloads', 'all', true);
                        $send['download'] = 'uploads/downloads/' . $dls;
                        $send['size']     = $_FILES['download']['size'];
                    }
                }
            }

            if (isset($_FILES['screen']['name'])) {
                if ($_FILES['screen']['error'] != 4) {
                    $screen           = Common::Upload('screen', 'uploads/downloads/screen','img',true);
                    $insert['screen'] = 'uploads/downloads/screen/' . $screen;
                }
            }
            $insert['access']         = implode('|', $_POST['access']);
            $insert['name']           = Common::VarSecure($_POST['name']);
            $insert['description']    = Common::VarSecure($_POST['description'], 'html');
            $insert['idcat']          = $_POST['idcat'] == is_numeric(($_POST['idcat'])) ? $_POST['idcat'] : 0;

            $array = array(
                'type' => 'error',
                'text' => constant('EDIT_PARAM_SUCCESS')
            );
            $this->models->updateUpload ($insert, $id);
            $this->error('Téléchargement', $array['text'], $array['type']);
            $this->redirect('downloads?admin&option=pages', 3);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('downloads', $array['text'], $array['type']);
            $this->redirect('downloads?admin&option=pages', 3);
        }
    }

    public function category()
    {
        $menu[] = array('title' => 'Accueil Téléchargement', 'href' => 'downloads?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Accueil Catégorie', 'href' => 'downloads/category?Admin&option=pages', 'ico'  => 'fa-solid fa-puzzle-piece');
        $menu[] = array('title' => 'Ajouter une Catégorie', 'href' => 'downloads/newcategorys?Admin&option=pages', 'ico'  => 'fa-solid fa-puzzle-piece');


        $d['data'] = $this->models->getCat ();
        $this->set($d);

        $this->render('category', $menu);
    }

    public function deletecat ()
    {
        $id = $this->data[2];
        if (ctype_digit($id)) {
            $return     = $this->models->deletecat($id);
            if ($return == true) {
                $array  = array(
                    'type' => 'success',
                    'text' => constant('DEL_SUCCESS')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('downloads?admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('downloads?admin&option=pages', 2);
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('downloads?admin&option=pages', 2);
        }  
    }

     public function newcategorys ()
    {
        $menu[] = array('title' => 'Accueil Téléchargement', 'href' => 'downloads?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Accueil Catégorie', 'href' => 'downloads/category?Admin&option=pages', 'ico'  => 'fa-solid fa-house-flag');
        $this->render('newcategorys', $menu);
    }

    public function sendnewcat ()
    {
        $insert['name'] = Common::VarSecure($_POST['name'], null);

        if (isset($_FILES['download']['name'])) {
            $screen             = Common::Upload('download', 'uploads/downloads/cat','img',true);
            $insert['banniere'] = 'uploads/downloads/cat/' . $screen;
        }

        if (!empty($_POST['ico'])) {
            $insert['ico'] = Common::VarSecure($_POST['ico'], 'html');
        }

        if (!empty($_POST['description'])) {
            $insert['description'] = Common::VarSecure($_POST['description'],'html');
        }

        $insert['id_groups'] = Common::randomString(32);
        
        $return = $this->models->insertCat($insert);

        if ($return) {
            $array = array(
                'type' => 'success',
                'text' => constant('SEND_SUCCESS')
            );
            $this->error('Catégorie', $array['text'], $array['type']);
            $this->redirect('downloads?admin&option=pages', 2);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('DEL_BDD_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('downloads?admin&option=pages', 2);
        }
    }

    public function editcat ()
    {
        $id = $this->data[2];
        if (ctype_digit($id)) {
            $cat['data'] = $this->models->getCatById($id);
            if (!empty($cat)) {
                $this->set( $cat);
                $this->render('editcat');
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('NO_CATEGORY')
                );
                $this->error('Lien', $array['text'], $array['type']); 
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('downloads?admin&option=pages', 2);
        }
    }

    public function sendeditcat ()
    {
        if (ctype_digit($_POST['id'])) {
            $insert['name']         = Common::VarSecure($_POST['name'], null);
            $insert['ico']          = Common::VarSecure($_POST['ico'], null);
            $insert['description']  = Common::VarSecure($_POST['description'], 'html');
            if (isset($_FILES['download']['name'])) {
                $screen             = Common::Upload('download', 'uploads/downloads/cat','img',true);
                $insert['banniere'] = '/uploads/downloads/cat/' . $screen;
            }
            $ok = $this->models->sendeditcat($insert, $_POST['id']);
            if ($ok == true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('SEND_SUCCESS')
                );
                $this->error('Catégorie', $array['text'], $array['type']);
                $this->redirect('downloads/category?Admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'alert',
                    'text' => constant('DEL_BDD_ERROR')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('downloads/category?Admin&option=pages', 2);
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('downloads/category?Admin&option=pages', 2);
        }
    }

    public function delete ()
    {
        $id = $this->data[2];
        if (ctype_digit($id)) {
            $return     = $this->models->senddelete($id);
            if ($return == true) {
                $array  = array(
                    'type' => 'success',
                    'text' => constant('DEL_SUCCESS')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('downloads?admin&option=pages', 2);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('downloads?admin&option=pages', 2);
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('downloads?admin&option=pages', 2);
        }
    }
}