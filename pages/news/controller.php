<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.3]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
*/

namespace Belcms\Pages\Controller;

use BelCMS\Core\Config;
use BelCMS\Core\Notification;
use BelCMS\Core\Pages;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class News extends Pages
{
    var $useModels = 'News';

    function index ()
    {
		$config = Config::GetConfigPage('news');
		$data['pagination'] = $this->pagination($config->config['MAX_NEWS'], 'news', constant('TABLE_ARTICLES'));
        $data['news'] = $this->models->getNews();
        $this->set($data);
        $this->render('index');
    }

    public function readmore ()
    {
        if (is_numeric($this->data[2])) {
            $data['news'] = $this->models->getNews($this->data[2]);
            $this->set($data);
            $this->render('readmore');
        } else {
            Notification::error('ID Fausse', 'ALERT ID', true);
        }
    }
}