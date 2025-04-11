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
#  TABLE_DOWNLOADS
#  TABLE_DOWNLOADS_CAT
############################################
final class Downloads
{
    public function getDls ()
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $config = Config::GetConfigPage('downloads');
        if (isset($config->config['MAX_PPR'])) {
            $nbpp = (int) $config->config['MAX_PPR'];
        }    
        $page = (Dispatcher::RequestPages() * $nbpp) - $nbpp;
        $sql->orderby(array(array('name' => 'name', 'type' => 'ASC')));
        $sql->limit(array(0 => $page, 1 => $nbpp), true);
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getCat ()
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS_CAT');
        $sql->queryAll();
        $result = $sql->data;
        if (!empty($result)) {
            return $result;
        } else {
            return;
        }
    }

    public function getSearch ($data, $sorting)
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->orderby(array(array('name' => $data['sorting'], 'type' => $sorting)));
        if (isset($data['name']) and !isset($data['cat'])) {
            $name = $data['name'];
            $where = "WHERE `name` LIKE '%$name%'";
            $sql->where($where);
        }
        if (!isset($data['name']) and isset($data['cat'])) {
            $cat   = $data['cat'];
            $where = "WHERE `idcat` = $cat";
            $sql->where($where);
        }
        if (isset($data['name']) and isset($data['cat'])) {
            $name  = $data['name'];
            $cat   = $data['cat'];
            $where = "WHERE `name` LIKE '%$name%' AND `idcat` = $cat";
            $sql->where($where);
        }
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
}