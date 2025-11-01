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

#####################################
# Infos tables
#####################################
# TABLE_FORUM
# TABLE_FORUM_MSG
# TABLE_FORUM_NAME
# TABLE_FORUM_THREADS
#####################################
final class ModelsForum
{
    public function getAllMsg()
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
    public function getForum ()
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
    public function getNameForum ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }
    public function getCat ()
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_NAME');
        $sql->orderby(array(array('name' => 'id_forum', 'type' => 'ASC')));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
    public function getThreads()
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_THREADS');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
    public function AddCatMain ($data) : array
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM');
        $sql->insert($data);
        if ($sql->rowCount == true) {
            $array = array(
                'type' => 'success',
                'text' => constant('SEND_SUCCESS')
            );
        } else {
            $array = array(
                'type' => 'warning',
                'text' => constant('EDIT_ERROR')
            );
        }
        return $array;
    }

    public function getMainCat ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function editmaincat ($data, $id) : bool
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($data);
        $return = $sql->data;
        if ($return === true) {
            return true;
        } else {
            return false;
        }
    }

    public function delMainCat ($id) : bool
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        $return = $sql->data;
        if ($return === true) {
            return true;
        } else {
            return false;
        }
    }

    public function sendNewCattSup ($data) : bool
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_NAME');
        $sql->insert($data);
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function subForumDelete ($id) : bool
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_NAME');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        $return = $sql->data;
        if ($return === true) {
            return true;
        } else {
            return false;
        }
    }

    public function getForumID ($id) : object
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_NAME');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function editSubForum ($data, $id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_NAME');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($data);
        $return = $sql->data;
        if ($return === true) {
            return true;
        } else {
            return false;
        }
    }
}