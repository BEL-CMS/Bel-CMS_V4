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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

use BelCMS\PDO\BDD;

final class UsersModels
{
    public function getUsers () : array
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getUser ($hash_key)
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->where(array('name' => 'hash_key', 'value' => $hash_key));
        $sql->fields(array('hash_key'));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function checkUser($name)
    {
        $sql = new BDD();
        $sql->table('TABLE_USERS');
        $sql->where(array('name' => 'username', 'value' => $name));
        $sql->count();
        $returnCheckName = (int) $sql->data;
        return $returnCheckName;
    }

    public function blackListEmail()
    {
        $sql = new BDD();
        $sql->table('TABLE_MAIL_BLACKLIST');
        $sql->isObject(false);
        $sql->queryAll();
        $results = $sql->data;
        return $results;
    }

    public function addCountry ($country = null, $id = false)
    {
        $a['country'] = $country;
        $insertProfils = new BDD();
        $insertProfils->table('TABLE_USERS_PROFILS');
        $insertProfils->where(array('name' => 'hash_key', 'value' => $id));
        $insertProfils->update($a);
    }
}