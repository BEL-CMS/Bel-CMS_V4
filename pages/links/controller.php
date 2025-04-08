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

namespace Belcms\Pages\Controller;
use BelCMS\Core\Pages;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Links extends Pages
{
    var $useModels = 'Links';

    public function index ()
    {
        $a['cat']    = $this->models->getCat ();
        $a['nbcat']  = $this->models->getNbCat ();
        $a['nblink'] = $this->models->getNbLink ();
        $this->set($a);
        $this->render ('index');
    }

    public function cat ()
    {
        $id = (int) $this->data[2];
        $a['cat'] = $this->models->getCatForNumber ($id);
        $a['links'] = $this->models->getLinksForNumber ($a['cat']->id);
        $this->set($a);
        $this->render('cat');
    }

    public function link ()
    {
        $id = (int) $this->data[2];
        $a['links'] = $this->models->getLinksForNumber($id);
        $this->set($a);
        $this->render('link');
    }

    public function click() 
    {
        $id = (int) $this->data[2];
        $link = $this->models->onePlus($id);
        Common::Redirect('/'.$link);
        $this->render ('click');
    }
}