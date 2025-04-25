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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

############################################
#  TABLE_USERS
############################################
final class Members
{
    public function members ()
    {
        $config = Config::GetConfigPage('members');
        if (isset($config->config['MAX_PPR'])) {
            $nbpp = (int) $config->config['MAX_PPR'];
        } else {
            $nbpp = (int) 4;
        }
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $page = (Dispatcher::RequestPages() * $nbpp) - $nbpp;
        $sql->orderby(array(array('name' => 'username', 'type' => 'ASC')));
        $sql->limit(array(0 => $page, 1 => $nbpp), true);
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getMembers ($name)
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->where(array('name' => 'username', 'value' => $name));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }
}