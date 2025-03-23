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
use BelCMS\Core\like;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Downloads extends extendsPages
{
    var $useModels = 'ModelsDownloads',
        $dir       = 'downloads';

    public function index ()
    {
        $a['data'] = $this->models->getCat();
        $this->set($a);
        $this->render('index');
    }

    public function dls ()
    {
        $id = (int) $this->data[2];
        $a['data'] = $this->models->getdls($id);
        $this->set($a);
        if (empty($a['data'])) {
            $this->notification('error', 'Aucun téléchargement dans cette catégorie', constant('ID_ERROR'), false);
            return false;
        }
        $this->render('index2'); 
    }

    public function detail ()
    {
        $id = (int) $this->data[2];
        $d['data'] = $this->models->getDetail ($id);
        $this->set($d);
        $this->render('detail');
    }

	public function getDl ()
	{
		if (!is_numeric($this->data[2])) {
            $this->notification('error', constant('ID_ERROR_TITLE'), constant('ID_ERROR'));
		}
		$id = $this->data[2];
		if ($id != null && is_numeric($id)) {
			if ($this->models->ifAccess($id) == true) {
				$download = $this->models->getDownloads($id);
				$this->linkHeader($download);
                $this->notification('warning', constant('DOWNLOADING'), constant('INFO'));

				$c['data'] = current($this->models->getDlsDetail($id));
				$this->set($c);
				$this->render('detail');
			} else {
                $this->notification('warning', constant('NO_DL'), constant('INFO'));
			}
		}
	} 
    
    public function new ()
    {
        $a['data'] = $this->models->getNew();
        $this->set($a);
        $this->render('new');
    }

    public function popular ()
    {
        $a['data'] = $this->models->popular();
        $this->set($a);
        $this->render('new');
    }

    public function pluslike ()
    {
        $number = is_numeric($_POST['id']) ? $_POST['id'] : 0;
        $like = new like('downloads', $number);
        if ($like->test() === true):
            $test = $like->send();
            if ($test == true) {
                echo "Vote avec succès";
            } else {
                echo "Imprevu lors du vote";
            }
        endif;
    }

    public function propose ()
    {
        
    }
}