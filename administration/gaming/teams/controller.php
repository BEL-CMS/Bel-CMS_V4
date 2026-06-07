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

        $a['teams'] = $this->models->getTeams ();
        $this->set($a);

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
        $insert['foundation'] = Common::TransformDate($_POST['foundation'], 'SQLDATE');
        $insert['joining']    = ($_POST['joining'] == 'on') ? true : false;
        $insert['contact']    = Common::VarSecure($_POST['contact'], null);


        if ($this->models->testName($insert['name']) === false) {
            Notification::warning('Le nom que vous avez choisi est déjà enregistré.', 'Teams');
            $this->redirect('teams/add?Admin&option=gaming', 2);
            return;
        }

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

        $return = $this->models->insert($insert);

        if ($return === true) {
            Notification::success('Nous avons bien reçu l\'enregistrement de l\'équipe.', 'Teams');
            $this->redirect('teams?Admin&option=gaming', 2);
            return;
        }
    }

    public function delete ()
    {
        $id = $this->data[2];

        if (ctype_digit($id)) {
            $return = $this->models->delete ($id);
            if ($return === true) {
                $array  = array(
                    'type' => 'success',
                    'text' => constant('DEL_SUCCESS')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('teams?admin&option=gaming', 2);
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Lien', $array['text'], $array['type']);
                $this->redirect('teams?admin&option=gaming', 2);
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('teams?admin&option=gaming', 2);
        }
    }

    public function edit ()
    {
        $id = $this->data[2];

        if (ctype_digit($id)) {
            $menu[] = array('title' => 'Accueil', 'href' => 'teams?Admin&option=gaming', 'ico'  => 'fa-solid fa-igloo');
            $a['team'] = $this->models->getTeam($id);
            $this->set($a);
            $this->render('edit', $menu);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('teams?admin&option=gaming', 2);
        }
    }

    public function editTeam ()
    {
        $id = $_POST['id'];

        if (ctype_digit($id)) {
            $insert = array();
            $insert['name']       = Common::VarSecure($_POST['name']);
            $insert['foundation'] = Common::TransformDate($_POST['foundation'], 'SQLDATE');
            $insert['joining']    = (!isset($_POST['joining']) or $_POST['joining'] != 'on')  ? false : true;
            $insert['contact']    = Common::VarSecure($_POST['contact'], null);
            $_POST['logo']        = Common::VarSecure($_POST['logo'], null);
            $_POST['screen']      = Common::VarSecure($_POST['screen'], null);

            $getTest     = $this->models->getTeam($_POST['id']);
            $getTestName = $this->models->getTestName($_POST['name']);

            if ($_POST['name'] != $getTest->name) {
                $getTestName = $this->models->getTestName($_POST['name']);
                if ($getTestName === false) {
                    Notification::warning('Le nom que vous avez choisi est déjà enregistré.', 'Teams');
                    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'teams?admin&option=gaming';
                    $this->redirect($referer, 3);
                    return;
                }
            }

            if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
                $fileTmpPath = $_FILES['logo']['tmp_name'];
                if (is_uploaded_file($fileTmpPath)) {
                    $logo = Common::Upload('logo', 'uploads/teams', true, false);
                    $insert['logo'] = 'uploads/teams'.$logo;
                }
            } else {
                if (empty($_POST['logo'])) {
                    Notification::warning('Un logo est obligatoire.', 'Teams');
                    $this->redirect('teams?Admin&option=gaming', 2);
                    return;
                }
            }

            if (isset($_FILES['screen']) && $_FILES['screen']['error'] == 0) {
                $fileTmpPathsScreen = $_FILES['screen']['tmp_name'];
                if (is_uploaded_file($fileTmpPathsScreen)) {
                    $screen = Common::Upload('screen', 'uploads/teams', true, false);
                    $insert['screen'] = 'uploads/teams'.$screen;
                }
            } else {
                if (empty($_POST['screen'])) {
                    $insert['screen'] = 'assets/img/no_img_fullwide_2.webp';
                }
            }

            $return = $this->models->update($id, $insert);

            if ($return === true) {
                Notification::success('Nous avons bien modifier l\'équipe '.$insert['name'].'.', 'Teams');
                $this->redirect('teams?Admin&option=gaming', 2);
                return;
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Lien', $array['text'], $array['type']);
            $this->redirect('teams?admin&option=gaming', 2);
        }
    }
}