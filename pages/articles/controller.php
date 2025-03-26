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

use BelCMS\Core\Notification;
use Belcms\Core\Pages;
use BelCMS\Core\Security;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Articles extends Pages
{
	var $useModels  = 'Articles';

	public function index ()
	{
		$set['data'] = $this->models->getPage();
		if (!empty($set['data'])) {
			foreach ($set['data'] as $k => $v) {
				if (Security::IsAcess($v->groups) == false) {
					unset($set['data'][$k]);
				}
			}
			$this->set($set);
		}
		$page = Common::ScanFiles(ROOT.'/pages/page/uploads');
		if (!empty($page)) {
			$pages['sub'] = str_replace(".php", "", $page);
			$this->set($pages);
		}

		$this->render('index');
	}
	public function subpage ()
	{
		$id = $this->data[2];
		if (!is_null($id) && is_numeric($id)) {
			$set['data'] = $this->models->getArticles($id);
			if (empty($set['data'])) {
				Notification::warning('Aucune page dans la BDD');
			} else {
				$get = $this->models->getArticlesId(current($set['data'])->number);
				if (Security::IsAcess($get->groups) == false) {
					$this->errorInfos = array('warning', constant('NO_ACCESS_GROUP_PAGE'), constant('INFO'), false);
				} else {
					$this->set($set);
					$this->render('subpage');
				}
			}
		} else {
			$this->errorInfos = array('warning', 'Aucun ID', constant('INFO'), false);
		}
	}

	public function read ($id = null)
	{
		$id = $this->data[2];
		if (!is_null($id) && is_numeric($id)) {
			$set['data'] = $this->models->getArticlesContentId($id);
			if (!empty($set['data'])) {
				$get = $this->models->getArticlesId($set['data']->number);
				if (Security::IsAcess($get->groups) == false) {
					$this->errorInfos = array('error', constant('NO_ACCESS_GROUP_PAGE'), constant('INFO'), false);
				} else {
					$this->set($set);
					$this->render('read');	
				}
			}
		} else {
			$this->errorInfos = array('error', 'Aucun ID', constant('INFO'), false);
		}
	}

}
