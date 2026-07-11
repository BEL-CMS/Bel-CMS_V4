<?php
/**
 * Bel-CMS [Content management system]
 *  * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

use BelCMS\PDO\BDD;
#####################################
# Infos tables                      #
#####################################
#  BUY_PLANT_MAILS                  #
#  BUY_PLANT_NDD                    #
#  BUY_PLANT                        #
#  BUY_PLANT_USERS                  #
#  BUY_PLANT_INFOS                  #
#####################################
final class ModelsBuy
{
    public function getUsers() : array {
        $sql = new BDD();
        $sql->table('BUY_PLANT_USERS');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getInfosUser ($id)
    {
        $sql = new BDD();
        $sql->table('BUY_PLANT_USERS');
        $sql->where(array('name' => 'unique_key', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function checkMails($mail) : bool {
        $sql = new BDD();
        $sql->table('BUY_PLANT_MAILS');
        $sql->where(array('name' => 'mails', 'value' => $mail));
        $sql->queryOne();

        $results = $sql->rowCount;

        if ($results == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkNDD ($data) : bool
    {
        $sql = new BDD();
        $sql->table('BUY_PLANT_NDD');
        $sql->where(array('name'=> 'websites', 'value' => $data));
        $sql->queryOne();

        $results = $sql->rowCount;

        if ($results == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function sendMails ($data) : bool
    {
        $insert['mails'] = $data;

        $sql = new BDD();
        $sql->table('BUY_PLANT_MAILS');
        $sql->insert($insert);

        $results = $sql->rowCount;

        if ($results == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function sendNdd ($data) : bool
    {
        $insert['websites'] = $data;

        $sql = new BDD();
        $sql->table('BUY_PLANT_NDD');
        $sql->insert($insert);

        $results = $sql->rowCount;

        if ($results == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function updateUser($data, $plan = 1) : bool {
        $update['active'] = 1;
        if ($plan == 1) {
            $update['date_end'] = (new DateTime('now'))
            ->modify('+1 month')
            ->format('Y-m-d H:i:s');
        } else if ($plan == 2) {
            $update['date_end'] = (new DateTime('now'))
            ->modify('+6 month')
            ->format('Y-m-d H:i:s');
        } else if ($plan == 3) {
            $update['date_end'] = (new DateTime('now'))
            ->modify('+1 year')
            ->format('Y-m-d H:i:s');
        }
        $sql = new BDD();
        $sql->table('BUY_PLANT_USERS');
        $sql->where(array('name' => 'unique_key', 'value' => $data));
        $sql->update($update);

        $results = $sql->rowCount;

        if ($results == 0) {
            return false;
        } else {
            return true;
        }
    }
}