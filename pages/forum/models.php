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

############################################
#  TABLE_FORUM
#  TABLE_FORUM_MSG
#  TABLE_FORUM_NAME 
#  TABLE_FORUM_THREAD
############################################
final class Forum
{
    public function getNameForum ()
    {
        $sql = new BDD;
        $sql->table ('TABLE_FORUM');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getForumForID ($id)
    {
        $sql = new BDD;
        $sql->table ('TABLE_FORUM_NAME');
        $sql->where(array('name' => 'id_forum', 'value' => $id));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function category ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_THREAD');
        $sql->where(array('name' => 'id_cat', 'value' => $id));
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function getIdMsg ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_THREAD');
        $sql->where(array('name' => 'id_cat', 'value' => $id));
        $sql->limit(1);
        $sql->queryOne();
        $return = $sql->data;
        if (empty($return)) {
            return null;
        } else {
            return $return;
        }
    }

    public static function getLastMsg ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->where(array('name' => 'id_mdg', 'value' => $id));
        $sql->limit(1);
        $sql->orderby(array(array('name' => 'date_post', 'type' => 'DESC')));
        $sql->queryOne();
        $return = $sql->data;
        if (empty($return)) {
            return false;
        } else {
            return $return;
        }
    }

    public function getMsgForID ($id)
    {
        $sql = new BDD;
        $sql->table ('TABLE_FORUM_MSG');
        $sql->where(array('name' => 'id_mdg', 'value' => $id));
        $sql->orderby(array(array('name' => 'date_post', 'type' => 'DESC')));
        $sql->limit(1);
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }
    public function getCountMsg ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->where(array('name' => 'id_mdg', 'value' => $id));
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function getNbsubject ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_THREAD');
        $sql->where(array('name' => 'id_cat', 'value' => $id));
        $sql->count();
        $return = $sql->data;
        return $return;
    }
}