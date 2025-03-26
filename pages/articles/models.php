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

namespace Belcms\Pages\Models;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
############################################
# TABLE_ARTICLES
# TABLE_ARTICLES_CONTENT
############################################
final class Articles
{
	public function getPage ()
	{
		$sql = New BDD;
		$sql->table('TABLE_ARTICLES');
		$sql->queryAll();
		foreach ($sql->data as $k => $v) {
			$get = New BDD();
			$get->table('TABLE_ARTICLES_CONTENT');
			$where = array(
				'name'  => 'number',
				'value' => $v->id
			);
			$get->where($where);
			$get->count();
			$return = $get->data;
			$sql->data[$k]->count = $return;
		}

		return $sql->data;
	}

	public function getArticlesId ($id = false)
	{
		$sql = New BDD;
		$sql->table('TABLE_ARTICLES');
		$where = array(
			'name'  => 'id',
			'value' => $id
		);
		$sql->where($where);
		$sql->queryOne();

		return $sql->data;
	}

	public function getArticles ($id = null)
	{
		$return = array();

		if (is_numeric($id)) {
			$sql = New BDD;
			$sql->table('TABLE_ARTICLES_CONTENT');
			$where = array(
				'name'  => 'number',
				'value' => $id
			);
			$sql->where($where);
			$sql->queryAll();

			$return = $sql->data;
		}

		return $return;
	}

	public function getArticlesContentId ($id = null)
	{
		$return = array();

		if (is_numeric($id)) {
			$sql = New BDD;
			$sql->table('TABLE_ARTICLES_CONTENT');
			$where = array(
				'name'  => 'id',
				'value' => $id
			);
			$sql->where($where);
			$sql->queryOne();

		    $return = $sql->data;
		}

		return $return;
	}

}