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

use BelCMS\Core\Interaction;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class config extends AdminPages
{
    var $admin  = true; // Admin suprême uniquement (Groupe 1);
    var $active = true;
    var $bdd    = 'ConfigModels';

    public function index ()
    {
        $d['data'] = $this->models->getData();
        $this->set($d);
        $this->render('index');
    }

    public function edit ()
    {
        $id = (int) $this->id;
        $d['data'] = $this->models->getInfos($id);
        $this->set($d);
        $this->render('edit');
    }

    public function sendParameter ()
    {
        $_POST['access_groups'][] = 1;
        $_POST['access_admin'][]  = 1;
        $send['active']           = isset($_POST['active']) ? 1 : 0;
        $send['access_groups']    = implode('|', $_POST['access_groups']);
        $send['access_admin']     = implode('|', $_POST['access_admin']);
        $send['description']      = Common::VarSecure($_POST['description'], null);
        $send['keywords']         = Common::VarSecure($_POST['keywords'], null);
        $send['infos_sup']        = Common::VarSecure($_POST['infos_sup'], 'html');
        $id                       = (int) $_POST['id'];
        $send['config']           = Common::VarSecure($_POST['config'], null);
        $name                     = Common::VarSecure($_POST['name'], null);

        $return = $this->models->sendParameter($send, $id);

        if ($return === true) {
            #######################################################
            $msg   = $_SESSION['USER']->user->username . ' à modifier les paramètres de la page : '.$name;
            $interaction = new Interaction();
            $interaction->status('green');
            $interaction->message($msg);
            $interaction->title('Modification des paramètre');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            $array = array(
                'type' => 'success',
                'text' => constant('NEW_PARAMETER_SUCCESS')
            );
            $this->error('Tickets', $array['text'], $array['type']);
            $this->redirect('config?admin&option=parameter', 2);
        } else {
            #######################################################
            $msg   = $_SESSION['USER']->user->username . ' à tenter de modifier les paramètres de la page : '.$name;
            $interaction = new Interaction();
            $interaction->status('orange');
            $interaction->message($msg);
            $interaction->title('Modification des paramètres');
            $interaction->author($_SESSION['USER']->user->hash_key);
            $interaction->setAdmin();
            #######################################################
            $array = array(
                'type' => 'warning',
                'text' => constant('NEW_PARAMETER_ERROR')
            );
            $this->error('Tickets', $array['text'], $array['type']);
            $this->redirect('config?admin&option=parameter', 2);
        }
    }
}