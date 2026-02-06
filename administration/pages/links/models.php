<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
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

############################################
#    Infos tables                          #
############################################
#    TABLE_LINKS                          #
#    TABLE_LINKS_CAT                      #
############################################
final class ModelsLinks 
{
    public function getLinks ()
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS');
        $sql->where(array('name' => 'valid', 'value' => 1));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getLink ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS');
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function sendEdit ($d, $id) : bool
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($d);
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function senddelete ($id) : bool
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getCat ()
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS_CAT');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function send ($data) : bool
    {
        $sql = new BDD;
        $sql->table ('TABLE_LINKS');
        $sql->insert($data);
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getUrlValid ()
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS');
        $sql->where(array('name' => 'valid', 'value' => 0));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function valide ($id) : bool
    {
        $upd['valid'] = 1;
        $sql = new BDD;
        $sql->table('TABLE_LINKS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($upd);
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function senddeletecat ($id) : bool
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function editcat ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = $sql->data;
        } else {
            $return = false;
        }
        return $return;
    }

    public function sendeditcat ($data, $id) : bool
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($data);
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = $sql->data;
        } else {
            $return = false;
        }
        return $return;
    }

    public function addcat ()
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->querAll();
        $return = $sql->data;
        return $return;
    }

    public function addNewCat($data)
    {
        $sql = new BDD;
        $sql->table ('TABLE_LINKS_CAT');
        $sql->insert($data);
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        } 
    }
}