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
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset = "utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Calendar extends AdminPages
{
    var $admin  = false; // Admin suprême uniquement (Groupe 1);
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'ModelsCalendar'; // Nom du Models (récupération de données)

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'calendar?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter un évènement', 'href' => 'calendar/add?Admin&option=pages', 'ico'  => 'fa-solid fa-pen-to-square');

        $d['events'] = $this->models->getEvents ();
        $this->set($d);
        $this->render('index', $menu);
    }

    public function add ()
    {
        $this->render ('add');
    }

    public function sendnew ()
    {
        $send['name']        = Common::VarSecure($_POST['name'], '');
        $send['color']       = $_POST['color'] == 0 ? 1 : Common::VarSecure($_POST['color']);
        $send['start_date']  = Common::DatetimeReverse($_POST['start_date']);
        $send['end_date']    = Common::DatetimeReverse($_POST['end_date']);
        $send['start_time']  = Common::VarSecure($_POST['start_time']);
        $send['end_time']    = Common::VarSecure($_POST['end_time']);
        $send['location']    = Common::VarSecure($_POST['location'], '');
        $send['description'] = Common::VarSecure($_POST['description'], 'html');

        if (isset($_FILES['image'])) {
            $screen = Common::Upload('image', 'uploads/events', 'img');
            $send['image'] = 'uploads/events'.$screen;
        } else {
            $send['image'] = null;
        }

        $return = $this->models->send ($send);

        if ($return === true) {
            $array = array(
                'type' => 'success',
                'text' => 'Aucun fichier'
            );    
        } else {
            $array = array(
                'type' => 'error',
                'text' => 'Aucun fichier'
            ); 
        }
    }
}