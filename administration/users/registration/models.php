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

    public function checkUser($name) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_USERS');
        $sql->where(array('name' => 'username', 'value' => $name));
        $sql->count();
        if ($sql->data == 1) {
            $return = false;
        } else {
            $return = true;
        }
        return $return;
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

    public function adminOn ($hash_key)
    {
        $a['admin'] = 1;
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->where(array('name' => 'hash_key', 'value' => $hash_key));
        $sql->update($a);
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function adminOff($hash_key)
    {
        $a['admin'] = 0;
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->where(array('name' => 'hash_key', 'value' => $hash_key));
        $sql->update($a);
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function createNewUser ($data)
    {
        #########################################
        $hash_key = $data['hash_key'];
        #########################################
        $insertUser = array(
            'id'                => null,
            'username'          => $data['username'],
            'hash_key'          => $hash_key,
            'password'          => $data['password'],
            'mail'              => $data['mail'],
            'ip'                => $data['ip'],
            'expire'            => (int) 0,
            'token'             => '',
            'number_valid'      => '',
            '2FA'               => 0,
            'admin'             => 0
        );
        $insert = New BDD();
        $insert->table('TABLE_USERS');
        $insert->insert($insertUser);
        #########################################
        $insertGroups = array(
            'id'          => null,
            'hash_key'    => $hash_key,
            'user_group'  => 2,
            'user_groups' => 2,
        );
        $insertGrp = New BDD();
        $insertGrp->table('TABLE_USERS_GROUPS');
        $insertGrp->insert($insertGroups);
        #########################################
        $dataProfils = array(
            'hash_key'     => $hash_key,
            'gender'       => 'unisexual',
            'public_mail'  => '',
            'websites'     => '',
            'list_ip'      => '',
            'avatar'       => constant('DEFAULT_AVATAR'),
            'info_text'    => '',
            'birthday'     => date('Y-m-d'),
            'country'      => $data['country'],
            'hight_avatar' => '',
            'friends'      => ''
        );
        #########################################
        $insertProfils = New BDD();
        $insertProfils->table('TABLE_USERS_PROFILS');
        $insertProfils->insert($dataProfils);
        #########################################
        $hardware = New BDD();
        $hardware->table('TABLE_USERS_HARDWARE');
        $hardware->insert(array('hash_key'=> $hash_key));
        #########################################
        $stats = new BDD();
        $stats->table('TABLE_USERS_PAGE');
        $stats->insert(array('hash_key' => $hash_key));
        #########################################
    }
}