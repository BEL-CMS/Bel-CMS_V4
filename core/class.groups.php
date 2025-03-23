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

namespace BelCMS\Core;

use BelCMS\PDO\BDD;

final class Groups
{
    public static function getGroups ($true = false)
	{
		$return = (object) array();
		$sql = New BDD;
		$sql->table('TABLE_GROUPS');
		$sql->fields(array('id', 'name', 'id_group', 'color', 'image'));
		$sql->queryAll();

		foreach ($sql->data as $v) {
			$a = defined(strtoupper($v->name)) ? constant(strtoupper($v->name)) : ucfirst(strtolower($v->name));
			if ($true == false) {
				$a = defined(strtoupper($v->name)) ? constant(strtoupper($v->name)) : ucfirst(strtolower($v->name));
				$return->$a = array('id' => $v->id_group, 'color' => $v->color, 'image' => $v->image);
			} else {
				$a = defined(strtoupper($v->name)) ? constant(strtoupper($v->name)) : ucfirst(strtolower($v->name));
				$return->{$v->id} = array('name' => $a, 'color' => $v->color, 'image' => $v->image);
			}
		}

		return $return;
	}

	public static function getName ($id)
	{
		$return = (object) array();
		$sql = New BDD;
		$sql->table('TABLE_GROUPS');
		$sql->fields(array('id', 'name', 'id_group', 'color', 'image'));
		$sql->where(array('name' => 'id_group', 'value' => $id));
		$sql->queryOne();
		$return = $sql->data;
		return $return;
	}
}