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

if (!defined('CHECK_INDEX')) {
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
}

final class groups
{
    public static function getGroups ()
    {
        $sql = new BDD;
        $sql->table('TABLE_GROUPS');
        $sql->queryAll();
        return $sql->data;
    }

    public static function newGroup ($data)
    {
        $nb = 0;
        $sqlLast = new BDD;
        $sqlLast->table('TABLE_GROUPS');
        $sqlLast->orderby(array(array('name' => 'id_group', 'type' => 'DESC')));
        $sqlLast->queryOne();
        $nb = 1 + (int) $sqlLast->data->id_group;

        $data['name']     = Common::VarSecure($data['name'], null);
        if ($data['image'] == null) {
            $data['image'] = null;
        } else {
            $data['image']    = Common::VarSecure($data('image'), null);
        }
        $data['color']    = Common::VarSecure($data['color'], null);
        $data['id_group'] = $nb;

        $sql = new BDD;
        $sql->table('TABLE_GROUPS');
        $sql->insert($data);
    }

    public static function deleteGroups ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_GROUPS');
        if ($data['id_group'] != 1 or $data['id_group'] != 2 or $data['id_group'] != 3) {
            $sql->where(array('name' => 'id_group', 'value' => $data));
            $sql->delete();
        }
    }

    public static function getName ($id)
    {
        if (is_numeric($id)) {
            $sql = new BDD;
            $sql->table('TABLE_GROUPS');
            $sql->fields(array('name'));
            $sql->where(array('name' => 'id_group', 'value' => $id));
            $sql->queryOne();
            return $sql->data;
        } else {
            debug('ERROR ID');
        }
    }

    public static function getColor ($id)
    {
        if (is_numeric($id)) {
            $sql = new BDD;
            $sql->table('TABLE_GROUPS');
            $sql->fields(array('color'));
            $sql->where(array('name' => 'id_group', 'value' => $id));
            $sql->queryOne();
            return $sql->data;
        } else {
            debug('ERROR ID');
        }
    }
}