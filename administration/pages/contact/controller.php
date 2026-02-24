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

use BelCMS\Core\Interaction;
use BelCMS\Core\Notification;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset = "utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Contact extends AdminPages
{
    var $admin  = false; // Admin suprême uniquement (Groupe 1);
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'modelsContact'; // Nom du Models (récupération de données)

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'contact?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Catégorie', 'href' => 'contact/category?Admin&option=pages', 'ico'  => 'fa-solid fa-layer-group');

        $d['mails'] = $this->models->getMails();

        foreach ($d['mails'] as $key => $value) {
            $d['mails'][$key]->category = $this->models->getCatName($value->category)->content;
        }

        $this->set($d);

        $this->render('index', $menu);
    }

    public function category()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'contact?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter', 'href' => 'contact/addnewcat?Admin&option=pages', 'ico'  => 'fa-solid fa-layer-group');

        $d['cat'] = $this->models->getCat();
        $this->set($d);

        $this->render('category', $menu);
    }

    public function read ()
    {
        $menu[] = array('title' => 'Accueil Catégorie(s)', 'href' => 'contact/category?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');

        if (ctype_digit($this->data[2])) {
            $data['data'] = $this->models->getCatName($this->data[2]);
            $this->set($data);
            $this->render('readmsg', $menu);
        } else {
            #######################################################
            $msg   = $_SESSION['USER']->user->username . ' à tenter de changer l\'ID : ' . $this->data[2];
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Modification du message');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            Notification::error(text: constant('ID_ERROR'), title: constant('CONTACT'));
            $this->redirect('contact?admin&option=pages', 3);
        }
    }
}