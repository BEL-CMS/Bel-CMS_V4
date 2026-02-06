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

final class GroupsModels
{
    public function getAllGroups () : array
    {
        $sql = new BDD;
        $sql->table('TABLE_GROUPS');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function testName ($name) : int
    {
        $test = New BDD();
        $test->table('TABLE_GROUPS');
        $test->where(array('name' => 'name', 'value' => $name));
        $test->count();
        return (int) $test->data;
    }

    public function sendNewGroup($data) : array
    {
        $sql = new BDD;
        $sql->table('TABLE_GROUPS');
        $sql->insert($data);
        $count = $sql->rowCount;
        if ($count == 1) {
            $return['text']  = constant('SAVE_BDD_SUCCESS');
            $return['type']  = 'success';
        } else {
            $return['text']  = constant('SAVE_BDD_ERROR');
            $return['type']  = 'error';  
        }
        return $return;
    }

    public function getNbPluseOne () : int
    {
		$sql = New BDD();
		$sql->table('TABLE_GROUPS');
		$sql->orderby(array(array('name' => 'id', 'type' => 'DESC')));
		$sql->queryOne();
		return $sql->data->id_group +1;
    }

    public function delete ($id) : array
    {
        $sql = new BDD;
        $sql->table('TABLE_GROUPS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        $count = $sql->rowCount;
        if ($count == 1) {
            $return['text']  = constant('DEL_SUCCESS');
            $return['type']  = 'success';
        } else {
            $return['text']  = constant('DEL_ERROR');
            $return['type']  = 'error';  
        }
        return $return;
    }

    public function edit ($id) : object
    {
        $sql = new BDD;
        $sql->table('TABLE_GROUPS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function sendEditGroup ($data) : array
    {
        $sql = new BDD;
        $sql->table('TABLE_GROUPS');
        $sql->where(array('name' => 'id', 'value' => $data['id']));
        unset($data['id']);
        $sql->update($data);
        $count = $sql->rowCount;
        if ($count == 1) {
            $return['text']  = constant('SAVE_BDD_SUCCESS');
            $return['type']  = 'success';
        } else {
            $return['text']  = constant('SAVE_BDD_ERROR');
            $return['type']  = 'error';  
        }
        return $return;       
    }
}