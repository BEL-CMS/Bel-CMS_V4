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

use BelCMS\Core\User;
use BelCMS\PDO\BDD;

############################################
#    Infos tables                          #
############################################
#   TALBE_NEWSLETTER                       #
#   TALBE_NEWSLETTER_TPL                   #
#   TALBE_NEWSLETTER_SEND                  #
############################################
final class ModelsNewsletter
{
    public function getList ()
    {
        $sql = new BDD;
        $sql->table('TALBE_NEWSLETTER');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getListTpl ()
    {
        $sql = new BDD;
        $sql->table('TALBE_NEWSLETTER_TPL');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function sendNewTpl ($data)
    {
        $sql = new BDD;
        $sql->table('TALBE_NEWSLETTER_TPL');
        $sql->insert($data);
        $return = $sql->rowCount;
        if ($return == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getTpl ($id)
    {
        $sql = new BDD;
        $sql->table('TALBE_NEWSLETTER_TPL');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function getInfosMail ()
    {
        $sql = new BDD;
        $sql->table('TABLE_MAIL_CONFIG');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getUsers ($id): array
    {
        $i = 0;
        $return = array();
        $sql = new BDD;
        $sql->table('TABLE_USERS_GROUPS');
        $sql->where(array('name' => 'user_group', 'value' => $id));
        $sql->queryAll();
        $returHashKey = $sql->data;
        foreach ($returHashKey as $key => $value) {
            $i = $i + 1;
            $user = new BDD;
            $user->table('TABLE_USERS');
            $user->where(array('name' => 'hash_key', 'value' => $value->hash_key));
            $user->fields(array('mail', 'username'));
            $user->queryOne();
            $return[] = $user->data;
        }
        return $return;
    }

    public function getUsersNewsletter (): array
    {
        $sql = new BDD();
        $sql->table('TALBE_NEWSLETTER');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function delete ($id)
    {
        $sql = new BDD();
        $sql->table('TALBE_NEWSLETTER');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        $return = $sql->rowCount;
        if ($return == 1) {
            return true;
        } else {
            return false;
        }
   }

   public function sendMail ($data)
   {
        $sql = new BDD();
        $sql->table('TALBE_NEWSLETTER_SEND');
        $sql->insert($data);
   }
}