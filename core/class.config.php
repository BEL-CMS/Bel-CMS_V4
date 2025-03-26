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

namespace BelCMS\Core;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
################################################
# Class Config du CMS / ACCESS
################################################
final class Config
{
    function __construct()
    {
        $_SESSION['CONFIG'] = self::getSqlConfig ();
    }

    private function getSqlConfig () : array
    {
        $sql = new BDD;
        $sql->table('TABLE_CONFIG');
        $sql->queryAll();
        foreach ($sql->data as $key => $value) {
            $return[$value->name] =  $value->value;
        }
        return $return;
    }

	public static function GetConfigPage ($page = null)
	{
		$return = null;

		if ($page != null) {
			$page = strtolower(trim($page));
			$sql = New BDD;
			$sql->table('TABLE_CONFIG_PAGES');
			$sql->where(array('name' => 'name', 'value' => $page));
			$sql->queryOne();
			$return = $sql->data;
			$return->access_groups = explode('|', $return->access_groups);
			$return->access_admin  = explode('|', $return->access_admin);
			if (!empty($return->config)) {
				$return->config = Common::transformOpt($return->config);
			} else {
				$return->config = (object) array();
			}
		}

		return $return;
	}

    public static function getGroups () : array
    {
        $sql = new BDD;
        $sql->table('TABLE_GROUPS');
        $sql->queryAll();
        return $sql->data;
    }

	public static function getConfigWidgets ($name = false) : array
	{
		$return = (object) array();
		$sql = new BDD;
		$sql->table(constant('TABLE_WIDGETS'));
		$sql->fields(array('name', 'title','groups_access','groups_admin','active','pos','orderby','pages','opttions'));
		if ($name !== false) {
			$where = array('name' => 'name', 'value' => $name);
			$sql->where($where);
			$sql->queryOne();
		} else {
			$sql->queryAll();
		}
		$return = $sql->data;
		unset($sql);
		return $return;
	}

	public static function getGroupsForID ($id = null)
	{
		if ($id == 0) {
			return (object) array(
				'name'     => constant('VISITORS'),
				'id_group' => 0,
				'image'    => '',
				'color'    => ''
			);
		}
		$id = (int) $id;
		$return = constant('UNKNOWN');
		$sql = New BDD;
		$sql->where(array('name' => 'id_group', 'value' => $id));
		$sql->table('TABLE_GROUPS');
		$sql->fields(array('name', 'id_group', 'color', 'image'));
		$sql->queryOne();
		if (!empty($sql->data)) {
			$return = $sql->data;
		}
		return $return;
	}
}