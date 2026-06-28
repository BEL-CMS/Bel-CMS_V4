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
#####################################
# TABLE_FORMATION                   #
# TABLE_FORMATION_ACTIF             #
#####################################
final class ModelsTraining
{
    public function getUsers () : array | object
    {
        $sql = new BDD();
        $sql->table('TABLE_FORMATION');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getActivity () : array | object
    {
        $sql = new BDD();
        $sql->table('TABLE_FORMATION_ACTIVITY');
        $sql->orderby(array(array('name' => 'id', 'type' => 'DESC')));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function insertActivity ($data) : bool 
    {
        $sql = new BDD();
        $sql->table('TABLE_FORMATION_ACTIVITY');
        $sql->insert($data);
		// SQL RETURN NB INSERT
		if ($sql->rowCount == true) {
			$return = true;
		} else {
			$return = false;
		}
		return $return;
    }

    public function delActivity ($data) : bool 
    {
        $sql = new BDD();
        $sql->table('TABLE_FORMATION_ACTIVITY');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        $return = $sql->rowCount;
        if (empty($return)) {
            return false;
        } else {
            return true;
        }
    }

    public function delUser ($id) : bool 
    {
        $sql = new BDD();
        $sql->table('TABLE_FORMATION');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        $return = $sql->rowCount;
        if (empty($return)) {
            return false;
        } else {
            return true;
        }
    }

    public function actif ($id) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_FORMATION_ACTIF');
        $sql->update(array('actif'=> $id));
        $return = $sql->data;
        if (empty($return)) {
            return false;
        } else {
            return true;
        }
    }
}