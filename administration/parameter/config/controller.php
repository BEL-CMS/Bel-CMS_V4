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
        $name = Common::VarSecure($_GET['title'], null);
        $d['infos'] = $this->models->getInfos($name);
        $this->set($d);
        $this->render('edit');
    }
}