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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

############################################
#  TABLE_LINKS
#  TABLE_LINKS_CAT
############################################
final class Links
{
    public function getCat ()
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS_CAT');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getNbCat ()
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS_CAT');
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function getNbLink()
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS');
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function getCatForNumber ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function getLinksForNumber($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_LINKS');
        $sql->where(array('name' => 'cat', 'value' => $id));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function onePlus ($id)
    {
        $where[] = array('name' => 'id', 'value' => $id);
        $sql = new BDD;
        $sql->table('TABLE_LINKS');
        $sql->where($where);
        $sql->queryOne();
        $return = $sql->data;
        $link = $return->link;

        $plus['click'] = $return->click + 1;

        $update = new BDD;
        $update->table('TABLE_LINKS');
        $update->where($where);
        $update->update($plus);

        return $link;
    }
}