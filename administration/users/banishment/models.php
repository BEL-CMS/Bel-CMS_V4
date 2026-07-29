<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

use BelCMS\PDO\BDD;
##########  TABLE  ##########
##### TABLE_BANISHMENT ######
##### TABLE_BANISHMENT_LOGS'#
final class BanModels
{
    public function getUsers () : array
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

	public function getBan () : array
	{
		$sql = new BDD;
		$sql->table('TABLE_BANISHMENT');
		$sql->queryAll();
		$return = $sql->data;
		return $return;
	}

	public function delete ($id) : bool
	{
		$sql = new BDD();
		$sql->table('TABLE_BANISHMENT');
		$sql->where(array('name' => 'ban_id', 'value' => $id));
		$sql->delete();
		debug($sql);
		$return = $sql->data;
		if ($return == 1) {
			$return = true;
		} else {
			$return = false;
		}
		return $return;
	}

	public function getNameForIP ($ip) : string
	{
		$sql = new BDD();
		$sql->table('TABLE_USERS');
		$sql->where(array('name' => 'ip', 'value' => $ip));
		$sql->queryOne();
		$return = $sql->data;
		if (empty($return)) {
			$return = '';
		} else {
			$return = $sql->data->username;
		}
		return $return;
	}
}