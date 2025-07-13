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

namespace Belcms\Pages\Models;

use BelCMS\Core\Config;
use BelCMS\Core\Dispatcher;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

############################################
#  TABLE_NEWS
#  TABLE_NEWS_CAT
############################################
final class News
{
    public function getNews ($id = false)
    {
        $sql = new BDD;
        $sql->table('TABLE_NEWS');
        if (is_numeric($id)) {
            $sql->where(array('name' => 'id', 'value' => $id));
            $sql->queryOne();
            $sql->data->cat = self::getCat($sql->data->cat);
            self::NewView($id);
        } else {
            $config = Config::GetConfigPage('news');
            if (isset($config->config['MAX_NEWS'])) {
                $nbpp = (int) $config->config['MAX_NEWS'];
            } else {
                $nbpp = (int) 3;
            }
            $page = (Dispatcher::RequestPages() * $nbpp) - $nbpp;
			$sql->orderby(array(array('name' => 'id', 'type' => 'DESC')));
			$sql->limit(array(0 => $page, 1 => $nbpp), true);
            $sql->queryAll();
            foreach ($sql->data as $key => $value) {
                $sql->data[$key]->cat = self::getCat($value->cat);
            }
        }
        $return = $sql->data;
        return $return;
    }

    private function getCat ($id)
    {
        $id = (int) $id;
        $sql = new BDD;
        $sql->table('TABLE_NEWS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function NewView ($id = false)
	{
		if ($id) {
			$id = Common::secureRequest($id);
			$get = New BDD();
			$get->table('TABLE_NEWS');
			$where = array(
				'name'  => 'id',
				'value' => (int) $id
			);
			$get->where($where);
			$get->queryOne();
			$data = $get->data;
			if ($get->rowCount != 0) {
				$count = (int) $data->view;
				$count = $count +1;
				$update = New BDD();
				$update->table('TABLE_NEWS');
				$update->where($where);
				$update->update(array('view' => $count));
			}
		}
	}
}