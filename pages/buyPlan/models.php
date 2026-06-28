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
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

############       TABLES       ############
#   BUY_PLANT_MAILS
#   BUY_PLANT_NDD
#   BUY_PLANT
#   BUY_PLANT_USERS
#   BUY_PLANT_INFOS
############       TABLES       ############
final class ModelsBuyPlan
{
    public function buy ($data)
    {
        $_SESSION['USER']->unique_key = $data['unique_key'];
        $sql = new BDD();
        $sql->table('BUY_PLANT_USERS');
        $sql->insert($data);
        $return = $sql->rowCount;
        return $return;
    }

    public function getInfos () : object
    {
        $data = (object) array();

        $sql = new BDD();
        $sql->table('BUY_PLANT_INFOS');
        $sql->queryAll();

        foreach ($sql->data as $key => $value) {
            $data->{$value->name} = $value->value;
        }

        return $data;
    }

    public function getbuy ($unique_key) : object
    {
        $sql = new BDD();
        $sql->table('BUY_PLANT_USERS');
        $sql->where(array('name'=> 'unique_key', 'value' => $unique_key));
        $sql->queryOne();
        $return = $sql->data;

        unset($_SESSION['USER']->unique_key);

        return $return;
    }
    public function checkNDD ($data) : bool
    {
        $sql = new BDD();
        $sql->table('BUY_PLANT_NDD');
        $sql->where(array('name'=> 'websites', 'value' => $data));
        $sql->queryAll();
        $results = $sql->rowCount;

        if ($results == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public function checkMails ($data) : bool
    {
        $sql = new BDD();
        $sql->table('BUY_PLANT_MAILS');
        $sql->where(array('name'=> 'mails', 'value' => $data));
        $sql->queryAll();
        $results = $sql->rowCount;

        if ($results == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public function getWeb () : array
    {
        $sql = new BDD();
        $sql->table('BUY_PLANT_USERS');
        $sql->where(array('name' => 'mail_user', 'value' => $_SESSION['USER']->user->mail));
        $sql->orderby(array('dateinsert'));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getUniqueWeb ($key)
    {
        $sql = new BDD();
        $sql->table('BUY_PLANT_USERS');
        $sql->where(array('name' => 'unique_key', 'value' => $key));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }
}