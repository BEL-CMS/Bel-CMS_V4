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
# TABLE_COMMENTS
# TABLE_FORBIDEN_WORD
#####################################
final class ModelsComments
{
    public function getComments ()
    {
        $sql = new BDD;
        $sql->table('TABLE_COMMENTS');
        $sql->orderby(array('id', 'DESC'));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getComment ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_COMMENTS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function sendEdit ($comment, $id)
    {
        $upd['comment'] = $comment;
        $sql = new BDD;
        $sql->table('TABLE_COMMENTS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($upd);
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function forbidden ()
    {
        $sql = new BDD;
        $sql->table('TABLE_FORBIDEN_WORD');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
}