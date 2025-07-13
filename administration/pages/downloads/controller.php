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

use BelCMS\Core\Config;
use BelCMS\Core\Pages;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Downloads extends Pages
{
    var $useModels = 'Downloads';

    public function index()
    {
        $config = Config::GetConfigPage('downloads');
        $a['pagination'] = $this->pagination($config->config['MAX_PPR'], 'Downloads', constant('TABLE_DOWNLOADS'));
        $a['dls'] = $this->models->getDls ();
        $a['cat'] = $this->models->getCat ();
        $this->set($a);
        $this->render ('index');
    }

    public function getNameDL () 
    {
        $name = Common::VarSecure($_GET['term'], null);
        if (strlen($name) >= 3) {
            $return = $this->models->getNameDls ($name);
            $return = json_encode($return);
            echo $return;
        } else {
            echo json_encode('Nom trop court');
        }
    }

    public function Search ()
    {
        $name = Common::VarSecure($_POST['name']);
        if (!empty($name) and strlen($name) >= 3) {
            $get['name'] = $name;
        }
        $sorting = is_numeric($_POST['sorting']) ? $_POST['sorting'] : 1;
        switch ($sorting) {
            case '1':
                $sorting = 'name';
                $desc    = 'ASC';
            break;

            case '2':
                $sorting = 'view';
                $desc    = 'DESC';
            break;

            case '3':
                $sorting = 'idcat';
                $desc    = 'DESC';
            break;

            case '4':
                $sorting = 'view';
                $desc    = 'DESC';
            break;

            case '5':
                $sorting = 'dls';
                $desc    = 'DESC';
                break;
            
            default:
                $sorting = 'name';
                $desc    = 'ASC';
            break;
        }
        $get['sorting'] = $sorting;
        if (isset($_POST['cat'])) {
            $cat = is_numeric($_POST['cat']) ? $_POST['cat'] : 0;
            if ($cat != 0) {
                $get['cat'] = $cat;
            }
        }
        $a['dls'] = $this->models->getSearch ($get, $desc);
        $a['cat'] = $this->models->getCat();
        $this->set($a);
        $this->render('search');
    }

    public function view ()
    {
        $id = (int) $this->data[2];
        $a['view'] = $this->models->view ($id);
        $this->models->viewAdd ($id);
        $this->set($a);
        $this->render('view');
    }

    public function getDownload ()
    {
        $id = is_numeric($this->data[2]) ? $this->data[2] : false;
        if ($id !== false) {
			if ($this->models->ifAccess($id) == true) {
				$download = $this->models->getDownloads($id);
				$this->linkHeader($download);
			}
		}
	}
}