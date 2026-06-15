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
#####################################
# Infos tables                      #
#####################################
final class ModelsAseh
{
    public function get ()
    {
        $sql = new BDD;
        $sql->table('TABLE_CONFIG');
        $sql->where(array('name' => 'name', 'value' => 'ALERT'));
        $sql->queryOne();
        return $sql->data;
    }
    public function post ($data)
    {
        $update['value'] = $data;
        $sql = new BDD;
        $sql->table('TABLE_CONFIG');
        $sql->where(array('name' => 'name', 'value' => 'ALERT'));
        $sql->update($update);
    }
}