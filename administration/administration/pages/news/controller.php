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

class News extends AdminPages
{
    var $admin  = false; // Admin suprême uniquement (Groupe 1);
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'ModelsNews'; // Nom du Models (récupération de données)

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'news?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter une actualité', 'href' => 'news/add?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
        $menu[] = array('title' => 'Catégories', 'href' => 'News/cat?admin&option=pages', 'ico'  => 'fa-solid fa-puzzle-piece');

        $a['data'] = $this->models->getNews();
        $this->set($a);
        $this->render('index', $menu);
    }

    public function add ()
    {
        $a['cat']  = $this->models->getCat();
        $this->set($a);
        $this->render('add');
    }
    public function sendnew()
    {
        $send['rewrite_name']      = Common::MakeConstant($_POST['name']);
        $send['name']              = Common::VarSecure($_POST['name'], ''); // autorise que du texte
        $send['content']           = Common::VarSecure($_POST['content'], 'html'); // autorise que les balises HTML
        $send['additionalcontent'] = Common::VarSecure($_POST['additionalcontent'], 'html'); // autorise que les balises HTML
        $send['author']            = $_SESSION['USER']->user->hash_key;
        $send['authoredit']        = null;
        $send['tags']              = Common::VarSecure($_POST['tags'], ''); // autorise que du texte
        $send['cat']               = (int) $_POST['cat'];
        $send['view']              = 0;
        $send['like_post']         = 0;

        if (isset($_FILES['img'])) {
            $screen = Common::Upload('img', 'uploads/news', false, true);
            $send['img'] = '/uploads/news/' . $screen;
        } else {
            $send['img'] = '';
        }
        $return = $this->models->sendnew($send);
        $this->error(get_class($this), $return['text'], $return['type']);
        $this->redirect('News?admin&option=pages', 3);
    }

    public function editnews  ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'news?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter une actualité', 'href' => 'news/add?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
        $menu[] = array('title' => 'Catégories', 'href' => 'News/cat?admin&option=pages', 'ico'  => 'fa-solid fa-puzzle-piece');
        $a['cat']  = $this->models->getCat();
        $this->set($a);
        $id = (int) $this->id;
        $d['data'] = $this->models->getnewsforid ($id);
        $this->set($d);
        $this->render('editsend', $menu);
    }

    public function sendedit ()
    {
        $send['rewrite_name']      = Common::MakeConstant($_POST['name']);
        $send['name']              = Common::VarSecure($_POST['name'], ''); // autorise que du texte
        $send['content']           = Common::VarSecure($_POST['content'], 'html'); // autorise que les balises HTML
        $send['additionalcontent'] = Common::VarSecure($_POST['additionalcontent'], 'html'); // autorise que les balises HTML
        $send['authoredit']        = $_SESSION['USER']->user->hash_key;
        $send['tags']              = Common::VarSecure($_POST['tags'], ''); // autorise que du texte
        $send['cat']               = (int) $_POST['cat'];
        $id = (int) $_POST[('id')];
        $return = $this->models->sendedit($send, $id);
        $this->error(get_class($this), $return['text'], $return['type']);
        $this->redirect('News?admin&option=pages', 3);
    }

    public function delete ()
    {
        $id = (int) $this->id;
        $return = $this->models->delete($id);
        $this->error(get_class($this), $return['text'], $return['type']);
        $this->redirect('News?Admin&option=pages', 2);
    }

    public function cat ()
    {
        $menu[] = array('title' => 'Ajouter une catégorie', 'href' => 'news/addcat?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
    
        $d['cat'] = $this->models->getCat();
        $this->set($d);
        $this->render('cat', $menu);
    }

    public function addcat ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'news?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $this->render('catadd', $menu);
    }

    public function sendcat ()
    {
        $name  = Common::VarSecure($_POST['name'], null);
        $verif = $this->models->verifNameGroup ($name);
        if ($verif === true) {
            $array['value'] = $name;
            $this->models->addCat ($array);
            $this->error(get_class($this), constant('SEND_SUCCESS'), 'success');
            $this->redirect('News/cat?admin&option=pages', 2);
        } else {
            $this->error(get_class($this), constant('GROUP_NAME_RESERVED'), 'warning');
            $this->redirect('news/addcat?Admin&option=pages', 2);
        }
    }

    public function deletecat ()
    {
        $id = (int) $this->data[2];
        $this->models->deleteCat($id);
        $this->error(get_class($this), constant('DEL_SUCCESS'), 'success');
        $this->redirect('News/cat?admin&option=pages', 2);
    }

    public function editcat()
    {
        $id = (int) $this->data[2];
        $d['cat'] = $this->models->getCatforID($id);
        $this->set($d);
        $this->render ('editcat');
    }

    public function sendeditcat ()
    {
        $id = (int) $_POST['id'];
        $value = Common::VarSecure($_POST['name']);
        $this->models->sendEditCat ($id, $value);
        $this->error(get_class($this), constant('SEND_EDIT_SUCCESS'), 'success');
        $this->redirect('News/cat?admin&option=pages', 2);
    }

    public function parameter ()
    {
        Config::GroupsAccess('news');
        $menu[] = array('title' => 'Accueil', 'href' => 'news?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter une actualité', 'href' => 'news/add?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');
        $menu[] = array('title' => 'Catégories', 'href' => 'News/cat?admin&option=pages', 'ico'  => 'fa-solid fa-puzzle-piece');
        $this->render('parameter', $menu);
    }
    public function sendParameter()
    {
        $data['MAX_NEWS']     = (int) $_POST['MAX_NEWS'];
        $opt                  = array('MAX_NEWS' => $_POST['MAX_NEWS']);
        $data['admin']        = isset($_POST['admin']) ? $_POST['admin'] : array(1);
        $data['groups']       = isset($_POST['groups']) ? $_POST['groups'] : array(1);
        $upd['config']        = Common::transformOpt($opt, true);
        $upd['active']        = isset($_POST['active']) ? 1 : 0;
        $upd['access_admin']  = implode("|", $_POST['admin']);
        $upd['access_groups'] = implode("|", $_POST['groups']);


        $return = $this->models->sendparameter($upd);
        $this->error(get_class($this), $return['text'], $return['type']);
        $this->redirect('News/parameter?admin&option=pages', 2);
    }

}