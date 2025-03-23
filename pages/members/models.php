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

use BelCMS\PDO\BDD;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

final class ModelsMembers
{
    public function getMembers () :  array
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public static function statsUser ($id) : array
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS_PAGE');
        $sql->where(array('name' => 'hash_key', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }
}