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
use BelCMS\Core\extendsPages;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class News extends extendsPages
{
    var $useModels = 'ModelsNews',
        $dir       = 'news';

    public function index ()
    {
        $set['news'] = $this->models->getNews();
        $this->set($set);
        $this->render('index');
    }

    public function ReadMore ()
    {
        $id = (int) $this->data[2];
        $set['news'] = $this->models->getNews($id);
        $this->set($set);
        $this->render('readmore');
    }
}