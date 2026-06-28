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

namespace Belcms\Pages\Controller;

use BelCMS\Core\Notification;
use BelCMS\Core\Pages;
use BelCMS\Core\User;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Teams extends Pages
{
    var $useModels = 'modelsTeams';

    public function index ()
    {   
        $a['teams'] = $this->models->getTeams ();
        foreach ($a['teams'] as $key => $value) {
            $a['teams'][$key]->count = $this->models->getCountGames ($value->id);
        }
        $this->set($a);
        $this->render ('index');
    }

    public function detail ()
    {
        $a  = array();
        $id = $this->data[2];

        if (ctype_digit($id)) {
            $a['team']['team']     = $this->models->getTeam ($id);
            $a['team']['users']    = $this->models->getUser ($id);
            foreach ($a['team']['users'] as $key => $value) {
                $a['team']['users'][$key]['author'] = User::getInfosUserAll($value['hash_key'])->user->username;
                $a['team']['users'][$key]['rank'] = $this->models->getRank ($a['team']['users'][$key]['rank'])->name;
                if (empty($a['team']['users'][$key]['rank'])) {
                    $a['team']['users'][$key]['rank'] = 'Grade inconnu';
                }
            }
            $this->set($a);
            $this->render('detail');
        } else {
            Notification::error(constant('ID_ERROR'), 'Teams');
        }
    }
}