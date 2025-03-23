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
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
###   TABLE_FORUM          ###
###   TABLE_FORUM_NAME     ###
###   TABLE_FORUM_THREADS  ###
final class ModelsForum
{
	#####################################
	# Récupère les noms des forums
	#####################################
    public function getForum ()
    {
        $where = array(
			'name' => 'activate',
			'value' => 1
		);
        $sql = new BDD;
        $sql->table('TABLE_FORUM');
        $sql->where($where);
        $sql->orderby(array(array('name' => 'orderby', 'type' => 'ASC')));
        $sql->queryAll();
        $return = $sql->data;
        foreach ($return as $k => $v) {
            $return[$k]->threads = self::getMsgThreads($v->id);
        }
        return $return;
    }
    #####################################
    # Récupère les sujets
    #####################################
    public function getMsgThreads ($id)
    {
        $id = (int) $id;
        $sql = new BDD;
        $sql->table('TABLE_FORUM_NAME');
        $sql->where(array('name' => 'id_forum', 'value' => $id));
        $sql->orderby(array(array('name' => 'orderby', 'type' => 'ASC')));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
    #####################################
    # Récupère le sujet precis
    #####################################
    public function threads ($id)
    {
        $id = (int) $id;
        $sql = new BDD;
        $sql->table('TABLE_FORUM_THREADS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
    #####################################
    # Récupère les messages posté
    #####################################
    public function getMessages ($code)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->where(array('name' => 'id_mdg', 'value' => $code));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
    #####################################
    # Récupère le compte des message emis
    #####################################
    public static function countMsg ($hash)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->where(array('name' => 'author', 'value' => $hash));
        $sql->count();
        $return = $sql->data;
        return $return;
    }
    #####################################
    # Enregistre dans la BDD MSG
    #####################################
    public function sendReply ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->insert($data);
        return $sql->data;
    }
    #####################################
    # Récupere le nom du message
    #####################################
    public function getNameMsg ($hash) 
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_THREADS');
        $sql->where(array('name' => 'id_message', 'value' => $hash));
        $sql->fields(array('title'));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }
}