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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

use BelCMS\PDO\BDD;
    #####################################
    # Infos tables
    #####################################
    # TABLE_DOWNLOADS
    # TABLE_DOWNLOADS_CAT
    #####################################
final class ModelsDls
{
    public function getAllDls ()
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getOneDls ($id)
    {
        $id = (int) $id;
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function AddNewsUpload ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->insert($data);
    }

        public function updateUpload ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->update($data);
    }

    public function getCat ()
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS_CAT');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getCatById ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function insertCat ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS_CAT');
        $sql->insert($data);

        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        } 
    }

    public function sendeditcat($data, $id)
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($data);
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function deletecat ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }   
    }

    public function getCatOne ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function senddelete ($id) : bool
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }
    }
}