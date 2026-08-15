<?php
/**
 * Bel-CMS [Content management system]
 * *  * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

namespace Belcms\Pages\Models;

use BelCMS\PDO\BDD;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

############################################
#   TABLE_INBOX                            #
#   TABLE_INBOX_STATUS                     #
############################################
final class Inbox
{
     public function getMsgForUSer () : array
     {
        $sql = new BDD();
        $sql->table('TABLE_INBOX');
        $sql->where(array('name' => 'recipient_id', 'value' => $_SESSION['USER']->user->hash_key));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
     }

     public function getMsgInfos (string $id) : array
     {
        $sql = new BDD();
        $sql->table('TABLE_INBOX_STATUS');
        $sql->where(array('name'=> 'message_id', 'value' => $id));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
     }

     public function searchUser (string $user)
     {
         $return = array();
         $where = array(
            'name'  => 'username',
            'value' => $user
         );
         $sql = new BDD;
         $sql->table ('TABLE_USERS');
         $sql->whereLike($where);
         $sql->fields(array('username'));
         $sql->queryAll();

         $result = $sql->data;

         foreach ($result as $k => $v) {
            $return[] = $v->username;
         }

         return $return;
     }

     public function addMail (array $inbox, array $status)
     {
        $sql = new BDD();
        $sql->table('TABLE_INBOX');
        $sql->insert($inbox);

        $sql2 = new BDD();
        $sql2->table('TABLE_INBOX_STATUS');
        $sql2->insert($status);
     }

     public function getMsgUnique (string $id) : array
     {
        $sql = new BDD();
        $sql->table('TABLE_INBOX');
        $sql->where(array('name' => 'message_id', 'value' => $id));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
     }

     public function sendReply (array $data) : bool
     {
         $sql = new BDD();
         $sql->table('TABLE_INBOX');
         $sql->insert($data);
         if ($sql->rowCount == 1) {
            return true;
         } else {
            return false;
         }
     }
}