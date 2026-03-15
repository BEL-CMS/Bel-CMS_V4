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

use BelCMS\Core\Config;
use BelCMS\Core\Dispatcher;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

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
    public function getCountMsg ()
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function getCountThreads ()
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_THREAD');
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function getCountPostThreads ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_THREAD');
        $sql->where(array('name' => 'id_cat', 'value' => $id));
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function getCountNbThreads ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_THREAD');
        $sql->where(array('name' => 'id_cat', 'value' => $id));
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function getForums ()
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function subat ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_NAME');
        $sql->where(array('name' => 'id_forum', 'value' => $id));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function subatAll ()
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_NAME');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function nameThreads ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_THREAD');
        $sql->where(array('name' => 'id_cat', 'value' => $id));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getCountMsgThreads ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->where(array('name' => 'id_mdg', 'value' => $id));
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function getMsg ($id)
    {
        $config = Config::GetConfigPage('forum');
        if (isset($config->config['MAX_PAGE'])) {
            $nbpp = (int) $config->config['MAX_PAGE'];
        } else {
            $nbpp = (int) 6;
        }
        $page = (Dispatcher::RequestPages() * $nbpp) - $nbpp;
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->where(array('name' => 'id_mdg', 'value' => $id));
        $sql->orderby(array(array('name' => 'id', 'type' => 'ASC')));
        $sql->limit(array(0 => $page, 1 => $nbpp), true);
        $sql->queryAll();
        $return = $sql->data;
        self::countOnePlus($id);
        return $return;
    }

    public function getnName ($id)
    {
        $id  = Common::secureRequest($id);
        $get = new BDD();
        $get->table('TABLE_FORUM_THREAD');
        $get->where(array('name' => 'id_message', 'value' => $id));
        $get->queryOne();
        $return = $get->data;
        return $return->title;
    }

    private function countOnePlus ($id)
    {
        if ($id) {
            $id  = Common::secureRequest($id);
            $get = new BDD();
            $get->table('TABLE_FORUM_THREAD');
            $get->where(array('name' => 'id_message', 'value' => $id));
            $get->queryOne();
            $data = $get->data;
            $count = $data->view_post;
            $count++;
            $update = new BDD();
            $update->table('TABLE_FORUM_THREAD');
            $update->where(array('name' => 'id_message', 'value' => $id));
            $update->update(array('view_post' => $count));
        }
    }

    public function sendReply ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->insert($data);
        if ($sql->rowCount == 1) {
            $return['text'] = constant('SEND_SUCCESS');
            return $return;
        } else {
            $return['text'] = constant('SAVE_BDD_ERROR');
            return $return;
        }
    }

    public function category ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_NAME');
        $sql->where(array('name' => 'id_forum', 'value' => $id));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function nameCat ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return; 
    }

    public function getnbMesg ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->where(array('name' => 'id_mdg', 'value' => $id));
        $sql->count();
        return $sql->data;
    }

    public function sendThread ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_THREAD');
        $sql->insert($data); 
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function sendMsg ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->insert($data); 
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }  
    }

    public function charte ()
    {
        $sql = new BDD;
        $sql->table('TABLE_CONFIG_PAGES');
        $sql->where(array('name' => 'name', 'value' => 'forum'));
        $sql->queryOne();
        $return = $sql->data;
        return $return->infos_sup;
    }

    public function getLastMsg ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->where(array('name' => 'id_mdg', 'value' => $id));
        $sql->orderby("ORDER BY `belcms_forum_msg`.`id` DESC", true);
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }
}