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

use BelCMS\Core\Notification;
use BelCMS\Core\Pages;
use BelCMS\Core\Secure;
use BelCMS\Core\Security;
use Dom\Notation;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Articles extends Pages
{
    var $useModels = 'Articles';

    public function index ()
    {
        $a['data'] = $this->models->getArticles ();
        foreach ($a['data'] as $key => $value) {
            $countPage = $this->models->getCountView($value->id_articles);
            $a['data'][$key]->nbpage = $countPage;
        }
        $this->set($a);
        $this->render('index');
    }

    public function getpages ()
    {
        $id = $this->data[2];
        if (ctype_alnum($id)) {
            $a['data'] = $this->models->getAllArticles ($id);
            foreach ($a['data'] as $key => $value) {
                if (Security::IsAcess ($value->accessgrp) !== true) {
                   unset($a['data'][$key]); 
                }
            }
            $this->set($a);
            $this->render('getpages');
        } else {
            Notification::error('Erreur ID', 'ERREUR ID');
		    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'articles';
		    $this->redirect($referer, 3);
        }
    }

    public function read ()
    {
        $id = $this->data[2];
        if (ctype_alnum($id)) {
            $a['data'] = $this->models->read ($id);
            if (Security::IsAcess ($a['data']->accessgrp) !== true) {
                Notification::warning('Vous ne pouvez pas consulter cette page', 'Page');
                return;
            }
            $this->models->viewOne ($id);
            $this->set($a);
            $this->render('read');
        } else {
            Notification::error('Erreur ID', 'ERREUR ID');
		    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'articles';
		    $this->redirect($referer, 3);
        }
    }
}