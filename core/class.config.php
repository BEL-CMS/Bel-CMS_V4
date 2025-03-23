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

namespace BelCMS\Core;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;
use BelCMS\Core\User;

if (!defined('CHECK_INDEX')):
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

################################################
# Class config
################################################
class config
{
    public function getconfig ()
    {
        $sql = new BDD;
        $sql->table('TABLE_CONFIG');
        $sql->queryAll();
        foreach ($sql->data as $constant => $value) {
            define($value->name, $value->value); unset($sql);
        }
    }

    public static function getLangs()
    {
        $scan = Common::ScanFiles(ROOT.DS.'langs');
        foreach ($scan as $k => $v) {
            require_once ROOT.DS.'langs' . DS . $v;
        }      
    }

    public static function GroupsAccess ($page)
    {
        $list = null;
        $sql = new BDD;
        $sql->table('TABLE_CONFIG_PAGES');
        $sql->where = array('name' => 'name', 'value' => $page);
        $sql->isObject(false);
        $a = $sql->data;
        return $a;
    }

    public static function GetAccessMembers ($page)
    {
        $sql = new BDD;
        $sql->table('TABLE_CONFIG_PAGES');
        $sql->where(array('name' => 'name', 'value' => $page));
        $sql->queryOne();
        if (empty($sql->data)) {
            return false;
        } else {
            $data = $sql->data->access_groups;
            $exp = explode('|',$data);
            foreach ($exp as $key => $value) {
                if ($value == 0) {
                    return true;
                }
                if (in_array($value, $_SESSION['USER']->groups->all_groups)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public static function listGroups ()
    {
        $sql = new BDD;
        $sql->table('TABLE_GROUPS');
        $sql->fields(array('id_group', 'name'));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
}
config::getLangs();