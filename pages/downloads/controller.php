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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Downloads extends Pages
{
    var $useModels = 'Downloads';

    public function index()
    {
        $cat['cat'] = $this->models->allGetCat ();
        $this->set($cat);
        $this->render('index');
    }

    public function viewcat ()
    {
        if (ctype_digit($this->data[2])) {
            $getdls['data'] = $this->models->getAllDlForID ($this->data[2]);
            if (empty($getdls['data'])) {
                Notification::infos('Aucune option de téléchargement n\'est présente dans la base de données.', 'information');
                return false;
            }
            $this->set($getdls);
            $this->render('viewcat');
        } else {
            Notification::error('Erreur ID', 'ERREUR ID');
		    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'downloads';
		    $this->redirect($referer, 3);
        }
    }

    public function viewdl ()
    {
        $id = $this->data[2];
        if (ctype_digit($this->data[2])) {
            $set['data'] = $this->models->getDlForID ($id);
            $this->models->viewAdd($id);
            $this->set($set);
            $this->render('view');
        } else {
            Notification::error('Erreur ID', 'ERREUR ID');
		    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'downloads';
		    $this->redirect($referer, 3);
        }
    }

    public function getDownload ()
    {
        $id = is_numeric($this->data[2]) ? $this->data[2] : false;
        if ($id !== false) {
			if ($this->models->ifAccess($id) == true) {
				$download = $this->models->getDownloads($id);
				$this->linkHeader($download);
			}
		} else {
            Notification::error('Erreur ID', 'ERREUR ID');
		    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'downloads';
		    $this->redirect($referer, 3); 
        }
	}
}