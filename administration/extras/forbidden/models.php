<?php
/**
 * Bel-CMS [Content management system]
 *  * @version 4.1.1 [PHP8.5]
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
# Infos tables                      #
#####################################
final class ModelsForbidden
{
    public function getMails ()
    {
        $sql = new BDD();
        $sql->table('TABLE_MAIL_BLACKLIST');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getMailforNam ($id)
    {
        $sql = new BDD();
        $sql->table('TABLE_MAIL_BLACKLIST');
        $sql->where(array('name'=> 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function sendNew ($mail)
    {
        $data['name'] = $mail;
        $sql = new BDD();
        $sql->table('TABLE_MAIL_BLACKLIST');
        $sql->insert($data);
    }

    public function delMail ($id) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_MAIL_BLACKLIST');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        if ($sql->data === true) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function sendEdit ($name, $id) : bool
    {
        $data['name'] = $name;
        $sql = new BDD();
        $sql->table('TABLE_MAIL_BLACKLIST');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($data);
        if ($sql->data === true) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function testName ($name) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_MAIL_BLACKLIST');
        $sql->where(array('name' => 'name', 'value' => $name));
        $sql->count();
        if ($sql->data >= 1) {
            $return = false;
        } else {
            $return = true;
        }
        return $return;
    }
}