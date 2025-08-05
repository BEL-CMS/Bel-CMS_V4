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
# Infos tables                      #
#####################################
#  TABLE_ARTICLES                   #
#  TABLE_ARTICLES_CONTENT           #
#####################################
final class ModelsAtl
{
    public function getCatArticles ()
    {
        $sql = new BDD;
        $sql->table('TABLE_ARTICLES');
        $sql->queryAll ();
        $return = $sql->data;
        return $return;
    }

    public function countArticleForID ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_ARTICLES_CONTENT');
        $sql->where(array('name' => 'id_articles', 'value' => $id));
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function view ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_ARTICLES_CONTENT');
        $sql->where(array('name' => 'id_articles', 'value' => $id));
        $sql->queryAll ();
        $return = $sql->data;
        return $return;
    }

    public function addNewPage ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_ARTICLES_CONTENT');
        $sql->insert($data);
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function addNewCat ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_ARTICLES');
        $sql->insert($data);
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        } 
    }

    public function deleteAll ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_ARTICLES');
        $sql->where(array('name' => 'id_articles', 'value' => $id));
        $sql->delete();
        $return_1 = $sql->rowCount;
        unset($sql);
        $sql = new BDD;
        $sql->table('TABLE_ARTICLES_CONTENT');
        $sql->where(array('name' => 'id_articles', 'value' => $id));
        $sql->delete();
        $return_2 = $sql->rowCount;

        if ($return_1 == 1 and $return_2 == 1) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function deletePage ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_ARTICLES_CONTENT');
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
}