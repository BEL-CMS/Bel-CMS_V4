<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
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
#    Infos tables                          #
############################################
#    TABLE_SUPPORT                         #
#    TABLE_SUPPORT_OBJECT                  #
#    TABLE_SUPPORT_REPLIES                 #
############################################
final class modelsSupport 
{
    public function getMessages () : array
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT');
        $sql->orderby(array(array('name' => 'id', 'type' => 'DESC')));
        $sql->where(array('name' => 'user_hash_key', 'value'=> $_SESSION['USER']->user->hash_key));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getObject () : array
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT_OBJECT');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getSujet ($id)
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT_OBJECT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->limit(1);
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function sendNewSupport ($data, $msg) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT');
        $sql->insert($data);
        $return_1 = $sql->rowCount;
        if ($return_1 == 1) {
            $return_1 = true;
        } else {
            $return_1 = false;
        }
        ############################################
        $sql2 = new BDD();
        $sql2->table('TABLE_SUPPORT_REPLIES');
        $sql2->insert($msg);
        $return_2 = $sql2->rowCount;
        if ($return_2 == 1) {
            $return_2 = true;
        } else {
            $return_2 = false;
        }
        if ($return_1 === true and $return_2 === true) {
            return true;
        } else {
            return false;
        }
    }

    public function testReadUser ($hash_key)
    {
        $test_1 = new BDD();
        $test_1->table('TABLE_SUPPORT');
        $test_1->where(array('name' => 'user_hash_key', 'value' => $hash_key));
        $test_1->count();
        $return_1 = $test_1->rowCount;
        if ($return_1 == 1) {
            $return_1 = true;
        } else {
            $return_1 = false;
        }
        ############################################
        $test_2 = new BDD();
        $test_2->table('TABLE_SUPPORT_REPLIES');
        $test_2->where(array('name' => 'user_id', 'value' => $hash_key));
        $test_2->count();
        $return_2 = $test_2->rowCount;
        ############################################
        if ($return_2 == 1) {
            $return_2 = true;
        } else {
            $return_2 = false;
        }
        if ($return_1 === true and $return_2 === true) {
            return true;
        } else {
            return false;
        }
    }

    public function getMessageInfos ($id) : object
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT');
        $sql->where(array('name' => 'number_id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function getMessagesID ($id) : array
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT_REPLIES');
        $sql->where(array('name' => 'number_id', 'value' => $id));
        $sql->orderby(array(array('name' => 'id', 'type' => 'ASC')));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function sendReply ($data) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT_REPLIES');
        $sql->insert($data);
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = true;
        } else {
            $return = false;
        }
        if ($return === true) {
            return true;
        } else {
            return false;
        }
    }
}