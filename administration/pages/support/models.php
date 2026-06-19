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
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getMessagesID ($id) : object
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT');
        $sql->where(array('name' => 'number_id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function getMessagesReplyID ($id) : array
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT_REPLIES');
        $sql->where(array('name' => 'number_id', 'value' => $id));
        $sql->orderby(array(array('name' => 'id', 'type' => 'ASC')));
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

    public function readmsg ($id) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT');
        $sql->where(array('name' => 'number_id', 'value' => $id));
        $sql->update(array('status' => 2));
        $return = $sql->rowCount;
        if ($return == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function close ($id) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT');
        $sql->where(array('name' => 'number_id', 'value' => $id));
        $sql->update(array('status' => 4));
        $return = $sql->rowCount;
        if ($return == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function sendReply ($data) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT_REPLIES');
        $sql->insert($data);
        $return = $sql->rowCount;
        if ($return == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getSubject () : array
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT_OBJECT');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function sendnewsubject ($data) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT_OBJECT');
        $sql->insert($data);
        $return = $sql->rowCount;
        if ($return == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function testSubject ($name) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT_OBJECT');
        $sql->where(array('name' => 'value', 'value' => $name));
        $sql->count();
        $return = $sql->data;
        if ($return == 1) {
            return false;
        } else {
            return true;
        }
    }

    public function editsubject ($id, $name) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT_OBJECT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($name);
        $return = $sql->rowCount;
        if (empty($return)) {
            return false;
        } else {
            return true;
        }
    }

    public function delsubject ($id) : bool
    {
        $sql = new BDD();
        $sql->table('TABLE_SUPPORT_OBJECT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        $return = $sql->rowCount;
        if (empty($return)) {
            return false;
        } else {
            return true;
        }
    }
}