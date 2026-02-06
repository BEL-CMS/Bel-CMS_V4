<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
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
		$sql->table('TABLE_BAN');
		$sql->queryAll();
		$return = $sql->data;
		return $return;
	}

	public function deleteBan ($where = false)
	{
		$del = New BDD;
		$del->table('TABLE_BAN');
		$del->where($where);
		$del->delete();
	}

	public function addBan ($author = null,$ip = null, $email = null, $date = null, $endban = null, $timeban = null, $reason = null
	) {
		$insert['who']      = $_SESSION['USER']->user->hash_key;
		$insert['author']   = $author;
		$insert['ip']       = $ip;
		$insert['email']    = $email;
		$insert['date']     = $date;
		$insert['endban']   = $endban;
		$insert['timeban']  = $timeban;
		$insert['reason']   = $reason;
		// BDD return count (0 or 1);
		$sql = New BDD;
		$sql->table('TABLE_BAN');
		$sql->insert($insert);
		// SQL RETURN NB INSERT
		if ($sql->rowCount == true) {
			$return = array(
				'type' => 'success',
				'text' => 'SUCCESS'
			);
		} else {
			$return = array(
				'type' => 'warning',
				'text' => 'ERROR'
			);
		}
		return $return;
	}


}