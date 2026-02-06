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

use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Groups extends AdminPages
{
    var $admin  = true;
    var $active = true;
    var $bdd    = 'GroupsModels';

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'groups?admin&option=users', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter un groupe', 'href' => 'groups/new?admin&option=users', 'ico'  => 'fa-solid fa-pen-to-square');
        $d['groups'] = $this->models->getAllGroups();
        $this->set($d);
        $this->render('index', $menu);
    }

    public function new ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'groups?admin&option=users', 'ico'  => 'fa-solid fa-igloo');
        $this->render('new', $menu);
    }

    public function add ()
    {
        if (empty($_POST['name'])) {
            $return['text']  = 'Nom vide';
            $return['type']  = 'warning';
            $this->error('Groupes', $return['text'], $return['type']);
            return false;
        }

        $d['name'] = Common::replaceTo($_POST['name'], ' ', '');

        $returnCheckName = $this->models->testName($d['name']);

        if ($returnCheckName >= 1) {
            $return['text']  = constant('GROUP_NAME_RESERVED');
            $return['type']  = 'warning';
            $this->error('Groupes', $return['text'], $return['type']);
            return false;
        }

        $d['color'] = Common::nbCountCaractere($_POST['color']);

        if ($d['color'] != 7) {
            $return['text']  = 'Couleur Hex obligatoire';
            $return['type']  = 'warning';
            $this->error('Groupes', $return['text'], $return['type']);
            return false;  
        } else {
            $d['color'] = $_POST['color'];
        }

        $dir = ROOT.DS.'uploads'.DS.'groups'.DS;
        $dirWeb = 'uploads/groups/';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
            $fopen  = fopen($dir.'index.html', 'a+');
            fclose($fopen);
        }

        $extensions = array('.png', '.gif', '.jpg', '.ico', '.jpeg', '.svg', '.webp');
        if (isset($_FILES['image']['name']) AND !empty($_FILES['image']['name'])) {
            Common::Upload('image', $dir, $extensions);
            $d['image'] = $dirWeb.$_FILES['image']['name'];
        }

        $d['id_group']    = $this->models->getNbPluseOne();
        $d['description'] = Common::VarSecure($_POST['description'], null);

        $return = $this->models->sendNewGroup ($d);
        $this->error('Groupes', $return['text'], $return['type']);
        $this->redirect('groups?admin&option=users', 3);
    }

    public function delete ()
    {
        $id = (int) $this->data['2'];
        if ($id == 1 or $id == 2) {
            $this->error('Groupes', constant('ID_ERROR'), 'error');
            $this->redirect('groups?admin&option=users', 3);
        }
        $return = $this->models->delete($id);
        $this->error('Groupes', $return['text'], $return['type']);
        $this->redirect('groups?admin&option=users', 3);
    }

    public function edit ()
    {
        $id = (int) $this->data['2'];
        $d['edit'] = $this->models->edit($id);
        $this->set($d);
        $menu[] = array('title' => 'Accueil', 'href' => 'groups?admin&option=users', 'ico'  => 'fa-solid fa-igloo');
        $this->render('edit', $menu);
    }

    public function sendedit ()
    {
        if ($_POST['old_name'] != $_POST['name']) {

            $d['name'] = Common::replaceTo($_POST['name'], ' ', '');

            $returnCheckName = $this->models->testName($d['name']);

            if ($returnCheckName >= 1) {
                $return['text']  = constant('GROUP_NAME_RESERVED');
                $return['type']  = 'warning';
                $this->error('Groupes', $return['text'], $return['type']);
                return false;
            }
        }

        $d['color'] = Common::nbCountCaractere($_POST['color']);

        if ($d['color'] != 7) {
            $return['text']  = 'Couleur Hex obligatoire';
            $return['type']  = 'warning';
            $this->error('Groupes', $return['text'], $return['type']);
            return false;  
        } else {
            $d['color'] = $_POST['color'];
        }

        $dir = ROOT.DS.'uploads'.DS.'groups'.DS;
        $dirWeb = 'uploads/groups/';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
            $fopen  = fopen($dir.'index.html', 'a+');
            fclose($fopen);
        }

        $extensions = array('.png', '.gif', '.jpg', '.ico', '.jpeg', '.svg', '.webp');
        if (isset($_FILES['image']['name']) AND !empty($_FILES['image']['name'])) {
            Common::Upload('image', $dir, $extensions);
            $d['image'] = $dirWeb.$_FILES['image']['name'];
        }

        $d['description'] = Common::VarSecure($_POST['description'], null);
        $d['id'] = (int) $_POST['id'];
        
        $return = $this->models->sendEditGroup ($d);
        $this->error('Groupes', $return['text'], $return['type']);
        $this->redirect('groups?admin&option=users', 3);
    }
}