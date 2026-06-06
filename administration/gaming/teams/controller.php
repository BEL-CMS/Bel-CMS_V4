<?php

/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Core\Notification;
use BelCMS\Core\Secure;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Teams extends AdminPages
{
    var $admin  = false; // Admin suprême uniquement (Groupe 1);
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'ModelsTeams'; // Nom du Models (récupération de données)

    public function index()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'teams?Admin&option=gaming', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Créer une team', 'href' => 'teams/add/?Admin&option=gaming', 'ico'  => 'fa-solid fa-pen-to-square');
        $this->render ('index', $menu);
    }

    public function add ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'teams?Admin&option=gaming', 'ico'  => 'fa-solid fa-igloo');
        $this->render ('add', $menu);
    }

    public function addteam ()
    {
        $insert = array();
        $insert['name']       = Common::VarSecure($_POST['name']);
        $insert['foundation'] = Secure::validateDate($_POST['foundation']);
        $insert['joining']    = ($_POST['joining'] == 'on') ? true : false;

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
            $fileTmpPath = $_FILES['logo']['tmp_name'];
            if (is_uploaded_file($fileTmpPath)) {
                $logo = Common::Upload('logo', 'uploads/teams', true, false);
                $insert['logo'] = 'uploads/teams'.$logo;
            }
        } else {
            Notification::warning('Un logo est obligatoire.', 'Teams');
            $this->redirect('teams/add?Admin&option=gaming', 2);
            return;
        }

        if (isset($_FILES['screen']) && $_FILES['screen']['error'] == 0) {
            $fileTmpPathsScreen = $_FILES['screen']['tmp_name'];
            if (is_uploaded_file($fileTmpPathsScreen)) {
                $screen = Common::Upload('screen', 'uploads/teams', true, false);
                $insert['screen'] = 'uploads/teams'.$screen;
            }
        } else {
            $insert['screen'] = null;
        }

        $this->models->insert($insert);
    }
}