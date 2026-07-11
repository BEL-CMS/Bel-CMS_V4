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

use BcMath\Number;
use BelCMS\PDO\BDD;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
#####################################
# Infos tables                      #
#####################################
#  TABLE_TEAMS                      #
# id, name, foundation, contact,    #
# joining, logo, screen             #
#####################################
# TABLE_USERS_GAMES                 #
# id, author, date_join, rank       #
# id_game                           #
#####################################
# TABLE_GAME_RANK                   #
# id, name                          #
#####################################
final class modelsTeams
{
    public function getTeams () : array
    {
        $sql = new BDD();
        $sql->table('TABLE_TEAMS');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getTeam ($id) : array
    {
        $sql = new BDD();
        $sql->table('TABLE_TEAMS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->isObject(false);
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function getUser ($id) : array
    {
        $sql = new BDD();
        $sql->table('TABLE_USERS_GAMES');
        $sql->where(array('name'=> 'id_game', 'value' => $id));
        $sql->isObject(false);
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getRank ($id)
    {
        $sql = new BDD();
        $sql->table('TABLE_GAME_RANK');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function getCountGames ($id)
    {
        $sql = new BDD();
        $sql->table('TABLE_USERS_GAMES');
        $sql->where(array('name' => 'id_game', 'value' => $id));
        $sql->count();
        return $sql->data;
    }
}