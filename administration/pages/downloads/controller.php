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
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
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
        $this->set($a);
        $this->render('add');
    }

    public function sendnew ()
    {
        $send['name']        = Common::VarSecure($_POST['name'], null);
        $send['description'] = Common::VarSecure($_POST['description'], 'html');
        $send['uploader']    = $_SESSION['USER']->user->hash_key;

        if ($_FILES['download']['error'] == 4) {
			$array = array(
				'type' => 'error',
				'text' => 'Aucun fichier'
			);
            $this->error('Téléchargement', $array['text'], $array['type']);
            $this->redirect('downloads?admin&option=pages', 3);
            return false;
        }

        if (isset($_FILES['download'])) {
            $screen = Common::Upload('download', 'uploads/downloads',false,true);
            $send['download'] = '/uploads/downloads/' . $screen;
            $send['size'] = $_FILES['download']['size'];
        }

        if (isset($_FILES['screen'])) {
            $screen = Common::Upload('screen', 'uploads/downloads/img', array('.png', '.gif', '.jpg', '.jpeg', '.webp', '.bmp'),true);
            $send['screen'] = '/uploads/downloads/img/' . $screen;
        } else {
            $send['screen'] = '';
        }

        $send['idcat'] = 0;

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
        $id = (int) $this->data[2];
        $d['data'] = $this->models->getOneDls ();
    }

    public function category()
    {
        $menu[] = array('title' => 'Accueil Téléchargement', 'href' => 'downloads?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Accueil Catégorie', 'href' => 'downloads/category?Admin&option=pages', 'ico'  => 'fa-solid fa-house-flag');
        $menu[] = array('title' => 'Ajouter une Catégorie', 'href' => 'downloads/newcategory?Admin&option=pages', 'ico'  => 'fa-solid fa-puzzle-piece');

        $d['data'] = $this->models->getCat ();
        $this->set($d);

        $this->render('category', $menu);
    }

    public function deletecat ()
    {

    }

    public function editcat ()
    {
        $id = (int) $this->data[2];
        $this->models->deletecat($id);
    }
}